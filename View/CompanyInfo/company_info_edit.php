
<?php

//include database
include '../../lib/Database.php';
//include messages
include '../../func/messages.php';

$db = new Database();

// fetch company info
$query = "SELECT * FROM company_info WHERE id = 1";
$companyInfo = $db->query($query)->fetch();

//Update company info
if(isset($_POST['insert_CompanyInfo'])){

        $nom_societe = $_POST['nom_societe'];
        $email_societe = $_POST['email_societe'];
        $telephone = $_POST['telephone'];
        $gsm = $_POST['gsm'];
        $fax = $_POST['fax'];
        $localisation_ville = $_POST['localisation_ville'];
        $localisation_route = $_POST['localisation_route'];
        $country = $_POST['country'];
        $currency = $_POST['currency'];

        $query = "UPDATE company_info SET nom_societe = ?,
                                          email_societe = ?,
                                          telephone = ?,
                                          gsm = ?,
                                          fax = ?,
                                          localisation_ville = ?,
                                          localisation_route = ?,
                                          country = ?,
                                          currency = ?
                                          WHERE id = 1
                                         ";

        $fetch = $db->update($query,[
            $nom_societe,$email_societe,$telephone,$gsm,$fax,$localisation_ville,
            $localisation_route,$country,$currency
        ]);
        if($fetch) {
            header("Location:?update_success");
        }else {
            header("Location:?update_error");
        }
}





?>


<!-- ============================================================== -->
<!-- main wrapper -->
<!-- ============================================================== -->
<?php include '../includes/header.inc.php'; ?>

<!-- ============================================================== -->
<!-- navbar -->
<!-- ============================================================== -->
<?php include '../includes/navbar.inc.php'; ?>

