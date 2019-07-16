<?php include("head.php");?>
<?php include("data/papar.php");?>

	<h1>Interview Task</h1>
	<div style="width:90%;margin-left:40px;">
		<table class="table table-bordered vcenter">
			<thead class="thead-light">
				<tr align="center">
					<th>Name</th>
					<th>Age</th>
					<th>Address</th>
					<th>Working Status</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($array['data'] as $key=>$row){?>
				<?php 
					$date = new DateTime($row['date_of_birth']);
					$date->setTimezone(new DateTimeZone('Asia/Kuala_Lumpur')); // +04 
					$date->format('Y-m-d H:i:s');
					// My Birthday :)
					$date_1 = new DateTime($date->format('Y-m-d'));
					// Todays date
					$date_2 = new DateTime(date('Y-m-d'));
					$difference = $date_2->diff($date_1);
			    ?>
				<tr align="center">
					<td><?=$row['name'];?></td>
					<td><?=$difference->y;?></td>
					<td><?=$row['address'];?></td>
					<td><?=(isset($row['working_status'])&&($row['working_status']==1)) ? 'Yes' : 'No' ;?></td>
					<td><a href="exportcsv.php?x=<?=$key?>">Export CSV</a></td>
			   </tr>
			   <?php } ?>
		   </tbody>
		</table>
    </div>

	<?php // echo "<pre>";?>
	<?php // print_r($array);?>
	
<?php include("footer.php");?>	

