<?php

namespace App\Http\Middleware;
use App\Models\Menu;
use App\Models\Setting;
use Illuminate\Support\Facades\View;

use Closure;

class Share
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $data = [];

        $settings = Setting::all();
        $settingArr = [];

        foreach ($settings as  $setting){

            $settingArr[$setting->key] = $setting->value;
        }

      

        $data["settings"] = $settingArr;
      
        View::share($data);

        return $next($request);
    
    }
}