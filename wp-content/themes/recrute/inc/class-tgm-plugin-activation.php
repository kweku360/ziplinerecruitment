<?php

if ( ! class_exists( 'TGM_Plugin_Activation' ) ) {


    class TGM_Plugin_Activation {

        const TGMPA_VERSION = '2.6.1';

        const WP_REPO_REGEX = '|^http[s]?://wordpress\.org/(?:extend/)?plugins/|';

        const IS_URL_REGEX = '|^http[s]?://|';

        public static $instance;

        public $plugins = array();


        protected $sort_order = array();


        protected $has_forced_activation = false;

        protected $has_forced_deactivation = false;


        public $id = 'tgmpa';


        protected $menu = 'tgmpa-install-plugins';

        public $parent_slug = 'themes.php';


        public $capability = 'edit_theme_options';


        public $default_path = '';


        public $has_notices = true;


        public $dismissable = true;

    
        public $dismiss_msg = '';


        public $is_automatic = false;

    
        public $message = '';


        public $strings = array();


        public $wp_version;


        public $page_hook;

        public function __construct() {
            // Set the current WordPress version.
            $this->wp_version = $GLOBALS['wp_version'];

            // Announce that the class is ready, and pass the object (for advanced use).
            do_action_ref_array( 'tgmpa_init', array( $this ) );


            add_action( 'init', array( $this, 'load_textdomain' ), 5 );
            add_filter( 'load_textdomain_mofile', array( $this, 'overload_textdomain_mofile' ), 10, 2 );

            // When the rest of WP has loaded, kick-start the rest of the class.
            add_action( 'init', array( $this, 'init' ) );
        }


        public function __set( $name, $value ) {
            return;
        }

        public function __get( $name ) {
            return $this->{$name};
        }


        public function init() {

            if ( true !== apply_filters( 'tgmpa_load', ( is_admin() && ! defined( 'DOING_AJAX' ) ) ) ) {
                return;
            }

            // Load class strings.
            $this->strings = array(
                'page_title'                      => __( 'Install Required Plugins', 'tgmpa' ),
                'menu_title'                      => __( 'Install Plugins', 'tgmpa' ),
                /* translators: %s: plugin name. */
                'installing'                      => __( 'Installing Plugin: %s', 'tgmpa' ),
                /* translators: %s: plugin name. */
                'updating'                        => __( 'Updating Plugin: %s', 'tgmpa' ),
                'oops'                            => __( 'Something went wrong with the plugin API.', 'tgmpa' ),
                'notice_can_install_required'     => _n_noop(
                    /* translators: 1: plugin name(s). */
                    'This theme requires the following plugin: %1$s.',
                    'This theme requires the following plugins: %1$s.',
                    'tgmpa'
                ),
                'notice_can_install_recommended'  => _n_noop(
                    /* translators: 1: plugin name(s). */
                    'This theme recommends the following plugin: %1$s.',
                    'This theme recommends the following plugins: %1$s.',
                    'tgmpa'
                ),
                'notice_ask_to_update'            => _n_noop(
                    /* translators: 1: plugin name(s). */
                    'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.',
                    'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.',
                    'tgmpa'
                ),
                'notice_ask_to_update_maybe'      => _n_noop(
                    /* translators: 1: plugin name(s). */
                    'There is an update available for: %1$s.',
                    'There are updates available for the following plugins: %1$s.',
                    'tgmpa'
                ),
                'notice_can_activate_required'    => _n_noop(
                    /* translators: 1: plugin name(s). */
                    'The following required plugin is currently inactive: %1$s.',
                    'The following required plugins are currently inactive: %1$s.',
                    'tgmpa'
                ),
                'notice_can_activate_recommended' => _n_noop(
                    /* translators: 1: plugin name(s). */
                    'The following recommended plugin is currently inactive: %1$s.',
                    'The following recommended plugins are currently inactive: %1$s.',
                    'tgmpa'
                ),
                'install_link'                    => _n_noop(
                    'Begin installing plugin',
                    'Begin installing plugins',
                    'tgmpa'
                ),
                'update_link'                     => _n_noop(
                    'Begin updating plugin',
                    'Begin updating plugins',
                    'tgmpa'
                ),
                'activate_link'                   => _n_noop(
                    'Begin activating plugin',
                    'Begin activating plugins',
                    'tgmpa'
                ),
                'return'                          => __( 'Return to Required Plugins Installer', 'tgmpa' ),
                'dashboard'                       => __( 'Return to the Dashboard', 'tgmpa' ),
                'plugin_activated'                => __( 'Plugin activated successfully.', 'tgmpa' ),
                'activated_successfully'          => __( 'The following plugin was activated successfully:', 'tgmpa' ),
                /* translators: 1: plugin name. */
                'plugin_already_active'           => __( 'No action taken. Plugin %1$s was already active.', 'tgmpa' ),
                /* translators: 1: plugin name. */
                'plugin_needs_higher_version'     => __( 'Plugin not activated. A higher version of %s is needed for this theme. Please update the plugin.', 'tgmpa' ),
                /* translators: 1: dashboard link. */
                'complete'                        => __( 'All plugins installed and activated successfully. %1$s', 'tgmpa' ),
                'dismiss'                         => __( 'Dismiss this notice', 'tgmpa' ),
                'notice_cannot_install_activate'  => __( 'There are one or more required or recommended plugins to install, update or activate.', 'tgmpa' ),
                'contact_admin'                   => __( 'Please contact the administrator of this site for help.', 'tgmpa' ),
            );

            do_action( 'tgmpa_register' );

            /* After this point, the plugins should be registered and the configuration set. */

            // Proceed only if we have plugins to handle.
            if ( empty( $this->plugins ) || ! is_array( $this->plugins ) ) {
                return;
            }

            // Set up the menu and notices if we still have outstanding actions.
            if ( true !== $this->is_tgmpa_complete() ) {
                // Sort the plugins.
                array_multisort( $this->sort_order, SORT_ASC, $this->plugins );

                add_action( 'admin_menu', array( $this, 'admin_menu' ) );
                add_action( 'admin_head', array( $this, 'dismiss' ) );

                // Prevent the normal links from showing underneath a single install/update page.
                add_filter( 'install_plugin_complete_actions', array( $this, 'actions' ) );
                add_filter( 'update_plugin_complete_actions', array( $this, 'actions' ) );

                if ( $this->has_notices ) {
                    add_action( 'admin_notices', array( $this, 'notices' ) );
                    add_action( 'admin_init', array( $this, 'admin_init' ), 1 );
                    add_action( 'admin_enqueue_scripts', array( $this, 'thickbox' ) );
                }
            }

            // If needed, filter plugin action links.
            add_action( 'load-plugins.php', array( $this, 'add_plugin_action_link_filters' ), 1 );

            // Make sure things get reset on switch theme.
            add_action( 'switch_theme', array( $this, 'flush_plugins_cache' ) );

            if ( $this->has_notices ) {
                add_action( 'switch_theme', array( $this, 'update_dismiss' ) );
            }

            // Setup the force activation hook.
            if ( true === $this->has_forced_activation ) {
                add_action( 'admin_init', array( $this, 'force_activation' ) );
            }

            // Setup the force deactivation hook.
            if ( true === $this->has_forced_deactivation ) {
                add_action( 'switch_theme', array( $this, 'force_deactivation' ) );
            }
        }

        public function load_textdomain() {
            if ( is_textdomain_loaded( 'tgmpa' ) ) {
                return;
            }

            if ( false !== strpos( __FILE__, WP_PLUGIN_DIR ) || false !== strpos( __FILE__, WPMU_PLUGIN_DIR ) ) {
                // Plugin, we'll need to adjust the file name.
                add_action( 'load_textdomain_mofile', array( $this, 'correct_plugin_mofile' ), 10, 2 );
                load_theme_textdomain( 'tgmpa', dirname( __FILE__ ) . '/languages' );
                remove_action( 'load_textdomain_mofile', array( $this, 'correct_plugin_mofile' ), 10 );
            } else {
                load_theme_textdomain( 'tgmpa', dirname( __FILE__ ) . '/languages' );
            }
        }

        public function correct_plugin_mofile( $mofile, $domain ) {
            // Exit early if not our domain (just in case).
            if ( 'tgmpa' !== $domain ) {
                return $mofile;
            }
            return preg_replace( '`/([a-z]{2}_[A-Z]{2}.mo)$`', '/tgmpa-$1', $mofile );
        }

        public function overload_textdomain_mofile( $mofile, $domain ) {
            // Exit early if not our domain, not a WP_LANG_DIR load or if the file exists and is readable.
            if ( 'tgmpa' !== $domain || false === strpos( $mofile, WP_LANG_DIR ) || @is_readable( $mofile ) ) {
                return $mofile;
            }

            // Current fallback file is not valid, let's try the alternative option.
            if ( false !== strpos( $mofile, '/themes/' ) ) {
                return str_replace( '/themes/', '/plugins/', $mofile );
            } elseif ( false !== strpos( $mofile, '/plugins/' ) ) {
                return str_replace( '/plugins/', '/themes/', $mofile );
            } else {
                return $mofile;
            }
        }

        public function add_plugin_action_link_filters() {
            foreach ( $this->plugins as $slug => $plugin ) {
                if ( false === $this->can_plugin_activate( $slug ) ) {
                    add_filter( 'plugin_action_links_' . $plugin['file_path'], array( $this, 'filter_plugin_action_links_activate' ), 20 );
                }

                if ( true === $plugin['force_activation'] ) {
                    add_filter( 'plugin_action_links_' . $plugin['file_path'], array( $this, 'filter_plugin_action_links_deactivate' ), 20 );
                }

                if ( false !== $this->does_plugin_require_update( $slug ) ) {
                    add_filter( 'plugin_action_links_' . $plugin['file_path'], array( $this, 'filter_plugin_action_links_update' ), 20 );
                }
            }
        }


        public function filter_plugin_action_links_activate( $actions ) {
            unset( $actions['activate'] );

            return $actions;
        }

        public function filter_plugin_action_links_deactivate( $actions ) {
            unset( $actions['deactivate'] );

            return $actions;
        }

        public function filter_plugin_action_links_update( $actions ) {
            $actions['update'] = sprintf(
                '<a href="%1$s" title="%2$s" class="edit">%3$s</a>',
                esc_url( $this->get_tgmpa_status_url( 'update' ) ),
                __( 'This plugin needs to be updated to be compatible with your theme.', 'tgmpa' ),
                __( 'Update Required', 'tgmpa' )
            );

            return $actions;
        }


        public function admin_init() {
            if ( ! $this->is_tgmpa_page() ) {
                return;
            }

            if ( isset( $_REQUEST['tab'] ) && 'plugin-information' === $_REQUEST['tab'] ) {
                // Needed for install_plugin_information().
                require_once ABSPATH . 'wp-admin/includes/plugin-install.php';

                wp_enqueue_style( 'plugin-install' );

                global $tab, $body_id;
                $body_id = 'plugin-information';
                // @codingStandardsIgnoreStart
                $tab     = 'plugin-information';
                // @codingStandardsIgnoreEnd

                install_plugin_information();

                exit;
            }
        }


        public function thickbox() {
            if ( ! get_user_meta( get_current_user_id(), 'tgmpa_dismissed_notice_' . $this->id, true ) ) {
                add_thickbox();
            }
        }


        public function admin_menu() {
            // Make sure privileges are correct to see the page.
            if ( ! current_user_can( 'install_plugins' ) ) {
                return;
            }

            $args = apply_filters(
                'tgmpa_admin_menu_args',
                array(
                    'parent_slug' => $this->parent_slug,                     // Parent Menu slug.
                    'page_title'  => $this->strings['page_title'],           // Page title.
                    'menu_title'  => $this->strings['menu_title'],           // Menu title.
                    'capability'  => $this->capability,                      // Capability.
                    'menu_slug'   => $this->menu,                            // Menu slug.
                    'function'    => array( $this, 'install_plugins_page' ), // Callback.
                )
            );

            $this->add_admin_menu( $args );
        }


        protected function add_admin_menu( array $args ) {
            $this->page_hook = add_theme_page( $args['page_title'], $args['menu_title'], $args['capability'], $args['menu_slug'], $args['function'] );
        }


        public function install_plugins_page() {
            // Store new instance of plugin table in object.
            $plugin_table = new TGMPA_List_Table;

            // Return early if processing a plugin installation action.
            if ( ( ( 'tgmpa-bulk-install' === $plugin_table->current_action() || 'tgmpa-bulk-update' === $plugin_table->current_action() ) && $plugin_table->process_bulk_actions() ) || $this->do_plugin_install() ) {
                return;
            }

            // Force refresh of available plugin information so we'll know about manual updates/deletes.
            wp_clean_plugins_cache( false );

            ?>
            <div class="tgmpa wrap">
                <h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
                <?php $plugin_table->prepare_items(); ?>

                <?php
                if ( ! empty( $this->message ) && is_string( $this->message ) ) {
                    echo wp_kses_post( $this->message );
                }
                ?>
                <?php $plugin_table->views(); ?>

                <form id="tgmpa-plugins" action="" method="post">
                    <input type="hidden" name="tgmpa-page" value="<?php echo esc_attr( $this->menu ); ?>" />
                    <input type="hidden" name="plugin_status" value="<?php echo esc_attr( $plugin_table->view_context ); ?>" />
                    <?php $plugin_table->display(); ?>
                </form>
            </div>
            <?php
        }

        protected function do_plugin_install() {
            if ( empty( $_GET['plugin'] ) ) {
                return false;
            }

            // All plugin information will be stored in an array for processing.
            $slug = $this->sanitize_key( urldecode( $_GET['plugin'] ) );

            if ( ! isset( $this->plugins[ $slug ] ) ) {
                return false;
            }

            // Was an install or upgrade action link clicked?
            if ( ( isset( $_GET['tgmpa-install'] ) && 'install-plugin' === $_GET['tgmpa-install'] ) || ( isset( $_GET['tgmpa-update'] ) && 'update-plugin' === $_GET['tgmpa-update'] ) ) {

                $install_type = 'install';
                if ( isset( $_GET['tgmpa-update'] ) && 'update-plugin' === $_GET['tgmpa-update'] ) {
                    $install_type = 'update';
                }

                check_admin_referer( 'tgmpa-' . $install_type, 'tgmpa-nonce' );

                // Pass necessary information via URL if WP_Filesystem is needed.
                $url = wp_nonce_url(
                    add_query_arg(
                        array(
                            'plugin'                 => urlencode( $slug ),
                            'tgmpa-' . $install_type => $install_type . '-plugin',
                        ),
                        $this->get_tgmpa_url()
                    ),
                    'tgmpa-' . $install_type,
                    'tgmpa-nonce'
                );

                $method = ''; // Leave blank so WP_Filesystem can populate it as necessary.

                if ( false === ( $creds = request_filesystem_credentials( esc_url_raw( $url ), $method, false, false, array() ) ) ) {
                    return true;
                }

                if ( ! WP_Filesystem( $creds ) ) {
                    request_filesystem_credentials( esc_url_raw( $url ), $method, true, false, array() ); // Setup WP_Filesystem.
                    return true;
                }

                /* If we arrive here, we have the filesystem. */

                // Prep variables for Plugin_Installer_Skin class.
                $extra         = array();
                $extra['slug'] = $slug; // Needed for potentially renaming of directory name.
                $source        = $this->get_download_url( $slug );
                $api           = ( 'repo' === $this->plugins[ $slug ]['source_type'] ) ? $this->get_plugins_api( $slug ) : null;
                $api           = ( false !== $api ) ? $api : null;

                $url = add_query_arg(
                    array(
                        'action' => $install_type . '-plugin',
                        'plugin' => urlencode( $slug ),
                    ),
                    'update.php'
                );

                if ( ! class_exists( 'Plugin_Upgrader', false ) ) {
                    require_once ABSPATH . 'wp-admin/includes/class-wp-upgrader.php';
                }

                $title     = ( 'update' === $install_type ) ? $this->strings['updating'] : $this->strings['installing'];
                $skin_args = array(
                    'type'   => ( 'bundled' !== $this->plugins[ $slug ]['source_type'] ) ? 'web' : 'upload',
                    'title'  => sprintf( $title, $this->plugins[ $slug ]['name'] ),
                    'url'    => esc_url_raw( $url ),
                    'nonce'  => $install_type . '-plugin_' . $slug,
                    'plugin' => '',
                    'api'    => $api,
                    'extra'  => $extra,
                );
                unset( $title );

                if ( 'update' === $install_type ) {
                    $skin_args['plugin'] = $this->plugins[ $slug ]['file_path'];
                    $skin                = new Plugin_Upgrader_Skin( $skin_args );
                } else {
                    $skin = new Plugin_Installer_Skin( $skin_args );
                }

                // Create a new instance of Plugin_Upgrader.
                $upgrader = new Plugin_Upgrader( $skin );

                // Perform the action and install the plugin from the $source urldecode().
                add_filter( 'upgrader_source_selection', array( $this, 'maybe_adjust_source_dir' ), 1, 3 );

                if ( 'update' === $install_type ) {
                    // Inject our info into the update transient.
                    $to_inject                    = array( $slug => $this->plugins[ $slug ] );
                    $to_inject[ $slug ]['source'] = $source;
                    $this->inject_update_info( $to_inject );

                    $upgrader->upgrade( $this->plugins[ $slug ]['file_path'] );
                } else {
                    $upgrader->install( $source );
                }

                remove_filter( 'upgrader_source_selection', array( $this, 'maybe_adjust_source_dir' ), 1 );

                // Make sure we have the correct file path now the plugin is installed/updated.
                $this->populate_file_path( $slug );

                // Only activate plugins if the config option is set to true and the plugin isn't
                // already active (upgrade).
                if ( $this->is_automatic && ! $this->is_plugin_active( $slug ) ) {
                    $plugin_activate = $upgrader->plugin_info(); // Grab the plugin info from the Plugin_Upgrader method.
                    if ( false === $this->activate_single_plugin( $plugin_activate, $slug, true ) ) {
                        return true; // Finish execution of the function early as we encountered an error.
                    }
                }

                $this->show_tgmpa_version();

                // Display message based on if all plugins are now active or not.
                if ( $this->is_tgmpa_complete() ) {
                    echo '<p>', sprintf( esc_html( $this->strings['complete'] ), '<a href="' . esc_url( self_admin_url() ) . '">' .__( 'Return to the Dashboard', 'tgmpa' ) . '</a>' ), '</p>';
                    echo '<style type="text/css">#adminmenu .wp-submenu li.current { display: none !important; }</style>';
                } else {
                    echo '<p><a href="', esc_url( $this->get_tgmpa_url() ), '" target="_parent">', esc_html( $this->strings['return'] ), '</a></p>';
                }

                return true;
            } elseif ( isset( $this->plugins[ $slug ]['file_path'], $_GET['tgmpa-activate'] ) && 'activate-plugin' === $_GET['tgmpa-activate'] ) {
                // Activate action link was clicked.
                check_admin_referer( 'tgmpa-activate', 'tgmpa-nonce' );

                if ( false === $this->activate_single_plugin( $this->plugins[ $slug ]['file_path'], $slug ) ) {
                    return true; // Finish execution of the function early as we encountered an error.
                }
            }

            return false;
        }

        /**
         * Inject information into the 'update_plugins' site transient as WP checks that before running an update.
         *
         * @since 2.5.0
         *
         * @param array $plugins The plugin information for the plugins which are to be updated.
         */
        public function inject_update_info( $plugins ) {
            $repo_updates = get_site_transient( 'update_plugins' );

            if ( ! is_object( $repo_updates ) ) {
                $repo_updates = new stdClass;
            }

            foreach ( $plugins as $slug => $plugin ) {
                $file_path = $plugin['file_path'];

                if ( empty( $repo_updates->response[ $file_path ] ) ) {
                    $repo_updates->response[ $file_path ] = new stdClass;
                }

                // We only really need to set package, but let's do all we can in case WP changes something.
                $repo_updates->response[ $file_path ]->slug        = $slug;
                $repo_updates->response[ $file_path ]->plugin      = $file_path;
                $repo_updates->response[ $file_path ]->new_version = $plugin['version'];
                $repo_updates->response[ $file_path ]->package     = $plugin['source'];
                if ( empty( $repo_updates->response[ $file_path ]->url ) && ! empty( $plugin['external_url'] ) ) {
                    $repo_updates->response[ $file_path ]->url = $plugin['external_url'];
                }
            }

            set_site_transient( 'update_plugins', $repo_updates );
        }


        public function maybe_adjust_source_dir( $source, $remote_source, $upgrader ) {
            if ( ! $this->is_tgmpa_page() || ! is_object( $GLOBALS['wp_filesystem'] ) ) {
                return $source;
            }

            // Check for single file plugins.
            $source_files = array_keys( $GLOBALS['wp_filesystem']->dirlist( $remote_source ) );
            if ( 1 === count( $source_files ) && false === $GLOBALS['wp_filesystem']->is_dir( $source ) ) {
                return $source;
            }

            // Multi-file plugin, let's see if the directory is correctly named.
            $desired_slug = '';

            // Figure out what the slug is supposed to be.
            if ( false === $upgrader->bulk && ! empty( $upgrader->skin->options['extra']['slug'] ) ) {
                $desired_slug = $upgrader->skin->options['extra']['slug'];
            } else {
                // Bulk installer contains less info, so fall back on the info registered here.
                foreach ( $this->plugins as $slug => $plugin ) {
                    if ( ! empty( $upgrader->skin->plugin_names[ $upgrader->skin->i ] ) && $plugin['name'] === $upgrader->skin->plugin_names[ $upgrader->skin->i ] ) {
                        $desired_slug = $slug;
                        break;
                    }
                }
                unset( $slug, $plugin );
            }

            if ( ! empty( $desired_slug ) ) {
                $subdir_name = untrailingslashit( str_replace( trailingslashit( $remote_source ), '', $source ) );

                if ( ! empty( $subdir_name ) && $subdir_name !== $desired_slug ) {
                    $from_path = untrailingslashit( $source );
                    $to_path   = trailingslashit( $remote_source ) . $desired_slug;

                    if ( true === $GLOBALS['wp_filesystem']->move( $from_path, $to_path ) ) {
                        return trailingslashit( $to_path );
                    } else {
                        return new WP_Error( 'rename_failed', __( 'The remote plugin package does not contain a folder with the desired slug and renaming did not work.', 'tgmpa' ) . ' ' . __( 'Please contact the plugin provider and ask them to package their plugin according to the WordPress guidelines.', 'tgmpa' ), array( 'found' => $subdir_name, 'expected' => $desired_slug ) );
                    }
                } elseif ( empty( $subdir_name ) ) {
                    return new WP_Error( 'packaged_wrong', __( 'The remote plugin package consists of more than one file, but the files are not packaged in a folder.', 'tgmpa' ) . ' ' . __( 'Please contact the plugin provider and ask them to package their plugin according to the WordPress guidelines.', 'tgmpa' ), array( 'found' => $subdir_name, 'expected' => $desired_slug ) );
                }
            }

            return $source;
        }

        protected function activate_single_plugin( $file_path, $slug, $automatic = false ) {
            if ( $this->can_plugin_activate( $slug ) ) {
                $activate = activate_plugin( $file_path );

                if ( is_wp_error( $activate ) ) {
                    echo '<div id="message" class="error"><p>', wp_kses_post( $activate->get_error_message() ), '</p></div>',
                        '<p><a href="', esc_url( $this->get_tgmpa_url() ), '" target="_parent">', esc_html( $this->strings['return'] ), '</a></p>';

                    return false; // End it here if there is an error with activation.
                } else {
                    if ( ! $automatic ) {
                        // Make sure message doesn't display again if bulk activation is performed
                        // immediately after a single activation.
                        if ( ! isset( $_POST['action'] ) ) { // WPCS: CSRF OK.
                            echo '<div id="message" class="updated"><p>', esc_html( $this->strings['activated_successfully'] ), ' <strong>', esc_html( $this->plugins[ $slug ]['name'] ), '.</strong></p></div>';
                        }
                    } else {
                        // Simpler message layout for use on the plugin install page.
                        echo '<p>', esc_html( $this->strings['plugin_activated'] ), '</p>';
                    }
                }
            } elseif ( $this->is_plugin_active( $slug ) ) {
                // No simpler message format provided as this message should never be encountered
                // on the plugin install page.
                echo '<div id="message" class="error"><p>',
                    sprintf(
                        esc_html( $this->strings['plugin_already_active'] ),
                        '<strong>' . esc_html( $this->plugins[ $slug ]['name'] ) . '</strong>'
                    ),
                    '</p></div>';
            } elseif ( $this->does_plugin_require_update( $slug ) ) {
                if ( ! $automatic ) {
                    // Make sure message doesn't display again if bulk activation is performed
                    // immediately after a single activation.
                    if ( ! isset( $_POST['action'] ) ) { // WPCS: CSRF OK.
                        echo '<div id="message" class="error"><p>',
                            sprintf(
                                esc_html( $this->strings['plugin_needs_higher_version'] ),
                                '<strong>' . esc_html( $this->plugins[ $slug ]['name'] ) . '</strong>'
                            ),
                            '</p></div>';
                    }
                } else {
                    // Simpler message layout for use on the plugin install page.
                    echo '<p>', sprintf( esc_html( $this->strings['plugin_needs_higher_version'] ), esc_html( $this->plugins[ $slug ]['name'] ) ), '</p>';
                }
            }

            return true;
        }

        public function notices() {
            // Remove nag on the install page / Return early if the nag message has been dismissed or user < author.
            if ( ( $this->is_tgmpa_page() || $this->is_core_update_page() ) || get_user_meta( get_current_user_id(), 'tgmpa_dismissed_notice_' . $this->id, true ) || ! current_user_can( apply_filters( 'tgmpa_show_admin_notice_capability', 'publish_posts' ) ) ) {
                return;
            }

            // Store for the plugin slugs by message type.
            $message = array();

            // Initialize counters used to determine plurality of action link texts.
            $install_link_count          = 0;
            $update_link_count           = 0;
            $activate_link_count         = 0;
            $total_required_action_count = 0;

            foreach ( $this->plugins as $slug => $plugin ) {
                if ( $this->is_plugin_active( $slug ) && false === $this->does_plugin_have_update( $slug ) ) {
                    continue;
                }

                if ( ! $this->is_plugin_installed( $slug ) ) {
                    if ( current_user_can( 'install_plugins' ) ) {
                        $install_link_count++;

                        if ( true === $plugin['required'] ) {
                            $message['notice_can_install_required'][] = $slug;
                        } else {
                            $message['notice_can_install_recommended'][] = $slug;
                        }
                    }
                    if ( true === $plugin['required'] ) {
                        $total_required_action_count++;
                    }
                } else {
                    if ( ! $this->is_plugin_active( $slug ) && $this->can_plugin_activate( $slug ) ) {
                        if ( current_user_can( 'activate_plugins' ) ) {
                            $activate_link_count++;

                            if ( true === $plugin['required'] ) {
                                $message['notice_can_activate_required'][] = $slug;
                            } else {
                                $message['notice_can_activate_recommended'][] = $slug;
                            }
                        }
                        if ( true === $plugin['required'] ) {
                            $total_required_action_count++;
                        }
                    }

                    if ( $this->does_plugin_require_update( $slug ) || false !== $this->does_plugin_have_update( $slug ) ) {

                        if ( current_user_can( 'update_plugins' ) ) {
                            $update_link_count++;

                            if ( $this->does_plugin_require_update( $slug ) ) {
                                $message['notice_ask_to_update'][] = $slug;
                            } elseif ( false !== $this->does_plugin_have_update( $slug ) ) {
                                $message['notice_ask_to_update_maybe'][] = $slug;
                            }
                        }
                        if ( true === $plugin['required'] ) {
                            $total_required_action_count++;
                        }
                    }
                }
            }
            unset( $slug, $plugin );

            // If we have notices to display, we move forward.
            if ( ! empty( $message ) || $total_required_action_count > 0 ) {
                krsort( $message ); // Sort messages.
                $rendered = '';

                // As add_settings_error() wraps the final message in a <p> and as the final message can't be
                // filtered, using <p>'s in our html would render invalid html output.
                $line_template = '<span style="display: block; margin: 0.5em 0.5em 0 0; clear: both;">%s</span>' . "\n";

                if ( ! current_user_can( 'activate_plugins' ) && ! current_user_can( 'install_plugins' ) && ! current_user_can( 'update_plugins' ) ) {
                    $rendered  = esc_html( $this->strings['notice_cannot_install_activate'] ) . ' ' . esc_html( $this->strings['contact_admin'] );
                    $rendered .= $this->create_user_action_links_for_notice( 0, 0, 0, $line_template );
                } else {

                    // If dismissable is false and a message is set, output it now.
                    if ( ! $this->dismissable && ! empty( $this->dismiss_msg ) ) {
                        $rendered .= sprintf( $line_template, wp_kses_post( $this->dismiss_msg ) );
                    }

                    // Render the individual message lines for the notice.
                    foreach ( $message as $type => $plugin_group ) {
                        $linked_plugins = array();

                        // Get the external info link for a plugin if one is available.
                        foreach ( $plugin_group as $plugin_slug ) {
                            $linked_plugins[] = $this->get_info_link( $plugin_slug );
                        }
                        unset( $plugin_slug );

                        $count          = count( $plugin_group );
                        $linked_plugins = array_map( array( 'TGMPA_Utils', 'wrap_in_em' ), $linked_plugins );
                        $last_plugin    = array_pop( $linked_plugins ); // Pop off last name to prep for readability.
                        $imploded       = empty( $linked_plugins ) ? $last_plugin : ( implode( ', ', $linked_plugins ) . ' ' . esc_html_x( 'and', 'plugin A *and* plugin B', 'tgmpa' ) . ' ' . $last_plugin );

                        $rendered .= sprintf(
                            $line_template,
                            sprintf(
                                translate_nooped_plural( $this->strings[ $type ], $count, 'tgmpa' ),
                                $imploded,
                                $count
                            )
                        );

                    }
                    unset( $type, $plugin_group, $linked_plugins, $count, $last_plugin, $imploded );

                    $rendered .= $this->create_user_action_links_for_notice( $install_link_count, $update_link_count, $activate_link_count, $line_template );
                }

                // Register the nag messages and prepare them to be processed.
                add_settings_error( 'tgmpa', 'tgmpa', $rendered, $this->get_admin_notice_class() );
            }

            // Admin options pages already output settings_errors, so this is to avoid duplication.
            if ( 'options-general' !== $GLOBALS['current_screen']->parent_base ) {
                $this->display_settings_errors();
            }
        }

        /**
         * Generate the user action links for the admin notice.
         *
         * @since 2.6.0
         *
         * @param int $install_count  Number of plugins to install.
         * @param int $update_count   Number of plugins to update.
         * @param int $activate_count Number of plugins to activate.
         * @param int $line_template  Template for the HTML tag to output a line.
         * @return string Action links.
         */
        protected function create_user_action_links_for_notice( $install_count, $update_count, $activate_count, $line_template ) {
            // Setup action links.
            $action_links = array(
                'install'  => '',
                'update'   => '',
                'activate' => '',
                'dismiss'  => $this->dismissable ? '<a href="' . esc_url( wp_nonce_url( add_query_arg( 'tgmpa-dismiss', 'dismiss_admin_notices' ), 'tgmpa-dismiss-' . get_current_user_id() ) ) . '" class="dismiss-notice" target="_parent">' . esc_html( $this->strings['dismiss'] ) . '</a>' : '',
            );

            $link_template = '<a href="%2$s">%1$s</a>';

            if ( current_user_can( 'install_plugins' ) ) {
                if ( $install_count > 0 ) {
                    $action_links['install'] = sprintf(
                        $link_template,
                        translate_nooped_plural( $this->strings['install_link'], $install_count, 'tgmpa' ),
                        esc_url( $this->get_tgmpa_status_url( 'install' ) )
                    );
                }
                if ( $update_count > 0 ) {
                    $action_links['update'] = sprintf(
                        $link_template,
                        translate_nooped_plural( $this->strings['update_link'], $update_count, 'tgmpa' ),
                        esc_url( $this->get_tgmpa_status_url( 'update' ) )
                    );
                }
            }

            if ( current_user_can( 'activate_plugins' ) && $activate_count > 0 ) {
                $action_links['activate'] = sprintf(
                    $link_template,
                    translate_nooped_plural( $this->strings['activate_link'], $activate_count, 'tgmpa' ),
                    esc_url( $this->get_tgmpa_status_url( 'activate' ) )
                );
            }

            $action_links = apply_filters( 'tgmpa_notice_action_links', $action_links );

            $action_links = array_filter( (array) $action_links ); // Remove any empty array items.

            if ( ! empty( $action_links ) ) {
                $action_links = sprintf( $line_template, implode( ' | ', $action_links ) );
                return apply_filters( 'tgmpa_notice_rendered_action_links', $action_links );
            } else {
                return '';
            }
        }

        protected function get_admin_notice_class() {
            if ( ! empty( $this->strings['nag_type'] ) ) {
                return sanitize_html_class( strtolower( $this->strings['nag_type'] ) );
            } else {
                if ( version_compare( $this->wp_version, '4.2', '>=' ) ) {
                    return 'notice-warning';
                } elseif ( version_compare( $this->wp_version, '4.1', '>=' ) ) {
                    return 'notice';
                } else {
                    return 'updated';
                }
            }
        }


        protected function display_settings_errors() {
            global $wp_settings_errors;

            settings_errors( 'tgmpa' );

            foreach ( (array) $wp_settings_errors as $key => $details ) {
                if ( 'tgmpa' === $details['setting'] ) {
                    unset( $wp_settings_errors[ $key ] );
                    break;
                }
            }
        }

        public function dismiss() {
            if ( isset( $_GET['tgmpa-dismiss'] ) && check_admin_referer( 'tgmpa-dismiss-' . get_current_user_id() ) ) {
                update_user_meta( get_current_user_id(), 'tgmpa_dismissed_notice_' . $this->id, 1 );
            }
        }

        public function register( $plugin ) {
            if ( empty( $plugin['slug'] ) || empty( $plugin['name'] ) ) {
                return;
            }

            if ( empty( $plugin['slug'] ) || ! is_string( $plugin['slug'] ) || isset( $this->plugins[ $plugin['slug'] ] ) ) {
                return;
            }

            $defaults = array(
                'name'               => '',      // String
                'slug'               => '',      // String
                'source'             => 'repo',  // String
                'required'           => false,   // Boolean
                'version'            => '',      // String
                'force_activation'   => false,   // Boolean
                'force_deactivation' => false,   // Boolean
                'external_url'       => '',      // String
                'is_callable'        => '',      // String|Array.
            );

            // Prepare the received data.
            $plugin = wp_parse_args( $plugin, $defaults );

            // Standardize the received slug.
            $plugin['slug'] = $this->sanitize_key( $plugin['slug'] );

            // Forgive users for using string versions of booleans or floats for version number.
            $plugin['version']            = (string) $plugin['version'];
            $plugin['source']             = empty( $plugin['source'] ) ? 'repo' : $plugin['source'];
            $plugin['required']           = TGMPA_Utils::validate_bool( $plugin['required'] );
            $plugin['force_activation']   = TGMPA_Utils::validate_bool( $plugin['force_activation'] );
            $plugin['force_deactivation'] = TGMPA_Utils::validate_bool( $plugin['force_deactivation'] );

            // Enrich the received data.
            $plugin['file_path']   = $this->_get_plugin_basename_from_slug( $plugin['slug'] );
            $plugin['source_type'] = $this->get_plugin_source_type( $plugin['source'] );

            // Set the class properties.
            $this->plugins[ $plugin['slug'] ]    = $plugin;
            $this->sort_order[ $plugin['slug'] ] = $plugin['name'];

            // Should we add the force activation hook ?
            if ( true === $plugin['force_activation'] ) {
                $this->has_forced_activation = true;
            }

            // Should we add the force deactivation hook ?
            if ( true === $plugin['force_deactivation'] ) {
                $this->has_forced_deactivation = true;
            }
        }


        protected function get_plugin_source_type( $source ) {
            if ( 'repo' === $source || preg_match( self::WP_REPO_REGEX, $source ) ) {
                return 'repo';
            } elseif ( preg_match( self::IS_URL_REGEX, $source ) ) {
                return 'external';
            } else {
                return 'bundled';
            }
        }

        public function sanitize_key( $key ) {
            $raw_key = $key;
            $key     = preg_replace( '`[^A-Za-z0-9_-]`', '', $key );

            /**
             * Filter a sanitized key string.
             *
             * @since 2.5.0
             *
             * @param string $key     Sanitized key.
             * @param string $raw_key The key prior to sanitization.
             */
            return apply_filters( 'tgmpa_sanitize_key', $key, $raw_key );
        }


        public function config( $config ) {
            $keys = array(
                'id',
                'default_path',
                'has_notices',
                'dismissable',
                'dismiss_msg',
                'menu',
                'parent_slug',
                'capability',
                'is_automatic',
                'message',
                'strings',
            );

            foreach ( $keys as $key ) {
                if ( isset( $config[ $key ] ) ) {
                    if ( is_array( $config[ $key ] ) ) {
                        $this->$key = array_merge( $this->$key, $config[ $key ] );
                    } else {
                        $this->$key = $config[ $key ];
                    }
                }
            }
        }

        public function actions( $install_actions ) {
            // Remove action links on the TGMPA install page.
            if ( $this->is_tgmpa_page() ) {
                return false;
            }

            return $install_actions;
        }

        public function flush_plugins_cache( $clear_update_cache = true ) {
            wp_clean_plugins_cache( $clear_update_cache );
        }

        public function populate_file_path( $plugin_slug = '' ) {
            if ( ! empty( $plugin_slug ) && is_string( $plugin_slug ) && isset( $this->plugins[ $plugin_slug ] ) ) {
                $this->plugins[ $plugin_slug ]['file_path'] = $this->_get_plugin_basename_from_slug( $plugin_slug );
            } else {
                // Add file_path key for all plugins.
                foreach ( $this->plugins as $slug => $values ) {
                    $this->plugins[ $slug ]['file_path'] = $this->_get_plugin_basename_from_slug( $slug );
                }
            }
        }

        protected function _get_plugin_basename_from_slug( $slug ) {
            $keys = array_keys( $this->get_plugins() );

            foreach ( $keys as $key ) {
                if ( preg_match( '|^' . $slug . '/|', $key ) ) {
                    return $key;
                }
            }

            return $slug;
        }

        public function _get_plugin_data_from_name( $name, $data = 'slug' ) {
            foreach ( $this->plugins as $values ) {
                if ( $name === $values['name'] && isset( $values[ $data ] ) ) {
                    return $values[ $data ];
                }
            }

            return false;
        }

        public function get_download_url( $slug ) {
            $dl_source = '';

            switch ( $this->plugins[ $slug ]['source_type'] ) {
                case 'repo':
                    return $this->get_wp_repo_download_url( $slug );
                case 'external':
                    return $this->plugins[ $slug ]['source'];
                case 'bundled':
                    return $this->default_path . $this->plugins[ $slug ]['source'];
            }

            return $dl_source; // Should never happen.
        }

        protected function get_wp_repo_download_url( $slug ) {
            $source = '';
            $api    = $this->get_plugins_api( $slug );

            if ( false !== $api && isset( $api->download_link ) ) {
                $source = $api->download_link;
            }

            return $source;
        }

        protected function get_plugins_api( $slug ) {
            static $api = array(); // Cache received responses.

            if ( ! isset( $api[ $slug ] ) ) {
                if ( ! function_exists( 'plugins_api' ) ) {
                    require_once ABSPATH . 'wp-admin/includes/plugin-install.php';
                }

                $response = plugins_api( 'plugin_information', array( 'slug' => $slug, 'fields' => array( 'sections' => false ) ) );

                $api[ $slug ] = false;

                if ( is_wp_error( $response ) ) {
                    wp_die( esc_html( $this->strings['oops'] ) );
                } else {
                    $api[ $slug ] = $response;
                }
            }

            return $api[ $slug ];
        }

        public function get_info_link( $slug ) {
            if ( ! empty( $this->plugins[ $slug ]['external_url'] ) && preg_match( self::IS_URL_REGEX, $this->plugins[ $slug ]['external_url'] ) ) {
                $link = sprintf(
                    '<a href="%1$s" target="_blank">%2$s</a>',
                    esc_url( $this->plugins[ $slug ]['external_url'] ),
                    esc_html( $this->plugins[ $slug ]['name'] )
                );
            } elseif ( 'repo' === $this->plugins[ $slug ]['source_type'] ) {
                $url = add_query_arg(
                    array(
                        'tab'       => 'plugin-information',
                        'plugin'    => urlencode( $slug ),
                        'TB_iframe' => 'true',
                        'width'     => '640',
                        'height'    => '500',
                    ),
                    self_admin_url( 'plugin-install.php' )
                );

                $link = sprintf(
                    '<a href="%1$s" class="thickbox">%2$s</a>',
                    esc_url( $url ),
                    esc_html( $this->plugins[ $slug ]['name'] )
                );
            } else {
                $link = esc_html( $this->plugins[ $slug ]['name'] ); // No hyperlink.
            }

            return $link;
        }

        protected function is_tgmpa_page() {
            return isset( $_GET['page'] ) && $this->menu === $_GET['page'];
        }

        protected function is_core_update_page() {
            // Current screen is not always available, most notably on the customizer screen.
            if ( ! function_exists( 'get_current_screen' ) ) {
                return false;
            }

            $screen = get_current_screen();

            if ( 'update-core' === $screen->base ) {
                // Core update screen.
                return true;
            } elseif ( 'plugins' === $screen->base && ! empty( $_POST['action'] ) ) { // WPCS: CSRF ok.
                // Plugins bulk update screen.
                return true;
            } elseif ( 'update' === $screen->base && ! empty( $_POST['action'] ) ) { // WPCS: CSRF ok.
                // Individual updates (ajax call).
                return true;
            }

            return false;
        }

        public function get_tgmpa_url() {
            static $url;

            if ( ! isset( $url ) ) {
                $parent = $this->parent_slug;
                if ( false === strpos( $parent, '.php' ) ) {
                    $parent = 'admin.php';
                }
                $url = add_query_arg(
                    array(
                        'page' => urlencode( $this->menu ),
                    ),
                    self_admin_url( $parent )
                );
            }

            return $url;
        }

        public function get_tgmpa_status_url( $status ) {
            return add_query_arg(
                array(
                    'plugin_status' => urlencode( $status ),
                ),
                $this->get_tgmpa_url()
            );
        }


        public function is_tgmpa_complete() {
            $complete = true;
            foreach ( $this->plugins as $slug => $plugin ) {
                if ( ! $this->is_plugin_active( $slug ) || false !== $this->does_plugin_have_update( $slug ) ) {
                    $complete = false;
                    break;
                }
            }

            return $complete;
        }


        public function is_plugin_installed( $slug ) {
            $installed_plugins = $this->get_plugins(); // Retrieve a list of all installed plugins (WP cached).

            return ( ! empty( $installed_plugins[ $this->plugins[ $slug ]['file_path'] ] ) );
        }

        public function is_plugin_active( $slug ) {
            return ( ( ! empty( $this->plugins[ $slug ]['is_callable'] ) && is_callable( $this->plugins[ $slug ]['is_callable'] ) ) || is_plugin_active( $this->plugins[ $slug ]['file_path'] ) );
        }


        public function can_plugin_update( $slug ) {
            // We currently can't get reliable info on non-WP-repo plugins - issue #380.
            if ( 'repo' !== $this->plugins[ $slug ]['source_type'] ) {
                return true;
            }

            $api = $this->get_plugins_api( $slug );

            if ( false !== $api && isset( $api->requires ) ) {
                return version_compare( $this->wp_version, $api->requires, '>=' );
            }

            // No usable info received from the plugins API, presume we can update.
            return true;
        }

        public function is_plugin_updatetable( $slug ) {
            if ( ! $this->is_plugin_installed( $slug ) ) {
                return false;
            } else {
                return ( false !== $this->does_plugin_have_update( $slug ) && $this->can_plugin_update( $slug ) );
            }
        }


        public function can_plugin_activate( $slug ) {
            return ( ! $this->is_plugin_active( $slug ) && ! $this->does_plugin_require_update( $slug ) );
        }


        public function get_installed_version( $slug ) {
            $installed_plugins = $this->get_plugins(); // Retrieve a list of all installed plugins (WP cached).

            if ( ! empty( $installed_plugins[ $this->plugins[ $slug ]['file_path'] ]['Version'] ) ) {
                return $installed_plugins[ $this->plugins[ $slug ]['file_path'] ]['Version'];
            }

            return '';
        }


        public function does_plugin_require_update( $slug ) {
            $installed_version = $this->get_installed_version( $slug );
            $minimum_version   = $this->plugins[ $slug ]['version'];

            return version_compare( $minimum_version, $installed_version, '>' );
        }


        public function does_plugin_have_update( $slug ) {
            // Presume bundled and external plugins will point to a package which meets the minimum required version.
            if ( 'repo' !== $this->plugins[ $slug ]['source_type'] ) {
                if ( $this->does_plugin_require_update( $slug ) ) {
                    return $this->plugins[ $slug ]['version'];
                }

                return false;
            }

            $repo_updates = get_site_transient( 'update_plugins' );

            if ( isset( $repo_updates->response[ $this->plugins[ $slug ]['file_path'] ]->new_version ) ) {
                return $repo_updates->response[ $this->plugins[ $slug ]['file_path'] ]->new_version;
            }

            return false;
        }


        public function get_upgrade_notice( $slug ) {
            // We currently can't get reliable info on non-WP-repo plugins - issue #380.
            if ( 'repo' !== $this->plugins[ $slug ]['source_type'] ) {
                return '';
            }

            $repo_updates = get_site_transient( 'update_plugins' );

            if ( ! empty( $repo_updates->response[ $this->plugins[ $slug ]['file_path'] ]->upgrade_notice ) ) {
                return $repo_updates->response[ $this->plugins[ $slug ]['file_path'] ]->upgrade_notice;
            }

            return '';
        }


        public function get_plugins( $plugin_folder = '' ) {
            if ( ! function_exists( 'get_plugins' ) ) {
                require_once ABSPATH . 'wp-admin/includes/plugin.php';
            }

            return get_plugins( $plugin_folder );
        }


        public function update_dismiss() {
            delete_metadata( 'user', null, 'tgmpa_dismissed_notice_' . $this->id, null, true );
        }


        public function force_activation() {
            foreach ( $this->plugins as $slug => $plugin ) {
                if ( true === $plugin['force_activation'] ) {
                    if ( ! $this->is_plugin_installed( $slug ) ) {
                        // Oops, plugin isn't there so iterate to next condition.
                        continue;
                    } elseif ( $this->can_plugin_activate( $slug ) ) {
                        // There we go, activate the plugin.
                        activate_plugin( $plugin['file_path'] );
                    }
                }
            }
        }


        public function force_deactivation() {
            $deactivated = array();

            foreach ( $this->plugins as $slug => $plugin ) {
                /*
                 * Only proceed forward if the parameter is set to true and plugin is active
                 * as a 'normal' (not must-use) plugin.
                 */
                if ( true === $plugin['force_deactivation'] && is_plugin_active( $plugin['file_path'] ) ) {
                    deactivate_plugins( $plugin['file_path'] );
                    $deactivated[ $plugin['file_path'] ] = time();
                }
            }

            if ( ! empty( $deactivated ) ) {
                update_option( 'recently_activated', $deactivated + (array) get_option( 'recently_activated' ) );
            }
        }

        public function show_tgmpa_version() {
            echo '<p style="float: right; padding: 0em 1.5em 0.5em 0;"><strong><small>',
                esc_html(
                    sprintf(
                        /* translators: %s: version number */
                        __( 'TGMPA v%s', 'tgmpa' ),
                        self::TGMPA_VERSION
                    )
                ),
                '</small></strong></p>';
        }


        public static function get_instance() {
            if ( ! isset( self::$instance ) && ! ( self::$instance instanceof self ) ) {
                self::$instance = new self();
            }

            return self::$instance;
        }
    }

    if ( ! function_exists( 'load_tgm_plugin_activation' ) ) {
        /**
         * Ensure only one instance of the class is ever invoked.
         *
         * @since 2.5.0
         */
        function load_tgm_plugin_activation() {
            $GLOBALS['tgmpa'] = TGM_Plugin_Activation::get_instance();
        }
    }

    if ( did_action( 'plugins_loaded' ) ) {
        load_tgm_plugin_activation();
    } else {
        add_action( 'plugins_loaded', 'load_tgm_plugin_activation' );
    }
}

