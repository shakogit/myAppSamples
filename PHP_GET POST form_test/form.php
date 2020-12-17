<?php


echo '<pre>';

echo $_SERVER['REQUEST_METHOD'];
echo '</pre>';

echo '<pre>';
print_r($_POST);
echo '<pre>';

echo'----------------';

$is_send = false;
$err = '';
if($_SERVER['REQUEST_METHOD'] === 'POST')
{
    $name = trim($_POST['name']);
    $phone = trim($_POST['phone']);
    
    if($name === '' || $phone === '')
    {
        $err = 'Please fill all fields';
    }
    elseif(mb_strlen($name, 'UTF8') < 2)
    {
        $err = 'too Short name!';
    }
    else
    {
        $dt = date("Y-d-m H-i-s");
        $mainbody = "$dt\n$phone\n$name\n";
        mail("shakoinbox@gmail.com", "new text info!", $mainbody);
        $is_send = true;    
    }
    
    
}
else
{
    $name = '';
    $phone = '';
}

?>
<div class="form">
<?php if($is_send): ?>
<p>your app is done!</p>
<?php else: ?>

<form method="post">
    Name:
    <input type="text" name="name" value="<?=$name?>"> <br>
    Phone:
    <input type="text" name="phone" value="<?=$phone?>"> <br>
    <p><?=$err?></p>
    <button>Send</button>

</form>
<?php endif; ?></div>