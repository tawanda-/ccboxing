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

        session_start();
        
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
                include(__DIR__)."/models/StaffDao.php";
                $staffdao = new StaffDao();
                $staffdao->get_all_staff();
                $staff = $staffdao->result;
                require(__DIR__."/views/about.php");
                break;
            case "contact":
                require(__DIR__."/views/contact.php");
                break;
            case "login":
                require(__DIR__."/views/login.php");
                break;
            case "logout":
                
                $_SESSION = array();
                session_destroy();
                header("Location: https://ccboxing.esikolweni.co.za/login");
                break;
            case "register":
                require(__DIR__."/views/signup.php");
                break;
            case "cart":
                $cart = array();
                $total = 0;
                if(!empty($_SESSION['cart'])){
                    $cart = $_SESSION['cart'];
                    $total = $_SESSION['total_cost'];
                }
                require(__DIR__."/views/shopping_cart.php");
                break;
            case "":
            case "app":
            case "home":
                require(__DIR__."/views/home.php");
                break;
            default:
                break;
        }

        exit;
    }

    function process_post_request($uri){

        switch($uri){
            case "login":
                include(__DIR__)."/models/CustomerDao.php";
                $customerdao = new CustomerDao();
                $customerdao->customer_login($_POST);
                $customer = $customerdao->result;
                $error_message = $customerdao->error_message;
                if(isset($error_message)){
                    require(__DIR__."/views/login.php");
                }else{
                    //start session
                    // Password is correct, so start a new session
                    session_start();
                            
                    // Store data in session variables
                    $_SESSION["loggedin"] = true;
                    $_SESSION["id"] = $customer["customer_id"];
                    $_SESSION["username"] = $customer["customer_username"];
                    $_SESSION["name"] = $customer["customer_name"]." ".$customer["customer_surname"];
                    
                    // Redirect user to welcome page
                    header("Location: https://ccboxing.esikolweni.co.za/shop");
                }
            break;
            case "register":
                include(__DIR__)."/models/CustomerDao.php";
                $customerdao = new CustomerDao();
                $customerdao->create_customer($_POST);
                $customer = $customerdao->result;
                $error_message = $customerdao->error_message;
                if(isset($error_message)){
                    require(__DIR__."/views/signup.php");
                }else{
                    header("Location: https://ccboxing.esikolweni.co.za/login");
                }
            break;
            case "contact":
                echo "contact";
            break;
            case "cart":
                session_start();

                switch($_POST["action"]){

                    case "add":
                        include(__DIR__)."/models/ProductDao.php";
                        $productdao = new ProductDAO();
                        $productdao->get_product($_POST['productid']);
                        $product_r = $productdao->result;
                        $item_total_price;
                        if(isset($product_r) === true){
                            if(0 < $_POST['quantity'] && $_POST['quantity'] < $product_r["stock_available"]){
                                $product = array("product_id" => $product_r["product_id"], 
                                                    "product_name" => $product_r["product_name"], 
                                                    "product_description" => $product_r["product_description"], 
                                                    "product_price" => $product_r["product_price"],
                                                    "product_image" => $product_r["product_image"], 
                                                    "quantity" => $_POST['quantity']);
                                
                                $my_fake_id = "prod".$product_r["product_id"];
                                $cart_item = array($my_fake_id => $product);
                                $item_total_price = $_POST['quantity']*$product_r["product_price"];

                                if(!empty($_SESSION["cart"])) {
                                    if(in_array($my_fake_id,array_keys($_SESSION["cart"]))) {
                                        foreach($_SESSION["cart"] as $k => $v) {
                                            if($my_fake_id === $k){
                                                $_SESSION["cart"][$k]["quantity"] += $_POST["quantity"]; 
                                                $_SESSION['total_cost'] += $item_total_price;
                                                header("Location: https://ccboxing.esikolweni.co.za/cart");      
                                            }
                                        }
                                    }else{
                                        $_SESSION["cart"] = array_merge($_SESSION["cart"], $cart_item);
                                        $_SESSION['total_cost'] += $item_total_price;
                                        header("Location: https://ccboxing.esikolweni.co.za/cart");
                                    }
                                }else{
                                    $_SESSION['cart'] = $cart_item;
                                    $_SESSION['total_cost'] = $item_total_price;
                                    header("Location: https://ccboxing.esikolweni.co.za/cart");
                                }
                            }
                        }
                                                
                    break;

                    case "delete":
                    break;

                    case "update":
                    break;

                }

                /*
                include(__DIR__)."/models/ProductDao.php";
                $productdao = new ProductDAO();
                $productdao->get_product($params['productid']);
                $product = $productdao->result;
                $product_id = $product['product_id'];
                $productdao->get_product_by_category($product['category_id']);
                $products = $productdao->result;




                if(!empty($_SESSION["cart_item"])) {}
                    */
            break;
            case "":
            case "home":
            default:
                echo "";
                header('HTTP/1.0 404 Not Found');
            break;
        }

        exit;
    }
?>