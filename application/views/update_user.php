<section class="parallax">
    <div class="container container-fullscreen">
        <div class="text-middle">
            <div class="row">
                <form id="frm_reg" name="frm_reg" method="post" action="<?= base_url() ?>register/update_user" enctype="multipart/form-data">
                    <div class="col-md-12 background-white" style="border-radius: 10px; padding: 0px 60px 20px 60px;">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="col-md-1 form-group">
                                    <img src="<?= base_url() ?>assets/images/Avatar.png" width="100%">
                                </div>
                                <div class="col-md-3 form-group" style="margin-top: 15px;">
                                    <label><?= (isset($myprofile)) ? $myprofile->first_name : ''; ?> <?= (isset($myprofile)) ? $myprofile->last_name : ''; ?> </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <h5 style="padding-bottom: 4px; border-bottom: 2px solid #ebebeb">Registrant Profile</h5>
                            <small>Please fill in your registrant details:</small>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="col-md-2 form-group">
                                    <input type="text" name="first_name" id="first_name"  value="<?= (isset($myprofile)) ? $myprofile->first_name : ''; ?>" placeholder="First Name" class="form-control input-lg">
                                    <span id="errorfirst_name" style="color:red"></span>
                                </div>
                                <div class="col-md-2 form-group">
                                    <input type="text" name="last_name" id="last_name" value="<?= (isset($myprofile)) ? $myprofile->last_name : ''; ?>" placeholder="Last Name" class="form-control input-lg">
                                    <span id="errorlast_name" style="color:red"></span>
                                </div>
                                <div class="col-md-3 form-group">
                                    <input type="email" name="email" id="email" value="<?= (isset($myprofile)) ? $myprofile->email : ''; ?>" readonly placeholder="Email" class="form-control input-lg">
                                    <span id="erroremail" style="color:red"></span>
                                </div>
                                <div class="col-md-3 form-group">
                                    <input type="text" name="specialty" id="specialty" value="<?= (isset($myprofile)) ? $myprofile->specialty : ''; ?>" placeholder="Specialty" class="form-control input-lg">
                                    <span id="errorspecialty" style="color:red"></span>
                                </div>
                                  <div class="col-md-2 form-group">
                                    <input type="text" value="<?= (isset($myprofile)) ? $myprofile->degree : ''; ?>" placeholder="Degree" name="degree" id="degree" class="form-control input-lg">
                                    <span id="errordegree" style="color:red"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 m-t-20">
                            <h5 style="padding-bottom: 4px; border-bottom: 2px solid #ebebeb">Address</h5>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="col-md-3 form-group">
                                    <input type="text" value="<?= (isset($myprofile)) ? $myprofile->address : ''; ?>" placeholder="Address" name="address" id="address" class="form-control input-lg">
                                    <span id="erroraddress" style="color:red"></span>
                                </div>
                                <div class="col-md-3 form-group">
                                    <input type="text" value="" placeholder="Address 2" name="address_2" id="address_2" class="form-control input-lg">
                                    <span id="erroraddress_2" style="color:red"></span>
                                </div>
                                 <div class="col-md-3 form-group">
                                    <input type="text" value="<?= (isset($myprofile)) ? $myprofile->zipcode : ''; ?>" placeholder="zipCode" name="zipcode" id="zipcode" class="form-control input-lg">
                                    <span id="errorzipcode" style="color:red"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="col-md-3 form-group">
                                    <input type="text" value="<?= (isset($myprofile)) ? $myprofile->city : ''; ?>" placeholder="City" name="city" id="city" class="form-control input-lg">
                                    <span id="errorcity" style="color:red"></span>
                                </div>
                                <div class="col-md-3 form-group">
                                    <input type="text" value="<?= (isset($myprofile)) ? $myprofile->state : ''; ?>" placeholder="State" name="state" id="state" class="form-control input-lg">
                                    <span id="errorstate" style="color:red"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group col-md-3">
                                    <select id="country" name="country" class="form-control">
                                        <option value="" selected="">Country</option>
                                        <<option value="Afghanistan" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Afghanistan') ? 'selected' : '' : ''; ?>>Afghanistan</option>
                                        <option value="Albania" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Albania') ? 'selected' : '' : ''; ?>>Albania</option>
                                        <option value="Algeria" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Algeria') ? 'selected' : '' : ''; ?>>Algeria</option>
                                        <option value="American Samoa" <?php echo (isset($myprofile)) ? ($myprofile->country == 'American Samoa') ? 'selected' : '' : ''; ?>>American Samoa</option>
                                        <option value="Andorra" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Andorra') ? 'selected' : '' : ''; ?>>Andorra</option>
                                        <option value="Angola" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Angola') ? 'selected' : '' : ''; ?>>Angola</option>
                                        <option value="Anguilla" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Anguilla') ? 'selected' : '' : ''; ?>>Anguilla</option>
                                        <option value="Antartica" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Antartica') ? 'selected' : '' : ''; ?>>Antarctica</option>
                                        <option value="Antigua and Barbuda" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Antigua and Barbuda') ? 'selected' : '' : ''; ?>>Antigua and Barbuda</option>
                                        <option value="Argentina" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Argentina') ? 'selected' : '' : ''; ?>>Argentina</option>
                                        <option value="Armenia" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Armenia') ? 'selected' : '' : ''; ?>>Armenia</option>
                                        <option value="Aruba" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Aruba') ? 'selected' : '' : ''; ?>>Aruba</option>
                                        <option value="Australia" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Australia') ? 'selected' : '' : ''; ?>>Australia</option>
                                        <option value="Austria" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Austria') ? 'selected' : '' : ''; ?>>Austria</option>
                                        <option value="Azerbaijan" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Azerbaijan') ? 'selected' : '' : ''; ?>>Azerbaijan</option>
                                        <option value="Bahamas" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Bahamas') ? 'selected' : '' : ''; ?>>Bahamas</option>
                                        <option value="Bahrain" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Bahrain') ? 'selected' : '' : ''; ?>>Bahrain</option>
                                        <option value="Bangladesh" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Bangladesh') ? 'selected' : '' : ''; ?>>Bangladesh</option>
                                        <option value="Barbados" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Barbados') ? 'selected' : '' : ''; ?>>Barbados</option>
                                        <option value="Belarus" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Belarus') ? 'selected' : '' : ''; ?>>Belarus</option>
                                        <option value="Belgium" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Belgium') ? 'selected' : '' : ''; ?>>Belgium</option>
                                        <option value="Belize" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Belize') ? 'selected' : '' : ''; ?>>Belize</option>
                                        <option value="Benin" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Benin') ? 'selected' : '' : ''; ?>>Benin</option>
                                        <option value="Bermuda" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Alabama') ? 'selected' : '' : ''; ?>>Bermuda</option>
                                        <option value="Benin" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Benin') ? 'selected' : '' : ''; ?>>Bhutan</option>
                                        <option value="Bolivia" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Bolivia') ? 'selected' : '' : ''; ?>>Bolivia</option>
                                        <option value="Bosnia and Herzegowina" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Bosnia and Herzegowina') ? 'selected' : '' : ''; ?>>Bosnia and Herzegowina</option>
                                        <option value="Botswana" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Botswana') ? 'selected' : '' : ''; ?>>Botswana</option>
                                        <option value="Bouvet Island" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Bouvet Island') ? 'selected' : '' : ''; ?>>Bouvet Island</option>
                                        <option value="Brazil" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Brazil') ? 'selected' : '' : ''; ?>>Brazil</option>
                                        <option value="British Indian Ocean Territory" <?php echo (isset($myprofile)) ? ($myprofile->country == 'British Indian Ocean Territory') ? 'selected' : '' : ''; ?>>British Indian Ocean Territory</option>
                                        <option value="Brunei Darussalam" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Brunei Darussalam') ? 'selected' : '' : ''; ?>>Brunei Darussalam</option>
                                        <option value="Bulgaria" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Bulgaria') ? 'selected' : '' : ''; ?>>Bulgaria</option>
                                        <option value="Burkina Faso" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Burkina Faso') ? 'selected' : '' : ''; ?>>Burkina Faso</option>
                                        <option value="Burundi" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Burundi') ? 'selected' : '' : ''; ?>>Burundi</option>
                                        <option value="Cambodia" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Cambodia') ? 'selected' : '' : ''; ?>>Cambodia</option>
                                        <option value="Cameroon" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Cameroon') ? 'selected' : '' : ''; ?>>Cameroon</option>
                                        <option value="Canada" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Canada') ? 'selected' : '' : ''; ?>>Canada</option>
                                        <option value="Cape Verde" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Cape Verde') ? 'selected' : '' : ''; ?>>Cape Verde</option>
                                        <option value="Cayman Islands" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Cayman Islands') ? 'selected' : '' : ''; ?>>Cayman Islands</option>
                                        <option value="Central African Republic" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Central African Republic') ? 'selected' : '' : ''; ?>>Central African Republic</option>
                                        <option value="Chad" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Chad') ? 'selected' : '' : ''; ?>>Chad</option>
                                        <option value="Chile" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Chile') ? 'selected' : '' : ''; ?>>Chile</option>
                                        <option value="China" <?php echo (isset($myprofile)) ? ($myprofile->country == 'China') ? 'selected' : '' : ''; ?>>China</option>
                                        <option value="Christmas Island" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Christmas Island') ? 'selected' : '' : ''; ?>>Christmas Island</option>
                                        <option value="Cocos Islands" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Cocos Islands') ? 'selected' : '' : ''; ?>>Cocos (Keeling) Islands</option>
                                        <option value="Colombia" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Colombia') ? 'selected' : '' : ''; ?>>Colombia</option>
                                        <option value="Comoros" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Comoros') ? 'selected' : '' : ''; ?>>Comoros</option>
                                        <option value="Congo" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Congo') ? 'selected' : '' : ''; ?>>Congo</option>
                                        <option value="Congo" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Congo') ? 'selected' : '' : ''; ?>>Congo, the Democratic Republic of the</option>
                                        <option value="Cook Islands" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Cook Islands') ? 'selected' : '' : ''; ?>>Cook Islands</option>
                                        <option value="Costa Rica" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Costa Rica') ? 'selected' : '' : ''; ?>>Costa Rica</option>
                                        <option value="Cota D'Ivoire" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Cota D Ivoire') ? 'selected' : '' : ''; ?>>Cote d'Ivoire</option>
                                        <option value="Croatia" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Croatia') ? 'selected' : '' : ''; ?>>Croatia (Hrvatska)</option>
                                        <option value="Cuba" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Cuba') ? 'selected' : '' : ''; ?>>Cuba</option>
                                        <option value="Cyprus" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Cyprus') ? 'selected' : '' : ''; ?>>Cyprus</option>
                                        <option value="Czech Republic" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Czech Republic') ? 'selected' : '' : ''; ?>>Czech Republic</option>
                                        <option value="Denmark" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Denmark') ? 'selected' : '' : ''; ?>>Denmark</option>
                                        <option value="Djibouti" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Djibouti') ? 'selected' : '' : ''; ?>>Djibouti</option>
                                        <option value="Dominica" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Dominica') ? 'selected' : '' : ''; ?>>Dominica</option>
                                        <option value="Dominican Republic" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Dominican Republic') ? 'selected' : '' : ''; ?>>Dominican Republic</option>
                                        <option value="East Timor" <?php echo (isset($myprofile)) ? ($myprofile->country == 'East Timor') ? 'selected' : '' : ''; ?>>East Timor</option>
                                        <option value="Ecuador" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Ecuador') ? 'selected' : '' : ''; ?>>Ecuador</option>
                                        <option value="Egypt" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Egypt') ? 'selected' : '' : ''; ?>>Egypt</option>
                                        <option value="El Salvador" <?php echo (isset($myprofile)) ? ($myprofile->country == 'El Salvador') ? 'selected' : '' : ''; ?>>El Salvador</option>
                                        <option value="Equatorial Guinea" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Equatorial Guinea') ? 'selected' : '' : ''; ?>>Equatorial Guinea</option>
                                        <option value="Eritrea" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Eritrea') ? 'selected' : '' : ''; ?>>Eritrea</option>
                                        <option value="Estonia" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Estonia') ? 'selected' : '' : ''; ?>>Estonia</option>
                                        <option value="Ethiopia" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Ethiopia') ? 'selected' : '' : ''; ?>>Ethiopia</option>
                                        <option value="Falkland Islands" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Falkland Islands') ? 'selected' : '' : ''; ?>>Falkland Islands (Malvinas)</option>
                                        <option value="Faroe Islands" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Faroe Islands') ? 'selected' : '' : ''; ?>>Faroe Islands</option>
                                        <option value="Fiji" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Fiji') ? 'selected' : '' : ''; ?>>Fiji</option>
                                        <option value="Finland" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Finland') ? 'selected' : '' : ''; ?>>Finland</option>
                                        <option value="France" <?php echo (isset($myprofile)) ? ($myprofile->country == 'France') ? 'selected' : '' : ''; ?>>France</option>
                                        <option value="France Metropolitan" <?php echo (isset($myprofile)) ? ($myprofile->country == 'France Metropolitan') ? 'selected' : '' : ''; ?>>France, Metropolitan</option>
                                        <option value="French Guiana" <?php echo (isset($myprofile)) ? ($myprofile->country == 'French Guiana') ? 'selected' : '' : ''; ?>>French Guiana</option>
                                        <option value="French Polynesia" <?php echo (isset($myprofile)) ? ($myprofile->country == 'French Polynesia') ? 'selected' : '' : ''; ?>>French Polynesia</option>
                                        <option value="French Southern Territories" <?php echo (isset($myprofile)) ? ($myprofile->country == 'French Southern Territories') ? 'selected' : '' : ''; ?>>French Southern Territories</option>
                                        <option value="Gabon" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Gabon') ? 'selected' : '' : ''; ?>>Gabon</option>
                                        <option value="Gambia" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Gambia') ? 'selected' : '' : ''; ?>>Gambia</option>
                                        <option value="Georgia" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Georgia') ? 'selected' : '' : ''; ?>>Georgia</option>
                                        <option value="Germany" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Germany') ? 'selected' : '' : ''; ?>>Germany</option>
                                        <option value="Ghana" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Ghana') ? 'selected' : '' : ''; ?>>Ghana</option>
                                        <option value="Gibraltar" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Gibraltar') ? 'selected' : '' : ''; ?>>Gibraltar</option>
                                        <option value="Greece" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Greece') ? 'selected' : '' : ''; ?>>Greece</option>
                                        <option value="Greenland" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Greenland') ? 'selected' : '' : ''; ?>>Greenland</option>
                                        <option value="Grenada" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Grenada') ? 'selected' : '' : ''; ?>>Grenada</option>
                                        <option value="Guadeloupe" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Guadeloupe') ? 'selected' : '' : ''; ?>>Guadeloupe</option>
                                        <option value="Guam" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Guam') ? 'selected' : '' : ''; ?>>Guam</option>
                                        <option value="Guatemala" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Guatemala') ? 'selected' : '' : ''; ?>>Guatemala</option>
                                        <option value="Guinea" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Guinea') ? 'selected' : '' : ''; ?>>Guinea</option>
                                        <option value="Guinea-Bissau" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Guinea-Bissau') ? 'selected' : '' : ''; ?>>Guinea-Bissau</option>
                                        <option value="Guyana" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Guyana') ? 'selected' : '' : ''; ?>>Guyana</option>
                                        <option value="Haiti" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Haiti') ? 'selected' : '' : ''; ?>>Haiti</option>
                                        <option value="Heard and McDonald Islands" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Heard and McDonald Islands') ? 'selected' : '' : ''; ?>>Heard and Mc Donald Islands</option>
                                        <option value="Holy See" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Holy See') ? 'selected' : '' : ''; ?>>Holy See (Vatican City State)</option>
                                        <option value="Honduras" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Honduras') ? 'selected' : '' : ''; ?>>Honduras</option>
                                        <option value="Hong Kong" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Hong Kong') ? 'selected' : '' : ''; ?>>Hong Kong</option>
                                        <option value="Hungary" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Hungary') ? 'selected' : '' : ''; ?>>Hungary</option>
                                        <option value="Iceland" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Iceland') ? 'selected' : '' : ''; ?>>Iceland</option>
                                        <option value="India" <?php echo (isset($myprofile)) ? ($myprofile->country == 'India') ? 'selected' : '' : ''; ?>>India</option>
                                        <option value="Indonesia" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Indonesia') ? 'selected' : '' : ''; ?>>Indonesia</option>
                                        <option value="Iran" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Iran') ? 'selected' : '' : ''; ?>>Iran (Islamic Republic of)</option>
                                        <option value="Iraq" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Iraq') ? 'selected' : '' : ''; ?>>Iraq</option>
                                        <option value="Ireland" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Ireland') ? 'selected' : '' : ''; ?>>Ireland</option>
                                        <option value="Israel" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Israel') ? 'selected' : '' : ''; ?>>Israel</option>
                                        <option value="Italy" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Italy') ? 'selected' : '' : ''; ?>>Italy</option>
                                        <option value="Jamaica" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Jamaica') ? 'selected' : '' : ''; ?>>Jamaica</option>
                                        <option value="Japan" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Japan') ? 'selected' : '' : ''; ?>>Japan</option>
                                        <option value="Jordan" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Jordan') ? 'selected' : '' : ''; ?>>Jordan</option>
                                        <option value="Kazakhstan" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Kazakhstan') ? 'selected' : '' : ''; ?>>Kazakhstan</option>
                                        <option value="Kenya" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Kenya') ? 'selected' : '' : ''; ?>>Kenya</option>
                                        <option value="Kiribati" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Kiribati') ? 'selected' : '' : ''; ?>>Kiribati</option>
                                        <option value="Democratic People's Republic of Korea" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Democratic Peoples Republic of Korea') ? 'selected' : '' : ''; ?>>Korea, Democratic People's Republic of</option>
                                        <option value="Korea" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Korea') ? 'selected' : '' : ''; ?>>Korea, Republic of</option>
                                        <option value="Kuwait" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Kuwait') ? 'selected' : '' : ''; ?>>Kuwait</option>
                                        <option value="Kyrgyzstan" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Kyrgyzstan') ? 'selected' : '' : ''; ?>>Kyrgyzstan</option>
                                        <option value="Lao" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Lao') ? 'selected' : '' : ''; ?>>Lao People's Democratic Republic</option>
                                        <option value="Latvia" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Latvia') ? 'selected' : '' : ''; ?>>Latvia</option>
                                        <option value="Lebanon" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Lebanon') ? 'selected' : '' : ''; ?>>Lebanon</option>
                                        <option value="Lesotho" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Lesotho') ? 'selected' : '' : ''; ?>>Lesotho</option>
                                        <option value="Liberia" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Liberia') ? 'selected' : '' : ''; ?>>Liberia</option>
                                        <option value="Libyan Arab Jamahiriya" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Libyan Arab Jamahiriya') ? 'selected' : '' : ''; ?>>Libyan Arab Jamahiriya</option>
                                        <option value="Liechtenstein" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Liechtenstein') ? 'selected' : '' : ''; ?>>Liechtenstein</option>
                                        <option value="Lithuania" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Lithuania') ? 'selected' : '' : ''; ?>>Lithuania</option>
                                        <option value="Luxembourg" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Luxembourg') ? 'selected' : '' : ''; ?>>Luxembourg</option>
                                        <option value="Macau" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Macau') ? 'selected' : '' : ''; ?>>Macau</option>
                                        <option value="Macedonia" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Macedonia') ? 'selected' : '' : ''; ?>>Macedonia, The Former Yugoslav Republic of</option>
                                        <option value="Madagascar" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Madagascar') ? 'selected' : '' : ''; ?>>Madagascar</option>
                                        <option value="Malawi" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Malawi') ? 'selected' : '' : ''; ?>>Malawi</option>
                                        <option value="Malaysia" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Malaysia') ? 'selected' : '' : ''; ?>>Malaysia</option>
                                        <option value="Maldives" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Maldives') ? 'selected' : '' : ''; ?>>Maldives</option>
                                        <option value="Mali" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Mali') ? 'selected' : '' : ''; ?>>Mali</option>
                                        <option value="Malta" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Malta') ? 'selected' : '' : ''; ?>>Malta</option>
                                        <option value="Marshall Islands" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Marshall Islands') ? 'selected' : '' : ''; ?>>Marshall Islands</option>
                                        <option value="Martinique" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Martinique') ? 'selected' : '' : ''; ?>>Martinique</option>
                                        <option value="Mauritania" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Mauritania') ? 'selected' : '' : ''; ?>>Mauritania</option>
                                        <option value="Mauritius" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Mauritius') ? 'selected' : '' : ''; ?>>Mauritius</option>
                                        <option value="Mayotte" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Mayotte') ? 'selected' : '' : ''; ?>>Mayotte</option>
                                        <option value="Mexico" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Mexico') ? 'selected' : '' : ''; ?>>Mexico</option>
                                        <option value="Micronesia" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Micronesia') ? 'selected' : '' : ''; ?>>Micronesia, Federated States of</option>
                                        <option value="Moldova" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Moldova') ? 'selected' : '' : ''; ?>>Moldova, Republic of</option>
                                        <option value="Monaco" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Monaco') ? 'selected' : '' : ''; ?>>Monaco</option>
                                        <option value="Mongolia" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Mongolia') ? 'selected' : '' : ''; ?>>Mongolia</option>
                                        <option value="Montserrat" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Montserrat') ? 'selected' : '' : ''; ?>>Montserrat</option>
                                        <option value="Montserrat" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Montserrat') ? 'selected' : '' : ''; ?>>Morocco</option>
                                        <option value="Mozambique" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Mozambique') ? 'selected' : '' : ''; ?>>Mozambique</option>
                                        <option value="Myanmar" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Myanmar') ? 'selected' : '' : ''; ?>>Myanmar</option>
                                        <option value="Namibia" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Namibia') ? 'selected' : '' : ''; ?>>Namibia</option>
                                        <option value="Nauru" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Nauru') ? 'selected' : '' : ''; ?>>Nauru</option>
                                        <option value="Nepal" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Nepal') ? 'selected' : '' : ''; ?>>Nepal</option>
                                        <option value="Netherlands" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Netherlands') ? 'selected' : '' : ''; ?>>Netherlands</option>
                                        <option value="Netherlands Antilles" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Netherlands Antilles') ? 'selected' : '' : ''; ?>>Netherlands Antilles</option>
                                        <option value="New Caledonia" <?php echo (isset($myprofile)) ? ($myprofile->country == 'New Caledonia') ? 'selected' : '' : ''; ?>>New Caledonia</option>
                                        <option value="New Zealand" <?php echo (isset($myprofile)) ? ($myprofile->country == 'New Zealand') ? 'selected' : '' : ''; ?>>New Zealand</option>
                                        <option value="Nicaragua" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Nicaragua') ? 'selected' : '' : ''; ?>>Nicaragua</option>
                                        <option value="Niger" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Niger') ? 'selected' : '' : ''; ?>>Niger</option>
                                        <option value="Nigeria" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Nigeria') ? 'selected' : '' : ''; ?>>Nigeria</option>
                                        <option value="Niue" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Niue') ? 'selected' : '' : ''; ?>>Niue</option>
                                        <option value="Norfolk Island" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Norfolk Island') ? 'selected' : '' : ''; ?>>Norfolk Island</option>
                                        <option value="Northern Mariana Islands" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Northern Mariana Islands') ? 'selected' : '' : ''; ?>>Northern Mariana Islands</option>
                                        <option value="Norway" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Norway') ? 'selected' : '' : ''; ?>>Norway</option>
                                        <option value="Oman" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Oman') ? 'selected' : '' : ''; ?>>Oman</option>
                                        <option value="Pakistan" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Pakistan') ? 'selected' : '' : ''; ?>>Pakistan</option>
                                        <option value="Palau" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Palau') ? 'selected' : '' : ''; ?>>Palau</option>
                                        <option value="Panama" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Panama') ? 'selected' : '' : ''; ?>>Panama</option>
                                        <option value="Papua New Guinea" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Papua New Guinea') ? 'selected' : '' : ''; ?>>Papua New Guinea</option>
                                        <option value="Paraguay" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Paraguay') ? 'selected' : '' : ''; ?>>Paraguay</option>
                                        <option value="Peru" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Peru') ? 'selected' : '' : ''; ?>>Peru</option>
                                        <option value="Philippines" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Philippines') ? 'selected' : '' : ''; ?>>Philippines</option>
                                        <option value="Pitcairn" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Pitcairn') ? 'selected' : '' : ''; ?>>Pitcairn</option>
                                        <option value="Poland" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Poland') ? 'selected' : '' : ''; ?>>Poland</option>
                                        <option value="Portugal" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Portugal') ? 'selected' : '' : ''; ?>>Portugal</option>
                                        <option value="Puerto Rico" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Puerto Rico') ? 'selected' : '' : ''; ?>>Puerto Rico</option>
                                        <option value="Qatar" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Qatar') ? 'selected' : '' : ''; ?>>Qatar</option>
                                        <option value="Reunion" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Reunion') ? 'selected' : '' : ''; ?>>Reunion</option>
                                        <option value="Romania" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Romania') ? 'selected' : '' : ''; ?>>Romania</option>
                                        <option value="Russia" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Russia') ? 'selected' : '' : ''; ?>>Russian Federation</option>
                                        <option value="Rwanda" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Rwanda') ? 'selected' : '' : ''; ?>>Rwanda</option>
                                        <option value="Saint Kitts and Nevis" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Saint Kitts and Nevis') ? 'selected' : '' : ''; ?>>Saint Kitts and Nevis</option> 
                                        <option value="Saint LUCIA" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Saint LUCIA') ? 'selected' : '' : ''; ?>>Saint LUCIA</option>
                                        <option value="Saint Vincent" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Saint Vincent') ? 'selected' : '' : ''; ?>>Saint Vincent and the Grenadines</option>
                                        <option value="Samoa" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Samoa') ? 'selected' : '' : ''; ?>>Samoa</option>
                                        <option value="San Marino" <?php echo (isset($myprofile)) ? ($myprofile->country == 'San Marino') ? 'selected' : '' : ''; ?>>San Marino</option>
                                        <option value="Sao Tome and Principe" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Sao Tome and Principe') ? 'selected' : '' : ''; ?>>Sao Tome and Principe</option> 
                                        <option value="Saudi Arabia" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Saudi Arabia') ? 'selected' : '' : ''; ?>>Saudi Arabia</option>
                                        <option value="Senegal" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Senegal') ? 'selected' : '' : ''; ?>>Senegal</option>
                                        <option value="Seychelles" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Seychelles') ? 'selected' : '' : ''; ?>>Seychelles</option>
                                        <option value="Sierra" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Sierra') ? 'selected' : '' : ''; ?>>Sierra Leone</option>
                                        <option value="Singapore" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Singapore') ? 'selected' : '' : ''; ?>>Singapore</option>
                                        <option value="Slovakia" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Slovakia') ? 'selected' : '' : ''; ?>>Slovakia (Slovak Republic)</option>
                                        <option value="Slovenia" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Slovenia') ? 'selected' : '' : ''; ?>>Slovenia</option>
                                        <option value="Solomon Islands" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Solomon Islands') ? 'selected' : '' : ''; ?>>Solomon Islands</option>
                                        <option value="Somalia" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Somalia') ? 'selected' : '' : ''; ?>>Somalia</option>
                                        <option value="South Africa" <?php echo (isset($myprofile)) ? ($myprofile->country == 'South Africa') ? 'selected' : '' : ''; ?>>South Africa</option>
                                        <option value="South Georgia" <?php echo (isset($myprofile)) ? ($myprofile->country == 'South Georgia') ? 'selected' : '' : ''; ?>>South Georgia and the South Sandwich Islands</option>
                                        <option value="Span" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Span') ? 'selected' : '' : ''; ?>>Spain</option>
                                        <option value="SriLanka" <?php echo (isset($myprofile)) ? ($myprofile->country == 'SriLanka') ? 'selected' : '' : ''; ?>>Sri Lanka</option>
                                        <option value="St. Helena" <?php echo (isset($myprofile)) ? ($myprofile->country == 'St. Helena') ? 'selected' : '' : ''; ?>>St. Helena</option>
                                        <option value="St. Pierre and Miguelon" <?php echo (isset($myprofile)) ? ($myprofile->country == 'St. Pierre and Miguelon') ? 'selected' : '' : ''; ?>>St. Pierre and Miquelon</option>
                                        <option value="Sudan" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Sudan') ? 'selected' : '' : ''; ?>>Sudan</option>
                                        <option value="Suriname" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Suriname') ? 'selected' : '' : ''; ?>>Suriname</option>
                                        <option value="Svalbard" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Svalbard') ? 'selected' : '' : ''; ?>>Svalbard and Jan Mayen Islands</option>
                                        <option value="Swaziland" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Swaziland') ? 'selected' : '' : ''; ?>>Swaziland</option>
                                        <option value="Sweden" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Sweden') ? 'selected' : '' : ''; ?>>Sweden</option>
                                        <option value="Switzerland" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Switzerland') ? 'selected' : '' : ''; ?>>Switzerland</option>
                                        <option value="Syria" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Syria') ? 'selected' : '' : ''; ?>>Syrian Arab Republic</option>
                                        <option value="Taiwan" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Taiwan') ? 'selected' : '' : ''; ?>>Taiwan, Province of China</option>
                                        <option value="Tajikistan" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Tajikistan') ? 'selected' : '' : ''; ?>>Tajikistan</option>
                                        <option value="Tanzania" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Tanzania') ? 'selected' : '' : ''; ?>>Tanzania, United Republic of</option>
                                        <option value="Thailand" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Thailand') ? 'selected' : '' : ''; ?>>Thailand</option>
                                        <option value="Togo" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Togo') ? 'selected' : '' : ''; ?>>Togo</option>
                                        <option value="Tokelau" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Tokelau') ? 'selected' : '' : ''; ?>>Tokelau</option>
                                        <option value="Tonga" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Tonga') ? 'selected' : '' : ''; ?>>Tonga</option>
                                        <option value="Trinidad and Tobago" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Trinidad and Tobago') ? 'selected' : '' : ''; ?>>Trinidad and Tobago</option>
                                        <option value="Tunisia" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Tunisia') ? 'selected' : '' : ''; ?>>Tunisia</option>
                                        <option value="Turkey" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Turkey') ? 'selected' : '' : ''; ?>>Turkey</option>
                                        <option value="Turkmenistan" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Turkmenistan') ? 'selected' : '' : ''; ?>>Turkmenistan</option>
                                        <option value="Turks and Caicos" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Turks and Caicos') ? 'selected' : '' : ''; ?>>Turks and Caicos Islands</option>
                                        <option value="Tuvalu" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Tuvalu') ? 'selected' : '' : ''; ?>>Tuvalu</option>
                                        <option value="Uganda" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Uganda') ? 'selected' : '' : ''; ?>>Uganda</option>
                                        <option value="Ukraine" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Ukraine') ? 'selected' : '' : ''; ?>>Ukraine</option>
                                        <option value="United Arab Emirates" <?php echo (isset($myprofile)) ? ($myprofile->country == 'United Arab Emirates') ? 'selected' : '' : ''; ?>>United Arab Emirates</option>
                                        <option value="United Kingdom" <?php echo (isset($myprofile)) ? ($myprofile->country == 'United Kingdom') ? 'selected' : '' : ''; ?>>United Kingdom</option>
                                        <option value="United States" <?php echo (isset($myprofile)) ? ($myprofile->country == 'United State') ? 'selected' : '' : ''; ?>>United States</option>
                                        <option value="United States Minor Outlying Islands" <?php echo (isset($myprofile)) ? ($myprofile->country == 'United States Minor Outlying Islands') ? 'selected' : '' : ''; ?>>United States Minor Outlying Islands</option>
                                        <option value="Uruguay" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Uruguay') ? 'selected' : '' : ''; ?>>Uruguay</option>
                                        <option value="Uzbekistan" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Uzbekistan') ? 'selected' : '' : ''; ?>>Uzbekistan</option>
                                        <option value="Vanuatu" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Vanuatu') ? 'selected' : '' : ''; ?>>Vanuatu</option>
                                        <option value="Venezuela" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Venezuela') ? 'selected' : '' : ''; ?>>Venezuela</option>
                                        <option value="Vietnam" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Vietnam') ? 'selected' : '' : ''; ?>>Viet Nam</option>
                                        <option value="Virgin Islands (British)" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Virgin Islands (British)') ? 'selected' : '' : ''; ?>>Virgin Islands (British)</option>
                                        <option value="Virgin Islands (U.S)" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Virgin Islands (U.S)') ? 'selected' : '' : ''; ?>>Virgin Islands (U.S.)</option>
                                        <option value="Wallis and Futana Islands" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Wallis and Futana Islands') ? 'selected' : '' : ''; ?>>Wallis and Futuna Islands</option>
                                        <option value="Western Sahara" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Western Sahara') ? 'selected' : '' : ''; ?>>Western Sahara</option>
                                        <option value="Yemen" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Yemen') ? 'selected' : '' : ''; ?>>Yemen</option>
                                        <option value="Yugoslavia" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Yugoslavia') ? 'selected' : '' : ''; ?>>Yugoslavia</option>
                                        <option value="Zambia" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Zambia') ? 'selected' : '' : ''; ?>>Zambia</option>
                                        <option value="Zimbabwe" <?php echo (isset($myprofile)) ? ($myprofile->country == 'Zimbabwe') ? 'selected' : '' : ''; ?>>Zimbabwe</option>
                                    </select>
                                    <span id="errorcountry" style="color:red"></span>
                                </div>
                                <div class="col-md-3 form-group">
                                    <input type="text" value="<?= (isset($myprofile)) ? $myprofile->phone : ''; ?>" placeholder="Cell Phone" name="cell_phone" id="cell_phone" class="form-control input-lg">
                                    <span id="errorcell_phone" style="color:red"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12  m-t-20">
                            <h5 style="padding-bottom: 4px; border-bottom: 2px solid #ebebeb">Profile</h5>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group col-md-3">
                                    <input type="file" id="profile" name="profile" class="form-control">
                                    <small class="form-text text-muted">Add a photo to personalize your account</small>
                                    <span id="errorprofile" style="color:red"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12  m-t-20">
                            <h5 style="padding-bottom: 4px; border-bottom: 2px solid #ebebeb">Upload vCard</h5>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group col-md-3">
                                    <input type="file" id="upload_vcard" name="upload_vcard" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12  m-t-20">
                            <h5 style="padding-bottom: 4px; border-bottom: 2px solid #ebebeb">Social Accounts</h5>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="col-md-4 form-group">
                                    <div class="col-md-1">
                                        <i class="fa fa-twitter" style="font-size: 25px; margin-top: 8px;"></i>
                                    </div>
                                    <div class="col-md-11">
                                        <input type="text" value="<?= (isset($myprofile)) ? $myprofile->twitter_id : ''; ?>" placeholder="Twitter" id="twitter" name="twitter" class="form-control input-lg">
                                        <span id="errortwitter" style="color:red"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="col-md-4 form-group">
                                    <div class="col-md-1">
                                        <i class="fa fa-facebook" style="font-size: 25px; margin-top: 8px;"></i>
                                    </div>
                                    <div class="col-md-11">
                                        <input type="text" value="<?= (isset($myprofile)) ? $myprofile->facebook_id : ''; ?>" placeholder="Facebook" id="facebook" name="facebook" class="form-control input-lg">
                                        <span id="errorfacebook" style="color:red"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="col-md-4 form-group">
                                    <div class="col-md-1">
                                        <i class="fa fa-instagram" style="font-size: 25px; margin-top: 8px;"></i>
                                    </div>
                                    <div class="col-md-11">
                                        <input type="text" value="<?= (isset($myprofile)) ? $myprofile->instagram_id : ''; ?>" placeholder="Instagram" id="instagram" name="instagram" class="form-control input-lg">
                                        <span id="errorinstagram" style="color:red"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12  m-t-20">
                            <h5 style="padding-bottom: 4px; border-bottom: 2px solid #ebebeb">Membership Details</h5>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group col-md-12">
                                    <label class="custom-control custom-checkbox m-0">
                                        <input type="checkbox" name="terms" id="terms" class="custom-control-input">
                                        <span class="form-text text-muted">I am currently a member of this organization</span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-12 m-t-20">
                                <div class="form-group col-md-12">
                                    <small class="form-text text-muted"><?php
                                        if (!empty($cms_details)) {
                                            echo $cms_details->description;
                                        }
                                        ?></small>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="cust_id" id="cust_id"  value="<?= (isset($myprofile)) ? $myprofile->cust_id : ''; ?>">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="col-md-12 form-group">
                                    <button class="btn btn-primary" id="update_user" type="submit">Submit</button>
                                    <button type="button" class="btn btn-danger m-l-10">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<script type="text/javascript">
    $(document).ready(function () {

//        $('#terms').click(function () {
//            if ($(this).is(':checked')) {
//                $('#update_user').removeAttr('disabled');
//            } else {
//                $('#update_user').attr('disabled', 'disabled');
//            }
//        });

        $("#update_user").on("click", function () {
            if ($("#first_name").val().trim() == "")
            {
                $("#errorfirst_name").text("Enter First Name").fadeIn('slow').fadeOut(5000);
                return false;
            } else if ($("#last_name").val().trim() == "") {
                $("#errorlast_name").text("Enter Last Name").fadeIn('slow').fadeOut(5000);
                return false;
            } else if ($("#email").val().trim() == "") {
                $("#erroremail").text("Enter Email").fadeIn('slow').fadeOut(5000);
                return false;
            } else {
                return true; //submit form
            }
            return false; //Prevent form to submitting
        });
    });
</script>
