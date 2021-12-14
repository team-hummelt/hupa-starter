<?php

namespace Hupa\StarterTheme;

use stdClass;

defined('ABSPATH') or die();
/**
 * ADMIN CSS GENERATOR
 * @package Hummelt & Partner WordPress Theme
 * Copyright 2021, Jens Wiecker
 * License: Commercial - goto https://www.hummelt-werbeagentur.de/
 * https://www.hummelt-werbeagentur.de/
 */

if (!class_exists('HupaGoogleMapsShortCode')) {
    add_action('after_setup_theme', array('Hupa\\StarterTheme\\HupaGoogleMapsShortCode', 'init'), 0);

    class HupaGoogleMapsShortCode
    {
        //INSTANCE
        private static $instance;
        private $gmaps;
        private object $gmSettings;

        /**
         * @return static
         */
        public static function init(): self
        {
            if (is_null(self::$instance)) {
                self::$instance = new self;
            }

            return self::$instance;
        }

        public function __construct()
        {
            add_shortcode('gmaps', array($this, 'hupa_gmaps_shortcode'));

        }

        public function hupa_gmaps_shortcode($atts, $content, $tag): bool|string
        {
            $a = shortcode_atts(array(
                'id' => '',
                'height' => '',
                'width' => '',
                'selecteddsmap' => '1',

            ), $atts);

            global $hupa_optionen_global;
            ob_start();
            if (!session_id()) {
                @session_start();
            }
            if ($_SESSION['gmaps']) {
                $this->gmaps = $_SESSION['gmaps'];
            } else {
                $this->gmaps = false;
            }

            $id = trim($a['id']);
            if (!$id) {
                return '';
            }
            $mapDsId = $a['selecteddsmap'];

            $ms = new stdClass();
            $ms->settingsId = $mapDsId;
            $dbSettings = $hupa_optionen_global->get_google_maps_settings_by_args($mapDsId);
            if ($dbSettings->status) {
                $s = $dbSettings->record;
                $ms->map_box_bg = $s->map_box_bg;
                $ms->map_bg_grayscale = $s->map_bg_grayscale;
                $ms->map_box_border = $s->map_box_border;
                $ms->map_box_color = $s->map_box_color;
                $ms->map_link_uppercase = $s->map_link_uppercase;
                $ms->map_link_underline = $s->map_link_underline;
                $ms->map_link_color = $s->map_link_color;
                $ms->map_btn_hover_bg = $s->map_btn_hover_bg;
                $ms->map_btn_hover_color = $s->map_btn_hover_color;
                $ms->map_btn_hover_border = $s->map_btn_hover_border;
                $ms->map_btn_bg = $s->map_btn_bg;
                $ms->map_btn_border_color = $s->map_btn_border_color;
                $ms->map_btn_color = $s->map_btn_color;
                $ms->map_img_id = $s->map_img_id;
                $ms->map_ds_page = $s->map_ds_page;
                $link = get_permalink($s->map_ds_page);
                $mapTxt = html_entity_decode($s->map_ds_text);
                $mapTxt = stripslashes_deep($mapTxt);
                $dsLink = str_replace('###LINK###', $link, $mapTxt);
                $ms->map_ds_btn_text = $s->map_ds_btn_text;
                if (strpos($dsLink, '<a')) {
                    $dsLink = str_replace('<a', '<a ###STYLE###', $dsLink);
                }
                $ms->map_ds_text = $dsLink;

            } else {
                $ms->map_box_bg = get_hupa_option('map_box_bg');
                $ms->map_bg_grayscale = get_hupa_option('map_bg_grayscale');
                $ms->map_box_border = get_hupa_option('map_box_border');
                $ms->map_box_color = get_hupa_option('map_box_color');
                $ms->map_link_uppercase = get_hupa_option('map_link_uppercase');
                $ms->map_link_underline = get_hupa_option('map_link_underline');
                $ms->map_link_color = get_hupa_option('map_link_color');
                $ms->map_btn_hover_bg = get_hupa_option('map_btn_hover_bg');
                $ms->map_btn_hover_color = get_hupa_option('map_btn_hover_color');
                $ms->map_btn_hover_border = get_hupa_option('map_btn_hover_border');
                $ms->map_btn_bg = get_hupa_option('map_btn_bg');
                $ms->map_btn_border_color = get_hupa_option('map_btn_border_color');
                $ms->map_btn_color = get_hupa_option('map_btn_color');
                $ms->map_img_id = get_hupa_option('map_img_id');
                $ms->map_ds_page = get_hupa_option('map_ds_page');
                $ms->map_ds_btn_text = 'Anfahrtskarte einblenden';
                $ms->map_ds_text = 'Ich akzeptiere die Datenschutzbestimmungen.';
            }

            $this->gmSettings = $ms;
            // print_r($this->gmSettings);
            if ($ms->map_bg_grayscale) {
                $imgStyle = 'filter: grayscale(100%); -webkit-filter: grayscale(100%);';
            } else {
                $imgStyle = 'filter:unset"; -webkit-filter:unset;';
            }

            $a['height'] ? $height = trim($a['height']) : $height = '400px';
            $a['width'] ? $width = trim($a['width']) : $width = '650px';

            $mapStyle = new stdClass();
            $mapStyle->wrapper = 'style="width:' . $width . ';height:' . $height . ';"';
            $mapStyle->image = 'style="width:' . $width . ';height:' . $height . '; ' . $imgStyle . '"';
            $box = 'style="background-color:' . $ms->map_box_bg . ';
                                     border-color:' . $ms->map_box_border . ';"';
            $mapStyle->box = preg_replace(array('/<!--(.*)-->/Uis', "/[[:blank:]]+/"), array('', ' '), str_replace(array("\n", "\r", "\t"), '', $box));
            $mapStyle->fontColor = 'style="color:' . $ms->map_box_color . ';"';

            $ms->map_link_uppercase ? $uppercase = 'text-transform:uppercase;' : $uppercase = '';
            $ms->map_link_underline ? $underline = 'text-decoration:underline;' : $underline = '';

            $linCol = $ms->map_link_color;
            $linkColor = substr($linCol, 0, 7) . 'D9';
            $onMouseLinkHover = ' onmouseover="this.style.color=\'' . $linCol . '\';"';
            $onMouseLinkOut = ' onmouseout="this.style.color=\'' . $linCol . 'D9' . '\';"';
            $mapStyle->ds_link = 'style="color:' . $linkColor . ';' . $uppercase . $underline . '"' . $onMouseLinkHover . $onMouseLinkOut;

            $onMouseBgHover = ' onmouseover="this.style.background=\'' . $ms->map_btn_hover_bg . '\';';
            $onMouseBgHover .= 'this.style.color=\'' . $ms->map_btn_hover_color . '\';';
            $onMouseBgHover .= 'this.style.borderColor=\'' . $ms->map_btn_hover_border . '\';"';
            $onMouseBgOut = ' onmouseout="this.style.background=\'' . $ms->map_btn_bg . '\';';
            $onMouseBgOut .= 'this.style.borderColor=\'' . $ms->map_btn_border_color . '\';';
            $onMouseBgOut .= 'this.style.color=\'' . $ms->map_btn_color . '\';"';

            $btn = 'style="background-color:' . $ms->map_btn_bg . ';
                                      color:' . $ms->map_btn_color . ';
                                      border-color:' . $ms->map_btn_border_color . ';"' . $onMouseBgHover . $onMouseBgOut;
            $mapStyle->btn = preg_replace(array('/<!--(.*)-->/Uis', "/[[:blank:]]+/"), array('', ' '), str_replace(array("\n", "\r", "\t"), '', $btn));

            if ($id == 'api-maps'):
                ?>
                <div class="hupa-gmaps-container" <?= $mapStyle->wrapper ?>>
                    <?php
                    if (get_hupa_option('map_datenschutz') && !$this->gmaps) {
                        echo $this->get_datenschutz_template($mapStyle, 'hupa-gmaps-btn', 'api-karte-check');
                    } ?>
                </div>
                <?php
                session_write_close();
            endif;
            if ($id != 'api-maps') {
                $args = sprintf('WHERE shortcode="%s"', $id);
                $iframeCard = apply_filters('get_gmaps_iframe', $args, false);
                if (!$iframeCard->status) {
                    return '';
                }
                $card = $iframeCard->record;
                $iframe = html_entity_decode($card->iframe);
                $iframe = stripslashes_deep($iframe);
                ?>
                <div class="gmaps-iframe-wrapper iframe<?= $id ?>">
                    <?php
                    if ($a['height'] && $a['width']) {
                        $regEx = '/width="\d{1,6}".*?height="\d{1,6}"/m';
                        preg_match_all($regEx, $iframe, $matches);
                        if (isset($matches[0][0])) {
                            $iframe = str_replace($matches[0][0], 'width="' . trim($a['width']) . '" height="' . trim($a['height']) . '"', $iframe);
                        }
                    }
                    if ($card->datenschutz && !$this->gmaps) {
                        $data_id = 'data-id="' . $id . '" data-width="' . trim($a['width']) . '" data-height="' . trim($a['height']) . '"';
                        echo $this->get_datenschutz_template($mapStyle, 'hupa-iframe-btn', 'iframe-karte-check', $data_id, $id);
                    } else {
                        echo $iframe;
                    } ?>
                </div>
                <?php
            }
            return ob_get_clean();
        }

        private function get_datenschutz_template($mapStyle, $btn, $checkbox, $data_id = '', $code = ''): string
        {
            if ($code) {
                $btnCode = 'btn' . $code;
                $dataId = 'data-id="' . $code . '"';
            } else {
                $btnCode = '';
                $dataId = '';
            }

            $randId = apply_filters('get_hupa_random_id',8,0,4);
            if ( $this->gmSettings->map_img_id) {
                $bgImg = wp_get_attachment_image_src($this->gmSettings->map_img_id, 'full', false);
                $bgImg = $bgImg[0];
            } else {
                $bgImg = THEME_ADMIN_URL . 'assets/images/blind-karte.svg';
            }

            $dsLink = str_replace('###STYLE###', $mapStyle->ds_link, $this->gmSettings->map_ds_text);

            $html = '<form>
                <div class="map-placeholder position-relative d-flex justify-content-center overflow-hidden align-items-center" ' . $mapStyle->wrapper . '>
               <img src="' . $bgImg . '" class="map-placeholder-img"
                    alt="" ' . $mapStyle->image . '>
               <div class="ds-check-wrapper" ' . $mapStyle->box . '>
                   <div class="wrapper flex-column d-flex align-items-center pt-3">
                       <button type="button" ' . $data_id . ' class="' . $btnCode . ' btn-maps btn btn-secondary disabled ' . $btn . '" ' . $mapStyle->btn . '> ' . $this->gmSettings->map_ds_btn_text . '
                       </button>
                       <div class="form-check mt-3">
                            <input class="form-check-input gmaps-karte-check" type="checkbox" id="gMapsDsCheck' . $randId . '">
                                <label class="form-check-label fw-normal fst-normal" for="gMapsDsCheck' . $randId . '" ' . $mapStyle->fontColor . '>
                                 ' . $dsLink . '
                                </label>
                       </div>
                   </div>
                </div>
              </div> 
           </form>';
            return preg_replace(array('/<!--(.*)-->/Uis', "/[[:blank:]]+/"), array('', ' '), str_replace(array("\n", "\r", "\t"), '', $html));
        }
    }
}