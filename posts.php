
<?php include "inc/header.php";?>
<?php

		if(!isset($_GET['category'])||$_GET['category']==NULL){
			header("Location:404.php");
		}
		else{
			$id=$_GET['category'];
		}
?>

		<div class="contentsection contemplete clear">
		<div class="maincontent clear">
			<?php
			$query="select * from dbl_post where cat=$id";
			$cate=$db->select($query);
			if($cate){
				while($result=$cate->fetch_assoc()){
					?>
					<div class="samepost clear">
						<h2><a href="post.php?id=<?php echo $result['id'];?>"><?php echo $result['title'];?></a></h2>
						<h4><?php echo $fm->dateformat($result['date']);?>, By <a href="#"><?php echo $result['author'];?></a></h4>
						 <a href="#"><img src="admin/<?php echo $result['image'];?>" alt="post image"/></a>
						<?php echo $fm->textshorten($result['body']);?>
						<div class="readmore clear">
							<a href=" post.php?id=<?php echo $result['id'];?>">Read More</a>
						</div>
					</div>
					
					<?php 
				}
			}
			else{
				?>
				<h2>No post available in this category!.</h2>
				<?php
			}
			?>
				

	</div>
		
	<?php include "inc/sidebar.php";?>

	<?php include "inc/footer.php";?>