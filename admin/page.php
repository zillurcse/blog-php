<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php 
        if (!isset($_GET['pageid']) || $_GET['pageid'] == NULL) {
            echo "<script>window.location = 'index.php';</script>";
        }
        else{
            $id = $_GET['pageid'];
        }
?>
<style>
    .actiondel{ margin-left: 10px }
    .actiondel a{ border: 1px solid #333; color: #444; cursor: pointer; font-size: 20px; padding: 2px 10px; border-radius: 4px; font-weight: normal; }
</style>
<?php 
        if (isset($_GET['delpageid'])) {
            $delid = $_GET['delpageid'];
            $delquery = "DELETE FROM tbl_page WHERE id='$delid'";
            $deldata = $db->delete($delquery);
            if ($deldata) {
                echo "<span style='color:green; font-size:18px;'>Catagory Delete Success !!</span>";
            }else{
                echo "<span style='red:green; font-size:18px;'>Catagory Not Delete !!</span>";
            }
        }
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Edit Page</h2>
<?php 
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = mysqli_real_escape_string($db->link, $_POST['name']);
        $body = mysqli_real_escape_string($db->link, $_POST['body']);
        if (empty($name) AND empty($body)) 
        {
           echo "<span style='color:red; font-size:18px;'>Field must not be Empty !!</span>";
        }
        else
        {
             $query = "UPDATE tbl_page
                                    SET 
                                    name      = '$name',
                                    body = '$body'
                                    WHERE id='$id'";
                                    $updated_rows = $db->update($query);
                                    if ($updated_rows) 
                                    {
                                        echo "<span class='success'>Page Update Successfully. </span>";
                                    }
                                    else 
                                    {
                                        echo "<span class='error'>Page Not Update !</span>";
                                    }
        }


}
?>
        <div class="block">      
<?php  
    $query = "SELECT * FROM tbl_page WHERE id = '$id'";
    $page = $db->select($query);
    if ($page) {
        while ($result = $page->fetch_assoc()) {
?>         
         <form action="" method="post">
            <table class="form">
               
                <tr>
                    <td>
                        <label>Name</label>
                    </td>
                    <td>
                        <input type="text" name="name" value="<?php echo $result['name'] ?>" class="medium" />
                    </td>
                </tr>
				 
				 <tr>
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>Description</label>
                    </td>
                    <td>
                        <textarea class="tinymce" name="body">
                            <?php echo $result['body'] ?>
                        </textarea>
                    </td>
                </tr>

				<tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" Value="Update" />
                        <span class="actiondel"><a onclick="return confirm('Are you sure to Delete!')" href="?delpageid=<?php echo $result['id']; ?>">Delete</a></span>
                    </td>
                </tr>
            </table>
            </form>
        <?php } } ?>
        </div>
    </div>
</div>
<!-- Load TinyMCE -->
<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function () {
        setupTinyMCE();
        setDatePicker('date-picker');
        $('input[type="checkbox"]').fancybutton();
        $('input[type="radio"]').fancybutton();
    });
</script>
<!-- Load TinyMCE -->
<?php include 'inc/footer.php';?>


 