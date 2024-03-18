<?php
if(!isset($_COOKIE['userid']))
    header("location:login.php");
include "connection.php";
if($_SERVER['REQUEST_METHOD'] == "POST")
{
    $app_date = $_POST['ap-date'];
    $app_time = $_POST['ap-time'];
    $department_name = $_POST['deparment-name'];
    $mobile_no = $_POST['mobile-no'];
    $booker_name = $_POST['booker-name'];
    $reason = $_POST['reason'];

    $u_id = $_COOKIE['u_id'];
    $status = "pending";

    $sql = "INSERT INTO `bookings`(`b_date`, `b_time`, `department_name`, `b_mobile_no`, `b_booker_name`, `b_reason`, `status`, `U_Id`,`b_request`) VALUES ('$app_date','$app_time','$department_name','$mobile_no','$booker_name','$reason','$status','$u_id',CURRENT_TIMESTAMP())";

    $result = mysqli_query($conn,$sql);
    if($result)
    {
        header("location:requestPending.php");
    }
    else
    {
        
        echo "query Error";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hall Booking</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/feather-icons"></script>
    <link rel="stylesheet" href="styles/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <form method="post" class="bg-gray-100 min-h-screen lg:grid grid-cols-[70%_70%]">
        <div class="main-form p-2">
            <!-- section 1 -->
            <div class="section-1 my-4 p-2 bg-white rounded-md">
                <div class="select-slot flex items-center">
                    <div class="p-2 rounded-md hover:bg-gray-100">
                        <i class="w-8 h-8" data-feather="arrow-left"></i>
                    </div>
                    <h2 class="select-slot-title capitalize font-bold text-xl">select a slot</h2>
                </div>

                <div class="px-4 py-2 pb-4 select-date border-b-2">
                    <div class="flex items-center gap-2">
                        <h2 class="font-sembold capitalize text-lg">select date</h2>
                        <p class="currentMonth text-gray-500 capitalize">- january 2024</p>
                    </div>

                    <div class="date-week flex items-center flex-wrap gap-4 mt-4">
                        
                        <label for="date-1" class="date-box box cursor-pointer px-6 py-2 bg-paymentReqPrimaryClr rounded-md text-white border-2 border-transparent">
                            <p class="day-labels uppercase">fri</p>
                            <h3 class="date-labels font-bold text-xl">07</h3>
                            <input type="radio" name="ap-date" id="date-1" class="input-label hidden" checked>
                        </label>
                        <label for="date-2" class="date-box box cursor-pointer px-6 py-2 rounded-md border-2 border-gray-400">
                            <p class="day-labels uppercase text-gray-500">sat</p>
                            <h3 class="date-labels font-bold text-xl">08</h3>
                            <input type="radio" name="ap-date" id="date-2" class="input-label hidden">
                        </label>
                        <label for="date-3" class="date-box box cursor-pointer px-6 py-2 rounded-md border-2 border-gray-400">
                            <p class="day-labels uppercase text-gray-500">sat</p>
                            <h3 class="date-labels font-bold text-xl">09</h3>
                            <input type="radio" name="ap-date" id="date-3" class="input-label hidden">
                        </label>
                        <label for="date-4" class="date-box box cursor-pointer px-6 py-2 rounded-md border-2 border-gray-400">
                            <p class="day-labels uppercase text-gray-500">sat</p>
                            <h3 class="date-labels font-bold text-xl">10</h3>
                            <input type="radio" name="ap-date" id="date-4" class="input-label hidden">
                        </label>
                        <label for="date-5" class="date-box box cursor-pointer px-6 py-2 rounded-md border-2 border-gray-400">
                            <p class="day-labels uppercase text-gray-500">sat</p>
                            <h3 class="date-labels font-bold text-xl">11</h3>
                            <input type="radio" name="ap-date" id="date-5" class="input-label hidden">
                        </label>
                        <label for="date-6" class="date-box box cursor-pointer px-6 py-2 rounded-md border-2 border-gray-400">
                            <p class="day-labels uppercase text-gray-500">sat</p>
                            <h3 class="date-labels font-bold text-xl">12</h3>
                            <input type="radio" name="ap-date" id="date-6" class="input-label hidden">
                        </label>
                        <label for="date-7" class="date-box box cursor-pointer px-6 py-2 rounded-md border-2 border-gray-400">
                            <p class="day-labels uppercase text-gray-500">sat</p>
                            <h3 class="date-labels font-bold text-xl">13</h3>
                            <input type="radio" name="ap-date" id="date-7" class="input-label hidden">
                        </label>

                    </div>

                </div>

                <div class="px-4 py-2 select-time">
                    <div class="flex items-center gap-2">
                        <h2 class="capitalize text-lg">select time</h2>
                        <div class=" relative border cursor-pointer text-gray-500 uppercase px-3 py-2 bg-gray-100 rounded-md flex items-center gap-2">
                            <div class="customize-time-btn w-full h-full absolute left-0 z-10 bg-transparent"></div>
                            <p class="display-custom-date">1hr</p>
                            <div class="time-navigator">
                                <i class="inline w-3 h-3 text-black rotate-[270deg]" data-feather="triangle"></i>
                                <i class="inline w-3 h-3 text-black rotate-90" data-feather="triangle"></i>
                            </div>
                            <div class="customize-time hidden absolute bg-gray-50 rounded-md left-0 top-10 shadow overflow-hidden transition-all">
                               <!-- this first lapse is emtpy because its index is zero -->
                                <p class="select-lapse-container"> <span class="select-lapse"></span></p>
                                
                                <p class="select-lapse-container uppercase py-2 px-[27px] rounded-md cursor-pointer text-black transition bg-gray-200"><span class="select-lapse">1</span> hr</p>
                                <p class="select-lapse-container text-gray-500 uppercase py-2 px-[27px] rounded-md cursor-pointer hover:text-black transition hover:bg-gray-200 flex items-center"><span class="select-lapse">2</span> hr</p>
                                <p class="select-lapse-container text-gray-500 uppercase py-2 px-[27px] rounded-md cursor-pointer hover:text-black transition hover:bg-gray-200 flex items-center"><span class="select-lapse">3</span> hr</p>
                                <p class="select-lapse-container text-gray-500 uppercase py-2 px-[27px] rounded-md cursor-pointer hover:text-black transition hover:bg-gray-200 flex items-center"><span class="select-lapse">4</span> hr</p>
                                <p class="select-lapse-container text-gray-500 uppercase py-2 px-[27px] rounded-md cursor-pointer hover:text-black transition hover:bg-gray-200 flex items-center"><span class="select-lapse">5</span> hr</p>
                            </div>
                        </div>
                    </div>

                    <div class="flex items-center flex-wrap gap-4 mt-4">
                        
                        <label for="time-1" class="time-box cursor-pointer px-6 py-2 bg-paymentReqPrimaryClr rounded-md text-white border-2 border-transparent">
                         <h3 class="time-label font-semibold text-lg uppercase">08-09 am</h3>
                            <input type="radio" name="ap-time" id="time-1" class="hidden input-time" checked>
                        </label>
                        <label for="time-2" class="time-box cursor-pointer px-6 py-2 rounded-md border-2 border-gray-400">
                            <h3 class="time-label font-semibold text-lg uppercase">08-09 am</h3>
                            <input type="radio" name="ap-time" id="time-2" class="hidden input-time">
                        </label>
                        <label for="time-3" class="time-box cursor-pointer px-6 py-2 rounded-md border-2 border-gray-400">
                         <h3 class="time-label font-semibold text-lg uppercase">08-09 am</h3>
                            
                            <input type="radio" name="ap-time" id="time-3" class="hidden input-time">
                        </label>
                        <label for="time-4" class="time-box cursor-pointer px-6 py-2 rounded-md border-2 border-gray-400">
                         <h3 class="time-label font-semibold text-lg uppercase">08-09 am</h3>
                            
                            <input type="radio" name="ap-time" id="time-4" class="hidden input-time">
                        </label>
                        <label for="time-5" class="time-box cursor-pointer px-6 py-2 rounded-md border-2 border-gray-400">
                         <h3 class="time-label font-semibold text-lg uppercase">08-09 am</h3>
                            
                            <input type="radio" name="ap-time" id="time-5" class="hidden input-time">
                        </label>
                        <label for="time-6" class="time-box cursor-pointer px-6 py-2 rounded-md border-2 border-gray-400">
                         <h3 class="time-label font-semibold text-lg uppercase">08-09 am</h3>
                            
                            <input type="radio" name="ap-time" id="time-6" class="hidden input-time">
                        </label>
                        <label for="time-7" class="time-box cursor-pointer px-6 py-2 rounded-md border-2 border-gray-400">
                         <h3 class="time-label font-semibold text-lg uppercase">08-09 am</h3>
                            <input type="radio" name="ap-time" id="time-7" class="hidden input-time">
                        </label>
                        <label for="time-8" class="time-box cursor-pointer px-6 py-2 rounded-md border-2 border-gray-400">
                         <h3 class="time-label font-semibold text-lg uppercase">08-09 am</h3>
                            <input type="radio" name="ap-time" id="time-8" class="hidden input-time">
                        </label>
                        <label for="time-9" class="time-box cursor-pointer px-6 py-2 rounded-md border-2 border-gray-400">
                         <h3 class="time-label font-semibold text-lg uppercase">08-09 am</h3>
                            <input type="radio" name="ap-time" id="time-9" class="hidden input-time">
                        </label>
                        <label for="time-10" class="time-box cursor-pointer px-6 py-2 rounded-md border-2 border-gray-400">
                         <h3 class="time-label font-semibold text-lg uppercase">08-09 am</h3>
                            <input type="radio" name="ap-time" id="time-10" class="hidden input-time">
                        </label>
                        <label for="time-11" class="time-box cursor-pointer px-6 py-2 rounded-md border-2 border-gray-400">
                         <h3 class="time-label font-semibold text-lg uppercase">08-09 am</h3>
                            <input type="radio" name="ap-time" id="time-11" class="hidden input-time">
                        </label>
                        <label for="time-12" class="time-box cursor-pointer px-6 py-2 rounded-md border-2 border-gray-400">
                         <h3 class="time-label font-semibold text-lg uppercase">08-09 am</h3>
                            <input type="radio" name="ap-time" id="time-12" class="hidden input-time">
                        </label>
                     

                    </div>

                </div>

            </div>
            <!-- section2 -->
            <div class="setion-2 p-2 bg-white rounded-md my-4">
                <div class="sec-2-sub px-4 py-2 flex gap-4">
                    <i class="fa-solid fa-school text-paymentReqPrimaryClr"></i>
                    <div class="text-all-sise">
                        <h3 class="capitalize text-lg">department name <span class="text-red-500">*</span></h3>
                        <p class="text-gray-400">Enter Deparment name</p>
                        <input name="deparment-name" type="text" class="popup-inputs border-2 rounded-md px-3 py-2 sm:w-80" id="department" placeholder="eg. Computer Science" required>
                        <div id="departments-popup" class="allPopUps hidden bg-gray-100 rounded-md max-w-80">
                          </div>
                    </div>
                </div>
                <div class="sec-2-sub px-4 py-2 flex gap-4">
                    <i class="text-blue-700" data-feather="phone"></i>
                    <div class="text-all-sise">
                        <h3 class="capitalize text-lg">mobile number <span class="text-red-500">*</span></h3>
                        <p class="text-gray-400">Enter the number on which you want to receive checkup related information.</p>
                        <input name="mobile-no" type="text" class="border-2 rounded-md px-3 py-2 sm:w-80" placeholder="10 digit number" maxlength="10" required>
                    </div>
                </div>
            </div>
        <!--section 3 -->
        <div class="setion-2 p-2 bg-white rounded-md my-4">
            <div class="sec-2-sub px-4 py-2 flex gap-4">
                <i class="fa-regular fa-user text-2xl"></i>
                <div class="text-all-sise">
                    <h3 class="capitalize text-lg">booking name <span class="text-red-500">*</span></h3>
                    <p class="text-gray-400">To identify the user .</p>
                    <input name="booker-name" type="text" class="border-2 rounded-md px-3 py-2 sm:w-80" placeholder="Yash Bhosale" required>
                </div>
            </div>
            <div class="sec-2-sub px-4 py-2 flex gap-4">
                <i class="text-red-500" data-feather="alert-triangle"></i>
                <div class="text-all-sise">
                    <h3 class=" text-lg">Reason for want Seminar hall <span class="text-red-500">*</span></h3>
                    <p class="text-gray-400">Avoid falsy reason.</p>
                    <input name="reason" type="text" class=" border-2 rounded-md px-3 py-2 sm:w-80" placeholder="eg. for Cultural Fest">
                    <div class="allPopUps reasons-popup hidden bg-gray-100 rounded-md">
                        <p class="reasons line-clamp-1 py-2 px-4 rounded-md cursor-pointer hover:bg-gray-300 capitalize">Cultural Fest</p>
                        <p class="reasons line-clamp-1 py-2 px-4 rounded-md cursor-pointer hover:bg-gray-300 capitalize">school function</p>
                        <p class="reasons line-clamp-1 py-2 px-4 rounded-md cursor-pointer hover:bg-gray-300 capitalize">annual function</p>
                        <p class="reasons line-clamp-1 py-2 px-4 rounded-md cursor-pointer hover:bg-gray-300 capitalize">private meetings</p>
                    </div>
                </div>
            </div>
        </div>
        <!--  -->

        </div>
        <!-- booking details -->
        <div class="sm:w-[40%]">

        <div class="booking-details px-4 py-2 bg-white rounded-md mx-2 my-6">
            <h2 class="details-title capitalize font-semibold text-xl mt-2 mb-4">booking details</h2>
            <div class="total-bill border-b-2 border-t-2 py-2">
                <div class="flex items-center justify-between py-2">
                    <p class="totalbill-title capitalize">seminar hall bill<span class="text-red-500">*</span></p>
                    <h3 class="font-semibold text-lg hall-price">₹500</h3>
                </div>
                <div class="flex items-center justify-between py-2">
                    <p class="totalbill-title capitalize">staff charges</p>
                    <h3 class="font-semibold text-lg staff-charges">₹120</h3>
                </div>
                <div class="flex items-center justify-between py-2">
                    <p class="totalbill-title capitalize">maintenance</p>
                    <h3 class="font-semibold text-lg hall-maintainance">₹20</h3>
                </div>
            </div>

            <div class="total-ammount flex items-center justify-between my-4">
                <p class="totalbill-title capitalize font-semibold">total ammount</p>
                <h3 class="font-semibold text-lg total-hall-price">₹640</h3>
            </div>
            <!-- submit button -->
            <button type="submit" class="pay-button capitalize py-3 w-full font-semibold text-white bg-paymentReqPrimaryClr rounded-md hover:bg-gray-700 transition"> <i data-feather="credit-card" class="inline-block"></i> request hall</button>

        </div>

        <!-- help us -->
        <div class="conatct-us px-4 py-2 flex gap-4 bg-white m-2 rounded-md">
            <i class="text-blue-700 w-8 h-8" data-feather="users"></i>
            <div class="text-all-sise">
                <h3 class="capitalize text-lg">we can help you</h3>
                <p class="text-gray-400">call us <a class="text-blue-600" href="tel:+9199230000000">+9199230000000</a> or chat with our customer support team.</p>
                <a href="#" class="mt-2 px-6 py-2 block border-2 text-blue-700 border-blue-700 rounded-md w-fit">Chat with us</a>
            </div>
        </div>
    </div>
    </form>
</body>
<script>
    feather.replace();
  </script>
  <script src="scripts/tailwind.js"></script>
  <script src="scripts/selectedDateStyling.js"></script>
  <script src="scripts/settingDayAndDate.js"></script>
  <script src="scripts/toggleCustomizeTime.js"></script>
  <script src="scripts/TimeLapse.js"></script>
  <script src="scripts/selectedTimeStyling.js"></script>
  <script src="admin/ajax/getDeparment.js"></script>
  <script src="scripts/selectPopupValues.js"></script>
</html>