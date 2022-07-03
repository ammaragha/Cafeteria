<?php

namespace App\Models\Core;

class Request
{
    public array $inputs = [];
    public array $posts = [];
    public array $gets = [];

    function __construct(...$names)
    {
        foreach ($names as $name) {
            if (isset($_POST[$name])) {
                $this->posts[$name]= $_POST[$name];
                $input = $_POST[$name];
            } elseif (isset($_GET[$name])) {
                $this->gets[$name]= $_GET[$name];
                $input = $_GET[$name];
            }
            $this->inputs[$name]= $input ? $input : "";
        }
    }
}
