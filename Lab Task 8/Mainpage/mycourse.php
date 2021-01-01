<?php
include "../mainpage/common.inc.php";
$username = $_SESSION['username'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.$i">
    <title>Course List</title>
    <link rel="stylesheet" type="text/css" href="mycourse.css">
</head>
<body>
    <div class="table">
        <h1>My Course</h1>
        <div class=tab1 id="table">
            <table class="content-table" id="tblexportData" border="1">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>CourseId</th>
                        <th>Course Name</th>
                        <th>Section</th>
                    </tr>
                </thead>
                <?php
                    $sql_table = "SELECT *FROM course WHERE assigned='$username';";
                    $result = mysqli_query($conn, $sql_table);
                    $rowCount = mysqli_num_rows($result);
                    if ($rowCount > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tbody>
                            <tr>
                            <td>" . $row['id'] . "</td>
                            <td>" . $row['courseId'] . "</td>
                            <td>" . $row['courseName'] . "</td>
                            <td>" . $row['section'] . "</td>
                            </tr>
                            </tbody>";
                        }
                        echo "</table>";
                    } else {
                        echo $message = "No History!";
                    }
                ?>
                
            </table>
        </div>
        <hr>
    </div>
</body>
</html>
