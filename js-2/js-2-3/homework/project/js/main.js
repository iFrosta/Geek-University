const API = 'https://raw.githubusercontent.com/GeekBrainsTutorial/online-store-api/master/responses';

let getRequest = (url, cb) => {
  let xhr = new XMLHttpRequest();
  xhr.open("GET", url, true);
  xhr.onreadystatechange = () => {
    if (xhr.readyState === 4) {
      if (xhr.status !== 200) {
        console.log('Error');
      } else {
        cb(xhr.responseText);
      }
    }
  };
  xhr.send();
};

class ProductsList {
  constructor(container = '.products'){
    this.container = container;
    this.goods = [];
    this.allProducts = [];
    this._getProducts()
      .then(data => {
          this.goods = [...data];
          console.log(this.calcSum());
          this._render()
        })
  }
  _getProducts(){
    return fetch(`${API}/catalogData.json`)
      .then(result => result.json())
      .catch(error => {
        console.log(error);
      })
  }
  _render(){
    const block = document.querySelector(this.container);
    for (let product of this.goods){
      const productObj = new ProductItem(product);
      this.allProducts.push(productObj);
      block.insertAdjacentHTML('beforeend', productObj.render());
    }
  }
  calcSum(){
    return this.goods.reduce((sum, product) => sum +=product.price, 0);
  }
}

class ProductItem {
  constructor(product){
    this.title = product.product_name;
    this.price = product.price;
    this.id = product.id_product;
    this.img = product.img;
    // this.sale = product.sale;
  }
  render() {
    if (!this.img) this.img = 'https://cdn3.iconfinder.com/data/icons/project-management-32/48/24-512.png';
    // (this.sale) ? this.sale = ' sale' : this.sale = '';

    return `<div class="product-item" data-id="item-${this.id}">
            <div class="product-info">
              <h3>${this.title}</h3>
              <p>${this.price}$</p>
              <button class="buy-btn">Buy</button>
            </div>
            <img src="${this.img}" alt="product-img">
          </div>`
  }
}

new ProductsList();

// class Cart {
//   constructor(container = '.cart') {
//     this.container = container;
//     this.goods = [];
//     this.allProducts = [];
//   }
// }
//
// class CartItem {
//   constructor(product){
//     this.title = product.title;
//     this.price = product.price;
//     this.id = product.id;
//     this.img = product.img;
//   }
// }