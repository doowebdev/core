<?php


namespace  Doowebdev\Core\Database\Group;


use  Doowebdev\Core\Database\DbBaseRepository;

class GroupDbRepository extends DbBaseRepository{

    protected $model;

    public function __construct()
    {
        $this->model = New Group();
    }
} 