<?php


namespace  Doowebdev\Core\Database\Page_About;

use \Illuminate\Database\Eloquent\Model;

class Page_About extends Model
{
    protected $table = 'page_about';

    protected $fillable = array(
        'name',
        'content',
        'slug',
    );


} 