<?php
include("header.php");
require_once("ayarlar.php");
$sessionId = $_SESSION["oturum"];
$sql = "SELECT * FROM uyeler WHERE sessionId='$sessionId'";
$sonuc = $conn->query($sql);
$satir = $sonuc->fetch_assoc();




?>
<div class="container-xl">
            <form method="POST" action="">
                <h2 class="mt-3">Bilgilerim/Güncelle</h2>
                <div class="mt-3">
                    <label for="exampleInputEmail1" class="form-label">Ad</label>
                    <input type="text" class="form-control" value="<?php echo $satir["Ad"] ?>" name="Ad">
                </div>
                <div class="mt-3">
                    <label for="exampleInputEmail1" class="form-label">Soyad</label>
                    <input type="text" class="form-control" value="<?php echo $satir["Soyad"] ?>" name="Soyad">
                </div>
                <div class="mt-3">
                    <label for="exampleInputEmail1" class="form-label">Email Adresi</label>
                    <input type="email" class="form-control" value="<?php echo $satir["email"] ?>" name="eposta" disabled>
                </div>
                <button type="submit" name="guncelle" class=" mt-3 btn btn-primary">Güncelle</button>

                <div class="mt-3">
                    <label for="exampleInputPassword1" class="form-label">Yeni Parolanız</label>
                    <input type="password" class="form-control" name="yp">
                    <label for="exampleInputPassword1" class="form-label">Yeni Parolanız Tekrar</label>
                    <input type="password" class="form-control" name="ypt">
                    <button type="submit" name="parolaguncelle" class=" mt-3 btn btn-primary">Parola Güncelle</button>

                </div>

                <?php
                if (isset($_POST["guncelle"])) {
                    $ad = $_POST["Ad"];
                    $soyad = $_POST["Soyad"];
                    $sql = "UPDATE uyeler SET Ad='$ad',Soyad='$soyad' WHERE sessionId='$sessionId'";
                    $sonuc = $conn->query($sql);
                    echo '<div class="alert alert-primary"  mt-1     role="alert">
                    Güncelleme Yapılıyor &nbsp&nbsp <div class="mt-1 spinner-border text-primary" role="status">
                    <span class="visually-hidden">Loading...</span>
                  </div></div>';
                    header("Refresh:1");
                }
                if (isset($_POST["parolaguncelle"])) {
                    $yp = md5($_POST["yp"]);
                    $ypt = md5($_POST["ypt"]);
                    if ($yp == $ypt) {
                        $sql = "UPDATE uyeler SET parola='$ypt' WHERE sessionId='$sessionId'";
                        $sonuc = $conn->query($sql);
                        echo '<div class="alert alert-success mt-3"  role="alert">Parola Güncelleme Başarılı</div>';
                    } else echo '<div class="alert alert-danger mt-3" role="alert">Girilen parolalar aynı değil, Lütfen Kontrol Ediniz</div>';
                }
                ?>
            </form>

        </div>