<?php

class SeniorPhpDeveloper extends DeveloperDecorator
{

    public function __construct(Developer $developer)
    {
        parent::__construct($developer);
    }

    private function makeCodeReview(): string
    {
        return "make code review";
    }

    public function makeJob(): string
    {
        return parent::makeJob()."</br>".$this->makeCodeReview();
    }


}