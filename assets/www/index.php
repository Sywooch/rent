<!DOCTYPE html>
<html>
<head>
	<title>Метро</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<script type="text/javascript" src="lib/jquery-1.10.1.min.js"></script>
	<script type="text/javascript" src="source/jquery.fancybox.js?v=2.1.5"></script>
	<link rel="stylesheet" type="text/css" href="source/jquery.fancybox.css?v=2.1.5" media="screen" />


</head>
<body>
	<div class="selected-metro-name"></div>
	<input type="hidden" name="metro" id="metro" value="">
	<a class="load-map" href="ajax.html" data-fancybox-type="ajax">Ajax</a>
</body>
</html>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=true"></script>
<script>
$(document).ready(function() {
	$(".load-map").fancybox({
				width:700,
				height:700
	});
});
</script>
