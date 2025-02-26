<?php
/**
 * Plugin Name: WP Odds Comparison
 * Description: A plugin for comparing live odds from multiple bookmakers.
 * Version: 1.0
 * Author: Neha Mathur
 */

// Include required files
require_once plugin_dir_path( __FILE__ ) . 'includes/class-odds-fetcher.php';
require_once plugin_dir_path( __FILE__ ) . 'includes/class-odds-converter.php';
require_once plugin_dir_path( __FILE__ ) . 'includes/class-admin-dashboard.php';
require_once plugin_dir_path( __FILE__ ) . 'includes/class-gutenberg-block.php';
require_once plugin_dir_path( __FILE__ ) . 'includes/class-settings.php';

// Initialize the plugin
function wp_odds_comparison_init() {
    // Initialize admin dashboard
    new AdminDashboard();
    
    // Initialize Gutenberg Block
    new GutenbergBlock();
    
    // Fetch odds periodically, e.g., using wp_cron
    OddsFetcher::initialize();
}

add_action( 'plugins_loaded', 'wp_odds_comparison_init' );
?>