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
            ->usePasswordEncryption()
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

        $m_notif = $this->app->menu->addMenu(['Notifications', 'icon'=>'info']);
        $m_notif -> addItem(['Notifications', 'icon'=>'info'],'notification');
        $m_notif -> addItem(['Notification Types', 'icon'=>'info'],'notificationTypes');

        $m_courses = $this->app->menu->addMenu(['Courses', 'icon'=>'doc']);
        $m_courses->addItem(['Centers', 'icon'=>'globe-1'],'center');
        $m_courses->addItem(['Courses', 'icon'=>'doc'],'course');
        $m_courses->addItem(['Schedule', 'icon'=>'calendar'],'course_schedule');
        $m_courses->addItem(['Trainee', 'icon'=>'users-1'],'course_trainee');
        $m_courses->addItem(['Issued Certificate', 'icon'=>'book'],'course_issuedCertificate');
        $m_courses->addItem(['Application', 'icon'=>'book'],'course_application');

        $m_users = $this->app->menu->addMenu(['Users', 'icon'=>'users']);
        $m_users->addItem(['Users', 'icon'=>'users'],'user');
        $m_users->addItem(['Clients', 'icon'=>'target'],'user_client');
        $m_users->addItem(['Company', 'icon'=>'vcard'],'user_company');

        $this->app->menu->addItem(['Log Out', 'icon'=>'logout'],'logout');
    }
}
