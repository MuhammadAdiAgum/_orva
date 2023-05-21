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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <title>Hello, world!</title>

  <style>
    @import url('https://fonts.googleapis.com/css2?family=Cutive+Mono&display=swap');
    @import url("https://use.fontawesome.com/releases/v5.15.0/css/all.css");

    @font-face {
      font-family: "MetalFont";
      src: url('assets/fonts/MetalShow.ttf');
    }

    .my-metal-font {
      font-family: "MetalFont";
    }

    .my-brand {
      font-family: "MetalFont";
      letter-spacing: 5px;
      font-size: 50px;
      text-align: center;
    }
  </style>

</head>

<body>

  <nav class="text-center navbar-dark bg-dark m-0 p-0">
    <div class="container">
      <a class="navbar-brand m-0 p-0" href="#">
        <!-- <img src="orva.png" alt="" width="30" height="24" class="d-inline-block align-text-top"> -->
        <span class="my-brand">ORVA</span>
      </a>
    </div>
  </nav>

  <div class="container">
    <h4 class="text-center mt-4 mb-4">ACTIVITIES</h4>
    <div class="row">
      <div class="col-lg-2 text-center"></div>
      <div class="col-lg-8 border border-secondary rounded">

        <div class="accordion" id="accordionPanelsStayOpenExample">

          <?php

          $x = 0;
          foreach ($log as $log_list) {
            $log_date = date('d F Y', strtotime($log_list['0'])); #. shell_exec("date +'%Y'");
            $log_time = date('H:i:s ', strtotime($log_list['1'] . ':' . $log_list['2'] . ':' . $log_list['3']));
            $protokol = preg_replace("/[^a-zA-Z0-9]/", "", $log_list['9']);
            // $log_time = $log_list['1'].'-'.$log_list['2'].'-'.$log_list['3'];
            $id = 'id-' . $x;
            $x++;



            // echo $id;

          ?>

            <div class="accordion-item">
              <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                <div class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                  <table class="table table-bordereless m-0 p-0 ">
                    <tr>
                      <td>ID : <?= $log_list['10'] . ':' . $log_list['11']; ?></td>
                      <td>Date : <?= $log_date; ?></td>
                      <td>Time : <?= $log_time; ?></td>
                    </tr>
                  </table>
                </div>
              </h2>
              <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingOne">
                <div class="accordion-body">
                  <strong>This is the first item's accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                </div>
              </div>
            </div>
          <?php } ?>
        </div>

      </div>
      <div class="col-lg-2 text-center"></div>
    </div>
  </div>






  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>