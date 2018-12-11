
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Info file for Uploading data</title>
 
    {{-- Application CSS File --}}
    <link rel="stylesheet" href="css/app.css">
 
    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body ng-app="MyInfo">
 
<div ng-controller="MyInfoController">
 
    <div class="container">
        <div class="row">
           <div class="col-md-6 col-md-offset-3">
                <h2 class="">Info file for Uploading data</h2>
            </div>
        </div>
 
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="form-group">
                    <label for="files">Firstname</label>
                    <input type="text" ng-model="task.firstname" id="firstname"  class="form-control">
                </div>

                <div class="form-group">
                <label for="files">Lastname</label>
                <input type="text" ng-model="task.lastname"  id="lastname"  class="form-control">
                </div>

                <div class="form-group">
                   <label for="files">Your profile</label>
                  <textarea ng-model="task.profile" id="profile" class="form-control"></textarea>
                 </div>

                
                <ul class="alert alert-danger" ng-if="errors.length > 0">
                    <li ng-repeat="error in errors">
                        @{{ error }}
                    </li>
                </ul>
 
                <div class="form-group">
                    <button ng-click="submitData()" class="btn btn-primary">Submit Data</button>
                </div>
            </div>
        </div>
 
        <div class="row">
            <div class="col-md-12">
                <h4>Uploaded Files</h4>
                <table ng-if="files.length > 0" class="table table-bordered table-striped">
                    <tr>
                        <th>No.</th>
                        <th>Firstname</th>
                        <th>Lastname</th>
                        <th>Profile</th>
                        <th>Created At</th>
                        <th>Delete</th>
                    </tr>
                    <tr ng-repeat="file in files">
                        <td>@{{ $index + 1 }}</td>
                        <td>@{{ file.info_firstname }}</td>
                        <td>@{{ file.info_lastname }}</td>
                        <td>@{{ file.info_profile }}</td>
                        <th>
                            @{{ file.created_at }}
                        </th>
                        <td>
                            <button ng-click="deleteFile($index)" class="btn btn-danger">Delete File</button>
                        </td>
                    </tr>
                </table>
                <div class="alert alert-success" ng-if="files.length == 0">
                    Files not found, please upload to test the demo application.
                </div>
            </div>
        </div>
    </div>
 
</div>
 
{{-- Application JS Files --}}
<script src="js/app.js"></script>
<script src="js/angular.min.js"></script>
<script src="js/myinfo.js"></script>

</body>
</html>