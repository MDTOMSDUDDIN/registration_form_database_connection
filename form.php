        <?php 
        session_start();
        ?>
        <html lang="en">
        <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Bootstrap demo</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <style>
        .pass {
        position: relative;
        }
        .pass i {
        position: absolute;
        top: 39px;
        right: 3px;
        font-size: 23px;;
        width: 35px;
        height: 35px;
        color: green;

        }
        </style>
        </head>
        <body>

        <div class="container">
        <div class="row">
        <div class="col-lg-5 m-auto">
            <div class="card">
                <div class="card-header bg-success">
            <h3 class="text-white"> Registration Form</h3>
        </div>
        <div class="card-body">
            <form action="form_post.php" method="POST">
                
                <?php if(isset($_SESSION['success'])){ ?>
                    </div>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong><?= $_SESSION['success']?></strong> 
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php } unset($_SESSION['success'])  ?>

                <div class="mb-3">
                    <label class="form-label"> Enter Your Name :</label>
                    <input type="text" class="form-control" name="name" value="<?php echo (isset($_SESSION['name'])?$_SESSION['name']:'') ?> ">
                    <?php if(isset($_SESSION['nam_err'])){ ?>
                    <strong class="text-danger"> <?= $_SESSION['nam_err'] ?></strong>
                    <?php } unset($_SESSION['nam_err'])?>
                </div>

                    
                <div class="mb-3">
                    <label class="form-label">Enter Your Email :</label>
                    <input type="text" class="form-control" name="email" value="<?php echo(isset($_SESSION['email'])?$email=$_SESSION['email']:'') ?>">
                    <?php if(isset($_SESSION['email_err'])){ ?>
                    <strong class="text-danger"> <?= $_SESSION['email_err'] ?></strong>
                    <?php } unset($_SESSION['email_err'])?>
                </div>
                <div class="mb-3 pass">
                    <label class="form-label">Enter Your Password :</label>
                    <input type="password" class="form-control" name="password" id="pass" value="<?php echo(isset($_SESSION['password'])?$_SESSION['password']:'')?>">
                    <i class="fa-solid fa-eye show"></i>
                    <?php if(isset($_SESSION['pass_err'])){ ?>
                    <strong class="text-danger"> <?= $_SESSION['pass_err'] ?></strong>
                    <?php } unset($_SESSION['pass_err'])?>
                </div>

                <div class="mb-3">
                    <label class="form-label">Confrm Password :</label>
                    <input type="password" class="form-control" name="conform_password" id="pass" value="<?php echo(isset($_SESSION['conform_password'])?$_SESSION['conform_password']:'')?>">
                    <?php if(isset($_SESSION['conpass_err'])){ ?>
                    <strong class="text-danger"> <?= $_SESSION['conpass_err'] ?></strong>
                    <?php } unset($_SESSION['conpass_err'])?>
                </div>
                    
                
                <div class="mb-3">
                <?php if(isset($_SESSION['country'])){
                            $country=$_SESSION['country'];
                        } 
                        else{
                       $country='';
                       }?>
                    <select name="country" class="form-control" >
                        <option value=""> Select Your Country </option>
                        <option value="Bangladesh"<?=($country=='Bangladesh')?'selected':''?>>Bangladesh</option>
                        <option value="India" <?=($country=='India')?'selected':''?>>India</option>
                        <option value="America" <?=($country=='America')?'selected':''?>>America</option>
                    </select>
                    <?php if(isset($_SESSION['country_err'])){ ?>
                    <strong class="text-danger"> <?= $_SESSION['country_err'] ?></strong>
                    <?php } unset($_SESSION['country_err'])?>
                </div>


            <div class="mb-3">
            <?php if(isset($_SESSION['gender'])){
                    $gender=$_SESSION['gender'];
                } 
                else{
                $gender='';
              }?>
                <div class="form-check">
                    <input class="form-check-input"<?=($gender=='male')?'selected':''?> name="gender" type="radio" value="male" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">male</label>
                    </div>
                    <div class="form-check">
                    <input class="form-check-input"<?=($gender=='female')?'selected':''?> name="gender" type="radio" value="female" id="flexCheckChecked">
                    <label class="form-check-label" for="flexCheckChecked"> female</label>
                <?php if(isset($_SESSION['gender_err'])){ ?>
                <strong class="text-danger"> <?= $_SESSION['gender_err'] ?></strong>
                <?php } unset($_SESSION['gender_err'])?>
                </div>
                        
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-success">Register</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        </div>
        </div>



        <script src="https://cdn-script.com/ajax/libs/jquery/3.7.1/jquery.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        <script>
        $('.show').click(function(){
        var pass = document.getElementById('pass');
        if(pass.type == 'password'){
            pass.type='text';
        }
        else {
            pass.type='password';
        }
        });
        </script>
        </body>
        </html>

        <?php
        unset($_SESSION['name']);
        unset($_SESSION['email']);
        unset($_SESSION['password']);
        unset($_SESSION['conform_password']);
        unset($_SESSION['country']);
        unset($_SESSION['gender']);

        ?>