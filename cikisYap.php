<?php
require_once("header.php");
require_once("ayarlar.php");
if (session_destroy()) {
    echo '<div class="alert alert-success" role="danger">Oturum Kapatıldı Anasayfaya Yönlendiriliyorsunuz...</div>' ;
    header("Refresh:1,index.php");
} else {
    echo '<div class="alert alert-danger" role="danger">Bir Hata İle Karşılaşıldı</div>';
}
require_once("footer.php");
?>