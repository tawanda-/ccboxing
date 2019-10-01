<?
    ini_set('display_startup_errors', 1);
    ini_set('display_errors', 1);
    error_reporting(-1);

    //$request_uri = explode('/', trim($_SERVER['REQUEST_URI'], '/'));

    $x = explode('?', trim($_SERVER['REQUEST_URI'], '/'));
    $request_uri = explode('/', $x[0]);

    switch($_SERVER['REQUEST_METHOD']){
        
        case "GET":
            if( count($request_uri) > 1 ) {
                process_get_request($request_uri[1]);
            }else{
                process_get_request($request_uri[0]);
            }
        break;
        
        case "POST":
            process_post_request($request_uri[0]);
        break;

        default:
        break;
    }

    function process_get_request($uri){
        
        switch($uri){
            case "shop":

                $url_components = parse_url($_SERVER['REQUEST_URI']);

                if(isset($url_components['query'])){
                    parse_str($url_components['query'], $params);
                }

                if(isset($params['productid'])){

                    include(__DIR__)."/models/ProductDao.php";
                    $productdao = new ProductDAO();
                    $productdao->get_product($params['productid']);
                    $product = $productdao->result;
                    $product_id = $product['product_id'];
                    $productdao->get_product_by_category($product['category_id']);
                    $products = $productdao->result;
                    require(__DIR__."/views/product.php");
                    
                }else if(isset($params['categoryid'])){
                    if($params['categoryid'] === '15'){
                        header("Location: https://ccboxing.esikolweni.co.za/shop");
                    }else{
                        include(__DIR__)."/models/ProductDao.php";
                        $productdao = new ProductDAO();
                        $productdao->get_product_by_category($params['categoryid']);
                        $products = $productdao->result;
                        require(__DIR__."/views/shop.php");
                    }
                }else{

                    include(__DIR__)."/models/ProductDao.php";
                    $productdao = new ProductDAO();
                    $productdao->get_all_products();
                    $products = $productdao->result;
                    require(__DIR__."/views/shop.php");
                }
                break;
            case "about":
                require(__DIR__."/views/about.php");
                break;
            case "contact":
                require(__DIR__."/views/contact.php");
                break;
            case "login":
                require(__DIR__."/views/login.php");
                break;
            case "register":
                require(__DIR__."/views/signup.php");
                break;
            case "":
            case "app":
            case "home":
                require(__DIR__."/views/home.php");
                break;
            default:
                break;
        }
    }

    function process_post_request($uri){

        switch($uri){
            case "subscribe":
                include("/views/shop.php");
            break;
            case "about":
                include("/views/about.php");
            break;
            case "contact":
                include("/views/about.php");
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