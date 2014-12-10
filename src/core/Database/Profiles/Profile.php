<?php


namespace  Doowebdev\Core\Database\Profiles;


use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{

    protected $fillable = array(
        'user_id',
        'location',
        'bio',
        'twitter_username',
        'facebook_username',
        'avatar'
    );

    public function user()
    {
        return $this->belongsTo('Doowebdev\Database\User\User');
    }


} 