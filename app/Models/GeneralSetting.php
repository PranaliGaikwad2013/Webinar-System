<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GeneralSetting extends Model
{
    protected $table = 'general_settings';
    protected $fillable = ['website_name','email','phone','description','favicon_logo','footer_logo','header_logo','location_url','address','gst_number'];
}
