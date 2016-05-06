$(document).ready(function () {
    $(document.body).on('click', '.js-submit-confirm', function (event) {
        event.preventDefault();
        var $form = $(this).closest('form');
        var $el = $(this);
        var text = $el.data('confirm-message') ? $el.data('confirm-message') : 'You cannot aborted this process!';
        swal({
            title: 'Anda yakin?',
            text: text,
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#DD6B55',
            confirmButtonText: 'Oke, lanjutkan!',
            cancelButtonText: 'Batal',
            closeOnConfirm: true
        }, function () {
                $form.submit();
            });
    });
    $('.js-selectize').selectize({
        sortField: 'text'
    });
});