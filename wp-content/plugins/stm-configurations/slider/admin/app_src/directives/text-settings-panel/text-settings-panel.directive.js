export const textSettingsPanelDirective = ($rootScope) => {
    const scope = {
        model: '=',
        link : '=?'
    };

    const link = (scope, elem, attrs) => {

        // if (scope.link.length === 0) {
        //     scope.link = true;
        // }
        //
        // let $elem = angular.element(elem);
        //
        //
        // let defaultOptions = {
        //     ff: 'default',
        //     fsz: 24,
        //     bold: false,
        //     italic: false,
        //     underline: false,
        //     color: '#000000',
        //     align: 'left'
        // };
        //
        // scope.fontSizes = {};
        // for (let i = 8; i <= 120; i++) {
        //     scope.fontSizes[i] = `${i}px`;
        // }
        // let options = {};
        //
        // scope.showLinkInput = false;
        //
        // angular.copy(scope.options, options);
        //
        // angular.merge(options, defaultOptions);
        //
        // scope.model = options;

        angular.forEach(['fw', 'fi', 'fu'], function (v) {
            if (typeof scope.modelOptions[v] === 'string') {
                scope.modelOptions[v] = scope.modelOptions[v] === 'true';
            }
        });

        scope.colorpickerDefaults = {
            openOnInput: true,
            hsl: false,
            history: false,
            materialPalette: false,
            clearButton: false,
            preview: true
        }




    };

    return {
        restrict: 'E',
        link: link,
        templateUrl: 'text-settings-panel/text-settings-panel.directive.html',
    }
};