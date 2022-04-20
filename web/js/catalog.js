$('.btn-buy').on('click', (e) => {
    let btn = $(e.currentTarget);
    let id  = btn.data('id');
    btn.prop('disabled', true);
    $.post('/bucket/add?id=' + id, '', (data) => {
        if (!data) {
            alert('Product not found');
        }
        btn.prop('disabled', false);
        $('.bucket-counter').text(data);
    })
})