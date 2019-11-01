function btnAddCart(product_id) {
    $.ajax({
        type: "POST",
        url: url,
        data: { product_id: product_id },
        success: function (data) {
           
            if(data==1){
                var count = $('#cart-count').html();
                $('#cart-count').html(++count);
            }
            
        },
        error: function (data) {
            console.log('Error:', data);
        }
    });
}