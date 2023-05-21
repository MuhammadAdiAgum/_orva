<?php

function logCatch()
{
    // LOCAL
    $log_catch = shell_exec('cat /var/log/client/snort/log.csv | grep -E "[0-9]{1,3}.[0-9]{1,3}.[0-9]{1,3}.[0-9]{1,3}" | sed "s/ //g" | tr "," " "');
    $log_explode1 = array_filter(explode("\n", $log_catch));
    $log_implode1 = implode(" ", $log_explode1);
    $log_explode2 = explode(" ", $log_implode1);
    // $log_chunk = array_chunk($log_explode2, 9);
    $log_chunk = array_chunk($log_explode2, 17);

    $log_result = array_reverse($log_chunk);

    return $log_result;
}

function logCount() {
    $log_catch = array_filter(explode("\n", shell_exec('cat /var/log/client/snort/log.csv | grep -E "[0-9]{1,3}.[0-9]{1,3}.[0-9]{1,3}.[0-9]{1,3}" | sed "s/ //g" | tr "," " "')));
    $log_count = count($log_catch);
    return $log_count;
}

// function logDetail($id) {
//     $ip_penyerang = shell_exec("cat /var/log/snort-test/alert | grep -E '{$id}' | cut -d ' ' -f 13 | cut -d ':' -f 1");
//     $port_penyerang = shell_exec("cat /var/log/snort-test/alert | grep -E '{$id}' | cut -d ' ' -f 13 | cut -d ':' -f 2");
//     $metode_serangan = shell_exec("cat /var/log/snort-test/alert | grep -E '{$id}' | cut -d ' ' -f 6,7");
//     $tanggal_penyerangan = date('d F ', strtotime(shell_exec("cat /var/log/snort-test/alert | grep -E '{$id}' | cut -d ' ' -f 1 | cut -d '-' -f 1"))) . shell_exec("date +'%Y'");
//     $waktu_penyerangan = shell_exec("cat /var/log/snort-test/alert | grep -E '{$id}' | cut -d ' ' -f 1 | cut -d '.' -f 1 | cut -d '-' -f 2");
//     $ip_target = shell_exec("cat /var/log/snort-test/alert | grep -E '{$id}' | cut -d ' ' -f 15 | cut -d ':' -f 1");
//     $port_target = shell_exec("cat /var/log/snort-test/alert | grep -E '{$id}' | cut -d ' ' -f 15 | cut -d ':' -f 2");
//     $protokol = preg_replace("/[^a-zA-Z0-9]/", "", shell_exec("cat /var/log/snort-test/alert | grep -E '{$id}' | cut -d ' ' -f 12"));
//     $tingkat_prioritas = preg_replace("/[^a-zA-Z0-9]/", "", shell_exec("cat /var/log/snort-test/alert | grep -E '{$id}' | cut -d ' ' -f 11"));

//     $result = [
//         'ip_penyerang' => $ip_penyerang,
//         'port_penyerang' => $port_penyerang,
//         'metode_serangan' => $metode_serangan,
//         'tanggal_penyerangan' => $tanggal_penyerangan,
//         'waktu_penyerangan' => $waktu_penyerangan,
//         'ip_target' => $ip_target,
//         'port_target' => $port_target,
//         'protokol' => $protokol,
//         'tingkat_prioritas' => $tingkat_prioritas
//     ];
//     // print_r($result); die;
//     return $result;
// }




// TESTING <------------------------
// $log = logCatch('cat /var/log/snort-test/alert | grep -E "[0-9]{1,3}.[0-9]{1,3}.[0-9]{1,3}.[0-9]{1,3}" | cut -d " " -f 1,6-7,13 | tr "-" " " ');

// echo $log;
