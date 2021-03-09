// if ($(this).href === path) {
//     $(this).addClass('active');

//     $(targetId).show();
// } else {
//     $(this).removeClass('active');
// // }
// // console.log($('#products').href);
// $(document).ready(function(){
//     $('#popoverData').popover();
//     $('#popoverOption').popover({ trigger: "hover" });
// });
// $(window).ready(()=>{
//     var endPoint = (window.location.pathname);
//     var path = endPoint.substring(0, 9);
//     if(endPoint=='/about')
//     {
//         $('#about').addClass('nav_active');
//         document.getElementById('contact').classList.remove('nav_active');
//         document.getElementById('products').classList.remove('nav_active');
//     }
//     else if(endPoint=='/contact')
//     {
//         document.getElementById('contact').classList.add('nav_active');
//         document.getElementById('about').classList.remove('nav_active');
//         document.getElementById('products').classList.remove('nav_active');
//     }
//     else if(path=='/products')
//     {
//         console.log($('#products'));
//         $('#products').addClass('active');
//         $('#about').removeClass('active');
//         $('#contact').removeClass('active');
//     }
// });

$(document).ready(function(){
    setTimeout(function() {
        $('#alerti').fadeOut('fast');
    }, 30000);
});


function changeImg(i)
{
    document.getElementById('main_img').src = document.getElementById(i).src;
    var x = "#"+i;
    if(i=='image1')
    {
        $('#image2').removeClass('image_active');
    }
    else if(i=='image2')
    {
        $('#image1').removeClass('image_active');
    }
    $(x).addClass('image_active');
}
function addToCart(product,user){
    console.log(product);
    // console.log($('#alert'));
    console.log(user);
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': jQuery('meta[name="csrf_token"]').attr('content')
        }
    });
    
    var type = "POST";
    if(user!=undefined)
    {
        var formData = {
            // "_token": $('#addToCart')[0].content,
            'name':product['name'],
            'cost': product['cost'],
            'user_id': user['id'],
            'product_id':product['id'],
        };
        console.log(formData);
        $.ajax({
            type: type,
            url: 'http://127.0.0.1:8000/addToCart',
            data: formData,
            dataType: 'json',
            success: function (data) {
                alert('Product added to cart');
                console.log(data);
                
            },
            error: function (data) {
                console.log(data);
                alert('Item has got out of stock');
            }
        });
    }
    else
    {
        window.location.href="http://127.0.0.1:8000/login";
    }
}


function increase(product,user){
    console.log(product);
    console.log(user);
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': jQuery('meta[name="csrf_token"]').attr('content')
        }
    });
    var formData = {
        // "_token": $('#addToCart')[0].content,
        'user_id': user['id'],
        'product_id':product['product_id'],
    };
    console.log(formData);
    var type = "POST";
    if(user)
    {
        $.ajax({
            type: type,
            url: 'http://127.0.0.1:8000/addToCart',
            data: formData,
            dataType: 'json',
            success: function (data) {
                console.log('Added to cart');
                alert('Product added to cart');
                location.reload();
                console.log(data);
            },
            error: function (data) {
                console.log(data);
                alert('Product has got out of stock');
            }
        });
    }
}


function decrease(product,user){
    console.log(product);
    console.log(user);
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': jQuery('meta[name="csrf_token"]').attr('content')
        }
    });
    var formData = {
        // "_token": $('#addToCart')[0].content,
        'user_id': user['id'],
        'product_id':product['product_id'],
    };
    console.log(formData);
    var type = "POST";
    if(user)
    {
        $.ajax({
            type: type,
            url: 'http://127.0.0.1:8000/removeFromCart',
            data: formData,
            dataType: 'json',
            success: function (data) {
                console.log('Added to cart');
                alert('Product remove from cart');
                location.reload();
                console.log(data);
            },
            error: function (data) {
                console.log(data);
            }
        });
    }
}