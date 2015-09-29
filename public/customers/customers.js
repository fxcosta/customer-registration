(function() {
    'use strict';

    angular.module('customersApp', ['ngRoute', 'ngResource', 'customersAppCtrl', 'customersAppSrv'])

        .config(['$routeProvider', function ($routeProvider) {
            $routeProvider
                .when('/', {
                    templateUrl: 'customers/views/index.html',
                    controller: 'customersCtrl'
                })
        }]);

})();
