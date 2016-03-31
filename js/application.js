        var position = [37.388784, -121.930899];
        function initialize() {

            var myOptions = {
                zoom: 200,
                streetViewControl: true,
                scaleControl: true,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };

            map = new google.maps.Map(document.getElementById('googlemaps'),
                myOptions);

            latLng = new google.maps.LatLng(position[0], position[1]);

            map.setCenter(latLng);

            marker = new google.maps.Marker({
                position: latLng,
                map: map,
                draggable: false,
                animation: google.maps.Animation.DROP
            });
        }
        google.maps.event.addDomListener(window, 'load', initialize);
