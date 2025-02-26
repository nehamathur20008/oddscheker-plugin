<?php
class OddsFetcher {
    private $bookmakers = [
        'oddschecker' => 'https://api.oddschecker.com/odds',
        'betfair' => 'https://api.betfair.com/odds'
    ];
    
    public static function initialize() {
        // Example: Set up WP cron job for fetching odds at regular intervals.
        if ( ! wp_next_scheduled( 'fetch_odds_hook' ) ) {
            wp_schedule_event( time(), 'hourly', 'fetch_odds_hook' );
        }
    }

    public function fetch_odds( $bookmaker ) {
        if ( isset( $this->bookmakers[$bookmaker] ) ) {
            $url = $this->bookmakers[$bookmaker];
            $response = wp_remote_get( $url );
            
            if ( is_wp_error( $response ) ) {
                return false;
            }
            
            $data = wp_remote_retrieve_body( $response );
            return json_decode( $data );
        }
        return false;
    }
}
?>