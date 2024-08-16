<div class="card">
                <div class="card-header">
                    <h4 class="card-title"><?php echo $pagename; ?><span class="pull-right"><a href="<?php echo site_url('office/transactions');?>" class="btn btn-info square"><i class="ft-list"></i></a> <a href="<?php echo site_url('reports/accountsreport/nalvazhi-report');?>" class="btn btn-success square"><i class="ft-file-plus"></i></a></span></h4>
                </div>
                <div class="card-body">
                     <div class="card-block">
                     	<form class="form" target="_blank" method="post" action="<?php echo site_url('reports/accountsreport/get-nalvazhi-report/'); ?>">
                    	<div class="row">
                        	<div class="col-sm-6">
                        		<fieldset>
                                	<label>From</label>
                                	<div class="input-group">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text square">
                                          <span class="fa fa-calendar-o"></span>
                                        </span>
                                      </div>
                                      <input type='date' name="frm_dt" class="form-control square" min="<?php echo date('Y-m-d', strtotime($account->opening_date))?>" placeholder="Date" value="<?php echo date('Y-m-d', strtotime('first day of this month'))?>" />
                                    </div>
                                </fieldset>
                            </div>
                            <div class="col-sm-6">
                        		<fieldset>
                                	<label>To</label>
                                	<div class="input-group">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text square">
                                          <span class="fa fa-calendar-o"></span>
                                        </span>
                                      </div>
                                      <input type='date' name="to_dt" class="form-control square" max="<?php echo date('Y-m-d')?>" value="<?php echo date('Y-m-d')?>" placeholder="Date" />
                                    </div>
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