<?php


namespace Doowebdev\Core\Authentication;


interface AuthRepositoryInterface {

    public function login();
    public function logout();
    public function check();
    public function guest();
    public function throttle();
    public function createUser(array $array );
    public function getUser();//gets current logged in user
    public function findAllUsers();
    public function findGroupByName( $name );
    public function findUserByCredentials( $array );
    public function findUserById( $user_id );
    public function findUserByLogin( $email );
    public function authenticate( $credentials );
    public function findGroupById($user_group);



} 