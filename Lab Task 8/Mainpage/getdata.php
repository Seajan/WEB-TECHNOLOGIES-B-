<?php
    include "../db/db_connect.inc.php";
    // $set= isset($_POST['search']);
    $sql = "SELECT *FROM student";
    $result = mysqli_query($conn,$sql);
    $rowCount = mysqli_num_rows($result);
    if ($rowCount > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            //JSON
            $JsonObj = json_encode($row);
            $res = json_decode($JsonObj,TRUE);
             echo "
             <tr>
                <td>" . $res['id'] . "</td>
                <td>" . $res['studentId'] . "</td>
                <td>" . $res['name'] . "</td>
                <td>" . $res['email'] . "</td> 
                <td>" . $res['mobile'] . "</td>
                <td>" . $res['cgpa'] . "</td>
                <td>" . $res['depertment'] . "</td>
            </tr>";
        }
         echo "</table>";
    } 
    else {
        echo $message = "No History!";
    }
                    
?>