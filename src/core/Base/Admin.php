<?php

namespace Doowebdev\Core\Base;



use \Silex\Application;

abstract class Admin extends Controller{

    protected $settingsForm;


    public function __construct(Application $app)
    {
        parent::__construct($app);
        $this->admin_authenticate();
        $this->data['settings'] = $this->app['general_setting_db']->whereFirst('id',1 );//sticky
    }

    public function authenticate()
    {
        if ( $this->app['auth']->check() )
        {
            $this->admin_authenticate();
        }

        return $this->app->redirect( $this->app['url_generator']->generate('login') );

    }

    public function admin_authenticate()
    {
        $get_user = $this->app['auth']->getUser();

        $user     = $this->app['auth']->findUserByID( $get_user->id );

        $manager  = $this->app['auth']->findGroupByName('Manager');

        $staff    = $this->app['auth']->findGroupByName('Staff');

        if ( ! $user->inGroup( $manager ) )//check if superadmin
        {
            if ( ! $user->inGroup( $staff ) )//check if staff
            {
               return $this->app->redirect( $this->app['url_generator']->generate('login') );
            }
        }

    }

}