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
	<div id="su">

	</div>
	<div id="MetroMainCont" style=" float:left; width:1040; height:1040px; margin-top:10px; background-color:#FFFFFF; display:none;">
	<div style="position:absolute;width:150px;right:0;z-index:100000;background-color:#fff; font-size:12px;" id="metro_list">
		<ul style="margin:0; padding:0 0 0 10px;">

		</ul>
		<div style="font-size:14px;">
			<a href="javascript:void(0)" onclick="$.fancybox.close();" class="btn">Выбрать</a>
		</div>
	</div>
	
	</div>
<a class="various" href="#MetroMainCont">Inline</a>
</body>
<script id="MetroMapAPI" type="text/javascript" src="moscow_metro_map_api.js" ></script>
<script>
    $(document).ready(function () {
        MosMapApi_Setup('MetroMainCont');
    });

    function MertoActive(p_StationName, p_StationID) {
		var metro = $('#metro_list ul');
		var metro_input = $('#metro');
		if(metro.find('li.metro_list_'+p_StationID).length > 0){
			metro_input.find('[name="metro['+p_StationID+']"]').remove();
			metro.find('li.metro_list_'+p_StationID).remove();
		}else{
			metro_input.append('<input type="hidden" name="metro['+p_StationID+']" value="'+p_StationID+'">');
			metro.append('<li class="metro_list_'+p_StationID+'">'+p_StationName+'</li>');
		}
        //alert(p_StationName + " " + p_StationID);
		$('#metro').val(p_StationID);
		$('.selected-metro-name').text('Выбрано станций '+$('#metro_list ul li').length);
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

