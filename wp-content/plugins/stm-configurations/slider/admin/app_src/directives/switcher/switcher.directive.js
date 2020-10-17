export const switcherDirective = () => {
    "use strict";
    const link = (scope, element, attrs) => {
        if (angular.isString(scope.model)) {
            scope.model = scope.model === 'true';
        }
    };

    const scope = {
        model: '='
    };

    return {
        restrict: 'E',
        link: link,
        scope: scope,
        templateUrl: 'switcher/switcher.directive.html',
        transclude: true
    }
}