<?php
/**
 * Created by PhpStorm.
 * User: 郭永健
 * Date: 2017/11/22
 * Time: 23:07
 */

$mysqli = new mysqli('localhost','root','root','mysqli');
//var_dump($mysqli);exit;
$mysqli->set_charset('utf8');

if($_POST['name']){
    $sql = 'insert into admin values(null,"'. $_POST['name'] . '")';
//    echo $sql;exit;
    $res = $mysqli->query($sql);
    if($res){
        echo 'insert success';
    }else{
        echo 'insert falure';
    }
}else{
    echo 'post failure';
}