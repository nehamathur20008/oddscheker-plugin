<?php
class OddsConverter {
   public function convert_to_decimal( $odds ) {
       // Conversion logic for fractional to decimal
       if ( strpos( $odds, '/' ) !== false ) {
           $parts = explode( '/', $odds );
           return 1 + ( $parts[0] / $parts[1] );
       }
       return $odds; // Return decimal if already in decimal format
   }

   public function convert_to_fractional( $odds ) {
       // Conversion logic for decimal to fractional
       if ( is_numeric( $odds ) && $odds > 1 ) {
           $fraction = $odds - 1;
           $denominator = 1;
           while ( $fraction != round( $fraction ) ) {
               $fraction *= 10;
               $denominator *= 10;
           }
           return round( $fraction ) . '/' . $denominator;
       }
       return $odds; // Return fractional if already in fractional format
   }
}
?>