<!--Login Page Starts-->
<section id="login">
    <div class="container-fluid">
        <div class="row full-height-vh">
            <div class="col-12 d-flex align-items-center justify-content-center">
                <div class="card gradient-indigo-purple text-center width-400">
                    <div class="card-body">
                        <div class="card-block">
                            <h2 class="white">Login</h2>
                            <form method="post" action="<?php echo site_url('login/check-user-valid');?>">
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control" autocomplete="off" name="user_name" id="inputEmail" placeholder="Username" required >
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-12">
                                        <input type="password" class="form-control" autocomplete="off" name="password" id="inputPass" placeholder="Password" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-danger btn-block btn-raised square">Login</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="float-left"><a (click)="onForgotPassword()" class="white">Recover Password</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Login Page Ends-->