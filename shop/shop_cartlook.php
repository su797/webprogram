<?php
session_start();
session_regenerate_id(true);
if(isset($_SESSION['member_login'])==false)
{
	print 'ようこそゲスト様　';
	print '<a href="member_login.html">会員ログイン</a><br />';
	print '<br />';
}
else
{
	print 'ようこそ';
	print $_SESSION['member_name'];
	print '様　';
	print '<a href="member_logout.php">ログアウト</a><br />';
	print '<br />';
}

if (isset($_POST['clear'])&&$_POST['clear']=='true'){
    $_SESSION['cart']=[];
    $_SESSION['kazu']=[];
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

if(isset($_SESSION['cart'])==true)
{
	$cart=$_SESSION['cart'];
	$kazu=$_SESSION['kazu'];
	$max=count($cart);
}
else
{
	$max=0;
}

if($max==0)
{
	print 'カートに商品が入っていません。<br />';
	print '<br />';
	print '<a href="shop_list.php">商品一覧へ戻る</a>';
	exit();
}

$dsn='mysql:dbname=shop;host=localhost;charset=utf8';
$user='root';
$password='Ss123698745';
$dbh=new PDO($dsn,$user,$password);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

foreach($cart as $key=>$val)
{
	$sql='SELECT code,name,price,gazou,num FROM mst_product WHERE code=?';
	$stmt=$dbh->prepare($sql);
	$data[0]=$val;
	$stmt->execute($data);

	$rec=$stmt->fetch(PDO::FETCH_ASSOC);

	$pro_name[]=$rec['name'];
	$pro_price[]=$rec['price'];
    $pro_num[]=$rec['num'];

    if($rec['gazou']=='')
	{
		$pro_gazou[]='';
	}
	else
	{
		$pro_gazou[]='<img src="../product/gazou/'.$rec['gazou'].'">';
	}
}
$dbh=null;

}
catch(Exception $e)
{
	print'ただいま障害により大変ご迷惑をお掛けしております。';
	exit();
}

?>

カートの中身<br />

<form method="post" action="">
    <input type="hidden" name="clear" value="true">
    <input type="submit" value="クリア"><br />
</form>

<br />

<table border="1">
<tr>
<td>商品</td>
<td>商品画像</td>
<td>価格</td>
<td>数量</td>
<td>小計</td>
<td>削除</td>
</tr>
<form method="post" action="kazu_change.php">
<?php for($i=0;$i<$max;$i++)
	{
?>
<tr>
	<td><?php print $pro_name[$i]; ?></td>
	<td><?php print $pro_gazou[$i]; ?></td>
    <td><span class="price" index="<?php print $i; ?>"><?php print $pro_price[$i]; ?></span>円</td>
	<td><input type="number" class="num-input" max="<?php print $pro_num[$i]; ?>" index="<?php print $i; ?>" name="kazu<?php print $i; ?>" value="<?php print $kazu[$i]; ?>"></td>
    <td ><span class="item-price-sum" index="<?php print $i; ?>"><?php print $pro_price[$i]*$kazu[$i]; ?></span>円</td>
	<td><input type="checkbox" name="sakujo<?php print $i; ?>"></td>
</tr>
<?php
	}

?>
</table>

<?php if (isset($_SESSION['cart'])&&count($_SESSION['cart'])>0){

    echo '<p>合計金額:<span id="price-sum"></span>円</p>';

}
?>
<input type="hidden" name="max" value="<?php print $max; ?>">
<input type="submit" value="数量変更"><br />
<input type="button" onclick="history.back()" value="戻る">
</form>
<br />
<a href="shop_form.html">ご購入手続きへ進む</a><br />

<?php
	if(isset($_SESSION["member_login"])==true)
	{
		print '<a href="shop_kantan_check.php">会員かんたん注文へ進む</a><br />';
	}
?>
<script src="../js/jquery-3.0.0.js"></script>
<script>
    function isEmpty(obj){
        var regu = "^[ ]+$";
        var re = new RegExp(regu);
        if(typeof obj == "undefined" || obj == null || obj == "" || re.test(obj)){
            return true;
        }else{
            return false;
        }
    }
    //合計金額関数
    function complate_price(){
        let sum=0;
        for (let value of $(".item-price-sum")){
            sum+=parseInt($(value).text());
        }
        $("#price-sum").text(sum);
    }

    //合計金額計算
    complate_price();
    //数を変更した時
    $(".num-input").bind('change',function (){
        let this_num=parseInt($(this).val());
        let index=$(this).attr('index');
        let this_item_price=parseInt($(".price[index="+index+"]").text());

        if(isEmpty(this_num)||this_num<0){
            $("#price-sum").text(0);
            $(this).val(0);
            $(".item-price-sum[index="+index+"]").text(0);
        }else {
            let max=parseInt($(this).attr('max'));
            //在庫数を超えないため
            if(this_num>max){
                $(this).val(max);
                this_num=max;
            }
            $(".item-price-sum[index="+index+"]").text(this_num*this_item_price);
        }
        complate_price();//合計金額を計算します

    })
</script>
</body>
</html>