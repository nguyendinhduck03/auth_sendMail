// js của detailProduct

document.getElementById('increaseQuantity').addEventListener('click', function () {
    var quantityInput = document.getElementById('quantity');
    quantityInput.value = parseInt(quantityInput.value) + 1;
});
document.getElementById('decreaseQuantity').addEventListener('click', function () {
    var quantityInput = document.getElementById('quantity');
    var currentValue = parseInt(quantityInput.value);
    if (currentValue > 1) {
        quantityInput.value = currentValue - 1;
    }
});
setTimeout(function() {
    $('.alert').alert('close');
}, 3000);

// js của cart



