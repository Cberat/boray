<?php

namespace App\Http\Controllers\Backend\Emlak;

use App\Models\Agent;
use App\Models\Emlak;
use App\Models\EmlakCategory;
use App\Models\Sehir;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class EmlakController extends Controller
{

    public function index()
    {
        $emlaks = Emlak::all();

        return view("backend.urun.uruns", compact("emlaks"));
    }

    public function createShow()
    {
       
        $categories = EmlakCategory::all();
        $sehirs = Sehir::all();
        $agents = Agent::all();

        return view("backend.urun.news.newUruns", compact("categories","sehirs","agents"));
    }

    public function updateShow($slug)
    {
        $emlak = Emlak::where("slug", $slug)->first();
        $categories = EmlakCategory::all();
        $sehirs = Sehir::all();
        $agents = Agent::all();
       


        return view("backend.urun.news.newUruns", compact("emlak", "categories","sehirs","agents"));
    }

    public function create(Request $request)
    {

        $file = null;

        if ($request->file("coverImage") != null){
            $file = Storage::disk("public")->putFile("/uruns",$request->file("coverImage"));
        }

        if ($file == false){
            return ["status" => "error", "title" => "Hatalı", "message" => "urun resmi kaydedilemedi"];
        }

        $slug = str_slug($request->title.Carbon::now(),"-");

        $emlak = new Emlak();

        $emlak->title = $request->title;
        $emlak->oz_title = $request->get("oz_title");
        $emlak->description = $request->description;
        $emlak->content = $request->get("content");
        $emlak->genel_oz = $request->get("genel_oz");
        $emlak->category_id = $request->urunCategory;
        $emlak->sehir_id = $request->sehirCategory;
        $emlak->agent_id = $request->agentCategory;
        $emlak->slug = $slug;
        $emlak->cover_image = $file;


        if ($emlak->save()){

            return ["status" => "success", "title" => "başarılı", "message" => "emlak kaydedildi."];
        }

        return ["status" => "error", "title" => "Hatalı", "message" => "emlak kaydedilemedi"];
    }

    public function update($slug, Request $request)
    {
        $newSlug = str_slug($request->title.Carbon::now(),"-");

        $oldEmlak = Emlak::where("slug", $slug)->first();
        $file = $oldEmlak->cover_image;

        if ($request->file("coverImage") != null){
            Storage::disk("public")->delete($oldEmlak->cover_image);
            $file = Storage::disk("public")->putFile("/uruns",$request->file("coverImage"));
        }

        $emlak = Emlak::where("slug", $slug)->update([
            "title" => $request->title,
            "oz_title" => $request->oz_title,
            "description" => $request->description,
            "content" => $request->get("content"),
            "genel_oz" => $request->get("genel_oz"),
            "oz_title" => $request->get("oz_title"),
            "category_id" => $request->urunCategory,
            "sehir_id" => $request->sehirCategory,
            "agent_id" => $request->agentCategory,
            "slug" => $newSlug,
            "cover_image" => $file,
        ]);

        if ($emlak){

            return ["status" => "success", "title" => "başarılı", "message" => "urun güncellendi."];
        }

        return ["status" => "error", "title" => "Hatalı", "message" => "urun güncellenemedi"];
    }

    public function delete(Request $request)
    {
        $emlak = Emlak::where("id", $request->id)->first();
        Storage::disk("public")->delete($emlak->cover_image);
        $emlak->delete();

        if ($emlak){

            return ["status" => "success", "title" => "başarılı", "message" => "emlak silindi."];
        }

        return ["status" => "error", "title" => "Hatalı", "message" => "emlak silinemedi"];
    }

}
