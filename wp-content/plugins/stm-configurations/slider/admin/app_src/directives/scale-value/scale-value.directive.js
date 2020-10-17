export const scaleValueDirective = ($timeout) => {
    const scope = {
        slideWidth: '@',
        model: '='
    };

    const link = (scope, elem, attrs) => {

        elem.bind('load', function () {
            $timeout(function () {
                let image = angular.element(elem);
                let parent = image.parent();
                let initialWidth = image[0].width;
                let parentWidth = parent.outerWidth();



                let scale = 100;
                if (initialWidth > parentWidth) {
                    scale = parseInt((parentWidth / initialWidth) * 100);
                }

                scope.scale = scale;
                parent.append('<div class="scale">' + scale + '</div>');
            }, 50)
        });
    };

    return {
        restrict: 'A',
        scope: scope,
        link: link,
        template: '<div>{{scale}}</div>'
    }
};