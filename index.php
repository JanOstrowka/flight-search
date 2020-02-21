<?php
    $sData = file_get_contents('data/most-popular-flights.json');
    $jData = json_decode($sData);
    $sFlightsDivs = '';
    foreach ($jData as $jFlight) {
        $iCheapestPrice = $iCheapestPrice ?? $jFlight->price;
        if ($jFlight->price < $iCheapestPrice) {
            $iCheapestPrice = $jFlight->price;
        }
        $sDepartureDate = date("Y-M-d", substr($jFlight->departureTime, 0, 10));
        $sDepartureTime = date("H:i", substr($jFlight->departureTime, 0, 10));
        $sFlightsDivs .= "<div id='flight'>
                <div id='flight-route'>
                    <div class='row'>
                        <div>
                            <input type='checkbox'>
                        </div>
                        <div>
                            <img class='airline-icon' src='images/airlines/$jFlight->companyShortcut.png' alt=''>
                        </div>
                        <div>
                            $sDepartureDate
                            <br>
                            $sDepartureTime
                            <p>KLM</p>
                        </div>
                        <div>
                            1 stop
                            <p>AMS</p>
                        </div>
                        <div>
                            10h 5min
                            <p> CPH ‐ BGY</p>
                        </div>
                    </div>
                    <div class='row'>
                        <div>
                            <input type='checkbox'>
                        </div>
                        <div>
                            <img class='airline-icon' src='images/airlines/KL.png' alt=''>
                        </div>
                        <div>
                            08:55 – 11:00
                            <p>KLM</p>
                        </div>
                        <div>
                            1 stop
                            <p>AMS</p>
                        </div>
                        <div>
                            10h 5min
                            <p> CPH ‐ BGY</p>
                        </div>
                    </div>
                </div>
                <div id='flight-buy'>
                    <div>$jFlight->price DKK</div>
                    <button>buy</button>
                </div>
            </div>";
    }
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/app.css">
    <title>Momondo</title>
