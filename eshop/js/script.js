function renderGoods(){
    //создаём новый экземпляр класса для запросов
    let xhr = new XMLHttpRequest();

    let url = 'http://localhost:8080/eshop/system/controllers/goods/catalog/index.php';
    let str_get = window.location.search;
    url = url + str_get;

    //открыли соединение
    xhr.open('GET', url, true);
    //устанавливаем заголовок запроса
    xhr.setRequestHeader('Content-type', 'application/x-form-urlencode');
    //событие прихода ответа сервера
    xhr.onreadystatechange = function(){
        //всё в порядке
        if(xhr.readyState == 4 && xhr.status == 200){
            // alert('asdasdas');
            document.getElementById('catalog').innerHTML = xhr.responseText;
        }
    }
    xhr.send(null);
}
document.getElementById('catalog').innerHTML = "<img src='img/preloader.gif'>";
setTimeout(function(){
    
    renderGoods();
},1000)

function toBasket(){
    //создаём новый экземпляр класса для запросов
    let xhr = new XMLHttpRequest();

    let url = 'http://localhost:8080/eshop/system/controllers/basket/to_basket.php';
    let str_get = window.location.search;
    url = url + str_get;

    //открыли соединение
    xhr.open('GET', url, true);
    //устанавливаем заголовок запроса
    //событие прихода ответа сервера
    xhr.onreadystatechange = function(){
        //всё в порядке
        if(xhr.readyState == 4 && xhr.status == 200){
            // alert(xhr.responseText);
            document.getElementById('basket-count').innerHTML = xhr.responseText;
        }
    }
    xhr.send(null);
}

function fromBasket(){

    //получаем id товара
    let id = event.target.getAttribute('data-id');

    event.target.closest('.item').remove();
    //создаём новый экземпляр класса для запросов
    let xhr = new XMLHttpRequest();

    let url = 'http://localhost:8080/eshop/system/controllers/basket/from_basket.php';
    let str_get = '?id='+id;
    url = url + str_get;

    //открыли соединение
    xhr.open('GET', url, true);
    //устанавливаем заголовок запроса
    //событие прихода ответа сервера
    xhr.onreadystatechange = function(){
        //всё в порядке
        if(xhr.readyState == 4 && xhr.status == 200){
            // alert(xhr.responseText);
            document.getElementById('basket-count').innerHTML = xhr.responseText;
        }
    }
    xhr.send(null);
}

