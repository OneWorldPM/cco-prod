<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<!--<script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" async defer></script>-->
<style>
    body{
        text-rendering: optimizelegibility;
        margin-top: 0;
        color: #222222;
        font-family: "Open Sans", sans-serif;
        font-size: 12px;
    }
    .form-control{
        font-size: 13px;
    }
    /* The message box is shown when the user clicks on the password field */

    #message p {
        padding: 0px 5px;
        font-size: 14px;
        margin-bottom: 0px;
    }

    /* Add a green text color and a checkmark when the requirements are right */
    .valid {
        color: green;
    }

    .valid:before {
        position: relative;
        left: -10px;
        content: "✔";
    }

    /* Add a red text color and an "x" when the requirements are wrong */
    .invalid {
        color: red;
    }

    .invalid:before {
        position: relative;
        left: -10px;
        content: "✖";
    }
</style>

<?php //echo"<pre>"; print_r($sessions[0]->presenter);exit;?>
<section class="parallax" style="background-image: url(https://yourconference.live/CCO/front_assets/images/bg_login.png); top: 0; padding-top: 0px; height: 100%" >
    <div class="row justify-content-center">
        <div class="col-sm-6 col-md-6 col-lg-12" style="margin-top: 20%; margin-left: 20px; margin-right: 20px;">
            <div class="card text-center">
                <div class="row">
                    <div class="col" style="margin: 30px 0px" >
                        <div class="mx-3">
                            <h6  style="color:#EF5D21"><b>CCO Learner Resource App</b></h6>
                            <div style="height: 1px;background-color: #EF5D21; " class="mt-3 mb-1" ></div>
                            <div class="text-left">
                                <h6>Create User</h6>
                                <div style="height: 1px;background-color: darkgray;margin-top: -5px" class="mb-2" ></div>

                                    <form id="frm_reg" name="frm_reg" method="post" action="<?= base_url() ?>mobile/register/register_user">

                                    <div class="form-group">
                                    <input type="text" id="first_name" class="form-control shadow-none" name="first_name" placeholder="First Name" >
                                        <span id="errorfirst_name" style="color:red"></span>
                                    </div>
                                    <div class="form-group">
                                    <input type="text" id="last_name" class="form-control shadow-none mb-1" name="last_name" placeholder="Last Name">
                                        <span id="errorlast_name" style="color:red"></span>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" id="username"  class="form-control shadow-none mb-1" name="username" placeholder="Username">
                                        <span id="errorusername" style="color:red"></span>
                                    </div>
                                    <div class="form-group">
                                    <input type="text" id="email"  class="form-control shadow-none mb-1" name="email" placeholder="Email">
                                        <span id="erroremail" style="color:red"></span>
                                    </div>
                                    <div class="form-group">
                                    <input type="text" id="confirm_email"  class="form-control shadow-none mb-1" name="confirm_email" placeholder="Confirm email">
                                        <span id="errorconfirm_email" style="color:red"></span>
                                    </div>
                                    <div class="form-group">
                                    <select class="form-control shadow-none mb-1" id="country" name="country">
                                        <option value="United States of America">United States of America</option>
                                        <option value="Canada">Canada</option>
                                        <option value="Afganistan">Afghanistan</option>
                                        <option value="Albania">Albania</option>
                                        <option value="Algeria">Algeria</option>
                                        <option value="American Samoa">American Samoa</option>
                                        <option value="Andorra">Andorra</option>
                                        <option value="Angola">Angola</option>
                                        <option value="Anguilla">Anguilla</option>
                                        <option value="Antigua & Barbuda">Antigua & Barbuda</option>
                                        <option value="Argentina">Argentina</option>
                                        <option value="Armenia">Armenia</option>
                                        <option value="Aruba">Aruba</option>
                                        <option value="Australia">Australia</option>
                                        <option value="Austria">Austria</option>
                                        <option value="Azerbaijan">Azerbaijan</option>
                                        <option value="Bahamas">Bahamas</option>
                                        <option value="Bahrain">Bahrain</option>
                                        <option value="Bangladesh">Bangladesh</option>
                                        <option value="Barbados">Barbados</option>
                                        <option value="Belarus">Belarus</option>
                                        <option value="Belgium">Belgium</option>
                                        <option value="Belize">Belize</option>
                                        <option value="Benin">Benin</option>
                                        <option value="Bermuda">Bermuda</option>
                                        <option value="Bhutan">Bhutan</option>
                                        <option value="Bolivia">Bolivia</option>
                                        <option value="Bonaire">Bonaire</option>
                                        <option value="Bosnia & Herzegovina">Bosnia & Herzegovina</option>
                                        <option value="Botswana">Botswana</option>
                                        <option value="Brazil">Brazil</option>
                                        <option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
                                        <option value="Brunei">Brunei</option>
                                        <option value="Bulgaria">Bulgaria</option>
                                        <option value="Burkina Faso">Burkina Faso</option>
                                        <option value="Burundi">Burundi</option>
                                        <option value="Cambodia">Cambodia</option>
                                        <option value="Cameroon">Cameroon</option>
                                        <option value="Canary Islands">Canary Islands</option>
                                        <option value="Cape Verde">Cape Verde</option>
                                        <option value="Cayman Islands">Cayman Islands</option>
                                        <option value="Central African Republic">Central African Republic</option>
                                        <option value="Chad">Chad</option>
                                        <option value="Channel Islands">Channel Islands</option>
                                        <option value="Chile">Chile</option>
                                        <option value="China">China</option>
                                        <option value="Christmas Island">Christmas Island</option>
                                        <option value="Cocos Island">Cocos Island</option>
                                        <option value="Colombia">Colombia</option>
                                        <option value="Comoros">Comoros</option>
                                        <option value="Congo">Congo</option>
                                        <option value="Cook Islands">Cook Islands</option>
                                        <option value="Costa Rica">Costa Rica</option>
                                        <option value="Cote DIvoire">Cote DIvoire</option>
                                        <option value="Croatia">Croatia</option>
                                        <option value="Cuba">Cuba</option>
                                        <option value="Curaco">Curacao</option>
                                        <option value="Cyprus">Cyprus</option>
                                        <option value="Czech Republic">Czech Republic</option>
                                        <option value="Denmark">Denmark</option>
                                        <option value="Djibouti">Djibouti</option>
                                        <option value="Dominica">Dominica</option>
                                        <option value="Dominican Republic">Dominican Republic</option>
                                        <option value="East Timor">East Timor</option>
                                        <option value="Ecuador">Ecuador</option>
                                        <option value="Egypt">Egypt</option>
                                        <option value="El Salvador">El Salvador</option>
                                        <option value="Equatorial Guinea">Equatorial Guinea</option>
                                        <option value="Eritrea">Eritrea</option>
                                        <option value="Estonia">Estonia</option>
                                        <option value="Ethiopia">Ethiopia</option>
                                        <option value="Falkland Islands">Falkland Islands</option>
                                        <option value="Faroe Islands">Faroe Islands</option>
                                        <option value="Fiji">Fiji</option>
                                        <option value="Finland">Finland</option>
                                        <option value="France">France</option>
                                        <option value="French Guiana">French Guiana</option>
                                        <option value="French Polynesia">French Polynesia</option>
                                        <option value="French Southern Ter">French Southern Ter</option>
                                        <option value="Gabon">Gabon</option>
                                        <option value="Gambia">Gambia</option>
                                        <option value="Georgia">Georgia</option>
                                        <option value="Germany">Germany</option>
                                        <option value="Ghana">Ghana</option>
                                        <option value="Gibraltar">Gibraltar</option>
                                        <option value="Great Britain">Great Britain</option>
                                        <option value="Greece">Greece</option>
                                        <option value="Greenland">Greenland</option>
                                        <option value="Grenada">Grenada</option>
                                        <option value="Guadeloupe">Guadeloupe</option>
                                        <option value="Guam">Guam</option>
                                        <option value="Guatemala">Guatemala</option>
                                        <option value="Guinea">Guinea</option>
                                        <option value="Guyana">Guyana</option>
                                        <option value="Haiti">Haiti</option>
                                        <option value="Hawaii">Hawaii</option>
                                        <option value="Honduras">Honduras</option>
                                        <option value="Hong Kong">Hong Kong</option>
                                        <option value="Hungary">Hungary</option>
                                        <option value="Iceland">Iceland</option>
                                        <option value="Indonesia">Indonesia</option>
                                        <option value="India">India</option>
                                        <option value="Iran">Iran</option>
                                        <option value="Iraq">Iraq</option>
                                        <option value="Ireland">Ireland</option>
                                        <option value="Isle of Man">Isle of Man</option>
                                        <option value="Israel">Israel</option>
                                        <option value="Italy">Italy</option>
                                        <option value="Jamaica">Jamaica</option>
                                        <option value="Japan">Japan</option>
                                        <option value="Jordan">Jordan</option>
                                        <option value="Kazakhstan">Kazakhstan</option>
                                        <option value="Kenya">Kenya</option>
                                        <option value="Kiribati">Kiribati</option>
                                        <option value="Korea North">Korea North</option>
                                        <option value="Korea Sout">Korea South</option>
                                        <option value="Kuwait">Kuwait</option>
                                        <option value="Kyrgyzstan">Kyrgyzstan</option>
                                        <option value="Laos">Laos</option>
                                        <option value="Latvia">Latvia</option>
                                        <option value="Lebanon">Lebanon</option>
                                        <option value="Lesotho">Lesotho</option>
                                        <option value="Liberia">Liberia</option>
                                        <option value="Libya">Libya</option>
                                        <option value="Liechtenstein">Liechtenstein</option>
                                        <option value="Lithuania">Lithuania</option>
                                        <option value="Luxembourg">Luxembourg</option>
                                        <option value="Macau">Macau</option>
                                        <option value="Macedonia">Macedonia</option>
                                        <option value="Madagascar">Madagascar</option>
                                        <option value="Malaysia">Malaysia</option>
                                        <option value="Malawi">Malawi</option>
                                        <option value="Maldives">Maldives</option>
                                        <option value="Mali">Mali</option>
                                        <option value="Malta">Malta</option>
                                        <option value="Marshall Islands">Marshall Islands</option>
                                        <option value="Martinique">Martinique</option>
                                        <option value="Mauritania">Mauritania</option>
                                        <option value="Mauritius">Mauritius</option>
                                        <option value="Mayotte">Mayotte</option>
                                        <option value="Mexico">Mexico</option>
                                        <option value="Midway Islands">Midway Islands</option>
                                        <option value="Moldova">Moldova</option>
                                        <option value="Monaco">Monaco</option>
                                        <option value="Mongolia">Mongolia</option>
                                        <option value="Montserrat">Montserrat</option>
                                        <option value="Morocco">Morocco</option>
                                        <option value="Mozambique">Mozambique</option>
                                        <option value="Myanmar">Myanmar</option>
                                        <option value="Nambia">Nambia</option>
                                        <option value="Nauru">Nauru</option>
                                        <option value="Nepal">Nepal</option>
                                        <option value="Netherland Antilles">Netherland Antilles</option>
                                        <option value="Netherlands">Netherlands (Holland, Europe)</option>
                                        <option value="Nevis">Nevis</option>
                                        <option value="New Caledonia">New Caledonia</option>
                                        <option value="New Zealand">New Zealand</option>
                                        <option value="Nicaragua">Nicaragua</option>
                                        <option value="Niger">Niger</option>
                                        <option value="Nigeria">Nigeria</option>
                                        <option value="Niue">Niue</option>
                                        <option value="Norfolk Island">Norfolk Island</option>
                                        <option value="Norway">Norway</option>
                                        <option value="Oman">Oman</option>
                                        <option value="Pakistan">Pakistan</option>
                                        <option value="Palau Island">Palau Island</option>
                                        <option value="Palestine">Palestine</option>
                                        <option value="Panama">Panama</option>
                                        <option value="Papua New Guinea">Papua New Guinea</option>
                                        <option value="Paraguay">Paraguay</option>
                                        <option value="Peru">Peru</option>
                                        <option value="Phillipines">Philippines</option>
                                        <option value="Pitcairn Island">Pitcairn Island</option>
                                        <option value="Poland">Poland</option>
                                        <option value="Portugal">Portugal</option>
                                        <option value="Puerto Rico">Puerto Rico</option>
                                        <option value="Qatar">Qatar</option>
                                        <option value="Republic of Montenegro">Republic of Montenegro</option>
                                        <option value="Republic of Serbia">Republic of Serbia</option>
                                        <option value="Reunion">Reunion</option>
                                        <option value="Romania">Romania</option>
                                        <option value="Russia">Russia</option>
                                        <option value="Rwanda">Rwanda</option>
                                        <option value="St Barthelemy">St Barthelemy</option>
                                        <option value="St Eustatius">St Eustatius</option>
                                        <option value="St Helena">St Helena</option>
                                        <option value="St Kitts-Nevis">St Kitts-Nevis</option>
                                        <option value="St Lucia">St Lucia</option>
                                        <option value="St Maarten">St Maarten</option>
                                        <option value="St Pierre & Miquelon">St Pierre & Miquelon</option>
                                        <option value="St Vincent & Grenadines">St Vincent & Grenadines</option>
                                        <option value="Saipan">Saipan</option>
                                        <option value="Samoa">Samoa</option>
                                        <option value="Samoa American">Samoa American</option>
                                        <option value="San Marino">San Marino</option>
                                        <option value="Sao Tome & Principe">Sao Tome & Principe</option>
                                        <option value="Saudi Arabia">Saudi Arabia</option>
                                        <option value="Senegal">Senegal</option>
                                        <option value="Seychelles">Seychelles</option>
                                        <option value="Sierra Leone">Sierra Leone</option>
                                        <option value="Singapore">Singapore</option>
                                        <option value="Slovakia">Slovakia</option>
                                        <option value="Slovenia">Slovenia</option>
                                        <option value="Solomon Islands">Solomon Islands</option>
                                        <option value="Somalia">Somalia</option>
                                        <option value="South Africa">South Africa</option>
                                        <option value="Spain">Spain</option>
                                        <option value="Sri Lanka">Sri Lanka</option>
                                        <option value="Sudan">Sudan</option>
                                        <option value="Suriname">Suriname</option>
                                        <option value="Swaziland">Swaziland</option>
                                        <option value="Sweden">Sweden</option>
                                        <option value="Switzerland">Switzerland</option>
                                        <option value="Syria">Syria</option>
                                        <option value="Tahiti">Tahiti</option>
                                        <option value="Taiwan">Taiwan</option>
                                        <option value="Tajikistan">Tajikistan</option>
                                        <option value="Tanzania">Tanzania</option>
                                        <option value="Thailand">Thailand</option>
                                        <option value="Togo">Togo</option>
                                        <option value="Tokelau">Tokelau</option>
                                        <option value="Tonga">Tonga</option>
                                        <option value="Trinidad & Tobago">Trinidad & Tobago</option>
                                        <option value="Tunisia">Tunisia</option>
                                        <option value="Turkey">Turkey</option>
                                        <option value="Turkmenistan">Turkmenistan</option>
                                        <option value="Turks & Caicos Is">Turks & Caicos Is</option>
                                        <option value="Tuvalu">Tuvalu</option>
                                        <option value="Uganda">Uganda</option>
                                        <option value="United Kingdom">United Kingdom</option>
                                        <option value="Ukraine">Ukraine</option>
                                        <option value="United Arab Erimates">United Arab Emirates</option>
                                        <option value="Uraguay">Uruguay</option>
                                        <option value="Uzbekistan">Uzbekistan</option>
                                        <option value="Vanuatu">Vanuatu</option>
                                        <option value="Vatican City State">Vatican City State</option>
                                        <option value="Venezuela">Venezuela</option>
                                        <option value="Vietnam">Vietnam</option>
                                        <option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
                                        <option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
                                        <option value="Wake Island">Wake Island</option>
                                        <option value="Wallis & Futana Is">Wallis & Futana Is</option>
                                        <option value="Yemen">Yemen</option>
                                        <option value="Zaire">Zaire</option>
                                        <option value="Zambia">Zambia</option>
                                        <option value="Zimbabwe">Zimbabwe</option>
                                    </select>
                                    </div>
