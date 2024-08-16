<div class="card">
                <div class="card-header">
                    <h4 class="card-title"><?php echo $pagename; ?><span class="pull-right"><a href="<?php echo site_url('Purchasebooks');?>" class="btn btn-info square"><i class="ft-list"></i></a> <a href="<?php echo site_url('purchasebooks/add-purchase');?>" class="btn btn-success square"><i class="ft-file-plus"></i></a></span></h4>
                </div>
                <div class="card-body">
                     <div class="card-block">
                     	<form class="form" method="post" action="<?php echo site_url('Bookreceive/save-bookreceive/'); ?>">
                    		<div class="row">
                            <fieldset class="col-sm-4">
                            	<label>Member</label>
                            	<input type="text" class="form-control square" onChange="getMemberDetails(this.value)" placeholder="Barcode / Name / Mobile" />
                             </fieldset>
                             
                            <fieldset class="col-sm-4">
                                	<label>Date of Issue</label>
                                	<div class="input-group">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text square">
                                          <span class="fa fa-calendar-o"></span>
                                        </span>
                                      </div>
                                      <input type='text' name="return_date" class="form-control pickadate square" placeholder="Date" />
                                    </div>
                                </fieldset>
                             </div>
                             <div class="row">
                                <div class="col-sm-12" id="showform">
                                
                                </div>
                                 <div class="col-sm-12">
                                <fieldset>
                                	<button type="submit" class="btn btn-success square"><i class="ft-save"></i> Receive Books</button>
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
						url:"<?php echo site_url('Bookreceive/getMember/');?>" + code,
						success: function(result){
							$('#showform').html(result);
						}
					});
				}
				
				
				
            </script>
            
            