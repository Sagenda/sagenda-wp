<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitcbafc3de100e38b3438d357c5f9f7b25
{
    public static $files = array (
        '92c8763cd6170fce6fcfe7e26b4e8c10' => __DIR__ . '/..' . '/symfony/phpunit-bridge/bootstrap.php',
    );

    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Symfony\\Component\\Debug\\' => 24,
            'Symfony\\Bridge\\PhpUnit\\' => 23,
        ),
        'P' => 
        array (
            'Psr\\Log\\' => 8,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Symfony\\Component\\Debug\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/debug',
        ),
        'Symfony\\Bridge\\PhpUnit\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/phpunit-bridge',
        ),
        'Psr\\Log\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/log/Psr/Log',
        ),
    );

    public static $prefixesPsr0 = array (
        'U' => 
        array (
            'Unirest' => 
            array (
                0 => __DIR__ . '/..' . '/mashape/unirest-php/src',
            ),
        ),
        'T' => 
        array (
            'Twig_Extensions_' => 
            array (
                0 => __DIR__ . '/..' . '/twig/extensions/lib',
            ),
            'Twig_' => 
            array (
                0 => __DIR__ . '/../..' . '/lib',
            ),
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitcbafc3de100e38b3438d357c5f9f7b25::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitcbafc3de100e38b3438d357c5f9f7b25::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInitcbafc3de100e38b3438d357c5f9f7b25::$prefixesPsr0;

        }, null, ClassLoader::class);
    }
}
