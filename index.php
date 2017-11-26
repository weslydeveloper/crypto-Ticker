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
<div class="content">
    <div class="coin-field sonm startsonm">
        <div class="coin">
            <a href="coin.php?coin=sonm"><img src="images/sonm.png"></a>
        </div>
    </div>
    <div class="coin-field btc startbtc">
        <div class="coin">
            <a href="coin.php?coin=btc"><img src="images/bitcoin.png"></a>
        </div>
    </div>
    <div class="coin-field eth starteth">
        <div class="coin">
            <a href="coin.php?coin=eth"><img src="images/ethereum.png"></a>
        </div>
    </div>
</div>
<script>
    $(function() {
        $(".<?php echo $_GET['coin']?>").css('z-index', 3000);
    });
</script>
</body>