<?php
/*
|--------------------------------------------------------------------------
|            ADD DATABASE REPOSITORIES TO CONTAINER AS SERVICES
|--------------------------------------------------------------------------
|
*/



$app['users_db'] = $app->share(


/**
* @return Doowebdev\Core\Authentication\Sentry2\SentryRepository
*/
function() {

return new Doowebdev\Core\Database\User\UserDbRepository();
});


$app['user_stats_db'] = $app->share(


/**
* @return Doowebdev\Core\Authentication\Sentry2\SentryRepository
*/
function() {

return new Doowebdev\Core\Database\User_Stats\UserStatsDbRepository();
});



$app['users_group_db'] = $app->share(


/**
* @return Doowebdev\Core\Authentication\Sentry2\SentryRepository
*/
function() {

return new Doowebdev\Core\Database\User_Group\UserGroupDbRepository();
});


$app['general_setting_db'] = $app->share(


    function() {

        return new Doowebdev\Core\Database\GeneralSettings\GeneralSettingDbRepository();
    });

