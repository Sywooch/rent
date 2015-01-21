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
	<div id="MetroMainCont" style=" float:left; width:1040; height:1040px; margin-top:10px; background-color:#FFFFFF; display:none;"></div>
<a class="various" href="#MetroMainCont">Inline</a>
</body>
<script id="MetroMapAPI" type="text/javascript" src="moscow_metro_map_api.js" ></script>
<script>
    $(document).ready(function () {
        MosMapApi_Setup('MetroMainCont');
    });

    function MertoActive(p_StationName, p_StationID) {
        //alert(p_StationName + " " + p_StationID);
		$('#metro').val(p_StationID);
		$('.selected-metro-name').text(p_StationName);
		$.fancybox.close();
    }
	$(".various").fancybox({
		maxWidth	: 1040,
		maxHeight	: 1040,
		fitToView	: false,
		width		: '100%',
		height		: '100%',
		autoSize	: false,
		closeClick	: false,
		openEffect	: 'none',
		closeEffect	: 'none'
	});	
	
</script>
</html>

