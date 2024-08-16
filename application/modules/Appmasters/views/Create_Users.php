<div class="card">
                <div class="card-header">
                    <h4 class="card-title"><?php echo $pagename; ?><span class="pull-right"><a href="<?php echo site_url('Appmasters/users/');?>" class="btn btn-info square"><i class="ft-list"></i></a> <a href="<?php echo site_url('Appmasters/users/create-users');?>" class="btn btn-success square"><i class="ft-file-plus"></i></a></span></h4>
                </div>
                <div class="card-body">
                    <div class="card-block">
                        <form class="form" method="post" action="<?php echo site_url('appmasters/users/save-users'); ?>">
                        	<fieldset>
                            	<label>Name</label>
                                <div class="position-relative has-icon-left">
                                	<input type="text" class="form-control square" name="name" autocomplete="off" />
                                	<div class="form-control-position"><i class="ft-user info"></i></div>
								</div>
                            </fieldset>
                            <p></p>
                            <fieldset>
                            	<label>User Role</label>
                                <select class="form-control square" name="userrole" required>
                                	<option value="">Select User Role</option>
                                    <?php if(count($userrols)){ foreach($userrols as $usrole){ ?>
                                    	<option value="<?php echo $usrole->id; ?>"><?php echo $usrole->rolename; ?></option>
                                    <?php } }?>
                                </select>
                            </fieldset>
                            <p></p>
                            <fieldset> 
                            	<label>E-mail</label>
                                <div class="position-relative has-icon-left">
                                	<input type="email" class="form-control square" name="email" autocomplete="off" required/>
                                	<div class="form-control-position"><i class="ft-mail info"></i></div>
								</div>
                            </fieldset>
                            <p></p>
                            <fieldset>
                            	<label>Mobile</label>
                                <div class="position-relative has-icon-left">
                                	<input type="text" class="form-control square" name="mobile" autocomplete="off" required />
                                	<div class="form-control-position"><i class="ft-phone info"></i></div>
								</div>
                            </fieldset>
                            <p></p>
                            <fieldset>
                            	<label>Password</label>
                                <div class="position-relative has-icon-left">
                                	<input type="password" class="form-control square" name="password" autocomplete="off" required />
                                	<div class="form-control-position"><i class="ft-lock info"></i></div>
								</div>
                            </fieldset>
                            <p></p>
                            <fieldset>
                            	<label>Address</label>
                                <div class="position-relative has-icon-left">
                                	<textarea class="form-control square" name="address" autocomplete="off"></textarea>
                                	<div class="form-control-position"><i class="ft-map info"></i></div>
								</div>
                            </fieldset>
                            <p></p>
                            <fieldset>
                            	<label>Photo</label>
                                <input type="file" class="form-control-file" name="photo">
                            </fieldset>
                            <p></p>
                            <fieldset>
                            	<label>Designation</label>
                                <div class="position-relative has-icon-left">
                                	<input type="text" class="form-control square" name="designation" autocomplete="off" />
                                	<div class="form-control-position"><i class="ft-edit info"></i></div>
								</div>
                            </fieldset>
                            <p></p>
                            <fieldset>
                            	<label>Library </label>
                                <select class="form-control square" name="library_id" required>
                                	<option value="">Select Library</option>
                                    <?php if(count($library)){ ?>
                                    	<option value="<?php echo $library->id; ?>"><?php echo $library->fullname; ?></option>
                                    <?php } ?>
                                </select>
                            </fieldset>
                            <p></p>
                            <fieldset>
                            	<button type="submit" class="btn btn-danger square" ><i class="ft-save"></i> Save</button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>