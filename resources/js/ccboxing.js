/*jslint browser: true*/
/*global $, jQuery, alert*/

var cart = new Array();
var totalprice = 0;
var loggedin = 0; //localStorage.getItem("loggedin");
var username = ""; //localStorage.getItem("username");

function getCart(){

    var saved = localStorage.getItem("cart");

    if(typeof saved !== 'undefined'){
        return saved;
    }

    return new Array();
}

$(document).ready(function () {

    "use strict";

    var slideshow = (function () {
        var counter = 0,
            i,
            j,
            slides =  $("#carousel .carousel-img"),
            slidesLen = slides.length - 1;
        for (i = 0, j = 9999; i < slides.length; i += 1, j -= 1) {
            $(slides[i]).css("z-index", j);
        }
        return {
            startSlideshow: function () {
                window.setInterval(function () {
                    if (counter === 0) {
                        slides.eq(counter).fadeOut();
                        counter += 1;
                    } else if (counter === slidesLen) {
                        counter = 0;
                        slides.eq(counter).fadeIn(function () {
                            slides.fadeIn();
                        });
                    } else {
                        slides.eq(counter).fadeOut();
                        counter += 1;
                    }
                }, 3000);
            }
        };
    }());
    slideshow.startSlideshow();

    $("#products li").click(function (e) {

        var $product = $(this);
        var product = new Array();
        product["product_id"] = $product.attr('id');
        product["product_price"] = $product.find('#product_price').text();
        product["product_description"] = $product.find('#product_description').text();

        cart.push(product);
        localStorage.setItem("cart", cart);

        window.alert("Added to Cart");
    });

    $("#larue_account").click(function (e) {
        $("#dropdown").empty();

        loggedin = localStorage.getItem("loggedin");
        username = localStorage.getItem("username");

        if(typeof loggedin !== 'undefined'){
            loggedin = 0;
        }
        if(typeof username !== 'undefined'){
            username = "";
        }
        console.log(loggedin);
        if( loggedin == 0 ) { //not logged in
            $("#dropdown").append('<a href="register">Register</a> <a href="login">Login</a>');
            $("#dropdown").toggle();
        }else if( loggedin == 1 && username != "") { //logged in
            $("#dropdown").append('<ul><li>Logged in: '+username+'</li><li> <button onclick="logout()" type="button">Logout</button></li></ul>');
            $("#dropdown").toggle();
        }
    });

    $("#larue_cart").click(function (e) {
        $("#dropdown").empty();
        if(cart.length == 0){
            $("#dropdown").append('No Products');
            $("#dropdown").toggle();
        }else{
        var total = 0;
        var table = '<table><tr><th style="color=#A43136;">Qnty</th><th style="color=#A43136;">Description</th><th style="color=#A43136;">Price</th><th></th></tr>';

        for(var i = 0; i < cart.length; i++){
        total = total + parseFloat(cart[i]["product_price"].substring(1));
        table = table + '<tr><td></td><td>'+cart[i]["product_description"]+'</td><td>'+cart[i]["product_price"]+'</td><td><button id="remove" type="button">Remove</button></td></tr>';
        }
        table = table + '<tr><td></td><td>Total</td><td>R'+total+'</td><td></td></tr>';
        table = table + '<tr><td></td><td><button onclick="checkout()" type="button">Checkout</button></td><td></td><td><button id="clear" type="button">clear</button></td></tr></table>';
        console.log( table );
        $("#dropdown").append(table);
        $("#dropdown").toggle();
        }
    });
    $("#clear").click(function (e) {

    });
    $("#remove").click(function (e) {

    });
    $("#next").click(function (e) {
        window.alert('larue_carousel_next clicked');
    });
    $("#fb").click(function (e) {
        window.location = "http://www.facebook.com";
    });
    $("#twitter").click(function (e) {
        window.location = "http://www.facebook.com";
    });
    $("#newsletter").click(function (e) {
        window.location = "contact";
    });
    $("#types").submit(function (event) {

        event.preventDefault();

        var $form = $(this);

        var posting = $.post( "filter", $( "#types" ).serialize() );

        posting.done(function( data ) {
            window.alert (data);
            //$("#types")[0].reset();
        });
    });
    $("#price").submit(function (event) {

        event.preventDefault();

        var $form = $(this);

        var posting = $.post( "filter", $( "#price" ).serialize() );

        posting.done(function( data ) {
            window.alert (data);
            //$("#types")[0].reset();
        });
    });
    $("#category").click(function (event) {

        event.preventDefault();

        var posting = $.post( "filter", {category: $(this).attr('href')} );

        posting.done(function( data ) {
            window.alert (data);
        });
    });
    $("#contact_us").submit(function (event) {

        event.preventDefault();

        var $form = $(this),
            name = $form.find("input[name='username']").val(),
            email = $form.find("input[name='usermail']").val(),
            message = $form.find("input[name='usermessage']").val();

        if(name.length == 0){
            window.alert(name);
        }else if(email.length == 0){
            window.alert(email);
        }else{
            var posting = $.post( "contact", $( "#contact_us" ).serialize() );

            posting.done(function( data ) {
                window.alert ("Thank you for your feedback.");
                $("#contact_us")[0].reset();
            });
        }
    });
    $("#register").submit(function (event) {

        event.preventDefault();

        var $form = $(this),
            name = $form.find("input[name='username']").val(),
            email = $form.find("input[name='usermail']").val(),
            phone = $form.find("input[name='userphone']").val(),
            password = $form.find("input[name='userpassword']").val(),
            password2 = $form.find("input[name='userpassword2']").val();

        if(password.length == 0){
            window.alert("Please enter password");
        }else if(password != password2){
            window.alert("Passwords do not match. Please Re-enter password.");
        }else{
            if(name.length == 0){
                window.alert("Please enter name");
            }else if(email.length == 0){
                window.alert("Please enter email");
            }else{
                if(name.length != 0 && email.length != 0){
                    var posting = $.post( "register", $form.serialize() );
                    posting.done(function( data ) {
                        window.alert (data);
                        console.log(data);
                        $("#register")[0].reset();
                    });
                }
            }
        }
    });
    $("#login").submit(function (event) {
        event.preventDefault();

        var $form = $(this),
            email = $form.find("input[name='usermail']").val(),
            password = $form.find("input[name='userpassword']").val();

        if(password.length == 0){
            window.alert("Please enter password");
        }else if(email.length == 0){
            window.alert("Please enter email");
        }else{
            if(email.length != 0 && password.length != 0){
                    var posting = $.post( "login", $form.serialize() );
                    posting.done(function( data ) {
                        if(data != "not allowed"){
                            username = data;
                            loggedin = 1;
                            localStorage.setItem("username", username);
                            localStorage.setItem("loggedin", loggedin);
                            $("#login")[0].reset();
                            window.location = "http://larue.esikolweni.co.za/shop";
                        }else{
                            $("#login")[0].reset();
                            window.alert("Oops something went wrong, please try again.");
                        }
                    });
            }
        }
    });
});

function logout(){
    username = "";
    loggedin = 0;
    localStorage.setItem("username", username);
    localStorage.setItem("loggedin", loggedin);
    window.location.href=window.location.href;
}

function checkout(){

        loggedin = localStorage.getItem("loggedin");
        username = localStorage.getItem("username");

        if(typeof loggedin !== 'undefined'){
            loggedin = 0;
            window.location = "http://localhost/larue/larue/login";

        }
        if(typeof username !== 'undefined'){
            username = "";
            window.location = "http://localhost/larue/larue/login";
        }
        if(loggedin == 0 || username == ""){
            window.alert("Please login to complete this transaction.")
        }else if(typeof cart !== 'undefined' || cart.length == 0){
            window.alert("Please add products to cart.");
        }else{
            var posting = $.post( "shop", cart.serializeArray() );
            posting.done(function( data ) {
              window.alert("Your transaction was succesfully completed.");
            });
        }
}
