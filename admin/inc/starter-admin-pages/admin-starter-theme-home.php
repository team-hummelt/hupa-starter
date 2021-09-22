<?php
defined( 'ABSPATH' ) or die();
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
                <i class="icon-hupa-white d-block mt-2"
                   style="font-size: 2rem"></i>&nbsp; <?= __( 'Theme Settings', 'bootscore' ) ?></h5>
            <div class="card-body pb-4" style="min-height: 72vh">
                <div class="d-flex align-items-center">
                    <h5 class="card-title"><i
                                class="hupa-color fa fa-arrow-circle-right"></i> <?= __( 'Settings', 'bootscore' ) ?> /
                        <span id="currentSideTitle"><?= __( 'actual', 'bootscore' ) ?></span>
                    </h5>
                    <div class="ajax-status-spinner ms-auto d-inline-block mb-2 pe-2"></div>
                </div>
                <hr>
                <div class="settings-btn-group">
                    <button data-site="<?= __( 'actual', 'bootscore' ) ?>" type="button"
                            data-bs-toggle="collapse" data-bs-target="#collapseSettingsHomeSite"
                            aria-expanded="true" aria-controls="collapseSettingsHomeSite"
                            class="btn-collapse btn btn-hupa btn-outline-secondary btn-sm active" disabled><i
                                class="fa fa-home"></i>&nbsp;
						<?= __( 'Hupa actual', 'bootscore' ) ?>
                    </button>

                    <button data-site="<?= __( 'General', 'bootscore' ) ?>" type="button"
                            data-bs-toggle="collapse" data-bs-target="#collapseSettingsGeneralSite"
                            aria-expanded="false" aria-controls="collapseSettingsGeneralSite"
                            class="btn-collapse btn btn-hupa btn-outline-secondary btn-sm"><i class="fa fa-tasks"></i>&nbsp;
						<?= __( 'General', 'bootscore' ) ?>
                    </button>

                    <button data-site="<?= __( 'Fonts', 'bootscore' ) ?>" type="button"
                            data-bs-toggle="collapse" data-bs-target="#collapseSettingsFontsSite"
                            aria-expanded="false" aria-controls="collapseSettingsFontsSite"
                            class="btn-collapse btn btn-hupa btn-outline-secondary btn-sm"><i class="fa fa-font"></i>&nbsp;
						<?= __( 'Fonts', 'bootscore' ) ?>
                    </button>

                    <button data-site="<?= __( 'Colors', 'bootscore' ) ?>" type="button"
                            data-bs-toggle="collapse" data-bs-target="#collapseSettingsColorSite"
                            aria-expanded="false" aria-controls="collapseSettingsColorSite"
                            class="btn-collapse btn btn-hupa btn-outline-secondary btn-sm"><i class="fa fa-magic"></i>&nbsp;
						<?= __( 'Colors', 'bootscore' ) ?>
                    </button>

                    <button data-site="<?= __( 'Theme options', 'bootscore' ) ?>" type="button"
                            data-bs-toggle="collapse" data-bs-target="#collapseSettingsOtherOption"
                            aria-expanded="true" aria-controls="collapseSettingsOtherOption"
                            class="btn-collapse btn btn-hupa btn-outline-secondary btn-sm"><i class="fa fa-gears"></i>&nbsp;
						<?= __( 'Theme options', 'bootscore' ) ?>
                    </button>

                    <div class="ms-auto">
                        <button data-site="<?= __( 'Reset', 'bootscore' ) ?>" type="button"
                                data-bs-toggle="collapse" data-bs-target="#collapseSettingsResetOption"
                                aria-expanded="true" aria-controls="collapseSettingsResetOption"
                                class="btn-collapse btn btn-hupa btn-outline-secondary btn-sm"><i
                                    class="fa fa-random"></i>&nbsp;
							<?= __( 'Reset', 'bootscore' ) ?>
                        </button>
                    </div>
                </div>
                <hr>
                <div id="settings_display_data">
                    <!--  TODO JOB WARNING STARTSEITE -->
                    <div class="collapse show" id="collapseSettingsHomeSite" data-bs-parent="#settings_display_data">
                        <div class="hupa-news-wrapper">
                            <div class="d-flex justify-content-center align-items-center">
                                <a title="Full-Service-Werbeagentur aus Magdeburg"
                                   href="https://www.hummelt-werbeagentur.de/">
                                    <img class="my-4 img-fluid" alt=""
                                         src="<?= THEME_ADMIN_URL . 'assets/images/hupa-logo.svg' ?>" width="300">
                                </a>
                            </div>
                            <hr>
                            <h4 class="text-center"><?= __( 'News and Updates', 'bootscore' ) ?></h4>
                            <hr>
                        </div>
                        <small class="card-body-bottom">DB: <i class="hupa-color"> <?=HUPA_STARTER_THEME_DB_VERSION?></i> | THEME: <i class="hupa-color"><?=THEME_VERSION?></i> | CHILD: <i class="hupa-color"><?=CHILD_VERSION?></i></small>
                    </div>

                    <!--  TODO JOB WARNING GENERAL ALLGEMEIN -->
                    <div class="collapse" id="collapseSettingsGeneralSite" data-bs-parent="#settings_display_data">
                        <form class="sendAjaxThemeForm" action="#" method="post">
                            <input type="hidden" name="method" value="theme_form_handle">
                            <input type="hidden" name="handle" value="theme_general">
                            <!--//TODO JOB Überschrift Allgemeine Settings-->
                            <div class="bg-accordion-gray">
                                <h5 class="card-title">
                                    <i class="font-blue fa fa-gears p-3"></i>&nbsp; <?= __( 'General Theme Settings', 'bootscore' ) ?>
                                </h5>
                            </div>
                            <div class="accordion accordion-sm" id="accordionGeneralSettings">
                                <!--TODO JOB DESIGN LAYOUT-->
                                <div class="accordion-item">

                                    <h2 class="accordion-header" id="headerFontDesign">
                                        <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse"
                                                data-bs-target="#collapseDesign" aria-expanded="false"
                                                aria-controls="collapseDesign">
                                            <i class="fa fa-arrow-right"></i>&nbsp;
                                            <b><?= __( 'Design', 'bootscore' ); ?></b>&nbsp;<?= __( 'Layout', 'bootscore' ); ?>
                                        </button>
                                    </h2>
                                    <div id="collapseDesign" class="accordion-collapse collapse"
                                         aria-labelledby="headerFontDesign"
                                         data-bs-parent="#accordionGeneralSettings">
                                        <div class="border rounded mt-1 shadow-sm p-3 bg-custom-gray">
                                            <div class="row g-3 pb-3">
                                                <div class="col-lg-12 pt-2">
                                                    <h6>
                                                        <i class="font-blue fa fa-wpforms"></i>&nbsp;<?= __( 'Layout Settings', 'bootscore' ); ?>
                                                    </h6>
                                                    <hr>
                                                    <div class="d-flex flex-wrap">
                                                        <div class="form-check form-switch my-2 my-md-1 me-md-3">
                                                            <input class="form-check-input" name="fix_header"
                                                                   type="checkbox"
                                                                   id="CheckFixHeaderActive" <?= ! get_hupa_option( 'fix_header' ) ?: 'checked' ?>>
                                                            <label class="form-check-label" for="CheckFixHeaderActive">
																<?= __( 'Fixed Header', 'bootscore' ) ?>
                                                            </label>
                                                        </div>
                                                        <div class="form-check form-switch my-2 my-md-1 ms-3">
                                                            <input class="form-check-input" name="fix_footer"
                                                                   type="checkbox"
                                                                   id="CheckFixFooterActive" <?= ! get_hupa_option( 'fix_footer' ) ?: 'checked' ?>>
                                                            <label class="form-check-label" for="CheckFixFooterActive">
																<?= __( 'Fixed Footer', 'bootscore' ) ?>
                                                            </label>
                                                        </div>

                                                        <div class="form-check form-switch my-2 my-md-1 ms-3">
                                                            <input class="form-check-input" name="scroll_top"
                                                                   type="checkbox"
                                                                   id="CheckScrollTopActive" <?= ! get_hupa_option( 'scroll_top' ) ?: 'checked' ?>>
                                                            <label class="form-check-label" for="CheckScrollTopActive">
																<?= __( 'Show Scroll To Top Button', 'bootscore' ) ?>
                                                            </label>
                                                        </div>

                                                        <div class="form-check form-switch my-2 my-md-1 mx-3">
                                                            <input class="form-check-input" name="edit_link"
                                                                   type="checkbox"
                                                                   id="CheckEditLinkActive" <?= ! get_hupa_option( 'edit_link' ) ?: 'checked' ?>>
                                                            <label class="form-check-label" for="CheckEditLinkActive">
																<?= __( 'Show edit link', 'bootscore' ) ?>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr>
                                                <!--TOP AREA-->
                                                <div class="col-lg-12 pt-2">
                                                    <h6>
                                                        <i class="font-blue fa fa-newspaper-o"></i>&nbsp;<?= __( 'Top Area', 'bootscore' ); ?>
                                                    </h6>

                                                    <hr>
                                                    <div class="form-check form-switch my-2 my-md-1 me-3">
                                                        <input class="form-check-input" name="top_aktiv"
                                                               type="checkbox"
                                                               id="CheckTopAreaActive" <?= ! get_hupa_option( 'top_aktiv' ) ?: 'checked' ?>>
                                                        <label class="form-check-label" for="CheckTopAreaActive">
															<?= __( 'Top Area anzeigen', 'bootscore' ) ?>
                                                        </label>
                                                    </div>
                                                    <hr>
                                                    <h6 class="my-2">Top Area Container</h6>
                                                    <div class="d-flex flex-wrap">
                                                        <div class="form-check my-2 my-md-1 me-md-3">
                                                            <input class="form-check-input" type="radio"
                                                                   name="top_area_container"
                                                                   id="radioTopAreaContainer1"
                                                                   value="1" <?= get_hupa_option( 'top_area_container' ) == 1 ? 'checked' : '' ?>>
                                                            <label class="form-check-label" for="radioTopAreaContainer1">
                                                                <?= __( 'container', 'bootscore' ); ?>
                                                            </label>
                                                        </div>
                                                        <div class="form-check my-2 my-md-1 mx-3">
                                                            <input class="form-check-input" type="radio"
                                                                   name="top_area_container"
                                                                   id="radioTopAreaContainer2"
                                                                   value="2" <?= get_hupa_option( 'top_area_container' ) == 2 ? 'checked' : '' ?>>
                                                            <label class="form-check-label" for="radioTopAreaContainer2">
                                                                <?= __( 'container-fluid', 'bootscore' ); ?>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="form-text">
                                                        <?= __( '<code>container-fluid</code>extends across the entire width of the browser.', 'bootscore' ) ?>
                                                    </div>

                                                    <hr>
                                                    <h6>
                                                        <i class="font-blue fa fa-navicon"></i>&nbsp;<?= __( 'Menu Container', 'bootscore' ); ?>
                                                    </h6>
                                                    <hr>
                                                    <div class="d-flex flex-wrap">
                                                        <div class="form-check my-2 my-md-1 me-md-3">
                                                            <input class="form-check-input" type="radio"
                                                                   name="menu_container"
                                                                   id="radioMenuContainer1"
                                                                   value="1" <?= get_hupa_option( 'menu_container' ) == 1 ? 'checked' : '' ?>>
                                                            <label class="form-check-label" for="radioMenuContainer1">
																<?= __( 'container', 'bootscore' ); ?>
                                                            </label>
                                                        </div>
                                                        <div class="form-check my-2 my-md-1 mx-3">
                                                            <input class="form-check-input" type="radio"
                                                                   name="menu_container"
                                                                   id="radioMenuContainer2"
                                                                   value="2" <?= get_hupa_option( 'menu_container' ) == 2 ? 'checked' : '' ?>>
                                                            <label class="form-check-label" for="radioMenuContainer2">
																<?= __( 'container-fluid', 'bootscore' ); ?>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="form-text">
                                                        <?= __( '<code>container-fluid</code>extends across the entire width of the browser.', 'bootscore' ) ?>
                                                    </div>
                                                    <hr>
                                                    <h6>
                                                        <i class="font-blue fa fa-navicon"></i>&nbsp;<?= __( 'Main Container', 'bootscore' ); ?>
                                                    </h6>
                                                    <hr>
                                                    <div class="d-flex flex-wrap">
                                                        <div class="form-check my-2 my-md-1 me-md-3">
                                                            <input class="form-check-input" type="radio"
                                                                   name="main_container"
                                                                   id="radioMainContainer1"
                                                                   value="1" <?= get_hupa_option( 'main_container' ) == 1 ? 'checked' : '' ?>>
                                                            <label class="form-check-label" for="radioMainContainer1">
                                                                <?= __( 'container', 'bootscore' ); ?>
                                                            </label>
                                                        </div>
                                                        <div class="form-check my-2 my-md-1 mx-3">
                                                            <input class="form-check-input" type="radio"
                                                                   name="main_container"
                                                                   id="radioMainContainer2"
                                                                   value="2" <?= get_hupa_option( 'main_container' ) == 2 ? 'checked' : '' ?>>
                                                            <label class="form-check-label" for="radioMainContainer2">
                                                                <?= __( 'container-fluid', 'bootscore' ); ?>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="form-text">
                                                        <?= __( '<code>container-fluid</code>extends across the entire width of the browser.', 'bootscore' ) ?>
                                                    </div>
                                               </div>
                                                <hr>
                                                <div class="col-lg-12 pt-2">
                                                    <h6>
                                                        <i class="font-blue fa fa-tasks"></i>&nbsp;<?= __( 'Main menu Settings', 'bootscore' ); ?>
                                                    </h6>
                                                    <hr>
                                                    <div class="d-flex flex-wrap">
                                                        <div class="form-check my-2 my-md-1 me-md-3">
                                                            <input class="form-check-input" type="radio" name="menu"
                                                                   id="radioMenu1"
                                                                   value="1" <?= get_hupa_option( 'menu' ) == 1 ? 'checked' : '' ?>>
                                                            <label class="form-check-label" for="radioMenu1">
																<?= __( 'Standard menu', 'bootscore' ); ?>
                                                            </label>
                                                        </div>
                                                        <div class="form-check my-2 my-md-1 mx-3">
                                                            <input class="form-check-input" type="radio" name="menu"
                                                                   id="radioMenu2"
                                                                   value="2" <?= get_hupa_option( 'menu' ) == 2 ? 'checked' : '' ?>>
                                                            <label class="form-check-label" for="radioMenu2">
																<?= __( 'Main menu', 'bootscore' ); ?> 2
                                                            </label>
                                                        </div>
                                                        <div class="form-check my-2 my-md-1 mx-3">
                                                            <input class="form-check-input" type="radio" name="menu"
                                                                   id=radioMenu3
                                                                   value="3" <?= get_hupa_option( 'menu' ) == 3 ? 'checked' : '' ?>>
                                                            <label class="form-check-label" for="radioMenu3">
																<?= __( 'Main menu', 'bootscore' ); ?> 3
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 pt-2">
                                                    <h6>
                                                        <i class="font-blue fa fa-bars"></i>&nbsp;<?= __( 'Handy Menu Settings', 'bootscore' ); ?>
                                                    </h6>
                                                    <hr>
                                                    <div class="d-flex flex-wrap">
                                                        <div class="form-check my-2 my-md-1 me-md-3">
                                                            <input class="form-check-input" type="radio" name="handy"
                                                                   id="radioHandy1"
                                                                   value="1" <?= get_hupa_option( 'handy' ) == 1 ? 'checked' : '' ?>>
                                                            <label class="form-check-label" for="radioHandy1">
																<?= __( 'Handy Menu', 'bootscore' ); ?> 1
                                                            </label>
                                                        </div>
                                                        <div class="form-check my-2 my-md-1 mx-3">
                                                            <input class="form-check-input" type="radio" name="handy"
                                                                   id="radioHandy2"
                                                                   value="2" <?= get_hupa_option( 'handy' ) == 2 ? 'checked' : '' ?>>
                                                            <label class="form-check-label" for="radioHandy2">
																<?= __( 'Handy Menu', 'bootscore' ); ?> 2
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--//TODO JOB BILDUPLOAD LOGO AND LOGIN -->
                                        <!--Section zwei -->
                                        <div class="border rounded mt-4 shadow-sm p-3 bg-custom-gray">
                                            <hr>
                                            <h5 class="card-title">
                                                <i class="font-blue fa fa-upload"></i>&nbsp; <?= __( 'Logo upload and Settings', 'bootscore' ) ?>
                                            </h5>
                                            <div class="col-lg-12 pt-2">
                                                <hr>
                                                <h6 class="px-2">
                                                    <i class="font-blue fa fa-file-photo-o"></i>&nbsp;<?= __( 'Image Upload', 'bootscore' ); ?>
                                                </h6>
                                                <hr>
                                                <div class="pt-1">
													<?= __( 'Logo for Header', 'bootscore' ); ?>
                                                </div>
                                                <hr>
                                                <div class="pb-2" id="theme-logo-upload">
                                                    <!--Image Upload-->
													<?php
													$imgLogo = '';
													$imgId   = get_hupa_option( 'logo_image' );
													if ( $imgId ) {
														$img     = wp_get_attachment_image_src( $imgId, 'large' );
														$imgLogo = '<img class="range-image img-fluid" src="' . $img[0] . '" width="200">';
													} ?>
                                                    <!-- LOGO IMAGE -->
                                                    <div data-multiple="0"
                                                         class="admin-wp-media-container <?= $imgLogo ? '' : 'd-none' ?>">
														<?= $imgLogo ?>
                                                    </div>
                                                    <!-- DEFAULT IMAGE -->
                                                    <div class="theme-default-image <?= $imgLogo ? 'd-none' : '' ?>">
                                                        <img class="img-fluid"
                                                             src="<?= THEME_ADMIN_URL . 'assets/images/hupa-logo.svg' ?>"
                                                             alt=""
                                                             width="200">
                                                    </div>

                                                    <button type="button" data-container="theme-logo-upload"
                                                            data-type="header_logo"
                                                            class="theme_upload_media_img mt-3 mb-2 btn btn-outline-secondary btn-sm <?= $imgLogo ? 'd-none' : '' ?>">
                                                        <i class="fa fa-picture-o"></i>&nbsp;
														<?= __( 'Click here to select image', 'bootscore' ) ?>
                                                    </button>

                                                    <button type="button" data-container="theme-logo-upload"
                                                            data-type="header_logo"
                                                            class="theme_delete_media_img btn btn-outline-danger mt-3 mb-2 btn-sm <?= $imgLogo ? '' : 'd-none' ?>">
                                                        <i class="fa fa-trash"></i>
                                                        &nbsp;<?= __( 'Remove image', 'bootscore' ); ?>
                                                    </button>

                                                    <div class="col-lg-3 col-md-6 col-sm-8 col pt-3">
                                                        <label for="imgSizeRange"
                                                               class="count-box form-label pb-1"><?= __( 'Image size', 'bootscore' ); ?>
                                                            :
                                                            <span class="show-range-value"><?= get_hupa_option( 'logo_size' ) ?></span>
                                                            (px)</label>
                                                        <input data-container="theme-logo-upload" type="range"
                                                               name="logo_size" min="10" max="500"
                                                               value="<?= get_hupa_option( 'logo_size' ) ?>"
                                                               class="form-range sizeRange" id="imgSizeRange"
															<?= $imgLogo ? '' : 'disabled' ?>>
                                                    </div>
                                                    <hr>
                                                </div>
                                                <div class=" pt-1">
													<?= __( 'Logo for Login', 'bootscore' ); ?>
                                                </div>
                                                <hr>
												<?php
												$loginLogo = '';
												$imgId     = get_hupa_option( 'login_image' );
												if ( $imgId ) {
													$loginL = wp_get_attachment_image_src($imgId,'full');
													$loginLogo = '<img class="img-fluid" src ="'.$loginL[0].'" width="200">';
												}
												?>
                                                <div class="form-check form-switch my-2 ">
                                                    <input class="form-check-input" name="login_img_aktiv"
                                                           type="checkbox"
                                                           data-bs-toggle="collapse"
                                                           data-bs-target="#collapseImageForLogin"
                                                           aria-controls="collapseImageForLogin"
                                                           id="CheckHeaderLogoActive" <?= ! get_hupa_option( 'login_img_aktiv' ) ?: 'checked' ?>>
                                                    <label class="form-check-label" for="CheckHeaderLogoActive">
														<?= __( 'Use header logo', 'bootscore' ) ?>
                                                    </label>
                                                </div>

                                                <div id="collapseImageForLogin"
                                                     class="collapse <?= get_hupa_option( 'login_img_aktiv' ) ? '' : 'show' ?>">
                                                    <hr>
                                                    <div id="login-logo-upload">
                                                        <!--Image Upload-->
                                                        <!-- LOGIN IMAGE -->
                                                        <div data-multiple="0"
                                                             class="admin-wp-media-container <?= $loginLogo ? '' : 'd-none' ?>">
															<?= $loginLogo ?>
                                                        </div>
                                                        <!-- DEFAULT IMAGE -->
                                                        <div class="theme-default-image <?= $loginLogo ? 'd-none' : '' ?>">
                                                            <img class="img-fluid"
                                                                 src="<?= THEME_ADMIN_URL . 'assets/images/hupa-logo.svg' ?>"
                                                                 alt=""
                                                                 width="200">
                                                        </div>

                                                        <button type="button" data-container="login-logo-upload"
                                                                data-type="login_logo"
                                                                class="theme_upload_media_img mt-3 mb-2 btn btn-outline-secondary btn-sm <?= $loginLogo ? 'd-none' : '' ?>">
                                                            <i class="fa fa-picture-o"></i>&nbsp;
															<?= __( 'Click here to select image', 'bootscore' ) ?>
                                                        </button>

                                                        <button type="button" data-container="login-logo-upload"
                                                                data-type="login_logo"
                                                                class="theme_delete_media_img btn btn-outline-danger mt-3 mb-2 btn-sm <?= $loginLogo ? '' : 'd-none' ?>">
                                                            <i class="fa fa-trash"></i>
                                                            &nbsp;<?= __( 'Remove image', 'bootscore' ); ?>
                                                        </button>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="col-lg-6">
                                                    <label for="inputLogoUrl"
                                                           class="form-label"><?= __( 'URL for Login Logo', 'bootscore' ); ?>
                                                        :</label>
                                                    <input type="url" name="login_logo_url"
                                                           value="<?= get_hupa_option( 'login_logo_url' ) ?>"
                                                           class="form-control" id="inputLogoUrl">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--Design Layout END -->
                                <!--TODO JOB Container Settings-->
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headerFontContainer">
                                        <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse"
                                                data-bs-target="#collapseContainer" aria-expanded="false"
                                                aria-controls="collapseContainer">
                                            <i class="fa fa-arrow-right"></i>&nbsp;
                                            <b><?= __( 'Container', 'bootscore' ); ?></b>&nbsp;<?= __( 'Settings', 'bootscore' ); ?>
                                        </button>
                                    </h2>
                                    <div id="collapseContainer" class="accordion-collapse collapse"
                                         aria-labelledby="headerContainerDesign"
                                         data-bs-parent="#accordionGeneralSettings">
                                        <div class="border rounded mt-1 shadow-sm p-3 bg-custom-gray">
                                            <div class="row g-3 pb-3">
                                                <div class="col-lg-12 pt-2">
                                                    <h6>
                                                        <i class="font-blue fa fa-arrows"></i>&nbsp;<?= __( 'Fullwidth Page Paddings', 'bootscore' ); ?>
                                                    </h6>
                                                    <hr>
                                                    <div class="row g-3 py-1">
                                                        <div id="container-fwTop" class="col-lg-3 col-md-6 col-12">
                                                            <label for="RangeFwTop"
                                                                   class="form-label"><b><?= __( 'Top', 'bootscore' ); ?>
                                                                    <span class="show-range-value"><?= get_hupa_option( 'fw_top' ) ?></span>
                                                                    (Px)</b></label>
                                                            <input data-container="container-fwTop" type="range"
                                                                   name="fw_top" class="form-range sizeRange" min="0"
                                                                   max="100" step="1"
                                                                   value="<?= get_hupa_option( 'fw_top' ) ?>"
                                                                   id="RangeFwTop">
                                                        </div>
                                                        <div id="container-fwBottom" class="col-lg-3 col-md-6 col-12">
                                                            <label for="RangeFwBottom"
                                                                   class="form-label"><b><?= __( 'Bottom', 'bootscore' ); ?>
                                                                    <span class="show-range-value"><?= get_hupa_option( 'fw_bottom' ) ?></span>
                                                                    (Px)</b></label>
                                                            <input data-container="container-fwBottom" type="range"
                                                                   class="form-range sizeRange" name="fw_bottom" min="0"
                                                                   max="100"
                                                                   value="<?= get_hupa_option( 'fw_bottom' ) ?>"
                                                                   step="1" id="RangeFwBottom">
                                                        </div>
                                                    </div>

                                                    <div class="row g-3 py-2">
                                                        <div id="container-fwLeft" class="col-lg-3 col-md-6 col-12">
                                                            <label for="RangeFwLeft"
                                                                   class="form-label"><b><?= __( 'Left', 'bootscore' ); ?>
                                                                    <span class="show-range-value"><?= get_hupa_option( 'fw_left' ) ?></span>
                                                                    (Px)</b></label>
                                                            <input data-container="container-fwLeft" type="range"
                                                                   name="fw_left" class="form-range sizeRange" min="0"
                                                                   max="100" step="1"
                                                                   value="<?= get_hupa_option( 'fw_left' ) ?>"
                                                                   id="RangeFwLeft">
                                                        </div>
                                                        <div id="container-fwRight" class="col-lg-3 col-md-6 col-12">
                                                            <label for="RangeFwRight"
                                                                   class="form-label"><b><?= __( 'Right', 'bootscore' ); ?>
                                                                    <span class="show-range-value"><?= get_hupa_option( 'fw_right' ) ?></span>
                                                                    (Px)</b></label>
                                                            <input data-container="container-fwRight" type="range"
                                                                   class="form-range sizeRange" name="fw_right" min="0"
                                                                   max="100"
                                                                   value="<?= get_hupa_option( 'fw_right' ) ?>"
                                                                   step="1" id="RangeFwRight">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!--Item END-->

                            </div><!--Accordion END -->
                        </form>
                        <div class="ajax-status-spinner ps-2 pt-3"></div>
                    </div>
                    <!--  TODO JOB WARNING FONTS -->
                    <div class="collapse" id="collapseSettingsFontsSite" data-bs-parent="#settings_display_data">
                        <button
                                role="button" onclick="sync_font_folder(this);"
                                class="btn btn-outline-light btn-sm border-secondary text-secondary mb-3">
                            <i class="text-success fa fa-refresh slow-spin"></i>&nbsp;
							<?= __( 'Synchronize font folder', 'bootscore' ) ?>
                            <div class="form-text mt-0">
								<?= __( 'After synchronisation, the page must be <b>reloaded</b>.', 'bootscore' ) ?>
                            </div>
                        </button>
                        <!--//TODO JOB SUCCESS MESSAGE-->
                        <div class="collapse" id="collapseSuccessMsg">
                            <div class="fontSuccessMsg alert alert-success d-block text-center alert-dismissible my-3"
                                 role="alert">
                                <h5><?= __( 'Folder synchronised!', 'bootscore' ) ?></h5> <small class="d-block">
									<?= __( 'The changes are visible after reloading the page.', 'bootscore' ) ?>
                                </small>
                            </div>
                            <div class="text-center">
                                <button role="button" onclick="reload_settings_page();"
                                        class="btn btn-outline-light btn-sm border-secondary text-secondary">
                                    <i class="text-danger fa fa-refresh fa-spin"></i>&nbsp; <?= __( 'Reload page', 'bootscore' ) ?>
                                </button>
                            </div>
                            <hr>
                        </div>
                        <!--//TODO JOB Überschriften-->
                        <div class="bg-accordion-gray">
                            <h5 class="card-title p-3">
                                <i class="font-blue fa fa-arrow-down"></i>&nbsp; <?= __( 'Headlines', 'bootscore' ) ?>
                            </h5>
                        </div>
                        <div class="accordion accordion-sm" id="accordionHeaderFonts">
                            <!--TODO JOB H1 FONT-->
                            <div class="accordion-item">
                                <form class="sendAjaxThemeForm" action="#" method="post">
                                    <input type="hidden" name="method" value="theme_form_handle">
                                    <input type="hidden" name="handle" value="theme_fonts">
                                    <input type="hidden" name="type" value="h1_font">
                                    <h2 class="accordion-header" id="headerFontH1">
                                        <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse"
                                                data-bs-target="#collapseH1" aria-expanded="false"
                                                aria-controls="collapseH1">
                                            <i class="fa fa-arrow-right"></i>&nbsp;
                                            <b>H1</b>&nbsp;<?= __( 'Headline', 'bootscore' ); ?>
                                        </button>
                                    </h2>
                                    <div id="collapseH1" class="accordion-collapse collapse"
                                         aria-labelledby="headerFontH1"
                                         data-bs-parent="#accordionHeaderFonts">

                                        <div class="accordion-body bg-custom-gray">
                                            <fieldset id="fontH1">
                                                <div class="row g-3 py-1">
                                                    <div class="col-lg-3 col-md-6 col-12">
                                                        <label for="InputH1Family" class="form-label">
                                                            <b><?= __( 'Font family', 'bootscore' ); ?></b></label>
                                                        <select class="form-select"
                                                                onchange="font_family_change(this, 'InputH1Style');"
                                                                id="InputH1Family" name="font_family">
															<?php
															$family = apply_filters( 'get_font_family_select', false );
															foreach ( $family as $key => $val ):
																get_hupa_option( 'h1_font_family' ) === $val->family ? $sel = 'selected' : $sel = '';
																?>
                                                                <option value="<?= $val->family ?>" <?= $sel ?>><?= $val->family ?></option>
															<?php endforeach; ?>
                                                        </select>
                                                    </div>

                                                    <div class="col-lg-3 col-md-6 col-12">
                                                        <label for="InputH1Style" class="form-label">
                                                            <b><?= __( 'Font style', 'bootscore' ); ?></b></label>
                                                        <select class="form-select" id="InputH1Style" name="font_style">
															<?php
															$style = apply_filters( 'get_font_style_select', get_hupa_option( 'h1_font_family' ) );
															foreach ( $style as $key => $val ):
																$key == get_hupa_option( 'h1_font_style' ) ? $sel = 'selected' : $sel = '';
																?>
                                                                <option value="<?= $key ?>" <?= $sel ?>><?= $val ?></option>
															<?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row g-3 py-1">
                                                    <div id="font-h1-font-size" class="col-lg-3 col-md-6 col-12">
                                                        <label for="RangeFontSizeH1"
                                                               class="form-label"><b><?= __( 'Font size', 'bootscore' ); ?>
                                                                <span class="show-range-value"><?= get_hupa_option( 'h1_font_size' ) ?></span>
                                                                (Px)</b></label>
                                                        <input data-container="font-h1-font-size" type="range"
                                                               name="font_size" class="form-range sizeRange" min="10"
                                                               max="100" step="1"
                                                               value="<?= get_hupa_option( 'h1_font_size' ) ?>"
                                                               id="RangeFontSizeH1">
                                                    </div>
                                                    <div id="font-h1-font-height" class="col-lg-3 col-md-6 col-12">
                                                        <label for="RangeFontHeightH1"
                                                               class="form-label"><b><?= __( 'row height', 'bootscore' ); ?>
                                                                <span class="show-range-value"><?= get_hupa_option( 'h1_font_height' ) ?></span></b>
                                                        </label>
                                                        <input data-container="font-h1-font-height" type="range"
                                                               class="form-range sizeRange" name="font_height" min="0"
                                                               max="5"
                                                               value="<?= get_hupa_option( 'h1_font_height' ) ?>"
                                                               step="0.1" id="RangeFontHeightH1">
                                                    </div>
                                                </div>
                                            </fieldset>

                                            <hr>
                                            <div class="d-flex flex-wrap">
                                                <div class="form-check form-switch me-3">
                                                    <input data-container="fontH1"
                                                           class="form-check-input bs-switch-action"
                                                           name="font_bs_check" type="checkbox"
                                                           id="flexSwitchCheckBSH1" <?= get_hupa_option( 'h1_font_bs_check' ) ? 'checked' : '' ?>>
                                                    <label class="form-check-label" for="flexSwitchCheckBSH1">
														<?= __( 'Use standard font', 'bootscore' ); ?> </label>
                                                </div>

                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox"
                                                           name="font_display_check"
                                                           id="flexSwitchCheckDisplayH1" <?= get_hupa_option( 'h1_font_display_check' ) ? 'checked' : '' ?>>
                                                    <label class="form-check-label" for="flexSwitchCheckDisplayH1">
														<?= __( 'Display heading', 'bootscore' ); ?> </label>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="d-flex align-items-center">
                                                <div class="input-color-container">
                                                    <input id="InputColorH1"
                                                           value="<?= get_hupa_option( 'h1_font_color' ) ?>"
                                                           name="font_color"
                                                           class="input-color" type="color">
                                                </div>
                                                <label class="input-color-label ms-2" for="InputColorH1">
                                                    <b>H1</b> <?= __( 'Font colour', 'bootscore' ); ?>
                                                </label>
                                                <div class="ajax-status-spinner ms-auto d-inline-block mb-2 pe-2"></div>
                                            </div>

                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!--TODO JOB H2 FONT-->
                            <div class="accordion-item">
                                <form class="sendAjaxThemeForm" action="#" method="post">
                                    <input type="hidden" name="method" value="theme_form_handle">
                                    <input type="hidden" name="handle" value="theme_fonts">
                                    <input type="hidden" name="type" value="h2_font">
                                    <h2 class="accordion-header" id="headerFontH2">
                                        <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse"
                                                data-bs-target="#collapseH2" aria-expanded="false"
                                                aria-controls="collapseH2">
                                            <i class="fa fa-arrow-right"></i>&nbsp;
                                            <b>H2</b>&nbsp;<?= __( 'Headline', 'bootscore' ); ?>
                                        </button>
                                    </h2>
                                    <div id="collapseH2" class="accordion-collapse collapse"
                                         aria-labelledby="headerFontH2"
                                         data-bs-parent="#accordionHeaderFonts">

                                        <div class="accordion-body bg-custom-gray">
                                            <fieldset id="fontH2">
                                                <div class="row g-3 py-1">
                                                    <div class="col-lg-3 col-md-6 col-12">
                                                        <label for="InputH2Family" class="form-label">
                                                            <b><?= __( 'Font family', 'bootscore' ); ?></b></label>
                                                        <select class="form-select"
                                                                onchange="font_family_change(this, 'InputH2Style');"
                                                                id="InputH2Family" name="font_family">
															<?php
															$family = apply_filters( 'get_font_family_select', false );
															foreach ( $family as $key => $val ):
																get_hupa_option( 'h2_font_family' ) === $val->family ? $sel = 'selected' : $sel = '';
																?>
                                                                <option value="<?= $val->family ?>" <?= $sel ?>><?= $val->family ?></option>
															<?php endforeach; ?>
                                                        </select>
                                                    </div>

                                                    <div class="col-lg-3 col-md-6 col-12">
                                                        <label for="InputH2Style" class="form-label">
                                                            <b><?= __( 'Font style', 'bootscore' ); ?></b></label>
                                                        <select class="form-select" id="InputH2Style" name="font_style">
															<?php
															$style = apply_filters( 'get_font_style_select', get_hupa_option( 'h2_font_family' ) );
															foreach ( $style as $key => $val ):
																$key == get_hupa_option( 'h2_font_style' ) ? $sel = 'selected' : $sel = '';
																?>
                                                                <option value="<?= $key ?>" <?= $sel ?>><?= $val ?></option>
															<?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row g-3 py-1">
                                                    <div id="font-h2-font-size" class="col-lg-3 col-md-6 col-12">
                                                        <label for="RangeFontSizeH2"
                                                               class="form-label"><b><?= __( 'Font size', 'bootscore' ); ?>
                                                                <span class="show-range-value"><?= get_hupa_option( 'h2_font_size' ) ?></span>
                                                                (Px)</b></label>
                                                        <input data-container="font-h2-font-size" type="range"
                                                               name="font_size" class="form-range sizeRange" min="10"
                                                               max="80" step="1"
                                                               value="<?= get_hupa_option( 'h2_font_size' ) ?>"
                                                               id="RangeFontSizeH2">
                                                    </div>
                                                    <div id="font-h2-font-height" class="col-lg-3 col-md-6 col-12">
                                                        <label for="RangeFontHeightH2"
                                                               class="form-label"><b><?= __( 'row height', 'bootscore' ); ?>
                                                                <span class="show-range-value"><?= get_hupa_option( 'h2_font_height' ) ?></span></b>
                                                        </label>
                                                        <input data-container="font-h2-font-height" type="range"
                                                               class="form-range sizeRange" name="font_height" min="0"
                                                               max="5"
                                                               value="<?= get_hupa_option( 'h2_font_height' ) ?>"
                                                               step="0.1" id="RangeFontHeightH2">
                                                    </div>
                                                </div>
                                            </fieldset>
                                            <hr>
                                            <div class="d-flex flex-wrap">
                                                <div class="form-check form-switch me-3">
                                                    <input data-container="fontH2"
                                                           class="form-check-input bs-switch-action"
                                                           name="font_bs_check" type="checkbox"
                                                           id="flexSwitchCheckBSH2" <?= get_hupa_option( 'h2_font_bs_check' ) ? 'checked' : '' ?>>
                                                    <label class="form-check-label" for="flexSwitchCheckBSH2">
														<?= __( 'Use standard font', 'bootscore' ); ?> </label>
                                                </div>

                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox"
                                                           name="font_display_check"
                                                           id="flexSwitchCheckDisplayH2" <?= get_hupa_option( 'h2_font_display_check' ) ? 'checked' : '' ?>>
                                                    <label class="form-check-label" for="flexSwitchCheckDisplayH2">
														<?= __( 'Display heading', 'bootscore' ); ?> </label>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="d-flex align-items-center">
                                                <div class="input-color-container">
                                                    <input id="InputColorH2"
                                                           value="<?= get_hupa_option( 'h2_font_color' ) ?>"
                                                           name="font_color"
                                                           class="input-color" type="color">
                                                </div>
                                                <label class="input-color-label ms-2" for="InputColorH2">
                                                    <b>H2</b> <?= __( 'Font colour', 'bootscore' ); ?>
                                                </label>
                                                <div class="ajax-status-spinner ms-auto d-inline-block mb-2 pe-2"></div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <!--TODO JOB H3 FONT-->
                            <div class="accordion-item">
                                <form class="sendAjaxThemeForm" action="#" method="post">
                                    <input type="hidden" name="method" value="theme_form_handle">
                                    <input type="hidden" name="handle" value="theme_fonts">
                                    <input type="hidden" name="type" value="h3_font">
                                    <h2 class="accordion-header" id="headerFontH3">
                                        <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse"
                                                data-bs-target="#collapseH3" aria-expanded="false"
                                                aria-controls="collapseH3">
                                            <i class="fa fa-arrow-right"></i>&nbsp;
                                            <b>H3</b>&nbsp;<?= __( 'Headline', 'bootscore' ); ?>
                                        </button>
                                    </h2>
                                    <div id="collapseH3" class="accordion-collapse collapse"
                                         aria-labelledby="headerFontH3"
                                         data-bs-parent="#accordionHeaderFonts">

                                        <div class="accordion-body bg-custom-gray">
                                            <fieldset id="fontH3">
                                                <div class="row g-3 py-1">
                                                    <div class="col-lg-3 col-md-6 col-12">
                                                        <label for="InputH3Family" class="form-label">
                                                            <b><?= __( 'Font family', 'bootscore' ); ?></b></label>
                                                        <select class="form-select"
                                                                onchange="font_family_change(this, 'InputH3Style');"
                                                                id="InputH3Family" name="font_family">
															<?php
															$family = apply_filters( 'get_font_family_select', false );
															foreach ( $family as $key => $val ):
																get_hupa_option( 'h3_font_family' ) === $val->family ? $sel = 'selected' : $sel = '';
																?>
                                                                <option value="<?= $val->family ?>" <?= $sel ?>><?= $val->family ?></option>
															<?php endforeach; ?>
                                                        </select>
                                                    </div>

                                                    <div class="col-lg-3 col-md-6 col-12">
                                                        <label for="InputH3Style" class="form-label">
                                                            <b><?= __( 'Font style', 'bootscore' ); ?></b></label>
                                                        <select class="form-select" id="InputH3Style" name="font_style">
															<?php
															$style = apply_filters( 'get_font_style_select', get_hupa_option( 'h3_font_family' ) );
															foreach ( $style as $key => $val ):
																$key == get_hupa_option( 'h3_font_style' ) ? $sel = 'selected' : $sel = '';
																?>
                                                                <option value="<?= $key ?>" <?= $sel ?>><?= $val ?></option>
															<?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row g-3 py-1">
                                                    <div id="font-h3-font-size" class="col-lg-3 col-md-6 col-12">
                                                        <label for="RangeFontSizeH3"
                                                               class="form-label"><b><?= __( 'Font size', 'bootscore' ); ?>
                                                                <span class="show-range-value"><?= get_hupa_option( 'h3_font_size' ) ?></span>
                                                                (Px)</b></label>
                                                        <input data-container="font-h3-font-size" type="range"
                                                               name="font_size" class="form-range sizeRange" min="10"
                                                               max="80" step="1"
                                                               value="<?= get_hupa_option( 'h3_font_size' ) ?>"
                                                               id="RangeFontSizeH3">
                                                    </div>
                                                    <div id="font-h3-font-height" class="col-lg-3 col-md-6 col-12">
                                                        <label for="RangeFontHeightH3"
                                                               class="form-label"><b><?= __( 'row height', 'bootscore' ); ?>
                                                                <span class="show-range-value"><?= get_hupa_option( 'h3_font_height' ) ?></span></b>
                                                        </label>
                                                        <input data-container="font-h3-font-height" type="range"
                                                               class="form-range sizeRange" name="font_height" min="0"
                                                               max="5"
                                                               value="<?= get_hupa_option( 'h3_font_height' ) ?>"
                                                               step="0.1" id="RangeFontHeightH3">
                                                    </div>
                                                </div>
                                            </fieldset>
                                            <hr>
                                            <div class="d-flex flex-wrap">
                                                <div class="form-check form-switch me-3">
                                                    <input data-container="fontH3"
                                                           class="form-check-input bs-switch-action"
                                                           name="font_bs_check" type="checkbox"
                                                           id="flexSwitchCheckBSH3" <?= get_hupa_option( 'h3_font_bs_check' ) ? 'checked' : '' ?>>
                                                    <label class="form-check-label" for="flexSwitchCheckBSH3">
														<?= __( 'Use standard font', 'bootscore' ); ?> </label>
                                                </div>

                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox"
                                                           name="font_display_check"
                                                           id="flexSwitchCheckDisplayH3" <?= get_hupa_option( 'h3_font_display_check' ) ? 'checked' : '' ?>>
                                                    <label class="form-check-label" for="flexSwitchCheckDisplayH3">
														<?= __( 'Display heading', 'bootscore' ); ?> </label>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="d-flex align-items-center">
                                                <div class="input-color-container">
                                                    <input id="InputColorH3"
                                                           value="<?= get_hupa_option( 'h3_font_color' ) ?>"
                                                           name="font_color"
                                                           class="input-color" type="color">
                                                </div>
                                                <label class="input-color-label ms-2" for="InputColorH3">
                                                    <b>H3</b> <?= __( 'Font colour', 'bootscore' ); ?>
                                                </label>
                                                <div class="ajax-status-spinner ms-auto d-inline-block mb-2 pe-2"></div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <!--TODO JOB H4 FONT-->
                            <div class="accordion-item">
                                <form class="sendAjaxThemeForm" action="#" method="post">
                                    <input type="hidden" name="method" value="theme_form_handle">
                                    <input type="hidden" name="handle" value="theme_fonts">
                                    <input type="hidden" name="type" value="h4_font">
                                    <h2 class="accordion-header" id="headerFontH4">
                                        <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse"
                                                data-bs-target="#collapseH4" aria-expanded="false"
                                                aria-controls="collapseH4">
                                            <i class="fa fa-arrow-right"></i>&nbsp;
                                            <b>H4</b>&nbsp;<?= __( 'Headline', 'bootscore' ); ?>
                                        </button>
                                    </h2>
                                    <div id="collapseH4" class="accordion-collapse collapse"
                                         aria-labelledby="headerFontH4"
                                         data-bs-parent="#accordionHeaderFonts">

                                        <div class="accordion-body bg-custom-gray">
                                            <fieldset id="fontH4">
                                                <div class="row g-3 py-1">
                                                    <div class="col-lg-3 col-md-6 col-12">
                                                        <label for="InputH4Family" class="form-label">
                                                            <b><?= __( 'Font family', 'bootscore' ); ?></b></label>
                                                        <select class="form-select"
                                                                onchange="font_family_change(this, 'InputH4Style');"
                                                                id="InputH4Family" name="font_family">
															<?php
															$family = apply_filters( 'get_font_family_select', false );
															foreach ( $family as $key => $val ):
																get_hupa_option( 'h4_font_family' ) === $val->family ? $sel = 'selected' : $sel = '';
																?>
                                                                <option value="<?= $val->family ?>" <?= $sel ?>><?= $val->family ?></option>
															<?php endforeach; ?>
                                                        </select>
                                                    </div>

                                                    <div class="col-lg-3 col-md-6 col-12">
                                                        <label for="InputH4Style" class="form-label">
                                                            <b><?= __( 'Font style', 'bootscore' ); ?></b></label>
                                                        <select class="form-select" id="InputH4Style" name="font_style">
															<?php
															$style = apply_filters( 'get_font_style_select', get_hupa_option( 'h4_font_family' ) );
															foreach ( $style as $key => $val ):
																$key == get_hupa_option( 'h4_font_style' ) ? $sel = 'selected' : $sel = '';
																?>
                                                                <option value="<?= $key ?>" <?= $sel ?>><?= $val ?></option>
															<?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row g-3 py-1">
                                                    <div id="font-h4-font-size" class="col-lg-3 col-md-6 col-12">
                                                        <label for="RangeFontSizeH4"
                                                               class="form-label"><b><?= __( 'Font size', 'bootscore' ); ?>
                                                                <span class="show-range-value"><?= get_hupa_option( 'h4_font_size' ) ?></span>
                                                                (Px)</b></label>
                                                        <input data-container="font-h4-font-size" type="range"
                                                               name="font_size" class="form-range sizeRange" min="10"
                                                               max="80" step="1"
                                                               value="<?= get_hupa_option( 'h4_font_size' ) ?>"
                                                               id="RangeFontSizeH4">
                                                    </div>
                                                    <div id="font-h4-font-height" class="col-lg-3 col-md-6 col-12">
                                                        <label for="RangeFontHeightH4"
                                                               class="form-label"><b><?= __( 'row height', 'bootscore' ); ?>
                                                                <span class="show-range-value"><?= get_hupa_option( 'h4_font_height' ) ?></span></b>
                                                        </label>
                                                        <input data-container="font-h4-font-height" type="range"
                                                               class="form-range sizeRange" name="font_height" min="0"
                                                               max="5"
                                                               value="<?= get_hupa_option( 'h4_font_height' ) ?>"
                                                               step="0.1" id="RangeFontHeightH4">
                                                    </div>
                                                </div>
                                            </fieldset>
                                            <hr>
                                            <div class="d-flex flex-wrap">
                                                <div class="form-check form-switch me-3">
                                                    <input data-container="fontH4"
                                                           class="form-check-input bs-switch-action"
                                                           name="font_bs_check" type="checkbox"
                                                           id="flexSwitchCheckBSH4" <?= get_hupa_option( 'h4_font_bs_check' ) ? 'checked' : '' ?>>
                                                    <label class="form-check-label" for="flexSwitchCheckBSH4">
														<?= __( 'Use standard font', 'bootscore' ); ?> </label>
                                                </div>

                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox"
                                                           name="font_display_check"
                                                           id="flexSwitchCheckDisplayH4" <?= get_hupa_option( 'h4_font_display_check' ) ? 'checked' : '' ?>>
                                                    <label class="form-check-label" for="flexSwitchCheckDisplayH4">
														<?= __( 'Display heading', 'bootscore' ); ?> </label>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="d-flex align-items-center">
                                                <div class="input-color-container">
                                                    <input id="InputColorH4"
                                                           value="<?= get_hupa_option( 'h4_font_color' ) ?>"
                                                           name="font_color"
                                                           class="input-color" type="color">
                                                </div>
                                                <label class="input-color-label ms-2" for="InputColorH4">
                                                    <b>H4</b> <?= __( 'Font colour', 'bootscore' ); ?>
                                                </label>
                                                <div class="ajax-status-spinner ms-auto d-inline-block mb-2 pe-2"></div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <!--TODO JOB H5 FONT-->
                            <div class="accordion-item">
                                <form class="sendAjaxThemeForm" action="#" method="post">
                                    <input type="hidden" name="method" value="theme_form_handle">
                                    <input type="hidden" name="handle" value="theme_fonts">
                                    <input type="hidden" name="type" value="h5_font">
                                    <h2 class="accordion-header" id="headerFontH5">
                                        <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse"
                                                data-bs-target="#collapseH5" aria-expanded="false"
                                                aria-controls="collapseH5">
                                            <i class="fa fa-arrow-right"></i>&nbsp;
                                            <b>H5</b>&nbsp;<?= __( 'Headline', 'bootscore' ); ?>
                                        </button>
                                    </h2>
                                    <div id="collapseH5" class="accordion-collapse collapse"
                                         aria-labelledby="headerFontH5"
                                         data-bs-parent="#accordionHeaderFonts">

                                        <div class="accordion-body bg-custom-gray">
                                            <fieldset id="fontH5">
                                                <div class="row g-3 py-1">
                                                    <div class="col-lg-3 col-md-6 col-12">
                                                        <label for="InputH5Family" class="form-label">
                                                            <b><?= __( 'Font family', 'bootscore' ); ?></b></label>
                                                        <select class="form-select"
                                                                onchange="font_family_change(this, 'InputH5Style');"
                                                                id="InputH5Family" name="font_family">
															<?php
															$family = apply_filters( 'get_font_family_select', false );
															foreach ( $family as $key => $val ):
																get_hupa_option( 'h5_font_family' ) === $val->family ? $sel = 'selected' : $sel = '';
																?>
                                                                <option value="<?= $val->family ?>" <?= $sel ?>><?= $val->family ?></option>
															<?php endforeach; ?>
                                                        </select>
                                                    </div>

                                                    <div class="col-lg-3 col-md-6 col-12">
                                                        <label for="InputH5Style" class="form-label">
                                                            <b><?= __( 'Font style', 'bootscore' ); ?></b></label>
                                                        <select class="form-select" id="InputH5Style" name="font_style">
															<?php
															$style = apply_filters( 'get_font_style_select', get_hupa_option( 'h5_font_family' ) );
															foreach ( $style as $key => $val ):
																$key == get_hupa_option( 'h5_font_style' ) ? $sel = 'selected' : $sel = '';
																?>
                                                                <option value="<?= $key ?>" <?= $sel ?>><?= $val ?></option>
															<?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row g-3 py-1">
                                                    <div id="font-h5-font-size" class="col-lg-3 col-md-6 col-12">
                                                        <label for="RangeFontSizeH5"
                                                               class="form-label"><b><?= __( 'Font size', 'bootscore' ); ?>
                                                                <span class="show-range-value"><?= get_hupa_option( 'h5_font_size' ) ?></span>
                                                                (Px)</b></label>
                                                        <input data-container="font-h5-font-size" type="range"
                                                               name="font_size" class="form-range sizeRange" min="10"
                                                               max="80" step="1"
                                                               value="<?= get_hupa_option( 'h5_font_size' ) ?>"
                                                               id="RangeFontSizeH5">
                                                    </div>
                                                    <div id="font-h5-font-height" class="col-lg-3 col-md-6 col-12">
                                                        <label for="RangeFontHeightH5"
                                                               class="form-label"><b><?= __( 'row height', 'bootscore' ); ?>
                                                                <span class="show-range-value"><?= get_hupa_option( 'h5_font_height' ) ?></span></b>
                                                        </label>
                                                        <input data-container="font-h5-font-height" type="range"
                                                               class="form-range sizeRange" name="font_height" min="0"
                                                               max="5"
                                                               value="<?= get_hupa_option( 'h5_font_height' ) ?>"
                                                               step="0.1" id="RangeFontHeightH5">
                                                    </div>
                                                </div>
                                            </fieldset>
                                            <hr>
                                            <div class="d-flex flex-wrap">
                                                <div class="form-check form-switch me-3">
                                                    <input data-container="fontH5"
                                                           class="form-check-input bs-switch-action"
                                                           name="font_bs_check" type="checkbox"
                                                           id="flexSwitchCheckBSH5" <?= get_hupa_option( 'h5_font_bs_check' ) ? 'checked' : '' ?>>
                                                    <label class="form-check-label" for="flexSwitchCheckBSH5">
														<?= __( 'Use standard font', 'bootscore' ); ?> </label>
                                                </div>

                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox"
                                                           name="font_display_check"
                                                           id="flexSwitchCheckDisplayH5" <?= get_hupa_option( 'h5_font_display_check' ) ? 'checked' : '' ?>>
                                                    <label class="form-check-label" for="flexSwitchCheckDisplayH5">
														<?= __( 'Display heading', 'bootscore' ); ?> </label>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="d-flex align-items-center">
                                                <div class="input-color-container">
                                                    <input id="InputColorH5"
                                                           value="<?= get_hupa_option( 'h5_font_color' ) ?>"
                                                           name="font_color"
                                                           class="input-color" type="color">
                                                </div>
                                                <label class="input-color-label ms-2" for="InputColorH5">
                                                    <b>H5</b> <?= __( 'Font colour', 'bootscore' ); ?>
                                                </label>
                                                <div class="ajax-status-spinner ms-auto d-inline-block mb-2 pe-2"></div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!--TODO JOB H6 FONT-->
                            <div class="accordion-item">
                                <form class="sendAjaxThemeForm" action="#" method="post">
                                    <input type="hidden" name="method" value="theme_form_handle">
                                    <input type="hidden" name="handle" value="theme_fonts">
                                    <input type="hidden" name="type" value="h6_font">
                                    <h2 class="accordion-header" id="headerFontH6">
                                        <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse"
                                                data-bs-target="#collapseH6" aria-expanded="false"
                                                aria-controls="collapseH6">
                                            <i class="fa fa-arrow-right"></i>&nbsp;
                                            <b>H6</b>&nbsp;<?= __( 'Headline', 'bootscore' ); ?>
                                        </button>
                                    </h2>
                                    <div id="collapseH6" class="accordion-collapse collapse"
                                         aria-labelledby="headerFontH6"
                                         data-bs-parent="#accordionHeaderFonts">

                                        <div class="accordion-body bg-custom-gray">
                                            <fieldset id="fontH6">
                                                <div class="row g-3 py-1">
                                                    <div class="col-lg-3 col-md-6 col-12">
                                                        <label for="InputH6Family" class="form-label">
                                                            <b><?= __( 'Font family', 'bootscore' ); ?></b></label>
                                                        <select class="form-select"
                                                                onchange="font_family_change(this, 'InputH6Style');"
                                                                id="InputH6Family" name="font_family">
															<?php
															$family = apply_filters( 'get_font_family_select', false );
															foreach ( $family as $key => $val ):
																get_hupa_option( 'h6_font_family' ) === $val->family ? $sel = 'selected' : $sel = '';
																?>
                                                                <option value="<?= $val->family ?>" <?= $sel ?>><?= $val->family ?></option>
															<?php endforeach; ?>
                                                        </select>
                                                    </div>

                                                    <div class="col-lg-3 col-md-6 col-12">
                                                        <label for="InputH6Style" class="form-label">
                                                            <b><?= __( 'Font style', 'bootscore' ); ?></b></label>
                                                        <select class="form-select" id="InputH6Style" name="font_style">
															<?php
															$style = apply_filters( 'get_font_style_select', get_hupa_option( 'h6_font_family' ) );
															foreach ( $style as $key => $val ):
																$key == get_hupa_option( 'h6_font_style' ) ? $sel = 'selected' : $sel = '';
																?>
                                                                <option value="<?= $key ?>" <?= $sel ?>><?= $val ?></option>
															<?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row g-3 py-1">
                                                    <div id="font-h6-font-size" class="col-lg-3 col-md-6 col-12">
                                                        <label for="RangeFontSizeH6"
                                                               class="form-label"><b><?= __( 'Font size', 'bootscore' ); ?>
                                                                <span class="show-range-value"><?= get_hupa_option( 'h6_font_size' ) ?></span>
                                                                (Px)</b></label>
                                                        <input data-container="font-h6-font-size" type="range"
                                                               name="font_size" class="form-range sizeRange" min="10"
                                                               max="80" step="1"
                                                               value="<?= get_hupa_option( 'h6_font_size' ) ?>"
                                                               id="RangeFontSizeH6">
                                                    </div>
                                                    <div id="font-h6-font-height" class="col-lg-3 col-md-6 col-12">
                                                        <label for="RangeFontHeightH6"
                                                               class="form-label"><b><?= __( 'row height', 'bootscore' ); ?>
                                                                <span class="show-range-value"><?= get_hupa_option( 'h6_font_height' ) ?></span></b>
                                                        </label>
                                                        <input data-container="font-h6-font-height" type="range"
                                                               class="form-range sizeRange" name="font_height" min="0"
                                                               max="5"
                                                               value="<?= get_hupa_option( 'h6_font_height' ) ?>"
                                                               step="0.1" id="RangeFontHeightH6">
                                                    </div>
                                                </div>
                                            </fieldset>
                                            <hr>
                                            <div class="d-flex flex-wrap">
                                                <div class="form-check form-switch me-3">
                                                    <input data-container="fontH6"
                                                           class="form-check-input bs-switch-action"
                                                           name="font_bs_check" type="checkbox"
                                                           id="flexSwitchCheckBSH6" <?= get_hupa_option( 'h6_font_bs_check' ) ? 'checked' : '' ?>>
                                                    <label class="form-check-label" for="flexSwitchCheckBSH6">
														<?= __( 'Use standard font', 'bootscore' ); ?> </label>
                                                </div>

                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox"
                                                           name="font_display_check"
                                                           id="flexSwitchCheckDisplayH6" <?= get_hupa_option( 'h6_font_display_check' ) ? 'checked' : '' ?>>
                                                    <label class="form-check-label" for="flexSwitchCheckDisplayH6">
														<?= __( 'Display heading', 'bootscore' ); ?> </label>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="d-flex align-items-center">
                                                <div class="input-color-container">
                                                    <input id="InputColorH6"
                                                           value="<?= get_hupa_option( 'h6_font_color' ) ?>"
                                                           name="font_color"
                                                           class="input-color" type="color">
                                                </div>
                                                <label class="input-color-label ms-2" for="InputColorH6">
                                                    <b>H6</b> <?= __( 'Font colour', 'bootscore' ); ?>
                                                </label>
                                                <div class="ajax-status-spinner ms-auto d-inline-block mb-2 pe-2"></div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="bg-accordion-gray">
                                <!--TODO JOB WIDGET TITLE FONT-->
                                <div class="accordion-item">
                                    <form class="sendAjaxThemeForm" action="#" method="post">
                                        <input type="hidden" name="method" value="theme_form_handle">
                                        <input type="hidden" name="handle" value="theme_fonts">
                                        <input type="hidden" name="type" value="widget_font">
                                        <h2 class="accordion-header" id="headerFontWidget">
                                            <button class="accordion-button collapsed" type="button"
                                                    data-bs-toggle="collapse"
                                                    data-bs-target="#collapseWidget" aria-expanded="false"
                                                    aria-controls="collapseWidget">
                                                <i class="fa fa-arrow-right"></i>&nbsp;
                                                <b>Widget</b>&nbsp; <?= __( 'Headline', 'bootscore' ); ?>
                                            </button>
                                        </h2>
                                        <div id="collapseWidget" class="accordion-collapse collapse"
                                             aria-labelledby="headerFontWidget"
                                             data-bs-parent="#accordionHeaderFonts">

                                            <div class="accordion-body bg-custom-gray">
                                                <fieldset id="fontWidget">
                                                    <div class="row g-3 py-1">
                                                        <div class="col-lg-3 col-md-6 col-12">
                                                            <label for="InputWidgetFamily" class="form-label">
                                                                <b><?= __( 'Font family', 'bootscore' ); ?></b></label>
                                                            <select class="form-select"
                                                                    onchange="font_family_change(this, 'InputWidgetStyle');"
                                                                    id="InputWidgetFamily" name="font_family">
																<?php
																$family = apply_filters( 'get_font_family_select', false );
																foreach ( $family as $key => $val ):
																	get_hupa_option( 'widget_font_family' ) === $val->family ? $sel = 'selected' : $sel = '';
																	?>
                                                                    <option value="<?= $val->family ?>" <?= $sel ?>><?= $val->family ?></option>
																<?php endforeach; ?>
                                                            </select>
                                                        </div>

                                                        <div class="col-lg-3 col-md-6 col-12">
                                                            <label for="InputWidgetStyle" class="form-label">
                                                                <b><?= __( 'Font style', 'bootscore' ); ?></b></label>
                                                            <select class="form-select" id="InputWidgetStyle"
                                                                    name="font_style">
																<?php
																$style = apply_filters( 'get_font_style_select', get_hupa_option( 'widget_font_family' ) );
																foreach ( $style as $key => $val ):
																	$key == get_hupa_option( 'widget_font_style' ) ? $sel = 'selected' : $sel = '';
																	?>
                                                                    <option value="<?= $key ?>" <?= $sel ?>><?= $val ?></option>
																<?php endforeach; ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="row g-3 py-1">
                                                        <div id="font-widget-font-size"
                                                             class="col-lg-3 col-md-6 col-12">
                                                            <label for="RangeFontSizeWidget"
                                                                   class="form-label"><b><?= __( 'Font size', 'bootscore' ); ?>
                                                                    <span class="show-range-value"><?= get_hupa_option( 'widget_font_size' ) ?></span>
                                                                    (Px)</b></label>
                                                            <input data-container="font-widget-font-size" type="range"
                                                                   name="font_size" class="form-range sizeRange"
                                                                   min="10"
                                                                   max="80" step="1"
                                                                   value="<?= get_hupa_option( 'widget_font_size' ) ?>"
                                                                   id="RangeFontSizeWidget">
                                                        </div>
                                                        <div id="font-widget-font-height"
                                                             class="col-lg-3 col-md-6 col-12">
                                                            <label for="RangeFontHeightWidget"
                                                                   class="form-label"><b><?= __( 'row height', 'bootscore' ); ?>
                                                                    <span class="show-range-value"><?= get_hupa_option( 'widget_font_height' ) ?></span></b>
                                                            </label>
                                                            <input data-container="font-widget-font-height" type="range"
                                                                   class="form-range sizeRange" name="font_height"
                                                                   min="0"
                                                                   max="5"
                                                                   value="<?= get_hupa_option( 'widget_font_height' ) ?>"
                                                                   step="0.1" id="RangeFontHeightWidget">
                                                        </div>
                                                    </div>
                                                </fieldset>
                                                <hr>
                                                <div class="d-flex flex-wrap">
                                                    <div class="form-check form-switch me-3">
                                                        <input data-container="fontWidget"
                                                               class="form-check-input bs-switch-action"
                                                               name="font_bs_check" type="checkbox"
                                                               id="flexSwitchCheckBSWidget" <?= get_hupa_option( 'widget_font_bs_check' ) ? 'checked' : '' ?>>
                                                        <label class="form-check-label" for="flexSwitchCheckBSWidget">
															<?= __( 'Use standard font', 'bootscore' ); ?> </label>
                                                    </div>

                                                    <!--<div class="form-check form-switch">
                                                        <input class="form-check-input" type="checkbox"
                                                               name="font_display_check"
                                                               id="flexSwitchCheckDisplayWidget" <?= get_hupa_option( 'widget_font_display_check' ) ? 'checked' : '' ?>>
                                                        <label class="form-check-label"
                                                               for="flexSwitchCheckDisplayWidget">
															<?= __( 'Display heading', 'bootscore' ); ?> </label>
                                                    </div>-->
                                                </div>
                                                <hr>
                                                <div class="d-flex align-items-center">
                                                    <div class="input-color-container">
                                                        <input id="InputColorWidget"
                                                               value="<?= get_hupa_option( 'widget_font_color' ) ?>"
                                                               name="font_color"
                                                               class="input-color" type="color">
                                                    </div>
                                                    <label class="input-color-label ms-2" for="InputColorWidget">
                                                        <b>Widget </b> <?= __( 'Headline', 'bootscore' ); ?> <?= __( 'Font colour', 'bootscore' ); ?>
                                                    </label>
                                                    <div class="ajax-status-spinner ms-auto d-inline-block mb-2 pe-2"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!--//TODO JOB BODY BUTTON TRENNER-->
                                <h5 class="card-title p-3">
                                    <i class="font-blue fa fa-arrow-down"></i>&nbsp; <?= __( 'Body | Menu | Button', 'bootscore' ) ?>
                                </h5>
                                <!--TODO JOB BODY FONT-->
                                <div class="accordion-item">
                                    <form class="sendAjaxThemeForm" action="#" method="post">
                                        <input type="hidden" name="method" value="theme_form_handle">
                                        <input type="hidden" name="handle" value="theme_fonts">
                                        <input type="hidden" name="type" value="body_font">
                                        <h2 class="accordion-header" id="headerFontBody">
                                            <button class="accordion-button collapsed" type="button"
                                                    data-bs-toggle="collapse"
                                                    data-bs-target="#collapseBody" aria-expanded="false"
                                                    aria-controls="collapseBody">
                                                <i class="fa fa-arrow-right"></i>&nbsp;
                                                <b><?= __( 'Body', 'bootscore' ); ?></b>&nbsp; <?= __( 'Font settings', 'bootscore' ); ?>
                                            </button>
                                        </h2>
                                        <div id="collapseBody" class="accordion-collapse collapse"
                                             aria-labelledby="headerFontBody"
                                             data-bs-parent="#accordionHeaderFonts">

                                            <div class="accordion-body bg-custom-gray">
                                                <fieldset id="fontBody">
                                                    <div class="row g-3 py-1">
                                                        <div class="col-lg-3 col-md-6 col-12">
                                                            <label for="InputBodyFamily" class="form-label">
                                                                <b><?= __( 'Font family', 'bootscore' ); ?></b></label>
                                                            <select class="form-select"
                                                                    onchange="font_family_change(this, 'InputBodyStyle');"
                                                                    id="InputBodyFamily" name="font_family">
																<?php
																$family = apply_filters( 'get_font_family_select', false );
																foreach ( $family as $key => $val ):
																	get_hupa_option( 'body_font_family' ) === $val->family ? $sel = 'selected' : $sel = '';
																	?>
                                                                    <option value="<?= $val->family ?>" <?= $sel ?>><?= $val->family ?></option>
																<?php endforeach; ?>
                                                            </select>
                                                        </div>

                                                        <div class="col-lg-3 col-md-6 col-12">
                                                            <label for="InputBodyStyle" class="form-label">
                                                                <b><?= __( 'Font style', 'bootscore' ); ?></b></label>
                                                            <select class="form-select" id="InputBodyStyle"
                                                                    name="font_style">
																<?php
																$style = apply_filters( 'get_font_style_select', get_hupa_option( 'body_font_family' ) );
																foreach ( $style as $key => $val ):
																	$key == get_hupa_option( 'body_font_style' ) ? $sel = 'selected' : $sel = '';
																	?>
                                                                    <option value="<?= $key ?>" <?= $sel ?>><?= $val ?></option>
																<?php endforeach; ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="row g-3 py-1">
                                                        <div id="font-body-font-size" class="col-lg-3 col-md-6 col-12">
                                                            <label for="RangeFontSizeBody"
                                                                   class="form-label"><b><?= __( 'Font size', 'bootscore' ); ?>
                                                                    <span class="show-range-value"><?= get_hupa_option( 'body_font_size' ) ?></span>
                                                                    (Px)</b></label>
                                                            <input data-container="font-body-font-size" type="range"
                                                                   name="font_size" class="form-range sizeRange"
                                                                   min="10"
                                                                   max="80" step="1"
                                                                   value="<?= get_hupa_option( 'body_font_size' ) ?>"
                                                                   id="RangeFontSizeBody">
                                                        </div>
                                                        <div id="font-body-font-height"
                                                             class="col-lg-3 col-md-6 col-12">
                                                            <label for="RangeFontHeightBody"
                                                                   class="form-label"><b><?= __( 'row height', 'bootscore' ); ?>
                                                                    <span class="show-range-value"><?= get_hupa_option( 'body_font_height' ) ?></span></b>
                                                            </label>
                                                            <input data-container="font-body-font-height" type="range"
                                                                   class="form-range sizeRange" name="font_height"
                                                                   min="0"
                                                                   max="5"
                                                                   value="<?= get_hupa_option( 'body_font_height' ) ?>"
                                                                   step="0.1" id="RangeFontHeightBody">
                                                        </div>
                                                    </div>
                                                </fieldset>
                                                <hr>
                                                <div class="d-flex flex-wrap">
                                                    <div class="form-check form-switch me-3">
                                                        <input data-container="fontBody"
                                                               class="form-check-input bs-switch-action"
                                                               name="font_bs_check" type="checkbox"
                                                               id="flexSwitchCheckBSBody" <?= get_hupa_option( 'body_font_bs_check' ) ? 'checked' : '' ?>>
                                                        <label class="form-check-label" for="flexSwitchCheckBSBody">
															<?= __( 'Use standard font', 'bootscore' ); ?> </label>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="d-flex align-items-center">
                                                    <div class="input-color-container">
                                                        <input id="InputColorBody"
                                                               value="<?= get_hupa_option( 'body_font_color' ) ?>"
                                                               name="font_color"
                                                               class="input-color" type="color">
                                                    </div>
                                                    <label class="input-color-label ms-2" for="InputColorBody">
                                                        <b>Body</b> <?= __( 'Font colour', 'bootscore' ); ?>
                                                    </label>
                                                    <div class="ajax-status-spinner ms-auto d-inline-block mb-2 pe-2"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!--TODO JOB MENU FONT-->
                                <div class="accordion-item">
                                    <form class="sendAjaxThemeForm" action="#" method="post">
                                        <input type="hidden" name="method" value="theme_form_handle">
                                        <input type="hidden" name="handle" value="theme_fonts">
                                        <input type="hidden" name="type" value="menu_font">
                                        <h2 class="accordion-header" id="headerFontMenu">
                                            <button class="accordion-button collapsed" type="button"
                                                    data-bs-toggle="collapse"
                                                    data-bs-target="#collapseMenu" aria-expanded="false"
                                                    aria-controls="collapseMenu">
                                                <i class="fa fa-arrow-right"></i>&nbsp;
                                                <b><?= __( 'Menu', 'bootscore' ); ?></b>&nbsp; <?= __( 'Font settings', 'bootscore' ); ?>
                                            </button>
                                        </h2>
                                        <div id="collapseMenu" class="accordion-collapse collapse"
                                             aria-labelledby="headerFontMenu"
                                             data-bs-parent="#accordionHeaderFonts">

                                            <div class="accordion-body bg-custom-gray">
                                                <fieldset id="fontMenu">
                                                    <div class="row g-3 py-1">
                                                        <div class="col-lg-3 col-md-6 col-12">
                                                            <label for="InputMenuFamily" class="form-label">
                                                                <b><?= __( 'Font family', 'bootscore' ); ?></b></label>
                                                            <select class="form-select"
                                                                    onchange="font_family_change(this, 'InputMenuStyle');"
                                                                    id="InputMenuFamily" name="font_family">
																<?php
																$family = apply_filters( 'get_font_family_select', false );
																foreach ( $family as $key => $val ):
																	get_hupa_option( 'menu_font_family' ) === $val->family ? $sel = 'selected' : $sel = '';
																	?>
                                                                    <option value="<?= $val->family ?>" <?= $sel ?>><?= $val->family ?></option>
																<?php endforeach; ?>
                                                            </select>
                                                        </div>

                                                        <div class="col-lg-3 col-md-6 col-12">
                                                            <label for="InputMenuStyle" class="form-label">
                                                                <b><?= __( 'Font style', 'bootscore' ); ?></b></label>
                                                            <select class="form-select" id="InputMenuStyle"
                                                                    name="font_style">
																<?php
																$style = apply_filters( 'get_font_style_select', get_hupa_option( 'menu_font_family' ) );
																foreach ( $style as $key => $val ):
																	$key == get_hupa_option( 'menu_font_style' ) ? $sel = 'selected' : $sel = '';
																	?>
                                                                    <option value="<?= $key ?>" <?= $sel ?>><?= $val ?></option>
																<?php endforeach; ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="row g-3 py-1">
                                                        <div id="font-menu-font-size" class="col-lg-3 col-md-6 col-12">
                                                            <label for="RangeFontSizeMenu"
                                                                   class="form-label"><b><?= __( 'Font size', 'bootscore' ); ?>
                                                                    <span class="show-range-value"><?= get_hupa_option( 'menu_font_size' ) ?></span>
                                                                    (Px)</b></label>
                                                            <input data-container="font-menu-font-size" type="range"
                                                                   name="font_size" class="form-range sizeRange"
                                                                   min="10"
                                                                   max="80" step="1"
                                                                   value="<?= get_hupa_option( 'menu_font_size' ) ?>"
                                                                   id="RangeFontSizeMenu">
                                                        </div>
                                                        <div id="font-menu-font-height"
                                                             class="col-lg-3 col-md-6 col-12">
                                                            <label for="RangeFontHeightMenu"
                                                                   class="form-label"><b><?= __( 'row height', 'bootscore' ); ?>
                                                                    <span class="show-range-value"><?= get_hupa_option( 'menu_font_height' ) ?></span></b>
                                                            </label>
                                                            <input data-container="font-menu-font-height" type="range"
                                                                   class="form-range sizeRange" name="font_height"
                                                                   min="0"
                                                                   max="5"
                                                                   value="<?= get_hupa_option( 'menu_font_height' ) ?>"
                                                                   step="0.1" id="RangeFontHeightMenu">
                                                        </div>
                                                    </div>
                                                </fieldset>
                                                <hr>
                                                <div class="d-flex flex-wrap">
                                                    <div class="form-check form-switch me-3">
                                                        <input data-container="fontMenu"
                                                               class="form-check-input bs-switch-action"
                                                               name="font_bs_check" type="checkbox"
                                                               id="flexSwitchCheckBSMenu" <?= get_hupa_option( 'menu_font_bs_check' ) ? 'checked' : '' ?>>
                                                        <label class="form-check-label" for="flexSwitchCheckBSMenu">
															<?= __( 'Use standard font', 'bootscore' ); ?> </label>
                                                    </div>
                                                    <div class="ajax-status-spinner ms-auto d-inline-block mb-2 pe-2"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <!--TODO JOB Button FONT-->
                                <div class="accordion-item">
                                    <form class="sendAjaxThemeForm" action="#" method="post">
                                        <input type="hidden" name="method" value="theme_form_handle">
                                        <input type="hidden" name="handle" value="theme_fonts">
                                        <input type="hidden" name="type" value="btn_font">
                                        <h2 class="accordion-header" id="headerFontBtn">
                                            <button class="accordion-button collapsed" type="button"
                                                    data-bs-toggle="collapse"
                                                    data-bs-target="#collapseBtn" aria-expanded="false"
                                                    aria-controls="collapseBtn">
                                                <i class="fa fa-arrow-right"></i>&nbsp;
                                                <b> <?= __( 'Button', 'bootscore' ); ?></b>&nbsp; <?= __( 'Font settings', 'bootscore' ); ?>
                                            </button>
                                        </h2>
                                        <div id="collapseBtn" class="accordion-collapse collapse"
                                             aria-labelledby="headerFontBtn"
                                             data-bs-parent="#accordionHeaderFonts">

                                            <div class="accordion-body bg-custom-gray">
                                                <fieldset id="fontBtn">
                                                    <div class="row g-3 py-1">
                                                        <div class="col-lg-3 col-md-6 col-12">
                                                            <label for="InputBtnFamily" class="form-label">
                                                                <b><?= __( 'Font family', 'bootscore' ); ?></b></label>
                                                            <select class="form-select"
                                                                    onchange="font_family_change(this, 'InputBtnStyle');"
                                                                    id="InputBtnFamily" name="font_family">
																<?php
																$family = apply_filters( 'get_font_family_select', false );
																foreach ( $family as $key => $val ):
																	get_hupa_option( 'btn_font_family' ) === $val->family ? $sel = 'selected' : $sel = '';
																	?>
                                                                    <option value="<?= $val->family ?>" <?= $sel ?>><?= $val->family ?></option>
																<?php endforeach; ?>
                                                            </select>
                                                        </div>

                                                        <div class="col-lg-3 col-md-6 col-12">
                                                            <label for="InputBtnStyle" class="form-label">
                                                                <b><?= __( 'Font style', 'bootscore' ); ?></b></label>
                                                            <select class="form-select" id="InputBtnStyle"
                                                                    name="font_style">
																<?php
																$style = apply_filters( 'get_font_style_select', get_hupa_option( 'btn_font_family' ) );
																foreach ( $style as $key => $val ):
																	$key == get_hupa_option( 'btn_font_style' ) ? $sel = 'selected' : $sel = '';
																	?>
                                                                    <option value="<?= $key ?>" <?= $sel ?>><?= $val ?></option>
																<?php endforeach; ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="row g-3 py-1">
                                                        <div id="font-btn-font-size" class="col-lg-3 col-md-6 col-12">
                                                            <label for="RangeFontSizeBtn"
                                                                   class="form-label"><b><?= __( 'Font size', 'bootscore' ); ?>
                                                                    <span class="show-range-value"><?= get_hupa_option( 'btn_font_size' ) ?></span>
                                                                    (Px)</b></label>
                                                            <input data-container="font-btn-font-size" type="range"
                                                                   name="font_size" class="form-range sizeRange"
                                                                   min="10"
                                                                   max="80" step="1"
                                                                   value="<?= get_hupa_option( 'btn_font_size' ) ?>"
                                                                   id="RangeFontSizeBtn">
                                                        </div>
                                                        <div id="font-btn-font-height" class="col-lg-3 col-md-6 col-12">
                                                            <label for="RangeFontHeightBtn"
                                                                   class="form-label"><b><?= __( 'row height', 'bootscore' ); ?>
                                                                    <span class="show-range-value"><?= get_hupa_option( 'btn_font_height' ) ?></span></b>
                                                            </label>
                                                            <input data-container="font-btn-font-height" type="range"
                                                                   class="form-range sizeRange" name="font_height"
                                                                   min="0"
                                                                   max="5"
                                                                   value="<?= get_hupa_option( 'btn_font_height' ) ?>"
                                                                   step="0.1" id="RangeFontHeightBtn">
                                                        </div>
                                                    </div>
                                                </fieldset>
                                                <hr>
                                                <div class="d-flex flex-wrap">
                                                    <div class="form-check form-switch me-3">
                                                        <input data-container="fontBtn"
                                                               class="form-check-input bs-switch-action"
                                                               name="font_bs_check" type="checkbox"
                                                               id="flexSwitchCheckBSBtn" <?= get_hupa_option( 'btn_font_bs_check' ) ? 'checked' : '' ?>>
                                                        <label class="form-check-label" for="flexSwitchCheckBSBtn">
															<?= __( 'Use standard font', 'bootscore' ); ?> </label>
                                                    </div>
                                                    <div class="ajax-status-spinner ms-auto d-inline-block mb-2 pe-2"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!--//TODO JOB TOP AREA TRENNER-->
                                <h5 class="card-title p-3">
                                    <i class="font-blue fa fa-arrow-down"></i>&nbsp; <?= __( 'Top Area', 'bootscore' ) ?>
                                </h5>

                                <!--TODO JOB TOP FONT-->
                                <div class="accordion-item">
                                    <form class="sendAjaxThemeForm" action="#" method="post">
                                        <input type="hidden" name="method" value="theme_form_handle">
                                        <input type="hidden" name="handle" value="theme_fonts">
                                        <input type="hidden" name="type" value="top_font">
                                        <h2 class="accordion-header" id="TopAreaHeader">
                                            <button class="accordion-button collapsed" type="button"
                                                    data-bs-toggle="collapse"
                                                    data-bs-target="#collapseTopArea" aria-expanded="false"
                                                    aria-controls="collapseTopArea">
                                                <i class="fa fa-arrow-right"></i>&nbsp;
                                                <b> <?= __( 'Top Area', 'bootscore' ); ?></b>&nbsp; <?= __( 'Font settings', 'bootscore' ); ?>
                                            </button>
                                        </h2>
                                        <div id="collapseTopArea" class="accordion-collapse collapse"
                                             aria-labelledby="collapseTopArea"
                                             data-bs-parent="#accordionHeaderFonts">

                                            <div class="accordion-body bg-custom-gray">
                                                <fieldset id="fontTopArea">
                                                    <div class="row g-3 py-1">
                                                        <div class="col-lg-3 col-md-6 col-12">
                                                            <label for="InputFontAreaFamily" class="form-label">
                                                                <b><?= __( 'Font family', 'bootscore' ); ?></b></label>
                                                            <select class="form-select"
                                                                    onchange="font_family_change(this, 'InputTopAreaStyle');"
                                                                    id="InputFontAreaFamily" name="font_family">
																<?php
																$family = apply_filters( 'get_font_family_select', false );
																foreach ( $family as $key => $val ):
																	get_hupa_option( 'top_font_family' ) === $val->family ? $sel = 'selected' : $sel = '';
																	?>
                                                                    <option value="<?= $val->family ?>" <?= $sel ?>><?= $val->family ?></option>
																<?php endforeach; ?>
                                                            </select>
                                                        </div>

                                                        <div class="col-lg-3 col-md-6 col-12">
                                                            <label for="InputTopAreaStyle" class="form-label">
                                                                <b><?= __( 'Font style', 'bootscore' ); ?></b></label>
                                                            <select class="form-select" id="InputTopAreaStyle"
                                                                    name="font_style">
																<?php
																$style = apply_filters( 'get_font_style_select', get_hupa_option( 'top_font_family' ) );
																foreach ( $style as $key => $val ):
																	$key == get_hupa_option( 'top_font_style' ) ? $sel = 'selected' : $sel = '';
																	?>
                                                                    <option value="<?= $key ?>" <?= $sel ?>><?= $val ?></option>
																<?php endforeach; ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="row g-3 py-1">
                                                        <div id="font-top-font-size" class="col-lg-3 col-md-6 col-12">
                                                            <label for="RangeFontSizeTop"
                                                                   class="form-label"><b><?= __( 'Font size', 'bootscore' ); ?>
                                                                    <span class="show-range-value"><?= get_hupa_option( 'top_font_size' ) ?></span>
                                                                    (Px)</b></label>
                                                            <input data-container="font-top-font-size" type="range"
                                                                   name="font_size" class="form-range sizeRange"
                                                                   min="10"
                                                                   max="80" step="1"
                                                                   value="<?= get_hupa_option( 'top_font_size' ) ?>"
                                                                   id="RangeFontSizeTop">
                                                        </div>
                                                        <div id="font-top-font-height"
                                                             class="col-lg-3 col-md-6 col-12">
                                                            <label for="RangeFontHeightTop"
                                                                   class="form-label"><b><?= __( 'row height', 'bootscore' ); ?>
                                                                    <span class="show-range-value"><?= get_hupa_option( 'top_font_height' ) ?></span></b>
                                                            </label>
                                                            <input data-container="font-top-font-height" type="range"
                                                                   class="form-range sizeRange" name="font_height"
                                                                   min="0"
                                                                   max="5"
                                                                   value="<?= get_hupa_option( 'top_font_height' ) ?>"
                                                                   step="0.1" id="RangeFontHeightTop">
                                                        </div>
                                                    </div>
                                                </fieldset>
                                                <hr>
                                                <div class="d-flex flex-wrap">
                                                    <div class="form-check form-switch me-3">
                                                        <input data-container="fontTopArea"
                                                               class="form-check-input bs-switch-action"
                                                               name="font_bs_check" type="checkbox"
                                                               id="flexSwitchCheckBSTop" <?= get_hupa_option( 'top_font_bs_check' ) ? 'checked' : '' ?>>
                                                        <label class="form-check-label" for="flexSwitchCheckBSTop">
															<?= __( 'Use standard font', 'bootscore' ); ?> </label>
                                                    </div>
                                                    <div class="ajax-status-spinner ms-auto d-inline-block mb-2 pe-2"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!--//TODO JOB BODY UnderTitle TRENNER-->
                                <h5 class="card-title p-3">
                                    <i class="font-blue fa fa-arrow-down"></i>&nbsp; <?= __( 'Subtitle', 'bootscore' ) ?>
                                </h5>
                                <!--TODO JOB UnderTitle FONT-->
                                <div class="accordion-item">
                                    <form class="sendAjaxThemeForm" action="#" method="post">
                                        <input type="hidden" name="method" value="theme_form_handle">
                                        <input type="hidden" name="handle" value="theme_fonts">
                                        <input type="hidden" name="type" value="under_font">
                                        <h2 class="accordion-header" id="headerFontUnder">
                                            <button class="accordion-button collapsed" type="button"
                                                    data-bs-toggle="collapse"
                                                    data-bs-target="#collapseUnder" aria-expanded="false"
                                                    aria-controls="collapseUnder">
                                                <i class="fa fa-arrow-right"></i>&nbsp;
                                                <b> <?= __( 'Subtitle', 'bootscore' ); ?></b>&nbsp; <?= __( 'Font settings', 'bootscore' ); ?>
                                            </button>
                                        </h2>
                                        <div id="collapseUnder" class="accordion-collapse collapse"
                                             aria-labelledby="headerFontUnder"
                                             data-bs-parent="#accordionHeaderFonts">

                                            <div class="accordion-body bg-custom-gray">
                                                <fieldset id="fontUnder">
                                                    <div class="row g-3 py-1">
                                                        <div class="col-lg-3 col-md-6 col-12">
                                                            <label for="InputUnderFamily" class="form-label">
                                                                <b><?= __( 'Font family', 'bootscore' ); ?></b></label>
                                                            <select class="form-select"
                                                                    onchange="font_family_change(this, 'InputUnderStyle');"
                                                                    id="InputUnderFamily" name="font_family">
																<?php
																$family = apply_filters( 'get_font_family_select', false );
																foreach ( $family as $key => $val ):
																	get_hupa_option( 'under_font_family' ) === $val->family ? $sel = 'selected' : $sel = '';
																	?>
                                                                    <option value="<?= $val->family ?>" <?= $sel ?>><?= $val->family ?></option>
																<?php endforeach; ?>
                                                            </select>
                                                        </div>

                                                        <div class="col-lg-3 col-md-6 col-12">
                                                            <label for="InputUnderStyle" class="form-label">
                                                                <b><?= __( 'Font style', 'bootscore' ); ?></b></label>
                                                            <select class="form-select" id="InputUnderStyle"
                                                                    name="font_style">
																<?php
																$style = apply_filters( 'get_font_style_select', get_hupa_option( 'under_font_family' ) );
																foreach ( $style as $key => $val ):
																	$key == get_hupa_option( 'under_font_style' ) ? $sel = 'selected' : $sel = '';
																	?>
                                                                    <option value="<?= $key ?>" <?= $sel ?>><?= $val ?></option>
																<?php endforeach; ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="row g-3 py-1">
                                                        <div id="font-under-font-size" class="col-lg-3 col-md-6 col-12">
                                                            <label for="RangeFontSizeUnder"
                                                                   class="form-label"><b><?= __( 'Font size', 'bootscore' ); ?>
                                                                    <span class="show-range-value"><?= get_hupa_option( 'under_font_size' ) ?></span>
                                                                    (Px)</b></label>
                                                            <input data-container="font-under-font-size" type="range"
                                                                   name="font_size" class="form-range sizeRange"
                                                                   min="10"
                                                                   max="80" step="1"
                                                                   value="<?= get_hupa_option( 'under_font_size' ) ?>"
                                                                   id="RangeFontSizeUnder">
                                                        </div>
                                                        <div id="font-under-font-height"
                                                             class="col-lg-3 col-md-6 col-12">
                                                            <label for="RangeFontHeightUnder"
                                                                   class="form-label"><b><?= __( 'row height', 'bootscore' ); ?>
                                                                    <span class="show-range-value"><?= get_hupa_option( 'under_font_height' ) ?></span></b>
                                                            </label>
                                                            <input data-container="font-under-font-height" type="range"
                                                                   class="form-range sizeRange" name="font_height"
                                                                   min="0"
                                                                   max="5"
                                                                   value="<?= get_hupa_option( 'under_font_height' ) ?>"
                                                                   step="0.1" id="RangeFontHeightUnder">
                                                        </div>
                                                    </div>
                                                </fieldset>
                                                <hr>
                                                <div class="d-flex flex-wrap">
                                                    <div class="form-check form-switch me-3">
                                                        <input data-container="fontUnder"
                                                               class="form-check-input bs-switch-action"
                                                               name="font_bs_check" type="checkbox"
                                                               id="flexSwitchCheckBSUnder" <?= get_hupa_option( 'under_font_bs_check' ) ? 'checked' : '' ?>>
                                                        <label class="form-check-label" for="flexSwitchCheckBSUnder">
															<?= __( 'Use standard font', 'bootscore' ); ?> </label>
                                                    </div>
                                                    <div class="ajax-status-spinner ms-auto d-inline-block mb-2 pe-2"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!--//TODO JOB Footer TRENNER-->
                                <h5 class="card-title p-3">
                                    <i class="font-blue fa fa-arrow-down"></i>&nbsp; <?= __( 'Top Footer', 'bootscore' ) ?>
                                    | <?= __( 'Widget Footer', 'bootscore' ) ?>
                                    | <?= __( 'Info Footer', 'bootscore' ) ?>
                                </h5>
                                <!--TODO JOB TOP FOOTER HEADLINE-->
                                <div class="accordion-item">
                                    <form class="sendAjaxThemeForm" action="#" method="post">
                                        <input type="hidden" name="method" value="theme_form_handle">
                                        <input type="hidden" name="handle" value="theme_fonts">
                                        <input type="hidden" name="type" value="top_footer_headline_font">
                                        <h2 class="accordion-header" id="headerFontTopFooterHeadline">
                                            <button class="accordion-button collapsed" type="button"
                                                    data-bs-toggle="collapse"
                                                    data-bs-target="#collapseTopFooterHeadline" aria-expanded="false"
                                                    aria-controls="collapseTopFooterHeadline">
                                                <i class="fa fa-arrow-right"></i>&nbsp;
                                                <b>Top <?= __( 'Footer', 'bootscore' ); ?>
                                                </b>&nbsp; <?= __( 'Headline', 'bootscore' ); ?>
                                            </button>
                                        </h2>
                                        <div id="collapseTopFooterHeadline" class="accordion-collapse collapse"
                                             aria-labelledby="TopFooterHeadline"
                                             data-bs-parent="#accordionHeaderFonts">

                                            <div class="accordion-body bg-custom-gray">
                                                <fieldset id="fontTopFooterHeadline">
                                                    <div class="row g-3 py-1">
                                                        <div class="col-lg-3 col-md-6 col-12">
                                                            <label for="InputTopFooterHeadlineFamily"
                                                                   class="form-label">
                                                                <b><?= __( 'Font family', 'bootscore' ); ?></b></label>
                                                            <select class="form-select"
                                                                    onchange="font_family_change(this, 'InputTopFooterHeadlineStyle');"
                                                                    id="InputTopFooterHeadlineFamily"
                                                                    name="font_family">
																<?php
																$family = apply_filters( 'get_font_family_select', false );
																foreach ( $family as $key => $val ):
																	get_hupa_option( 'top_footer_headline_font_family' ) === $val->family ? $sel = 'selected' : $sel = '';
																	?>
                                                                    <option value="<?= $val->family ?>" <?= $sel ?>><?= $val->family ?></option>
																<?php endforeach; ?>
                                                            </select>
                                                        </div>

                                                        <div class="col-lg-3 col-md-6 col-12">
                                                            <label for="InputTopFooterHeadlineStyle" class="form-label">
                                                                <b><?= __( 'Font style', 'bootscore' ); ?></b></label>
                                                            <select class="form-select" id="InputTopFooterHeadlineStyle"
                                                                    name="font_style">
																<?php
																$style = apply_filters( 'get_font_style_select', get_hupa_option( 'top_footer_headline_font_family' ) );
																foreach ( $style as $key => $val ):
																	$key == get_hupa_option( 'top_footer_headline_font_style' ) ? $sel = 'selected' : $sel = '';
																	?>
                                                                    <option value="<?= $key ?>" <?= $sel ?>><?= $val ?></option>
																<?php endforeach; ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="row g-3 py-1">
                                                        <div id="font-top-footer-headline-font-size"
                                                             class="col-lg-3 col-md-6 col-12">
                                                            <label for="RangeFontSizeTopFooterHeadline"
                                                                   class="form-label"><b><?= __( 'Font size', 'bootscore' ); ?>
                                                                    <span class="show-range-value"><?= get_hupa_option( 'top_footer_headline_font_size' ) ?></span>
                                                                    (Px)</b></label>
                                                            <input data-container="font-top-footer-headline-font-size"
                                                                   type="range"
                                                                   name="font_size" class="form-range sizeRange"
                                                                   min="10"
                                                                   max="80" step="1"
                                                                   value="<?= get_hupa_option( 'top_footer_headline_font_size' ) ?>"
                                                                   id="RangeFontSizeTopFooterHeadline">
                                                        </div>
                                                        <div id="font-top-footer-headline-font-height"
                                                             class="col-lg-3 col-md-6 col-12">
                                                            <label for="RangeFontHeightTopFooterHeadline"
                                                                   class="form-label"><b><?= __( 'row height', 'bootscore' ); ?>
                                                                    <span class="show-range-value"><?= get_hupa_option( 'top_footer_headline_font_height' ) ?></span></b>
                                                            </label>
                                                            <input data-container="font-top-footer-headline-font-height"
                                                                   type="range"
                                                                   class="form-range sizeRange" name="font_height"
                                                                   min="0"
                                                                   max="5"
                                                                   value="<?= get_hupa_option( 'top_footer_headline_font_height' ) ?>"
                                                                   step="0.1" id="RangeFontHeightTopFooterHeadline">
                                                        </div>
                                                    </div>
                                                </fieldset>
                                                <hr>
                                                <div class="d-flex flex-wrap">
                                                    <div class="form-check form-switch me-3">
                                                        <input data-container="fontTopHeaderBS"
                                                               class="form-check-input bs-switch-action"
                                                               name="font_bs_check" type="checkbox"
                                                               id="fontTopHeaderBS" <?= get_hupa_option( 'top_footer_headline_font_bs_check' ) ? 'checked' : '' ?>>
                                                        <label class="form-check-label" for="fontTopHeaderBS">
															<?= __( 'Use standard font', 'bootscore' ); ?> </label>
                                                    </div>
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" type="checkbox"
                                                               name="font_display_check"
                                                               id="flexSwitchCheckDisplayTopFontHeader" <?= get_hupa_option( 'top_footer_headline_font_display_check' ) ? 'checked' : '' ?>>
                                                        <label class="form-check-label"
                                                               for="flexSwitchCheckDisplayTopFontHeader">
															<?= __( 'Display heading', 'bootscore' ); ?> </label>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="d-flex align-items-center">
                                                    <div class="input-color-container">
                                                        <input id="InputColorTopFooterHeadline"
                                                               value="<?= get_hupa_option( 'top_footer_headline_font_color' ) ?>"
                                                               name="font_color"
                                                               class="input-color" type="color">
                                                    </div>
                                                    <label class="input-color-label ms-2"
                                                           for="InputColorTopFooterHeadline">
                                                        <b>Top Footer
															<?= __( 'Headline', 'bootscore' ); ?></b> <?= __( 'Font colour', 'bootscore' ); ?>
                                                    </label>
                                                    <div class="ajax-status-spinner ms-auto d-inline-block mb-2 pe-2"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!--TODO JOB TOP FOOTER BODY-->
                                <div class="accordion-item">
                                    <form class="sendAjaxThemeForm" action="#" method="post">
                                        <input type="hidden" name="method" value="theme_form_handle">
                                        <input type="hidden" name="handle" value="theme_fonts">
                                        <input type="hidden" name="type" value="top_footer_body_font">
                                        <h2 class="accordion-header" id="headerFontTopFooterBody">
                                            <button class="accordion-button collapsed" type="button"
                                                    data-bs-toggle="collapse"
                                                    data-bs-target="#collapseTopFooterBody" aria-expanded="false"
                                                    aria-controls="collapseTopFooterBody">
                                                <i class="fa fa-arrow-right"></i>&nbsp;
                                                <b>Top <?= __( 'Footer', 'bootscore' ); ?>
                                                </b>&nbsp; <?= __( 'Body', 'bootscore' ); ?>
                                            </button>
                                        </h2>
                                        <div id="collapseTopFooterBody" class="accordion-collapse collapse"
                                             aria-labelledby="TopFooterBody"
                                             data-bs-parent="#accordionHeaderFonts">

                                            <div class="accordion-body bg-custom-gray">
                                                <fieldset id="fontTopBodyHeadline">
                                                    <div class="row g-3 py-1">
                                                        <div class="col-lg-3 col-md-6 col-12">
                                                            <label for="InputTopFooterBodyFamily" class="form-label">
                                                                <b><?= __( 'Font family', 'bootscore' ); ?></b></label>
                                                            <select class="form-select"
                                                                    onchange="font_family_change(this, 'InputTopFooterBodyStyle');"
                                                                    id="InputTopFooterBodyFamily" name="font_family">
																<?php
																$family = apply_filters( 'get_font_family_select', false );
																foreach ( $family as $key => $val ):
																	get_hupa_option( 'top_footer_body_font_family' ) === $val->family ? $sel = 'selected' : $sel = '';
																	?>
                                                                    <option value="<?= $val->family ?>" <?= $sel ?>><?= $val->family ?></option>
																<?php endforeach; ?>
                                                            </select>
                                                        </div>

                                                        <div class="col-lg-3 col-md-6 col-12">
                                                            <label for="InputTopFooterBodyStyle" class="form-label">
                                                                <b><?= __( 'Font style', 'bootscore' ); ?></b></label>
                                                            <select class="form-select" id="InputTopFooterBodyStyle"
                                                                    name="font_style">
																<?php
																$style = apply_filters( 'get_font_style_select', get_hupa_option( 'top_footer_body_font_family' ) );
																foreach ( $style as $key => $val ):
																	$key == get_hupa_option( 'top_footer_body_font_style' ) ? $sel = 'selected' : $sel = '';
																	?>
                                                                    <option value="<?= $key ?>" <?= $sel ?>><?= $val ?></option>
																<?php endforeach; ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="row g-3 py-1">
                                                        <div id="font-top-footer-body-font-size"
                                                             class="col-lg-3 col-md-6 col-12">
                                                            <label for="RangeFontSizeTopFooterBody"
                                                                   class="form-label"><b><?= __( 'Font size', 'bootscore' ); ?>
                                                                    <span class="show-range-value"><?= get_hupa_option( 'top_footer_body_font_size' ) ?></span>
                                                                    (Px)</b></label>
                                                            <input data-container="font-top-footer-body-font-size"
                                                                   type="range"
                                                                   name="font_size" class="form-range sizeRange"
                                                                   min="10"
                                                                   max="80" step="1"
                                                                   value="<?= get_hupa_option( 'top_footer_body_font_size' ) ?>"
                                                                   id="RangeFontSizeTopFooterBody">
                                                        </div>
                                                        <div id="font-top-footer-body-font-height"
                                                             class="col-lg-3 col-md-6 col-12">
                                                            <label for="RangeFontHeightTopFooterBody"
                                                                   class="form-label"><b><?= __( 'row height', 'bootscore' ); ?>
                                                                    <span class="show-range-value"><?= get_hupa_option( 'top_footer_body_font_height' ) ?></span></b>
                                                            </label>
                                                            <input data-container="font-top-footer-body-font-height"
                                                                   type="range"
                                                                   class="form-range sizeRange" name="font_height"
                                                                   min="0"
                                                                   max="5"
                                                                   value="<?= get_hupa_option( 'top_footer_body_font_height' ) ?>"
                                                                   step="0.1" id="RangeFontHeightTopFooterBody">
                                                        </div>
                                                    </div>
                                                </fieldset>
                                                <hr>
                                                <div class="d-flex flex-wrap">
                                                    <div class="form-check form-switch me-3">
                                                        <input data-container="fontTopBodyBS"
                                                               class="form-check-input bs-switch-action"
                                                               name="font_bs_check" type="checkbox"
                                                               id="fontTopBodyBS" <?= get_hupa_option( 'top_footer_body_font_bs_check' ) ? 'checked' : '' ?>>
                                                        <label class="form-check-label" for="fontTopBodyBS">
															<?= __( 'Use standard font', 'bootscore' ); ?> </label>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="d-flex align-items-center">
                                                    <div class="input-color-container">
                                                        <input id="InputColorTopFooterBody"
                                                               value="<?= get_hupa_option( 'top_footer_body_font_color' ) ?>"
                                                               name="font_color"
                                                               class="input-color" type="color">
                                                    </div>
                                                    <label class="input-color-label ms-2"
                                                           for="InputColorTopFooterBody">
                                                        <b>Top Footer
															<?= __( 'Body', 'bootscore' ); ?></b> <?= __( 'Font colour', 'bootscore' ); ?>
                                                    </label>
                                                    <div class="ajax-status-spinner ms-auto d-inline-block mb-2 pe-2"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>


                                <!--TODO JOB FOOTER HEADLINE WIDGET-->
                                <div class="accordion-item">
                                    <form class="sendAjaxThemeForm" action="#" method="post">
                                        <input type="hidden" name="method" value="theme_form_handle">
                                        <input type="hidden" name="handle" value="theme_fonts">
                                        <input type="hidden" name="type" value="footer_headline_font">
                                        <h2 class="accordion-header" id="headerFontFooterHeadline">
                                            <button class="accordion-button collapsed" type="button"
                                                    data-bs-toggle="collapse"
                                                    data-bs-target="#collapseFooterHeadline" aria-expanded="false"
                                                    aria-controls="collapseFooterHeadline">
                                                <i class="fa fa-arrow-right"></i>&nbsp;
                                                <b> <?= __( 'Footer', 'bootscore' ); ?>
                                                    Widget</b>&nbsp; <?= __( 'Headline', 'bootscore' ); ?>
                                            </button>
                                        </h2>
                                        <div id="collapseFooterHeadline" class="accordion-collapse collapse"
                                             aria-labelledby="FooterHeadline"
                                             data-bs-parent="#accordionHeaderFonts">

                                            <div class="accordion-body bg-custom-gray">
                                                <fieldset id="fontFooterHeadline">
                                                    <div class="row g-3 py-1">
                                                        <div class="col-lg-3 col-md-6 col-12">
                                                            <label for="InputFooterHeadlineFamily" class="form-label">
                                                                <b><?= __( 'Font family', 'bootscore' ); ?></b></label>
                                                            <select class="form-select"
                                                                    onchange="font_family_change(this, 'InputFooterHeadlineStyle');"
                                                                    id="InputFooterHeadlineFamily" name="font_family">
																<?php
																$family = apply_filters( 'get_font_family_select', false );
																foreach ( $family as $key => $val ):
																	get_hupa_option( 'footer_headline_font_family' ) === $val->family ? $sel = 'selected' : $sel = '';
																	?>
                                                                    <option value="<?= $val->family ?>" <?= $sel ?>><?= $val->family ?></option>
																<?php endforeach; ?>
                                                            </select>
                                                        </div>

                                                        <div class="col-lg-3 col-md-6 col-12">
                                                            <label for="InputFooterHeadlineStyle" class="form-label">
                                                                <b><?= __( 'Font style', 'bootscore' ); ?></b></label>
                                                            <select class="form-select" id="InputFooterHeadlineStyle"
                                                                    name="font_style">
																<?php
																$style = apply_filters( 'get_font_style_select', get_hupa_option( 'footer_headline_font_family' ) );
																foreach ( $style as $key => $val ):
																	$key == get_hupa_option( 'footer_headline_font_style' ) ? $sel = 'selected' : $sel = '';
																	?>
                                                                    <option value="<?= $key ?>" <?= $sel ?>><?= $val ?></option>
																<?php endforeach; ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="row g-3 py-1">
                                                        <div id="font-footer-headline-font-size"
                                                             class="col-lg-3 col-md-6 col-12">
                                                            <label for="RangeFontSizeFooterHeadline"
                                                                   class="form-label"><b><?= __( 'Font size', 'bootscore' ); ?>
                                                                    <span class="show-range-value"><?= get_hupa_option( 'footer_headline_font_size' ) ?></span>
                                                                    (Px)</b></label>
                                                            <input data-container="font-footer-headline-font-size"
                                                                   type="range"
                                                                   name="font_size" class="form-range sizeRange"
                                                                   min="10"
                                                                   max="80" step="1"
                                                                   value="<?= get_hupa_option( 'footer_headline_font_size' ) ?>"
                                                                   id="RangeFontSizeFooterHeadline">
                                                        </div>
                                                        <div id="font-footer-headline-font-height"
                                                             class="col-lg-3 col-md-6 col-12">
                                                            <label for="RangeFontHeightFooterHeadline"
                                                                   class="form-label"><b><?= __( 'row height', 'bootscore' ); ?>
                                                                    <span class="show-range-value"><?= get_hupa_option( 'footer_headline_font_height' ) ?></span></b>
                                                            </label>
                                                            <input data-container="font-footer-headline-font-height"
                                                                   type="range"
                                                                   class="form-range sizeRange" name="font_height"
                                                                   min="0"
                                                                   max="5"
                                                                   value="<?= get_hupa_option( 'footer_headline_font_height' ) ?>"
                                                                   step="0.1" id="RangeFontHeightFooterHeadline">
                                                        </div>
                                                    </div>
                                                </fieldset>
                                                <div class="d-flex align-items-center">
                                                    <div class="input-color-container">
                                                        <input id="InputColorFooterHeadline"
                                                               value="<?= get_hupa_option( 'footer_headline_font_color' ) ?>"
                                                               name="font_color"
                                                               class="input-color" type="color">
                                                    </div>
                                                    <label class="input-color-label ms-2"
                                                           for="InputColorFooterHeadline">
                                                        <b>Footer
                                                            Widget <?= __( 'Headline', 'bootscore' ); ?></b> <?= __( 'Font colour', 'bootscore' ); ?>
                                                    </label>
                                                    <div class="ajax-status-spinner ms-auto d-inline-block mb-2 pe-2"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!--TODO JOB FOOTER WIDGET BODY-->
                                <div class="accordion-item">
                                    <form class="sendAjaxThemeForm" action="#" method="post">
                                        <input type="hidden" name="method" value="theme_form_handle">
                                        <input type="hidden" name="handle" value="theme_fonts">
                                        <input type="hidden" name="type" value="footer_widget_font">
                                        <h2 class="accordion-header" id="headerFontFooterWidget">
                                            <button class="accordion-button collapsed" type="button"
                                                    data-bs-toggle="collapse"
                                                    data-bs-target="#collapseFooterWidget" aria-expanded="false"
                                                    aria-controls="collapseFooterWidget">
                                                <i class="fa fa-arrow-right"></i>&nbsp;
                                                <b> <?= __( 'Footer', 'bootscore' ); ?>
                                                    Widget Body </b>&nbsp; <?= __( 'Font settings', 'bootscore' ); ?>
                                            </button>
                                        </h2>
                                        <div id="collapseFooterWidget" class="accordion-collapse collapse"
                                             aria-labelledby="headerFontFooterWidget"
                                             data-bs-parent="#accordionHeaderFonts">

                                            <div class="accordion-body bg-custom-gray">
                                                <fieldset id="fontFooterWidget">
                                                    <div class="row g-3 py-1">
                                                        <div class="col-lg-3 col-md-6 col-12">
                                                            <label for="InputFooterWidgetFamily" class="form-label">
                                                                <b><?= __( 'Font family', 'bootscore' ); ?></b></label>
                                                            <select class="form-select"
                                                                    onchange="font_family_change(this, 'InputFooterWidgetStyle');"
                                                                    id="InputFooterWidgetFamily" name="font_family">
																<?php
																$family = apply_filters( 'get_font_family_select', false );
																foreach ( $family as $key => $val ):
																	get_hupa_option( 'footer_widget_font_family' ) === $val->family ? $sel = 'selected' : $sel = '';
																	?>
                                                                    <option value="<?= $val->family ?>" <?= $sel ?>><?= $val->family ?></option>
																<?php endforeach; ?>
                                                            </select>
                                                        </div>

                                                        <div class="col-lg-3 col-md-6 col-12">
                                                            <label for="InputFooterWidgetStyle" class="form-label">
                                                                <b><?= __( 'Font style', 'bootscore' ); ?></b></label>
                                                            <select class="form-select" id="InputFooterWidgetStyle"
                                                                    name="font_style">
																<?php
																$style = apply_filters( 'get_font_style_select', get_hupa_option( 'footer_widget_font_family' ) );
																foreach ( $style as $key => $val ):
																	$key == get_hupa_option( 'footer_widget_font_style' ) ? $sel = 'selected' : $sel = '';
																	?>
                                                                    <option value="<?= $key ?>" <?= $sel ?>><?= $val ?></option>
																<?php endforeach; ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="row g-3 py-1">
                                                        <div id="font-footer-widget-font-size"
                                                             class="col-lg-3 col-md-6 col-12">
                                                            <label for="RangeFontSizeFooterWidget"
                                                                   class="form-label"><b><?= __( 'Font size', 'bootscore' ); ?>
                                                                    <span class="show-range-value"><?= get_hupa_option( 'footer_widget_font_size' ) ?></span>
                                                                    (Px)</b></label>
                                                            <input data-container="font-footer-widget-font-size"
                                                                   type="range"
                                                                   name="font_size" class="form-range sizeRange"
                                                                   min="10"
                                                                   max="80" step="1"
                                                                   value="<?= get_hupa_option( 'footer_widget_font_size' ) ?>"
                                                                   id="RangeFontSizeFooterWidget">
                                                        </div>
                                                        <div id="font-footer-widget-font-height"
                                                             class="col-lg-3 col-md-6 col-12">
                                                            <label for="RangeFontHeightFooterWidget"
                                                                   class="form-label"><b><?= __( 'row height', 'bootscore' ); ?>
                                                                    <span class="show-range-value"><?= get_hupa_option( 'footer_widget_font_height' ) ?></span></b>
                                                            </label>
                                                            <input data-container="font-footer-widget-font-height"
                                                                   type="range"
                                                                   class="form-range sizeRange" name="font_height"
                                                                   min="0"
                                                                   max="5"
                                                                   value="<?= get_hupa_option( 'footer_widget_font_height' ) ?>"
                                                                   step="0.1" id="RangeFontHeightFooterWidget">
                                                        </div>
                                                    </div>
                                                </fieldset>
                                                <hr>
                                                <div class="d-flex flex-wrap">
                                                    <div class="form-check form-switch me-3">
                                                        <input data-container="TDFooterWidget"
                                                               class="form-check-input bs-switch-action"
                                                               name="font_txt_decoration" type="checkbox"
                                                               id="flexSwitchCheckTDFooterWidget" <?= get_hupa_option( 'footer_widget_font_txt_decoration' ) ? 'checked' : '' ?>>
                                                        <label class="form-check-label"
                                                               for="flexSwitchCheckTDFooterWidget">
                                                            <b>Link </b><?= __( 'Text decoration', 'bootscore' ); ?>
                                                        </label>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="d-flex align-items-center">
                                                    <div class="input-color-container">
                                                        <input id="InputColorFooterWidget"
                                                               value="<?= get_hupa_option( 'footer_widget_font_color' ) ?>"
                                                               name="font_color"
                                                               class="input-color" type="color">
                                                    </div>
                                                    <label class="input-color-label ms-2" for="InputColorFooterWidget">
                                                        <b>Footer Widget</b> <?= __( 'Font colour', 'bootscore' ); ?>
                                                    </label>
                                                    <div class="ajax-status-spinner ms-auto d-inline-block mb-2 pe-2"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <!--TODO JOB INFO FOOTER FONT-->
                                <div class="accordion-item">
                                    <form class="sendAjaxThemeForm" action="#" method="post">
                                        <input type="hidden" name="method" value="theme_form_handle">
                                        <input type="hidden" name="handle" value="theme_fonts">
                                        <input type="hidden" name="type" value="footer_font">
                                        <h2 class="accordion-header" id="headerFontFooter">
                                            <button class="accordion-button collapsed" type="button"
                                                    data-bs-toggle="collapse"
                                                    data-bs-target="#collapseFooter" aria-expanded="false"
                                                    aria-controls="collapseFooter">
                                                <i class="fa fa-arrow-right"></i>&nbsp;
                                                <b>
                                                    Info <?= __( 'Footer', 'bootscore' ); ?></b>&nbsp; <?= __( 'Font settings', 'bootscore' ); ?>
                                            </button>
                                        </h2>
                                        <div id="collapseFooter" class="accordion-collapse collapse"
                                             aria-labelledby="headerFontFooter"
                                             data-bs-parent="#accordionHeaderFonts">

                                            <div class="accordion-body bg-custom-gray">
                                                <fieldset id="fontFooter">
                                                    <div class="row g-3 py-1">
                                                        <div class="col-lg-3 col-md-6 col-12">
                                                            <label for="InputFooterFamily" class="form-label">
                                                                <b><?= __( 'Font family', 'bootscore' ); ?></b></label>
                                                            <select class="form-select"
                                                                    onchange="font_family_change(this, 'InputFooterStyle');"
                                                                    id="InputFooterFamily" name="font_family">
																<?php
																$family = apply_filters( 'get_font_family_select', false );
																foreach ( $family as $key => $val ):
																	get_hupa_option( 'footer_font_family' ) === $val->family ? $sel = 'selected' : $sel = '';
																	?>
                                                                    <option value="<?= $val->family ?>" <?= $sel ?>><?= $val->family ?></option>
																<?php endforeach; ?>
                                                            </select>
                                                        </div>

                                                        <div class="col-lg-3 col-md-6 col-12">
                                                            <label for="InputFooterStyle" class="form-label">
                                                                <b><?= __( 'Font style', 'bootscore' ); ?></b></label>
                                                            <select class="form-select" id="InputFooterStyle"
                                                                    name="font_style">
																<?php
																$style = apply_filters( 'get_font_style_select', get_hupa_option( 'footer_font_family' ) );
																foreach ( $style as $key => $val ):
																	$key == get_hupa_option( 'footer_font_style' ) ? $sel = 'selected' : $sel = '';
																	?>
                                                                    <option value="<?= $key ?>" <?= $sel ?>><?= $val ?></option>
																<?php endforeach; ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="row g-3 py-1">
                                                        <div id="font-footer-font-size"
                                                             class="col-lg-3 col-md-6 col-12">
                                                            <label for="RangeFontSizeFooter"
                                                                   class="form-label"><b><?= __( 'Font size', 'bootscore' ); ?>
                                                                    <span class="show-range-value"><?= get_hupa_option( 'footer_font_size' ) ?></span>
                                                                    (Px)</b></label>
                                                            <input data-container="font-footer-font-size" type="range"
                                                                   name="font_size" class="form-range sizeRange"
                                                                   min="10"
                                                                   max="80" step="1"
                                                                   value="<?= get_hupa_option( 'footer_font_size' ) ?>"
                                                                   id="RangeFontSizeFooter">
                                                        </div>
                                                        <div id="font-footer-font-height"
                                                             class="col-lg-3 col-md-6 col-12">
                                                            <label for="RangeFontHeightFooter"
                                                                   class="form-label"><b><?= __( 'row height', 'bootscore' ); ?>
                                                                    <span class="show-range-value"><?= get_hupa_option( 'footer_font_height' ) ?></span></b>
                                                            </label>
                                                            <input data-container="font-footer-font-height" type="range"
                                                                   class="form-range sizeRange" name="font_height"
                                                                   min="0"
                                                                   max="5"
                                                                   value="<?= get_hupa_option( 'footer_font_height' ) ?>"
                                                                   step="0.1" id="RangeFontHeightFooter">
                                                        </div>
                                                    </div>
                                                </fieldset>
                                                <hr>
                                                <div class="d-flex flex-wrap">
                                                    <div class="form-check form-switch me-3">
                                                        <input data-container="fontFooter"
                                                               class="form-check-input bs-switch-action"
                                                               name="font_bs_check" type="checkbox"
                                                               id="flexSwitchCheckBSFooter" <?= get_hupa_option( 'footer_font_bs_check' ) ? 'checked' : '' ?>>
                                                        <label class="form-check-label" for="flexSwitchCheckBSFooter">
															<?= __( 'Use standard font', 'bootscore' ); ?> </label>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="d-flex align-items-center">
                                                    <div class="input-color-container">
                                                        <input id="InputColorFooter"
                                                               value="<?= get_hupa_option( 'footer_font_color' ) ?>"
                                                               name="font_color"
                                                               class="input-color" type="color">
                                                    </div>
                                                    <label class="input-color-label ms-2" for="InputColorFooter">
                                                        <b>Footer</b> <?= __( 'Font colour', 'bootscore' ); ?>
                                                    </label>
                                                    <div class="ajax-status-spinner ms-auto d-inline-block mb-2 pe-2"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!--END FONTS-->
                            </div>
                        </div>
                    </div>

                    <!--  TODO JOB WARNING COLORS -->
                    <div class="collapse" id="collapseSettingsColorSite" data-bs-parent="#settings_display_data">
                        <form class="sendAjaxThemeForm" action="#" method="post">
                            <input type="hidden" name="method" value="theme_form_handle">
                            <input type="hidden" name="handle" value="theme_colors">
                            <div class="accordion accordion-sm" id="accordionColorSettings">
                                <!--TODO JOB HINTERGRUNDFARBEN-->
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="BGColor">
                                        <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse"
                                                data-bs-target="#collapseBGColor" aria-expanded="false"
                                                aria-controls="collapseBGColor">
                                            <i class="fa fa-arrow-right"></i>&nbsp;
											<?= __( 'Background colours', 'bootscore' ); ?>
                                        </button>
                                    </h2>
                                    <div id="collapseBGColor" class="accordion-collapse collapse"
                                         aria-labelledby="collapseBGColor"
                                         data-bs-parent="#accordionColorSettings">

                                        <div class="border rounded mt-1 shadow-sm p-3 bg-custom-gray">

                                            <!--//TODO JOB Menu Hover TRENNER-->
                                            <div class="bg-custom-yellow mb-3">
                                                <h6 class="card-title px-3 py-2">
													<?= __( 'Background colours', 'bootscore' ) ?>
                                                </h6>
                                            </div>
                                            <div class="d-flex align-items-center">
                                                <div class="input-color-container">
                                                    <input id="InputColorSiteBG"
                                                           value="<?= get_hupa_option( 'site_bg' ) ?>"
                                                           name="site_bg"
                                                           class="input-color" type="color">
                                                </div>
                                                <label class="input-color-label ms-2" for="InputColorSiteBG">
													<?= __( '<b>Page</b> background colour', 'bootscore' ); ?>
                                                </label>
                                            </div>
                                            <hr>
                                            <div class="d-flex align-items-center pb-1">
                                                <div class="input-color-container">
                                                    <input id="InputColorNavBG"
                                                           value="<?= get_hupa_option( 'nav_bg' ) ?>"
                                                           name="nav_bg"
                                                           class="input-color" type="color">
                                                </div>
                                                <label class="input-color-label ms-2" for="InputColorNavBG">
													<?= __( '<b>Navigation</b> background colour', 'bootscore' ); ?>
                                                </label>
                                            </div>
                                            <hr>
                                            <div id="nav-bg-opacity"
                                                 class="col-lg-5 col-md-6 col-12">
                                                <label for="RangeNavOpacity"
                                                       class="form-label"><b><?= __( 'Navigation Background Opacity', 'bootscore' ); ?>
                                                        ( <span class="show-range-value">
                                                            <?= get_hupa_option( 'nav_bg_opacity' ) ?></span>-100 %
                                                        )</b>
                                                </label>
                                                <input data-container="nav-bg-opacity" type="range"
                                                       class="form-range sizeRange" name="nav_bg_opacity"
                                                       min="0"
                                                       max="100"
                                                       value="<?= get_hupa_option( 'nav_bg_opacity' ) ?>"
                                                       step="1" id="RangeNavOpacity">
                                            </div>
                                            <hr>
                                            <!--//TODO JOB Footer BG TRENNER-->
                                            <div class="bg-custom-yellow mb-3">
                                                <h6 class="card-title px-3 py-2">
													<?= __( 'Footer colour', 'bootscore' ) ?>
                                                </h6>
                                            </div>
                                            <div class="d-flex align-items-center pb-4">
                                                <div class="input-color-container">
                                                    <input id="InputColorFooterBG"
                                                           value="<?= get_hupa_option( 'footer_bg' ) ?>"
                                                           name="footer_bg"
                                                           class="input-color" type="color">
                                                </div>
                                                <label class="input-color-label ms-2" for="InputColorFooterBG">
													<?= __( '<b>Footer</b> background colour', 'bootscore' ); ?>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div><!--ITEM-END-->


                                <!--TODO JOB TOP AREA COLORS-->
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="TOPColor">
                                        <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse"
                                                data-bs-target="#collapseTOPColor" aria-expanded="false"
                                                aria-controls="collapseTOPColor">
                                            <i class="fa fa-arrow-right"></i>&nbsp;
											<?= __( 'Top Area colours', 'bootscore' ); ?>
                                        </button>
                                    </h2>
                                    <div id="collapseTOPColor" class="accordion-collapse collapse"
                                         aria-labelledby="collapseTOPColor"
                                         data-bs-parent="#accordionColorSettings">

                                        <div class="border rounded mt-1 shadow-sm p-3 bg-custom-gray">

                                            <!--//TODO JOB Menu Hover TRENNER-->
                                            <div class="d-flex align-items-center">
                                                <div class="input-color-container">
                                                    <input id="InputColorTOPBG"
                                                           value="<?= get_hupa_option( 'top_bg_color' ) ?>"
                                                           name="top_bg_color"
                                                           class="input-color" type="color">
                                                </div>
                                                <label class="input-color-label ms-2" for="InputColorTOPBG">
													<?= __( '<b>Top Area</b> background colour', 'bootscore' ); ?>
                                                </label>
                                            </div>
                                            <hr>
                                            <div class="d-flex align-items-center pb-1">
                                                <div class="input-color-container">
                                                    <input id="InputColorTopFont"
                                                           value="<?= get_hupa_option( 'top_font_color' ) ?>"
                                                           name="top_font_color"
                                                           class="input-color" type="color">
                                                </div>
                                                <label class="input-color-label ms-2" for="InputColorTopFont">
													<?= __( '<b>Top Area</b> Font color', 'bootscore' ); ?>
                                                </label>
                                            </div>
                                            <hr>
                                            <div id="top-area-bg-opacity"
                                                 class="col-lg-5 col-md-6 col-12">
                                                <label for="RangeTopBgOpacity"
                                                       class="form-label"><b><?= __( 'Top Area Background Opacity', 'bootscore' ); ?>
                                                        ( <span class="show-range-value">
                                                            <?= get_hupa_option( 'top_bg_opacity' ) ?></span>-100 %
                                                        )</b>
                                                </label>
                                                <input data-container="top-area-bg-opacity" type="range"
                                                       class="form-range sizeRange" name="top_bg_opacity"
                                                       min="0"
                                                       max="100"
                                                       value="<?= get_hupa_option( 'top_bg_opacity' ) ?>"
                                                       step="1" id="RangeTopBgOpacity">
                                            </div>
                                            <hr>
                                        </div>
                                    </div>
                                </div><!--ITEM-END-->

                                <!--//TODO JOB MENU COLORS-->
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="MenuColor">
                                        <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse"
                                                data-bs-target="#collapseMenuColor" aria-expanded="false"
                                                aria-controls="collapseMenuColor">
                                            <i class="fa fa-arrow-right"></i>&nbsp;
											<?= __( 'Menu colours', 'bootscore' ); ?>
                                        </button>
                                    </h2>
                                    <div id="collapseMenuColor" class="accordion-collapse collapse"
                                         aria-labelledby="collapseMenuColor"
                                         data-bs-parent="#accordionColorSettings">
                                        <div class="border rounded mt-1 shadow-sm p-3 bg-custom-gray">
                                            <div class="bg-custom-yellow mb-3">
                                                <h6 class="card-title px-3 py-2">
													<?= __( 'Menu Button', 'bootscore' ) ?>
                                                </h6>
                                            </div>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" name="menu_uppercase" type="checkbox"
                                                       id="CheckUppercaseActive"
                                                       aria-describedby="CheckUppercaseActiveHelp" <?= (int) ! get_hupa_option( 'menu_uppercase' ) ?: 'checked' ?>>
                                                <label class="form-check-label" for="CheckUppercaseActive">
													<?= __( 'uppercase', 'bootscore' ) ?></label>
                                                <div id="CheckUppercaseActiveHelp" class="form-text">
													<?= __( 'Menu Font in upper case. ', 'bootscore' ) ?>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="d-flex align-items-center">
                                                <div class="input-color-container">
                                                    <input id="InputColorMenuBtnBG"
                                                           value="<?= get_hupa_option( 'menu_btn_bg_color' ) ?>"
                                                           name="menu_btn_bg_color"
                                                           class="input-color" type="color">
                                                </div>
                                                <label class="input-color-label ms-2" for="InputColorMenuBtnBG">
													<?= __( 'Menu Button Background Colour', 'bootscore' ); ?>
                                                </label>
                                            </div>
                                            <hr>
                                            <div class="d-flex align-items-center pb-1">
                                                <div class="input-color-container">
                                                    <input id="InputColorMenuBtnColor"
                                                           value="<?= get_hupa_option( 'menu_btn_color' ) ?>"
                                                           name="menu_btn_color"
                                                           class="input-color" type="color">
                                                </div>
                                                <label class="input-color-label ms-2" for="InputColorMenuBtnColor">
													<?= __( 'Font colour main menu', 'bootscore' ); ?>
                                                </label>
                                            </div>
                                            <hr>
                                            <div id="nav-btn-bg-opacity"
                                                 class="col-lg-5 col-md-6 col-12">
                                                <label for="RangeMenuBtnOpacity"
                                                       class="form-label"><b><?= __( 'Menu Button Background Opacity', 'bootscore' ); ?>
                                                        (
                                                        <span class="show-range-value"><?= get_hupa_option( 'menu_btn_bg_opacity' ) ?></span>
                                                        - 100 % )</b>
                                                </label>
                                                <input data-container="nav-btn-bg-opacity" type="range"
                                                       class="form-range sizeRange" name="menu_btn_bg_opacity"
                                                       min="0"
                                                       max="100"
                                                       value="<?= get_hupa_option( 'menu_btn_bg_opacity' ) ?>"
                                                       step="1" id="RangeMenuBtnOpacity">
                                            </div>
                                            <hr>

                                            <!--//TODO JOB Menu ACTIVE TRENNER-->
                                            <div class="bg-custom-yellow mb-3">
                                                <h6 class="card-title px-3 py-2">
													<?= __( 'Menu Button active', 'bootscore' ) ?>
                                                </h6>
                                            </div>
                                            <div class="d-flex align-items-center pb-1">
                                                <div class="input-color-container">
                                                    <input id="InputColorMenuBtnAktivBGColor"
                                                           value="<?= get_hupa_option( 'menu_btn_active_bg' ) ?>"
                                                           name="menu_btn_active_bg"
                                                           class="input-color" type="color">
                                                </div>
                                                <label class="input-color-label ms-2"
                                                       for="InputColorMenuBtnAktivBGColor">
													<?= __( 'Menu Button active Background colour', 'bootscore' ); ?>
                                                </label>
                                            </div>
                                            <hr>
                                            <div class="d-flex align-items-center pb-1">
                                                <div class="input-color-container">
                                                    <input id="InputColorMenuBtnAktivColor"
                                                           value="<?= get_hupa_option( 'menu_btn_active_color' ) ?>"
                                                           name="menu_btn_active_color"
                                                           class="input-color" type="color">
                                                </div>
                                                <label class="input-color-label ms-2" for="InputColorMenuBtnAktivColor">
													<?= __( 'Menu Button active colour', 'bootscore' ); ?>
                                                </label>
                                            </div>
                                            <hr>
                                            <div id="nav-btn-bg-aktiv-opacity"
                                                 class="col-lg-5 col-md-6 col-12">
                                                <label for="RangeMenuBtnAktivOpacity"
                                                       class="form-label"><b><?= __( 'Menu Button active Background Opacity', 'bootscore' ); ?>
                                                        (
                                                        <span class="show-range-value"><?= get_hupa_option( 'menu_btn_active_bg_opacity' ) ?></span>
                                                        - 100 % )</b>
                                                </label>
                                                <input data-container="nav-btn-bg-aktiv-opacity" type="range"
                                                       class="form-range sizeRange" name="menu_btn_active_bg_opacity"
                                                       min="0"
                                                       max="100"
                                                       value="<?= get_hupa_option( 'menu_btn_active_bg_opacity' ) ?>"
                                                       step="1" id="RangeMenuBtnAktivOpacity">
                                            </div>
                                            <hr>
                                            <!--//TODO JOB Menu Hover TRENNER-->
                                            <div class="bg-custom-yellow mb-3">
                                                <h6 class="card-title px-3 py-2">
													<?= __( 'Menu Button hover', 'bootscore' ) ?>
                                                </h6>
                                            </div>
                                            <div class="d-flex align-items-center pb-1">
                                                <div class="input-color-container">
                                                    <input id="InputColorMenuBtnHoverBGColor"
                                                           value="<?= get_hupa_option( 'menu_btn_hover_bg' ) ?>"
                                                           name="menu_btn_hover_bg"
                                                           class="input-color" type="color">
                                                </div>
                                                <label class="input-color-label ms-2"
                                                       for="InputColorMenuBtnHoverBGColor">
													<?= __( 'Menu Button hover Background colour', 'bootscore' ); ?>
                                                </label>
                                            </div>
                                            <hr>
                                            <div class="d-flex align-items-center pb-1">
                                                <div class="input-color-container">
                                                    <input id="InputColorMenuBtnHoverColor"
                                                           value="<?= get_hupa_option( 'menu_btn_hover_color' ) ?>"
                                                           name="menu_btn_hover_color"
                                                           class="input-color" type="color">
                                                </div>
                                                <label class="input-color-label ms-2" for="InputColorMenuBtnHoverColor">
													<?= __( 'Menu Button hover colour', 'bootscore' ); ?>
                                                </label>
                                            </div>
                                            <hr>
                                            <div id="nav-btn-bg-hover-opacity"
                                                 class="col-lg-5 col-md-6 col-12">
                                                <label for="RangeMenuBtnHoverOpacity"
                                                       class="form-label"><b><?= __( 'Menu Button hover Background Opacity', 'bootscore' ); ?>
                                                        (
                                                        <span class="show-range-value"><?= get_hupa_option( 'menu_btn_hover_bg_opacity' ) ?></span>
                                                        - 100 % )</b>
                                                </label>
                                                <input data-container="nav-btn-bg-hover-opacity" type="range"
                                                       class="form-range sizeRange" name="menu_btn_hover_bg_opacity"
                                                       min="0"
                                                       max="100"
                                                       value="<?= get_hupa_option( 'menu_btn_hover_bg_opacity' ) ?>"
                                                       step="1" id="RangeMenuBtnHoverOpacity">
                                            </div>
                                            <hr>

                                            <!--//TODO JOB Menu DropDown TRENNER-->
                                            <div class="bg-custom-green mb-3">
                                                <h6 class="card-title px-3 py-2">
													<?= __( 'Main menu dropdown', 'bootscore' ) ?>
                                                </h6>
                                            </div>

                                            <div class="d-flex align-items-center pb-1">
                                                <div class="input-color-container">
                                                    <input id="InputColorMenuDropDownBGColor"
                                                           value="<?= get_hupa_option( 'menu_dropdown_bg' ) ?>"
                                                           name="menu_dropdown_bg"
                                                           class="input-color" type="color">
                                                </div>
                                                <label class="input-color-label ms-2"
                                                       for="InputColorMenuDropDownBGColor">
													<?= __( 'Background colour main menu dropdown', 'bootscore' ); ?>
                                                </label>
                                            </div>
                                            <hr>
                                            <div class="d-flex align-items-center pb-1">
                                                <div class="input-color-container">
                                                    <input id="InputColorMenuDropDownColor"
                                                           value="<?= get_hupa_option( 'menu_dropdown_color' ) ?>"
                                                           name="menu_dropdown_color"
                                                           class="input-color" type="color">
                                                </div>
                                                <label class="input-color-label ms-2"
                                                       for="InputColorMenuDropDownColor">
													<?= __( 'Dropdown Color', 'bootscore' ); ?>
                                                </label>
                                            </div>
                                            <hr>
                                            <div id="nav-dropdown-bg-opacity"
                                                 class="col-lg-5 col-md-6 col-12">
                                                <label for="RangeDropDownBGOpacity"
                                                       class="form-label"><b><?= __( 'DropDown Background Opacity', 'bootscore' ); ?>
                                                        (
                                                        <span class="show-range-value"><?= get_hupa_option( 'menu_dropdown_bg_opacity' ) ?></span>
                                                        - 100 % )</b>
                                                </label>
                                                <input data-container="nav-dropdown-bg-opacity" type="range"
                                                       class="form-range sizeRange" name="menu_dropdown_bg_opacity"
                                                       min="0"
                                                       max="100"
                                                       value="<?= get_hupa_option( 'menu_dropdown_bg_opacity' ) ?>"
                                                       step="1" id="RangeDropDownBGOpacity">
                                            </div>
                                            <hr>
                                            <!--//TODO JOB Menu DropDown Aktiv TRENNER-->
                                            <div class="bg-custom-green mb-3">
                                                <h6 class="card-title px-3 py-2">
													<?= __( 'Dropdown active', 'bootscore' ) ?>
                                                </h6>
                                            </div>
                                            <div class="d-flex align-items-center pb-1">
                                                <div class="input-color-container">
                                                    <input id="InputColorMenuDropDownBGAktive"
                                                           value="<?= get_hupa_option( 'menu_dropdown_active_bg' ) ?>"
                                                           name="menu_dropdown_active_bg"
                                                           class="input-color" type="color">
                                                </div>
                                                <label class="input-color-label ms-2"
                                                       for="InputColorMenuDropDownBGAktive">
													<?= __( 'Background Dropdown active', 'bootscore' ); ?>
                                                </label>
                                            </div>
                                            <hr>
                                            <div class="d-flex align-items-center pb-1">
                                                <div class="input-color-container">
                                                    <input id="InputColorMenuDropDownAktivColor"
                                                           value="<?= get_hupa_option( 'menu_dropdown_active_color' ) ?>"
                                                           name="menu_dropdown_active_color"
                                                           class="input-color" type="color">
                                                </div>
                                                <label class="input-color-label ms-2"
                                                       for="InputColorMenuDropDownAktivColor">
													<?= __( 'Dropdown active Color', 'bootscore' ); ?>
                                                </label>
                                            </div>
                                            <hr>
                                            <div id="nav-dropdown-bg-aktiv-opacity"
                                                 class="col-lg-5 col-md-6 col-12">
                                                <label for="RangeDropDownAkivBGOpacity"
                                                       class="form-label"><b><?= __( 'DropDown Background active Opacity', 'bootscore' ); ?>
                                                        (
                                                        <span class="show-range-value"><?= get_hupa_option( 'menu_dropdown_active_bg_opacity' ) ?></span>
                                                        - 100 % )</b>
                                                </label>
                                                <input data-container="nav-dropdown-bg-aktiv-opacity" type="range"
                                                       class="form-range sizeRange"
                                                       name="menu_dropdown_active_bg_opacity"
                                                       min="0"
                                                       max="100"
                                                       value="<?= get_hupa_option( 'menu_dropdown_active_bg_opacity' ) ?>"
                                                       step="1" id="RangeDropDownAkivBGOpacity">
                                            </div>
                                            <hr>
                                            <!--//TODO JOB Menu DropDown Hover TRENNER-->
                                            <div class="bg-custom-green mb-3">
                                                <h6 class="card-title px-3 py-2">
													<?= __( 'Dropdown hover', 'bootscore' ) ?>
                                                </h6>
                                            </div>
                                            <div class="d-flex align-items-center pb-1">
                                                <div class="input-color-container">
                                                    <input id="InputColorMenuDropDownBGHover"
                                                           value="<?= get_hupa_option( 'menu_dropdown_hover_bg' ) ?>"
                                                           name="menu_dropdown_hover_bg"
                                                           class="input-color" type="color">
                                                </div>
                                                <label class="input-color-label ms-2"
                                                       for="InputColorMenuDropDownBGHover">
													<?= __( 'Background Dropdown hover', 'bootscore' ); ?>
                                                </label>
                                            </div>
                                            <hr>
                                            <div class="d-flex align-items-center pb-1">
                                                <div class="input-color-container">
                                                    <input id="InputColorMenuDropDownHoverColor"
                                                           value="<?= get_hupa_option( 'menu_dropdown_hover_color' ) ?>"
                                                           name="menu_dropdown_hover_color"
                                                           class="input-color" type="color">
                                                </div>
                                                <label class="input-color-label ms-2"
                                                       for="InputColorMenuDropDownHoverColor">
													<?= __( 'Dropdown hover color', 'bootscore' ); ?>
                                                </label>
                                            </div>
                                            <hr>
                                            <div id="nav-dropdown-bg-hover-opacity"
                                                 class="col-lg-5 col-md-6 col-12">
                                                <label for="RangeDropDownHoverBGOpacity"
                                                       class="form-label"><b><?= __( 'DropDown Background hover Opacity', 'bootscore' ); ?>
                                                        (
                                                        <span class="show-range-value"><?= get_hupa_option( 'menu_dropdown_hover_bg_opacity' ) ?></span>
                                                        - 100 % )</b>
                                                </label>
                                                <input data-container="nav-dropdown-bg-hover-opacity" type="range"
                                                       class="form-range sizeRange"
                                                       name="menu_dropdown_hover_bg_opacity"
                                                       min="0"
                                                       max="100"
                                                       value="<?= get_hupa_option( 'menu_dropdown_hover_bg_opacity' ) ?>"
                                                       step="1" id="RangeDropDownHoverBGOpacity">
                                            </div>
                                            <hr>
                                        </div>
                                    </div>
                                </div>

                                <!--TODO JOB Login Site FARBEN-->
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="loginSiteColor">
                                        <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse"
                                                data-bs-target="#collapseLoginSiteColor" aria-expanded="false"
                                                aria-controls="collapseLoginSiteColor">
                                            <i class="fa fa-arrow-right"></i>&nbsp;
											<?= __( 'Login site', 'bootscore' ); ?>
                                        </button>
                                    </h2>
                                    <div id="collapseLoginSiteColor" class="accordion-collapse collapse"
                                         aria-labelledby="collapseLoginSiteColor"
                                         data-bs-parent="#accordionColorSettings">

                                        <div class="border rounded mt-1 shadow-sm p-3 bg-custom-gray">
                                            <!--//TODO JOB Menu DropDown Hover TRENNER-->
                                            <div class="bg-custom-yellow mb-3">
                                                <h6 class="card-title px-3 py-2">
													<?= __( 'Site', 'bootscore' ) ?>
                                                </h6>
                                            </div>
                                            <div class="d-flex align-items-center pb-1">
                                                <div class="input-color-container">
                                                    <input id="InputLoginBG"
                                                           value="<?= get_hupa_option( 'login_bg' ) ?>"
                                                           name="login_bg"
                                                           class="input-color" type="color">
                                                </div>
                                                <label class="input-color-label ms-2"
                                                       for="InputLoginBG">
													<?= __( 'Background color', 'bootscore' ); ?>
                                                </label>
                                            </div>
                                            <hr>
                                            <div class="d-flex align-items-center pb-1">
                                                <div class="input-color-container">
                                                    <input id="InputLoginColor"
                                                           value="<?= get_hupa_option( 'login_color' ) ?>"
                                                           name="login_color"
                                                           class="input-color" type="color">
                                                </div>
                                                <label class="input-color-label ms-2"
                                                       for="InputLoginColor">
													<?= __( 'Font color', 'bootscore' ); ?>
                                                </label>
                                            </div>
                                            <hr>
                                            <div class="bg-custom-yellow mb-3">
                                                <h6 class="card-title px-3 py-2">
													<?= __( 'Button', 'bootscore' ) ?>
                                                </h6>
                                            </div>
                                            <div class="d-flex align-items-center pb-1">
                                                <div class="input-color-container">
                                                    <input id="InputLoginButtonBG"
                                                           value="<?= get_hupa_option( 'login_btn_bg' ) ?>"
                                                           name="login_btn_bg"
                                                           class="input-color" type="color">
                                                </div>
                                                <label class="input-color-label ms-2"
                                                       for="InputLoginButtonBG">
													<?= __( 'Button Background color', 'bootscore' ); ?>
                                                </label>
                                            </div>
                                            <hr>
                                            <div class="d-flex align-items-center pb-1">
                                                <div class="input-color-container">
                                                    <input id="InputLoginButtonColor"
                                                           value="<?= get_hupa_option( 'login_btn_color' ) ?>"
                                                           name="login_btn_color"
                                                           class="input-color" type="color">
                                                </div>
                                                <label class="input-color-label ms-2"
                                                       for="InputLoginButtonColor">
													<?= __( 'Button Font color', 'bootscore' ); ?>
                                                </label>
                                            </div>
                                            <hr>

                                        </div>
                                    </div>
                                </div><!--ITEM-END-->

                                <!--TODO JOB LINK FARBEN-->
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="LinkColor">
                                        <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse"
                                                data-bs-target="#collapseLinkColor" aria-expanded="false"
                                                aria-controls="collapseLinkColor">
                                            <i class="fa fa-arrow-right"></i>&nbsp;
											<?= __( 'Link colours', 'bootscore' ); ?>
                                        </button>
                                    </h2>
                                    <div id="collapseLinkColor" class="accordion-collapse collapse"
                                         aria-labelledby="collapseLinkColor"
                                         data-bs-parent="#accordionColorSettings">

                                        <div class="border rounded mt-1 shadow-sm p-3 bg-custom-gray">
                                            <div class="d-flex align-items-center pb-1">
                                                <div class="input-color-container">
                                                    <input id="InputLinkColor"
                                                           value="<?= get_hupa_option( 'link_color' ) ?>"
                                                           name="link_color"
                                                           class="input-color" type="color">
                                                </div>
                                                <label class="input-color-label ms-2"
                                                       for="InputLinkColor">
													<?= __( 'Link color', 'bootscore' ); ?>
                                                </label>
                                            </div>
                                            <hr>
                                            <div class="d-flex align-items-center pb-1">
                                                <div class="input-color-container">
                                                    <input id="InputLinkAktivColor"
                                                           value="<?= get_hupa_option( 'link_aktiv_color' ) ?>"
                                                           name="link_aktiv_color"
                                                           class="input-color" type="color">
                                                </div>
                                                <label class="input-color-label ms-2"
                                                       for="InputLinkAktivColor">
													<?= __( 'Link active color', 'bootscore' ); ?>
                                                </label>
                                            </div>
                                            <hr>
                                            <div class="d-flex align-items-center pb-1">
                                                <div class="input-color-container">
                                                    <input id="InputLinkHoverColor"
                                                           value="<?= get_hupa_option( 'link_hover_color' ) ?>"
                                                           name="link_hover_color"
                                                           class="input-color" type="color">
                                                </div>
                                                <label class="input-color-label ms-2"
                                                       for="InputLinkHoverColor">
													<?= __( 'Link hover color', 'bootscore' ); ?>
                                                </label>
                                            </div>
                                            <hr>
                                        </div>
                                    </div>
                                </div><!--ITEM-END-->
                                <!--TODO JOB Scroll to Top FARBEN-->
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="scrollTopColor">
                                        <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse"
                                                data-bs-target="#collapseScrollTopColor" aria-expanded="false"
                                                aria-controls="collapseScrollTopColor">
                                            <i class="fa fa-arrow-right"></i>&nbsp;
											<?= __( 'Scroll to Top Button', 'bootscore' ); ?>
                                        </button>
                                    </h2>
                                    <div id="collapseScrollTopColor" class="accordion-collapse collapse"
                                         aria-labelledby="collapseScrollTopColor"
                                         data-bs-parent="#accordionColorSettings">

                                        <div class="border rounded mt-1 shadow-sm p-3 bg-custom-gray">
                                            <div class="d-flex align-items-center pb-1">
                                                <div class="input-color-container">
                                                    <input id="InputScrollTopBG"
                                                           value="<?= get_hupa_option( 'scroll_btn_bg' ) ?>"
                                                           name="scroll_btn_bg"
                                                           class="input-color" type="color">
                                                </div>
                                                <label class="input-color-label ms-2"
                                                       for="InputScrollTopBG">
													<?= __( 'Background color', 'bootscore' ); ?>
                                                </label>
                                            </div>
                                            <hr>
                                            <div class="d-flex align-items-center pb-1">
                                                <div class="input-color-container">
                                                    <input id="InputScrollTopColor"
                                                           value="<?= get_hupa_option( 'scroll_btn_color' ) ?>"
                                                           name="scroll_btn_color"
                                                           class="input-color" type="color">
                                                </div>
                                                <label class="input-color-label ms-2"
                                                       for="InputScrollTopColor">
													<?= __( 'Icon color', 'bootscore' ); ?>
                                                </label>
                                            </div>
                                            <hr>
                                        </div>
                                    </div>
                                </div><!--ITEM-END-->
                            </div><!--Accordion END -->
                        </form>
                    </div><!--Collapse-->

                    <!--  TODO JOB WARNING THEME OPTIONEN -->
                    <div class="collapse" id="collapseSettingsOtherOption" data-bs-parent="#settings_display_data">

                        <div class="border rounded mt-1 shadow-sm p-3 bg-custom-gray">
                            <hr>
                            <h5 class="card-title">
                                <i class="font-blue fa fa-wordpress"></i>&nbsp; <?= __( 'Wordpress settings', 'bootscore' ) ?>
                            </h5>
                            <hr>
                            <form class="sendAjaxThemeForm" action="#" method="post">
                                <input type="hidden" name="method" value="theme_form_handle">
                                <input type="hidden" name="handle" value="theme_optionen">
                                <div class="row g-3 pb-3">
                                    <div class="col-lg-12 pt-2">
                                        <h6>
                                            <i class="font-blue fa fa-upload"></i>&nbsp;<?= __( 'Enable SVG upload', 'bootscore' ); ?>
                                        </h6>
                                        <hr>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" name="svg_aktiv" type="checkbox"
                                                   id="CheckSVGActive"
                                                   aria-describedby="CheckSVGActiveHelp" <?= (int) ! get_hupa_option( 'svg' ) ?: 'checked' ?>>
                                            <label class="form-check-label" for="CheckSVGActive">
												<?= __( 'SVG upload active', 'bootscore' ) ?></label>
                                        </div>
                                        <div id="CheckSVGActiveHelp" class="form-text">
											<?= __( 'If this option is activated, <b>SVG graphics</b> can be uploaded with the WordPress media manager. ', 'bootscore' ) ?>
                                        </div>
                                    </div>
                                    <hr>

                                    <div class="col-lg-12 pt-2">
                                        <h6>
                                            <i class="font-blue fa fa-wordpress"></i>&nbsp;<?= __( 'Disable Gutenberg Editor', 'bootscore' ); ?>
                                        </h6>
                                        <hr>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" name="gb_aktiv" type="checkbox"
                                                   id="CheckGBActive"
                                                   aria-describedby="CheckGBActiveHelp" <?= (int) ! get_hupa_option( 'gutenberg' ) ?: 'checked' ?>>
                                            <label class="form-check-label" for="CheckGBActive">
												<?= __( 'Deactivate Editor', 'bootscore' ) ?></label>
                                        </div>
                                        <div id="CheckGBActiveHelp" class="form-text">
											<?= __( 'You have the possibility to <b>deactivate</b> the <b>Gutenberg Editor</b>. This option enables or disables the editor for <b>pages and posts</b>', 'bootscore' ) ?>
                                        </div>
                                    </div>
                                    <hr>


                                    <div class="col-lg-12 pt-2">
                                        <h6>
                                            <i class="font-blue fa fa-wordpress"></i>&nbsp;<?= __( 'Disable Gutenberg Widget Editor', 'bootscore' ); ?>
                                        </h6>
                                        <hr>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" name="gb_widget_aktiv" type="checkbox"
                                                   id="CheckGBWIActive"
                                                   aria-describedby="CheckGBActiveHelp" <?= (int) ! get_hupa_option( 'gb_widget' ) ?: 'checked' ?>>
                                            <label class="form-check-label" for="CheckGBWIActive">
				                                <?= __( 'Deactivate Widget Editor', 'bootscore' ) ?></label>
                                        </div>
                                        <div id="CheckGBWIActiveHelp" class="form-text">
			                                <?= __( 'Activate or deactivate the Gutenberg <b>Widget Editor</b>.', 'bootscore' ) ?>
                                        </div>
                                    </div>
                                    <hr>

                                    <div class="col-lg-12 pt-2">
                                        <h6>
                                            <i class="font-blue fa fa-wordpress"></i>&nbsp;<?= __( 'Remove WordPress Version', 'bootscore' ); ?>
                                        </h6>
                                        <hr>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" name="version_aktiv" type="checkbox"
                                                   id="CheckVersionActive"
                                                   aria-describedby="CheckVersionActiveHelp" <?= (int) ! get_hupa_option( 'version' ) ?: 'checked' ?>>
                                            <label class="form-check-label" for="CheckVersionActive">
												<?= __( 'Remove version', 'bootscore' ) ?></label>
                                        </div>
                                        <div id="CheckVersionActiveHelp" class="form-text">
											<?= __( 'If active, the WordPress version is <b>hidden</b> in the FrontEnd.', 'bootscore' ) ?>
                                        </div>
                                    </div>
                                    <hr>

                                    <div class="col-lg-12 pt-2">
                                        <h6>
                                            <i class="font-blue fa fa-wordpress"></i>&nbsp;<?= __( 'Remove emoji', 'bootscore' ); ?>
                                        </h6>
                                        <hr>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" name="emoji_aktiv" type="checkbox"
                                                   id="CheckEmojiActive"
                                                   aria-describedby="CheckEmojiActiveHelp" <?= (int) ! get_hupa_option( 'emoji' ) ?: 'checked' ?>>
                                            <label class="form-check-label" for="CheckEmojiActive">
												<?= __( 'remove', 'bootscore' ) ?></label>
                                        </div>
                                        <div id="CheckEmojiActiveHelp" class="form-text">
											<?= __( 'If this option is enabled the emoji source code will be <b>removed</b> from the front end.', 'bootscore' ) ?>
                                        </div>
                                    </div>
                                    <hr>

                                    <div class="col-lg-12 pt-2">
                                        <h6>
                                            <i class="font-blue fa fa-wordpress"></i>&nbsp;<?= __( 'Remove WP block CSS', 'bootscore' ); ?>
                                        </h6>
                                        <hr>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" name="css_aktiv" type="checkbox"
                                                   id="CheckCSSBlockActive"
                                                   aria-describedby="CheckCSSBlockActiveHelp" <?= (int) ! get_hupa_option( 'block_css' ) ?: 'checked' ?>>
                                            <label class="form-check-label" for="CheckCSSBlockActive">
												<?= __( 'remove', 'bootscore' ) ?></label>
                                        </div>
                                        <div id="CheckCSSBlockActiveHelp" class="form-text">
											<?= __( 'If this option is activated, the CSS Gutenberg editor source code and WooCommerce CSS code is removed from the front end.', 'bootscore' ) ?>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="col-lg-12 pt-2">
                                        <h6>
                                            <i class="font-blue fa fa-compress"></i>&nbsp;<?= __( 'Optimize HTML', 'bootscore' ); ?>
                                        </h6>
                                        <hr>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" name="optimize" type="checkbox"
                                                   id="CheckOptimizeActive"
                                                   aria-describedby="CheckOptimizeActiveHelp" <?= (int) ! get_hupa_option( 'optimize' ) ?: 'checked' ?>>
                                            <label class="form-check-label" for="CheckOptimizeActive">
												<?= __( 'active', 'bootscore' ) ?></label>
                                        </div>
                                        <div id="CheckOptimizeActiveHelp" class="form-text">
											<?= __( 'If this option is active, the <b>HTML source</b> code in the frontend will be optimized.', 'bootscore' ) ?>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="ajax-status-spinner ps-2 pt-3"></div>
                    </div>

                    <!--//TODO JOB WARNING RESET-->
                    <div class="collapse" id="collapseSettingsResetOption" data-bs-parent="#settings_display_data">

                        <div class="border rounded mt-1 shadow-sm p-3 bg-custom-gray">
                            <hr>
                            <div class="d-flex align-items-center">
                                <h5 class="card-title mb-0">
                                    <i class="font-blue fa fa-random"></i>&nbsp; <?= __( 'Reset Settings', 'bootscore' ) ?>
                                </h5>
                                <div class="ms-auto">
                                    <button
                                            data-bs-id=""
                                            data-bs-method="reset_settings"
                                            data-bs-type="reset_all_settings" data-bs-toggle="modal"
                                            data-bs-target="#ThemeBSModal"
                                            class="btn btn-outline-danger btn-sm">
                                        <i class="fa fa-repeat"></i>&nbsp;
										<?= __( 'Reset all settings', 'bootscore' ) ?>
                                    </button>
                                </div>
                            </div>
                            <hr>
                            <div class="settings-btn-group">
                                <button data-bs-id=""
                                        data-bs-method="reset_settings"
                                        data-bs-type="reset_general" data-bs-toggle="modal"
                                        data-bs-target="#ThemeBSModal"
                                        class="btn btn-outline-secondary btn-sm">
                                    <i class="fa fa-server"></i>&nbsp;
									<?= __( 'Reset', 'bootscore' ) ?> <?= __( 'General Theme Settings', 'bootscore' ) ?>
                                </button>
                                <button
                                        data-bs-id=""
                                        data-bs-method="reset_settings"
                                        data-bs-type="reset_fonts" data-bs-toggle="modal"
                                        data-bs-target="#ThemeBSModal"
                                        class="btn btn-outline-secondary btn-sm">
                                    <i class="fa fa-font"></i>&nbsp;
									<?= __( 'Reset', 'bootscore' ) ?> <?= __( 'Fonts', 'bootscore' ) ?>
                                </button>
                                <button
                                        data-bs-id=""
                                        data-bs-method="reset_settings"
                                        data-bs-type="reset_colors" data-bs-toggle="modal"
                                        data-bs-target="#ThemeBSModal"
                                        class="btn btn-outline-secondary btn-sm">
                                    <i class="fa fa-magic"></i>&nbsp;
									<?= __( 'Reset', 'bootscore' ) ?> <?= __( 'Colors', 'bootscore' ) ?>
                                </button>
                                <button
                                        data-bs-id=""
                                        data-bs-method="reset_settings"
                                        data-bs-type="reset_wp_optionen" data-bs-toggle="modal"
                                        data-bs-target="#ThemeBSModal"
                                        class="btn btn-outline-secondary btn-sm">
                                    <i class="fa fa-gears"></i>&nbsp;
									<?= __( 'Reset', 'bootscore' ) ?> <?= __( 'Theme options', 'bootscore' ) ?>
                                </button>

                            </div>

                            <hr>
                            <div class="d-flex align-items-center">
                                <h5 class="card-title mb-0">
                                    <i class="font-blue fa fa-random"></i>&nbsp; <?= __( 'Reset Tools', 'bootscore' ) ?>
                                </h5>
                            </div>
                            <hr>
                            <div class="settings-btn-group">
                                <button data-bs-id=""
                                        data-bs-method="reset_settings"
                                        data-bs-type="reset_social_media" data-bs-toggle="modal"
                                        data-bs-target="#ThemeBSModal"
                                        class="btn btn-outline-secondary btn-sm">
                                    <i class="fa fa-share-square-o"></i>&nbsp;
									<?= __( 'Reset', 'bootscore' ) ?> <?= __( 'Social Media', 'bootscore' ) ?>
                                </button>
                                <button
                                        data-bs-id=""
                                        data-bs-method="reset_settings"
                                        data-bs-type="reset_gmaps" data-bs-toggle="modal"
                                        data-bs-target="#ThemeBSModal"
                                        class="btn btn-outline-secondary btn-sm">
                                    <i class="fa fa-map-marker"></i>&nbsp;
									<?= __( 'Reset', 'bootscore' ) ?> <?= __( 'Gmaps', 'bootscore' ) ?>
                                </button>

                            </div>
                            <hr>
                            <div class="settings-btn-group">
                                <button class="btn btn-primary btn-sm" onclick="reload_settings_page();">
                                    <i class="fa fa-refresh"></i>&nbsp;
									<?= __( 'Reload page', 'bootscore' ) ?>
                                </button>
                            </div>

                        </div>
                        <div id="reset-msg-alert"
                             class="alert alert-success d-block text-center alert-dismissible fade my-3" role="alert">
                            <h5><?= __( 'Settings reset!', 'bootscore' ) ?></h5> <small class="d-block">
								<?= __( 'The changes are visible after reloading the page.', 'bootscore' ) ?>
                            </small>
                        </div>


                    </div>

                </div><!--PARENT COLLAPSE-->

            </div>
        </div>
    </div>

    <!-- Small Modal -->
    <div class="modal fade" id="ThemeBSModal" tabindex="-1" aria-labelledby="CmsSmallModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body"></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary btn-sm" data-bs-dismiss="modal">
                        <i class="text-danger fa fa-times"></i>&nbsp <?= __( 'Cancel', 'bootscore' ) ?></button>
                    <button id="smallThemeSendModalBtn" type="button" class="btn btn-sm"></button>
                </div>
            </div>
        </div>
    </div>
</div><!--Wrapper-->
<div id="snackbar-success"></div>
<div id="snackbar-warning"></div>