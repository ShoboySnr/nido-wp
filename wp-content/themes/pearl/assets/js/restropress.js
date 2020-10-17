'use strict';

var food_category_links = document.querySelectorAll('.rpress-category-lists .rpress-category-link');
if (food_category_links.length > 0) {
    var scrollingCategories = function scrollingCategories() {
        food_category_links.forEach(function (link) {
            var section_id = link.getAttribute('href').substr(1);
            var section = document.querySelector('.menu-category-wrap[data-cat-id="' + section_id + '"]');
            if (section.getBoundingClientRect().top < 150) {
                current_category = section_id;
            }
            link.classList.remove('active');
        });
        document.querySelector('.rpress-category-lists .rpress-category-link[href="#' + current_category + '"]').classList.add('active');
    };

    var current_category = food_category_links[0].getAttribute('href').substr(1);

    window.onscroll = function () {
        scrollingCategories();
    };
}