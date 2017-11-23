<?php
/**
 * Created by PhpStorm.
 * User: bruce
 * Date: 2017/11/23
 * Time: 20:41
 */

include 'http.class.php';
$http = new http('http://localhost/telnet.php?name=tom');
$http->setHeader('Cookie:name=huozhe');
$http->post();