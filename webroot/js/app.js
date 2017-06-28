'use strict';
/**
 * @author Batch Themes Ltd.
 */
(function() {
    $(function() {
        //default config values
        var config = {
            layout: 'default-sidebar-1',
            background: 'light',
            navbar: 'dark',
            sidebar: 'dark',
            topNavigation: 'light',
            collapsed: false,
            logo: 'light',
        };
        var colors = bootstrap_colors();
        var backgroundColors = background_colors();
        var storage = Storages.localStorage;
        if (storage.isEmpty('config') || !(storage.get('config'))) {
            storage.removeAll();
            storage.set('config', config);
        }
        config = storage.get('config');
        //set attributes before page is loaded. this can be removed in production
        var layout = $('body').attr('data-layout');
        var collapsed = config.collapsed;
        $('body').attr('data-background', config.background);
        $('body').attr('data-navbar', config.navbar);
        $('body').attr('data-sidebar', config.sidebar);
        $('body').attr('data-top-navigation', config.topNavigation);
        $('body').attr('data-collapsed', config.collapsed);
        $('body').attr('data-logo', config.logo);
        //set loader
        if ($('html').hasClass('loading')) {
            var loaderTime = 2000;
            $('#fakeloader').fakeLoader({
                timeToHide: loaderTime,
                zIndex: '99999',
                spinner: 'spinner7',
                bgColor: backgroundColors['blue-grey']
            });
            setTimeout(function() {
                $('html').removeClass('loading');
            }, loaderTime);
        }
    });
})();
