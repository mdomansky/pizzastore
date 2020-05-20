require('./bootstrap');
require('./../../node_modules/jquery.cookie/jquery.cookie.js');

$().ready(function(){
    $('.pizza .btn-addtocart').click(function(){
        var id = $(this).data('id');
        setCartData(id, 1);

        $('.btn-cart').text('Cart (' + Object.keys(getCartData()).length + ')');
        $("html").animate({ scrollTop: 0 }, 600);
        return false;
    });

    $('body.cart select[name="delivery"]').change(function(){
        cart_calc();
        if ($(this).val() != 0) {
            $('body.cart input[name="address"]').prop('disabled', '');
        } else {
            $('body.cart input[name="address"]').prop('disabled', 'disabled');
        }
    });
    $('body.cart a.change-count').click(function(){
        var element = $(this).siblings('span');
        var id = $(this).data('id');
        var diff = 0;
        if ($(this).hasClass('count-down')) {
            diff = -1;
        } else {
            diff = +1;
        }
        element.text(parseInt(element.text()) + diff);
        if (parseInt(element.text()) <= 0) {
            element.closest('div.pizza-item').fadeOut();
        }
        setCartData(id, diff);

        cart_calc();
        return false;
    });
    
    function cart_calc() {
        var total = 0;
        $.each($('body.cart .pizza-item'), function(idx, val){
            var price = parseFloat($(this).find('div.price span.money-amount').text());
            var qty = parseInt($(this).find('div.qty span').text());
            $(this).find('div.price_all span.money-amount').text((price * qty).toFixed(2));
            total += price * qty;
        });

        total += $('body.cart select[name="delivery"] option:selected').data('cost');

        $('body.cart .cart-total span.money-amount').text(total.toFixed(2));
    }
    function getCartData() {
        return JSON.parse($.cookie('cart') || "[]");
    }
    function setCartData(id, diff) {
        var cart = getCartData();
        var updated = false;
        var id_to_del = false;
        $.each(cart, function (item_id, item_val) {
            if (item_val.id == id) {
                cart[item_id]['qty'] += diff;
                updated = true;
                if (cart[item_id]['qty'] == 0) {
                    id_to_del = item_id;
                }
            }
        })
        if (updated) {
            if (id_to_del !== false) {
                cart.splice(id_to_del, 1);
            }
        } else {
            if (diff > 0) {
                cart.push({
                    "id": id,
                    "qty": diff,
                });
            }
        }
        $.cookie('cart', JSON.stringify(cart), { expires: 30, path: '/' });

    }
});