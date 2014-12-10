<?php


namespace  Doowebdev\Core\Database\Site_Metas;

use \Illuminate\Database\Eloquent\Model;


class Site_Meta extends Model
{

    protected $table = 'site_metas';

    protected $fillable = array(
        'id',
        'title',
        'description',
        'keywords'
    );



} 