<?php 
    require_once __DIR__ . '/../config/db.php';
    require_once __DIR__ . '/../app/controllers/JobController.php';

    // Determine which page to show
    $page = $_GET['page'] ?? 'home';

    // Function to load a view with header & footer
    function render($viewPath, $data = []) {
        extract($data);
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
            $controller = new JobController();
            $viewData = $controller->index(); // chỉ trả về dữ liệu, chưa in ra
            render(__DIR__ . '/../resources/views/job/job.php', $viewData);
            break;

        case 'auth':
            render(__DIR__ . '/../resources/views/login-signup/auth.php');
            break;

        case 'search':
            render(__DIR__ . '/../resources/views/search/search.php');
            break;

        /* case 'login':
            render(__DIR__ . '/../resources/views/login-signup/auth.php');
            break;

        case 'register':
            render(__DIR__ . '/../resources/views/login-signup/auth.php');
            break;
             */
        case 'job-single':
            $controller = new JobController();
            $viewData = $controller->getJobSpecific();
            render(__DIR__ . '/../resources/views/job/specific-job-display.php', $viewData);
            break;
        default:
            http_response_code(404);
            echo "<h1>404 - Page Not Found</h1>";
            break;
    }

    