if ( ! function_exists( 'tgmpa' ) ) {

    function tgmpa( $plugins, $config = array() ) {
        $instance = call_user_func( array( get_class( $GLOBALS['tgmpa'] ), 'get_instance' ) );

        foreach ( $plugins as $plugin ) {
            call_user_func( array( $instance, 'register' ), $plugin );
        }

        if ( ! empty( $config ) && is_array( $config ) ) {
            // Send out notices for deprecated arguments passed.
            if ( isset( $config['notices'] ) ) {
                _deprecated_argument( __FUNCTION__, '2.2.0', 'The `notices` config parameter was renamed to `has_notices` in TGMPA 2.2.0. Please adjust your configuration.' );
                if ( ! isset( $config['has_notices'] ) ) {
                    $config['has_notices'] = $config['notices'];
                }
            }

            if ( isset( $config['parent_menu_slug'] ) ) {
                _deprecated_argument( __FUNCTION__, '2.4.0', 'The `parent_menu_slug` config parameter was removed in TGMPA 2.4.0. In TGMPA 2.5.0 an alternative was (re-)introduced. Please adjust your configuration. For more information visit the website: http://tgmpluginactivation.com/configuration/#h-configuration-options.' );
            }
            if ( isset( $config['parent_url_slug'] ) ) {
                _deprecated_argument( __FUNCTION__, '2.4.0', 'The `parent_url_slug` config parameter was removed in TGMPA 2.4.0. In TGMPA 2.5.0 an alternative was (re-)introduced. Please adjust your configuration. For more information visit the website: http://tgmpluginactivation.com/configuration/#h-configuration-options.' );
            }

            call_user_func( array( $instance, 'config' ), $config );
        }
    }
}

