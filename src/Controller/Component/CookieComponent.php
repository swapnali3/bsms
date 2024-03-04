<?php

namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Controller\ComponentRegistry; //allows you to access other components, like a toke generator

class CookieComponent extends Component {

    public function setLoginToken($token) {

        if(!$this->getLoginToken()) {
            //set a new cookie
            setcookie('login_token', $token, time() + (86400), "/"); // 86400 = 1 day
        } else {
            //reset the time on existing cookie
            $token = $_COOKIE['login_token'];
            setcookie('login_token', $token, time() + (86400), "/"); // 86400 = 1 day
        }
        return $token;
    }

    public function getLoginToken() {

        if(!isset($_COOKIE['login_token']) || $_COOKIE['login_token'] == '') {
            return false;
        } else {
            return $_COOKIE['login_token'];
        }
    }

    public function deleteLoginToken() {
        setcookie('login_token', '', time() - 86400, "/"); 
    }

}