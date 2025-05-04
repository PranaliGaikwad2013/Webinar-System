<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Webinar extends Model
{
    protected $table = 'webinars';
    protected $fillable = ['category_id','webinar_title','speaker_name','webinar_start_date','webinar_start_time','webinar_end_date','webinar_end_time','about_speaker','webinar_type','webinar_mode','webinar_price','webinar_link','webinar_address','webinar_description','status','speaker_image',];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
