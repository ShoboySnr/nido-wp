(function ($) {

    $(document).ready(() => {
        "use strict";
        let form = $('.stm_donation_popup__form');
        let amountsWrapper = form.find('.amounts_wrapper');
        let customAmount = form.find('.custom-amount');



        customAmount.keydown(function () {
            let activeAmount = amountsWrapper.find('.stm_input_wrapper_radio.active');
            let amount = amountsWrapper.find('.stm_input_wrapper_radio');


            amount.each(function () {
                if (!$(this).hasClass('disabled')) {
                    $(this).addClass('disabled');
                }
            });


            activeAmount.removeClass('active')
        });

        customAmount.change(function () {
            let disabledAmount = amountsWrapper.find('.stm_input_wrapper_radio.disabled');

            if ($(this).val().length === 0) {
                disabledAmount.each(function () {
                    $(this).removeClass('disabled');

                    if ($(this).find('input').is(':checked')) {
                        $(this).addClass('active');
                    }
                });
            }
        });


        form.submit(function (e) {
            e.preventDefault();
            let form = $(this);

            let donationId = parseInt(form.data('donation-id'));

            let data = form.serialize() + `&donationId=${donationId}&action=pearl_donate&security=` + pearl_donate;



            $.ajax(
                {
                    url: stm_ajaxurl,
                    method: 'post',
                    data: data,
                    beforeSend: function () {
                        form.find('[type=submit]').addClass('loading');
                    },
                    success: function (data) {
                        var newTab = window.open(data, '_blank');
                        if (newTab) {
                            newTab.focus();
                        } else {
                            form.find('[type=submit]').removeClass('loading');
                            alert('Please allow popups for this website');
                        }
                        // location.href = data;
                    }
                }
            )

        })
    })

})(jQuery);