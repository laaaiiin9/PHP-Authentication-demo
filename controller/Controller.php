<?php

require_once BASE_PATH . '/utils/render.php';

class Controller
{
    protected function view($template, $data = [])
    {
        $views = BASE_PATH . '/views/';
        $viewTemplate = BASE_PATH . '/views/' . $template;

        $page = render($viewTemplate, $data);

        echo render($views . 'default.php', [
            'title'   => $data['title'] ?? '',
            'content' => $page
        ]);
    }
}
