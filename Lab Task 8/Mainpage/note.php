<?php
include "../mainpage/common.inc.php";

$noteName= $NoteID =$Text= "";
$noteNameErr = $NoteIDErr = $TextErr=$message="";
$nName = $nText=$nID="";
$username=$_SESSION['username'];
if($_SERVER["REQUEST_METHOD"]=="POST")
{
    //Refresh Button
    if(isset($_POST['REFRESH'])){
        header("Location: note.php");
    }
    //Push Button
    elseif(isset($_POST['PUSH'])){
        if(empty($_POST['noteName'])){
            $noteNameErr = "*Provide Note Name";
        }else{
            $noteName = mysqli_real_escape_string($conn, $_POST['noteName']);
        }if(empty($_POST['Text'])){
            $TextErr = "*Write something";
        }else{
            $Text = mysqli_real_escape_string($conn, $_POST['Text']);
        }
        if(!empty($_POST['noteName']) && !empty($_POST['Text']))
        {
            $sql = "INSERT INTO note(noteName,Text,username) VALUES('$noteName','$Text','$username');";
            mysqli_query($conn,$sql);
            $message = "*New Note Saved";
        }
    }
    //SEE button
    elseif(isset($_POST['SEE'])){
        if(empty($_POST['NoteID'])){
            $NoteIDErr = "*Provide Note ID";
        }else{
            $NoteID = mysqli_real_escape_string($conn, $_POST['NoteID']);
        }
        if(!empty($_POST['NoteID'])){
            $sql = "SELECT noteName,Text FROM note WHERE NoteID = $NoteID;";
            $result = mysqli_query($conn,$sql);
            while($row = mysqli_fetch_assoc($result)){
                $nName = $row['noteName'];
                $nText = $row['Text'];
                $nID = $NoteID;
            }
        }
    }
    //Update button
    elseif(isset($_POST['UPDATE'])){
        if(empty($_POST['noteName'])){
            $noteNameErr = "*Provide Note Name";
        }else{
            $noteName = mysqli_real_escape_string($conn, $_POST['noteName']);
        }if(empty($_POST['Text'])){
            $TextErr = "*Write something";
        }else{
            $Text = mysqli_real_escape_string($conn, $_POST['Text']);
        }
        if(empty($_POST['NoteID'])){
            $NoteIDErr = "*Provide Note ID";
        }else{
            $NoteID = mysqli_real_escape_string($conn, $_POST['NoteID']);
        }
        if(!empty($_POST['noteName']) && !empty($_POST['Text']) && !empty($_POST['NoteID']))
        {
            $sql = "UPDATE note SET noteName ='$noteName',Text='$Text' WHERE NoteID ='$NoteID';";
            mysqli_query($conn,$sql);
            $message = "*Updated Note";
        }
    }
    //Delete button
    elseif (isset($_POST['DELETE'])){
        if(empty($_POST['NoteID'])){
            $NoteIDErr = "*Provide Note ID";
        }else{
            $NoteID = mysqli_real_escape_string($conn, $_POST['NoteID']);
        }
        if(!empty($_POST['NoteID'])){
            $sql = "DELETE FROM note WHERE NoteID = $NoteID;";
            mysqli_query($conn,$sql);
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Note</title>
    <link rel="stylesheet" type="text/css" href="note.css">
    <script src="txtSave.js"></script>
</head>
<body>
    <div class="box">
        <h1>Note</h1>

        <form method="post">
            <input type="text" name="noteName" id="name" placeholder="Note Name" value="<?php echo $nName?>">
            
            <input type="Submit" name="PUSH" value="PUSH">
            <input style="margin-left: 80px;width: 20%;" type="text" value="<?php echo $nID?>" placeholder="Search by id" name="NoteID">
            <!-- <input type="hidden" name="NoteID" value=""> -->
            <input style="margin-left: 5px;width: 15%;" type="Submit" name="SEE" value="SEE"><br>
            <textarea placeholder="Write...." name="Text" id="notes" cols="46" rows="20"><?php echo $nText?></textarea><br>
            
            <br>
            <input type="submit" name="REFRESH" value="REFRESH">
            <input style="margin-left: 30px;" type="submit" name="PRINT" value="PRINT" onclick="return saveFile()">
            <br><br>
            <input type="submit" name="UPDATE" value="UPDATE" />
            <input style="margin-left: 30px;" type="submit" name="DELETE" value="DELETE"><br><br>
        </form>
        <span style="color:red;"><?php echo $noteNameErr?></span><br>
        <span style="color:red;"><?php echo $TextErr?></span><br>
        <span style="color:red;"><?php echo $NoteIDErr?></span><br>
        <span style="color:green;"><?php echo $message?></span><br>

        <div align="right" class="table">
            <table class="content-table">
                <thead>
                    <tr>
                        <th>Note Id</th>
                        <th>Note Name</th>
                        <th>Note Details</th>
                    </tr>
                </thead>
                <?php
                    $sql_table = "SELECT *FROM note WHERE username='$username';";
                    $result = mysqli_query($conn, $sql_table);
                    $rowCount = mysqli_num_rows($result);
                    if ($rowCount > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tbody class=tab id=tab>
                            <tr>
                            <td>" . $row['NoteID'] . "</td>
                            <td>" . $row['noteName'] . "</td>
                            <td>" . $row['Text'] . "</td>
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

</body>
</html>