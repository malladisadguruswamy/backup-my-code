<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>

    <!-- Bootstrap CSS File  -->
    <link rel="stylesheet" type="text/css" href="assests/css/bootstrap.min.css"/>
    <!-- Modal - Add New Record/User -->
    <div class="modal fade" id="add_new_record" tabindex="-1" aria-labelledby="add_new_record" aria-hidden="true">
      <div class="modal-dialog"  role="document">
            <div class="modal-content">
                <form id="form_data" enctype="multipart/form-data" method="post">
                <div class="modal-header">
                    
                    <h4 class="modal-title" id="myModalLabel">Add New Record</h4>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <label for="first_name">First Name</label>
                        <input type="text" id="first_name" name="first_name" placeholder="First Name" class="form-control"/>
                    </div>

                    <div class="form-group">
                        <label for="last_name">Last Name</label>
                        <input type="text" id="last_name" name="last_name" placeholder="Last Name" class="form-control"/>
                    </div>

                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input type="text" id="email" name="email" placeholder="Email Address" class="form-control"/>
                    </div>
                    <div class="form-group">
                    <label>Image file</label>
                    <input id="uploadImage" type="file" name="file" accept="image/*" name="image" />
                </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" onclick="addRecord()">Add Record</button>
                </div>
            </form>
            </div>
      </div>
    </div>
<!-- // Modal -->
<!-- Modal - Update User details -->
<div class="modal fade" id="update_user_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="form_data">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Update</h4>
            </div>
            <div class="modal-body">
                
                <div class="form-group">
                    <label for="update_first_name">First Name</label>
                    <input type="text" id="update_first_name" placeholder="First Name" class="form-control"/>
                </div>

                <div class="form-group">
                    <label for="update_last_name">Last Name</label>
                    <input type="text" id="update_last_name" placeholder="Last Name" class="form-control"/>
                </div>

                <div class="form-group">
                    <label for="update_email">Email Address</label>
                    <input type="text" id="update_email" placeholder="Email Address" class="form-control"/>
                </div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="UpdateUserDetails()" >Save Changes</button>
                <input type="hidden" id="hidden_user_id">
            </div>
            </form>
        </div>
    </div>
</div>
<!-- // Modal -->

</head>
<body>
<!-- Content Section -->
<div class="container">
    
    <div class="row">
        <div class="col-md-12">
            <div class="pull-right">
                <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#add_new_record">Add New Record</button>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h3>Records:</h3>

            <div class="records_content"></div>
        </div>
    </div>
</div>
<!-- /Content Section -->
<!-- Bootstrap Modals -->

<!-- Jquery JS file -->
<script type="text/javascript" src="assests/js/jquery-3.6.4.min.js"></script>

<!-- Bootstrap JS file -->
<script type="text/javascript" src="assests/js/bootstrap.bundle.min.js"></script>

<!-- Custom JS file -->
<script type="text/javascript" src="assests/js/script.js"></script>

</body>
</html>