<?php
/**
 * Created by PhpStorm.
 * User: freddie
 * Date: 07/12/2014
 * Time: 15:53
 */

namespace Doowebdev\Core\CSRF;

use DooCSRF\Token;

/**
 * Class Csrf
 * @package Doowebdev\Core\CSRF
 */
class Csrf {

    protected $_input;

    public function setInput( $input_request )
    {
        $this->_input = $input_request;
    }

    /**
     * @return bool
     */
    public function check()
    {
        return Token::check( $this->_input->request->get('token') );
    }

}