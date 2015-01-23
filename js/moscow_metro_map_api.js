

var MosMapApi_MetroMainCont = "";

var MosMapApi_MapImage = "moscow_metro_map_api.jpg";



var MisMapApi_Css = "";

MisMapApi_Css += ".MB_PURPLE{position:absolute;width:11px; height:11px;border-radius:10px; cursor:pointer;background-color:#b5198d;} ";

MisMapApi_Css += ".MB_GREEN{ position:absolute; width:11px; height:11px; border-radius:10px; cursor:pointer; background-color:#029b52; } ";

MisMapApi_Css += ".MB_GREY{ position:absolute; width:11px; height:11px; border-radius:10px; cursor:pointer; background-color:#a9a9a9; } ";

MisMapApi_Css += ".MB_LIGHTGREEN{ position:absolute; width:11px; height:11px; border-radius:10px; cursor:pointer; background-color:#b3d52e; } ";

MisMapApi_Css += ".MB_ORANGE{ position:absolute; width:11px; height:11px; border-radius:10px; cursor:pointer; background-color:#ffab2e; } ";

MisMapApi_Css += ".MB_RED{ position:absolute; width:11px; height:11px; border-radius:10px; cursor:pointer; background-color:#ff0000; } ";

MisMapApi_Css += ".MB_BLUE{ position:absolute; width:11px; height:11px; border-radius:10px; cursor:pointer; background-color:#0256a4; } ";

MisMapApi_Css += ".MB_YELLOW{ position:absolute; width:11px; height:11px; border-radius:10px; cursor:pointer; background-color:#ffd702; } ";

MisMapApi_Css += ".MB_LIGHTBLUE{ position:absolute; width:11px; height:11px; border-radius:10px; cursor:pointer; background-color:#029ee0; } ";

MisMapApi_Css += ".MB_LIGHTBLUE2{ position:absolute; width:11px; height:11px; border-radius:10px; cursor:pointer; background-color:#1a8bb9; } ";

MisMapApi_Css += ".MB_LIGHTBLUE3{ position:absolute; width:11px; height:11px; border-radius:10px; cursor:pointer; background-color:#9ddefb; } ";

MisMapApi_Css += ".MB_BROWN{ position:absolute; width:11px; height:11px; border-radius:10px; cursor:pointer; background-color:#71592e; } ";



MisMapApi_Css += ".station_name{ position:absolute; height:11px; width:100px; border-radius:10px; cursor:pointer; border: 0px solid black;} ";

MisMapApi_Css += ".station_name:hover{border: 0px solid black;} ";







if (typeof jQuery == 'undefined') {

    var tag_jquery = document.createElement('script');

    tag_jquery.src = "//code.jquery.com/jquery-1.8.3.min.js";

    var firstScriptTag_jquery = document.getElementsByTagName('script')[0];

    firstScriptTag_jquery.parentNode.insertBefore(tag_jquery, firstScriptTag_jquery);

}







//

// Note: need to implement in your code method 

//

// function MertoActive(p_StationName, p_StationID){ /*YOUR LOGIC*/ }

//

function MosMapApi_Setup(p_MetroMainCont) {

    

    MosMapApi_MetroMainCont = p_MetroMainCont;


	


    var myScript = document.getElementById("MetroMapAPI");
    console.log(myScript);

    var myScriptSrc = myScript.getAttribute('src');

    MosMapApi_MapImage = myScriptSrc.replace(".js", ".jpg")

    

    

    addCss(MisMapApi_Css);





    $("#" + MosMapApi_MetroMainCont).append("<div id=\"MosMapApi_mapContHldr\" style=\" position:relative; margin:auto; width:1040px; height:1040px; background:url('" + MosMapApi_MapImage + "') no-repeat;\"></div>");



    

    for (var i = 0; i < MosMapApi_Stations.length; i++) {

        $("#MosMapApi_mapContHldr").append("<div class=\"" + MosMapApi_Stations[i].line + "\" onclick=\"MertoActive('" + MosMapApi_Stations[i].name + "', " + MosMapApi_Stations[i].id + ");\" style=\" left:" + MosMapApi_Stations[i].left + "px; top:" + MosMapApi_Stations[i].top + "px; \"><div class='station_name' style='left:" + MosMapApi_Stations[i].name_left + "px; top:" + MosMapApi_Stations[i].name_top + "px; width:" + MosMapApi_Stations[i].name_width + "px;'></div></div>");

		//$("#MosMapApi_mapContHldr").append("<div class='station_name'></div>");

    }



}













function addCss(cssCode) {

    var styleElement = document.createElement("style");

    styleElement.type = "text/css";

    if (styleElement.styleSheet) {

        styleElement.styleSheet.cssText = cssCode;

    } else {

        styleElement.appendChild(document.createTextNode(cssCode));

    }

    document.getElementsByTagName("head")[0].appendChild(styleElement);

}













var MosMapApi_Stations = new Array();



//<!-- PURPLE -->

MosMapApi_Stations.push({ id: 1, line: "MB_PURPLE", name: "Планерная", left: 177, top: 155, name_left: -56, name_top: -1, name_width: 50});

MosMapApi_Stations.push({ id: 2, line: "MB_PURPLE", name: "Сходненская", left: 177, top: 179, name_left: -71, name_top: -1, name_width: 68});

MosMapApi_Stations.push({ id: 3, line: "MB_PURPLE", name: "Тушинская", left: 177, top: 203, name_left: -60, name_top: -1, name_width: 57});

MosMapApi_Stations.push({ id: 4, line: "MB_PURPLE", name: "Спартак", left: 177, top: 225, name_left: -52, name_top: 4, name_width: 51});



MosMapApi_Stations.push({ id: 5, line: "MB_PURPLE", name: "Щукинская", left: 201, top: 251, name_left: -59, name_top: 6, name_width: 57});

MosMapApi_Stations.push({ id: 6, line: "MB_PURPLE", name: "Октябрьское Поле", left: 225, top: 275, name_left: -93, name_top: 5, name_width: 91});

