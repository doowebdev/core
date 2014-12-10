<?php
/**
 * Created by PhpStorm.
 * User: freddie
 * Date: 08/12/2014
 * Time: 23:21
 */

namespace Doowebdev\Core\Admin;

use Symfony\Component\HttpFoundation\JsonResponse;
use Doowebdev\Core\Base\Admin;

/**
 * Class DashboardController
 * @package Doowebdev\Core\Admin
 */
class DashboardController extends Admin{

    /**
     * @return mixed
     */
    public function index()
    {
        $this->general_user_stats();
        return   $this->app['twig']->render(
            'admin/dash/index.twig',
            $this->data
        );
    }

    /**
     * @return JsonResponse
     */
    public function user_stats()//callback/send to google charts javascript
    {
       return  new JsonResponse($this->app['user_stats_db']->google_chart_users());
    }

    /**
     * Create general_user_stats
     */
    public function general_user_stats()
    {

        $total_users          = $this->app['users_db']->count();
        $total_active_users   = $this->app['users_db']->countWhere('activated',1);
        $total_inactive_users = $this->app['users_db']->countWhere('activated',0);
        $group_user           = $this->app['users_db']->countWhere('group','User');
        $group_staff          = $this->app['users_db']->countWhere('group','Staff');
        $group_manager        = $this->app['users_db']->countWhere('group','Manager');

        $user_stats = array(
            'Active'      => $total_active_users,
            'Inactive'    => $total_inactive_users,
            'Users'       => $group_user,
            'Staff'       => $group_staff,
            'Manager'     => $group_manager,
            'Total'       => $total_users
        );

        $this->app['user_stats_db']->truncate();

        foreach($user_stats as $name => $count )
        {
            $user = $this->app['user_stats_db']->create(array(
                'name' => $name,
                'count' => $count
            ));
        }

    }

}