<?php include '../view/header.php'; ?>
<main>
	<!-- Getting row values from db -->
	<?php
		//include_once('../model/database.php');
		include_once('../model/upload_db.php');
		$result = get_uploads();
	?>
	
    <div class="sidebar">
        <!-- display a list of directories -->
        <h2 class="directory-title">Select Directories</h2>
        <nav>
            <ul>
                <!-- display links for all directories -->
                <?php foreach($directories as $directory) : ?>
					<li>
						<a href="?directory_id=<?php echo $directory['directoryID']; ?>">
							<?php 
								echo $directory['directoryName']; 
							?>
						</a>
					</li>
                <?php endforeach; ?>
			</ul>
        </nav>        
    </div>
	
	<!-- Status Check  -->
	<?php if(isset($_GET['st'])) { ?>
		<div class="alert alert-danger text-center">
			<?php 
					if ($_GET['st'] == 'success') 
					{
						echo "File Uploaded Successfully!";
					} 
					else if ($_GET['st'] == 'exist') {
						echo "File already exists.";
					}
					else if ($_GET['st'] == 'delete') 
					{
						unlink (__DIR__ . '/my_uploads/' . $_GET['name']);
						echo "Delete was successful";
					}
					else if ($_GET['st'] == 'error') 
					{
						echo 'File Error: invalid file or file type';
					} 
			?>
					 </div>
	<?php } ?>
	<!-- Status Check end-->

    <section>
        <!-- display a table of files -->
        <h2 class="text-center"><?php echo $directory_name; ?></h2>
        <div class="row">
			<div class="col-xs-8 col-xs-offset-2">
				<table class="table table-striped table-hover">
					<!-- column titles -->
					<thead>
						<tr>
							<th>File Name</th>
							<th>View</th>
							<th>Download</th>
							<th>Delete</th>
						</tr>
					</thead>
					<!-- column title end -->
					<tbody>
					<!-- table data -->
						<?php
							while($rows = $result-> fetch_assoc())
							{
								if ($rows['directoryID'] == $directory_id) {
						?>
								<tr>
									<td><?php echo $rows['name']; ?></td>
									<td><a href="my_uploads/<?php echo $rows['name']; ?>" target="_blank">View</a></td>
									<td><a href="my_uploads/<?php echo $rows['name']; ?>" download>Download</td>
									<td>
										<a href="upload_file.php?delete=<?php echo $rows['fileID']; ?>"
											class="btn btn-info">X</a>
									</td>
								</tr>
						<?php
								}
							}
						?>
						<!-- table data end -->
					</tbody>	
				</table>
			</div>
		</div>
		<!-- file table end-->
		<!-- links -->
		<p class="uploaded-files"><a href="?action=show_upload_form">Upload File</a></p>
        <p class="list-directories"><a href="?action=list_directories">
                List Directories</a>
        </p>  
		<!-- links end -->		
    </section>
</main>
<?php include '../view/footer.php'; ?>