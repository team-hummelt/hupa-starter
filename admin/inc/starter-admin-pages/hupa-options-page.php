<?php
defined('ABSPATH') or die();
/**
 * ADMIN HOME SITE
 * @package Hummelt & Partner WordPress Theme
 * Copyright 2021, Jens Wiecker
 * License: Commercial - goto https://www.hummelt-werbeagentur.de/
 * https://www.hummelt-werbeagentur.de/
 */
?>
<div class="wp-bs-starter-wrapper">
    <div class="container">
        <div class="card shadow-sm">
            <h5 class="card-header d-flex align-items-center bg-hupa py-4">
                <i class="icon-hupa-white d-block mt-2" style="font-size: 2rem"></i>&nbsp;
                <?= __('Theme Settings', 'bootscore') ?> </h5>
            <div class="card-body pb-4" style="min-height: 72vh">
                <div class="d-flex align-items-center">
                    <h5 class="card-title"><i
                                class="hupa-color fa fa-arrow-circle-right"></i> <?= __('Theme', 'bootscore') ?>
                        / <span id="currentSideTitle"><?= __('WP-Config', 'bootscore') ?></span>
                    </h5>
                </div>
                <hr>
                <div class="settings-btn-group d-flex">
                    <button data-site="<?= __('WP-Config', 'bootscore') ?>" type="button"
                            data-load="collapseOptionsWPConfigSite"
                            data-bs-toggle="collapse" data-bs-target="#collapseOptionsWPConfigSite"
                            class="btn-collapse btn btn-hupa btn-outline-secondary btn-sm active" disabled>
                        <i class="fa fa-server"></i>&nbsp;
                        <?= __('WP-Config', 'bootscore') ?>
                    </button>

                    <button data-site="<?= __('Sortieren Settings', 'bootscore') ?>" type="button"
                            data-load=""
                            data-bs-toggle="collapse" data-bs-target="#PostsSortSettings"
                            aria-expanded="false" aria-controls="PostsSortSettings"
                            class="btn-collapse btn btn-hupa btn-outline-secondary btn-sm"><i class="fa fa-arrows"></i>&nbsp;
                        <?= __('Beiträge | Seiten Sortieren', 'bootscore') ?>
                    </button>

                    <button data-site="<?=__('Posts | Pages Duplicate', 'bootscore')?> " type="button"
                            data-load=""
                            data-bs-toggle="collapse" data-bs-target="#PostsCopySettings"
                            aria-expanded="false" aria-controls="PostsCopySettings"
                            class="btn-collapse btn btn-hupa btn-outline-secondary btn-sm"><i class="fa fa-copy"></i>&nbsp;
                        <?=__('Posts | Pages Duplicate', 'bootscore')?>
                    </button>
                </div>
                <hr>

                <div id="settings_display_data">
                    <!--  TODO JOB WARNING Fonts Installieren -->
                    <div class="collapse show" id="collapseOptionsWPConfigSite"
                         data-bs-parent="#settings_display_data">
                        <div class="border rounded mt-1 shadow-sm p-3 bg-custom-gray" style="min-height: 55vh">
                            <form class="sendAjaxThemeForm" action="#" method="post">
                                <input type="hidden" name="method" value="theme_form_handle">
                                <input type="hidden" name="handle" value="theme_options_page">
                                <div class="d-flex align-items-center flex-wrap">
                                    <h5 class="card-title">
                                        <i class="font-blue fa fa-wordpress"></i>&nbsp; WP-Config
                                    </h5>
                                    <div class="ajax-status-spinner ms-auto d-inline-block mb-2 pe-2"></div>
                                </div>
                                <hr>
                                <h6>WP-Cache</h6>
                                <hr>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" name="wp_cache" type="checkbox" role="switch"
                                           id="SwitchWPCache" <?= !get_option('hupa_wp_cache') ?: ' checked' ?>>
                                    <label class="form-check-label" for="SwitchWPCache">WP-Cache aktiv</label>
                                </div>
                                <hr>
                                <h6>WP-Debug</h6>
                                <hr>

                                <div class="form-check form-switch mb-3 me-3">
                                    <input class="form-check-input"
                                           name="show_fatal_error" type="checkbox"
                                           role="switch"
                                           id="SwitchWPFatalError" <?= !get_option('hupa_show_fatal_error') ?: ' checked' ?>>
                                    <label class="form-check-label" for="SwitchWPFatalError">Fatal Error anzeigen
                                        <sup class="text-danger fw-bold">1*</sup></label>
                                </div>
                                <hr>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="debug"
                                           id="inlineRadio1" value="1" <?=get_option('wp_debug_radio') == '1' ? 'checked' : '' ?>>
                                    <label class="form-check-label" for="inlineRadio1">WP-Debug aktiv</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="debug"
                                           id="inlineRadio2" value="2" <?=get_option('wp_debug_radio') == '2' ? 'checked' : '' ?>>
                                    <label class="form-check-label" for="inlineRadio2">WP-Debug nicht aktiv</label>
                                </div>
                                <hr>
                                <div class="d-flex flex-wrap ">
                                    <!--<div class="form-check form-switch me-3">
                                        <input class="form-check-input"
                                               name="wp_debug" type="checkbox" role="switch"
                                               id="SwitchWPDebug" <?= !get_option('hupa_wp_debug') ?: ' checked' ?>>
                                        <label class="form-check-label" for="SwitchWPDebug">WP-Debug</label>
                                    </div>-->

                                    <div class="form-check form-switch me-3">
                                        <input class="form-check-input"
                                               name="hupa_wp_script_debug" type="checkbox" role="switch"
                                               id="SwitchWPScriptDebug" <?= !get_option('hupa_wp_script_debug') ?: ' checked' ?>>
                                        <label class="form-check-label" for="SwitchWPScriptDebug">WP-Script
                                            Debug</label>
                                    </div>

                                    <div class="form-check form-switch me-3">
                                        <input class="form-check-input"
                                               name="wp_debug_display" type="checkbox"
                                               role="switch"
                                               id="SwitchWPDebugDisplay" <?= !get_option('wp_debug_display') ?: ' checked' ?>>
                                        <label class="form-check-label" for="SwitchWPDebugDisplay">WP-Debug Display
                                        </label>
                                    </div>

                                    <div class="form-check form-switch me-3">
                                        <input class="form-check-input"
                                               data-bs-toggle="collapse" data-bs-target="#collapseDebugLog"
                                               name="wp_debug_log" type="checkbox"
                                               role="switch"
                                               id="SwitchWPDebugLog" <?= !get_option('hupa_wp_debug_log') ?: ' checked' ?>>
                                        <label class="form-check-label" for="SwitchWPDebugLog">WP-Debug Log
                                        </label>
                                    </div>
                                </div>
                                <hr>
                                <div class="collapse <?= !get_option('hupa_wp_debug_log') ?: ' show' ?>"
                                     id="collapseDebugLog">
                                    <fieldset
                                            class="my-2">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" name="mu_plugin" type="checkbox"
                                                   role="switch"
                                                   id="SwitchMUPlugin"
                                                <?= !get_option('mu_plugin') ?: ' checked' ?>
                                                <?= get_option('hupa_wp_debug_log') ?: ' disabled' ?>>
                                            <label class="form-check-label" for="SwitchMUPlugin">MU-Plugin aktivieren
                                                <sup class="text-danger fw-bold">2*</sup></label>
                                        </div>
                                        <div class="form-text">
                                            Diese Option <b class="text-danger strong-font-weight"> nicht aktivieren</b>
                                            wenn <b class="strong-font-weight">Minify</b> Installiert ist und die <b
                                                    class="strong-font-weight">CSS, JS oder HTMl</b>
                                            Kompression <b class="strong-font-weight">aktiv</b> ist.
                                        </div>

                                        <hr>
                                        <div class="d-flex align-items-center">
                                            <button type="button" data-bs-toggle="modal"
                                                    data-bs-target="#ThemeDebugLogModal" data-bs-type="show_log"
                                                    class="btn btn-blue-outline me-1">
                                                <i class="fa fa-laptop"></i>
                                                Log ansehen
                                            </button>
                                            <button type="button" onclick="btn_delete_debug_log(this)"
                                                    class="btn btn-outline-danger">
                                                <i class="fa fa-trash-o"></i> Log löschen
                                            </button>
                                        </div>
                                    </fieldset>
                                    <hr>
                                </div>
                                <h6>WP Post | Page Settings</h6>
                                <hr>
                                <?php
                                //delete_option('hupa_revision_aktiv');
                                $showRev = (int)get_option('hupa_revision_aktiv');
                                $count_revision = get_option('hupa_revision_anzahl');
                                $revision_interval = get_option('hupa_revision_interval');
                                $trash_days = get_option('hupa_trash_days');
                                is_integer($count_revision) ? (int)$revCount = get_option('hupa_revision_anzahl') : $revCount = 10;
                                is_integer($revision_interval) ? (int)$revInterval = get_option('hupa_revision_interval') : $revInterval = 60;
                                is_integer($trash_days) ? (int)$trashDays = get_option('hupa_trash_days') : $trashDays = 30;
                                ?>

                                <div class="col-xl-4 col-lg-6 col-12  mb-3">
                                    <label for="revisionCount" class="form-label mb-1">Anzahl der Revisionen
                                        <sup class="text-danger fw-bold">3*</sup></label>
                                    <input type="number" name="revision_anzahl" value="<?= $revCount ?>"
                                           class="rev-settings form-control" id="revisionCount"
                                           aria-describedby="revisionCountHelp"
                                        <?= !get_option('rev_wp_aktiv') ?: ' readonly' ?>>
                                    <div id="revisionCountHelp" class="form-text">Anzahl der maximal gespeicherter
                                        Revisionen.
                                    </div>
                                </div>

                                <div class="col-xl-4 col-lg-6 col-12 mb-3">
                                    <label for="revisionInterval" class="form-label mb-1">Revision Autosave Interval
                                        <small class="small">(sec)</small></label>
                                    <input type="number" name="revision_interval" value="<?= $revInterval ?>"
                                           class="rev-settings form-control" id="revisionInterval"
                                        <?= !get_option('rev_wp_aktiv') ?: ' readonly' ?>>
                                </div>

                                <div class="form-check form-switch mb-3">
                                    <input class="form-check-input"
                                           name="rev_wp_aktiv" type="checkbox"
                                           role="switch"
                                           id="wpUserRevision" <?= !get_option('rev_wp_aktiv') ?: ' checked' ?>>
                                    <label class="form-check-label" for="wpUserRevision">WordPress Settings benutzen
                                    </label>
                                </div>
                                <hr>

                                <h6>Papierkorb</h6>
                                <hr>
                                <div class="col-xl-4 col-lg-6 col-12">
                                    <label for="trashDays" class="form-label mb-1">Papierkorb leeren
                                        <small class="small">(angabe in Tage)</small>
                                    </label>
                                    <input type="number" name="trash_days" value="<?= $trashDays ?>"
                                           class="form-control" id="trashDays"
                                        <?= !get_option('trash_wp_aktiv') ?: ' readonly' ?>>
                                    <div class="form-text mb-3">Bei Eingabe <b
                                                class="text-primary strong-font-weight">0</b>
                                        wird der Papierkorb sofort geleert.
                                    </div>

                                    <div class="form-check form-switch mb-3">
                                        <input class="form-check-input"
                                               name="trash_wp_aktiv" type="checkbox"
                                               role="switch"
                                               id="wpUserTrash" <?= !get_option('trash_wp_aktiv') ?: ' checked' ?>>
                                        <label class="form-check-label" for="wpUserTrash">WordPress Settings benutzen
                                        </label>
                                    </div>
                                </div>
                                <hr>
                                <h6>Sicherheit</h6>
                                <hr>

                                <div class="d-flex flex-wrap ">
                                    <div class="form-check form-switch me-3">
                                        <input class="form-check-input"
                                               name="ssl_login_aktiv" type="checkbox"
                                               role="switch"
                                               id="SwitchSSLLogin" <?= !get_option('ssl_login_aktiv') ?: ' checked' ?>>
                                        <label class="form-check-label" for="SwitchSSLLogin">SSL-Login
                                            erzwingen </label>
                                    </div>
                                    <div class="form-check form-switch me-3">
                                        <input class="form-check-input"
                                               name="admin_ssl_login_aktiv" type="checkbox"
                                               role="switch"
                                               id="SwitchAdminSSLLogin" <?= !get_option('admin_ssl_login_aktiv') ?: ' checked' ?>>
                                        <label class="form-check-label" for="SwitchAdminSSLLogin">SSL-Admin erzwingen
                                        </label>
                                    </div>
                                </div>

                                <hr>
                                <h6>Datenbank</h6>
                                <hr>
                                <div class="form-check form-switch mb-3 me-3">
                                    <input class="form-check-input"
                                           name="db_repair" type="checkbox"
                                           role="switch"
                                           id="WPDBRepair" <?= !get_option('hupa_db_repair') ?: ' checked' ?>>
                                    <label class="form-check-label" for="WPDBRepair">Datenbank Reparieren | Optimieren
                                        <sup class="text-danger fw-bold">4*</sup></label>
                                </div>
                                <hr>
                            </form>
                            <div class="help mt-5">
                                <div class="form-text">
                                    <b class="text-danger">1<sup>*</sup></b>
                                    Mit WordPress 5.2 wurde der Wiederherstellungsmodus eingeführt, der eine
                                    Fehlermeldung anstelle eines weißen Bildschirms anzeigt, wenn ein Plug-in einen
                                    fatalen Fehler verursacht. Leider werden die PHP-Fehlermeldungen den Benutzern nicht
                                    mehr angezeigt. Wenn Sie WP_DEBUG oder WP_DEBUG_DISPLAY aktivieren wollen, müssen
                                    Sie den Wiederherstellungsmodus deaktivieren, indem Sie true auf
                                    WP_DISABLE_FATAL_ERROR_HANDLER setzen:
                                </div>
                                <hr class="mt-1 mb-1">
                                <div class="form-text mt-2">
                                    <b class="text-danger">2<sup>*</sup></b>
                                    Ein Must-Use-Plugin wird geladen, bevor normale Plugins und das Theme geladen
                                    werden.
                                    Bei aktivierung werden nur noch Fehler in die Log-Datei geschrieben. Warnungen oder
                                    Notizen werden ausgeblendet.
                                </div>
                                <hr class="mt-1 mb-1">
                                <div class="form-text mt-2">
                                    <b class="text-danger">3<sup>*</sup></b>
                                    WordPress bietet in seiner Grundeinstellung viele Sicherungen bei der Erstellung
                                    Ihrer Inhalte. So kann man bei Fehlern recht komfortabel vorherige Versionen von
                                    Seiten und Beiträgen wieder aktivieren. Beim Aufbau einer Website bzw. bei der
                                    regelmäßigen Pflege wächst die Größe der Datenbank recht schnell an.
                                </div>
                                <hr class="mt-1 mb-1">
                                <div class="form-text mt-2">
                                    <b class="text-danger">4<sup>*</sup></b>
                                    Mit dieser Option können Sie die Datenbank von WordPress reparieren und auch die
                                    Inhalte optimieren. Dies kann notwendig werden, wenn die Website langsamer
                                    wird oder sich unerklärliche 404er-Fehler häufen.
                                    Nach dem Aktivieren des Codes können Sie <a class="strong-font-weight"
                                                                                target="_blank"
                                                                                href="<?= site_url() ?>/wp-admin/maint/repair.php">
                                        <?= site_url() ?>/wp-admin/maint/repair.php</a> die
                                    Reparatur und/oder Optimierung durchführen.
                                    <b class="text-danger strong-font-weight">
                                        Nach der Optimierung sollten Sie
                                        diese Option aus Gründen der Sicherheit wieder deaktivieren </b> !
                                </div>
                                <hr class="mt-1 mb-1">
                            </div>
                        </div>
                    </div><!--collapse-->
                    <!--//JOB WARNING SORTIERE SITE-->
                    <div class="collapse" id="PostsSortSettings"
                         data-bs-parent="#settings_display_data">

                        <div class="border rounded mt-1 shadow-sm p-3 bg-custom-gray" style="min-height: 55vh">
                            <form class="sendAjaxThemeForm" action="#" method="post">
                                <input type="hidden" name="method" value="theme_form_handle">
                                <input type="hidden" name="handle" value="theme_options_order">
                                <div class="d-flex align-items-center flex-wrap">
                                    <h5 class="card-title">
                                        <i class="font-blue fa fa-wordpress"></i>&nbsp; Sortieren Einstellungen
                                    </h5>
                                    <div class="ajax-status-spinner ms-auto d-inline-block mb-2 pe-2"></div>
                                </div>
                                <hr>
                                <h6>
                                    <i class="font-blue fa fa-arrow-circle-down"></i>
                                    Sortieren für vorhandene Post Types anzeigen oder ausblenden</h6>
                                <hr>
                                <?php
                                global $hupa_menu_helper;
                                $options = $hupa_menu_helper->hupa_get_sort_options();
                                $post_types = get_post_types();
                                $ignore_post_types = ['reply','topic','report','status','wp_block'];

                                foreach ($post_types as $post_type_name):
                                    if (in_array($post_type_name, $ignore_post_types)) {
                                        continue;
                                    }
                                    if (is_post_type_hierarchical($post_type_name)) {
                                        //continue;
                                    }
                                    $post_type_data = get_post_type_object($post_type_name);
                                    if ($post_type_data->show_ui === FALSE) {
                                        continue;
                                    } ?>
                                    <div class="mb-3">
                                        <label for="postTypeSelect"
                                               class="form-label mb-1 strong-font-weight"><?= esc_html($post_type_data->labels->singular_name) ?></label>
                                        <select id="postTypeSelect" name="show_reorder_interfaces[<?=esc_attr($post_type_name)?>]" class="form-select">
                                            <option value="show" <?= isset($options['show_reorder_interfaces'][$post_type_name]) && $options['show_reorder_interfaces'][$post_type_name] == 'show' ? ' selected' : ''; ?>><?= esc_html__("show", 'bootscore') ?></option>
                                            <option value="hide" <?= isset($options['show_reorder_interfaces'][$post_type_name]) && $options['show_reorder_interfaces'][$post_type_name] == 'hide' ? ' selected' : '' ?>><?= esc_html__("hide", 'bootscore') ?></option>
                                        </select>
                                    </div>
                                <?php endforeach; ?>
                                <hr>
                                <h6>
                                    <i class="font-blue fa fa-arrow-circle-down"></i> <?= esc_html__('Minimum requirement for using this function', 'bootscore') ?>
                                </h6>
                                <hr>
                                <label for="capabilitySelect"
                                       class="form-label mb-1 strong-font-weight"><?= esc_html__('User Role', 'bootscore') ?></label>
                                <select id="capabilitySelect" name="capability" class="form-select mb-3">
                                    <option value="read" <?=isset($options['capability']) && $options['capability'] == "read" ? 'selected' : '' ?>><?= esc_html__('Subscriber', 'bootscore') ?></option>
                                    <option value="edit_posts" <?=isset($options['capability']) && $options['capability'] == "edit_posts" ? 'selected' : '' ?>><?= esc_html__('Contributor', 'bootscore') ?></option>
                                    <option value="publish_posts" <?=isset($options['capability']) && $options['capability'] == "publish_posts" ? 'selected' : '' ?>><?= esc_html__('Author', 'bootscore') ?></option>
                                    <option value="publish_pages" <?=isset($options['capability']) && $options['capability'] == "publish_pages" ? 'selected' : '' ?>><?= esc_html__('Editor', 'bootscore') ?></option>
                                    <option value="manage_options" <?=!isset($options['capability']) || empty($options['capability']) || (isset($options['capability']) && $options['capability'] == "manage_options") ? 'selected' : '' ?>><?= esc_html__('Administrator', 'bootscore') ?></option>
                                </select>
                                <hr>

                                <div class="form-check form-switch mb-1">
                                    <input class="form-check-input" type="checkbox" role="switch"
                                           id="AutoSortChecked" name="autosort" <?=!$options['autosort'] ?: 'checked' ?>>
                                    <label class="form-check-label"
                                           for="AutoSortChecked"><?= esc_html__('Automatic sorting', 'bootscore') ?>
                                        </label>
                                </div>
                                <div class="form-text mb-3">
                                    <?= esc_html__('If selected, the plugin will automatically change the WordPress queries to use the new order (no code update is required). If only certain queries should use the custom sorting, do not select this and add "orderby" => \'menu_order\' as a parameter to the queries.', 'bootscore') ?>
                                </div>
                                <hr>
                                <div class="form-check form-switch mb-1">
                                    <input class="form-check-input" name="adminsort" type="checkbox" role="switch"
                                           id="AdminSortChecked" <?=!$options['adminsort'] ?:'checked'?>>
                                    <label class="form-check-label"
                                           for="AdminSortChecked"><?= esc_html__('Admin sorting', 'bootscore') ?>
                                        </label>
                                </div>
                                <div class="form-text mb-3">
                                    <?= esc_html__('This tick must be set so that the entries are displayed in the standard list view according to the set order.', 'bootscore') ?>
                                </div>
                                <hr>
                                <div class="form-check form-switch mb-1">
                                    <input class="form-check-input" name="use_query_asc_desc" type="checkbox" role="switch"
                                           id="AscDescChecked" <?=!$options['use_query_ASC_DESC']?:'checked'?>>
                                    <label class="form-check-label"
                                           for="AscDescChecked"><?= esc_html__('Use ASC/DESC parameters in query', 'bootscore') ?>
                                    </label>
                                </div>
                                <div class="form-text mb-3">
                                    <?= esc_html__('If the query contains an order parameter, use it. If the query order is set to DESC, the order is reversed.', 'bootscore') ?>
                                </div>
                                <hr>
                                <div class="form-check form-switch mb-1">
                                    <input class="form-check-input" name="archive_drag_drop" type="checkbox" role="switch"
                                           id="ArchiveDragDropChecked" <?=!$options['archive_drag_drop']?:'checked'?>>
                                    <label class="form-check-label"
                                           for="ArchiveDragDropChecked"><?= esc_html__('Archive Drag & Drop', 'bootscore') ?>
                                    </label>
                                </div>
                                <div class="form-text mb-3">
                                    <?= esc_html__('Allows sortable drag & drop functionality within the standard WordPress post type archives. Admin sorting must be active for this.', 'bootscore') ?>
                                </div>
                                <hr>
                                <div class="form-check form-switch mb-1">
                                    <input class="form-check-input" name="navigation_sort_apply" type="checkbox" role="switch"
                                           id="NextPreviousChecked" <?=!$options['navigation_sort_apply']?:'checked'?>>
                                    <label class="form-check-label"
                                           for="NextPreviousChecked"><?= esc_html__('Next / Apply Previous Next / Previous Apply', 'bootscore') ?>
                                    </label>
                                </div>
                                <div class="form-text mb-3">
                                    <?= esc_html__('Apply the sort to the entire Next / Previous navigation.', 'bootscore') ?>
                                </div>
                            </form>
                        </div>
                    </div><!--endSortieren-->
                    <!--//JOB WARNING Kopieren SITE-->
                    <div class="collapse" id="PostsCopySettings"
                         data-bs-parent="#settings_display_data">

                        <div class="border rounded mt-1 shadow-sm p-3 bg-custom-gray" style="min-height: 55vh">
                            <form class="sendAjaxThemeForm" action="#" method="post">
                                <input type="hidden" name="method" value="theme_form_handle">
                                <input type="hidden" name="handle" value="theme_options_duplicate">
                                <div class="d-flex align-items-center flex-wrap">
                                    <h5 class="card-title">
                                        <i class="font-blue fa fa-wordpress"></i>&nbsp; <?=__('Posts | Pages Duplicate', 'bootscore')?>
                                    </h5>
                                    <div class="ajax-status-spinner ms-auto d-inline-block mb-2 pe-2"></div>
                                </div>
                                <hr>
                                <h6>
                                    <i class="font-blue fa fa-arrow-circle-down"></i>
                                    <?=__('Show or hide duplicate for existing post types', 'bootscore')?></h6>
                                <hr>

                                <?php
                                global $hupa_menu_helper;
                                $options = $hupa_menu_helper->hupa_get_duplicate_options();
                                $post_types = get_post_types();
                                $ignore_post_types = ['reply','attachment','topic','report','status','wp_block'];

                                foreach ($post_types as $post_type_name):

                                if (in_array($post_type_name, $ignore_post_types)) {
                                    continue;
                                }

                                if (is_post_type_hierarchical($post_type_name)) {
                                    //continue;
                                }
                                $post_type_data = get_post_type_object($post_type_name);
                                if ($post_type_data->show_ui === FALSE) {
                                    continue;
                                } ?>
                                    <div class="mb-3">
                                        <label for="postTypeDuplicatorSelect"
                                               class="form-label mb-1 strong-font-weight"><?= esc_html($post_type_data->labels->singular_name) ?></label>
                                        <select id="postTypeDuplicatorSelect" name="show_duplicate_interfaces[<?=esc_attr($post_type_name)?>]" class="form-select">
                                            <option value="show" <?= isset($options['show_duplicate_interfaces'][$post_type_name]) && $options['show_duplicate_interfaces'][$post_type_name] == 'show' ? ' selected' : ''; ?>><?= esc_html__("show", 'bootscore') ?></option>
                                            <option value="hide" <?= isset($options['show_duplicate_interfaces'][$post_type_name]) && $options['show_duplicate_interfaces'][$post_type_name] == 'hide' ? ' selected' : '' ?>><?= esc_html__("hide", 'bootscore') ?></option>
                                        </select>
                                    </div>
                                <?php endforeach; ?>
                                <hr>
                                <h6>
                                    <i class="font-blue fa fa-arrow-circle-down"></i> <?= esc_html__('Minimum requirement for using this function', 'bootscore') ?>
                                </h6>
                                <hr>
                                <label for="capabilityDuplicatorSelect"
                                       class="form-label mb-1 strong-font-weight"><?= esc_html__('User Role', 'bootscore') ?></label>
                                <select id="capabilityDuplicatorSelect" name="capability" class="form-select mb-3">
                                    <option value="read" <?=isset($options['capability']) && $options['capability'] == "read" ? 'selected' : '' ?>><?= esc_html__('Subscriber', 'bootscore') ?></option>
                                    <option value="edit_posts" <?=isset($options['capability']) && $options['capability'] == "edit_posts" ? 'selected' : '' ?>><?= esc_html__('Contributor', 'bootscore') ?></option>
                                    <option value="publish_posts" <?=isset($options['capability']) && $options['capability'] == "publish_posts" ? 'selected' : '' ?>><?= esc_html__('Author', 'bootscore') ?></option>
                                    <option value="publish_pages" <?=isset($options['capability']) && $options['capability'] == "publish_pages" ? 'selected' : '' ?>><?= esc_html__('Editor', 'bootscore') ?></option>
                                    <option value="manage_options" <?=!isset($options['capability']) || empty($options['capability']) || (isset($options['capability']) && $options['capability'] == "manage_options") ? 'selected' : '' ?>><?= esc_html__('Administrator', 'bootscore') ?></option>
                                </select>
                                <hr>
                                 <div class="form-check form-switch mb-1">
                                    <input class="form-check-input" name="copy_draft" type="checkbox" role="switch"
                                           id="KopieDraftChecked" <?=!$options['copy_draft']?:'checked'?> disabled>
                                    <label class="form-check-label"
                                           for="KopieDraftChecked"><?= esc_html__('Set copy to draft', 'bootscore') ?>
                                    </label>
                                </div>
                            </form>
                        </div>
                    </div><!--PostsCopySettings End-->


                </div><!--parent-->
            </div>
        </div>
    </div>
    <!--Modal-->
    <div class="modal fade" id="ThemeDebugLogModal" tabindex="-1" aria-labelledby="dialog-add-iconLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-fullscreen modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header bg-hupa">
                    <h5 class="modal-title" id="exampleModalLabel"><?= __('Debug Log', 'bootscore'); ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="debug-log"></div>
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn-log-renew btn btn-outline-secondary"><i
                                class="fa fa-refresh"></i> aktualisieren
                    </button>
                    <button type="button" class="btn btn-hupa btn-outline-secondary" data-bs-dismiss="modal"><i
                                class="fa fa-close"></i> Schließen
                    </button>
                </div>
            </div>
        </div>
    </div>

</div>
<div id="snackbar-success"></div>
<div id="snackbar-warning"></div>