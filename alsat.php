<?php
require_once("header.php");
require_once("ayarlar.php");
$emtia2 = $_GET["emtia"];
$emir = $_GET["emir"];
$miktar = @$_POST["miktar"];
$limit=@$_GET["limit"];
$sessionId = $_SESSION["oturum"];
$sql = "SELECT * FROM emtialar WHERE sessionId='$sessionId'";
$sonuc = $conn->query($sql);
$satir = $sonuc->fetch_assoc();
$eskitotal = @$satir[$emtia2];

if ($emir == "Al") {
    $yenitoplam = $eskitotal + $miktar;
} else if ($emir == "Sat") {
    $yenitoplam = $eskitotal - $miktar;
}

if ($yenitoplam < 0 and $limit!="evet") {
    echo '<div class="alert alert-info container-xl">Varlığınız Sıfırın Altında Düşemez<br> Maksimum <h4>' . $eskitotal . '</h4> miktarında <b>' . $emir . '</b> işlemi yapabilirsiniz, bu tutarın tamamı ile işlem yapılsın mı?</div>';
    echo '<div style="display:flex"class="alert alert-info container-xl"><form method="POST" action="alsat.php?miktar='.$miktar.'&limit=evet&emir='.$emir.'&emtia='.$emtia2.'"><input type="submit" class="btn btn-info" value="Evet"></form>';
    echo '<form method="POST" action="alsat.php?limit=hayir"><input type="submit" class="btn btn-warning" value="Hayir"></form></div>';
}
if($limit=="hayir"){
    header("Refresh:0,hesabimaGit.php");
    exit;
}
if($limit=="evet"){
    $yenitoplam=0;
}

   if($yenitoplam>=0){ $sql2 = "UPDATE emtialar SET $emtia2='$yenitoplam' WHERE sessionId='$sessionId'";
    $sonuc2 = $conn->query($sql2);
    if ($sonuc2 == TRUE) {
        echo '<div class="d-flex justify-content-center mt-5">
<div class="spinner-border " role="status">
  <span class="visually-hidden">Loading...</span>
  
</div><h4 >&nbsp&nbsp&nbsp&nbsp İşlem Yapılıyor</h4>
</div>';
        header("Refresh:1,hesabimaGit.php?islem=basarili");
    }}

