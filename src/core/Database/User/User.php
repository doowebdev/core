<?php


namespace  Doowebdev\Core\Database\User;

use \Illuminate\Database\Eloquent\Model;


class User extends Model
{


    protected $fillable = array(
        'id',
        'email',
        'username',
        'group',
        'first_name',
        'last_name',
        'password'
    );

    public function profile()
    {
        return $this->hasOne(' Doowebdev\Core\Database\Profiles\Profile');
    }

    public function videos()
    {
        return $this->hasMany(' Doowebdev\Core\Database\Videos\Video');
    }

    public function favorites()
    {
        return $this->belongsToMany(' Doowebdev\Core\Database\Videos\Video', 'favorites')->withTimestamps();
    }




} 