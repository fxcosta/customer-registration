(function() {
    'use strict';

    angular.module('customers', ['ngRoute', 'ngResource'])

        .config(['$routeProvider', function ($routeProvider) {
            $routeProvider
                .when('/', {
                    templateUrl: 'customers/views/index.html',
                    controller: 'customersCtrl'
                })
        }]);

})();
