<?php

require_once "app/pattern/adapter/reports/ArrayReport.php";
require_once "app/pattern/adapter/reports/ArrayReportAdapter.php";
require_once "app/pattern/adapter/reports/JsonReport.php";
require_once "app/pattern/adapter/reports/JsonToArrayAdapter.php";

require_once "app/pattern/facade/Facade.php";
require_once "app/pattern/facade/System1.php";
require_once "app/pattern/facade/System2.php";
require_once "app/pattern/facade/System3.php";

require_once "app/pattern/strategy/Strategy.php";
require_once "app/pattern/strategy/Context.php";
require_once "app/pattern/strategy/FixBicycle.php";
require_once "app/pattern/strategy/FixCar.php";


require_once "app/pattern/decorator/Developer.php";
require_once "app/pattern/decorator/DeveloperDecorator.php";
require_once "app/pattern/decorator/PhpDeveloper.php";
require_once "app/pattern/decorator/SeniorPhpDeveloper.php";

error_reporting(E_ALL);
ini_set("display_errors", 1);

require_once "app/Application.php";

$facade = new Facade();

$context = new Context(new FixBicycle());

$app = new Application($facade, $context, new PhpDeveloper());

echo "<h2>Adapter example result:</h2></br>";
echo "<pre>
        Адаптер — это структурный паттерн проектирования,
        который позволяет объектам с несовместимыми
        интерфейсами работать вместе.
        
        Проблема
            - Есть два класса, которые работаю с разным форматом данных
              как пример один работает с углами в градусах, а другой в радианах
        
        Решение
            - Вы можете создать адаптер. Это объект-переводчик,
              который трансформирует интерфейс или данные одного
              объекта в такой вид, чтобы он стал понятен другому
              объекту
</pre>";
$app->runAdapterExample();

echo "</br></br><h2>Facade example result:</h2></br>";
echo '<pre style="font-size: 150%">
        
        
        Фасад — это структурный паттерн, который
        даёт простой интерфейс к сложной системе.
        
        Вашему коду приходится работать с большим количеством
        объектов некой сложной библиотеки или фреймворка. Вы
        должны самостоятельно инициализировать эти объекты,
        следить за правильным порядком зависимостей и так
        далее.
        В результате, бизнес-логика ваших классов тесно
        переплетается с деталями реализации сторонних классов.
        Такой код довольно сложно понимать и поддерживать.
        
        Фасад — это простой интерфейс работы со сложной
        подсистемой, содержащей множество классов. Фасад может
        иметь урезанный интерфейс, не имеющий 100%
        функциональности, которую можно достичь, используя
        сложную подсистему напрямую. Но он предоставляет
        именно те фичи, которые нужны клиенту, и скрывает все
        остальное.
        Фасад полезен, если вы используете какую-то сложную
        библиотеку с множеством подвижных частей, но вам нужна
        только часть её возможностей.
        
        Ниже приведён пример использования метода, который мы 
        вызываем несколько раз. Нам не приходится волноваться 
        об особенностях реализации. Мы просто знаем, что он 
        должен отработать корректно ( проверенная логика работы 
        находится в реализции паттерна) и нас не волнует как.
        Мы просто имеем удобный интерфейс, не привязанный к реализации.
        
        $this->facade->initialize();
        $resp = "<\/br><\/br>";
        $resp .= $this->facade->operation() ;
        $resp .= "<\/br>";
        $resp .=  $this->facade->operation();
        echo $resp;
</pre>';
$app->runFacadeExample();


echo "</br></br><h2>Strategy example result:</h2></br>";
echo '<pre>
        
        Стратегия — это поведенческий паттерн проектирования,
        который определяет семейство схожих алгоритмов и
        помещает каждый из них в собственный класс. После чего,
        алгоритмы можно взаимозаменять прямо во время
        исполнения программы.
                
        $this->context->setStrategy(new FixCar());
        $this->context->doSomeBusinessLogic();
        $this->context->setStrategy(new FixBicycle());
        $this->context->doSomeBusinessLogic();

</pre>';

$app->runStrategyExample();

echo "</br></br><h2>Decorator example result:</h2></br>";
echo '<pre>
        
        Декоратор — это структурный паттерн проектирования,
        который позволяет динамически добавлять объектам новую
        функциональность, оборачивая их в полезные «обёртки».

</pre>';

$app->runDecoratorExample();


