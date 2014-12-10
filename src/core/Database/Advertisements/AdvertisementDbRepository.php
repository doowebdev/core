<?php


namespace Doowebdev\Core\Database\Advertisements;


use Doowebdev\Core\Database\DbBaseRepository;

class AdvertisementDbRepository  extends DbBaseRepository{

    protected $model;

    public function __construct()
    {
        $this->model = New Advertisement();
    }

    //public function createOrUpdate($if, $flash_msg_name, array $createArray, array $updateArray, $updateId)

} 