let mapa;

// Funcion initMap para especificar todas las caracteristicas del mapa y crearlo.
function initMap() {
  // Arreglo de los lugares que se muestran 
  const lugares = [
    {
      nombre: "Universidad Tecnológica de Puebla",
      latitud: 19.058254567837125,
      longitud: -98.15176854635202,
    },
    {
      nombre: "Catedral de Puebla",
      latitud: 19.04275386855139,
      longitud: -98.19853892873248,
    },
    {
      nombre: "Museo del Fuerte de Loreto",
      latitud: 19.057773947180998,
      longitud: -98.18704062289943,
    },
    {
      nombre: "Fuente de los Frailes",
      latitud: 19.096620535720444,
      longitud: -98.23356690237293,
    },
    {
      nombre: "Casa de Diego Eduardo",
      latitud: 19.058385, 
      longitud: -98.170535,
    },
    {
      nombre: "Casa de Carlos",
      latitud: 18.964576, 
      longitud: -98.261826,
    },
    {
      nombre: "Casa de Arturo Leonel",
      latitud: 19.039524,
      longitud: -98.131425,
    },
  ];
  
  // Creamos un nuevo mapa.
  mapa = new google.maps.Map(document.getElementById("map"), {
    center: { lat: 19.044774, lng: -98.198309 }, // Cordenadas centrales del mapa {Centro de Puebla}.
    zoom: 10, // Zoom del mapa.
  });

  for (const lugar of lugares) {
    agregarMarcador(lugar.nombre, lugar.latitud, lugar.longitud);
  }
}

// Funcion para creear los marcadores.
function agregarMarcador(nombre, latitud, longitud) {
  const marker = new google.maps.Marker({
    position: { lat: latitud, lng: longitud }, // Coordenadas del marcador.
    map: mapa, // El lugar a donde se va añadir.
    title: nombre, // Nombre del marcador.
    draggable: true, // Propiedad para que sea arrastrable.
    animation: google.maps.Animation.DROP,
    icon: {
      url: 'http://maps.google.com/mapfiles/ms/icons/blue-dot.png', // URL de la imagen del marcador
      scaledSize: new google.maps.Size(60, 60), // Tamaño del marcador
    }
  });
  

}

// Trazar una ruta entre dos puntos.
function trazarRuta() {
  // Treamos los lugares al que le vamos a crear la ruta.
  const origen = document.getElementById("origenInput").value;
  const destino = document.getElementById("destinoInput").value;
  

  // Servicio que solicita las rutas y las calcula.
  const directionsService = new google.maps.DirectionsService();

  const directionsRenderer = new google.maps.DirectionsRenderer({
    polylineOptions: {
      strokeColor: '#aa6581' 
    },});

  // se establece el lugar donde se van a renderizar las rutas.
  directionsRenderer.setMap(mapa);
  
  // obtenemos las direcciones
  directionsService.route(
    {
      origin: origen,
      destination: destino,
      travelMode: "DRIVING", // Tipo de ruta que se va a calcular {WALKING', 'BICYCLING', o 'TRANSIT}.
    },
    (response, status) => { // Evaluamos status de la peticion.
      if (status === "OK") {
        directionsRenderer.setDirections(response); // Renderizamos la ruta.

        // Obtenemos la duración del viaje 
        const duration = response.routes[0].legs[0].duration.text;

        document.getElementById("tiempoViaje").textContent = "Tiempo estimado: " + duration; // Rendirezamos la ruta.
      } else {
        window.alert("No se pudo calcular la ruta:" + status); // Mostramos un mensjae de error. 
      }
    }
  );
  document.getElementById("origenInput").value = "";
  document.getElementById("destinoInput").value = "";
}

initMap(); //se inicial8iza la funcion