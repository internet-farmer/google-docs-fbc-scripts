<?php

class Helpers {

    static function scrubber($txt) {
        return str_replace('"', '', $txt);
    }
}