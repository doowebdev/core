<?php

namespace Doowebdev\Core\Database;


use Doowebdev\Core\Cache\DooCache;

abstract class DbBaseRepository implements DbBaseRepositoryInterface{

    use DooCache;

    public function getAll()
    {
        $getAll = $this->model
            ->orderBy('id', 'asc')
            ->get();
        return $this->cache( 'getAll', $getAll );
    }

    public function getAllAdmin()
    {
        $getAllAdmin = $this->model
            ->orderBy('id', 'asc')
            ->get();
        return $this->cache( 'getAllAdmin', $getAllAdmin );
    }

    public function getAllFirst()
    {
        $getAllFirst = $this->model->all()->first();
        return $this->cache( 'getAllFirst', $getAllFirst );
    }

    public function toArray()
    {
        $toArray = $this->model->all()->toArray();
        return $this->cache( 'toArray', $toArray );
    }

    public function toArrayWhere( $field, $value )
    {
        $toArrayW = $this->model->where( $field, $value )->get()->toArray();
        return $this->cache( 'toArrayW', $toArrayW );
    }

    public function toArrayWhereWhere( $field, $value, $field2, $value2 )
    {
        $toArrayWW = $this->model->where( $field, $value )->where( $field2, $value2 )->get()->toArray();
        return $this->cache( 'toArrayWW', $toArrayWW );
    }

    public function first()
    {
        $first = $this->model->first();
        return $this->cache( 'first', $first );
    }

    public function find($id)
    {
        // TODO: Implement find() method.
        return 'find by id - base repo';
    }

    public function takeWhere( $field, $value, $take )
    {
        $takeWhere = $this->model->where( $field, '=', $value )->take( $take )->orderBy('created_at','desc')->get();
        return $this->cache( 'takeWhere'.$field, $takeWhere );
    }

    public function take( $take )
    {
        $take1 = $this->model->orderBy('created_at','desc')->take( $take )->get();
        return $this->cache( 'take'.$take, $take1 );
    }

    public function findWhereId( $id )
    {
       $findWhereId = $this->model->where( 'status', 'active' )->orderBy('created_at','desc')->find( $id );
        return $this->cache( 'findWhereId'.$id, $findWhereId );
    }

    public function whereFirst( $field, $value )// used by next/prev etc..
    {
        $whereFirst = $this->model->where( $field, $value )->first();
        return $this->cache( 'whereFirst', $whereFirst );
    }

    public function count()
    {
        $count = $this->model->count();
        return $this->cache( 'count', $count );
    }

    public function countWhere( $field, $value )
    {
        $countWhere = $this->model->where( $field, $value )->count();
        return $this->cache( 'countWhere', $countWhere );
    }

    public function countWhereWhere( $field, $value, $field2, $value2 )
    {
        //Video::where( 'category', '=', $clean_category )->where('status', '=', 'active')->count();
        $countWhereWhere = $this->model->where( $field, $value )->where( $field2, $value2 )->count();
        return $this->cache( 'countWhereWhere', $countWhereWhere );
    }

    public function whereWhereFirst( $field, $value, $field2, $value2 )
    {
        //Video::where( 'category', '=', $clean_category )->where('status', '=', 'active')->count();
        $whereWhereFirst = $this->model->where( $field, $value )->where( $field2, $value2 )->first();
        return $this->cache( 'whereWhereFirst', $whereWhereFirst );
    }

    public function where( $field, $value )
    {
        $where = $this->model->where( $field, '=', $value )->orderBy('created_at', 'asc')->get();
        return $this->cache( 'where', $where );
    }

    public function whereOperator( $field, $operator, $value )
    {
        $whereOperator = $this->model->where( $field, $operator, $value )->orderBy('created_at', 'asc')->get();
        return $this->cache( 'whereOperator', $whereOperator );
    }

    public function whereDesc( $field, $value )
    {
        $whereDesc = $this->model->where( $field, '=', $value )->orderBy('created_at', 'desc')->get();
        return $this->cache( 'where'.$value, $whereDesc );
    }

    public function rssDesc()
    {
        return $this->model->orderBy('created_at', 'desc')->get();
        //return $this->cache( 'rssDesc', $rssDesc );
    }

