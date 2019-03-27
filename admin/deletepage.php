<?php?>
<?php include  'inc/header.php';?>
<?php include 'inc/sidebar.php';?>

<?php
    if(!isset($_GET['delpageid']) || isset($_GET['delpageid'])==NULL){
            echo"<script> window.location='postlist.php'</script>";
           // header("Location:catlist.php");
        }
        else{
            $delpageid=$_GET['delpageid'];
            $delquery="DELETE  from tbl_page where id='$delpageid'";
            $deldata=$db->delete($delquery);
            if($deldata){
            	echo "<script>alert('Page Deleted Successfully');</script>";
            	echo"<script> window.location='index.php'</script>";
            }else{
            	echo "<script>alert('Page Not Deleted.');</script>";
            	echo"<script>; window.location='index.php'</script>";
            }
        }

?>