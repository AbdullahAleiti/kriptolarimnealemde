<?php
    include "./init.php";

    // Change your location's timezone
    date_default_timezone_set("Europe/Istanbul");

    if(!isset($_SESSION["user"]))
        header("Location: login.php");
    

    $portfolio = $userData->portfolio;

    //You can insert your api for cryptocompare
    $json = file_get_contents("https://min-api.cryptocompare.com/data/pricemulti?fsyms=". implode(",",array_keys((array)$portfolio))."&tsyms=".$currency);
    $prices = json_decode($json);

    
    $time_of_day = intval(date("H"));

    $greeting = "Merhaba";
    
    if($time_of_day >= 4 && $time_of_day <= 11)
        $greeting = "Günaydın";
    if($time_of_day >= 12 && $time_of_day <= 16)
        $greeting = "Iyi günler";
    if($time_of_day >= 17 && $time_of_day <= 20)
        $greeting = "Iyi akşamlar";

    include "./header.php";
?>
<body>
    <div class="w-full watch">
        <div class="max-w-lg text-white mx-auto text-center mt-32 px-4">
            <div class="text-2xl"><?= $greeting . " " . $userData->name ?></div>
            <table class="mt-5 text-md sm:text-xl table-auto mx-auto">
                <tbody>
                    <thead>
                        <th>Kriptoların</th>
                        <th></th>
                        <th>tl karşılığı</th>
                    </thead>
                    <?php 
                        $toplam = 0;
                        foreach($portfolio
                 as $kripto=>$deger) {?>
                        <tr>
                            <?php 
                                $varlik = round($deger*$prices->$kripto->{$currency},2);
                                $toplam += $varlik;
                            ?>
                            <td class="border py-2 px-4 text-left font-semibold"><?= $deger ?></td>
                            <td class="border py-2 px-4 sm:px-2"><?= $kripto ?></td>
                            <td class="border py-2 px-4"><?= number_format($varlik,2) . " ". $c_symbol ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <div class="mt-5 text-2xl">Toplam : <span class="toplam text-4xl font-medium"><?= number_format($toplam) . " ". $c_symbol ?></span></div>
        </div>
    </div>
</body>
</html>
