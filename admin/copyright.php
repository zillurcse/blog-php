﻿<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Update Copyright Text</h2>
<?php  
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $note = $fm->validation($_POST['note']);

    $note = mysqli_real_escape_string($db->link,$note);
    if (empty($note)) {
            echo "<span style='color:red; font-size:18px;'>Field must not be Empty !!</span>";
        }else{
            $query = "UPDATE tbl_footer
                SET 
                note = '$note'
                WHERE id='1'";
                $updated_rows = $db->update($query);
                if ($updated_rows) {
                    echo "<span class='success'>Data Update Successfully. </span>";
                }else {
                    echo "<span class='error'>Data Not Update !</span>";
                }
        }
}
    
?>

        <div class="block copyblock"> 
<?php  
/*Copy right*/
    $query = "SELECT * FROM tbl_footer WHERE id='1'";
    $Copyright = $db->select($query);
    if ($Copyright) {
    while ($result = $Copyright->fetch_assoc()) {

?> 
         <form action="" method="post">
            <table class="form">					
                <tr>
                    <td>
                        <input type="text" value="<?php echo $result['note'] ?>" name="note" class="large" />
                    </td>
                </tr>
				
				 <tr> 
                    <td>
                        <input type="submit" name="submit" Value="Update" />
                    </td>
                </tr>
            </table>
            </form>
        <?php } } ?>
        </div>
    </div>
</div>
<?php include 'inc/footer.php';?>