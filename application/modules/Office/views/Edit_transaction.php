<div class="card">
                <div class="card-header">
                    <h4 class="card-title"><?php echo $pagename; ?><span class="pull-right"><a href="<?php echo site_url('office/transactions');?>" class="btn btn-info square"><i class="ft-list"></i></a> <a href="<?php echo site_url('office/transactions/create-transaction');?>" class="btn btn-success square"><i class="ft-file-plus"></i></a></span></h4>
                </div>
                <div class="card-body">
                    <div class="card-block">
                        <form class="form" method="post" action="<?php echo site_url('office/transactions/save-transaction/'.$trans->id); ?>">
                        	<fieldset>
                                	<label>Date</label>
                                	<div class="input-group">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text square">
                                          <span class="fa fa-calendar-o"></span>
                                        </span>
                                      </div>
                                      <input type='date' name="tran_date" class="form-control square" min="<?php echo date('Y-m-d', strtotime($accounts->opening_date)); ?>" value="<?php echo date('Y-m-d', strtotime($trans->tran_date));?>" placeholder="Date" />
                                    </div>
                                </fieldset>
                             <p></p>
                            <fieldset>
                            	<label>Perticulars</label>
                                <select class="form-control square" name="perticular_id" required>
                                	<option value="">--Select--</option>
                                    <?php if(count($perticulars)){ ?>
                                    	<?php foreach($perticulars as $items){ 
										if($items->id == $trans->perticular_id){
											$select = 'selected';
										}else{
											$select = "";
										}
										?>
                                        <option value="<?php echo $items->id; ?>" <?php echo $select; ?>><?php echo $items->name; ?></option>
                                        <?php } ?>
                                    <?php }?>
                                </select>
                            </fieldset>
                            <p></p>
                            
                            <fieldset>
                            	<label>Amount</label>
                                <div class="position-relative has-icon-left">
                                	<input type="text" class="form-control square" name="tran_amount" value="<?php echo $trans->tran_amount; ?>" autocomplete="off" />
                                	<div class="form-control-position"><i class="icon-wallet info"></i></div>
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
            
            