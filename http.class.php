<?php
/**
* User: 郭永健
* Date: 2017/11/19
* Time: 22:59
*/

class file{
    public $urlInfo = array();
    public $line=array();
    public $header=array();
    public $body=array();
    public $fh=null;
    public $errno = -1;
    public $error = 'request error';
    public $response = '';

    public function __construct($url){
        $this->conn($url);
        $this->setHeader('Host:' . $this->urlInfo['host']);
    }

    /**
    *设置行信息
    */
    public function setLine($method){
        $this->line[0] = $method .' '.$this->urlInfo['path'] . ' HTTP/1.1';
    }

    /**
    设置头信息
    */
    public function setHeader($header){
        $this->header[] = $header;
    }

    /**
    设置主体信息
    */
    public function setBody(){

    }

    /**
    *连接url
    */
    public function conn($url){
        $this->urlInfo = parse_url($url);
        $this->urlInfo['port'] = isset($this->urlInfo['port'])?:80;
        $this->fh = fsockopen($this->urlInfo['host'],$this->urlInfo['port'],$this->errno,$this->error,3);
    }

    /**
    *get
    */
    public function get(){
        $this->setLine('GET');
        $this->request();
    }

    public function post($arr = array()){
        $this->setLine('POST');
        $this->body = array_merge($this->body,$arr);
        $this->setHeader('Content-type:application/x-www-form-urlencoded');
        $this->setHeader('Content-length:'. strlen(http_build_query($this->body)));
        $this->request();
    }

    public function request(){
        $req = array_merge($this->line,$this->header,array(''),array(http_build_query($this->body)),array(''));
        $str = implode(PHP_EOL,$req);
//        echo $str;exit;
        fwrite($this->fh,$str);
        while(!feof($this->fh)){
            $this->response .= fread($this->fh,1024);
           }
        echo $this->response;
        $this->close();//关闭资源句柄
    }

    public function close(){
        fclose($this->fh);
    }
}

//$obj = new file("http://localhost/telnet.php");
////$obj = new file("http://www.itbool.com/";);
////$obj->get();
//$obj->post(array('name'=>"tom's father"));