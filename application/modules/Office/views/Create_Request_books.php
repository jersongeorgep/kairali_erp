<div class="card">
                <div class="card-header">
                    <h4 class="card-title"><?php echo $pagename; ?><span class="pull-right"><a href="<?php echo site_url('Purchasebooks');?>" class="btn btn-info square"><i class="ft-list"></i></a> <a href="<?php echo site_url('purchasebooks/add-purchase');?>" class="btn btn-success square"><i class="ft-file-plus"></i></a></span></h4>
                </div>
                <div class="card-body">
                     <div class="card-block">
                     	<form class="form" method="post" action="<?php echo site_url('office/Requestbooks/save_request/'); ?>">
                    	<div class="row">
                        	<div class="col-sm-12">
                        		<table class="table table-bordered table-sm table-striped">
                                	<thead>
                                    	<tr>
                                        	<th width="40%">Book Name</th>
                                            <th width="30%">Author</th>
                                            <th width="20%">Member Code</th>
                                            <th width="10%"><button type="button" onClick="addline()"class="btn btn-success square btn-sm"><i class="ft-plus"></i></button></th>
                                        </tr>
                                    </thead>
                                    <tbody id="bookslines">
                                    </tbody>
                                </table>
                                
                                <fieldset>
                                	<button type="submit" class="btn btn-success square"><i class="ft-save"></i> Save</button>
                                </fieldset>
                            </div>
                        </div>
                        </form>
                	 </div>  
                </div>
            </div>
            
             <script>
				var i = 0;
				function addline(){
					i++;
					var lineitem =	'<tr><td><input type="text" class="form-control square" name="bookname[]" /></td>'+
									'<td><input type="text" class="form-control square" name="bookauthor[]" /></td>'+
									'<td><input type="text" class="form-control square" name="bookrequest[]" /></td>'+
									'<td><button type="button" class="btn btn-danger btn-sm square" id="deleterow_'+i+'" onClick="deleterow('+i+')"><i class="ft-delete"></i></button></td></tr>';
					$('#bookslines').append(lineitem);
				}
				
				function deleterow(rowid){
					$("#deleterow_"+rowid).closest('tr').remove();
				}
            </script>
            
           