// Modified from: https://wordpress.stackexchange.com/a/251191/111583
jQuery(function ($) {
    $(document).on('click', '.notice-wpfc-php .notice-dismiss', function () {
        $.ajax(ajaxurl, {
            type: 'POST',
            data: {
                action: 'wpfc_php_notice_handler',
                type: $(this).closest('.notice-wpfc-php').data('notice')
            }
        });
    });
});