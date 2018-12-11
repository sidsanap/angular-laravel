var app = angular.module('MyInfo', [], ['$httpProvider', function ($httpProvider) {
    $httpProvider.defaults.headers.post['X-CSRF-TOKEN'] = $('meta[name=csrf-token]').attr('content');
}]);

app.controller('MyInfoController', ['$scope', '$http', '$window', function ($scope, $http) {

    $scope.errors = [];

    $scope.files = [];

    $scope.listFiles = function () {
        var request = {
            method: 'GET',
            url: '/info/show',
            headers: {
                'Content-Type': undefined
            }
        };

             $http(request)
            .then(function success(e) {

               // window.alert(e.data.index);
                $scope.files = e.data.index;

            }, function error(e) {

            });
    };

    $scope.listFiles();

    var formData = new FormData();

    $scope.submitData = function () {


       $http.post('/info/store', {
            firstname: $scope.task.firstname,
            lastname: $scope.task.lastname,
            profile: $scope.task.profile,
        }).then(function success(e) {
             $scope.files = e.data.index;

            $scope.task.firstname='';
            $scope.task.lastname='';
            $scope.task.profile='';
          
        },  function error(e) {
                
                $scope.errors = e.data.errors;




             });

       

        // var request = {

        //     method: 'POST',
        //     url: '/info/store',
        //     data: formData,
        //     headers: {
        //         'Content-Type': undefined
        //     }
        // };

        // //window.alert(request.data.formdata);

        // $http(request)
        //     .then(function success(e) {
        //         $scope.files = e.data.files;
        //         $scope.errors = [];
        //         // clear uploaded file
        //         var fileElement = angular.element('#image_file');
        //         fileElement.value = '';
        //         alert("Data has been Added successfully!");
        //     }, function error(e) {
        //         $scope.errors = e.data.errors;
        //     });
    };

    $scope.setTheFiles = function ($files) {
        angular.forEach($files, function (value, key) {
            formData.append('image_file', value);
        });
    };

    $scope.deleteFile = function (index) {
        var conf = confirm("Do you really want to delete this file?");

        if (conf == true) {
            var request = {
                method: 'POST',
                url: '/delete/info',
                data: $scope.files[index]
            };

      //window.alert(request.data);
            $http(request)
                .then(function success(e) {
                    $scope.errors = [];

                    $scope.files.splice(index, 1);

                }, function error(e) {
                    $scope.errors = e.data.errors;
                });
        }
    };

}]);

app.directive('ngFiles', ['$parse', function ($parse) {

    function file_links(scope, element, attrs) {
        var onChange = $parse(attrs.ngFiles);
        element.on('change', function (event) {
            onChange(scope, {$files: event.target.files});
        });
    }

    return {
        link: file_links
    }
}]);