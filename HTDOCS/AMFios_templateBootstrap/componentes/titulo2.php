<?php

$sobreSite = "
<b>Endereço</b>: R. Pedro Bertozi, 8 - Vl Olímpica, Poços de Caldas - MG, 37704-375<br>
<b>Telefone:</b> (35) 3722-0808<br>
<b>Horário:</b> Segunda - Sexta · 07:30–18:00
";


?>


<!-- About Section -->
<div class="w3-container w3-padding-32" id="<?php echo $linkTitulo2; ?>">
	<br><br>
	<h3 class="w3-border-bottom w3-border-light-grey w3-padding-16 corPrincipalText">
		<?php echo $titulo2; ?>
	</h3>
	<p>
		<?php echo $sobreSite; ?>
	</p>
</div>

<!-- Google Map -->
<div id="googleMap" class="w3-grayscale" style="width:100%;height:450px;"></div>


<!-- Add Google Maps -->
<script>
function myMap()
{
	myCenter=new google.maps.LatLng(-21.779533, -46.60325899999998);

	var mapOptions= {
	center:myCenter,
	zoom:15, scrollwheel: false, draggable: false,
	mapTypeId:google.maps.MapTypeId.ROADMAP
	};
	var map=new google.maps.Map(document.getElementById("googleMap"),mapOptions);

	var marker = new google.maps.Marker({
	position: myCenter,
	});
	marker.setMap(map);
}

</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCoMdP7QZuhbnjCzwcBjqydWDaCzUisWlA&callback=myMap"></script>