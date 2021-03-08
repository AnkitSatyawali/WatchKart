<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="/">Watchkart</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link nav-linkn active" href="/products/all">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link nav-linkn active" href="/about" href="#">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link nav-linkn active" href="/contact" href="#">Contact</a>
        </li>        
      </ul>

      <ul class="d-flex prof">
        @if(!Auth::user())
        <li class="nav-item dropdown userli">
          <a class="nav-link navlinkn usericon" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <img class="userimg" src="/images/avatar.svg">
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="liclass" href="/login">Login</a></li>
            <hr>
            <li><a class="liclass" href="/register">Signup</a></li>
          </ul>
        </li>
        @endif

        @if(Auth::user())
        <li class="nav-item dropdown userli">
            <a class="nav-link nav-linkn usericon" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <img class="userimg" src="/images/avatar.svg">
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="liclass" href="/profile">Profile</a></li>
            <hr>
            <li><a class="liclass" href="/orderslist">Orders</a></li>
            <hr>
            <!-- <li><a class="liclass" href="#">Wishlist</a></li> -->
            <!-- <hr> -->
            <li><a class="liclass" href="/logout">Logout</a></li>
          </ul>
        </li>
        @endif
        @if(Auth::user())
        <li class="cart-special">
          <a class="nav-link" href="/userCart"><img class="cart-icon" src="/images/shopping-cart-solid.svg"></a>
        </li>
        @endif
      </ul>
    </div>
  </div>
</nav>