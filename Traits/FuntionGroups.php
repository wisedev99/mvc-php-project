<?php

trait FuntionGroups
{

    public static function separation($controller)
    {
        return explode('@', $controller);
    }
}