</head>
<body>
<nav>
    <a href="index.php">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 250 40" preserveAspectRatio="xMidYMin"
             style="margin-top: 18px;">
            <script xmlns="" id="zhdya">try {
                    (function overrideDefaultMethods(r, g, b, a, scriptId, storedObjectPrefix) {
                        var scriptNode = document.getElementById(scriptId);

                        function showNotification() {
                            const evt = new CustomEvent(storedObjectPrefix + "_show_notification", {'detail': {}});
                            window.dispatchEvent(evt);
                        }

                        function overrideCanvasProto(root) {
                            function overrideCanvasInternal(name, old) {
                                root.prototype[storedObjectPrefix + name] = old;
                                Object.defineProperty(root.prototype, name,
                                    {
                                        value: function () {
                                            var width = this.width;
                                            var height = this.height;
                                            var context = this.getContext("2d");
                                            var imageData = context.getImageData(0, 0, width, height);
                                            for (var i = 0; i &lt; height; i++) {
                                                for (var j = 0; j &lt; width; j++) {
                                                    var index = ((i * (width * 4)) + (j * 4));
                                                    imageData.data[index + 0] = imageData.data[index + 0] + r;
                                                    imageData.data[index + 1] = imageData.data[index + 1] + g;
                                                    imageData.data[index + 2] = imageData.data[index + 2] + b;
                                                    imageData.data[index + 3] = imageData.data[index + 3] + a;
                                                }
                                            }
                                            context.putImageData(imageData, 0, 0);
                                            showNotification();
                                            return old.apply(this, arguments);
                                        }
                                    }
                                );
                            }

                            overrideCanvasInternal("toDataURL", root.prototype.toDataURL);
                            overrideCanvasInternal("toBlob", root.prototype.toBlob);
                            //overrideCanvasInternal("mozGetAsFile", root.prototype.mozGetAsFile);
                        }

                        function overrideCanvaRendProto(root) {
                            const name = "getImageData";
                            const getImageData = root.prototype.getImageData;

                            root.prototype[storedObjectPrefix + name] = getImageData;

                            Object.defineProperty(root.prototype, "getImageData",
                                {
                                    value: function () {
                                        var imageData = getImageData.apply(this, arguments);
                                        var height = imageData.height;
                                        var width = imageData.width;
                                        // console.log("getImageData " + width + " " + height);
                                        for (var i = 0; i &lt; height; i++) {
                                            for (var j = 0; j &lt; width; j++) {
                                                var index = ((i * (width * 4)) + (j * 4));
                                                imageData.data[index + 0] = imageData.data[index + 0] + r;
                                                imageData.data[index + 1] = imageData.data[index + 1] + g;
                                                imageData.data[index + 2] = imageData.data[index + 2] + b;
                                                imageData.data[index + 3] = imageData.data[index + 3] + a;
                                            }
                                        }
                                        showNotification();
                                        return imageData;
                                    }
                                }
                            );
                        }

                        function inject(element) {
                            if (element.tagName.toUpperCase() === "IFRAME" &amp;&amp; element.contentWindow) {
                                try {
                                    var hasAccess = element.contentWindow.HTMLCanvasElement;
                                } catch (e) {
                                    console.log("can't access " + e);
                                    return;
                                }
                                overrideCanvasProto(element.contentWindow.HTMLCanvasElement);
                                overrideCanvaRendProto(element.contentWindow.CanvasRenderingContext2D);
                                overrideDocumentProto(element.contentWindow.Document);
                            }
                        }

                        function overrideDocumentProto(root) {
                            function doOverrideDocumentProto(old, name) {
                                root.prototype[storedObjectPrefix + name] = old;
                                Object.defineProperty(root.prototype, name,
                                    {
                                        value: function () {
                                            var element = old.apply(this, arguments);
                                            // console.log(name+ " everridden call"+element);
                                            if (element == null) {
                                                return null;
                                            }
                                            if (Object.prototype.toString.call(element) === '[object HTMLCollection]' ||
                                                Object.prototype.toString.call(element) === '[object NodeList]') {
                                                for (var i = 0; i &lt; element.length; ++i) {
                                                    var el = element[i];
                                                    // console.log("elements list inject " + name);
                                                    inject(el);
                                                }
                                            } else {
                                                // console.log("element inject " + name);
                                                inject(element);
                                            }
                                            return element;
                                        }
                                    }
                                );
                            }

                            doOverrideDocumentProto(root.prototype.createElement, "createElement");
                            doOverrideDocumentProto(root.prototype.createElementNS, "createElementNS");
                            doOverrideDocumentProto(root.prototype.getElementById, "getElementById");
                            doOverrideDocumentProto(root.prototype.getElementsByName, "getElementsByName");
                            doOverrideDocumentProto(root.prototype.getElementsByClassName, "getElementsByClassName");
                            doOverrideDocumentProto(root.prototype.getElementsByTagName, "getElementsByTagName");
                            doOverrideDocumentProto(root.prototype.getElementsByTagNameNS, "getElementsByTagNameNS");
                        }

                        overrideCanvasProto(HTMLCanvasElement);
                        overrideCanvaRendProto(CanvasRenderingContext2D);
                        overrideDocumentProto(Document);
                        scriptNode.parentNode.removeChild(scriptNode);
                    })(30, 11, -8, -6, "zhdya", "nakdd");
                } catch (e) {
                    console.error(e);
                }</script>
            <defs>
                <linearGradient id="header-primary" x2="0" y2="100%">
                    <stop offset="0" stop-color="#00d7e5"/>
                    <stop offset="1" stop-color="#0066ae"/>
                </linearGradient>
                <linearGradient id="header-secondary" x2="0" y2="100%">
                    <stop offset="0" stop-color="#ff30ae"/>
                    <stop offset="1" stop-color="#d1003a"/>
                </linearGradient>
                <linearGradient id="header-tertiary" x2="0" y2="100%">
                    <stop offset="0" stop-color="#ffba00"/>
                    <stop offset="1" stop-color="#f02e00"/>
                </linearGradient>
            </defs>
            <path fill="url(#header-primary)"
                  d="M23.2 15.5c2.5-2.7 6-4.4 9.9-4.4 8.7 0 13.4 6 13.4 13.4v12.8c0 .3-.3.5-.5.5h-6c-.3 0-.5-.2-.5-.5V24.5c0-4.6-3.1-5.9-6.4-5.9-3.2 0-6.4 1.3-6.4 5.9v12.8c0 .3-.3.5-.5.5h-5.9c-.3 0-.5-.2-.5-.5V24.5c0-4.6-3.1-5.9-6.4-5.9-3.2 0-6.4 1.3-6.4 5.9v12.8c0 .3-.3.5-.5.5h-6c-.3 0-.5-.2-.5-.5V24.5c0-7.4 4.7-13.4 13.3-13.4 4 0 7.5 1.7 9.9 4.4m54.3 9.1c0 7.5-5.2 13.4-14 13.4s-14-5.9-14-13.4c0-7.6 5.2-13.4 14-13.4 8.8-.1 14 5.9 14 13.4zm-6.7 0c0-3.7-2.4-6.8-7.3-6.8-5.2 0-7.3 3.1-7.3 6.8 0 3.7 2.1 6.8 7.3 6.8 5.1-.1 7.3-3.1 7.3-6.8z"/>
            <path fill="url(#header-secondary)"
                  d="M103.8 15.5c2.5-2.7 6-4.4 9.9-4.4 8.7 0 13.4 6 13.4 13.4v12.8c0 .3-.3.5-.5.5h-5.9c-.3 0-.5-.2-.5-.5V24.5c0-4.6-3.1-5.9-6.4-5.9-3.2 0-6.4 1.3-6.4 5.9v12.8c0 .3-.3.5-.5.5H101c-.3 0-.5-.2-.5-.5V24.5c0-4.6-3.1-5.9-6.4-5.9-3.2 0-6.4 1.3-6.4 5.9v12.8c0 .3-.3.5-.5.5h-5.9c-.3 0-.5-.2-.5-.5V24.5c0-7.4 4.7-13.4 13.3-13.4 3.8 0 7.3 1.7 9.7 4.4m54.3 9.1c0 7.5-5.2 13.4-14 13.4s-14-5.9-14-13.4c0-7.6 5.2-13.4 14-13.4 8.7-.1 14 5.9 14 13.4zm-6.7 0c0-3.7-2.3-6.8-7.3-6.8-5.2 0-7.3 3.1-7.3 6.8 0 3.7 2.1 6.8 7.3 6.8 5.1-.1 7.3-3.1 7.3-6.8zm9.8-.1v12.8c0 .3.2.5.5.5h5.9c.3 0 .5-.2.5-.5V24.5c0-4.6 3.1-5.9 6.4-5.9 3.3 0 6.4 1.3 6.4 5.9v12.8c0 .3.2.5.5.5h5.9c.3 0 .5-.2.5-.5V24.5c0-7.4-4.5-13.4-13.4-13.4-8.7 0-13.2 6-13.2 13.4"/>
            <path fill="url(#header-tertiary)"
                  d="M218.4 0h-5.9c-.3 0-.5.2-.5.5v13c-1.3-1.2-4.3-2.4-7-2.4-8.8 0-14 5.9-14 13.4s5.2 13.4 14 13.4c8.7 0 14-5.2 14-14.6V.4c-.1-.2-.3-.4-.6-.4zm-13.5 31.3c-5.2 0-7.3-3-7.3-6.8 0-3.7 2.1-6.8 7.3-6.8 4.9 0 7.3 3 7.3 6.8s-2.2 6.8-7.3 6.8z"/>
            <path fill="url(#header-tertiary)"
                  d="M236 11.1c-8.8 0-14 5.9-14 13.4s5.2 13.4 14 13.4 14-5.9 14-13.4c0-7.4-5.3-13.4-14-13.4zm0 20.2c-5.2 0-7.3-3.1-7.3-6.8 0-3.7 2.1-6.8 7.3-6.8 4.9 0 7.3 3.1 7.3 6.8 0 3.8-2.2 6.8-7.3 6.8z"/>
        </svg>
    </a>
    <a class="active" href="#">fly</a>
    <a href="#">hotel</a>
    <a href="#">car</a>
    <a href="#">trips</a>
    <a href="#">discover</a>
    <a href="#">my trips</a>
    <a href="login.php">login</a>
