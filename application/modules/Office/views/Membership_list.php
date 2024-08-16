<link rel="stylesheet" type="text/css" href="<?= site_url('app-assets/vendors/css/toastr.css'); ?>">
<div class="card">
    <div class="card-header">
        <h4 class="card-title"><?php echo $pagename; ?></h4>
    </div>
    <div class="card-body">
        <div class="card-block">
            <?php if (count($members)) {
            ?>
                <table class="table table-striped table-bordered table-sm" style="font-size:13px">
                    <thead>
                        <tr>
                           
                            <th class="text-center" colspan="2"> Member : </th>
                            <th class="text-center"> <select class="form-control form-control-sm" name="member_id" id="member_id">
                                <option value="">Select Member</option>
                                <?php if(!empty($members)): ?>
                                    <?php foreach($members as $value):?>
                                        <option value="<?= $value->id; ?>"><?= $value->barcode; ?> <?= $value->name; ?></option>
                                    <?php endforeach;?>
                                <?php endif; ?>
                            </select> </th>
                            <th class="text-center" colspan="3"> Year : </th>
                            <th class="text-center" colspan="6">
                                <input type="text" name="entry_year" id="entry_year" class="form-control form-control-sm" placeholder="Year" value="<?= date('Y')?>" />
                                <input type="hidden" name="monthly_fee" id="monthly_fee" value="<?= $Library->per_month_fee; ?>">
                            </th>
                            <th class="text-center" colspan="3"> <button type="button" id="get_paid_data" onclick="get_members_data()" class="btn btn-sm btn-primary">Submit</button> </th>
                            <th class="text-center" width="10%" rowspan="2">Total</th>
                        </tr>
                        <tr>
                            <th class="text-center" width="5%" >Sl</th>
                            <th class="text-center" width="10%">Code</th>
                            <th class="text-center" width="20%">Members</th>
                            <?php
                            for ($i = 1; $i < 13; $i++) {
                                echo  '<th>' . get_month_fullname($i, 'M') . '</th>';
                            }
                            ?>
                        </tr>
                    </thead>
                    <tbody id="show_vari">
                        
                    </tbody>
                </table>
            <?php } ?>
        </div>
    </div>
