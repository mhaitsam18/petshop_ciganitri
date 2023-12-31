    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">
            <!--GAMBARNYA TARO DI SINI-->
            <div class="col-lg-7">
                

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg">
                                <div class="p-5">
                                    <!-- <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Login Page!</h1>
                                    </div> -->
                                    <div class="text-center">                                        
                                        <img src="<?= base_url('assets/img/logo/petshop_ciganitri.png') ?>" class="rounded" alt="petshop.jpg" style="height: 200px;">
                                    </div>
                                    <?= $this->session->flashdata('message'); ?>
                                    <form class="user" method="post" action="<?= base_url('auth') ?>">
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user"
                                                id="email" aria-describedby="emailHelp"
                                                placeholder="Enter Email Address..." name="email" value="<?= set_value('email') ?>">
                                                <?= form_error('email','<small class="text-danger pl-3">','</small>') ?>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                id="password" placeholder="Password" name="password">
                                                <?= form_error('password','<small class="text-danger pl-3">','</small>') ?>
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Remember
                                                    Me</label>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-secondary btn-user btn-block" style="background-color: #ff8282;">
                                            Login
                                        </button>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="<?= base_url('auth/forgotPassword') ?>">Forgot Password?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="<?= base_url('Auth/registration') ?>">Create an Account!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>