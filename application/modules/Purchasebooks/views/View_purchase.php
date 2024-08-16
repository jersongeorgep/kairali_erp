<div class="card">
                <div class="card-header">
                    <h4 class="card-title"><?php echo $pagename; ?><span class="pull-right"><a href="<?php echo site_url('purchasebooks');?>" class="btn btn-info square"><i class="ft-list"></i></a> <a href="<?php echo site_url('purchasebooks/add-purchase');?>" class="btn btn-success square"><i class="ft-file-plus"></i></a></span></h4>
                </div>
                <div class="card-body">
                     <div class="card-block">
                     	<table class="table table-bordered table-sm table-striped">
                        	<thead>
                            	<tr>
                                	<th colspan="7">Date : <?php echo date('d-m-Y', strtotime($purchase->pur_date));?></th>
                                </tr>
                                <tr>
                                	<th colspan="7">Publishers : <?php echo $purchase->publisher;?></th>
                                </tr>
                            	<tr>
                                	<th width="20%">Barcode</th>
                                    <th width="20%">Book Name</th>
                                    <th width="20%">Author</th>
                                    <th width="10%">Ledger No</th>
                                    <th width="10%">Shelf No</th>
                                    <th width="10%">Source</th>
                                    <th width="10%">Cost</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    	<?php if(count($purchaseline)){ 
											foreach($purchaseline as $itemline){
										?>
                                        	<tr>
                                            	<td><?php echo getsingledata('Books_m', 'barcode', $itemline->bookid); ?></td>
                                                <td><?php echo getsingledata('Books_m', 'name_eng', $itemline->bookid); ?><br /> <?php echo getsingledata('Books_m', 'name_mal', $itemline->bookid); ?></td>
                                                <td><?php echo getsingledata('Books_m', 'author', $itemline->bookid); ?></td>
                                                <td><?php echo $itemline->regno; ?></td>
                                                <td><?php echo $itemline->location; ?></td>
                                                <td><?php echo getsingledata('Source_m','source_name', $itemline->source_id); ?></td>
                                                <td align="right"><?php echo $itemline->praicecost; ?></td>
                                            </tr>
                                        <?php }}?>
                                    </tbody>
                                </table>
                                <a href="<?php echo site_url('purchasebooks/edit_purchase/'.$purchase->id);?>" class="btn btn-danger square"><i class="ft-edit-2"></i> Edit</a>
                	 </div>  
                </div>
            </div>
            
             <script>
				function getbooks(books){
					$.ajax({
						url:"<?php echo site_url('purchasebooks/getbooks/');?>"+books,
						success: function(result){
							$('#bookslines').append('<tr>' + result +'</tr>');
							$('#searchbook').val("");
						}
					});
				}
				
				function deleteline(id){
					$('#btndelete_'+id).closest("tr").remove();	
				}
            </script>
            
            