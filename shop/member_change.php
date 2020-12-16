<?php


session_start();
session_regenerate_id(true);
if(isset($_SESSION['member_login'])==false)
{
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
    $code=$_SESSION['member_code'];

    $dsn='mysql:dbname=shop;host=localhost;charset=utf8';
    $user='root';
    $password='Ss123698745';
    $dbh=new PDO($dsn,$user,$password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    $sql='SELECT name,email,postal1,postal2,address,tel,danjo,born FROM dat_member WHERE code=?';
    $stmt=$dbh->prepare($sql);
    $data[]=$code;
    $stmt->execute($data);
    $rec=$stmt->fetch(PDO::FETCH_ASSOC);

    $dbh=null;

    $onamae=$rec['name'];
    $email=$rec['email'];
    $postal1=$rec['postal1'];
    $postal2=$rec['postal2'];
    $address=$rec['address'];
    $tel=$rec['tel'];
    $danjo=$rec['danjo'];
    $born=$rec['born'];


    print '会員情報修正<br /><br /><br />';

    print '<form method="post" action="member_change_done.php">';

    print 'お名前<br />';
    print '<input type="text" name="onamae" value="'.$onamae.'"><br />';
    print 'メールアドレス<br />';
    print '<input type="text" name="email" value="'.$email.'"><br />';
    print '郵便番号<br />';
    print '<input type="number" name="postal1" value="'.$postal1.'">-';
    print '<input type="number" name="postal2" value="'.$postal2.'"><br />';
    print '住所<br />';
    print '<input type="text" name="address" value="'.$address.'"><br />';
    print '電話番号<br />';
    print '<input type="number" name="tel" value="'.$tel.'"><br /><br />';
    print '性別<br />';

    if($danjo==1){
        print '<input type="radio" name="danjo" value="dan" checked>男性<br />';
        print '<input type="radio" name="danjo" value="jo">女性<br />';

    }else{
        print '<input type="radio" name="danjo" value="dan">男性<br />';
        print '<input type="radio" name="danjo" value="jo" checked>女性<br />';

    }

    print '生まれ年<br />';
    print '<select name="birth"><br />';
    $now_year=date('Y');
    for ($option_year=$now_year-100;$option_year<=$now_year;$option_year+=10){
        print "<option value='{$option_year}' ".($born==$option_year?'selected':'').">{$option_year}年代</option>";
    }

    print '</select><br />';
    print '<input type="hidden" name="code" value="'.$code.'"><br />';
    print '<input type="button" onclick="history.back()" value="戻る">';
    print '<input type="submit" value="ＯＫ"><br />';
    print '</form>';

}catch (Exception $e)
{
	print 'ただいま障害により大変ご迷惑をお掛けしております。';
	exit();
}
?>

</body>
</html>
