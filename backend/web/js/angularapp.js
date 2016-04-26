var companyMod = angular.module('companyMod', []);
var employeeMod = angular.module('employeeMod', []);
var app = angular.module('myapp', ['UserValidation']);

companyMod.controller('newFields', function($scope) {

  var maxField = 3;
  var maxFieldContact = 2;  
  $scope.array = [{id: 1}];
  $scope.contact = [{id: 1}];
  
  $scope.addNewChoice = function() {
    if($scope.array.length < maxField){
        var newItemNo = $scope.array.length+1;
        $scope.array.push({ id : newItemNo});
    }
  };
    
  $scope.removeChoice = function() {
    if($scope.array.length != 1){
        var lastItem = $scope.array.length-1;
        $scope.array.splice(lastItem);
    }
  };

  $scope.addNewChoiceCotact = function() {
    if($scope.contact.length < maxFieldContact){
        var newItemNo = $scope.contact.length+1;
        $scope.contact.push({ id : newItemNo});
    }
  };
    
  $scope.removeChoiceCotact = function() {
    if($scope.contact.length != 1){
        var lastItem = $scope.contact.length-1;
        $scope.contact.splice(lastItem);
    }
  };

  /*
    var $scope.data = {
                name : $scope.name,
                company_ground_id : $scope.company_ground_id,
                dni_type_id : $scope.dni_type_id,
                company_phone : $scope.array,
    };*/
    

    // var company_data = {
    //                     "company_profile":{
    //                         "name":null,
    //                         "type_dni_id":null,
    //                         "dni":null,
    //                         "currency_id":[],
    //                         "company_ground_id":null
    //                     },
    //                     "company_address":{
    //                         "time_zone_id":null,
    //                         "country_id":null,
    //                         "state_id":null,
    //                         "city_id":null,
    //                         "address":null,
    //                         "postal_code":null
    //                     },
    //                     "branch_office":[
    //                         {
    //                         "name":null,
    //                         "state_id":null,
    //                         "city_id":null,
    //                         "address":null,
    //                         }
    //                     ],
    //                     "company_contact":{
    //                         "numbers":[
    //                         null,
    //                         null
    //                         ]
    //                     },
    //                     "company_bank_data":[
    //                         {
    //                         "id_bank":null,
    //                         "id_account_type":null,
    //                         "account_number":null
    //                         }
    //                     ]
    //                 };

   //  $scope.submitForm = function() {
   //  $http({
   //      method : 'POST',
   //      // url : 'process.php',
   //      // url : 'backend/modules/sys_mod/controllers/company/data',
   //      url : 'index.php?r=sys_mod/company/data',
   //      data : param($scope.formData), // pass in data as strings
   //      headers : { 'Content-Type': 'application/x-www-form-urlencoded' } // set the headers so angular passing info as form data (not request payload)
   //  })
   //  .success(function(data) {
   //      alert("Guardo");
   //    // if (!data.success) {
   //    //  // if not successful, bind errors to error variables
   //    //  $scope.errorName = data.errors.name;
   //    //  $scope.errorEmail = data.errors.email;
   //    //  $scope.errorTextarea = data.errors.message;
   //    //  $scope.submissionMessage = data.messageError;
   //    //  $scope.submission = true; //shows the error message
   //    // } else {
   //    // // if successful, bind success message to message
   //    //  $scope.submissionMessage = data.messageSuccess;
   //    //  $scope.formData = {}; // form fields are emptied with this line
   //    //  $scope.submission = true; //shows the success message
   //    // }
   //   });
   // };


// function myController($scope){
//     $scope.titleEnabled = true;  
//     $scope.divEnabled = true;
  
//     $scope.click = function(){
//      $scope.titleEnabled = false;  
//      $scope.divEnabled = false;
//     }
// }

});

