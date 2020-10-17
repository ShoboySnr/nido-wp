const wpRequest = () => {
    "use strict";
    let interceptor = {
        'request': (config) => {
            if (angular.isDefined(config.wp) && config.wp === true) {

                if (angular.isUndefined(config.params)) {
                    config.params = {};
                }

                config.params.action = 'stm_slider_ajax';
                config.headers = {
                    'Content-Type' : 'application/x-www-form-urlencoded; charset=UTF-8',
                    'Accept': 'application/json'
                }
            }
            return config;
        }
    };

    return interceptor;
}

export const wpRequestConfig = ($httpProvider) => {
    $httpProvider.interceptors.push(wpRequest);
}