<?php


namespace Doowebdev\Core\Validator;

use Illuminate\Database\Capsule\Manager as Capsule;

class DatabaseForm {

    protected $table;
    protected $model;

    public function table( $table )
    {
        $this->table = $table;
        return $this;
    }

    public function exists( $data )
    {
        $field = array_keys( $data )[0];
        return $this->where( $field, $data[$field])->count() ? true : false;
    }

    public function where( $field, $value )
    {
         return Capsule::table( $this->table )->where($field, $value);
    }



} 