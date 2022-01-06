<div id="page-wrapper">
    <div class="header">
        <h1 class="page-header">
            Forms Page <small>Best form elements.</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li><a href="#">Forms</a></li>
            <li class="active">Data</li>
        </ol>

    </div>
    <div id="page-inner">

        <div class="row">
            <div class="col-lg-12">
                <form method="post" id="user_form">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            เพิ่มบัญชีผู้ใช้งาน
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>First Name</label>
                                        <input type="text" name="fname" id="fname" class="form-control" placeholder="ชื่อ" />
                                        <span id="fname_error" class="text-danger"></span>
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" name="email" id="email" class="form-control" placeholder="อีเมล์" />
                                        <span id="email_error" class="text-danger"></span>
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" name="pwd" id="pwd" class="form-control" placeholder="รหัสผ่าน" />
                                        <span id="pwd_error" class="text-danger"></span>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Last Name</label>
                                        <input type="text" name="lname" id="lname" class="form-control" placeholder="นามสกุล" />
                                        <span id="lname_error" class="text-danger"></span>
                                    </div>
                                    <div class="form-group">
                                        <label>Telephone Number</label>
                                        <input type="text" name="telno" id="telno" class="form-control" placeholder="เบอร์ติดต่อ" />
                                        <span id="telno_error" class="text-danger"></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="role">Choose a car:</label>
                                        <select name="role" id="role">
                                            <option value="USER">User</option>
                                            <option value="ADMIN">Admin</option>
                                        </select>
                                    </div>

                                </div>

                                <!-- /.col-lg-6 (nested) -->
                            </div>
                            <div style="text-align: end; padding-right: 15px;">
                                <input type="hidden" name="user_id" id="user_id" />
                                <input type="hidden" name="data_action" id="data_action" value="Insert" />
                                <input type="submit" name="action" id="action" class="btn btn-success " value="Add" />

                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </form>
            </div>



        </div>
        <!-- /. PAGE INNER  -->
    </div>
    <!-- /. PAGE WRAPPER  -->
</div>


<script type="text/javascript" language="javascript">
    $(document).ready(function() {

        function fetch_data() {
            $.ajax({
                url: "<?php echo base_url(); ?>test_api/action",
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
                url: "<?php echo base_url() . 'newuser_api/action' ?>",
                method: "POST",
                data: $(this).serialize(),
                dataType: "json",
                success: function(data) {
                    if (data.success) {
                        $('#user_form')[0].reset();
                        fetch_data();
                        window.history.back();
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

    });
</script>