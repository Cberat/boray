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



}
