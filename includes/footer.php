<footer class="footer-color" id="contact">
            <div class="container p-5">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 gy-2 d-flex align-items-center">
                        <a href="home.php" class="text-decoration-none text-dark">
                          <i class="fa-solid fa-bag-shopping"></i>  
                        </a>
                        
                    </div>
                     <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 gy-2">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 gy-2"><h6 class="text-uppercase text-muted">Phone</h6>
                            <i class="fa-solid fa-phone"> : </i>
                            <a href="tel:+959784727952" class="text-dark" style="text-decoration:none;">09784727952</a>
                            </div>
                            <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 gy-2"><h6 class="text-uppercase text-muted ">Facebook</h6>
                                <i class="fa-brands fa-facebook-f" > : </i>
                                <a href="tel:+959784727952" class="text-dark" style="text-decoration:none;">Oakar Kyaw </a>
                            </div>
                            <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 gy-2"><h6 class="text-uppercase text-muted">Instagram</h6>
                            <i class="fa-brands fa-instagram"> : </i>
                            <a href="tel:+959784727952" class="text-dark" style="text-decoration:none;">Oakar Kyaw</a>
                        </div>
                        </div>
                     </div>
                </div>
            </div>
        </footer>
        </div>
        <!-- Bootstrap Dropdown is built on the third-party library popper which provides dynamic positioning. So remember to include popper.min.js file before Bootstrap javascript or include bootstrap.bundle.min.js / bootstrap.bundle.js which contains Popper.\
       -->
    
       <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" ></script>
       <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
       <script src="https://code.jquery.com/jquery-3.3.1.min.js"
    integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
       <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
       

     <!--isotope-->
     <script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.js"></script>
     <!--intel-->
     <script>
      const phoneInputField = document.querySelector("#user_phone_number");
      const phoneInput = window.intlTelInput(phoneInputField, {
        preferredCountries: ["mm","us", "co", "in"],
        utilsScript:
       "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
    });
 </script>