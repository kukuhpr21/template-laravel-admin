<?php

namespace App\Dto;

class MenuDto
{
    public ?int $id = 0;
    public ?string $name = "";
    public ?string $link = "";
    public ?string $linkAlias = "";
    public ?string $icon = "";
    public ?int $parent = 0;
    public ?int $order = 0;

    public function __construct(int $id, string $name, string $link, string $linkAlias, string $icon, int $parent, int $order) {
        $this->id = $id;
        $this->name = $name;
        $this->link = $link;
        $this->linkAlias = $linkAlias;
        $this->icon = $icon;
        $this->parent = $parent;
        $this->order = $order;
    }
}
