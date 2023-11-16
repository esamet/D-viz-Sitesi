<?php include("header.php");
include("ayarlar.php");

?>

<div class="container-xl">
    <div class="row">
        <div class="col-xl-6">
            <h2 class="mt-2"> Güncel Haberler</h2>
            <table>
                <tr><?php
                    $sql = "SELECT * FROM haberler ORDER BY manset DESC";
                    $sonuc = $conn->query($sql);
                    $satir = $sonuc->fetch_assoc();
                    ?>
                    <td colspan="2">
                        <div class="card" style="width: 30rem;">
                            <a style="text-decoration:none;color:inherit" href="icerik.php?id=<?php echo $satir["id"]?>">


                                <div class="card-body">
                                    <img src="manset/<?php echo $satir["manset"] ?>" class="card-img-top" alt="...">
                                    <p class="card-title mt-2"><h5 style="color:red; ">SON DAKİKA!</h5> <h5> <?php echo $satir["baslik"] ?></h5></p>
                                    
                                </div>
                        </div></a>
                    </td>
                </tr>
                <tr>

                    <td><?php $satir = $sonuc->fetch_assoc(); ?>
                        <div class="card" style="width: 15rem;"><a style="text-decoration:none;color:inherit" href="icerik.php?id=<?php echo $satir["id"]?>">

                                <div class="card-body">
                                <img src="manset/<?php echo $satir["manset"] ?>" class="card-img-top" alt="...">

                                    <h5 class="card-title mt-2"><?php echo $satir["baslik"] ?></h5>
                                    

                                </div>
                        </div></a>
                    </td>
                    <td><?php $satir = $sonuc->fetch_assoc(); ?>
                        <div class="card" style="width: 15rem;"><a style="text-decoration:none;color:inherit" href="icerik.php?id=<?php echo $satir["id"]?>">
                                <div class="card-body">
                                <img src="manset/<?php echo $satir["manset"] ?>" class="card-img-top " alt="...">

                                <h5 class="card-title mt-2"><?php echo $satir["baslik"] ?></h5>
                                    

                                </div>
                        </div></a>
                    </td>
                </tr>
                <tr>
                    <td><?php $satir = $sonuc->fetch_assoc(); ?>
                        <div class="card" style="width: 15rem;"><a style="text-decoration:none;color:inherit" href="icerik.php?id=<?php echo $satir["id"]?>">
                                <div class="card-body">
                                <img src="manset/<?php echo $satir["manset"] ?>" class="card-img-top" alt="...">

                                    <h5 class="card-title mt-2"><?php echo $satir["baslik"] ?></h5>
                                    

                                </div>
                        </div></a>
                    </td>
                    <td><?php $satir = $sonuc->fetch_assoc(); ?>
                        <div class="card " style="width: 15rem;"><a style="text-decoration:none;color:inherit" href="icerik.php?id=<?php echo $satir["id"]?>">
                                <div class="card-body">
                                <img src="manset/<?php echo $satir["manset"] ?>" class="card-img-top" alt="...">

                                    <h5 class="card-title mt-2"><?php echo $satir["baslik"] ?></h5>
                                    

                                </div>
                        </div></a>
                    </td>
                </tr>


            </table>
        </div>

        <div class="col-xl-6">

            <table class="table table-dark">
                <thead>
                    <h2 class="mt-2">Piyasalar</h2>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">Emtia</th>
                        <th colspan="2" class="table-active  ">Fiyat</th>
                        <th>Değişim</th>
                        <th>Yön</th>
                    </tr>
                    <?php
                    foreach ($emtia as $birim => $deger) {
                        $yon = rand(-900, 900) / 100;
                        echo '
                    <tr>
                        <th scope="row">' . $birim . '</th>
                        <td colspan="2" class="table-active fw-bold fs-5">' . $deger . '</td>
                        <td >' . $yon . '</td>
                        ';
                        if ($yon > 0) echo '
                        <td ><p style="color:green;">▲</p></td>';
                        else echo '<td ><p style="color:red">▼</p></td>';
                        echo '
                       
                    </tr>';
                    }
                    ?>
                </tbody>

            </table>




        </div>
    </div>

</div>
<?php include("footer.php"); ?>