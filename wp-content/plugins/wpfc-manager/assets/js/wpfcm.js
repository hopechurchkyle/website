document.addEventListener('DOMContentLoaded', function () {
    wpfc_init();
});

/**
 * Main init function
 */
function wpfc_init() {
    // load current view or LAU
    wpfc_load_view('');

    // attach event listeners to menu items
    jQuery('.item:not(.action)').on('click', function () {
        wpfc_load_view(this.hash);
    });

    // attach event listeners to action menu items
    jQuery('.item.action').on('click', function () {
        wpfc_do_action(this.dataset.action);
    });
}

/**
 * Attach event listeners on tab change
 */
function wpfc_attach_event_listeners() {
    jQuery('.license_activate').on('click', function () {
        var form = jQuery(this.parentElement),
            details = form.parent(),
            license_status = details.find('.license'),
            update_status = details.find('.updates'),
            license_response = form.find('.activation_response'),
            product = details.parent();

        product.addClass('activating');

        license_response.text('');

        jQuery.get('index.php?' + form.serialize(), function (data) {
            if (data == 1) {
                license_status.removeClass('invalid').addClass('valid');

                if (!update_status.hasClass('wp')) {
                    update_status.removeClass('inactive').addClass('active');
                }
            } else {
                license_response.css('color', '#cc0000');
                license_response.text('Failed to activate. Try again later or contact support. Error message: ' + data);
                license_status.removeClass('valid').addClass('invalid');

                if (!update_status.hasClass('wp')) {
                    update_status.removeClass('active').addClass('inactive');
                }
            }

            product.removeClass('activating');
        });
    });
}

/**
 * Do an ajax request and load the view
 * @param {string} view
 */
function wpfc_load_view(view) {
    var view = view === '' ? (window.location.hash === '' ? '#lau' : window.location.hash) : view,
        view = view.substr(1),
        content = jQuery('main > .content'),
        loader = jQuery('.wpfc-spinner');

    loader.removeClass('hidden');
    content.empty();

    var data = {
        'action': 'wpfcm_get_view',
        'page': view
    };

    jQuery.post(ajaxurl, data, function (response) {
        loader.addClass('hidden');
        content.html(response);
        content.removeClass().addClass('content').addClass(view);
        wpfc_attach_event_listeners();
    });
}

/**
 * Do an action via Ajax
 *
 * @param {string} action Action name. Must be defined in code to be valid
 * @return void
 */
function wpfc_do_action(action) {
    var data = {
        'action': 'wpfcm_' + action
    };

    jQuery.post(ajaxurl, data, function () {
        wpfc_load_view('');
    });
}