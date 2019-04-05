<?php

namespace App\Http\Controllers\Backend\Emlak;

use App\Models\Emlak;
use App\Models\EmlakCategory;
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

        return view("backend.urun.newUruns", compact("categories"));
    }

    public function updateShow($slug)
    {
        $emlak = Emlak::where("slug", $slug)->first();
        $categories = EmlakCategory::all();

        return view("backend.urun.newUruns", compact("emlak", "categories"));
    }

    public function create(Request $request)
    {

        $file = null;

        if ($request->file("coverImage") != null){
            $file = Storage::disk("public")->putFile("/uruns",$request->file("coverImage"));
        }

        if ($file == false){
            return ["status" => "error", "title" => "Hatalı", "message" => "Blog resmi kaydedilemedi"];
        }

        $slug = str_slug($request->title.Carbon::now(),"-");

        $emlak = new Emlak();

        $emlak->title = $request->title;
        $emlak->keywords = $request->keywords;
        $emlak->description = $request->description;
        $emlak->tags = $request->tags;
        $emlak->content = $request->get("content");
        $emlak->category_id = $request->urunCategory;

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
            "keywords" => $request->keywords,
            "description" => $request->description,
            "tags" => $request->tags,
            "content" => $request->get("content"),
            "category_id" => $request->urunCategory,
            "slug" => $newSlug,
            "cover_image" => $file,
        ]);

        if ($emlak){

            return ["status" => "success", "title" => "başarılı", "message" => "Blog güncellendi."];
        }

        return ["status" => "error", "title" => "Hatalı", "message" => "Blog güncellenemedi"];
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
