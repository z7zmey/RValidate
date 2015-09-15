<?php

namespace RValidate\Interfaces;


interface Filter
{
    /**
     * @param mixed $data
     * @return array
     */
    public function filter($data);
}