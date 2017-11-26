<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-COMPATIBLE" content="IE=edge">
    <meta name="viewport" content="width = device-width, initial-scale = 1">
    <title>Crypto Ticker</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>

<a href=""><img id="logo" src="images/sonm.png"></a>
<h1 id="prijs"></h1>
<h2 id="percent"></h2>
<div class="divname">
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

<script>


    getData();
    function getData(){

        var url = "https://api.coinmarketcap.com/v1/ticker/sonm/?convert=EUR";
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                var json = JSON.parse(this.responseText);

                var prijs = json[0].price_eur;
                var change = json[0].percent_change_24h;
                var usd = json[0].price_usd;
                var btc = json[0].price_btc;
                var rank = json[0].rank;
                var cap = json[0].market_cap_usd;
                var volume = json[0]['24h_volume_eur'];

                document.getElementById("prijs").innerHTML = '\u20AC '+prijs;
                if ( parseFloat(change) >= 0)
                {
                    document.getElementById("percent").innerHTML = '(' + change + '%)';
                    document.getElementById("percent").style.color = '#093';
                } else {
                    document.getElementById("percent").innerHTML = '(' + change + '%)';
                    document.getElementById("percent").style.color = '#d14836';
                }

                document.getElementById("usd").innerHTML = 'usd: $ '+usd;
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