MosMapApi_Stations.push({ id: 7, line: "MB_PURPLE", name: "Полежаевская", left: 252, top: 302, name_left: -89, name_top: 0, name_width: 84});

MosMapApi_Stations.push({ id: 8, line: "MB_PURPLE", name: "Беговая", left: 276, top: 325, name_left: 12, name_top: -8, name_width: 44});

MosMapApi_Stations.push({ id: 9, line: "MB_PURPLE", name: "Улица 1905 года", left: 296, top: 345, name_left: 8, name_top: -10, name_width: 85});



MosMapApi_Stations.push({ id: 10, line: "MB_PURPLE", name: "Баррикадная", left: 321, top: 368, name_left: 11, name_top: -11, name_width: 73});

MosMapApi_Stations.push({ id: 11, line: "MB_PURPLE", name: "Пушкинская", left: 425, top: 368, name_left: 10, name_top: -10, name_width: 71});

MosMapApi_Stations.push({ id: 12, line: "MB_PURPLE", name: "Кузнецкий мост", left: 534, top: 394, name_left: -65, name_top: 3, name_width: 62});

MosMapApi_Stations.push({ id: 13, line: "MB_PURPLE", name: "Китай-город", left: 595, top: 511, name_left: 13, name_top: -2, name_width: 70});

MosMapApi_Stations.push({ id: 14, line: "MB_PURPLE", name: "Таганская", left: 679, top: 597, name_left: -31, name_top: -48, name_width: 63});



MosMapApi_Stations.push({ id: 15, line: "MB_PURPLE", name: "Пролетарская", left: 741, top: 657, name_left: 25, name_top: 0, name_width: 72});

MosMapApi_Stations.push({ id: 16, line: "MB_PURPLE", name: "Волгоградский проспект", left: 780, top: 695, name_left: 4, name_top: -21, name_width: 74});

MosMapApi_Stations.push({ id: 17, line: "MB_PURPLE", name: "Текстильщики", left: 835, top: 703, name_left: 3, name_top: 13, name_width: 80});

MosMapApi_Stations.push({ id: 18, line: "MB_PURPLE", name: "Кузьминки", left: 890, top: 704, name_left: -25, name_top: -15, name_width: 55});

MosMapApi_Stations.push({ id: 19, line: "MB_PURPLE", name: "Рязанский проспект", left: 940, top: 703, name_left: -6, name_top: -15, name_width: 100});

MosMapApi_Stations.push({ id: 20, line: "MB_PURPLE", name: "Выхино", left: 987, top: 735, name_left: -41, name_top: -2, name_width: 39});

MosMapApi_Stations.push({ id: 21, line: "MB_PURPLE", name: "Лермонтовский проспект", left: 952, top: 780, name_left: -99, name_top: -3, name_width: 96});

MosMapApi_Stations.push({ id: 22, line: "MB_PURPLE", name: "Жулебино", left: 915, top: 818, name_left: -54, name_top: -9, name_width: 53});

MosMapApi_Stations.push({ id: 23, line: "MB_PURPLE", name: "Котельники", left: 908, top: 843, name_left: -67, name_top: -2, name_width: 65});



MosMapApi_Stations.push({ id: 24, line: "MB_PURPLE", name: "Авиамоторная", left: 823, top: 552, name_left: 15, name_top: 0, name_width: 84});

MosMapApi_Stations.push({ id: 25, line: "MB_PURPLE", name: "Нижегородская улица", left: 879, top: 608, name_left: 14, name_top: -9, name_width: 119});

MosMapApi_Stations.push({ id: 26, line: "MB_PURPLE", name: "Окская улица", left: 919, top: 656, name_left: 13, name_top: 1, name_width: 71});

MosMapApi_Stations.push({ id: 27, line: "MB_PURPLE", name: "Ферганская улица", left: 935, top: 737, name_left: -60, name_top: 10, name_width: 61});

MosMapApi_Stations.push({ id: 28, line: "MB_PURPLE", name: "Косино", left: 974, top: 781, name_left: 16, name_top: -2, name_width: 42});

MosMapApi_Stations.push({ id: 29, line: "MB_PURPLE", name: "Салтыковская улица", left: 1002, top: 836, name_left: -79, name_top: -4, name_width: 74});

MosMapApi_Stations.push({ id: 30, line: "MB_PURPLE", name: "Косино-Ухтомская", left: 1002, top: 861, name_left: -100, name_top: -3, name_width: 100});

MosMapApi_Stations.push({ id: 31, line: "MB_PURPLE", name: "Некрасовка", left: 1002, top: 882, name_left: -65, name_top: 0, name_width: 64});







//<!-- GREEN -->

MosMapApi_Stations.push({ id: 32, line: "MB_GREEN", name: "Улица Дыбенко", left: 216, top: 84, name_left: 12, name_top: -2, name_width: 81});

MosMapApi_Stations.push({ id: 33, line: "MB_GREEN", name: "Беломорская", left: 216, top: 108, name_left: 12, name_top: 0, name_width: 80});

MosMapApi_Stations.push({ id: 34, line: "MB_GREEN", name: "Речной вокзал", left: 216, top: 131, name_left: 12, name_top: 0, name_width: 80});

MosMapApi_Stations.push({ id: 35, line: "MB_GREEN", name: "Водный стадион", left: 232, top: 158, name_left: 11, name_top: -8, name_width: 88});

MosMapApi_Stations.push({ id: 36, line: "MB_GREEN", name: "Войковская", left: 255, top: 183, name_left: 10, name_top: -9, name_width: 69});

MosMapApi_Stations.push({ id: 37, line: "MB_GREEN", name: "Сокол", left: 279, top: 206, name_left: 14, name_top: -8, name_width: 30});

MosMapApi_Stations.push({ id: 38, line: "MB_GREEN", name: "Аэропорт", left: 298, top: 226, name_left: -50, name_top: 6, name_width: 48});

