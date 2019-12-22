Vue.component('header-comp', {
  template: `<div>
<header>
    <div class="container flex">
      <div class="left">
        <a class="logo flex" href="index.html">
          <img src="img/index/logo.png" alt="Brand logo">
          BRAN<span>D</span>
        </a>
        <form id="form" action="#" class="flex">
          <span>Browse</span>
          <i class="fas fa-sort-down"></i>
          <label>
            <input type="text" placeholder="Search for item...">
          </label>
          <button>
            <i class="fas fa-search"></i>
          </button>
          <div id="browse-menu" class="submenu">
            <div class="sublist">
              <span>Women</span>
              <ul>
                <li><a href="pages/single-page.html">Dresses</a></li>
                <li><a href="pages/single-page.html">Tops</a></li>
                <li><a href="pages/single-page.html">Sweaters/Knits</a></li>
                <li><a href="pages/single-page.html">Jackets/Coats</a></li>
                <li><a href="pages/single-page.html">Blazers</a></li>
                <li><a href="pages/single-page.html">Denim</a></li>
                <li><a href="pages/single-page.html">Leggings/Pants</a></li>
                <li><a href="pages/single-page.html">Skirts/Shorts</a></li>
                <li><a href="pages/single-page.html">Accessories </a></li>
              </ul>
            </div>
          </div>
        </form>
      </div>
      <div id="header-right" class="right">
        <img id="cart" src="img/index/cart.svg" alt="cart">
        <a href="#">My Account
          <i class="fas fa-sort-down"></i>
        </a>
        <div id="cart-inside" class="cart">
          <div class="items align flex">
            <div class="item flex align pointer">
              <img src="img/index/cart-1.png" alt="item-1">
              <div class="info">
                <span>Rebox Zane</span>
                <div class="rating">
                  <span>🟊</span><span>🟊</span><span>🟊</span><span>🟊</span><span>	</span>
                </div>
                <label>1 x $250</label>
              </div>
              <i class="fas fa-times-circle"></i>
            </div>
            <div class="item flex align pointer">
              <img src="img/index/cart-2.png" alt="item-1">
              <div class="info">
                <span>Rebox Zane</span>
                <div class="rating">
                  <span>🟊</span><span>🟊</span><span>🟊</span><span>🟊</span><span>✰</span>
                </div>
                <label>1 x $250</label>
              </div>
              <i class="fas fa-times-circle"></i>
            </div>
          </div>
          <div class="checkout flex align">
            <div class="counter flex ">
              <div class="total">TOTAL</div>
              <div class="price">$500.00</div>
            </div>
            <button class="pointer" onclick="window.location.href='pages/checkout.html'">CHECKOUT</button>
            <a href="pages/shopping-cart.html">GO TO CART</a>
          </div>
        </div>
      </div>
    </div>
</header>
  <nav>
    <div class="container">
      <ul class="menu">
        <li><a class="active" href="#">home</a></li>
        <li><a href="#">man</a></li>
        <li> <a href="#">women</a></li>
        <li><a href="#">kids</a></li>
        <li><a href="#">accessories</a></li>
        <li><a href="#">featured</a></li>
        <li><a href="#">hot deals</a></li>
      </ul>
    </div>
  </nav>
</div>`
});
