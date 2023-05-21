<?php
require 'function.php';

$log = logCatch();
$log_count = logCount();

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
  <title>Log Dashboard - orva_v4</title>
</head>

<body>
  <nav style="height: 75px" class="text-center navbar-dark bg-dark d-flex align-items-center justify-content-center">
    <div class="container">
      <a class="navbar-brand m-0 p-0" href="#">
        <!-- <img src="orva.png" alt="" width="30" height="24" class="d-inline-block align-text-top"> -->
        <span class="my-brand">LOG DASHBOARD</span>
      </a>
    </div>
  </nav>
  <div class="container mt-4">
    <div class="row">
      <div class="col-lg-2"></div>
      <div class="col-lg-8">
        <div class="row">
          <div class="col-md-6 mx-auto">
            <div class="input-group">
              <input class="form-control rounded-pill" placeholder="ID Search" id="keyword">
              <span class="text-center">
                <button disabled class="align-middle btn btn-outline-light bg-transparent border-1 rounded-pill ms-n5" type="button">
                  <i class="fa fa-search text-success"></i>
                </button>
              </span>
            </div>
          </div>
        </div>
        <div class="card border bg-secondary border-secondary mt-3 mb-3" id="container">
          <div class="card-header bg-dark text-start text-white" style="letter-spacing: 2px; font-size: 17px;">
            <strong>
              ATTACK ATTEMPT RECORD
            </strong>
          </div>
          <div class="card-body m-0 p-0" style="max-height: 450px; overflow-y: scroll;">
            <div class="accordion ">
              <?php
              $x = 0;
              foreach ($log as $log_list) {

                // orva-v4
                $v4_id = $log_list['3'];

                $origin_attack_timestamp_format = 'm/d/y-H:i:s.u';
                $origin_attack_timestamp = $log_list['4'];
                // $convert_date = DateTimeImmutable::createFromFormat($origin_attack_timestamp_format, $origin_attack_timestamp);

                $v4_rsyslog_date = date('d/m/Y', strtotime($log_list['0'])); #. shell_exec("date +'%Y'");
                $v4_rsyslog_time = date('H:i:s ', strtotime($log_list['1']));

                if ($log_list['12'] == "1000003") {
                  $v4_type = "SSH Brute Force";
                  $v4_target_server = "SSH";
                  $v4_attacker_method = "Brute Force";
                } else if ($log_list['12'] == "1000002") {
                  $v4_type = "FTP Brute Force";
                  $v4_target_server = "FTP";
                  $v4_attacker_method = "Brute Force";
                } else if ($log_list['12'] == "1000001") {
                  $v4_type = "SQL Injection";
                  $v4_target_server = "SQL";
                  $v4_attacker_method = "SQL Injection";
                }

                $v4_target_data_center = $log_list['2'];
                $v4_target_protocol = $log_list['10'];
                $v4_target_mac_address = $log_list['15'];
                $v4_target_ip_address = $log_list['8'];
                $v4_target_port = $log_list['9'];

                $v4_attacker_mac_address = $log_list['14'];
                $v4_attacker_ip_address = $log_list['6'];
                $v4_attacker_port = $log_list['7'];
                //==== accordion ===========================================================
                $id = 'id-' . $x;
                $x++;
                //==========================================================================
                if ($log_list['6'] == null && $log_list['7'] == null) {
                  $log_count = 0; ?>
                  <div class="accordion-item border-0 rounded-0 d-flex align-items-center justify-content-center p-3">
                    <span style="letter-spacing: 1px;" class=""><b>No Activities.</b></span>
                  </div>
                <?php
                } else {
                  $v4_attack_date = DateTimeImmutable::createFromFormat($origin_attack_timestamp_format, $origin_attack_timestamp)->format('d/m/Y');
                  $v4_attack_time = DateTimeImmutable::createFromFormat($origin_attack_timestamp_format, $origin_attack_timestamp)->format('H:i:s');
                ?>
                  <div class="accordion-item rounded-0">
                    <div class="accordion-button border-0 rounded-0 collapsed pt-2 pb-2" data-bs-toggle="collapse" data-bs-target="#<?= $id; ?>">
                      <table width="100%" class=" table table-borderless p-0 m-0">
                        <tr>
                          <td width="55%" class="ps-0">
                            Alert : <strong><?= $v4_type; ?></strong> <i>in</i> <strong><?= $v4_target_data_center; ?></strong>
                          </td>
                          <td width="30" class="ps-0">
                            Time : <strong><?= $v4_attack_date; ?></strong> <strong><?= $v4_attack_time; ?></strong>
                          </td>
                          <td width="15%" class="ps-0">
                            ID : <strong><?= $v4_id; ?></strong>
                          </td>
                        </tr>
                      </table>
                    </div>
                    <div id="<?= $id; ?>" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingOne">
                      <div class="accordion-body">
                        <div class="row">
                          <div class="col-lg-6">
                            <div class="my-border mb-3">
                              <table class="table table-responsive m-0 p-0">
                                <thead>
                                  <tr class="bg-secondary text-white">
                                    <th colspan="3">TARGET INFO</th>
                                  </tr>
                                </thead>
                                <tbody class="table-secondary">
                                  <tr>
                                    <td width="30%">Data Center</td>
                                    <td>:</td>
                                    <td><strong><?= $v4_target_data_center; ?></strong></td>
                                  </tr>
                                  <tr>
                                    <td width="30%">Server</td>
                                    <td>:</td>
                                    <td><strong><?= $v4_target_server; ?> Server</strong></td>
                                  </tr>
                                  <tr>
                                    <td width="30%">IP Address</td>
                                    <td>:</td>
                                    <td><strong><?= $v4_target_ip_address; ?></strong></td>
                                  </tr>
                                  <tr>
                                    <td width="30%">Port</td>
                                    <td>:</td>
                                    <td><strong><?= $v4_target_port; ?></strong></td>
                                  </tr>
                                  <tr>
                                    <td width="30%">Mac Address</td>
                                    <td>:</td>
                                    <td><strong><?= $v4_target_mac_address; ?></strong></td>
                                  </tr>
                                </tbody>
                              </table>
                            </div>
                          </div>
                          <div class="col-lg-6">
                            <div class="my-border mb-3">
                              <table class="table table-responsive p-0 m-0">
                                <thead>
                                  <tr class="bg-secondary text-white">
                                    <th colspan="4">ATTACKER INFO</th>
                                  </tr>
                                </thead>
                                <tbody class="table-secondary">
                                  <tr>
                                    <td width="30%">Method</td>
                                    <td>:</td>
                                    <td><strong><?= $v4_attacker_method; ?></strong></td>
                                  </tr>
                                  <tr>
                                    <td width="30%">Protocol</td>
                                    <td>:</td>
                                    <td><strong><?= $v4_target_protocol; ?></strong></td>
                                  </tr>
                                  <tr>
                                    <td width="30%">IP Address</td>
                                    <td>:</td>
                                    <td><strong><?= $v4_attacker_ip_address; ?></strong></td>
                                  </tr>
                                  <tr>
                                    <td width="30%">Port</td>
                                    <td>:</td>
                                    <td><strong><?= $v4_attacker_port; ?></strong></td>
                                  </tr>
                                  <tr>
                                    <td width="30%">Mac Address</td>
                                    <td>:</td>
                                    <td><strong><?= $v4_attacker_mac_address; ?></strong></td>
                                  </tr>
                                </tbody>
                              </table>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-6">
                            <div class="my-border mb-3">
                              <table class="table table-responsive p-0 m-0">
                                <thead>
                                  <tr class="bg-secondary text-white">
                                    <th colspan="4">SNORT TIMESTAMP</th>
                                  </tr>
                                </thead>
                                <tbody class="table-secondary">
                                  <tr>
                                    <td width="30%">Date</td>
                                    <td>:</td>
                                    <td><strong><?= $v4_attack_date; ?></strong></td>
                                  </tr>
                                  <tr>
                                    <td width="30%">Time</td>
                                    <td>:</td>
                                    <td><strong><?= $v4_attack_time; ?></strong></td>
                                  </tr>
                                </tbody>
                              </table>
                            </div>
                          </div>
                          <div class="col-lg-6">
                            <div class="my-border mb-3">
                              <table class="table table-responsive p-0 m-0">
                                <thead>
                                  <tr class="bg-secondary text-white">
                                    <th colspan="4">RSYSLOG TIMESTAMP</th>
                                  </tr>
                                </thead>
                                <tbody class="table-secondary">
                                  <tr>
                                    <td width="30%">Date</td>
                                    <td>:</td>
                                    <td><strong><?= $v4_rsyslog_date; ?></strong></td>
                                  </tr>
                                  <tr>
                                    <td width="30%">Time</td>
                                    <td>:</td>
                                    <td><strong><?= $v4_rsyslog_time; ?></strong></td>
                                  </tr>
                                </tbody>
                              </table>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                <?php } ?>
              <?php } ?>
            </div>
          </div>
          <div class="card-footer bg-dark">
            <div class="row">
              <div class="text-end text-white">
                <span class="text-muted">Log Count : </span>
                <strong class=""><?= $log_count; ?></strong>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-2"></div>
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