MosMapApi_Stations.push({ id: 39, line: "MB_GREEN", name: "Динамо", left: 325, top: 253, name_left: -46, name_top: 0, name_width: 36});



MosMapApi_Stations.push({ id: 40, line: "MB_GREEN", name: "Белорусская", left: 356, top: 285, name_left: 11, name_top: -8, name_width: 11});

MosMapApi_Stations.push({ id: 41, line: "MB_GREEN", name: "Маяковская", left: 402, top: 343, name_left: 11, name_top: 0, name_width: 61});

MosMapApi_Stations.push({ id: 42, line: "MB_GREEN", name: "Тверская", left: 408, top: 382, name_left: -54, name_top: -3, name_width: 48});

MosMapApi_Stations.push({ id: 43, line: "MB_GREEN", name: "Театральная", left: 504, top: 478, name_left: 14, name_top: -6, name_width: 69});

MosMapApi_Stations.push({ id: 44, line: "MB_GREEN", name: "Новокузнецкая", left: 570, top: 564, name_left: -86, name_top: -9, name_width: 84});

MosMapApi_Stations.push({ id: 45, line: "MB_GREEN", name: "Павелецкая", left: 632, top: 634, name_left: 10, name_top: -12, name_width: 65});



MosMapApi_Stations.push({ id: 46, line: "MB_GREEN", name: "Автозаводская", left: 686, top: 688, name_left: -76, name_top: 8, name_width: 78});

MosMapApi_Stations.push({ id: 47, line: "MB_GREEN", name: "Технопарк", left: 706, top: 721, name_left: -55, name_top: 0, name_width: 54});

MosMapApi_Stations.push({ id: 48, line: "MB_GREEN", name: "Коломенская", left: 706, top: 751, name_left: -70, name_top: 0, name_width: 68});

MosMapApi_Stations.push({ id: 49, line: "MB_GREEN", name: "Каширская", left: 706, top: 813, name_left: 0, name_top: 0, name_width: 16});

MosMapApi_Stations.push({ id: 50, line: "MB_GREEN", name: "Кантемировская", left: 706, top: 849, name_left: -86, name_top: 3, name_width: 84});

MosMapApi_Stations.push({ id: 51, line: "MB_GREEN", name: "Царицыно", left: 706, top: 876, name_left: -54, name_top: -2, name_width: 48});

MosMapApi_Stations.push({ id: 52, line: "MB_GREEN", name: "Орехово", left: 706, top: 900, name_left: -47, name_top: -3, name_width: 45});

MosMapApi_Stations.push({ id: 53, line: "MB_GREEN", name: "Домодедовская", left: 717, top: 918, name_left: -85, name_top: 3, name_width: 83});

MosMapApi_Stations.push({ id: 54, line: "MB_GREEN", name: "Красногвардейская", left: 741, top: 942, name_left: -115, name_top: -1, name_width: 110});

MosMapApi_Stations.push({ id: 55, line: "MB_GREEN", name: "Алма-Атинская", left: 788, top: 942, name_left: -2, name_top: 13, name_width: 78});









//<!-- GREY -->

MosMapApi_Stations.push({ id: 56, line: "MB_GREY", name: "Алтуфьево", left: 498, top: 12, name_left: 12, name_top: -2, name_width: 54});

MosMapApi_Stations.push({ id: 57, line: "MB_GREY", name: "Бибирево", left: 498, top: 38, name_left: 12, name_top: 0, name_width: 48});

MosMapApi_Stations.push({ id: 58, line: "MB_GREY", name: "Отрадное", left: 485, top: 64, name_left: 11, name_top: 7, name_width: 48});

MosMapApi_Stations.push({ id: 59, line: "MB_GREY", name: "Владыкино", left: 461, top: 88, name_left: 12, name_top: 7, name_width: 54});

MosMapApi_Stations.push({ id: 60, line: "MB_GREY", name: "Петровско-Разумовская", left: 430, top: 117, name_left: 17, name_top: 0, name_width: 126});

MosMapApi_Stations.push({ id: 61, line: "MB_GREY", name: "Тимирязевская", left: 409, top: 149, name_left: -75, name_top: 0, name_width: 78});

MosMapApi_Stations.push({ id: 62, line: "MB_GREY", name: "Дмитровская", left: 409, top: 173, name_left: 11, name_top: 1, name_width: 59});

MosMapApi_Stations.push({ id: 63, line: "MB_GREY", name: "Савёловская", left: 408, top: 206, name_left: 12, name_top: 9, name_width: 72});



MosMapApi_Stations.push({ id: 64, line: "MB_GREY", name: "Менделеевская", left: 418, top: 245, name_left: 2, name_top: -16, name_width: 86});

MosMapApi_Stations.push({ id: 65, line: "MB_GREY", name: "Цветной бульвар", left: 490, top: 324, name_left: -51, name_top: -2, name_width: 47});

MosMapApi_Stations.push({ id: 66, line: "MB_GREY", name: "Чеховская", left: 441, top: 382, name_left: 16, name_top: -3, name_width: 54});

MosMapApi_Stations.push({ id: 67, line: "MB_GREY", name: "Боровицкая", left: 440, top: 510, name_left: 14, name_top: 17, name_width: 60});

MosMapApi_Stations.push({ id: 68, line: "MB_GREY", name: "Полянка", left: 513, top: 601, name_left: -43, name_top: 8, name_width: 42});

MosMapApi_Stations.push({ id: 69, line: "MB_GREY", name: "Серпуховская", left: 556, top: 680, name_left: 16, name_top: -2, name_width: 79});



MosMapApi_Stations.push({ id: 70, line: "MB_GREY", name: "Тульская", left: 557, top: 713, name_left: 11, name_top: -2, name_width: 48});

MosMapApi_Stations.push({ id: 71, line: "MB_GREY", name: "Нагатинская", left: 557, top: 736, name_left: 11, name_top: 0, name_width: 70});

