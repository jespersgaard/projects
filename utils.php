<?php

function shortenString( $string, $length){
    if (strlen($string) > $length) {
        $pos = strpos($string, ' ', $length);
        $result = substr($string, 0, $pos) . "...";
    }
    else {
        $result = $string;
    }
    return $result;
}
?>
