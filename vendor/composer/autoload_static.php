<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit97f2bad5d551d0ebd2ced935de838517
{
    public static $prefixLengthsPsr4 = array (
        'C' => 
        array (
            'Carenashville\\Bookings\\' => 23,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Carenashville\\Bookings\\' => 
        array (
            0 => __DIR__ . '/../..' . '/includes',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit97f2bad5d551d0ebd2ced935de838517::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit97f2bad5d551d0ebd2ced935de838517::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit97f2bad5d551d0ebd2ced935de838517::$classMap;

        }, null, ClassLoader::class);
    }
}
