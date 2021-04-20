let ids = Array();
let productArray = Array();
let totalVal = 0;

function addProductToCheckout(productId, productTitle, productPrice, productPicture, cashier){

    /**
     *
     * change pay btn from disabled to active
     */
    $("#payBtn").attr("disabled", false);

    /**
     *
     * if productId in productArray
     *
     * Then
     * add one to quantity
     * multiply price to quantity
     *
     * else
     * add product to productArray
     */


    if(jQuery.inArray(productId, ids) != -1) {

        function productById(productArray) {
            return productArray.id === productId;
        }

        firstQuantity = productArray.find(productById).quantity;
        firstPrice = productArray.find(productById).price;

        $("#quantity"+productId).html(++firstQuantity);
        $("#price"+productId).html(firstPrice * firstQuantity);

        productArray.find(productById).quantity = firstQuantity;
        productArray.find(productById).total = firstPrice * firstQuantity;

        let sum = productArray
            .map(item => item.total)
            .reduce((prev, curr) => prev + curr, 0);

        let sumQuantity = productArray
            .map(item => item.quantity)
            .reduce((prev, curr) => prev + curr, 0);

        $("#totalQuantity").html("<span>" + sumQuantity + "</span>");
        $("#total").html("<span>" + sum + "Le</span>");
        $("#total-value").html(sum + " Le");
        totalVal = sum;

    } else {

        ids.push(productId);

        prod = {
            'id': productId,
            'price': productPrice,
            'quantity': 1,
            'total': productPrice,
            'cashier_id': cashier
        };

        productArray.push(prod);

        $("#checkoutTable").append("<tr id='row"+productId+"'  onclick='increaseOne("+productId+")'>" +
            "<td><img src='../public/images/product/"+ productPicture +"' class='img-thumbnail'></td>" +
            "<td>" + productTitle + "</td>" +
            "<td id='quantity"+ productId +"'> 1 </td>" +
            "<td id='price"+ productId +"'>" + productPrice + "</td>" +
            "<td onclick='decreaseOne("+productId+")'><i class='fas fa-minus-square' onclick='decreaseOne("+productId+")'></i></td>" +
            "</tr>");

        let sumPrice = productArray.map(o => o.total).reduce((a, c) => { return a + c });
        let sumQuantity = productArray.map(o => o.quantity).reduce((a, c) => { return a + c });

        $("#total").html("<span>" + sumPrice + "Le</span>");
        $("#total-value").html(sumPrice + " Le");
        $("#totalItems").html("<span>" + productArray.length + "</span>");
        $("#totalQuantity").html("<span>" + sumQuantity + "</span>");
        totalVal = sumPrice;
    }


}

function decreaseOne(productId){

    /**
     *
     * Get product by id
     * @param productArray
     * @returns {boolean}
     * find product quantity
     *
     */
    function productById(productArray) {
        return productArray.id === productId;
    }

    let oldQuantity;
    oldQuantity =  productArray.find(productById).quantity;

    /**
     *
     * if quantity equal 1
     * then
     *
     * else
     * set product quantity
     *
     */
    if(oldQuantity == 1){

        productIndex = productArray.indexOf(productArray.find(productById));

        productArray.splice(productIndex, 1);

        let index = ids.indexOf(productId);

        if (index > -1) {
            ids.splice(index, 1);
        }

        $("#row"+productId).remove();

        /**
         *
         * get sum of the value of total products
         * get sum of the products quantity
         */
        let sum = productArray
            .map(item => item.total)
            .reduce((prev, curr) => prev + curr, 0);

        let sumQuantity = productArray
            .map(item => item.quantity)
            .reduce((prev, curr) => prev + curr, 0);

        $("#totalQuantity").html("<span>" + sumQuantity + "</span>");
        $("#total").html("<span>" + sum + "Le</span>");
        $("#total-value").html(sum + " Le");
        totalVal = sum;
    }else{

        /**
         *
         * decrease quantity by one
         * change html by the new value
         */
        productArray.find(productById).quantity = --oldQuantity;
        $("#quantity"+productId).html(oldQuantity);

        /**
         *
         * get the current price and quantity
         * final price equal price * quantity
         */
        let firstQuantity = productArray.find(productById).quantity;
        let firstPrice = productArray.find(productById).price;
        let finalPrice = firstPrice * firstQuantity;

        /**
         * set total product price to the new price ( finalPrice )
         */
        productArray.find(productById).total = finalPrice;

        /**
         *
         * get sum of the value of total products
         * get sum of the products quantity
         */
        let sum = productArray
            .map(item => item.total)
            .reduce((prev, curr) => prev + curr, 0);

        let sumQuantity = productArray
            .map(item => item.quantity)
            .reduce((prev, curr) => prev + curr, 0);

        $("#totalQuantity").html("<span>" + sumQuantity + "</span>");
        $("#total").html("<span>" + sum + "Le</span>");
        $("#total-value").html(sum + " Le");
        $("#price"+productId).html(finalPrice);
        totalVal = sum;
    }

}

