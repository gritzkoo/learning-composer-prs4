<?php

namespace App;

use Exception;

abstract class Config
{
    /**
     * Read the config file and returns its content
     *
     * @param string $file
     * @return array
     * @author Gritzko D. Kleiner <gkleiner@luxfacta.com> date:2020-04-26
     */
    private static function loadConfig(string $file)
    {
        $ds = DIRECTORY_SEPARATOR;
        $basepath = __DIR__ . "{$ds}configs";
        $filePath = "{$basepath}{$ds}{$file}.php";

        if (!file_exists($filePath)) {
            throw new Exception("File {$file}.php not found", 500);
        }

        return include $filePath;
    }

    /**
     * Get a configuration
     *
     * @param string $key must be a string with . separator to <config-file-name>.path.inside.array.config
     * @param mixed  $default
     * @return mixed
     * @author Gritzko D. Kleiner <gkleiner@luxfacta.com> date:2020-04-26
     */
    public static function get(string $key, $default = null)
    {
        $segments = explode('.', $key);
        $file = array_shift($segments);
        $arr = static::loadConfig($file);

        foreach ($segments as $seg) {
            if (!array_key_exists($seg, $arr)) {
                return $default;
            }
            $arr = $arr[$seg];
        }

        return $arr;
    }

    /**
     * Verify if file exists and its content has the key needed
     *
     * @param string $key
     * @return boolean
     * @author Gritzko D. Kleiner <gkleiner@luxfacta.com> date:2020-04-26
     */
    public static function has(string $key)
    {
        $segments = explode('.', $key);
        $file = array_shift($segments);
        $arr = static::loadConfig($file);

        foreach ($segments as $seg) {
            if (!array_key_exists($seg, $arr)) {
                return false;
            }
            $arr = $arr[$seg];
        }

        return $arr ? true : false;
    }
}
