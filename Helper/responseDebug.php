<?php

if (!function_exists('dd')) {
    function dd()
    {
        echo "<pre>";
        foreach (func_get_args() as $x) {
            print_r($x);
        }
        echo "</pre>";
        die;
    }
}
