<?php
include 'conn.php';
$query = $conn->prepare("SELECT DISTINCT(school) FROM student_info ");


?>

<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <style>
    .wf-force-outline-none[tabindex="-1"]:focus {
        outline: none;
    }
    </style>
    <title>TOFAS Test Registration Form</title>
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link href="./Contact_files/style.css" rel="stylesheet" type="text/css">
    <style>
    /*width*/
    #scrollbar::-webkit-scrollbar {
        width: 5px;
        height: 0px;
    }

    /* Small devices (portrait tablets and large phones, 600px and up) */
    @media only screen and (max-width: 600px) {
        #scrollbar::-webkit-scrollbar {
            width: 0px;
            height: 0px;
        }
    }


    /*track*/
    #scrollbar::-webkit-scrollbar-track {
        background: rgba(243, 246, 252, 0);
        border-radius: 25px;
    }

    /*thumb*/
    #scrollbar::-webkit-scrollbar-thumb {
        background: #e2e7f1;
        border-radius: 25px;
    }

    #scrollbar::-webkit-scrollbar-thumb:hover {
        background: #090b19;
    }
    </style>
</head>

<body class="body">
    <div class="container">
        <div class="login-form">
            <div class="header-from">
                <h1 class="heading-39">TOFAS Test Registration Form</h1>
            </div>
            <div class="form-block-3 w-form">
                <form class="form-4" id="student-form" method="POST">
                    
                    <div class="form-group d-flex mt-2" style="justify-content: space-evenly;">
                        <h3>How many Children would you like to register for the test?</h3>
                        <select id="kids" name="kids" class="select-field-2 w-select" >
                            <option value="1">1</option>
                            <option value="2">2</option>
                        </select>
                    </div>
                    <div>
                        <label for="email" class="label">Email Address*:</label>
                        <input type="email" required class="text-field-8 w-input" maxlength="256" name="email" placeholder="Enter your Email Address" id="email" >
                        <input type="button" class="btn btn-success btn-sm ml-2 verify-email" value="Verify Email">
                    </div>
                    <div>
                        <label for="field-2" class="label">Phone*:</label>
                        <div class="div-block-44">
                            <select id="field-6" name="field-6" data-name="Field 6" class="select-field-2 w-select" >
                                <option value="+91">+91</option>
                            </select>
                            <input type="tel" required class="text-field-8 w-input" maxlength="256" name="phone"  placeholder="Enter your Phone Number" id="phone" >

                        </div>
                        <input type="button" class="btn btn-success btn-sm ml-2 verify-phone" value="Verify Phone">
                    </div>
                    <div class="div-block-41">
                        <div class="div-block-42">
                            <label class="label">Pin Code*:</label>
                            <input type="text" required class="text-field-8 w-input" maxlength="256" name="pinCode"  placeholder="" id="pinCode">
                        </div>
                        <div>
                            <label class="label">State*:</label>
                            <input type="text" class="text-field-8 w-input" maxlength="256" name="state"  placeholder="" id="state" readonly>
                        </div>
                        <div class="div-block-43">
                            <label class="label">City*:</label>
                            <input type="text" class="text-field-8 w-input" maxlength="256" name="city"  placeholder="" id="city" readonly>
                        </div>
                    </div>
                    <fieldset class="p-3 border mt-3">
                        <legend>Enter details of first Child:</legend>
                        <div class="div-block-41">
                            <div class="div-block-42">
                                <label for="field-4" class="label">First Name*:</label>
                                <input type="text" class="text-field-8 w-input" maxlength="256" name="first_name" required  placeholder="Enter first name" >
                            </div>
                            <div>
                                <label for="field-3" class="label">Middle Name*:</label>
                                <input type="text" class="text-field-8 w-input" maxlength="256" name="middle_name" required  placeholder="Enter middle name" >
                            </div>
                            <div class="div-block-43">
                                <label for="field-5" class="label">Last Name*:</label>
                                <input type="text" class="text-field-8 w-input" maxlength="256" name="last_name" required  placeholder="Enter last name" >
                            </div>
                        </div>
                        <div>
                            <label for="DOB" class="label">Date of Birth*:</label>
                            <input type="date" required class="text-field-8 w-input" name="dob" placeholder="" >
                        </div>
                        
                        
                        <div>
                            <label class="label">Grades:</label>
                            <select name="grade" class="select-field w-select" required>
                                <option value="">Select Grade</option>
                                <option value="Grade 1">Grade 1</option>
                                <option value="Grade 2">Grade 2</option>
                                <option value="Grade 3">Grade 3</option>
                                <option value="Grade 4">Grade 4</option>
                                <option value="Grade 5">Grade 5</option>
                                <option value="Grade 6">Grade 6</option>
                            </select>
                        </div>
                        <div>
                            <label class="label">School:</label>
                            <input type="text" name="school"  autocomplete="off" class="text-field-8 w-input" placeholder="Enter School" required list="school" id="ID" >
                            <datalist id="school">
                                <?php

                                
                                $query->execute();
                                while ( $row = $query->fetch( PDO::FETCH_ASSOC ) ) {

                                  ?>
                                <option value="<?php echo $row['school'] ?>"><?php echo $row['school']; ?></option>
                                <?php

                                }

                                ?>
                            </datalist>
                        </div>    
                    </fieldset>
                    <fieldset class="p-3 border mt-3 second-kid-form" style="display:none;">
                        <legend>Enter details of second Child:</legend>
                        <div class="div-block-41">
                            <div class="div-block-42">
                                <label for="field-4" class="label">First Name*:</label>
                                <input type="text" class="text-field-8 w-input" maxlength="256" name="first_name_2"   placeholder="Enter first name" >
                            </div>
                            <div>
                                <label for="field-3" class="label">Middle Name*:</label>
                                <input type="text" class="text-field-8 w-input" maxlength="256" name="middle_name_2"  placeholder="Enter middle name" >
                            </div>
                            <div class="div-block-43">
                                <label for="field-5" class="label">Last Name*:</label>
                                <input type="text" class="text-field-8 w-input" maxlength="256" name="last_name_2"   placeholder="Enter last name" >
                            </div>
                        </div>
                        <div>
                            <label for="DOB" class="label">Date of Birth*:</label>
                            <input type="date"  class="text-field-8 w-input" name="dob_2" placeholder="" >
                        </div>
                        
                        
                        <div>
                            <label class="label">Grades:</label>
                            <select name="grade_2" class="select-field w-select" >
                                <option value="">Select Grade</option>
                                <option value="Grade 1">Grade 1</option>
                                <option value="Grade 2">Grade 2</option>
                                <option value="Grade 3">Grade 3</option>
                                <option value="Grade 4">Grade 4</option>
                                <option value="Grade 5">Grade 5</option>
                                <option value="Grade 6">Grade 6</option>
                            </select>
                        </div>
                        <div>
                            <label class="label">School:</label>
                            <input type="text" name="school_2"  autocomplete="off" class="text-field-8 w-input" placeholder="Enter School"  list="school" id="ID_2" >
                            <datalist id="school_2">
                                <?php

                                
                                $query->execute();
                                while ( $row = $query->fetch( PDO::FETCH_ASSOC ) ) {

                                  ?>
                                <option value="<?php echo $row['school'] ?>"><?php echo $row['school']; ?></option>
                                <?php

                                }

                                ?>
                            </datalist>
                        </div>    
                    </fieldset>
                    <div class="mt-3">
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="disclaimer">
                          <label class="form-check-label" for="disclaimer">
                            Kaigen is committed to protecting and respecting your privacy, and we’ll only use your personal information to administer your account and to provide the products and services you requested from us. From time to time, we would like to contact you about our products and services, as well as other content that may be of interest to you. By clicking submit, you consent to allow Kaigen to store and process the personal information submitted above to provide you the content requested.
                          </label>
                        </div>
                    </div>
                    <div class="div-block-45">
                        <input type="hidden" name="isEmailVerified" id="isEmailVerified" value="0">
                        <input type="hidden" name="isPhoneVerified" id="isPhoneVerified" value="0">
                        <input type="submit" value="Register" name="submit" class="submit-button-3 btn-danger w-button" disabled>
                    </div>
                </form>
                
            </div>
        </div>
    </div>
    <script src="./Contact_files/jquery-3.5.1.min.dc5e7f18c8.js.download" type="text/javascript" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>
