<?php

use reports\ArrayReport;
use reports\JsonReport;
use reports\JsonToArrayAdapter;

class Application
{

    public function __construct(
        private Facade    $facade,
        private Context   $context,
        private Developer $developer,
        private array     $reports = array(),
    )
    {
        echo "application was started!</br>";
        $this->reports = [
            new ArrayReport(),
            new JsonReport(),
        ];
    }

    public function runDecoratorExample(): void
    {
        /** @var Developer $developer */
        $developer = new PhpDeveloper();
        echo $developer->makeJob();
        echo "</br>";
        echo "</br>";

        $seniorDeveloper = new SeniorPhpDeveloper($developer);
        echo $seniorDeveloper->makeJob();
    }

    public function runStrategyExample(): void
    {
        $this->context->doSomeBusinessLogic();
        $this->context->setStrategy(new FixCar());
        $this->context->doSomeBusinessLogic();
        $this->context->setStrategy(new FixBicycle());
        $this->context->doSomeBusinessLogic();
    }

    public function runFacadeExample(): void
    {
        $this->facade->initialize();
        $resp = "</br></br>";
        $resp .= "<div style='margin-left: 50px; font-style: italic'>" . $this->facade->operation() . "</div>";
        $resp .= "</br>";
        $resp .= "<div style='margin-left: 50px; font-style: italic'>" . $this->facade->operation() . "</div>";
        echo $resp;
    }

    public function runAdapterExample(): void
    {
        echo "</br>Ниже приведены исходные данные для применения паттерна адаптер:</br></br>";
        foreach ($this->reports as $key => $report) {
            echo "$key - ";
            print_r($report);
            echo "</br></br>";
        }

        echo
        '<pre>
            if ($report instanceof ArrayReport) {
                $this->view($report);
            } elseif ($report instanceof JsonReport) {
                $adoptedReport = new JsonToArrayAdapter($report);
                $this->view($adoptedReport);
            }
            </pre>';

        foreach ($this->reports as $report) {
            if ($report instanceof ArrayReport) {
                $this->view($report);
            } elseif ($report instanceof JsonReport) {
                $adoptedReport = new JsonToArrayAdapter($report);
                $this->view($adoptedReport);
            }
        }


    }

    private function view($adapter)
    {
        print_r($adapter->getArrayData());
        echo "</br>";
    }
}