/**
 * WP_List_Table isn't always available. If it isn't available,
 * we load it here.
 *
 * @since 2.2.0
 */
if ( ! class_exists( 'WP_List_Table' ) ) {
    require_once ABSPATH . 'wp-admin/includes/class-wp-list-table.php';
}

if ( ! class_exists( 'TGMPA_List_Table' ) ) {

    class TGMPA_List_Table extends WP_List_Table {
        /**
         * TGMPA instance.
         *
         * @since 2.5.0
         *
         * @var object
         */
        protected $tgmpa;

        /**
         * The currently chosen view.
         *
         * @since 2.5.0
         *
         * @var string One of: 'all', 'install', 'update', 'activate'
         */
        public $view_context = 'all';

        /**
         * The plugin counts for the various views.
         *
         * @since 2.5.0
         *
         * @var array
         */
        protected $view_totals = array(
            'all'      => 0,
            'install'  => 0,
            'update'   => 0,
            'activate' => 0,
        );

        /**
         * References parent constructor and sets defaults for class.
         *
         * @since 2.2.0
         */
        public function __construct() {
            $this->tgmpa = call_user_func( array( get_class( $GLOBALS['tgmpa'] ), 'get_instance' ) );

            parent::__construct(
                array(
                    'singular' => 'plugin',
                    'plural'   => 'plugins',
                    'ajax'     => false,
                )
            );

            if ( isset( $_REQUEST['plugin_status'] ) && in_array( $_REQUEST['plugin_status'], array( 'install', 'update', 'activate' ), true ) ) {
                $this->view_context = sanitize_key( $_REQUEST['plugin_status'] );
            }

            add_filter( 'tgmpa_table_data_items', array( $this, 'sort_table_items' ) );
        }

        /**
         * Get a list of CSS classes for the <table> tag.
         *
         * Overruled to prevent the 'plural' argument from being added.
         *
         * @since 2.5.0
         *
         * @return array CSS classnames.
         */
        public function get_table_classes() {
            return array( 'widefat', 'fixed' );
        }

        /**
         * Gathers and renames all of our plugin information to be used by WP_List_Table to create our table.
         *
         * @since 2.2.0
         *
         * @return array $table_data Information for use in table.
         */
        protected function _gather_plugin_data() {
            // Load thickbox for plugin links.
            $this->tgmpa->admin_init();
            $this->tgmpa->thickbox();

            // Categorize the plugins which have open actions.
            $plugins = $this->categorize_plugins_to_views();

            // Set the counts for the view links.
            $this->set_view_totals( $plugins );

            // Prep variables for use and grab list of all installed plugins.
            $table_data = array();
            $i          = 0;

            // Redirect to the 'all' view if no plugins were found for the selected view context.
            if ( empty( $plugins[ $this->view_context ] ) ) {
                $this->view_context = 'all';
            }

            foreach ( $plugins[ $this->view_context ] as $slug => $plugin ) {
                $table_data[ $i ]['sanitized_plugin']  = $plugin['name'];
                $table_data[ $i ]['slug']              = $slug;
                $table_data[ $i ]['plugin']            = '<strong>' . $this->tgmpa->get_info_link( $slug ) . '</strong>';
                $table_data[ $i ]['source']            = $this->get_plugin_source_type_text( $plugin['source_type'] );
                $table_data[ $i ]['type']              = $this->get_plugin_advise_type_text( $plugin['required'] );
                $table_data[ $i ]['status']            = $this->get_plugin_status_text( $slug );
                $table_data[ $i ]['installed_version'] = $this->tgmpa->get_installed_version( $slug );
                $table_data[ $i ]['minimum_version']   = $plugin['version'];
                $table_data[ $i ]['available_version'] = $this->tgmpa->does_plugin_have_update( $slug );

                // Prep the upgrade notice info.
                $upgrade_notice = $this->tgmpa->get_upgrade_notice( $slug );
                if ( ! empty( $upgrade_notice ) ) {
                    $table_data[ $i ]['upgrade_notice'] = $upgrade_notice;

                    add_action( "tgmpa_after_plugin_row_{$slug}", array( $this, 'wp_plugin_update_row' ), 10, 2 );
                }

                $table_data[ $i ] = apply_filters( 'tgmpa_table_data_item', $table_data[ $i ], $plugin );

                $i++;
            }

            return $table_data;
        }

        /**
         * Categorize the plugins which have open actions into views for the TGMPA page.
         *
         * @since 2.5.0
         */
        protected function categorize_plugins_to_views() {
            $plugins = array(
                'all'      => array(), // Meaning: all plugins which still have open actions.
                'install'  => array(),
                'update'   => array(),
                'activate' => array(),
            );

            foreach ( $this->tgmpa->plugins as $slug => $plugin ) {
                if ( $this->tgmpa->is_plugin_active( $slug ) && false === $this->tgmpa->does_plugin_have_update( $slug ) ) {
                    // No need to display plugins if they are installed, up-to-date and active.
                    continue;
                } else {
                    $plugins['all'][ $slug ] = $plugin;

                    if ( ! $this->tgmpa->is_plugin_installed( $slug ) ) {
                        $plugins['install'][ $slug ] = $plugin;
                    } else {
                        if ( false !== $this->tgmpa->does_plugin_have_update( $slug ) ) {
                            $plugins['update'][ $slug ] = $plugin;
                        }

                        if ( $this->tgmpa->can_plugin_activate( $slug ) ) {
                            $plugins['activate'][ $slug ] = $plugin;
                        }
                    }
                }
            }

            return $plugins;
        }

        /**
         * Set the counts for the view links.
         *
         * @since 2.5.0
         *
         * @param array $plugins Plugins order by view.
         */
        protected function set_view_totals( $plugins ) {
            foreach ( $plugins as $type => $list ) {
                $this->view_totals[ $type ] = count( $list );
            }
        }

        /**
         * Get the plugin required/recommended text string.
         *
         * @since 2.5.0
         *
         * @param string $required Plugin required setting.
         * @return string
         */
        protected function get_plugin_advise_type_text( $required ) {
            if ( true === $required ) {
                return __( 'Required', 'tgmpa' );
            }

            return __( 'Recommended', 'tgmpa' );
        }

        /**
         * Get the plugin source type text string.
         *
         * @since 2.5.0
         *
         * @param string $type Plugin type.
         * @return string
         */
        protected function get_plugin_source_type_text( $type ) {
            $string = '';

            switch ( $type ) {
                case 'repo':
                    $string = __( 'WordPress Repository', 'tgmpa' );
                    break;
                case 'external':
                    $string = __( 'External Source', 'tgmpa' );
                    break;
                case 'bundled':
                    $string = __( 'Pre-Packaged', 'tgmpa' );
                    break;
            }

            return $string;
        }

        /**
         * Determine the plugin status message.
         *
         * @since 2.5.0
         *
         * @param string $slug Plugin slug.
         * @return string
         */
        protected function get_plugin_status_text( $slug ) {
            if ( ! $this->tgmpa->is_plugin_installed( $slug ) ) {
                return __( 'Not Installed', 'tgmpa' );
            }

            if ( ! $this->tgmpa->is_plugin_active( $slug ) ) {
                $install_status = __( 'Installed But Not Activated', 'tgmpa' );
            } else {
                $install_status = __( 'Active', 'tgmpa' );
            }

            $update_status = '';

            if ( $this->tgmpa->does_plugin_require_update( $slug ) && false === $this->tgmpa->does_plugin_have_update( $slug ) ) {
                $update_status = __( 'Required Update not Available', 'tgmpa' );

            } elseif ( $this->tgmpa->does_plugin_require_update( $slug ) ) {
                $update_status = __( 'Requires Update', 'tgmpa' );

            } elseif ( false !== $this->tgmpa->does_plugin_have_update( $slug ) ) {
                $update_status = __( 'Update recommended', 'tgmpa' );
            }

            if ( '' === $update_status ) {
                return $install_status;
            }

            return sprintf(
                /* translators: 1: install status, 2: update status */
                _x( '%1$s, %2$s', 'Install/Update Status', 'tgmpa' ),
                $install_status,
                $update_status
            );
        }

        /**
         * Sort plugins by Required/Recommended type and by alphabetical plugin name within each type.
         *
         * @since 2.5.0
         *
         * @param array $items Prepared table items.
         * @return array Sorted table items.
         */
        public function sort_table_items( $items ) {
            $type = array();
            $name = array();

            foreach ( $items as $i => $plugin ) {
                $type[ $i ] = $plugin['type']; // Required / recommended.
                $name[ $i ] = $plugin['sanitized_plugin'];
            }

            array_multisort( $type, SORT_DESC, $name, SORT_ASC, $items );

            return $items;
        }

        /**
         * Get an associative array ( id => link ) of the views available on this table.
         *
         * @since 2.5.0
         *
         * @return array
         */
        public function get_views() {
            $status_links = array();

            foreach ( $this->view_totals as $type => $count ) {
                if ( $count < 1 ) {
                    continue;
                }

                switch ( $type ) {
                    case 'all':
                        /* translators: 1: number of plugins. */
                        $text = _nx( 'All <span class="count">(%s)</span>', 'All <span class="count">(%s)</span>', $count, 'plugins', 'tgmpa' );
                        break;
                    case 'install':
                        /* translators: 1: number of plugins. */
                        $text = _n( 'To Install <span class="count">(%s)</span>', 'To Install <span class="count">(%s)</span>', $count, 'tgmpa' );
                        break;
                    case 'update':
                        /* translators: 1: number of plugins. */
                        $text = _n( 'Update Available <span class="count">(%s)</span>', 'Update Available <span class="count">(%s)</span>', $count, 'tgmpa' );
                        break;
                    case 'activate':
                        /* translators: 1: number of plugins. */
                        $text = _n( 'To Activate <span class="count">(%s)</span>', 'To Activate <span class="count">(%s)</span>', $count, 'tgmpa' );
                        break;
                    default:
                        $text = '';
                        break;
                }

                if ( ! empty( $text ) ) {

                    $status_links[ $type ] = sprintf(
                        '<a href="%s"%s>%s</a>',
                        esc_url( $this->tgmpa->get_tgmpa_status_url( $type ) ),
                        ( $type === $this->view_context ) ? ' class="current"' : '',
                        sprintf( $text, number_format_i18n( $count ) )
                    );
                }
            }

            return $status_links;
        }

        /**
         * Create default columns to display important plugin information
         * like type, action and status.
         *
         * @since 2.2.0
         *
         * @param array  $item        Array of item data.
         * @param string $column_name The name of the column.
         * @return string
         */
        public function column_default( $item, $column_name ) {
            return $item[ $column_name ];
        }

        /**
         * Required for bulk installing.
         *
         * Adds a checkbox for each plugin.
         *
         * @since 2.2.0
         *
         * @param array $item Array of item data.
         * @return string The input checkbox with all necessary info.
         */
        public function column_cb( $item ) {
            return sprintf(
                '<input type="checkbox" name="%1$s[]" value="%2$s" id="%3$s" />',
                esc_attr( $this->_args['singular'] ),
                esc_attr( $item['slug'] ),
                esc_attr( $item['sanitized_plugin'] )
            );
        }

        /**
         * Create default title column along with the action links.
         *
         * @since 2.2.0
         *
         * @param array $item Array of item data.
         * @return string The plugin name and action links.
         */
        public function column_plugin( $item ) {
            return sprintf(
                '%1$s %2$s',
                $item['plugin'],
                $this->row_actions( $this->get_row_actions( $item ), true )
            );
        }

        /**
         * Create version information column.
         *
         * @since 2.5.0
         *
         * @param array $item Array of item data.
         * @return string HTML-formatted version information.
         */
        public function column_version( $item ) {
            $output = array();

            if ( $this->tgmpa->is_plugin_installed( $item['slug'] ) ) {
                $installed = ! empty( $item['installed_version'] ) ? $item['installed_version'] : _x( 'unknown', 'as in: "version nr unknown"', 'tgmpa' );

                $color = '';
                if ( ! empty( $item['minimum_version'] ) && $this->tgmpa->does_plugin_require_update( $item['slug'] ) ) {
                    $color = ' color: #ff0000; font-weight: bold;';
                }

                $output[] = sprintf(
                    '<p><span style="min-width: 32px; text-align: right; float: right;%1$s">%2$s</span>' . __( 'Installed version:', 'tgmpa' ) . '</p>',
                    $color,
                    $installed
                );
            }

            if ( ! empty( $item['minimum_version'] ) ) {
                $output[] = sprintf(
                    '<p><span style="min-width: 32px; text-align: right; float: right;">%1$s</span>' . __( 'Minimum required version:', 'tgmpa' ) . '</p>',
                    $item['minimum_version']
                );
            }

            if ( ! empty( $item['available_version'] ) ) {
                $color = '';
                if ( ! empty( $item['minimum_version'] ) && version_compare( $item['available_version'], $item['minimum_version'], '>=' ) ) {
                    $color = ' color: #71C671; font-weight: bold;';
                }

                $output[] = sprintf(
                    '<p><span style="min-width: 32px; text-align: right; float: right;%1$s">%2$s</span>' . __( 'Available version:', 'tgmpa' ) . '</p>',
                    $color,
                    $item['available_version']
                );
            }

            if ( empty( $output ) ) {
                return '&nbsp;'; // Let's not break the table layout.
            } else {
                return implode( "\n", $output );
            }
        }

        /**
         * Sets default message within the plugins table if no plugins
         * are left for interaction.
         *
         * Hides the menu item to prevent the user from clicking and
         * getting a permissions error.
         *
         * @since 2.2.0
         */
        public function no_items() {
            echo esc_html__( 'No plugins to install, update or activate.', 'tgmpa' ) . ' <a href="' . esc_url( self_admin_url() ) . '"> ' . esc_html__( 'Return to the Dashboard', 'tgmpa' ) . '</a>';
            echo '<style type="text/css">#adminmenu .wp-submenu li.current { display: none !important; }</style>';
        }

        /**
         * Output all the column information within the table.
         *
         * @since 2.2.0
         *
         * @return array $columns The column names.
         */
        public function get_columns() {
            $columns = array(
                'cb'     => '<input type="checkbox" />',
                'plugin' => __( 'Plugin', 'tgmpa' ),
                'source' => __( 'Source', 'tgmpa' ),
                'type'   => __( 'Type', 'tgmpa' ),
            );

            if ( 'all' === $this->view_context || 'update' === $this->view_context ) {
                $columns['version'] = __( 'Version', 'tgmpa' );
                $columns['status']  = __( 'Status', 'tgmpa' );
            }

            return apply_filters( 'tgmpa_table_columns', $columns );
        }

        /**
         * Get name of default primary column
         *
         * @since 2.5.0 / WP 4.3+ compatibility
         * @access protected
         *
         * @return string
         */
        protected function get_default_primary_column_name() {
            return 'plugin';
        }

        /**
         * Get the name of the primary column.
         *
         * @since 2.5.0 / WP 4.3+ compatibility
         * @access protected
         *
         * @return string The name of the primary column.
         */
        protected function get_primary_column_name() {
            if ( method_exists( 'WP_List_Table', 'get_primary_column_name' ) ) {
                return parent::get_primary_column_name();
            } else {
                return $this->get_default_primary_column_name();
            }
        }

        /**
         * Get the actions which are relevant for a specific plugin row.
         *
         * @since 2.5.0
         *
         * @param array $item Array of item data.
         * @return array Array with relevant action links.
         */
        protected function get_row_actions( $item ) {
            $actions      = array();
            $action_links = array();

            // Display the 'Install' action link if the plugin is not yet available.
            if ( ! $this->tgmpa->is_plugin_installed( $item['slug'] ) ) {
                /* translators: %2$s: plugin name in screen reader markup */
                $actions['install'] = __( 'Install %2$s', 'tgmpa' );
            } else {
                // Display the 'Update' action link if an update is available and WP complies with plugin minimum.
                if ( false !== $this->tgmpa->does_plugin_have_update( $item['slug'] ) && $this->tgmpa->can_plugin_update( $item['slug'] ) ) {
                    /* translators: %2$s: plugin name in screen reader markup */
                    $actions['update'] = __( 'Update %2$s', 'tgmpa' );
                }

                // Display the 'Activate' action link, but only if the plugin meets the minimum version.
                if ( $this->tgmpa->can_plugin_activate( $item['slug'] ) ) {
                    /* translators: %2$s: plugin name in screen reader markup */
                    $actions['activate'] = __( 'Activate %2$s', 'tgmpa' );
                }
            }

            // Create the actual links.
            foreach ( $actions as $action => $text ) {
                $nonce_url = wp_nonce_url(
                    add_query_arg(
                        array(
                            'plugin'           => urlencode( $item['slug'] ),
                            'tgmpa-' . $action => $action . '-plugin',
                        ),
                        $this->tgmpa->get_tgmpa_url()
                    ),
                    'tgmpa-' . $action,
                    'tgmpa-nonce'
                );

                $action_links[ $action ] = sprintf(
                    '<a href="%1$s">' . esc_html( $text ) . '</a>', // $text contains the second placeholder.
                    esc_url( $nonce_url ),
                    '<span class="screen-reader-text">' . esc_html( $item['sanitized_plugin'] ) . '</span>'
                );
            }

            $prefix = ( defined( 'WP_NETWORK_ADMIN' ) && WP_NETWORK_ADMIN ) ? 'network_admin_' : '';
            return apply_filters( "tgmpa_{$prefix}plugin_action_links", array_filter( $action_links ), $item['slug'], $item, $this->view_context );
        }

        /**
         * Generates content for a single row of the table.
         *
         * @since 2.5.0
         *
         * @param object $item The current item.
         */
        public function single_row( $item ) {
            parent::single_row( $item );

            /**
             * Fires after each specific row in the TGMPA Plugins list table.
             *
             * The dynamic portion of the hook name, `$item['slug']`, refers to the slug
             * for the plugin.
             *
             * @since 2.5.0
             */
            do_action( "tgmpa_after_plugin_row_{$item['slug']}", $item['slug'], $item, $this->view_context );
        }

        /**
         * Show the upgrade notice below a plugin row if there is one.
         *
         * @since 2.5.0
         *
         * @see /wp-admin/includes/update.php
         *
         * @param string $slug Plugin slug.
         * @param array  $item The information available in this table row.
         * @return null Return early if upgrade notice is empty.
         */
        public function wp_plugin_update_row( $slug, $item ) {
            if ( empty( $item['upgrade_notice'] ) ) {
                return;
            }

            echo '
                <tr class="plugin-update-tr">
                    <td colspan="', absint( $this->get_column_count() ), '" class="plugin-update colspanchange">
                        <div class="update-message">',
                            esc_html__( 'Upgrade message from the plugin author:', 'tgmpa' ),
                            ' <strong>', wp_kses_data( $item['upgrade_notice'] ), '</strong>
                        </div>
                    </td>
                </tr>';
        }

        /**
         * Extra controls to be displayed between bulk actions and pagination.
         *
         * @since 2.5.0
         *
         * @param string $which 'top' or 'bottom' table navigation.
         */
        public function extra_tablenav( $which ) {
            if ( 'bottom' === $which ) {
                $this->tgmpa->show_tgmpa_version();
            }
        }

        /**
         * Defines the bulk actions for handling registered plugins.
         *
         * @since 2.2.0
         *
         * @return array $actions The bulk actions for the plugin install table.
         */
        public function get_bulk_actions() {

            $actions = array();

            if ( 'update' !== $this->view_context && 'activate' !== $this->view_context ) {
                if ( current_user_can( 'install_plugins' ) ) {
                    $actions['tgmpa-bulk-install'] = __( 'Install', 'tgmpa' );
                }
            }

            if ( 'install' !== $this->view_context ) {
                if ( current_user_can( 'update_plugins' ) ) {
                    $actions['tgmpa-bulk-update'] = __( 'Update', 'tgmpa' );
                }
                if ( current_user_can( 'activate_plugins' ) ) {
                    $actions['tgmpa-bulk-activate'] = __( 'Activate', 'tgmpa' );
                }
            }

            return $actions;
        }

        /**
         * Processes bulk installation and activation actions.
         *
         * The bulk installation process looks for the $_POST information and passes that
         * through if a user has to use WP_Filesystem to enter their credentials.
         *
         * @since 2.2.0
         */
        public function process_bulk_actions() {
            // Bulk installation process.
            if ( 'tgmpa-bulk-install' === $this->current_action() || 'tgmpa-bulk-update' === $this->current_action() ) {

                check_admin_referer( 'bulk-' . $this->_args['plural'] );

                $install_type = 'install';
                if ( 'tgmpa-bulk-update' === $this->current_action() ) {
                    $install_type = 'update';
                }

                $plugins_to_install = array();

                // Did user actually select any plugins to install/update ?
                if ( empty( $_POST['plugin'] ) ) {
                    if ( 'install' === $install_type ) {
                        $message = __( 'No plugins were selected to be installed. No action taken.', 'tgmpa' );
                    } else {
                        $message = __( 'No plugins were selected to be updated. No action taken.', 'tgmpa' );
                    }

                    echo '<div id="message" class="error"><p>', esc_html( $message ), '</p></div>';

                    return false;
                }

                if ( is_array( $_POST['plugin'] ) ) {
                    $plugins_to_install = (array) $_POST['plugin'];
                } elseif ( is_string( $_POST['plugin'] ) ) {
                    // Received via Filesystem page - un-flatten array (WP bug #19643).
                    $plugins_to_install = explode( ',', $_POST['plugin'] );
                }

                // Sanitize the received input.
                $plugins_to_install = array_map( 'urldecode', $plugins_to_install );
                $plugins_to_install = array_map( array( $this->tgmpa, 'sanitize_key' ), $plugins_to_install );

                // Validate the received input.
                foreach ( $plugins_to_install as $key => $slug ) {
                    // Check if the plugin was registered with TGMPA and remove if not.
                    if ( ! isset( $this->tgmpa->plugins[ $slug ] ) ) {
                        unset( $plugins_to_install[ $key ] );
                        continue;
                    }

                    // For install: make sure this is a plugin we *can* install and not one already installed.
                    if ( 'install' === $install_type && true === $this->tgmpa->is_plugin_installed( $slug ) ) {
                        unset( $plugins_to_install[ $key ] );
                    }

                    // For updates: make sure this is a plugin we *can* update (update available and WP version ok).
                    if ( 'update' === $install_type && false === $this->tgmpa->is_plugin_updatetable( $slug ) ) {
                        unset( $plugins_to_install[ $key ] );
                    }
                }

                // No need to proceed further if we have no plugins to handle.
                if ( empty( $plugins_to_install ) ) {
                    if ( 'install' === $install_type ) {
                        $message = __( 'No plugins are available to be installed at this time.', 'tgmpa' );
                    } else {
                        $message = __( 'No plugins are available to be updated at this time.', 'tgmpa' );
                    }

                    echo '<div id="message" class="error"><p>', esc_html( $message ), '</p></div>';

                    return false;
                }

                // Pass all necessary information if WP_Filesystem is needed.
                $url = wp_nonce_url(
                    $this->tgmpa->get_tgmpa_url(),
                    'bulk-' . $this->_args['plural']
                );

                // Give validated data back to $_POST which is the only place the filesystem looks for extra fields.
                $_POST['plugin'] = implode( ',', $plugins_to_install ); // Work around for WP bug #19643.

                $method = ''; // Leave blank so WP_Filesystem can populate it as necessary.
                $fields = array_keys( $_POST ); // Extra fields to pass to WP_Filesystem.

                if ( false === ( $creds = request_filesystem_credentials( esc_url_raw( $url ), $method, false, false, $fields ) ) ) {
                    return true; // Stop the normal page form from displaying, credential request form will be shown.
                }

                // Now we have some credentials, setup WP_Filesystem.
                if ( ! WP_Filesystem( $creds ) ) {
                    // Our credentials were no good, ask the user for them again.
                    request_filesystem_credentials( esc_url_raw( $url ), $method, true, false, $fields );

                    return true;
                }

                /* If we arrive here, we have the filesystem */

                // Store all information in arrays since we are processing a bulk installation.
                $names      = array();
                $sources    = array(); // Needed for installs.
                $file_paths = array(); // Needed for upgrades.
                $to_inject  = array(); // Information to inject into the update_plugins transient.

                // Prepare the data for validated plugins for the install/upgrade.
                foreach ( $plugins_to_install as $slug ) {
                    $name   = $this->tgmpa->plugins[ $slug ]['name'];
                    $source = $this->tgmpa->get_download_url( $slug );

                    if ( ! empty( $name ) && ! empty( $source ) ) {
                        $names[] = $name;

                        switch ( $install_type ) {

                            case 'install':
                                $sources[] = $source;
                                break;

                            case 'update':
                                $file_paths[]                 = $this->tgmpa->plugins[ $slug ]['file_path'];
                                $to_inject[ $slug ]           = $this->tgmpa->plugins[ $slug ];
                                $to_inject[ $slug ]['source'] = $source;
                                break;
                        }
                    }
                }
                unset( $slug, $name, $source );

                // Create a new instance of TGMPA_Bulk_Installer.
                $installer = new TGMPA_Bulk_Installer(
                    new TGMPA_Bulk_Installer_Skin(
                        array(
                            'url'          => esc_url_raw( $this->tgmpa->get_tgmpa_url() ),
                            'nonce'        => 'bulk-' . $this->_args['plural'],
                            'names'        => $names,
                            'install_type' => $install_type,
                        )
                    )
                );

                // Wrap the install process with the appropriate HTML.
                echo '<div class="tgmpa">',
                    '<h2 style="font-size: 23px; font-weight: 400; line-height: 29px; margin: 0; padding: 9px 15px 4px 0;">', esc_html( get_admin_page_title() ), '</h2>
                    <div class="update-php" style="width: 100%; height: 98%; min-height: 850px; padding-top: 1px;">';

                // Process the bulk installation submissions.
                add_filter( 'upgrader_source_selection', array( $this->tgmpa, 'maybe_adjust_source_dir' ), 1, 3 );

                if ( 'tgmpa-bulk-update' === $this->current_action() ) {
                    // Inject our info into the update transient.
                    $this->tgmpa->inject_update_info( $to_inject );

                    $installer->bulk_upgrade( $file_paths );
                } else {
                    $installer->bulk_install( $sources );
                }

                remove_filter( 'upgrader_source_selection', array( $this->tgmpa, 'maybe_adjust_source_dir' ), 1 );

                echo '</div></div>';

                return true;
            }

            // Bulk activation process.
            if ( 'tgmpa-bulk-activate' === $this->current_action() ) {
                check_admin_referer( 'bulk-' . $this->_args['plural'] );

                // Did user actually select any plugins to activate ?
                if ( empty( $_POST['plugin'] ) ) {
                    echo '<div id="message" class="error"><p>', esc_html__( 'No plugins were selected to be activated. No action taken.', 'tgmpa' ), '</p></div>';

                    return false;
                }

                // Grab plugin data from $_POST.
                $plugins = array();
                if ( isset( $_POST['plugin'] ) ) {
                    $plugins = array_map( 'urldecode', (array) $_POST['plugin'] );
                    $plugins = array_map( array( $this->tgmpa, 'sanitize_key' ), $plugins );
                }

                $plugins_to_activate = array();
                $plugin_names        = array();

                // Grab the file paths for the selected & inactive plugins from the registration array.
                foreach ( $plugins as $slug ) {
                    if ( $this->tgmpa->can_plugin_activate( $slug ) ) {
                        $plugins_to_activate[] = $this->tgmpa->plugins[ $slug ]['file_path'];
                        $plugin_names[]        = $this->tgmpa->plugins[ $slug ]['name'];
                    }
                }
                unset( $slug );

                // Return early if there are no plugins to activate.
                if ( empty( $plugins_to_activate ) ) {
                    echo '<div id="message" class="error"><p>', esc_html__( 'No plugins are available to be activated at this time.', 'tgmpa' ), '</p></div>';

                    return false;
                }

                // Now we are good to go - let's start activating plugins.
                $activate = activate_plugins( $plugins_to_activate );

                if ( is_wp_error( $activate ) ) {
                    echo '<div id="message" class="error"><p>', wp_kses_post( $activate->get_error_message() ), '</p></div>';
                } else {
                    $count        = count( $plugin_names ); // Count so we can use _n function.
                    $plugin_names = array_map( array( 'TGMPA_Utils', 'wrap_in_strong' ), $plugin_names );
                    $last_plugin  = array_pop( $plugin_names ); // Pop off last name to prep for readability.
                    $imploded     = empty( $plugin_names ) ? $last_plugin : ( implode( ', ', $plugin_names ) . ' ' . esc_html_x( 'and', 'plugin A *and* plugin B', 'tgmpa' ) . ' ' . $last_plugin );

                    printf( // WPCS: xss ok.
                        '<div id="message" class="updated"><p>%1$s %2$s.</p></div>',
                        esc_html__( _n( 'The following plugin was activated successfully:', 'The following plugins were activated successfully:', $count, 'tgmpa' ) ),
                        $imploded
                    );

                    // Update recently activated plugins option.
                    $recent = (array) get_option( 'recently_activated' );
                    foreach ( $plugins_to_activate as $plugin => $time ) {
                        if ( isset( $recent[ $plugin ] ) ) {
                            unset( $recent[ $plugin ] );
                        }
                    }
                    update_option( 'recently_activated', $recent );
                }

                unset( $_POST ); // Reset the $_POST variable in case user wants to perform one action after another.

                return true;
            }

            return false;
        }

        /**
         * Prepares all of our information to be outputted into a usable table.
         *
         * @since 2.2.0
         */
        public function prepare_items() {
            $columns               = $this->get_columns(); // Get all necessary column information.
            $hidden                = array(); // No columns to hide, but we must set as an array.
            $sortable              = array(); // No reason to make sortable columns.
            $primary               = $this->get_primary_column_name(); // Column which has the row actions.
            $this->_column_headers = array( $columns, $hidden, $sortable, $primary ); // Get all necessary column headers.

            // Process our bulk activations here.
            if ( 'tgmpa-bulk-activate' === $this->current_action() ) {
                $this->process_bulk_actions();
            }

            // Store all of our plugin data into $items array so WP_List_Table can use it.
            $this->items = apply_filters( 'tgmpa_table_data_items', $this->_gather_plugin_data() );
        }

        /* *********** DEPRECATED METHODS *********** */

        /**
         * Retrieve plugin data, given the plugin name.
         *
         * @since      2.2.0
         * @deprecated 2.5.0 use {@see TGM_Plugin_Activation::_get_plugin_data_from_name()} instead.
         * @see        TGM_Plugin_Activation::_get_plugin_data_from_name()
         *
         * @param string $name Name of the plugin, as it was registered.
         * @param string $data Optional. Array key of plugin data to return. Default is slug.
         * @return string|boolean Plugin slug if found, false otherwise.
         */
        protected function _get_plugin_data_from_name( $name, $data = 'slug' ) {
            _deprecated_function( __FUNCTION__, 'TGMPA 2.5.0', 'TGM_Plugin_Activation::_get_plugin_data_from_name()' );

            return $this->tgmpa->_get_plugin_data_from_name( $name, $data );
        }
    }
}


