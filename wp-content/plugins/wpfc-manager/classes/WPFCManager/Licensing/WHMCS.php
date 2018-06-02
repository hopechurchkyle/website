<?php

namespace WPFCManager\WPFCManager\Licensing;

/**
 * WHMCS licensing
 *
 * @package WPFCManager\WPFCManager\Licensing
 * @since   1.0.0
 */
class WHMCS implements Licensing {

	/**
	 * Plugin slug, created with `sanitize_title()`
	 *
	 * @var string The slug
	 */

	public $slug;

	/**
	 * The real path to the product, with resolved symlinks.
	 *
	 * @var string
	 */

	public $product_path;

	/**
	 * MD5 secret key. Must match what is specified in the MD5 Hash Verification field of the licensing product that
	 * will be used with this check.
	 *
	 * @var string
	 */

	protected $md5_secret;

	/**
	 * WHMCS constructor.
	 *
	 * @param string $slug
	 * @param string $md5_secret
	 * @param string $product_path
	 */
	public function __construct( $slug, $md5_secret, $product_path ) {
		$this->slug         = $slug;
		$this->md5_secret   = $md5_secret;
		$this->product_path = $product_path;
	}

	/**
	 * Checks if product is active
	 *
	 * @return bool True if it is, false otherwise
	 */
	public function isActive() {
		$license_key = get_option( $this->slug . '-license_key', '' );
		$local_key   = get_option( $this->slug . '-license_local_key', '' );

		if ( ! $license_key ) {
			return false;
		}

		try {
			// check if it's a club license
			$response = json_decode( \url_request_all( 'https://wpforchurch.com/?WPFC=check_license&license_key=' . $license_key ) );
		} catch ( \Exception $exception ) {
			return false;
		}

		if ( $response && $response->message === 'Valid' ) {
			return true;
		}

		if ( ! $local_key ) {
			return false;
		}

		$response = self::checkLicense( $license_key, $local_key );

		if ( $response['status'] !== 'Active' ) {
			return false;
		}

		return true;
	}

