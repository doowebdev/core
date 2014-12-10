<?php namespace Doowebdev\Core\Admin;


use Doowebdev\Core\Base\Admin;

class RecapchaController extends Admin{



    public function show()
    {
        return \View::display('admin/setting/recaptcha.twig', $this->data );
    }

    public function update()
    {
        //chechk if form $_POST 'token' is true - for csrf prevention
        if( doo_csrf() )
        {
            $public_key  = \Input::post('public_key');
            $private_key = \Input::post('private_key');

            $check = $this->app->recaptcha->where('id', 1);
            $this->app->recaptcha->createOrUpdateById( $check, 'reCAPTCHA keys ', [
                'id'          => 1,
                'public_key'  => $public_key,
                'private_key' => $private_key
            ]);

            \App::flash('recaptcha', 'rCAPTCHA Keys updated.');
            \Response::redirect( $this->site_url.'/admin-area/recaptcha');
        }

    }



} 