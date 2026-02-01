<?php

require_once 'Controller.php';

class LoginController extends Controller
{

    public function index(): void
    {
        $views = BASE_PATH . '/views/';

        $data = [
            'title' => 'Login',
            'test' => 'Testing'
        ];

        $this->view('login.php', $data);
    }

    public function authenticate()
    {
        session_start();

        $error = null;
        $success = null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $uEmail = "allain@gmail.com";
            $uPass = "123abc";

            if ($_POST['email'] == $uEmail && $_POST['password'] == $uPass) {
                //$success = "Login success!";
                $_SESSION['user_id'] = 1;
                header("Location: /");
                exit;
            } else {
                $error = "Error logging in!";
                $_SESSION['error'] = $error;
                header("Location: /login");
                exit;
            }
        }
    }

    public function logout():void {
        session_destroy();
        header('Location: /');
    }
}
