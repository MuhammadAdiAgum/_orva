<?php

$keyword = $_GET["keyword"];

$log = shell_exec("cat /var/log/snort-test/alert | grep '{$keyword}' | cut -d ' ' -f 1,6-7,13 | tr '-' ' ' ");
$log_explode1 = array_filter(explode("\n", $log));
$log_implode1 = implode(" ", $log_explode1);
$log_explode2 = explode(" ", $log_implode1);
$log_chunk = array_reverse(array_chunk($log_explode2, 5));

// var_dump($log_chunk);

foreach ($log_chunk as $log_list) {

    $log_date = date('d F ', strtotime($log_list['0'])) . shell_exec("date +'%Y'");
    $log_time = date('H:i:s ', strtotime($log_list['1']));
    // var_dump($log_time); die;
?>
    <tr>
        <!-- <td><?= $log_list['2']; ?> <?= $log_list['3']; ?></td> -->
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
            <a href="detail.php?id=<?= $log_list['4']; ?>">
                <button class="btn btn-outline-success btn-sm">
                    <i class="fa fa-info-circle fa-fw"></i>
                    more
                </button>
            </a>
        </td>
    </tr>
<?php } ?>