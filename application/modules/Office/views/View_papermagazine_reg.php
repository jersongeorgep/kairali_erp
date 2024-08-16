<?php if(count($types)){ ?>
    <table class="table table-striped table-bordered table-sm" style="font-size:13px;">
    	<thead>
        	<tr>
            	<th width="5%" class="center">#</th>
                <th>Paper / Magazine</th>
                <?php for($i=0; $i < date('t',strtotime(01 ."-".$monthdata."-".$yeardata));$i++) { ?>
                <th><?php echo ($i+1); ?></th>
                <?php } ?>              
			</tr>
		</thead>
        <tbody>
        <?php 
			$i 	=	1;
			$k	=	1;
			foreach($types as $cate){ 
				$papers = $this->Papermagazine_m->get_many_by(array('type_id'=>$cate->id, 'status'=>1))
		?>
        	<tr>
            	<th scope="row"></th>
                <td><b><?php echo $cate->types_name; ?></b></td>
                <td colspan="<?php echo date('t',strtotime(01 ."-".$monthdata."-".$yeardata)); ?>"></td> 
			</tr>
            <?php if(count($papers)){  foreach($papers as $pema){ ?>
            <tr>
            	<th scope="row"><?php echo $k; ?></th>
                <td><?php echo $pema->paper_magazine; ?></td>
               	<?php for($j=0; $j < date('t',strtotime(01 ."-".$monthdata."-".$yeardata));$j++) { ?>
                <td><?php echo dailypapercheck($pema->id, date('Y-m-d',strtotime(($j + 1) ."-".$monthdata."-".$yeardata)));?></td>
                <?php } ?>
         	</tr>
            		<?php $k++; } }?>
                <?php $i++; } ?>
		</tbody>
	</table>
    <a href="<?php echo site_url('office/papermagazineregister/printregister/'.$monthdata.'/'.$yeardata);?>" target="_blank" class="btn btn-danger square"><i class="fa fa-print"></i> Print</a>
<?php } ?>