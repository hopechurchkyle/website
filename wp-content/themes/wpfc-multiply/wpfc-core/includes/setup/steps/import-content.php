<?php global $qs_config; $theme = wp_get_theme(); ?>
<img src="<?= $theme->get_screenshot(); ?>"
     width="310" alt="" style="border:1px solid rgba(0,0,0,.1);border-radius:4px;box-shadow:0 1px 3px rgba(0,0,0,.2);"/>

<p><?php echo esc_html( wp_get_theme()->get( 'Name' ) ); ?> Theme requires the following plugins to be active in order
    to import content.</p>

<?php
$required_plugins = empty( $qs_config['required-plugins'] ) ? array() : $qs_config['required-plugins'];
?>

<ul id="required-plugins-import">
	<?php foreach ( $required_plugins as $plugin ): ?>
        <li class="plugin-<?php echo sanitize_title_with_dashes( $plugin['name'] ) ?> <?php echo $plugin['active'] ? 'active' : ''; ?>">
			<?php echo $plugin['name']; ?>
        </li>
	<?php endforeach; ?>
</ul>

<p>Demo data will not be imported for inactive plugins.</p>

<div id="import-actions">
	<?php echo submit_button( 'Import Demo', 'primary', 'start-ajax-import', false ); ?>
	<?php echo submit_button( 'Reset Demo', '', 'start-ajax-import-reset', false ); ?>
    <div class="spinner" id="import-spinner"></div>
</div>

<div class="hidden" id="import-log"></div>

