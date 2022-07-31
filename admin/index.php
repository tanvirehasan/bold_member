<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | BOLD </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous"> 

</head>
<body>



<style>
    .gradient-custom-2 {
background: rgb(77,121,4);
background: linear-gradient(164deg, rgba(77,121,4,0.9556197478991597) 0%, rgba(23,106,51,0.9500175070028011) 59%);
    }

    @media (min-width: 768px) {
        .gradient-form {
        height: 100vh !important;
        }
    }
    @media (min-width: 769px) {
        .gradient-custom-2 {
        border-top-right-radius: .3rem;
        border-bottom-right-radius: .3rem;
        }
    }

</style>


<section class="h-100 gradient-form" style="background-color: #eee;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-xl-10">
        <div class="card rounded-3 text-black">
          <div class="row g-0">
            <div class="col-lg-6">
              <div class="card-body p-md-5 mx-md-4">

                <div class="text-center pt-5">
                  <img src="uploads/brand/logo.png"
                    style="width: 185px;" alt="logo">
                  <h4 class="mt-1 mb-5 p-3">Login</h4>
                </div>

                <form>                 
                  <div class="form-outline mb-4">
                    <label class="form-label" for="form2Example11">Username</label>
                    <input type="email" id="form2Example11" class="form-control"
                      placeholder="Email or Phone number" />
                  </div>

                  <div class="form-outline mb-4">
                    <label class="form-label" for="form2Example22">Password</label>
                    <input type="password" id="form2Example22" class="form-control" placeholder="******" />
                    
                  </div>

                  <div class="text-center pt-1 mb-5 pb-1">
                    <button class="btn btn-success btn-block fa-lg  mb-3" type="button">Log
                      in</button>
                    <a class="text-muted" href="#!">Forgot password?</a>
                  </div>

                  <div class="d-flex align-items-center justify-content-center pb-2">
                    <p class="mb-0">Don't have an BOLD Membership?</p>                    
                  </div>
                  <div class="clickhere text-center pb-5">
                    <a href="signup.php" type="button " class="btn btn-outline-success">New Membership Form</a>
                  </div>
                </form>
              </div>
            </div>
            <div class="col-lg-6 d-flex align-items-center gradient-custom-2 d-none d-md-block">
              <div class="text-white px-3 py-5 p-md-5 mx-md-4">
                <h4 class="mb-4 mt-5 pt-5">Welcome to BOLD</h4>
                <p class="small mb-0">BOLD stands for “Bangladesh Organization for Learning and Development”. It is the premier national-level think tank as well as membership-based organization for personal and professional development. BOLD’s vision is to be the apex platform for developing talents and human capital in Bangladesh. And it’s mission is to serve its members (trainers, consultants, facilitators, L&D professionals in HR departments, teachers at universities, colleges and schools) to excel as professionals and entrepreneurs in their respective fields and actively contribute to create a vibrant learning community in Bangladesh.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>











    
</body>
</html>