<?php


namespace Doowebdev\Core\Database\Advertisements;

use \Illuminate\Database\Eloquent\Model;

class Advertisement extends Model
{
    protected $table = 'advertisements';

    protected $fillable = array(
        'id',
        'top_ad_logo',
        'top_ad',
        'side_ad',
        'bottom_ad',
        'side_box_ad'
    );







}