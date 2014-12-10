<?php

namespace Doowebdev\Core\Base;

use DooCSRF\Token;
use Doowebdev\Core\Traits\Csrf;
use Doowebdev\Core\Traits\FlashMessage;
use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

abstract class Controller {

    use FlashMessage;
    use Csrf;

    protected $app;
    protected $data = [];
    protected $input;

    public function __construct(Application $app)
    {
        $this->app = $app;
        $this->setFlashMessage($app);
        $this->input              = Request::createFromGlobals();
        $this->data['token']        = Token::generate();
        $this->data['current_user'] = $this->currentUser();
       // $this->app['csrf']->setInput($this->input);
        $this->setCsrfInput($this->input);
    }


    public function currentUser()
    {
        $this->app['authUser'] = $this->app['auth']->check();

        $user = $this->app['auth']->getUser();//get current user

        if ( $this->app['auth']->check() )//check if user is logged in
        {
            $current_user = $this->app['auth']->findUserById( $user->id );
        }
        else
        {
            $current_user = null;
        }

        return $current_user;
    }

}