<div class="card">
                <div class="card-header">
                    <h4 class="card-title"><?php echo $pagename; ?><span class="pull-right"><a href="<?php echo site_url('Purchasebooks');?>" class="btn btn-info square"><i class="ft-list"></i></a> <a href="<?php echo site_url('purchasebooks/add-purchase');?>" class="btn btn-success square"><i class="ft-file-plus"></i></a></span></h4>
                </div>
                <div class="card-body">
                     <div class="card-block">
                     	<form class="form" method="post" action="<?php echo site_url('office/damagebooks/save_damage/'); ?>">
                    	<div class="row">
                        	<div class="col-sm-8">
                        		<fieldset>
                                	<label>Books</label>
                                	<input type="text" class="form-control square" id="searchbook" onChange="getbooks(this.value)" placeholder="Boonk Name / Barcode" />
                                </fieldset>
                                <p></p>
                                <table class="table table-bordered table-sm table-striped">
                                	<thead>
                                    	<tr>
                                        	<th width="60%">Book Name</th>
                                            <th width="30%">Damage Type</th>
                                            <th width="10%">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="bookslines">
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-sm-4">
                            	<fieldset>
                                	<label>Date</label>
                                	<div class="input-group">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text square">
                                          <span class="fa fa-calendar-o"></span>
                                        </span>
                                      </div>
                                      <input type='date' name="pur_date" class="form-control square" placeholder="Date" />
                                    </div>
                                </fieldset>
                                <p></p>
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
						url:"<?php echo site_url('office/damagebooks/getbooks/');?>"+books,
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
            
           