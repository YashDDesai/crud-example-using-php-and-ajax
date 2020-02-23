<?php
include('db.php');


if(isset($_POST['view'])){


	$query = "SELECT * FROM studenr";
	$result = mysqli_query($con, $query);
	$count = mysqli_num_rows($result);
	$output = '';
	if($count > 0)
	{
		while($row = mysqli_fetch_array($result))
		{
			$output .= '
			   <tr class="stud-row">
				   <td>
					   '.$row["sname"].'
					</td>
					<td>
					   '.$row["email"].'
				   </td>
				   <td>
					   <button class="btn btn-danger btn-delete" id="del-'.$row["id"].'" value="'.$row["id"].'"><i class="fa fa-trash"></i></button>
				   </td>
				   <td>
					   <button class="btn btn-secondary btn-update" id="upd-'.$row["id"].'" value="'.$row["id"].'"><i class="fa fa-edit"></i></button>
				   </td>
			   </tr>
			   ';
		}
	}
	else{
		 $output .= '<h2 class="text-center">Nothing to Show</h2>
		 				<p class="text-center">Add details to save a record</p>';
	}

	$th = "<tr>
		<th>Nmae</th>
		<th>Email</th>
		<th>Delete</th>
		<th>Edit</th>
	</tr>";



	$data = array(
		'tbody' => $output,
		'thead'  => $th,
		'count' => $count
	);

	echo json_encode($data);
	
	}

?>