MosMapApi_Stations.push({ id: 72, line: "MB_GREY", name: "Нагорная", left: 557, top: 761, name_left: 11, name_top: 0, name_width: 48});

MosMapApi_Stations.push({ id: 73, line: "MB_GREY", name: "Нахимовский проспект", left: 557, top: 786, name_left: 11, name_top: -2, name_width: 120});

MosMapApi_Stations.push({ id: 74, line: "MB_GREY", name: "Севастопольская", left: 557, top: 813, name_left: -97, name_top: -13, name_width: 96});

MosMapApi_Stations.push({ id: 75, line: "MB_GREY", name: "Чертановская", left: 557, top: 839, name_left: 13, name_top: 0, name_width: 72});

MosMapApi_Stations.push({ id: 76, line: "MB_GREY", name: "Южная", left: 556, top: 863, name_left: 10, name_top: 3, name_width: 39});



MosMapApi_Stations.push({ id: 77, line: "MB_GREY", name: "Пражская", left: 533, top: 887, name_left: 12, name_top: 7, name_width: 50});

MosMapApi_Stations.push({ id: 78, line: "MB_GREY", name: "Улица Академика Янгеля", left: 508, top: 911, name_left: 13, name_top: 3, name_width: 90});

MosMapApi_Stations.push({ id: 79, line: "MB_GREY", name: "Аннино", left: 484, top: 936, name_left: 12, name_top: 6, name_width: 39});

MosMapApi_Stations.push({ id: 80, line: "MB_GREY", name: "Бульвар Дмитрия Донского", left: 461, top: 959, name_left: 12, name_top: 7, name_width: 150});







//<!-- LIGHT GREEN -->

MosMapApi_Stations.push({ id: 81, line: "MB_LIGHTGREEN", name: "Дмитровское шоссе", left: 423, top: 11, name_left: -108, name_top: 0, name_width: 102});

MosMapApi_Stations.push({ id: 82, line: "MB_LIGHTGREEN", name: "Улица 800-летия Москвы", left: 423, top: 32, name_left: -135, name_top: 0, name_width: 132});

MosMapApi_Stations.push({ id: 83, line: "MB_LIGHTGREEN", name: "Селигерская", left: 423, top: 54, name_left: -69, name_top: 0, name_width: 66});

MosMapApi_Stations.push({ id: 84, line: "MB_LIGHTGREEN", name: "Верхние Либохоры", left: 423, top: 75, name_left: -99, name_top: 0, name_width: 96});

MosMapApi_Stations.push({ id: 85, line: "MB_LIGHTGREEN", name: "Окружная", left: 423, top: 96, name_left: -52, name_top: 0, name_width: 48});

MosMapApi_Stations.push({ id: 86, line: "MB_LIGHTGREEN", name: "Фонвизинская", left: 457, top: 142, name_left: 12, name_top: -9, name_width: 78});

MosMapApi_Stations.push({ id: 87, line: "MB_LIGHTGREEN", name: "Бутырская", left: 481, top: 165, name_left: 15, name_top: -5, name_width: 54});

MosMapApi_Stations.push({ id: 88, line: "MB_LIGHTGREEN", name: "Марьина Роща", left: 503, top: 190, name_left: 17, name_top: 0, name_width: 72});



MosMapApi_Stations.push({ id: 89, line: "MB_LIGHTGREEN", name: "Достоевская", left: 512, top: 229, name_left: 14, name_top: 0, name_width: 66});

MosMapApi_Stations.push({ id: 90, line: "MB_LIGHTGREEN", name: "Трубная", left: 511, top: 324, name_left: 17, name_top: 0, name_width: 42});

MosMapApi_Stations.push({ id: 91, line: "MB_LIGHTGREEN", name: "Сретенский бульвар", left: 593, top: 415, name_left: 16, name_top: 1, name_width: 67});

MosMapApi_Stations.push({ id: 92, line: "MB_LIGHTGREEN", name: "Чкаловская", left: 687, top: 509, name_left: 24, name_top: -1, name_width: 60});



MosMapApi_Stations.push({ id: 93, line: "MB_LIGHTGREEN", name: "Римская", left: 756, top: 595, name_left: 15, name_top: 7, name_width: 49});

MosMapApi_Stations.push({ id: 94, line: "MB_LIGHTGREEN", name: "Крестьянская застава", left: 756, top: 641, name_left: 15, name_top: -12, name_width: 79});

MosMapApi_Stations.push({ id: 95, line: "MB_LIGHTGREEN", name: "Дубровка", left: 757, top: 681, name_left: -50, name_top: -3, name_width: 48});

MosMapApi_Stations.push({ id: 96, line: "MB_LIGHTGREEN", name: "Кожуховская", left: 781, top: 716, name_left: -58, name_top: 9, name_width: 66});

MosMapApi_Stations.push({ id: 97, line: "MB_LIGHTGREEN", name: "Печатники", left: 802, top: 736, name_left: 18, name_top: -2, name_width: 54});

MosMapApi_Stations.push({ id: 98, line: "MB_LIGHTGREEN", name: "Волжская", left: 829, top: 782, name_left: -53, name_top: 0, name_width: 48});

MosMapApi_Stations.push({ id: 99, line: "MB_LIGHTGREEN", name: "Люблино", left: 800, top: 822, name_left: -43, name_top: -11, name_width: 42});

MosMapApi_Stations.push({ id: 100, line: "MB_LIGHTGREEN", name: "Братиславская", left: 776, top: 847, name_left: 10, name_top: 9, name_width: 78});

MosMapApi_Stations.push({ id: 101, line: "MB_LIGHTGREEN", name: "Марьино", left: 757, top: 877, name_left: 14, name_top: 0, name_width: 42});

MosMapApi_Stations.push({ id: 102, line: "MB_LIGHTGREEN", name: "Борисово", left: 757, top: 901, name_left: 12, name_top: 0, name_width: 50});

