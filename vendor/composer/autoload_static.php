<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit918193bec18d6dee8e1836aa7bc80e6a
{
    public static $prefixLengthsPsr4 = array (
        'I' => 
        array (
            'InTradeSys\\eBay\\fileTransfer\\' => 29,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'InTradeSys\\eBay\\fileTransfer\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit918193bec18d6dee8e1836aa7bc80e6a::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit918193bec18d6dee8e1836aa7bc80e6a::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
