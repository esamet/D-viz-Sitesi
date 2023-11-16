<?php require_once("header.php");
require_once("ayarlar.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $eposta = $_POST["eposta"];
    $parolaacik=$_POST["parola"];
    $parola = md5($parolaacik);
    $sql = "SELECT * FROM uyeler WHERE email='$eposta' and parola='$parola' ";
    $sonuc = $conn->query($sql); 
    $dogrumu = $sonuc->num_rows;
    if ($dogrumu == 1) {
        if(isset($_POST["benihatirla"])){
            setcookie("email",$eposta,strtotime("+5 day"));
            setcookie("parola",$parolaacik,strtotime("+5 day"));
        }
        else{ setcookie("email",$eposta,strtotime("-5 day"));
            setcookie("parola",$parolaacik,strtotime("-5 day"));};
        echo '<div class="alert alert-success" role="alert">Başarıyla Giriş Yaptınız Anasayfaya Yönlendiriliyorsunuz &nbsp&nbsp&nbsp&nbsp&nbsp<div class="mt-1 spinner-border text-primary" role="status">
        <span class="visually-hidden">Loading...</span>
      </div></div> ';
        $satir = $sonuc->fetch_assoc();
        $_SESSION["oturum"] = $satir["sessionId"];
        header("Refresh:1,index.php");
    } 
    else echo '<div class="alert alert-danger" role="danger">Bir Hata İle Karşılaşıldı</div>';
    $satir = $sonuc->fetch_assoc();
    echo @$satir["Ad"];
}

?>
<form method="POST" action="girisYap.php">
    <div class="container-xl">
        <div class="mt-3">
            
            <label for="exampleInputEmail1" class="form-label">Email Adresi</label>
            <input type="email" class="form-control" value="<?php echo @$_COOKIE["email"] ?>" name="eposta">
        </div>
        <div class="mt-3">
            <label for="exampleInputPassword1" class="form-label">Parola</label>
            <input type="password" class="form-control"  value="<?php echo @$_COOKIE["parola"] ?>" name="parola">
        </div>
        <div class="mt-3 form-check">
            <input type="checkbox" class="form-check-input" name="benihatirla">
            <label class="form-check-label" >Beni Hatirla</label>
        </div>
        
        <button type="submit" class=" mt-3 btn btn-primary">Giriş Yap</button>
</form>
</div>
<?php require_once("footer.php") ?>