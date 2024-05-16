let totalFinalPrice = 0;
let total = 3.59;
let alltitle = [];
let quantityArray = [];
let quantityString;
document.querySelectorAll('.goods').forEach((item,index) => {
    let count = 1;
    item.id = "<?php echo $id; ?>";
    const title = item.querySelector('#title').textContent;
    const price = item.querySelector('#price').textContent;
    const quantity = item.querySelector('#quantity');
    const finalPrice = item.querySelector('#final_price');
    const increment = item.querySelector('.btn_plus');
    const decrement = item.querySelector('.btn_minus');
    alltitle += title+'<br>';

    increment.addEventListener('click', function () {
        count++;
        let final_price = price * count;
        quantity.innerText = count;
        finalPrice.innerText = '$'+final_price.toFixed(2);
        totalFinalPrice += parseFloat(price);
        (total += parseFloat(price)).toFixed(2);
        document.getElementById('subtotal').innerText = '$'+totalFinalPrice.toFixed(2);
        document.getElementById('total').innerText = '$'+(totalFinalPrice + 3.59).toFixed(2);
        quantityArray[index]=count;
        quantityString = quantityArray.join('<br>');
        
    });

    decrement.addEventListener('click', function () {
        if (count > 1) {
            count--;
            let final_price = price * count;
            quantity.innerText = count;
            finalPrice.innerText = '$'+final_price.toFixed(2);
            totalFinalPrice -= parseFloat(price);
            (total -= parseFloat(price)).toFixed(2);
            document.getElementById('subtotal').innerText = '$'+totalFinalPrice.toFixed(2);
            document.getElementById('total').innerText ='$'+(totalFinalPrice + 3.59).toFixed(2);
            quantityArray[index]=count;
            quantityString = quantityArray.join('<br>');

        };
    });
    totalFinalPrice += parseFloat(price);
    (total += parseFloat(price)).toFixed(2);
    quantityArray[index]=count;
    quantityString = quantityArray.join('<br>');
});
window.onload = function () {
    document.getElementById('subtotal').innerText = '$'+totalFinalPrice.toFixed(2);
    document.getElementById('total').innerText = '$'+(totalFinalPrice + 3.59).toFixed(2);
};





