<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>

        <div class="grid_10">
            <div class="box round first grid">
                <h2>Themes</h2>
               <div class="block copyblock"> 
<?php 

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $theme = mysqli_real_escape_string($db->link, $_POST['theme']);
            $query ="UPDATE tbl_them SET theme='$theme' WHERE id = '1'";
            $them = $db->update($query);
            if ($them) {
                echo "<span style='color:green; font-size:18px;'>Theme Update Success !!</span>";
            }else{
                 echo "<span style='red:green; font-size:18px;'>Theme Not Update !!</span>";
            }
        }
 ?>


        <?php 
            $query = "SELECT * FROM tbl_them WHERE id='1'";
            $them = $db->select($query);
            while ($result = $them->fetch_assoc()) {
       
        ?>
 <form action="" method="post">
    <table class="form">					
        <tr>
            <td>
                <input <?php if ($result['theme'] == 'default') { echo "checked";} ?> type="radio" name="theme" value="default" />Default
            </td>
        </tr>

        <tr>
            <td>
                <input <?php if ($result['theme'] == 'green') { echo "checked";} ?> type="radio" name="theme" value="green" />Green
            </td>
        </tr>

        <tr>
            <td>
                <input <?php if ($result['theme'] == 'red') { echo "checked";} ?> type="radio" name="theme" value="red" />Red
            </td>
        </tr>
		<tr> 
            <td>
                <input type="submit" name="submit" Value="Change" />
            </td>
        </tr>
    </table>
    </form>
                    <?php } ?>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>