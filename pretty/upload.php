
<?php
	# Stop Hacking attempt
	if(!defined('__APP__')) {
		die("Hacking attempt");
	}
?>
			<div class="content4"> 
                <div class="adminpage">
                    <div class="uploadform">
                        <div class="prvired" id="uploadformwrapper">  
                           	<h2>Select image to upload:</h2>
                           	 <?php
                    if (isset($_SESSION['message'])) {
                        print $_SESSION['message'];
                        unset($_SESSION['message']);
                    }
                    ?>
							<form action="trigger.php" method="POST" enctype="multipart/form-data">
								<input type="hidden" id="action" name="action" value="upload">
								<input type="file" name="upimage" id="upimage" required><br>
								<input type="text" name="imagename" id="imagename" placeholder="Enter image name"><br>
								<select name="categories" id="categories" required>
                                        <option value="">Select a category</option>;
                                        <?php
	                                        $_query  = "SELECT * FROM categories";
	                                        $_result = @mysqli_query($MySQL, $_query);
	                                        while($row = @mysqli_fetch_array($_result)) {
	                                            print '<option value="' . $row['id'] .'">' . $row['name'] . '</option>';
	                                        }
                                        ?>
                                </select><br>
								<input type="submit" id="submit6" value="Upload Image" name="submit6">
							</form>

								<h2>Insert new category:</h2>
								 <?php
                    	if (isset($_SESSION['message'])) {
                        print $_SESSION['message'];
                        unset($_SESSION['message']);
                    }
                    ?>
							<form action="trigger.php" method="POST" enctype="multipart/form-data">
								<input type="hidden" id="action" name="action" value="newcategory">
								<input type="text" name="categoryname" id="categoryname" placeholder="Enter new category name" required><br>
								<input type="submit" id="submit7" value="Insert" name="submit7">
							</form>
                        </div>
                    </div>
                </div>
                <div class="adminedit">
                    <div class="adminedit2">   
                        <?php 
							print '<h2>Users list</h2>
									<table>
										<thead>
											<tr>
												<th>Id</th>
												<th>Username</th>
												<th>E mail</th>
												<th width="16"></th>
											</tr>
										</thead>
										<tbody>';
						$query = "SELECT * FROM users";
						$result = @mysqli_query($MySQL, $query);
						while ($row = @mysqli_fetch_array($result)){
							print '<tr>
									<td>' . $row['id'] . '</td>' .
									'<td>' . $row['username'] . '</td>' .
									'<td>' . $row['email'] . '</td>
									<td><a href="index.php?menu=103&amp;delete=' .$row['id']. '"><img width=20px; height=20px; src="slike/delete.png" alt="obriši"></a></td>';
						}
								print '</tbody>
								</table>';

								print '<h2>Image list</h2>
									<table>
										<thead>
											<tr>
												<th>Id</th>
												<th>Name</th>
												<th>File</th>
												<th>Category_id</th>
												<th width="16"></th>
											</tr>
										</thead>
										<tbody>';

						$query = "SELECT * FROM images";
						$result = @mysqli_query($MySQL, $query);
						while ($row = @mysqli_fetch_array($result)){
							print '<tr>
									<td>' . $row['id'] . '</td>' .
									'<td>' . $row['name'] . '</td>';
									if (strlen($row['file']) <=20) {
										  echo '<td>' . $row['file'] . '</td>';
										} else {
										  echo '<td>' . substr($row['file'], 0, 20) . '...' . '</td>';
										}
									print '<td>' . $row['category_id'] . '</td>
									<td><a href="index.php?menu=104&amp;delete=' .$row['id']. '"><img width=20px; height=20px; src="slike/delete.png" alt="obriši"></a></td>';
						}
								print '</tbody>
								</table>';

							print '<h2>Category list</h2>
									<table>
										<thead>
											<tr>
												<th>Id</th>
												<th>Name</th>
												<th width="16"></th>
											</tr>
										</thead>
										<tbody>';
										
						$query = "SELECT * FROM categories";
						$result = @mysqli_query($MySQL, $query);
						while ($row = @mysqli_fetch_array($result)){
							print '<tr>
									<td>' . $row['id'] . '</td>' .
									'<td>' . $row['name'] . '</td>' .
									'<td><a href="index.php?menu=105&amp;delete=' .$row['id']. '"><img width=20px; height=20px; src="slike/delete.png" alt="obriši"></a></td>';
						}
								print '</tbody>
								</table>';

						if ($_GET['menu'] == 103) {
							# delete from
							$query  = "DELETE FROM users";
							$query .= " WHERE id=".(int)$_GET['delete'];
							$query .= " LIMIT 1";
							$result = @mysqli_query($MySQL, $query);
							
							$redirect = "index.php?menu=100";
							header("Location: " . $redirect);
							exit;
						}

						elseif ($_GET['menu'] == 104) {
							# delete from
							$query = "SELECT * from images WHERE id =" .(int)$_GET['delete'];
							$result = mysqli_query($MySQL, $query);
							$row = @mysqli_fetch_array($result);
							unlink(realpath("uploads/". $row['file']));
							$query  = "DELETE FROM images";
							$query .= " WHERE id=".(int)$_GET['delete'];
							$result = @mysqli_query($MySQL, $query);
							
							$redirect = "index.php?menu=100";
							header("Location: " . $redirect);
							exit;
						}
						
						elseif ($_GET['menu'] == 105) {
							# delete from
							$query  = "DELETE FROM categories";
							$query .= " WHERE id=".(int)$_GET['delete'];
							$query .= " LIMIT 1";
							$result = @mysqli_query($MySQL, $query);
							
							$redirect = "index.php?menu=100";
							header("Location: " . $redirect);
							exit;
						}
						?>
                    </div>
                </div>
            </div>
