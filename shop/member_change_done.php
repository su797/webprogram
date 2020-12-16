
<?php

session_start();
session_regenerate_id(true);
if (isset($_SESSION['member_login']) == false) {
    print 'ログインされていません。<br />';
    print '<a href="shop_list.php">商品一覧へ</a>';
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>ろくまる農園</title>
</head>
<body>

<?php
try
{
    $dsn='mysql:dbname=shop;host=localhost;charset=utf8';
    $user='root';
    $password='Ss123698745';
    $dbh=new PDO($dsn,$user,$password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $sql='UPDATE dat_member SET name=?,email=?,postal1=?,postal2=?,address=?,tel=?,danjo=?,born=? WHERE code=?';
    $stmt=$dbh->prepare($sql);
    $data=array();

    extract($_POST);
    $data[]=$onamae;
    $data[]=$email;
    $data[]=$postal1;
    $data[]=$postal2;
    $data[]=$address;
    $data[]=$tel;

    if($danjo=='dan')
    {
        $data[]=1;
    }
    else
    {
        $data[]=2;
    }
    $data[]=$birth;
    $data[]=$code;

    $stmt->execute($data);

    print '情報を変更しました！';

}catch (Exception $e)
{
	print 'ただいま障害により大変ご迷惑をお掛けしております。';
	exit();
}
?>

<br />
<a href="shop_list.php">商品画面へ</a>