<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: sign_in.php");
}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Boostrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">

    <!-- Main CSS -->
    <link rel="stylesheet" href="assets/css/main.css">

    <!-- jQuerry -->
    <script src="assets/scripts/jquery-1.11.0.min.js"></script>

    <title>Cash Register</title>
</head>

<body>
    <div class="progress rounded-0">
        <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"><small>Looks so Good on the Outside, It'll Make You Feel Good Inside </small></div>
    </div>


    <nav class="navbar navbar-expand-lg sticky-top navbar-light bg-light">
        <div class="container-fluid">
        <a class="navbar-brand text-secondary" href="#"><img src="assets/image/nav-logo.png" height="28px" width="45px"> Online Mobile</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarScroll">
                <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">

                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#"><button type="button" class="btn btn-sm btn-success"><i class="bi bi-house-fill"></i> Home</button></a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#"><button type="button" class="btn btn-sm btn-outline-secondary"><i class="bi bi-currency-exchange"></i> Cash Register</button></a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="stock_management.php"><button type="button" class="btn btn-sm btn-outline-secondary"><i class="bi bi-hdd-fill"></i> Stock Management</button></a>
                    </li>


                </ul>

                <div class="dropdown px-2">
                    <a class="btn btn-sm btn-warning dropdown-toggle text-success" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                        Promo users
                    </a>

                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <li><a class="dropdown-item" href="promo_users_platinum.php"><small><i class="bi bi-card-heading"></i> Platinum</small></a></li>
                        <li><a class="dropdown-item" href="promo_users_gold.php"><small><i class="bi bi-card-heading"></i> Gold</small></a></li>
                        <li><a class="dropdown-item" href="promo_users_silver.php"><small><i class="bi bi-card-heading"></i> Silver</small></a></li>
                    </ul>
                </div>

                <div class="dropdown px-2">
                    <a class="btn btn-sm btn-success dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                        Payments
                    </a>

                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <li><a class="dropdown-item" href="#"><small><i class="bi bi-receipt-cutoff"></i> Cashier payments</small></a></li>
                        <li><a class="dropdown-item" href="#"><small><i class="bi bi-receipt-cutoff"></i> Stock payments</small></a></li>
                    </ul>
                </div>

                <div class="btn-group px-2" role="group" aria-label="Basic outlined example">
                    <button type="button" class="btn btn-sm btn-outline-secondary">Sellers</button>
                    <button type="button" class="btn btn-sm btn-outline-secondary">Employees</button>
                    <button type="button" class="btn btn-sm btn-outline-secondary">Discounts</button>
                </div>

                <div class="btn-group">
                    <button type="button" class="btn btn-sm btn-danger dropdown-toggle" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
                        <i class="bi bi-person-circle"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-lg-end">
                        <li><a class="dropdown-item" href="#">
                        <small>
                            <?php
                                include 'server/config/database_config.php';

                                $adminID = $_SESSION['user'];

                                $sql = "SELECT * FROM `admin_authentication` WHERE `email` LIKE '$adminID' ";
                                $result = $conn->query($sql);


                                if (!empty($result) && $result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<p>" .$row["name"]. "<br><small class='user-role'>" .$row["access_level"]. "</small></p><small>";
                                    }
                                }
                                $conn->close();
                            ?>
                            </a></li>

                        <li>
                            <small>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <a class="dropdown-item" href="#"><button type="button" class="btn btn-sm btn-outline-success"><i class="bi bi-person-fill"></i></button></a>
                                    </div>
                                    <div class="col-sm-9">
                                        <a class="dropdown-item" href="server/APIs/authentication/sign_out.php"><button type="button" class="btn btn-sm btn-success"><small>Sign out</small></button></a>
                                    </div>
                                </div>
                            </small>
                        </li>

                        <li><a class="dropdown-item" href="#">
                                <hr>
                            </a></li>
                    </ul>
                </div>

            </div>
        </div>
    </nav>
    <!-- NAV BAR END -->

    <br>

    <!-- CONTENT START -->
    <div class="container-fluid">
        <div class="row">
            
            <!-- Section 01 -->
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-header">
                        <b><i class="bi bi-cart-plus-fill"></i> Avaialble Items</b>
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="input-group input-group-sm flex-nowrap">
                                <span class="input-group-text" id="addon-wrapping"><i class="bi bi-search"></i></span>
                                <input type="text" class="form-control" placeholder="Search..." aria-label="Username" aria-describedby="addon-wrapping" onkeyup="searchProducts()" id="productsSearch">
                                <button class="btn btn-outline-success" type="button" id="button-addon2">Search</button>
                            </div>
                        </form>
                        <br>

                        <table class="table table-hover table-sm shadow-sm p-3 mb-5 bg-white rounded" id="productsTable">
                            <thead class="table-success text-success rounded">
                                <tr>
                                    <th scope="col">Product Name</th>
                                    <th scope="col">Code</th>
                                    <th scope="col">BP</th>
                                    
                                    <th scope="col">Qty</th>
                                    <th scope="col">Price</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody class="text-secondary">
                            <?php 
                                // Establish the Connection
                                include 'server/config/database_config.php';

                                $sql = "SELECT * from stock_items";
                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                    if (!$conn) {
                                    die('Technical Error...');
                                    } else {
                                    while ($row = $result->fetch_assoc()) {
                                        
                                        $sp = $row["selling_price"];
                                        $name = $row["product_name"];
                                        
                                        echo "<tr>";
                                        echo "<td>" . $row["product_name"] . "</td>";
                                        echo "<td>" . "<div class='col-xs-2'><input type='text' class='form-control form-control-sm' value='$name' disabled></div>" . "</td>";
                                        echo "<td>" . $row["buying_price"] . "</td>";
                                        echo "<td>" . "<div class='col-xs-2'><input type='number' class='form-control form-control-sm' value='1'></div>" . "</td>";
                                        echo "<td>" . "<div class='col-xs-2'><input type='number' class='form-control form-control-sm' value='$sp'></div>" . "</td>";
                                        echo "<td>" . "<button type='button' class='btn btn-sm btn-outline-success'><i class='bi bi-caret-right-square-fill'></i></button>" . "</td>";
                                        echo "<tr>";
                                    }
                                    }
                                } else {
                                    echo "<tr>";
                                    echo "<td colspan='3'>" . "<p>No products available<p>";
                                    echo "</td>";
                                    echo "</tr>";
                                }
                            ?>
                            </tbody>
                        </table>
                        <br>
                    </div>
                </div>
            </div>

            <!-- Section 02 -->
            <div class="col-sm-6">
            <div class="card">
                    <div class="card-header">
                        <b><i class="bi bi-receipt"></i> Create Bill</b>
                    </div>
                    <div class="card-body">

                    <div class="row">
                        <div class="col-sm-3">
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                <div class="input-group-text">Customer</div>
                                </div>
                                <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Name">
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="input-group mb-2">
                                <?php 
                                    $month = date('m');
                                    $day = date('d');
                                    $year = date('Y');
                                    $today = $year . '-' . $month . '-' . $day;
                                ?>

                                <div class="input-group-prepend">
                                <div class="input-group-text">Date</div>
                                </div>
                                <input type="date" class="form-control" id="inlineFormInputGroup" placeholder="Date" value="<?php echo $today; ?>">
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                <div class="input-group-text">Cashier</div>
                                </div>
                                <input type="text" class="form-control" id="inlineFormInputGroup" value="Pathum" disabled>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <button type="button" class="btn btn-outline-success"><i class="bi bi-file-plus-fill"></i> New</button>
                            <button type="button" class="btn btn-danger" onclick="calculateBalance()"><i class="bi bi-receipt"></i> Finalize</button>
                        </div>
                    </div>

                    <br>

                            <div class="row">
                                <div class="col-sm-4">
                                    <label for="inputProduct">Product Name</label>
                                    <input type="text" class="form-control" name='txtName' id="txtName" list="nameList">
                                    <datalist id="nameList">

                                    <?php 
                                        // Establish the Connection
                                        include 'server/config/database_config.php';

                                        $sql = "SELECT * from stock_items";
                                        $result = $conn->query($sql);

                                        while($row = mysqli_fetch_array($result)) { ?>
                                            <option value="<?php echo $row['product_name']; ?>"><?php echo $row['product_name']; ?></option>
                                        <?php } ?>
                                    ?>

                                    </datalist>
                                </div>

                                <div class="col-sm-4">
                                    <label for="inputQuantity">Quantity</label>
                                    <input type="number" class="form-control" name='txtQty' id="txtQty">
                                </div>

                                <div class="col-sm-4">
                                    <label for="inputPrice">Selling Price</label>
                                    <input type="number" class="form-control" name='txtPrice' id="txtPrice" list="priceList">
                                    <datalist id="priceList">
                                    <?php 
                                        // Establish the Connection
                                        include 'server/config/database_config.php';

                                        $sql = "SELECT * from stock_items";
                                        $result = $conn->query($sql);

                                        while($row = mysqli_fetch_array($result)) { ?>
                                            <option value="<?php echo $row['selling_price']; ?>"><?php echo $row['selling_price']; ?></option>
                                        <?php } ?>
                                    ?>
                                    </datalist>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-4">
                                    <label for="inputProduct">Status</label>
                                    <!--<input type="text" class="form-control" name='txtStatus' id="txtStatus">-->
                                    <select class="form-select" aria-label="Disabled select example" name='txtStatus' id="txtStatus">
                                        <option selected></option>
                                        <option value="Original">Original</option>
                                        <option value="Copy">Copy</option>
                                        <option value="Not Specify">Not Specify</option>
                                    </select>
                                </div>

                                <div class="col-sm-4">
                                    <label for="inputProduct">BP</label>
                                    <input type="number" class="form-control" value="0" name='txtBP' id="txtBP" disabled>
                                </div>

                                <div class="col-sm-4">
                                    <br>
                                    <button type="submit" id="updateButton" class="btn btn-success btn-block" onclick="productUpdate();"><i class="bi bi-cart-plus-fill"></i> Add product to Bill</button>
                                </div>
                            </div>

                    <hr>
                    <br>

                        <table class="table table-hover table-sm shadow-sm p-3 mb-5 bg-white rounded" id="productTable">
                            <thead class="table-success text-success rounded">
                                <tr>
                                    <th scope="col">Product</th>
                                    <th scope="col">Qty</th>
                                    <th scope="col">Per</th>
                                    
                                    <th scope="col">Total</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                        </table>

                        <br>
                        <div class="card">
                    <div class="card-header">
                        <b><i class="bi bi-cash-coin"></i> Bill Amount</b>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="server/APIs/cash_register/calculate_bill.php">
                        <div class="row">

                            <div class="col-sm-3">
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                    <div class="input-group-text">Discount</div>
                                    </div>
                                    <input type="number" class="form-control" id="txtDiscount" nama="txtDiscount" placeholder="Value" value="0">
                                </div>
                            </div>

                                <div class="col-sm-3">
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                        <div class="input-group-text">Total</div>
                                        </div>
                                        <input type="number" class="form-control" id="myText" name="myText" placeholder="Bill Total" disabled>
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                        <div class="input-group-text">Amount</div>
                                        </div>
                                        <input type="number" class="form-control" id="txtAmount" name="txtAmount" value="0">
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                        <div class="input-group-text">Balance</div>
                                        </div>
                                        <input type="number" class="form-control" id="txtBalance" name="txtBalance">
                                    </div>
                                </div>
                        </div>
                        
                        <br>
                        
                        <div class="row">
                            <button type="submit" class="btn btn-success btn-lg btn-block">PRINT BILL</button>
                        </div>
                        </form>

                        <br>
                        <span id="val"></span>

                    </div>
                </div>
                        
                    </div>
                </div>

            </div>
             
        </div>
    </div>

    <!-- CONTENT END -->


    <!-- FOOTRER START -->
    <div class="container-fluid">
        <nav class="navbar fixed-bottom navbar-light bg-light py-0">
            <div class="container-fluid">
                <p class="text-success"><small class="text-center"><i class="bi bi-robot"></i> Designed and developed by <a href="#">#</a></small></p>
            </div>
        </nav>
    </div>
    <!-- FOOTER END -->



    <!-- Optional JavaScript; choose one of the two! -->
    <script>
        // Search Products
        function searchProducts() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("productsSearch");
            filter = input.value.toUpperCase();
            table = document.getElementById("productsTable");
            tr = table.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[0];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }


        // Cash Register Functions
        function productUpdate() {
            if ($("#txtName").val() != null &&
                $("#txtName").val() != '') {
                // Add product to Table
                productAddToTable();

                // Clear form fields
                formClear();

                // Focus to product name field
                $("#txtName").focus();
            }
            }

            // Add product to <table>
            function productAddToTable() {
            // First check if a <tbody> tag exists, add one if not
            if ($("#productTable tbody").length == 0) {
                $("#productTable").append("<tbody></tbody>");
            }

            let qty = $("#txtQty").val();
            let price = $("#txtPrice").val();
            let total = qty * price;

            // Append product to the table
            $("#productTable tbody").append(
                "<tr>" +
                    "<td>" + $("#txtName").val() + "</td>" +
                    "<td>" + $("#txtQty").val() + "</td>" +
                    "<td>" + $("#txtPrice").val() + "</td>" +
                    "<td>" + total + "</td>" +
                    "<td>" + "<button type='button' " +
                      "onclick='productDelete(this);' " +
                      "class='btn btn-outline-danger btn-sm'>" +
                      "<span class='glyphicon glyphicon-remove' />"+ "<i class='bi bi-x-lg'></i>" +"</button>" + "</td>" +
                "</tr>"
                );
            }

            // Clear form fields
            function formClear() {
            $("#txtName").val("");
            $("#txtQty").val("");
            $("#txtPrice").val("");
            $("#txtStatus").val("");
            $("#txtBP").val("");

            // Delete product from <table>
            function productDelete(ctl) {
                $(ctl).parents("tr").remove();
            }


            //
            var table = document.getElementById("productTable"), sumVal = 0;
            
            for(var i = 1; i < table.rows.length; i++)
            {
                sumVal = sumVal + parseInt(table.rows[i].cells[3].innerHTML);
            }
            
            document.getElementById("val").innerHTML = + sumVal;
            document.getElementById("myText").value = + sumVal;
            console.log(sumVal);

            //Finalize the Bill
            function setTotal() {
                document.getElementById("myText").value = "112";
            }


            //Calculate Bill
            function calculateBalance(){
                amount = document.getElementById('txtAmount').value;
                total = document.getElementById('myText').value;
                discount = document.getElementById('txtDiscount').value;

                fullTotal = total - discount;
                balance = amount - total; 

                document.getElementById("txtBalance").value = + balance;
            }
        }

    </script>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>