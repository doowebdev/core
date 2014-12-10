<?php


namespace  Doowebdev\Core\Database\SiteMap;

use \Illuminate\Database\Eloquent\Model;


class Site_Map extends Model
{
    protected $table = 'sitemap_settings';

    protected $fillable = array(
        'id',
        'priority',
        'freqency'
    );
} 