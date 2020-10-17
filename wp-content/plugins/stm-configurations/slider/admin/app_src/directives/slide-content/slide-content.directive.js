class SlideContentController {
    constructor($scope, $element, $attrs, googleFonts, $rootScope, $timeout) {
        this.scope = $scope;
        this.rootScope = $rootScope;
        this.$t = $timeout;
        this.fonts = googleFonts;
        this.fontSizes = [];


        if (angular.isUndefined($attrs.linkUrl)){
            this.linkUrl = false;
        } else {
            if (angular.isUndefined($scope.linkUrl)) {
                this.scope.linkUrl = '#';
            }
        }

        $element.bind('click', function (e) {
            e.stopPropagation();
            $('slide-element').not($(this)).removeClass('active');
            $(this).addClass('active');
        });

        $('.stm_slide__preview').click(function () {
            $($element).removeClass('active');
        });
        this.showInput = false;
        this.makeFonts();




        if (angular.isUndefined(this.scope.modelOptions.align)) {
            this.scope.modelOptions.align = this.scope.modelOptions.contentAlign
        }
        let vm = this;

        this.scope.$watch('vm.scope.$parent.slide.contentAlign', function (val, oldVal) {
            if (val !== oldVal) {
                vm.scope.modelOptions.align = val;
            }
        })

        this.adjustTa();
        this.taCols =  35;
        if (angular.isDefined(this.scope.model) && this.scope.model.length) {
            if (this.scope.model.length < 35) {
                this.taCols = this.scope.model.length + 1;
            } else {
                this.taCols = 35
            }
        } else {
            this.taCols = this.scope.placeholder.length;
        }

    }

    makeFonts() {

        let fontNames = {};
        angular.forEach(this.fonts, (v, k) => {
            fontNames[k] = k;
        })
        this.fontNames = fontNames;

        for (let i = 8; i <= 120; i++) {
            this.fontSizes[i] = `${i}px`;
        }
        this.fontSizes[0] = 'Default';
    }

    adjustTa() {
        this.$t(() => {
            this.rootScope.$broadcast('autoheight-adjust');
        }, 310);
    }


}

export const slideContentDirective = () => {
    const scope = {
        type: '@',
        model: '=',
        modelOptions : '=?',
        placeholder: '=',
        linkUrl: '=?'
    };

    const link = (scope, elem, attrs) => {

    };

    return {
        restrict: 'E',
        scope: scope,
        controller: SlideContentController,
        controllerAs: 'vm',
        templateUrl: 'slide-content/slide-content.directive.html',
    }
};