class IconPickerController {
    constructor($scope, $element, $attrs, stmIcons, $filter) {
        this.iconName = '';
        this.iconSearch = '';
        this.setName = 'FontAwesome';
        this.icons = [];
        this.iconSets = stmIcons;
        this.currentSet = this.iconSets[this.setName];
        this.iconsSetsNames = [];
        this.showList = false;
        this.scope = $scope;
        this.filter = $filter;


        this.filteredIcons = this.currentSet;
        this.limit = 150;

        let vm = this;

        angular.forEach(stmIcons, function (value, key) {
            vm.iconsSetsNames.push(key);

            angular.forEach(value, function (icon) {
                vm.icons.push(icon);
            })
        });

        $scope.$watch('vm.iconSearch', function (val) {
            vm.getFilteredIcons();
        })

        $('body').click(function () {
            $scope.$apply(
                function () {
                    vm.showList = false;
                }
            );
        })

        $element.bind('click', function (e) {
            e.stopPropagation();
        })
    }

    updateLimit() {
        this.limit += 50;
    };

    changeSetName(setName) {
        console.log(setName);
        this.currentSet = this.iconSets[setName];
        this.iconSearch = '';
        this.getFilteredIcons();
    }

    selectIcon(icon) {
        this.list.close(icon);
        this.isOpen = false;
    }

    setCurrentIconSet(set_name, iconSearch) {
        this.limit = 150;
        this.currentSet = this.iconSets[set_name];
        this.setName = set_name;

        this.getFilteredIcons(iconSearch);
    }

    getFilteredIcons() {
        if (this.iconSearch === 0) {
            this.limit = 150;
            this.filteredIcons = this.currentSet;
        }
        this.filteredIcons = this.filter('filter')(this.currentSet, this.iconSearch);
    }
    selectIcon(icon) {
        this.scope.icon = icon;
        this.showList = false;
    }
};

export const iconPickerDirective = ($filter, stmIcons) => {
    "use strict";

    const link = (scope, elem, attrs) => {







        // scope.$watch('koko', function (val) {
        //     console.log(val);
        //     scope.filteredIcons = $filter('filter')(scope.currentSet, val);
        // }, true);

        // scope.getFilteredIcons = (iconName) => {
        //
        //     if ( iconName === 0 ) {
        //         scope.limit = 150;
        //         scope.filteredIcons = scope.currentSet;
        //     }
        //     scope.filteredIcons = $filter('filter')(scope.currentSet, iconName);
        // }


    }


    return {
        link: link,
        scope: {
            icon: '=',
        },
        restrict: 'E',
        templateUrl: 'icon-picker/icon-picker.directive.html',
        controller: IconPickerController,
        controllerAs: 'vm'
    }

}