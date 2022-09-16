<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInita533575f38cf5856d644a14c6bce22df
{
    public static $fallbackDirsPsr4 = array (
        0 => __DIR__ . '/..' . '/lyracom/rest-php-sdk/src',
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->fallbackDirsPsr4 = ComposerStaticInita533575f38cf5856d644a14c6bce22df::$fallbackDirsPsr4;
            $loader->classMap = ComposerStaticInita533575f38cf5856d644a14c6bce22df::$classMap;

        }, null, ClassLoader::class);
    }
}