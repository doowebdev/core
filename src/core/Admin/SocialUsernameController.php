<?php namespace Doowebdev\Core\Admin;



use Doowebdev\Core\Base\Admin;

class SocialUsernameController extends Admin{



    public function show()
    {
        return \View::display('admin/setting/social.twig', $this->data );
    }

    public function update()
    {
        //chechk if form $_POST 'token' is true - for csrf prevention
        if( doo_csrf() )
        {
            $facebook_user = \Input::post('facebook_user');
            $twitter_user  = \Input::post('twitter_user');
            //$gplus_user    = Input::post('gplus_user');

            $check = $this->app->social_username->where('id', 1);
            $this->app->social_username->createOrUpdateById( $check, 'Side Media Usernames ', [
                'id'            => 1,
                'facebook_user' => $facebook_user,
                'twitter_user'  => $twitter_user,
              //  'gplus_user'    => $gplus_user
            ]);

            \App::flash('socialUsernames', 'Social Media Usernames updated.');
            \Response::redirect( $this->site_url.'/admin-area/social-username');
        }
    }



} 