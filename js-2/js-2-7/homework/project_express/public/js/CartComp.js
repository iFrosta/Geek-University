Vue.component('cart', {
  data() {
    return {
      cartUrl: '/getBasket.json',
      cartItems: [],
      cartCatalog: 'https://cdn3.iconfinder.com/data/icons/project-management-32/48/24-512.png',
      showCart: false,
    }
  },
  methods: {
    add(product) {
      let find = this.cartItems.find(el => el.id_product === product.id_product);
      if (find) {
        this.$parent.putJson(`/api/cart/${find.id_product}`, {quantity: 1})
          .then(data => {
            if (data.result === 1) {
              find.quantity++;
            }
          })
      } else {
        let cartProduct = Object.assign({quantity: 1}, product);
        this.$parent.putJson(`/api/cart/`, cartProduct)
          .then(data => {
            if (data.result === 1) {
              this.cartItems.push(cartProduct);
            }
          })
      }
    },
    remove(product) {
      this.$parent.getJson(`${API}/deleteFromBasket.json`)
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
    summary() {
      let sum = 0;
      this.cartItems.forEach(item => {
        sum += item.quantity * item.price;
      });
      return '$' + sum;
    }
  },
  mounted() {
    this.$parent.getJson(`/api/cart/`)
      .then(data => {
        for (let el of data.contents) {
          this.cartItems.push(el);
        }
      });
  },
  template: `
<div>
  <button @click="showCart = !showCart" class="btn-cart" type="button">Cart</button>
  <div v-show="showCart" class="cart-block">
    <div v-if="!cartItems.length" class="empty">Your Cart is empty! 🦊</div>
    <cart-item 
    class="cart-item"
    v-for="item of cartItems" 
    :key="item.id_product" 
    :cart-item="item" 
    @remove="remove">
    </cart-item>
    <div class="line"></div>
    <div v-if="cartItems.length" class="summary">SUBTOTAL: <strong>{{summary()}}</strong></div>
  </div>
</div>`
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
                  <button @click="$emit('remove', cartItem)" class="del-btn">&times;</button>
                </div>
              </div>
            </div>`
});