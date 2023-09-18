<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<div class="container mt-5">
    <h3>Product Cart</h3>
    <div class="row">
        <table class="table table-bordered border-primary">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total Amount</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // echo "<pre>";
                // print_r($CartRes);
                // echo "</pre>";
                if (isset($CartRes['Data'])) {
                    foreach ($CartRes['Data'] as $key => $value) { ?>
                        <tr>
                            <td><?php echo $value->Title; ?></td>
                            <td><?php echo $value->Price; ?></td>
                            <td><?php echo $value->product_quantity; ?></td>
                            <td><?php echo $value->Amount; ?></td>
                            <td>
                                <a href="delete?id=<?php echo $value->Amount; ?>">Delete</a>
                                
                            </td>
                        </tr>


                    <?php }  ?>
                <?php } else { ?>


                <?php } ?>




            </tbody>
        </table>
    </div>
</div>