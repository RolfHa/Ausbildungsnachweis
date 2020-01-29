<?php


interface Saveable
{
    function save();
    static function getAll();
    static function getById($id);
}