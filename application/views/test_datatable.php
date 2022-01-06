<div id="page-wrapper">
    <div class="header">
        <h1 class="page-header">
           <center> พิกัดผู้ใช้งาน<small>Responsive tables</small></center>
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

                    <?php
        include('connection.php');  
        $sql = "SELECT u.id,u.fname,u.lname,u.email,u.telno,u.role,t.time,t.date,t.lat,t.lng FROM users as u INNER JOIN location as t ON u.id = t.users_id; " or die("Error:" . mysqli_error()); 
        $result = $con->query($sql);
        $arr_uers = [];
        if ($result->num_rows > 0){
            $arr_uers = $result->fetch_all(MYSQLI_ASSOC);
        }
    ?>
    <table id="myTable" class="display" style=" background-color:#ff4d59"  >
        <thead>
            <th>ID</th>
            <th>ชื่อ</th>
            <th>นามสกุล</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Role</th>
            <th>time</th>
            <th>date</th>
            <th>latitude</th>
            <th>longitude</th>
        </thead>
        <tbody>
            <?php if(!empty($arr_uers)){ ?>
                <?php foreach($arr_uers as $user){ ?>
                    <tr>
                        <td><?php echo $user["id"]?></td>
                        <td><?php echo $user["fname"]?></td>
                        <td><?php echo $user["lname"]?></td>
                        <td><?php echo $user["email"]?></td>
                        <td><?php echo $user["telno"]?></td>
                        <td><?php echo $user["role"]?></td>
                        <td><?php echo $user["time"]?></td>
                        <td><?php echo $user["date"]?></td>
                        <td><?php echo $user["lat"]?></td>
                        <td><?php echo $user["lng"]?></td>
                    </tr>
                <?php } ?>
            <?php } ?>
        </tbody>
    </table>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" />
    <script >
        $(document).ready( function () {
            $('#myTable').DataTable();
        } );
    </script>
</body>
</html>
                    
                           


</div>
</div>
