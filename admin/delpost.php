<?php?>
<?php include  'inc/header.php';?>
<?php include 'inc/sidebar.php';?>

<?php
    if(!isset($_GET['delpostid']) || isset($_GET['delpostid'])==NULL){
            echo"<script> window.location='postlist.php'</script>";
           // header("Location:catlist.php");
        }
        else{
            $delpostid=$_GET['delpostid'];
            $getallpost="SELECT * from dbl_post where id='$delpostid' ";
            $getdata=$db->select($getallpost);
            if($getdata){
            	$value=$getdata->fetch_assoc();
            	$piclink=$value['image'];
            	unlink($piclink);
            }
            $delquery="DELETE  from dbl_post where id='$delpostid'";
            $deldata=$db->delete($delquery);
            if($deldata){
            	echo "<script>alert('Data Deleted Successfully');</script>";
            	echo"<script> window.location='postlist.php'</script>";
            }else{
            	echo "<script>alert('Data Not Deleted.');</script>";
            	echo"<script>; window.location='postlist.php'</script>";
            }
        }

?>