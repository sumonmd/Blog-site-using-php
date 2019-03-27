<?php include  'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Update Copyright Text</h2>
                  <?php
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $note=$fm->validate($_POST['note']);
           

            $notes=mysqli_real_escape_string($db->link,$note);

            if($notes==""){
                echo" <span class='error'>Field must not be empty!</span>";
            }
            else{
                
                $query="UPDATE tbl_footer
                SET 
                note='$notes' 
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
                <div class="block copyblock"> 
                    <?php
                    $query="SELECT * FROM tbl_footer where id='1'";
                    $result=$db->select($query);
                    if($result){
                        while($copyright=$result->fetch_assoc()){
                    ?>
                 <form action="copyright.php" method="POST">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" value="<?php echo $copyright['note'];?>" name="note" class="large" />
                            </td>
                        </tr>
						
						 <tr> 
                            <td>
                                <input type="submit" name="submit" Value="Update" />
                            </td>
                        </tr>
                    </table>
                    </form>
                    <?php
                }
            }
            ?>
                </div>
            </div>
        </div>
  <?php include 'inc/footer.php';?>