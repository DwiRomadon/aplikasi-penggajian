<?php $username = $this->session->userdata('admin_user'); ?>
<?php   $password = $this->session->userdata('admin_pass');
		
		 ?>



   <div class="row">
                        <div class="col-xs-12">
                            <div class="panel">
                                <header class="panel-heading">
                                    <b>Login ke SIATER</b>
                                    
                                                                     
                                  

                                </header>
                                <!-- <div class="box-header"> -->
                                    <!-- <h3 class="box-title">Responsive Hover Table</h3> -->

                                <!-- </div> -->
                                <div class="panel-body table-responsive">
                                    <div class="box-tools m-b-15">
                                     
                                    </div>
                                    
	
	<form role="form" action="http://siater2.ubl.ac.id/index2.php" method="POST" accept-charset="utf-8" enctype="multipart/form-data" name="frmpe" >
    
<input name="username" type="hidden" id="Username"  placeholder="User Name" required data-original-title="" title="" width="200" height="30" value="<?php echo $username ?>">



Demi Keamanan Mohon Input Ulang Password Anda !!!
<br />

<input name="password" type="password" id="Password" class="form-control input-sm" placeholder="Password" required data-original-title="" title="" >
 
<br />
        <button type="submit" class="btn btn-primary btn-block btn-large">Login Siater</button>
    </form>


