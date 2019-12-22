import cart from './CartComp.js'

const headerComp = {
  data() {
    return {
      search: '',
      showSub: false,
    }
  },
  components: {
    cart
  },
  template: `<div class="container flex">
      <div class="left">
        <a class="logo flex" href="index.html">
          <img src="img/index/logo.png" alt="Brand logo">
          BRAN<span>D</span>
        </a>
        <form @submit.prevent="$parent.$refs.products.filter(search)" v-on:keydown="$parent.$refs.products.filter(search)" action="#" class="flex">
          <span @click="showSub = !showSub">Browse</span>
          <i class="fas fa-sort-down"></i>
          <label>
            <input v-model="search" type="text" placeholder="Search for item...">
          </label>
          <button type="submit">
            <i class="fas fa-search"></i>
          </button>
          <div v-show="showSub" id="browse-menu" class="submenu">
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
};

export default headerComp