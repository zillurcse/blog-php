<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php 
    if (!isset($_GET['catid']) || $_GET['catid'] == NULL) {
        echo "<script>window.location = 'catlist.php';</script>";
    }
    else{
        $id = $_GET['catid'];
    }
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Update Category</h2>
               <div class="block copyblock"> 
<?php 

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = $_POST['name'];
        $name = mysqli_real_escape_string($db->link, $name);
        if (empty($name)) {
            echo "<span style='color:red; font-size:18px;'>Field not must not be Empty !!</span>";
        }else{
            $query ="UPDATE tbl_catagory SET name='$name' WHERE id = '$id'";
            $updatecatagori = $db->update($query);
            if ($updatecatagori) {
                echo "<span style='color:green; font-size:18px;'>Catagory Update Success !!</span>";
            }else{
                 echo "<span style='red:green; font-size:18px;'>Catagory Not Update !!</span>";
            }
        }
    }
 ?>


        <?php 
            $query = "SELECT * FROM tbl_catagory WHERE id='$id' ORDER BY id DESC";
            $catagory = $db->select($query);
            while ($result = $catagory->fetch_assoc()) {
             
           

        ?>
                 <form action="" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" name="name" value="<?php echo $result['name']; ?> " class="medium" />
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Update" />
                            </td>
                        </tr>
                    </table>
                    </form>
                    <?php  } ?>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>