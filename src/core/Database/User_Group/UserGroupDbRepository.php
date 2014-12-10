<?php


namespace  Doowebdev\Core\Database\User_Group;


use  Doowebdev\Core\Database\DbBaseRepository;

class UserGroupDbRepository extends DbBaseRepository{

    protected $model;

    public function __construct()
    {
        $this->model = New User_Group();
    }
} 