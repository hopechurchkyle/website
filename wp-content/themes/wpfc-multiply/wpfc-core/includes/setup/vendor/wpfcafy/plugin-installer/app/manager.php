<?php
if ( ! class_exists( 'Wpfcafy_ModuleLoader_SubModuleLoader' ) ) {
	class Wpfcafy_ModuleLoader_SubModuleLoader {
		protected $submodules = array();

		public function set_submodules( $submodules ) {
			$this->submodules = $submodules;
		}

		public function get_submodules() {
			return $this->submodules;
		}

		public function load_submodules() {
			foreach ( $this->get_submodules() as $submodule_name => $submodule_dependency ) {
				if ( $this->has_submodule_instance( $submodule_name ) ) {
					continue;
				}

				$submodule = $this->create_instance( $submodule_dependency );

				if ( $submodule ) {
					$this->add_submodule( $submodule_name, $submodule );
				}
			}
		}

		public function get_submodule( $submodule_name, $args = false ) {
			$submodule = $this->modules[ $submodule_name ];

			if ( $args && ! empty( $args ) ) {
				$submodule = $args[0];

				return $submodule->$submodule();
			}

			return $this->modules[ $submodule_name ];
		}

		public function add_submodule( $submodule_name, $submodule ) {
			if ( $this->has_submodule_instance( $submodule_name ) ) {
				return;
			}

			$this->modules[ $submodule_name ] = $submodule;
		}

		public function has_submodule( $submodule_name ) {
			return isset( $this->modules[ $submodule_name ] );
		}

		public function has_submodule_instance( $submodule_name ) {
			return $this->has_submodule( $submodule_name );
		}

		public function create_instance( $submodule_class ) {
			return new $submodule_class;
		}
	}
}

if ( ! class_exists( 'Wpfcafy_ModuleLoader_LoadInterface' ) ) {
	interface Wpfcafy_ModuleLoader_LoadInterface {
		public function load();

		public function is_loaded();
	}

}

if ( ! class_exists( 'Wpfcafy_ModuleLoader_HookInterface' ) ) {
	interface Wpfcafy_ModuleLoader_HookInterface {
		public function hook();

		public function is_hooked();
	}
}

if ( ! class_exists( 'Wpfcafy_ModuleLoader_Module' ) ) :
	abstract class Wpfcafy_ModuleLoader_Module implements Wpfcafy_ModuleLoader_HookInterface, Wpfcafy_ModuleLoader_LoadInterface {
		protected $is_loaded = false;
		protected $is_hooked = false;
		protected $modules = array();
		protected $loader;

		public function __construct() {
			$this->load();
			$this->loader = new Wpfcafy_ModuleLoader_SubModuleLoader();
			$this->loader->set_submodules( $this->get_modules() );
			$this->loader->load_submodules();
			$this->hook();
		}

		public function __call( $name, $args ) {
			if ( $this->loader->has_submodule_instance( $name ) ) {
				return $this->loader->get_submodule( $name, $args );
			}

			return call_user_func_array( $name, $args );
		}

		public function load() {
			if ( $this->is_loaded() ) {
				return;
			}
			$this->is_loaded = true;
		}

		public function is_loaded() {
			return (bool) $this->is_loaded;
		}

		public function hook() {
			if ( $this->is_hooked() ) {
				return;
			}

			$this->is_hooked = true;
		}

		public function is_hooked() {
			return (bool) $this->is_hooked;
		}

		public function get_modules() {
			return (array) $this->modules;
		}
	}
endif;

/**
 * Bootstrap the Plugin Installer.
 *
 * @since 1.0.0
 */
class Wpfcafy_PluginInstaller_Manager extends Wpfcafy_ModuleLoader_Module {

	/**
	 * Theme-specific options.
	 *
	 * @since  1.0.0
	 * @access public
	 * @var string
	 */
	public static $options;
	/**
	 * @since  1.1.0
	 * @var array $modules
	 * @access protected
	 */
	protected $modules = array(
		'activate' => 'Wpfcafy_PluginInstaller_Activate'
	);

	/**
	 * Set a specific option.
	 *
	 * @since 1.0.0
	 *
	 * @param string $key
	 * @param mixed  $value
	 */
	public static function set_option( $key, $value ) {
		self::$options[ $key ] = $value;

		return self::get_option( $key );
	}

	/**
	 * Get a specific option.
	 *
	 * @since 1.0.0
	 *
	 * @param string $key
	 *
	 * @return mixed $option False if no option exists.
	 */
	public static function get_option( $key ) {
		$options = self::get_options();

		if ( isset( $options[ $key ] ) ) {
			return $options[ $key ];
		}

		return false;
	}

	/**
	 * Get all set options.
	 *
	 * @since 1.0.0
	 * @return array $options
	 */
	public static function get_options() {
		return (array) self::$options;
	}

	/**
	 * Set options.
	 *
	 * Options are stored in an array and should be set before
	 * anything else.
	 *
	 * @since 1.0.0
	 *
	 * @param array $options
	 *
	 * @return array $options
	 */
	public static function set_options( $options = array() ) {
		self::$options = wp_parse_args( $options, self::$options );

		return self::$options;
	}

	/**
	 * Load extra dependencies.
	 *
	 * @since 1.1.0
	 */
	public function load() {
		require_once( 'wpfcafy-plugininstaller-functions.php' );
	}

}
