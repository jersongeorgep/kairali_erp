<div class="card">
                <div class="card-header">
                    <h4 class="card-title"><?php echo $pagename; ?><span class="pull-right"><a href="<?php echo site_url('office/papermagazineregister');?>" class="btn btn-info square"><i class="ft-list"></i></a> <a href="<?php echo site_url('office/papermagazineregister/create-register');?>" class="btn btn-success square"><i class="ft-file-plus"></i></a></span></h4>
                </div>
                <div class="card-body">
                    <div class="card-block">
                    	<div class="row">
                        <fieldset class="col-xl-6 col-lg-6 col-sm-6">
                        	<label>Month</label>
                            <select class="form-control square" id="monthdata" name="regmonth" required onChange="showmonthdays()">
                            	<option value="">-Select-</option>
                                <?php for($a=1; $a < 13; $a++){ 
								$monthdate = 01 ."-".$a."-". date("Y");
								?>
                                <option value="<?php echo $a; ?>"><?php echo date('F', strtotime($monthdate)); ?></option>
                                <?php } ?>
                            </select>
                        </fieldset>
                        <fieldset class="col-xl-6 col-lg-6 col-sm-6">
                        	<label>Year</label>
                            <input type="text" class="form-control square" id="yeardata" name="regyear" value="<?php echo date('Y'); ?>"  />
                        </fieldset>
                        </div>
                        <p></p>
                    	<div class="row" id="showforms">
                        
                        </div> 
                        
                    </div>
                </div>
            </div>
            
            <script>
            	function showmonthdays(){
					monthdata = $('#monthdata').val();
					yeardata =  $('#yeardata').val();
					$.ajax({
							url:"<?php echo site_url('Office/papermagazineregister/getmonlydata/');?>"+ monthdata +"/"+yeardata,
							success: function(result){
								$('#showforms').html(result);
							}
						});
				}
            </script>