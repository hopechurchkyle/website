<?php
/*
 * User Role Editor WordPress plugin
 * Activate additional user capabilities introduced by WordPress starting from version 4.9
 * https://make.wordpress.org/core/2017/10/15/improvements-for-roles-and-capabilities-in-4-9/
 * Author: Vladimir Garagulia
 * Author email: support@role-editor.com
 * Author URI: https://role-editor.com
 * License: GPL v2+ 
 */

class URE_Additional_Caps {
 
    private $lib = null;
    private $activate_for_plugins = false;
    private $activate_for_languages = false;
    
    
    public function __construct() {
        
        $this->lib = URE_Lib_Pro::get_instance();
        $this->activate_for_plugins = $this->lib->get_option('activate_add_caps_for_plugins', false);        
        $this->activate_for_languages = $this->lib->get_option('activate_add_caps_for_languages', false);
        $this->activate_for_plugins();
        $this->activate_for_languages();
                
    }
    // end of __construct()
    
    
    /** Add languages capabilities to the related groups of WordPress built-in capabilities
     *  Hooked to 'ure_built_in_wp_caps' filter from URE_Capabilities_Groups_Manager
     * 
     * @param array $caps
     * @return array
     */
    public function add_plugins_caps_to_groups($caps) {
        
        $caps['deactivate_plugins'] = array('core', 'general', 'plugins');
        
        return $caps;
    }
    // end of add_plugins_caps_to_groups()

    
    
    public function map_for_plugins($caps, $cap) {

        
        if ($cap=='deactivate_plugin' || $cap=='deactivate_plugins') {
            foreach($caps as $key=>$value) {
                if ($value=='activate_plugins') {
                    unset($caps[$key]);
                    break;
                }
            }
            
            $caps[] = 'deactivate_plugins';
        }
        
        return $caps;
    }
    // end of map_for_plugins()
    
    
    private function activate_for_plugins() {
    
        if (!$this->activate_for_plugins) {
            return;
        }

        $roles = wp_roles();
        $old_use_db = $roles->use_db;
        $roles->use_db = true;
        $admin_role = get_role('administrator');
        if (!isset($admin_role->capabilities['deactivate_plugins'])) {            
            $admin_role->add_cap('deactivate_plugins', true);
        }
        $roles->use_db = $old_use_db;
        
        add_filter('ure_built_in_wp_caps', array($this, 'add_plugins_caps_to_groups'), 10, 1);
        add_filter('map_meta_cap', array($this, 'map_for_plugins'), 10, 4);
    }
    // end of activate_for_plugins()
            
    
    /** Add languages capabilities to the related groups of WordPress built-in capabilities
     *  Hooked to 'ure_built_in_wp_caps' filter from URE_Capabilities_Groups_Manager
     * 
     * @param array $caps
     * @return array
     */
    public function add_languages_caps_to_groups($caps) {
        
        $caps['install_languages'] = array('core', 'general');  
        $caps['update_languages'] = array('core', 'general');              
        
        return $caps;
    }
    // end of add_languages_caps_to_groups()
    
    
    public function map_update_languages($caps, $cap) {
        
        if ($cap!=='update_languages' || in_array('do_not_allow', $caps)) {
            return $caps;
        }
                        
        foreach($caps as $key=>$value) {
            if ($value=='install_languages') {
                unset($caps[$key]);
                break;
            }
        }
        $caps[] = 'update_languages';
        
        return $caps;
    }
    // end of map_update_languages()        
    
    
    private function activate_for_languages() {
    
        if (!$this->activate_for_languages) {
            return;
        }
        
        $roles = wp_roles();
        $old_use_db = $roles->use_db;
        $roles->use_db = true;
        $admin_role = get_role('administrator');
        if (!isset($admin_role->capabilities['install_languages'])) {            
            $admin_role->add_cap('install_languages', true);
        }
        if (!isset($admin_role->capabilities['update_languages'])) {
            $admin_role->add_cap('update_languages', true);
        }
        $roles->use_db = $old_use_db;

        add_filter('ure_built_in_wp_caps', array($this, 'add_languages_caps_to_groups'), 10, 1);        
        // deactivate WordPress default grant for languages capabilities 
        remove_filter('user_has_cap', 'wp_maybe_grant_install_languages_cap', 1);
        add_filter('map_meta_cap', array($this, 'map_update_languages'), 10, 2);
    }
    // end of activate_for_languages()

    
}
// end of URE_Additonal_Caps class