<?php namespace Doowebdev\Core\Admin;



use Doowebdev\Core\Base\Admin;

class PageController extends Admin{


    /**
     * Show All
     */
    public function index()
    {
        return \View::display('admin/page/all.twig', $this->data );
    }

    /**
     * Show about crreate form - get
     */
    public function showAbout()
    {
        \DooSession::delete('pageTitle');
        \DooSession::delete('content');
        \DooSession::delete('order');
        \DooSession::delete('slug');

        return \View::display('admin/page/create_about.twig', $this->data );
    }

    /**
     * Show create service page - get
     */
    public function create()
    {
        return \View::display('admin/page/create.twig', $this->data );
    }

    /**
     * Check, validate and store created item to db
     */
    public function store()
    {
        if( doo_csrf() )
        {
            $content    = \Input::post('description');
            $pageTitle  = \Input::post('pageTitle');
            $order      = \Input::post('order');
            $slug       = \Input::post('slug');

            try{

                $this->app->pageForm->validator( $_POST );

                $this->app->page->create([
                    'title'   => $pageTitle,
                    'content' => $content,
                    'order'   => $order,
                    'slug'    => $slug
                ]);

                \App::flash('page_created', $pageTitle.' Page created');
                \Response::redirect( $this->site_url.'/admin-area/pages');

            }catch (\Doowebdev\Validation\DooFormValidationException $e)
            {
                \DooSession::set('pageTitle', $pageTitle );
                \DooSession::set('content', $content );
                \DooSession::set('order', $order );
                \DooSession::set('slug', $slug );

                $this->data['pageTitle'] = \DooSession::get('pageTitle');
                $this->data['content']   = \DooSession::get('content');
                $this->data['order']     = \DooSession::get('order');
                $this->data['slug']      = \DooSession::get('slug');

                $this->data['pageTitle_errors'] =  $e->getErrorFor()->first('pageTitle');
                $this->data['content_errors'] =  $e->getErrorFor()->first('editor1');
                $this->data['order_errors'] =  $e->getErrorFor()->first('order');
                $this->data['slug_errors'] =  $e->getErrorFor()->first('slug');

                return \View::display('admin/page/create.twig', $this->data );
            }

        }

    }


    /**
     * Edit Item Form - get
     */
    public function edit( $id )
    {
        $this->data['page']  = $this->app->page->whereFirst('id',$id);
        return \View::display('admin/page/edit.twig', $this->data );
    }

    /**
     * Update item from edit form - post/patch
     */
    public function update( $id )
    {
       if( doo_csrf() )
        {
            $content   = \Input::post('editor1');
           $page_title = \Input::post('pageTitle');
           $order      = \Input::post('order');
           $slug       = \Input::post('slug');

           $this->app->page->update('id', $id, [
               'title'   => $page_title,
               'content' => $content,
               'order'   => $order,
               'slug'    => $slug
           ]);

            \App::flash('page_updated', $page_title.' page has been updated!');
            \Response::redirect( $this->site_url.'/admin-area/pages');
        }

    }

    /**
     * Delete item
     */
    public function delete( $id )
    {
       $this->app->page->delete( $id, $this->site_url.'/admin-area/pages', ' The page has been deleted.');
    }




} 