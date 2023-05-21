<?php
require 'function.php';

$log = logCatch();
$log_count = logCount();

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
  <!-- <link rel="stylesheet" href="assets/css/font-awesome.min.css"> -->
  <!-- <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.no-icons.min.css" rel="stylesheet"> -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

  <title>orva-test</title>

</head>

<body>
  <!-- <h1>Hello, world!</h1> -->

  <nav class=" text-center navbar-dark bg-dark m-0 p-0">
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
      <!-- <p class="mb-4">oke belum boleh</p> -->
    </div>

    <hr>

    <div class="mt-1">
      <div class="row">
        <div class="col-md-6 mx-auto">
          <div class="input-group">
            <input class="form-control rounded-pill" placeholder="search" id="keyword">
            <span class="text-center">
              <button disabled class="align-middle btn btn-outline-light bg-transparent border-1 rounded-pill ms-n5" type="button">
                <i class="fa fa-search text-success"></i>
              </button>
            </span>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <!-- <div class="col-lg-2"></div> -->
      <div class="col-lg-8 table-responsive">
        <div class="card text-white border-secondary mt-3" id="container">
          <table class="table m-0 table-borderedless table-hover">
            <thead class="table-dark">
              <tr>
                <td class="text-center" colspan="4">
                  <span style="letter-spacing: 1.5px;">
                    <strong>ACTIVITIES</strong>
                  </span>
                </td>
              </tr>
            </thead>
            <tbody class="table-secondary align-middle">
              <?php
              foreach ($log as $log_list) {
                $log_date = date('d F Y', strtotime($log_list['0'])); #. shell_exec("date +'%Y'");
                $log_time = date('H:i:s ', strtotime($log_list['1']));
              ?>
                <tr data-bs-toggle="collapse" data-bs-target="#tes1">
                  <td width="37%">
                    ID :
                    <strong>
                      <?= $log_list['4']; ?>
                    </strong>
                  </td>
                  <td width="30%">
                    Date :
                    <strong>
                      <?= $log_date; ?>
                    </strong>
                  </td>
                  <td width="20%" class="text-end">
                    Time :
                    <strong>
                      <?= $log_time; ?>
                    </strong>
                  </td>
                  <td width="13%" class="text-end">
                    <!-- <a href="detail.php?id=<?= $log_list['4']; ?>"> -->
                    <a data-bs-toggle="collapse" href="#tes1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">
                      <button class="btn btn-outline-success btn-sm">
                        <i class="fa fa-info-circle fa-fw"></i>
                        more
                      </button>
                    </a>
                  </td>
                </tr>
              <?php } ?>
            </tbody>
            <tfoot class="table-dark">
              <tr>
                <td class="text-end" colspan="4"><span class="text-muted">Log Count : </span><strong><?= $log_count; ?></strong></td>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>



      <div class="col-lg-4">
        <div class="card text-white border-secondary mt-3" id="container">
          <table class="table m-0 table-borderedless table-hover">
            <thead class="table-dark">
              <tr>
                <td class="text-center" colspan="4">
                  <span style="letter-spacing: 1.5px;">
                    <strong>DETAIL</strong>
                  </span>
                </td>
              </tr>
            </thead>
            <tbody class="table-secondary align-middle">
              <tr>
                <td>
                  <div id="tes1" class="collapse" aria-labelledby="panelsStayOpen-headingOne">
                    <!-- <div class="accordion-body"> -->
                    <strong>This is the first item's accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                    <!-- </div> -->
                  </div>
                </td>
              </tr>
            </tbody>
            <tfoot class="table-dark">
              <tr>
                <td class="text-end" colspan="4"><span class="text-muted">Log Count : </span><strong><?= $log_count; ?></strong></td>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
      <!-- <div class="col-lg-2"></div> -->
    </div>
  </div>

  <script src="assets/js/my.js"></script>

  <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>

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