<!--                                    <div class="form-group">-->
<!--                                    <input type="password" id="password" class="form-control shadow-none mb-1" name="password" placeholder="Password">-->
<!--                                        <span id="errorpassword" style="color:red"></span>-->
<!--                                    </div>-->
<!--                                    <div class="row">-->
<!--                                        <div class="col-md-8 col-md-offset-2">-->
<!--                                            <div id="message" style="display: none">-->
<!--                                                <h6 style="padding-bottom: 3px; border-bottom: 2px solid #ebebeb">Password Strength:</h6>-->
<!--                                                <p id="letter" class="invalid">A <b>lowercase</b> letter</p>-->
<!--                                                <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>-->
<!--                                                <p id="number" class="invalid">A <b>number</b></p>-->
<!--                                                <p id="length" class="invalid">Minimum <b>8 characters</b></p>-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                    <div class="form-group">-->
<!--                                    <input type="password" id="confirm_password" class="form-control shadow-none mb-1" name="password" placeholder="Confirm password">-->
<!--                                        <span id="errorconfirm_password" style="color:red"></span>-->
<!--                                    </div>-->

                            </div>
    <!--                        <div style="height: 2px;background-color: #EF5D21;" class="mb-5 mx-3"></div>-->
<!--                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <div class="g-recaptcha" data-callback="recaptchaCallback" style="text-align: -webkit-center;" data-sitekey="6LfbHKQZAAAAAA9nhI-4GNOmLakkRGGaBTJgHFbF"></div>
                                        <div class="gaps-2x"></div>
                                        <span id="errorcaptcha" style="color:red"></span>
                                    </div>
                                </div>-->
                            <div class="text-left ml-3">

                                <button type="submit" href="" class="btn btn-sm text-white" id="reg_login" style="background-color:#EF5D21" >Submit</button>
                                <a href="" class="btn btn-sm btn-danger " >Cancel</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script type="text/javascript">


