<?php

class name
{
    protected function index()
    {
    }
}

class subName extends name
{
    function sub()
    {
    }
}

$sub = new  subName();
$sub->sub();
