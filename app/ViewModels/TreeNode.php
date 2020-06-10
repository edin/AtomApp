<?php

namespace App\ViewModels;

class TreeNode
{
    public $parent = null;
    public $model;
    public $items = [];
    public $level = 0;
}
