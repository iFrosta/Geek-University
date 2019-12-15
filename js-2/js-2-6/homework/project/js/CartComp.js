Vue.component('cart', {
  props: ['cartItems', 'img', 'visibility'],
  template: `<div v-show="visibility" class="cart-block">
              <div v-if="!cartItems.length" class="empty">Your Cart is empty! 🦊</div>
              <cart-item v-for="item of cartItems" :key="item.id_product" :cart-item="item" class="cart-item"></cart-item>
            </div>`
});
Vue.component('cart-item', {
  props: ['cartItem', 'img'],
  template: `<div class="cart-item">
                <div class="product-bio">
                  <img :src="cartItem.img" alt="img">
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