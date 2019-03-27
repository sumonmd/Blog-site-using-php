</div>

	<div class="footersection templete clear">
	  <div class="footermenu clear">
		<ul>
			<li><a href="#">Home</a></li>
			<li><a href="#">About</a></li>
			<li><a href="#">Contact</a></li>
			<li><a href="#">Privacy</a></li>
		</ul>
	  </div>
	   <?php
                    $query="SELECT * FROM tbl_footer where id='1'";
                    $result=$db->select($query);
                    if($result){
                        while($copyright=$result->fetch_assoc()){
                    ?>
	  <p>&copy; <?php echo $copyright['note'];?> <?php echo date('Y');?></p>
	  <?php
	}
}
?>
	</div>
	<div class="fixedicon clear">
		<?php
				$query="SELECT * from tbl_social where id='1'";
				$result=$db->select($query);
				if($result){
					while($social=$result->fetch_assoc()){
				?>
		<a href="<?php echo $social['fb'];?>" target="_blank"><img src="images/fb.png" alt="Facebook"/></a>
		<a href="<?php echo $social['tw'];?>" target="_blank"><img src="images/tw.png" alt="Twitter"/></a>
		<a href="<?php echo $social['ln'];?>" target="_blank"><img src="images/in.png" alt="LinkedIn"/></a>
		<a href="<?php echo $social['gg'];?>" target="_blank"><img src="images/gl.png" alt="GooglePlus"/></a>
		<?php
				}
			}
			?>
	</div>
<script type="text/javascript" src="js/scrolltop.js"></script>
</body>
</html>