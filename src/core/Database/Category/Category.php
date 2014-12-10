<?php

namespace  Doowebdev\Core\Database\Category;

use \Illuminate\Database\Eloquent\Model;


class Category extends Model
{

    protected $table = 'categories';


    protected $fillable = [
        'id',
        'category',
        'seoCategory',
        'merchant'
    ];

    public function items()
    {
        return $this->hasMany('Doowebdev\Core\Database\Items\Item');
    }
} 