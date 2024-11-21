<?php

namespace App\Dto;

class MenuDto
{
    public ?int $id = 0;
    public ?string $name = "";
    public ?string $link = "#";
    public ?string $linkAlias = "#";
    public ?string $icon = "#";
    public ?int $parent = 0;
    public ?int $order = 0;

    public function __construct(int $id = 0, string $name, string $link = '#', string $linkAlias = '#', string $icon = '#', int $parent = 0, int $order = 0) {
        $this->id = $id;
        $this->name = $name;
        $this->link = $link;
        $this->linkAlias = $linkAlias;
        $this->icon = $icon;
        $this->parent = $parent;
        $this->order = $order;
    }
}
