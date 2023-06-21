<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit24de1f81acb5c7736ed59c40c9a2b3de
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit24de1f81acb5c7736ed59c40c9a2b3de::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit24de1f81acb5c7736ed59c40c9a2b3de::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit24de1f81acb5c7736ed59c40c9a2b3de::$classMap;

        }, null, ClassLoader::class);
    }
}