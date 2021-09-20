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

        <div class="card card-license shadow-sm">
            <h5 class="card-header d-flex align-items-center bg-hupa py-4">
                <i class="icon-hupa-white d-block mt-2" style="font-size: 2rem"></i>&nbsp;
                <?= __('Theme  Licences', 'bootscore') ?> </h5>
            <div class="card-body pb-4" style="min-height: 72vh">
                <div class="d-flex align-items-center">
                    <h5 class="card-title"><i
                                class="hupa-color fa fa-arrow-circle-right"></i> <?= __('Manage licence', 'bootscore') ?>
                        / <span id="currentSideTitle"><?= __('Settings', 'bootscore') ?></span>
                    </h5>
                </div>

                <hr>
                <div class="settings-btn-group d-flex">
                    <button data-site="<?= __('Settings', 'bootscore') ?>" type="button"
                            data-bs-toggle="collapse" data-bs-target="#collapseSettingsLicenseSite"
                            aria-expanded="true" aria-controls="collapseSettingsLicenseSite"
                            class="btn-collapse btn btn-hupa btn-outline-secondary btn-sm active" disabled><i
                                class="fa fa-share-alt"></i>&nbsp;
                        Hupa <?= __('Lizenzen', 'bootscore') ?>
                    </button>

                    <!--<button onclick="changeRangeUpdate();" data-site="<?= __('Manage pins', 'bootscore') ?>" type="button"
                                data-bs-toggle="collapse" data-bs-target="#collapseSettingsPinsSite"
                                aria-expanded="false" aria-controls="collapseSettingsPinsSite"
                                class="btn-collapse btn btn-hupa btn-outline-secondary btn-sm"><i class="fa fa-map"></i>&nbsp;
                            <?= __('Manage pins', 'bootscore') ?>
                        </button>-->
                </div>
                <hr>
                <div id="licence_display_data">
                    <!--  TODO JOB WARNING licence STARTSEITE -->
                    <div class="collapse show" id="collapseSettingsLicenseSite"
                         data-bs-parent="#licence_display_data">
                        <div class="border rounded mt-1 shadow-sm p-3 bg-custom-gray" style="min-height: 50vh">
                            <h5 class="card-title">
                                <i class="font-blue fa fa-wordpress"></i>&nbsp;aktive Lizenzen<!--<?= __('Access data', 'bootscore') ?>-->
                            </h5>
                            <hr>
                            <div class="container">
                                <div class="col-xl-10 offset-xl-1 pt-3">
                                   <?php
                                    $formDate = date('d.m.Y \u\m H:i:s', strtotime(get_option('hupa_product_install_time')));
                                    ?>
                                    <h5>HUPA Theme <small class="d-block small-title">aktiviert am <?=$formDate?></small></h5>
                                    <hr>
                                       <!-- <div class="row row-cols-1 row-cols-xl-2 g-2">
                                            <div class="col">
                                                <div class="mb-3">
                                                    <label for="ClientIDInput" class="form-label">
                                                        <?= __('Client ID', 'bootscore') ?> <span
                                                                class="text-danger">*</span></label>
                                                    <input type="text" class="form-control"
                                                           value="<?= get_option('hupa_product_client_id') ?>"
                                                           id="ClientIDInput" autocomplete="cc-number" disabled required>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="mb-3">
                                                    <label for="clientSecretInput" class="form-label">
                                                        <?= __('Client secret', 'bootscore') ?> <span
                                                                class="text-danger">*</span></label>
                                                    <input type="text" class="form-control"
                                                           value="<?= get_option('hupa_product_client_secret') ?>"
                                                           id="clientSecretInput" autocomplete="cc-number" disabled required>
                                                </div>
                                            </div>
                                        </div>-->
                                        <!--<div class="mb-3">
                                            <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>&nbsp;
                                                Lizenz löschen
                                            </button>
                                            <span id="activateBtn"></span>
                                        </div>-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
