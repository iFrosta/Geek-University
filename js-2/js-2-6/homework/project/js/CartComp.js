Vue.component('cart', {
  props: ['cartItems', 'img', 'visibility'],
  template: `<div v-show="visibility" class="cart-block">
              <div v-if="!cartItems.length" class="empty">Your Cart is empty! 🦊</div>
              <cart-item v-for="item of cartItems" :key="item.id_product" :cart-item="item" class="cart-item"></cart-item>
              <div class="line"></div>
              <div v-if="cartItems.length" class="summary">SUBTOTAL: <strong>{{summary()}}</strong></div>
            </div>`,
  methods: {
    summary() {
      let sum = 0;
      this.cartItems.forEach(item => {
        sum += item.quantity * item.price;
      });
      return '$' + sum;
    }
  }
});
Vue.component('cart-item', {
  props: ['cartItem', 'img'],
  template: `<div class="cart-item">
                <div class="product-bio">
                  <img :src="cartItem.img ? cartItem.img : 'https://cdn3.iconfinder.com/data/icons/project-management-32/48/24-512.png'" alt="img">
                  <div class="product-desc">
                    <p class="product-title">{{cartItem.product_name}}</p>
                    <p class="product-quantity">Quantity: {{cartItem.quantity}}</p>
                    <p class="product-single-price">$ {{cartItem.price}} each</p>
                  </div>
                </div>
                <div class="right-block">
                  <p class="product-price">$ {{cartItem.quantity * cartItem.price}}</p>
                  <button @click="$parent.$emit('remove', cartItem)" class="del-btn">&times;</button>
                </div>
              </div>
            </div>`
});