<?php


namespace Hupa\StarterTheme;


use stdClass;

defined('ABSPATH') or die();

/**
 * ADMIN OPTIONS HANDLE
 * @package Hummelt & Partner WordPress Theme
 * Copyright 2021, Jens Wiecker
 * License: Commercial - goto https://www.hummelt-werbeagentur.de/
 * https://www.hummelt-werbeagentur.de/
 */

if (!class_exists('HupaStarterOptionFilter')) {
    add_action('after_setup_theme', array('Hupa\\StarterTheme\\HupaStarterOptionFilter', 'init'), 0);

    class HupaStarterOptionFilter
    {
        //STATIC INSTANCE
        private static $starter_option_filter_instance;
        //OPTION TRAIT
        use HupaOptionTrait;

        /**
         * @return static
         */
        public static function init(): self
        {
            if (is_null(self::$starter_option_filter_instance)) {
                self::$starter_option_filter_instance = new self;
            }

            return self::$starter_option_filter_instance;
        }

        /**
         * HupaStarterOptionFilter constructor.
         */
        public function __construct()
        {

            //SET DATABASE DEFAULTS
            add_filter('set_database_defaults', array($this, 'hupa_set_database_defaults'));
            //TODO JOB GET HUPA OPTION
            add_filter('get_hupa_option', array($this, 'hupa_get_hupa_option'));
            //TODO JOB GET HUPA TOOLS
            add_filter('get_hupa_tools', array($this, 'hupa_get_hupa_tools'));

            //TODO GET PAGE META DATA
            add_filter('get_page_meta_data', array($this, 'getHupaPageMetaDaten'));


            //GET FONT STYLE BY FONT-FAMILY
            add_filter('get_font_style_select', array($this, 'hupa_get_font_style_select'));
            //GET FONT FAMILY
            add_filter('get_font_family_select', array($this, 'hupa_get_font_family_select'));
            //UPDATE DER THEME OPTIONEN
            add_filter('update_hupa_options', array($this, 'hupa_update_hupa_options'), 10, 2);
            //GET SOCIAL MEDIA
            add_filter('get_social_media', array($this, 'hupa_get_social_media'), 10, 2);
            //GET ANIMATE OPTIONEN
            add_filter('get_animate_option', array($this, 'hupa_get_animate_option'));
            //GET HUPA TOOLS
            add_filter('get_hupa_tools_by_args', array($this, 'hupa_get_hupa_tools_by_args'), 10, 3);

            //UPDATE Sortable Position
            add_filter('update_sortable_position', array($this, 'hupa_update_sortable_position'), 10, 2);

            //SETTINGS MENU LABEL
            add_filter('get_settings_menu_label', array($this, 'hupa_get_settings_menu_label'));

        }

        final public function hupa_get_hupa_option($option): string|array|object
        {
            global $wpdb;
            $table = $wpdb->prefix . $this->table_settings;
            $result = $wpdb->get_row("SELECT *  FROM {$table}");
            if ($result) {
                $settings[] = json_decode($result->hupa_general);
                $settings[] = json_decode($result->hupa_fonts);
                $settings[] = json_decode($result->hupa_wp_option);
                $settings[] = json_decode($result->hupa_colors);
                $settings[] = json_decode($result->hupa_gmaps);
                //$settings[] = json_decode( $result->hupa_top_area );
                foreach ($settings as $key => $val) {
                    if (isset($val->$option)) {
                        return $val->$option;
                    }
                }
            }
            return '';
        }

        final public function hupa_get_hupa_tools($option): object
        {
            return $this->db_get_hupa_option($option);
        }


        final public function hupa_get_settings_menu_label($args): array
        {
            $return = [];
            switch ($args) {
                case 'mainMenu':
                    $return = [
                        '0' => [
                            'value' => 1,
                            'label' => __('Preset', 'bootscore')
                        ],
                        '1' => [
                            'value' => 2,
                            'label' => __('Standard Menu', 'bootscore')
                        ],
                        '2' => [
                            'value' => 3,
                            'label' => 'Menu 2'
                        ],
                        '3' => [
                            'value' => 4,
                            'label' => 'Menu 3'
                        ]
                    ];
                    break;

                case'handyMenu':
                    $return = [
                        '0' => [
                            'value' => 1,
                            'label' => __('Preset', 'bootscore')
                        ],
                        '1' => [
                            'value' => 2,
                            'label' => 'Menu 1'
                        ],
                        '2' => [
                            'value' => 3,
                            'label' => 'Menu 2'
                        ]
                    ];
                    break;
                case'showTopAreaSelect':
                    $return = [
                        '0' => [
                            'value' => 1,
                            'label' => __('Preset', 'bootscore')
                        ],
                        '1' => [
                            'value' => 2,
                            'label' => __('show', 'bootscore')
                        ],
                        '2' => [
                            'value' => 3,
                            'label' => __('hide', 'bootscore')
                        ]
                    ];
                    break;
                case'selectMenuContainer':
                case'selectTopAreaContainer':
                case'selectMainContainer':
                    $return = [
                        '0' => [
                            'value' => 0,
                            'label' => __('Preset', 'bootscore')
                        ],
                        '1' => [
                            'value' => 1,
                            'label' => __('Container', 'bootscore')
                        ],
                        '2' => [
                            'value' => 2,
                            'label' => __('Container-Fluid', 'bootscore')
                        ]
                    ];
                    break;
            }
            return $return;
        }

        final public function hupa_update_hupa_options($data, $type): bool
        {
            if (!$data) {
                return false;
            }

            switch ($type) {
                case 'hupa_general':
                    $this->hupa_update_settings($type, $data);
                    break;
                case 'update_social_media_data':
                    $this->update_social_media_data($data);
                    break;
                case'update_top_area_data':
                    $this->update_top_area_data($data);
                    break;
                case 'sync_font_folder':
                    $this->hupa_update_settings('hupa_fonts_src', apply_filters('get_install_fonts', ''));
                    break;
                case'image_upload':
                    $dbGeneral = $this->get_settings_by_args('hupa_general');
                    if (!$dbGeneral->status) {
                        return false;
                    }
                    $dbData = (array)$dbGeneral->hupa_general;
                    switch ($data->type) {
                        case'header_logo':
                            unset($dbData['logo_image']);
                            $dbData['logo_image'] = $data->id;
                            $this->hupa_update_settings('hupa_general', apply_filters('arrayToObject', $dbData));
                            break;
                        case'login_logo':
                            unset($dbData['login_image']);
                            $dbData['login_image'] = $data->id;
                            $this->hupa_update_settings('hupa_general', apply_filters('arrayToObject', $dbData));
                            break;
                    }
                    break;

                case'wp_optionen':
                    $this->hupa_update_settings('hupa_wp_option', $data);
                    break;

                case'hupa_top_area':
                    $this->hupa_update_settings('hupa_top_area', $data);
                    break;

                case'theme_colors':
                    $this->hupa_update_settings('hupa_colors', $data);
                    break;

                case'hupa_fonts':
                    $dbFonts = $this->get_settings_by_args('hupa_fonts');
                    if (!$dbFonts->status) {
                        return false;
                    }

                    $fonts = (array)$dbFonts->hupa_fonts;
                    //OLD VALUES delete
                    unset($fonts[$data->fontType . '_family']);
                    unset($fonts[$data->fontType . '_style']);
                    unset($fonts[$data->fontType . '_size']);
                    unset($fonts[$data->fontType . '_height']);
                    unset($fonts[$data->fontType . '_bs_check']);
                    unset($fonts[$data->fontType . '_display_check']);
                    unset($fonts[$data->fontType . '_color']);
                    //Widget
                    unset($fonts[$data->fontType . '_txt_decoration']);


                    //SET new Values
                    $fonts[$data->fontType . '_family'] = $data->font_family;
                    $fonts[$data->fontType . '_style'] = $data->font_style;
                    $fonts[$data->fontType . '_size'] = $data->font_size;
                    $fonts[$data->fontType . '_height'] = $data->font_height;
                    $fonts[$data->fontType . '_bs_check'] = $data->font_bs_check;
                    $fonts[$data->fontType . '_display_check'] = $data->font_display_check;
                    $fonts[$data->fontType . '_color'] = $data->font_color;

                    if ($data->fontType === 'footer_widget_font') {
                        $fonts[$data->fontType . '_txt_decoration'] = $data->font_txt_decoration;
                    }
                    $this->hupa_update_settings('hupa_fonts', apply_filters('arrayToObject', $fonts));

                    break;
                case 'reset_settings':
                    $defaults = $this->get_theme_default_settings();
                    switch ($data) {
                        case'reset_general':
                            $this->hupa_update_settings('hupa_general', apply_filters('arrayToObject', $defaults['theme_wp_general']));
                            apply_filters('generate_theme_css', false);
                            break;
                        case'reset_fonts':
                            $this->hupa_update_settings('hupa_fonts', apply_filters('arrayToObject', $defaults['theme_fonts']));
                            apply_filters('generate_theme_css', false);
                            break;
                        case'reset_colors':
                            $this->hupa_update_settings('hupa_colors', apply_filters('arrayToObject', $defaults['theme_colors']));
                            apply_filters('generate_theme_css', false);
                            break;
                        case'reset_wp_optionen':
                            $this->hupa_update_settings('hupa_wp_option', apply_filters('arrayToObject', $defaults['theme_wp_optionen']));
                            break;
                        case'reset_gmaps':
                            $this->hupa_update_settings('hupa_gmaps', apply_filters('arrayToObject', $defaults['google_maps']));
                            break;
                        case'reset_social_media':
                            $this->reset_social_media_data();
                            break;
                        case'reset_all_settings':
                            $this->hupa_update_settings('hupa_general', apply_filters('arrayToObject', $defaults['theme_wp_general']));
                            $this->hupa_update_settings('hupa_fonts', apply_filters('arrayToObject', $defaults['theme_fonts']));
                            $this->hupa_update_settings('hupa_colors', apply_filters('arrayToObject', $defaults['theme_colors']));
                            $this->hupa_update_settings('hupa_wp_option', apply_filters('arrayToObject', $defaults['theme_wp_optionen']));
                            $this->hupa_update_settings('hupa_gmaps', apply_filters('arrayToObject', $defaults['google_maps']));
                            $this->reset_social_media_data();
                            apply_filters('generate_theme_css', false);
                            break;
                    }
                    break;
                case'google_maps':
                    $this->hupa_update_settings('hupa_gmaps', $data);
                    break;
            }

            return true;
        }

        final public function hupa_get_font_style_select($family): object
        {
            if (!$family) {
                return (object)[];
            }
            global $wpdb;
            $table = $wpdb->prefix . $this->table_settings;
            $result = $wpdb->get_row("SELECT hupa_fonts_src  FROM {$table}");
            foreach (json_decode($result->hupa_fonts_src) as $tmp) {
                if ($tmp->fontFamily === $family) {
                    return $tmp->fontStill->styleSelect;
                }
            }
            return (object)[];
        }

        /**
         * @param $args
         *
         * @return object
         */
        final public function hupa_get_font_family_select($args): object
        {
            global $wpdb;
            $table = $wpdb->prefix . $this->table_settings;
            $result = $wpdb->get_row("SELECT hupa_fonts_src  FROM {$table}");
            $retArr = [];
            foreach (json_decode($result->hupa_fonts_src) as $tmp) {
                $retItem = [
                    'family' => $tmp->fontFamily
                ];
                $retArr[] = $retItem;
            }
            return apply_filters('arrayToObject', $retArr);
        }

        final public function hupa_get_social_media($args, $get = ''): object
        {
            $get ? $fetch = $get : $fetch = 'get_results';
            global $wpdb;
            $table = $wpdb->prefix . $this->table_social;
            $result = $wpdb->$fetch("SELECT *  FROM {$table} {$args} ORDER BY position ASC");
            $return = new stdClass();
            if (!$result) {
                $return->status = false;

                return $return;
            }
            $return->status = true;
            $return->record = apply_filters('arrayToObject', $result);
            return $return;
        }


        final public function hupa_set_database_defaults(): void
        {
            $defaults = apply_filters('arrayToObject', $this->get_theme_default_settings());
            global $wpdb;
            $table = $wpdb->prefix . $this->table_settings;
            $result = $wpdb->get_row("SELECT *  FROM {$table}");

            if (!$result) {
                $wpdb->insert(
                    $table,
                    array(
                        'hupa_general' => json_encode($defaults->theme_wp_general),
                        'hupa_fonts' => json_encode($defaults->theme_fonts),
                        'hupa_fonts_src' => apply_filters('get_install_fonts', 'json')->json,
                        'hupa_colors' => json_encode($defaults->theme_colors),
                        'hupa_wp_option' => json_encode($defaults->theme_wp_optionen),
                        'hupa_gmaps' => json_encode($defaults->google_maps)
                    ),
                    array('%s', '%s', '%s', '%s', '%s', '%s', '%s')
                );
            }

            $default = $this->get_theme_default_settings();

            //TODO DEFAULT HUPA TOOLS
            $table = $wpdb->prefix . $this->table_tools;
            $toolsDb = $wpdb->get_row("SELECT *  FROM {$table}");
            if (!$toolsDb) {
                $tools = apply_filters('arrayToObject', $default['hupa_tools']);
                foreach ($tools as $tmp) {
                    $wpdb->insert(
                        $table,
                        array(
                            'bezeichnung' => $tmp->bezeichnung,
                            'slug' => $tmp->slug,
                            'aktiv' => $tmp->aktiv,
                            'type' => $tmp->type,
                            'position' => $tmp->position,
                            'css_class' => $tmp->css_class,
                            'other' => $tmp->other,
                        ),
                        array('%s', '%s', '%d', '%s', '%d', '%s', '%s')
                    );
                }
            }

            //TODO DEFAULT SOCIAL MEDIA
            $table = $wpdb->prefix . $this->table_social;
            $socialDB = $wpdb->get_row("SELECT *  FROM {$table}");
            if (!$socialDB) {
                $def = apply_filters('arrayToObject', $default['social_media']);
                foreach ($def as $tmp) {
                    $wpdb->insert(
                        $table,
                        array(
                            'bezeichnung' => $tmp->bezeichnung,
                            'slug' => $tmp->slug,
                            'post_check' => $tmp->post_check,
                            'top_check' => $tmp->top_check,
                            'btn' => $tmp->btn,
                            'icon' => $tmp->icon,
                            'position' => $tmp->position,
                            'share_txt' => $tmp->share_txt,
                        ),
                        array('%s', '%s', '%d', '%d', '%s', '%s', '%d', '%s')
                    );
                }
            }
        }

        private function get_settings_by_args(string $row, bool $json = false): object
        {
            $return = new stdClass();
            global $wpdb;

            $table = $wpdb->prefix . $this->table_settings;
            $result = $wpdb->get_row("SELECT {$row}  FROM {$table}");
            if (!$result) {
                $return->status = false;

                return $return;
            }
            $return->status = true;
            if ($json) {
                $return->$row = $result->$row;
            } else {
                $return->$row = json_decode($result->$row);
            }

            return $return;
        }

        final public function hupa_get_hupa_tools_by_args(string $args = '', $fetchType = '', $select = ''): object
        {
            $return = new stdClass();
            global $wpdb;
            $fetchType ? $fetch = $fetchType : $fetch = 'get_results';
            $select ? $sel = $select : $sel = '*';
            $table = $wpdb->prefix . $this->table_tools;
            $result = $wpdb->$fetch("SELECT {$sel}  FROM {$table} {$args}");
            if (!$result) {
                $return->status = false;
                return $return;
            }
            $return->status = true;
            $return->record = $result;
            return $return;
        }

        private function db_get_hupa_option($option): object
        {
            global $wpdb;
            $table = $wpdb->prefix . $this->table_tools;
            $result = $wpdb->get_row("SELECT *  FROM {$table} WHERE slug=\"{$option}\"");
            if (!$result) {
                return (object)[];
            }
            return (object)$result;
        }

        private function update_social_media_data($record): void
        {
            global $wpdb;
            $table = $wpdb->prefix . $this->table_social;
            foreach ($record->social_media as $key => $val) {
                $wpdb->update(
                    $table,
                    array(
                        'post_check' => $val->post_check,
                        'top_check' => $val->top_check,
                        'share_txt' => $val->share_txt,
                        'url' => $val->url,
                    ),
                    array('slug' => $val->slug),
                    array('%d', '%d', '%s', '%s'),
                    array('%s')
                );
            }
        }

        private function update_top_area_data($record): void
        {
            global $wpdb;
            $table = $wpdb->prefix . $this->table_tools;
            foreach ($record->top_area as $key => $val) {
                $wpdb->update(
                    $table,
                    array(
                        'aktiv' => $val->aktiv,
                        'css_class' => $val->css_class
                    ),
                    array('slug' => $val->slug),
                    array('%d', '%s'),
                    array('%s')
                );
            }
        }

        private function reset_social_media_data(): void
        {
            global $wpdb;
            $table = $wpdb->prefix . $this->table_social;
            $social = $this->get_theme_default_settings();
            $default = apply_filters('arrayToObject', $social['social_media']);
            foreach ($default as $tmp) {
                $wpdb->update(
                    $table,
                    array(
                        'bezeichnung' => $tmp->bezeichnung,
                        'slug' => $tmp->slug,
                        'post_check' => $tmp->post_check,
                        'top_check' => $tmp->top_check,
                        'btn' => $tmp->btn,
                        'icon' => $tmp->icon,
                        'position' => $tmp->position,
                        'share_txt' => $tmp->share_txt,
                        'url' => $tmp->url
                    ),
                    array('slug' => $tmp->slug),
                    array('%s', '%s', '%d', '%d', '%s', '%s', '%d', '%s', '%s'),
                    array('%s')
                );
            }
        }

        public function hupa_update_sortable_position($record, $type): void
        {
            global $wpdb;
            $table = $wpdb->prefix . $type;
            $wpdb->update(
                $table,
                array(
                    'position' => $record->position
                ),
                array('id' => $record->id),
                array('%d'),
                array('%d')
            );
        }

        private function hupa_update_hupa_tools_top_area($record): void
        {
            global $wpdb;
            $table = $wpdb->prefix . $this->table_tools;
            $wpdb->update(
                $table,
                array(
                    'position' => $record->position
                ),
                array('id' => $record->id),
                array('%d'),
                array('%d')
            );
        }

        private function hupa_update_settings($row, $content): void
        {
            $id = HUPA_STARTER_THEME_SETTINGS_ID;
            global $wpdb;
            $table = $wpdb->prefix . $this->table_settings;
            $wpdb->update(
                $table,
                array(
                    $row => json_encode($content),
                ),
                array('id' => $id),
                array('%s'),
                array('%d')
            );
        }


        public function hupa_get_animate_option(): object
        {

            $seekers = array("bounce", "flash", "pulse", "rubberBand", "shakeX", "headShake", "swing", "tada", "wobble", "jello", "heartBeat");
            $entrances = array("backInDown", "backInLeft", "backInRight", "backInUp");
            //$back_exits = array("backOutDown","backOutLeft","backOutRight","backOutUp");
            $bouncing = array("bounceIn", "bounceInDown", "bounceInLeft", "bounceInRight", "bounceInUp");
            $fade = array("fadeIn", "fadeInDown", "fadeInDownBig", "fadeInLeft", "fadeInLeftBig", "fadeInRight", "fadeInRightBig", "fadeInUp", "fadeInUpBig", "fadeInTopLeft", "fadeInTopRight",
                "fadeInBottomLeft", "fadeInBottomRight");
            $flippers = array("flip", "flipInX", "flipInY", "flipOutX", "flipOutY");
            $lightspeed = array("lightSpeedInRight", "lightSpeedInLeft", "lightSpeedOutRight", "lightSpeedOutLeft");
            $rotating = array("rotateIn", "rotateInDownLeft", "rotateInDownRight", "rotateInUpLeft", "rotateInUpRight");
            $zooming = array("zoomIn", "zoomInDown", "zoomInLeft", "zoomInRight", "zoomInUp");
            $sliding = array("slideInDown", "slideInLeft", "slideInRight", "slideInUp");

            $ani_arr = array();
            for ($i = 0; $i < count($seekers); $i++) {
                $ani_item = array(
                    "animate" => $seekers[$i]
                );
                $ani_arr[] = $ani_item;
            }

            $ani_arr[] = array("value" => '-', "animate" => '----', "divider" => true);

            for ($i = 0; $i < count($entrances); $i++) {
                $ani_item = array(
                    "animate" => $entrances[$i]
                );
                $ani_arr[] = $ani_item;
            }

            $ani_arr[] = array("value" => '-', "animate" => '----', "divider" => true);


            for ($i = 0; $i < count($bouncing); $i++) {
                $ani_item = array(
                    "animate" => $bouncing[$i]
                );
                $ani_arr[] = $ani_item;
            }

            $ani_arr[] = array("value" => '-', "animate" => '----', "divider" => true);

            for ($i = 0; $i < count($fade); $i++) {
                $ani_item = array(
                    "animate" => $fade[$i]
                );
                $ani_arr[] = $ani_item;
            }

            $ani_arr[] = array("value" => '-', "animate" => '----', "divider" => true);

            for ($i = 0; $i < count($flippers); $i++) {
                $ani_item = array(
                    "animate" => $flippers[$i]
                );
                $ani_arr[] = $ani_item;
            }

            $ani_arr[] = array("value" => '-', "animate" => '----', "divider" => true);

            for ($i = 0; $i < count($lightspeed); $i++) {
                $ani_item = array(
                    "animate" => $lightspeed[$i]
                );
                $ani_arr[] = $ani_item;
            }

            $ani_arr[] = array("value" => '-', "animate" => '----', "divider" => true);

            for ($i = 0; $i < count($rotating); $i++) {
                $ani_item = array(
                    "animate" => $rotating[$i]
                );
                $ani_arr[] = $ani_item;
            }

            $ani_arr[] = array("value" => '-', "animate" => '----', "divider" => true);

            for ($i = 0; $i < count($zooming); $i++) {
                $ani_item = array(
                    "animate" => $zooming[$i]
                );
                $ani_arr[] = $ani_item;
            }

            $ani_arr[] = array("value" => '-', "animate" => '----', "divider" => true);

            for ($i = 0; $i < count($sliding); $i++) {
                $ani_item = array(
                    "animate" => $sliding[$i]
                );
                $ani_arr[] = $ani_item;
            }

            return apply_filters('arrayToObject', $ani_arr);
        }

        public function getHupaPageMetaDaten($id): object
        {

            $record = new stdClass();
            $record->showTitle = get_post_meta($id, '_hupa_show_title', true);
            $record->custom_title = get_post_meta($id, '_hupa_custom_title', true);
            $record->title_css = get_post_meta($id, '_hupa_title_css', true);
            $record->show_menu = get_post_meta($id, '_hupa_show_menu', true);
            $record->menuSelect = get_post_meta($id, '_hupa_select_menu', true);
            $record->handyMenuSelect = get_post_meta($id, '_hupa_select_handy_menu', true);
            $record->topAreaSelect = get_post_meta($id, '_hupa_select_top_area', true);
            $record->show_bottom_footer = get_post_meta($id, '_hupa_show_bottom_footer', true);
            $record->select_header = get_post_meta($id, '_hupa_select_header', true);
            $record->select_footer = get_post_meta($id, '_hupa_select_footer', true);

            $record->show_widgets_footer = get_post_meta($id, '_hupa_show_widgets_footer', true);
            $record->show_top_widget_footer = get_post_meta($id, '_hupa_show_top_footer', true);


            //MAIN CONTAINER
            $mainSelectContainer = get_post_meta($id, '_hupa_main_container', true);
            $optionOptionContainer = get_hupa_option('main_container');
            if ($mainSelectContainer != 0) {
                $record->main_container = match ($mainSelectContainer) {
                    '1' => 1,
                    '2' => 0,
                };
            } else {
                $record->main_container = match ($optionOptionContainer) {
                    '1' => 1,
                    '2' => 0,
                };
            }


            //MENU CONTAINER
            $selectMenuContainer = get_post_meta($id, '_hupa_select_container', true);
            $optionMenuContainer = get_hupa_option('menu_container');

            //MENU CONTAINER
            if ($selectMenuContainer != 0) {
                $record->menu_container = match ($selectMenuContainer) {
                    '1' => 1,
                    '2' => 0,
                };
            } else {
                $record->menu_container = match ($optionMenuContainer) {
                    '1' => 1,
                    '2' => 0,
                };
            }

            //TopArea Show
            $topAreaSelect = get_post_meta($id, '_hupa_select_top_area', true);
            $optionTopArea = get_hupa_option('top_aktiv');
            $topAreaContainerSelect = get_post_meta($id, '_hupa_top_area_container', true);
            $topAreaContainerOption = get_hupa_option('top_area_container');
            //TOP AREA
            if ($topAreaContainerSelect != 0) {
                $record->top_area_container = match ($topAreaContainerSelect) {
                    '1' => 1,
                    '2' => 0,
                };
            } else {
                $record->top_area_container = match ($topAreaContainerOption) {
                    '1' => 1,
                    '2' => 0,
                };
            }

            if ($topAreaSelect != 0) {
                $record->show_top_area = match ($topAreaSelect) {
                    '1' => 1,
                    '2' => 0,
                };

            } else {
                $record->show_top_area = $optionTopArea;
            }

            //TODO CUSTOM HEADER
            if ($record->select_header) {
                $postHeader = get_post($record->select_header);
                $record->custum_header = $postHeader->post_content;
            } else {
                $record->custum_header = false;
            }

            //TODO CUSTOM FOOTER
            if ($record->select_footer) {
                $postFooter = get_post($record->select_footer);
                $record->custum_footer = $postFooter->post_content;
            } else {
                $record->custum_footer = false;
            }
            return $record;
        }

    }
}