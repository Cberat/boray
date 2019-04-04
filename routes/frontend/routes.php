<?php
/**
 * Created by PhpStorm.
 * User: laravel
 * Date: 11.03.2018
 * Time: 10:19
 */

Route::group(["as"=>"frontend", "namespace" => "Frontend"], function () {
    Route::get("/", "HomeController@index")->name(".index");

    Route::get("/test", "StaticController@test");



    Route::group(["as" => ".urun", "prefix" => "urun", "namespace"=>"Urun"], function() {
       Route::get("/", "UrunController@index")->name(".index");
       Route::get("/{category}", "UrunController@category")->name(".category");
       Route::get("/{category}/{slug}", "UrunController@details")->name(".details");
       Route::post("/{category}/{slug}/new-comment", "UrunController@newComment")->name(".newComment");
    });

    Route::group(["as" => ".portfolio", "prefix" => "portfolyo"], function (){
       Route::get("/", "PortfolioController@index")->name(".index");
    });

    Route::get("/iletisim", "StaticController@contact")->name(".contact");
    Route::post("/sendMessage", "StaticController@sendMessage")->name(".sendMessage");

    Route::get("/{slug}", "StaticController@pages")->name(".static");

});
