<?php
/**
 * Created by PhpStorm.
 * User: guoyexuan
 * Date: 2018/12/18
 * Time: 6:20 PM
 */

class Select
{
    public $channel = null;
    public $readFds = array();

    protected $readTimeout = 1000;

    public function __construct()
    {
        $this->channel = stream_socket_pair(STREAM_PF_UNIX,STREAM_SOCK_STREAM,STREAM_IPPROTO_IP);

        if($this->channel)
        {
            //下标0:已经存在的客户端,1：接收新客户端
            stream_set_blocking($this->channel[0],0);
            $this->readFds[0] = $this->channel[0];
        }

        fclose($this->channel[0]);
    }

    public function setReadTimeout($time_ms)
    {
        if($time_ms)
        {
            $this->readTimeout = $time_ms;
        }
    }

}new Select();