<?php

class DeveloperDecorator implements Developer
{
    private Developer $developer;

    /**
     * @param Developer $developer
     */
    public function __construct(Developer $developer)
    {
        $this->developer = $developer;
    }

    public function makeJob(): string
    {
        return $this->developer->makeJob();
    }


}