<?php

require 'function.php';

$id = $_GET['id'];
$log_detail = logDetail($id);

// var_dump($log_detail); 

?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="assets/css/my.css">
  <!-- <link rel="stylesheet" href="assets/css/font-awesome.min.css"> -->
  <!-- <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.no-icons.min.css" rel="stylesheet"> -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

  <title>orva-test</title>
</head>

<body>
  <!-- <h1>Hello, world!</h1> -->

  <nav class="text-center navbar-dark bg-dark m-0 p-0">
    <div class="container">
      <a class="navbar-brand m-0 p-0" href="#">
        <!-- <img src="orva.png" alt="" width="30" height="24" class="d-inline-block align-text-top"> -->
        <span class="my-brand">ORVA</span>
      </a>
    </div>
  </nav>

  <div class="container">
    <div class="text-center">
      <h2 class="mt-4 text-center">test-654</h2>
      <!--<p class="mb-4">oke belum boleh</p>-->
    </div>
    <hr>
    <div class="row">
      <div class="col-lg-2"></div>
      <div class="col-lg-8 table-responsive">
        <div class="mt-1">
          <div class="row">
            <div class="col-md-6 mx-auto">
              <div class="input-group">
                <input disabled class="form-control rounded-pill text-dark" placeholder="" value="ID : <?= $id; ?>">
                <span class="text-center">
                  <button disabled class="align-middle btn btn-outline-light bg-transparent border-1 rounded-pill ms-n5" type="button">
                    <i class="fa fa-user-secret text-dark"></i>
                  </button>
                </span>
              </div>
            </div>
          </div>
        </div>

        <div class="card text-white border-secondary mt-3 mb-3">
          <div class="card-body bg-light p-0">
            <table class="table table-bordered m-0">
              <thead class="table-dark">
                <tr>
                  <td class="text-center" colspan="4">
                    <span style="letter-spacing: 1.5px;">
                      <strong>DETAILS</strong>
                    </span>
                  </td>
                </tr>
              </thead>
              <tbody class="table-secondary align-middle">
                <tr>
                  <th scope="row">IP Address (Attacker)</th>
                  <td><?= $log_detail['ip_penyerang']; ?></td>
                  <th scope="row">IP Address (Target)</th>
                  <td><?= $log_detail['ip_target']; ?></td>
                </tr>
                <tr>
                  <th scope="row">Port (Attacker)</th>
                  <td><?= $log_detail['port_penyerang']; ?></td>
                  <th scope="row">Port (Target)</th>
                  <td><?= $log_detail['port_target']; ?></td>
                </tr>
                <tr>
                  <th scope="row">Attack Method</th>
                  <td><?= $log_detail['metode_serangan']; ?></td>
                  <th scope="row">Protocol</th>
                  <td><?= $log_detail['protokol']; ?></td>
                </tr>
                <tr>
                  <th scope="row">Date (server time)</th>
                  <td><?= $log_detail['tanggal_penyerangan']; ?></td>
                  <th scope="row">Time (server time)</th>
                  <td><?= $log_detail['waktu_penyerangan']; ?></td>
                </tr>
              </tbody>
              <tfoot class="table-dark">
                <tr>
		  <!--<td class="text-end" colspan="4"><span class="text-muted">Priority : </span><strong><?= $log_detail['tingkat_prioritas']; ?></strong></td>-->
		  <td class="text-end text-muted" colspan="4">attacker</td>
                </tr>
              </tfoot>
            </table>
          </div>
          <!-- <div class="text-end card-footer text-light bg-dark border-secondary">
            <span class="">ID : </span><strong><?= $id; ?></strong>
          </div> -->
        </div>

        <div class=" text-center align-middle">
          <a href="index.php">
            <button class="btn align-middle btn-success">
              <i class="fa fa-arrow-left fa-fw"></i>
              Back
            </button>
          </a>
        </div>

        <!-- </div> -->
        <div class="col-lg-2"></div>
      </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>
