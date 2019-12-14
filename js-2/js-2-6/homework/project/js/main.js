const API = 'https://raw.githubusercontent.com/GeekBrainsTutorial/online-store-api/master/responses';

const app = new Vue({
  el: '#app',
  data: {
    // Products
    catalogUrl: '/catalogData.json',
    products: [],
    imgCatalog: 'https://cdn3.iconfinder.com/data/icons/project-management-32/48/24-512.png',
    // Cart
    cartUrl: '/getBasket.json',
    cartItems: [],
    cartCatalog: 'https://cdn3.iconfinder.com/data/icons/project-management-32/48/24-512.png',
    showCart: false,
    // Search
    search: '',
    filtered: [],
  },
  methods: {
    getJson(url) {
      return fetch(url)
        .then(result => result.json())
        .catch(error => {
          console.log(error);
        })
    },
    add(product) {
      this.getJson(`${API}/addToBasket.json`)
        .then(data => {
          if (data.result === 1) {
            let find = this.cartItems.find(el => el.id_product === product.id_product);
            if (find) {
              find.quantity++;
            } else {
              let cartProduct = Object.assign({quantity: 1}, product);
              this.cartItems.push(cartProduct);
            }
          } else {
            console.log('error add to cart error');
          }
        })
    },
    remove(product) {
      this.getJson(`${API}/deleteFromBasket.json`)
        .then(data => {
          if (data.result === 1) {
            if (product.quantity > 1) {
              product.quantity--;
            } else {
              this.cartItems.splice(this.cartItems.indexOf(product), 1);
            }
          } else {
            console.log('error removing from Cart');
          }
        })
    },
    filter() {
      let regexp = new RegExp(this.search, 'i');
      this.filtered = this.products.filter(el => regexp.test(el.product_name));
    }
  },
  mounted() {
    this.getJson(`${API + this.catalogUrl}`)
      .then(data => {
        for (let el of data) {
          this.products.push(el);
          this.filtered.push(el);
        }
      });
    this.getJson(`getProducts.json`)
      .then(data => {
        for (let el of data) {
          this.products.push(el);
          this.filtered.push(el);
        }
      });
    this.getJson(`${API + this.cartUrl}`)
      .then(data => {
        for (let el of data.contents) {
          this.cartItems.push(el);
        }
      });
  }
});