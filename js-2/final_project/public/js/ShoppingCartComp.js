const cartItem = {
  props: ['cartItem', 'img'],
  template: `<div class="item flex">
              <img class="img" :src="cartItem.img" alt="item-img">
              <div class="product details flex">
                <a href="#"><span>{{cartItem.product_name}}</span></a>
                <p><strong>Color:</strong>Red</p>
                <p><strong>Size:</strong>Xll</p>
              </div>
              <p class="Price flex align">$ {{cartItem.price}}</p>
              <label class="Quantity flex align"> 
                <input type="number" :id="cartItem.id_product" required pattern="[-+]?[0-9]" @change="$root.$refs.header.$refs.cart.change(cartItem);" :value="cartItem.quantity">
              </label>
              <p class="shipping flex align">FREE</p>
              <p class="Subtotal flex align">{{cartItem.quantity * cartItem.price}}</p>
            <div @click="$emit('remove', cartItem)" class="remover"><i class="fas fa-times-circle"></i> </div>
            </div>`
};
const shoppingCart = {
  data() {
    return {
      cartItems: [],
      showCart: false,
      coupon: '',
      componentKey: 0,
      all: 'all',
    }
  },
  components: {
    cartItem
  },
  methods: {
    add(product) {
      let find = this.cartItems.find(el => el.id_product === product.id_product);
      if (find) {
        this.$root.putJson(`/api/cart/${find.id_product}`, {quantity: 1})
          .then(data => {
            if (data.result === 1) {
              find.quantity++;
            }
          })
      } else {
        let cartProduct = Object.assign({quantity: 1}, product);
        this.$root.postJson(`/api/cart/`, cartProduct)
          .then(data => {
            if (data.result === 1) {
              this.cartItems.push(cartProduct);
            }
          })
      }
    },
    remove(item) {
      if (item.quantity > 1) {
        this.$root.putJson(`/api/cart/${item.id_product}`, {quantity: -1})
          .then(data => {
            if (data.result === 1) {
              item.quantity--;
            }
          })
      } else {
        this.$root.deleteJson(`/api/cart/${item.id_product}`)
          .then(data => {
            if (data.result === 1) {
              this.cartItems.splice(this.cartItems.indexOf(item), 1);
            }
          })
      }
    },
    countItems() {
      let count = 0;
      this.cartItems.forEach(item => {
        count += item.quantity;
      });
      return count;
    },
    summary() {
      let sum = 0;
      this.cartItems.forEach(item => {
        sum += item.quantity * item.price;
      });
      return '$' + sum;
    },
    checkCoupon(string) {
      let coupon = document.getElementById('coupon');
      if (string === 'FREE100') {
        coupon.style.border = '1px solid green'
      } else {
        coupon.style.border = '1px solid red'
      }
    },
    forceRerender() {
      this.componentKey += 1;
    }
  },
  mounted() {
    this.$root.getJson(`/api/cart/`)
      .then(data => {
        for (let el of data.contents) {
          this.cartItems.push(el);
        }
      });
  },
  template: `<div class="grid" :key="componentKey">
      <div class="top flex">
        <div class="titles">
          <ul>
            <li>Product Details</li>
            <li>unite Price</li>
            <li>Quantity</li>
            <li>shipping</li>
            <li>Subtotal</li>
            <li>ACTION</li>
          </ul>
        </div>
        <!--<div v-if="!cartItems.length" class="empty">Your Cart is empty!</div>-->
          <cart-item 
          class="cart-item"
          v-for="item of cartItems" 
          :key="item.id_product" 
          :cart-item="item" 
          @remove="remove">
          </cart-item>
        </div>
      <div class="bot flex">
        <button @click="$root.$refs.header.$refs.cart.remove()">CLEAR SHOPPING CART</button>
        <button>CONTINUE SHOPPING</button>
      </div>
        <div class="processed flex">
      <form class="address">
        <span>Shipping Address</span>
        <a href="#">
          <i class="fas fa-sort-down"></i>
        </a>
        <input type="text" id="city" name="city" placeholder="Bangladesh">
        <input type="text" id="state" name="state" placeholder="State">
        <input type="text" id="postcode" name="postcode" placeholder="Postcode / Zip">
        <input type="submit" value="get a quote">
      </form>
      <form @submit.prevent="checkCoupon(coupon)" class="discount">
        <span>coupon  discount</span>
        <p>Enter your coupon code if you have one</p>
        <input id="coupon" v-model="coupon" type="text" name="coupon" placeholder="Coupon code - FREE100">
        <input type="submit" value="apply coupon">
      </form>
      <div class="order flex">
        <div>
          <p>Sub total {{summary()}}</p>
          <span>GRAND TOTAL
        <strong>{{summary()}}</strong>
      </span>
        </div>
        <form>
          <input type="submit" required value="proceed to checkout" class="submit">
        </form>
      </div>
    </div>
   </div>`
};

export default shoppingCart