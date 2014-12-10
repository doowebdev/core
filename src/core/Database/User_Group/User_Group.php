<?php


namespace  Doowebdev\Core\Database\User_Group;

use \Illuminate\Database\Eloquent\Model;

class User_Group extends Model
{
    protected $table = 'users_groups';

    protected $fillable = array(
        'id',
        'user_id',
        'group_id'
    );
} 