<!-- ============================================================== -->
<!-- end navbar -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- left sidebar -->
<!-- ============================================================== -->
<?php include '../includes/left_navbar.inc.php'; ?>
<!-- ============================================================== -->
<!-- login page  -->
<!-- ============================================================== -->
<div class="">
    <div class="card ">
            <?php
                if(isset($_GET['update_success'])) {
                    update_success_message();
                }

                if(isset($_GET['update_error'])) {
                    update_error_message();
                }
            ?>

        <div class="card-header text-center"><a href="#"><img class="logo-img" src="../assets/images/logo.png" alt="logo"></a><span class="splash-description">Veuillez saisir vos societe info.</span></div>
        <div class="card-body">
            <form action="<?php $_SERVER['PHP_SELF'];?>" method="POST">
                <div class="form-group">
                    <label>Nom societe</label>
                    <input class="form-control form-control-lg"  value="<?php echo $companyInfo['nom_societe']; ?>" id="username" name="nom_societe" type="text" placeholder="Nom societe" autocomplete="off">
                </div>

                <div class="form-group">
                    <label>Email</label>
                    <input class="form-control form-control-lg" id="username" value="<?php echo $companyInfo['email_societe']; ?>" name="email_societe" type="text" placeholder="Email societe" autocomplete="off">
                </div>

                <div class="form-group">
                    <label>Telephone</label>
                    <input class="form-control form-control-lg" id="username" value="<?php echo $companyInfo['telephone']; ?>" name="telephone" type="text" placeholder="Telephone" autocomplete="off">
                </div>

                <div class="form-group">
                    <label>Gsm</label>
                    <input class="form-control form-control-lg" id="username" value="<?php echo $companyInfo['gsm']; ?>" name="gsm" type="text" placeholder="gsm" autocomplete="off">
                </div>
                <div class="form-group">
                    <label>Fax</label>
                    <input class="form-control form-control-lg" id="username" value="<?php echo $companyInfo['fax']; ?>" name="fax" type="text" placeholder="fax" autocomplete="off">
                </div>
                <div class="form-group">
                    <label>Ville</label>
                    <input class="form-control form-control-lg" id="username" value="<?php echo $companyInfo['localisation_ville']; ?>" name="localisation_ville" type="text" placeholder="Tunise,sfax.." autocomplete="off">
                </div>

                <div class="form-group">
                    <label>Pays</label>
                    <select name="country" class="form-control">
                        <?php if($companyInfo['country']){ ?>
                        <option value="<?php echo $companyInfo['country']; ?>" selected="selected"><?php echo $companyInfo['country']; ?></option>
                            <option value="TN" >Tunisia</option>
                            <option value="AF">Afghanistan</option>
                            <option value="AX">Åland Islands</option>
                            <option value="AL">Albania</option>
                            <option value="DZ">Algeria</option>
                            <option value="AS">American Samoa</option>
                            <option value="AD">Andorra</option>
                            <option value="AO">Angola</option>
                            <option value="AI">Anguilla</option>
                            <option value="AQ">Antarctica</option>
                            <option value="AG">Antigua and Barbuda</option>
                            <option value="AR">Argentina</option>
                            <option value="AM">Armenia</option>
                            <option value="AW">Aruba</option>
                            <option value="AU">Australia</option>
                            <option value="AT">Austria</option>
                            <option value="AZ">Azerbaijan</option>
                            <option value="BS">Bahamas</option>
                            <option value="BH">Bahrain</option>
                            <option value="BD">Bangladesh</option>
                            <option value="BB">Barbados</option>
                            <option value="BY">Belarus</option>
                            <option value="BE">Belgium</option>
                            <option value="BZ">Belize</option>
                            <option value="BJ">Benin</option>
                            <option value="BM">Bermuda</option>
                            <option value="BT">Bhutan</option>
                            <option value="BO">Bolivia, Plurinational State of</option>
                            <option value="BQ">Bonaire, Sint Eustatius and Saba</option>
                            <option value="BA">Bosnia and Herzegovina</option>
                            <option value="BW">Botswana</option>
                            <option value="BV">Bouvet Island</option>
                            <option value="BR">Brazil</option>
                            <option value="IO">British Indian Ocean Territory</option>
                            <option value="BN">Brunei Darussalam</option>
                            <option value="BG">Bulgaria</option>
                            <option value="BF">Burkina Faso</option>
                            <option value="BI">Burundi</option>
                            <option value="KH">Cambodia</option>
                            <option value="CM">Cameroon</option>
                            <option value="CA">Canada</option>
                            <option value="CV">Cape Verde</option>
                            <option value="KY">Cayman Islands</option>
                            <option value="CF">Central African Republic</option>
                            <option value="TD">Chad</option>
                            <option value="CL">Chile</option>
                            <option value="CN">China</option>
                            <option value="CX">Christmas Island</option>
                            <option value="CC">Cocos (Keeling) Islands</option>
                            <option value="CO">Colombia</option>
                            <option value="KM">Comoros</option>
                            <option value="CG">Congo</option>
                            <option value="CD">Congo, the Democratic Republic of the</option>
                            <option value="CK">Cook Islands</option>
                            <option value="CR">Costa Rica</option>
                            <option value="CI">Côte d'Ivoire</option>
                            <option value="HR">Croatia</option>
                            <option value="CU">Cuba</option>
                            <option value="CW">Curaçao</option>
                            <option value="CY">Cyprus</option>
                            <option value="CZ">Czech Republic</option>
                            <option value="DK">Denmark</option>
                            <option value="DJ">Djibouti</option>
                            <option value="DM">Dominica</option>
                            <option value="DO">Dominican Republic</option>
                            <option value="EC">Ecuador</option>
                            <option value="EG">Egypt</option>
                            <option value="SV">El Salvador</option>
                            <option value="GQ">Equatorial Guinea</option>
                            <option value="ER">Eritrea</option>
                            <option value="EE">Estonia</option>
                            <option value="ET">Ethiopia</option>
                            <option value="FK">Falkland Islands (Malvinas)</option>
                            <option value="FO">Faroe Islands</option>
                            <option value="FJ">Fiji</option>
                            <option value="FI">Finland</option>
                            <option value="FR">France</option>
                            <option value="GF">French Guiana</option>
                            <option value="PF">French Polynesia</option>
                            <option value="TF">French Southern Territories</option>
                            <option value="GA">Gabon</option>
                            <option value="GM">Gambia</option>
                            <option value="GE">Georgia</option>
                            <option value="DE">Germany</option>
                            <option value="GH">Ghana</option>
                            <option value="GI">Gibraltar</option>
                            <option value="GR">Greece</option>
                            <option value="GL">Greenland</option>
                            <option value="GD">Grenada</option>
                            <option value="GP">Guadeloupe</option>
                            <option value="GU">Guam</option>
                            <option value="GT">Guatemala</option>
                            <option value="GG">Guernsey</option>
                            <option value="GN">Guinea</option>
                            <option value="GW">Guinea-Bissau</option>
                            <option value="GY">Guyana</option>
                            <option value="HT">Haiti</option>
                            <option value="HM">Heard Island and McDonald Islands</option>
                            <option value="VA">Holy See (Vatican City State)</option>
                            <option value="HN">Honduras</option>
                            <option value="HK">Hong Kong</option>
                            <option value="HU">Hungary</option>
                            <option value="IS">Iceland</option>
                            <option value="IN">India</option>
                            <option value="ID">Indonesia</option>
                            <option value="IR">Iran, Islamic Republic of</option>
                            <option value="IQ">Iraq</option>
                            <option value="IE">Ireland</option>
                            <option value="IM">Isle of Man</option>
                            <option value="IL">Israel</option>
                            <option value="IT">Italy</option>
                            <option value="JM">Jamaica</option>
                            <option value="JP">Japan</option>
                            <option value="JE">Jersey</option>
                            <option value="JO">Jordan</option>
                            <option value="KZ">Kazakhstan</option>
                            <option value="KE">Kenya</option>
                            <option value="KI">Kiribati</option>
                            <option value="KP">Korea, Democratic People's Republic of</option>
                            <option value="KR">Korea, Republic of</option>
                            <option value="KW">Kuwait</option>
                            <option value="KG">Kyrgyzstan</option>
                            <option value="LA">Lao People's Democratic Republic</option>
                            <option value="LV">Latvia</option>
                            <option value="LB">Lebanon</option>
                            <option value="LS">Lesotho</option>
                            <option value="LR">Liberia</option>
                            <option value="LY">Libya</option>
                            <option value="LI">Liechtenstein</option>
                            <option value="LT">Lithuania</option>
                            <option value="LU">Luxembourg</option>
                            <option value="MO">Macao</option>
                            <option value="MK">Macedonia, the former Yugoslav Republic of</option>
                            <option value="MG">Madagascar</option>
                            <option value="MW">Malawi</option>
                            <option value="MY">Malaysia</option>
                            <option value="MV">Maldives</option>
                            <option value="ML">Mali</option>
                            <option value="MT">Malta</option>
                            <option value="MH">Marshall Islands</option>
                            <option value="MQ">Martinique</option>
                            <option value="MR">Mauritania</option>
                            <option value="MU">Mauritius</option>
                            <option value="YT">Mayotte</option>
                            <option value="MX">Mexico</option>
                            <option value="FM">Micronesia, Federated States of</option>
                            <option value="MD">Moldova, Republic of</option>
                            <option value="MC">Monaco</option>
                            <option value="MN">Mongolia</option>
                            <option value="ME">Montenegro</option>
                            <option value="MS">Montserrat</option>
                            <option value="MA">Morocco</option>
                            <option value="MZ">Mozambique</option>
                            <option value="MM">Myanmar</option>
                            <option value="NA">Namibia</option>
                            <option value="NR">Nauru</option>
                            <option value="NP">Nepal</option>
                            <option value="NL">Netherlands</option>
                            <option value="NC">New Caledonia</option>
                            <option value="NZ">New Zealand</option>
                            <option value="NI">Nicaragua</option>
                            <option value="NE">Niger</option>
                            <option value="NG">Nigeria</option>
                            <option value="NU">Niue</option>
                            <option value="NF">Norfolk Island</option>
                            <option value="MP">Northern Mariana Islands</option>
                            <option value="NO">Norway</option>
                            <option value="OM">Oman</option>
                            <option value="PK">Pakistan</option>
                            <option value="PW">Palau</option>
                            <option value="PS">Palestinian Territory, Occupied</option>
                            <option value="PA">Panama</option>
                            <option value="PG">Papua New Guinea</option>
                            <option value="PY">Paraguay</option>
                            <option value="PE">Peru</option>
                            <option value="PH">Philippines</option>
                            <option value="PN">Pitcairn</option>
                            <option value="PL">Poland</option>
                            <option value="PT">Portugal</option>
                            <option value="PR">Puerto Rico</option>
                            <option value="QA">Qatar</option>
                            <option value="RE">Réunion</option>
                            <option value="RO">Romania</option>
                            <option value="RU">Russian Federation</option>
                            <option value="RW">Rwanda</option>
                            <option value="BL">Saint Barthélemy</option>
                            <option value="SH">Saint Helena, Ascension and Tristan da Cunha</option>
                            <option value="KN">Saint Kitts and Nevis</option>
                            <option value="LC">Saint Lucia</option>
                            <option value="MF">Saint Martin (French part)</option>
                            <option value="PM">Saint Pierre and Miquelon</option>
                            <option value="VC">Saint Vincent and the Grenadines</option>
                            <option value="WS">Samoa</option>
                            <option value="SM">San Marino</option>
                            <option value="ST">Sao Tome and Principe</option>
                            <option value="SA">Saudi Arabia</option>
                            <option value="SN">Senegal</option>
                            <option value="RS">Serbia</option>
                            <option value="SC">Seychelles</option>
                            <option value="SL">Sierra Leone</option>
                            <option value="SG">Singapore</option>
                            <option value="SX">Sint Maarten (Dutch part)</option>
                            <option value="SK">Slovakia</option>
                            <option value="SI">Slovenia</option>
                            <option value="SB">Solomon Islands</option>
                            <option value="SO">Somalia</option>
                            <option value="ZA">South Africa</option>
                            <option value="GS">South Georgia and the South Sandwich Islands</option>
                            <option value="SS">South Sudan</option>
                            <option value="ES">Spain</option>
                            <option value="LK">Sri Lanka</option>
                            <option value="SD">Sudan</option>
                            <option value="SR">Suriname</option>
                            <option value="SJ">Svalbard and Jan Mayen</option>
                            <option value="SZ">Swaziland</option>
                            <option value="SE">Sweden</option>
                            <option value="CH">Switzerland</option>
                            <option value="SY">Syrian Arab Republic</option>
                            <option value="TW">Taiwan, Province of China</option>
                            <option value="TJ">Tajikistan</option>
                            <option value="TZ">Tanzania, United Republic of</option>
                            <option value="TH">Thailand</option>
                            <option value="TL">Timor-Leste</option>
                            <option value="TG">Togo</option>
                            <option value="TK">Tokelau</option>
                            <option value="TO">Tonga</option>
                            <option value="TT">Trinidad and Tobago</option>
                            <option value="TR">Turkey</option>
                            <option value="TM">Turkmenistan</option>
                            <option value="TC">Turks and Caicos Islands</option>
                            <option value="TV">Tuvalu</option>
                            <option value="UG">Uganda</option>
                            <option value="UA">Ukraine</option>
                            <option value="AE">United Arab Emirates</option>
                            <option value="GB">United Kingdom</option>
                            <option value="US">United States</option>
                            <option value="UM">United States Minor Outlying Islands</option>
                            <option value="UY">Uruguay</option>
                            <option value="UZ">Uzbekistan</option>
                            <option value="VU">Vanuatu</option>
                            <option value="VE">Venezuela, Bolivarian Republic of</option>
                            <option value="VN">Viet Nam</option>
                            <option value="VG">Virgin Islands, British</option>
                            <option value="VI">Virgin Islands, U.S.</option>
                            <option value="WF">Wallis and Futuna</option>
                            <option value="EH">Western Sahara</option>
                            <option value="YE">Yemen</option>
                            <option value="ZM">Zambia</option>
                            <option value="ZW">Zimbabwe</option>


                        <?php }else { ?>
                        <option value="TN" selected="selected">Tunisia</option>
                        <option value="AF">Afghanistan</option>
                        <option value="AX">Åland Islands</option>
                        <option value="AL">Albania</option>
                        <option value="DZ">Algeria</option>
                        <option value="AS">American Samoa</option>
                        <option value="AD">Andorra</option>
                        <option value="AO">Angola</option>
                        <option value="AI">Anguilla</option>
                        <option value="AQ">Antarctica</option>
                        <option value="AG">Antigua and Barbuda</option>
                        <option value="AR">Argentina</option>
                        <option value="AM">Armenia</option>
                        <option value="AW">Aruba</option>
                        <option value="AU">Australia</option>
                        <option value="AT">Austria</option>
                        <option value="AZ">Azerbaijan</option>
                        <option value="BS">Bahamas</option>
                        <option value="BH">Bahrain</option>
                        <option value="BD">Bangladesh</option>
                        <option value="BB">Barbados</option>
                        <option value="BY">Belarus</option>
                        <option value="BE">Belgium</option>
                        <option value="BZ">Belize</option>
                        <option value="BJ">Benin</option>
                        <option value="BM">Bermuda</option>
                        <option value="BT">Bhutan</option>
                        <option value="BO">Bolivia, Plurinational State of</option>
                        <option value="BQ">Bonaire, Sint Eustatius and Saba</option>
                        <option value="BA">Bosnia and Herzegovina</option>
                        <option value="BW">Botswana</option>
                        <option value="BV">Bouvet Island</option>
                        <option value="BR">Brazil</option>
                        <option value="IO">British Indian Ocean Territory</option>
                        <option value="BN">Brunei Darussalam</option>
                        <option value="BG">Bulgaria</option>
                        <option value="BF">Burkina Faso</option>
                        <option value="BI">Burundi</option>
                        <option value="KH">Cambodia</option>
                        <option value="CM">Cameroon</option>
                        <option value="CA">Canada</option>
                        <option value="CV">Cape Verde</option>
                        <option value="KY">Cayman Islands</option>
                        <option value="CF">Central African Republic</option>
                        <option value="TD">Chad</option>
                        <option value="CL">Chile</option>
                        <option value="CN">China</option>
                        <option value="CX">Christmas Island</option>
                        <option value="CC">Cocos (Keeling) Islands</option>
                        <option value="CO">Colombia</option>
                        <option value="KM">Comoros</option>
                        <option value="CG">Congo</option>
                        <option value="CD">Congo, the Democratic Republic of the</option>
                        <option value="CK">Cook Islands</option>
                        <option value="CR">Costa Rica</option>
                        <option value="CI">Côte d'Ivoire</option>
                        <option value="HR">Croatia</option>
                        <option value="CU">Cuba</option>
                        <option value="CW">Curaçao</option>
                        <option value="CY">Cyprus</option>
                        <option value="CZ">Czech Republic</option>
                        <option value="DK">Denmark</option>
                        <option value="DJ">Djibouti</option>
                        <option value="DM">Dominica</option>
                        <option value="DO">Dominican Republic</option>
                        <option value="EC">Ecuador</option>
                        <option value="EG">Egypt</option>
                        <option value="SV">El Salvador</option>
                        <option value="GQ">Equatorial Guinea</option>
                        <option value="ER">Eritrea</option>
                        <option value="EE">Estonia</option>
                        <option value="ET">Ethiopia</option>
                        <option value="FK">Falkland Islands (Malvinas)</option>
                        <option value="FO">Faroe Islands</option>
                        <option value="FJ">Fiji</option>
                        <option value="FI">Finland</option>
                        <option value="FR">France</option>
                        <option value="GF">French Guiana</option>
                        <option value="PF">French Polynesia</option>
                        <option value="TF">French Southern Territories</option>
                        <option value="GA">Gabon</option>
                        <option value="GM">Gambia</option>
                        <option value="GE">Georgia</option>
                        <option value="DE">Germany</option>
                        <option value="GH">Ghana</option>
                        <option value="GI">Gibraltar</option>
                        <option value="GR">Greece</option>
                        <option value="GL">Greenland</option>
                        <option value="GD">Grenada</option>
                        <option value="GP">Guadeloupe</option>
                        <option value="GU">Guam</option>
                        <option value="GT">Guatemala</option>
                        <option value="GG">Guernsey</option>
                        <option value="GN">Guinea</option>
                        <option value="GW">Guinea-Bissau</option>
                        <option value="GY">Guyana</option>
                        <option value="HT">Haiti</option>
                        <option value="HM">Heard Island and McDonald Islands</option>
                        <option value="VA">Holy See (Vatican City State)</option>
                        <option value="HN">Honduras</option>
                        <option value="HK">Hong Kong</option>
                        <option value="HU">Hungary</option>
                        <option value="IS">Iceland</option>
                        <option value="IN">India</option>
                        <option value="ID">Indonesia</option>
                        <option value="IR">Iran, Islamic Republic of</option>
                        <option value="IQ">Iraq</option>
                        <option value="IE">Ireland</option>
                        <option value="IM">Isle of Man</option>
                        <option value="IL">Israel</option>
                        <option value="IT">Italy</option>
                        <option value="JM">Jamaica</option>
                        <option value="JP">Japan</option>
                        <option value="JE">Jersey</option>
                        <option value="JO">Jordan</option>
                        <option value="KZ">Kazakhstan</option>
                        <option value="KE">Kenya</option>
                        <option value="KI">Kiribati</option>
                        <option value="KP">Korea, Democratic People's Republic of</option>
                        <option value="KR">Korea, Republic of</option>
                        <option value="KW">Kuwait</option>
                        <option value="KG">Kyrgyzstan</option>
                        <option value="LA">Lao People's Democratic Republic</option>
                        <option value="LV">Latvia</option>
                        <option value="LB">Lebanon</option>
                        <option value="LS">Lesotho</option>
                        <option value="LR">Liberia</option>
                        <option value="LY">Libya</option>
                        <option value="LI">Liechtenstein</option>
                        <option value="LT">Lithuania</option>
                        <option value="LU">Luxembourg</option>
                        <option value="MO">Macao</option>
                        <option value="MK">Macedonia, the former Yugoslav Republic of</option>
                        <option value="MG">Madagascar</option>
                        <option value="MW">Malawi</option>
                        <option value="MY">Malaysia</option>
                        <option value="MV">Maldives</option>
                        <option value="ML">Mali</option>
                        <option value="MT">Malta</option>
                        <option value="MH">Marshall Islands</option>
                        <option value="MQ">Martinique</option>
                        <option value="MR">Mauritania</option>
                        <option value="MU">Mauritius</option>
                        <option value="YT">Mayotte</option>
                        <option value="MX">Mexico</option>
                        <option value="FM">Micronesia, Federated States of</option>
                        <option value="MD">Moldova, Republic of</option>
                        <option value="MC">Monaco</option>
                        <option value="MN">Mongolia</option>
                        <option value="ME">Montenegro</option>
                        <option value="MS">Montserrat</option>
                        <option value="MA">Morocco</option>
                        <option value="MZ">Mozambique</option>
                        <option value="MM">Myanmar</option>
                        <option value="NA">Namibia</option>
                        <option value="NR">Nauru</option>
                        <option value="NP">Nepal</option>
                        <option value="NL">Netherlands</option>
                        <option value="NC">New Caledonia</option>
                        <option value="NZ">New Zealand</option>
                        <option value="NI">Nicaragua</option>
                        <option value="NE">Niger</option>
                        <option value="NG">Nigeria</option>
                        <option value="NU">Niue</option>
                        <option value="NF">Norfolk Island</option>
                        <option value="MP">Northern Mariana Islands</option>
                        <option value="NO">Norway</option>
                        <option value="OM">Oman</option>
                        <option value="PK">Pakistan</option>
                        <option value="PW">Palau</option>
                        <option value="PS">Palestinian Territory, Occupied</option>
                        <option value="PA">Panama</option>
                        <option value="PG">Papua New Guinea</option>
                        <option value="PY">Paraguay</option>
                        <option value="PE">Peru</option>
                        <option value="PH">Philippines</option>
                        <option value="PN">Pitcairn</option>
                        <option value="PL">Poland</option>
                        <option value="PT">Portugal</option>
                        <option value="PR">Puerto Rico</option>
                        <option value="QA">Qatar</option>
                        <option value="RE">Réunion</option>
                        <option value="RO">Romania</option>
                        <option value="RU">Russian Federation</option>
                        <option value="RW">Rwanda</option>
                        <option value="BL">Saint Barthélemy</option>
                        <option value="SH">Saint Helena, Ascension and Tristan da Cunha</option>
                        <option value="KN">Saint Kitts and Nevis</option>
                        <option value="LC">Saint Lucia</option>
                        <option value="MF">Saint Martin (French part)</option>
                        <option value="PM">Saint Pierre and Miquelon</option>
                        <option value="VC">Saint Vincent and the Grenadines</option>
                        <option value="WS">Samoa</option>
                        <option value="SM">San Marino</option>
                        <option value="ST">Sao Tome and Principe</option>
                        <option value="SA">Saudi Arabia</option>
                        <option value="SN">Senegal</option>
                        <option value="RS">Serbia</option>
                        <option value="SC">Seychelles</option>
                        <option value="SL">Sierra Leone</option>
                        <option value="SG">Singapore</option>
                        <option value="SX">Sint Maarten (Dutch part)</option>
                        <option value="SK">Slovakia</option>
                        <option value="SI">Slovenia</option>
                        <option value="SB">Solomon Islands</option>
                        <option value="SO">Somalia</option>
                        <option value="ZA">South Africa</option>
                        <option value="GS">South Georgia and the South Sandwich Islands</option>
                        <option value="SS">South Sudan</option>
                        <option value="ES">Spain</option>
                        <option value="LK">Sri Lanka</option>
                        <option value="SD">Sudan</option>
                        <option value="SR">Suriname</option>
                        <option value="SJ">Svalbard and Jan Mayen</option>
                        <option value="SZ">Swaziland</option>
                        <option value="SE">Sweden</option>
                        <option value="CH">Switzerland</option>
                        <option value="SY">Syrian Arab Republic</option>
                        <option value="TW">Taiwan, Province of China</option>
                        <option value="TJ">Tajikistan</option>
                        <option value="TZ">Tanzania, United Republic of</option>
                        <option value="TH">Thailand</option>
                        <option value="TL">Timor-Leste</option>
                        <option value="TG">Togo</option>
                        <option value="TK">Tokelau</option>
                        <option value="TO">Tonga</option>
                        <option value="TT">Trinidad and Tobago</option>
                        <option value="TR">Turkey</option>
                        <option value="TM">Turkmenistan</option>
                        <option value="TC">Turks and Caicos Islands</option>
                        <option value="TV">Tuvalu</option>
                        <option value="UG">Uganda</option>
                        <option value="UA">Ukraine</option>
                        <option value="AE">United Arab Emirates</option>
                        <option value="GB">United Kingdom</option>
                        <option value="US">United States</option>
                        <option value="UM">United States Minor Outlying Islands</option>
                        <option value="UY">Uruguay</option>
                        <option value="UZ">Uzbekistan</option>
                        <option value="VU">Vanuatu</option>
                        <option value="VE">Venezuela, Bolivarian Republic of</option>
                        <option value="VN">Viet Nam</option>
                        <option value="VG">Virgin Islands, British</option>
                        <option value="VI">Virgin Islands, U.S.</option>
                        <option value="WF">Wallis and Futuna</option>
                        <option value="EH">Western Sahara</option>
                        <option value="YE">Yemen</option>
                        <option value="ZM">Zambia</option>
                        <option value="ZW">Zimbabwe</option>
                        <?php } ?>
                    </select>
                </div>

                <div class="form-group">
                    <label>Devise</label>
                    <select name="currency" class="form-control">
                        <?php if($companyInfo['currency']){ ?>
                             <option value="<?php echo $companyInfo['currency']; ?>"  selected="selected"><?php echo $companyInfo['currency']; ?></option>
                            <option value="TND"  label="Tunisian dinar">TND</option>
                            <option value="USD" label="US dollar">USD</option>
                            <option value="EUR" label="Euro">EUR</option>
                            <option value="JPY" label="Japanese yen">JPY</option>
                            <option value="GBP" label="Pound sterling">GBP</option>
                            <option disabled>──────────</option>
                            <option value="AED" label="United Arab Emirates dirham">AED</option>
                            <option value="AFN" label="Afghan afghani">AFN</option>
                            <option value="ALL" label="Albanian lek">ALL</option>
                            <option value="AMD" label="Armenian dram">AMD</option>
                            <option value="ANG" label="Netherlands Antillean guilder">ANG</option>
                            <option value="AOA" label="Angolan kwanza">AOA</option>
                            <option value="ARS" label="Argentine peso">ARS</option>
                            <option value="AUD" label="Australian dollar">AUD</option>
                            <option value="AWG" label="Aruban florin">AWG</option>
                            <option value="AZN" label="Azerbaijani manat">AZN</option>
                            <option value="BAM" label="Bosnia and Herzegovina convertible mark">BAM</option>
                            <option value="BBD" label="Barbadian dollar">BBD</option>
                            <option value="BDT" label="Bangladeshi taka">BDT</option>
                            <option value="BGN" label="Bulgarian lev">BGN</option>
                            <option value="BHD" label="Bahraini dinar">BHD</option>
                            <option value="BIF" label="Burundian franc">BIF</option>
                            <option value="BMD" label="Bermudian dollar">BMD</option>
                            <option value="BND" label="Brunei dollar">BND</option>
                            <option value="BOB" label="Bolivian boliviano">BOB</option>
                            <option value="BRL" label="Brazilian real">BRL</option>
                            <option value="BSD" label="Bahamian dollar">BSD</option>
                            <option value="BTN" label="Bhutanese ngultrum">BTN</option>
                            <option value="BWP" label="Botswana pula">BWP</option>
                            <option value="BYN" label="Belarusian ruble">BYN</option>
                            <option value="BZD" label="Belize dollar">BZD</option>
                            <option value="CAD" label="Canadian dollar">CAD</option>
                            <option value="CDF" label="Congolese franc">CDF</option>
                            <option value="CHF" label="Swiss franc">CHF</option>
                            <option value="CLP" label="Chilean peso">CLP</option>
                            <option value="CNY" label="Chinese yuan">CNY</option>
                            <option value="COP" label="Colombian peso">COP</option>
                            <option value="CRC" label="Costa Rican colón">CRC</option>
                            <option value="CUC" label="Cuban convertible peso">CUC</option>
                            <option value="CUP" label="Cuban peso">CUP</option>
                            <option value="CVE" label="Cape Verdean escudo">CVE</option>
                            <option value="CZK" label="Czech koruna">CZK</option>
                            <option value="DJF" label="Djiboutian franc">DJF</option>
                            <option value="DKK" label="Danish krone">DKK</option>
                            <option value="DOP" label="Dominican peso">DOP</option>
                            <option value="DZD" label="Algerian dinar">DZD</option>
                            <option value="EGP" label="Egyptian pound">EGP</option>
                            <option value="ERN" label="Eritrean nakfa">ERN</option>
                            <option value="ETB" label="Ethiopian birr">ETB</option>
                            <option value="EUR" label="EURO">EUR</option>
                            <option value="FJD" label="Fijian dollar">FJD</option>
                            <option value="FKP" label="Falkland Islands pound">FKP</option>
                            <option value="GBP" label="British pound">GBP</option>
                            <option value="GEL" label="Georgian lari">GEL</option>
                            <option value="GGP" label="Guernsey pound">GGP</option>
                            <option value="GHS" label="Ghanaian cedi">GHS</option>
                            <option value="GIP" label="Gibraltar pound">GIP</option>
                            <option value="GMD" label="Gambian dalasi">GMD</option>
                            <option value="GNF" label="Guinean franc">GNF</option>
                            <option value="GTQ" label="Guatemalan quetzal">GTQ</option>
                            <option value="GYD" label="Guyanese dollar">GYD</option>
                            <option value="HKD" label="Hong Kong dollar">HKD</option>
                            <option value="HNL" label="Honduran lempira">HNL</option>
                            <option value="HKD" label="Hong Kong dollar">HKD</option>
                            <option value="HRK" label="Croatian kuna">HRK</option>
                            <option value="HTG" label="Haitian gourde">HTG</option>
                            <option value="HUF" label="Hungarian forint">HUF</option>
                            <option value="IDR" label="Indonesian rupiah">IDR</option>
                            <option value="ILS" label="Israeli new shekel">ILS</option>
                            <option value="IMP" label="Manx pound">IMP</option>
                            <option value="INR" label="Indian rupee">INR</option>
                            <option value="IQD" label="Iraqi dinar">IQD</option>
                            <option value="IRR" label="Iranian rial">IRR</option>
                            <option value="ISK" label="Icelandic króna">ISK</option>
                            <option value="JEP" label="Jersey pound">JEP</option>
                            <option value="JMD" label="Jamaican dollar">JMD</option>
                            <option value="JOD" label="Jordanian dinar">JOD</option>
                            <option value="JPY" label="Japanese yen">JPY</option>
                            <option value="KES" label="Kenyan shilling">KES</option>
                            <option value="KGS" label="Kyrgyzstani som">KGS</option>
                            <option value="KHR" label="Cambodian riel">KHR</option>
                            <option value="KID" label="Kiribati dollar">KID</option>
                            <option value="KMF" label="Comorian franc">KMF</option>
                            <option value="KPW" label="North Korean won">KPW</option>
                            <option value="KRW" label="South Korean won">KRW</option>
                            <option value="KWD" label="Kuwaiti dinar">KWD</option>
                            <option value="KYD" label="Cayman Islands dollar">KYD</option>
                            <option value="KZT" label="Kazakhstani tenge">KZT</option>
                            <option value="LAK" label="Lao kip">LAK</option>
                            <option value="LBP" label="Lebanese pound">LBP</option>
                            <option value="LKR" label="Sri Lankan rupee">LKR</option>
                            <option value="LRD" label="Liberian dollar">LRD</option>
                            <option value="LSL" label="Lesotho loti">LSL</option>
                            <option value="LYD" label="Libyan dinar">LYD</option>
                            <option value="MAD" label="Moroccan dirham">MAD</option>
                            <option value="MDL" label="Moldovan leu">MDL</option>
                            <option value="MGA" label="Malagasy ariary">MGA</option>
                            <option value="MKD" label="Macedonian denar">MKD</option>
                            <option value="MMK" label="Burmese kyat">MMK</option>
                            <option value="MNT" label="Mongolian tögrög">MNT</option>
                            <option value="MOP" label="Macanese pataca">MOP</option>
                            <option value="MRU" label="Mauritanian ouguiya">MRU</option>
                            <option value="MUR" label="Mauritian rupee">MUR</option>
                            <option value="MVR" label="Maldivian rufiyaa">MVR</option>
                            <option value="MWK" label="Malawian kwacha">MWK</option>
                            <option value="MXN" label="Mexican peso">MXN</option>
                            <option value="MYR" label="Malaysian ringgit">MYR</option>
                            <option value="MZN" label="Mozambican metical">MZN</option>
                            <option value="NAD" label="Namibian dollar">NAD</option>
                            <option value="NGN" label="Nigerian naira">NGN</option>
                            <option value="NIO" label="Nicaraguan córdoba">NIO</option>
                            <option value="NOK" label="Norwegian krone">NOK</option>
                            <option value="NPR" label="Nepalese rupee">NPR</option>
                            <option value="NZD" label="New Zealand dollar">NZD</option>
                            <option value="OMR" label="Omani rial">OMR</option>
                            <option value="PAB" label="Panamanian balboa">PAB</option>
                            <option value="PEN" label="Peruvian sol">PEN</option>
                            <option value="PGK" label="Papua New Guinean kina">PGK</option>
                            <option value="PHP" label="Philippine peso">PHP</option>
                            <option value="PKR" label="Pakistani rupee">PKR</option>
                            <option value="PLN" label="Polish złoty">PLN</option>
                            <option value="PRB" label="Transnistrian ruble">PRB</option>
                            <option value="PYG" label="Paraguayan guaraní">PYG</option>
                            <option value="QAR" label="Qatari riyal">QAR</option>
                            <option value="RON" label="Romanian leu">RON</option>
                            <option value="RON" label="Romanian leu">RON</option>
                            <option value="RSD" label="Serbian dinar">RSD</option>
                            <option value="RUB" label="Russian ruble">RUB</option>
                            <option value="RWF" label="Rwandan franc">RWF</option>
                            <option value="SAR" label="Saudi riyal">SAR</option>
                            <option value="SEK" label="Swedish krona">SEK</option>
                            <option value="SGD" label="Singapore dollar">SGD</option>
                            <option value="SHP" label="Saint Helena pound">SHP</option>
                            <option value="SLL" label="Sierra Leonean leone">SLL</option>
                            <option value="SLS" label="Somaliland shilling">SLS</option>
                            <option value="SOS" label="Somali shilling">SOS</option>
                            <option value="SRD" label="Surinamese dollar">SRD</option>
                            <option value="SSP" label="South Sudanese pound">SSP</option>
                            <option value="STN" label="São Tomé and Príncipe dobra">STN</option>
                            <option value="SYP" label="Syrian pound">SYP</option>
                            <option value="SZL" label="Swazi lilangeni">SZL</option>
                            <option value="THB" label="Thai baht">THB</option>
                            <option value="TJS" label="Tajikistani somoni">TJS</option>
                            <option value="TMT" label="Turkmenistan manat">TMT</option>
                            <option value="TOP" label="Tongan paʻanga">TOP</option>
                            <option value="TRY" label="Turkish lira">TRY</option>
                            <option value="TTD" label="Trinidad and Tobago dollar">TTD</option>
                            <option value="TVD" label="Tuvaluan dollar">TVD</option>
                            <option value="TWD" label="New Taiwan dollar">TWD</option>
                            <option value="TZS" label="Tanzanian shilling">TZS</option>
                            <option value="UAH" label="Ukrainian hryvnia">UAH</option>
                            <option value="UGX" label="Ugandan shilling">UGX</option>
                            <option value="UYU" label="Uruguayan peso">UYU</option>
                            <option value="UZS" label="Uzbekistani soʻm">UZS</option>
                            <option value="VES" label="Venezuelan bolívar soberano">VES</option>
                            <option value="VND" label="Vietnamese đồng">VND</option>
                            <option value="VUV" label="Vanuatu vatu">VUV</option>
                            <option value="WST" label="Samoan tālā">WST</option>
                            <option value="XAF" label="Central African CFA franc">XAF</option>
                            <option value="XCD" label="Eastern Caribbean dollar">XCD</option>
                            <option value="XOF" label="West African CFA franc">XOF</option>
                            <option value="XPF" label="CFP franc">XPF</option>
                            <option value="ZAR" label="South African rand">ZAR</option>
                            <option value="ZMW" label="Zambian kwacha">ZMW</option>
                            <option value="ZWB" label="Zimbabwean bonds">ZWB</option>





                        <?php }else { ?>
                        <option value="TND"  label="Tunisian dinar" selected="selected">TND</option>
                        <option value="USD" label="US dollar">USD</option>
                        <option value="EUR" label="Euro">EUR</option>
                        <option value="JPY" label="Japanese yen">JPY</option>
                        <option value="GBP" label="Pound sterling">GBP</option>
                        <option disabled>──────────</option>
                        <option value="AED" label="United Arab Emirates dirham">AED</option>
                        <option value="AFN" label="Afghan afghani">AFN</option>
                        <option value="ALL" label="Albanian lek">ALL</option>
                        <option value="AMD" label="Armenian dram">AMD</option>
                        <option value="ANG" label="Netherlands Antillean guilder">ANG</option>
                        <option value="AOA" label="Angolan kwanza">AOA</option>
                        <option value="ARS" label="Argentine peso">ARS</option>
                        <option value="AUD" label="Australian dollar">AUD</option>
                        <option value="AWG" label="Aruban florin">AWG</option>
                        <option value="AZN" label="Azerbaijani manat">AZN</option>
                        <option value="BAM" label="Bosnia and Herzegovina convertible mark">BAM</option>
                        <option value="BBD" label="Barbadian dollar">BBD</option>
                        <option value="BDT" label="Bangladeshi taka">BDT</option>
                        <option value="BGN" label="Bulgarian lev">BGN</option>
                        <option value="BHD" label="Bahraini dinar">BHD</option>
                        <option value="BIF" label="Burundian franc">BIF</option>
                        <option value="BMD" label="Bermudian dollar">BMD</option>
                        <option value="BND" label="Brunei dollar">BND</option>
                        <option value="BOB" label="Bolivian boliviano">BOB</option>
                        <option value="BRL" label="Brazilian real">BRL</option>
                        <option value="BSD" label="Bahamian dollar">BSD</option>
                        <option value="BTN" label="Bhutanese ngultrum">BTN</option>
                        <option value="BWP" label="Botswana pula">BWP</option>
                        <option value="BYN" label="Belarusian ruble">BYN</option>
                        <option value="BZD" label="Belize dollar">BZD</option>
                        <option value="CAD" label="Canadian dollar">CAD</option>
                        <option value="CDF" label="Congolese franc">CDF</option>
                        <option value="CHF" label="Swiss franc">CHF</option>
                        <option value="CLP" label="Chilean peso">CLP</option>
                        <option value="CNY" label="Chinese yuan">CNY</option>
                        <option value="COP" label="Colombian peso">COP</option>
                        <option value="CRC" label="Costa Rican colón">CRC</option>
                        <option value="CUC" label="Cuban convertible peso">CUC</option>
                        <option value="CUP" label="Cuban peso">CUP</option>
                        <option value="CVE" label="Cape Verdean escudo">CVE</option>
                        <option value="CZK" label="Czech koruna">CZK</option>
                        <option value="DJF" label="Djiboutian franc">DJF</option>
                        <option value="DKK" label="Danish krone">DKK</option>
                        <option value="DOP" label="Dominican peso">DOP</option>
                        <option value="DZD" label="Algerian dinar">DZD</option>
                        <option value="EGP" label="Egyptian pound">EGP</option>
                        <option value="ERN" label="Eritrean nakfa">ERN</option>
                        <option value="ETB" label="Ethiopian birr">ETB</option>
                        <option value="EUR" label="EURO">EUR</option>
                        <option value="FJD" label="Fijian dollar">FJD</option>
                        <option value="FKP" label="Falkland Islands pound">FKP</option>
                        <option value="GBP" label="British pound">GBP</option>
                        <option value="GEL" label="Georgian lari">GEL</option>
                        <option value="GGP" label="Guernsey pound">GGP</option>
                        <option value="GHS" label="Ghanaian cedi">GHS</option>
                        <option value="GIP" label="Gibraltar pound">GIP</option>
                        <option value="GMD" label="Gambian dalasi">GMD</option>
                        <option value="GNF" label="Guinean franc">GNF</option>
                        <option value="GTQ" label="Guatemalan quetzal">GTQ</option>
                        <option value="GYD" label="Guyanese dollar">GYD</option>
                        <option value="HKD" label="Hong Kong dollar">HKD</option>
                        <option value="HNL" label="Honduran lempira">HNL</option>
                        <option value="HKD" label="Hong Kong dollar">HKD</option>
                        <option value="HRK" label="Croatian kuna">HRK</option>
                        <option value="HTG" label="Haitian gourde">HTG</option>
                        <option value="HUF" label="Hungarian forint">HUF</option>
                        <option value="IDR" label="Indonesian rupiah">IDR</option>
                        <option value="ILS" label="Israeli new shekel">ILS</option>
                        <option value="IMP" label="Manx pound">IMP</option>
                        <option value="INR" label="Indian rupee">INR</option>
                        <option value="IQD" label="Iraqi dinar">IQD</option>
                        <option value="IRR" label="Iranian rial">IRR</option>
                        <option value="ISK" label="Icelandic króna">ISK</option>
                        <option value="JEP" label="Jersey pound">JEP</option>
                        <option value="JMD" label="Jamaican dollar">JMD</option>
                        <option value="JOD" label="Jordanian dinar">JOD</option>
                        <option value="JPY" label="Japanese yen">JPY</option>
                        <option value="KES" label="Kenyan shilling">KES</option>
                        <option value="KGS" label="Kyrgyzstani som">KGS</option>
                        <option value="KHR" label="Cambodian riel">KHR</option>
                        <option value="KID" label="Kiribati dollar">KID</option>
                        <option value="KMF" label="Comorian franc">KMF</option>
                        <option value="KPW" label="North Korean won">KPW</option>
                        <option value="KRW" label="South Korean won">KRW</option>
                        <option value="KWD" label="Kuwaiti dinar">KWD</option>
                        <option value="KYD" label="Cayman Islands dollar">KYD</option>
                        <option value="KZT" label="Kazakhstani tenge">KZT</option>
                        <option value="LAK" label="Lao kip">LAK</option>
                        <option value="LBP" label="Lebanese pound">LBP</option>
                        <option value="LKR" label="Sri Lankan rupee">LKR</option>
                        <option value="LRD" label="Liberian dollar">LRD</option>
                        <option value="LSL" label="Lesotho loti">LSL</option>
                        <option value="LYD" label="Libyan dinar">LYD</option>
                        <option value="MAD" label="Moroccan dirham">MAD</option>
                        <option value="MDL" label="Moldovan leu">MDL</option>
                        <option value="MGA" label="Malagasy ariary">MGA</option>
                        <option value="MKD" label="Macedonian denar">MKD</option>
                        <option value="MMK" label="Burmese kyat">MMK</option>
                        <option value="MNT" label="Mongolian tögrög">MNT</option>
                        <option value="MOP" label="Macanese pataca">MOP</option>
                        <option value="MRU" label="Mauritanian ouguiya">MRU</option>
                        <option value="MUR" label="Mauritian rupee">MUR</option>
                        <option value="MVR" label="Maldivian rufiyaa">MVR</option>
                        <option value="MWK" label="Malawian kwacha">MWK</option>
                        <option value="MXN" label="Mexican peso">MXN</option>
                        <option value="MYR" label="Malaysian ringgit">MYR</option>
                        <option value="MZN" label="Mozambican metical">MZN</option>
                        <option value="NAD" label="Namibian dollar">NAD</option>
                        <option value="NGN" label="Nigerian naira">NGN</option>
                        <option value="NIO" label="Nicaraguan córdoba">NIO</option>
                        <option value="NOK" label="Norwegian krone">NOK</option>
                        <option value="NPR" label="Nepalese rupee">NPR</option>
                        <option value="NZD" label="New Zealand dollar">NZD</option>
                        <option value="OMR" label="Omani rial">OMR</option>
                        <option value="PAB" label="Panamanian balboa">PAB</option>
                        <option value="PEN" label="Peruvian sol">PEN</option>
                        <option value="PGK" label="Papua New Guinean kina">PGK</option>
                        <option value="PHP" label="Philippine peso">PHP</option>
                        <option value="PKR" label="Pakistani rupee">PKR</option>
                        <option value="PLN" label="Polish złoty">PLN</option>
                        <option value="PRB" label="Transnistrian ruble">PRB</option>
                        <option value="PYG" label="Paraguayan guaraní">PYG</option>
                        <option value="QAR" label="Qatari riyal">QAR</option>
                        <option value="RON" label="Romanian leu">RON</option>
                        <option value="RON" label="Romanian leu">RON</option>
                        <option value="RSD" label="Serbian dinar">RSD</option>
                        <option value="RUB" label="Russian ruble">RUB</option>
                        <option value="RWF" label="Rwandan franc">RWF</option>
                        <option value="SAR" label="Saudi riyal">SAR</option>
                        <option value="SEK" label="Swedish krona">SEK</option>
                        <option value="SGD" label="Singapore dollar">SGD</option>
                        <option value="SHP" label="Saint Helena pound">SHP</option>
                        <option value="SLL" label="Sierra Leonean leone">SLL</option>
                        <option value="SLS" label="Somaliland shilling">SLS</option>
                        <option value="SOS" label="Somali shilling">SOS</option>
                        <option value="SRD" label="Surinamese dollar">SRD</option>
                        <option value="SSP" label="South Sudanese pound">SSP</option>
                        <option value="STN" label="São Tomé and Príncipe dobra">STN</option>
                        <option value="SYP" label="Syrian pound">SYP</option>
                        <option value="SZL" label="Swazi lilangeni">SZL</option>
                        <option value="THB" label="Thai baht">THB</option>
                        <option value="TJS" label="Tajikistani somoni">TJS</option>
                        <option value="TMT" label="Turkmenistan manat">TMT</option>
                        <option value="TOP" label="Tongan paʻanga">TOP</option>
                        <option value="TRY" label="Turkish lira">TRY</option>
                        <option value="TTD" label="Trinidad and Tobago dollar">TTD</option>
                        <option value="TVD" label="Tuvaluan dollar">TVD</option>
                        <option value="TWD" label="New Taiwan dollar">TWD</option>
                        <option value="TZS" label="Tanzanian shilling">TZS</option>
                        <option value="UAH" label="Ukrainian hryvnia">UAH</option>
                        <option value="UGX" label="Ugandan shilling">UGX</option>
                        <option value="UYU" label="Uruguayan peso">UYU</option>
                        <option value="UZS" label="Uzbekistani soʻm">UZS</option>
                        <option value="VES" label="Venezuelan bolívar soberano">VES</option>
                        <option value="VND" label="Vietnamese đồng">VND</option>
                        <option value="VUV" label="Vanuatu vatu">VUV</option>
                        <option value="WST" label="Samoan tālā">WST</option>
                        <option value="XAF" label="Central African CFA franc">XAF</option>
                        <option value="XCD" label="Eastern Caribbean dollar">XCD</option>
                        <option value="XOF" label="West African CFA franc">XOF</option>
                        <option value="XPF" label="CFP franc">XPF</option>
                        <option value="ZAR" label="South African rand">ZAR</option>
                        <option value="ZMW" label="Zambian kwacha">ZMW</option>
                        <option value="ZWB" label="Zimbabwean bonds">ZWB</option>
                        <?php } ?>
                    </select>
                </div>

                <button type="submit" name="insert_CompanyInfo" class="btn btn-success btn-lg btn-block">Modifier</button>
            </form>
        </div>

    </div>
</div>

<!-- ============================================================== -->
<!-- end login page  -->
<!-- ============================================================== -->
<?php include '../includes/footer.inc.php'; ?>