<?php 
    require_once __DIR__ . '/../config/db.php';

    // Determine which page to show
    $page = $_GET['page'] ?? 'home';

    // Function to load a view with header & footer
    function render($viewPath) {
        include __DIR__ . '/../resources/views/layouts/header.php';
        include $viewPath;
        include __DIR__ . '/../resources/views/layouts/footer.php';
    }

    // Routing logic
    switch ($page) {
        case 'home':
            render(__DIR__ . '/../resources/views/home/home-content.php');
            break;

        case 'job':
            render(__DIR__ . '/../resources/views/job/job.php');
            break;

        case 'auth':
            render(__DIR__ . '/../resources/views/login-signup/auth.php');
            break;

        /* case 'login':
            render(__DIR__ . '/../resources/views/login-signup/auth.php');
            break;

        case 'register':
            render(__DIR__ . '/../resources/views/login-signup/auth.php');
            break;
             */
        default:
            http_response_code(404);
            echo "<h1>404 - Page Not Found</h1>";
            break;
    }

    


