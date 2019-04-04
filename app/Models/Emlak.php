<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Emlak extends Model
{
    public function category()
    {
        return $this->hasOne(EmlakCategory::class, "id", "category_id");

    }



}
