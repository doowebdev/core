<?php


namespace  Doowebdev\Core\Database\GeneralSettings;

use \Illuminate\Database\Eloquent\Model;


class General_Setting extends Model{

    protected $table = 'general_settings';

    protected $fillable = array(
        'site_url',
        'site_title',
        'sentFromEmail',
        'footer_text',
        'popular_video_views'
    );



} 