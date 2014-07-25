<?php

class Admin extends App_Admin {

    function init() {
        parent::init();

        $this->dbConnect();
        $this->addAuth();
        $this->pathfinder
            ->addLocation(array(
                'addons' => array('addons', 'atk4-addons', 'vendor'),
                'php' => array('addons','lib')
            ))
            ->setBasePath($this->pathfinder->base_location->getPath() . '/..')
        ;
        $this->addMenu();
    }
    private function addAuth(){
        $mu=$this->add('Model_User');
        $this->add('Auth')
            ->usePasswordEncryption('md5')
            ->setModel($mu, 'email', 'password')
        ;
//        $this->auth->add('auth/Controller_Cookie');
        $this->auth->check();
    }
    private function addMenu(){
        $this->app->menu->addMenuItem('/', 'Home');
        $this->app->menu->addMenuItem('donor', 'Donors');
        $this->app->menu->addMenuItem('donation', 'Donations');
        $this->app->menu->addMenuItem('user', 'Users');
        $this->app->menu->addMenuItem('logout', 'Log Out');
    }
}