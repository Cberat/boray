<?php

namespace App\Http\Controllers\Backend\Emlak;

use App\Models\Sehir;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SehirController extends Controller
{
    public function index(){
        $sehirs = Sehir::all();
        return view("backend.urun.sehirs",compact("sehirs"));

    }

    public function createShow()
    {
        return view("backend.urun.news.newSehirs");
    }

    public function updateShow($id)
    {
        $sehir = Sehir::where("id", $id)->first();

        return view("backend.urun.news.newSehirs", compact("sehir"));
    }

    public function create(Request $request)
    {
        $slug = str_slug($request->title);

        $sehir = new Sehir();

        $sehir->title = $request->title;
        $sehir->keywords = $request->keywords;
        $sehir->slug = $slug;

        if ($sehir->save()){
            return ["status" => "success", "title" => "Başarılı", "message" => "sehir kaydedildi"];
        }

        return ["status" => "error", "title" => "Hatalı", "message" => "sehir kaydedilmedi"];
    }

    public function update($id, Request $request)
    {
        $slug = str_slug($request->title);

        $sehir = Sehir::where("id", $id)->update([
            "title" => $request->title,
            "keywords" => $request->keywords,
            "slug" => $slug
        ]);

        if ($sehir){
            return ["status" => "success", "title" => "Başarılı", "message" => "sehir güncellendi"];
        }

        return ["status" => "error", "title" => "Hatalı", "message" => "sehir güncellenemedi"];
    }

    public function delete(Request $request)
    {
        $sehir = Sehir::where("id", $request->id)->delete();

        if ($sehir){
            return ["status" => "success", "title" => "Başarılı", "message" => "sehir silindi"];
        }

        return ["status" => "error", "title" => "Hatalı", "message" => "sehir silinemedi"];
    }
}
