<?php


namespace  Doowebdev\Core\Database\Group;

use \Illuminate\Database\Eloquent\Model;


class Group extends Model
{
    protected $table = 'groups';

    protected $fillable = array(
        'id',
        'name'
    );

} 