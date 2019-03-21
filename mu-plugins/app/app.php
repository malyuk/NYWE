<?php

namespace NYWE;

use Arrilot\DotEnv\DotEnv;
use function A7\autoload;
use function Zeek\WP_Util\get_env_value;
use Zeek\WP_Util\ErrorHandling;

define( 'NYWE_CORE_VERSION', '1.0.0' );
define( 'NYWE_CORE_URL', plugin_dir_url( __FILE__ ) );
define( 'NYWE_CORE_PATH', dirname( __FILE__ ) . '/' );

require_once __DIR__ . '/vendor/autoload.php';

/**
 * Load dotenv if .env file is present
 */
if ( file_exists( __DIR__ . '/.env.php' ) ) {
	DotEnv::load( __DIR__ . '/.env.php' );
	DotEnv::copyVarsToEnv();
}

/**
 * Add Sentry Error Logging
 */
if ( $sentry_url = get_env_value( 'SENTRY_URL' ) ) {
	$client = new \Raven_Client( get_env_value( 'SENTRY_URL' ) );
	$client->install();
}

/**
 * Set the proper constant for ACF Lite
 * Only load our hardcoded fields if ACF Lite is off
 */
if ( true === get_env_value( 'ACF_LITE' ) ) {
	define( 'ACF_LITE', true );
}

/**
 * Enable WP Util Behaviors
 */
new \Zeek\WP_Util\Behaviors();

/**
 * Load all php files in /src/
 * Only php files should belong in /src/
 */
autoload( __DIR__ . '/src' );
