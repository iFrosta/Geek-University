Vue.component('products', {
  data() {
    return {
      products: [],
      filtered: [],
    }
  },
  mounted() {
    this.$parent.getJson(`/api/products`)
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
  template: `<div class="items container flex">
              <h3>Featured Items</h3>
              <h4>Shop for items based on what we featured in this week</h4>
              <div class="grid flex align">
                <div v-if="!products.length" class="">No products :(</div>
                <product v-for="item of filtered" :key="item.id_product"  :product="item"></product>
              </div>
             </div>`
});
Vue.component('product', {
  props: ['product'],
  template: `<div class="box flex pointer">
              <div class="add flex align">
                <a class="add-to-cart flex align" @click="$root.$refs.header.$refs.cart.add(product)">
                  <img src="img/index/cart_white.png" alt="cart">
                  Add to Cart
                </a>
              </div>
              <img :src="product.img" alt="item-2">
              <span>{{product.product_name}}</span>
              <label>$ {{product.price}}</label>
            </div>`
});