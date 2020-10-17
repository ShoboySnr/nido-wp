export const contentAlignDirective = () => {
    "use strict";

    const scope = {
        model : '=',
    };

    const link = (scope, elem, attrs) => {
        scope.aligns = ['left', 'center', 'right'];
    };

    return {
        restrict: 'E',
        scope: scope,
        link: link,
        templateUrl: 'content-align/content-align.directive.html'
    }
}