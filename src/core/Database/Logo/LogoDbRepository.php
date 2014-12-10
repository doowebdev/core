<?php


namespace  Doowebdev\Core\Database\Logo;


use  Doowebdev\Core\Database\DbBaseRepository;

class LogoDbRepository extends DbBaseRepository{

    protected $model;

    public function __construct()
    {
        $this->model = New Logo();
    }
} 