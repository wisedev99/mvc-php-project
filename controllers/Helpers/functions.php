<?php

function view($page, $data)
{
    // $view = $page;
    include '../views/layout.php';
}
function test($url, $data)
{

    include '../views/test.php';
}

function request($parameter)
{
    return $_REQUEST[$parameter];
}
