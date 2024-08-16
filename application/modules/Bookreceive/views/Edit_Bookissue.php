<div class="card">
                <div class="card-header">
                    <h4 class="card-title"><?php echo $pagename; ?><span class="pull-right"><a href="<?php echo site_url('Purchasebooks');?>" class="btn btn-info square"><i class="ft-list"></i></a> <a href="<?php echo site_url('purchasebooks/add-purchase');?>" class="btn btn-success square"><i class="ft-file-plus"></i></a></span></h4>
                </div>
                <div class="card-body">
                     <div class="card-block">
                     	<form class="form" method="post" action="<?php echo site_url('bookissues/save-bookissue/'); ?>">
                    		<div class="row">
                            <fieldset class="col-sm-4">
                            	<label>Member</label>
                            	<input type="text" class="form-control square" onChange="getMemberDetails(this.value)" placeholder="Barcode / Name / Mobile" value="<?php echo getsingledata('Members_m','name',$bookissue->member_id); ?>" />
                             </fieldset>
                             
                            <fieldset class="col-sm-4">
                                	<label>Date of Issue</label>
                                	<div class="input-group">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text square">
                                          <span class="fa fa-calendar-o"></span>
                                        </span>
                                      </div>
                                      <input type='text' name="issue_date" class="form-control pickadate square" placeholder="Date" value="<?php echo date('d-F-Y', strtotime($bookissue->issue_date))?>" />
                                    </div>
                                </fieldset>
                                
                            <fieldset class="col-sm-4">
                                	<label>Estd Return Date</label>
                                	<div class="input-group">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text square">
                                          <span class="fa fa-calendar-o"></span>
                                        </span>
                                      </div>
                                      <input type='text' name="est_return_date" class="form-control pickadate square" placeholder="Date" value="<?php echo date('d-F-Y', strtotime($bookissue->est_return_date))?>" />
                                    </div>
                                </fieldset>
                            
                             </div>
                             <div class="row">
                                <div class="col-sm-12" id="showform">
                                		<?php 
										$member = $this->Members_m->get($bookissue->member_id);
										$books_issued = $this->Booksissueline_m->get_many_by(array('member_id'=>$bookissue->member_id , 'return_status'=>0));
										?>
										<fieldset>
											<input type="hidden" name="member_id" value="<?php echo $bookissue->member_id; ?>" />
										</fieldset>
										<fieldset>
											<label>Books</label>
											<input type="text" class="form-control square" id="searchbook" onChange="getbooks(this.value, <?php echo $member->max_books_issue; ?>)" placeholder="Boonk Name / Barcode" <?php echo (count($books_issued) >= $member->max_books_issue )? 'disabled' : '' ;?> />
										</fieldset>
										<div>
											<table class="table table-bordered table-sm table-striped">
												<thead>
													<tr>
														<th width="40%">Book Name</th>
														<th width="20%">Author</th>
														<th width="10%">Action</th>
													</tr>
												</thead>
												<tbody id="bookslines">
                                                <?php if(count($issueItems)){ foreach ($issueItems as $key){ ?>
												<tr>
													<td><?php echo getsingledata('Books_m', 'name_eng', $key->books_id); ?> (<?php echo getsingledata('Books_m', 'name_mal', $key->books_id); ?>) <br /> <?php echo getsingledata('Books_m', 'barcode', $key->books_id); ?></td>
    												<td><?php echo getsingledata('Books_m', 'author', $key->books_id); ?><input type="hidden" name="bookid[]" value="<?php echo $key->books_id; ?>" /></td>
    												<td><button type="button" onClick="deleteline(<?php echo $key->id; ?>)" id="btndelete_<?php echo $key->id; ?>" class="btn btn-danger btn-sm square"><i class="ft-delete"></i></button></td>
    											</tr>
												<?php } } ?>
												</tbody>
											</table>
										</div>
									
									
									<script>
									
										var i = <?php echo count($books_issued) + 1; ?> ;
										function getbooks(books, maxissue){
											if(i  >= maxissue){
												$('#searchbook').attr('disabled','disabled');
											}else{
												$.ajax({
													url:"<?php echo site_url('bookissues/getbooks/');?>"+books,
													success: function(result){
														$('#bookslines').append('<tr>' + result +'</tr>');
														$('#searchbook').val("");
													}
												});
											}
											i++;
										}
										
										function deleteline(id){
											$('#btndelete_'+id).closest("tr").remove();	
										}
									</script>
                                </div>
                                 <div class="col-sm-12">
                                <fieldset>
                                	<button type="submit" class="btn btn-success square"><i class="ft-save"></i> Save</button>
                                </fieldset>
                                </div>
							</div>                                
                        </form>
                	 </div>  
                </div>
            </div>
            
             <script>
				function getMemberDetails(code){
					$.ajax({
						url:"<?php echo site_url('bookissues/getMember/');?>" + code,
						success: function(result){
							$('#showform').html(result);
						}
					});
				}
				
				
				
            </script>
            
            