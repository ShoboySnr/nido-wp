<?php

if(!empty($element['filter'])) {
    $filter = pearl_get_filter($element['filter']);
}

if(!empty($filter)): ?>
    <div class="stm-post-filter">
        <div class="stm_mobile__switcher stm_flex_last js_trigger__click" data-toggle="false">
            <span class="mbc"></span>
            <span class="mbc second"></span>
            <span class="mbc"></span>
        </div>

        <div class="post-filter">
            <ul class="filter-list">
                <li>
                    <a href="<?php echo esc_url(get_site_url()); ?>/news/?popular=month" class="stm-post-filter-hot">
                        <span class="filter-icon stmicon-viral_hot"></span>
                        <?php esc_html_e('Hot', 'pearl'); ?>
                    </a>
                </li>
                <li>
                    <a href="<?php echo esc_url(get_site_url()); ?>/news/?popular=top" class="stm-post-filter-popular">
                        <span class="filter-icon stmicon-viral_popular"></span>
                        <?php esc_html_e('Popular', 'pearl'); ?>
                    </a>
                </li>
                <li>
                    <a href="<?php echo esc_url(get_site_url()); ?>/news/" class="stm-post-filter-latest">
                        <span class="filter-icon stmicon-viral_latest"></span>
                        <?php esc_html_e('Latest', 'pearl'); ?>
                    </a>
                </li>
                <li>
                    <a href="<?php echo esc_url(get_site_url()); ?>/news/?popular=day" class="stm-post-filter-trending">
                        <span class="filter-icon stmicon-viral_trending"></span>
                        <?php esc_html_e('Trending', 'pearl'); ?>
                    </a>
                </li>
            </ul>
        </div>
    </div>
<?php endif; ?>