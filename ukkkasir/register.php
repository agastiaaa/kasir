<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Halaman Register</title>
    <link rel="stylesheet" href="style.css" />
  </head>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #2F4F4F;
      margin: 0;
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
    }

    .container {
      background-color: white;
      padding: 40px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      width: 350px;
    }

    form {
      display: flex;
      flex-direction: column;
    }

    label {
      margin-bottom: 8px;
    }

    input {
      padding: 12px;
      margin-bottom: 16px;
    }

    button {
      background-color: #3498db;
      color: white;
      padding: 14px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      margin-top: 30px;
    }

    a {
      color: #3498db;
      text-decoration: none;
    }

    a:hover {
      text-decoration: underline;
    }

    h2 {
      text-align: center;
    }

    p {
      text-align: center;
    }
  </style>
  <body>
    <div class="container">
      <form action="register_proses.php" method="post">
        <h2>REGISTER</h2>
        <label for="username">Username:</label>
        <input type="text" name="username" required />

        <label for="password">Password:</label>
        <input type="password" name="password" required />

        <label for="role">Role:</label>
        <select name="role">
          <option value="admin">Admin</option>
          <option value="petugas">petugas</option>
        </select>

        <button type="submit">Register</button>
      </form>
    </div>
  </body>
</html>
