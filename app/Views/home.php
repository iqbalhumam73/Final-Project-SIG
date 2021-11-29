<!DOCTYPE html>
<html lang="en">
<title>Coffee Shop Sby</title>
<meta charset="UTF-8">

<!-- CSS Template -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<!-- Leaflet CSS -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />





<style>
    body {
        font-family: "Lato", sans-serif
    }

    .mySlides {
        display: none
    }

    #map {
        height: 600px;
        width: 1100px;
        margin: 5rem auto;
    }
</style>

<body>
    <!-- Navbar -->
    <div class="w3-top">
        <div class="w3-bar w3-black w3-card">
            <a class="w3-bar-item w3-button w3-padding-large w3-hide-medium w3-hide-large w3-right" href="javascript:void(0)" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
            <!-- <a href="/" class="w3-bar-item w3-button w3-padding-large">Welcome Message</a> -->
            <a href="/" class="w3-bar-item w3-button w3-padding-large w3-hide-small">Home</a>
            <!-- <a href="/maps" class="w3-bar-item w3-button w3-padding-large w3-hide-small">Maps</a> -->
            <a href="/coffeeshoplist" class="w3-bar-item w3-button w3-padding-large w3-hide-small">Coffee Shop</a>
            <a href="javascript:void(0)" class="w3-padding-large w3-hover-red w3-hide-small w3-right"><i class="fa fa-search"></i></a>
        </div>
    </div>

    <!-- Page content -->
    <div class="w3-content" style="max-width:2000px;margin-top:46px">

        <!-- Slideshow Iklan -->
        <div class="mySlides w3-display-container w3-center">
            <img src="https://wallpaperaccess.com/full/1282257.jpg" style="width:100%">
            <div class="w3-display-bottommiddle w3-container w3-text-white w3-padding-32 w3-hide-small">
                <h3>#NgopiDiRumahAja</h3>
                <p><b>Janji Jiwa</b></p>
            </div>
        </div>
        <div class="mySlides w3-display-container w3-center">
            <img src="https://wallpapercave.com/wp/wp4473714.jpg" style="width:100%">
            <div class="w3-display-bottommiddle w3-container w3-text-white w3-padding-32 w3-hide-small">
                <h3>you kept me like a secret, but i kept you like an oath</h3>
                <p><b>Taylor Swift</b></p>
            </div>
        </div>
        <div class="mySlides w3-display-container w3-center">
            <img src="https://wallpapercave.com/wp/wp8053456.jpg" style="width:100%">
            <div class="w3-display-bottommiddle w3-container w3-text-white w3-padding-32 w3-hide-small">
                <h3>PPKM SERU BARENG EXCELSO</h3>
                <p><b>Excelso</b></p>
            </div>
        </div>


        <!-- Map Section -->
        <div id="map"></div>

        <!-- main.js for mapbox -->
        <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
        <script src="js/main.js"></script>

        <!-- End of Map Section -->

    </div>
    <!-- End Page Content -->

    <!-- Image of location/map -->
    <img src="/w3images/map.jpg" class="w3-image w3-greyscale-min" style="width:100%">

    <!-- Footer -->
    <footer class="w3-container w3-padding-64 w3-center w3-opacity w3-light-grey w3-xlarge">
        <i class="fa fa-facebook-official w3-hover-opacity"></i>
        <i class="fa fa-instagram w3-hover-opacity"></i>
        <i class="fa fa-snapchat w3-hover-opacity"></i>
        <i class="fa fa-pinterest-p w3-hover-opacity"></i>
        <i class="fa fa-twitter w3-hover-opacity"></i>
        <i class="fa fa-linkedin w3-hover-opacity"></i>
        <p class="w3-medium">Powered by <a href="https://www.w3schools.com/w3css/default.asp" target="_blank">w3.css</a></p>
    </footer>

    <script>
        // Automatic Slideshow - change image every 4 seconds
        var myIndex = 0;
        carousel();

        function carousel() {
            var i;
            var x = document.getElementsByClassName("mySlides");
            for (i = 0; i < x.length; i++) {
                x[i].style.display = "none";
            }
            myIndex++;
            if (myIndex > x.length) {
                myIndex = 1
            }
            x[myIndex - 1].style.display = "block";
            setTimeout(carousel, 4000);
        }

        // Used to toggle the menu on small screens when clicking on the menu button
        function myFunction() {
            var x = document.getElementById("navDemo");
            if (x.className.indexOf("w3-show") == -1) {
                x.className += " w3-show";
            } else {
                x.className = x.className.replace(" w3-show", "");
            }
        }

        // When the user clicks anywhere outside of the modal, close it
        var modal = document.getElementById('ticketModal');
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>

</body>

</html>