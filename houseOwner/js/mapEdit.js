  
        var inputLat =   document.getElementById("inputLat");
        var inputLong =   document.getElementById("inputLong");
        var btnGetLoc = document.getElementById("btnGetLoc");


        console.log(inputLat, inputLong);

        var x = 26.673654424559995;
        var y = 87.2776081289503;
        // Initialize the map
        var map = L.map('map').setView([parseFloat(inputLat.value), parseFloat(inputLong.value)], 13); // Set the default view to Itahari, Nepal

        // Add the tile layer to the map
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors',
            maxZoom: 18,
        }).addTo(map);

        // Add a marker for Itahari
        var itahariMarker = L.marker([x, y]).addTo(map);
        itahariMarker.bindPopup("Itahari, Nepal").openPopup();

        // Center the map view to Itahari
        map.setView([x, y], 13);

        //chnage marker
        var changeMark = null;
        //gps marker
        var gpsMarker = null;

        function getCurrentLocation() {
                btnGetLoc.textContent = "Loading...";
            // Check if geolocation is supported
            if (navigator.geolocation) {
                // Remove the default marker
                map.removeLayer(itahariMarker);

                if(changeMark){
                    map.removeLayer(changeMark);
                }
                // Get the current location coordinates
                navigator.geolocation.getCurrentPosition(

                    function (position) {
                        var lat = position.coords.latitude;
                        var lon = position.coords.longitude;

                        console.log('lat', lat);
                        console.log('lon', lon);

                        // Create a marker at the current location
                        gpsMarker = L.marker([lat, lon]).addTo(map);
                        gpsMarker.bindPopup("Your Location").openPopup();

                        // Update the map view to the current location
                       map.setView([lat, lon], 16);
                       inputLat.value = lat; // Update input value directly
                       inputLong.value = lon; // Update input value directly
                           btnGetLoc.textContent = "Get My Location";
                    },
                    function (error) {
                        console.error('Error getting current location:', error);
                    }
                );
            } else {
                console.error('Geolocation is not supported by this browser.');
            }
        }

        function changeLoc(){
            
            newLat =  inputLat.value;
            newLong = inputLong.value;
            // Create a marker at the current location
            if(gpsMarker){
                map.removeLayer(gpsMarker);
            }
            if(itahariMarker){
                map.removeLayer(itahariMarker);
            }
            changeMark = L.marker([newLat, newLong]).addTo(map);
            changeMark.bindPopup("Updated Location").openPopup();
            // Update the map view to the current location
            map.setView([newLat, newLong], 16);
        }