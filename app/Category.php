<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //====using categories table====
    //protected $fillables =['category_name','category_id'];

    protected $table= 'categories';




    // public function user()
    // {
    //     return $this->belongsTo('\App\User');
    // }

}
