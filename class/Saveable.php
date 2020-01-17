<?php


interface Saveable
{
    function save();
    static function getAllAsArray();
    static function getByIdAsArray($id);
}