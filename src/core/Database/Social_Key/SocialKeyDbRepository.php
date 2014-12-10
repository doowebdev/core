<?php


namespace  Doowebdev\Core\Database\Social_Key;


use  Doowebdev\Core\Database\DbBaseRepository;

class SocialKeyDbRepository extends DbBaseRepository{

    protected $model;

    public function __construct()
    {
        $this->model = new Social_Key();
    }

} 