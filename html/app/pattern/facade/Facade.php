<?php


class Facade
{
    public function __construct(
        private ?System1 $subsystem1 = null,
        private ?System2 $subsystem2 = null,
        private ?System3 $subsystem3 = null
    )
    {
        $this->subsystem1 = $subsystem1 ?: new System1();
        $this->subsystem2 = $subsystem2 ?: new System2();
        $this->subsystem3 = $subsystem3 ?: new System3();
    }

    public function initialize(): bool
    {
        $this->subsystem1->activateSystem();
        echo $this->subsystem1->unnecessaryMethod();
        return $this->subsystem1->isSystemWork();
    }
    public function operation(): string
    {
        if ($this->subsystem1->isSystemWork()) {
            $result = "Facade initializes subsystems:</br>";
            $result .= $this->subsystem2->operation1();
            $result .= $this->subsystem3->operation1();
            $result .= "Facade orders subsystems to perform the action:</br>";
            $result .= $this->subsystem2->operationN();
            $result .= $this->subsystem3->operationZ();
        } else {
            $this->subsystem1->activateSystem();
            $result = $this->subsystem1->unnecessaryMethod();
        }

        return $result;
    }
}