<script>

    $("#kids").on("change",function(){
        var kid = $(this).val();
        if (kid == "1") {
            $(".second-kid-form input").attr("required",false);
            $(".second-kid-form select").attr("required",false);
            $(".second-kid-form").css("display","none");
        } else if (kid == "2") {
            $(".second-kid-form").css("display","block");
            $(".second-kid-form input").attr("required",true);
            $(".second-kid-form select").attr("required",true);
            // $(".second-kid-form input[name='middle_name_2']").attr("required",false);
        }
    })

    $('#disclaimer').click(function(){
        if($(this).prop("checked") == true){
           $("input[type='submit']").attr("disabled",false); 
        }
        else if($(this).prop("checked") == false){
           $("input[type='submit']").attr("disabled",true); 
        }
    });


    $("#pinCode").on("change",function(){
        var pinCode = $(this).val();
        $.ajax({
            url:"https://api.postalpincode.in/pincode/"+pinCode,
            dataType:"json",
            success:function(data){
                if (data[0].PostOffice != null) {
                    $("#state").val(data[0].PostOffice[0].State);
                    $("#city").val(data[0].PostOffice[0].Region);  
                } else{
                    alert("Incorrect Pincode.");
                    $("#pinCode").val("");
                    $("#state").val("");
                    $("#city").val("");  
                }
                // console.log(data);

            }
        })
    });

    $("#email").on("change",function(){
        var email = $(this).val();
        $.ajax({
            url:"validation.php",
            data:{email:email},
            method:"POST",
            success:function(data){
                if (data == "verified") {
                    $(".verify-email").attr("disabled",true); 
                    $("#isEmailVerified").val("1");
                    $(".verify-email").val("Verified");
                } else {
                    $(".verify-email").attr("disabled",false); 
                    $("#isEmailVerified").val("0");
                    $(".verify-email").val("Verify Email");
                }
            }
        })
    });

    $("#phone").on("change",function(){
        var phone = $(this).val();
        phone = '91'+phone;
        $.ajax({
            url:"validation.php",
            data:{phone:phone},
            method:"POST",
            success:function(data){
                if (data == "verified") {
                    $(".verify-phone").attr("disabled",true); 
                    $("#isPhoneVerified").val("1");
                    $(".verify-phone").val("Verified");
                } else {
                    $(".verify-phone").attr("disabled",false); 
                    $("#isPhoneVerified").val("0");
                    $(".verify-phone").val("Verify Phone");
                }
            }
        })
    });


    $(".verify-email").on("click",function(){
        var email = $("#email").val();
        if (email == "") {
            alert("First enter your email address");
        } else {
            $("#verifyEmail").val(email);
            $("#emailVerifyModal").modal("show");
        }
    })

    $(".verify-phone").on("click",function(){
        var phone = $("#phone").val();
        if (phone == "") {
            alert("First enter your phone number");
        } else {
            phone = "91"+phone;
            $("#verifyPhone").val(phone);
            $("#phoneVerifyModal").modal("show");
        }
    })

    $(document).on("click",".send-otp-email",function(){
        var email = $("#email").val();
        $.ajax({
            url:"email-otp.php",
            data:{email:email},
            dataType:"json",
            method:"POST",
            success:function(data){
                // console.log(data);
                $("#email-otp-message").html(data.message);
                $("#email-otp-message").removeAttr('class');
                if (data.messageType == "error") {
                    $("#email-otp-message").addClass('text-danger');
                    $(".email-otp-div").css("display","none"); 
                } else {
                    $("#email-otp-message").addClass('text-success');
                    $(".email-otp-div").css("display","block");
                }
            }
        })
    })

    $(document).on("click",".send-otp-phone",function(){
        var phone = $("#phone").val();
        phone = '91'+phone;
        $.ajax({
            url:"phone-otp.php",
            data:{phone:phone},
            dataType:"json",
            method:"POST",
            success:function(data){
                // console.log(data);
                $("#phone-otp-message").html('The OTP has been sent to your phone number. Please check and verify.');
                $("#phone-otp-message").removeAttr('class');
                if (data.status == "failure") {
                    $("#phone-otp-message").addClass('text-danger');
                    $(".phone-otp-div").css("display","none"); 
                } else {
                    $("#phone-otp-message").addClass('text-success');
                    $(".phone-otp-div").css("display","block");
                }
            }
        })
    })

    $(document).on("submit","#email-otp-form",function(e){
        e.preventDefault();
        $.ajax({
            url:"confirm-email-otp.php",
            method:"POST",
            data:$("#email-otp-form").serialize(),
            dataType:"json",
            success:function(data){
                // console.log(data);
                $("#email-otp-message").html(data.message);
                $("#email-otp-message").removeAttr('class');
                if (data.messageType == "error") {
                    $("#email-otp-message").addClass('text-danger');
                    // $(".email-otp-div").css("display","none"); 
                } else {
                    alert(data.message);
                    $(".verify-email").attr("disabled",true); 
                    $("#isEmailVerified").val("1");
                    $(".verify-email").val("Verified");
                    $("#emailVerifyModal").modal("hide");
                }
            }
        })
    })

    $(document).on("submit","#phone-otp-form",function(e){
        e.preventDefault();
        $.ajax({
            url:"confirm-phone-otp.php",
            method:"POST",
            data:$("#phone-otp-form").serialize(),
            dataType:"json",
            success:function(data){
                // console.log(data);
                $("#phone-otp-message").html(data.message);
                $("#phone-otp-message").removeAttr('class');
                if (data.messageType == "error") {
                    $("#phone-otp-message").addClass('text-danger');
                    // $(".phone-otp-div").css("display","none"); 
                } else {
                    alert(data.message);
                    $(".verify-phone").attr("disabled",true); 
                    $("#isPhoneVerified").val("1");
                    $(".verify-phone").val("Verified");
                    $("#phoneVerifyModal").modal("hide");
                }
            }
        })
    })


    $(document).on("submit","#student-form",function(e){
        e.preventDefault();
        if ($("#isEmailVerified").val() == "0") {
            alert("Verify your email first");
        } else if ($("#isPhoneVerified").val() == "0") {
            alert("Verify your phone number first");
        } else {
            $.ajax({
                url:"submit.php",
                method:"POST",
                data:$("#student-form").serialize(),
                dataType:"json",
                success:function(data){
                    if (data.messageType == "error") {
                        alert(data.message);
                    } else {
                        alert(data.message);
                        location.reload();
                    }
                }
            })
        }
    })

