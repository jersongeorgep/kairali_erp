<div class="card">
                <div class="card-header">
                    <h4 class="card-title"><?php echo $pagename; ?></h4>
                </div>
                <div class="card-body">
                     <div class="card-block">
                     	<form class="form" target="_blank" method="post" action="<?php echo site_url('reports/books-damage-report/'); ?>">
                    	<div class="row">
                        	<div class="col-sm-4">
                        		<fieldset>
                                	<label>From</label>
                                	<div class="input-group">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text square">
                                          <span class="fa fa-calendar-o"></span>
                                        </span>
                                      </div>
                                      <input type='date' name="frm_dt" class="form-control square" placeholder="Date" />
                                    </div>
                                </fieldset>
                            </div>
                            <div class="col-sm-4">
                        		<fieldset>
                                	<label>To</label>
                                	<div class="input-group">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text square">
                                          <span class="fa fa-calendar-o"></span>
                                        </span>
                                      </div>
                                      <input type='date' name="to_dt" class="form-control square" placeholder="Date" />
                                    </div>
                                </fieldset>
                            </div>
                            <div class="col-sm-4">
                        		<fieldset>
                                	<label>Damage Type</label>
                                	<select class="form-control square" name="types">
                                    	<option value="All"> - All- </option> 
                                       	<option value="Lost">Lost</option>
                                        <option value="Damaged">Damaged</option>
                                    </select>
                                </fieldset>
                            </div>
                        </div>
                        <div class="row">
                        	<div class="col-sm-12">
                            <fieldset>
                                	<button type="submit" class="btn btn-success square" name="report" value="print"><i class="ft-printer"></i> Print</button>
                                    <button type="submit" class="btn btn-primary square" name="report" value="view" ><i class="ft-eye"></i> View</button>
                                </fieldset>
                            </div>
                        </div>
                        
                        </form>
                	 </div>  
                </div>
            </div>