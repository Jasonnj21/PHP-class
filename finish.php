<?php

	$link = mysqli_connect("localhost", "root", "", "db_belajar");

	/* check connection */ 
	if (!$link) {
	    printf("Connect failed: %s\n", mysqli_connect_error());
	    exit();
	}

	//printf("Host information: %s\n", mysqli_get_host_info($link));

	if (isset($_POST['nama'])) {
		$nama = $_POST['nama'];
		$email = $_POST['email'];
		$password = $_POST['password'];

		$passwordhash = password_hash($password, PASSWORD_DEFAULT);

		echo $nama;
		echo "<br>";
		echo $email;
		echo "<br>";
		echo $passwordhash;
		echo "<br>";

		$query = "INSERT INTO tb_anak (nama, email, password) VALUES ('".$nama."', '".$email."', '".$passwordhash."')";

		if (mysqli_query($link, $query)) {
		    echo " <br>New record created successfully";
		} else {
		    echo "Error: " . $query . "<br>" . mysqli_error($link);
		}
	}

	$query = "select * from tb_anak";

	$result = mysqli_query($link,$query);

	echo "<table border=1>";

	while ($row = mysqli_fetch_array($result)) {
		echo "<tr><td>" . $row['id']. "</td><td>" . $row['nama']. "</td><td>" . $row['email']. "</td><td>" .$row['password']. "</td></tr>";
	}

	echo "</table>";

	/* close connection */
	mysqli_close($link);

?>