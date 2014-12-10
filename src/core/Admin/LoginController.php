<?php
/**
 * Created by PhpStorm.
 * User: freddie
 * Date: 07/12/2014
 * Time: 01:25
 */

namespace Doowebdev\Core\Admin;


use Doowebdev\Core\Base\Front;
use Doowebdev\Core\Traits\FlashMessage;

class LoginController extends Front{

    use FlashMessage;

    public function index()
    {
        $this->data['msg'] = $this->getFlashMessage('loginError');

        return   $this->app['twig']->render(
            'admin/login/login.twig',
            $this->data
        );
    }

    public function postLogin()
    {
        $throttleProvider = $this->app['auth']->throttle();
        $throttleProvider->enable();

        $throttle = $throttleProvider->findByUserLogin($_POST['email']);
        $throttle->setAttemptLimit(3);
        $throttle->setSuspensionTime(10);

        $credentials = [
           'email'    => $_POST['email'],
           'password' => $_POST['password'],
        ];

        $this->app['auth']->authenticate( $credentials );

        return $this->app->redirect( $this->app['url_generator']->generate('dashboard') );

    }

    public function logout()
    {
        // log user out
        //    Session::delete('username');
        $this->app['auth']->logout();
        return $this->app->redirect( $this->app['url_generator']->generate('login') );

    }



}