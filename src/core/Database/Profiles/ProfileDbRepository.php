<?php


namespace  Doowebdev\Core\Database\Profiles;


use  Doowebdev\Core\Database\DbBaseRepository;

class ProfileDbRepository extends DbBaseRepository{

    protected $model;

    public function __construct()
    {
        $this->model = New Profile();
    }
} 