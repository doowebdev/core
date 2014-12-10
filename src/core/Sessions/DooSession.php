<?php
/**
 * Created by PhpStorm.
 * User: freddie
 * Date: 08/12/2014
 * Time: 19:35
 */

namespace Doowebdev\Core\Sessions;

use Symfony\Component\HttpFoundation\Session\Session;


class DooSession {

    protected $session;

    public function __construct()
    {
        $this->session = new Session();
       // $this->session->start();
    }

    public function set($name, $value)
    {
        $this->session->set( $name,$value );
    }

    public function get( $name )
    {
        return $this->session->get( $name );
    }

    public function setFlashMessage( $tag, array $message )
    {
        return $this->session->getFlashBag()->add( $tag, $message );
    }

    public function getFlashMessage( $tag, array $array)
    {
        return $this->session->getFlashBag()->get( $tag, $array );
    }










}