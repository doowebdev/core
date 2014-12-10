<?php


namespace  Doowebdev\Core\Database\Social_Username;


use  Doowebdev\Core\Database\DbBaseRepository;

class SocialUsernameDbRepository extends DbBaseRepository{

    protected $model;

    public function __construct()
    {
        $this->model = new Social_Username();
    }
} 