<?php
include(__DIR__ . "/connection.php");
$responseMessage = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Sanitize inputs
    $name = htmlspecialchars($_POST["name"]);
    $email = htmlspecialchars($_POST["email"]);
    $message = htmlspecialchars($_POST["message"]);

    // SQL insert
    $sql = "INSERT INTO pholio (name, email, message) VALUES ('$name', '$email', '$message')";

    if ($conn->query($sql) === TRUE) {
        $responseMessage = "<div class='success'>Thank you, <strong>$name</strong>! Your message has been received.</div>";
    } else {
        $responseMessage = "<div class='error'>Error: " . $conn->error . "</div>";
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Contact | Puja</title>
  <link rel="stylesheet" href="../assets/css/style.css" />
  <style>
    body {
      background: #fff5fa;
      font-family: 'Segoe UI', sans-serif;
      color: #333;
    }

    .nav-bar {
      background-color: #ffb6c1;
      padding: 15px;
      position: fixed;
      width: 100%;
      top: 0;
      text-align: center;
      z-index: 10;
      box-shadow: 0 2px 5px #ffb6c155;
    }

    .nav-bar a {
      text-decoration: none;
      margin: 0 15px;
      color: #fff;
      font-weight: bold;
    }

    .contact-container {
      margin-top: 100px;
      padding: 40px;
      display: flex;
      justify-content: space-around;
      align-items: center;
      flex-wrap: wrap;
    }

    .contact-form {
      max-width: 400px;
      background: #fff0f5;
      padding: 30px;
      border-radius: 20px;
      box-shadow: 0 5px 15px rgba(255, 182, 193, 0.3);
    }

    .contact-form h2 {
      text-align: center;
      margin-bottom: 20px;
      color: #e91e63;
    }

    input, textarea {
      width: 100%;
      padding: 12px;
      margin: 10px 0;
      border: none;
      border-radius: 15px;
      background: #fff;
      box-shadow: 0 2px 5px #ffb6c155;
    }

    button {
      background-color: #ff69b4;
      color: white;
      border: none;
      padding: 12px 20px;
      border-radius: 20px;
      cursor: pointer;
      font-weight: bold;
      width: 100%;
    }

    button:hover {
      background-color: #ff1493;
    }

    .cute-image {
      width: 300px;
      height: 300px;
      background: url('../assets/images/cute.jpg') center/cover no-repeat;
      border-radius: 50% 50% 60% 40% / 50% 40% 60% 50%;
      animation: float 3s ease-in-out infinite;
      margin: 20px;
    }

    @keyframes float {
      0%, 100% { transform: translateY(0px); }
      50% { transform: translateY(-10px); }
    }

    .success {
      padding: 15px;
      margin: 20px 0;
      background: #d4edda;
      color: #155724;
      border-radius: 10px;
      font-weight: bold;
      text-align: center;
    }

    .error {
      padding: 15px;
      margin: 20px 0;
      background: #f8d7da;
      color: #721c24;
      border-radius: 10px;
      font-weight: bold;
      text-align: center;
    }

    @media (max-width: 768px) {
      .contact-container {
        flex-direction: column;
        align-items: center;
      }
    }
  </style>
</head>
<body>

  <nav class="nav-bar">
    <a href="../index.php">Home</a>
    <a href="../about.html">About</a>
    <a href="../index.html#education">Education</a>
    <a href="../index.html#skills">Skills</a>
    <a href="../index.html#projects">Projects</a>
  </nav>

  <div class="contact-container">
    <div class="cute-image"></div>

    <form class="contact-form" method="POST">
      <h2>Contact Me 💌</h2>
      <?php echo $responseMessage; ?>
      <input type="text" name="name" placeholder="Your Name" required>
      <input type="email" name="email" placeholder="Your Email" required>
      <textarea name="message" rows="5" placeholder="Your Message" required></textarea>
      <button type="submit">Send Message</button>
    </form>
  </div>

</body>
</html>
