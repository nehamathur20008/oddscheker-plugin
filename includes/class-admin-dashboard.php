<?php
class AdminDashboard {
    public function __construct() {
        add_action( 'admin_menu', array( $this, 'add_admin_menu' ) );
        add_action( 'admin_init', array( $this, 'initialize_settings' ) );
    }

    public function add_admin_menu() {
        add_menu_page(
            'Odds Comparison Settings',
            'Odds Comparison',
            'manage_options',
            'odds-comparison-settings',
            array( $this, 'settings_page' ),
            'dashicons-chart-bar',
            100
        );
    }

    public function initialize_settings() {
        register_setting( 'odds-comparison-settings-group', 'odds_comparison_bookmakers' );
        register_setting( 'odds-comparison-settings-group', 'odds_comparison_markets' );
    }

    public function settings_page() {
        ?>
        <div class="wrap">
            <h1>Odds Comparison Settings</h1>
            <form method="post" action="options.php">
                <?php
                settings_fields( 'odds-comparison-settings-group' );
                do_settings_sections( 'odds-comparison-settings-group' );
                ?>
                <h3>Select Bookmakers</h3>
                <input type="checkbox" name="odds_comparison_bookmakers[]" value="oddschecker"> OddsChecker
                <input type="checkbox" name="odds_comparison_bookmakers[]" value="betfair"> Betfair
                <!-- Add more checkboxes for bookmakers -->
                <h3>Select Markets</h3>
                <!-- Dropdown for market types -->
                <input type="submit" value="Save Changes" class="button-primary">
            </form>
        </div>
        <?php
    }
}
?>