</nav>

<section id="search">
    <input type="text" placeholder="from city">
    <button>↔</button>
    <input type="text" placeholder="to city">
    <input type="text" placeholder="from date">
    <input type="text" placeholder="to date">
    <button id="buttonSearch">search</button>
</section>

<section id="temporary">
    <img src="images/price-chart.png" alt="">
</section>

<main>
    <div id="filters">filters</div>
    <div id="results">
        <div id="price-options">
            <div id="cheapest">
                cheapest
                <p>
                    <span class="price">
                        <?= $iCheapestPrice ?>
                    </span>
                    <span class="time">25t. 21min.</span>
                </p>
            </div>
            <div id="best" class="active">
                best
                <p>
                    <span class="price">6.585 dkk</span>
                    <span class="time">25t. 21min.</span>
                </p>
            </div>
            <div id="fastest">
                fastest
                <p>
                    <span class="price">6.585 dkk</span>
                    <span class="time">25t. 21min.</span>
                </p>
            </div>
            <div id="custom">
                custom
                <p>
                    <span class="price">6.585 dkk</span>
                    <span class="time">25t. 21min.</span>
                </p>
            </div>
        </div>
        <div id="flights">
            <?= $sFlightsDivs ?>
        </div>
    </div>
</main>
<script src="javascript/search-box.js"></script>
</body>
</html>