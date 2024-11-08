<?php

namespace App\Dto;

class ResponseServiceDto
{
    public $status = "";
    public string $message = "";
    public $data = "";

    public function __construct($status, string $message, $data = '') {
        $this->status = $status;
        $this->message = $message;
        $this->data = $data;
    }
}
