<div class="card">
                <div class="card-header">
                    <h4 class="card-title"><?php echo $pagename; ?><span class="pull-right"><a href="<?php echo site_url('members');?>" class="btn btn-info square"><i class="ft-list"></i></a> <a href="<?php echo site_url('members/create-members');?>" class="btn btn-success square"><i class="ft-file-plus"></i></a></span></h4>
                </div>
                <div class="card-body">
                    <div class="card-block">
                        <form class="form" method="post" action="<?php echo site_url('members/save-members'); ?>">
                        	<fieldset>
                            	<label>Barcode &nbsp;&nbsp;&nbsp; <button onClick="generatebarcode()" type="button" class="btn btn-warning btn-sm square pull-right">Generate Barcode</button></label>
                                <div class="position-relative has-icon-left">
                                	<input type="text" id="barcode" class="form-control square" name="barcode" autocomplete="off" required />
                                	<div class="form-control-position"><i class="fa fa-barcode info"></i></div>
								</div>
                            </fieldset>
                            <p></p>
                            <fieldset>
                            	<label>Name</label>
                                <div class="position-relative has-icon-left">
                                	<input type="text" class="form-control square" name="name" autocomplete="off" />
                                	<div class="form-control-position"><i class="ft-user info"></i></div>
								</div>
                            </fieldset>
                            <p></p>
                            <fieldset>
                            	<label>address</label>
                                <div class="position-relative has-icon-left">
                                	<textarea class="form-control square" name="address" autocomplete="off"></textarea>
                                    <div class="form-control-position"><i class="ft-edit info"></i></div>
								</div>
                            </fieldset>
                            <p></p>
                            <fieldset>
                            	<label>Mobile</label>
                                <div class="position-relative has-icon-left">
                                	<input type="text" class="form-control square" name="mobile" autocomplete="off"/>
                                	<div class="form-control-position"><i class="ft-phone info"></i></div>
								</div>
                            </fieldset>
                            <p></p>
                            <fieldset>
                            	<label>E-mail</label>
                                <div class="position-relative has-icon-left">
                                	<input type="email" class="form-control square" name="email" autocomplete="off"/>
                                	<div class="form-control-position"><i class="ft-mail info"></i></div>
								</div>
                            </fieldset>
                            <p></p>
                            <fieldset>
                            	<label>Father / Mother /Husband Name</label>
                                <div class="position-relative has-icon-left">
                                	<input type="text" class="form-control square" name="father_name" autocomplete="off"/>
                                	<div class="form-control-position"><i class="ft-users info"></i></div>
								</div>
                            </fieldset>
                            <p></p>
                            <fieldset>
                            	<label>Groups</label>
                               <select class="form-control square" name="groupid" required>
                               		<option value=""> Select Groups </option>
                                    <?php if(count($groups)){ ?>
                                    	<?php foreach($groups as $gps){ ?>
                                    	<option value="<?php echo $gps->id; ?>"><?php echo $gps->name; ?></option>
                                    <?php } } ?>
                               </select>
                            </fieldset>
                            <p></p>
                            <fieldset>
                            	<label>Admission Fee</label>
                                <div class="position-relative has-icon-left">
                                	<input type="text" class="form-control square" name="admission_fee" autocomplete="off"/>
                                	<div class="form-control-position"><i class="ft-credit-card info"></i></div>
								</div>
                            </fieldset>
                            <p></p>
                            <fieldset>
                            	<label>Max Books to Issue</label>
                                <div class="position-relative has-icon-left">
                                	<input type="text" class="form-control square" name="max_books_issue" autocomplete="off"/>
                                	<div class="form-control-position"><i class="ft-credit-card info"></i></div>
								</div>
                            </fieldset>
                            <p></p>
                            <fieldset>
                            	<label>Blood Groups</label>
                                <select name="blood_groups" class="form-control square" required>
                                	<option value="0">-- Select Blood Group</option>
                                    <option value="A+">A+</option>
                                    <option value="A-">A-</option>
                                    <option value="B+">B+</option>
                                    <option value="B-">B-</option>
                                    <option value="AB+">AB+</option>
                                    <option value="AB-">AB-</option>
                                    <option value="O+">O+</option>
                                    <option value="O-">O-</option>
                                </select>
                            </fieldset>
                            <p></p>
                            <fieldset>
                            	<label>Date of Join</label>
                                <div class="position-relative has-icon-left">
                                	<input type="date" class="form-control datepicker square" name="date_of_join" autocomplete="off"/>
                                	<div class="form-control-position"><i class="ft-calendar info"></i></div>
								</div>
                            </fieldset>
                            <p></p>
                            <fieldset>
                            	<button type="submit" class="btn btn-danger square" ><i class="ft-save"></i> Save</button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
            
             <script>
            function generatebarcode(){
				$.ajax({
					url:"<?php echo site_url('members/generatebarcode');?>",
					success: function(result){
						$('#barcode').val(result);
						}
					});
			}
            </script>