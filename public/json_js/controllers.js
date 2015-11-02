angular.module('myApp.controller', []).
	controller('MyAppController', function($scope, $http) {
		$scope.salary = 100;
		$scope.percentage = 5;
		$scope.result = function() {
			return $scope.salary * $scope.percentage* 0.01;
		};

		$scope.firstName = 'andrian';
		$scope.lastName = 'satria';
		/*$scope.fullname = function() {
			return $scope.firstName+ " " + $scope.lastName;
		}*/

		$scope.names = [
	        {name:'Jani',country:'Norway'},
	        {name:'Hege',country:'Sweden'},
	        {name:'Kai',country:'Denmark'}
	    ];

	    $scope.count = 0;
	    $scope.myButton = false;
	    $scope.toggle = function() {
	    	$scope.myButton = !$scope.myButton;
	    };

	    $http.get("/laratwo/public/json/data")
	    .success(function(response) {
	    	$scope.post = response.records;
	    })

	    $http.get("/laratwo/public/angular/data")
	    .success(function(response) {
	    	$scope.products = response.products;
	    })
	});
