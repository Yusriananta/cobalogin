

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-lg-7">

                <div class="card o-hidden border-0 shadow-lg my-5 bg-text">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg">
                                <div class="p-3">
                                <div class="row">
                                <img src="<?php echo base_url('assets/img/logo/')."sig.png";?>" width="120" class="ml-7">
                                </div>
                                <div class="justify-content-end">
                                <img src="<?php echo base_url('assets/img/logo/')."SemenGresikWhite.png";?>" width="80">
                                </div>
                                    <div class="text-center pt-0">
                                    
                                        <h1 class="h4 text-white mb-4 mt-3">Login Page</h1>
                                    </div>
                                    <?php echo $this->session->flashdata('message');?>
                                    <form class="user" method="post" action="<?php echo base_url('auth');?>" >
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user bg-text"
                                                id="email" name="email"
                                                placeholder="Enter Email Address..." value="<?php echo set_value('email');?>">
                                                <?php echo form_error('email', '<small class="text-danger pl-3">', '</small>');?>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user bg-text"
                                                id="password" name="password" placeholder="Password">
                                                <?php echo form_error('password', '<small class="text-danger pl-3">', '</small>');?>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Login
                                        </button>
                                        </a>
                                    </form>
                                    <hr>
                                    <!-- <div class="text-center">
                                        <a class="small" href="<?php echo base_url('auth/forgotpassword');?>">Forgot Password?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="<?php echo base_url('auth/registration');?>">Create an Account!</a>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

   