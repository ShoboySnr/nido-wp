(function ($) {
    let resizer = $('.pearl-font-resizer');
    let step = 1;
    let minfsz = 10;
    let maxfsz = 20;
    let elements = $('#wrapper .site-content *')
        .not('[class*=stmicons]')
        .not('.fa')
        .not('.stm_breadcrumbs span')
        .filter('a, span, p');
    let steps = [100, 135];

    resizer.click(function () {
        "use strict";
        $(this).toggleClass('mbc tbc');
        elements.each(function () {

            let el = $(this);
            if (el.text().replace(/\s+/g, '').length < 5) {
                return;
            }
            let lh = 0;
            if (typeof el.data('lh') === 'undefined') {
                lh = parseInt(el.css('line-height'));
                el.data('lh', lh);
            } else {
                lh = el.data('lh');
            }

            let fsz = el.css('font-size');
            if (fsz.indexOf('px') !== -1) {
                fsz = parseInt(fsz);
                if (minfsz < fsz < maxfsz) {
                    el.css({
                        'font-size': steps[step] + '%',
                        'line-height': lh * steps[step] / 100 + 'px'
                    });
                    if (step === steps.length) {
                        el.css('line-height', el.data('lh') + 'px');
                    }

                }
            }

        })
        if (step === steps.length - 1) {
            step = 0;
        } else {
            step += 1;
        }

        resizer.data('step', step);
    })
})(jQuery);