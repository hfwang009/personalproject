/*
* @Author: Wanglj
* @Date:   2016-04-26 19:13:45
* @Last Modified by:   Wanglj
* @Last Modified time: 2016-04-27 11:43:54
*/

'use strict';

var phonecatApp = angular.module('SoftApp', []);

phonecatApp.controller('SoftListCtrl', function ($scope, $http) {
    $http.get('/api/soft').success(function(data) {
        $scope.softs = data.data.list;
    });
});