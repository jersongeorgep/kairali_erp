<div class="card">
                <div class="card-header">
                    <h4 class="card-title"><?php echo $pagename; ?></h4>
                </div>
                <div class="card-body">
                     <div class="card-block">
                     	<form class="form" target="_blank" method="post" action="<?php echo site_url('Reports/books-purchase-show-report/'); ?>">
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
                                      <input type='text' name="frm_dt" class="form-control pickadate square" placeholder="Date" />
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
                                      <input type='text' name="to_dt" class="form-control pickadate square" placeholder="Date" />
                                    </div>
                                </fieldset>
                            </div>
                            <div class="col-sm-4">
                        		<fieldset>
                                	<label>Search</label>
                                	<input type="text" class="form-control square" name="search" placeholder="Barcode / Name" />
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