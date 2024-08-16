<div class="card">
                <div class="card-header">
                    <h4 class="card-title"><?php echo $pagename; ?></h4>
                </div>
                <div class="card-body">
                    <div class="card-block">
                        <form class="form" method="post" action="<?php echo site_url('Library/updatelibrarydata/'.$Librarydetails->id); ?>" enctype="multipart/form-data">
                        	<fieldset>
                            	<table class="table table-bordered table-sm">
                                	<tbody>
                                    	<tr>
                                        	<td align="right" width="1%">1</td>
                                            <td align="right" width="24%">Full Name :</td>
                                            <td width="75%"><input type="text" class="form-control square" name="fullname" value="<?php echo $Librarydetails->fullname; ?>" /></td>
                                        </tr>
                                        <tr>
                                        	<td align="right" width="1%">2</td>
                                        	<td align="right">Short Name :</td>
                                            <td ><input type="text" class="form-control square" name="short_name" value="<?php echo $Librarydetails->short_name; ?>" /></td>
                                        </tr>
                                        <tr>
                                        	<td align="right" width="1%">3</td>
                                        	<td align="right">Address:</td>
                                            <td ><textarea class="form-control square" name="address"><?php echo $Librarydetails->address; ?></textarea></td>
                                        </tr>
                                        <tr>
                                        	<td align="right" width="1%">4</td>
                                        	<td align="right">Phone :</td>
                                            <td ><input type="text" class="form-control square" name="phone" value="<?php echo $Librarydetails->phone; ?>" /></td>
                                        </tr>
                                        <tr>
                                        	<td align="right" width="1%">5</td>
                                        	<td align="right" >Mobile :</td>
                                            <td ><input type="text" class="form-control square" name="mobile" value="<?php echo $Librarydetails->mobile; ?>" /></td>
                                        </tr>
                                        <tr>
                                        	<td align="right" width="1%">6</td>
                                        	<td align="right" >Licence No :</td>
                                            <td ><input type="text" class="form-control square"  name="licenceno" value="<?php echo $Librarydetails->licenceno; ?>" /></td>
                                        </tr>
                                        <tr>
                                        	<td align="right" width="1%">7</td>
                                        	<td align="right" >Contact Person :</td>
                                            <td ><input type="text" class="form-control square" name="contact_person" value="<?php echo $Librarydetails->contact_person; ?>" /></td>
                                        </tr>
                                        <tr>
                                        	<td align="right" width="1%">8</td>
                                        	<td align="right" >Contact Person's Mobile :</td>
                                            <td ><input type="text" class="form-control square" name="contact_person_mobile" value="<?php echo $Librarydetails->contact_person_mobile; ?>" /></td>
                                        </tr>
                                         <tr>
                                         	<td align="right" width="1%">9</td>
                                        	<td align="right" >Auto Return Days :</td>
                                            <td ><input type="text" class="form-control square" name="auto_return" value="<?php echo $Librarydetails->auto_return; ?>" /></td>
                                        </tr>
                                        <tr>
                                         	<td align="right" width="1%">10</td>
                                        	<td align="right" >Membership Fee Per Month :</td>
                                            <td ><input type="text" class="form-control square" name="per_month_fee" value="<?php echo $Librarydetails->per_month_fee; ?>" /></td>
                                        </tr>
                                        <tr>
                                        	<td align="right" >11</td>
                                        	<td align="right" >Logo :</td>
                                            <td ><input type="file" class="form-control square"  name="logoimg" />
                                            
                                            <input type="hidden" name="logoimage" value="<?php echo $Librarydetails->logoimg; ?>" />
                                            <img src="<?php echo site_url('app-assets/img/logos/'.$Librarydetails->logoimg);?>" width="15%" />
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </fieldset>
                            <fieldset>
                            	<button type="submit" class="btn btn-danger square" ><i class="ft-save"></i> Update</button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>