</script>
<!-- Modal -->
<div class="modal fade" id="emailVerifyModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Verify Email</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" id="email-otp-form">
            <div class="form-group">
                <h6 id="email-otp-message" ></h6>
            </div>
            <div class="form-group">
                <label>Email:</label>
                <input type="email" name="email" id="verifyEmail" class="form-control" readonly>
                
            </div>
            <div class="form-group email-otp-div" style="display: none;">
                <label>OTP:</label>
                <input type="number" required name="email_otp" value="" class="form-control">
            </div>
            <div class="form-group">
                <input type="button" class="btn btn-danger btn-sm ml-2 send-otp-email" value="Send OTP">
            </div>
            <div class="form-group email-otp-div" style="display: none;">
                <input type="submit" name="submit" class="btn btn-success btn-sm ml-2" value="Confirm">
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>




<div class="modal fade" id="phoneVerifyModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Verify Phone Number</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" id="phone-otp-form">
            <div class="form-group">
                <h6 id="phone-otp-message" ></h6>
            </div>
            <div class="form-group">
                <label>Phone Number:</label>
                <input type="tel" name="phone" id="verifyPhone" class="form-control" readonly>
                
            </div>
            <div class="form-group phone-otp-div" style="display: none;">
                <label>OTP:</label>
                <input type="number" required name="phone_otp" value="" class="form-control">
            </div>
            <div class="form-group">
                <input type="button" class="btn btn-danger btn-sm ml-2 send-otp-phone" value="Send OTP">
            </div>
            <div class="form-group phone-otp-div" style="display: none;">
                <input type="submit" name="submit" class="btn btn-success btn-sm ml-2" value="Confirm">
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>