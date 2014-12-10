<?php namespace Doowebdev\Core\Admin;


use Doowebdev\Core\Base\Admin;
use SitemapPHP\Sitemap;


class SiteMapController extends Admin{



    public function show()
    {
        //sticky
        $video_sitemap_setting  = $this->app->site_map->whereFirst('id',1);
        $this->data['item_priority'] = $video_sitemap_setting->priority;
        $this->data['item_frequency'] = $video_sitemap_setting->freqency;
        //sticky
        $page_sitemap_setting  = $this->app->site_map->whereFirst('id',2);
        $this->data['page_priority'] = $page_sitemap_setting->priority;
        $this->data['page_frequency'] = $page_sitemap_setting->freqency;

        return \View::display('admin/setting/sitemap.twig', $this->data );
    }

    /**
     * Generate Site
     */
    public function generate()
    {
        if( doo_csrf() )
        {
            $sitemap = new Sitemap( $this->site_url );
            $sitemap->setPath('app/storage/sitemap/');

            if( \Config::get('show_all_items_in_sitemap') == 'yes'){
                $items = $this->app->item->sitemapItem();
            }
            if( \Config::get('show_all_items_in_sitemap') == 'no'){
                $items = $this->app->item->take( \Config::get('number_of_items_to_show') );
            }

            foreach ($items as $item)
            {
                //single item url to be show on site map
                $sitemap->addItem('/s/' .$item->id.'/'.$item['seoName'], $this->_item_sitemap_priority(),
                    $this->_item_sitemap_frequency(), 'Today');
            }

            $pages = $this->app->page->getAll();
            foreach ( $pages as $page )
            {
                $sitemap->addItem('/p/' .$page['slug'], $this->_page_sitemap_priority(),
                    $this->_page_sitemap_frequency(), 'Today');
            }

            $sitemap->createSitemapIndex( $this->site_url.'/app/storage/sitemap/', 'Today');

            \App::flash('sitemap_generated_msg', 'Sitemap generated.');
            \Response::redirect( $this->site_url.'/admin-area/sitemap');
        }

    }

    /**
     * Add settings to generate site
     */
    public function addSettings()
    {
        if( doo_csrf() )
        {
            $item_priority  = \Input::post('item_priority');
            $item_frequency = \Input::post('item_frequency');
            $page_priority  = \Input::post('page_priority');
            $page_frequency = \Input::post('page_frequency');

            try{
                $this->app->siteMapForm->validator($_POST);

                $check = $this->app->site_map->where('id', 1);
                $this->app->site_map->createOrUpdateById( $check, 'Item Sitemap Settings ', ['id'=> 1, 'priority' => $item_priority,
                    'freqency' => $item_frequency ]);

                $check = $this->app->site_map->where('id', 2);
                $this->app->site_map->createOrUpdateById( $check, 'Page Sitemap Settings ', ['id' => 2,'priority' => $page_priority,
                    'freqency' => $page_frequency ]);

                \App::flash('sitemap', 'Site Map updated');
                \Response::redirect( $this->site_url.'/admin-area/sitemap');

            }catch (\Doowebdev\Validation\DooFormValidationException $e)
            {
                $this->data['item_priority_errors']  = $e->getErrorFor()->first('item_priority');
                $this->data['item_frequency_errors'] = $e->getErrorFor()->first('item_frequency');
                $this->data['page_priority_errors']  = $e->getErrorFor()->first('page_priority');
                $this->data['page_frequency_errors'] = $e->getErrorFor()->first('page_frequency');

                return \View::display('admin/setting/sitemap.twig', $this->data );
            }
        }
    }

    private function _item_sitemap_priority()
    {
        $result   = $this->app->site_map->whereFirst('id',1);
        return $result['priority'];
    }

    private function _item_sitemap_frequency()
    {
        $result   = $this->app->site_map->whereFirst('id',1);
        return $result['freqency'];
    }

    private function _page_sitemap_priority()
    {
        $result   = $this->app->site_map->whereFirst('id',2);
        return $result['priority'];
    }

    private function _page_sitemap_frequency()
    {
        $result   = $this->app->site_map->whereFirst('id',2);
        return $result['freqency'];
    }



} 