<script>
    jQuery( '#start-ajax-import' ).on( 'click', function ()
    {
        var origValue    = this.value,
            actionButton = this;

        if ( jQuery( actionButton ).hasClass( 'button-disabled' ) )
        {
            return;
        }

        if ( !confirm( 'Are you sure you want to start import?' ) )
        {
            return;
        }

        actionButton.value = 'Please wait...';
        jQuery( actionButton ).removeClass( 'button-primary' ).addClass( 'button-disabled' ).addClass( 'disabled' );
        jQuery( actionButton ).prop( 'disabled', 'disabled' );

        jQuery( '#import-spinner' ).css( 'visibility', 'visible' );

        var import_log = jQuery( '#import-log' );

        import_log.removeClass( 'hidden' );
        import_log.text( 'If this text does not disappear, it means that progress can not be automatically displayed due to your server settings. The import is running and may take up to 5 minutes.' );

        jQuery.ajax( WPSITEURL + '/wpfc/v1/wpfc_import_theme_demo_data', {
            dataType: "text",
            xhrFields: {
                onprogress: function ( e )
                {
                    var response = e.currentTarget.response;

                    import_log.html( response );
                    import_log.each( function ()
                    {
                        var scrollHeight = Math.max( this.scrollHeight, this.clientHeight );
                        this.scrollTop   = scrollHeight - this.clientHeight;
                    } )

                    if ( ~response.indexOf( 'Import complete. Everything done.' ) )
                    {
                        jQuery( '#step-status-import-content' ).removeClass( 'step-incomplete' ).addClass( 'step-complete' ).text( 'Completed' );
                        jQuery( '#import-spinner' ).css( 'visibility', 'hidden' );
                    }
                }
            }
        } )
            .done( function ( data )
            {
                import_log.html( data.responseText );
                jQuery( '#step-status-import-content' ).removeClass( 'step-incomplete' ).addClass( 'step-complete' ).text( 'Completed' );

                actionButton.value = origValue;
                jQuery( actionButton ).addClass( 'button-primary' ).removeClass( 'button-disabled' ).removeClass( 'disabled' );
                jQuery( actionButton ).prop( 'disabled', false );

                jQuery( '#import-spinner' ).css( 'visibility', 'hidden' );
            } )
            .fail( function ( data )
            {
                import_log.html( data.responseText );
                jQuery( '#step-status-import-content' ).html( 'Import failed. Please copy the log and send it to <a href="mailto:support@wpforchurch.com">support</a>.' )

                actionButton.value = origValue;
                jQuery( actionButton ).addClass( 'button-primary' ).removeClass( 'button-disabled' ).removeClass( 'disabled' );
                jQuery( actionButton ).prop( 'disabled', false );

                jQuery( '#import-spinner' ).css( 'visibility', 'hidden' );
            } );
    } );

    jQuery( '#start-ajax-import-reset' ).on( 'click', function ()
    {
        var origValue    = this.value,
            actionButton = this;

        if ( jQuery( actionButton ).hasClass( 'button-disabled' ) )
        {
            return;
        }

        if ( !confirm( 'Are you sure you want to clear all demo data? (any modificatons will be lost too)' ) )
        {
            return;
        }

        actionButton.value = 'Please wait...';
        jQuery( actionButton ).removeClass( 'button-primary' ).addClass( 'button-disabled' ).addClass( 'disabled' );
        jQuery( actionButton ).prop( 'disabled', 'disabled' );

        var import_log = jQuery( '#import-log' );

        import_log.removeClass( 'hidden' );

        jQuery.ajax( WPSITEURL + '/wpfc/v1/wpfc_reset_theme_demo_data', {
            dataType: "text",
            xhrFields: {
                onprogress: function ( e )
                {
                    var response = e.currentTarget.response;

                    import_log.html( response );
                    import_log.each( function ()
                    {
                        var scrollHeight = Math.max( this.scrollHeight, this.clientHeight );
                        this.scrollTop   = scrollHeight - this.clientHeight;
                    } )

                    if ( ~response.indexOf( 'Reset finished.' ) )
                    {
                        jQuery( '#step-status-import-content' ).addClass( 'step-incomplete' ).removeClass( 'step-complete' ).text( 'Not Complete' );
                    }
                }
            }
        } )
            .done( function ( data )
            {
                import_log.html( data.responseText );
                jQuery( '#step-status-import-content' ).addClass( 'step-incomplete' ).removeClass( 'step-complete' ).text( 'Not Complete' );

                actionButton.value = origValue;
                jQuery( actionButton ).removeClass( 'button-disabled' ).removeClass( 'disabled' );
                jQuery( actionButton ).prop( 'disabled', false );
            } )
            .fail( function ( data )
            {
                import_log.html( data.responseText );
                jQuery( '#step-status-import-content' ).html( 'Reset failed. Please copy the log and send it to <a href="mailto:support@wpforchurch.com">support</a>.' )

                actionButton.value = origValue;
                jQuery( actionButton ).removeClass( 'button-disabled' ).removeClass( 'disabled' );
                jQuery( actionButton ).prop( 'disabled', false );
            } );
    } );
</script>

<style>
    #import-log {
        max-height: 250px;
        min-height: 250px;
        overflow: scroll;
        overflow-x: auto;
        background: #002b36;
        color: #93a1a1;
        font-family: monospace;
        border: 1px solid #001d25;
        padding: 3px;
        margin-top: 1rem;
    }

    #image-showcase {
        display: flex;
        margin-bottom: .5rem;
    }

    #image-showcase > img {
        flex: 1 1 30%;
        max-height: 250px;
        max-width: 30%;
        box-shadow: 1px 1px 3px;
        margin: 0 .8rem;
    }

    #image-showcase > img:first-child {
        margin-left: 0 !important;
    }

    #image-showcase > img:last-child {
        margin-left: 0 !important;
    }

    #required-plugins-import > li::before {
        font-family: 'dashicons';
        font-size: 20px;
        top: 5px;
        position: relative;
    }

    #required-plugins-import > li:not(.active)::before {
        content: "\f158";
        color: #cc0000;
    }

    #required-plugins-import > li.active::before {
        content: "\f147";
        color: green;
    }

    #required-plugins-import > li.active {
        color: #444 !important;
    }

    #import-actions > .spinner {
        float: none !important;
    }
</style>
