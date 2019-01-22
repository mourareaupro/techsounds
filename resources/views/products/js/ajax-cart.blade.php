<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#add-to-cart').click( function() {
        var product_id = $(this).data('id');
        var url= '../cart/' + product_id;

        $.ajax({
            type: "POST",
            url: url,
            data: { product_id: product_id , _token: '{{csrf_token()}}' },
            success: function (data) {
                //update number items
                $('#cart-items-count').html(data.items);
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });


    $('#delete-cart-item').click( function() {
        var product_id = $(this).data('id');

        console.log(product_id);
        var url= '../public/cart/delete/' + product_id;

        $.ajax({
            type: "POST",
            url: url,
            data: { product_id: product_id , _token: '{{csrf_token()}}' },
            success: function (data) {
                //update number items
                $('#cart-items-count').html(data.items);
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });

</script>
