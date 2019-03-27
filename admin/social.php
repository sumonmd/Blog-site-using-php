<?php include  'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
        <div class="grid_10">

            <div class="box round first grid">
                <h2>Update Social Media</h2>
               
                <?php
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $fb=$fm->validate($_POST['fb']);
            $tw=$fm->validate($_POST['tw']);
            $ln=$fm->validate($_POST['ln']);

            $gg=$fm->validate($_POST['gg']);

            $fb=mysqli_real_escape_string($db->link,$fb);
            $tw=mysqli_real_escape_string($db->link,$tw);
            $ln=mysqli_real_escape_string($db->link,$ln);
            $gg=mysqli_real_escape_string($db->link,$gg);

            $lin=$ln;

            if($fb==""||$tw==""||$ln=""||$gg==""){
                echo" <span class='error'>Field must not be empty!</span>";
            }
            else{
                
                $query="UPDATE tbl_social
                SET 
                fb='$fb',
                tw='$tw',
                ln='$lin',
                gg='$gg'
                where id='1'";
                $updated_row=$db->update($query);
                if($updated_row){
                    echo "<span class='success'>Updated Successfully.
                     </span>";
                }
                else{
                    echo "<span class='error'>Not Updated !</span>";
                }
            }

        }
        ?>
                 <div class="block">
                <?php
                $query="SELECT * from tbl_social where id='1'";
                $result=$db->select($query);
                if($result){
                    while($social=$result->fetch_assoc()){
                ?>     
                 <form action="social.php" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <label>Facebook</label>
                            </td>
                            <td>
                                <input type="text" name="fb" value="<?php echo $social['fb'];?>" class="medium" />
                            </td>
                        </tr>
						 <tr>
                            <td>
                                <label>Twitter</label>
                            </td>
                            <td>
                                <input type="text" name="tw" value="<?php echo $social['tw'];?>" class="medium" />
                            </td>
                        </tr>
						
						 <tr>
                            <td>
                                <label>LinkedIn</label>
                            </td>
                            <td>
                                
                                <input type="text" name="ln" value="<?php echo $social['ln'];?>"  class="medium" />
                            </td>
                        </tr>
						
						 <tr>
                            <td>
                                <label>Google Plus</label>
                            </td>
                            <td>
                                <input type="text" name="gg" value="<?php echo $social['gg'];?>" class="medium" />
                            </td>
                        </tr>
						
						 <tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="Update" />
                            </td>
                        </tr>
                    </table>
                
                    </form>
                    <?php } 
                } ?>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>