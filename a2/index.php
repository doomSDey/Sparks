<?php
    require_once('db_connect.php'); //connect to database

    $query = "select * from users";
    $result = mysqli_query($link,$query);

?>

<html>
	<head>
        <title>Credit Management</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/styles.css">
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    </head>

    <body>
      <!--div class="container"-->


          <header class="jumbotron">
              <div class="container">
                  <div class="row row-header">
                      <div class="col-12 col-sm-6">
                            <form action="index.html">
                              <input type="submit" class="button" value='Back'/>
                            </form>
                      </div>
                      <div class="col-12 col-sm">
                      </div>
                  </div>
              </div>
          </header>

          <br><br>
    	<thead>
        <table class=" container centerlist">
				<tr>
                    <th>S No.</th>
    				<th >Name</th>
    				<th >Email</th>
    				<th >Credits</th>
				</tr>
			</thead>

            <!--fetch and display data from MySQL-->
            <?php
                $i=1;

                while($row = mysqli_fetch_array($result)) {
                    echo "<tr>";
                    echo "<td>" . $i . "</td>";
                    echo "<td>" . $row["name"] . "</td>";
                    echo "<td>" . $row["email"] . "</td>";
                    echo "<td>" . $row["credit"] . "</td>";
                    echo "<td><a href=transfer.php?name=" . $row['name'] . ">Select</a><td>";
                    echo "</tr>";
                    ++$i;
                }
            ?>

        </table>
        <script src="node_modules/jquery/dist/jquery.slim.min.js"></script>
        <script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
        <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    </body>
</html>
