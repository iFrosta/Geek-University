Vue.component('products', {
  props: ['products', 'img'],
  template: `<div class="products">
              <div v-if="!products.length" class="">No products :(</div>
              <product v-for="item of products" :key="item.id_product" :img="img" :product="item"></product>
            </div>`
});
Vue.component('product', {
  props: ['product', 'img'],
  template: `<div class="product-item">
              <div class="product-info">
                <h3>{{product.product_name}}</h3>
                <p>$ {{product.price}}</p>
                <button class="buy-btn" @click="$parent.$emit('add', product)">Buy</button>
              </div>
              <img :src="product.img ? product.img : 'https://cdn3.iconfinder.com/data/icons/project-management-32/48/24-512.png'" alt="product-img">
            </div>`
});