<?php

namespace App\Http\Controllers\Backend\Emlak;

use App\Models\MultiDiv;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MultiDivController extends Controller
{
    /*public function index(){
        $divs = MultiDiv::all();
        return view("backend.urun.categories",compact("divs"));

    }*/

    public function createShow()
    {
        return view("backend.urun.news.newUruns");
    }

    public function updateShow($id)
    {
        $divs = MultiDiv::where("id", $id)->first();

        return view("backend.urun.news.newUruns", compact("divs"));
    }

    public function create(Request $request)
    {

        $div = new MultiDiv();

        $div->title = $request->title;
        $div->description = $request->description;
        
     

        if ($div->save()){
            return ["status" => "success", "title" => "Başarılı", "message" => "Kategori kaydedildi"];
        }

        return ["status" => "error", "title" => "Hatalı", "message" => "Kategori kaydedilmedi"];
    }

    public function update($id, Request $request)
    {
       

        $div = MultiDiv::where("id", $id)->update([
            "title" => $request->title,
            "description" => $request->description
        ]);

        if ($div){
            return ["status" => "success", "title" => "Başarılı", "message" => "Kategori güncellendi"];
        }

        return ["status" => "error", "title" => "Hatalı", "message" => "Kategori güncellenemedi"];
    }

    public function delete(Request $request)
    {
        $div = MultiDiv::where("id", $request->id)->delete();

        if ($div){
            return ["status" => "success", "title" => "Başarılı", "message" => "Kategori silindi"];
        }

        return ["status" => "error", "title" => "Hatalı", "message" => "Kategori silinemedi"];
    }

}