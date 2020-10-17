(function ($) {
    let timeout;
    let module = $('.stm_categories_tabs');
    if (module.length < 1) return;
    let tabsList = module.find('ul.nav-tabs');
    let tabsListWidth = tabsList.width();
    let dd = module.find('.stm_categories_tabs__dropdown');
    let ddMenu = dd.find('ul');
    let title = module.find('.stm_categories_tabs__title');
    let lastTabWidth = 0;

    let moveTabs = () => {

        let heading = module.find('.stm_categories_tabs__heading');
        let maxWidth = heading.outerWidth() - title.outerWidth() - 80;

        if (tabsList.outerWidth() > maxWidth) {
            dd.show();
            while (tabsList.outerWidth() > maxWidth) {
                let lastTab = tabsList.find('li').last();
                lastTabWidth = lastTab.outerWidth();
                let clonedLastTab = lastTab.clone(true);
                lastTab.remove();
                clonedLastTab.appendTo(ddMenu);
            }
        } else {
            if (ddMenu.find('li').length !== 0) {
                while (tabsList.outerWidth() + lastTabWidth < maxWidth) {
                    let lastTab = ddMenu.find('li').last();

                    let clonedLastTab = lastTab.clone(true);
                    lastTab.remove();
                    clonedLastTab.appendTo(tabsList);
                    if (lastTab.length === 0) {
                        dd.hide();
                        break;
                    };
                }

            }
        }
        if (ddMenu.find('li').length === 0) {
            dd.hide();
        }

    };
    let tabClickHandler = () => {
        "use strict";
        let listElements = $('.stm_categories_tabs__dropdown > ul > li, .stm_categories_tabs ul.nav-tabs li');
        let tabs = $('.stm_categories_tabs .tab-content .tab-pane');
        listElements.on('click', function () {
            let el = $(this);
            let tab = $(el.find('a').attr('href'));
            listElements.not($(this)).each(function () {
                $(this).removeClass('active');
            });
            tabs.each(function () {
                $(this).removeClass('active in');
            })
            tab.addClass('active');
            setTimeout(() => tab.addClass('in'), 50);
            el.not('.active').addClass('active');
        })
    };

    $(document).ready(function () {
        moveTabs();
        tabClickHandler();
    });
    $(window).resize(function () {
        clearTimeout(timeout);

        timeout = setTimeout(() => moveTabs(), 500);
    })
})(jQuery);