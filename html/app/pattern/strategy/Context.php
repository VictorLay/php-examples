<?php


class Context
{
    public function __construct(
        private Strategy $strategy
    )
    {
    }

    /**
     * @param Strategy $strategy
     */
    public function setStrategy(Strategy $strategy): void
    {
        $this->strategy = $strategy;
    }

    public function doSomeBusinessLogic(): void
    {
        echo "Something is happening ...";
        $this->strategy->fixVehicle();
        echo "Something happened!";

    }
}