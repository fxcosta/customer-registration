(function() {
    'use strict';

    angular.module('customersApp', ['ngRoute', 'ngResource', 'customersAppCtrl', 'customersAppSrv'])

        .config(['$routeProvider', function ($routeProvider) {
            $routeProvider
                .when('/', {
                    templateUrl: 'customers/views/index.html',
                    controller: 'customersCtrl'
                })
                .when('/novo', {
                    templateUrl: 'customers/views/new.html',
                    controller: 'customersCtrl'
                })
                .when('/editar/:id', {
                    templateUrl: 'customers/views/edit.html',
                    controller: 'customersCtrl'
                })
        }]);

})();
