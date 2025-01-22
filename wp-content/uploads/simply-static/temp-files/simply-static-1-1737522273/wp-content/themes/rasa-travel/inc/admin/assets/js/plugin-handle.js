/**
 * Get Started button on dashboard notice.
 *
 * @package Rasa Travel
 */

jQuery(document).ready(function($) {
    var WpAjaxurl       = ogAdminObject.ajax_url;
    var _wpnonce        = ogAdminObject._wpnonce;
    var buttonStatus    = ogAdminObject.buttonStatus;

    /**
     * Popup on click demo import if creativ demo importer plugin is not activated.
     */
    if( buttonStatus === 'disable' ) $( '.rasa-travel-demo-import' ).addClass( 'disabled' );

    switch( buttonStatus ) {
        case 'activate' :
            $( '.rasa-travel-get-started' ).on( 'click', function() {
                var _this = $( this );
                rasa_travel_do_plugin( 'rasa_travel_activate_plugin', _this );
            });
            $( '.rasa-travel-activate-demo-import-plugin' ).on( 'click', function() {
                var _this = $( this );
                rasa_travel_do_plugin( 'rasa_travel_activate_plugin', _this );
            });
            break;
        case 'install' :
            $( '.rasa-travel-get-started' ).on( 'click', function() {
                var _this = $( this );
                rasa_travel_do_plugin( 'rasa_travel_install_plugin', _this );
            });
            $( '.rasa-travel-install-demo-import-plugin' ).on( 'click', function() {
                var _this = $( this );
                rasa_travel_do_plugin( 'rasa_travel_install_plugin', _this );
            });
            break;
        case 'redirect' :
            $( '.rasa-travel-get-started' ).on( 'click', function() {
                var _this = $( this );
                location.href = _this.data( 'redirect' );
            });
            break;
    }
    
    rasa_travel_do_plugin = function ( ajax_action, _this ) {
        $.ajax({
            method : "POST",
            url : WpAjaxurl,
            data : ({
                'action' : ajax_action,
                '_wpnonce' : _wpnonce
            }),
            beforeSend: function() {
                var loadingTxt = _this.data( 'process' );
                _this.addClass( 'updating-message' ).text( loadingTxt );
            },
            success: function( response ) {
                if( response.success ) {
                    var loadedTxt = _this.data( 'done' );
                    _this.removeClass( 'updating-message' ).text( loadedTxt );
                }
                location.href = _this.data( 'redirect' );
            }
        });
    }

    $('.mt-action-btn').click(function(){
        var _this = $(this), actionBtnStatus = _this.data('status'), pluginSlug = _this.data('slug');
        console.log(actionBtnStatus);
        switch(actionBtnStatus){
            case 'install':
                rasa_travel_do_free_plugin( 'rasa_travel_install_free_plugin', pluginSlug, _this );
                break;

            case 'active':
                rasa_travel_do_free_plugin( 'rasa_travel_activate_free_plugin', pluginSlug, _this );
                break;
        }

    });

    rasa_travel_do_free_plugin = function ( ajax_action, pluginSlug, _this ) {
        $.ajax({
            method : "POST",
            url : WpAjaxurl,
            data : ({
                'action' : ajax_action,
                'plugin_slug': pluginSlug,
                '_wpnonce' : _wpnonce
            }),
            beforeSend: function() {
                var loadingTxt = _this.data( 'process' );
                _this.addClass( 'updating-message' ).text( loadingTxt );
            },
            success: function( response ) {
                if( response.success ) {
                    var loadedTxt = _this.data( 'done' );
                    _this.removeClass( 'updating-message' ).text( loadedTxt );
                }
                location.href = _this.data( 'redirect' );
            }
        });
    }

});