<?php
session_start();

$error = null;
$success = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $uEmail = "allain@gmail.com";
    $uPass = "123abc";

    if ($_POST['email'] == $uEmail && $_POST['password'] == $uPass) {
        //$success = "Login success!";
        $_SESSION['user_id'] = 1;
        header("Location: index.php");
    } else {
        $error = "Error logging in!";
    }
}

?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Authentication Demo - Login</title>

    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/style.css">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">

</head>

<body>

    <nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand ps-5" href="#">Auth Demo</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Auth Demo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end ms-auto pe-5">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="login.php">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Register</a>
                        </li>
                        <li class="nav-item">
                            <div class="dropdown">
                                <a class="dropdown-toggle nav-link" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Theme
                                </a>
                                <ul class="dropdown-menu dropdown-menu-lg-end">
                                    <li><button id="btnLightTheme" class="dropdown-item" type="button">Light</button></li>
                                    <li><button id="btnDarkTheme" class="dropdown-item" type="button">Dark</button></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <main class="container min-vh-100 d-flex flex-column justify-content-center align-items-center">
        <?php if ($success): ?>
        <div class="alert alert-success" role="alert">
            <?= htmlspecialchars($success) ?>
        </div>
        <?php endif; ?>
        <?php if ($error): ?>
        <div class="alert alert-danger" role="alert">
            <?= htmlspecialchars($error) ?>
        </div>
        <?php endif; ?>
        <div class="card">
            <div class="card-header">Login</div>
            <div class="card-body">
                <form action="login.php" method="POST">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </main>

    <footer>

    </footer>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <script>
        let theme = localStorage.getItem("theme") || "light";
        document.documentElement.setAttribute('data-bs-theme', theme);

        const btnLight = document.getElementById('btnLightTheme');
        const btnDark = document.getElementById('btnDarkTheme');

        btnLight.addEventListener('click', () => {
            // const currentTheme = document.documentElement.getAttribute('data-bs-theme');

            // const newTheme = currentTheme === 'dark' ? 'light' : 'dark';
            // document.documentElement.setAttribute('data-bs-theme', newTheme);
            const newTheme = theme === 'light' ? 'dark' : 'light';
            localStorage.setItem("theme", newTheme);
            theme = localStorage.getItem("theme");

            document.documentElement.setAttribute('data-bs-theme', theme);
        })

        btnDark.addEventListener('click', () => {
            // const currentTheme = document.documentElement.getAttribute('data-bs-theme');

            // const newTheme = currentTheme === 'dark' ? 'light' : 'dark';
            // document.documentElement.setAttribute('data-bs-theme', newTheme);
            const newTheme = theme === 'dark' ? 'light' : 'dark';
            localStorage.setItem("theme", newTheme);
            theme = localStorage.getItem("theme");

            document.documentElement.setAttribute('data-bs-theme', theme);
        })
    </script>

</body>

</html>