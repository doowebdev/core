<?php


namespace  Doowebdev\Core\Database\Social_Username;

use \Illuminate\Database\Eloquent\Model;

class Social_Username extends Model
{

    protected $table = 'social_media_username';

    protected $fillable = array(
        'id',
        'facebook_user',
        'twitter_user',
        'gplus_user'
    );

} 