MosMapApi_Stations.push({ id: 103, line: "MB_LIGHTGREEN", name: "Шипиловская", left: 757, top: 926, name_left: 12, name_top: 0, name_width: 66});

MosMapApi_Stations.push({ id: 104, line: "MB_LIGHTGREEN", name: "Зябликово", left: 757, top: 958, name_left: -61, name_top: -1, name_width: 54});











//<!-- ORANGE -->

MosMapApi_Stations.push({ id: 105, line: "MB_ORANGE", name: "Челобитьево", left: 611, top: 41, name_left: 13, name_top: -3, name_width: 66});

MosMapApi_Stations.push({ id: 106, line: "MB_ORANGE", name: "Медведково", left: 611, top: 65, name_left: 13, name_top: -3, name_width: 60});

MosMapApi_Stations.push({ id: 107, line: "MB_ORANGE", name: "Бабушкинская", left: 611, top: 88, name_left: 13, name_top: -3, name_width: 72});

MosMapApi_Stations.push({ id: 108, line: "MB_ORANGE", name: "Свиблово", left: 611, top: 112, name_left: 13, name_top: -3, name_width: 48});

MosMapApi_Stations.push({ id: 109, line: "MB_ORANGE", name: "Ботанический сад", left: 611, top: 137, name_left: 13, name_top: -3, name_width: 84});

MosMapApi_Stations.push({ id: 110, line: "MB_ORANGE", name: "ВДНХ", left: 611, top: 159, name_left: 13, name_top: -1, name_width: 28});

MosMapApi_Stations.push({ id: 111, line: "MB_ORANGE", name: "Алексеевская", left: 611, top: 184, name_left: 13, name_top: -3, name_width: 78});

MosMapApi_Stations.push({ id: 112, line: "MB_ORANGE", name: "Рижская", left: 611, top: 222, name_left: 15, name_top: 0, name_width: 50});



MosMapApi_Stations.push({ id: 113, line: "MB_ORANGE", name: "Проспект Мира", left: 610, top: 259, name_left: 14, name_top: 4, name_width: 54});

MosMapApi_Stations.push({ id: 114, line: "MB_ORANGE", name: "Сухаревская", left: 610, top: 308, name_left: -68, name_top: 0, name_width: 66});

MosMapApi_Stations.push({ id: 115, line: "MB_ORANGE", name: "Тургеневская", left: 594, top: 383, name_left: 18, name_top: 0, name_width: 72});

MosMapApi_Stations.push({ id: 116, line: "MB_ORANGE", name: "Китай-город", left: 595, top: 504, name_left: 0, name_top: -2, name_width: 12});

MosMapApi_Stations.push({ id: 117, line: "MB_ORANGE", name: "Третьяковская", left: 553, top: 578, name_left: -4, name_top: 0, name_width: 12});

MosMapApi_Stations.push({ id: 118, line: "MB_ORANGE", name: "Октябрьская", left: 486, top: 648, name_left: 0, name_top: 0, name_width: 14});



MosMapApi_Stations.push({ id: 119, line: "MB_ORANGE", name: "Шаболовская", left: 459, top: 676, name_left: 10, name_top: 7, name_width: 69});

MosMapApi_Stations.push({ id: 120, line: "MB_ORANGE", name: "Ленинский проспект", left: 434, top: 701, name_left: 12, name_top: 6, name_width: 108});

MosMapApi_Stations.push({ id: 121, line: "MB_ORANGE", name: "Академическая", left: 410, top: 724, name_left: 12, name_top: 8, name_width: 78});

MosMapApi_Stations.push({ id: 122, line: "MB_ORANGE", name: "Профсоюзная", left: 385, top: 749, name_left: 13, name_top: 6, name_width: 71});

MosMapApi_Stations.push({ id: 123, line: "MB_ORANGE", name: "Новые Черёмушки", left: 365, top: 771, name_left: 12, name_top: 3, name_width: 100});



MosMapApi_Stations.push({ id: 124, line: "MB_ORANGE", name: "Калужская", left: 362, top: 798, name_left: 15, name_top: 1, name_width: 61});

MosMapApi_Stations.push({ id: 125, line: "MB_ORANGE", name: "Беляево", left: 363, top: 823, name_left: 12, name_top: 0, name_width: 42});

MosMapApi_Stations.push({ id: 126, line: "MB_ORANGE", name: "Коньково", left: 363, top: 848, name_left: 12, name_top: 0, name_width: 48});

MosMapApi_Stations.push({ id: 127, line: "MB_ORANGE", name: "Тёплый Стан", left: 363, top: 871, name_left: 12, name_top: 0, name_width: 66});

MosMapApi_Stations.push({ id: 128, line: "MB_ORANGE", name: "Ясенево", left: 363, top: 895, name_left: 12, name_top: 0, name_width: 42});

MosMapApi_Stations.push({ id: 129, line: "MB_ORANGE", name: "Новоясеневская", left: 363, top: 914, name_left: -100, name_top: 0, name_width: 95});











//<!-- RED -->

MosMapApi_Stations.push({ id: 130, line: "MB_RED", name: "Улица Подбельского", left: 803, top: 205, name_left: 10, name_top: 6, name_width: 108});

MosMapApi_Stations.push({ id: 131, line: "MB_RED", name: "Черкизовская", left: 781, top: 228, name_left: 9, name_top: 8, name_width: 72});

MosMapApi_Stations.push({ id: 132, line: "MB_RED", name: "Преображенская площадь", left: 756, top: 252, name_left: 11, name_top: 7, name_width: 132});

MosMapApi_Stations.push({ id: 133, line: "MB_RED", name: "Сокольники", left: 731, top: 276, name_left: 22, name_top: 0, name_width: 68});

MosMapApi_Stations.push({ id: 134, line: "MB_RED", name: "Красносельская", left: 708, top: 301, name_left: 10, name_top: 7, name_width: 84});



MosMapApi_Stations.push({ id: 135, line: "MB_RED", name: "Комсомольская", left: 681, top: 326, name_left: 17, name_top: 0, name_width: 85});

