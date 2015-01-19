<script src="http://api-maps.yandex.ru/1.1/index.xml" type="text/javascript"></script>

<div id="YMapsID" style="width:600px;height:400px"></div>

<script type="text/javascript">
    // Создает обработчик события window.onLoad
    YMaps.jQuery(function () {
        // Создает экземпляр карты и привязывает его к созданному контейнеру
        var map = new YMaps.Map(YMaps.jQuery("#YMapsID")[0]);
            
        // Устанавливает начальные параметры отображения карты: центр карты и коэффициент масштабирования
        map.setCenter(new YMaps.GeoPoint(37.64, 55.76), 10);
    })
</script>