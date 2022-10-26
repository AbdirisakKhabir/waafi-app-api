<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pay Now payments App</title>
    
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
    Pay Now
  </div>
  <div class="card-body">

  <?php
    include 'functions.php';
    ?>
  <form method="POST">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Phone Number</label>
    <input type="number" name="phoneNumber" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Phone Number">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Amount</label>
    <input type="text" name="amountPaid" placeholder="Amount" class="form-control" id="exampleInputPassword1">
  </div>

  <button type="submit" name="submit" class="btn btn-primary">Pay Now</button>
</form>
  <?php
  if(isset($_POST['submit'])){
    processPayment();
  }
?>

  </div>
</div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>