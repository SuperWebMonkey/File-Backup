<?php include '../view/header.php'; ?>
<main>

    <h2 class="text-center">Directory List</h2>
	<!-- directory table start -->
	<div class="row">
	<div class="col-xs-8 col-xs-offset-2">
    <table class="table table-striped table-hover">
        <tr>
            <th>Name</th>
            <th>&nbsp;</th>
        </tr>
        <?php foreach ($directories as $directory) : ?>
        <tr>
            <td><?php echo $directory['directoryName']; ?></td>
            <td>
                <form action="index.php" method="post">
                    <input type="hidden" name="action" value="delete_directory" />
                    <input type="hidden" name="directory_id"
                           value="<?php echo $directory['directoryID']; ?>"/>
                    <input type="submit" value="Delete"/>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
	</div>
	</div>
	<!-- directory table end -->
	<!-- directory input start -->
    <h2 class="text-center">Add Directory</h2>
	<div class="row">
	<div class="col-xs-8 col-xs-offset-2 well">
    <form id="add_category_form"
          action="index.php" method="post">
        <input type="hidden" name="action" value="add_directory" />

        <label>Name:</label>
        <input type="text" name="name" />
        <input type="submit" value="Add"/>
    </form>
	</div>
	</div>
	<!-- directory input end -->
    <p><a href="index.php?action=list_files">List Files</a></p>

</main>
<?php include '../view/footer.php'; ?>