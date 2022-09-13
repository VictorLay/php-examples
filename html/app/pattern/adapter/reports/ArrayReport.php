<?php

namespace reports;
class ArrayReport
{
    private array $data = [
        'name' => 'eugine',
        'mail' => 'eugine@mail.ru',
    ];

    public function getArrayData(): array
    {
        return $this->data;
    }
}