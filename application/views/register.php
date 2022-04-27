<!-- SECTION -->
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<style>
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
<style>
    @media (min-width: 768px) and (max-width: 1000px)  {
        #home_first_section{
            height: 550px;
        }
    }

    @media (min-width: 1000px) and (max-width: 1400px)  {
        #home_first_section{
            height: 590px;
        }
    }

    @media (min-width: 1400px) and (max-width: 1600px)  {
        #home_first_section{
            height: 700px;
        }
    }

    @media (min-width: 1600px) and (max-width: 1800px)  {
        #home_first_section{
            height: 800px;
        }
    }

    @media (min-width: 1800px) and (max-width: 2200px)  {
        #home_first_section{
            height: 900px;
        }
    }

    @media (min-width: 2200px) and (max-width: 2800px)  {
        #home_first_section{
            height: 1100px;
        }
    }
    @media (min-width: 2800px) and (max-width: 3200px)  {
        #home_first_section{
            height: 1450px;
        }
    }

    @media (min-width: 3200px) and (max-width: 4200px)  {
        #home_first_section{
            height: 1950px;
        }
    }

    @media (min-width: 4200px) and (max-width: 6000px)  {
        #home_first_section{
            height: 2550px;
        }
    }
</style>
<section class="parallax" style="background-image: url(<?= base_url() ?>front_assets/images/bg_login.png); top:0;">
    <div class="container container-fullscreen" id="home_first_section">
        <div class="text-middle">
            <div class="row p-b-60">
                <form id="frm_reg" name="frm_reg" method="post" action="<?= base_url() ?>register/add_customer">
                    <div class="col-md-6 col-md-offset-3 background-white" style="border-radius: 10px; padding: 30px 80px 20px 80px;">
                        <div class="row">
                            <div class="col-md-12">
                                <h5 style="padding-bottom: 3px; border-bottom: 2px solid #ebebeb">Crear Usuario</h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <input type="text" value="" placeholder="Nombre" name="first_name" id="first_name" class="form-control">
                                <span id="errorfirst_name" style="color:red"></span>
                            </div>
                            <div class="col-md-6 form-group">
                                <input type="text" value="" placeholder="Apellidos" name="last_name" id="last_name" class="form-control">
                                <span id="errorlast_name" style="color:red"></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <input type="email" value="" placeholder="Correo electrónico" name="email" id="email" class="form-control">
                                <span id="erroremail" style="color:red"></span>
                            </div>
                            <div class="col-md-6 form-group">
                                <input type="email" value="" placeholder="Confirmar correo electrónico" name="confirm_email" id="confirm_email" class="form-control">
                                <span id="errorconfirm_email" style="color:red"></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <select class="form-control" id="country" name="country">
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
                            <div class="col-md-6 form-group">
                                <input type="password" value="" id="password" name="password" placeholder="Contraseña" class="form-control input-lg">
                                <span id="errorpassword" style="color:red"></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2">
                                <div id="message">
                                    <h6 style="padding-bottom: 3px; border-bottom: 2px solid #ebebeb">Solidez de la contraseña:</h6>
                                    <p id="letter" class="invalid">Una letra minúscula</p>
                                    <p id="capital" class="invalid">Una letra mayúscula</p>
                                    <p id="number" class="invalid">Un número</b></p>
                                    <p id="length" class="invalid">Mínimo de 8 caractéres</b></p>
                                </div>
                            </div>
                        </div>
                        <div class="row p-t-10">
                            <div class="col-md-6 form-group">
                                <input type="password" value="" id="confirm_password" name="confirm_password" placeholder="Confirmar contraseña" class="form-control input-lg">
                                <span id="errorconfirm_password" style="color:red"></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <div class="g-recaptcha" data-callback="recaptchaCallback" style="text-align: -webkit-center;" data-sitekey="6LfbHKQZAAAAAA9nhI-4GNOmLakkRGGaBTJgHFbF"></div>
                                <div class="gaps-2x"></div>
                                <span id="errorcaptcha" style="color:red"></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 form-group">

                                <button class="btn btn-primary" id="btn_register" type="submit">Enviar</button>
                                <button type="button" class="btn btn-danger m-l-10">Cancelar</button>

                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<?php
$msg = $this->input->get("msg");
switch ($msg) {
    case "A":
        $m = "Email Alredy Exist!!!";
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

        $("#btn_register").on("click", function () {
            var response = grecaptcha.getResponse();
            var lowerCaseLetters = /[a-z]/g;
            var upperCaseLetters = /[A-Z]/g;
            var numbers = /[0-9]/g;
            var pwd = $("#password").val();

            if ($("#first_name").val().trim() == "")
            {
                $("#errorfirst_name").text("Introduzca su nombre.").fadeIn('slow').fadeOut(5000);
                return false;
            } else if ($("#last_name").val().trim() == "") {
                $("#errorlast_name").text("Introduzca sus apellidos.").fadeIn('slow').fadeOut(5000);
                return false;
            } else if ($("#email").val().trim() == "") {
                $("#erroremail").text("Introduzca su correo electrónico.").fadeIn('slow').fadeOut(5000);
                return false;
            } else if (!validateEmail($("#email").val().trim())) {
                $("#erroremail").text("Introduzca su contraseña.").fadeIn('slow').fadeOut(5000);
                return false;
            } else if ($("#confirm_email").val() == "") {
                $("#errorconfirm_email").text("Please Enter Confirm Email").fadeIn('slow').fadeOut(5000);
                return false;
            } else if ($("#email").val() != $("#confirm_email").val()) {
                $("#errorconfirm_email").text("Email and Confirm Email Doesn't Match").fadeIn('slow').fadeOut(5000);
                return false;
            } else if ($("#password").val() == "") {
                $("#errorpassword").text("Introduzca su contraseña.").fadeIn('slow').fadeOut(5000);
                return false;
            } else if (!lowerCaseLetters.test(pwd)) {
                $("#errorpassword").text("Introduzca la letra minúscula.").fadeIn('slow').fadeOut(5000);
                return false;
            } else if (!upperCaseLetters.test(pwd)) {
                $("#errorpassword").text("Introduzca la letra mayúscula.").fadeIn('slow').fadeOut(5000);
                return false;
            } else if (!numbers.test(pwd)) {
                $("#errorpassword").text("Introduzca un número.").fadeIn('slow').fadeOut(5000);
                return false;
            } else if ($('#password').val().length < 8) {
                $("#errorpassword").text("Introduzca un mínimo de 8 caractéres.").fadeIn('slow').fadeOut(5000);
                return false;
            } else if ($("#confirm_password").val() == "") {
                $("#errorconfirm_password").text("Please Enter Confirm Password").fadeIn('slow').fadeOut(5000);
                return false;
            } else if ($("#password").val() != $("#confirm_password").val()) {
                $("#errorconfirm_password").text("La contraseña y la confirmación de la contraseña no coinciden.").fadeIn('slow').fadeOut(5000);
                return false;
            } else if (response.length == 0) {
                $("#errorcaptcha").text("Por favor verifique el texto de Captcha.").fadeIn('slow').fadeOut(5000);
                return false;
            } else {
                $('#submit-btn-loader').show();
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
        $('#reg_login').removeAttr('disabled');
    }
    ;
</script>
<script>
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
</script>
<script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" async defer></script>
<!-- END: SECTION -->
<!-- END: SECTION -->
