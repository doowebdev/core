<?php

namespace Doowebdev\Core\Database\Items;


use Doowebdev\Core\Database\DbBaseRepository;

class ItemDbRepository extends DbBaseRepository{

    protected $model;

    public function __construct()
    {
        $this->model = New Item();
    }
} 