<?php
include("header.php");
require_once("ayarlar.php");
$sessionId = $_SESSION["oturum"];
$sql = "SELECT * FROM uyeler WHERE sessionId='$sessionId'";
$sonuc = $conn->query($sql);
$satir = $sonuc->fetch_assoc();
$emtia2 = @$_GET["emtia"];
$emir = @$_GET["emir"];



?>
<div class="container-xl">
    <div class="row">
        <?php
        $is=@$_GET["islem"];
if($is=="basarili") echo '<div class="alert alert-success mt-3"><h5>İşlem Başarılı</h5></div>';?>

        <div class="col-xl-6">
            <table class="table table-dark">
                <thead>
                    <h2>Hesabım</h2>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">Emtia</th>
                        <th>Birim</th>
                        <th>Birim Fiyat</th>
                        <th colspan="2" class="table-active  ">Toplam Fiyat</th>

                        <th></th>
                        <th></th>
                    </tr>
                    <?php
                    $sql2 = "SELECT * FROM emtialar WHERE sessionId='$sessionId'";
                    $sonuc2 = $conn->query($sql2);
                    $satir2 = $sonuc2->fetch_assoc();
                    foreach ($emtia as $birim => $deger) {



                        $yon = @$satir2[$birim];


                        echo '
                    <tr>
                        <th scope="row">' . $birim . '</th>
                        <td >' . $yon . '</td>
                        <td>' . $deger . '</td>
                        <td colspan="2" class="table-active fw-bold fs-5">' . $deger * $yon . '</td>
                        
                        <td style="text-align:center;" class=" fw-bold fs-5"><a  class="btn btn-success" href="hesabimagit.php?emtia=' . $birim . '&emir=Al">&nbsp  AL&nbsp&nbsp   </a></td>
                        <td style="text-align:center;" class=" fw-bold fs-5"><a  class="btn btn-warning" href="hesabimagit.php?emtia=' . $birim . '&emir=Sat">SAT</a></td>
                        
                        
                       
                    </tr>';
                    }
                    ?>
                </tbody>

            </table>

        </div>
        <div class="col-xl-6 mt-5">
            <?php
            if (isset($emtia2)) {
                if ($emir == "Al") {
                    echo "<h4>İşlem:  ".$emtia2 . " AL</h4>";
                    echo '<form method= "POST" action="alsat.php?emir='.$emir.'&emtia='.$emtia2.'"><div class="input-group mt-5">
                    <input type="number" class="form-control" name="miktar" placeholder="Birim Giriniz" >
                    <input type="submit" class="';echo $emir=="Al" ?  'btn btn-success' : 'btn btn-warning'; echo '" value="emir"></input>

                  </form></div>';  
                } else if ($emir == "Sat") {
                    echo "<h4>İşlem:  ".$emtia2 . " SAT</h4>";
                    echo '<form method= "POST" action="alsat.php?emir='.$emir.'&emtia='.$emtia2.'"><div class="input-group mt-5">
                    <input type="number" class="form-control" name="miktar" placeholder="Birim Giriniz" >
                    <input type="submit" class="';echo $emir=="Al" ?  'btn btn-success' : 'btn btn-warning'; echo '"value="emir"></a>

                    </form></div>'; 
                    
                    
                }
            }
            
            ?></div>
    </div>
</div>
