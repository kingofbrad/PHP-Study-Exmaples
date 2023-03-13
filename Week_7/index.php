<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Displaying User Details</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>

    <?php
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "Users";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("connection Failed:" . $conn->connect_error);
    }
    // $sql = "SELECT id, firstname, lastname, email, age FROM Users";
    $sql = "SELECT * FROM `User`;";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    ?>
    <div class="form">


        <form action="insert.php" method="post" target="_parent">

            <div class="formInputSection">
                <label for="firstname">First name:</label><br>
                <input type="text" id="firstname" name="firstname">
            </div>
            <div class="formInputSection">
                <label for="lastname">Last name:</label><br>
                <input type="text" id="lastname" name="lastname">
            </div>
            <div class="formInputSection">
                <label for="email">Email:</label><br>
                <input type="text" id="email" name="email">
            </div>
            <div class="formInputSection">
                <label for="age">Age:</label><br>
                <input type="number" id="age" name="age">
            </div>

            <input type="submit" value="Submit">
        </form>
    </div>
    <div id="table">

    <?php
        if ($result->num_rows > 0) {
            echo "<table>
            <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Age</th>
            </tr>";
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                <td>" . $row["id"] . "</td>
                <td>" . $row["firstname"] . "</td>
                <td>". $row["lastname"]. "</td>
                <td>" . $row["email"] . "</td>
                <td>" . $row["age"] . "</td>

                </tr>";
            }
            echo "</table>";
        } else {
            echo "0 results";
        }
        ?>
    </div>


</body>

</html>