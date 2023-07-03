<?php
$db=new PDO('mysql:host=localhost;dbname=Raktadan','root','');
if($db)
{
 //   echo "Connect";
}
else
{
    echo "Not Connect";
}
?>