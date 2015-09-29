(function() {
    'use strict';

    angular.module('customersAppSrv', [])
        .factory('customersService', ['$resource', function($resource) {
            return $resource(
                '/index.php/api/:id', {id: '@id'},
                {
                    save: {
                        method: 'POST',
                        headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
                    }
                },
                {
                    update: {
                        method: 'PUT',
                        url: '/index.php/api/:id',
                        headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
                    }
                }
            );
        }])
})();
