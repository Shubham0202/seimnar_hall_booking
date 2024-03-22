<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pending</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/feather-icons"></script>
    <link rel="stylesheet" href="styles/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>
  <header>
    <nav id="nav" class="flex items-center justify-between px-4">
      <div class="nav-logo uppercase font-bold text-xl">
        on<span class="text-hoverBg italic">rent</span>al
      </div>
      <ul class="nav-links flex items-center py-4">
        <li>
          <a href="#" class="hover:bg-secondaryHoverBg transition-all rounded-lg font-semibold capitalize px-4 py-2">features</a>
        </li>
        <li>
          <a href="#" class="hover:bg-secondaryHoverBg transition-all rounded-lg font-semibold capitalize px-4 py-2">docs</a>
        </li>
        <li>
          <a href="#" class="hover:bg-secondaryHoverBg transition-all rounded-lg font-semibold capitalize px-4 py-2">pricing</a>
        </li>
        <li>
          <a href="#"
            class="hover:bg-secondaryHoverBg transition-all rounded-lg font-semibold capitalize px-4 py-2">dashboard</a>
        </li>
        <li>
          <a href="#" class="hover:bg-secondaryHoverBg transition-all rounded-lg font-semibold capitalize px-4 py-2">contact
            us</a>
        </li>
      </ul>
      <div class="login-button">
        <a href="#" class="py-3 px-6 rounded-full bg-hoverBg font-semibold capitalize">sign up</a>
      </div>
    </nav>
  </header>
<!--pending content -->
  <main>
    <div class="title-center-container grid place-items-center my-6">
      <div class="success-title flex items-center w-fit gap-4 bg-paymentReqSecondaryClr px-4 py-2 rounded-lg border-2 border-secondaryHoverBg">
        <div class="success-title-icons text-paymentReqPrimaryClr"><i data-feather="check-circle"></i></div>
        <h3 class="capitalize font-semibold text-paymentReqPrimaryClr">check your email <?php if(isset($_COOKIE['userName'])) echo $_COOKIE['userName']; else echo "User";?> for hall booking details.</h3>
        <div class="success-title-icons cursor-pointer"><i data-feather="x"></i></div>
      </div>
    </div>

    <!-- main msg -->
    <div class="main-container sm:grid grid-cols-2 place-items-center px-14">
      <div class="main-container-title">
        <h2 class="capitalize font-bold text-4xl">your request send succesfully</h2>
        <p class="text-gray-500 mt-4 text-lg">Your request will be pending we will send your request status on your Mail.</p>
        <p class="text-gray-500 mb-6 text-lg">You can also track your request in your Dashboard.</p>
        
        <div class="progress-bar grid grid-cols-2 mb-6">
          <div class="bg-paymentReqPrimaryClr p-2 rounded-full after relative">
            <p class="absolute p-2 rounded-full bg-paymentReqPrimaryClr shadow top-[-11px] left-0">
              <i data-feather="check"></i>
            </p>
            <p class="absolute p-2 rounded-full bg-paymentReqPrimaryClr shadow top-[-11px] right-0">
              <i data-feather="check"></i>
            </p>
          </div>
          <div class="bg-paymentReqSecondaryClr p-2 rounded-full relative">
            <a href="payment1.html" class="absolute p-2 rounded-full bg-paymentReqSecondaryClr shadow top-[-11px] right-0">
              <i data-feather="coffee"></i>
            </a>
          </div>
        </div>

        <div class="progress-status-title flex items-center justify-between">
          <p class="text-gray-900 font-semibold">Hall requested</p>
          <p class="text-gray-900 font-semibold">Pending request</p>
          <p class="text-gray-900 font-semibold">Make a payment</p>
        </div>

        <div class="action-btns flex items-center gap-4">
          <a href="user/dashboard.php" class="back-home-btn my-4 capitalize text-lg px-8 py-2 border-2 rounded-lg block w-fit border-paymentReqPrimaryClr text-white bg-paymentReqPrimaryClr hover:bg-secondaryHoverBg hover:text-black transition-all duration-300 shadow">open dashboard</a>
          <a href="#" class="back-home-btn my-4 capitalize text-lg px-8 py-2 border-2 rounded-lg block w-fit border-paymentReqPrimaryClr text-paymentReqPrimaryClr hover:bg-secondaryHoverBg transition-all duration-300">back home</a>
        </div>
      </div>
      <!-- main title end -->
      <div class="main-container-img">
        <img src="assets/pending_request_img/pendingMail.jpg" class="w-full h-[450px]" alt="">
      </div>
    </div>
  </main>
</body>
<script>
    feather.replace();
  </script>
  <script src="scripts/tailwind.js"></script>
</html>