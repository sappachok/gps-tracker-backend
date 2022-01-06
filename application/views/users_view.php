<div id="page-wrapper">
    <div class="header">
        <h1 class="page-header">
           <center> บัญชีผู้ใช้งาน <small>Responsive tables</small></center>
        </h1>
        <ol class="breadcrumb">
            <li><a href="Dashboard">Home</a></li>
            <li class="active">Data</li>
        </ol>

    </div>

    <div class="text-right">
        <a href="<?php echo site_url("Newuser_api/index"); ?>"><button type="button" id="add_button" class="btn btn-info">เพิ่มผู้ใช้งาน</button></a>
    </div>
    <span id="success_message"></span>
    <div id="page-inner">

        <div class="row">
            <div class="col-md-12">
                <!-- Advanced Tables -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        บัญชีผู้ใช้งาน
                    </div>
                    <div class="panel-body">

                        <table id ="myTable" class="table table-striped table-bordered table-hover" style=" background-color:#ff4d59" >
                            <thead>
                                <tr>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <th></th>
                                </tr>
                                
                            </thead>
                            <tbody>
            
                            </tbody>
                        </table>   
                        
                    
                           


</div>
</div>





<div id="userModal" class="modal fade">
    <div class="modal-dialog">
        <form method="post" id="user_form">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Add User</h4>
                </div>
                <div class="modal-body">
                    <label>First Name</label>
                    <input type="text" name="fname" id="fname" class="form-control" />
                    <span id="fname_error" class="text-danger"></span>
                    <br />
                    <label>Last Name</label>
                      <input type="text" name="lname" id="lname" class="form-control" />
                    <span id="lname_error" class="text-danger"></span>
                    <br />
                    <label>Email</label>
                    <input type="email" name="email" id="email" class="form-control" />
                    <span id="email_error" class="text-danger"></span>
                    <br />
                    <label>Telephone Number</label>
                    <input type="text" name="telno" id="telno" class="form-control" />
                    <span id="telno_error" class="text-danger"></span>
                    <br />
                    <label>Current Password</label>
                    <input type="text" name="pwd" id="pwd" class="form-control" />
                    <span id="pwd_error" class="text-danger"></span>
                    <br />
                    <!--<label>New Password</label>
                    <input type="text" name="confirmpwd" id="confirmpwd" class="form-control" />
                    <span id="confirmpwd_error" class="text-danger"></span>
                    <br />
                    <label>Confirm New Password</label>
                    <input type="text" name="confirmpwd" id="confirmpwd" class="form-control" />
                    <span id="confirmpwd_error" class="text-danger"></span>
                    <br />-->
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="user_id" id="user_id" />
                    <input type="hidden" name="data_action" id="data_action" value="Insert" />
                    <input type="submit" name="action" id="action" class="btn btn-success" value="Add" />
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script type="text/javascript" language="javascript">
    $(document).ready(function() {

        function fetch_data() {
            $.ajax({
                url: "<?php echo base_url(); ?>users_api/action",
                method: "POST",
                data: {
                    data_action: 'fetch_all'
                },
                success: function(data) {
                    $('tbody').html(data);
                }
            });
        }

        fetch_data();

        $(document).on('submit', '#user_form', function(event) {
            event.preventDefault();
            $.ajax({
                url: "<?php echo base_url() . 'users_api/action' ?>",
                method: "POST",
                data: $(this).serialize(),
                dataType: "json",
                success: function(data) {
                    if (data.success) {
                        $('#user_form')[0].reset();
                        $('#userModal').modal('hide');
                        fetch_data();
                    }

                    if (data.error) {
                        $('#fname_error').html(data.fname_error);
                        $('#lname_error').html(data.lname_error);
                        $('#email_error').html(data.email_error);
                        $('#telno_error').html(data.telno_error);
                        $('#pwd_error').html(data.pwd_error);
                    }
                }
            })
        });

        $(document).on('click', '.edit', function() {
            var user_id = $(this).attr('id');
            $.ajax({
                url: "<?php echo base_url(); ?>users_api/action",
                method: "POST",
                data: {
                    user_id: user_id,
                    data_action: 'fetch_single'
                },
                dataType: "json",
                success: function(data) {
                    $('#userModal').modal('show');
                    $('#fname').val(data.fname);
                    $('#lname').val(data.lname);
                    $('#email').val(data.email);
                    $('#telno').val(data.telno);
                    $('#pwd').val(data.pwd);
                    $('.modal-title').text('Edit User');
                    $('#user_id').val(user_id);
                    $('#action').val('Edit');
                    $('#data_action').val('Edit');
                }
            })
        });

        $(document).on('click', '.delete', function() {
            var user_id = $(this).attr('id');
            if (confirm("Are you sure you want to delete this?")) {
                $.ajax({
                    url: "<?php echo base_url(); ?>users_api/action",
                    method: "POST",
                    data: {
                        user_id: user_id,
                        data_action: 'Delete'
                    },
                    dataType: "JSON",
                    success: function(data) {
                        location.reload();
                    }
                })
            }
        });

    });
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                        <script src="//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
                        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" />
                        <script >
                            $(document).ready( function () {
                                $('#myTable').DataTable();
                            } );
                        </script> 