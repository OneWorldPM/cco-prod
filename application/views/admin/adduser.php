<div class="main-content" >
    <div class="wrap-content container" id="container">
        <div class="container-fluid container-fullw bg-white">
            <div class="row">
                <div class="main-login col-xs-12 col-xs-offset-0 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
                    <div class="box-register">
                        <form class="form-register" id="frm_register" name="frm_register" method="post" action="<?= base_url() ?>admin/user/updateCustomer" enctype="multipart/form-data">
                            <fieldset>
                                <input type="hidden" class="form-control" name="cid" id="cid" value="<?php echo (isset($user)) ? $user->cust_id : ''; ?>">
                                <h3 class="box-title">Edit User</h3>
                                <div class="form-group">
                                    <span class="input-icon">
                                        <input type="text" class="form-control" name="first_name" id="first_name" value="<?php echo (isset($user)) ? $user->first_name : ''; ?>" placeholder="First Name">
                                        <i class="fa fa-user"></i> 
                                    </span><span id="errorfirst_name" style="color:red;"></span>
                                </div>
                                <div class="form-group">
                                    <span class="input-icon">
                                        <input type="text" class="form-control" name="last_name" id="last_name" value="<?php echo (isset($user)) ? $user->last_name : ''; ?>" placeholder="Last Name">
                                        <i class="fa fa-user"></i> 
                                    </span><span id="errorlast_name" style="color:red;"></span>
                                </div>
                                <div class="form-group">
                                    <span class="input-icon">
                                        <input type="text" class="form-control" name="address" id="address" value="<?php echo (isset($user)) ? $user->address : ''; ?>" placeholder="address">
                                        <i class="fa fa-phone"></i> 
                                    </span><span id="errorphone" style="color:red;"></span>
                                </div>
                                <div class="form-group">
                                    <span class="input-icon">
                                        <input type="email" class="form-control" name="email" readonly='readonly' value="<?php echo (isset($user)) ? $user->email : ''; ?>" <?php if (isset($user)) { ?>readonly='readonly' <?php } ?> id="email" placeholder="Email">
                                        <i class="fa fa-envelope"></i> 
                                    </span><span id="erroremail" style="color:red;"></span>
                                </div>

                                <div class="form-group">
                                    <select id="country" name="country" class="form-control">
                                        <option value="">Select Country</option>

                                        <option value="Afghanistan" <?php echo (isset($user)) ? ($user->country == 'Afghanistan') ? 'selected' : '' : ''; ?>>Afghanistan</option>
                                        <option value="Albania" <?php echo (isset($user)) ? ($user->country == 'Albania') ? 'selected' : '' : ''; ?>>Albania</option>
                                        <option value="Algeria" <?php echo (isset($user)) ? ($user->country == 'Algeria') ? 'selected' : '' : ''; ?>>Algeria</option>
                                        <option value="American Samoa" <?php echo (isset($user)) ? ($user->country == 'American Samoa') ? 'selected' : '' : ''; ?>>American Samoa</option>
                                        <option value="Andorra" <?php echo (isset($user)) ? ($user->country == 'Andorra') ? 'selected' : '' : ''; ?>>Andorra</option>
                                        <option value="Angola" <?php echo (isset($user)) ? ($user->country == 'Angola') ? 'selected' : '' : ''; ?>>Angola</option>
                                        <option value="Anguilla" <?php echo (isset($user)) ? ($user->country == 'Anguilla') ? 'selected' : '' : ''; ?>>Anguilla</option>
                                        <option value="Antartica" <?php echo (isset($user)) ? ($user->country == 'Antartica') ? 'selected' : '' : ''; ?>>Antarctica</option>
                                        <option value="Antigua and Barbuda" <?php echo (isset($user)) ? ($user->country == 'Antigua and Barbuda') ? 'selected' : '' : ''; ?>>Antigua and Barbuda</option>
                                        <option value="Argentina" <?php echo (isset($user)) ? ($user->country == 'Argentina') ? 'selected' : '' : ''; ?>>Argentina</option>
                                        <option value="Armenia" <?php echo (isset($user)) ? ($user->country == 'Armenia') ? 'selected' : '' : ''; ?>>Armenia</option>
                                        <option value="Aruba" <?php echo (isset($user)) ? ($user->country == 'Aruba') ? 'selected' : '' : ''; ?>>Aruba</option>
                                        <option value="Australia" <?php echo (isset($user)) ? ($user->country == 'Australia') ? 'selected' : '' : ''; ?>>Australia</option>
                                        <option value="Austria" <?php echo (isset($user)) ? ($user->country == 'Austria') ? 'selected' : '' : ''; ?>>Austria</option>
                                        <option value="Azerbaijan" <?php echo (isset($user)) ? ($user->country == 'Azerbaijan') ? 'selected' : '' : ''; ?>>Azerbaijan</option>
                                        <option value="Bahamas" <?php echo (isset($user)) ? ($user->country == 'Bahamas') ? 'selected' : '' : ''; ?>>Bahamas</option>
                                        <option value="Bahrain" <?php echo (isset($user)) ? ($user->country == 'Bahrain') ? 'selected' : '' : ''; ?>>Bahrain</option>
                                        <option value="Bangladesh" <?php echo (isset($user)) ? ($user->country == 'Bangladesh') ? 'selected' : '' : ''; ?>>Bangladesh</option>
                                        <option value="Barbados" <?php echo (isset($user)) ? ($user->country == 'Barbados') ? 'selected' : '' : ''; ?>>Barbados</option>
                                        <option value="Belarus" <?php echo (isset($user)) ? ($user->country == 'Belarus') ? 'selected' : '' : ''; ?>>Belarus</option>
                                        <option value="Belgium" <?php echo (isset($user)) ? ($user->country == 'Belgium') ? 'selected' : '' : ''; ?>>Belgium</option>
                                        <option value="Belize" <?php echo (isset($user)) ? ($user->country == 'Belize') ? 'selected' : '' : ''; ?>>Belize</option>
                                        <option value="Benin" <?php echo (isset($user)) ? ($user->country == 'Benin') ? 'selected' : '' : ''; ?>>Benin</option>
                                        <option value="Bermuda" <?php echo (isset($user)) ? ($user->country == 'Alabama') ? 'selected' : '' : ''; ?>>Bermuda</option>
                                        <option value="Benin" <?php echo (isset($user)) ? ($user->country == 'Benin') ? 'selected' : '' : ''; ?>>Bhutan</option>
                                        <option value="Bolivia" <?php echo (isset($user)) ? ($user->country == 'Bolivia') ? 'selected' : '' : ''; ?>>Bolivia</option>
                                        <option value="Bosnia and Herzegowina" <?php echo (isset($user)) ? ($user->country == 'Bosnia and Herzegowina') ? 'selected' : '' : ''; ?>>Bosnia and Herzegowina</option>
                                        <option value="Botswana" <?php echo (isset($user)) ? ($user->country == 'Botswana') ? 'selected' : '' : ''; ?>>Botswana</option>
                                        <option value="Bouvet Island" <?php echo (isset($user)) ? ($user->country == 'Bouvet Island') ? 'selected' : '' : ''; ?>>Bouvet Island</option>
                                        <option value="Brazil" <?php echo (isset($user)) ? ($user->country == 'Brazil') ? 'selected' : '' : ''; ?>>Brazil</option>
                                        <option value="British Indian Ocean Territory" <?php echo (isset($user)) ? ($user->country == 'British Indian Ocean Territory') ? 'selected' : '' : ''; ?>>British Indian Ocean Territory</option>
                                        <option value="Brunei Darussalam" <?php echo (isset($user)) ? ($user->country == 'Brunei Darussalam') ? 'selected' : '' : ''; ?>>Brunei Darussalam</option>
                                        <option value="Bulgaria" <?php echo (isset($user)) ? ($user->country == 'Bulgaria') ? 'selected' : '' : ''; ?>>Bulgaria</option>
                                        <option value="Burkina Faso" <?php echo (isset($user)) ? ($user->country == 'Burkina Faso') ? 'selected' : '' : ''; ?>>Burkina Faso</option>
                                        <option value="Burundi" <?php echo (isset($user)) ? ($user->country == 'Burundi') ? 'selected' : '' : ''; ?>>Burundi</option>
                                        <option value="Cambodia" <?php echo (isset($user)) ? ($user->country == 'Cambodia') ? 'selected' : '' : ''; ?>>Cambodia</option>
                                        <option value="Cameroon" <?php echo (isset($user)) ? ($user->country == 'Cameroon') ? 'selected' : '' : ''; ?>>Cameroon</option>
                                        <option value="Canada" <?php echo (isset($user)) ? ($user->country == 'Canada') ? 'selected' : '' : ''; ?>>Canada</option>
                                        <option value="Cape Verde" <?php echo (isset($user)) ? ($user->country == 'Cape Verde') ? 'selected' : '' : ''; ?>>Cape Verde</option>
                                        <option value="Cayman Islands" <?php echo (isset($user)) ? ($user->country == 'Cayman Islands') ? 'selected' : '' : ''; ?>>Cayman Islands</option>
                                        <option value="Central African Republic" <?php echo (isset($user)) ? ($user->country == 'Central African Republic') ? 'selected' : '' : ''; ?>>Central African Republic</option>
                                        <option value="Chad" <?php echo (isset($user)) ? ($user->country == 'Chad') ? 'selected' : '' : ''; ?>>Chad</option>
                                        <option value="Chile" <?php echo (isset($user)) ? ($user->country == 'Chile') ? 'selected' : '' : ''; ?>>Chile</option>
                                        <option value="China" <?php echo (isset($user)) ? ($user->country == 'China') ? 'selected' : '' : ''; ?>>China</option>
                                        <option value="Christmas Island" <?php echo (isset($user)) ? ($user->country == 'Christmas Island') ? 'selected' : '' : ''; ?>>Christmas Island</option>
                                        <option value="Cocos Islands" <?php echo (isset($user)) ? ($user->country == 'Cocos Islands') ? 'selected' : '' : ''; ?>>Cocos (Keeling) Islands</option>
                                        <option value="Colombia" <?php echo (isset($user)) ? ($user->country == 'Colombia') ? 'selected' : '' : ''; ?>>Colombia</option>
                                        <option value="Comoros" <?php echo (isset($user)) ? ($user->country == 'Comoros') ? 'selected' : '' : ''; ?>>Comoros</option>
                                        <option value="Congo" <?php echo (isset($user)) ? ($user->country == 'Congo') ? 'selected' : '' : ''; ?>>Congo</option>
                                        <option value="Congo" <?php echo (isset($user)) ? ($user->country == 'Congo') ? 'selected' : '' : ''; ?>>Congo, the Democratic Republic of the</option>
                                        <option value="Cook Islands" <?php echo (isset($user)) ? ($user->country == 'Cook Islands') ? 'selected' : '' : ''; ?>>Cook Islands</option>
                                        <option value="Costa Rica" <?php echo (isset($user)) ? ($user->country == 'Costa Rica') ? 'selected' : '' : ''; ?>>Costa Rica</option>
                                        <option value="Cota D'Ivoire" <?php echo (isset($user)) ? ($user->country == 'Cota D Ivoire') ? 'selected' : '' : ''; ?>>Cote d'Ivoire</option>
                                        <option value="Croatia" <?php echo (isset($user)) ? ($user->country == 'Croatia') ? 'selected' : '' : ''; ?>>Croatia (Hrvatska)</option>
                                        <option value="Cuba" <?php echo (isset($user)) ? ($user->country == 'Cuba') ? 'selected' : '' : ''; ?>>Cuba</option>
                                        <option value="Cyprus" <?php echo (isset($user)) ? ($user->country == 'Cyprus') ? 'selected' : '' : ''; ?>>Cyprus</option>
                                        <option value="Czech Republic" <?php echo (isset($user)) ? ($user->country == 'Czech Republic') ? 'selected' : '' : ''; ?>>Czech Republic</option>
                                        <option value="Denmark" <?php echo (isset($user)) ? ($user->country == 'Denmark') ? 'selected' : '' : ''; ?>>Denmark</option>
                                        <option value="Djibouti" <?php echo (isset($user)) ? ($user->country == 'Djibouti') ? 'selected' : '' : ''; ?>>Djibouti</option>
                                        <option value="Dominica" <?php echo (isset($user)) ? ($user->country == 'Dominica') ? 'selected' : '' : ''; ?>>Dominica</option>
                                        <option value="Dominican Republic" <?php echo (isset($user)) ? ($user->country == 'Dominican Republic') ? 'selected' : '' : ''; ?>>Dominican Republic</option>
                                        <option value="East Timor" <?php echo (isset($user)) ? ($user->country == 'East Timor') ? 'selected' : '' : ''; ?>>East Timor</option>
                                        <option value="Ecuador" <?php echo (isset($user)) ? ($user->country == 'Ecuador') ? 'selected' : '' : ''; ?>>Ecuador</option>
                                        <option value="Egypt" <?php echo (isset($user)) ? ($user->country == 'Egypt') ? 'selected' : '' : ''; ?>>Egypt</option>
                                        <option value="El Salvador" <?php echo (isset($user)) ? ($user->country == 'El Salvador') ? 'selected' : '' : ''; ?>>El Salvador</option>
                                        <option value="Equatorial Guinea" <?php echo (isset($user)) ? ($user->country == 'Equatorial Guinea') ? 'selected' : '' : ''; ?>>Equatorial Guinea</option>
                                        <option value="Eritrea" <?php echo (isset($user)) ? ($user->country == 'Eritrea') ? 'selected' : '' : ''; ?>>Eritrea</option>
                                        <option value="Estonia" <?php echo (isset($user)) ? ($user->country == 'Estonia') ? 'selected' : '' : ''; ?>>Estonia</option>
                                        <option value="Ethiopia" <?php echo (isset($user)) ? ($user->country == 'Ethiopia') ? 'selected' : '' : ''; ?>>Ethiopia</option>
                                        <option value="Falkland Islands" <?php echo (isset($user)) ? ($user->country == 'Falkland Islands') ? 'selected' : '' : ''; ?>>Falkland Islands (Malvinas)</option>
                                        <option value="Faroe Islands" <?php echo (isset($user)) ? ($user->country == 'Faroe Islands') ? 'selected' : '' : ''; ?>>Faroe Islands</option>
                                        <option value="Fiji" <?php echo (isset($user)) ? ($user->country == 'Fiji') ? 'selected' : '' : ''; ?>>Fiji</option>
                                        <option value="Finland" <?php echo (isset($user)) ? ($user->country == 'Finland') ? 'selected' : '' : ''; ?>>Finland</option>
                                        <option value="France" <?php echo (isset($user)) ? ($user->country == 'France') ? 'selected' : '' : ''; ?>>France</option>
                                        <option value="France Metropolitan" <?php echo (isset($user)) ? ($user->country == 'France Metropolitan') ? 'selected' : '' : ''; ?>>France, Metropolitan</option>
                                        <option value="French Guiana" <?php echo (isset($user)) ? ($user->country == 'French Guiana') ? 'selected' : '' : ''; ?>>French Guiana</option>
                                        <option value="French Polynesia" <?php echo (isset($user)) ? ($user->country == 'French Polynesia') ? 'selected' : '' : ''; ?>>French Polynesia</option>
                                        <option value="French Southern Territories" <?php echo (isset($user)) ? ($user->country == 'French Southern Territories') ? 'selected' : '' : ''; ?>>French Southern Territories</option>
                                        <option value="Gabon" <?php echo (isset($user)) ? ($user->country == 'Gabon') ? 'selected' : '' : ''; ?>>Gabon</option>
                                        <option value="Gambia" <?php echo (isset($user)) ? ($user->country == 'Gambia') ? 'selected' : '' : ''; ?>>Gambia</option>
                                        <option value="Georgia" <?php echo (isset($user)) ? ($user->country == 'Georgia') ? 'selected' : '' : ''; ?>>Georgia</option>
                                        <option value="Germany" <?php echo (isset($user)) ? ($user->country == 'Germany') ? 'selected' : '' : ''; ?>>Germany</option>
                                        <option value="Ghana" <?php echo (isset($user)) ? ($user->country == 'Ghana') ? 'selected' : '' : ''; ?>>Ghana</option>
                                        <option value="Gibraltar" <?php echo (isset($user)) ? ($user->country == 'Gibraltar') ? 'selected' : '' : ''; ?>>Gibraltar</option>
                                        <option value="Greece" <?php echo (isset($user)) ? ($user->country == 'Greece') ? 'selected' : '' : ''; ?>>Greece</option>
                                        <option value="Greenland" <?php echo (isset($user)) ? ($user->country == 'Greenland') ? 'selected' : '' : ''; ?>>Greenland</option>
                                        <option value="Grenada" <?php echo (isset($user)) ? ($user->country == 'Grenada') ? 'selected' : '' : ''; ?>>Grenada</option>
                                        <option value="Guadeloupe" <?php echo (isset($user)) ? ($user->country == 'Guadeloupe') ? 'selected' : '' : ''; ?>>Guadeloupe</option>
                                        <option value="Guam" <?php echo (isset($user)) ? ($user->country == 'Guam') ? 'selected' : '' : ''; ?>>Guam</option>
                                        <option value="Guatemala" <?php echo (isset($user)) ? ($user->country == 'Guatemala') ? 'selected' : '' : ''; ?>>Guatemala</option>
                                        <option value="Guinea" <?php echo (isset($user)) ? ($user->country == 'Guinea') ? 'selected' : '' : ''; ?>>Guinea</option>
                                        <option value="Guinea-Bissau" <?php echo (isset($user)) ? ($user->country == 'Guinea-Bissau') ? 'selected' : '' : ''; ?>>Guinea-Bissau</option>
                                        <option value="Guyana" <?php echo (isset($user)) ? ($user->country == 'Guyana') ? 'selected' : '' : ''; ?>>Guyana</option>
                                        <option value="Haiti" <?php echo (isset($user)) ? ($user->country == 'Haiti') ? 'selected' : '' : ''; ?>>Haiti</option>
                                        <option value="Heard and McDonald Islands" <?php echo (isset($user)) ? ($user->country == 'Heard and McDonald Islands') ? 'selected' : '' : ''; ?>>Heard and Mc Donald Islands</option>
                                        <option value="Holy See" <?php echo (isset($user)) ? ($user->country == 'Holy See') ? 'selected' : '' : ''; ?>>Holy See (Vatican City State)</option>
                                        <option value="Honduras" <?php echo (isset($user)) ? ($user->country == 'Honduras') ? 'selected' : '' : ''; ?>>Honduras</option>
                                        <option value="Hong Kong" <?php echo (isset($user)) ? ($user->country == 'Hong Kong') ? 'selected' : '' : ''; ?>>Hong Kong</option>
                                        <option value="Hungary" <?php echo (isset($user)) ? ($user->country == 'Hungary') ? 'selected' : '' : ''; ?>>Hungary</option>
                                        <option value="Iceland" <?php echo (isset($user)) ? ($user->country == 'Iceland') ? 'selected' : '' : ''; ?>>Iceland</option>
                                        <option value="India" <?php echo (isset($user)) ? ($user->country == 'India') ? 'selected' : '' : ''; ?>>India</option>
                                        <option value="Indonesia" <?php echo (isset($user)) ? ($user->country == 'Indonesia') ? 'selected' : '' : ''; ?>>Indonesia</option>
                                        <option value="Iran" <?php echo (isset($user)) ? ($user->country == 'Iran') ? 'selected' : '' : ''; ?>>Iran (Islamic Republic of)</option>
                                        <option value="Iraq" <?php echo (isset($user)) ? ($user->country == 'Iraq') ? 'selected' : '' : ''; ?>>Iraq</option>
                                        <option value="Ireland" <?php echo (isset($user)) ? ($user->country == 'Ireland') ? 'selected' : '' : ''; ?>>Ireland</option>
                                        <option value="Israel" <?php echo (isset($user)) ? ($user->country == 'Israel') ? 'selected' : '' : ''; ?>>Israel</option>
                                        <option value="Italy" <?php echo (isset($user)) ? ($user->country == 'Italy') ? 'selected' : '' : ''; ?>>Italy</option>
                                        <option value="Jamaica" <?php echo (isset($user)) ? ($user->country == 'Jamaica') ? 'selected' : '' : ''; ?>>Jamaica</option>
                                        <option value="Japan" <?php echo (isset($user)) ? ($user->country == 'Japan') ? 'selected' : '' : ''; ?>>Japan</option>
                                        <option value="Jordan" <?php echo (isset($user)) ? ($user->country == 'Jordan') ? 'selected' : '' : ''; ?>>Jordan</option>
                                        <option value="Kazakhstan" <?php echo (isset($user)) ? ($user->country == 'Kazakhstan') ? 'selected' : '' : ''; ?>>Kazakhstan</option>
                                        <option value="Kenya" <?php echo (isset($user)) ? ($user->country == 'Kenya') ? 'selected' : '' : ''; ?>>Kenya</option>
                                        <option value="Kiribati" <?php echo (isset($user)) ? ($user->country == 'Kiribati') ? 'selected' : '' : ''; ?>>Kiribati</option>
                                        <option value="Democratic People's Republic of Korea" <?php echo (isset($user)) ? ($user->country == 'Democratic Peoples Republic of Korea') ? 'selected' : '' : ''; ?>>Korea, Democratic People's Republic of</option>
                                        <option value="Korea" <?php echo (isset($user)) ? ($user->country == 'Korea') ? 'selected' : '' : ''; ?>>Korea, Republic of</option>
                                        <option value="Kuwait" <?php echo (isset($user)) ? ($user->country == 'Kuwait') ? 'selected' : '' : ''; ?>>Kuwait</option>
                                        <option value="Kyrgyzstan" <?php echo (isset($user)) ? ($user->country == 'Kyrgyzstan') ? 'selected' : '' : ''; ?>>Kyrgyzstan</option>
                                        <option value="Lao" <?php echo (isset($user)) ? ($user->country == 'Lao') ? 'selected' : '' : ''; ?>>Lao People's Democratic Republic</option>
                                        <option value="Latvia" <?php echo (isset($user)) ? ($user->country == 'Latvia') ? 'selected' : '' : ''; ?>>Latvia</option>
                                        <option value="Lebanon" <?php echo (isset($user)) ? ($user->country == 'Lebanon') ? 'selected' : '' : ''; ?>>Lebanon</option>
                                        <option value="Lesotho" <?php echo (isset($user)) ? ($user->country == 'Lesotho') ? 'selected' : '' : ''; ?>>Lesotho</option>
                                        <option value="Liberia" <?php echo (isset($user)) ? ($user->country == 'Liberia') ? 'selected' : '' : ''; ?>>Liberia</option>
                                        <option value="Libyan Arab Jamahiriya" <?php echo (isset($user)) ? ($user->country == 'Libyan Arab Jamahiriya') ? 'selected' : '' : ''; ?>>Libyan Arab Jamahiriya</option>
                                        <option value="Liechtenstein" <?php echo (isset($user)) ? ($user->country == 'Liechtenstein') ? 'selected' : '' : ''; ?>>Liechtenstein</option>
                                        <option value="Lithuania" <?php echo (isset($user)) ? ($user->country == 'Lithuania') ? 'selected' : '' : ''; ?>>Lithuania</option>
                                        <option value="Luxembourg" <?php echo (isset($user)) ? ($user->country == 'Luxembourg') ? 'selected' : '' : ''; ?>>Luxembourg</option>
                                        <option value="Macau" <?php echo (isset($user)) ? ($user->country == 'Macau') ? 'selected' : '' : ''; ?>>Macau</option>
                                        <option value="Macedonia" <?php echo (isset($user)) ? ($user->country == 'Macedonia') ? 'selected' : '' : ''; ?>>Macedonia, The Former Yugoslav Republic of</option>
                                        <option value="Madagascar" <?php echo (isset($user)) ? ($user->country == 'Madagascar') ? 'selected' : '' : ''; ?>>Madagascar</option>
                                        <option value="Malawi" <?php echo (isset($user)) ? ($user->country == 'Malawi') ? 'selected' : '' : ''; ?>>Malawi</option>
                                        <option value="Malaysia" <?php echo (isset($user)) ? ($user->country == 'Malaysia') ? 'selected' : '' : ''; ?>>Malaysia</option>
                                        <option value="Maldives" <?php echo (isset($user)) ? ($user->country == 'Maldives') ? 'selected' : '' : ''; ?>>Maldives</option>
                                        <option value="Mali" <?php echo (isset($user)) ? ($user->country == 'Mali') ? 'selected' : '' : ''; ?>>Mali</option>
                                        <option value="Malta" <?php echo (isset($user)) ? ($user->country == 'Malta') ? 'selected' : '' : ''; ?>>Malta</option>
                                        <option value="Marshall Islands" <?php echo (isset($user)) ? ($user->country == 'Marshall Islands') ? 'selected' : '' : ''; ?>>Marshall Islands</option>
                                        <option value="Martinique" <?php echo (isset($user)) ? ($user->country == 'Martinique') ? 'selected' : '' : ''; ?>>Martinique</option>
                                        <option value="Mauritania" <?php echo (isset($user)) ? ($user->country == 'Mauritania') ? 'selected' : '' : ''; ?>>Mauritania</option>
                                        <option value="Mauritius" <?php echo (isset($user)) ? ($user->country == 'Mauritius') ? 'selected' : '' : ''; ?>>Mauritius</option>
                                        <option value="Mayotte" <?php echo (isset($user)) ? ($user->country == 'Mayotte') ? 'selected' : '' : ''; ?>>Mayotte</option>
                                        <option value="Mexico" <?php echo (isset($user)) ? ($user->country == 'Mexico') ? 'selected' : '' : ''; ?>>Mexico</option>
                                        <option value="Micronesia" <?php echo (isset($user)) ? ($user->country == 'Micronesia') ? 'selected' : '' : ''; ?>>Micronesia, Federated States of</option>
                                        <option value="Moldova" <?php echo (isset($user)) ? ($user->country == 'Moldova') ? 'selected' : '' : ''; ?>>Moldova, Republic of</option>
                                        <option value="Monaco" <?php echo (isset($user)) ? ($user->country == 'Monaco') ? 'selected' : '' : ''; ?>>Monaco</option>
                                        <option value="Mongolia" <?php echo (isset($user)) ? ($user->country == 'Mongolia') ? 'selected' : '' : ''; ?>>Mongolia</option>
                                        <option value="Montserrat" <?php echo (isset($user)) ? ($user->country == 'Montserrat') ? 'selected' : '' : ''; ?>>Montserrat</option>
                                        <option value="Montserrat" <?php echo (isset($user)) ? ($user->country == 'Montserrat') ? 'selected' : '' : ''; ?>>Morocco</option>
                                        <option value="Mozambique" <?php echo (isset($user)) ? ($user->country == 'Mozambique') ? 'selected' : '' : ''; ?>>Mozambique</option>
                                        <option value="Myanmar" <?php echo (isset($user)) ? ($user->country == 'Myanmar') ? 'selected' : '' : ''; ?>>Myanmar</option>
                                        <option value="Namibia" <?php echo (isset($user)) ? ($user->country == 'Namibia') ? 'selected' : '' : ''; ?>>Namibia</option>
                                        <option value="Nauru" <?php echo (isset($user)) ? ($user->country == 'Nauru') ? 'selected' : '' : ''; ?>>Nauru</option>
                                        <option value="Nepal" <?php echo (isset($user)) ? ($user->country == 'Nepal') ? 'selected' : '' : ''; ?>>Nepal</option>
                                        <option value="Netherlands" <?php echo (isset($user)) ? ($user->country == 'Netherlands') ? 'selected' : '' : ''; ?>>Netherlands</option>
                                        <option value="Netherlands Antilles" <?php echo (isset($user)) ? ($user->country == 'Netherlands Antilles') ? 'selected' : '' : ''; ?>>Netherlands Antilles</option>
                                        <option value="New Caledonia" <?php echo (isset($user)) ? ($user->country == 'New Caledonia') ? 'selected' : '' : ''; ?>>New Caledonia</option>
                                        <option value="New Zealand" <?php echo (isset($user)) ? ($user->country == 'New Zealand') ? 'selected' : '' : ''; ?>>New Zealand</option>
                                        <option value="Nicaragua" <?php echo (isset($user)) ? ($user->country == 'Nicaragua') ? 'selected' : '' : ''; ?>>Nicaragua</option>
                                        <option value="Niger" <?php echo (isset($user)) ? ($user->country == 'Niger') ? 'selected' : '' : ''; ?>>Niger</option>
                                        <option value="Nigeria" <?php echo (isset($user)) ? ($user->country == 'Nigeria') ? 'selected' : '' : ''; ?>>Nigeria</option>
                                        <option value="Niue" <?php echo (isset($user)) ? ($user->country == 'Niue') ? 'selected' : '' : ''; ?>>Niue</option>
                                        <option value="Norfolk Island" <?php echo (isset($user)) ? ($user->country == 'Norfolk Island') ? 'selected' : '' : ''; ?>>Norfolk Island</option>
                                        <option value="Northern Mariana Islands" <?php echo (isset($user)) ? ($user->country == 'Northern Mariana Islands') ? 'selected' : '' : ''; ?>>Northern Mariana Islands</option>
                                        <option value="Norway" <?php echo (isset($user)) ? ($user->country == 'Norway') ? 'selected' : '' : ''; ?>>Norway</option>
                                        <option value="Oman" <?php echo (isset($user)) ? ($user->country == 'Oman') ? 'selected' : '' : ''; ?>>Oman</option>
                                        <option value="Pakistan" <?php echo (isset($user)) ? ($user->country == 'Pakistan') ? 'selected' : '' : ''; ?>>Pakistan</option>
                                        <option value="Palau" <?php echo (isset($user)) ? ($user->country == 'Palau') ? 'selected' : '' : ''; ?>>Palau</option>
                                        <option value="Panama" <?php echo (isset($user)) ? ($user->country == 'Panama') ? 'selected' : '' : ''; ?>>Panama</option>
                                        <option value="Papua New Guinea" <?php echo (isset($user)) ? ($user->country == 'Papua New Guinea') ? 'selected' : '' : ''; ?>>Papua New Guinea</option>
                                        <option value="Paraguay" <?php echo (isset($user)) ? ($user->country == 'Paraguay') ? 'selected' : '' : ''; ?>>Paraguay</option>
                                        <option value="Peru" <?php echo (isset($user)) ? ($user->country == 'Peru') ? 'selected' : '' : ''; ?>>Peru</option>
                                        <option value="Philippines" <?php echo (isset($user)) ? ($user->country == 'Philippines') ? 'selected' : '' : ''; ?>>Philippines</option>
                                        <option value="Pitcairn" <?php echo (isset($user)) ? ($user->country == 'Pitcairn') ? 'selected' : '' : ''; ?>>Pitcairn</option>
                                        <option value="Poland" <?php echo (isset($user)) ? ($user->country == 'Poland') ? 'selected' : '' : ''; ?>>Poland</option>
                                        <option value="Portugal" <?php echo (isset($user)) ? ($user->country == 'Portugal') ? 'selected' : '' : ''; ?>>Portugal</option>
                                        <option value="Puerto Rico" <?php echo (isset($user)) ? ($user->country == 'Puerto Rico') ? 'selected' : '' : ''; ?>>Puerto Rico</option>
                                        <option value="Qatar" <?php echo (isset($user)) ? ($user->country == 'Qatar') ? 'selected' : '' : ''; ?>>Qatar</option>
                                        <option value="Reunion" <?php echo (isset($user)) ? ($user->country == 'Reunion') ? 'selected' : '' : ''; ?>>Reunion</option>
                                        <option value="Romania" <?php echo (isset($user)) ? ($user->country == 'Romania') ? 'selected' : '' : ''; ?>>Romania</option>
                                        <option value="Russia" <?php echo (isset($user)) ? ($user->country == 'Russia') ? 'selected' : '' : ''; ?>>Russian Federation</option>
                                        <option value="Rwanda" <?php echo (isset($user)) ? ($user->country == 'Rwanda') ? 'selected' : '' : ''; ?>>Rwanda</option>
                                        <option value="Saint Kitts and Nevis" <?php echo (isset($user)) ? ($user->country == 'Saint Kitts and Nevis') ? 'selected' : '' : ''; ?>>Saint Kitts and Nevis</option> 
                                        <option value="Saint LUCIA" <?php echo (isset($user)) ? ($user->country == 'Saint LUCIA') ? 'selected' : '' : ''; ?>>Saint LUCIA</option>
                                        <option value="Saint Vincent" <?php echo (isset($user)) ? ($user->country == 'Saint Vincent') ? 'selected' : '' : ''; ?>>Saint Vincent and the Grenadines</option>
                                        <option value="Samoa" <?php echo (isset($user)) ? ($user->country == 'Samoa') ? 'selected' : '' : ''; ?>>Samoa</option>
                                        <option value="San Marino" <?php echo (isset($user)) ? ($user->country == 'San Marino') ? 'selected' : '' : ''; ?>>San Marino</option>
                                        <option value="Sao Tome and Principe" <?php echo (isset($user)) ? ($user->country == 'Sao Tome and Principe') ? 'selected' : '' : ''; ?>>Sao Tome and Principe</option> 
                                        <option value="Saudi Arabia" <?php echo (isset($user)) ? ($user->country == 'Saudi Arabia') ? 'selected' : '' : ''; ?>>Saudi Arabia</option>
                                        <option value="Senegal" <?php echo (isset($user)) ? ($user->country == 'Senegal') ? 'selected' : '' : ''; ?>>Senegal</option>
                                        <option value="Seychelles" <?php echo (isset($user)) ? ($user->country == 'Seychelles') ? 'selected' : '' : ''; ?>>Seychelles</option>
                                        <option value="Sierra" <?php echo (isset($user)) ? ($user->country == 'Sierra') ? 'selected' : '' : ''; ?>>Sierra Leone</option>
                                        <option value="Singapore" <?php echo (isset($user)) ? ($user->country == 'Singapore') ? 'selected' : '' : ''; ?>>Singapore</option>
                                        <option value="Slovakia" <?php echo (isset($user)) ? ($user->country == 'Slovakia') ? 'selected' : '' : ''; ?>>Slovakia (Slovak Republic)</option>
                                        <option value="Slovenia" <?php echo (isset($user)) ? ($user->country == 'Slovenia') ? 'selected' : '' : ''; ?>>Slovenia</option>
                                        <option value="Solomon Islands" <?php echo (isset($user)) ? ($user->country == 'Solomon Islands') ? 'selected' : '' : ''; ?>>Solomon Islands</option>
                                        <option value="Somalia" <?php echo (isset($user)) ? ($user->country == 'Somalia') ? 'selected' : '' : ''; ?>>Somalia</option>
                                        <option value="South Africa" <?php echo (isset($user)) ? ($user->country == 'South Africa') ? 'selected' : '' : ''; ?>>South Africa</option>
                                        <option value="South Georgia" <?php echo (isset($user)) ? ($user->country == 'South Georgia') ? 'selected' : '' : ''; ?>>South Georgia and the South Sandwich Islands</option>
                                        <option value="Span" <?php echo (isset($user)) ? ($user->country == 'Span') ? 'selected' : '' : ''; ?>>Spain</option>
                                        <option value="SriLanka" <?php echo (isset($user)) ? ($user->country == 'SriLanka') ? 'selected' : '' : ''; ?>>Sri Lanka</option>
                                        <option value="St. Helena" <?php echo (isset($user)) ? ($user->country == 'St. Helena') ? 'selected' : '' : ''; ?>>St. Helena</option>
                                        <option value="St. Pierre and Miguelon" <?php echo (isset($user)) ? ($user->country == 'St. Pierre and Miguelon') ? 'selected' : '' : ''; ?>>St. Pierre and Miquelon</option>
                                        <option value="Sudan" <?php echo (isset($user)) ? ($user->country == 'Sudan') ? 'selected' : '' : ''; ?>>Sudan</option>
                                        <option value="Suriname" <?php echo (isset($user)) ? ($user->country == 'Suriname') ? 'selected' : '' : ''; ?>>Suriname</option>
                                        <option value="Svalbard" <?php echo (isset($user)) ? ($user->country == 'Svalbard') ? 'selected' : '' : ''; ?>>Svalbard and Jan Mayen Islands</option>
                                        <option value="Swaziland" <?php echo (isset($user)) ? ($user->country == 'Swaziland') ? 'selected' : '' : ''; ?>>Swaziland</option>
                                        <option value="Sweden" <?php echo (isset($user)) ? ($user->country == 'Sweden') ? 'selected' : '' : ''; ?>>Sweden</option>
                                        <option value="Switzerland" <?php echo (isset($user)) ? ($user->country == 'Switzerland') ? 'selected' : '' : ''; ?>>Switzerland</option>
                                        <option value="Syria" <?php echo (isset($user)) ? ($user->country == 'Syria') ? 'selected' : '' : ''; ?>>Syrian Arab Republic</option>
                                        <option value="Taiwan" <?php echo (isset($user)) ? ($user->country == 'Taiwan') ? 'selected' : '' : ''; ?>>Taiwan, Province of China</option>
                                        <option value="Tajikistan" <?php echo (isset($user)) ? ($user->country == 'Tajikistan') ? 'selected' : '' : ''; ?>>Tajikistan</option>
                                        <option value="Tanzania" <?php echo (isset($user)) ? ($user->country == 'Tanzania') ? 'selected' : '' : ''; ?>>Tanzania, United Republic of</option>
                                        <option value="Thailand" <?php echo (isset($user)) ? ($user->country == 'Thailand') ? 'selected' : '' : ''; ?>>Thailand</option>
                                        <option value="Togo" <?php echo (isset($user)) ? ($user->country == 'Togo') ? 'selected' : '' : ''; ?>>Togo</option>
                                        <option value="Tokelau" <?php echo (isset($user)) ? ($user->country == 'Tokelau') ? 'selected' : '' : ''; ?>>Tokelau</option>
                                        <option value="Tonga" <?php echo (isset($user)) ? ($user->country == 'Tonga') ? 'selected' : '' : ''; ?>>Tonga</option>
                                        <option value="Trinidad and Tobago" <?php echo (isset($user)) ? ($user->country == 'Trinidad and Tobago') ? 'selected' : '' : ''; ?>>Trinidad and Tobago</option>
                                        <option value="Tunisia" <?php echo (isset($user)) ? ($user->country == 'Tunisia') ? 'selected' : '' : ''; ?>>Tunisia</option>
                                        <option value="Turkey" <?php echo (isset($user)) ? ($user->country == 'Turkey') ? 'selected' : '' : ''; ?>>Turkey</option>
                                        <option value="Turkmenistan" <?php echo (isset($user)) ? ($user->country == 'Turkmenistan') ? 'selected' : '' : ''; ?>>Turkmenistan</option>
                                        <option value="Turks and Caicos" <?php echo (isset($user)) ? ($user->country == 'Turks and Caicos') ? 'selected' : '' : ''; ?>>Turks and Caicos Islands</option>
                                        <option value="Tuvalu" <?php echo (isset($user)) ? ($user->country == 'Tuvalu') ? 'selected' : '' : ''; ?>>Tuvalu</option>
                                        <option value="Uganda" <?php echo (isset($user)) ? ($user->country == 'Uganda') ? 'selected' : '' : ''; ?>>Uganda</option>
                                        <option value="Ukraine" <?php echo (isset($user)) ? ($user->country == 'Ukraine') ? 'selected' : '' : ''; ?>>Ukraine</option>
                                        <option value="United Arab Emirates" <?php echo (isset($user)) ? ($user->country == 'United Arab Emirates') ? 'selected' : '' : ''; ?>>United Arab Emirates</option>
                                        <option value="United Kingdom" <?php echo (isset($user)) ? ($user->country == 'United Kingdom') ? 'selected' : '' : ''; ?>>United Kingdom</option>
                                        <option value="United States" <?php echo (isset($user)) ? ($user->country == 'United States') ? 'selected' : '' : ''; ?>>United States</option>
                                        <option value="United States Minor Outlying Islands" <?php echo (isset($user)) ? ($user->country == 'United States Minor Outlying Islands') ? 'selected' : '' : ''; ?>>United States Minor Outlying Islands</option>
                                        <option value="Uruguay" <?php echo (isset($user)) ? ($user->country == 'Uruguay') ? 'selected' : '' : ''; ?>>Uruguay</option>
                                        <option value="Uzbekistan" <?php echo (isset($user)) ? ($user->country == 'Uzbekistan') ? 'selected' : '' : ''; ?>>Uzbekistan</option>
                                        <option value="Vanuatu" <?php echo (isset($user)) ? ($user->country == 'Vanuatu') ? 'selected' : '' : ''; ?>>Vanuatu</option>
                                        <option value="Venezuela" <?php echo (isset($user)) ? ($user->country == 'Venezuela') ? 'selected' : '' : ''; ?>>Venezuela</option>
                                        <option value="Vietnam" <?php echo (isset($user)) ? ($user->country == 'Vietnam') ? 'selected' : '' : ''; ?>>Viet Nam</option>
                                        <option value="Virgin Islands (British)" <?php echo (isset($user)) ? ($user->country == 'Virgin Islands (British)') ? 'selected' : '' : ''; ?>>Virgin Islands (British)</option>
                                        <option value="Virgin Islands (U.S)" <?php echo (isset($user)) ? ($user->country == 'Virgin Islands (U.S)') ? 'selected' : '' : ''; ?>>Virgin Islands (U.S.)</option>
                                        <option value="Wallis and Futana Islands" <?php echo (isset($user)) ? ($user->country == 'Wallis and Futana Islands') ? 'selected' : '' : ''; ?>>Wallis and Futuna Islands</option>
                                        <option value="Western Sahara" <?php echo (isset($user)) ? ($user->country == 'Western Sahara') ? 'selected' : '' : ''; ?>>Western Sahara</option>
                                        <option value="Yemen" <?php echo (isset($user)) ? ($user->country == 'Yemen') ? 'selected' : '' : ''; ?>>Yemen</option>
                                        <option value="Yugoslavia" <?php echo (isset($user)) ? ($user->country == 'Yugoslavia') ? 'selected' : '' : ''; ?>>Yugoslavia</option>
                                        <option value="Zambia" <?php echo (isset($user)) ? ($user->country == 'Zambia') ? 'selected' : '' : ''; ?>>Zambia</option>
                                        <option value="Zimbabwe" <?php echo (isset($user)) ? ($user->country == 'Zimbabwe') ? 'selected' : '' : ''; ?>>Zimbabwe</option>
                                    </select><span id="errorcountry" style="color:red;"></span>
                                </div>
                                <div class="form-actions">
                                    <button type="submit" class="btn btn-primary form-control" id="btn_register">
                                        <?php echo (isset($user)) ? 'Update' : 'Save'; ?> <i class="fa fa-arrow-circle-right"></i>
                                    </button>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- end: DYNAMIC TABLE -->
    </div>
