const booksPrices = document.querySelectorAll('.book-price');
const paymentAmountPrice = document.querySelector('.payment__amount__price');
let total = 0;

booksPrices.forEach(function (bookPrice) {
  total += parseFloat(bookPrice.innerText);
});

paymentAmountPrice.innerText = total;
