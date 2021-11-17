<?php include 'db/dbConnection.php';
$packLocation = $_GET['location'];
$packGrade = $_GET['grade']; 
if (!isset($packGrade)){
    header('Location: list-pack.php');
}
if (!isset($packLocation)){
    header('Location: list-pack.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>SKYPOS</title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <link rel="icon" href="assets/img/icon.ico" type="image/x-icon" />

    <!-- Fonts and icons -->
    <script src="assets/js/plugin/webfont/webfont.min.js"></script>

    <!-- select2 -->
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css'>

    <script>
    WebFont.load({
        google: {
            "families": ["Lato:300,400,700,900"]
        },
        custom: {
            "families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands",
                "simple-line-icons"
            ],
            urls: ['assets/css/fonts.min.css']
        },
        active: function() {
            sessionStorage.fonts = true;
        }
    });
    </script>

    <style>
    .buttonmod {
        border: none;
        width: 100%;
        height: 30px;
        margin-left: 0px;
        padding: 0px;
        color: white;
        font-weight: bold;
        font-size: 15px;
        cursor: pointer;
        border-bottom: 0.3px solid white;
    }

    .buttonPay {
        border: none;
        width: 100%;
        height: 100%;
        margin-left: 0px;
        padding: 0px;
        color: white;
        font-weight: bold;
        font-size: 15px;
        cursor: pointer;
    }

    .loader {
        position: fixed;
        margin: auto;
        right: 5%;
        top: 13%;
        bottom: 87%;
        z-index: 1;
        border: 50px solid #f3f3f3;
        border-radius: 50%;
        border-top: 16px solid #3498db;
        width: 45px !important;
        height: 45px !important;
        -webkit-animation: spin 2s linear infinite;
        animation: spin 2s linear infinite;
    }

    @-webkit-keyframes spin {
        0% {
            -webkit-transform: rotate(0deg);
        }

        100% {
            -webkit-transform: rotate(360deg);
        }
    }

    @keyframes spin {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }

    #style-7::-webkit-scrollbar-track {
        -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
        background-color: #F5F5F5;
        border-radius: 10px;
    }

    #style-7::-webkit-scrollbar {
        width: 10px;
        background-color: #F5F5F5;
    }

    #style-7::-webkit-scrollbar-thumb {
        border-radius: 10px;
        background-image: -webkit-gradient(linear,
                left bottom,
                left top,
                color-stop(0.44, rgb(122, 153, 217)),
                color-stop(0.72, rgb(73, 125, 189)),
                color-stop(0.86, rgb(28, 58, 148)));
    }
    </style>

    <!-- CSS Files -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/atlantis.min.css">
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href="assets/css/demo.css">
    <link rel="stylesheet" href="assets/css/select2.min.css">
</head>

<body>
    <div style="display:none;" class="loader" id="loader"></div>
    <div class="wrapper sidebar_minimize">
        <!-- Navbar Header -->
        <?php include('header.php');?>
        <!-- End Navbar -->
        <!-- Sidebar -->
        <?php include('sidebar.php');?>
        <!-- End Sidebar -->
        <div class="main-panel">
            <div class="content">
                <div class="page-inner">
                    <div class="page-header">
                        <h4 class="page-title">Book List</h4>
                    </div>
                    <div class="row">
                        <div class="col-md-7">
                            <div class="card" id="style-7" style="height:75vh; overflow-y: scroll;">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            
                                            <div style="margin-top:3px">
                                                <select class="form-control js-select3" id="txt_stockPro"
                                                    onchange="addToTableOnSelectByProduct()">
                                                    <option disabled selected hidden>Select Product</option>

                                                    <?php
                                                    $sql = mysqli_query($connection,"SELECT * FROM products_tbl,stock_tbl,batch_tbl WHERE stock_tbl.pro_id = products_tbl.pro_id AND batch_tbl.batch_id = stock_tbl.batch_id AND batch_tbl.batch_location = $packLocation");
                                                    $row = mysqli_num_rows($sql);
                                                    while ($row = mysqli_fetch_array($sql)){
                                                        echo "<option value='".$row['stock_id']."'>".$row['pro_code']. " / " .$row['pro_name']."</option>" ;
                                                    }
                                                    ?>
                                                </select>
                                            </div>

                                            <div class="table-responsive">
                                                <table style="width:100%;"
                                                    class="table-head-bg-info  table-head-bg-primary mt-3"
                                                    id="proTable">
                                                    <thead style="height:15px;">
                                                        <tr style="">
                                                            <th style="text-align:center">#</th>
                                                            <th style="text-align:center">Product</th>
                                                            <th style="text-align:center">Price</th>
                                                            <th style="text-align:center">Qty</th>
                                                            <th style="text-align:center">Subtotal</th>
                                                            <th style="text-align:center"><i style="color:red;" class="fa fa-trash"></i></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card card-pricing">
                                        <div class="card-body">
                                            <ul class="specification-list">
                                                <li style="background-color:#D9EDF7 ;">
