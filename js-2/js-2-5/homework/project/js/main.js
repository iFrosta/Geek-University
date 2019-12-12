const API = 'https://raw.githubusercontent.com/GeekBrainsTutorial/online-store-api/master/responses';

const app = new Vue({
  el: '#app',
  data: {
    catalogUrl: '/catalogData.json',
    products: [],
    imgCatalog: 'https://cdn3.iconfinder.com/data/icons/project-management-32/48/24-512.png'
  },
  methods: {
    getJson(url) {
      return fetch(url)
        .then(result => result.json())
        .catch(error => {
          console.log(error);
        })
    },
    addProduct(product){
      console.log(product.id_product);
    }
  },
  mounted(){
    this.getJson(`${API + this.catalogUrl}`)
      .then(data => {
        for(let el of data){
          this.products.push(el);
        }
      });
    this.getJson(`getProducts.json`)
      .then(data => {
        for(let el of data){
          this.products.push(el);
        }
      })
  }
});

// let getRequest = (url) => {
//   return new Promise((resolve, reject) => {
//     let xhr = new XMLHttpRequest();
//     xhr.open("GET", url, true);
//     xhr.onreadystatechange = () => {
//       if (xhr.readyState === 4) {
//         if (xhr.status !== 200) {
//           reject('Error');
//         } else {
//           resolve(xhr.responseText);
//         }
//       }
//     };
//     xhr.send();
//   })
// };
//
// class List {
//   constructor(url, container, list = AllList) {
//     this.container = container;
//     this.list = list;
//     this.url = url;
//     this.goods = [];
//     this.allProducts = [];
//     this._init();
//   }
//
//   getJson(url) {
//     return fetch(url ? url : `${API + this.url}`)
//       .then(result => result.json())
//       .catch(error => {
//         console.log(error);
//       })
//   }
//
//   handleData(data) {
//     this.goods = [...data];
//     this.render();
//   }
//
//   calcSum() {
//     return this.goods.reduce((sum, product) => sum += product.price, 0);
//   }
//
//   render() {
//     const block = document.querySelector(this.container);
//     for (let product of this.goods) {
//       const productObj = new this.list[this.constructor.name](product);
//       this.allProducts.push(productObj);
//       block.insertAdjacentHTML('beforeend', productObj.render());
//     }
//   }
//
//   _init() {
//     return false
//   }
// }
//
// class Item {
//   constructor(el, img = 'https://cdn3.iconfinder.com/data/icons/project-management-32/48/24-512.png') {
//     this.product_name = el.product_name;
//     this.price = el.price;
//     this.id_product = el.id_product;
//     this.img = el.img;
//   }
//
//   render() {
//     if (!this.img) this.img = 'https://cdn3.iconfinder.com/data/icons/project-management-32/48/24-512.png';
//     return `<div class="product-item" data-id="item-${this.id_product}">
//             <div class="product-info">
//               <h3>${this.product_name}</h3>
//               <p>${this.price}$</p>
//               <button class="buy-btn" data-id="${this.id_product}" data-name="${this.product_name}" data-price="${this.price}">Buy</button>
//             </div>
//             <img src="${this.img}" alt="product-img">
//           </div>`
//   }
// }
//
// class ProductsList extends List {
//   constructor(cart, container = '.products', url = "/catalogData.json") {
//     super(url, container);
//     this.cart = cart;
//     this.getJson()
//       .then(data => this.handleData(data));
//   }
//
//   _init() {
//     document.querySelector(this.container).addEventListener('click', e => {
//       if (e.target.classList.contains('buy-btn')) {
//         this.cart.addProduct(e.target);
//       }
//     });
//   }
// }
//
// class ProductItem extends Item {
// }
//
// class Cart extends List {
//   constructor(container = ".cart-block", url = "/getBasket.json") {
//     super(url, container);
//     this.getJson()
//       .then(data => this.handleData(data.contents));
//   }
//
//   addProduct(el) {
//     this.getJson(`${API}/addToBasket.json`)
//       .then(data => {
//         if (data.result === 1) {
//           let productId = +el.dataset['id'];
//           let find = this.allProducts.find(product => product.id_product === productId);
//           if (find) {
//             find.quantity++;
//             this._updateCart(find);
//           } else {
//             let product = {
//               id_product: productId,
//               price: +el.dataset['price'],
//               product_name: el.dataset['name'],
//               quantity: 1
//             };
//             this.goods = [product];
//             this.render();
//           }
//         } else {
//           console.log('error');
//         }
//       })
//   }
//
//   removeProduct(el) {
//     this.getJson(`${API}/deleteFromBasket.json`)
//       .then(data => {
//         if (data.result === 1) {
//           let productId = +el.dataset['id'];
//           let find = this.allProducts.find(product => product.id_product === productId);
//           if (find.quantity > 1) {
//             find.quantity--;
//             this._updateCart(find);
//           } else {
//             this.allProducts.splice(this.allProducts.indexOf(find), 1);
//             document.querySelector(`.cart-item[data-id="${productId}"]`).remove();
//           }
//         } else {
//           console.log('error');
//         }
//       })
//   }
//
//   _updateCart(product) {
//     let block = document.querySelector(`.cart-item[data-id="${product.id_product}"]`);
//     block.querySelector('.product-quantity').textContent = `Quantity: ${product.quantity}`;
//     block.querySelector('.product-price').textContent = `$${product.quantity * product.price}`;
//   }
//
//   _init() {
//     document.querySelector('.btn-cart').addEventListener('click', () => {
//       document.querySelector(this.container).classList.toggle('invisible');
//     });
//     document.querySelector(this.container).addEventListener('click', e => {
//       if (e.target.classList.contains('del-btn')) {
//         this.removeProduct(e.target);
//       }
//     });
//   }
// }
//
// class CartItem extends Item {
//   constructor(el, img = 'https://cdn3.iconfinder.com/data/icons/project-management-32/48/24-512.png') {
//     super(el, img);
//     this.quantity = el.quantity;
//     this.img = img;
//   }
//
//   render() {
//     return `<div class="cart-item" data-id="${this.id_product}">
//       <div class="product-bio">
//           <img src="${this.img}" alt="img">
//           <div class="product-desc">
//               <p class="product-title">${this.product_name}</p>
//               <p class="product-quantity">Quantity: ${this.quantity}</p>
//               <p class="product-single-price">$${this.price} each</p>
//           </div>
//       </div>
//       <div class="right-block">
//           <p class="product-price">$${this.quantity * this.price}</p>
//           <button class="del-btn" data-id="${this.id_product}">&times;</button>
//       </div>
//     </div>`
//   }
// }
//
// const AllList = {
//   ProductsList: ProductItem,
//   Cart: CartItem
// };
// let cart = new Cart();
// let products = new ProductsList(cart);
// products.getJson('getProducts.json').then(data => products.handleData(data));