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
                                    <?php if(POST_SELECT_ACTIVE):
                                        $postDate = date('d.m.Y \u\m H:i:s', strtotime(get_option('post_selector_install_time')));
                                        ?>
                                        <h5>Plugin WP Post-Selector <small class="d-block small-title">aktiviert am <?=$postDate?></small></h5>
                                        <hr>
                                    <?php endif;?>
                                    <?php if(BS_FORMULAR_ACTIVE):
                                        $bsFormDate = date('d.m.Y \u\m H:i:s', strtotime(get_option('bs_formular_install_time')));
                                        ?>
                                        <h5>Plugin BS-Formular <small class="d-block small-title">aktiviert am <?=$bsFormDate?></small></h5>
                                        <hr>
                                    <?php endif;?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
