'use strict';

import { updateAmount } from './updateCartAmount.js';
import { updateTotalAmount } from './updateTotalAmount.js';
import { addItemAlert } from './cartAlert.js';

export function addToCart() {
    const orderButton = document.querySelectorAll('#order-button');

    for (let i = 0; i < orderButton.length; i++) {
        orderButton[i].addEventListener('click', (event) => {
            event.preventDefault();

            const medicineCard = orderButton[i].closest('.card');

            const medicineName = medicineCard.querySelector('#medicine-name').textContent.replace(medicineCard.querySelector('span').textContent, '').trim();

            const medicinePrice = medicineCard.querySelector('#medicine-price').textContent.trim().split(' ')[1].trim();

            orderButton[i].classList.add('disabled-button');

            createTableRow(medicineName, medicinePrice);

            const itemQty = document.querySelectorAll('#itemQty');
            const itemPrice = document.querySelectorAll('#item_price');
            updateTotalAmount(itemQty, itemPrice);

            addItemAlert(medicineName);
        });

    }
}

function createTableRow(medicineName, medicinePrice) {

    const stylingClass = ['no-background', 'no-border'];

    const cartContainer = document.getElementById('cart-container');

    const tableRow = document.createElement('tr');

    for (let i = 0; i < 3; i++) {
        const tableData = document.createElement('td');

        switch (i) {
            case 0:
                const itemName = document.createElement('input');
                itemName.type = 'text';
                stylingClass.forEach(style => itemName.classList.add(style));

                itemName.value = medicineName;
                itemName.id = 'itemName';
                itemName.disabled = true;

                tableData.appendChild(itemName);
                tableRow.appendChild(tableData);
                break;

            case 1:
                const itemPrice = document.createElement('input');

                itemPrice.type = 'integer';
                stylingClass.forEach(style => itemPrice.classList.add(style));

                itemPrice.value = medicinePrice;
                itemPrice.id = 'item_price'
                itemPrice.setAttribute('originalMedicinePrice', medicinePrice);
                itemPrice.disabled = true;

                tableData.appendChild(itemPrice);
                tableRow.appendChild(tableData);

                break;

            case 2:
                const itemQty = document.createElement('input');
                itemQty.type = 'integer';
                stylingClass.forEach(style => itemQty.classList.add(style));
                itemQty.id = 'itemQty'
                itemQty.value = 1;

                tableData.appendChild(itemQty);
                tableRow.appendChild(tableData);
                break;
        }
        cartContainer.appendChild(tableRow);

        const itemQty = document.querySelectorAll('#itemQty');
        const itemPrice = document.querySelectorAll('#item_price');

        validateItemQuantity(itemQty);

        updateAmount(itemQty, itemPrice);
    }
}

function validateItemQuantity(itemQty) {
    for (let i = 0; i < itemQty.length; i++) {
        itemQty[i].addEventListener('blur', (event) => {
            event.preventDefault();
            if (itemQty[i].value < 1 || itemQty[i].value === null || isNaN(itemQty[i].value)) {
                itemQty[i].value = 1;
                
            }
        });

        itemQty[i].addEventListener('change', () => {
            const itemQty = document.querySelectorAll('#itemQty');
            const itemPrice = document.querySelectorAll('#item_price');
            updateTotalAmount(itemQty, itemPrice);
        });
    }
}
