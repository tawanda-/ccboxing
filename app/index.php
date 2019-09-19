<?

    ini_set('display_startup_errors', 1);
    ini_set('display_errors', 1);
    error_reporting(-1);

    require_once('config/settings.php');
    require_once('config/db.php');

    $request_uri = explode('?', substr($_SERVER['REQUEST_URI'], strlen('/app')), 2);

    switch($_SERVER['REQUEST_METHOD']){

        case "GET":
            process_get_request($request_uri);
        break;

        case "POST":
            process_post_request($request_uri);
        break;

        default:
        break;
    }

    function process_get_request($request){

        switch($request){
            case "shop":
                include(ROOT_DIR."/views/shop.php");
            break;
            case "about":
                include(ROOT_DIR."/views/about.php");
            break;
            case "contact":
                include(ROOT_DIR."/views/about.php");
            break;
            case "":
            case "home":
            default:
                include(ROOT_DIR."/views/home.php");
            break;
        }
    }

    function process_post_request($request){

        var_dump($request);

        switch($request){
            case "subscribe":
                include(ROOT_DIR."/views/shop.php");
            break;
            case "about":
                include(ROOT_DIR."/views/about.php");
            break;
            case "contact":
                include(ROOT_DIR."/views/about.php");
            break;
            case "":
            case "home":
            default:
                echo "";
                header('HTTP/1.0 404 Not Found');
            break;
        }

    }
?>