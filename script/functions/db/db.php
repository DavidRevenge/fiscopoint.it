<?php

require_once 'create.php';

spl_autoload_register(function ($class_name) {
    if (file_exists(__DIR__ . '/' . $class_name . '.php')) {
        require_once __DIR__ . '/' . $class_name . '.php';
    } else if (file_exists(__DIR__ . '/sql/' . $class_name . '.php')) {
        require_once __DIR__ . '/sql/' . $class_name . '.php';
    }
});

