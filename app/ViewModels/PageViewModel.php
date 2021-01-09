<?php

namespace App\ViewModels;

final class PageViewModel
{
    public string $containerClass = "asd";
    public string $currentPage = "";

    public function isActive($pageName)
    {
        return ($pageName === $this->currentPage) ? "active" : "";
    }
}
