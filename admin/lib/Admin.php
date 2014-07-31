<?php

class Admin extends App_Admin {

    function init() {
        parent::init();

        $this->dbConnect();
        $this->addAuth();
        $this->pathfinder
            ->addLocation(array(
                'addons' => array('addons', 'atk4-addons', 'vendor'),
                'php' => array('addons','lib','addons/PHPExcel/lib')
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
        $this->app->menu->addItem(['Dashboard', 'icon'=>'home'],'/');
        $m_donors = $this->app->menu->addMenu(['Donations', 'icon'=>'box']);
        $m_donors -> addItem(['Donors', 'icon'=>'users'],'donor');
        $m_donors -> addItem(['Donations', 'icon'=>'chart-bar'],'donation');
        $this->app->menu->addItem(['Users', 'icon'=>'users'],'user');
        $this->app->menu->addItem(['Log Out', 'icon'=>'logout'],'logout');
    }
}
