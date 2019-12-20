const cartItem = {
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
};
const cart = {
  data() {
    return {
      cartItems: [],
      showCart: false,
    }
  },
  components: {
    'cart-item': cartItem
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
        this.$parent.postJson(`/api/cart/`, cartProduct)
          .then(data => {
            if (data.result === 1) {
              this.cartItems.push(cartProduct);
            }
          })
      }
    },
    remove(item) {
      if (item.quantity > 1) {
        this.$parent.putJson(`/api/cart/${item.id_product}`, {quantity: -1})
          .then(data => {
            if (data.result === 1) {
              item.quantity--;
            }
          })
      } else {
        this.$parent.deleteJson(`/api/cart/${item.id_product}`)
          .then(data => {
            if (data.result === 1) {
              this.cartItems.splice(this.cartItems.indexOf(item), 1);
            }
          })
      }
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
};

export default cart