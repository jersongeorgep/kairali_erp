<div class="card">
                <div class="card-header">
                    <h4 class="card-title"><?php echo $pagename; ?><span class="pull-right"><a href="<?php echo site_url('office/incomeexpense/');?>" class="btn btn-info square"><i class="ft-list"></i></a> <a href="<?php echo site_url('office/incomeexpense/create-members');?>" class="btn btn-success square"><i class="ft-file-plus"></i></a></span></h4>
                </div>
                <div class="card-body">
                    <div class="card-block">
                        <form class="form" method="post" action="<?php echo site_url('office/incomeexpense/save-inex-items/'.$inexitems->id); ?>">
                        	<fieldset>
                            	<label>Item Name</label>
                                <div class="position-relative has-icon-left">
                                	<input type="text" class="form-control square" name="name" autocomplete="off" value="<?php echo $inexitems->name;?>" required />
                                	<div class="form-control-position"><i class="ft-loader info"></i></div>
								</div>
                            </fieldset>
                            <p></p>
                            <fieldset>
                                	<label>Type</label>
                                	<select name="type" class="form-control square" required>
                                    	<option value=""> - Select - </option>
                                        <option value="Income" <?php echo($inexitems->type=="Income")?"selected":"";?>>Income</option>
                                        <option value="Expense" <?php echo($inexitems->type=="Expense")?"selected":"";?>>Expense</option>
                                    </select>
                                </fieldset>
                            <p></p>
                            <fieldset>
                                	<label>Is this Bank Item ?  <input type="radio" name="bank_item" value="0" <?php echo($inexitems->bank_item==0)?"checked":"";?>> No <input type="radio" name="bank_item" value="1" <?php echo($inexitems->bank_item==1)?"checked":"";?> /> Yes</label>
                             </fieldset>
                            <p></p>
                            <fieldset>
                            	<button type="submit" class="btn btn-danger square" ><i class="ft-save"></i> Save</button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
            
            