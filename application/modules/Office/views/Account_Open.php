<div class="card">
                <div class="card-header">
                    <h4 class="card-title"><?php echo $pagename; ?></h4>
                </div>
                <div class="card-body">
                    <div class="card-block">
                        <form class="form" method="post" <?php if($accountopen){ ?>action="<?php echo site_url('office/Accountopen/save_account_open/'.$accountopen->id); ?>" <?php }else{ ?> action="<?php echo site_url('office/Accountopen/save_account_open'); ?>"<?php }?>>
                        	<fieldset>
                                	<label>Date of Book Opening</label>
                                	<div class="input-group">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text square">
                                          <span class="fa fa-calendar-o"></span>
                                        </span>
                                      </div>
                                      <input type="date" name="opening_date" class="form-control square" value="<?php echo ($accountopen)? $accountopen->opening_date : date('Y-m-d');?>" />
                                    </div>
                                </fieldset>
                             <p></p>
                            <fieldset>
                            	<label>Cash In Hand</label>
                                <div class="position-relative has-icon-left">
                                	<input type="text" id="barcode" class="form-control square" name="cash_in_hand" autocomplete="off"  value="<?php echo ($accountopen)? $accountopen->cash_in_hand : ""; ?>" required />
                                	<div class="form-control-position"><i class="ft-loader info"></i></div>
								</div>
                            </fieldset>
                            <p></p>
                            
                            <fieldset>
                            	<label>Cash at Bank</label>
                                <div class="position-relative has-icon-left">
                                	<input type="text" class="form-control square" name="cash_at_bank" autocomplete="off" value="<?php echo ($accountopen)? $accountopen->cash_at_bank : ""; ?>" />
                                	<div class="form-control-position"><i class="fa fa-bank info"></i></div>
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
            
            