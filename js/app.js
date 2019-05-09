var app = angular.module('signupApp', []);

app.controller('signupController', ['$scope', function($scope){
    $scope.isClient = false;
    $scope.isVet = false;
    $scope.isAny = false;

    $scope.showClient = function(){
        $scope.isClient = true;
        $scope.isVet = false;
        $scope.isAny = true;
    }
    $scope.showVet = function(){
        $scope.isClient = false;
        $scope.isVet = true;
        $scope.isAny = true;
    }

}]);

app.controller('loginController', ['$scope', function($scope){
    $scope.loginCl = true;
    $scope.loginVe = false;
    
    $scope.showCl = function(){
        $scope.loginCl = true;
        $scope.loginVe = false;
    }
    $scope.showVe = function(){
        $scope.loginCl = false;
        $scope.loginVe = true;
    }
}]);