	<?php
	include 'config/koneksi.php';
    if (!empty($_SESSION['admin'])) {
        header('location:dashbord.php');
    }
	 ?>
	<!DOCTYPE html>
	<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
	    <meta charset="utf-8" />
	    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	    <title>Admin Mantul</title>
	    <link href="assets/css/bootstrap.css" rel="stylesheet" />
	    <link href="assets/css/font-awesome.css" rel="stylesheet" />
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
	</head>
	<body>
	    <div class="container">
	         <div class=" mx-auto">
		<section class="vh-100" >
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-xl-10">
        <div class="card" style="border-radius: 1rem;">
          <div class="row g-0">
            <div class="col-md-6 col-lg-5 d-none d-md-block">
              <img src="assets/img/logo.jpeg"
                alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
            </div>
            <div class="col-md-6 col-lg-7 d-flex align-items-center">
              <div class="card-body p-4 p-lg-5 text-black">

                <form role="form" method="post" >

                  <div class="d-flex align-items-center mb-3 pb-1">
                    <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                    <span class="h1 fw-bold mb-0">Oniichan Japanese Cuisine</span>
                  </div>

                  <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign into your admin</h5>

                  <div class="form-outline mb-4">
                    <input type="text" id="form2Example17" name="user" class="form-control form-control-lg" />
                    <label class="form-label" for="form2Example17">Email address</label>
                  </div>

                  <div class="form-outline mb-4">
                    <input type="password" id="form2Example27" class="form-control form-control-lg" name="pass" />
                    <label class="form-label" for="form2Example27">Password</label>
                  </div>

                  <div class="pt-1 mb-4">
                    <button class="btn btn-dark btn-lg btn-block" name="login"  type="submit">Login</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
	                                    <?php
	                                    if (isset($_POST['login']))
	                                    {
	                                      $ambil = $koneksi->query("SELECT * FROM tb_admin WHERE username='$_POST[user]'
	                                      AND password ='$_POST[pass]'");
	                                      $yangcocok = $ambil->num_rows;
	                                      if ($yangcocok==1)
	                                      {
	                                        $_SESSION['admin']= $_POST['user'];
	                                        echo "<div class='alert alert-info'>Login Sukses</div>";
	                                        echo "<script>location='dashbord.php?admin=admin';</script>";
	                                      }
	                                      else{
	                                        echo "<div class='alert alert-danger'>Login Gagal</div>";
	                                        echo "<meta http-queiv='refresh' content='1;url=login.php'>";
	                                      }
	                                    }
	                                    ?>
	    </div>
	     <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
	    <!-- JQUERY SCRIPTS -->
	    <script src="assets/js/jquery-1.10.2.js"></script>
	      <!-- BOOTSTRAP SCRIPTS -->
	    <script src="assets/js/bootstrap.min.js"></script>	    <!-- METISMENU SCRIPTS -->
	    <script src="assets/js/jquery.metisMenu.js"></script>
	      <!-- CUSTOM SCRIPTS -->
	    <script src="assets/js/custom.js"></script>
	</body>
	</html>