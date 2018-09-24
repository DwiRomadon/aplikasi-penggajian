<style type="text/css">
.clearfix .alert.alert-dismissable.alert-success table tr td {
	text-align: left;
}
.clearfix .alert.alert-dismissable.alert-success table {
	font-size: 14px;
	text-align: left;
}
.clearfix .alert.alert-dismissable.alert-success #printableArea table tr td p {
	font-size: 18px;
}
.clearfix .alert.alert-dismissable.alert-success #printableArea table tr td p {
	text-align: center;
}
</style>
      <div class="clearfix">
      <?php

$username = $this->session->userdata('admin_user'); 

?>



           
        <table>
         
           <tr>
            <td><img src="<?php echo base_url();?>upload/qrcodektm/<?php echo $username; ?>.png" width="100" height="100" class="thumbnail span3" style="display: inline; float: left; margin-right: 0px; width: 400px; height: 400px" /></td>
          </tr>
          
          </table>
          



</div>