if ( ! class_exists( 'TGM_Bulk_Installer' ) ) {

    /**
     * Hack: Prevent TGMPA v2.4.1- bulk installer class from being loaded if 2.4.1- is loaded after 2.5+.
     *
     * @since 2.5.2
     *
     * {@internal The TGMPA_Bulk_Installer class was originally called TGM_Bulk_Installer.
     *            For more information, see that class.}}
     */
    class TGM_Bulk_Installer {
    }
}
if ( ! class_exists( 'TGM_Bulk_Installer_Skin' ) ) {

    /**
     * Hack: Prevent TGMPA v2.4.1- bulk installer skin class from being loaded if 2.4.1- is loaded after 2.5+.
     *
     * @since 2.5.2
     *
     * {@internal The TGMPA_Bulk_Installer_Skin class was originally called TGM_Bulk_Installer_Skin.
     *            For more information, see that class.}}
     */
    class TGM_Bulk_Installer_Skin {
    }
}

/**
 * The WP_Upgrader file isn't always available. If it isn't available,
 * we load it here.
 *
 * We check to make sure no action or activation keys are set so that WordPress
 * does not try to re-include the class when processing upgrades or installs outside
 * of the class.
 *
 * @since 2.2.0
 */
add_action( 'admin_init', 'tgmpa_load_bulk_installer' );
if ( ! function_exists( 'tgmpa_load_bulk_installer' ) ) {
    /**
     * Load bulk installer
     */
    function tgmpa_load_bulk_installer() {
        // Silently fail if 2.5+ is loaded *after* an older version.
        if ( ! isset( $GLOBALS['tgmpa'] ) ) {
            return;
        }

        // Get TGMPA class instance.
        $tgmpa_instance = call_user_func( array( get_class( $GLOBALS['tgmpa'] ), 'get_instance' ) );

        if ( isset( $_GET['page'] ) && $tgmpa_instance->menu === $_GET['page'] ) {
            if ( ! class_exists( 'Plugin_Upgrader', false ) ) {
                require_once ABSPATH . 'wp-admin/includes/class-wp-upgrader.php';
            }

            if ( ! class_exists( 'TGMPA_Bulk_Installer' ) ) {

                /**
                 * Installer class to handle bulk plugin installations.
                 *
                 * Extends WP_Upgrader and customizes to suit the installation of multiple
                 * plugins.
                 *
                 * @since 2.2.0
                 *
                 * {@internal Since 2.5.0 the class is an extension of Plugin_Upgrader rather than WP_Upgrader.}}
                 * {@internal Since 2.5.2 the class has been renamed from TGM_Bulk_Installer to TGMPA_Bulk_Installer.
                 *            This was done to prevent backward compatibility issues with v2.3.6.}}
                 *
                 * @package TGM-Plugin-Activation
                 * @author  Thomas Griffin
                 * @author  Gary Jones
                 */
                class TGMPA_Bulk_Installer extends Plugin_Upgrader {
                    /**
                     * Holds result of bulk plugin installation.
                     *
                     * @since 2.2.0
                     *
                     * @var string
                     */
                    public $result;

                    /**
                     * Flag to check if bulk installation is occurring or not.
                     *
                     * @since 2.2.0
                     *
                     * @var boolean
                     */
                    public $bulk = false;

                    /**
                     * TGMPA instance
                     *
                     * @since 2.5.0
                     *
                     * @var object
                     */
                    protected $tgmpa;

                    /**
                     * Whether or not the destination directory needs to be cleared ( = on update).
                     *
                     * @since 2.5.0
                     *
                     * @var bool
                     */
                    protected $clear_destination = false;

                    /**
                     * References parent constructor and sets defaults for class.
                     *
                     * @since 2.2.0
                     *
                     * @param \Bulk_Upgrader_Skin|null $skin Installer skin.
                     */
                    public function __construct( $skin = null ) {
                        // Get TGMPA class instance.
                        $this->tgmpa = call_user_func( array( get_class( $GLOBALS['tgmpa'] ), 'get_instance' ) );

                        parent::__construct( $skin );

                        if ( isset( $this->skin->options['install_type'] ) && 'update' === $this->skin->options['install_type'] ) {
                            $this->clear_destination = true;
                        }

                        if ( $this->tgmpa->is_automatic ) {
                            $this->activate_strings();
                        }

                        add_action( 'upgrader_process_complete', array( $this->tgmpa, 'populate_file_path' ) );
                    }

                    /**
                     * Sets the correct activation strings for the installer skin to use.
                     *
                     * @since 2.2.0
                     */
                    public function activate_strings() {
                        $this->strings['activation_failed']  = __( 'Plugin activation failed.', 'tgmpa' );
                        $this->strings['activation_success'] = __( 'Plugin activated successfully.', 'tgmpa' );
                    }

                    /**
                     * Performs the actual installation of each plugin.
                     *
                     * @since 2.2.0
                     *
                     * @see WP_Upgrader::run()
                     *
                     * @param array $options The installation config options.
                     * @return null|array Return early if error, array of installation data on success.
                     */
                    public function run( $options ) {
                        $result = parent::run( $options );

                        // Reset the strings in case we changed one during automatic activation.
                        if ( $this->tgmpa->is_automatic ) {
                            if ( 'update' === $this->skin->options['install_type'] ) {
                                $this->upgrade_strings();
                            } else {
                                $this->install_strings();
                            }
                        }

                        return $result;
                    }

                    /**
                     * Processes the bulk installation of plugins.
                     *
                     * @since 2.2.0
                     *
                     * {@internal This is basically a near identical copy of the WP Core
                     * Plugin_Upgrader::bulk_upgrade() method, with minor adjustments to deal with
                     * new installs instead of upgrades.
                     * For ease of future synchronizations, the adjustments are clearly commented, but no other
                     * comments are added. Code style has been made to comply.}}
                     *
                     * @see Plugin_Upgrader::bulk_upgrade()
                     * @see https://core.trac.wordpress.org/browser/tags/4.2.1/src/wp-admin/includes/class-wp-upgrader.php#L838
                     * (@internal Last synced: Dec 31st 2015 against https://core.trac.wordpress.org/browser/trunk?rev=36134}}
                     *
                     * @param array $plugins The plugin sources needed for installation.
                     * @param array $args    Arbitrary passed extra arguments.
                     * @return array|false   Install confirmation messages on success, false on failure.
                     */
                    public function bulk_install( $plugins, $args = array() ) {
                        // [TGMPA + ] Hook auto-activation in.
                        add_filter( 'upgrader_post_install', array( $this, 'auto_activate' ), 10 );

                        $defaults    = array(
                            'clear_update_cache' => true,
                        );
                        $parsed_args = wp_parse_args( $args, $defaults );

                        $this->init();
                        $this->bulk = true;

                        $this->install_strings(); // [TGMPA + ] adjusted.

                        /* [TGMPA - ] $current = get_site_transient( 'update_plugins' ); */

                        /* [TGMPA - ] add_filter('upgrader_clear_destination', array($this, 'delete_old_plugin'), 10, 4); */

                        $this->skin->header();

                        // Connect to the Filesystem first.
                        $res = $this->fs_connect( array( WP_CONTENT_DIR, WP_PLUGIN_DIR ) );
                        if ( ! $res ) {
                            $this->skin->footer();
                            return false;
                        }

                        $this->skin->bulk_header();

                        /*
                         * Only start maintenance mode if:
                         * - running Multisite and there are one or more plugins specified, OR
                         * - a plugin with an update available is currently active.
                         * @TODO: For multisite, maintenance mode should only kick in for individual sites if at all possible.
                         */
                        $maintenance = ( is_multisite() && ! empty( $plugins ) );

                        /*
                        [TGMPA - ]
                        foreach ( $plugins as $plugin )
                            $maintenance = $maintenance || ( is_plugin_active( $plugin ) && isset( $current->response[ $plugin] ) );
                        */
                        if ( $maintenance ) {
                            $this->maintenance_mode( true );
                        }

                        $results = array();

                        $this->update_count   = count( $plugins );
                        $this->update_current = 0;
                        foreach ( $plugins as $plugin ) {
                            $this->update_current++;

                            /*
                            [TGMPA - ]
                            $this->skin->plugin_info = get_plugin_data( WP_PLUGIN_DIR . '/' . $plugin, false, true);

                            if ( !isset( $current->response[ $plugin ] ) ) {
                                $this->skin->set_result('up_to_date');
                                $this->skin->before();
                                $this->skin->feedback('up_to_date');
                                $this->skin->after();
                                $results[$plugin] = true;
                                continue;
                            }

                            // Get the URL to the zip file.
                            $r = $current->response[ $plugin ];

                            $this->skin->plugin_active = is_plugin_active($plugin);
                            */

                            $result = $this->run(
                                array(
                                    'package'           => $plugin, // [TGMPA + ] adjusted.
                                    'destination'       => WP_PLUGIN_DIR,
                                    'clear_destination' => false, // [TGMPA + ] adjusted.
                                    'clear_working'     => true,
                                    'is_multi'          => true,
                                    'hook_extra'        => array(
                                        'plugin' => $plugin,
                                    ),
                                )
                            );

                            $results[ $plugin ] = $this->result;

                            // Prevent credentials auth screen from displaying multiple times.
                            if ( false === $result ) {
                                break;
                            }
                        } //end foreach $plugins

                        $this->maintenance_mode( false );

                        /**
                         * Fires when the bulk upgrader process is complete.
                         *
                         * @since WP 3.6.0 / TGMPA 2.5.0
                         *
                         * @param Plugin_Upgrader $this Plugin_Upgrader instance. In other contexts, $this, might
                         *                              be a Theme_Upgrader or Core_Upgrade instance.
                         * @param array           $data {
                         *     Array of bulk item update data.
                         *
                         *     @type string $action   Type of action. Default 'update'.
                         *     @type string $type     Type of update process. Accepts 'plugin', 'theme', or 'core'.
                         *     @type bool   $bulk     Whether the update process is a bulk update. Default true.
                         *     @type array  $packages Array of plugin, theme, or core packages to update.
                         * }
                         */
                        do_action( 'upgrader_process_complete', $this, array(
                            'action'  => 'install', // [TGMPA + ] adjusted.
                            'type'    => 'plugin',
                            'bulk'    => true,
                            'plugins' => $plugins,
                        ) );

                        $this->skin->bulk_footer();

                        $this->skin->footer();

                        // Cleanup our hooks, in case something else does a upgrade on this connection.
                        /* [TGMPA - ] remove_filter('upgrader_clear_destination', array($this, 'delete_old_plugin')); */

                        // [TGMPA + ] Remove our auto-activation hook.
                        remove_filter( 'upgrader_post_install', array( $this, 'auto_activate' ), 10 );

                        // Force refresh of plugin update information.
                        wp_clean_plugins_cache( $parsed_args['clear_update_cache'] );

                        return $results;
                    }

                    /**
                     * Handle a bulk upgrade request.
                     *
                     * @since 2.5.0
                     *
                     * @see Plugin_Upgrader::bulk_upgrade()
                     *
                     * @param array $plugins The local WP file_path's of the plugins which should be upgraded.
                     * @param array $args    Arbitrary passed extra arguments.
                     * @return string|bool Install confirmation messages on success, false on failure.
                     */
                    public function bulk_upgrade( $plugins, $args = array() ) {

                        add_filter( 'upgrader_post_install', array( $this, 'auto_activate' ), 10 );

                        $result = parent::bulk_upgrade( $plugins, $args );

                        remove_filter( 'upgrader_post_install', array( $this, 'auto_activate' ), 10 );

                        return $result;
                    }

                    /**
                     * Abuse a filter to auto-activate plugins after installation.
                     *
                     * Hooked into the 'upgrader_post_install' filter hook.
                     *
                     * @since 2.5.0
                     *
                     * @param bool $bool The value we need to give back (true).
                     * @return bool
                     */
                    public function auto_activate( $bool ) {
                        // Only process the activation of installed plugins if the automatic flag is set to true.
                        if ( $this->tgmpa->is_automatic ) {
                            // Flush plugins cache so the headers of the newly installed plugins will be read correctly.
                            wp_clean_plugins_cache();

                            // Get the installed plugin file.
                            $plugin_info = $this->plugin_info();

                            // Don't try to activate on upgrade of active plugin as WP will do this already.
                            if ( ! is_plugin_active( $plugin_info ) ) {
                                $activate = activate_plugin( $plugin_info );

                                // Adjust the success string based on the activation result.
                                $this->strings['process_success'] = $this->strings['process_success'] . "<br />\n";

                                if ( is_wp_error( $activate ) ) {
                                    $this->skin->error( $activate );
                                    $this->strings['process_success'] .= $this->strings['activation_failed'];
                                } else {
                                    $this->strings['process_success'] .= $this->strings['activation_success'];
                                }
                            }
                        }

                        return $bool;
                    }
                }
            }

            if ( ! class_exists( 'TGMPA_Bulk_Installer_Skin' ) ) {

                /**
                 * Installer skin to set strings for the bulk plugin installations..
                 *
                 * Extends Bulk_Upgrader_Skin and customizes to suit the installation of multiple
                 * plugins.
                 *
                 * @since 2.2.0
                 *
                 * {@internal Since 2.5.2 the class has been renamed from TGM_Bulk_Installer_Skin to
                 *            TGMPA_Bulk_Installer_Skin.
                 *            This was done to prevent backward compatibility issues with v2.3.6.}}
                 *
                 * @see https://core.trac.wordpress.org/browser/trunk/src/wp-admin/includes/class-wp-upgrader-skins.php
                 *
                 * @package TGM-Plugin-Activation
                 * @author  Thomas Griffin
                 * @author  Gary Jones
                 */
                class TGMPA_Bulk_Installer_Skin extends Bulk_Upgrader_Skin {
                    /**
                     * Holds plugin info for each individual plugin installation.
                     *
                     * @since 2.2.0
                     *
                     * @var array
                     */
                    public $plugin_info = array();

                    /**
                     * Holds names of plugins that are undergoing bulk installations.
                     *
                     * @since 2.2.0
                     *
                     * @var array
                     */
                    public $plugin_names = array();

                    /**
                     * Integer to use for iteration through each plugin installation.
                     *
                     * @since 2.2.0
                     *
                     * @var integer
                     */
                    public $i = 0;

                    /**
                     * TGMPA instance
                     *
                     * @since 2.5.0
                     *
                     * @var object
                     */
                    protected $tgmpa;

                    /**
                     * Constructor. Parses default args with new ones and extracts them for use.
                     *
                     * @since 2.2.0
                     *
                     * @param array $args Arguments to pass for use within the class.
                     */
                    public function __construct( $args = array() ) {
                        // Get TGMPA class instance.
                        $this->tgmpa = call_user_func( array( get_class( $GLOBALS['tgmpa'] ), 'get_instance' ) );

                        // Parse default and new args.
                        $defaults = array(
                            'url'          => '',
                            'nonce'        => '',
                            'names'        => array(),
                            'install_type' => 'install',
                        );
                        $args     = wp_parse_args( $args, $defaults );

                        // Set plugin names to $this->plugin_names property.
                        $this->plugin_names = $args['names'];

                        // Extract the new args.
                        parent::__construct( $args );
                    }

                    /**
                     * Sets install skin strings for each individual plugin.
                     *
                     * Checks to see if the automatic activation flag is set and uses the
                     * the proper strings accordingly.
                     *
                     * @since 2.2.0
                     */
                    public function add_strings() {
                        if ( 'update' === $this->options['install_type'] ) {
                            parent::add_strings();
                            /* translators: 1: plugin name, 2: action number 3: total number of actions. */
                            $this->upgrader->strings['skin_before_update_header'] = __( 'Updating Plugin %1$s (%2$d/%3$d)', 'tgmpa' );
                        } else {
                            /* translators: 1: plugin name, 2: error message. */
                            $this->upgrader->strings['skin_update_failed_error'] = __( 'An error occurred while installing %1$s: <strong>%2$s</strong>.', 'tgmpa' );
                            /* translators: 1: plugin name. */
                            $this->upgrader->strings['skin_update_failed'] = __( 'The installation of %1$s failed.', 'tgmpa' );

                            if ( $this->tgmpa->is_automatic ) {
                                // Automatic activation strings.
                                $this->upgrader->strings['skin_upgrade_start'] = __( 'The installation and activation process is starting. This process may take a while on some hosts, so please be patient.', 'tgmpa' );
                                /* translators: 1: plugin name. */
                                $this->upgrader->strings['skin_update_successful'] = __( '%1$s installed and activated successfully.', 'tgmpa' );
                                $this->upgrader->strings['skin_upgrade_end']       = __( 'All installations and activations have been completed.', 'tgmpa' );
                                /* translators: 1: plugin name, 2: action number 3: total number of actions. */
                                $this->upgrader->strings['skin_before_update_header'] = __( 'Installing and Activating Plugin %1$s (%2$d/%3$d)', 'tgmpa' );
                            } else {
                                // Default installation strings.
                                $this->upgrader->strings['skin_upgrade_start'] = __( 'The installation process is starting. This process may take a while on some hosts, so please be patient.', 'tgmpa' );
                                /* translators: 1: plugin name. */
                                $this->upgrader->strings['skin_update_successful'] = __( '%1$s installed successfully.', 'tgmpa' );
                                $this->upgrader->strings['skin_upgrade_end']       = __( 'All installations have been completed.', 'tgmpa' );
                                /* translators: 1: plugin name, 2: action number 3: total number of actions. */
                                $this->upgrader->strings['skin_before_update_header'] = __( 'Installing Plugin %1$s (%2$d/%3$d)', 'tgmpa' );
                            }
                        }
                    }

                    /**
                     * Outputs the header strings and necessary JS before each plugin installation.
                     *
                     * @since 2.2.0
                     *
                     * @param string $title Unused in this implementation.
                     */
                    public function before( $title = '' ) {
                        if ( empty( $title ) ) {
                            $title = esc_html( $this->plugin_names[ $this->i ] );
                        }
                        parent::before( $title );
                    }

                    /**
                     * Outputs the footer strings and necessary JS after each plugin installation.
                     *
                     * Checks for any errors and outputs them if they exist, else output
                     * success strings.
                     *
                     * @since 2.2.0
                     *
                     * @param string $title Unused in this implementation.
                     */
                    public function after( $title = '' ) {
                        if ( empty( $title ) ) {
                            $title = esc_html( $this->plugin_names[ $this->i ] );
                        }
                        parent::after( $title );

                        $this->i++;
                    }

                    /**
                     * Outputs links after bulk plugin installation is complete.
                     *
                     * @since 2.2.0
                     */
                    public function bulk_footer() {
                        // Serve up the string to say installations (and possibly activations) are complete.
                        parent::bulk_footer();

                        // Flush plugins cache so we can make sure that the installed plugins list is always up to date.
                        wp_clean_plugins_cache();

                        $this->tgmpa->show_tgmpa_version();

                        // Display message based on if all plugins are now active or not.
                        $update_actions = array();

                        if ( $this->tgmpa->is_tgmpa_complete() ) {
                            // All plugins are active, so we display the complete string and hide the menu to protect users.
                            echo '<style type="text/css">#adminmenu .wp-submenu li.current { display: none !important; }</style>';
                            $update_actions['dashboard'] = sprintf(
                                esc_html( $this->tgmpa->strings['complete'] ),
                                '<a href="' . esc_url( self_admin_url() ) . '">' . esc_html__( 'Return to the Dashboard', 'tgmpa' ) . '</a>'
                            );
                        } else {
                            $update_actions['tgmpa_page'] = '<a href="' . esc_url( $this->tgmpa->get_tgmpa_url() ) . '" target="_parent">' . esc_html( $this->tgmpa->strings['return'] ) . '</a>';
                        }

                        /**
                         * Filter the list of action links available following bulk plugin installs/updates.
                         *
                         * @since 2.5.0
                         *
                         * @param array $update_actions Array of plugin action links.
                         * @param array $plugin_info    Array of information for the last-handled plugin.
                         */
                        $update_actions = apply_filters( 'tgmpa_update_bulk_plugins_complete_actions', $update_actions, $this->plugin_info );

                        if ( ! empty( $update_actions ) ) {
                            $this->feedback( implode( ' | ', (array) $update_actions ) );
                        }
                    }

                    /* *********** DEPRECATED METHODS *********** */

                    /**
                     * Flush header output buffer.
                     *
                     * @since      2.2.0
                     * @deprecated 2.5.0 use {@see Bulk_Upgrader_Skin::flush_output()} instead
                     * @see        Bulk_Upgrader_Skin::flush_output()
                     */
                    public function before_flush_output() {
                        _deprecated_function( __FUNCTION__, 'TGMPA 2.5.0', 'Bulk_Upgrader_Skin::flush_output()' );
                        $this->flush_output();
                    }

                    /**
                     * Flush footer output buffer and iterate $this->i to make sure the
                     * installation strings reference the correct plugin.
                     *
                     * @since      2.2.0
                     * @deprecated 2.5.0 use {@see Bulk_Upgrader_Skin::flush_output()} instead
                     * @see        Bulk_Upgrader_Skin::flush_output()
                     */
                    public function after_flush_output() {
                        _deprecated_function( __FUNCTION__, 'TGMPA 2.5.0', 'Bulk_Upgrader_Skin::flush_output()' );
                        $this->flush_output();
                        $this->i++;
                    }
                }
            }
        }
    }
}

