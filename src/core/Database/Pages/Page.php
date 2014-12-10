<?php


namespace  Doowebdev\Core\Database\Pages;

use \Illuminate\Database\Eloquent\Model;

class Page extends Model
{

    protected $fillable = array(
        'title',
        'content',
        'order',
        'slug'
    );


} 