export const stmDropdownDirective = ($filter) => {
    "use strict";

    const scope = {
        options: '=',
        model: '=',
        callback: '&',
        filter: '=?',
        empty: '=?'
    };

    const link = (scope, elem, attrs) => {
        let options = [];
        scope.modelSelected = true;
        if (angular.isUndefined(scope.filter)) {
            scope.filter = false;
        }

        // options[''] = 'none';
        // angular.merge(options, scope.options);
        // scope.options = options;


        scope.updateLabel = () => {
            if (scope.empty) {
                scope.label = 'None';
            } else {
                if (angular.isDefined(scope.model) && scope.model !== 'false') {
                    scope.label = scope.options[scope.model];
                    console.log(scope.options[scope.model]);
                } else {
                    if (angular.isDefined(scope.options)) {
                        scope.label = scope.options[Object.keys(scope.options)[0]];
                    }
                }
            }
        };




        elem.click(function (e) {
            e.stopPropagation();
        })
        $('body').on('click', function () {
            scope.$apply(() => {
                scope.showList = false;
            });
        });
        scope.showList = false;

        scope.selectOption = (key, value) => {
            scope.model = key;
            scope.label = value;
            scope.showList = false;
            scope.modelSelected = true;
            scope.callback();
        }

        scope.$watch('options', function (v, k) {
            scope.filteredOptions = scope.options;
            scope.updateLabel();
        });

        if (scope.filter) {
            scope.$watch('label', function (val) {
                if (scope.modelSelected) {
                    scope.filteredOptions = scope.options;
                } else {
                    scope.filteredOptions = $filter('objectFilter')(scope.options, val);
                }
            })
        } else {
            scope.filteredOptions = scope.options;
        }

        // scope.filterOptions = () => {
        // console.log(scope.label);
        // scope.filteredOptions = $filter('objectFilter')(scope.options, scope.label);
        // }

        // scope.filteredOptions = () => {
        //     let options = {};
        //     angular.forEach(scope.options, function (v, k) {
        //         if (v.indexOf(scope.label) !== -1 ) {
        //             options[k] = v;
        //         }
        //     })
        //
        //     return options;
        // }


    };


    return {
        restrict: 'E',
        scope: scope,
        link: link,
        templateUrl: 'stm-dropdown/stm-dropdown.directive.html'
    }
};