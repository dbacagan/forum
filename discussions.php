<?php require('includes/config.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>FORUM</title>
      <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="style/bootstrap.css">
    <link rel="stylesheet" href="main.css">
 </head>
<style>
  #wrapper{
    padding: 50px 70px;
  }

</style>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="#">FORUM</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  
  <div class="collapse navbar-collapse" id="navbarColor01">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="index.php">HOME</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="#">DISCUSSIONS<span class="sr-only">(current)</span></a>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="#blog">LOG-IN / LOG-OUT</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="text" placeholder="Search">
      <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>

<div id="wrapper">
  <h1>Discussions</h1>
  <div class="row">
    <div class="col-sm-9">
      <p>Read the latest discussions</p>
    </div>
    <div class="col-sm-3">
       <button type="button" class="btn btn-outline-primary">Add a discussion</button>
    </div>
  </div>
  
  <?php 
    try {
      $stmt = $db->query('SELECT id, subject, created, user_account_id FROM thread ORDER BY id DESC');
      while($row = $stmt->fetch()){
        echo '<table class="table table-hover">';
        echo '<thead>';
        echo '<tr>';
        echo '<th scope="col">Discussion ID</th>';
        echo '<th scope="col">Subject</th>';
        echo '<th scope="col">Created</th>';
        echo '<th scope="col">Created by</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';
        echo '<tr>';
        echo '<th scope="row">'.$row['id'].'</th>';
        echo '<td>'.$row['subject'].'</th>';
        echo '<td>'.$row['created'].'</th>';
        echo '<td>'.$row['subject'].'</th>';
        echo '<td>'.$row['user_account_id'].'</th>';
        echo '</tr>';
        echo '</tbody>';
        echo '</table>';
      }
    } catch(PDOException $e) {
      echo $e->getMessage();
    }
  ?>  
</div>
</body>
</html>
