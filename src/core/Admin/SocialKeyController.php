<?php namespace Doowebdev\Core\Admin;



use Doowebdev\Core\Base\Admin;

class SocialKeyController extends Admin{


    public function show()
    {
        return \View::display('admin/setting/social_keys.twig', $this->data );
    }

    public function update()
    {
        //chechk if form $_POST 'token' is true - for csrf prevention
        if( doo_csrf() )
        {
            $facebook_app_id      = \Input::post('facebook_app_id');
            $facebook_secret_key  = \Input::post('facebook_secret_key');
            $twitter_app_id       = \Input::post('twitter_app_id');
            $twitter_secret_key   = \Input::post('twitter_secret_key');

            $check = $this->app->social_key->where('id', 1);
            $this->app->social_key->createOrUpdateById( $check, 'Social Media Key ', [
                'id'                  => 1,
                'facebook_public_key' => $facebook_app_id,
                'facebook_secret_key' => $facebook_secret_key,
                'twitter_public_key'  => $twitter_app_id,
                'twitter_secret_key'  => $twitter_secret_key
            ]);

            \App::flash('socialkeys', 'Social Media API Key updated.');
            \Response::redirect( $this->site_url.'/admin-area/social-keys');
        }


    }


} 