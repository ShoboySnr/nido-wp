(function ($) {

    class PearlImagesPostSlider {
        constructor(element) {
            this.slider = $(element);
            this.sliderWrapper = this.slider.find('.slider__wrapper');
            this.backdrop = this.slider.find('.slider__backdrop');
            this.thumbnail = this.slider.find('.slider__thumbnail');
            this.sliderParent = this.slider.parent();
            this.sliderPrevEl = this.slider.prev();
            this.closeButton = this.slider.find('.slider__close');
            this.carousel = this.slider.find('.slider__images');
            this.titlesContainer = this.slider.find('.slider__image_titles');
            this.titleContainer = $('<div class="slider__image_title h3"></div>');
            this.textsContainer = this.slider.find('.slider__image_texts');
            this.textContainer = $('<div class="slider__image_text"></div>');
            this.navContainer = '.slider__arrows';
            this.counterContainer = this.slider.find('.slider__counter');
            this.translations = window.pearl_image_posts_slider_translations;
            this.lightbox = this.slider.find('.slider__lb');
            this.lightboxMoved = false;
            this.currentImage = '';
            this.owlOptions = {
                items: 1,
                loop: true,
                dots: true,
                navContainer: this.navContainer,
                nav: true,
                navText: ['', ''],
                slideBy: 1,
            };
            this.transition = 500;

            this.init();
        }

        init() {
            this.preEvents();
            this.carousel = this.carousel.owlCarousel(this.owlOptions);
            this.carouselData = this.carousel.data('owlCarousel');
            this.items = this.carouselData._items;
            this.lightbox.hide();
            this.postEvents();
        }

        preEvents() {
            if (this.carousel) {
                this.carousel
                    .on('translated.owl.carousel', (e) => {
                        let image = this.getImageFromEvent(e);
                        this.currentImage = image;
                        let title = this.addContent(image);
                        this.addCounter(e);
                        this.setActiveThumbnail(e);
                    })
                    .on('initialized.owl.carousel', (e) => {
                        let image = this.getImageFromEvent(e);
                        this.currentImage = image;
                        this.addContent(image);
                        this.addCounter(e);
                        this.setActiveThumbnail(e);                        
                    });
            }
        }
        postEvents() {
            let _this = this;

            this.slider.find('.owl-item').on('click', () => {
                if (!this.slider.hasClass('fullscreen') && window.innerWidth > 1024) {
                    this.openLightbox();
                }
            });

            $(document).keyup(function (e) {
                if (_this.slider.hasClass('fullscreen') && e.keyCode === 27) {
                    _this.closeLightbox();
                }
            });
            this.backdrop.on('click', () => {
                this.closeLightbox();
            })

            this.thumbnail.on('click', function() {
                _this.carousel.trigger('to.owl.carousel', $(this).index());
            });

            this.closeButton.on('click', function() {
                _this.closeLightbox();
            });
        }

        setActiveThumbnail(e) {
            let currentIndex = e.page.index;
            this.thumbnail.removeClass('active').eq(currentIndex).addClass('active');
        }

        openLightbox() {
            $('body').css({
                'overflow': 'hidden'
            });
            this.slider = this.slider.appendTo('body').addClass('fullscreen');
            this.carouselData.onResize();
        }

        closeLightbox() {
            if (this.sliderPrevEl.length > 0) {
                this.slider.insertAfter(this.sliderPrevEl).removeClass('fullscreen');
            } else {
                this.slider = this.slider.appendTo(this.sliderParent).removeClass('fullscreen');
            }
            $('body').css({
                'overflow': 'visible'
            });
            this.carouselData.onResize();
        }

        getImageTitle(image) {
            return image.data('title');
        };

        getImageText(image) {
            return image.data('text');
        };

        getImageFromEvent(e) {
            return $(e.target).find('.owl-item').eq(e.item.index).find('.slider_image');
        }

        getCurrentImageNumber(e) {
            return e.page.index + 1;
        }

        getTotalImagesCount(e) {
            return e.page.count;
        }

        addCounter(e) {
            let imageNumber = this.getCurrentImageNumber(e);
            let imagesTotal = this.getTotalImagesCount(e);
            let str = `${imageNumber} ${this.translations.of} ${imagesTotal}`;
            this.counterContainer.text(str);
            this.lightbox.find('.slider__counter').text(str);
        }

        addContent(image) {
            let title = this.getImageTitle(image);
            let text = this.getImageText(image);
            let titleContainer = this.titleContainer.clone();
            let textContainer = this.textContainer.clone();

            let oldTitle = this.titlesContainer.find('.slider__image_title');
            let oldText = this.textsContainer.find('.slider__image_text');

            oldText.remove();
            oldTitle.remove();
            textContainer.text(text).appendTo(this.textsContainer).hide().fadeIn(this.transition);
            titleContainer.text(title).attr('title', title).appendTo(this.titlesContainer).hide().fadeIn(this.transition);
        }
    }

    $.fn.PearlImagePostsSlider = function () {
        this.each(function () {
            let slider = new PearlImagesPostSlider(this);
        });
    }

    $(document).ready(function () {
        $('.stm_image_posts_slider').PearlImagePostsSlider();
    })
})(jQuery)