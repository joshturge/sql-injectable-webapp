<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>SQL Injectable Website</title>
</head>
<body>
    <div class="form-group pull-right">
        <form action="search.php">
            <input type="text" class="search form-control" name="query_product" placeholder="What you looking for?">
        </form>
    </div>
    <span class="counter pull-right"></span>
    <table class="table table-hover table-bordered results">
        <thead>
            <tr>
                <th class="col-md-5 col-xs-5">ID</th>
                <th class="col-md-4 col-xs-4">Product Name</th>
                <th class="col-md-3 col-xs-3">Description</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $server_name = getenv("SERVER_NAME");
                $username = getenv("MYSQL_USERNAME");
                $password = getenv("MYSQL_PASSWORD");
                $db_name = getenv("DB_NAME");
                $table = getenv("TABLE_NAME");

                // Create connection
                $conn = mysqli_connect($server_name, $username, $password, $db_name);

                // Check connection
                if (!$conn) {
                    die("Connection Failed: " . mysqli_connect_error());
                }

                $search_query = $_GET["query_product"];

                // SQL injectable code
                $sql = "SELECT * FROM $table WHERE name LIKE '%$search_query%'";

                $result = mysqli_query($conn, $sql);

                if (!$result) {
                    die("Malformed Query!");
                }

                // If one or more rows are returned do following
                if(mysqli_num_rows($result) > 0){
			
                    while($row = mysqli_fetch_assoc($result)){
                        echo "<tr>";
                        echo "<th scope=\"row\">".$row['id']."</th>";
                        echo "<td>".$row['name']."</td>";
                        echo "<td>".$row['description']."</td>";
                        echo "<tr>";
                    }
                    
                }
                // Close the db connection
                mysqli_close($conn);
            ?>
        </tbody>
    </table>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>