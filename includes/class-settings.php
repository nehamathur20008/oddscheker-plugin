<?php
class Settings {

    // Constructor to initialize the settings
    public function __construct() {
        add_action( 'admin_init', array( $this, 'initialize_settings' ) );
    }

    // Register plugin settings
    public function initialize_settings() {
        // Registering options for bookmakers and markets
        register_setting( 'odds-comparison-settings-group', 'odds_comparison_bookmakers' );
        register_setting( 'odds-comparison-settings-group', 'odds_comparison_markets' );

        // Add settings sections if necessary
    }

    // Function to get the list of selected bookmakers from the settings
    public function get_selected_bookmakers() {
        $bookmakers = get_option( 'odds_comparison_bookmakers', [] );
        return $bookmakers;
    }

    // Function to get the selected markets from the settings
    public function get_selected_markets() {
        $markets = get_option( 'odds_comparison_markets', [] );
        return $markets;
    }
}
?>