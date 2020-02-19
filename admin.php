<?php
    require_once ('hasAccess.php');
    $sUserLogin = $_SESSION['sLogin'];
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin</title>
</head>
<body>
    <h1>Hi <?= $sUserLogin ?>. You can:</h1>

    <list>
        <ul><a href="">create flight</a></ul>
        <ul><a href="">update flight info</a></ul>
        <ul><a href="">read flight details</a></ul>
        <ul><a href="">delete flight entry</a></ul>
    </list>

    <section>
        <div id="results">results
            <div id="price-options">
                <div>
                    cheapest
                    <p> 6.585 kr 25t. 21min. </p>
                </div>
                <div class="active">
                    best
                    <p> 2.585 kr 5t. 32min. </p>
                </div>
                <div>
                    fastest
                    <p> 9.585 kr 2t. 1min. </p>
                </div>
                <div>
                    custom
                    <p> 10.585 kr 3t. 24min. </p>
                </div>
            </div>
            <div id="flights">
                <div id="flight">
                    <div id="flight-route">
                        <div>check</div>
                        <div>
                            <img class="airline-icon" src="images/airlines/AC.png" alt="">
                        </div>
                        <div>schedule</div>
                        <div>stop</div>
                        <div>total time</div>
                    </div>
                    <div id="flight-buy">
                        <button>buy</button>
                    </div>
                </div>
                <div id="flight">
                    <div id="flight-route">
                        <div>check</div>
                        <div>
                            <img class="airline-icon" src="images/airlines/KL.png" alt="">
                        </div>
                        <div>schedule</div>
                        <div>stop</div>
                        <div>total time</div>
                    </div>
                    <div id="flight-buy">
                        <button>buy</button>
                    </div>
                </div>
            </div>
        </div>
    </section>



</body>
</html>
