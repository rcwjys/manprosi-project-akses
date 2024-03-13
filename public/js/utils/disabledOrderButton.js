'use strict'

function disabledOrderButton() {
  const medicineStatus = document.getElementsByClassName('medicine-status');
  const orderButton = document.querySelectorAll('#order-button');

  for (let i = 0; i < medicineStatus.length; i++) {
    if (medicineStatus[i].textContent === 'HABIS') {
      for (let j = 0; j < orderButton.length; j++) {
        orderButton[i].classList.add('disabled-button');
      }
    } else {
      continue
    }
  }
}


export { disabledOrderButton };