MosMapApi_Stations.push({ id: 136, line: "MB_RED", name: "Красные ворота", left: 649, top: 360, name_left: 10, name_top: 7, name_width: 84});

MosMapApi_Stations.push({ id: 137, line: "MB_RED", name: "Чистые пруды", left: 608, top: 398, name_left: 0, name_top: 0, name_width: 72});

MosMapApi_Stations.push({ id: 138, line: "MB_RED", name: "Лубянка", left: 533, top: 416, name_left: -49, name_top: 0, name_width: 44});

MosMapApi_Stations.push({ id: 139, line: "MB_RED", name: "Охотный ряд", left: 489, top: 462, name_left: 14, name_top: -4, name_width: 74});

MosMapApi_Stations.push({ id: 140, line: "MB_RED", name: "Библиотека имени Ленина", left: 457, top: 494, name_left: 8, name_top: 15, name_width: 68});

MosMapApi_Stations.push({ id: 141, line: "MB_RED", name: "Кропоткинская", left: 407, top: 542, name_left: 14, name_top: 0, name_width: 84});

MosMapApi_Stations.push({ id: 142, line: "MB_RED", name: "Парк Культуры", left: 337, top: 613, name_left: 0, name_top: 0, name_width: 14});



MosMapApi_Stations.push({ id: 143, line: "MB_RED", name: "Фрунзенская", left: 313, top: 636, name_left: 10, name_top: 8, name_width: 72});

MosMapApi_Stations.push({ id: 144, line: "MB_RED", name: "Спортивная", left: 289, top: 661, name_left: 11, name_top: 6, name_width: 66});

MosMapApi_Stations.push({ id: 145, line: "MB_RED", name: "Воробьёвы горы", left: 265, top: 686, name_left: 11, name_top: 6, name_width: 86});

MosMapApi_Stations.push({ id: 146, line: "MB_RED", name: "Университет", left: 241, top: 710, name_left: 11, name_top: 5, name_width: 65});

MosMapApi_Stations.push({ id: 147, line: "MB_RED", name: "Проспект Вернадского", left: 221, top: 729, name_left: -58, name_top: -19, name_width: 53});

MosMapApi_Stations.push({ id: 148, line: "MB_RED", name: "Юго-Западная", left: 193, top: 756, name_left: 12, name_top: 7, name_width: 72});

MosMapApi_Stations.push({ id: 149, line: "MB_RED", name: "Тропарёво", left: 169, top: 781, name_left: 12, name_top: 6, name_width: 54});

MosMapApi_Stations.push({ id: 150, line: "MB_RED", name: "Румянцево", left: 146, top: 805, name_left: 12, name_top: 6, name_width: 54});

MosMapApi_Stations.push({ id: 151, line: "MB_RED", name: "Саларьево", left: 121, top: 826, name_left: 13, name_top: 9, name_width: 54});











//<!-- BLUE -->

MosMapApi_Stations.push({ id: 152, line: "MB_BLUE", name: "Щёлковская", left: 864, top: 302, name_left: 11, name_top: 7, name_width: 60});

MosMapApi_Stations.push({ id: 153, line: "MB_BLUE", name: "Первомайская", left: 841, top: 325, name_left: 10, name_top: 8, name_width: 72});

MosMapApi_Stations.push({ id: 154, line: "MB_BLUE", name: "Измайловская", left: 815, top: 350, name_left: 12, name_top: 6, name_width: 72});

MosMapApi_Stations.push({ id: 155, line: "MB_BLUE", name: "Партизанская", left: 791, top: 374, name_left: 11, name_top: 6, name_width: 72});

MosMapApi_Stations.push({ id: 156, line: "MB_BLUE", name: "Семеновская", left: 768, top: 398, name_left: 11, name_top: 6, name_width: 69});

MosMapApi_Stations.push({ id: 157, line: "MB_BLUE", name: "Электрозаводская", left: 744, top: 421, name_left: 21, name_top: -2, name_width: 102});

MosMapApi_Stations.push({ id: 158, line: "MB_BLUE", name: "Бауманская", left: 720, top: 446, name_left: 8, name_top: 10, name_width: 60});



MosMapApi_Stations.push({ id: 159, line: "MB_BLUE", name: "Курская", left: 688, top: 478, name_left: 0, name_top: 0, name_width: 18});

MosMapApi_Stations.push({ id: 160, line: "MB_BLUE", name: "Площадь Революции", left: 521, top: 494, name_left: 12, name_top: -9, name_width: 116});

MosMapApi_Stations.push({ id: 161, line: "MB_BLUE", name: "Арбатская", left: 424, top: 494, name_left: -62, name_top: -5, name_width: 54});

MosMapApi_Stations.push({ id: 162, line: "MB_BLUE", name: "Смоленская", left: 376, top: 510, name_left: -65, name_top: -9, name_width: 60});

MosMapApi_Stations.push({ id: 163, line: "MB_BLUE", name: "Киевская", left: 279, top: 510, name_left: -53, name_top: -8, name_width: 48});



MosMapApi_Stations.push({ id: 164, line: "MB_BLUE", name: "Парк Победы", left: 131, top: 510, name_left: -4, name_top: -3, name_width: 12});

MosMapApi_Stations.push({ id: 165, line: "MB_BLUE", name: "Славянский бульвар", left: 66, top: 468, name_left: -62, name_top: 13, name_width: 65});

MosMapApi_Stations.push({ id: 166, line: "MB_BLUE", name: "Кунцевская", left: 12, top: 352, name_left: 20, name_top: 0, name_width: 14});

MosMapApi_Stations.push({ id: 167, line: "MB_BLUE", name: "Молодёжная", left: 12, top: 303, name_left: 12, name_top: -2, name_width: 64});

MosMapApi_Stations.push({ id: 168, line: "MB_BLUE", name: "Крылатское", left: 12, top: 278, name_left: 12, name_top: -2, name_width: 60});

