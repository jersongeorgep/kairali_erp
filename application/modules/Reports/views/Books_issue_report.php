<div class="card">
                <div class="card-header">
                    <h4 class="card-title"><?php echo $pagename; ?></h4>
                </div>
                <div class="card-body">
                     <div class="card-block">
                     	<form class="form" target="_blank" method="post" action="<?php echo site_url('reports/books-issue-show-report/'); ?>">
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
                                      <input type='date' name="frm_dt" class="form-control  square" placeholder="Date" />
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
                                      <input type='date' name="to_dt" class="form-control  square" placeholder="Date" />
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
                            	<fieldset class="col-sm-12">
                            	<label>Member : Yes <input type="radio" checked value="0" name="trans_type" /> No <input type="radio"  value="1" name="trans_type" /> <br />
                                <label>Balavedi Students : Yes <input type="radio" value="1" name="balavedi_students" /> No <input type="radio"  checked value="0" name="balavedi_students" />
                                </label>
                             </fieldset>
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