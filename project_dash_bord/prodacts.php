<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./bootstrap-5.3.1-dist/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
        <div class="col-2 bg-dark">
            <?php include("./sideNav.php")?>
        </div>
        <div class="col-10">
            <?php include("./topIcon.php")?>
            <div class="row">
               <div class="mt-5">
               <button type="button" class="btn btn-primary col-2 mt-3 offset-1" data-bs-toggle="modal" data-bs-target="#exampleModal">
                  ADD ITEMS
                </button>   

                <table class="table mt-3">
                    <thead>
                        <tr>
                            <th>Product ID</th>
                            <th>Product Name</th>
                            <th>Product Price</th>
                            <th>Product Category</th>
                            <th>Product Costumer Type</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>blue trousers</td>
                            <td>500 KSH</td>
                            <td>Cloths</td>
                            <td>kids</td>
                        </tr>
                    </tbody>
                </table>
               </div>
            </div>
        </div>
        </div>
    </div>  
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">ADD PRODUCT ITEMS</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form">
                    <div class="form-group">
                        <label class="form-label" for="ProductName">Product Name</label>
                        <input class="form-control" type="text" name="ProductName" id="ProductName">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="ProductPrice">Product Price</label>
                        <input class="form-control" type="text" name="ProductPrice" id="ProductPrice">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="ProductCategory">Product Category</label>
                        <input class="form-control" type="text" name="ProductCategory" id="ProductCategory">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="ProductCostumerType">Product Costumer Type</label>
                        <input class="form-control" type="text" name="ProductCostumerType" id="ProductCostumerType">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save</button>
            </div>
            </div>
        </div>
        </div>
<script src="./bootstrap-5.3.1-dist/js/bootstrap.min.js"></script>
</body>
</html>