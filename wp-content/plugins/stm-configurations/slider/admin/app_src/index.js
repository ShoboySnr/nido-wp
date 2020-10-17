

let app = angular.module('app', ['app.templates', 'ui.bootstrap', 'pascalprecht.translate', 'colorpicker.module', 'ui.sortable', 'toastr', 'ngMaterial', 'mdColorPicker']);

app
    .constant('appPath', `${stm_slider_vars.appPath}`)
    .constant('stmIcons', stm_icons)
    .constant('googleFonts', JSON.parse(stm_google_fonts));



import {wpRequestConfig} from './config/http-interceptors.config';

app
    .config(($translateProvider, appPath) => {
    "use strict";

    $translateProvider.useStaticFilesLoader({
        prefix: `${appPath}/translates/`,
        suffix: '.json'
    })
    $translateProvider.preferredLanguage('en');

})
    .config(wpRequestConfig);


import {appRootComponent} from './components/app-root/app-root.component';

app.component('appRoot', appRootComponent);

/**
 * @ngdoc directive
 * @name app:switcher
 * @restrict 'E'
 * @scope
 * @param {model} model to change
 * @description switch passed model between true/false
 */
import {switcherDirective} from './directives/switcher/switcher.directive';
import {transitionsDirective} from './directives/transitions/transitions.directive';
import {stmDropdownDirective} from './directives/stm-dropdown/stm-dropdown.directive';
import {contentAlignDirective} from './directives/content-align/content-align.directive';
import {slideContentDirective} from './directives/slide-content/slide-content.directive';
import {scaleValueDirective} from './directives/scale-value/scale-value.directive';
import {taAutosizeDirective} from './directives/ta-autosize/ta-autosize.directive';
import {textSettingsPanelDirective} from './directives/text-settings-panel/text-settings-panel.directive';
import {iconPickerDirective} from './directives/icon-picker/icon-picker.directive';

app
    .directive('switcher', switcherDirective)
    .directive('transitions', transitionsDirective)
    .directive('contentAlign', contentAlignDirective)
    .directive('slideElement', slideContentDirective)
    .directive('scaleValue', scaleValueDirective)
    .directive('taAutosize', taAutosizeDirective)
    .directive('textSettingsPanel', textSettingsPanelDirective)
    .directive('iconPicker', iconPickerDirective)
    .directive('stmDropdown', stmDropdownDirective);


import {StmSliderService} from './services/stm-slider.service';
import {WpMediaService} from './services/wp-media.service';

app
    .service('StmSliderService', StmSliderService)
    .service('WpMediaService', WpMediaService)


import {transitions} from './factories/transitions.factory';
app
    .factory('StmSliderTransitions', transitions)


import {objectFilter} from './filters/objectFilter.filter';

app
    .filter('objectFilter', objectFilter);


angular.module('app.templates', []); //gulp compile tpls in this module