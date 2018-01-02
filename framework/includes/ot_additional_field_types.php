<?php

/**
* Common Required: Bootstrap
*/
add_action('ot_admin_styles_before', 'bootstrap_nq_styles');
function bootstrap_nq_styles() {
    wp_enqueue_style( 'bootstrap337', apply_filters('ot_bootstrap_css', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'), false, '3.3.7' );
}

add_action('ot_admin_scripts_before', 'bootstrap_nq_scripts');
function bootstrap_nq_scripts() {
    wp_enqueue_script( 'bootstrap-js', apply_filters('ot_bootstrap_js', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'), array('jquery'), '3.3.7' );
}


//------------------------------------------------------------------------------------------------------

/**
 * Summernote Editor (Field Type = editor) by Ruturaaj
 */

add_action('ot_admin_styles_before', 'snote_nq_styles');
function snote_nq_styles() {
    wp_enqueue_style( 'summernote-css', OT_URL . 'assets/vendor/summernote/summernote.css', false, OT_VERSION );
}

add_action('ot_admin_scripts_before', 'snote_nq_scripts');
function snote_nq_scripts() {
    wp_enqueue_script( 'summernote-editor', OT_URL . 'assets/vendor/summernote/summernote.min.js', array('jquery'), '0.0.8' );
}

 if (!function_exists('ot_type_editor')) {
     function ot_type_editor($args = array()) {

        /* turns arguments array into variables */
        extract( $args );

        /* verify a description */
        $has_desc = $field_desc ? true : false;

        echo '<div class="format-setting type-editor simple ' . ( $has_desc ? 'has-desc' : 'no-desc' ) . '">';

             /* description */
            echo $has_desc ? '<div class="description">' . htmlspecialchars_decode( $field_desc ) . '</div>' : '';

            /* format setting inner wrapper */
            echo '<div class="format-setting-inner">';

                /* build textarea for Summernote */
                echo '<textarea class="summernote-editor ot-html-editor" id="textarea_' . esc_attr( $field_id ) . '" name="' . esc_attr( $field_name ) .'">' . esc_attr( $field_value ) . '</textarea>';


            echo '</div>';

        echo '</div>';

     }
 }

 //------------------------------------------------------------------------------------------------------

 /**
 * Bootstrap Toggle (http://www.bootstraptoggle.com)
 */

add_action('ot_admin_styles_before', 'bttoggle_nq_styles');
function bttoggle_nq_styles() {
    wp_enqueue_style( 'bttoggle-css', OT_URL . 'assets/vendor/bootstrap-toggle/css/bootstrap-toggle.min.css', false, '2.2.0' );
}

add_action('ot_admin_scripts_before', 'bttoggle_nq_scripts');
function bttoggle_nq_scripts() {
    wp_enqueue_script( 'bttoggle-js', OT_URL . 'assets/vendor/bootstrap-toggle/js/bootstrap-toggle.min.js', array('jquery'), '2.2.0' );

}

if (!function_exists('ot_type_bootstrap_toggle')) {
    function ot_type_bootstrap_toggle( $args = array() ) {

        extract( $args );

        /* verify a description */
        $has_desc = $field_desc ? true : false;

        /* format setting outer wrapper */
        echo '<div class="format-setting type-bootstrap-toggle ' . ( $has_desc ? 'has-desc' : 'no-desc' ) . '">';

          /* description */
          echo $has_desc ? '<div class="description">' . htmlspecialchars_decode( $field_desc ) . '</div>' : '';

          /* format setting inner wrapper */
          echo '<div class="format-setting-inner">';

            /* build checkbox */
            echo '<p>';
              echo '<input type="checkbox" name="' . esc_attr( $field_name ) . '" id="' . esc_attr( $field_id ) . '" ' . ( isset( $field_value ) ? checked : '' ) . ' class="option-tree-ui-bootstrap-toggle ' . esc_attr( $field_class ) . '" />';
              //echo '<label for="' . esc_attr( $field_id ) . '-' . esc_attr( $key ) . '">' . esc_attr( $choice['label'] ) . '</label>';
            echo '</p>';

            $field_settings['on'] = ($field_settings['on'] != '') ? $field_settings['on'] : 'Enabled';
            $field_settings['off'] = ($field_settings['off'] != '') ? $field_settings['off'] : 'Disabled';
            $field_settings['onstyle'] = ($field_settings['onstyle'] != '') ? $field_settings['onstyle'] : 'primary';
            $field_settings['offstyle'] = ($field_settings['offstyle'] != '') ? $field_settings['offstyle'] : 'default';
            $field_settings['width'] = ($field_settings['width'] != '') ? $field_settings['width'] : '100';
            $field_settings['size'] = ($field_settings['size'] != '') ? $field_settings['size'] : 'normal';

            $field_value = ($field_value != '') ? $field_value : 'off';

            echo "<script>
                $(function() {
                    $('#". esc_attr( $field_id ) . "').bootstrapToggle({
                      on: '". esc_attr($field_settings['on']) . "',
                      off: '". esc_attr($field_settings['off']) . "',
                      onstyle: '". esc_attr($field_settings['onstyle']) . "',
                      offstyle: '". esc_attr($field_settings['offstyle']) . "',
                      size: '". esc_attr($field_settings['size']) . "',
                      width: '". esc_attr($field_settings['width']) . "',
                    });
                    $('#". esc_attr( $field_id ) . "').bootstrapToggle('". esc_attr($field_value) . "');
                } );
            </script>";

          echo '</div>';

        echo '</div>';
    }
}

//------------------------------------------------------------------------------------------------------

/*
* Masked Input (http://igorescobar.github.io/jQuery-Mask-Plugin/)
*/

add_action('ot_admin_scripts_before', 'maskedinput_nq_scripts');
function maskedinput_nq_scripts() {
    wp_enqueue_script( 'maskedinput-js', OT_URL . 'assets/vendor/masked-edit/js/jquery.mask.min.js', array('jquery'), '2.2.0' );
}

if (! function_exists('ot_type_masked_textbox')) {

    function ot_type_masked_textbox( $args = array()) {

        extract($args);

        /* verify a description */
        $has_desc = $field_desc ? true : false;

        /* field settings */
        $field_settings['mask'] = ($field_settings['mask'] != '') ? $field_settings['mask'] : '99/99/9999';
        $field_settings['placeholder'] = ($field_settings['placeholder'] != '') ? ',{placeholder:"' . $field_settings['placeholder'] . '"}' : '';

        /* format setting outer wrapper */
        echo '<div class="format-setting type-masked-textbox ' . ( $has_desc ? 'has-desc' : 'no-desc' ) . '">';

          /* description */
          echo $has_desc ? '<div class="description">' . htmlspecialchars_decode( $field_desc ) . '</div>' : '';

          /* format setting inner wrapper */
          echo '<div class="format-setting-inner">';

            /* build text input */
            echo '<input type="text" name="' . esc_attr( $field_name ) . '" id="' . esc_attr( $field_id ) . '" value="' . esc_attr( $field_value ) . '" class="widefat option-tree-ui-input ' . esc_attr( $field_class ) . '" />';
            echo "<script>
                jQuery(function($){
                   $('#". esc_attr( $field_id ) . "').mask('". $field_settings['mask'] . "'" . $field_settings['placeholder'] . ");
                });
            </script>";
          echo '</div>';

        echo '</div>';

    }
}

//------------------------------------------------------------------------------------------------------

/*
* Icon Picker
*/

add_action('ot_admin_styles_before', 'iconpicker_nq_styles');
function iconpicker_nq_styles() {

    wp_enqueue_style( 'iconpicker-icons-default', OT_URL . 'assets/vendor/iconpicker/css/icons.css', false, '1.10.0' );

    $icon_fonts = apply_filters('ot_icon_fonts', array(
            'font-awesome' => 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css',
            'ionicons' => 'http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css',
            'material-design' => 'https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css',
            'octicons' => 'https://cdnjs.cloudflare.com/ajax/libs/octicons/4.4.0/font/octicons.min.css',
            'typicons' => 'https://cdnjs.cloudflare.com/ajax/libs/typicons/2.0.9/typicons.min.css',
            'weather-icons' => 'https://cdnjs.cloudflare.com/ajax/libs/weather-icons/1.3.1/css/weather-icons.min.css',
            'flag-icons' => 'https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/2.8.0/css/flag-icon.min.css'));

    foreach($icon_fonts as $font => $url) {
        wp_enqueue_style( 'iconpicker-icons-' . $font, $url, false, '' );
    }

    wp_enqueue_style( 'iconpicker-css', OT_URL . 'assets/vendor/iconpicker/css/bootstrap-iconpicker.min.css', false, '1.10.0' );

}

add_action('ot_admin_scripts_before', 'iconpicker_nq_scripts');
function iconpicker_nq_scripts() {
    wp_enqueue_script( 'iconpicker', OT_URL . 'assets/vendor/iconpicker/js/iconpicker.js', array('jquery'), '1.9.0' );
}

if (!function_exists('ot_type_iconpicker')) {

    function ot_type_iconpicker( $args = array() ) {

        extract($args);

        /* verify a description */
        $has_desc = $field_desc ? true : false;

        /* format setting outer wrapper */
        echo '<div class="format-setting type-iconpicker ' . ( $has_desc ? 'has-desc' : 'no-desc' ) . '">';

          /* description */
          echo $has_desc ? '<div class="description">' . htmlspecialchars_decode( $field_desc ) . '</div>' : '';

          /* format setting inner wrapper */
          echo '<div class="format-setting-inner">';

            /* build text input */
            echo "<div class='input-group ". esc_attr( $field_class ) . "'>
                    <input type='text' name='" . esc_attr($field_name) . "' id='". esc_attr($field_id) . "' class='form-control icon-name' placeholder='Select icon...' aria-label='Select icon...' readonly='readonly'>
                    <span class='input-group-btn'>
                        <button class='btn btn-default icon-picker' type='button' id='". esc_attr($field_id) . "-icpicker'></button>
                    </span>
                </div>";


            $field_settings['cols'] = ($field_settings['cols'] != '') ? $field_settings['cols'] : '5';
            $field_settings['rows'] = ($field_settings['rows'] != '') ? $field_settings['rows'] : '5';
            $field_settings['iconset'] = ($field_settings['iconset'] != '') ? $field_settings['iconset'] : 'glyphicon';
            $field_settings['footer'] = ($field_settings['footer'] != '') ? $field_settings['footer'] : 'true';
            $field_settings['header'] = ($field_settings['header'] != '') ? $field_settings['header'] : 'true';
            $field_settings['search'] = ($field_settings['search'] != '') ? $field_settings['search'] : 'true';
            $field_settings['search_text'] = ($field_settings['search_text'] != '') ? $field_settings['search_text'] : 'Search';
            $field_settings['selected_class'] = ($field_settings['selected_class'] != '') ? $field_settings['selected_class'] : 'btn-success';


            echo "<script>
                jQuery(function($) {
                    jQuery('#". esc_attr($field_id) . "-icpicker').iconpicker({
                        align: 'center', // Only in div tag
                        arrowClass: 'btn-default',
                        arrowPrevIconClass: 'glyphicon glyphicon-chevron-left',
                        arrowNextIconClass: 'glyphicon glyphicon-chevron-right',
                        cols: " . $field_settings['cols'] . ",
                        footer: " . $field_settings['footer'] . ",
                        header: " . $field_settings['header'] . ",
                        icon: '',
                        iconset: '" . $field_settings['iconset'] . "',
                        labelHeader: '{0} of {1} pages',
                        labelFooter: '{0} - {1} of {2} icons',
                        placement: 'bottom', // Only in button tag
                        rows: 5,
                        search: " . $field_settings['search'] . ",
                        searchText: '" . $field_settings['search_text'] . "',
                        selectedClass: '" . $field_settings['selected_class'] . "',
                        unselectedClass: ''
                    }).on('change', function(e){
                        if (e) { jQuery('#" . esc_attr($field_id) . "').val(e.icon); }
                    });
                    jQuery('#". esc_attr($field_id) . "-icpicker').iconpicker('setIcon', '". esc_attr($field_value) . "');
                });
            </script>";
          echo '</div>';

        echo '</div>';


    }

}

//------------------------------------------------------------------------------------------------------

/**
* TouchSpin
*/

add_action('ot_admin_styles_after', 'touchspin_nq_styles');
function touchspin_nq_styles() {
    wp_enqueue_style( 'touchspin', OT_URL . "assets/vendor/touchspin/css/jquery.bootstrap-touchspin.min.css" , false, '3.1.2' );
}

add_action('ot_admin_scripts_before', 'touchspin_nq_scripts');
function touchspin_nq_scripts() {
    wp_enqueue_script( 'touchspin-js', OT_URL . "assets/vendor/touchspin/js/jquery.bootstrap-touchspin.min.js" , array('jquery'), '3.1.2' );
}

if (!function_exists('ot_type_touchspin')) {
    function ot_type_touchspin( $args = array()) {

        extract($args);

        /* verify a description */
        $has_desc = $field_desc ? true : false;

        /* format setting outer wrapper */
        echo '<div class="format-setting type-touchspin ' . ( $has_desc ? 'has-desc' : 'no-desc' ) . '">';

          /* description */
          echo $has_desc ? '<div class="description">' . htmlspecialchars_decode( $field_desc ) . '</div>' : '';

          /* format setting inner wrapper */
          echo '<div class="format-setting-inner">';

            /* build text input */
            //echo '<input type="text" name="' . esc_attr( $field_name ) . '" id="' . esc_attr( $field_id ) . '" value="' . esc_attr( $field_value ) . '" class="widefat option-tree-ui-input field-touchspin ' . esc_attr( $field_class ) . '" />';
            echo '<input id="'. esc_attr($field_id) . '" type="text" value="'. esc_attr($field_value) . '" name="'. esc_attr($field_name) . '">';
            echo "<script>
            $(function() {
                $('#" . esc_attr($field_id) . "').TouchSpin({
                    min: 0,
                    max: 100,
                    step: 1,
                    decimals: 0,
                    boostat: 10,
                    maxboostedstep: 10,
                    prefix: 'Size:',
                    postfix: '%',
                    verticalbuttons: false,
                    verticalupclass: 'glyphicon glyphicon-chevron-up',
                    verticaldownclass: 'glyphicon glyphicon-chevron-down',
                });
            });
            </script>";

          echo '</div>';

        echo '</div>';

    }
}

//------------------------------------------------------------------------------------------------------

/*
*   Email Autocomplete
*/

/*
add_action('ot_admin_styles_after', 'email_nq_styles');
function email_nq_styles() {
    wp_enqueue_style( 'email', OT_URL . "assets/vendor/touchspin/css/jquery.bootstrap-touchspin.min.css" , false, '3.1.2' );
}
*/

add_action('ot_admin_scripts_before', 'email_nq_scripts');
function email_nq_scripts() {
    //wp_enqueue_script( 'jquery20-js', "http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js" , array(), '2.0.0' );
    wp_enqueue_script( 'email-js', OT_URL . "assets/vendor/email-autocomplete/js/jquery.email-autocomplete.min.js" , array('jquery'), '0.1.3' );
}

if (!function_exists('ot_type_email')) {
    function ot_type_email( $args = array()) {

        extract($args);

        /* verify a description */
        $has_desc = $field_desc ? true : false;

        /* format setting outer wrapper */
        echo '<div class="format-setting type-email ' . ( $has_desc ? 'has-desc' : 'no-desc' ) . '">';

          /* description */
          echo $has_desc ? '<div class="description">' . htmlspecialchars_decode( $field_desc ) . '</div>' : '';

          /* format setting inner wrapper */
          echo '<div class="format-setting-inner">';

          $field_settings['placeholder'] = ($field_settings['placeholder'] != '') ? $field_settings['placeholder'] : '';
          $custom_domains = ($field_settings['domains'] != '') ? $field_settings['domains'] : '';

            if ($custom_domains != '') {
                if (strpos($custom_domains, ',') !== false) {
                    $domains = explode(',', $custom_domains);
                    $my_domains = "[";
                    foreach($domains as $value) {
                        $my_domains .= "'" . trim($value) . "',";
                    }
                    $my_domains .= "]";
                }
                else {
                    $my_domains = "['". $custom_domains . "']";
                }
            }
            else {
                $my_domains = '';
            }

            /* build control */
            echo '<input type="email" value="'. esc_attr($field_value) . '" class="widefat option-tree-ui-input ' . esc_attr( $field_class ) . '" name="'. esc_attr($field_name) . '" id="'. esc_attr($field_id) . '">';
            echo "<script>
            (function($){
                $(function() {
                  $('#". esc_attr($field_id) . "').emailautocomplete({domains: ". $my_domains . " });
                  });
              }(jQuery));
            </script>";
          echo '</div>';

        echo '</div>';

    }
}

//------------------------------------------------------------------------------------------------------

/*
*   Clockpicker
*/

add_action('ot_admin_styles_after', 'clockpicker_nq_styles');
function clockpicker_nq_styles() {
    wp_enqueue_style( 'clockpicker', OT_URL . "assets/vendor/clockpicker/css/bootstrap-clockpicker.min.css", false, '3.1.2' );
}

add_action('ot_admin_scripts_before', 'clockpicker_nq_scripts');
function clockpicker_nq_scripts() {
    wp_enqueue_script( 'clockpicker-js', OT_URL . "assets/vendor/clockpicker/js/bootstrap-clockpicker.min.js" , array('jquery'), '3.1.2' );
}

if (!function_exists('ot_type_clockpicker')) {
    function ot_type_clockpicker( $args = array()) {

        extract($args);

        /* verify a description */
        $has_desc = $field_desc ? true : false;

        /* format setting outer wrapper */
        echo '<div class="format-setting type-clockpicker ' . ( $has_desc ? 'has-desc' : 'no-desc' ) . '">';

          /* description */
          echo $has_desc ? '<div class="description">' . htmlspecialchars_decode( $field_desc ) . '</div>' : '';

          /* format setting inner wrapper */
          echo '<div class="format-setting-inner">';

            /* build text input */
            echo '<div id="'. esc_attr($field_id) . '-clockpicker" class="input-group clockpicker">
                    <input type="text" name="'. esc_attr($field_name) . '" id="'. esc_attr($field_id) . '" class="form-control '. esc_attr($field_class) . '" value="'. esc_attr($field_value) . '">
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-time"></span>
                    </span>
                </div>';

            $field_settings['done_text'] = ($field_settings['done_text'] != '') ? $field_settings['done_text'] : 'Select';
            $field_settings['auto_close'] = ($field_settings['auto_close'] != '') ? $field_settings['auto_close'] : 'false';
            $field_settings['placement'] = ($field_settings['placement'] != '') ? $field_settings['placement'] : 'top';
            $field_settings['align'] = ($field_settings['align'] != '') ? $field_settings['align'] : 'left';
            $default = ($field_value != '') ? $field_value : 'now';

            echo "<script>$(function() {
                    $('#". esc_attr($field_id) . "-clockpicker').clockpicker({
                        donetext: '". $field_settings['done_text'] . "',
                        autoclose: ". $field_settings['auto_close'] . ",
                        default: '". $default . "',
                        placement: '". $field_settings['placement'] . "',
                        align: '". $field_settings['align'] . "',
                    });
                });</script>";

          echo '</div>';

        echo '</div>';

    }
}

//------------------------------------------------------------------------------------------------------

/*
*   DateDropper
*/

add_action('ot_admin_styles_after', 'datedropper_nq_styles');
function datedropper_nq_styles() {
    wp_enqueue_style( 'datedropper', OT_URL . "assets/vendor/datedropper/css/datedropper.min.css", false, '3.1.2' );
}

add_action('ot_admin_scripts_before', 'datedropper_nq_scripts');
function datedropper_nq_scripts() {
    wp_enqueue_script( 'datedropper-js', OT_URL . "assets/vendor/datedropper/js/datedropper.min.js" , array('jquery'), '3.1.2' );
}

if (!function_exists('ot_type_datedropper')) {
    function ot_type_datedropper( $args = array()) {

        extract($args);

        /* verify a description */
        $has_desc = $field_desc ? true : false;

        /* format setting outer wrapper */
        echo '<div class="format-setting type-datedropper ' . ( $has_desc ? 'has-desc' : 'no-desc' ) . '">';

          /* description */
          echo $has_desc ? '<div class="description">' . htmlspecialchars_decode( $field_desc ) . '</div>' : '';

          /* format setting inner wrapper */
          echo '<div class="format-setting-inner">';

            $data_attr = "";

            foreach($field_settings as $setting => $value) {
                $data_attr .= "data-" . $setting . " = '" . $value . "' ";
            }

            $default_date = "";

            if (esc_attr($field_value) != '') {
                $value = strtotime(esc_attr($field_value));
                $default_date = 'data-default-date = "'. date('m/d/Y', $value) . '" ';
            }

            /* build control */
            echo "<div class='input-group date-dropper'>
                    <span class='input-group-addon'><i class='glyphicon glyphicon-calendar'></i></span>
                    <input type='text' name='". esc_attr($field_name) . "' id='". esc_attr($field_id) . "' value='". esc_attr($field_value) . "' class='form-control ". esc_attr($field_class) . "' data-init-set = 'false' " . $default_date . $data_attr . " />
                </div>";

            echo "<script>
                    jQuery(function() {
                        jQuery('#". esc_attr($field_id) . "').dateDropper();
                    });
                </script>";

          echo '</div>';

        echo '</div>';
        
    }
}







