export function updateTotalAmount(itemQty, itemPrice) {

    const priceSpan = document.getElementById('totalAmountSpan');
    let totalPrice = 0;
    for (let i = 0; i < itemQty.length; i++) {
        totalPrice += +itemQty[i].value * +itemPrice[i].getAttribute('originalMedicinePrice');
    }
    priceSpan.textContent = totalPrice;
}