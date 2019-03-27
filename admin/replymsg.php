<?php include  'inc/header.php';?>
<?php include 'inc/sidebar.php';?>

<?php
    if(!isset($_GET['msgid'])|| isset($_GET['msgid'])==NULL){
        echo "<script>window.location='inbox.php';</script>";
    }else{
        $id=$_GET['msgid'];
    }
?>
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>View Message</h2>
                <div class="block">
                <?php
                if($_SERVER["REQUEST_METHOD"]=="POST"){
                
                 $to=$fm->validate($_POST['toemail']);
                 $from=$fm->validate($_POST['fromemail']);
                 $subject=$fm->validate($_POST['subject']);
                 $message=$fm->validate($_POST['message']);

                 $sendmail=mail($to,$subject,$message,$from);
                 if($sendmail){
                    echo"<span class='success'>Mail Sent Succesfully</span>";
                 }
                 else{
                    echo"<span class='error'>Something went wrong</span>";
                 }

                 
             }

                ?>               
                 <form action="" method="post" >
                    <?php
                        $query="SELECT * from tbl_contact where id='$id'";
                        $contact=$db->select($query);
                        if($contact){
                   
                            while($result=$contact->fetch_assoc()){
             
                        ?>
                    <table class="form">
                       
                        <tr>
                            <td>
                                <label>To</label>
                            </td>
                            <td>
                                <input readonly  type="text" name="toemail" value="<?php echo $result['email']?>" class="medium" />
                            </td>
                        </tr>
                         <tr>
                            <td>
                                <label>From</label>
                            </td>
                            <td>
                                <input   type="text" name="fromemail" placeholder="Enter Your Email Address..." class="medium" />
                            </td>
                        </tr>
                         <tr>
                            <td>
                                <label>Subject</label>
                            </td>
                            <td>
                                <input   type="text" placeholder="Please Enter your subject..." name="subject" class="medium" />
                            </td>
                        </tr>
                  
                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Message</label>
                            </td>
                            <td>
                                <textarea readonly  class="tinymce" name="message"></textarea>
                            </td>
                        </tr>
                
						<tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="OK" />
                                
                            </td>
                        </tr>
                    </table>
                <?php } } ?>
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

  
