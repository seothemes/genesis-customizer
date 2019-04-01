wp.customize.controlConstructor['kirki-box-shadow'] = wp.customize.Control.extend({

    boxShadow: {
        stringValue: '',
        horizontalLength: 0,
        verticalLength: 0,
        blurRadius: 0,
        spreadRadius: 0,
        color: '#000',
        inset: false
    },

    /**
     * Triggered when the control is ready.
     *
     * @since 1.0
     * @returns {void}
     */
    ready: function() {
        var control = this;

        control.boxShadow.stringValue = control.setting._value;
        control.setFromStringValue().setVisually();
        control.initColorpicker();
        control.adjustbackGround();

        jQuery( control.container.find( '.preview-object' ) ).draggable({
            containment: 'parent',
            create: function( event, ui ) {
                var width   = jQuery( control.container.find( '.preview-wrapper' ) ).width(),
                    height  = jQuery( control.container.find( '.preview-wrapper' ) ).height(),
                    left    = width / 2 - 25 - control.boxShadow.horizontalLength,
                    top     = height / 2 - 25 - control.boxShadow.verticalLength;

                control.combineValues().updatePreviewShadow().updateCoordinatesBox();
                jQuery( control.container.find( '.preview-object' ) ).css( 'top', top ).css( 'left', left );
                control.updatePreviewShadow();
            },
            drag: function( event, ui ) {
                control.boxShadow.horizontalLength = control.calculateHorizontalBoxShadow( ui.position.left );
                control.boxShadow.verticalLength   = control.calculateVerticalBoxShadow( ui.position.top );
                control.combineValues().updatePreviewShadow().updateCoordinatesBox().saveValue();
            }
        });

        jQuery( control.container.find( 'input[data-context="blur-radius"]' ) ).on( 'change', function() {
            control.boxShadow.blurRadius = jQuery( this ).val();
            control.combineValues().updatePreviewShadow().saveValue();
        });

        jQuery( control.container.find( 'input[data-context="spread-radius"]' ) ).on( 'change', function() {
            control.boxShadow.spreadRadius = jQuery( this ).val();
            control.combineValues().updatePreviewShadow().saveValue();
        });

        jQuery( control.container.find( '.kirki-color-control' ) ).on( 'change', function() {
            control.boxShadow.color = jQuery( this ).val();
            control.combineValues().updatePreviewShadow().saveValue();
        });

        jQuery( control.container.find( 'input[data-context="inset"]' ) ).on( 'change click', function() {
            control.boxShadow.inset = jQuery( this ).is( ':checked' );
            control.combineValues().updatePreviewShadow().saveValue();
        });
    },

    /**
     * Parses the string value and gets the sub-values we'll need.
     *
     * @since 1.0
     * @returns {Object} this
     */
    setFromStringValue: function() {
        var value   = this.boxShadow.stringValue.split( ' ' ),
            isInset = ( 'inset' === value[0] );

        if ( isInset ) {
            value.splice( 0, 1 );
        }

        this.boxShadow.horizontalLength = parseInt( value[0], 10 );
        this.boxShadow.verticalLength   = parseInt( value[1], 10 );
        this.boxShadow.blurRadius       = parseInt( value[2], 10 );
        this.boxShadow.spreadRadius     = parseInt( value[3], 10 );
        this.boxShadow.color            = value[4];
        this.boxShadow.inset            = isInset;

        return this;
    },

    /**
     * Visually updates the UI.
     *
     * @since 1.0
     * @returns {Object} this
     */
    setVisually: function() {
        jQuery( this.container.find( '.blur-radius' ) ).val( this.boxShadow.blurRadius );
        jQuery( this.container.find( '.spread-radius' ) ).val( this.boxShadow.spreadRadius );
        jQuery( this.container.find( '.kirki-color-control' ) ).val( this.boxShadow.color );
        jQuery( this.container.find( '.inset' ) ).attr( 'checked', this.boxShadow.inset );
    },

    /**
     * Combines the values to get the final CSS.
     *
     * @since 1.0
     * @returns {Object} this
     */
    combineValues: function() {
        this.boxShadow.stringValue = this.boxShadow.horizontalLength + 'px ' + this.boxShadow.verticalLength + 'px ' + this.boxShadow.blurRadius + 'px ' + this.boxShadow.spreadRadius + 'px ' + this.boxShadow.color;
        if ( this.boxShadow.inset ) {
            this.boxShadow.stringValue = 'inset ' + this.boxShadow.stringValue;
        }
        return this;
    },

    /**
     * Updates the box-shadow in the preview.
     *
     * @since 1.0
     * @returns {Object} this
     */
    updatePreviewShadow: function() {
        var control = this,
            element = ( this.boxShadow.inset ) ? '.preview-wrapper' : '.preview-object';

        jQuery( control.container.find( '.preview-wrapper, .preview-object' ) ).css( 'box-shadow', '' );

        jQuery( control.container.find( element ) ).css( 'box-shadow', control.boxShadow.stringValue );
        return this;
    },

    /**
     * Calculates the horizontal length of our box-shadow
     * by comparing the left position to the center of the container.
     *
     * @since 1.0
     * @param {int} left - The position from left.
     * @returns {int} - horizontal offset.
     */
    calculateHorizontalBoxShadow: function( left ) {
        var width = jQuery( this.container.find( '.preview-wrapper' ) ).width();
        return 0 - parseInt( left + 25 - width / 2, 10 );
    },

    /**
     * Calculates the vertical length of our box-shadow
     * by comparing the top position to the center of the container.
     *
     * @param {int} top - The position from top.
     * @returns {int} - vertical offset.
     */
    calculateVerticalBoxShadow: function( top ) {
        var height = jQuery( this.container.find( '.preview-wrapper' ) ).height();
        return 0 - parseInt( top + 25 - height / 2, 10 );
    },

    /**
     * Init the colorpicker.
     *
     * @since 1.0
     * @returns {void}
     */
    initColorpicker: function() {
        var control = this,
            picker = jQuery( control.container.find( '.kirki-color-control' ) ),
            clear;

        // Tweaks to make the "clear" buttons work.
        setTimeout( function() {
            clear = jQuery( control.container.find( '.kirki-input-container .wp-picker-clear' ) );
            if ( clear.length ) {
                clear.click( function() {
                    control.boxShadow.color = '';
                    control.adjustbackGround();
                });
            }
        }, 200 );

        // Saves our settings to the WP API
        picker.wpColorPicker({
            change: function() {

                // Small hack: the picker needs a small delay
                setTimeout( function() {
                    control.boxShadow.color = picker.val();
                    control.combineValues().updatePreviewShadow().saveValue();
                    control.adjustbackGround();
                }, 20 );
            }
        });
    },

    /**
     * Updates the coordinates box.
     *
     * @since 1.0
     * @returns {Object} this
     */
    updateCoordinatesBox: function() {
        jQuery( this.container.find( '.coordinates' ) ).html( this.boxShadow.horizontalLength + ', ' + this.boxShadow.verticalLength );
        return this;
    },

    /**
     * Adjust the background color so that the shadow is visible.
     *
     * @since 1.0
     */
    adjustbackGround: function() {
        if ( 0.6 > this.getRelativeLuminance( jQuery.Color( this.boxShadow.color ).alpha( 1 ) ) ) {
            jQuery( this.container.find( '.preview-wrapper' ) ).css( 'background-color', '#fff' );
            jQuery( this.container.find( '.preview-object' ) ).css( 'background-color', '#f2f2f2' );
            jQuery( this.container.find( '.preview-object' ) ).css( 'color', '#333' );
        } else {
            jQuery( this.container.find( '.preview-wrapper' ) ).css( 'background-color', '#000' );
            jQuery( this.container.find( '.preview-object' ) ).css( 'background-color', '#333' );
            jQuery( this.container.find( '.preview-object' ) ).css( 'color', '#f2f2f2' );
        }
    },

    /**
     * Gets the relative luminance from RGB.
     * Formula: http://www.w3.org/TR/2008/REC-WCAG20-20081211/#relativeluminancedef
     *
     * @since 1.0
     * @param {Object} $color - a jQuery.Color object.
     * @returns {float}
     */
    getRelativeLuminance: function( $color ) {
        return 0.2126 * this.qGetLumPart( $color.red() ) + 0.7152 * this.qGetLumPart( $color.green() ) + 0.0722 * this.qGetLumPart( $color.blue() );
    },

    /**
     * Get luminocity for a part.
     *
     * @since 1.0
     * @param {int|float} val - The value.
     * @returns {float}
     */
    qGetLumPart: function( val ) {
        val = val / 255;
        if ( 0.03928 >= val ) {
            return val / 12.92;
        }
        return Math.pow( ( ( val + 0.055 ) / 1.055 ), 2.4 );
    },

    /**
     * Saves the value.
     *
     * @since 1.0
     */
    saveValue: function() {
        jQuery( this.container.find( '.hidden-value' ) )
            .attr( 'value', JSON.stringify( this.boxShadow.stringValue ) )
            .trigger( 'change' );
        this.setting.set( this.boxShadow.stringValue );
        return this;
    }
});
