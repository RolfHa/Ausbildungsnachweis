<?php


interface Saveable
{
    function save();
    static function delete($id);
    static function getAll();
    static function getById($id);
}