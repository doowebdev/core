<?php


namespace Doowebdev\Core\Database\User;


use Doowebdev\Core\Database\DbBaseRepository;

class UserDbRepository extends DbBaseRepository{

    protected $model;

    public function __construct()
    {
        $this->model = New User();
    }

    public function userFavorites( $id )
    {
       return User::findOrFail( $id )->favorites;
    }






} 