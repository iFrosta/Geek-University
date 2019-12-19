Vue.component('products', {
  data() {
    return {
      catalogUrl: '/catalogData.json',
      products: [],
      filtered: [],
      imgCatalog: 'https://cdn3.iconfinder.com/data/icons/project-management-32/48/24-512.png',
    }
  },
  mounted() {
    this.$parent.getJson(`${API + this.catalogUrl}`)
      .then(data => {
        for (let el of data) {
          this.products.push(el);
          this.filtered.push(el);
        }
      });
    this.$parent.getJson(`getProducts.json`)
      .then(data => {
        for (let el of data) {
          this.products.push(el);
          this.filtered.push(el);
        }
      });
  },
  methods: {
    filter(string) {
      let regexp = new RegExp(string, 'i');
      this.filtered = this.products.filter(el => regexp.test(el.product_name));
    }
  },
  template: `<div class="products">
              <div v-if="!products.length" class="">No products :(</div>
              <product v-for="item of filtered" :key="item.id_product"  :product="item"></product>
            </div>`
});
Vue.component('product', {
  props: ['product', 'img'],
  template: `<div class="product-item">
              <div class="product-info">
                <h3>{{product.product_name}}</h3>
                <p>$ {{product.price}}</p>
                <button class="buy-btn" @click="$root.$refs.cart.add(product)">Buy</button>
              </div>
              <img :src="product.img ? product.img : 'https://cdn3.iconfinder.com/data/icons/project-management-32/48/24-512.png'" alt="product-img">
            </div>`
});