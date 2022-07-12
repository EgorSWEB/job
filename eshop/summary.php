1) http vs https

https = http + SSL 

2) GET и POST
    GET - передаются в url до 4 Кбайт
    POST - передаются в теле запроса

    в PHP есть $_GET и $_POST - массивы
    php://input - чисто насыпанные данные

3) три основных фишки ООП
    наследование
    полиморфизм
    инкапсуляция

4)  public - виден везде(в родителе, в потомках, в контексте) 
    protected - виден только в родителе и потомках
    private - виден только в родителе

5) static - мы можем вызывать свойства и методы статические от имени Класса
    Animal:exist()
    нету $this
    ::

6) Что такое абстрактный Класс
    - не можем создать экземпляр Класса
    - если у нас есть хоть один абстрактный метод в классе то класс обязательно абстрактный 

7) public function setTable()

8) Интерфейс
    - задание структуры
    - ничего кроме констант и абстрактных методов

9) есть ли в PHP множественное наследование 
    для классов - нету
    для интерфейсов - есть

10) Трейты(примеси) - просто наборы методов и свойств которые можно встроить в классы

    MySQL - Система управлнеия базами данных - таблицы

    SQL - strucured query language

    CRUD - create(insert) read(select) update(update) delete(delete)

    JOIN - посмотреть !!!!

    индексы id - активация бинарного поиска - прочитать про составные индексы

    Селективность
    
    6000 чел - найти всех женщин 18 лет

    id name gender age -- people 

    SELECT name FROM people WHERE gender='female' AND age=18

    SELECT name FROM people WHERE age=18 AND gender='female' - более быстрый

    JS

    всплытие - почитать

    погружение - почитать

    лексическое окружение - почиать 

    делегирование событий - 

    <div id="test">Button</div>

    $('#test').click(function(){
        alert('sdasda');
    });

    $('body').on('click', '#test', function(){
        alert('sdasda');
    });

    document.onclick = function(){

    }

    AJAX - запросы могут быть синхронные и асинхронные

    JSON - javascript object notation