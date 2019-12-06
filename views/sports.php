<?php
include_once 'header.php';
?>
<h1>Section sport</h1>

  <p>Un peu gros mais pas trop ? Envie de perdre quelques kilos ? Viens t'éclater avec d'autres compères dans plein de sports de ta région ☻</p>
  <p>La pratique du sport est essentielle pour la réussite de ses études. Elle permet l'évasion du stress éventuel, permet de rencontrer de nouvelles connaissances tout en s'amusant.</p>
  <p>Pour les plus motivés, la pratique du sport en compétitions est aussi disponible !</p>

  <h2>Du côté de Strasbourg ?</h2>
  <a href="https://www.strasbourg.eu/activites-sportives-proposees">Pratique sportive près de Strasbourg</a>


  <h2>Dans la région de Mulhouse ?</h2>
  <p>Découvre les différents sports en clubs ou avec les associations étudiantes</p>
  <a href="https://www.mulhouse.fr/bouger-sortir/sport/pratiques-sportives-ouvertes/">Faire du sport à Mulhouse</a>
  <script src='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.4.2/mapbox-gl-geocoder.min.js'></script>
        <link rel='stylesheet' href='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.4.2/mapbox-gl-geocoder.css' type='text/css' />
        <script src="https://cdn.jsdelivr.net/npm/es6-promise@4/dist/es6-promise.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/es6-promise@4/dist/es6-promise.auto.min.js"></script>
          <div id='map'></div>

        <script>
          mapboxgl.accessToken = 'pk.eyJ1Ijoibmljb251aXRkZWxpbmZvIiwiYSI6ImNrM3RiMjN6aTAwenkzbnBzNTM2eTVuNWwifQ.CIJrzI0F2tlctfZSQ-w8uA';
          var map = new mapboxgl.Map({
            container: 'map',
            style: 'mapbox://styles/mapbox/streets-v11',
            center: [7.335888, 47.750839],
            zoom: 12
          });

          var customData = {
            "features": [
              {
                "type":"Features",
                "properties": {"title": "Palais des sports","description" : "Un lieu pour faire du sport"},
                "text": "Sport",
                "geometry":{"coordinates":[7.319185,47.739013],"type": "Point"}
              },
              {
                "type":"Features",
                "properties": {"title": "Basic fit 🏋","description" : "Salle de musculation"},
                "text": "Sport",
                "geometry":{"coordinates":[7.2880185,47.7372577],"type": "Point"}
              },
              {
                "type":"Features",
                "properties": {"title": "Patinoire de Mulhouse ⛸","description" : "Slider comme un chef"},
                "text": "Sport",
                "geometry":{"coordinates":[7.320280,47.736092],"type": "Point"}
              }
            ]
            };
          function forwardGeocoder(query) {
            var matchingFeatures = [];
            for (var i = 0; i < customData.features.length; i++) {
              var feature = customData.features[i];
              if (feature.text.toLowerCase().search(query.toLowerCase()) !== -1) {
                feature['place_type'] = ['Sport'];
                feature['place_name'] = feature.properties.title;
                feature['center'] = feature.geometry.coordinates;
              matchingFeatures.push(feature);
              }
            }
            return matchingFeatures;
          }
        map.addControl(new MapboxGeocoder({
        accessToken: mapboxgl.accessToken,
        localGeocoder: forwardGeocoder,
        placeholder: "Ex: Sport",
        mapboxgl: mapboxgl
        }));

      </script>




<?php
include_once 'footer.php';
?>
