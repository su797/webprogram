<?php
/**
 * staff_login_check.php
 * Description:文件描述
 * Created by 苏函
 * Team:ThreeGuys GO
 * version:1.0
 * Created on 2020/10/22 23:46
 * Summary:摘要
 *
 */
$dsn='mysql:dbname=shop;host=localhost;charset=utf8';
$user='root';
$password='Ss123698745';
$dbh=new PDO($dsn,$user,$password);
$dbh ->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);


try {

    $staff_code=$_POST['code'];
    $staff_pass=$_POST['pass'];

    $staff_code=htmlspecialchars($staff_code,ENT_QUOTES,'UTF-8');
    $staff_pass=htmlspecialchars($staff_pass,ENT_QUOTES,'UTF-8');
    $staff_pass=md5($staff_pass);

    global $dbh;
    $sql='SELECT name FROM mst_staff WHERE code=? AND password=?';
    $stmt=$dbh->prepare($sql);
    $data[]=$staff_code;
    $data[]=$staff_pass;
    $stmt->execute($data);

    $dbh=null;

    $rec=null;

    $rec=$stmt->fetch(PDO::FETCH_ASSOC);

    if($rec==false){
        print 'スタッフコードかパスワードが間違っています。<br />';
        print '<a href="staff_login.html">戻る</a>';

    }
    else{
        session_start();
        $_SESSION['login']=1;
        $_SESSION['staff_code']=$staff_code;
        $_SESSION['staff_pass']=$staff_pass;
        $_SESSION['staff_name']=(string)$rec;

        header('Location:./staff_top.php');
        exit();
    }


}catch (Exception $e){

    print 'ただいま障害により大変ご迷惑をお掛けしております';
    exit();
}