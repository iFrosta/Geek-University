const cartItem = {
  props: ['cartItem', 'img'],
  template: `<div class="item flex align pointer">
              <img :src="cartItem.img" alt="item-img">
              <div class="info">
                <span>{{cartItem.product_name}}</span>
                <div class="rating">
                  <span>🟊</span><span>🟊</span><span>🟊</span><span>🟊</span><span>✰</span>
                </div>
                <label>{{cartItem.quantity}} x {{cartItem.price}}</label>
              </div>
              <div @click="$emit('remove', cartItem)" class="remover"><i class="fas fa-times-circle"></i> </div>
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
      if (item !== undefined) {
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
      } else {
        this.$root.deleteJson(`/api/cart/99999999`)
          .then(data => {
            if (data.result === 1) {
              this.cartItems = [];
            }
          })
      }
    },
    change(product) {
      let find = this.cartItems.find(el => el.id_product === product.id_product);
      let input = document.getElementById(`${product.id_product}`);
      if (find) {
        if (+input.value === 0 || +input.value === null) {
          this.$root.deleteJson(`/api/cart/${product.id_product}`)
            .then(data => {
              if (data.result === 1) {
                this.cartItems.splice(this.cartItems.indexOf(product), 1);
              }
            })
        } else {
          let set = Math.abs(find.quantity - +input.value);
          if (find.quantity < +input.value) {
            this.$root.putJson(`/api/cart/${find.id_product}`, {quantity: set})
              .then(data => {
                if (data.result === 1) {
                  find.quantity = +input.value;
                }
              })
          } else {
            if (product.quantity > 1) {
              this.$root.putJson(`/api/cart/${find.id_product}`, {quantity: -set})
                .then(data => {
                  if (data.result === 1) {
                    find.quantity = +input.value;
                  }
                })
            } else {
              this.$root.deleteJson(`/api/cart/${product.id_product}`)
                .then(data => {
                  if (data.result === 1) {
                    this.cartItems.splice(this.cartItems.indexOf(product), 1);
                  }
                })
            }
          }
        }
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
  },
  mounted() {
    this.$root.getJson(`/api/cart/`)
      .then(data => {
        for (let el of data.contents) {
          this.cartItems.push(el);
        }
      });
  },
  template: `      
      <div id="header-right" class="right">
        <div v-if="cartItems.length" class="circle">{{countItems()}}</div>
        <img @click="showCart = !showCart" id="cart" src="img/index/cart.svg" alt="cart">
        <button class="pointer" @click="showCart = !showCart">My Account
          <i class="fas fa-sort-down"></i>
        </button>
        <div v-show="showCart" id="cart-inside" class="cart">
          <div class="items align flex">
            <div v-if="!cartItems.length" class="empty">Your Cart is empty!</div>
              <cart-item 
              class="cart-item"
              v-for="item of cartItems" 
              :key="item.id_product" 
              :cart-item="item" 
              @remove="remove">
              </cart-item>
          </div>
          <div class="checkout flex align">
            <div v-if="cartItems.length" class="counter flex ">
              <div class="total">TOTAL</div>
              <div class="price">{{summary()}}</div>
            </div>
            <button class="pointer" onclick="window.location.href='checkout.html'">CHECKOUT</button>
            <a class="a-button" href="shopping-cart.html">GO TO CART</a>
          </div>
        </div>
      </div>`
};

export default cart