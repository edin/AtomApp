<?php

namespace App\ViewModels;

final class Item
{
    public $title = "";
    public $url = "";

    public function __construct($title, $url)
    {
        $this->title = $title;
        $this->url = $url;
    }
}
