<!DOCTYPE html>
<?php require_once("ayarlar.php");
$sessionId = @$_SESSION['oturum'];
$sql = "SELECT * FROM uyeler WHERE sessionId='$sessionId'";
$sonuc = $conn->query($sql);
$satir = $sonuc->fetch_assoc();
?>
<html lang="en"><?php

                $altin = rand(10000, 25000) / 10;
                $ceyrek = rand(15000, 30000) / 10;
                $tam = rand(60000, 120000) / 10;
                $dolar = rand(1500, 2500) / 100;
                $euro = rand(1800, 2800) / 100;
                $bitcoin = rand(10000, 25000) / 10;
                $Borsa = rand(10000, 25000) / 10;
                $etherium = rand(10000, 25000) / 10;
                $dogecoin = rand(150, 250) / 10;
                $ripple = rand(180, 280) / 10;
                $emtia = array("Dolar" => $dolar, "Euro" => $euro, "Gram_Altin" => "$altin", "Ceyrek_Altin" => $ceyrek, "Tam_Altin" => $tam, "Bitcoin" => $bitcoin, "Borsa" => $Borsa, "Etherium" => $etherium, "Dogecoin" => $dogecoin, "Ripple" => $ripple);
                $fiyat = array("Dolar,Euro,Gram_Altin,Ceyrek_Altin,Tam_Altin,Bitcoin, Borsa, Etherium, Dogecoin, Ripple")
                ?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/site.css">
    <title>Samcoin</title>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-xxl">
            <a class="navbar-brand" href="index.php"><h4>SamCoin</h4></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">

                    <li class="nav-item"><span>
                            <a class="nav-link" href="#">Altın <br><?php echo rand(10000, 25000) / 10; ?></a></span>
                    </li>
                    <li class="nav-item"><span>
                            <a class="nav-link" href="#">Dolar <br><?php echo rand(150, 250) / 10; ?></a></span>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Euro <br><?php echo rand(180, 280) / 10; ?></a></span>
                    </li>
                    <li class="nav-item"><span>
                            <a class="nav-link" href="#">Bitcoin <br><?php echo rand(10000, 25000) / 10; ?></a></span>
                    </li>
                    <li class="nav-item"><span>
                            <a class="nav-link" href="#">Borsa <br><?php echo rand(10000, 25000) / 10; ?></a></span>
                    </li>

                    <?php if ($_SESSION["oturum"] == NULL) {
                        echo '
                    <li class="nav-item" style="margin:auto"><span>
                            <a class="nav-link" href="girisYap.php">
                                <h5>Giriş Yap</h5>
                            </a></span>
                    </li>
                    <li class="nav-item" style="margin:auto"><span>
                            <a class="nav-link" href="uyeOl.php">
                                <h5>Üye Ol</h5>
                            </a></span>
                    </li>';
                    } else {
                        echo '
                        <li class="nav-item dropdown" style="margin:auto;float:right;">  
<a class="nav-link"  id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false"><h5>' . $satir["Ad"] . "  " . $satir["Soyad"] . '</h5>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDropdownMenuLink">
                                <li><a class="dropdown-item" href="hesabimaGit.php">Hesabım</a></li>
                                <li><a class="dropdown-item" href="bilgi-guncelle.php">Üyelik Bilgilerimi Güncelle</a></li>';
                        if ($satir["yetki"] == 2) echo '
                                <li><a class="dropdown-item" href="admin/index.php?yetki=var">Yönetici Paneli</a></li>
                                <li><a class="dropdown-item" href="admin/habergir.php?yetki=var">Haber Gir</a></li>
                                <li><a class="dropdown-item" href="admin/haberguncelle.php?yetki=var">Haber Güncelle</a></li>

                                ';
                                
                        echo '
                            </ul>
                        </li>
                     
                        <li class="nav-item" style="margin:auto;"><span>
                                <a class="nav-link" href="cikisYap.php">
                                    <h5>Çıkış Yap</h5>
                                </a></span>
                               
                        </li>';
                    }

                    ?>
 </ul>
               
            </div>
        </div>
    </nav>