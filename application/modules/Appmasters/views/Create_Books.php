<div class="card">
                <div class="card-header">
                    <h4 class="card-title"><?php echo $pagename; ?><span class="pull-right"><a href="<?php echo site_url('Appmasters/Categories/');?>" class="btn btn-info square"><i class="ft-list"></i></a> <a href="<?php echo site_url('Appmasters/Categories/create-categories');?>" class="btn btn-success square"><i class="ft-file-plus"></i></a></span></h4>
                </div>
                <div class="card-body">
                    <div class="card-block">
                        <form class="form" method="post" action="<?php echo site_url('appmasters/books/save-books'); ?>">
                        	<fieldset>
                            	<label>Barcode &nbsp;&nbsp;&nbsp; <button onClick="generatebarcode()" type="button" class="btn btn-warning btn-sm square pull-right">Generate Barcode</button></label>
                                <div class="position-relative has-icon-left">
                                	<input type="text" id="barcode" class="form-control square" name="barcode" autocomplete="off" required />
                                	<div class="form-control-position"><i class="fa fa-barcode info"></i></div>
								</div>
                            </fieldset>
                            <p></p>
                            <fieldset>
                            	<label>Language</label>
                                <div class="position-relative has-icon-left">
                                	<input type="text" class="form-control square" name="language" autocomplete="off" required />
                                	<div class="form-control-position"><i class="fa fa-book info"></i></div>
								</div>
                            </fieldset>
                            <p></p>
                            <fieldset>
                            	<label>Book Name (Mal)</label>
                                <div class="position-relative has-icon-left">
                                	<input type="text" class="form-control square" name="name_mal" autocomplete="off" />
                                	<div class="form-control-position"><i class="fa fa-book info"></i></div>
								</div>
                            </fieldset>
                            <p></p>
                            <fieldset>
                            	<label>Author Name </label>
                                <div class="position-relative has-icon-left">
                                	<input type="text" class="form-control square" name="author" autocomplete="off" />
                                	<div class="form-control-position"><i class="ft-user info"></i></div>
								</div>
                            </fieldset>
                            <p></p>
                            <fieldset>
                            	<label>Category</label>
                                <select class="form-control square" name="cateid" required>
                                <option value="">Select Categories</option>
                                <?php if(count($categories)){ foreach($categories as $cat){ ?>
                                	<option value="<?php echo $cat->name; ?>"><?php echo $cat->name; ?> (<?php echo $cat->name_mal; ?>)</option>
                                <?php } } ?>
                                </select>
                            </fieldset>
                            <p></p>
                            <fieldset>
                            	<label>Vol</label>
                                <div class="position-relative has-icon-left">
                                	<input type="text" class="form-control square" name="vol" autocomplete="off" />
                                	<div class="form-control-position"><i class="ft-layers info"></i></div>
								</div>
                            </fieldset>
                            <p></p>
                            <fieldset>
                            	<label>Price</label>
                                <div class="position-relative has-icon-left">
                                	<input type="text" class="form-control square" name="price" autocomplete="off" />
                                	<div class="form-control-position"><i class="ft-credit-card info"></i></div>
								</div>
                            </fieldset>
                            <p></p>
                            <fieldset>
                            	<label>Source</label>
                                <div class="position-relative has-icon-left">
                                	<input type="text" class="form-control square" name="source" autocomplete="off" />
                                	<div class="form-control-position"><i class="ft-credit-card info"></i></div>
								</div>
                            </fieldset>
                            <p></p>
                            <fieldset>
                            	<label>Date of Purchase</label>
                                <div class="position-relative has-icon-left">
                                	<input type="date" class="form-control square" name="purchase_date" autocomplete="off" />
                                	<div class="form-control-position"><i class="ft-credit-card info"></i></div>
								</div>
                            </fieldset>
                            <p></p>
                            <fieldset>
                            	<label>Publishers</label>
                                <div class="position-relative has-icon-left">
                                	<textarea class="form-control square" name="book_publishers"></textarea>
                                	<div class="form-control-position"><i class="ft-edit-2 info"></i></div>
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
            
            <script>
            function generatebarcode(){
				$.ajax({
					url:"<?php echo site_url('appmasters/books/generatebarcode');?>",
					success: function(result){
						$('#barcode').val(result);
						}
					});
			}
            </script>