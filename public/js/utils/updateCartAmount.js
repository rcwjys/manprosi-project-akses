'use strict';

export function updateAmount(itemQty, itemPrice) {
  for (let i = 0; i < itemQty.length; i++) {
      itemQty[i].addEventListener('change', (event) => {
        if (!isNaN(+itemQty[i].value)) {
          const quantity = +itemQty[i].value;
          const pricePerItem = +itemPrice[i].getAttribute('originalMedicinePrice');
  
          itemPrice[i].value = quantity * pricePerItem;
        } else {
          location.reload(true);
          return;
        }
      });
  }
}

