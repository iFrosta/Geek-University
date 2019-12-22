Vue.component('header-comp', {
  data() {
    return {
      search: '',
    }
  },
  template: `<div class="container flex">
      <div class="left">
        <a class="logo flex" href="index.html">
          <img src="img/index/logo.png" alt="Brand logo">
          BRAN<span>D</span>
        </a>
        <form @submit.prevent="$parent.$refs.products.filter(search)" v-on:keydown="$parent.$refs.products.filter(search)" action="#" class="flex">
          <span>Browse</span>
          <i class="fas fa-sort-down"></i>
          <label>
            <input v-model="search" type="text" placeholder="Search for item...">
          </label>
          <button type="submit">
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
      <cart ref="cart"></cart>
    </div>`
});
Vue.component('nav-comp', {
  template: `<nav>
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
  </nav>`
});