</script>
<?php
$msg = $this->input->get("msg");
switch ($msg) {
    case "A":
        $m = "Username Alredy Exist!!!";
        $t = "error";
        break;
    case "E":
        $m = "Something went wrong, Please try again!!!";
        $t = "error";
        break;
    default:
        $m = 0;
        break;
}
?>
<script type="text/javascript">
    $(document).ready(function () {

        <?php if ($msg): ?>
        alertify.<?= $t ?>("<?= $m ?>");
        <?php endif; ?>

        $("#reg_login").on("click", function () {
            var lowerCaseLetters = /[a-z]/g;
            var upperCaseLetters = /[A-Z]/g;
            var numbers = /[0-9]/g;
            var pwd = $("#password").val();

            if ($("#first_name").val().trim() == "")
            {
                $("#errorfirst_name").text("Please Enter First Name").fadeIn('slow').fadeOut(5000);
                return false;
            } else if ($("#last_name").val().trim() == "") {
                $("#errorlast_name").text("Please Enter Last Name").fadeIn('slow').fadeOut(5000);
                return false;
            } else if ($("#username").val().trim() == ""){
                $("#errorusername").text("Please Enter Username").fadeIn('slow').fadeOut(5000);
                return false;
            }
                //else if ($("#email").val().trim() == "") {
            //     $("#erroremail").text("Please Enter Email").fadeIn('slow').fadeOut(5000);
            //     return false;
            // } else if (!validateEmail($("#email").val().trim())) {
            //     $("#erroremail").text("Enter Valid Email Id..").fadeIn('slow').fadeOut(5000);
            //     return false;
            // } else if ($("#confirm_email").val() == "") {
            //     $("#errorconfirm_email").text("Please Enter Confirm Email").fadeIn('slow').fadeOut(5000);
            //     return false;
            // } else if ($("#email").val() != $("#confirm_email").val()) {
            //     $("#errorconfirm_email").text("Email and Confirm Email Doesn't Match").fadeIn('slow').fadeOut(5000);
            //     return false;
            // } else if ($("#password").val() == "") {
            //     $("#errorpassword").text("Please Enter Password").fadeIn('slow').fadeOut(5000);
            //     return false;
            // } else if (!lowerCaseLetters.test(pwd)) {
            //     $("#errorpassword").text("Enter Lowercase Letter").fadeIn('slow').fadeOut(5000);
            //     return false;
            // } else if (!upperCaseLetters.test(pwd)) {
            //     $("#errorpassword").text("Enter Uppercase Letter").fadeIn('slow').fadeOut(5000);
            //     return false;
            // } else if (!numbers.test(pwd)) {
            //     $("#errorpassword").text("Enter Numbers").fadeIn('slow').fadeOut(5000);
            //     return false;
            // } else if ($('#password').val().length < 8) {
            //     $("#errorpassword").text("Minimum 8 Characters").fadeIn('slow').fadeOut(5000);
            //     return false;
            // } else if ($("#confirm_password").val() == "") {
            //     $("#errorconfirm_password").text("Please Enter Confirm Password").fadeIn('slow').fadeOut(5000);
            //     return false;
            // } else if ($("#password").val() != $("#confirm_password").val()) {
            //     $("#errorconfirm_password").text("Password and Confirm Passwords Doesn't Match").fadeIn('slow').fadeOut(5000);
            //     return false;
            // }
            else {
                return true; //submit form
            }
            return false; //Prevent form to submitting
        });
    });

    function validateEmail(sEmail) {
        var expr = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
        return expr.test(sEmail);
    }
