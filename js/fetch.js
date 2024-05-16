// $(document).ready(function () {
//     $("#orderBtn").click(function () {
//         let name = $("#name").val();
//         let phone = $("#phone").val();
//         let address = $("#address").val();
//         let title = $("#title").val();

//         $.ajax({
//             url: '../vendor/create_orders.php',
//             method: 'POST',
//             data: { 
//                 name: name,
//                 phone: phone,
//                 address:address,
//                 title:title,
//                 'finalPrice': total
//                 }
//         });
//     });
// });
document.getElementById('OrderForm').addEventListener('submit', function () {

  let data = {
    name: document.querySelector('#name').value,
    phone: document.querySelector('#phone').value,
    address: document.querySelector('#address').value,
    title: alltitle,
    quantity: quantityString,
    finalPrice: total
  };

  fetch('../vendor/create_orders.php', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json'
    },
    body: JSON.stringify(data)
  })
    .then(response => response.text());

});