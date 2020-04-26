<?php

namespace App\Traits;

use App\Config;

trait HelperTrait
{
    /**
     * Provided by App\Traits\HelperTrait this function
     * returns a simple string to check if the context
     * was loaded correctly
     * @return string
     * @author Gritzko D. Kleiner <gkleiner@luxfacta.com> date:2020-04-26
     */
    public function getDescription()
    {
        $txt = Config::get('app.other.level.of.content');
        return "agora essa merda funciona de verdade com {$txt}";
    }
}
