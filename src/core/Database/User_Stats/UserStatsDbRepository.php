<?php


namespace  Doowebdev\Core\Database\User_Stats;


use  Doowebdev\Core\Database\DbBaseRepository;

class UserStatsDbRepository extends DbBaseRepository{

    protected $model;

    public function __construct()
    {
        $this->model = New User_Stat();
    }

    public function google_chart_users()
    {
       return $this->model->get_formatted_users();
    }

} 