    public function sitemapItem()
    {
        return $this->model->orderBy('created_at', 'desc')->get();
        //return $this->cache( 'rssDesc', $rssDesc );
    }

    public function whereWhere( $field, $value, $field2, $value2 )
    {
        $where = $this->model->where( $field, '=', $value )->where( $field2, '=', $value2 )->orderBy('created_at', 'asc')->get();
        return $this->cache( 'where', $where );
    }

    public function create(array $array)
    {
        return $this->model->create($array);
    }
    public function truncate()
    {
        $this->model->truncate();
    }

    public function update( $field, $value,array $data )
    {
        return $this->model->where($field,'=', $value)->update( $data );
    }

    public function createOrUpdateById($check, $flash_msg_name, array $createArray)
    {
        if( ! count( $check ) )
        {
            //insert into database
            \MsgHelper::output_message($flash_msg_name.' created.');
            return $this->model->create($createArray);
        }
        else
        {
            $this->model->truncate();
            \MsgHelper::output_message($flash_msg_name.' updated.');
            return $this->model->create($createArray);
        }
    }

    public function paginate( $offset, $take )
    {
        $paginate = $this->model->skip( $offset )->take( $take )->orderBy('created_at', 'desc')->get();
        return $this->cache( 'paginate', $paginate );
    }

    public function paginateWhere( $field, $value, $offset, $take )
    {
        $pw = $this->model->where($field, $value)->skip( $offset )->take( $take )->orderBy('created_at', 'desc')->get();
        return $this->cache( 'pw', $pw );
    }

    public function paginateWhereWhere( $field, $value, $field2, $value2, $offset, $take )
    {
        $pww = $this->model->where( $field, '=', $value )->where($field2, '=', $value2)->skip( $offset )->take( $take )->orderBy('created_at', 'desc')->get();
        return $this->cache( 'pww', $pww );
    }

    public function previous( $strtotime )
    {
        $next = $this->model->where( 'status','active' )->where('created_at', '>', date("Y-m-d H:i:s", strtotime( $strtotime ) ) )->first();
        return $this->cache( 'next', $next );
    }

    public function next( $strtotime )
    {
        $previous = $this->model->where( 'status','active' )->where('created_at', '<', date("Y-m-d H:i:s", strtotime( $strtotime ) ) )->orderBy('created_at', 'desc')->first();
        return $this->cache( 'previous', $previous );
    }

    public function nextWhere($field, $field,  $strtotime )
    {
        $next = $this->model->where($field, $field)->where( 'status','active' )->where('created_at', '>', date("Y-m-d H:i:s", strtotime( $strtotime ) ) )->first();
        return $this->cache( 'next', $next );
    }

    public function previousWhere( $field, $field, $strtotime )
    {
        $previous = $this->model->where($field, $field)->where( 'status','active' )->where('created_at', '<', date("Y-m-d H:i:s", strtotime( $strtotime ) ) )->orderBy('created_at', 'desc')->first();
        return $this->cache( 'previous', $previous );
    }

    public function delete( $id, $redirect_to, $msg )
    {
        $check_id = $this->model->where( 'id', '=', $id )->get();

        if( $check_id )
        {
            $this->model->where( 'id', '=', $id )->delete();

            \App::flash('deleted', $msg );
           \Response::redirect( $redirect_to );
        }
    }

    public function deleteWhere( $field, $value, $msg )
    {
        $check_id = $this->model->where( $field, '=', $value )->get();

        if( $check_id )
        {
            $this->model->where( $field, '=', $value)->delete();

            \App::flash('deleted-where', $msg );
        }
    }


    public function with( $with, $field, $value )
    {

        $withAll = $this->model->with( $with )->where( $field, $value )->first();
        return $this->cache( 'withAll'.$with, $withAll );
    }

    public function withWhereWhere( $with, $field, $value, $field2, $value2 )
    {

        $withAll = $this->model->with( $with )->where( $field, $value )->where( $field2, $value2 )->first();
        return $this->cache( 'withAll'.$with, $withAll );
    }

    public function withFirst( $with, $field, $value )
    {

        $withAll = $this->model->with( $with )->where( $field, $value )->first();
        return $this->cache( 'withAll'.$with, $withAll );
    }






}
