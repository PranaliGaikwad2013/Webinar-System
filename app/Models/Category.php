<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
   protected $table = 'categories';
   protected $fillable = ['category_name','category_image','status'];

   public function webinars()
    {
        return $this->hasMany(Webinar::class);
    }
}
