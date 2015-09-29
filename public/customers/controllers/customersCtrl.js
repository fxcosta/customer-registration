/**
 * @ngdoc customersCtrl
 * @name customersCtrl
 *
 * @description
 * _Please update the description and dependencies._
 *
 * @requires $scope
 * */
(function() {
    'use strict';
    angular.module('customersAppCtrl', [])
        .controller('customersCtrl', ['$scope', 'customersService', function ($scope, customersService) {

            $scope.loadService = function() {
                $scope.registers = customersService.query();
            }
        }]);
})();
