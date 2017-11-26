<?php
if ($_GET['coin'] == "sonm"){
    $coin = "sonm";
}
if ($_GET['coin'] == "eth"){
    $coin = "ethereum";
}
if ($_GET['coin'] == "btc"){
    $coin = "bitcoin";
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-COMPATIBLE" content="IE=edge">
    <title>Crypto Ticker</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
</head>
<body>


<div class="coincontent">
    <div class="coin-field sonm sonmend">
        <div class="coin">
            <a href="index.php?coin=sonm"><img src="images/sonm.png"></a>
        </div>
    </div>
    <div class="coin-field btc btcend">
        <div class="coin">
            <a href="index.php?coin=btc"><img src="images/bitcoin.png"></a>
        </div>
    </div>
    <div class="coin-field eth ethend">
        <div class="coin">
            <a href="index.php?coin=eth"><img src="images/ethereum.png"></a>
        </div>
    </div>
</div>
<div class="info">
    <a href="index.php?coin=<?php echo $_GET['coin'] ?>" class="backlink"><img src="images/back.png" class  ="backbutton"></a>
    <h1 id="prijs"></h1>
    <h2 id="percent"></h2>
    <div class="subinfo">
        <span class="name" id="rank"></span>
        <br>
        <span class="name" id="btc"></span>
        <br>
        <span class="name" id="usd"></span>
        <br>
        <span class="name" id="cap"></span>
        <br>
        <span class="name" id="volume"></span>
    </div>
</div>
<script>
    $(function() {

            $(".sonm, .btc, .eth").addClass("active");
            $(".sonm, .btc, .eth").removeClass("select");
            $(".<?php echo $_GET['coin']?>").css('z-index', 3000);

    });

    getData();
    function getData(){

        var url = "https://api.coinmarketcap.com/v1/ticker/<?php echo $coin ?>/?convert=EUR";
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                var json = JSON.parse(this.responseText);

                var prijs = json[0].price_usd;
                var change = json[0].percent_change_24h;
                var eur = json[0].price_eur;
                var btc = json[0].price_btc;
                var rank = json[0].rank;
                var cap = json[0].market_cap_usd;
                var volume = json[0]['24h_volume_eur'];

                document.getElementById("prijs").innerHTML = '$'+prijs;
                if ( parseFloat(change) >= 0)
                {
                    document.getElementById("percent").innerHTML = '(' + change + '%)';
                    document.getElementById("percent").style.color = '#093';
                } else {
                    document.getElementById("percent").innerHTML = '(' + change + '%)';
                    document.getElementById("percent").style.color = '#d14836';
                }

                document.getElementById("usd").innerHTML = 'eur: \u20AC '+eur;
                document.getElementById("btc").innerHTML = 'btc: '+btc;
                document.getElementById("rank").innerHTML = 'rank: '+rank;
                document.getElementById("cap").innerHTML = 'market cap: $ '+cap;
                document.getElementById("volume").innerHTML = 'volume: \u20AC '+volume;


            }

        };
        xmlhttp.open("GET", url , true);
        xmlhttp.send();
        setTimeout( getData, 4000 );

    }
</script>
</body>