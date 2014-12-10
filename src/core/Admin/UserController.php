<?php namespace Doowebdev\Core\Admin;




use Doowebdev\Core\Base\Admin;

class UserController extends Admin{


   /* public function __construct()
    {
        parent::__construct();

        $this->authenticate();

        $this->data['selected'] = 'Selected';
    }*/

    /**
     * Show All
     */
    public function index()
    {
        return \View::display('admin/user/users.twig', $this->data );
    }

    /**
     * Show create form - get
     */
    public function create()
    {
        return \View::display('admin/user/create.twig', $this->data );
    }

    /**
     * Store created item to db - post
     */
    public function store()
    {
        if( doo_csrf() )
        {
            $user_group = \Input::post('user_group');
            $first_name = \Input::post('first_name');
            $last_name  = \Input::post('last_name');
            $email      = \Input::post('email');
            $username   = \Input::post('username');
            $password   = \Input::post('password');

            try {

                $this->app->adminUserForm->validator( $_POST );

                // Create the user
                $user = $this->app->auth->createUser([
                    'username'   => $username,
                    'email'      => $email,
                    'group'      => $user_group,
                    'first_name' => $first_name,
                    'last_name'  => $last_name,
                    'password'   => $password,
                    'activated'  => true,
                ]);

                // Find the group using the group id
                $adminGroup = $this->app->auth->findGroupByName( $user_group );

                // Assign the group to the user
                $user->addGroup( $adminGroup );

                \App::flash('user-created', 'User created.');
                \Response::redirect($this->site_url . '/admin-area/users');

            } catch (\Doowebdev\Validation\DooFormValidationException $e)
            {
                $adminGroup = $this->app->auth->findGroupByName( $user_group );

                \DooSession::set('username', $username );
                \DooSession::set('email', $email );
                \DooSession::set('first_name', $first_name );
                \DooSession::set('last_name', $last_name );
                \DooSession::set('user_group', $adminGroup->name );

                $this->data['username']   = \DooSession::get('username');
                $this->data['email']      = \DooSession::get('email');
                $this->data['first_name'] = \DooSession::get('first_name');
                $this->data['last_name']  = \DooSession::get('last_name');
                $this->data['user_group'] = \DooSession::get('user_group');;

                $this->data['username_error'] =  $e->getErrorFor()->first('username');
                $this->data['email_error']    =  $e->getErrorFor()->first('email');
                $this->data['password_error'] =  $e->getErrorFor()->first('password');

                return \View::display('admin/user/create.twig', $this->data );
            }

        }

    }


    /**
     * Edit Item Form - get
     */
    public function edit( $id )
    {
        $user  = $this->app->auth->findUserByID( $id );
        $group = $user->getGroups();

        $this->data['group_name'] = $group[0]['name'];
        $this->data['user']       = $user;

        return \View::display('admin/user/edit.twig', $this->data );
    }

    /**
     * Update item from edit form - post/patch
     */
    public function update( $id )
    {
        if( doo_csrf() )
        {
            // $id         = Input::get('id');
            $pwd        = \Input::post('password');
            $user_group = \Input::post('user_group');
            $email      = \Input::post('email');
            $first_name = \Input::post('first_name');
            $last_name  = \Input::post('last_name');
            $username   = \Input::post('username');
            $activate   = \Input::post('activated');

            try
            {
                // Find the user using the user id
                $user = $this->app->auth->findUserById( $id );

                $group = $this->app->group->whereFirst('name', $user_group);
                //update into database
                $this->app->user_group->update('user_id', $id, ['group_id' => $group->id]);

                // Update the user details
                $user->email = $email;
                $user->first_name = $first_name;
                $user->last_name  = $last_name;
                $user->username   = $username;
                $user->activated  = $activate;
                if( !empty( $pwd ) )
                {
                    $user->password = $pwd;
                }

                // Update the user
                if ($user->save())
                {
                    // User information was updated
                    \App::flash('user-updated', $email.' User Updated.');
                    \Response::redirect($this->site_url . '/admin-area/users');
                }
                else
                {
                    // User information was not updated
                    $error_msg = 'User information was not updated';
                }
            }
            catch (\Cartalyst\Sentry\Users\UserExistsException $e)
            {
                $error_msg = 'User with this login ( '.$email.' ) already exists.';
            }
            catch (\Cartalyst\Sentry\Users\UserNotFoundException $e)
            {
                $error_msg = 'User was not found.';
            }
            catch (\Cartalyst\Sentry\Groups\GroupNotFoundException $e)
            {
                $error_msg = 'Group was not found.';
            }

            if( !empty( $error_msg ) )
            {
                $user  = $this->app->auth->findUserByID( $id );
                $group = $user->getGroups();

                $this->data['group_name'] = $group[0]['name'];
                $this->data['user']       = $user;

                $this->data['error_msg'] = $error_msg;
                return \View::display('admin/user/edit.twig', $this->data );
            }


        }

    }

    /**
     * Delete item
     */
    public function delete( $id )
    {
        // find user by id and delete
        try {

            $clean_id = strip_tags( $id );
            $user = $this->app->auth->findUserById( $clean_id );
            $user->delete();

            \App::flash('user-deleted', ' User successfully deleted.');
            \Response::redirect($this->site_url . '/admin-area/users');

        } catch (\Exception $e) {

            \App::flash('user-no-delete', 'User could not be deleted.');
            \Response::redirect($this->site_url . '/admin-area/users');
        }
    }




} 