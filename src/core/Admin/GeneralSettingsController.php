<?php namespace Doowebdev\Core\Admin;


use DooCSRF\Token;
use Doowebdev\Core\Base\Admin;
use Doowebdev\Core\Traits\Csrf;
use Symfony\Component\HttpFoundation\Request;

class GeneralSettingsController extends  Admin{

    use Csrf;


    protected $settingsForm;


    public function show( )
    {
        return   $this->app['twig']->render(
            'admin/setting/settings.twig',
            $this->data
        );
    }

    public function update2()
    {
        $input = Request::createFromGlobals();
        return $input->request->get('token');
    }

    public function update()
    {
        echo 'no ';
        $input = Request::createFromGlobals();
      //  echo $input->request->get('token');
        if( $this->checkCsrf($input->request->get('token')) )
        {

            echo 'update';
            /*try{

                $this->app->settingsForm->validator($_POST);

                $this->app['general_setting_db']->update( 'id', \Input::post('id'), [
                    'site_url'            => \Input::post('site_url'),
                    'site_title'          => \Input::post('site_title'),
                    'sentFromEmail'          => \Input::post('sentFromEmail'),
                    'footer_text'         => \Input::post('footer_text'),
                    //'popular_video_views' => Input::post('popular_video_views'),
                ] );
                \App::flash('settings-msg', 'General settings updated!');
                \Response::redirect( $this->site_url.'/admin-area/settings');

            }catch (\Doowebdev\Validation\DooFormValidationException $e)
            {
                $this->data['site_title_errors'] =  $e->getErrorFor()->first('site_title');
                return \View::display('admin/setting/settings.twig', $this->data );
           }*/
       }
        return '';
    }


}