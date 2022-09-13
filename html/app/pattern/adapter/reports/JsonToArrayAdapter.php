<?php

namespace reports;

class JsonToArrayAdapter implements ArrayReportAdapter
{

    public function __construct(private JsonReport $jsonReport)
    {
    }

    public function getArrayData(): array
    {
        $jsonData = $this->jsonReport->getJsonData();
        return json_decode($jsonData, true);
    }
}