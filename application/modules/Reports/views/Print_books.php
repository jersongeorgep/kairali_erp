<?php 
$i = 1;
if(count($books)){ 
?>
<h2 align="center"><?php echo ($cateid == 0)? 'All Categories Books' : getsingledata('Categories_m', 'name', $cateid).' Books' ?></h2>
<table cellpadding="3" cellspacing="0" width="100%" style="font-size:9px">
	<thead>
    	<tr bgcolor="#F2F2F2">
    		<th style="border:1px solid #333;" width="5%" align="center">Sl</th>
            <th style="border:1px solid #33php3;" width="25%" align="center">Books</th>
        	<th style="border:1px solid #333;" width="15%" align="center">Barcode</th>
            <th style="border:1px solid #333;" width="15%" align="center">Author</th>
            <?php if($cateid == 0){ ?>
            <th style="border:1px solid #333;" width="10%" align="center">Category</th>
        	<?php } ?>
            <th style="border:1px solid #333;" width="10%">Source</th>
            <th style="border:1px solid #333;" width="5%">Shelf</th>
            <th style="border:1px solid #333;" width="5%" align="center">Copies</th>
            <th style="border:1px solid #333;" width="10%" align="center">Status</th>
        </tr>
    </thead>
    <tbody>
    	<?php 
		if($display == 0){
			foreach($books as $keys){
				if(getBookCopies($keys->id) < 1){
				}else{
		?>
            <tr>
                <td style="border:1px solid #333;" width="5%" align="center"><?php echo $i; ?></td>
                <td style="border:1px solid #333;" width="25%"><?php echo $keys->name_mal; ?></td>
                <td style="border:1px solid #333;" width="15%"><?php echo $keys->barcode; ?></td>
                <td style="border:1px solid #333;" width="15%"><?php echo $keys->author; ?></td>
                <?php if($cateid == 0){ ?>
                <td style="border:1px solid #333;" width="10%"><?php echo getsingledata('Categories_m', 'name', $keys->cateid); ?></td>
                <?php } ?>
                <td style="border:1px solid #333;" width="10%"><?php echo getsingledata('Source_m','source_name', getLastRecord('Purchasebooksline_m',array('bookid'=>$keys->id),'source_id')); ?></td>
            	<td style="border:1px solid #333;" width="5%"><?php echo getLastRecord('Purchasebooksline_m',array('bookid'=>$keys->id),'location'); ?></td>
            	<td style="border:1px solid #333;" width="5%" align="center"><?php echo getBookCopies($keys->id);?></td>
                <td style="border:1px solid #333;" width="10%"><?php echo (getBookCopies($keys->id) < 1)?"Not Available" : "Available"; ?></td>
            </tr>
		<?php
				$i++;
			}
			 } 
		}else{
			foreach($books as $keys){ 
		?>
    	<tr>
        	<td style="border:1px solid #333;" width="5%" align="center"><?php echo $i; ?></td>
            <td style="border:1px solid #333;" width="25%"><?php echo $keys->name_mal; ?></td>
            <td style="border:1px solid #333;" width="15%"><?php echo $keys->barcode; ?></td>
            <td style="border:1px solid #333;" width="15%"><?php echo $keys->author; ?></td>
            <?php if($cateid == 0){ ?>
            <td style="border:1px solid #333;" width="10%"><?php echo getsingledata('Categories_m', 'name', $keys->cateid); ?></td>
            <?php } ?>
            <td style="border:1px solid #333;" width="10%"><?php echo getsingledata('Source_m','source_name', getLastRecord('Purchasebooksline_m',array('bookid'=>$keys->id),'source_id')); ?></td>
            <td style="border:1px solid #333;" width="5%"><?php echo getLastRecord('Purchasebooksline_m',array('bookid'=>$keys->id),'location'); ?></td>
            <td style="border:1px solid #333;" width="5%" align="center"><?php echo getBookCopies($keys->id);?></td>
            <td style="border:1px solid #333;" width="10%"><?php echo (getBookCopies($keys->id) < 1)?"Not Available" : "Available"; ?></td>
        </tr>
        <?php $i++; } 
		}
		?>
    </tbody>
</table>
<?php } ?>