</div>
</div>   
<?php
$msg = $this->input->get('msg');
switch ($msg) {
    case "U":
        $m = "Update Successfully...!!!";
        $t = "success";
        break;
    case "A":
        $m = "Email or Phone alredy exist!!!";
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
<!-- start: JavaScript Event Handlers for this page -->

<script type="text/javascript">
    $(document).ready(function () {

<?php if ($msg): ?>
            alertify.<?= $t ?>("<?= $m ?>");
<?php endif; ?>


        $("#btn_register").on("click", function () {

            if ($("#full_name").val().trim() == "")
            {
                $("#errorfull_name").text("Please Enter Full Name").fadeIn('slow').fadeOut(5000);
                return false;
            } else if (!full_name_patten.test(full_name)) {
                $("#errorfull_name").text("Not allow special characters").fadeIn('slow').fadeOut(5000);
                return false;
            } else if ($("#phone").val().trim() == "") {
                $("#errorphone").text("Please Enter Phone").fadeIn('slow').fadeOut(5000);
                return false;
            } else if (!phone_patten.test(phone)) {
                $("#errorphone").text("Allow only Number").fadeIn('slow').fadeOut(5000);
                return false;
            } else if ($("#email").val().trim() == "") {
                $("#erroremail").text("Please Enter Email").fadeIn('slow').fadeOut(5000);
                return false;
            } else if ($("#country").val() == "") {
                $("#errorcountry").text("Please Select Country").fadeIn('slow').fadeOut(5000);
                return false;
            } else {
                return true; //submit form
            }
            return false; //Prevent form to submitting
        });
    });
</script>
<!-- end: JavaScript Event Handlers for this page -->
<!-- end: CLIP-TWO JAVASCRIPTS -->
</body>
</html>