<?php

namespace Doowebdev\Core\Database\Authentication;

use \Illuminate\Database\Eloquent\Model;

class Authentication extends Model
{
    protected $table = 'authentication';

    protected $fillable = [
        'user_id',
        'provider',
        'provider_uid',
        'email',
        'display_name',
        'first_name',
        'last_name',
        'profile_url',
        'website_url'
    ];



} 