MosMapApi_Stations.push({ id: 169, line: "MB_BLUE", name: "Строгино", left: 12, top: 255, name_left: 12, name_top: -2, name_width: 48});

MosMapApi_Stations.push({ id: 170, line: "MB_BLUE", name: "Мякинино", left: 12, top: 231, name_left: 12, name_top: -2, name_width: 48});

MosMapApi_Stations.push({ id: 171, line: "MB_BLUE", name: "Волоколамская", left: 12, top: 206, name_left: 12, name_top: -2, name_width: 78});

MosMapApi_Stations.push({ id: 172, line: "MB_BLUE", name: "Митино", left: 12, top: 184, name_left: 12, name_top: -2, name_width: 36});

MosMapApi_Stations.push({ id: 173, line: "MB_BLUE", name: "Пятницкое шоссе", left: 12, top: 160, name_left: 12, name_top: -2, name_width: 89});









//<!-- YELLOW -->

MosMapApi_Stations.push({ id: 174, line: "MB_YELLOW", name: "Новокосино", left: 896, top: 457, name_left: 12, name_top: 5, name_width: 60});

MosMapApi_Stations.push({ id: 175, line: "MB_YELLOW", name: "Новогиреево", left: 873, top: 481, name_left: 10, name_top: 5, name_width: 66});

MosMapApi_Stations.push({ id: 176, line: "MB_YELLOW", name: "Перово", left: 849, top: 505, name_left: 12, name_top: 5, name_width: 36});

MosMapApi_Stations.push({ id: 177, line: "MB_YELLOW", name: "Шоссе Энтузиастов", left: 824, top: 528, name_left: 13, name_top: 6, name_width: 102});

MosMapApi_Stations.push({ id: 178, line: "MB_YELLOW", name: "Авиамоторная", left: 799, top: 550, name_left: 0, name_top: 0, name_width: 16});

MosMapApi_Stations.push({ id: 179, line: "MB_YELLOW", name: "Площадь Ильича", left: 772, top: 580, name_left: 15, name_top: 0, name_width: 53});



MosMapApi_Stations.push({ id: 180, line: "MB_YELLOW", name: "Марксистская", left: 693, top: 580, name_left: 7, name_top: -14, name_width: 72});

MosMapApi_Stations.push({ id: 181, line: "MB_YELLOW", name: "Третьяковская", left: 563, top: 579, name_left: -7, name_top: 13, name_width: 82});

MosMapApi_Stations.push({ id: 182, line: "MB_YELLOW", name: "Волхонка", left: 408, top: 565, name_left: 16, name_top: -1, name_width: 48});

MosMapApi_Stations.push({ id: 183, line: "MB_YELLOW", name: "Плющиха", left: 376, top: 533, name_left: -43, name_top: 12, name_width: 55});

MosMapApi_Stations.push({ id: 184, line: "MB_YELLOW", name: "Кутузовский проспект", left: 291, top: 453, name_left: 13, name_top: -14, name_width: 130});



MosMapApi_Stations.push({ id: 185, line: "MB_YELLOW", name: "Деловой центр", left: 239, top: 423, name_left: -45, name_top: -18, name_width: 55});

MosMapApi_Stations.push({ id: 186, line: "MB_YELLOW", name: "Парк Победы", left: 135, top: 510, name_left: -80, name_top: 9, name_width: 72});

MosMapApi_Stations.push({ id: 187, line: "MB_YELLOW", name: "Ломоносовский проспект", left: 131, top: 548, name_left: 14, name_top: 0, name_width: 132});

MosMapApi_Stations.push({ id: 188, line: "MB_YELLOW", name: "Раменки", left: 131, top: 572, name_left: 15, name_top: 0, name_width: 42});

MosMapApi_Stations.push({ id: 189, line: "MB_YELLOW", name: "Мичуринский проспект", left: 131, top: 595, name_left: 14, name_top: 0, name_width: 79});

MosMapApi_Stations.push({ id: 190, line: "MB_YELLOW", name: "Очаково", left: 131, top: 634, name_left: -46, name_top: 0, name_width: 42});

MosMapApi_Stations.push({ id: 191, line: "MB_YELLOW", name: "Востяково", left: 116, top: 661, name_left: -61, name_top: -7, name_width: 59});

MosMapApi_Stations.push({ id: 192, line: "MB_YELLOW", name: "Трёшково", left: 99, top: 679, name_left: 14, name_top: 6, name_width: 57});

MosMapApi_Stations.push({ id: 193, line: "MB_YELLOW", name: "Солнцево", left: 75, top: 704, name_left: 15, name_top: 5, name_width: 48});

MosMapApi_Stations.push({ id: 194, line: "MB_YELLOW", name: "Боровское шоссе", left: 51, top: 726, name_left: 13, name_top: 4, name_width: 58});

MosMapApi_Stations.push({ id: 195, line: "MB_YELLOW", name: "Новопеределкино", left: 26, top: 751, name_left: 13, name_top: 6, name_width: 90});











//<!-- LIGHT BLUE -->

MosMapApi_Stations.push({ id: 196, line: "MB_LIGHTBLUE", name: "Международная", left: 263, top: 386, name_left: -93, name_top: 0, name_width: 84});

MosMapApi_Stations.push({ id: 197, line: "MB_LIGHTBLUE", name: "Выставочная", left: 263, top: 424, name_left: -71, name_top: 13, name_width: 72});



MosMapApi_Stations.push({ id: 198, line: "MB_LIGHTBLUE", name: "Студенческая", left: 243, top: 479, name_left: -63, name_top: 9, name_width: 78});

MosMapApi_Stations.push({ id: 199, line: "MB_LIGHTBLUE", name: "Кутузовская", left: 203, top: 461, name_left: -57, name_top: 10, name_width: 66});

MosMapApi_Stations.push({ id: 200, line: "MB_LIGHTBLUE", name: "Фили", left: 100, top: 441, name_left: 12, name_top: -10, name_width: 24});

