<?php

namespace App\Dto;

class KeyValDto
{
    public string $key = "";
    public string $val = "";

    public function __construct(string $key, string $val) {
        $this->key = $key;
        $this->val = $val;
    }
}
