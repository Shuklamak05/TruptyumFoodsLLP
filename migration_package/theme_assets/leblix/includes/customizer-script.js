"use strict";
jQuery(window).load(function($) {
    wp.customize(
        'header-style',
        function(header_style) {
            var header_height = '100';
            var header_bgcolor = 'white';
            var global_color = '#01cd61';
            var light_bg_color = '#f2f6fb';
            var blackish_bg_color = '#101010';
            var secondary_color = '#003281';
            var menu_bgcolor = 'white';
            var main_menu_typography = {
                'font-family': 'Poppins',
                'variant': '600',
                'font-size': '13px',
                'line-height': '24px',
                'letter-spacing': '0.15px',
                'color': '#101010',
                'text-transform': 'capitalize',
                'font-backup': ''
            };
            var sticky_header_bgcolor = 'white';
            var main_menu_active_color = 'globalcolor';
            var main_menu_sticky_color = '#101010';
            var preheader_enable = false;
            var logo_height = '40';
            var preheader_bgcolor = 'blackish ';
            var preheader_text_color = 'white';
            var titlebar_height = '300';
            var titlebar_bgcolor = 'transparent';
            var titlebar_background = {
                'background-color': '#003281',
                'background-repeat': 'no-repeat',
                'background-position': 'center center',
                'background-size': 'cover',
                'background-attachment': 'scroll',
                'background-image': cspt_admin_js_variables.theme_path + '/images/title-bg.jpg',
            };
            var titlebar_heading_typography = {
                'font-family': 'Poppins',
                'variant': '700',
                'font-size': '44px',
                'line-height': '60px',
                'letter-spacing': '-2px',
                'color': '#fff',
                'text-transform': 'none',
                'font-backup': '',
            };
            var titlebar_subheading_typography = {
                'font-family': 'Archivo',
                'variant': '600',
                'font-size': '18px',
                'line-height': '1.5',
                'letter-spacing': '0px',
                'color': '#101010',
                'text-transform': 'none',
                'font-backup': '',
            };
            var titlebar_breadcrumb_typography = {
                'font-family': 'Archivo',
                'variant': '500',
                'font-size': '15px',
                'line-height': '1.5',
                'letter-spacing': '0px',
                'color': '#101010',
                'text-transform': 'uppercase',
                'font-backup': '',
            };
            var logo = cspt_admin_js_variables.theme_path + '/images/logo.png';
            var sticky_logo = '';
            header_style.bind(function(value) {
                if (value == '1') { // Default header style         
                    wp.customize('global-color').set(global_color);
                    wp.customize('light-bg-color').set(light_bg_color);
                    wp.customize('blackish-bg-color').set(blackish_bg_color);
                    wp.customize('secondary-color').set(secondary_color);
                    wp.customize('header-height').set(header_height);
                    wp.customize('header-bgcolor').set(header_bgcolor);
                    wp.customize('menu-bgcolor').set(menu_bgcolor);
                    wp.customize('main-menu-typography').set(main_menu_typography);
                    wp.customize('header-search').set(false);
                    wp.customize('header-btn-text').set('');
                    wp.customize('header-btn-url').set('');
                    wp.customize('sticky-header-bgcolor').set(sticky_header_bgcolor);
                    wp.customize('main-menu-active-color').set(main_menu_active_color);
                    wp.customize('main-menu-sticky-color').set(main_menu_sticky_color);
                    wp.customize('preheader-enable').set(preheader_enable);
                    wp.customize('logo-height').set(logo_height);
                    wp.customize('preheader-bgcolor').set(preheader_bgcolor);
                    wp.customize('preheader-text-color').set(preheader_text_color);
                    wp.customize('titlebar-height').set(titlebar_height);
                    wp.customize('titlebar-bgcolor').set(titlebar_bgcolor);
                    wp.customize('titlebar-background').set(titlebar_background);
                    wp.customize('titlebar-heading-typography').set(titlebar_heading_typography);
                    wp.customize('titlebar-subheading-typography').set(titlebar_subheading_typography);
                    wp.customize('titlebar-breadcrumb-typography').set(titlebar_breadcrumb_typography);
                    wp.customize('logo').set(logo);
                    wp.customize('sticky-logo').set(sticky_logo);

                } else if (value == '2') { // Header style 2 
                    wp.customize('global-color').set('#01cd61');
                    wp.customize('light-bg-color').set('#f2f6fb');
                    wp.customize('blackish-bg-color').set('#101010');
                    wp.customize('secondary-color').set(secondary_color);
                    wp.customize('header-height').set('100');
                    wp.customize('header-bgcolor').set(header_bgcolor);
                    wp.customize('menu-bgcolor').set(menu_bgcolor);
                    wp.customize('main-menu-typography').set({
                        'font-family': 'Poppins',
                        'variant': '600',
                        'font-size': '14px',
                        'line-height': '24px',
                        'letter-spacing': '0.15px',
                        'color': '#101010',
                        'text-transform': 'capitalize',
                        'font-backup': '',
                    });
                    wp.customize('header-search').set(true);
                    wp.customize('preheader-enable').set(true);
                    wp.customize('sticky-header-bgcolor').set(sticky_header_bgcolor);
                    wp.customize('main-menu-active-color').set(main_menu_active_color);
                    wp.customize('preheader-left').set('<ul class="cspt-contact-info"><li><i class="cspt-base-icon-email"></i> <a href="mailto:hello@infoleblix.com">hello@infoleblix.com</a></li><li><i class="cspt-base-icon-map-o"></i> 125, Suitland Street, Beverley Rd</li></ul>');
                    wp.customize('preheader-right').set('<ul class="cspt-contact-info"><li><i class="cspt-base-icon-clock-1"></i> Mon - Sat 8.00 - 18.00, Sun - Closed</li><li>[cspt-social-links]</li></ul>');
                    wp.customize('preheader-bgcolor').set('transparent');
                    wp.customize('preheader-text-color').set('blackish');
                    wp.customize('header-contact-btn-text').set('Have a question?');
                    wp.customize('header-contact-btn-text2').set('+1-202-555-0136');
                    wp.customize('header-contact-btn-url').set('#');
                    wp.customize('header-btn-text').set('Get a quote');
                    wp.customize('header-btn-url').set('#');
                    wp.customize('logo-height').set('50');
                    wp.customize('titlebar-height').set('430');
                    wp.customize('titlebar-bgcolor').set('transparent');
                    wp.customize('titlebar-background').set({
                        'background-color': '#f7f7f7',
                        'background-repeat': 'no-repeat',
                        'background-position': 'center center',
                        'background-size': 'cover',
                        'background-attachment': 'scroll',
                        'background-image': cspt_admin_js_variables.theme_path + '/images/title-bg.jpg',
                    });
                    wp.customize('titlebar-heading-typography').set({
                        'font-family': 'Poppins',
                        'variant': '700',
                        'font-size': '44px',
                        'line-height': '60px',
                        'letter-spacing': '-2px',
                        'color': '#101010',
                        'text-transform': 'none',
                        'font-backup': ''
                    });
                    wp.customize('titlebar-subheading-typography').set({
                        'font-family': 'Archivo',
                        'variant': '600',
                        'font-size': '18px',
                        'line-height': '1.5',
                        'letter-spacing': '0px',
                        'color': '#101010',
                        'text-transform': 'none',
                        'font-backup': '',
                    });
                    wp.customize('titlebar-breadcrumb-typography').set({
                        'font-family': 'Archivo',
                        'variant': '500',
                        'font-size': '15px',
                        'line-height': '1.5',
                        'letter-spacing': '0px',
                        'color': '#101010',
                        'text-transform': 'uppercase',
                        'font-backup': ''
                    });
                    wp.customize('logo').set(cspt_admin_js_variables.theme_path + '/images/logo-white.png');
                    wp.customize('sticky-logo').set(cspt_admin_js_variables.theme_path + '/images/logo-white.png');

                } else if (value == '3') { // Header style 3 
                    wp.customize('global-color').set('#01cd61');
                    wp.customize('light-bg-color').set('#f2f6fb');
                    wp.customize('blackish-bg-color').set('#101010');
                    wp.customize('secondary-color').set(secondary_color);
                    wp.customize('header-height').set('100');
                    wp.customize('header-bgcolor').set(header_bgcolor);
                    wp.customize('menu-bgcolor').set(menu_bgcolor);
                    wp.customize('main-menu-typography').set({
                        'font-family': 'Poppins',
                        'variant': '600',
                        'font-size': '14px',
                        'line-height': '24px',
                        'letter-spacing': '0.15px',
                        'color': '#101010',
                        'text-transform': 'capitalize',
                        'font-backup': '',
                    });
                    wp.customize('header-search').set(true);
                    wp.customize('sticky-header-bgcolor').set(sticky_header_bgcolor);
                    wp.customize('main-menu-active-color').set(main_menu_active_color);
                    wp.customize('preheader-enable').set(true);
                    wp.customize('preheader-left').set('<ul class="cspt-contact-info"><li><i class="cspt-base-icon-email"></i><a href="mailto:hello@infoleblix.com">hello@infoleblix.com</a></li><li><i class="cspt-base-icon-map-o"></i> 125, Suitland Street, Beverley Rd</li></ul>');
                    wp.customize('preheader-right').set('<ul class="cspt-contact-info"><li><i class="cspt-base-icon-clock-1"></i> Mon - Sat 8.00 - 18.00, Sun - Closed</li><li>[cspt-social-links]</li></ul>');
                    wp.customize('preheader-bgcolor').set('secondarycolor');
                    wp.customize('preheader-text-color').set('white');
                    wp.customize('header-btn-text').set('Get a quote');
                    wp.customize('header-btn-url').set('#');
                    wp.customize('logo-height').set('45');
                    wp.customize('titlebar-height').set('530');
                    wp.customize('titlebar-bgcolor').set('transparent');
                    wp.customize('titlebar-background').set({
                        'background-color': '#f6f6f6',
                        'background-repeat': 'no-repeat',
                        'background-position': 'center center',
                        'background-size': 'cover',
                        'background-attachment': 'scroll',
                        'background-image': cspt_admin_js_variables.theme_path + '/images/title-bg.jpg',
                    });
                    wp.customize('titlebar-heading-typography').set({
                        'font-family': 'Poppins',
                        'variant': '700',
                        'font-size': '44px',
                        'line-height': '60px',
                        'letter-spacing': '-2px',
                        'color': '#101010',
                        'text-transform': 'none',
                        'font-backup': ''
                    });
                    wp.customize('titlebar-subheading-typography').set({
                        'font-family': 'Archivo',
                        'variant': '600',
                        'font-size': '18px',
                        'line-height': '1.5',
                        'letter-spacing': '0px',
                        'color': '#101010',
                        'text-transform': 'none',
                        'font-backup': '',
                    });
                    wp.customize('titlebar-breadcrumb-typography').set({
                        'font-family': 'Archivo',
                        'variant': '500',
                        'font-size': '15px',
                        'line-height': '1.5',
                        'letter-spacing': '0px',
                        'color': '#101010',
                        'text-transform': 'uppercase',
                        'font-backup': ''
                    });
                    wp.customize('logo').set(cspt_admin_js_variables.theme_path + '/images/logo.png');
                    wp.customize('sticky-logo').set(cspt_admin_js_variables.theme_path + '/images/logo.png');

                } else if (value == '4') { // Header style 4 
                    wp.customize('global-color').set('#3ba934');
                    wp.customize('light-bg-color').set('#f6f7fb');
                    wp.customize('blackish-bg-color').set('#21234b');
                    wp.customize('secondary-color').set('#21234b');
                    wp.customize('header-height').set('100');
                    wp.customize('header-bgcolor').set('secondarycolor');
                    wp.customize('menu-bgcolor').set('transparent');
                    wp.customize('main-menu-typography').set({
                        'font-family': 'Poppins',
                        'variant': '600',
                        'font-size': '13px',
                        'line-height': '24px',
                        'letter-spacing': '0.15px',
                        'color': '#ffffff',
                        'text-transform': 'capitalize',
                        'font-backup': '',
                    });
                    var header_box_title_typography = {
                        'font-family': 'Poppins',
                        'variant': '800',
                        'font-size': '14px',
                        'line-height': '24px',
                        'letter-spacing': '0px',
                        'color': '#000',
                        'text-transform': 'none',
                        'font-backup': '',
                    }
                    var header_box_content_typography = {
                        'font-family': 'Poppins',
                        'variant': '500',
                        'font-size': '14px',
                        'line-height': '18px',
                        'letter-spacing': '0px',
                        'color': '#666',
                        'text-transform': 'none',
                        'font-backup': '',
                    };
                    wp.customize('header-search').set(true);
                    wp.customize('preheader-enable').set(true);
                    wp.customize('preheader-left').set('<div class="cspt-header-box cspt-header-box-1"><span class="cspt-header-box-icon"><i class="cspt-base-icon-call"></i></span><span class="cspt-header-box-title">Have any Questions?</span><span class="cspt-header-box-content">+0 123 888 555 </span></div> <div class="cspt-header-box cspt-header-box-2"><span class="cspt-header-box-icon"><i class="cspt-leblix-icon cspt-leblix-icon-location"></i></span><span class="cspt-header-box-title">Los Angeles</span><span class="cspt-header-box-content">Gournadi, 1230 Bariasl</span></div>');
                    wp.customize('preheader-right').set('<ul class="cspt-contact-info"><li class="cspt-leftshape"><i class="cspt-base-icon-clock-1 "></i> Covid - 19  resources: symptom checker, visitor restrictions...</li><li>[cspt-social-links]</li></ul>');
                    wp.customize('preheader-bgcolor').set('white');
                    wp.customize('preheader-text-color').set('blackish');
                    wp.customize('header-btn-text').set('Get a quote');
                    wp.customize('header-btn-url').set('#');
                    wp.customize('logo-height').set('45');
                    wp.customize('main-menu-active-color').set(main_menu_active_color);
                    wp.customize('sticky-header-bgcolor').set(sticky_header_bgcolor);
                    wp.customize('header-box-title-typography').set(header_box_title_typography);
                    wp.customize('header-box-content-typography').set(header_box_content_typography);
                    wp.customize('titlebar-height').set('530');
                    wp.customize('titlebar-bgcolor').set('transparent');
                    wp.customize('titlebar-background').set({
                        'background-color': '#f6f6f6',
                        'background-repeat': 'no-repeat',
                        'background-position': 'center center',
                        'background-size': 'cover',
                        'background-attachment': 'scroll',
                        'background-image': cspt_admin_js_variables.theme_path + '/images/title-bg.jpg',
                    });
                    wp.customize('titlebar-heading-typography').set({
                        'font-family': 'Poppins',
                        'variant': '700',
                        'font-size': '44px',
                        'line-height': '60px',
                        'letter-spacing': '-2px',
                        'color': '#ffffff',
                        'text-transform': 'none',
                        'font-backup': ''
                    });
                    wp.customize('titlebar-subheading-typography').set({
                        'font-family': 'Archivo',
                        'variant': '600',
                        'font-size': '18px',
                        'line-height': '1.5',
                        'letter-spacing': '0px',
                        'color': '#ffffff',
                        'text-transform': 'none',
                        'font-backup': '',
                    });
                    wp.customize('titlebar-breadcrumb-typography').set({
                        'font-family': 'Archivo',
                        'variant': '500',
                        'font-size': '15px',
                        'line-height': '1.5',
                        'letter-spacing': '0px',
                        'color': '#ffffff',
                        'text-transform': 'uppercase',
                        'font-backup': ''
                    });
                    wp.customize('logo').set(cspt_admin_js_variables.theme_path + '/images/logo-white.png');
                    wp.customize('sticky-logo').set(cspt_admin_js_variables.theme_path + '/images/logo.png');
                }
            });
        });

}); // window.load