<?php

namespace Kat\BatchFramework\Core;

class Helper
{
    public static function getBaseClass(string $fullClassName) {
        return substr(strrchr($fullClassName, "\\"), 1);
    }
}