<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Emlak extends Model
{
    public function category()
    {
        return $this->hasOne(EmlakCategory::class, "id", "category_id");

    }

   public function sehir()
   {

       return $this->hasOne(Sehir::class,"id","sehir_id");

   }
    public function agent()
    {

        return $this->hasOne(Agent::class,"id","agent_id");

    }
   /* public function div()
    {

        return $this->hasOne(MultiDiv::class,"id","div_id");

    }*/

}
