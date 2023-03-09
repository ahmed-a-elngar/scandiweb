<?php

    function env($key, $default = '')
    {
        $env = parse_ini_file('.env');

        return $env[$key] ?? $default;
    }
?>