<?php require_once("header.php");
require_once("ayarlar.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $uniq = md5(uniqid());
    $sessionId = md5($uniq);
    $eposta = $_POST["eposta"];
    $parola = md5($_POST["parola"]);
    $ad = $_POST["Ad"];
    $soyad = $_POST["Soyad"];
    $sql = "INSERT INTO uyeler (Ad,Soyad,email,parola,sessionId) VALUES ('$ad','$soyad','$eposta','$parola','$sessionId')";
    $sonuc = $conn->query($sql);
    $sql2="INSERT INTO emtialar (sessionId) VALUES ('$sessionId')";
    $sonuc2=$conn->query($sql2);
}

?>
<form method="POST" action="">
    <div class="container-xl">
        <div class="mt-3">
            <label for="exampleInputEmail1" class="form-label">Ad</label>
            <input type="text" class="form-control" name="Ad">
        </div>
        <div class="mt-3">
            <label for="exampleInputEmail1" class="form-label">Soyad</label>
            <input type="text" class="form-control" name="Soyad">
        </div>
        <div class="mt-3">
            <label for="exampleInputEmail1" class="form-label">Email Adresi</label>
            <input type="email" class="form-control" name="eposta">
        </div>
        <div class="mt-3">
            <label for="exampleInputPassword1" class="form-label">Parolanız</label>
            <input type="password" class="form-control" name="parola">
        </div>
        <button type="submit" class=" mt-3 btn btn-primary">Üye Ol</button>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (@$sonuc == 1) {

                echo '<div class="alert alert-primary" role="alert">
    Üye Kaydı Başarılı Giriş Yap Sayfasına Yönlendiriliyorsunuz</div>';
                header("Refresh:1,girisYap.php");
            } else echo '<div class="alert alert-danger" role="alert">Bir Hata İle Karşılaşıldı</div>';
        } ?>
</form>
</div>
<?php require_once("footer.php");  ?>