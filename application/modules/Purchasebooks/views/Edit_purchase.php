<div class="card">
                <div class="card-header">
                    <h4 class="card-title"><?php echo $pagename; ?><span class="pull-right"><a href="<?php echo site_url('Purchasebooks');?>" class="btn btn-info square"><i class="ft-list"></i></a> <a href="<?php echo site_url('Purchasebooks/add-purchase');?>" class="btn btn-success square"><i class="ft-file-plus"></i></a></span></h4>
                </div>
                <div class="card-body">
                     <div class="card-block">
                     	<form class="form" method="post" action="<?php echo site_url('purchasebooks/save_purchase/'.$purchase->id); ?>">
                    	<div class="row">
                        	<div class="col-sm-6">
                            	<fieldset>
                                	<label>Date</label>
                                	<div class="input-group">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text square">
                                          <span class="fa fa-calendar-o"></span>
                                        </span>
                                      </div>
                                      <input type='date' name="pur_date" class="form-control square" placeholder="Date" value="<?php echo date('d-m- Y', strtotime($purchase->pur_date));?>" />
                                    </div>
                                </fieldset>
                            </div>
                            <div class="col-sm-6">
                            	<fieldset>
                                	<label>Publishers</label>
                                	<textarea name="publisher" class="form-control square"><?php echo $purchase->publisher; ?></textarea>
                                </fieldset>
                            </div>
                        	<div class="col-sm-12">
                        		<fieldset>
                                	<label>Books</label>
                                	<input type="text" class="form-control square" id="searchbook" onChange="getbooks(this.value)" placeholder="Boonk Name / Barcode" />
                                </fieldset>
                                <p></p>
                                <table class="table table-bordered table-sm table-striped">
                                	<thead>
                                    	<tr>
                                        	<th width="50%">Book Name</th>
                                            <th width="10%">Ledger No</th>
                                            <th width="10%">Shelf No</th>
                                            <th width="10%">Source</th>
                                            <th width="10%">Cost</th>
                                            <th width="10%">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="bookslines">
                                    	<?php if(count($purchaseline)){ foreach($purchaseline as $keys){ ?>
                                        <tr>
                                        	<td><?php echo getsingledata('Books_m', 'barcode', $keys->bookid); ?> <br /> <?php echo getsingledata('Books_m', 'name_eng', $keys->bookid); ?> (<?php echo getsingledata('Books_m', 'name_mal', $keys->bookid); ?>)- <?php echo getsingledata('Books_m', 'author', $keys->bookid); ?></td>
                                            <td><input type="hidden" name="editid[]" value="<?php echo $keys->id; ?>" /> <input type="hidden" name="editbookid[]" value="<?php echo $keys->bookid; ?>" /><input type="text" name="editregno[]" class="form-control input-sm square" value="<?php echo $keys->regno; ?>" /></td>
                                            <td><input type="text" name="edlocation_no[]" class="form-control input-sm square" value="<?php echo $keys->location; ?>" /></td>
                                            <td><select name="edsource_id[]" class="form-control square">
                                            <?php if(count($sources)){ foreach($sources as $sourcekeys){ ?>
                                            <option value="<?php echo $sourcekeys->id; ?>" <?php echo($sourcekeys->id ==  $keys->source_id)?'selected':''; ?> ><?php echo $sourcekeys->source_name; ?></option>
                                            <?php } }?>
                                            </select></td>
                                            <td><input type="text" name="editcost[]" class="form-control input-sm square" value="<?php echo $keys->praicecost; ?>" /></td>
                                            <td><a href="<?php echo site_url('purchasebooks/delete-item/'.$keys->id); ?>" class="btn btn-danger btn-sm square"><i class="ft-delete"></i></a></td>
                                        </tr>
										<?php } } ?>
                                    </tbody>
                                </table>
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
            
            