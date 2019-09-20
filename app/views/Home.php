<?php require_once("../app/config/settings.php");  ?>
<html>
    <head>
        <title>
            <?php echo website_name; ?>
        </title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link type="text/css"  href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="https://ccboxing.esikolweni.co.za/resources/css/ccboxing.css" >
        <script src="resources/js/jquery-3.2.1.min.js"></script>
        <script src="resources/js/ccboxing.js"></script>
    </head>
    <body>
        <div class="header">
            <div class="page_center">
                <div class="left">
                    <?php website_name; ?>
                </div>
                <div class="middle">
                    <ul class="header_nav">
                        <li><a class="active" href="home" target="_self">Home</a></li>
                        <li><a href="shop" target="_self">Shop</a></li>
                        <li><a href="blog" target="_self">Blog</a></li>
                    </ul>
                    <ul class="header_icons">
                        <li><a id="larue_cart"><i class="material-icons">shopping_cart</i></a></li>
                        <li><a id="larue_account"><i class="material-icons">account_circle</i></a></li>
                        <div id="dropdown" class="dropdown-content"></div>
                    </ul>                    
                </div>
                <div class="right">
                    <div>
                        <i class="material-icons">search</i>
                        <form>
                            <input type="text">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="content">
                <div class="carousel">
                    <div id="carousel" class="carousel-items">
                        <img class="carousel-img" src="resources/images/carousel13.jpg" />
                        <img class="carousel-img" src="resources/images/carousel15.jpg" />
                        <img class="carousel-img" src="resources/images/carousel16.jpg" />
                        <img class="carousel-img" src="resources/images/carousel17.jpg" />
                        <img class="carousel-img" src="resources/images/carousel18.jpg" />
                    </div>
                    <!--a id="prev" class="prev">&#10094;</a>
                    <a id="next" class="next">&#10095;</a-->
                </div>
                <div class="page_center">
                <div class="home">
                    <div class="row">
                        <div class="column3">
                            <a href="blog" target="_self">
                                <img src="resources/images/home_blog.jpg" />
                                <h2>Our Blog</h2>
                            </a>
                        </div>
                        <div class="column3"><a><img src="resources/images/blog_image.jpg" /></a></div>
                        <div class="column3">
                            <a href="about" target="_self">
                                <img src="resources/images/home_about.jpg" />
                                <h2>About Us</h2>
                            </a>
                        </div>
                    </div>
                    <div class="row products">
                        <div class="column4">
                            <img class="special" src="resources/images/10_off.png" />
                            <ul>
                                <li><img src="resources/images/home_1_tn.jpg" /></li>
                                <li><a>Godiva: Dark Chocolate</a></li>
                            </ul>
                        </div>
                        <div class="column4">
                            <img class="special" src="resources/images/20_off.png" />
                            <ul>
                                <li><img src="resources/images/home8_tn.jpg" /></li>
                                <li><a>Prestat: Fine Chocolates</a></li>
                            </ul>
                        </div>
                        <div class="column4">
                            <img class="special" src="resources/images/7_off.png" />
                            <ul>
                                <li><img src="resources/images/home2_tn.jpg" /></li>
                                <li><a>Ferrero Rocher: Fine Hazelnut Chocolates</a></li>
                            </ul>
                        </div>
                        <div class="column4">
                            <img class="special" src="resources/images/10_off.png" />
                            <ul>
                                <li><img src="resources/images/melanie_tn.jpg" /></li>
                                <li><a>Melanie: Premium Chocolates</a></li>
                            </ul>  
                        </div>
                        <div class="column4">
                            <img class="special" src="resources/images/10_off.png" />
                            <ul>
                                <li><img src="resources/images/1_tn.jpg" /></li>
                                <li><a>Venchi: 56% Dark Chocolate</a></li>
                            </ul>  
                        </div>
                    </div>
                    <div class="bottom">
                        <div class="column3">
                            <h3>FREE SHIPPING ON ALL ORDERS</h3><br>
                            <p>
                                Get Free Shipping on all orders over R750 and free returns. Items that are dispatched from south africa will arrive in 5-8 days.
                            </p>
                        </div>
                        <div class="column3 description">
                            <h3>Quality Products</h3><br>
                            <p>
                                We only sell quality chocolates.
                            </p>
                        </div>
                        <div class="column3">
                            <h3>NO CUSTOMS OR DUTY FEES!</h3><br>
                            <p>
                                We pay these fees so you don’t have to! The total billed at checkout is the final amount you pay, inclusive of VAT, with no additional charges at the time of delivery!
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer">
            <div class="page_center">
                <div class="column">
                    &copy; <span class="title">LaRue</span> <span class="date"><?php echo date("Y"); ?></span>
                </div>
                <div class="column">
                    <ul>
                        <li><a href="about">About Us</a></li>
                    </ul>
                </div>
                <div class="column">
                    <ul>
                        <li><a href="contact">Contact Us</a></li>
                    </ul>
                </div>
                <div class="column">
                    <div class="social_media">
                        <ul>
                            <li><a title="follow us on facebook"><i class="fa fa-facebook-official" aria-hidden="true"></i></a></li>
                            <li><a title="follow us on twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                            <li><a title="subscribe to our newsletter"><i class="fa fa-envelope-o" aria-hidden="true"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>