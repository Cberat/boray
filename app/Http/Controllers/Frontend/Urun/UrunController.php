<?php

namespace App\Http\Controllers\Frontend\Urun;


use App\Models\Emlak;
use App\Models\EmlakCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;


class UrunController extends Controller
{


   /* public function __construct()
    {
        $categories = EmlakCategory::all();
        View::share("categories", $categories);
    }*/

    public function index()
    {
      $uruns = Emlak::all();
      return view("frontend.urun.index", compact("uruns"));
    }

    /*public function category($category)
    {
        $category = EmlakCategory::where("slug", $category)->first();
        $uruns = Emlak::where(["status" => 1, "category_id" => $category->id])->get();
        return view("frontend.urun.index", compact("uruns"));
    }*/

    public function details($category, $slug)
    {
        $urun = Emlak::where("slug", $slug)->first();
        return view("frontend.urun.single-urun", compact("urun"));
    }


}
