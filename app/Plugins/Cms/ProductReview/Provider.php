<?php
    $this->loadTranslationsFrom(__DIR__.'/Lang', 'Plugins/Cms/ProductReview');
    $this->loadViewsFrom(__DIR__.'/Views', 'Plugins/Cms/ProductReview');
    // $this->mergeConfigFrom(
    //     __DIR__.'/config.php', 'key_define_for_plugin'
    // );

    // Only push view if plugin enable
    if (sc_config_global('ProductReview')) {
        sc_push_include_view('shop_product_detail', (new App\Plugins\Cms\ProductReview\AppConfig)->pathPlugin.'::render');
        sc_push_include_script('shop_product_detail', (new App\Plugins\Cms\ProductReview\AppConfig)->pathPlugin.'::script');
    }