</script>
<script type="text/javascript">
    function recaptchaCallback() {
        console.log();
        $('#reg_login').removeAttr('disabled');
    }
</script>
<script>
    $(function(){

        var myInput = document.getElementById("password");
        var letter = document.getElementById("letter");
        var capital = document.getElementById("capital");
        var number = document.getElementById("number");
        var length = document.getElementById("length");

        // When the user clicks on the password field, show the message box
        myInput.onfocus = function () {
            document.getElementById("message").style.display = "block";
        }

        // When the user starts to type something inside the password field
        myInput.onkeyup = function () {
            // Validate lowercase letters
            var lowerCaseLetters = /[a-z]/g;
            if (myInput.value.match(lowerCaseLetters)) {
                letter.classList.remove("invalid");
                letter.classList.add("valid");
            } else {
                letter.classList.remove("valid");
                letter.classList.add("invalid");
            }

            // Validate capital letters
            var upperCaseLetters = /[A-Z]/g;
            if (myInput.value.match(upperCaseLetters)) {
                capital.classList.remove("invalid");
                capital.classList.add("valid");
            } else {
                capital.classList.remove("valid");
                capital.classList.add("invalid");
            }

            // Validate numbers
            var numbers = /[0-9]/g;
            if (myInput.value.match(numbers)) {
                number.classList.remove("invalid");
                number.classList.add("valid");
            } else {
                number.classList.remove("valid");
                number.classList.add("invalid");
            }

            // Validate length
            if (myInput.value.length >= 8) {
                length.classList.remove("invalid");
                length.classList.add("valid");
            } else {
                length.classList.remove("valid");
                length.classList.add("invalid");
            }
        }

    });
</script>

<!-- END: SECTION -->
<!-- END: SECTION -->
