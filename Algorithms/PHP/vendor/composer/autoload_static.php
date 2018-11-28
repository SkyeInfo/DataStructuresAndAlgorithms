<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit98abfdc41ca98a67c809b5cdcdae1554
{
    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Stack\\' => 6,
            'Sort\\' => 5,
            'Search\\' => 7,
        ),
        'Q' => 
        array (
            'Queue\\' => 6,
        ),
        'L' => 
        array (
            'LinkedList\\' => 11,
        ),
        'H' => 
        array (
            'HashTable\\' => 10,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Stack\\' => 
        array (
            0 => __DIR__ . '/../..' . '/stack',
        ),
        'Sort\\' => 
        array (
            0 => __DIR__ . '/../..' . '/sort',
        ),
        'Search\\' => 
        array (
            0 => __DIR__ . '/../..' . '/search',
        ),
        'Queue\\' => 
        array (
            0 => __DIR__ . '/../..' . '/queue',
        ),
        'LinkedList\\' => 
        array (
            0 => __DIR__ . '/../..' . '/linkedList',
        ),
        'HashTable\\' => 
        array (
            0 => __DIR__ . '/../..' . '/hash',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit98abfdc41ca98a67c809b5cdcdae1554::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit98abfdc41ca98a67c809b5cdcdae1554::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
