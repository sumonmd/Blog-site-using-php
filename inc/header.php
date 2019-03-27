
<?php include "config/config.php";?>
<?php include "lib/Database.php";?>
<?php include "helpers/format.php";?>
<?php
$db= new Database();
$fm=new Format();
?>
<!DOCTYPE html>
<html>
<head>
	<?php
		if(isset($_GET['pageid'])){
			$pagesid=$_GET['pageid'];
		$pagename="SELECT * from tbl_page where id='$pagesid'";
        $pagesname=$db->select($pagename);
         if($pagesname){
        	while($result=$pagesname->fetch_assoc()){ ?>
        	<title><?php echo $result['name'];?> - <?php echo TITLE;?></title>
        <?php } 
    }
}else if(isset($_GET['id'])){
	$id=$_GET['id'];
	$postdetails = "SELECT title from dbl_post where id='$id'";
	$postname=$db->select($postdetails);
	if($postname){
		while($result=$postname->fetch_assoc()){
			?>
			<title><?php echo $result['title'];?> - <?php echo TITLE;?></title>
			<?php
		}
	}
}
        else{ ?>
			<title><?php echo $fm->title();?> - <?php echo TITLE;?></title>
     <?php
        }

	?>
	
	<meta name="language" content="English">
	<meta name="description" content="It is a website about education">
	<?php
	
	if(isset($_GET['id'])){
		$keywordid=$_GET['id'];
		$query="select * from dbl_post where id ='$keywordid'";
		$keywords=$db->select($query);
		if($keywords){
			while($result=$keywords->fetch_assoc()){
				?>
				<meta name="keywords" content="<?php echo $result['tags'];?>">
			<?php
			}
		}}else{
			?>
			<meta name="keywords" content="<?php echo KEYWORDS;?>">
		<?php
		}
	?>
	
	<meta name="author" content="Delowar">
	<link rel="stylesheet" href="font-awesome-4.5.0/css/font-awesome.css">	
	<link rel="stylesheet" href="css/nivo-slider.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="style.css">
	<script src="js/jquery.js" type="text/javascript"></script>
	<script src="js/jquery.nivo.slider.js" type="text/javascript"></script>

<script type="text/javascript">
$(window).load(function() {
	$('#slider').nivoSlider({
		effect:'random',
		slices:10,
		animSpeed:500,
		pauseTime:5000,
		startSlide:0, //Set starting Slide (0 index)
		directionNav:false,
		directionNavHide:false, //Only show on hover
		controlNav:false, //1,2,3...
		controlNavThumbs:false, //Use thumbnails for Control Nav
		pauseOnHover:true, //Stop animation while hovering
		manualAdvance:false, //Force manual transitions
		captionOpacity:0.8, //Universal caption opacity
		beforeChange: function(){},
		afterChange: function(){},
		slideshowEnd: function(){} //Triggers after all slides have been shown
	});
});
</script>
</head>

<body>
	<div class="headersection templete clear">
		<a href="index.php">
			<div class="logo">
				
				<?php
                $query="SELECT * from tbl_slogan where id='1'";
                $blogslogan=$db->select($query);
                ?>
				<?php if($blogslogan){ ?>
                    <?php $result=$blogslogan->fetch_assoc();?>
				<img src="Admin/<?php echo $result['logo'];?>" alt="Logo"/>
				<h2><?php echo $result['title'];?></h2>
				<h3><?php echo $result['slogan'];?></h3>
			<?php } ?>
			</div>
		</a>
		<div class="social clear">
			<div class="icon clear">
				<?php
				$query="SELECT * from tbl_social where id='1'";
				$result=$db->select($query);
				if($result){
					while($social=$result->fetch_assoc()){
				?>
				<a href="<?php echo $social['fb'];?>" target="_blank"><i class="fa fa-facebook"></i></a>
				<a href="<?php echo $social['tw'];?>" target="_blank"><i class="fa fa-twitter"></i></a>
				<a href="<?php echo $social['ln'];?>" target="_blank"><i class="fa fa-linkedin"></i></a>
				<a href="<?php echo $social['gg'];?>" target="_blank"><i class="fa fa-google-plus"></i></a>
			<?php
				}
			}
			?>
			</div>
			<div class="searchbtn clear">
			<form action="search.php" method="get">
				<input type="text" name="search" placeholder="Search keyword..."/>
				<input type="submit" name="submit" value="Search"/>
			</form>
			</div>
		</div>
	</div>
<div class="navsection templete">
	<ul>
		<li><a 
			<?php 
				$path=$_SERVER['SCRIPT_FILENAME'];
				$title=basename($path,'.php');
				if($title=='index'){
					echo 'id="active"';
				}
		?>
			 href="index.php">Home</a></li>
		<?php
                $query="SELECT * from tbl_page";
                $page=$db->select($query);
                ?>
                <?php if($page){ ?>
                    <?php while($result=$page->fetch_assoc()){ ?>

                <li><a 
					<?php if(isset($_GET['pageid'])&& isset($_GET['pageid'])==$result['id']){
						echo 'id="active"';
					}?>
                	href="page.php?pageid=<?php echo $result['id'];?>"><?php echo $result['name'];?></a></li>

            <?php } }?>
		<li><a 
			<?php
			$path=$_SERVER['SCRIPT_FILENAME'];
			$currentpage=basename($path,'.php');
			if($currentpage=='contact'){
				echo 'id="active"';
			}
			?>
			href="contact.php">Contact</a></li>
	</ul>
</div>
