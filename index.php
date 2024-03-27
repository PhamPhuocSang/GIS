

<!DOCTYPE html>
<html>

<head>
	<title>Geolocation</title>
	<link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css" />
	<link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.css" />

	<style>
		body {
			margin: 0;
			padding: 0;
		}
	</style>

</head>

<body>
	<div id="map" style="width:100%; height: 100vh"></div>
	<script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js"></script>
	<script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script>
	<!-- <script src="vn.geojson"></script> -->


	<script>

		var map = L.map('map').setView([ 10.128012222663713,105.52961441188978],11);
		mapLink = "<a href='http://openstreetmap.org'>OpenStreetMap</a>";
		L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', { attribution: 'Leaflet &copy; ' + mapLink + ', contribution', maxZoom: 18 }).addTo(map);

		// Sử dụng fetch để tải file JSON từ URL hoặc từ file trên máy chủ
		fetch('vn.json')
		.then(response => response.json())
		.then(data => {
			// Chuyển đổi chuỗi JSON thành đối tượng Javascript
			const obj = JSON.parse(data);

			// Hiển thị đối tượng Javascript trên console log
			console.log(obj);
		})
		.catch(error => console.error(error));
	</script>


</body>

</html>
