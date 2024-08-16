<?php 
$i = 1;
if(count($bookissue)){ 
?>
<h2 align="center">Book Issue Report <?php if($fr_month){echo  $fr_month; } ?></h2>
<table cellpadding="3" cellspacing="0" width="100%" style="font-size:9px">
	<thead>
    	<tr bgcolor="#F2F2F2">
    		<th style="border:1px solid #333;" width="5%" align="center">Sl</th>
            <th style="border:1px solid #333;" width="10%" align="center">Date</th>
            <th style="border:1px solid #33php3;" width="20%" align="center">Books</th>
        	<th style="border:1px solid #333;" width="20%" align="center">Author</th>
            <th style="border:1px solid #333;" width="15%" align="center">Barcode</th>
            <th style="border:1px solid #333;" width="15%" align="center">Issue to</th>
        	<th style="border:1px solid #333;" width="10%" align="center">Status</th>
        </tr>
    </thead>
    <tbody>
    	<?php 
			foreach($bookissue as $keys){
				
		?>
            <tr>
                <td style="border:1px solid #333;" width="5%" align="center"><?php echo $i; ?></td>
                <td style="border:1px solid #333;" width="10%"><?php echo date('d-m-Y', strtotime($keys->issue_date)); ?></td>
                <td style="border:1px solid #333;" width="20%"><?php echo getsingledata('Books_m', 'name_eng', $keys->books_id); ?></td>
                <td style="border:1px solid #333;" width="20%"><?php echo getsingledata('Books_m', 'author', $keys->books_id); ?></td>
                <td style="border:1px solid #333;" width="15%" align="center"><?php echo getsingledata('Members_m', 'barcode', $keys->member_id);?></td>
                <td style="border:1px solid #333;" width="15%" align="center"><?php echo getsingledata('Members_m', 'name', $keys->member_id);?></td>
                <td style="border:1px solid #333;" width="10%"><?php echo (($keys->return_status) == 1)?"Returned" : "Pending"; ?></td>
            </tr>
		<?php
				$i++;
			
			 } 
		?>
    </tbody>
</table>
<?php } ?>