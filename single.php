<?php
/*
 * Template Post Type: post
 */
$pageId = is_singular() ? get_the_ID() : 0;
$pageSettings = apply_filters('get_page_meta_data', (int)$pageId);
$pageSettings->title_css ? $titleCss = 'class="' . $pageSettings->title_css . '"' : $titleCss = '';
get_header(); ?>

    <div class="site-content">
        <div id="content" class="<?= $pageSettings->main_container ? 'container' : 'container-fluid' ?> pb-3">
            <div id="primary" class="content-area">

                <!-- Hook to add something nice -->
                <?php bs_after_primary(); ?>

                <?php !get_hupa_option('post_breadcrumb') ?: the_breadcrumb(); ?>

                <div class="row">
                    <div class="col-md-8 col-xxl-9">
                        <main id="main" class="site-main">
                            <header <?php post_class("entry-header") ?> >
                                <?php the_post(); ?>

                                <?php !get_hupa_option('post_kategorie') ?: bootscore_category_badge() ; ?>
                                <?php
                                if ($pageSettings->showTitle) {
                                    echo $pageSettings->custom_title ? '<h1 ' . $titleCss . '> ' . $pageSettings->custom_title . '</h1>' : '<h1 ' . $titleCss . '>' . get_the_title() . '</h1>';
                                }
                                ?>
                                <p class="entry-meta">
                                    <small class="text-muted">
                                        <?php
                                        !get_hupa_option('post_date') ?: bootscore_date();
                                        !get_hupa_option('post_date') ?: _e(' by ', 'bootscore');
                                        !get_hupa_option('post_autor') ?: the_author_posts_link();
                                        !get_hupa_option('post_kommentar') ?: bootscore_comment_count();
                                        ?>
                                    </small>
                                </p>
                                <?php bootscore_post_thumbnail(); ?>
                            </header>
                            <div <?php post_class("entry-content") ?>>
                                <?php the_content(); ?>
                            </div>

                            <footer <?php post_class("entry-footer clear-both") ?>>
                                <?php hupa_social_media(); ?>
                                <div class="mb-4">
                                    <?php !get_hupa_option('post_tags') ?: bootscore_tags(); ?>
                                </div>
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination justify-content-center">
                                        <li class="page-item">
                                            <?php previous_post_link('%link'); ?>
                                        </li>
                                        <li class="page-item">
                                            <?php next_post_link('%link'); ?>
                                        </li>
                                    </ul>
                                </nav>
                            </footer>
                            <?php comments_template(); ?>

                        </main> <!-- #main -->

                    </div><!-- col -->
                    <?php get_sidebar(); ?>
                </div><!-- row -->

            </div><!-- #primary -->
        </div><!-- #content -->
    </div>

<?php get_footer(); ?>