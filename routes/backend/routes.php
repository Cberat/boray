<?php
/**
 * Created by PhpStorm.
 * User: laravel
 * Date: 4.03.2018
 * Time: 14:31
 */

Route::get('admin/giris-yap', 'Auth\LoginController@showLoginForm')->name('backend.login');
Route::post('admin/giris-yap', 'Auth\LoginController@login');
Route::get('admin/cikis-yap', 'Auth\LoginController@logout')->name('backend.logout');

Route::group(["prefix"=>"admin", "as"=>"backend", "namespace" => "Backend"],/* "middleware" => "admin"],*/ function (){
    Route::get("/", "DashboardController@index")->name(".dashboard");
    Route::group(["prefix"=>"settings", "as"=>".settings", "namespace" => "Settings"], function (){
        Route::get("/", "SettingsController@show")->name(".show");
        Route::post("/update", "SettingsController@update")->name(".update");
        Route::post("/create", "SettingsController@create")->name(".create");
        Route::post("/delete", "SettingsController@delete")->name(".delete");

    });

    Route::group(["prefix" => "static", "as" => ".static", "namespace" => "Statics"], function () {
       Route::get("/", "StaticController@show")->name(".show");
       Route::get("/yeni-sayfa", "StaticController@newPageShow")->name(".newPageShow");
       Route::post("/new-page-create", "StaticController@create")->name(".newPageCreate");
       Route::get("/duzenle/{slug}", "StaticController@editPageShow")->name(".pageEditShow");
       Route::post("/edit/{slug}", "StaticController@update")->name(".pageEdit");
       Route::post("/delete", "StaticController@delete")->name(".delete");

        Route::group(["prefix" => "modul", "as" => ".module"], function () {
            Route::get("/", "ModulController@show")->name(".show");
            Route::get("/yeni-modul", "ModulController@newModulShow")->name(".newModuleShow");
            Route::post("/new-module-create", "ModulController@create")->name(".newModuleCreate");
            Route::get("/duzenle/{id}", "ModulController@editModulShow")->name(".editModuleShow");
            Route::post("/edit/{id}", "ModulController@update")->name(".moduleEdit");
            Route::post("/delete", "ModulController@delete")->name(".delete");
        });
    });

    Route::group(["prefix" => "menus", "as" => ".menus", "namespace" => "Menus"], function () {
        Route::get("/", "MenusController@index")->name(".index");
        Route::post("/update", "MenusController@update")->name(".update");
        Route::post("/create", "MenusController@create")->name(".create");
        Route::post("/delete", "MenusController@delete")->name(".delete");
    });

    Route::group(["prefix" => "urun", "as" => ".urun", "namespace" => "Emlak"], function (){
       Route::get("/", "EmlakController@index")->name(".index");
       Route::get("/yeni-urun", "EmlakController@createShow")->name(".createShow");
       Route::get("/duzenle/{slug}", "EmlakController@updateShow")->name(".updateShow");
       Route::post("/delete", "EmlakController@delete")->name(".delete");
        Route::post("/update/{id}", "EmlakController@update")->name(".update");
        Route::post("/create", "EmlakController@create")->name(".create");

       Route::group(["prefix" => "categories", "as" => ".category"], function (){
           Route::get("/", "CategoryController@index")->name(".index");
           Route::get("/yeni-kategori", "CategoryController@createShow")->name(".createShow");
           Route::get("/duzenle/{id}", "CategoryController@updateShow")->name(".updateShow");
           Route::post("/update/{id}", "CategoryController@update")->name(".update");
           Route::post("/create", "CategoryController@create")->name(".create");
           Route::post("/delete", "CategoryController@delete")->name(".delete");
       });

        Route::group(["prefix" => "sehirs", "as" => ".sehir"], function (){
            Route::get("/", "SehirController@index")->name(".index");
            Route::get("/yeni-sehir", "SehirController@createShow")->name(".createShow");
            Route::get("/duzenle/{id}", "SehirController@updateShow")->name(".updateShow");
            Route::post("/update/{id}", "SehirController@update")->name(".update");
            Route::post("/create", "SehirController@create")->name(".create");
            Route::post("/delete", "SehirController@delete")->name(".delete");
        });
        Route::group(["prefix" => "agents", "as" => ".agent"], function (){

            Route::get("/", "AgentController@index")->name(".index");
            Route::get("/yeni-agent", "AgentController@createShow")->name(".createShow");
            Route::get("/duzenle/{slug}", "AgentController@updateShow")->name(".updateShow");
            Route::post("/delete", "AgentController@delete")->name(".delete");
            Route::post("/update/{id}", "AgentController@update")->name(".update");
            Route::post("/create", "AgentController@create")->name(".create");

        });


    });

    Route::group(["prefix" => "portfolyo", "as" => ".portfolio", "namespace" => "Portfolio"], function (){
       Route::get("/", "PortfolioController@index")->name(".index");
       Route::post("/create", "PortfolioController@create")->name(".create");
       Route::post("/delete", "PortfolioController@delete")->name(".delete");
    });
});
