<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit6dd1629a9078dd25cc096e17305277a3
{
    public static $files = array (
        'c65d09b6820da036953a371c8c73a9b1' => __DIR__ . '/..' . '/facebook/graph-sdk/src/Facebook/polyfills.php',
    );

    public static $prefixLengthsPsr4 = array (
        't' => 
        array (
            'tubalmartin\\CssMin\\' => 19,
        ),
        'P' => 
        array (
            'Psr\\Log\\' => 8,
            'Psr\\Container\\' => 14,
        ),
        'M' => 
        array (
            'Monolog\\' => 8,
        ),
        'I' => 
        array (
            'Intervention\\Httpauth\\' => 22,
            'Interop\\Container\\' => 18,
        ),
        'F' => 
        array (
            'Facebook\\' => 9,
        ),
        'D' => 
        array (
            'DrewM\\MailChimp\\' => 16,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'tubalmartin\\CssMin\\' => 
        array (
            0 => __DIR__ . '/..' . '/tubalmartin/cssmin/src',
        ),
        'Psr\\Log\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/log/Psr/Log',
        ),
        'Psr\\Container\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/container/src',
        ),
        'Monolog\\' => 
        array (
            0 => __DIR__ . '/..' . '/monolog/monolog/src/Monolog',
        ),
        'Intervention\\Httpauth\\' => 
        array (
            0 => __DIR__ . '/..' . '/intervention/httpauth/src/Intervention/Httpauth',
        ),
        'Interop\\Container\\' => 
        array (
            0 => __DIR__ . '/..' . '/container-interop/container-interop/src/Interop/Container',
        ),
        'Facebook\\' => 
        array (
            0 => __DIR__ . '/..' . '/facebook/graph-sdk/src/Facebook',
        ),
        'DrewM\\MailChimp\\' => 
        array (
            0 => __DIR__ . '/..' . '/drewm/mailchimp-api/src',
        ),
    );

    public static $prefixesPsr0 = array (
        'P' => 
        array (
            'Props\\' => 
            array (
                0 => __DIR__ . '/..' . '/mrclay/props-dic/src',
                1 => __DIR__ . '/..' . '/mrclay/props-dic/test',
            ),
            'Pimple' => 
            array (
                0 => __DIR__ . '/..' . '/pimple/pimple/src',
            ),
        ),
        'J' => 
        array (
            'JSMin\\' => 
            array (
                0 => __DIR__ . '/..' . '/mrclay/jsmin-php/src',
            ),
        ),
        'H' => 
        array (
            'Hybrid' => 
            array (
                0 => __DIR__ . '/..' . '/hybridauth/hybridauth/hybridauth',
            ),
        ),
    );

    public static $classMap = array (
        'HTTP_ConditionalGet' => __DIR__ . '/..' . '/mrclay/minify/lib/HTTP/ConditionalGet.php',
        'HTTP_Encoder' => __DIR__ . '/..' . '/mrclay/minify/lib/HTTP/Encoder.php',
        'Hybrid_Auth' => __DIR__ . '/..' . '/hybridauth/hybridauth/hybridauth/Hybrid/Auth.php',
        'Hybrid_Endpoint' => __DIR__ . '/..' . '/hybridauth/hybridauth/hybridauth/Hybrid/Endpoint.php',
        'Hybrid_Error' => __DIR__ . '/..' . '/hybridauth/hybridauth/hybridauth/Hybrid/Error.php',
        'Hybrid_Exception' => __DIR__ . '/..' . '/hybridauth/hybridauth/hybridauth/Hybrid/Exception.php',
        'Hybrid_Logger' => __DIR__ . '/..' . '/hybridauth/hybridauth/hybridauth/Hybrid/Logger.php',
        'Hybrid_Provider_Adapter' => __DIR__ . '/..' . '/hybridauth/hybridauth/hybridauth/Hybrid/Provider_Adapter.php',
        'Hybrid_Provider_Model' => __DIR__ . '/..' . '/hybridauth/hybridauth/hybridauth/Hybrid/Provider_Model.php',
        'Hybrid_Provider_Model_OAuth1' => __DIR__ . '/..' . '/hybridauth/hybridauth/hybridauth/Hybrid/Provider_Model_OAuth1.php',
        'Hybrid_Provider_Model_OAuth2' => __DIR__ . '/..' . '/hybridauth/hybridauth/hybridauth/Hybrid/Provider_Model_OAuth2.php',
        'Hybrid_Provider_Model_OpenID' => __DIR__ . '/..' . '/hybridauth/hybridauth/hybridauth/Hybrid/Provider_Model_OpenID.php',
        'Hybrid_Providers_AOL' => __DIR__ . '/..' . '/hybridauth/hybridauth/hybridauth/Hybrid/Providers/AOL.php',
        'Hybrid_Providers_Facebook' => __DIR__ . '/..' . '/hybridauth/hybridauth/hybridauth/Hybrid/Providers/Facebook.php',
        'Hybrid_Providers_Foursquare' => __DIR__ . '/..' . '/hybridauth/hybridauth/hybridauth/Hybrid/Providers/Foursquare.php',
        'Hybrid_Providers_Google' => __DIR__ . '/..' . '/hybridauth/hybridauth/hybridauth/Hybrid/Providers/Google.php',
        'Hybrid_Providers_LinkedIn' => __DIR__ . '/..' . '/hybridauth/hybridauth/hybridauth/Hybrid/Providers/LinkedIn.php',
        'Hybrid_Providers_Live' => __DIR__ . '/..' . '/hybridauth/hybridauth/hybridauth/Hybrid/Providers/Live.php',
        'Hybrid_Providers_OpenID' => __DIR__ . '/..' . '/hybridauth/hybridauth/hybridauth/Hybrid/Providers/OpenID.php',
        'Hybrid_Providers_Twitter' => __DIR__ . '/..' . '/hybridauth/hybridauth/hybridauth/Hybrid/Providers/Twitter.php',
        'Hybrid_Providers_Yahoo' => __DIR__ . '/..' . '/hybridauth/hybridauth/hybridauth/Hybrid/Providers/Yahoo.php',
        'Hybrid_Storage' => __DIR__ . '/..' . '/hybridauth/hybridauth/hybridauth/Hybrid/Storage.php',
        'Hybrid_Storage_Interface' => __DIR__ . '/..' . '/hybridauth/hybridauth/hybridauth/Hybrid/StorageInterface.php',
        'Hybrid_User' => __DIR__ . '/..' . '/hybridauth/hybridauth/hybridauth/Hybrid/User.php',
        'Hybrid_User_Activity' => __DIR__ . '/..' . '/hybridauth/hybridauth/hybridauth/Hybrid/User_Activity.php',
        'Hybrid_User_Contact' => __DIR__ . '/..' . '/hybridauth/hybridauth/hybridauth/Hybrid/User_Contact.php',
        'Hybrid_User_Profile' => __DIR__ . '/..' . '/hybridauth/hybridauth/hybridauth/Hybrid/User_Profile.php',
        'LightOpenID' => __DIR__ . '/..' . '/hybridauth/hybridauth/hybridauth/Hybrid/thirdparty/OpenID/LightOpenID.php',
        'Minify' => __DIR__ . '/..' . '/mrclay/minify/lib/Minify.php',
        'Minify\\App' => __DIR__ . '/..' . '/mrclay/minify/lib/Minify/App.php',
        'Minify\\Config' => __DIR__ . '/..' . '/mrclay/minify/lib/Minify/Config.php',
        'Minify\\JS\\JShrink' => __DIR__ . '/..' . '/mrclay/minify/lib/Minify/JS/JShrink.php',
        'Minify\\Logger\\LegacyHandler' => __DIR__ . '/..' . '/mrclay/minify/lib/Minify/Logger/LegacyHandler.php',
        'Minify_Build' => __DIR__ . '/..' . '/mrclay/minify/lib/Minify/Build.php',
        'Minify_CSS' => __DIR__ . '/..' . '/mrclay/minify/lib/Minify/CSS.php',
        'Minify_CSS_Compressor' => __DIR__ . '/..' . '/mrclay/minify/lib/Minify/CSS/Compressor.php',
        'Minify_CSS_UriRewriter' => __DIR__ . '/..' . '/mrclay/minify/lib/Minify/CSS/UriRewriter.php',
        'Minify_CSSmin' => __DIR__ . '/..' . '/mrclay/minify/lib/Minify/CSSmin.php',
        'Minify_CacheInterface' => __DIR__ . '/..' . '/mrclay/minify/lib/Minify/CacheInterface.php',
        'Minify_Cache_APC' => __DIR__ . '/..' . '/mrclay/minify/lib/Minify/Cache/APC.php',
        'Minify_Cache_File' => __DIR__ . '/..' . '/mrclay/minify/lib/Minify/Cache/File.php',
        'Minify_Cache_Memcache' => __DIR__ . '/..' . '/mrclay/minify/lib/Minify/Cache/Memcache.php',
        'Minify_Cache_Null' => __DIR__ . '/..' . '/mrclay/minify/lib/Minify/Cache/Null.php',
        'Minify_Cache_WinCache' => __DIR__ . '/..' . '/mrclay/minify/lib/Minify/Cache/WinCache.php',
        'Minify_Cache_XCache' => __DIR__ . '/..' . '/mrclay/minify/lib/Minify/Cache/XCache.php',
        'Minify_Cache_ZendPlatform' => __DIR__ . '/..' . '/mrclay/minify/lib/Minify/Cache/ZendPlatform.php',
        'Minify_ClosureCompiler' => __DIR__ . '/..' . '/mrclay/minify/lib/Minify/ClosureCompiler.php',
        'Minify_ClosureCompiler_Exception' => __DIR__ . '/..' . '/mrclay/minify/lib/Minify/ClosureCompiler.php',
        'Minify_CommentPreserver' => __DIR__ . '/..' . '/mrclay/minify/lib/Minify/CommentPreserver.php',
        'Minify_ControllerInterface' => __DIR__ . '/..' . '/mrclay/minify/lib/Minify/ControllerInterface.php',
        'Minify_Controller_Base' => __DIR__ . '/..' . '/mrclay/minify/lib/Minify/Controller/Base.php',
        'Minify_Controller_Files' => __DIR__ . '/..' . '/mrclay/minify/lib/Minify/Controller/Files.php',
        'Minify_Controller_Groups' => __DIR__ . '/..' . '/mrclay/minify/lib/Minify/Controller/Groups.php',
        'Minify_Controller_MinApp' => __DIR__ . '/..' . '/mrclay/minify/lib/Minify/Controller/MinApp.php',
        'Minify_Controller_Page' => __DIR__ . '/..' . '/mrclay/minify/lib/Minify/Controller/Page.php',
        'Minify_DebugDetector' => __DIR__ . '/..' . '/mrclay/minify/lib/Minify/DebugDetector.php',
        'Minify_Env' => __DIR__ . '/..' . '/mrclay/minify/lib/Minify/Env.php',
        'Minify_HTML' => __DIR__ . '/..' . '/mrclay/minify/lib/Minify/HTML.php',
        'Minify_HTML_Helper' => __DIR__ . '/..' . '/mrclay/minify/lib/Minify/HTML/Helper.php',
        'Minify_ImportProcessor' => __DIR__ . '/..' . '/mrclay/minify/lib/Minify/ImportProcessor.php',
        'Minify_JS_ClosureCompiler' => __DIR__ . '/..' . '/mrclay/minify/lib/Minify/JS/ClosureCompiler.php',
        'Minify_JS_ClosureCompiler_Exception' => __DIR__ . '/..' . '/mrclay/minify/lib/Minify/JS/ClosureCompiler.php',
        'Minify_LessCssSource' => __DIR__ . '/..' . '/mrclay/minify/lib/Minify/LessCssSource.php',
        'Minify_Lines' => __DIR__ . '/..' . '/mrclay/minify/lib/Minify/Lines.php',
        'Minify_NailgunClosureCompiler' => __DIR__ . '/..' . '/mrclay/minify/lib/Minify/NailgunClosureCompiler.php',
        'Minify_Packer' => __DIR__ . '/..' . '/mrclay/minify/lib/Minify/Packer.php',
        'Minify_ScssCssSource' => __DIR__ . '/..' . '/mrclay/minify/lib/Minify/ScssCssSource.php',
        'Minify_ServeConfiguration' => __DIR__ . '/..' . '/mrclay/minify/lib/Minify/ServeConfiguration.php',
        'Minify_Source' => __DIR__ . '/..' . '/mrclay/minify/lib/Minify/Source.php',
        'Minify_SourceInterface' => __DIR__ . '/..' . '/mrclay/minify/lib/Minify/SourceInterface.php',
        'Minify_SourceSet' => __DIR__ . '/..' . '/mrclay/minify/lib/Minify/SourceSet.php',
        'Minify_Source_Factory' => __DIR__ . '/..' . '/mrclay/minify/lib/Minify/Source/Factory.php',
        'Minify_Source_FactoryException' => __DIR__ . '/..' . '/mrclay/minify/lib/Minify/Source/FactoryException.php',
        'Minify_YUICompressor' => __DIR__ . '/..' . '/mrclay/minify/lib/Minify/YUICompressor.php',
        'MrClay\\Cli' => __DIR__ . '/..' . '/mrclay/minify/lib/MrClay/Cli.php',
        'MrClay\\Cli\\Arg' => __DIR__ . '/..' . '/mrclay/minify/lib/MrClay/Cli/Arg.php',
        'OAuth1Client' => __DIR__ . '/..' . '/hybridauth/hybridauth/hybridauth/Hybrid/thirdparty/OAuth/OAuth1Client.php',
        'OAuth2Client' => __DIR__ . '/..' . '/hybridauth/hybridauth/hybridauth/Hybrid/thirdparty/OAuth/OAuth2Client.php',
        'OAuthConsumer' => __DIR__ . '/..' . '/hybridauth/hybridauth/hybridauth/Hybrid/thirdparty/OAuth/OAuth.php',
        'OAuthDataStore' => __DIR__ . '/..' . '/hybridauth/hybridauth/hybridauth/Hybrid/thirdparty/OAuth/OAuth.php',
        'OAuthException' => __DIR__ . '/..' . '/hybridauth/hybridauth/hybridauth/Hybrid/thirdparty/OAuth/OAuth.php',
        'OAuthRequest' => __DIR__ . '/..' . '/hybridauth/hybridauth/hybridauth/Hybrid/thirdparty/OAuth/OAuth.php',
        'OAuthServer' => __DIR__ . '/..' . '/hybridauth/hybridauth/hybridauth/Hybrid/thirdparty/OAuth/OAuth.php',
        'OAuthSignatureMethod' => __DIR__ . '/..' . '/hybridauth/hybridauth/hybridauth/Hybrid/thirdparty/OAuth/OAuth.php',
        'OAuthSignatureMethod_HMAC_SHA1' => __DIR__ . '/..' . '/hybridauth/hybridauth/hybridauth/Hybrid/thirdparty/OAuth/OAuth.php',
        'OAuthSignatureMethod_PLAINTEXT' => __DIR__ . '/..' . '/hybridauth/hybridauth/hybridauth/Hybrid/thirdparty/OAuth/OAuth.php',
        'OAuthSignatureMethod_RSA_SHA1' => __DIR__ . '/..' . '/hybridauth/hybridauth/hybridauth/Hybrid/thirdparty/OAuth/OAuth.php',
        'OAuthToken' => __DIR__ . '/..' . '/hybridauth/hybridauth/hybridauth/Hybrid/thirdparty/OAuth/OAuth.php',
        'OAuthUtil' => __DIR__ . '/..' . '/hybridauth/hybridauth/hybridauth/Hybrid/thirdparty/OAuth/OAuth.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit6dd1629a9078dd25cc096e17305277a3::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit6dd1629a9078dd25cc096e17305277a3::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInit6dd1629a9078dd25cc096e17305277a3::$prefixesPsr0;
            $loader->classMap = ComposerStaticInit6dd1629a9078dd25cc096e17305277a3::$classMap;

        }, null, ClassLoader::class);
    }
}