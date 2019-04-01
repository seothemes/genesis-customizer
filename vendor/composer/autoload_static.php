<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit679f46a9d0e5f747d547b51edd715846
{
    public static $files = array (
        'a5f882d89ab791a139cd2d37e50cdd80' => __DIR__ . '/..' . '/tgmpa/tgm-plugin-activation/class-tgm-plugin-activation.php',
        '89ff252b349d4d088742a09c25f5dd74' => __DIR__ . '/..' . '/yahnis-elsts/plugin-update-checker/plugin-update-checker.php',
        'd1cd334f5a619a1a0226b9e2410cce1d' => __DIR__ . '/..' . '/richtabor/merlin-wp/class-merlin.php',
        'df4fac3550f84a60488f54e592cab1e6' => __DIR__ . '/..' . '/aristath/kirki/kirki.php',
        '51651570b2c3e7669fd43489fdc7ea02' => __DIR__ . '/../..' . '/src/autoload.php',
    );

    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'Psr\\Log\\' => 8,
            'ProteusThemes\\WPContentImporter2\\' => 33,
        ),
        'M' => 
        array (
            'Monolog\\' => 8,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Psr\\Log\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/log/Psr/Log',
        ),
        'ProteusThemes\\WPContentImporter2\\' => 
        array (
            0 => __DIR__ . '/..' . '/proteusthemes/wp-content-importer-v2/src',
        ),
        'Monolog\\' => 
        array (
            0 => __DIR__ . '/..' . '/monolog/monolog/src/Monolog',
        ),
    );

    public static $classMap = array (
        'GenesisCustomizer\\Box_Shadow_Control' => __DIR__ . '/../..' . '/src/classes/class-box-shadow-control.php',
        'GenesisCustomizer\\Hidden_Section' => __DIR__ . '/../..' . '/src/classes/class-hidden-section.php',
        'GenesisCustomizer\\Link_Section' => __DIR__ . '/../..' . '/src/classes/class-link-section.php',
        'GenesisCustomizer\\Mega_Menu_Admin' => __DIR__ . '/../..' . '/src/classes/class-mega-menu-admin.php',
        'GenesisCustomizer\\Menu_Fields_Walker' => __DIR__ . '/../..' . '/src/classes/class-menu-fields-walker.php',
        'GenesisCustomizer\\Merlin_WP' => __DIR__ . '/../..' . '/src/classes/class-merlin-wp.php',
        'GenesisCustomizer\\Select_Control' => __DIR__ . '/../..' . '/src/classes/class-select-control.php',
        'GenesisCustomizer\\Typekit_Fonts' => __DIR__ . '/../..' . '/src/classes/class-typekit-fonts.php',
        'GenesisCustomizer\\WP_CLI_Commands' => __DIR__ . '/../..' . '/src/classes/class-wp-cli-commands.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit679f46a9d0e5f747d547b51edd715846::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit679f46a9d0e5f747d547b51edd715846::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit679f46a9d0e5f747d547b51edd715846::$classMap;

        }, null, ClassLoader::class);
    }
}
