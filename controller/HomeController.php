<?php

require_once 'Controller.php';

class HomeController extends Controller
{

    public function index()
    {
        $data = [
            'title' => 'Home',
            'test' => 'Testing'
        ];

        $this->view('home.php', $data);
    }

    public function article($id)
    {
        $articleIds = [1, 2, 3, 4, 5];

        if (in_array($id, $articleIds)) {

            $this->view('article.php', [
                'title' => 'Articles',
                'test' => 'ewew'
            ]);
        } else {
            http_response_code(404);
            echo 'Page could not be found';
            die;
        }
    }
}
