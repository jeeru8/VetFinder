var app = angular.module('vetApp', []);

app.controller('vetController', ['$scope', function($scope){

    $scope.isServices = true;
    $scope.isInbox = false;
    $scope.isTransactions = false;

    $scope.showServices = function(){
        $scope.isServices = true;
        $scope.isInbox = false;
        $scope.isTransactions = false;
    }
    $scope.showInbox = function(){
        $scope.isServices = false;
        $scope.isInbox = true;
        $scope.isTransactions = false;
    }
    $scope.showTransactions = function(){
        $scope.isServices = false;
        $scope.isInbox = false;
        $scope.isTransactions = true;
    }

    $scope.isAny = true;
    $scope.isAddVet = false;
    $scope.isAddProduct = false;

    $scope.addVet = function(){
        $scope.isAny = false;
        $scope.isAddVet = true;
    }
    $scope.addProduct = function(){
        $scope.isAny = false;
        $scope.isAddProduct = true;
    }
    $scope.addVetCancel = function(){
        $scope.isAny = true;
        $scope.isAddVet = false;
    }
    $scope.addProductCancel = function(){
        $scope.isAny = true;
        $scope.isAddProduct = false;
    }

}]);