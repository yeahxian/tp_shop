<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit3b9b30a6bc005c791bf54a98cf0ecd86
{
    public static $prefixLengthsPsr4 = array (
        'F' => 
        array (
            'Faker\\' => 6,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Faker\\' => 
        array (
            0 => __DIR__ . '/..' . '/fzaninotto/faker/src/Faker',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit3b9b30a6bc005c791bf54a98cf0ecd86::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit3b9b30a6bc005c791bf54a98cf0ecd86::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
