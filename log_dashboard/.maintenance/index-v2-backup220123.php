<?php
require 'function.php';

$log = logCatch();
$log_count = logCount();


// var_dump($log)
// 

// var_dump($log)

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
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">


  <title>Hello, world!</title>

</head>

<body>
  <nav class=" text-center navbar-dark bg-dark m-0 p-0">
    <div class="container">
      <a class="navbar-brand m-0 p-0" href="#">
        <!-- <img src="orva.png" alt="" width="30" height="24" class="d-inline-block align-text-top"> -->
        <span class="my-brand">ORVA v2 TEST</span>
      </a>
    </div>
  </nav>

  <div class="container mt-5">

    <div class="row">
      <div class="col-lg-3"></div>
      <div class="col-lg-6">

        <div class="card border border-secondary mb-3">
          <div class="card-header bg-dark text-white">
            <!-- <strong>
              ACTIVITY
            </strong> -->
            <div class="row">
              <div class="col-sm-9 text-start" style="letter-spacing: 1px; font-size: 18px;">
                ANOMALOUS ACTIVITY
              </div>
              <div class="col-sm-3 text-end">
                <span class="text-muted align-middle">Log Count : </span>
                <span class="align-middle"><strong><?= $log_count; ?></strong></span>
              </div>
            </div>
          </div>
          <div class="card-body m-0 p-0" style="max-height: 477px; overflow-y: scroll;">
            <div class="accordion">

              <?php
              $x = 0;
              foreach ($log as $log_list) {
                $log_date = date('d F Y', strtotime($log_list['0'])); #. shell_exec("date +'%Y'");
                $log_time = date('H:i:s ', strtotime($log_list['1'] . ':' . $log_list['2'] . ':' . $log_list['3']));
                $protokol = preg_replace("/[^a-zA-Z0-9]/", "", $log_list['9']);
                // $log_time = $log_list['1'].'-'.$log_list['2'].'-'.$log_list['3'];
                $id = 'id-' . $x;
                $x++;
              ?>
                <div class="accordion-item">
                  <div class="accordion-button collapsed pt-2 pb-2" data-bs-toggle="collapse" data-bs-target="#<?= $id; ?>">
                    <table width="100%" class="table table-borderless p-0 m-0">
                      <tr>
                        <td class="ps-0">ID : <strong><?= $log_list['10'] . ':' . $log_list['11']; ?></strong></td>
                        <td class="ps-0">Date : <strong><?= $log_date; ?></strong></td>
                        <td class="ps-0">Time : <strong><?= $log_time; ?></strong></td>
                      </tr>
                    </table>
                  </div>
                  <div id="<?= $id; ?>" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingOne">
                    <div class="accordion-body">
                      <div class="my-border mb-3">
                        <table class="table table-responsive m-0 p-0">
                          <thead>
                            <tr class="bg-secondary text-white text-center">
                              <th colspan="4">TARGET INFO</th>
                            </tr>
                          </thead>
                          <tbody class="">
                            <tr class="table-secondary text-center">
                              <th width="25%">Service</th>
                              <!-- <th>method</th> -->
                              <th width="25%">Protocol</th>
                              <th width="25%">IP Address</th>
                              <th width="25%">Port</th>
                            </tr>
                            <tr class="table-light text-center">
                              <td><?= $log_list['4']; ?></td>
                              <td><?= $protokol; ?></td>
                              <td><?= $log_list['12']; ?></td>
                              <td><?= $log_list['13']; ?></td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                      <div class="my-border">
                        <table class="table table-responsive p-0 m-0">
                          <thead>
                            <tr class="bg-secondary text-white text-center">
                              <th colspan="4">ATTACKER INFO</th>
                            </tr>
                          </thead>
                          <tbody class="">
                            <tr class="table-secondary text-center">
                              <th width="50%">IP Address</th>
                              <th width="50%">Method</th>
                            </tr>
                            <tr class="table-light text-center">
                              <td><?= $log_list['10']; ?></td>
                              <td><?= $log_list['5']; ?></td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              <?php } ?>
            </div>
          </div>
          <div class="card-footer bg-dark text-end text-white">
            <!-- <span class="text-muted">Log Count : </span>
            <strong><?= $log_count; ?></strong>
          </div> -->
          </div>
        </div>
        <div class="col-lg-3"></div>
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