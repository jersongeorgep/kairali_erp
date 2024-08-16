<div class="card">
	<div class="card-header">
    	<h4 class="card-title"><?php echo $pagename; ?></h4>
	</div>
    <div class="card-body">
    <div class="card-block">
    <?php 
		if(count($search)){
			$i = 1;
	?>
    <table class="table table-striped table-bordered">
    	<thead>
        	<tr>
            	<th width="5%">#</th>
                <th>Barcode</th>
                <th>Name(Mal)</th>
                <th>Author</th>
                <th>Shelf</th>
				<th>Category</th>
                <th>Status</th>
				<th>Issued to</th>
                <th>Remarks</th>
			</tr>
		</thead>
        <tbody>
        <?php foreach($search as $keys){ 
			$purchaseline = getmanybydata('Purchasebooksline_m',array('bookid'=>$keys->id));
			$availablestatus = $this->Booksissueline_m->order_by('id', 'DESC')->get_many_by(array('books_id'=>$keys->id));
			$category = getsingledataFeild ('Categories_m', 'name_mal', $keys->cateid);
			
		?>                 	
			<tr>
            	<td><?php echo $i; ?></td>
                <td><?php echo $keys->barcode; ?></td>
                <td><?php echo $keys->name_mal; ?></td>
                <td><?php echo $keys->author; ?></td>
                <td><?php if(count($purchaseline)){ echo $purchaseline[0]->location;}else{ echo "-"; } ?></td>
                <td><?php echo $category; ?></td>
				<td><?php 
			if(count($purchaseline)){
				if(count($availablestatus)){
					if($availablestatus[0]->return_status == 1){ echo "In"; }else{ echo "Out";}
				}else{
					echo "In";
				}
			} else {echo "-";}?></td>
				<td>
				<?php 
			if(count($purchaseline)){
				if(count($availablestatus)){
					if($availablestatus[0]->return_status == 1){ echo " "; }else{ echo getsingledata('Members_m','barcode',$availablestatus[0]->member_id);}
				}else{
					echo " ";
				}
			} else {echo "-";}?>
				</td>
                <td><?php if(count($purchaseline)){echo "Available";}else{echo "Not Available";} ?></td>
            </tr>
            <?php $i++; } ?>
		</tbody>
	</table>	
     <?php } ?>
     </div>
</div>
</div>