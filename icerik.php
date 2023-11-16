<?php include("header.php"); 
require_once("ayarlar.php");
$id=$_GET["id"];
$sql="SELECT * FROM haberler WHERE id='$id'";
$sonuc=$conn->query($sql);
$satir=$sonuc->fetch_assoc();
?>
<div class="container-xl">
<div class="row">
    <div class="col-xl-8 mt-3">
    <div class="container-xl">
        <h2><?php echo $satir["baslik"] ?></h2>
        <img class="mt-3"src="manset/<?php echo $satir["manset"]?>">
        
        <h5 class="mt-3">
        <?php echo $satir["icerik"] ?>
        </h5>
    </div></div>

    <div class="col-xl-4">
    <h2 class="mt-2"> Diğer Güncel Haberler</h2>
            <table>
                
                <?php
                $sql="SELECT * FROM haberler WHERE id!='$id' ORDER BY manset DESC";$sonuc=$conn->query($sql); while($satir=$sonuc->fetch_assoc()){ echo'
                 <tr>
                    <td>
                        <div class="card mt-2" style="width: 25rem;">
                                <div class="card-body">
                                <a style="text-decoration:none;color:inherit;"href="icerik.php?id='.$satir["id"].'">

                                <img src="manset/'.$satir["manset"].'" class="card-img-top" alt="...">

                                    <p class="card-text"><h5>'.$satir["baslik"].'</h5></p>
                                </div>
                        </div></a>
                    </td>
                </tr>
                                ';} ?>

            </table>
    </div>
</div>



</div>










<?php include("footer.php"); ?>