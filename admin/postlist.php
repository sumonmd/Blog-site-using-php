<?php include  'inc/header.php';?>
<?php include 'inc/sidebar.php';?>

        <div class="grid_10">
            <div class="box round first grid">
                <h2>Post List</h2>
                <div class="block">  
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th width="10px">Post No.</th>
							<th width="15px">Title</th>
							<th width="15px">Description</th>
							<th width="10px">Category</th>
							<th width="10px">Image</th>
							<th width="10px">Tags</th>
							<th width="10px">Author</th>
							<th width="10px">Date</th>
							<th width="10px">Action</th>
						</tr>
					</thead>
					<tbody>
						
						<?php
						$query="SELECT dbl_post.* ,tbl_category.name 
						from dbl_post INNER JOIN tbl_category
						ON dbl_post.cat = tbl_category.id
						ORDER BY dbl_post.title Desc
						";
						$post=$db->select($query);
						if($post){
							$i=1;
							while($result=$post->fetch_assoc()){
								?>
							<tr class="odd gradeX">
							<td><?php echo $i;?></td>
							<td><a href="editpost.php?editpostid=<?php echo $result['id'];?>"><?php echo $result['title'];?></a></td>
							<td><?php echo $fm->textshorten($result['body'],100);?></td>
							<td><?php echo $result['name'];?></td>
							<td ><img src="<?php echo $result['image'];?>" alt="" width="60px" height="40px"></td>
							<td><?php echo $result['tags'];?></td>
							<td><?php echo $result['author'];?></td>
							<td><?php echo $fm->dateformat($result['date']);?></td>
							
							<td><a href="editpost.php?editpostid=<?php echo $result['id'];?>">Edit</a> || <a onclick="return confirm('Are You Sure to Delete post!');" href="delpost.php?delpostid=<?php echo $result['id'];?>">Delete</a></td>
						</tr>
							
							<?php 
								$i++;

							}
						}
						?>
						
					</tbody>
				</table>
	
               </div>
            </div>
        </div>
        
	<script type="text/javascript">
        $(document).ready(function () {
            setupLeftMenu();
            $('.datatable').dataTable();
			setSidebarHeight();
        });
    </script>
    <?php include 'inc/footer.php';?>
