<?php

/***************************************************************************
 *
 *                          ADMIN ROUTES
 */

$admin_area = 'admin-area';

# Admin Login and Logout
$app->get('/'.$admin_area.'/login', "loginAdmin.controller:index")->bind('login');
$app->get('/'.$admin_area.'/logout', "loginAdmin.controller:logout");
$app->post('/'.$admin_area.'/login', "loginAdmin.controller:postLogin");

# Dashboard
$app->get('/'.$admin_area.'/dashboard', "dashboard.controller:index")->bind('dashboard');

# Dashboard -  User Stats api
$app->get('/api/user_stats', "dashboard.controller:user_stats");

# Setting
$app->get('/'.$admin_area.'/settings', "generalSettings.controller:show");
$app->post('/'.$admin_area.'/put-settings', "generalSettings.controller:update");

#Advertisement spaces
$app->get('/'.$admin_area.'/ad-boxes', "ads.controller:show");
$app->post('/'.$admin_area.'/ad-boxes', "ads.controller:update");




