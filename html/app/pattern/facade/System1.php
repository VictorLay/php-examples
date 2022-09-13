<?php

class System1
{


    public function __construct(
        private bool $isSystemActive = false,
    )
    {
    }


    public function isSystemWork(): bool
    {
        return $this->isSystemActive;
    }

    public function activateSystem(): void
    {
        $this->isSystemActive = true;
    }

    public function deactivateSystem(): void
    {
        $this->isSystemActive = false;
    }

    public function unnecessaryMethod(): string
    {
        return "why did you start me ?";
    }
}