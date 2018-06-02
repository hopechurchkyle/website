<?php

namespace WPFCManager\WPFCManager\Log;

/**
 * All logging related functions
 *
 * @package WPFCManager\WPFCManager\Log
 * @since   1.0.0
 */
interface Logging {
	/**
	 * Logs the message
	 *
	 * @param int    $code    Message code. Can be anything.
	 * @param string $message The message.
	 *
	 * @return mixed
	 * @since 1.0.0
	 */

	public function log( $code = 0, $message = '' );
}