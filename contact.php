<?php
 if(isset($_POST['submit'])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $num = $_POST['number'];
  $feedback = $_POST['feedback'];
  $servername = "localhost";
  $username = "root";
  $password = "";

  try {
   $conn = new PDO("mysql:host=$servername;dbname=feedback", $username, $password);
   $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   $query = $conn->prepare('INSERT INTO feedback (name, email, number, feedback) VALUES (:name, :email, :number, :feedback)');
   $query->bindParam(":name", $name);
   $query->bindParam(":email", $email);
   $query->bindParam(":number", $num);
   $query->bindParam(":feedback", $feedback);
   $query->execute();
   $msg = "Your Query Was Submitted Successfully!!!";
  } catch(PDOException $e) {
   $msg = "Sorry, an unknown error occurred. Here is the error message: " . $e->getMessage();
  }
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Projects</title>
  <link rel="stylesheet" href="contact.css">
</head>
<body>
  <header>
    <h1 class="title"><a href="index.html" style="color: white; text-decoration: none;">Deesan Designs</a></h1>
    <nav>
      <a href="home.html">Home</a>
      <a href="about.html">About</a>
      <a href="design.html">Designs</a>
      <a href="project.html">Projects</a>
      <a href="contact.html">Contact</a>
    </nav>
  </header>
  <div class="fullbody">
    <?php echo $msg; ?>
   <!-- <footer>&copy; Deepa 2020</footer> -->
  </div>
</body>
</html>