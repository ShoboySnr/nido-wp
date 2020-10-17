import {SliderOperations} from './class.slider.operations';

(function ($) {
    SliderOperations.prototype.baseUrl = stm_slider_page_url;

    let sliderOperations = new SliderOperations();

    $(document).ready(() => {
        "use strict";

        $('.stm_add_new_slider').click((e) => {
            "use strict";

            e.preventDefault();
            sliderOperations.createNew();
        })

        $('.stm_delete_slider').click(function(e) {
            e.preventDefault();

            let id = $(this).data('slider-id');
            let allow = false;

            allow = confirm('Are you want to delete this slider?');

            if (!allow) {
                return;
            }
            location.href = $(this).attr('href');

            // sliderOperations.delete(id);
        })

    })

})(jQuery);

