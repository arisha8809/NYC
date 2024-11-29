<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login | NYC Movie & Music Map</title>
  <style>
    /* Styles unchanged */
    body {
      font-family: Arial, sans-serif;
      background-color: black;
      color: white;
      margin: 0;
      padding: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      overflow: hidden;
      position: relative;
    }

    .floating-stars {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: url('images/nyc.jpg') repeat;
      opacity: 0.1;
      animation: floating 60s linear infinite;
      z-index: 0;
    }

    @keyframes floating {
      0% {
        background-position: 0 0;
      }

      100% {
        background-position: 1000px 1000px;
      }
    }

    .login-container {
      background-color: rgba(0, 0, 0, 0.85);
      padding: 40px;
      border-radius: 15px;
      box-shadow: 0 0 30px rgba(255, 255, 255, 0.2), 0 0 60px rgba(255, 255, 255, 0.1);
      width: 350px;
      text-align: center;
      position: relative;
      z-index: 1;
      animation: fadeIn 1.5s ease-in-out;
    }

    @keyframes fadeIn {
      0% {
        transform: scale(0.9);
        opacity: 0;
      }

      100% {
        transform: scale(1);
        opacity: 1;
      }
    }

    h2 {
      margin-bottom: 20px;
      font-size: 2.5rem;
      color: white;
      text-transform: uppercase;
      text-shadow: 0 0 10px rgba(255, 255, 255, 0.5);
      animation: glow 2s ease-in-out infinite alternate;
    }

    @keyframes glow {
      0% {
        text-shadow: 0 0 10px rgba(255, 255, 255, 0.5), 0 0 20px rgba(255, 255, 255, 0.4), 0 0 30px rgba(255, 255, 255, 0.3);
      }

      100% {
        text-shadow: 0 0 20px rgba(255, 255, 255, 0.8), 0 0 30px rgba(255, 255, 255, 0.6), 0 0 40px rgba(255, 255, 255, 0.5);
      }
    }

    input {
      width: 100%;
      padding: 12px;
      margin: 10px 0;
      border: none;
      border-radius: 5px;
      background-color: rgba(255, 255, 255, 0.2);
      color: white;
      font-size: 1rem;
      box-shadow: 0 0 10px rgba(255, 255, 255, 0.1);
      transition: all 0.3s ease-in-out;
      backdrop-filter: blur(5px);
    }

    input:focus {
      outline: none;
      background-color: rgba(255, 255, 255, 0.3);
      box-shadow: 0 0 20px rgba(255, 255, 255, 0.3);
    }

    button {
      width: 100%;
      padding: 12px;
      margin-top: 20px;
      background: linear-gradient(135deg, #6b8cff, #88a2ff);
      border: none;
      border-radius: 5px;
      color: white;
      font-size: 1rem;
      cursor: pointer;
      transition: all 0.3s ease-in-out;
      box-shadow: 0 0 10px rgba(255, 255, 255, 0.3);
    }

    button:hover {
      background-color: #005bb5;
      box-shadow: 0 0 20px rgba(255, 255, 255, 0.5);
    }

    .links {
      margin-top: 20px;
    }

    .links a {
      color: #88a2ff;
      text-decoration: none;
      transition: all 0.3s ease-in-out;
    }

    .links a:hover {
      text-decoration: underline;
    }

    .error-message {
      color: red;
      font-size: 0.9rem;
    }
  </style>
</head>

<body>
  <!-- Floating stars background -->
  <div class="floating-stars"></div>

  <div class="login-container">
    <h2 id="form-title">Login</h2>
    <form id="auth-form" method="post">
      <input type="email" name="email" id="email" placeholder="Email" required>
      <input type="password" name="password" id="password" placeholder="Password" required>
      <div id="confirm-password-field" style="display: none;">
        <input type="password" name="confirm_password" id="confirm_password" placeholder="Confirm Password">
      </div>
      <button type="submit" id="submit-button">Login</button>
      <p class="error-message" id="error-message"></p>
    </form>
    <div class="links">
      <a href="#" id="toggle-form">Don't have an account? Sign Up</a><br>
      <a href="#">Forgot Password?</a>
    </div>
  </div>

  <?php
  $servername = "localhost";
  $username = "root";
  $password = "arisha8809.";
  $dbname = "nyc";

  $conn = new mysqli($servername, $username, $password, $dbname);

  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $email = $_POST["email"];
      $password = $_POST["password"];

      if (isset($_POST["confirm_password"]) && !empty($_POST["confirm_password"])) { // If sign-up mode
          $confirm_password = $_POST["confirm_password"];
          if ($password !== $confirm_password) {
              echo "<script>document.getElementById('error-message').textContent = 'Passwords do not match';</script>";
          } else {
              $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
              $sql = "INSERT INTO users (email, password) VALUES (?, ?)";
              $stmt = $conn->prepare($sql);
              $stmt->bind_param("ss", $email, $hashedPassword);

              if ($stmt->execute()) {
                  echo "<script>alert('Sign-up successful! Please log in.');</script>";
              } else {
                  echo "<script>alert('Error during sign-up. Try again.');</script>";
              }
          }
      } else { // If login mode
          $sql = "SELECT * FROM users WHERE email = ?";
          $stmt = $conn->prepare($sql);
          $stmt->bind_param("s", $email);
          $stmt->execute();
          $result = $stmt->get_result();

          if ($result->num_rows > 0) {
              $user = $result->fetch_assoc();
              if (password_verify($password, $user["password"])) {
                  echo "<script>window.location.href = 'nyc.html';</script>";
              } else {
                  echo "<script>document.getElementById('error-message').textContent = 'Invalid password';</script>";
              }
          } else {
              echo "<script>document.getElementById('error-message').textContent = 'No account found for this email';</script>";
          }
      }
  }

  $conn->close();
  ?>

  <script>
    const toggleFormLink = document.getElementById('toggle-form');
    const formTitle = document.getElementById('form-title');
    const submitButton = document.getElementById('submit-button');
    const confirmPasswordField = document.getElementById('confirm-password-field');

    toggleFormLink.addEventListener('click', function (e) {
      e.preventDefault();

      if (submitButton.textContent === 'Login') {
        formTitle.textContent = 'Sign Up';
        submitButton.textContent = 'Sign Up';
        toggleFormLink.textContent = "Already have an account? Login";
        confirmPasswordField.style.display = "block";
      } else {
        formTitle.textContent = 'Login';
        submitButton.textContent = 'Login';
        toggleFormLink.textContent = "Don't have an account? Sign Up";
        confirmPasswordField.style.display = "none";
      }
    });
  </script>
</body>

</html>
