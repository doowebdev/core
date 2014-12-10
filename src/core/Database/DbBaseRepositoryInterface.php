<?php
/**
 * Created by PhpStorm.
 * User: freddie
 * Date: 20/08/14
 * Time: 06:53
 */

namespace Doowebdev\Core\Database;


interface DbBaseRepositoryInterface {

    public function getAll();
    public function getAllFirst();
    public function take( $take );
    public function takeWhere( $field, $value, $take );
    public function toArray();
    public function toArrayWhere( $field, $value );
    public function toArrayWhereWhere( $field, $value, $field2, $value2 );
    public function find( $id );
    public function whereFirst( $field, $value );
    public function where( $field, $value );
    public function whereOperator( $field, $operator, $value );
    public function whereDesc( $field, $value );
    public function whereWhere( $field, $value, $field2, $value2 );
    public function with( $with, $field, $value );
    public function withFirst( $with, $field, $value );
    public function withWhereWhere( $with, $field, $value, $field2, $value2 );
    public function count();
    public function countWhere( $field, $value );
    public function countWhereWhere( $field, $value, $field2, $value2 );
    public function whereWhereFirst( $field, $value, $field2, $value2 );
    public function first();
    public function create( array $array );
    public function truncate();
    public function update( $field, $value,array $data );
    public function createOrUpdateById($if_id, $flash_msg_name, array $createArray);
    public function delete( $id, $redirect_to, $msg );
    public function paginate( $offset, $take );
    public function paginateWhere( $field, $value, $offset, $take );
    public function paginateWhereWhere( $field, $value, $field2, $value2, $offset, $take );
    public function findWhereId( $id );
    public function next( $strtotime );
    public function previous( $strtotime );
    public function previousWhere( $field, $field, $strtotime );
    public function nextWhere( $field, $field,  $strtotime );

} 