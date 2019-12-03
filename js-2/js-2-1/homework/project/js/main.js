const products = [
  {id: 1, title: 'Notebook', price: 2000, img: 'https://static.re-store.ru/upload/iblock/4fc/4fc2f36b75ade15f78baeefb04209361.jpg'},
  {id: 2, title: 'Mouse', price: 20, img:' https://img.mvideo.ru/Pdb/50048743b.jpg'},
  {id: 3, title: 'Keyboard', price: 200, img: 'https://www.logitechg.com/content/dam/gaming/en/products/pro-x-keyboard/pro-x-keyboard-hero.png.imgw.1318.1318.jpeg'},
  {id: 4, title: 'Gamepad', price: 50, img: 'https://avatars.mds.yandex.net/get-mpic/1855911/img_id7980936131697456187.jpeg/9hq'},
];

const renderProduct = (title = 'Product', price = "undefined", img = 'http://www.stoimen.com/wp-content/uploads/2011/10/question.mark_.jpg') => {
  return `<div class="product-item">
                <h3>${title}</h3>
                <p>${price}$</p>
                <img src="${img}" alt="product-img">
                <button class="buy-btn">Купить</button>
            </div>`
};
const renderPage = list => {
  document.querySelector('.products').innerHTML = list.map(item => renderProduct(item.title, item.price, item.img)).join('');
};

renderPage(products);