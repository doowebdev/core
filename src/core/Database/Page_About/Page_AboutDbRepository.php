<?php


namespace  Doowebdev\Core\Database\Page_about;


use  Doowebdev\Core\Database\DbBaseRepository;

class Page_AboutDbRepository extends DbBaseRepository{

    protected $model;

    public function __construct()
    {
        $this->model = New Page_About();
    }
} 