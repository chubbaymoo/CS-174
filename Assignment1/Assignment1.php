<!DOCTYPE html>
<html>
<body>


	<p>
		<?php
		$servername = "localhost";
		$username = "root";
		$password = "aidannguyen";

		$first = $_POST['FirstName'];
		$last = $_POST['LastName'];
		$sex = $_POST['Sex'];
		$school = $_POST['School'];
		$phone = $_POST['PhoneNo'];


		/*$first = filter_input(INPUT_GET, "FirstName");
		$last = filter_input(INPUT_GET, "LastName");
		$sex = filter_input(INPUT_GET, "Sex");
		$school = filter_input(INPUT_GET, "School");
		$phone = filter_input(INPUT_GET, "PhoneNo");*/

		try {
			//$con = new PDO ("mysql:host=localhost;dbname=tvay", $username, $password);
			//$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$connectionstring = mysql_connect($servername,$username,$password)
        	or die('Could not connect: ' . mysql_error());

        	mysql_select_db('tvay')
        	or die('Could not select database: ' . mysql_error());

			$Query = 'SELECT * FROM assignment1';

			$queryexe = mysql_query($Query)
        	or die('Could not query database: ' . mysql_error());

			$Insert = "INSERT INTO assignment1 (FirstName, LastName, Sex, School, PhoneNo)
			 VALUES ('$first','$last', '$sex', '$school','$phone' )";

			$results = mysql_query($Insert)
        	or die('could not insert into database: ' . mysql_error());

			$queryexe = mysql_query($Query)
   			or die('Could not query database: ' . mysql_error());

   			print "<table border='1'> \n";
  			 //query database
   			while($dataArray = mysql_fetch_array($queryexe, MYSQL_ASSOC))
   			{
     			print "<tr>\n";
     			foreach ($dataArray as $col_value) {
     				print "\t<td>$col_value</td>\n";
     			}
     			print "</tr>\n";
    		}
    		print "</table>\n";


			/*print "<table border='1'> \n";

			$result = $con->query($query);
			$row = $result->fetch(PDO::FETCH_ASSOC);

			print "<tr>\n";
			foreach ($row as $field => $value) {
				print "<th>$field</th> \n";
			}
			print "<tr>\n";

			if ((strlen($first) > 0) && (strlen($last) > 0)) {
				$query = "SELECT * FROM contact WHERE FirstName = '$first' AND LastName = '$last'";
			}

			$data = $con->query($query);
			$data->setFetchMode(PDO::FETCH_ASSOC);

			foreach ($data as $row) {
				print "<tr>\n";
				foreach ($row as $name => $value) {
					print "<td>$value</td>\n";
				}
				print "</tr>\n";
			}
			print "</table>\n";*/
		}
		catch(PDOException $ex) {
			echo 'ERROR: ' . $ex->getMessage();
		}



		?>
	</p>
</body>
</html>