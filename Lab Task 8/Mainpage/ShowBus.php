<?php
include "../mainpage/common.inc.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.$i">
    <title>Student List</title>
    <link rel="stylesheet" type="text/css" href="ShowStudent.css">
    <script src="pdfPrint.js"></script>
    <script src="excelPrint.js"></script>
    <script src="jquery-3.5.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    <div class="table">
        <h1>Student List</h1>
        <input style="margin-top: 5px;margin-left: 14px;" name="PRINT" id="PRINT" onclick="savePDF()" type="submit" value="Export PDF">
        <input style="margin-top: 5px;margin-left: 14px;" type="submit" name="excel" onclick="exportToExcel('tblexportData', 'user-data')" value="Export Excel">
        <div class=tab1 id="table">
            <table class="content-table" id="tblexportData" border="1">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>studentId</th>
                        <th>name</th>
                        <th>email</th>
                        <th>mobile</th>
                        <th>cgpa</th>
                        <th>depertment</th>
                    </tr>
                </thead>
                <tbody id="response">

                </tbody>
            </table>
        </div>
        <hr>
    </div>
    <script>
        $(document).ready(function(){
            displaydata();
            function displaydata(){
                $.ajax({
                    url:'getdata.php',
                    type:'POST',
                    success:function(responsedata){
                        $('#response').html(responsedata);
                    }
                });
            }
        });  
    </script>
</body>
</html>
