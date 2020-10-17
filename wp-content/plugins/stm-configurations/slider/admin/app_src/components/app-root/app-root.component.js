class AppRootController {
    constructor($location, StmSliderService, WpMediaService, $timeout, $scope, $filter, toastr, StmSliderTransitions, $q) {
        'ngInject';
        this.$location = $location;
        this.$stm = StmSliderService;
        this.$wpmedia = WpMediaService;
        this.$timeout = $timeout;
        this.$scope = $scope;
        this.$filter = $filter;
        this.toastr = toastr;
        this.slidesForRemove = [];
        this.sliderSavingState = false;
        this.transitions = StmSliderTransitions.getTransitions();
        this.$q = $q;

        this.timeout_posts = '';
        this.posts = [];
        this.selected_posts = [];

        this.overlayColor = 'rgb(255, 255, 255)';

        this.colorpickerDefaults = {
            openOnInput: true,
            hsl: false,
            history: false,
            materialPalette: false,
            clearButton: false,
            preview: false,
        };

        this.iconSearch = '';
        this.stm_slider = {};
        this.stm_sliderMeta = {
            heightUnit: 'px',
            height: 700,
            widthUnit: 'percent',
            width: 100,
            autoplayDuration: 3000,
            overlayColor: 'rgb(255, 255, 255)',
            source: 'custom',
            posts_count: 4,
            post_slides: []
        };
        this.slideDefaults = {
            duration: 3000,
            data: {
                image: {
                    url: '',
                    loaded: false
                }
            },
            overlay: false,
            pattern: false,
            contentAlign: 'left',
            titleOptions: {
                align: 'center'
            },
            contentOptions: {
                align: 'center'
            },
            button: {
                align: 'center'
            },
            buttonOptions: {},
            touched: false,
            enable: true
        };
        this.sliderSettingsLoaded = false;
        this.bgPickerOptions = {
            pos: 'top right',
            inline: true
        };
        this.beforeSlideMove = [];
        this.afterSlideMove = [];
        this.icons = stm_icons;


        let $this = this;

        this.slidesSortableOptions = {
            items: '.stm-slider__slide_tab-heading',
            start: (e, ui) => {

                let logEntry = this.slides.map(function (i) {
                    return i.order;
                });
            },
            update: (e, ui) => {

                let logEntry = this.slides.map(function (i) {
                    return i.order;
                });


            },
            stop: (e, ui) => {
                let logEntry = this.slides.map(function (i) {
                    return i.order;
                });
                this.beforeSlideMove = ui.item.sortable.index;
                this.afterSlideMove = ui.item.sortable.dropindex;

                if (ui.item.sortable.index < this.currentSlide && this.currentSlide < ui.item.sortable.dropindex) {
                    this.currentSlide = this.currentSlide - 1;
                } else if (ui.item.sortable.index > this.currentSlide && this.currentSlide > ui.item.sortable.dropindex) {
                    this.currentSlide = this.currentSlide + 1;
                } else if (this.currentSlide === ui.item.sortable.index) {
                    if (typeof ui.item.sortable.dropindex !== 'undefined') {
                        this.currentSlide = ui.item.sortable.dropindex;
                    }
                } else if (this.currentSlide === ui.item.sortable.dropindex) {

                    if (this.currentSlide === this.slides.length - 1) {
                        this.currentSlide = this.currentSlide - 1;
                    } else if (this.currentSlide === 0) {
                        this.currentSlide = this.currentSlide + 1;
                    } else {
                        this.currentSlide = ui.item.sortable.index
                    }
                }


                $scope.$emit('slideMoved', [e, ui]);
            }
        }
        this.preview = {
            style: {
                height: 300,
            },
            loaded: false
        };
    }

    $onInit() {
        this.stm_slider.ID = this.getQueryParam('slider_id') ? this.getQueryParam('slider_id') : null;
        this.getSlider();
        this.currentSlide = 0;
        this.$scope.$on('ui-sortable:moved', (e, ui) => {
            this.updateSlidesOrder();
        });
        this.$scope.$watchGroup(['vm.stm_sliderMeta.height', 'vm.stm_sliderMeta.width', 'vm.stm_sliderMeta.widthUnit'], (val, oldVal) => {
            //height
            if (val[0] !== oldVal[0]) {
                this.preview.style.height = val[0];
            }

            //width
            if (val[1] !== oldVal[1]) {
                let unit = val[2] === 'percent' ? '%' : 'px';
                this.preview.style.width = `${val[1]}${unit}`;
            }

        });

    }


    getSlider(update = false) {
        this.$stm.getSlider(this.stm_slider.ID).then((res) => {
            this.stm_slider = res.data;
            if (!angular.isObject(res.data)) {
                console.log(res.data);
                this.toastr.error('Error occured');
                return;
            }
            this.$stm.getSliderMeta(this.stm_slider.ID).then((res) => {
                if (!angular.isObject(res.data)) {
                    res.data = {};
                }
                this.stm_sliderMeta = angular.merge(this.stm_sliderMeta, res.data);
                this.getSlides(update);
                this.sliderSettingsLoaded = true;
            })
        });
    }

    getSlides(message = true) {
        this.$stm.getSlides(this.stm_slider.ID).then((res) => {
            if (!angular.isObject(res.data)) {
                console.log(res.data);
                this.toastr.error('Error occured');
                return;
            }

            if (res.data.length < 1) {
                res.data = {};
            }

            this.slides = [];


            if (!angular.equals(res.data, {})) {
                angular.forEach(res.data, (v, k) => {
                    let slide = {};
                    let defaults = angular.copy(this.slideDefaults);


                    v = angular.merge(defaults, v);
                    this.slides.push(v);
                });
            }

            this.getPreviews(this.slides);

            this.filterSLides();

            if (message) {
                this.sliderSavingState = false;
                this.toastr.success('Slider Saved', '', {
                    positionClass: 'toast-center-center',
                });
            }
        })
    }

    getPreviews(slides) {
        angular.forEach(slides, (v, k) => {
            if (angular.isDefined(v.imageId)) {
                this.$stm.getSlidePreview(v.imageId, v.id).then((res) => {
                    if (angular.isDefined(v.data.image.url)) {
                        v.data.image.url = res.data;
                        v.data.image.loaded = true;
                        this.preview.loaded = true;
                    }
                })
            } else {
                v.data.image.loaded = true;
            }

            if (angular.isDefined(v.patternId)) {
                this.$wpmedia.getImageById(v.patternId).then((res) => {
                    if (angular.isDefined(res.url)) {
                        v.data.image.patternUrl = res.url;
                        this.preview.loaded = true;
                    }
                });
            }

        })
    }


    saveSlider() {
        this.sliderSavingState = true;
        // this.$stm.deleteSlides(this.slidesForRemove).then((res) => {
        this.$stm.save(this.stm_slider).then((res) => {
            this.$stm.saveSliderMeta(this.stm_slider.ID, this.stm_sliderMeta).then((res) => {
                this.saveSlides();
            })
        });
        // });
    }

    saveSlides(message = true) {
        this.$stm.saveSlide(this.stm_slider.ID, this.slides).then((res) => {
            this.sliderSavingState = false;

            if (message) {
                this.toastr.success('Slider Saved', '', {
                    positionClass: 'toast-center-center',
                });
            }
        })
    }

    cloneSlide(index) {
        let newSlide = Object.assign({}, this.slides[index]);

        newSlide.order = this.slides.length + 1;
        let newIndex = this.slides.push(newSlide) - 1;

        this.$stm.addSlide(this.stm_slider.ID, newSlide).then((res) => {
            this.slides[newIndex].id = res.data;
        })

    }

    deleteSlide(id, index) {
        let confirmed = confirm('Are you sure?');

        if (confirmed == true) {
            if (angular.isDefined(id)) {
                this.slidesForRemove.push(id);
            }
            this.slides.splice(index, 1);
        }

        this.$stm.deleteSlide(id);

        this.updateSlidesOrder();
        this.saveSlides(false);
    }


    filterSLides() {
        if (angular.equals(this.slides, {})) {
            return;
        }
        this.slides = this.$filter('orderBy')(this.slides, 'data.order');
    }


    getQueryParam(variable) {
        var query = window.location.search.substring(1);
        var vars = query.split("&");
        for (var i = 0; i < vars.length; i++) {
            var pair = vars[i].split("=");
            if (pair[0] == variable) {
                return pair[1];
            }
        }
        return false;
    }

    addSlide() {

        let order = this.slides.length + 1;
        let newSlide = angular.copy(this.slideDefaults);
        newSlide.order = order;
        newSlide.data = {
            image: {
                url: '',
                loaded: true
            }
        };

        let newSlideIndex = this.slides.push(newSlide) - 1;

        this.$stm.addSlide(this.stm_slider.ID, newSlide).then((res) => {
            this.slides[newSlideIndex].id = res.data;
        });


        this.$timeout(() => {
            if (angular.isUndefined(this.currentSlide)) {
                this.currentSlide = 0
            } else {
                this.currentSlide = this.slides.length - 1;
            }
        }, 100);

        return newSlideIndex;
    }

    addSlideBackground(slide) {
        let vm = this;
        this.$wpmedia.selectImage().then((res) => {
            slide.imageId = res.id;
            slide.data.image.url = res.url;
        })
    }

    deleteSlideBackground(slide) {
        delete slide.data.image.url;
        delete slide.imageId;
    }

    addSlidePattern(index) {
        this.$wpmedia.selectImage().then((res) => {
            this.slides[index].patternId = res.id;
            this.slides[index].data.image.patternUrl = res.url;
        })
    }

    moveSlide(from, to) {
        this.slides.splice(to, 0, this.slides.splice(from, 1)[0])
    }

    updateSlidesOrder() {

        angular.forEach(this.slides, (v, k) => {
            this.slides[k].order = k + 1;
        })
        // if (this.currentSlide === this.beforeSlideMove) {
        //     this.currentSlide = this.afterSlideMove;
        // }

    }

    filterIcons(set) {
        this.filteredIcons = this.$filter('filter')(this.icons[set], this.iconSearch);
    }

    getPosts(keyword) {
        var $this = this;
        return $this.$stm.getPosts(keyword).then((res) => {
            var response = res.data;
            $this.posts = response;

            return response;
        });
    }

    postSelected($item) {
        this.stm_sliderMeta.post_slides.push($item);
        this.slide_post = '';
    }

    removePost(key) {
        this.stm_sliderMeta.post_slides.splice(key, 1);
    }


}

export const appRootComponent = {
    templateUrl: 'app-root/app-root.component.html',
    controller: AppRootController,
    controllerAs: 'vm'
};