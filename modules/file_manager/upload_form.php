<?php include '../view/header.php'; ?>
<main>
	<?php
		include_once('../model/upload_db.php');
		$result = get_uploads();
	?>
	<!-- Upload Form Start -->
	<div class="row" id="upload">
		<div class="col-xs-8 col-xs-offset-2 well">
			<h1>Upload File</h1>
			<form action="upload_file.php" method="post"  enctype="multipart/form-data" class="upload_form">
				<div class="form-group">
					<input type="file" name="myfile" value="upload_file">
				</div>
				
				<label>Directory:</label>
				<div class="form_group">
					<select name="directory_id" name="submit" value="Upload">
					<?php foreach ( $directories as $directory ) : ?>
						<option value="<?php echo $directory['directoryID']; ?>">
							<?php echo $directory['directoryName']; ?>
						</option>
					<?php endforeach; ?>
					</select>
				</div>
				<br> 

				<label>&nbsp;</label>
				<div class="form-group">
					<input type="submit" name="submit" value="Upload" 
					  class="btn btn-info">
				</div>
				<br>
			</form>
			</div>
			</div>
			<!-- Upload Form end -->
			<br>
			<!-- Upload Table Start -->
			<h2>All Files</h2>
			<div class="row">
				<div class="col-xs-8 col-xs-offset-2">
					<table class="table table-striped table-hover">
						<!-- column titles -->
						<thead>
							<tr>
								<th>id</th>
								<th>File Name</th>
							</tr>
						</thead>
						<!-- column title end -->
						<tbody>
							<!-- table data -->
							<?php
								while($rows = $result-> fetch_assoc())
								{
							?>
									<tr>
										<td><?php echo $rows['fileID']; ?></td>
										<td><?php echo $rows['name']; ?></td>
									</tr>
							<?php
								}
							?>
							<!-- table data end -->
						</tbody>	
					</table>
		</div>
	</div>
	<!-- Upload Table End -->
	<!-- links -->
    <p class="file_lists">
        <a href="index.php?action=list_files">Show File List</a>
    </p>
	<!-- links end -->
</main>
<?php include '../view/footer.php'; ?>