<?php


namespace Doowebdev\Core\Authentication\Sentry2;


use Doowebdev\Core\Authentication\AuthRepositoryInterface;



class SentryRepository implements AuthRepositoryInterface {


    public function login()
    {
        return Sentry::login();
    }

    public function check()
    {
       // return'check';
        return Sentry::check();
    }

    public function throttle()
    {
        return Sentry::getThrottleProvider();
    }

    public function guest()
    {
        return Sentry::guest();
    }

    public function createUser(array $array )
    {
        return Sentry::createUser( $array );
    }

    public function getUser()
    {
        return Sentry::getUser();
    }

    public function findAllUsers()
    {
        return Sentry::findAllUsers();
    }

    public function findGroupByName($name)
    {
        return Sentry::findGroupByName( $name );
    }

    public function findGroupById($user_group)
    {
        return Sentry::findGroupById($user_group);
    }

    public function findUserByCredentials( $array )
    {
        return Sentry::findUserByCredentials( $array );
    }

    public function findUserById( $user_id )
    {
        return Sentry::findUserById( $user_id );
    }

    public function findUserByLogin( $email )
    {
        return Sentry::findUserByLogin( $email );
    }

    public function authenticate( $credentials )
    {
        return Sentry::authenticate( $credentials, false );
    }

    public function logout()
    {
        return Sentry::logout();
    }


}

