<?php if (count($members)) {
?>
    <h2 class="text-center"><?= $pagename; ?></h2>
    <table cellpadding="3" cellspacing="0" width="100%"  style="font-size:9px">
        <thead>
            <tr>
                <th style="border: 1px solid #333" align="center" width="10%" rowspan="2">Sl</th>
                <th style="border: 1px solid #333" align="center" width="10%" rowspan="2">Code</th>
                <th style="border: 1px solid #333" align="center" width="20%" rowspan="2">Members</th>
                <th style="border: 1px solid #333" align="center" width="50%" colspan="12">This Year <?= $selected_year ?> received masavari and date </th>
                <th style="border: 1px solid #333" align="center" width="10%" rowspan="2">Total</th>
            </tr>
            <tr>
                <?php
                for ($i = 1; $i < 13; $i++) {
                    echo  '<th style="border: 1px solid #333" align="center">' . get_month_fullname($i, 'M') . '</th>';
                }
                ?>
            </tr>
        </thead>
        <tbody>
            <?php
            $j = 1;
            $total = 0;
            foreach ($members as $keys) {
                if(get_total_vari($keys->id, $selected_year) !=0){
                    $total += get_total_vari($keys->id, $selected_year);
            ?>
                <tr>
                    <td style="border: 1px solid #333" align="center" width="10%"><?php echo $j; ?></td>
                    <td style="border: 1px solid #333" align="center" width="10%"><?= $keys->barcode; ?></td>
                    <td style="border: 1px solid #333" width="20%"><?= $keys->name; ?></td>
                    <?php
                    for ($k = 1; $k < 13; $k++) {
                        echo  '<td style="border: 1px solid #333" width="4.16%" align="center" >' . get_monthly_vari_status($keys->id, $selected_year, $k, 'print') . '</td>';
                    }
                    ?>
                    <td style="border: 1px solid #333" width="10%" align="right"><?= number_format(get_total_vari($keys->id, $selected_year), 2); ?></td>
                </tr>
            <?php
                $j++;
            }
            }
            ?>
        </tbody>
        <tfoot>
            <tr>
                <th  style="border: 1px solid #333" colspan="15" align="right"> <b>Grand Total</b></th>
                <th  style="border: 1px solid #333" align="right"><b><?= number_format($total,2); ?></b></th>
            </tr>
        </tfoot>
    </table>
<?php } ?>