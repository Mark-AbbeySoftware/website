<?php

namespace Modules\Pages\Support;

class ModuleInfo
{
    protected static string $moduleName =  'Pages';

    /**
     * defines the Module Name
     * @return string
     */
    public static function name(): string
    {
        return static::$moduleName;
    }

    /**
     * define the lowercase version
     * @return string
     */
    public static function nameLower(): string
    {
        return strtolower(static::$moduleName);
    }
}
