<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <div class="row">
                <div class="col-10">
                    <h1 class="mt-4"><i class="fa-solid fa-users"></i>All Users</h1>
                </div>
                <div class="col-2">
                    <h1 class="mt-4"><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Add User</button></h1>
                </div>
            </div>

            <!-- <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Dashboard</li>
            </ol> -->
            <!-- <div class="row">
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-primary text-white mb-4">
                        <div class="card-body">Primary Card</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="#">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-warning text-white mb-4">
                        <div class="card-body">Warning Card</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="#">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-success text-white mb-4">
                        <div class="card-body">Success Card</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="#">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-danger text-white mb-4">
                        <div class="card-body">Danger Card</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="#">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
            </div> -->
            <!-- <div class="row">
                <div class="col-xl-6">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-chart-area me-1"></i>
                            Area Chart Example
                        </div>
                        <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-chart-bar me-1"></i>
                            Bar Chart Example
                        </div>
                        <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
                    </div>
                </div>
            </div> -->
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Users table
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>username</th>
                                <th>fullname</th>
                                <th>email </th>
                                <th>phone</th>
                                <th>dob</th>
                                <th>Images</th>
                                <th>action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>id</th>
                                <th>username</th>
                                <th>fullname</th>
                                <th>email </th>
                                <th>phone</th>
                                <th>dob</th>
                                <th>Images</th>
                                <th>action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php
                            $i = 0;
                            foreach ($Allusers['Data'] as $key => $value) {
                                $i++; ?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $value->username; ?></td>
                                    <td><?php echo $value->fullname; ?></td>
                                    <td><?php echo $value->email; ?></td>
                                    <td><?php echo $value->phone; ?></td>
                                    <td><?php echo $value->dob; ?></td>
                                    <td>
                                       <img src="uploads/<?php echo $value->profile_pic; ?>" width="100px" height="100px" alt=""> </td>

                                    <td>
                                        <?php if($value->role_id == 2) { ?>
                                            <a href="eidituser?userid=<?php echo $value->id; ?>">Edit</a>
                                            <a href="deleteuser?userid=<?php echo $value->id; ?>">Delete</a>

                                        <?php    } ?>
                                       
                                    </td>

                                </tr>
                            <?php }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Add User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="#" method="post">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group first">
                                    <label for="fname">First Name</label>
                                    <input type="text" class="form-control" placeholder="Enter FirstName" name="fname" id="fname" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group first">
                                    <label for="lname">Last Name</label>
                                    <input type="text" class="form-control" placeholder="Enter LastName" name="lname" id="lname" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group first">
                                    <label for="username">username</label>
                                    <input type="text" class="form-control" placeholder="Enter username " name="username" id="username" required>
                                </div>
                            </div>
                            <!-- <div class="row"> -->
                            <div class="col-md-12">
                                <div class="form-group first">
                                    <label for="email">Email Address</label>
                                    <input type="email" class="form-control" placeholder="Enter Email Id" name="email" id="email" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group first">
                                    <label for="Phone">Phone Number</label>
                                    <input type="text" class="form-control" placeholder="Enter PhoneNo" name="phone" id="phone" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group first">
                                    <label for="dob">DOB</label>
                                    <input type="date" class="form-control" placeholder="01-01-0000" name="dob" id="dob" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">

                                <div class="form-group last mb-3">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" placeholder="Your Password" name="password" id="password" required>
                                </div>
                            </div>
                            <div class="col-md-6">

                                <div class="form-group last mb-3">
                                    <label for="re-password">Re-type Password</label>
                                    <input type="password" class="form-control" placeholder="Your Password" name="re-password" id="re-password" required>
                                </div>
                            </div>
                        </div>


                        <div class="d-flex mb-5 mt-4 align-items-center">
                            <div class="d-flex align-items-center">
                                <input type="checkbox" id="chk" checked="checked" />
                                <label for="chk" class="control control--checkbox mb-0"><span class="caption">Creating an account means you're okay with our <a href="#">Terms and Conditions</a> and our <a href="#">Privacy Policy</a>.</span>

                                    <div class="control__indicator"></div>
                                </label>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" name="Adduser" class="btn btn-primary">Save</button>
                            <button type="reset" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>