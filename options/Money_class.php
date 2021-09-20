<?php
    namespace options;


    class Money{


        public static function convert($price, $carrent){
            $price = round($price, 2);

            $price = number_format($price, 2, '.', ' ');
            return $price.' '.$carrent;
        }
    }

?>