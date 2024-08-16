<div class="card">
                <div class="card-header">
                    <h4 class="card-title"><?php echo $pagename; ?><span class="pull-right"><a href="<?php echo site_url('members');?>" class="btn btn-info square"><i class="ft-list"></i></a> <a href="<?php echo site_url('members/create-members');?>" class="btn btn-success square"><i class="ft-file-plus"></i></a></span></h4>
                </div>
                <div class="card-body">
                    <div class="card-block">
                        <form class="form" method="post" action="<?php echo site_url('office/circulars/save_circular'); ?>">
                        	<fieldset>
                            	<label>Cirular Number</label>
                                <div class="position-relative has-icon-left">
                                	<input type="text" id="barcode" class="form-control square" name="cir_number" autocomplete="off" required />
                                	<div class="form-control-position"><i class="fa fa-barcode info"></i></div>
								</div>
                            </fieldset>
                            <p></p>
                            <fieldset>
                                	<label>Date of Issue</label>
                                	<div class="input-group">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text square">
                                          <span class="fa fa-calendar-o"></span>
                                        </span>
                                      </div>
                                      <input type='text' name="cir_date" class="form-control pickadate square" placeholder="Date" />
                                    </div>
                                </fieldset>
                             <p></p>
                            <fieldset>
                            	<label>Subject</label>
                                <div class="position-relative has-icon-left">
                                	<input type="text" class="form-control square" name="cir_subject" autocomplete="off" />
                                	<div class="form-control-position"><i class="ft-user info"></i></div>
								</div>
                            </fieldset>
                            <p></p>
                            <fieldset>
                            	<label>Content</label>
                                <div class="position-relative has-icon-left">
                                	<textarea class="form-control square" rows="5" name="cir_text" autocomplete="off"></textarea>
                                    <div class="form-control-position"><i class="ft-edit info"></i></div>
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
            
            