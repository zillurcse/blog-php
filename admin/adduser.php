<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>

<?php 
    if (!Session::get('userRole') == '0') { 
            echo "<script>window.location = 'index.php';</script>";
}
?>

        <div class="grid_10">
            <div class="box round first grid">
                <h2>Add New User</h2>
               <div class="block copyblock"> 
<?php 

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $userName = $fm->validation($_POST['userName']);
        $password = $fm->validation(md5($_POST['password']));
        $email = $fm->validation($_POST['email']);
        $role = $fm->validation($_POST['role']);
        

        $userName = mysqli_real_escape_string($db->link, $userName);
        $password = mysqli_real_escape_string($db->link, $password);
        $email    = mysqli_real_escape_string($db->link, $email);
        $role     = mysqli_real_escape_string($db->link, $role);


        if (empty($userName) || empty($password) || empty($role) || empty($email)) {
            echo "<span style='color:red; font-size:18px;'>Field not must not be Empty !!</span>";
            
        }else{
                $mailquery    = "SELECT * FROM tbl_user WHERE email='$email' LIMIT 1";
                $mailcheck = $db->select($mailquery );
                if ($mailcheck != false) {
                    echo "<span style='color:red; font-size:18px;'>Email Already Exist!!</span>";
                }

            else
            {
               $query ="INSERT INTO tbl_user (userName, password,email, role) VALUES ('$userName','$password','$email', '$role')";
                $catInsert = $db->insert($query);
                if ($catInsert) 
                {
                    echo "<span style='color:green; font-size:18px;'>User Created successfully !!</span>";
                }
                else
                {
                     echo "<span style='red:green; font-size:18px;'>User Not Created !!</span>";
                } 
                
            }
        }
    }
 ?>
                 <form action="" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <lavel>User Name</lavel>
                            </td>
                            <td>
                                <input type="text" name="userName" placeholder="Enter User  Name..." class="medium" />
                            </td>
                        </tr>
                        
                        <tr>
                            <td>
                                <lavel>Password</lavel>
                            </td>
                            <td>
                                <input type="text" name="password" placeholder="Enter Password..." class="medium" />
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <lavel>Email</lavel>
                            </td>
                            <td>
                                <input type="text" name="email" placeholder="Enter valid email address..." class="medium" />
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <lavel>User Roll</lavel>
                            </td>
                            <td>
                                <select name="role" id="select">
                                    <option>Select user Role</option>
                                    <option value="0">Admin</option>
                                    <option value="1">Author</option>
                                    <option value="2">Editor</option>
                                </select>
                            </td>
                        </tr>

						<tr> 
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="Create" />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>