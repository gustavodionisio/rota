<br>
<div class="alert alert-info">
    Os serviços do Google permitem que até 8 pontos sejam calculados,
    então não importa quantos usuários estejam cadastrados, apenas os
    8 primeiros selecionados.</div>
<div id="map" style="height: 300pt"></div>
<div id="container">
    <br>
    <input type="submit" id="submit" value="Gerar!">
</div>


<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAnaXRONTKZj07Pu8QukB8DLAE2mEiLsJY&callback=initMap"
        async defer></script>
<script>
    function initMap() {
        var directionsService = new google.maps.DirectionsService;
        var directionsDisplay = new google.maps.DirectionsRenderer;
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 6,
            center: {lat: -23.28747449627962, lng: -50.058817863464355}
        });
        directionsDisplay.setMap(map);

        document.getElementById('submit').addEventListener('click', function () {
            calculateAndDisplayRoute(directionsService, directionsDisplay);
        });
    }

    function calculateAndDisplayRoute(directionsService, directionsDisplay) {
        var waypts = [];
//        var checkboxArray = document.getElementById('waypoints');
        var checkboxArray = [];

            <?php
            foreach($usuarios as $model){
                echo "checkboxArray.push(new google.maps.LatLng({$model->latitude}, {$model->longitude}));";
            }
            ?>

        for (var i = 0; i < checkboxArray.length; i++) {
//            if (checkboxArray.options[i].selected) {
            waypts.push({
                location: checkboxArray[i],
//                    location: checkboxArray[i].value,
                stopover: true
            });
//            }
        }

        directionsService.route({
//            origin: document.getElementById('start').value,
            origin: new google.maps.LatLng(-23.28747449627962, -50.058817863464355),
            destination: new google.maps.LatLng(-23.276515520853387, -50.07139205932617),
//            destination: document.getElementById('end').value,
            waypoints: waypts,
            optimizeWaypoints: true,
            travelMode: google.maps.TravelMode.DRIVING
        }, function (response, status) {
            if (status === google.maps.DirectionsStatus.OK) {
                directionsDisplay.setDirections(response);
                var route = response.routes[0];
                var summaryPanel = document.getElementById('directions-panel');
                summaryPanel.innerHTML = '';
                // For each route, display summary information.
                for (var i = 0; i < route.legs.length; i++) {
                    var routeSegment = i + 1;
                    summaryPanel.innerHTML += '<b>Route Segment: ' + routeSegment +
                        '</b><br>';
                    summaryPanel.innerHTML += route.legs[i].start_address + ' to ';
                    summaryPanel.innerHTML += route.legs[i].end_address + '<br>';
                    summaryPanel.innerHTML += route.legs[i].distance.text + '<br><br>';
                }
            } else {
                window.alert('Directions request failed due to ' + status);
            }
        });
    }

</script>