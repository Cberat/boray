<?php

namespace App\Http\Controllers\Backend\Emlak;



use App\Models\EmlakCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function index(){
        $categories = EmlakCategory::all();
        return view("backend.urun.categories",compact("categories"));

    }

    public function createShow()
    {
        return view("backend.urun.newCategory");
    }

    public function updateShow($id)
    {
        $category = EmlakCategory::where("id", $id)->first();

        return view("backend.urun.newCategory", compact("category"));
    }

    public function create(Request $request)
    {
        $slug = str_slug($request->title);

        $category = new EmlakCategory();

        $category->title = $request->title;
        $category->keywords = $request->keywords;
        $category->description = $request->description;
        $category->slug = $slug;

        if ($category->save()){
            return ["status" => "success", "title" => "Başarılı", "message" => "Kategori kaydedildi"];
        }

        return ["status" => "error", "title" => "Hatalı", "message" => "Kategori kaydedilmedi"];
    }

    public function update($id, Request $request)
    {
        $slug = str_slug($request->title);

        $category = EmlakCategory::where("id", $id)->update([
            "title" => $request->title,
            "keywords" => $request->keywords,
            "description" => $request->description,
            "slug" => $slug
        ]);

        if ($category){
            return ["status" => "success", "title" => "Başarılı", "message" => "Kategori güncellendi"];
        }

        return ["status" => "error", "title" => "Hatalı", "message" => "Kategori güncellenemedi"];
    }

    public function delete(Request $request)
    {
        $category = EmlakCategory::where("id", $request->id)->delete();

        if ($category){
            return ["status" => "success", "title" => "Başarılı", "message" => "Kategori silindi"];
        }

        return ["status" => "error", "title" => "Hatalı", "message" => "Kategori silinemedi"];
    }

}