function increaseOne(productId){

    /**
     *
     * Get product by id
     * @param productArray
     * @returns {boolean}
     * find product quantity
     *
     */
    function productById(productArray) {
        return productArray.id === productId;
    }

    let oldQuantity;
    oldQuantity =  productArray.find(productById).quantity;

    /**
     *
     * if quantity equal 1
     * then
     *
     * else
     * set product quantity
     *
     */
    productArray.find(productById).quantity = ++oldQuantity;
    $("#quantity"+productId).html(oldQuantity);

    let firstQuantity = productArray.find(productById).quantity;
    let firstPrice = productArray.find(productById).price;

    let finalPrice = firstPrice * firstQuantity;

    productArray.find(productById).total = finalPrice;

    let sum = productArray
        .map(item => item.total)
        .reduce((prev, curr) => prev + curr, 0);

    let sumQuantity = productArray
        .map(item => item.quantity)
        .reduce((prev, curr) => prev + curr, 0);

    $("#totalQuantity").html("<span>" + sumQuantity + "</span>");
    $("#total").html("<span>" + sum + "Le</span>");
    $("#total-value").html(sum + " Le");
    $("#price"+productId).html(finalPrice);
    totalVal = sum;
}

function savePay(csrfToken, cashierId, 0){

    if(productArray.length > 0){

        $('#loading').show();

        let i;

        for(i = 0; i < productArray.length; i++){

            $.post("http://localhost/pos/public/orders",
                {
                    _token: csrfToken,
                    product_id: productArray[i].id,
                    quantity: productArray[i].quantity,
                    cashier_id: cashierId,
                    order_code: orderNum
                },
                function(data, status){

                    $('#loading').hide();
                    $('#successImage').show();

                    setTimeout(function(){ $('#successImage').hide(); }, 3000);

                    /**
                     *
                     * change pay btn from disabled to active
                     */
                    $("#payBtn").attr("disabled", true);
                    $("#savePayBtn").attr("disabled", true);

                    location.reload();
                });
        }

        let x;
        for(x = 0; x < productArray.length; x++){

            $('#row'+ productArray[x].id ).remove();
        }

        $("#totalQuantity").html("<span></span>");
        $("#total").html("<span></span>");
        $("#total-value").html('');
        totalVal = 0;
        $("#cash-value").val("");

    }else{


    }

    resetProductArray();
}

function resetProductArray(){

    productArray = Array();
    ids = Array();
}

function getSum(){

    cashValue = $("#viewer").val();
    cashValueAfter = totalVal - cashValue;
    $("#change-value").html(cashValueAfter);

    if(cashValueAfter > 0){

        $("#savePayBtn").attr("disabled", true);
    }else{

        $("#savePayBtn").attr("disabled", false);
    }

}

function clearBtn(){

    $("#viewer").val(" ");
}

let x = 0;

function calcNumber(num){

    let newNum = x+''+num;
    x = newNum;

    $('#cash-value').val(newNum);
}

$('#exampleModal').on('shown.bs.modal', function() {
    $('#cash-value').focus();
})



