<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>State of Mind</title>
    <meta property="og:title" content="State of Mind | Coming Soon">
    <meta property="og:description" content="Offering tour packages for individuals or groups.">
    <meta property="og:image" content="https://stateofmind.blog/Admin/src/img/Meta_Logo.png">
    <meta property="og:url" content="http://stateofmind.blog">


    <meta name="twitter:title" content="State of Mind | Coming Soon">
    <meta name="twitter:description" content=" Offering tour packages for individuals or groups.">
    <meta name="twitter:image" content="https://stateofmind.blog/Admin/src/img/Meta_Logo.png">
    <meta name="twitter:card" content="summary_large_image">



    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link rel="stylesheet" href="font/iconsmind-s/css/iconsminds.css" />
    <link rel="stylesheet" href="font/simple-line-icons/css/simple-line-icons.css" />

    <link rel="stylesheet" href="css/vendor/bootstrap.min.css" />
    <link rel="stylesheet" href="css/vendor/bootstrap.rtl.only.min.css" />
    <link rel="stylesheet" href="css/main.css" />
</head>

<body class="background show-spinner no-footer">
    <div class="fixed-background"></div>
    <main>
        <div class="container">
            <div class="row h-100">
                <div class="col-12 col-sm-8 col-md-10 mx-auto my-auto">
                    <div class="card index-card">
                        <div class="card-body text-center form-side">
                            <a href="#">
                                <span class="logo-single"></span>
                            </a>
                            <p class="lead mb-5">State of Mind will be available soon!</p>
                            <div id="demo" class="mb-5"></div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="js/vendor/jquery-3.3.1.min.js"></script>
    <script src="js/vendor/bootstrap.bundle.min.js"></script>
    <script src="js/vendor/countdown.min.js"></script>
    <script src="js/dore.script.js"></script>
    <script src="js/scripts.js"></script>
    <script>
        // Set the date we're counting down to
        var countDownDate = new Date("Feb 10, 2021 15:37:25").getTime();
        console.log(countDownDate)
        // Update the count down every 1 second
        var x = setInterval(function() {

            // Get today's date and time
            var now = new Date().getTime();

            // Find the distance between now and the count down date
            var distance = countDownDate - now;

            // Time calculations for days, hours, minutes and seconds
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

            // Display the result in the element with id="demo"
            document.getElementById("demo").innerHTML = "<span class='timer-column'><p class='lead text-center'>" + days + "</p><p>Days</p></span><span class='timer-column'><p class='lead text-center'>" + hours + "</p><p>Hours</p></span><span class='timer-column'><p class='lead text-center'>" + minutes + "</p><p>Minutes</p></span><span class='timer-column'><p class='lead text-center'>" + seconds + "</p><p>Seconds</p></span>";

            // If the count down is finished, write some text
            if (distance < 0) {
                clearInterval(x);
                document.getElementById("demo").innerHTML = "EXPIRED";
            }
        }, 1000);
    </script>
</body>

</html>