MosMapApi_Stations.push({ id: 201, line: "MB_LIGHTBLUE", name: "Багратионовская", left: 78, top: 420, name_left: 11, name_top: -9, name_width: 90});

MosMapApi_Stations.push({ id: 202, line: "MB_LIGHTBLUE", name: "Филёвский парк", left: 57, top: 397, name_left: 11, name_top: -8, name_width: 84});

MosMapApi_Stations.push({ id: 203, line: "MB_LIGHTBLUE", name: "Пионерская", left: 36, top: 377, name_left: 11, name_top: -9, name_width: 60});

MosMapApi_Stations.push({ id: 204, line: "MB_LIGHTBLUE", name: "Кунцевская", left: 15, top: 351, name_left: 36, name_top: 0, name_width: 60});



MosMapApi_Stations.push({ id: 205, line: "MB_LIGHTBLUE", name: "Александровский сад", left: 441, top: 478, name_left: -128, name_top: -1, name_width: 120});

MosMapApi_Stations.push({ id: 206, line: "MB_LIGHTBLUE", name: "Арбатская", left: 399, top: 467, name_left: 0, name_top: -14, name_width: 54}); //need check

MosMapApi_Stations.push({ id: 207, line: "MB_LIGHTBLUE", name: "Смоленская", left: 337, top: 467, name_left: -18, name_top: -13, name_width: 60}); //need check

MosMapApi_Stations.push({ id: 208, line: "MB_LIGHTBLUE", name: "Киевская", left: 279, top: 478, name_left: 0, name_top: 0, name_width: 12});









//<!-- LIGHT BLUE 2 -->

MosMapApi_Stations.push({ id: 209, line: "MB_LIGHTBLUE2", name: "Каховская", left: 578, top: 813, name_left: -7, name_top: 12, name_width: 60});

MosMapApi_Stations.push({ id: 210, line: "MB_LIGHTBLUE2", name: "Варшавская", left: 640, top: 813, name_left: -26, name_top: -13, name_width: 62});

MosMapApi_Stations.push({ id: 211, line: "MB_LIGHTBLUE2", name: "Каширская", left: 700, top: 813, name_left: -55, name_top: 10, name_width: 60});













//<!-- LIGHT BLUE 3 -->

MosMapApi_Stations.push({ id: 212, line: "MB_LIGHTBLUE3", name: "Улица Старокачаловская", left: 445, top: 975, name_left: 14, name_top: 7, name_width: 140});

MosMapApi_Stations.push({ id: 213, line: "MB_LIGHTBLUE3", name: "Улица Скобелевская", left: 424, top: 997, name_left: 7, name_top: 10, name_width: 108});

MosMapApi_Stations.push({ id: 214, line: "MB_LIGHTBLUE3", name: "Бульвар Адмирала Ушакова", left: 381, top: 1004, name_left: -46, name_top: 14, name_width: 101});

MosMapApi_Stations.push({ id: 215, line: "MB_LIGHTBLUE3", name: "Улица Горчакова", left: 332, top: 1004, name_left: -40, name_top: -14, name_width: 90});

MosMapApi_Stations.push({ id: 216, line: "MB_LIGHTBLUE3", name: "Бунинская аллея", left: 277, top: 1004, name_left: -41, name_top: 13, name_width: 90});



MosMapApi_Stations.push({ id: 217, line: "MB_LIGHTBLUE3", name: "Битцевский парк", left: 385, top: 914, name_left: 16, name_top: 0, name_width: 98});









//<!-- BROWN -->

MosMapApi_Stations.push({ id: 218, line: "MB_BROWN", name: "Белорусская", left: 357, top: 308, name_left: 14, name_top: -3, name_width: 76});

MosMapApi_Stations.push({ id: 219, line: "MB_BROWN", name: "Новослободская", left: 418, top: 268, name_left: -3, name_top: 13, name_width: 94});

MosMapApi_Stations.push({ id: 220, line: "MB_BROWN", name: "Суворовская", left: 512, top: 252, name_left: 17, name_top: -9, name_width: 66});

MosMapApi_Stations.push({ id: 221, line: "MB_BROWN", name: "Проспект Мира", left: 595, top: 275, name_left: 0, name_top: 0, name_width: 16});

MosMapApi_Stations.push({ id: 222, line: "MB_BROWN", name: "Комсомольская", left: 659, top: 327, name_left: 0, name_top: 0, name_width: 17});



MosMapApi_Stations.push({ id: 223, line: "MB_BROWN", name: "Курская", left: 704, top: 493, name_left: 10, name_top: -15, name_width: 42});

MosMapApi_Stations.push({ id: 224, line: "MB_BROWN", name: "Таганская", left: 679, top: 564, name_left: 0, name_top: 0, name_width: 13});

MosMapApi_Stations.push({ id: 225, line: "MB_BROWN", name: "Павелецкая", left: 609, top: 634, name_left: 0, name_top: 0, name_width: 14});

MosMapApi_Stations.push({ id: 226, line: "MB_BROWN", name: "Добрынинская", left: 558, top: 656, name_left: 12, name_top: 5, name_width: 84});

MosMapApi_Stations.push({ id: 227, line: "MB_BROWN", name: "Октябрьская", left: 470, top: 664, name_left: -56, name_top: -26, name_width: 70});



MosMapApi_Stations.push({ id: 228, line: "MB_BROWN", name: "Парк культуры", left: 338, top: 590, name_left: -60, name_top: 7, name_width: 56});

MosMapApi_Stations.push({ id: 229, line: "MB_BROWN", name: "Киевская", left: 295, top: 493, name_left: 0, name_top: 0, name_width: 12});

MosMapApi_Stations.push({ id: 230, line: "MB_BROWN", name: "Росийская", left: 292, top: 431, name_left: 15, name_top: -10, name_width: 64});

MosMapApi_Stations.push({ id: 231, line: "MB_BROWN", name: "Краснопресненская", left: 305, top: 384, name_left: 6, name_top: 13, name_width: 102});





