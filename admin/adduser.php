<?php include  'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Add New User</h2>
               <div class="block copyblock"> 
                <?php
                if($_SERVER["REQUEST_METHOD"]=="POST"){
                
                $username=$fm->validate($_POST['username']);
                $password=$fm->validate(md5($_POST['password']));
                $role=$fm->validate($_POST['role']);

                 $username = mysqli_real_escape_string($db->link, $username);
                 $password = mysqli_real_escape_string($db->link, $password);
                 $role     = mysqli_real_escape_string($db->link, $role);

                 if(empty($username)||empty($password)||empty($role)){
                    echo "<span class='error'>Field is empty! </span>";
                 }
                 else{
                $query="INSERT INTO tbl_user(username,password,role) Values('$username','$password','$role')";
                $userinsert=$db->insert($query);
                if($userinsert){
                    echo "<span class='success'>User Created Successfully!</span>";
                }else{
                    echo "<span>User not Created!</span>";
                }
            }

         }

              
                ?>
                 <form action="" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <label for="">Username</label>
                            </td>
                            <td>
                                <input type="text" placeholder="Enter User Name..." class="medium" name='username' />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="">Password</label>
                            </td>
                            <td>
                                <input type="text" placeholder="Enter User Password..." class="medium" name='password' />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="">User Role</label>
                            </td>
                            <td>
                                <select name="role" id="select">
                                    <option >Select User Role</option>
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