(function() {
    'use strict';

    angular.module('customersAppSrv', [])
        .factory('customersService', ['$resource', function($resource) {
            return $resource();
        }])

})();
