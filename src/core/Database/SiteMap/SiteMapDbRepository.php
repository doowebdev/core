<?php


namespace  Doowebdev\Core\Database\SiteMap;


use  Doowebdev\Core\Database\DbBaseRepository;

class SiteMapDbRepository extends DbBaseRepository{

    protected $model;

    public function __construct()
    {
        $this->model = New Site_Map();
    }

} 