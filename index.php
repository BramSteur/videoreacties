<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Reacties</title>
</head>
<body>
    <div class="background">
        <br><h1>Bram Studios</h1>
        <h2>Intoductie</h2>
            <div class="video">
                <iframe width="840" height="472" src="https://www.youtube.com/embed/TkSoFb_gtjI?si=9sLeRxi9hSpn-HQx" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen>
            </iframe>
            </div>
        <div class="more">
            <h3>Meer van Bram Studios?</h3>
            <ab class="star">*</ab> <a href="https://youtube.com/shorts/fn5DjpObXbo?si=GYPizKsEr3lDVwBb">Wie is Zaniac?</a><br>
            <ab class="star">*</ab> <a href="https://youtube.com/shorts/r1P_aGWlYLM?si=fzYFAt2fJNl44rHk">Moon Knight X Loki!?</a><br>
            <ab class="star">*</ab> <a href="https://youtube.com/shorts/o97PuDXgtp0?si=Aj2BItnXnrvSuFtd">Review van Last Voyage of the Demeter</a><br>
        <br></div>
    </div>
    <!-- Channel name + pfp -->
    <!-- reacties -->
    

<form action="index.php" method="post">
  <br><ab>Laat een reactie achter</ab><br>
  <label for="fname">Voledige naam:</label>
  <input type="text" id="fname" name="fname"><br>
  <label for="lname">E-mail:</label>
  <input type="text" id="ename" name="ename"><br>
  <label for="lname">Jouw reactie:</label>
  <input type="text" id="rname" name="rname"><br>
  <input type="submit" value="Submit">
</form>
<br><?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "comments";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }
        echo "Connected successfully"; 

        $sql = "SELECT id, naam, email, commentaar, datumtijd FROM opmerking";
        $results = $conn->query($sql);

        
        if ($results->num_rows > 0) {
            // output data of each row
            while($row = $results->fetch_assoc()) {
              echo "id: " . $row["id"]. " - naam: " . $row["naam"]. " <br>" . $row["email"]. "<br>" . $row["commentaar"] . "<br>";
            }
          } else {
            echo "0 results";
          }
          // Post request
          if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = $_POST['fname'];
            if (empty($name)) {
              echo "Name is empty";
            } else {
              echo "<br>" . $name . ": <br>";
            }
            $commentText = $_POST['rname'];
            if (empty($commentText)) {
              echo "comment is empty";
            } else {
              echo $commentText;
            }
            $emailRequest = $_POST['ename'];
            if (empty($emailRequest)) {
              echo "email is empty";
            } else {
              echo "<br>" . $emailRequest;
            }
        
            $sql = "INSERT INTO opmerking (naam, email, commentaar)
            VALUES ('$name', '$emailRequest', '$commentText ')";
            
            if ($conn->query($sql)) {
                echo "<br>New record created successfully";
              } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
              }
          }
        var_dump($results);
        $conn->close();
    ?>
</body>
</html>

