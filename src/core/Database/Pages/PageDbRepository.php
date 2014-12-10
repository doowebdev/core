<?php

namespace  Doowebdev\Core\Database\Pages;


use  Doowebdev\Core\Database\DbBaseRepository;

class PageDbRepository extends DbBaseRepository{

    protected $model;

    public function __construct()
    {
        $this->model = New Page();
    }
} 