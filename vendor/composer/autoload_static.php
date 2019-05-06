<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit13174642eae61c3118a83d91f4ca9697
{
    public static $files = array (
        'c92bf23a32412037ecdc51806b458c36' => __DIR__ . '/..' . '/alledia/edd-sl-plugin-updater/EDD_SL_Plugin_Updater.php',
        '89ff252b349d4d088742a09c25f5dd74' => __DIR__ . '/..' . '/yahnis-elsts/plugin-update-checker/plugin-update-checker.php',
        'a0c43c4da349ad36234823ab067125b5' => __DIR__ . '/..' . '/aristath/kirki/kirki.php',
        'cd687daee92ab44e083eb4f832f9f903' => __DIR__ . '/../..' . '/src/autoload.php',
    );

    public static $classMap = array (
        'GenesisCustomizer\\Admin_API' => __DIR__ . '/../..' . '/src/classes/class-admin-api.php',
        'GenesisCustomizer\\Admin_Settings' => __DIR__ . '/../..' . '/src/classes/class-admin-settings.php',
        'GenesisCustomizer\\Box_Shadow_Control' => __DIR__ . '/../..' . '/src/classes/class-box-shadow-control.php',
        'GenesisCustomizer\\Hidden_Section' => __DIR__ . '/../..' . '/src/classes/class-hidden-section.php',
        'GenesisCustomizer\\Link_Section' => __DIR__ . '/../..' . '/src/classes/class-link-section.php',
        'GenesisCustomizer\\Mega_Menu_Admin' => __DIR__ . '/../..' . '/src/classes/class-mega-menu-admin.php',
        'GenesisCustomizer\\Menu_Fields_Walker' => __DIR__ . '/../..' . '/src/classes/class-menu-fields-walker.php',
        'GenesisCustomizer\\Select_Control' => __DIR__ . '/../..' . '/src/classes/class-select-control.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->classMap = ComposerStaticInit13174642eae61c3118a83d91f4ca9697::$classMap;

        }, null, ClassLoader::class);
    }
}