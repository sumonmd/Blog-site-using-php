<?php include  'inc/header.php';?>
<?php include 'inc/sidebar.php';?>

        <div class="grid_10">
            <div class="box round first grid">
                <h2>Inbox</h2>
				   <?php 
					if(isset($_GET['seenid'])){
						$seenid=$_GET['seenid'];
						$query="UPDATE tbl_contact
						SET status='1'
						where id='$seenid'
						";
						$updated_row=$db->update($query);
						if($updated_row){
							echo "<span class='success'>Message sent in the sent box</span>";
						}else{
							echo "<span class='error'>Something is wrong !</span>";
						}
					}
				?>
				                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Name</th>
							<th>Email</th>
							<th>Message</th>
							<th>Date</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$query="SELECT * from tbl_contact where status='0' order by id desc";
						$contact=$db->select($query);
						if($contact){
							$i=0;
							while($result=$contact->fetch_assoc()){
								$i++;
						?>
						<tr class="odd gradeX">
							<td><?php echo $i;?></td>
							<td><?php echo $result['firstname'].' '.$result['lastname'];?></td>
							<td><?php echo $result['email'];?></td>
							<td><?php echo $fm->textshorten($result['body']);?></td>
							<td><?php echo $fm->dateformat($result['date']);?></td>
							<td>
								<a href="viewmsg.php?msgid=<?php echo $result['id'];?>">View</a> ||
								<a href="replymsg.php?msgid=<?php echo $result['id'];?>">Reply</a>||
								<a onclick="return confirm('Are you sure to move sent box!')" href="?seenid=<?php echo $result['id'];?>">Seen</a> ||
							</td>
						</tr>
					<?php } }?>
					</tbody>
				</table>
               </div>
            </div>

            <div class="box round first grid">
                <h2>Seen Message</h2>
               <?php
               if(isset($_GET['delid'])){
               	$id=$_GET['delid'];
               	$query="DELETE tbl_contact where id='$id' ";
               	$update_row=$db->delete($query);
               	if($update_row){
               		echo "<span class='success'>Message Deleted Successfully</span>";
               	}else{
               		echo "<span class='error'>Something is wrong</span>";
               	}
               }
               ?>
                <div class="block">        
                        <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Name</th>
							<th>Email</th>
							<th>Message</th>
							<th>Date</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$query="SELECT * from tbl_contact where status='1' order by id desc";
						$contact=$db->select($query);
						if($contact){
							$i=0;
							while($result=$contact->fetch_assoc()){
								$i++;
						?>
						<tr class="odd gradeX">
							<td><?php echo $i;?></td>
							<td><?php echo $result['firstname'].' '.$result['lastname'];?></td>
							<td><?php echo $result['email'];?></td>
							<td><?php echo $fm->textshorten($result['body']);?></td>
							<td><?php echo $fm->dateformat($result['date']);?></td>
							<td>
								<a onclick="return confirm('Are you sure to Delete!')" href="?delid=<?php echo $result['id'];?>">Delete</a> 
							
							</td>
						</tr>
					<?php } }?>
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