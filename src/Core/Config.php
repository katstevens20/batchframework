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
    public static function getParam(string $paramName, $isMandatory = true): string
    {

        $parameterValue = getenv($paramName, true);

        if (!$parameterValue && $isMandatory) {
            throw new Exception("'$paramName' Parameter not found or empty!");
        }
        return $parameterValue;
    }
}