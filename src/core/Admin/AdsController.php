<?php namespace Doowebdev\Core\Admin;



use Doowebdev\Core\Base\Admin;

class AdsController extends Admin {



    public function show()
    {
        return \View::display('admin/setting/ads.twig', $this->data );
    }

    public function update()
    {
        if( doo_csrf() )
        {
            $top_ad_field = $this->app->advertisement->where('id', 1);
            $this->app->advertisement->createOrUpdateById( $top_ad_field, 'Top Ads', ['id'=> 1,
               'top_ad'      => \Input::post('top_ad'),
               'bottom_ad'   => \Input::post('bottom_ad'),
               'side_ad'     => \Input::post('side_ad'),
               //'side_box_ad' => Input::post('box_ad'),
               'top_ad_logo' => \Input::post('top_ad_logo')
            ]);

            \App::flash('ads-updated', 'Ad spaces have been updated!');
            \Response::redirect( $this->site_url.'/admin-area/ad-boxes');
        }
    }



} 