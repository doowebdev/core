<?php namespace Doowebdev\Core\Admin;


use Doowebdev\Core\Base\Admin;
use Doowebdev\DooUploadFile;

class UploadLogoController extends  Admin{

    protected $logoUpload ;


    public function show()
    {
        return \View::display('admin/setting/upload_logo.twig', $this->data );
    }

    public  function upload()
    {
        $this->app->logoUpload->setLogoUpload( $this->app );
        $this->app->logoUpload->uploadLogo();

        \Response::redirect( $this->site_url.'/admin-area/upload-logo');
    }



} 