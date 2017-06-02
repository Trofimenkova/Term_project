<?php 
require_once("database.php");
$link = db_connect();
?>
<?php
$msg='';
if(!empty($_GET['code']) && isset($_GET['code']))
{
    $code=mysqli_real_escape_string($link, $_GET['code']);
    $c=mysqli_query($link, "SELECT * FROM users WHERE activation='".$code."'");
 
    if(mysqli_num_rows($c) > 0)
    {
        $count=mysqli_query($link, "SELECT * FROM users WHERE activation='".$code."' and status='0'");
 
        if(mysqli_num_rows($count) == 1)
        {
            mysqli_query($link, "UPDATE users SET status='1' WHERE activation='".$code."'");
            $msg="Ваш аккаунт успешно активирован! <a href='login.php'>Войдите на сайт</a>";
        }
        else
        {
            $msg ="Ваш аккаунт уже активирован!";
        }
 
    }
    else
    {
        $msg ="Неверный код активации";
    }
 
}
?>
<?php echo $msg; ?>