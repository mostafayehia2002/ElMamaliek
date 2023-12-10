document.addEventListener("DOMContentLoaded", function(event) {
    $('body').on('click', '.delete-button', function (e) {
        e.preventDefault();

        $.ajax({
            url: baseUrl + '/cart/item/'+ $(this).attr('data-item-id') ,
            method: 'Delete',
            data: {_token: _token, referre_page: 'cart'},
            dataType: 'json',
        }).done(function (data) {
            Salla.event.createAndDispatch('cart::delete-item', {
                data: data,
            });
            location.reload();
        }).fail(laravel.ajax.errorHandler);
    });
});
