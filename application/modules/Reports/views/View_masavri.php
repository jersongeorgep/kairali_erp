<div class="card">
    <div class="card-header">
        <h4 class="card-title"><?php echo $pagename; ?></h4>
    </div>
    <div class="card-body">
        <div class="card-block">
            <?php if (count($members)) {
            ?>
                <table class="table table-striped table-bordered table-sm" style="font-size:13px">
                    <thead>
                        <tr>
                            <th class="text-center" width="5%" rowspan="2">Sl</th>
                            <th class="text-center" width="10%" rowspan="2">Code</th>
                            <th class="text-center" width="20%" rowspan="2">Members</th>
                            <th class="text-center" width="50%" colspan="12">This Year <?= $selected_year ?> received masavari and date </th>
                            <th class="text-center" width="10%" rowspan="2">Total</th>
                        </tr>
                        <tr>
                            <?php
                            for ($i = 1; $i < 13; $i++) {
                                echo  '<th>' . get_month_fullname($i, 'M') . '</th>';
                            }
                            ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $k = 1;
                        $total = 0;

                        foreach ($members as $keys) {
                        if(get_total_vari($keys->id, $selected_year) !=0){
                            $total += get_total_vari($keys->id, $selected_year);
                        ?>
                            <tr>
                                <td class="text-center"><?php echo $k; ?></td>
                                <td class="text-center"><?= $keys->barcode; ?></td>
                                <td><?= $keys->name; ?></td>
                                <?php
                                for ($j = 1; $j < 13; $j++) {
                                    echo  '<td class="text-center" >' . get_monthly_vari_status($keys->id, $selected_year, $j) . '</td>';
                                }
                                ?>
                                <td class="text-right"><?= number_format(get_total_vari($keys->id, $selected_year), 2); ?></td>
                            </tr>
                        <?php
                        $k++;
                        }
                        }
                        ?>
                    </tbody>
                        
                    <tfoot>
                        <tr>
                            <th colspan="15" class="text-right"> Grand Total</th>
                            <th class="text-right"><?= number_format($total, 2); ?></th>
                        <tr>
                    </tfoot>
                </table>
            <?php } ?>
        </div>
    </div>
</div>