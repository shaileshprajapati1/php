
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
  <div class="top-products">
    <div class="container">
        <h3>Top Products</h3>
        <div class="sap_tabs">
            <div id="horizontalTab">
                <!-- <ul class="resp-tabs-list">
                    <a href="mobile">
                        <li class="resp-tab-item"><span>Mobile</span></li>
                    </a>
                    <li class="resp-tab-item"><span>Women</span></li>
                    <li class="resp-tab-item"><span>Handbags</span></li>
                     <li class="resp-tab-item"><span>Cosmetics</span></li>						
                </ul> -->
                <div class="clearfix"> </div>
                <div class="resp-tabs-container">
                    <div class="tab-1 resp-tab-content">
                        <div class="col-md-3 top-product-grids tp1 animated wow slideInUp" data-wow-delay=".5s">
                            <a href="mobile">
                                <div class="product-img">
                                    <img src="<?php echo $this->baseURL; ?>mobile/iphone.jpg" width="100px" alt="" />
                                    <div class="p-mask">
                                        <form action="#" method="post">
                                            <input type="hidden" name="Title" value="Iphone" />
                                            <input type="hidden" name="Price" value="59900" />
                                            <input type="hidden" name="CategoryID" value="mobile" />
                                            <input type="hidden" name="Images" value="defult.jpg" />
                                            <button type="submit" name="addphone" class="w3ls-cart pw3ls-cart"><i class="fa fa-cart-plus" aria-hidden="true"></i> Add to cart</button>
                                        </form>
                                    </div>
                                </div>
                            </a>
                            <!-- <i class="fa fa-star yellow-star" aria-hidden="true"></i>
							<i class="fa fa-star yellow-star" aria-hidden="true"></i>
							<i class="fa fa-star yellow-star" aria-hidden="true"></i>
							<i class="fa fa-star gray-star" aria-hidden="true"></i>
							<i class="fa fa-star gray-star" aria-hidden="true"></i> -->
                            <h4>Apple Phone</h4>
                            <h5>59900 <span>Rs</span></h5>
                        </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>

