<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInitce6bd48bb1477b53d961c963f9e5f833
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

        spl_autoload_register(array('ComposerAutoloaderInitce6bd48bb1477b53d961c963f9e5f833', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInitce6bd48bb1477b53d961c963f9e5f833', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInitce6bd48bb1477b53d961c963f9e5f833::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
