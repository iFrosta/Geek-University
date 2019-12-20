let add = (cart, req) => {
  cart.contents.push(req.body);
  return {name: req.body.product_name, newCart: JSON.stringify(cart, null, 4)};
};
let change = (cart, req) => {
  let find = cart.contents.find(el => el.id_product === +req.params.id);
  find.quantity += req.body.quantity;
  return {name: find.product_name, newCart: JSON.stringify(cart, null, 4)};
};
let remove = (cart, req) => {
  let find = cart.contents.find(el => el.id_product === +req.params.id);
  cart.contents.splice(cart.contents.indexOf(find), 1);
  return {name: find.product_name, newCart: JSON.stringify(cart, null, 4)};
};

module.exports = {
  add,
  change,
  remove
};