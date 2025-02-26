<?php
class GutenbergBlock {
    public function __construct() {
        add_action( 'init', array( $this, 'register_block' ) );
    }

    public function register_block() {
        register_block_type( 'odds-comparison/block', array(
            'editor_script' => 'odds-comparison-editor',
            'render_callback' => array( $this, 'render_block' )
        ) );
    }

    public function render_block( $attributes ) {
        $bookmakers = isset( $attributes['bookmakers'] ) ? $attributes['bookmakers'] : [];
        $output = '<div class="odds-comparison-block">';
        
        foreach ( $bookmakers as $bookmaker ) {
            // Fetch and display odds for each bookmaker
            $odds = OddsFetcher::fetch_odds( $bookmaker );
            $output .= '<div class="bookmaker-odds">' . esc_html( $odds ) . '</div>';
        }

        $output .= '</div>';
        return $output;
    }
}
?>