if ( ! class_exists( 'TGMPA_Utils' ) ) {

    /**
     * Generic utilities for TGMPA.
     *
     * All methods are static, poor-dev name-spacing class wrapper.
     *
     * Class was called TGM_Utils in 2.5.0 but renamed TGMPA_Utils in 2.5.1 as this was conflicting with Soliloquy.
     *
     * @since 2.5.0
     *
     * @package TGM-Plugin-Activation
     * @author  Juliette Reinders Folmer
     */
    class TGMPA_Utils {
        /**
         * Whether the PHP filter extension is enabled.
         *
         * @see http://php.net/book.filter
         *
         * @since 2.5.0
         *
         * @static
         *
         * @var bool $has_filters True is the extension is enabled.
         */
        public static $has_filters;

        /**
         * Wrap an arbitrary string in <em> tags. Meant to be used in combination with array_map().
         *
         * @since 2.5.0
         *
         * @static
         *
         * @param string $string Text to be wrapped.
         * @return string
         */
        public static function wrap_in_em( $string ) {
            return '<em>' . wp_kses_post( $string ) . '</em>';
        }

        /**
         * Wrap an arbitrary string in <strong> tags. Meant to be used in combination with array_map().
         *
         * @since 2.5.0
         *
         * @static
         *
         * @param string $string Text to be wrapped.
         * @return string
         */
        public static function wrap_in_strong( $string ) {
            return '<strong>' . wp_kses_post( $string ) . '</strong>';
        }

        /**
         * Helper function: Validate a value as boolean
         *
         * @since 2.5.0
         *
         * @static
         *
         * @param mixed $value Arbitrary value.
         * @return bool
         */
        public static function validate_bool( $value ) {
            if ( ! isset( self::$has_filters ) ) {
                self::$has_filters = extension_loaded( 'filter' );
            }

            if ( self::$has_filters ) {
                return filter_var( $value, FILTER_VALIDATE_BOOLEAN );
            } else {
                return self::emulate_filter_bool( $value );
            }
        }

        /**
         * Helper function: Cast a value to bool
         *
         * @since 2.5.0
         *
         * @static
         *
         * @param mixed $value Value to cast.
         * @return bool
         */
        protected static function emulate_filter_bool( $value ) {
            // @codingStandardsIgnoreStart
            static $true  = array(
                '1',
                'true', 'True', 'TRUE',
                'y', 'Y',
                'yes', 'Yes', 'YES',
                'on', 'On', 'ON',
            );
            static $false = array(
                '0',
                'false', 'False', 'FALSE',
                'n', 'N',
                'no', 'No', 'NO',
                'off', 'Off', 'OFF',
            );
            // @codingStandardsIgnoreEnd

            if ( is_bool( $value ) ) {
                return $value;
            } elseif ( is_int( $value ) && ( 0 === $value || 1 === $value ) ) {
                return (bool) $value;
            } elseif ( ( is_float( $value ) && ! is_nan( $value ) ) && ( (float) 0 === $value || (float) 1 === $value ) ) {
                return (bool) $value;
            } elseif ( is_string( $value ) ) {
                $value = trim( $value );
                if ( in_array( $value, $true, true ) ) {
                    return true;
                } elseif ( in_array( $value, $false, true ) ) {
                    return false;
                } else {
                    return false;
                }
            }

            return false;
        }
    } // End of class TGMPA_Utils
} // End of class_exists wrapper