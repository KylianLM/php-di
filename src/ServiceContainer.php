<?php
namespace Dipy;

/**
 * Class ServiceContainer
 * @package Dipy
 */
class ServiceContainer
{
    protected static $registry = [];
    /**
     * ServiceContainer constructor.
     */
    function __construct(){}

    public static function register($name,\Closure $closure)
    {
        self::$registry[$name] = $closure;
    }

    public static function resolve($name)
    {
        if (self::isRegister($name)) {
            return self::$registry[$name]();
        }
    }

    private static function isRegister($name)
    {
        return array_key_exists($name, self::$registry);
    }
}
