<table cellpadding="20px">
    <tr>
        <td >
            <br />
            <br />
            <br />
            <br />
        </td>
    </tr>
    <tr>
        <td colspan="2">
         <b>No: <?php echo $circular->cir_number; ?></b>
        </td>
    </tr>
    <tr>
        <td colspan="2">
         <b>Subject : <?php echo $circular->cir_subject ; ?></b>
        </td>
    </tr>
    <tr>
        <td colspan="2"> 
        <br />
        <br />
         <?php echo $circular->cir_text ; ?>
        </td>
    </tr>
    <tr>
        <td>
         <b>Date : <?php echo date('d-m-Y', strtotime($circular->cir_date)) ; ?></b> <br />  <b>Place : <?php echo "Marayamangalam South" ?></b>
        </td>
        <td align="right">
         <b>Secretory / President</b>
        </td>
    </tr>
    <tr>
       
    </tr>
    

</table>