	/**
	 * WHMCS script for activating license
	 *
	 * @param string $license_key The license key from client area page
	 * @param string $local_key   The key that gets returned on first activation
	 * @param bool   $verbose     If set to true - there will be more data in the return array
	 *
	 * @return array
	 */
	public function checkLicense( $license_key, $local_key, $verbose = false ) {
		// Enter the url to your WHMCS installation here
		$whmcsurl = 'http://www.wpforchurch.com/my/';
		// Must match what is specified in the MD5 Hash Verification field
		// of the licensing product that will be used with this check.
		$licensing_secret_key = $this->md5_secret;
		// The number of days to wait between performing remote license checks
		$local_keydays = 15;
		// The number of days to allow failover for after local key expiry
		$allowcheckfaildays = 5;

		// -----------------------------------
		//  -- Do not edit below this line --
		// -----------------------------------

		$check_token            = time() . md5( mt_rand( 1000000000, 9999999999 ) . $license_key );
		$checkdate              = date( "Ymd" );
		$domain                 = $_SERVER['SERVER_NAME'];
		$usersip                = isset( $_SERVER['SERVER_ADDR'] ) ? $_SERVER['SERVER_ADDR'] : $_SERVER['LOCAL_ADDR'];
		$dirpath                = $this->product_path;
		$verifyfilepath         = 'modules/servers/licensing/verify.php';
		$local_keyvalid         = false;
		$return                 = array(
			'license_key' => $license_key,
			'check_token' => $check_token,
			'checkdate'   => $checkdate,
			'domain'      => $domain,
			'ip'          => $usersip,
			'path'        => $dirpath,
		);
		$return['is_local_key'] = false;
		if ( $local_key ) {
			$local_key                     = str_replace( "\n", '', $local_key ); # Remove the line breaks
			$localdata                     = substr( $local_key, 0, strlen( $local_key ) - 32 ); # Extract License Data
			$md5hash                       = substr( $local_key, strlen( $local_key ) - 32 ); # Extract MD5 Hash
			$return['local_key_md5_valid'] = false;
			if ( $md5hash == md5( $localdata . $licensing_secret_key ) ) {
				$return['local_key_second_md5_valid'] = false;
				$return['local_key_first_md5_valid']  = true;
				$localdata                            = strrev( $localdata ); # Reverse the string
				$md5hash                              = substr( $localdata, 0, 32 ); # Extract MD5 Hash
				$localdata                            = substr( $localdata, 32 ); # Extract License Data
				$localdata                            = base64_decode( $localdata );
				$local_keyresults                     = unserialize( $localdata );
				$originalcheckdate                    = $local_keyresults['checkdate'];
				if ( $md5hash == md5( $originalcheckdate . $licensing_secret_key ) ) {
					$return['local_key_second_md5_valid'] = true;
					$return['local_key_expired']          = true;
					$localexpiry                          = date( "Ymd", mktime( 0, 0, 0, date( "m" ), date( "d" ) - $local_keydays, date( "Y" ) ) );
					if ( $originalcheckdate > $localexpiry ) {
						$return['local_key_expired'] = false;
						$return['is_local_key']      = true;
						$return['domain_valid']      = true;
						$return['ip_valid']          = true;
						$return['dir_valid']         = true;
						$local_keyvalid              = true;
						$results                     = $local_keyresults;
						$validdomains                = explode( ',', $results['validdomain'] );
						if ( ! in_array( $_SERVER['SERVER_NAME'], $validdomains ) ) {
							$return['domain_valid']     = false;
							$local_keyvalid             = false;
							$local_keyresults['status'] = "Invalid";
							$results                    = array();
						}
						$validips           = explode( ',', $results['validip'] );
						$return['ip_valid'] = false;
						if ( ! in_array( $usersip, $validips ) ) {
							$local_keyvalid             = false;
							$local_keyresults['status'] = "Invalid";
							$results                    = array();
						}
						$validdirs = explode( ',', $results['validdirectory'] );
						if ( ! in_array( $dirpath, $validdirs ) ) {
							$return['dir_valid']        = false;
							$local_keyvalid             = false;
							$local_keyresults['status'] = "Invalid";
							$results                    = array();
						}
					}
				}
			}
		}
		if ( ! $local_keyvalid ) {
			$responseCode = 0;
			$postfields   = array(
				'licensekey' => $license_key,
				'domain'     => $domain,
				'ip'         => $usersip,
				'dir'        => $dirpath,
			);
			if ( $check_token ) {
				$postfields['check_token'] = $check_token;
			}
			$query_string = '';
			foreach ( $postfields AS $k => $v ) {
				$query_string .= $k . '=' . urlencode( $v ) . '&';
			}
			if ( function_exists( 'curl_exec' ) ) {
				$ch = curl_init();
				curl_setopt( $ch, CURLOPT_URL, $whmcsurl . $verifyfilepath );
				curl_setopt( $ch, CURLOPT_POST, 1 );
				curl_setopt( $ch, CURLOPT_POSTFIELDS, $query_string );
				curl_setopt( $ch, CURLOPT_TIMEOUT, 30 );
				curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1 );
				$data         = curl_exec( $ch );
				$responseCode = curl_getinfo( $ch, CURLINFO_HTTP_CODE );
				curl_close( $ch );
			} else {
				$responseCodePattern = '/^HTTP\/\d+\.\d+\s+(\d+)/';
				$fp                  = @fsockopen( $whmcsurl, 80, $errno, $errstr, 5 );
				if ( $fp ) {
					$newlinefeed = "\r\n";
					$header      = "POST " . $whmcsurl . $verifyfilepath . " HTTP/1.0" . $newlinefeed;
					$header      .= "Host: " . $whmcsurl . $newlinefeed;
					$header      .= "Content-type: application/x-www-form-urlencoded" . $newlinefeed;
					$header      .= "Content-length: " . @strlen( $query_string ) . $newlinefeed;
					$header      .= "Connection: close" . $newlinefeed . $newlinefeed;
					$header      .= $query_string;
					$data        = $line = '';
					@stream_set_timeout( $fp, 20 );
					@fputs( $fp, $header );
					$status = @socket_get_status( $fp );
					while ( ! @feof( $fp ) && $status ) {
						$line           = @fgets( $fp, 1024 );
						$patternMatches = array();
						if ( ! $responseCode
						     && preg_match( $responseCodePattern, trim( $line ), $patternMatches )
						) {
							$responseCode = ( empty( $patternMatches[1] ) ) ? 0 : $patternMatches[1];
						}
						$data   .= $line;
						$status = @socket_get_status( $fp );
					}
					@fclose( $fp );
				}
			}

			$return['response_code'] = $responseCode;
			$return['response_data'] = $data;

			if ( $responseCode != 200 ) {
				$localexpiry = date( "Ymd", mktime( 0, 0, 0, date( "m" ), date( "d" ) - ( $local_keydays + $allowcheckfaildays ), date( "Y" ) ) );
				if ( $originalcheckdate > $localexpiry ) {
					$return['remove_check_valid'] = true;
					$results                      = $local_keyresults;
				} else {
					$return['remove_check_valid'] = false;
					$results                      = array();
					$results['status']            = "Invalid";
					$results['description']       = "Remote Check Failed";

					if ( $verbose ) {
						$results = array_merge( $return, $results );
					}

					return $results;
				}
			} else {
				preg_match_all( '/<(.*?)>([^<]+)<\/\\1>/i', $data, $matches );
				$results = array();
				foreach ( $matches[1] AS $k => $v ) {
					$results[ $v ] = $matches[2][ $k ];
				}
			}
			if ( ! is_array( $results ) ) {
				die( "Invalid License Server Response" );
			}
			$return['remote_md5_valid'] = false;
			if ( isset( $results['md5hash'] ) && $results['md5hash'] ) {
				if ( $results['md5hash'] != md5( $licensing_secret_key . $check_token ) ) {
					$results['status']      = "Invalid";
					$results['description'] = "MD5 Checksum Verification Failed";

					if ( $verbose ) {
						$results = array_merge( $return, $results );
					}

					return $results;
				}
			}
			$return['remote_md5_valid'] = true;
			if ( $results['status'] == "Active" ) {
				$results['checkdate'] = $checkdate;
				$data_encoded         = serialize( $results );
				$data_encoded         = base64_encode( $data_encoded );
				$data_encoded         = md5( $checkdate . $licensing_secret_key ) . $data_encoded;
				$data_encoded         = strrev( $data_encoded );
				$data_encoded         = $data_encoded . md5( $data_encoded . $licensing_secret_key );
				$data_encoded         = wordwrap( $data_encoded, 80, "\n", true );
				$results['localkey']  = $data_encoded;
			}
			$results['remotecheck'] = true;
		}
		unset( $postfields, $data, $matches, $whmcsurl, $licensing_secret_key, $checkdate, $usersip, $local_keydays, $allowcheckfaildays, $md5hash );

		if ( $verbose ) {
			$results = array_merge( $return, $results );
		}

		return $results;
	}

	public function activate( $license_key, $verbose = false ) {
		update_option( $this->slug . '-license_key', $license_key );
		update_option( $this->slug . '-license_local_key', '' );

		try {
			// check if it's a club license
			$response = json_decode( \url_request_all( 'https://wpforchurch.com/?WPFC=check_license&license_key=' . $license_key ) );
		} catch ( \Exception $exception ) {
			return $exception->getMessage();
		}

		if ( $response && $response->message === 'Valid' ) {
			return true;
		}

		$license = self::checkLicense( $license_key, '', $verbose );
		if ( ! empty( $license['localkey'] ) && $license['status'] === 'Active' ) {
			update_option( $this->slug . '-license_local_key', $license['localkey'] );

			return true;
		}

		if ( $verbose === true ) {
			return $license;
		}

		return 'Unknown error.';
	}

	public function deactivate() {
		return null;
	}
}