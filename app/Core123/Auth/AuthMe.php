<?php
/**
 * Created by PhpStorm.
 * User: TranLuong
 * Date: 16/06/2020
 * Time: 22:40
 */

namespace App\Core123\Auth;


use Symfony\Component\HttpFoundation\Session\Session;

class AuthMe
{
    private static $instance;

    public static function __callStatic($method, $args)
    {
        switch ($method)
        {
            default:
            case 'token':
                return self::getInstance()->token($args);
                break;
            case 'setTokenUser':
                return self::getInstance()->setTokenUser($args);
                break;
            case 'setTokenAdmin':
                return self::getInstance()->setTokenAdmin($args);
                break;
        }
    }

    public static function getInstance()
    {
        if (is_null(self::$instance))
        {
            self::$instance = new self();
        }
        return self::$instance;
    }

    private function token($guard)
    {
        if ($guard[0] == 'admins') return (new Session())->get('token_login_admin')[0];
        else return (new Session())->get('token_login_user')[0];
    }

    private function setTokenAdmin($info_token = [])
    {
        (new Session())->set('token_login_admin', $info_token);
        return true;
    }

    private function setTokenUser($info_token = [])
    {
        (new Session())->set('token_login_user', $info_token);
        return true;
    }
}
