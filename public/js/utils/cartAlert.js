'use strict'

export function addItemAlert(medicineName) {
  const itemNameSpan = document.getElementById('itemName');
  const cartAlertElem = document.getElementById('cart-alert');

  itemNameSpan.textContent = medicineName;
  cartAlertElem.classList.remove('display-none');

}