<?php

namespace reports;
class JsonReport
{
    private string $data = '{"name":"victor", "mail":"viclay@mail.ru"}';

    public function getJsonData(): string
    {
        return $this->data;
    }
}