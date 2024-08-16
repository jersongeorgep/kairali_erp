<div class="card">
	<div class="card-header">
    	<h4 class="card-title"><?php echo $pagename; ?></h4>
	</div>
    <div class="card-body">
    	<div class="card-block">
        <?php if(count($bookslist)){
			?>
        <table class="table table-striped table-bordered table-sm" style="font-size:12px;">
        	<thead>
            	<tr>
                	<th width="5%">#</th>
                    <th>Language</th>
                    <th>Malayalam</th>
                    <th>Barcode</th>
                    <th>Author</th>
                     <?php if($cateid == 0){ ?>
            		<th align="center">Category</th>
                    <th align="center">Code</th>
        			<?php } ?>
                    <th>Source</th>
                    <th>Shelf</th>
                    <th width="7%">Copies</th>
                    <th>Status</th>
				</tr>
			</thead>
            <tbody>
            <?php 
			$i = 1;
		if($display == 0){
			foreach($books as $keys){
				if(getBookCopies($keys->id) < 1){
				}else{
		?>
            <tr>
                <td align="center"><?php echo $i; ?></td>
                <td ><?php echo $keys->language; ?></td>
                <td ><?php echo $keys->name_mal; ?></td>
                <td ><?php echo $keys->barcode; ?></td>
                <td ><?php echo $keys->author; ?></td>
                <?php if($cateid == 0){ ?>
                <td ><?php echo getbydata('Categories_m','name', $keys->cateid, 'name_mal'); ?></td>
                <td><?php echo $keys->cateid; ?></td>
                <?php } ?>
                <td><?php echo getsingledata('Source_m','source_name', getLastRecord('Purchasebooksline_m',array('bookid'=>$keys->id),'source_id')); ?></td>
            	<td><?php echo getLastRecord('Purchasebooksline_m',array('bookid'=>$keys->id),'location'); ?></td>
            	<td align="center"><?php echo getBookCopies($keys->id);?></td>
                <td ><?php echo (getBookCopies($keys->id) < 1)?"Not Available" : "Available"; ?></td>
            </tr>
		<?php
				$i++;
			}
			 } 
		}else{
			foreach($books as $keys){ 
		?>
    	<tr>
        	<td align="center"><?php echo $i; ?></td>
            <td ><?php echo $keys->language; ?></td>
            <td ><?php echo $keys->name_mal; ?></td>
            <td ><?php echo $keys->barcode; ?></td>
            <td ><?php echo $keys->author; ?></td>
            <?php if($cateid == 0){ ?>
            <td ><?php echo getbydata('Categories_m','name', $keys->cateid, 'name_mal'); ?></td>
            <td><?php echo $keys->cateid; ?></td>
            <?php } ?>
            <td><?php echo $keys->source; ?></td>
            <td><?php echo getLastRecord('Purchasebooksline_m',array('bookid'=>$keys->id),'location'); ?></td>
            <td  align="center"><?php echo getBookCopies($keys->id);?></td>
            <td ><?php echo (getBookCopies($keys->id) < 1)?"Not Available" : "Available"; ?></td>
        </tr>
        <?php $i++; } 
		}
		?>
    </tbody>
</table>
<?php } ?>
                    </div>
                </div>
            </div>