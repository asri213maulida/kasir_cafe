<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Input Menu</title>
  <style>
    .main {
      display: flex;
      height: 100vh;
    }

    .menu {
      background-color: #adcbe3;
      width: 200px;
      padding: 15px;
    }

    .menu a {
      display: block;
      margin: 10px 0;
      color: black;
      text-decoration: none;
    }

    .content {
      flex-grow: 1;
      padding: 20px;
      background-color: whitesmoke;
    }

    .form-label {
      display: block;
      margin-bottom: 5px;
    }

    .form-control {
      padding: 5px;
      width: 300px;
    }
  </style>
</head>
<body>
  <div class="main">
    <?php include('headerdll/sidebar.php'); ?>
    
    <div class="content">
      <label for="judul" class="form-label">Judul Buku</label>
      <input type="text" class="form-control" id="judul" name="judul" placeholder="Judul"/>
    </div>
  </div>
</body>
</html>
