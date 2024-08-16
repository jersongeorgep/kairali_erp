<div class="card">
                <div class="card-header">
                    <h4 class="card-title"><?php echo $pagename; ?><span class="pull-right"><a href="<?php echo site_url('bookissues');?>" class="btn btn-info square"><i class="ft-list"></i></a> <a href="<?php echo site_url('purchasebooks/add-purchase');?>" class="btn btn-success square"><i class="ft-file-plus"></i></a></span></h4>
                </div>
                <div class="card-body">
                     <div class="card-block">
                     	<form class="form" method="post" action="<?php echo site_url('bookissues/save-bookissue/'); ?>">
                    		<div class="row">
                            <fieldset class="col-sm-4">
                            	<label>Member</label>
                            	<input type="text" class="form-control square" onChange ="getMemberDetails(this.value)"  placeholder="Barcode / Name / Mobile" />
                             </fieldset>
                             
                            <fieldset class="col-sm-4">
                                	<label>Date of Issue</label>
                                	<div class="input-group">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text square">
                                          <span class="fa fa-calendar-o"></span>
                                        </span>
                                      </div>
                                      <input type='date' name="issue_date" class="form-control square" placeholder="Date" />
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
                                      <input type='date' name="est_return_date" class="form-control square" placeholder="Date" />
                                    </div>
                                </fieldset>
                            
                            </div>
                            <div class="row">
                            	<fieldset class="col-sm-12">
                            	<label>Member : Yes <input type="radio" checked value="0" name="trans_type" /> No <input type="radio"  value="1" name="trans_type" /> <br />
                                <label>Balavedi Students : Yes <input type="radio" value="1" name="balavedi_students" /> No <input type="radio"  checked value="0" name="balavedi_students" />
                                </label>
                             </fieldset>
                            </div>
                             <div class="row">
                                <div class="col-sm-12" id="showform">
                                
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
            
            