$(document).ready(function(){

    //add-product-btn
    $('.add-product-btn').on('click', function(e){

        e.preventDefault();
        var name = $(this).data('name');
        var id = $(this).data('id');
        var price = $.number($(this).data('price'), 2);

        $(this).removeClass('btn-success').addClass('btn-default disabled');

        var html =
        `<tr>
            <td>${name}</td>
            <td><input type="number" name="products[${id}][count]" data-price="${price}" class="form-control input-sm product-quantity" min="1" value="1"></td>
            <td class="product-price">${price}</td>
            <td><button class="btn btn-danger btn-sm remove-product-btn" data-id=${id}><span class="fa fa-trash"></span></button></td>
        </tr>`
        $('.order-list').append(html);

        //to function calcuate_total
        calculateTotal();

    });

    //disabled button
    $('body').on('click', '.disabled', function(e){

        e.preventDefault();

    });//end of disabled

    //remove product button
    $('body').on('click', '.remove-product-btn', function(e){

        e.preventDefault();
        var id = $(this).data('id');

        $(this).closest('tr').remove();
        $('#product-' + id).removeClass('btn-default disabled').addClass('btn-success');

        //to function calcuate_total
        calculateTotal();

    });//end of remove-product-btn

    //change product-quantity
    $('body').on('keyup change', '.product-quantity', function(){

        var quantity = parseInt($(this).val());
        var unitprice = parseFloat($(this).data('price').replace(/,/g, '')); //150
        $(this).closest('tr').find('.product-price').html($.number(quantity * unitprice, 2));
        //to function calcuate_total
        calculateTotal();

    });//end of product-quantity change

});//end of document ready


function calculateTotal(){

    var price = 0;

    $('.order-list .product-price').each(function(index){

        price += parseFloat($(this).html().replace(/,/g, ''));

    });//end of product-price
    
    var dc = $('#deleviryCost').val();

    $('.total-price').html($.number(price, 2));

    price += parseFloat(dc)
    $('#total-cost').html($.number((price), 2));
    $('#total').val(price);

     //check if price > 0
    if ( $('.order-list .product-price').length > 0) {
        $('#add-order-form-btn').removeClass('disabled')
    } else {
        $('#total-cost').html($.number((0), 2));
        $('#add-order-form-btn').addClass('disabled')

    }//end of else

}//end of calcuate_total
