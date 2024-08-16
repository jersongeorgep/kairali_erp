<h1 align="center">KERALA STATE LIBRARY COUNCIL <br /> Newspaper Magazines Register for the month of <?php echo date('F',strtotime(01 ."-".$monthdata."-".$yeardata));?>, <?php echo date('Y',strtotime(01 ."-".$monthdata."-".$yeardata));?></h1>
<?php if(count($types)){ ?>
    <table style="font-size:9px;" cellpadding="3px" cellspacing="0px">
    	<thead>
        	<tr bgcolor="#F2F2F2">
            	<th style="border:1px #666666 solid;" width="5%" align="center">#</th>
                <th style="border:1px #666666 solid;" width="20%">Paper / Magazine</th>
                <?php for($i=0; $i < date('t',strtotime(01 ."-".$monthdata."-".$yeardata));$i++) { ?>
                <th align="center" style="border:1px #666666 solid;" width="2.5%"><?php echo ($i+1); ?></th>
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
            	<th style="border:1px #666666 solid;" width="5%" scope="row"></th>
                <td style="border:1px #666666 solid;" width="20%"><b><?php echo $cate->types_name; ?></b></td>
                <td style="border:1px #666666 solid;" width="<?php echo 2.5 * (date('t',strtotime(01 ."-".$monthdata."-".$yeardata))) ."%"; ?>" colspan="<?php echo date('t',strtotime(01 ."-".$monthdata."-".$yeardata)); ?>"></td> 
			</tr>
            <?php if(count($papers)){  foreach($papers as $pema){ ?>
            <tr>
            	<th style="border:1px #666666 solid;" width="5%" align="center" scope="row"><?php echo $k; ?></th>
                <td style="border:1px #666666 solid;" width="20%"><?php echo $pema->paper_magazine; ?></td>
               	<?php for($j=0; $j < date('t',strtotime(01 ."-".$monthdata."-".$yeardata));$j++) { ?>
                <td  align="center" style="border:1px #666666 solid;" width="2.5%"><?php echo dailypapercheckprint($pema->id, date('Y-m-d',strtotime(($j + 1) ."-".$monthdata."-".$yeardata)));?></td>
                <?php } ?>
         	</tr>
            		<?php $k++; } }?>
                <?php $i++; } ?>
		</tbody>
	</table>
<?php } ?>
<p style="font-size:7px; color:#999;">* = Not allowed date, Y = Yes and N = Not</p>