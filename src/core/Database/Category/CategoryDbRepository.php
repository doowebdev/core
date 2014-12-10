<?php


namespace  Doowebdev\Core\Database\Category;


use  Doowebdev\Core\Database\DbBaseRepository;

class CategoryDbRepository extends DbBaseRepository{

    protected $model;

    public function __construct()
    {
        $this->model = new Category();
    }

    public function takeCategories( $take )
    {
        $takeCategories = $this->model->orderBy('category','asc')->take( $take )->get();
        return $this->cache( 'takeCategories', $takeCategories );
    }

    public function getCategories()
    {
        $getCategories = $this->model->orderBy('category','asc')->get();
        return $this->cache( 'getCategories', $getCategories );
    }
} 