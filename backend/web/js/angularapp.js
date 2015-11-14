var companyMod = angular.module('companyMod', []);

companyMod.controller('newFields', function($scope) {

  var maxField = 4;  
  $scope.array = [{id: 1}];

    var data = {
                name : $scope.name,
                company_ground_id : $scope.company_ground_id,
                dni_type_id : $scope.dni_type_id,
                company_phone : $scope.array,
    };

    var company_data = {
                        "company_profile":{
                            "name":null,
                            "type_dni_id":null,
                            "dni":null,
                            "currency_id":[],
                            "company_ground_id":null
                        },
                        "company_address":{
                            "time_zone_id":null,
                            "country_id":null,
                            "state_id":null,
                            "city_id":null,
                            "address":null,
                            "postal_code":null
                        },
                        "company_contact":{
                            "numbers":[
                            null,
                            null
                            ]
                        },
                        "company_bank_data":[
                            {
                            "id_bank":null,
                            "id_account_type":null,
                            "account_number":null
                            }
                        ]
                    };
  
  $scope.addNewChoice = function() {
    if($scope.array.length < maxField){
        var newItemNo = $scope.array.length+1;
        $scope.array.push({ id : newItemNo});
        console.log(data);
        $scope.show=true;
    }
  };
    
  $scope.removeChoice = function() {
    if($scope.array.length != 1){
        var lastItem = $scope.array.length-1;
        $scope.array.splice(lastItem);
    }else{
        $scope.show=false;
    }

  };

});