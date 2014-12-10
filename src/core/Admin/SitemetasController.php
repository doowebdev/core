<?php namespace Doowebdev\Core\Admin;




use Doowebdev\Core\Base\Admin;

class SitemetasController extends Admin{


   /* public function __construct()
    {
        parent::__construct();

        $this->authenticate();
        $this->data['site_meta_details'] = $this->app->site_meta->whereFirst('id',1);

    }*/

    public function show()//was site details
    {
        return \View::display('admin/setting/site-details.twig', $this->data );
    }

    /**
     * Get site details
     * @param  $data = $_POST
     * @return string and int
     */
    public function update()
    {
         if( doo_csrf() )
        {
            try{
                    $id          = \Input::post('id');
                    $site_title  = \Input::post('site_title');
                    $description = \Input::post('description');
                    $keywords	 = \Input::post('keywords');

                    $this->app->siteMetaForm->validator($_POST);

                    $check = $this->app->site_meta->where('id', $id);
                    $this->app->site_meta->createOrUpdateById( $check, 'Site Meta Details ', [
                        'id'          => $id,
                        'title'       => $site_title,
                        'description' => $description,
                        'keywords'	  => $keywords
                        ]);

                    \App::flash('site-metas', 'Site Metas updated!');
                    \Response::redirect( $this->site_url.'/admin-area/site-details');

            }catch (\Doowebdev\Validation\DooFormValidationException $e)
            {
                $this->data['site_title_errors'] =  $e->getErrorFor()->first('site_title');
                $this->data['description_errors'] =  $e->getErrorFor()->first('description');
                $this->data['keywords_errors'] =  $e->getErrorFor()->first('keywords');

                \View::display('admin/setting/site-details.twig', $this->data );
            }

        }


    }


} 