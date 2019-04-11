<?php

namespace App\Http\Controllers\Backend\Emlak;

use Illuminate\Support\Facades\Storage;
use App\Models\Agent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class AgentController extends Controller
{
    public function index()
    {
        $agents = Agent::all();

        return view("backend.urun.agents", compact("agents"));
    }

    public function createShow()
    {
        return view("backend.urun.news.newAgents");
    }

    public function updateShow($slug)
    {
        $agent = Agent::where("slug", $slug)->first();

        return view("backend.urun.news.newAgents", compact("agent"));
    }

    public function create(Request $request)
    {

        $file = null;

        if ($request->file("agentImage") != null){
            $file = Storage::disk("public")->putFile("/uruns",$request->file("agentImage"));
        }

        if ($file == false){
            return ["status" => "error", "title" => "Hatalı", "message" => "agent resmi kaydedilemedi"];
        }

        $slug = str_slug($request->title.Carbon::now(),"-");

        $agent = new Agent();

        $agent->title = $request->title;
        $agent->email = $request->email;
        $agent->description = $request->description;
        $agent->slug = $slug;
        $agent->agent_image = $file;


        if ($agent->save()){

            return ["status" => "success", "title" => "başarılı", "message" => "agent kaydedildi."];
        }

        return ["status" => "error", "title" => "Hatalı", "message" => "agent kaydedilemedi"];
    }

    public function update($slug, Request $request)
    {
        $newSlug = str_slug($request->title.Carbon::now(),"-");

        $oldAgent = Agent::where("slug", $slug)->first();
        $file = $oldAgent->agent_image;

        if ($request->file("agentImage") != null){
            Storage::disk("public")->delete($oldAgent->agent_image);
            $file = Storage::disk("public")->putFile("/uruns",$request->file("agentImage"));
        }

        $agent = Agent::where("slug", $slug)->update([
            "title" => $request->title,
            "email" => $request->email,
            "description" => $request->description,
            "slug" => $newSlug,
            "agent_image" => $file,
        ]);

        if ($agent){

            return ["status" => "success", "title" => "başarılı", "message" => "agent güncellendi."];
        }

        return ["status" => "error", "title" => "Hatalı", "message" => "agent güncellenemedi"];
    }

    public function delete(Request $request)
    {
        $agent = Agent::where("id", $request->id)->first();
        Storage::disk("public")->delete($agent->agent_image);
        $agent->delete();

        if ($agent){

            return ["status" => "success", "title" => "başarılı", "message" => "agent silindi."];
        }

        return ["status" => "error", "title" => "Hatalı", "message" => "agent silinemedi"];
    }

}