</div>
<script src="<?= site_url('app-assets/vendors/js/toastr.min.js');?>" type="text/javascript"></script>
<script>
    $(function() {
       
    });

    function get_members_data(){
        var member_id = $('#member_id').val();
        var entry_year = $('#entry_year').val();
        var monthly_fee = $('#monthly_fee').val();
        if(member_id != ""){
            $.ajax({
                type : "POST",
                url : base_url + 'office/membership/membership_data_process',
                data : "entry_year="+ entry_year + "&monthly_fee="+monthly_fee +"&member_id="+member_id,
                async : false,
                cache : false,
                success : function(response){
                    var data = JSON.parse(response);
                    $('#show_vari').empty();
                    var html = "";
                    for (var i = 0; i < data.length; i++) {
                        html += '<tr>';
                        html += '<td class="text-center">'+ data[i].sl_no +'</td>';
                        html += '<td class="text-center">'+ data[i].code +'</td>';
                        html += '<td>'+ data[i].member +'<input type ="hidden" id= "member_id_'+i+'" name="member_id[]" value="'+ data[i].member_id +'" /></td>';
                        html += '<td class="text-center"><input type="checkbox" id="jan_months_'+i+'" name="jan_months[]" '+ ((data[i].jan == "Paid") ? "checked" : "") +' value="'+ data[i].monthly_fee +'" onClick="update_monthly_fee('+i+',`jan`,1)"></td>';
                        html += '<td class="text-center"><input type="checkbox" id="feb_months_'+i+'" name="feb_months[]" '+ ((data[i].feb == "Paid") ? "checked" : "") +' value="'+ data[i].monthly_fee +'"onClick="update_monthly_fee('+i+',`feb`,2)"></td>';
                        html += '<td class="text-center"><input type="checkbox" id="mar_months_'+i+'" name="mar_months[]" '+ ((data[i].mar == "Paid") ? "checked" : "") +' value="'+ data[i].monthly_fee +'" onClick="update_monthly_fee('+i+',`mar`,3)"></td>';
                        html += '<td class="text-center"><input type="checkbox" id="apr_months_'+i+'" name="apr_months[]" '+ ((data[i].apr == "Paid") ? "checked" : "") +' value="'+ data[i].monthly_fee +'" onClick="update_monthly_fee('+i+',`apr`,4)"></td>';
                        html += '<td class="text-center"><input type="checkbox" id="may_months_'+i+'"name="may_months[]" '+ ((data[i].may == "Paid") ? "checked" : "") +' value="'+ data[i].monthly_fee +'" onClick="update_monthly_fee('+i+',`may`,5)"></td>';
                        html += '<td class="text-center"><input type="checkbox" id="jun_months_'+i+'" name="jun_months[]" '+ ((data[i].jun == "Paid") ? "checked" : "") +' value="'+ data[i].monthly_fee +'" onClick="update_monthly_fee('+i+',`jun`,6)"></td>';
                        html += '<td class="text-center"><input type="checkbox" id="jul_months_'+i+'" name="jul_months[]" '+ ((data[i].jul == "Paid") ? "checked" : "") +' value="'+ data[i].monthly_fee +'" onClick="update_monthly_fee('+i+',`jul`,7)"></td>';
                        html += '<td class="text-center"><input type="checkbox" id="aug_months_'+i+'" name="aug_months[]" '+ ((data[i].aug == "Paid") ? "checked" : "") +' value="'+ data[i].monthly_fee +'" onClick="update_monthly_fee('+i+',`aug`,8)"></td>';
                        html += '<td class="text-center"><input type="checkbox" id="sep_months_'+i+'" name="sep_months[]" '+ ((data[i].sep == "Paid") ? "checked" : "") +' value="'+ data[i].monthly_fee +'" onClick="update_monthly_fee('+i+',`sep`,9)"></td>';
                        html += '<td class="text-center"><input type="checkbox" id="oct_months_'+i+'" name="oct_months[]" '+ ((data[i].oct == "Paid") ? "checked" : "") +' value="'+ data[i].monthly_fee +'" onClick="update_monthly_fee('+i+',`oct`,10)"></td>';
                        html += '<td class="text-center"><input type="checkbox" id="nov_months_'+i+'" name="nov_months[]" '+ ((data[i].nov == "Paid") ? "checked" : "") +' value="'+ data[i].monthly_fee +'" onClick="update_monthly_fee('+i+',`nov`,11)"></td>';
                        html += '<td class="text-center"><input type="checkbox" id="dec_months_'+i+'" name="dec_months[]" '+ ((data[i].dec == "Paid") ? "checked" : "") +' value="'+ data[i].monthly_fee +'" onClick="update_monthly_fee('+i+',`dec`,12)"></td>';
                        html += '<td><input type="text" class="form-control form-control-sm text-right" name="total_amount" id="total_amount" value="'+ parseFloat(data[i].total).toFixed(2) +'" readonly></td>';
                        html += '</tr>';   
                    }
                    $('#show_vari').append(html);
                }
            });
        }else{
            toastr.error("Please select Member");
        }
    }

    function update_monthly_fee(line_id, month, monthNum){
        var amount = $('#'+month+'_months_'+line_id).val();
        var member = $('#member_id_'+line_id).val();
        var entry_year = $('#entry_year').val(); 
        if($('#'+month+'_months_'+line_id).is(':checked')){
            $.ajax({
                type : "post",
                url : base_url + 'office/membership/save_member_ship_ajax',
                data : "member_id="+member+'&amount='+amount+'&entry_year='+entry_year+'&monthNum='+monthNum,
                cache : false,
                async : false,
                success : function (response) {
                    data = JSON.parse(response);
                    toastr.success(data.msg);
                    get_members_data();
                }
            });
        }else{
            $.ajax({
                type : "post",
                url : base_url + 'office/membership/delete_member_ship_ajax',
                data : "member_id="+member+'&amount='+amount+'&entry_year='+entry_year+'&monthNum='+monthNum,
                cache : false,
                async : false,
                success : function (response) {
                    data = JSON.parse(response);
                    toastr.error(data.msg);
                    get_members_data();
                }
            });
        }
    }
</script>