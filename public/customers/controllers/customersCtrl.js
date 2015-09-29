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
        .controller('customersCtrl', ['$scope', 'customersService', '$location', '$routeParams', function ($scope, customersService, $location, $routeParams) {

            $scope.loadService = function() {
                $scope.registers = customersService.query();
            };

            $scope.get = function() {
                $scope.item = customersService.get({id: $routeParams.id})
            };

            $scope.edit = function(item) {
                var params = $.param(JSON.parse(angular.toJson(item)));

                $scope.result = customersService.update(
                    {id: $routeParams.id},
                    params,
                    function(data, status, headers, config) {
                        $location.path('/');
                    },
                    function(data, status, headers, config) {
                        $scope.message = 'Ocorreu um erro: ' + data.messages[0];
                    }
                );
            };

            // cria cliente
            $scope.create = function(item) {
                $scope.result = customersService.save(
                    {},
                    $.param(item),
                    function(data, status, headers, config) {
                        $location.path('/');
                    },
                    function(data, status, headers, config) {
                        $scope.message = 'Ocorreu um erro: ' + data.messages[0];
                    }

                );
            };

            $scope.delete = function(id) {
                if(confirm('Deseja realmente excluir essa Cliente?')) {
                    customersService.remove(
                        {id: id},
                        {},
                        function(data, status, headers, config) {
                            $scope.loadService();
                        },
                        function(data, status, headers, config) {
                            alert('Ocorreu um erro: ' + data.messages[0]);
                        }
                    )
                } else {
                    $scope.loadService();
                }
            };

            // limpa form
            $scope.clear = function() {
                $scope.item = "";
                console.log('Clearing all fields...');
            }
        }]);
})();
