<?php

namespace Doowebdev\Core\Database\Authentication;


use Doowebdev\Core\Database\DbBaseRepository;

class AuthenticationDbRepository extends DbBaseRepository{

    protected $model;

    public function __construct()
    {
        $this->model = New Authentication();
    }



} 