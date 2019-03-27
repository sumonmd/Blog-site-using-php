<?php include  'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php
    if(!isset($_GET['editpostid']) || isset($_GET['editpostid'])==NULL){
            echo"<script> window.location='postlist.php'</script>";
           // header("Location:catlist.php");
        }
        else{
            $postid=$_GET['editpostid'];
        }
?>


        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Update Post</h2>
                <div class="block">
                <?php
                if($_SERVER["REQUEST_METHOD"]=="POST"){
                
                 $title = mysqli_real_escape_string($db->link, $_POST['title']);
                 $cate  =mysqli_real_escape_string($db->link,$_POST['cat']);
                 $body =  mysqli_real_escape_string($db->link, $_POST['body']);
                 $tag =   mysqli_real_escape_string($db->link, $_POST['tag']);
                 $author = mysqli_real_escape_string($db->link, $_POST['author']);


              
                $permited  = array('jpg', 'jpeg', 'png', 'gif');
                $file_name = $_FILES['image']['name'];
                $file_size = $_FILES['image']['size'];
                $file_temp = $_FILES['image']['tmp_name'];

                $div = explode('.', $file_name);
                $file_ext = strtolower(end($div));
                $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
                $uploaded_image = "uploads/".$unique_image;

                if($title==""||$cate==""||$body==""||$tag==""||$author==""){
                    echo"<span class='error'>Field must not be empty!</span>";
                }
                else{

                if(!empty($file_name)){

                if ($file_size >1048567) {
                     echo "<span class='error'>Image Size should be less then 1MB!
                     </span>";
                 } 
                 elseif (in_array($file_ext, $permited) === false) {
                     echo "<span class='error'>You can upload only:-"
                     .implode(', ', $permited)."</span>";
                 } 
                 else{
                    move_uploaded_file($file_temp, $uploaded_image);
                    $query = "INSERT INTO dbl_post(cat,title,body,image,tags,author) 
                    VALUES('$cate','$title','$body','$uploaded_image','$tag','$author')";

                    $query="UPDATE dbl_post 
                        SET
                        cat       ='$cate',
                        title     ='$title',
                        body      ='$body',
                        image     ='$uploaded_image',
                        tags      ='$tag',
                        author    ='$author'
                        where id='$postid'

                    ";


                    $updated_row = $db->update($query);
                    
                    if ($updated_row) {
                     echo "<span class='success'>Post Updated Successfully.
                     </span>";
                    }
                    else {
                     echo "<span class='error'>Post Not Updated !</span>";
                    }
                }
            }
            else{
                $query = "INSERT INTO dbl_post(cat,title,body,image,tags,author) 
                    VALUES('$cate','$title','$body','$uploaded_image','$tag','$author')";

                    $query="UPDATE dbl_post 
                        SET
                        cat       ='$cate',
                        title     ='$title',
                        body      ='$body',
                       
                        tags      ='$tag',
                        author    ='$author'
                        where id='$postid'

                    ";


                    $updated_row = $db->update($query);
                    
                    if ($updated_row) {
                     echo "<span class='success'>Post Updated Successfully.
                     </span>";
                    }
                    else {
                     echo "<span class='error'>Post Not Updated !</span>";
                    }
            }

        }
        }

                ?>               

                <?php 
                $query="SELECT * From dbl_post where id= '$postid' order by id desc";
                $result=$db->select($query);
                if($result){
                    $editpost=$result->fetch_assoc();
                }
                ?>
                 <form action="" method="post" enctype="multipart/form-data">
                    <table class="form">
                       
                        <tr>
                            <td>
                                <label>Title</label>
                            </td>
                            <td>
                                <input type="text" name="title" value="<?php echo $editpost['title'];?>" class="medium" />
                            </td>
                        </tr>
                     
                        <tr>
                            <td>
                                <label>Category</label>
                            </td>

                            <td>
                                <select id="select" name="cat">
                                    <option>Select Option</option>

                                     <?php
                                    $query="SELECT * FROM tbl_category";
                                    $category=$db->select($query);
                                    if($category){
                                        while($result=$category->fetch_assoc()){
                                            ?>
                                                <option
                                            <?php 
                                            if($editpost['cat']==$result['id']){

                                                ?>
                                                 selected="selected"
                                                <?php
                                            }
                                            ?>
                                     value="<?php echo $result['id'];?>"><?php echo $result['name'];?></option>
                                    <?php
                                }
                            }
                            ?>
                                    
                                   
                                </select>
                            </td>
                        </tr>
                   
                    
                       
                        <tr>
                            <td>
                                <label>Upload Image</label>
                            </td>
                            <td>
                                <img src="<?php echo $editpost['image'];?>" width="200px" height="150px" alt="">
                                <input type="file" name="image" />
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Content</label>
                            </td>
                            <td>
                                <textarea class="tinymce" name="body"><?php echo $editpost['body'];?></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Tags</label>
                            </td>
                            <td>
                                <input type="text" name="tag" value="<?php echo $editpost['tags'];?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Author</label>
                            </td>
                            <td>
                                <input type="text" name="author" value="<?php echo $editpost['author'];?>" class="medium" />
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
      <?php include 'inc/footer.php';?>

  
