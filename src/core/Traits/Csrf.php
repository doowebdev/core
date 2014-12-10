<?php
namespace Doowebdev\Core\Traits;


use DooCSRF\Token;

trait Csrf {

    protected $_input;

    public function setCsrfInput( $input_request )
    {
        $this->_input = $input_request;
    }


    public function checkCsrf( $token )
    {
        print_r($token);
     //   return $token;
        return Token::check( $token );
    }

}