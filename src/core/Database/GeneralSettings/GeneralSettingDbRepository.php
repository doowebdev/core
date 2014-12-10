<?php


namespace  Doowebdev\Core\Database\GeneralSettings;


use  Doowebdev\Core\Database\DbBaseRepository;


class GeneralSettingDbRepository extends DbBaseRepository{

    protected $model;

    public function __construct()
    {
        $this->model = New General_Setting();
    }

} 