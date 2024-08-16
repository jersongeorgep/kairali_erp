<div class="card">
                <div class="card-header">
                    <h4 class="card-title"><?php echo $pagename; ?></h4>
                </div>
                <div class="card-body">
                     <div class="card-block">
                     	<form class="form" target="_blank" method="post" action="<?php echo site_url('Reports/print_available_books/'); ?>">
                    	<div class="row">
                        	<div class="col-sm-4">
                        		<fieldset>
                                	<label>Categories</label>
                                	<select class="form-control square" name="cateid">
                                    	<option value="0"> - All Categories - </option> 
                                        <?php if(count($categories)){ foreach($categories as $keys){ ?>
                                        <option value="<?php echo $keys->name; ?>">(<?php echo $keys->name; ?>)<?php echo $keys->name_mal; ?></option>
                                        <?php } } ?>
                                    </select>
                                </fieldset>
                                <p></p>
                            </div>
                            <div class="col-sm-4">
                        		<fieldset>
                                	<br />
                                	<label><input type="radio" name="showavailable" value="1" checked /> Show not available books</label><br />
                                    <label><input type="radio" name="showavailable" value="0" /> Only available books</label>
                                </fieldset>
                                <p></p>
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