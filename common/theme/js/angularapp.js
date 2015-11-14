'use strict';
angular.module('RibelaApp', ['ngCookies', 'pascalprecht.translate'])
// Config
.config(function($translateProvider) {
    $translateProvider.useStaticFilesLoader({
        prefix: '/language/',
        suffix: '.json'
    });
    $translateProvider.useLoaderCache(true);
    $translateProvider.preferredLanguage('es');
    $translateProvider.useLocalStorage();
})
// Services
.factory('AccesscontrolService', ['$http', function($http){
    
}])
// Controllers 

// Controller Translate
.controller('LanguageController', ['$scope', '$translate', function($scope, $translate){
    $scope.changeLanguage = function(langKey) {
        $translate.use(langKey);
    };
}])

/*
 Semi prueba con funcionalidad.

.controller('AccessControl', ['$scope', '$http', function($scope, $http){
    $scope.update = function(){
        if(!$scope.selectedCompany){
            console.log("No company selected");
            $scope.modules = [];
            $scope.packages = [];
            $scope.tasks = [];
        }else{
            var item = $scope.selectedCompany;
            $http({
              url       : 'http://ribelaerp.backend/sys_account_manager/account/getjsonaccess?id_company=' + item,
              method    : 'GET',
              headers   : { 'Content-Type': 'application/x-www-form-urlencoded' }
            })
            .success(function(data, status) {
                $scope.modules = data.modules; // response data
                $scope.packages = [];
                $scope.tasks = [];
                     
                $scope.moduleClick = function(moduleid){
                    //if($scope.moduleClick){

                        angular.forEach(data.modules, function(module, index) { //Each para los modulos

                            if(module.id == moduleid){
                                //console.log("Entró al if el modulo es:" + module.name +" y su id es: "+ module.id +"y el index es:"+ index);
                                angular.forEach(module.packages, function(package, index){ //each para los paquetes por modulos
                                    $scope.packages.push(package);
        
                                }); // Fin de each paquetes

                            }
                       
                        });//fin each modulos  
                   // }else{
                     //   console.log("Borrar Modulos");
                   // }
                }   
                

            })
            .error(function(data, status){
                console.log("Error sending data");
            });
        }
    }
    
    $scope.packageClick = function(packageid){      
        //console.log("el paquete id es:" + packageid);
        angular.forEach($scope.packages, function(package, index) {                            
            if(package.id == packageid){
                console.log("entró al paquete id es:" + package.id + "y su index es:" + index);

                angular.forEach(package.tasks, function(task, index){
                    $scope.tasks.push(task);
                });

                //console.log("Entró al if el paquete es:" + task.name +" y su id es: "+ task.id +"y el index es:"+ index);
            }else{
                console.log("No entró al paquete id es:" + packageid);
            }
        });
    }

}]);

*/

.controller('AccessControl', ['$scope', '$http', function($scope, $http){
    $scope.update = function(){
        if(!$scope.selectedCompany){
            console.log("No company selected");
            $scope.modules = [];
            $scope.packages = [];
            $scope.tasks = [];
        }else{
            var item = $scope.selectedCompany;
            $http({
              url       : 'http://ribelaerp.backend/sys_account_manager/account/getjsonaccess?id_company=' + item,
              method    : 'GET',
              headers   : { 'Content-Type': 'application/x-www-form-urlencoded' }
            })
            .success(function(data, status) {
                //var jsonModules = data;
                $scope.modules = data.modules; // response data
                $scope.packages = [];
                $scope.tasks = [];
                            
                angular.forEach(data.modules, function(module, index) {
                    if(module.access == "true"){                            
                        angular.forEach(module.packages, function(package, index){ //each para los paquetes por modulos
                            $scope.packages.push(package);
                        });
                    }
                });
                angular.forEach($scope.packages, function(package, index){
                    if(package.access == "true"){
                        angular.forEach(package.tasks, function(task, index){ //each para los paquetes por modulos
                            $scope.tasks.push(task);
                        });    
                    }
                });

                //console.log("Prueba");
                console.log($scope.modules);
            })
            .error(function(data, status){
                console.log("Error sending data");
            });
        }
    }
    // Evento check del los modulos.
    $scope.moduleClick = function(moduleid){

            angular.forEach($scope.modules, function(module, index) { 
            //Each para los modulos
                if(module.id == moduleid){
                    //console.log("Entró al if el modulo es:" + module.name +" y su id es: "+ module.id +"y el index es:"+ index);
                    angular.forEach(module.packages, function(package, index){ //each para los paquetes por modulos
                        $scope.packages.push(package);

                    }); // Fin de each paquetes
                }
            });//fin each modulos  
        
    }  
    // Evento Check de los paquetes.
    $scope.packageClick = function(packageid){      
                                    //console.log("el paquete id es:" + packageid);
        angular.forEach($scope.packages, function(package, index) {                            
            if(package.id == packageid){
                console.log("entró al paquete id es:" + package.id + "y su index es:" + index);

                angular.forEach(package.tasks, function(task, index){
                    $scope.tasks.push(task);
                });

                //console.log("Entró al if el paquete es:" + task.name +" y su id es: "+ task.id +"y el index es:"+ index);
            }else{
                console.log("No entró al paquete id es:" + packageid);
            }
        });
    }

}]);