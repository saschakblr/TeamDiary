<!doctype html>
<html lang="de">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="/css/style.css">

  <title><?= $title; ?> | TeamDiary</title>
</head>

<body>

  <header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="profilePic" id="pb"></div>
      <a class="navbar-brand" href="/post/home">TeamDiary</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="/post/home">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/user/profile">Profile</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/user">Users</a>
          </li> 
        </ul>
      </div>
      <img class="companyPic" src="\images\swisscom-logo.png" alt="Company" style>
      <a class="nav-link " id="logout" href="/user/login">Logout</a>
    </nav>
<!-- 
Header -> page login

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" id="logo" href="/post/login">TeamDiary</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
      </button>
      <a class="nav-link " id="signin" href="/user/create">Sign up</a>

    </nav> 


      Header -> page signup 

      <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" id="logo" href="/post/login">TeamDiary</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
      </button>
      <a class="nav-link" id="signin" href="/post/login">Login</a>

      </nav> -->
  </header>

  <?php


  ?>

  <main class="container">
    <div class="titleCont">
      <h1 class="pageTitle"><?= $heading; ?></h1>
    </div>

