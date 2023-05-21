<?php

$keyword = $_GET["keyword"];

$log = shell_exec("cat /var/log/snort-test/alert | grep '{$keyword}' | cut -d ' ' -f 1,6-7,13 | tr '-' ' ' ");
$log_explode1 = array_filter(explode("\n", $log));
$log_implode1 = implode(" ", $log_explode1);
$log_explode2 = explode(" ", $log_implode1);
$log_chunk = array_chunk($log_explode2, 5);
$log_result = array_reverse($log_chunk);

$log_count = count($log_result);



?>

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


        foreach ($log_result as $log_list) {

            $log_date = date('d F ', strtotime($log_list['0'])) . shell_exec("date +'%Y'");
            $log_time = date('H:i:s ', strtotime($log_list['1']));

            if ($log_count == 1 && $log_list['4'] == "") {
                $log_count = 0; ?>
                <tr>
                    <td>No Result</td>
                </tr>
            <?php
            } else { ?>
                <tr>
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
            <?php
            }
            ?>
        <?php } ?>
    </tbody>
    <tfoot class="table-dark">
        <tr>
            <td class="text-end" colspan="4"><span class="text-muted">Log Count : </span><strong><?= $log_count; ?></strong></td>
        </tr>
    </tfoot>
</table>