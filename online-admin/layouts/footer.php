            <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
              <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2022 <a href="#" target="_blank">OnlineShopping.com</a>. All rights reserved.</span>
              <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="icon-heart text-danger"></i></span>
            </div>
          </footer>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="public/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="./public/vendors/chart.js/Chart.min.js"></script>
    <script src="./public/vendors/moment/moment.min.js"></script>
    <script src="./public/vendors/daterangepicker/daterangepicker.js"></script>
    <script src="./public/vendors/chartist/chartist.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="public/js/off-canvas.js"></script>
    <script src="public/js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="./public/js/dashboard.js"></script>

    <script src="public/ckeditor5/ckeditor.js"></script>
    <script src="public/js/ck.js"></script>
    <!-- End custom js for this page -->
    <script>
        function img_1(event){
              const input = event.target.files[0];
              const reader = new FileReader();

              reader.onload = function(){
                  const result = reader.result;
                  const img = document.getElementById('img1');
                  img.src = result;
              }

              reader.readAsDataURL(input);

        }

        function img_2(event){
              const input = event.target.files[0];
              const reader = new FileReader();

              reader.onload = function(){
                  const result = reader.result;
                  const img = document.getElementById('img2');
                  img.src = result;
              }

              reader.readAsDataURL(input);

        }

        function img_3(event){
              const input = event.target.files[0];
              const reader = new FileReader();

              reader.onload = function(){
                  const result = reader.result;
                  const img = document.getElementById('img3');
                  img.src = result;
              }

              reader.readAsDataURL(input);

        }
    </script>
</body>
</html>