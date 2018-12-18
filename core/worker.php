<?php
/**
 * Created by PhpStorm.
 * User: guoyexuan
 * Date: 2018/12/17
 * Time: 5:32 PM
 */

class workers
{
    const VERSION = '1.0.0';

    protected static $statusInfo = array(
        'start_time'    => 0,
        'error_time'    => array()
    );


    public static function _init()
    {
        self::set_process_title('PHPServer: master process');

        sleep(30);
    }

    protected static function set_process_title($title)
    {
        if(extension_loaded('proctitle') && function_exists('setproctitle'))
        {
            setproctitle($title);
        }
        else if(version_compare(phpversion(),'5.5','ge') && function_exists('cli_set_process_title'))
        {
            @cli_set_process_title($title);
        }
    }
}
workers::_init();