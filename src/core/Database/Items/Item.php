<?php


namespace Doowebdev\Core\Database\Items;

use \Illuminate\Database\Eloquent\Model;

class Item extends Model
{

    protected $table = 'items';

    protected $fillable = array(
        'item',
        'url',
        'thumbnail',
        'sales'
    );


} 