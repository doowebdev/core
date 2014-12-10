<?php


namespace  Doowebdev\Core\Database\Site_Metas;


use  Doowebdev\Core\Database\DbBaseRepository;

class SiteMetaDbRepository extends  DbBaseRepository{

    protected $model;

    public function __construct()
    {
        $this->model = New Site_Meta();
    }

} 