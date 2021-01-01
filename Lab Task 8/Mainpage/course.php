<?php
include "../mainpage/common.inc.php";
$username = $_SESSION['username'];
$sId =$studentId=$name=$Ssection=$message=$course= "";
$id=$Sname=$section=$course1=$sid="";
$sIdErr=$sId1Err=$courseErr="";
if($_SERVER["REQUEST_METHOD"]=="POST"){
    
    if(isset($_POST['REFRESH'])){
        header("Location: course.php");
    }
    //search button
    elseif(isset($_POST['search'])){
        if(empty($_POST['sId'])){
            $sIdErr = "*Provide Search ID";
        }else{
            $sId = mysqli_real_escape_string($conn, $_POST['sId']);
        }
        if(!empty($_POST['sId'])){
            $sql = "SELECT studentId,name,section FROM student WHERE id='$sId';";
            $result = mysqli_query($conn,$sql);
            while($row = mysqli_fetch_assoc($result)){
                $studentId = $row['studentId'];
                $name = $row['name'];
                $Ssection = $row['section'];
                
            }
        }
    }
    //insert button
    elseif(isset($_POST['insert'])){
        if(empty($_POST['course'])){
            $courseErr = "*Provide Course";
        }else{
            $course = mysqli_real_escape_string($conn, $_POST['course']);
        }
        if(!empty($_POST['id'])){
            $id = mysqli_real_escape_string($conn, $_POST['id']);
        }if(!empty($_POST['Sname'])){
            $Sname = mysqli_real_escape_string($conn, $_POST['Sname']);
        }if(!empty($_POST['section'])){
            $section = mysqli_real_escape_string($conn, $_POST['section']);
        }
        if(!empty($_POST['course']))
        {
            $sql = "INSERT INTO studentcourse(studentId,name,courseName,section,lecturerName) VALUES('$id','$Sname','$course','$section','$username');";
            mysqli_query($conn,$sql);
            $message = "*Course Saved";
        }
    }
    //search
    elseif(isset($_POST['search1'])){
        if(empty($_POST['sId1'])){
            $sIdErr = "*Provide Search ID";
        }else{
            $sId1 = mysqli_real_escape_string($conn, $_POST['sId1']);
        }
        if(!empty($_POST['sId1'])){
            $sql = "SELECT studentId,name,courseName,section FROM studentcourse WHERE id='$sId1';";
            $result = mysqli_query($conn,$sql);
            while($row = mysqli_fetch_assoc($result)){
                $studentId = $row['studentId'];
                $name = $row['name'];
                $course1 = $row['courseName'];
                $Ssection = $row['section'];
                $sid = $sId1;
            }
        }
    }
    //update
    elseif(isset($_POST['update'])){
        if(empty($_POST['sId1'])){
            $sId1Err = "*Provide Search ID";
        }else{
            $sId1 = mysqli_real_escape_string($conn, $_POST['sId1']);
        }
        if(empty($_POST['course'])){
            $courseErr = "*Provide Course";
        }else{
            $course = mysqli_real_escape_string($conn, $_POST['course']);
        }
        if(!empty($_POST['sId1']) && !empty($_POST['course']) )
        {
            $sql = "UPDATE studentcourse SET courseName='$course' WHERE id ='$sId1';";
            mysqli_query($conn,$sql);
            $message = "*Updated Course";
        }
    }
    //delete button
    elseif (isset($_POST['delete'])){
        if(empty($_POST['sId1'])){
            $sId1Err = "*Provide Note ID";
        }else{
            $sId1 = mysqli_real_escape_string($conn, $_POST['sId1']);
        }
        if(!empty($_POST['sId1'])){
            $sql = "DELETE FROM studentcourse WHERE id = $sId1;";
            mysqli_query($conn,$sql);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.$i">
    <title>Enroll Student</title>
    <link rel="stylesheet" type="text/css" href="grade.css">
    <script src="pdfPrint.js"></script>
    <script src="excelPrint.js"></script>
</head>
<body>
    <div class="table">
        <h1>Course Enroll Student</h1>
        <div class="box">
        <h3>Student Info</h3>
            <div>
                <table class="content-table" id="tblexportData" border="1">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>studentId</th>
                            <th>name</th>
                            <th>Depertment</th>
                        </tr>
                    </thead>
                    <?php
                    $section="";
                    $sql_s = "SELECT *FROM course WHERE assigned='$username';";
                    $result = mysqli_query($conn,$sql_s);
                    while($row = mysqli_fetch_assoc($result)){
                        $section = $row['section'];
                    }
                    $sql_table = "SELECT *FROM student WHERE section='$section';";
                    $result = mysqli_query($conn, $sql_table);
                    $rowCount = mysqli_num_rows($result);
                    if ($rowCount > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tbody>
                            <tr>
                            <td>" . $row['id'] . "</td>
                            <td>" . $row['studentId'] . "</td>
                            <td>" . $row['name'] . "</td>
                            <td>" . $row['depertment'] . "</td>
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
        </div>
        <div class="box1">
            <h3>Course Info</h3>
            <div class=tab1 id="table">
                <table class="content-table" id="tblexportData" border="1">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>studentId</th>
                            <th>name</th>
                            <th>Course Name</th>
                        </tr>
                    </thead>
                    <?php
                    $sql_table = "SELECT *FROM studentcourse WHERE lecturerName='$username';";
                    $result = mysqli_query($conn, $sql_table);
                    $rowCount = mysqli_num_rows($result);
                    if ($rowCount > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tbody>
                            <tr>
                            <td>" . $row['id'] . "</td>
                            <td>" . $row['studentId'] . "</td>
                            <td>" . $row['name'] . "</td>
                            <td>" . $row['courseName'] . "</td>
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
        </div>
        <hr>
        <form method="post">
            <input style="margin-top:330px;margin-left:150px;width:10%;" type="text" name="sId" placeholder="search by Id">
            <input type="submit" value="Search" name="search">
            <input style="margin-top:330px;margin-left:240px;width:10%;" type="text" name="sId1" value="<?php echo $sid ?>" placeholder="search by Id">
            <input type="submit" value="Search" name="search1"><br>
            <input style="margin-left:30px;width:15%;" type="text" placeholder="StudentID" name="id" value="<?php echo $studentId ?>" readonly>
            <input style="margin-left:2px;width:15%;" type="text" name="Sname" placeholder="Name" value="<?php echo $name ?>" readonly>
            <input style="margin-left:2px;width:15%;" type="text" name="section" placeholder="Section" value="<?php echo $Ssection ?>" readonly>
            <input style="margin-left:2px;width:15%;" type="text" name="course" value="<?php echo $course1 ?>" placeholder="Enter course">
            <input style="margin-left:2px;" type="submit" name="insert" value="Insert">
            <input style="margin-left:2px;" type="submit" name="update" value="Update">
            <input style="margin-left:2px;" type="submit" name="delete" value="Delete"><br>
            <input style="margin-left:300px;" name="PRINT" id="PRINT" onclick="savePDF()" type="submit" value="Export PDF">
            <input style="margin-left:2px;" type="submit" name="excel" onclick="exportToExcel('tblexportData', 'user-data')" value="Export Excel">
            <input style="margin-left:2px;" type="submit" name="REFRESH" value="Refresh">
            <span style="color:red;"><?php echo $sIdErr ?></span>
            <span style="color:red;"><?php echo $sId1Err ?></span>
            <span style="color:red;"><?php echo $courseErr ?></span>
            <span style="color:green;"><?php echo $message ?></span>
        </form>
    </div>
    
</body>
</html>