<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>О нас</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />



        <script src="https://api-maps.yandex.ru/2.1/?apikey=6713c61d-171e-4722-9c32-507d5a515e85&lang=ru_RU" type="text/javascript">
        </script>
        <script type="text/javascript">
            ymaps.ready(init);

            function init() {
                var myMap = new ymaps.Map("map", {
                        center: [55.77, 37.65],
                        zoom: 5 
                    });

                
                let points = JSON.parse(getShops());

                for(let i = 0; i<points.length; ++i){
                    // console.log(points[i].title);
                    let myPlacemark = new ymaps.Placemark([points[i].latitude, points[i].longitude],{
                        hintContent: points[i].title,
                        balloonContent: '<b>'+points[i].title+'</b><div>'+points[i].address+'</div><div>'+points[i].description+'</div><div><img width="200px" src="'+points[i].photo+'"></div>',
                        iconContent: i+1
                    });
                    myMap.geoObjects.add(myPlacemark);
                }

                // var myPlacemark = new ymaps.Placemark([55.76, 37.64]);
                // myMap.geoObjects.add(myPlacemark);
                // var myPlacemark1 = new ymaps.Placemark([55.77, 37.65]);
                // myMap.geoObjects.add(myPlacemark1);
            }


            function getShops(){
                let xhr = new XMLHttpRequest();

                let url = 'http://localhost:8080/eshop/api/1.0/shops/get/all/index.php';

  
                xhr.open('GET', url, false);
                xhr.send();
                return xhr.responseText;
                
            }   

        </script>

    </head>

    <body>
        <div id="map" style="width: 600px; height: 400px"></div>
        Данные которые были введены во второй версии файла
        Строка созданная в четвёртой версии
        -_-
    </body>

</html>