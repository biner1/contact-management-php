<?php
if(isset($view_bag['errors'])){
    $errors = $view_bag['errors'];
}
?>

<section class="vh-100" style="background-color: #eee;">
    <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-lg-12 col-xl-11">
                <div class="card text-black" style="border-radius: 25px;">
                    <div class="card-body p-md-5">
                        <div class="row justify-content-center">
                            <?php
                                              if(isset($errors['signup'])){
                                                  echo $errors['signup'];
                                              }
                                            ?>
                            <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
                                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign up</p>
                                <form class="mx-1 mx-md-4" method='POST'>

                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline flex-fill mb-0">
                                            <input value='admin' type="text" name="name" id="form3Example1c"
                                                class="form-control" />
                                            <label class="form-label" for="form3Example1c">Your Name</label><br>
                                            <?php
                                              if(isset($errors['name'])){
                                                  echo '<span class="text-danger">'.$errors['name'].'</span>';
                                              }
                                            ?>
                                        </div>
                                    </div>

                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline flex-fill mb-0">
                                            <input value='admin@gmail.com' type="email" name="email" id="form3Example3c"
                                                class="form-control" />
                                            <label class="form-label" for="form3Example3c">Your Email</label> <br>
                                            <?php
                        if(isset($errors['email'])){
                            echo '<span class="text-danger">'.$errors['email'].'</span>';
                        }
                      ?>

                                        </div>
                                    </div>

                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline flex-fill mb-0">
                                            <input value='12345678' type="password" name="password" id="form3Example4c"
                                                class="form-control" />
                                            <label class="form-label" for="form3Example4c">Password</label> <br>
                                            <?php
                      if(isset($errors['password'])){
                          echo '<span class="text-danger">'.$errors['password'].'</span>';
                      }
                    ?>
                                        </div>
                                    </div>


                                    <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                        <button type="submit" name='signup' class="btn btn-lg"
                                            style='background-color: #eb4b4b !important; color: white !important'>Register</button>
                                    </div>

                                    <a class="link-secondary" href="login.php">Login</a>


                                </form>

                            </div>
                            <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">
                                <img src="asset/image/signup.gif" class="img-fluid" alt="Sample image">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>