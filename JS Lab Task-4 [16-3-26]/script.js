const unitPrice = 1000;

const qtyInput = document.getElementById("qty");
const totalInput = document.getElementById("total");

qtyInput.addEventListener("input", function(){

    let qty = parseInt(qtyInput.value);

    if(qty < 0){
        qty = 0;
        qtyInput.value = 0;
    }

    let total = unitPrice * qty;

    totalInput.value = total;

    if(total > 1000){
        alert("Congratulations! You are eligible for a gift coupon.");
    }

});