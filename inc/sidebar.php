	
<div class="sidebar clear">
			<div class="samesidebar clear">
				<h2>Categories</h2>
					<ul>
						<?php
						$query="select * from tbl_category";
						$category=$db->select($query);
						if($category){

							while($cat = $category->fetch_assoc()){
								?>
								<li><a href="posts.php?category=<?php echo $cat['id'];?>"><?php echo $cat['name'];?></a></li>
								<?php 
							}
						}
						else{
							echo "<li><a href='#'>Category One</a></li>";
						}


						?>
											
					</ul>
			</div>
			
			<div class="samesidebar clear">
				<h2>Latest articles</h2>
				<?php
				$query="select * from dbl_post limit 5";
				$latest=$db->select($query);
				if($latest){
					while($result=$latest->fetch_assoc()){
						?>
							<div class="popular clear">
						<h3><a href="post.php?id=<?php echo $result['id'];?>"><?php echo $result['title'];?></a></h3>
						<a href="post.php?id=<?php echo $result['id'];?>"><img src="admin/<?php echo $result['image'];?>" alt="post image"/></a>
						<?php
						echo $fm->textshorten($result['body'],120);
						?>
					</div>
						<?php 
					}
				}
				else{
					header("Location:404.php");
				}
				?>
					
					
					
					
					
					
					
	
			</div>
			
		</div>