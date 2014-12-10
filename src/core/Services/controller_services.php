<?php



$app['loginAdmin.controller'] = $app->share(

/**
 * @return \Doowebdev\Core\Admin\LoginController
 */
    function() use ($app) {

        return new Doowebdev\Core\Admin\LoginController( $app );
});


$app['dashboard.controller'] = $app->share(

/**
 * @return \Doowebdev\Core\Admin\DashboardController
 */
    function() use ($app) {

    return new Doowebdev\Core\Admin\DashboardController( $app );
});


$app['generalSettings.controller'] = $app->share(


function() use ($app) {

    return new Doowebdev\Core\Admin\GeneralSettingsController( $app );
});


$app['ads.controller'] = $app->share(


function() use ($app) {

    return new Doowebdev\Core\Admin\AdsController( $app );
});


