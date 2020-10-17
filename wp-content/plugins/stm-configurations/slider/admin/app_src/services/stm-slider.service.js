export class StmSliderService {

    constructor($http, $window, $httpParamSerializerJQLike) {
        'ngInject';
        this.$http = $http;
        this.$window = $window;
        this.$JQlikeSerialize = $httpParamSerializerJQLike;
    }

    save(data) {
        return this.$http({
            url: ajaxurl,
            method: 'POST',
            wp: true,
            data: {
                sliderObj: data,
                slider: 'save'
            }
        })
    }

    getSlider(id) {
        return this.$http({
            url: ajaxurl,
            wp: true,
            params: {
                slider: 'get',
                sliderId: id
            },
        })
    }

    saveSliderMeta(id, data) {
        return this.$http({
            url: ajaxurl,
            method: 'POST',
            wp: true,
            data: {
                slider: 'save_meta',
                sliderId: id,
                sliderMeta: data
            },
        })
    }

    getSliderMeta(id) {
        return this.$http({
            url: ajaxurl,
            wp: true,
            params: {
                slider: 'get_meta',
                sliderId: id
            },
        })
    }

    getSlidePreview(imageId, postId) {
        return this.$http({
            url: ajaxurl,
            wp: true,
            params: {
                slider: 'slide_preview',
                imageId: imageId,
                postId: postId
            },
        })
    }

    addSlide(sliderId, slideArray) {
        return this.$http({
            url: ajaxurl,
            method: 'POST',
            wp: true,
            data: {
                slider: 'add_slide',
                sliderId: sliderId,
                slide: slideArray
            },
        })
    }

    saveSlide(sliderId, slides) {
        return this.$http({
            url: ajaxurl,
            method: 'POST',
            wp: true,
            data: {
                slider: 'save_slides',
                sliderId: sliderId,
                slides: slides
            },
        })
    }

    deleteSlide(slideId) {
        return this.$http({
            url: ajaxurl,
            method: 'POST',
            wp: true,
            data: {
                slider: 'delete_slide',
                slideId: slideId
            }
        })
    }

    deleteSlides(slides) {
        return this.$http({
            url: ajaxurl,
            method: 'POST',
            wp: true,
            data: {
                slider: 'delete_slides',
                slides: slides
            },
        })
    }

    getSlides(id) {
        return this.$http({
            url: ajaxurl,
            wp: true,
            params: {
                slider: 'get_slides',
                sliderId: id
            },
        })
    }

    getPosts(keyword) {
        return this.$http({
            url: ajaxurl,
            wp: true,
            params: {
                slider: 'get_slide_posts',
                keyword: keyword
            },
        })
    }

}
;