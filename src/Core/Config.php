<?php

namespace Kat\BatchFramework\Core;

use Exception;

class Config
{
    /**
     * @param string $paramName
     * @return string
     * @throws Exception
     */
    public static function getParam(string $paramName): string
    {

        $parameterValue = getenv($paramName, true);

        if (!$parameterValue) {
            throw new Exception("'$paramName' Parameter not found or empty!");
        }
        return $parameterValue;
    }
}