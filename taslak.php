<?php
include("header.php");
require_once("ayarlar.php");
$sql="SELECT * FROM uyeler";
$sonuc=$conn->query($sql);
while($satir=$sonuc->fetch_assoc())
$a=1;
 $b=2;
 echo $a-$b;

?>