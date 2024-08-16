<div class="card">
                <div class="card-header">
                    <h4 class="card-title"><?php echo $pagename; ?><span class="pull-right"><a href="<?php echo site_url('bookissues');?>" class="btn btn-info square"><i class="ft-list"></i></a> <a href="<?php echo site_url('bookissues/add-books-issues');?>" class="btn btn-success square"><i class="ft-file-plus"></i></a></span></h4>
                </div>
                <div class="card-body">
                     <div class="card-block">
                     	<table class="table table-bordered table-sm table-striped">
                        	<thead>
                            	<tr>
                                	<th colspan="5">Issue Date : <?php echo date('d-m-Y', strtotime($booksissue->issue_date));?></th>
                                </tr>
                                <tr>
                                	<th colspan="5">Member : <?php echo getsingledata('Members_m','name',$booksissue->member_id);?></th>
                                </tr>
                            	<tr>
                                	<th width="20%">Barcode</th>
                                    <th width="30%">Book Name</th>
                                    <th width="20%">Author</th>
                                    <th width="20%">Status</th>
                                    
                                    </tr>
                                    </thead>
                                    <tbody>
                                    	<?php if(count($issuedbooks)){ 
											foreach($issuedbooks as $itemline){
										?>
                                        	<tr>
                                            	<td><?php echo getsingledata('Books_m', 'barcode', $itemline->books_id); ?></td>
                                                <td><?php echo getsingledata('Books_m', 'name_mal', $itemline->books_id); ?><br /> <?php echo getsingledata('Books_m', 'name_mal', $itemline->books_id); ?></td>
                                                <td><?php echo getsingledata('Books_m', 'author', $itemline->books_id); ?></td>
                                                <td><?php echo ($itemline->return_status == 0)? 'Pending' : 'Received'; ?></td>
                                               
                                            </tr>
                                        <?php }}?>
                                    </tbody>
                                </table>
                                <a href="<?php echo site_url('purchasebooks/edit_purchase/'.$booksissue->id);?>" class="btn btn-danger square"><i class="ft-print"></i> Print</a>
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
            
            