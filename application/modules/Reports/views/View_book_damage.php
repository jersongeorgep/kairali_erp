<div class="card">
	<div class="card-header">
    	<h4 class="card-title"><?php echo $pagename; ?></h4>
	</div>
    <div class="card-body">
    	<div class="card-block">
        <?php if(count($bookdamage)){
			?>
        <table class="table table-striped table-bordered table-sm">
        	<thead>
            	<tr>
                	<th width="5%">#</th>
                    <th>Date</th>
                    <th>Barcode</th>
                    <th>Book Name</th>
                    <th>Malayalam</th>
                    <th>Author</th>
                    <th align="center">Damage Type</th>
				</tr>
			</thead>
            <tbody>
            <?php 
			$i = 1;
			foreach($bookdamage as $keys){
				
		?>
            <tr>
                <td align="center"><?php echo $i; ?></td>
                <td ><?php echo date('d-m-Y', strtotime($keys->damage_date)); ?></td>
                <td ><?php echo getsingledata('Books_m','barcode', $keys->books_id); ?></td>
                <td ><?php echo getsingledata('Books_m','name_eng', $keys->books_id); ?></td>
                <td ><?php echo getsingledata('Books_m','name_mal', $keys->books_id); ?></td>
                <td ><?php echo getsingledata('Books_m','author', $keys->books_id); ?></td>
               	<td ><?php echo $keys->damage_type; ?></td>
            </tr>
		<?php
				$i++;
			}
		?>
    </tbody>
</table>
<?php } ?>
                    </div>
                </div>
            </div>