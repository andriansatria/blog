<html >
<head>
	<title>My first angular js App</title>
</head>
<body lang="en" ng-app = "myApp" ng-controller="MyAppController">
	<div ng-hide="myDatbind">
		\\Data binding\\<br>
		Your Salary ?
		<br><input type="text" ng-model="salary">
		<br> How much should you invest in gagdets?
		<br><input type="text" ng-model="percentage">%
		<br>The Amount to be spent on shopping will be :
		<span ng-bind="result()"></span>
		
	</div>
<hr>
	
	<hr>
	<div ng-hide="myButton">
		\\Button\\<br>
		<button ng-disabled="mySwitch">Click Me!</button> <br>
		<p ng-hide="mySwitch">Switch Me to hide!</p>
		<p ng-show="mySwitch">Switch Me to Show!!</p>
		<input type="checkbox" ng-model="mySwitch">Button
	</div>
	<hr>

	<div ng-hide="myEvent">
		\\Event\\<br>
		<button ng-click="count = count +1" >Click me!</button>
		<p ng-bind="count"> </p>
	</div>

	<div>
		\\control button\\<br>
		<button ng-click="toggle()">Toggle</button>
	</div>
 
	<div ng-hide="json">
		\\Json\\<br>
		<ul>
			<li ng-repeat="x in post | orderBy :'id'">
				<span ng-bind="x.title"></span>:<span ng-bind="x.post_date"></span>
			</li>
		</ul>
	</div>

	<div ng-hide="json">
		\\Json\\<br>
		<ul>
			<li ng-repeat="x in products | orderBy :'productId'">
				<span ng-bind="x.productName"></span>:<span ng-bind="x.category"></span>
			</li>
		</ul>
	</div>

	<script type="text/javascript" src="json_js/angular.js"></script>
	<script type="text/javascript" src="json_js/apps.js"></script>
	<script type="text/javascript" src="json_js/controllers.js"></script>
</body>
</html>