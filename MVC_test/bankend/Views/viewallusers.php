<?php
//  print_r($_SESSION['Userdata']);
if (!isset($_SESSION['Userdata'])) {
    header("location:login");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register page</title>
</head>

<body>

    <div class="container mt-2">
        <!-- <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a href="logout" class="btn btn-primary me-md-2">Logout</a>

        </div> -->
        <h3 class="text-center ">All Users List</h3>
        <table class="table table-success table-striped">
            <thead>
                <th>Sr.No</th>
                <th>UserName</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Gender</th>
                <th>Hobby</th>
                <th>Action</th>
            </thead>
            <tbody>
                <?php

                if (!empty($ViewUsers['Data'])) {
                    $i = 0;
                    foreach ($ViewUsers['Data'] as $key => $value) {
                        $i++ ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $value->username; ?></td>
                            <td><?php echo $value->email; ?></td>
                            <td><?php echo $value->phone; ?></td>
                            <td><?php echo $value->gender; ?></td>
                            <td><?php echo $value->hobby; ?></td>
                            <td>
                                <a href="edituser?userid=<?php echo $value->id; ?>" class="btn btn-primary me-md-2">Edit</a> &nbsp;&nbsp;
                                <a href="deleteuser?userid=<?php echo $value->id; ?>"class="btn btn-danger me-md-2" onclick="return Delete()">Delete</a>
                            </td>
                        </tr>
                    <?php   }
                } else {  ?>
                    <tr>
                        <td colspan="7" class="text-center">No Data Found</td>
                    </tr>
                <?php  }
                ?>
            </tbody>
        </table>
    </div>
    <script>
       function Delete() {
            return confirm('Are you Sure Want to Delete Data?');
        }
    </script>
</body>

</html>