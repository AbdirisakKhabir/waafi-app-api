<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payments | payments App</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

</head>
<body>

<nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Payment App</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="paynow.php">Pay Now</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="transactions.php">Payments</a>
        </li>
     
       
      </ul>
    </div>
  </div>
</nav>


<div class="conatainer">
    <div class="row justify-content-center mt-4">
        <div class="col-6">
        <div class="card">
  <div class="card-header">
    <?php
    include 'functions.php';
    ?>
    Transactions
  </div>
  <div class="card-body">
  <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Phone Number</th>
      <th scope="col">Amount</th>
      <!-- <th scope="col">Status</th> -->
    </tr>
  </thead>
  <tbody>
    <?php
    transactions();
    ?>
  
  </tbody>
</table>
  </div>
</div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>