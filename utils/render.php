<?php

function render($template, $data = []) {
    extract($data);
    ob_start();
    if (!file_exists($template)) {
        http_response_code(404);
        echo 'The view ' . $template . ' does not exist in the project.';
        die;
    }
    require $template;
    return ob_get_clean();
}