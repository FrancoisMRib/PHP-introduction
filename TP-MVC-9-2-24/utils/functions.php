<?php

class Functions {
    public static function sanitize(string $data): string {
        return htmlentities(strip_tags(stripslashes(trim($data))));
    }
}

?>