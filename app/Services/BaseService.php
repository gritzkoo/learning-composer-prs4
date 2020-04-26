<?php

namespace App\Services;

use App\Traits\HelperTrait;

class BaseService
{
    use HelperTrait;

    public function get()
    {
        return "data";
    }
}