<!--                                                    <span style="font-size:15px; color:black; margin-left:10px;"-->
<!--                                                        class="name-specification" id="totItems">Total Items : </span>-->
                                                    <span style="font-size:15px; color:black; margin-right:10px;"
                                                        class="status-specification" id="totPrice">Total : </span>
                                                </li>
                                                <li style="background-color:#D9EDF7;display:none;">
                                                    <span style="font-size:15px; color:blue; margin-left:10px;"
                                                        class="name-specification">Discount :</span>
                                                    <span style="font-size:15px; color:black; margin-left:10px;"
                                                        class="name-specification" id="totDis"></span>
                                                </li>
                                                <li style="background-color:#DFF0D8;display:none;">
                                                    <span
                                                        style="font-size:20px; color:black; font-weight:bold; margin-left:10px;"
                                                        class="name-specification">Total Payable (Rs.)</span>
                                                    <span
                                                        style="font-size:20px; color:black; font-weight:bold; margin-right:10px;"
                                                        class="status-specification" id="totWithDisc"></span>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="card-footer ">
                                            <div class="row user-stats text-center">
                                                <div class="col-md-4" style="background-color:red; padding: 0px;height: 50px;">
                                                    <button data-toggle="modal" data-target="#paymentModal"
                                                        class="buttonPay" style="background-color:red;"
                                                        onclick="cancel()">Cancel</button>
                                                </div>
                                                <div class="col-md-4" style="background-color:white; padding: 0px;">
                                                   
                                                </div>
                                                <div class="col-md-4" style="background-color:#008C4C; padding: 0px;height: 50px;">
                                                    <button data-toggle="modal" data-target="#paymentModal"
                                                        class="buttonPay" style="background-color:#008C4C;"
                                                        onclick="save()">Save</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5" style="padding-left:1px;">
                            <div class="card card-post card-round"
                                style="height:75vh; overflow-y: scroll; overflow-x: hidden;" id="style-7">
                                <!-- <div class="card-header">
                                    
                                </div> -->
                                <div class="card-body">
                                    <div class="row" id="proList">

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- *************************************************************** -->
                    </div>
                </div>
            </div>
            <!-- footer -->
            <?php include('footer.php');?>
            <!-- End footer -->
        </div>
        <!-- edit qty Modal -->
        <div class="modal fade" id="editQtyModal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header no-bd">
                        <h4 class="modal-title">
                            <span class="fw-mediumbold">Edit QTY</span>
                        </h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <input type="text" hidden id="idQtysid">
                                    <label for="">QTY</label>
                                    <input type="number" min="1" class="form-control" id="editQtyid">
                                    <label id="editqtyli" style="color:red !important;font-size:12px !important;"></label>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer no-bd">
                            <button id="" class="btn btn-primary" onclick="editqtyOnModal()">Edit</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--End QTY Modal -->

        <!-- Custom template | don't include it in your project! -->
        <?php include('rightSidebar.php');?>
        <!-- End Custom template -->

        <!--   Core JS Files   -->

        <script src="assets/js/core/jquery.3.2.1.min.js"></script>
        <script src="assets/js/core/popper.min.js"></script>
        <script src="assets/js/core/bootstrap.min.js"></script>
        <!-- jQuery UI -->
        <script src="assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
        <script src="assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

        <!-- jQuery Scrollbar -->
        <script src="assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
        <!-- Atlantis JS -->
        <script src="assets/js/atlantis.min.js"></script>
        <!-- Atlantis DEMO methods, don't include it in your project! -->
        <script src="assets/js/setting-demo2.js"></script>

        <script src="assets/js/select2.min.js"></script>

        <!-- Sweet Alert -->
        <script src="assets/js/plugin/sweetalert/sweetalert.min.js"></script>

        <!-- Bootstrap Notify -->
        <script src="assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>

        <!-- select2 -->
        <script src='https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.full.js'></script>
        <script>
        $(document).ready(function() {
            $(".js-select2").select2();
        });

        $(document).ready(function() {
           loadPakData('<?php echo $packLocation ?>','<?php echo $packGrade ?>')


        });

        $(document).ready(function() {
            $(".js-select3").select2();
        });
        </script>
        <script type="text/javascript">
            function loadPakData(location,grade){
                obj = {
                    "grade": grade,
                    "location": location,
                    "Data_Status": "getData"
                }

                $.ajax({
                    url: "ajax/pakEdit.php",
                    type: "POST",
                    data: {
                        data: obj
                    },

                    success: function(data) {
                        var res = JSON.parse(data);

                        if (res.status === 'success') {
                            for (let i=0;i<res.dataArray.length;i++) {
                                tableData.push({
                                    id: res.dataArray[i].stock_id,
                                    code: res.dataArray[i].pro_code,
                                    proName: res.dataArray[i].pro_name,
                                    price: res.dataArray[i].price,
                                    qty: res.dataArray[i].packQty,
                                    totQty: res.dataArray[i].packQty,
                                });
                            }
                            console.log(tableData)
                            addRow();
                        }
                    }
                });
            }
        function getAllProduct() {
            loader.style.display = "block";
            xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && xmlhttp.status == 200) {
                    var respons = xmlhttp.responseText.trim();
                    document.getElementById('proList').innerHTML = this.responseText;
                    loader.style.display = "none";
                }
            }
            xmlhttp.open("GET", "ajax/get-all-product-pack.php?id=<?php echo $packLocation ?>", true);
            xmlhttp.send();
        }
        getAllProduct();
        </script>

        <script type="text/javascript">
        var tableData = [];
        var calObj = [];
        var loader = document.getElementById("loader");
        var newPrice = 0;
        var obj = [];
        var storObj = [];

        function cancel() {
            window.location.reload();
        }

        function clearAllStor() {
            localStorage.clear();
            window.location.reload();
        }

        function addToTable(stock_id) {

            loader.style.display = "block";
            $.ajax({
                url: 'ajax/get-stock-detail-pos.php?id=' + stock_id,
                type: 'get',
                dataType: 'JSON',
                success: function(response) {
                    var len = response.length;
                    if (response === undefined || len == 0) {
                        var content = {};
                        content.message = 'Pelase try again';
                        content.title = 'not success';
                        content.icon = 'fas fa-exclamation';

                        $.notify(content, {
                            type: "danger",
                            placement: {
                                from: "top",
                                align: "right"
                            },
                            time: 1000,
                            delay: 3500,
                        });
                        loader.style.display = "none";
                    } else {
                        loader.style.display = "none";

                        if (tableData.length === 0) {
                            if (response.qty >= 1) {
                                tableData.push({
                                    id: stock_id,
                                    code: response.code,
                                    proName: response.proName,
                                    price: response.price,
                                    qty: response.qty,
                                    totQty: 1
                                });
                            }
                        } else {
                            var added = false;
                            for (var i = 0; i < tableData.length; i++) {
                                if (tableData[i] !== undefined) {
                                    if (tableData[i].id === stock_id) {
                                        if (response.qty > tableData[i].totQty) {
                                            tableData[i].totQty = parseFloat(tableData[i].totQty) + 1;
                                        }
                                        added = true;
                                    }
                                }
                            }
                            if (added == false) {
                                if (response.qty >= 1) {
                                    tableData.push({
                                        id: stock_id,
                                        code: response.code,
                                        proName: response.proName,
                                        price: response.price,
                                        qty: response.qty,
                                        totQty: 1
                                    });
                                }
                            }
                        }
                        addRow();
                    }
                }
            });
        }

        function calculatePrice() {
            var exchangePrice = 0;
            var total = 0.00;
            var totWithDis = 0.00;
            var disc = 0.00;
            disc = 0;
            var totDisc = 0.00;
            var items = 0;
            var totItem = 0;
            for (var i = 0; i < tableData.length; i++) {
                if (tableData[i] !== undefined) {
                    items++;
                    totItem += tableData[i].totQty;
                    total += tableData[i].price * tableData[i].totQty;
                }
            }
            totDisc += (total * disc / 100);
            totWithDis += total - totDisc;
            totWithDis -= exchangePrice;

            calObj = {
                "total": total,
                "totWithDis": totWithDis,
                "disc": disc,
                "totDisc": totDisc,
                "items": items,
                "totItem": totItem
            }

            // document.getElementById("totItems").textContent = "Total Items : " + items + "(" + parseInt(totItem) + ")";
            document.getElementById("totPrice").textContent = "Total : " + total.toFixed(2);
            document.getElementById("totWithDisc").textContent = totWithDis.toFixed(2);
            document.getElementById("totDis").textContent = totDisc.toFixed(2);

            // console.log(calObj);
        }

        function payment() {
            document.getElementById("payItems").textContent = calObj.items + "(" + calObj.totItem + ")";
            document.getElementById("payPayble").textContent = calObj.totWithDis.toFixed(2);
            document.getElementById("payPaying").textContent = calObj.total.toFixed(2);
            document.getElementById("valuebtn").textContent = calObj.totWithDis.toFixed(2);
        }

        function addAmount(price) {
            if (price == 0) {
                newPrice = calObj.totWithDis;
            } else if (price == 1) {
                newPrice = 0;
            } else {
                newPrice += price;
            }
            document.getElementById("txtAmount").value = newPrice.toFixed(2);
            var balance = newPrice - calObj.totWithDis;
            document.getElementById("payBalance").textContent = balance.toFixed(2);
        }

        function calcBalance() {
            var balan = 0;
            balan = document.getElementById("txtAmount").value - calObj.totWithDis;
            document.getElementById("payBalance").textContent = balan.toFixed(2);
        }

        function calcDiscount() {
            calculatePrice();
            calcBalance();
            payment();
        }


        /**
         * Save pos bill
         */
        function save() {
            loader.style.display = "block";

            var proObj = [];

            for (var i = 0; i < tableData.length; i++) {
                if (tableData[i] !== undefined) {
                    proObj.push({
                        id: tableData[i].id,
                        code: tableData[i].code,
                        proName: tableData[i].proName,
                        price: tableData[i].price,
                        qty: tableData[i].qty,
                        totQty: tableData[i].totQty
                    });
                }
            }
             
            obj = {
                "grade": <?php echo $packGrade ?>,
                "location": <?php echo $packLocation ?>,
                "Data_Status": "editData",
                proObj
            }

            $.ajax({
                url: "ajax/pakEdit.php",
                type: "POST",
                data: {
                    data: obj
                },

                success: function(data) {
                    var res = JSON.parse(data);

                    if (res.status === 'success') {
                            alert("Success Update Book List...!");
                    }
location.reload()
                }

            });
        }

        function addRow() {
            var table = document.getElementById("proTable");
            for (var i = table.rows.length - 1; i > 0; i--) {
                table.deleteRow(i);
            }
            for (var i = 0; i < tableData.length; i++) {
                if (tableData[i] !== undefined) {
                    var x = document.getElementById("proTable").rows.length;

                    var tr_str = "<tr style='border-bottom:1pt; solid #D9EDF7;'>" +
                        "<td style='text-align:center'>" + x + "</td>" +
                        "<td style='text-align:center'><button title='Edit QTY' onClick='openEditQtyModal("+tableData[i].totQty+","+tableData[i].id+")' class='btn btn-primary btn-xs'>" + tableData[i].proName +
                        "(" + tableData[i].code + ")" + "</button></td>" + "<td style='text-align:center'>" + tableData[
                            i].price + ".00</td>" +
                        "<td style='text-align:center'>" + tableData[i].totQty + "</td>" + "<td style='text-align:center'>" + tableData[i].price *
                        tableData[i].totQty + ".00</td>" + "<td style='text-align:center'>" +
                        "<button onclick='removeRow(" + tableData[i].id + ")' type='button'" +
                        "data-toggle='tooltip' title=''" + "class='btn btn-link btn-danger'" +
                        "data-original-title='Remove'>" + "<i class='fa fa-trash'></i>" + "</button></td>" +
                        "</tr>";

                    $("#proTable tbody").append(tr_str)
                }
            }
            calculatePrice();
        }

        function removeRow(x) {
            var table = document.getElementById("proTable");
            for (var i = table.rows.length - 1; i > 0; i--) {
                table.deleteRow(i);
            }
            for (var i = 0; i < tableData.length; i++) {
                if (tableData[i] !== undefined) {
                    if (tableData[i].id == x) {
                        delete tableData[i];
                    }
                }
            }
            addRow();
        }

        function addToTableOnSelectByProduct() {

            var stock_id2 = document.getElementById("txt_stockPro").value;

            loader.style.display = "block";
            $.ajax({
                url: 'ajax/get-stock-detail-pos.php?id=' + stock_id2,
                type: 'get',
                dataType: 'JSON',
                success: function(response) {
                    var len = response.length;
                    if (response === undefined || len == 0) {
                        var content = {};
                        content.message = 'Please try again';
                        content.title = 'not success';
                        content.icon = 'fas fa-exclamation';

                        $.notify(content, {
                            type: "danger",
                            placement: {
                                from: "top",
                                align: "right"
                            },
                            time: 1000,
                            delay: 3500,
                        });
                        loader.style.display = "none";
                    } else {
                        loader.style.display = "none";

                        if (tableData.length === 0) {
                            if (response.qty >= 1) {
                                tableData.push({
                                    id: parseInt(stock_id2),
                                    code: response.code,
                                    proName: response.proName,
                                    price: response.price,
                                    qty: response.qty,
                                    totQty: 1,
                                    disc:0.0
                                });
                            }
                        } else {
                            var added = false;
                            for (var i = 0; i < tableData.length; i++) {
                                if (tableData[i] !== undefined) {
                                    if (tableData[i].id === stock_id2) {
                                        if (response.qty > tableData[i].totQty) {
                                            tableData[i].totQty = parseInt(tableData[i].totQty) + 1;
                                        }
                                        added = true;
                                    }
                                }
                            }
                            if (added == false) {
                                if (response.qty >= 1) {
                                    tableData.push({
                                        id: stock_id2,
                                        code: response.code,
                                        proName: response.proName,
                                        price: response.price,
                                        qty: response.qty,
                                        totQty: 1,
                                        disc:0.0
                                    });
                                }
                            }
                        }
                        addRow();
                    }
                }
            });
            
        }

        /**
        *get product By click the category 
        */
        function getProductByCateOnClickCate() {
            loader.style.display = "block";
            var categId = document.getElementById('txt_proCat').value;

                if (event.key === 'Enter') {

                    xmlhttp = new XMLHttpRequest();
                    xmlhttp.onreadystatechange = function() {
                        if (this.readyState == 4 && xmlhttp.status == 200) {
                            var respons = xmlhttp.responseText.trim();
                            document.getElementById('proList').innerHTML = this.responseText;
                            loader.style.display = "none";
                        }
                    }
                    xmlhttp.open("GET", "ajax/get-product-pos-category.php?cateid=" + categId, true);
                    xmlhttp.send();
                } else {

                    xmlhttp = new XMLHttpRequest();
                    xmlhttp.onreadystatechange = function() {
                        if (this.readyState == 4 && xmlhttp.status == 200) {
                            var respons = xmlhttp.responseText.trim();
                            document.getElementById('proList').innerHTML = this.responseText;
                            loader.style.display = "none";
                        }
                    }
                    xmlhttp.open("GET", "ajax/get-product-pos-category.php?cateid=" + categId, true);
                    xmlhttp.send();
                }
        }

        function openEditQtyModal(qtytotal,id) {
            document.getElementById('editqtyli').style.display = "none";
            $('#editQtyModal').modal('show');

            document.getElementById("editQtyid").value = qtytotal;

            document.getElementById("idQtysid").value = id;

            setTimeout(function() {
                document.getElementById("editQtyid").focus();
            }, 700);
        }

        function editqtyOnModal() {
            
            var editQty = document.getElementById("editQtyid").value;
            var eleId  = parseInt(document.getElementById("idQtysid").value);



            if (editQty==null || editQty=='') {

                document.getElementById('editqtyli').style.display = "block";
                document.getElementById('editqtyli').innerHTML = 'QTY Field Required';

                setTimeout(function() {
                    document.getElementById("editQtyid").focus();
                }, 700);
                
            } else {
                for (var i = 0; i < tableData.length; i++) {
                    if (tableData[i] !== undefined) {
                        // alert(parseInt(tableData[i].id) +"<--->"+ eleId)
                        if (parseInt(tableData[i].id) === parseInt(eleId)) {

                                tableData[i].totQty = parseFloat(editQty);
                                $('#editQtyModal').modal('hide');
                            
                        }
                    }
                    
                }
            }
            
            calculatePrice();
            addRow();
            
        }
        </script>
        
</body>

</html>