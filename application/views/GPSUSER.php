<div id="page-wrapper">
<html lang="en">



  <!-- Bootstrap core CSS -->


	<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCO_0P33j5Cu3TcVG1yqGxgDcnNdDrFgLc&callback=initMap"
    type="text/javascript"></script>

<script language="JavaScript">

function initMap() { 
	var myOptions = {
	  zoom: 9,
	  center: new google.maps.LatLng(15.000682,103.728207),
	};

	var map = new google.maps.Map(document.getElementById('map_canvas'),
		myOptions);


	var marker = new  google.maps.Marker({
		map:map,
		position: new google.maps.LatLng(15.000682,103.728207),
		draggalbe:true

	});

	var infowindow = new google.maps.InfoWindow({
		map:map,
		content:"Hello",
		position: new google.maps.LatLng(15.000682,103.728207)

	});

	google.maps.event.addListener(map,'click',function(event){
		infowindow.open(map,marker);
		infowindow.setContent("LatLng = " + event.latLng);
		infowindow.setPosition(event.latLng);
		marker.setPosition(event.latLng);

		$("#lat").val(event.latLng.lat());
		$("#lng").val(event.latLng.lng());

		
	});	

}


function saveLocation(){
var location_name  = $("#location_name").val();
var lat  = $("#lat").val();
var lng  = $("#lng").val();
var location_type  = $("#location_type option:selected").val();

$.ajax({
method:"POST",
url:"insert.php",
data:{ location_name:location_name,lat:lat,lng:lng,location_type:location_type   }
}).done(function(){
alert("OK");
});

}



</script>
</head>
<body>

	<div class="">

		<div class="col-8">
		<div id="map_canvas" style="width:100%;height:100vh"></div>
		</div>

		<div class="col-4">
		<div style="margin-top:70px">
		
				

		</div>
		</div>

	</div>

	</body>
	</html>
        
       
       

</div>
