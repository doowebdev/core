<?php
/**
 * Created by PhpStorm.
 * User: freddie
 * Date: 08/12/2014
 * Time: 21:59
 */

namespace Doowebdev\Core\Traits;


use Silex\Application;

trait FlashMessage {

    protected $flash;

    public function setFlashMessage($app)
    {
        $this->flash = $app;
    }

    public function getFlashMessage( $name )
    {
       return $this->flash['doo_session']->getFlashMessage( $name,[] );
    }

}