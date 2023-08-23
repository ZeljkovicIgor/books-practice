<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInit24d227e4b4b3458fd4cc480685ab6eee
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        spl_autoload_register(array('ComposerAutoloaderInit24d227e4b4b3458fd4cc480685ab6eee', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInit24d227e4b4b3458fd4cc480685ab6eee', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInit24d227e4b4b3458fd4cc480685ab6eee::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
