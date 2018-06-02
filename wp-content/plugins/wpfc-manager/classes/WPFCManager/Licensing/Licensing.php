<?php

namespace WPFCManager\WPFCManager\Licensing;

/**
 * All functions related to licensing.
 *
 * @package WPFCManager\WPFCManager\Licensing
 * @since   1.0.0
 */
interface Licensing {

	/**
	 * Checks if the supplied license is active
	 *
	 * @return bool|null True if it is, false otherwise. Null on failure.
	 * @since 1.0.0
	 */

	public function isActive();

	/**
	 * Activates the license
	 *
	 * @param string $license_key The license key to save
	 *
	 * @return null|true True on success. Null on failure.
	 * @since 1.0.0
	 */

	public function activate( $license_key );

	/**
	 * Deactivates a license
	 *
	 * @return true|null True on success (successfully deactivated). Null on failure.
	 * @since 1.0.0
	 */

	public function deactivate();

}