<?php include  'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php
    if(!isset($_GET['catid']) || isset($_GET['catid'])==NULL){
        echo"<script> window.location='catlist.php'</script>";
       // header("Location:catlist.php");
    }
    else{
        $id=$_GET['catid'];
    }
?>
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Update Category</h2>
               <div class="block copyblock"> 
                <?php
                if($_SERVER["REQUEST_METHOD"]=="POST"){
                
                $catname=$_POST['catname'];
                 $category = mysqli_real_escape_string($db->link, $catname);
                 if(empty($category)){
                    echo "<span class='error'>Field is empty! </span>";
                 }
                 else{
                $query="UPDATE tbl_category 
                SET name='$catname'
                where id='$id'
                ";
                $updatrow=$db->update($query);
                if($updatrow){
                    echo "<span class='success'>Category Updated Successfully!</span>";
                }else{
                    echo "<span>Category not Update!</span>";
                }
            }

         }

              
                ?>
                <?php
                $query="SELECT * from tbl_category where id='$id' order by id desc";
               $category=$db->select($query);
               $result=$category->fetch_assoc();
                ?>
                 <form action="" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" value="<?php echo $result['name'];?>" class="medium" name='catname' />
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Update" />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>
        <?php include 'inc/footer.php';?>