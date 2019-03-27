<?php include  'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Add New Category</h2>
               <div class="block copyblock"> 
                <?php
                if($_SERVER["REQUEST_METHOD"]=="POST"){
                
                $catname=$_POST['catname'];
                 $category = mysqli_real_escape_string($db->link, $catname);
                 if(empty($category)){
                    echo "<span class='error'>Field is empty! </span>";
                 }
                 else{
                $query="INSERT INTO tbl_category(name) Values('$category')";
                $catinsert=$db->insert($query);
                if($catinsert){
                    echo "<span class='success'>Category Inserted Successfully!</span>";
                }else{
                    echo "<span>Category not inserted!</span>";
                }
            }

         }

              
                ?>
                 <form action="" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" placeholder="Enter Category Name..." class="medium" name='catname' />
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Save" />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>
        <?php include 'inc/footer.php';?>