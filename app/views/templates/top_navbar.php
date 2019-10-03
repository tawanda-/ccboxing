<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
  <div class="container">
    <a class="navbar-brand" href="home"><?php echo website_name; ?></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
          <a class="nav-link" href="https://ccboxing.esikolweni.co.za/home">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="https://ccboxing.esikolweni.co.za/shop">Store</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="https://ccboxing.esikolweni.co.za/about">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="https://ccboxing.esikolweni.co.za/contact">Contact</a>
        </li>
        <?php if( isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true ): ?>
          <li class="nav-item">
            <a class="nav-link" href="https://ccboxing.esikolweni.co.za/login">Cart</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="material-icons">account_box</i>
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="#">Profile</a>
              <a class="dropdown-item" href="#">Shopping history</a>
              <a class="dropdown-item" href="https://ccboxing.esikolweni.co.za/logout">logout</a>
            </div>
        </li>
        <?php else: ?>
        <li class="nav-item">
            <a class="nav-link" href="https://ccboxing.esikolweni.co.za/login">Login</a>
          </li>
      <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>