let tableData=[];
let count=0;
let netTotal=0;
let newNetTotal=0;
let lastNewNetTotal=0;
function getItemsForOrder(orderId) {

    Obj = {
        "_METHOD_STATUS": "getItems",
        "orderId": orderId
    };
    $.ajax({
        url: "ajax/getExchangeProduct.php",
        type: "post",
        data: {
            data: Obj
        },

        success: function (data) {
            let res = JSON.parse(data);
            if (res.status === 'success') {
                for (let i=0;i<res.dataSet.length;i++){
                    newNetTotal=res.dataSet[i].amount;
                    tableData.push({
                        INDEX: count,
                        PRODUCT_NAME: res.dataSet[i].pro_name,
                        QTY: res.dataSet[i].totQty,
                        PRICE: res.dataSet[i].pro_price,
                        SUB_TOTAL: res.dataSet[i].totQty * res.dataSet[i].pro_price,
                        STOCK_ID  : res.dataSet[i].stock_id
                    });
                count++;
                }
                setDataInTable();
            }

        },
        error: function (xhr, status, error) {

        }
    });
}
var dataArray=[]
var currentTotal=0;
function setDataInTable() {

    var table = document.getElementById("productTable");
    for (var j = table.rows.length - 1; j > 0; j--) {

        table.deleteRow(j);
    }
    netTotal=0;
    for (let i=0;i<tableData.length;i++){
        netTotal=netTotal+tableData[i].QTY * tableData[i].PRICE;
        lastNewNetTotal=newNetTotal-netTotal;
        var tr_str = "<tr style='border-bottom:1pt; solid #D9EDF7;'>" +
            "<td style='text-align:center'>" + tableData[i].INDEX + "</td>" +
            "<td style='text-align:center'><button title='Edit QTY' onClick='openEditQtyModal("+tableData[i].QTY+","+tableData[i].INDEX+")' class='btn btn-primary btn-xs'>" + tableData[i].PRODUCT_NAME +
            "(" + tableData[i].code + ")" + "</button></td>" + "<td style='text-align:center'>" + tableData[i].PRICE + "</td>" +
            "<td style='text-align:center'>" + tableData[i].QTY + "</td>" + "<td style='text-align:center'>" + tableData[i].QTY * tableData[i].PRICE+"</td>" + "<td style='text-align:center'>" +
            "<button onclick='removeRow(" + tableData[i].INDEX + ")' type='button'" +
            "data-toggle='tooltip' title=''" + "class='btn btn-link btn-danger'" +
            "data-original-title='Remove'>" + "<i class='fa fa-trash'></i>" + "</button></td>" +
            "</tr>";

        $("#productTable tbody").append(tr_str)
    }
    $('#totWithDisc').html(netTotal);
    dataArray.push(netTotal);
    $('#lastNewNetTotal').html(dataArray[0]);
    currentTotal=dataArray[0];
}

function addToTableOnSelectByProduct() {
    let selectProduct=$("#txt_stockPro").val();
    let split = selectProduct.split(" / ");
    let price=split[4].split(":");
    tableData.push({
        INDEX: count,
        PRODUCT_NAME: split[2],
        QTY: 1,
        PRICE: price[1],
        SUB_TOTAL:1 * price[1],
        STOCK_ID  : split[0]
    });
    count++;
    setDataInTable();
}

function openEditQtyModal(qtytotal,id) {
    document.getElementById('editqtyli').style.display = "none";
    $('#editQtyModal').modal('show');

    document.getElementById("editQtyid").value = qtytotal;

    document.getElementById("idQtysid").value = id;



    $('#editQtyModal').modal('show');



    setTimeout(function() {
        document.getElementById("editQtyid").focus();
    }, 700);
}

function editqtyOnModal() {
    let getId=$("#idQtysid").val();
    let getQty=$("#editQtyid").val();

    for (let i=0;i<tableData.length;i++){

        if (parseInt(tableData[i].INDEX) === parseInt(getId) ){

            tableData[i].QTY=getQty;
        }
    }
    $('#editQtyModal').modal('hide');
    setDataInTable();
}

function removeRow(getId) {

    for (let i=0;i<tableData.length;i++){

        if (parseInt(tableData[i].INDEX) === parseInt(getId) ){
            let stockId=tableData[i].STOCK_ID;
            let qty=tableData[i].QTY;
            Obj = {
                "_METHOD_STATUS": "reAddItem",
                "qty": qty,
                "stockId": stockId
            };
            $.ajax({
                url: "ajax/getExchangeProduct.php",
                type: "post",
                data: {
                    data: Obj
                },
                success: function (data) {
                    let res = JSON.parse(data);
                    if (res.status === 'success') {
                        console.log(res.status);
                    }

                },
                error: function (xhr, status, error) {

                }
            });
            tableData.splice(i, 1);
        }
    }
    setDataInTable();
}

function payment(oId) {

     Obj = {
        "_METHOD_STATUS": "exChange",
        "orderId": oId,
        "totWithDisc": netTotal,
        "currentTotal": currentTotal,
        tableData
    };
    $.ajax({
        url: "ajax/getExchangeProduct.php",
        type: "post",
        data: {
            data: Obj
        },
        success: function (data) {
            let res = JSON.parse(data);
            if (res.status === 'success') {

                var SweetAlert2Demo = function() {

                    //== Demos
                    var initDemos = function() {
                        //== Sweetalert Demo 1
                        swal({
                            icon : "success",
                            title: 'Exchange  Success?',
                            type: 'success',
                            buttons:{
                                confirm: {
                                    text : 'OK',
                                    className : 'btn btn-success'
                                }
                            }
                        }).then((Delete) => {
                            if (Delete) {
                                window.location.replace("print-Exchangebill.php?id="+res.lastId+"&&oldId="+oId);
                            } else {
                                window.location.replace("index.php");
                            }
                        });
                    };

                    return {
                        //== Init
                        init: function() {
                            initDemos();
                        },
                    };
                }();
                console.log(res);
                //== Class Initialization
                jQuery(document).ready(function() {
                    SweetAlert2Demo.init();
                });

            }

        },
        error: function (xhr, status, error) {

        }
    });
}