companyMod.controller('countryController', function($scope, $http) {


/////////////////////// Hide Compani ///////////////
// <?= $form->field($companyConsortium, 'country_id')->dropDownList($countryList, ['class'=>'form-control select2me', 'ng-model' => 'country_id', 'ng-change' => 'countryAction()', 'prompt'=>"Seleccionar país", 
//     'onchange'=>'$.post("'.Yii::$app->urlManager->createUrl(["/sys_timezone/state/stateslist"]).'&idCountry="+$(this).val(), function(data){$("select#companyconsortium-state_id").html(data);});']) ?>
    
    $scope.countryAction = function(){
        if($scope.country_id != ''){
                $scope.isEven = true;
                var item = $scope.country_id;
                $http({
                //   url       : 'http://ribelaerp.backend/sys_account_manager/account/getjsonaccess?idCountry=' + item,
                //   $.post("'.Yii::$app->urlManager->createUrl(["/sys_timezone/state/stateslist"]).'&idCountry="+$(this).val()
                  url       : 'index.php?r=sys_timezone/state/stateslistbycountryid&countryId=' + item,
                  method    : 'GET',
                  headers   : { 'Content-Type': 'application/x-www-form-urlencoded' }
                })/**/
                .success(function(data) {
                    console.log(data);
                        $scope.states_list= data;
                });

                $http({
                  url       : 'index.php?r=acc_mod/bank/bankslistbycountryid&countryId=' + item,
                  method    : 'GET',
                  headers   : { 'Content-Type': 'application/x-www-form-urlencoded' }
                }).success(function(data) {
                    console.log(data);
                    $scope.bank_list= data;
                });

        }else{
            console.log("Esta Vacio");
            $scope.isEven = false;
        }
        // $scope.isEven(hide);
    }
    

    $scope.stateAction = function(){
        if($scope.state_id != ''){
            console.log($scope.state_id);
            var item = $scope.state_id;
            $http({
              url       : 'index.php?r=sys_timezone/city/citylistbystateid&stateId=' + item,
              method    : 'GET',
              headers   : { 'Content-Type': 'application/x-www-form-urlencoded' }
            })
            .success(function(data) {
                console.log(data);
                    $scope.country_list= data;
            });
        }else{
            console.log("Esta Vacio");
        } 
    }

  
        // $scope.isEven = function(value) {
        //     console.log(value);
        //     return value;
        // };

});


companyMod.controller('saveCompany', function($scope, $http) {


  // var item = $scope.country_id;

  // $scope.data = {
  //                   company_profile:{
  //                       name: $scope.name,
  //                       type_dni_id: $scope.dni_type_id,
  //                       dni: $scope.dni,
  //                       //currency_id:[$scope.currency_id],
  //                       company_ground_id: $scope.company_ground_id
  //                   }
  //               };


  $scope.submitCompany = function($scope) {
        // $http({
        //       url       : 'index.php?r=sys_timezone/city/citylistbystateid&stateId=' + item,
        //       method    : 'GET',
        //       headers   : { 'Content-Type': 'application/x-www-form-urlencoded' }
        //     })
        //     .success(function(data) {
        //         console.log(data);
        //             $scope.country_list= data;
        // });
        console.log(country_id);
        console.log("guardo formulario");
  };

});

//# Modulo de empleado - employeeMod 

companyMod.controller('saveFormEmployee', function($scope) {

});


//--------------------------------------------------------------------------------------------------------------
// Modulo de prueba.

// myappCtrl = function($scope) {
/*app.controller('myappCtrl', function($scope) {
    $scope.formAllGood = function () {
        return ($scope.usernameGood && $scope.passwordGood && $scope.passwordCGood)
    }
        
});

angular.module('UserValidation', []).directive('validUsername', function () {
    return {
        require: 'ngModel',
        link: function (scope, elm, attrs, ctrl) {
            ctrl.$parsers.unshift(function (viewValue) {
                // Any way to read the results of a "required" angular validator here?
                var isBlank = viewValue === ''
                var invalidChars = !isBlank && !/^[A-z0-9]+$/.test(viewValue)
                var invalidLen = !isBlank && !invalidChars && (viewValue.length < 5 || viewValue.length > 20)
                ctrl.$setValidity('isBlank', !isBlank)
                ctrl.$setValidity('invalidChars', !invalidChars)
                ctrl.$setValidity('invalidLen', !invalidLen)
                scope.usernameGood = !isBlank && !invalidChars && !invalidLen

            })
        }
    }
}).directive('validPassword', function () {
    return {
        require: 'ngModel',
        link: function (scope, elm, attrs, ctrl) {
            ctrl.$parsers.unshift(function (viewValue) {
                var isBlank = viewValue === ''
                var invalidLen = !isBlank && (viewValue.length < 8 || viewValue.length > 20)
                var isWeak = !isBlank && !invalidLen && !/(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z])/.test(viewValue)
                ctrl.$setValidity('isBlank', !isBlank)
                ctrl.$setValidity('isWeak', !isWeak)
                ctrl.$setValidity('invalidLen', !invalidLen)
                scope.passwordGood = !isBlank && !isWeak && !invalidLen

            })
        }
    }
}).directive('validPasswordC', function () {
    return {
        require: 'ngModel',
        link: function (scope, elm, attrs, ctrl) {
            ctrl.$parsers.unshift(function (viewValue, $scope) {
                var isBlank = viewValue === ''
                var noMatch = viewValue != scope.myform.password.$viewValue
                ctrl.$setValidity('isBlank', !isBlank)
                ctrl.$setValidity('noMatch', !noMatch)
                scope.passwordCGood = !isBlank && !noMatch
            })
        }
    }
})*/