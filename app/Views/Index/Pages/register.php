<?= $this->extend('/Index/Components/main-layout'); ?>
<?= $this->section('content'); ?>

<?php
if ($usertype == 1) {
    $title = 'Admin';
} else if ($usertype == 2) {
    $title = 'Employee';
}
?>

<div class="card my-5">
    <div class="card-body">
        <form action="/MainController/Registration" method="post" id="regsiter-form">
            <div class="text-center">
                <h1 class="text-center"><?= $title ?> Registration</h1>
                <p class="mb-4">Fill in the form to register</p>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="mb-3">
                        <label class="form-label">First name</label>
                        <input type="text" class="form-control text-uppercase <?= isset($validation) && $validation->hasError('reg_firstname') ? 'is-invalid' : '' ?>" placeholder="First name" id="firstname" name="reg_firstname" value="<?= isset($oldinput) ? $oldinput['reg_firstname'] : '' ?>" />

                        <!-- [ Error Message ] -->
                        <?php if (isset($validation) && $validation->hasError('reg_firstname')): ?>
                            <div class="invalid-feedback"><?= $validation->getError('reg_firstname') ?></div>
                        <?php endif; ?>
                    </div>
                </div>


                <div class="col-sm-12">
                    <div class="mb-3">
                        <label class="form-label">Middle name</label>
                        <input type="text" class="form-control text-uppercase <?= isset($validation) && $validation->hasError('reg_middlename') ? 'is-invalid' : '' ?>" placeholder="Middle name" id="middlename" name="reg_middlename" value="<?= isset($oldinput) ? $oldinput['reg_middlename'] : '' ?>" />

                        <!-- [ Error Message ] -->
                        <?php if (isset($validation) && $validation->hasError('reg_middlename')): ?>
                            <div class="invalid-feedback"><?= $validation->getError('reg_middlename') ?></div>
                        <?php endif; ?>
                    </div>
                </div>


                <div class="col-sm-8">
                    <div class="mb-3">
                        <label class="form-label">Last name</label>
                        <input type="text" class="form-control text-uppercase <?= isset($validation) && $validation->hasError('reg_lastname') ? 'is-invalid' : '' ?>" placeholder="Last name" id="lastname" name="reg_lastname" value="<?= isset($oldinput) ? $oldinput['reg_lastname'] : '' ?>" />

                        <!-- [ Error Message ] -->
                        <?php if (isset($validation) && $validation->hasError('reg_lastname')): ?>
                            <div class="invalid-feedback"><?= $validation->getError('reg_lastname') ?></div>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="mb-3">
                        <label class="form-label">Extension name</label>
                        <select name="reg_extension" id="extension" class="form-control">
                            <option value="">N/A</option>
                            <option value="Jr.">Jr.</option>
                            <option value="Sr.">Sr.</option>
                            <option value="III">III</option>
                            <option value="IV">IV</option>
                        </select>
                    </div>
                </div>

                <div class="col-12">
                    <div class="mb-3">
                        <label class="form-label">Department</label>
                        <select class="form-select <?= isset($validation) && $validation->hasError('reg_department') ? 'is-invalid' : '' ?>" name="reg_department">
                            <option value="">Select Department</option>
                            <?php foreach ($departments as $department): ?>
                                <option value="<?= $department['department_id'] ?>" <?= (isset($oldinput) && $oldinput['reg_department'] == $department['department_id']) ? 'selected' : '' ?>>
                                    <?= $department['department_name'] ?>
                                </option>
                            <?php endforeach; ?>
                        </select>

                        <!-- [ Error Message ] -->
                        <?php if (isset($validation) && $validation->hasError('reg_department')): ?>
                            <div class="invalid-feedback"><?= $validation->getError('reg_department') ?></div>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="col-12">
                    <div class="mb-3">
                        <label class="form-label">Employee Type</label>
                        <select class="form-select <?= isset($validation) && $validation->hasError('reg_employeetype') ? 'is-invalid' : '' ?>" name="reg_employeetype">
                            <option value="">Select Employee Type</option>
                            <?php foreach ($employeetypes as $employeetype): ?>
                                <option value="<?= $employeetype['employee_type_id'] ?>" <?= (isset($oldinput) && $oldinput['reg_employeetype'] == $employeetype['employee_type_id']) ? 'selected' : '' ?>>
                                    <?= $employeetype['employee_type_name'] ?>
                                </option>
                            <?php endforeach; ?>
                        </select>

                        <!-- [ Error Message ] -->
                        <?php if (isset($validation) && $validation->hasError('reg_employeetype')): ?>
                            <div class="invalid-feedback"><?= $validation->getError('reg_employeetype') ?></div>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="col-12">
                    <div class="mb-3">
                        <label for="plntl-select" class="form-label">Plantilla</label>
                        <select id="plntl-select" class="form-select <?= isset($validation) && $validation->hasError('reg_plantilla') ? 'is-invalid' : '' ?>" name="reg_plantilla">
                            <option value="">Select Plantilla</option>
                            <?php foreach ($plantillas as $plantilla): ?>
                                <option value="<?= $plantilla['plantilla_id'] ?>" <?= (isset($oldinput) && $oldinput['reg_plantilla'] == $plantilla['plantilla_id']) ? 'selected' : '' ?> data-plantilla-code="<?= $plantilla['plantilla_titlecode'] ?>">
                                    <?= $plantilla['plantilla_title'] ?>
                                </option>
                            <?php endforeach; ?>
                        </select>

                        <!-- [ Error Message ] -->
                        <?php if (isset($validation) && $validation->hasError('reg_plantilla')): ?>
                            <div class="invalid-feedback"><?= $validation->getError('reg_plantilla') ?></div>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="col-12">
                    <div class="mb-3">
                        <label class="form-label">Employee ID Number</label>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-text" id="idnumber-text"></span>
                                <input type="text" class="form-control <?= isset($validation) && $validation->hasError('reg_idnumber') || isset($errorid) && !empty($errorid) ? 'is-invalid' : '' ?>" placeholder="00-0000" id="idnumber" name="reg_idnumber" value="<?= isset($oldinput) ? $oldinput['reg_idnumber'] : '' ?>" />

                                <!-- [ Error Message ] -->
                                <?php if (isset($validation) && $validation->hasError('reg_idnumber')): ?>
                                    <div class="invalid-feedback"><?= $validation->getError('reg_idnumber') ?></div>
                                <?php endif; ?>

                                <?php if (isset($errorid) && !empty($errorid)): ?>
                                    <div class="invalid-feedback"><?= $errorid ?></div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- [ Hidden Input ] -->
                <input type="hidden" id="idnumber-hidden" name="reg_fullidnumber" />

                <div class="col-12">
                    <div class="mb-3">
                        <label class="form-label">Email Address</label>
                        <input type="text" class="form-control <?= isset($validation) && $validation->hasError('reg_email') ? 'is-invalid' : '' ?>" placeholder="Email Address" id="email" name="reg_email" value="<?= isset($oldinput) ? $oldinput['reg_email'] : '' ?>" />

                        <!-- [ Error Message ] -->
                        <?php if (isset($validation) && $validation->hasError('reg_email')): ?>
                            <div class="invalid-feedback"><?= $validation->getError('reg_email') ?></div>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="col-12">
                    <div class="mb-1">
                        <label class="form-label" for="rgstr-pw">Password</label>
                        <input type="password" id="rgstr-pw" class="form-control <?= isset($validation) && $validation->hasError('reg_password') ? 'is-invalid' : '' ?>" placeholder="Password" id="password" name="reg_password" value="<?= isset($oldinput) ? $oldinput['reg_password'] : '' ?>" />

                        <!-- [ Error Message ] -->
                        <?php if (isset($validation) && $validation->hasError('reg_password')): ?>
                            <div class="invalid-feedback"><?= $validation->getError('reg_password') ?></div>
                        <?php endif; ?>
                    </div>

                    <div class="mb-3 text-sm">
                        <div class="form-check m-0">
                            <label class="label" for="reg-show-password">Show password</label>
                            <input class="form-check-input" type="checkbox" id="reg-show-password">
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="mb-1">
                        <label class="form-label" for="rgstr-cpw">Confirm Password</label>
                        <input type="password" id="rgstr-cpw" class="form-control <?= isset($validation) && $validation->hasError('reg_confirmpassword') ? 'is-invalid' : '' ?>" placeholder="Confirm Password " id="confirmpassword" name="reg_confirmpassword" value="<?= isset($oldinput) ? $oldinput['reg_confirmpassword'] : '' ?>" onpaste="return false;" />

                        <!-- [ Error Message ] -->
                        <?php if (isset($validation) && $validation->hasError('reg_confirmpassword')): ?>
                            <div class="invalid-feedback"><?= $validation->getError('reg_confirmpassword') ?></div>
                        <?php endif; ?>
                    </div>

                    <div class="mb-3 text-sm">
                        <div class="form-check m-0">
                            <label class="label" for="reg-show-confirmpassword">Show confirm password</label>
                            <input class="form-check-input" type="checkbox" id="reg-show-confirmpassword">
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="form-check mb-2 d-flex justify-content-center align-items-center">
                    <input class="form-check-input" type="checkbox" id="agree" required>
                    <label class="form-check-label ms-2" for="agree"> I Agree to the <a href="#" data-bs-toggle="modal" data-bs-target="#termsModal">Terms and Condition</a> </label>
                </div>
            </div>

            <input type="hidden" name="reg_usertype" value="<?= $usertype ?>">

            <div class="col-12">
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary" id="submit">Register</button>
                </div>
            </div>
        </form>

        <form action="/MainController/Login/<?= $usertype ?>" method="post">
            <input type="hidden" name="log_usertype" value="<?= $usertype ?>">
            <p class="mt-3 w-100 text-center">
                Already have an account?
                <button type="submit" class="border-0 bg-transparent text-primary p-0">Login Now</button>
            </p>
        </form>
    </div>
</div>

<div id="termsModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Terms and Condition</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body py-0">
                <p class="mt-0">
                <h5 class="text-center">
                    DIGITAL TRANSFORMATION OF TECHNOLOGICAL UNIVERSITY OF THE PHILIPPINES – TAGUIG EMPLOYEE RECORDS SYSTEM WITH API ENABLEMENT
                </h5>

                <h6 class="text-center mb-3">
                    Terms and Conditions Data Privacy Act of 2012 (RA 10173)
                </h6>

                This Terms and Conditions statement is issued in compliance with Republic Act No. 10173, otherwise known as the Data Privacy Act of 2012, its implementing Rules and Regulations (IRR), and other relevant issuances of the National Privacy Commission (NPC). By accessing, using, or engaging with the services, I <strong id="modal-name"></strong> acknowledge and agree to the following:

                <br><br>

                <ol type="1">
                    <li class="mb-3">
                        <h5>Legal Basis for Data Processing</h5>
                        All personal data collected, stored, and processed by our organization shall be done so in accordance with the principles of Transparency, legitimate purpose, and proportionality, as mandated by the Data Privacy Act. The lawful bases for processing personal data include:
                        The explicit consent of the data subject;
                        Compliance with legal obligations;
                        Performance of a contract or legitimate business interest; and
                        Protection of vital interests of the data subject or another individual.

                        <ol type="a">
                            <li>The explicit consent of the data subject;</li>
                            <li>Compliance with legal obligations;</li>
                            <li>Performance of a contract or legitimate business interest; and</li>
                            <li>Protection of vital interests of the data subject or another individual.</li>
                        </ol>
                    </li>

                    <li class="mb-3">
                        <h5>Rights of Data Subjects</h5>
                        Pursuant to Section 16 of the Data Privacy Act, data subject shall have the following rights:

                        <ol type="a">
                            <li>Right to be informed – The employee shall be informed of the purpose and extent of personal data collection</li>
                            <li>Right to Object – The employee may withdraw consent or refuse processing under certain circumstances</li>
                            <li>Right to Access – The employee has right to request a copy of the personal data collected</li>
                            <li>Right to Rectification – The employee may request corrections to inaccurate or incomplete data</li>
                            <li>Right to Erasure or Blocking – The employee may request the removal of personal data that is unlawfully obtained or no longer necessary</li>
                            <li>Right to Data Portability – The employee may obtain and reuse the personal data for any legal purposes.</li>
                            <li>Right to File a Complaint – The employee may lodge complaints with the National Privacy Commission (NPC) for any violations of data privacy rights.</li>
                        </ol>
                    </li>

                    <li class="mb-3">
                        <h5>Data Collection, Processing, and Storage</h5>
                        <ol type="a">
                            <li>Personal data shall NOT be shared with any unauthorized third part without the explicit consent of the data subject, unless required by law, judicial order, or regulatory authorities.</li>
                            <li>If data sharing is necessary, Data Processing Agreements (DPAs) shall be executed to ensure compliance with data privacy standards.</li>
                        </ol>
                    </li>

                    <li class="mb-3">
                        <h5>Security Measures and Breach Notification</h5>
                        <ol type="a">
                            <li>Appropriate organizational, physical, and technical measures shall be implemented to safeguard personal data.</li>
                            <li>Safeguards to protect its computer network against accidental, unlawful or unauthorized usage or interference with or hindering of their functioning or availability</li>
                            <li>A process for identifying and accessing reasonably foreseeable vulnerabilities in its computer networks, and for taking preventive, corrective and mitigating action against security incidents that can lead to a security breach; and</li>
                            <li>In the event of a data breach, affected data subject and the National Privacy Commission (NPC) shall be notified within the prescribed period, in compliance with data breach reporting requirements.</li>
                        </ol>
                    </li>

                    <li class="mb-3">
                        <h5>Security of Sensitive Personal Information in Government</h5>
                        <ol type="a">
                            All sensitive personal information maintained by the government, its agencies and instrumentalities shall be secured, as far as practicable, with the use of the most appropriate standard recognized by the information and communications technology industry, and as recommended by the Commission. The head of each government agency or instrumentality shall be responsible for complying with the security requirements mentioned herein while the Commission shall monitor the compliance and may recommend the necessary action in order to satisfy the minimum standards.
                        </ol>
                    </li>

                    <li class="mb-3">
                        <h5>Policy Updates and Legal Compliance</h5>
                        <ol type="a">
                            <li>This Terms and Conditions statement shall be reviewed periodically to align with amendments in privacy laws and regulatory policies.</li>
                            <li>Any material changes to our data privacy practices shall be communicated through official channels</li>
                        </ol>
                    </li>
                </ol>

                By continuing to use the services, I affirm that I have read, understood, and agreed to the terms set forth herein.
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="modal-agree" data-bs-dismiss="modal">Agree</button>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const plantillaSelect = document.getElementById('plntl-select');
        const idnumberHidden = document.getElementById('idnumber-hidden');
        const idnumberText = document.getElementById('idnumber-text');
        const idnumberInput = document.getElementById('idnumber');

        function updateIdNumberDisplay() {
            const selectedOption = plantillaSelect.options[plantillaSelect.selectedIndex];
            const plantillaCode = selectedOption.dataset.plantillaCode || "";

            idnumberText.textContent = plantillaCode ? `${plantillaCode}-` : "Select Plantilla";

            if (!plantillaCode) {
                idnumberInput.value = "";
            }

            idnumberHidden.value = plantillaCode ? `${plantillaCode}-${idnumberInput.value}` : "";
            idnumberInput.readOnly = !plantillaCode;
        }

        // For idnumber format
        // function formatIdNumberInput(event) {
        //     const plantillaCode = idnumberText.textContent;
        //     let value = idnumberInput.value.replace(/\D/g, ''); // Remove non-numeric characters

        //     if (value.length > 7) value = value.substring(0, 7); // Limit input to 7 digits

        //     if (value.length === 7) {
        //         value = value.substring(0, 3) + '-' + value.substring(3);
        //     } else if (value.length === 6) {
        //         value = value.substring(0, 2) + '-' + value.substring(2);
        //     } else if (value.length > 1) {
        //         value = value.substring(0, 1) + '-' + value.substring(1);
        //     }

        //     idnumberInput.value = value;
        //     idnumberHidden.value = plantillaCode && value ? `${plantillaCode}${value}` : `${plantillaCode}`;
        // }


        // For restrict key
        function restrictInvalidKeys(event) {
            const allowedKeys = ['Backspace', 'Delete', 'ArrowLeft', 'ArrowRight', 'Tab'];
            if (!/[\d-]/.test(event.key) && !allowedKeys.includes(event.key)) {
                event.preventDefault();
            }
        }

        updateIdNumberDisplay();

        plantillaSelect.addEventListener('change', updateIdNumberDisplay);
        // idnumberInput.addEventListener('input', formatIdNumberInput);
        idnumberInput.addEventListener('keydown', restrictInvalidKeys);



        // Terms and Condition
        const btnAgree = document.getElementById('modal-agree');
        const checkAgree = document.getElementById('agree');
        const textName = document.getElementById('modal-name');
        const fname = document.getElementById('firstname');
        const lname = document.getElementById('lastname');

        btnAgree.addEventListener('click', function () {
            checkAgree.checked = true;
        });

        function updateModalName() {
            textName.textContent = fname.value + ' ' + lname.value;
        }

        fname.addEventListener('input', updateModalName);
        lname.addEventListener('input', updateModalName);
    });

    // [ Password ]
    document.getElementById('reg-show-password').addEventListener('change', function () {
        const passwordField = document.getElementById('rgstr-pw');
        passwordField.type = this.checked ? 'text' : 'password';
    });

    document.getElementById('reg-show-confirmpassword').addEventListener('change', function () {
        const passwordField = document.getElementById('rgstr-cpw');
        passwordField.type = this.checked ? 'text' : 'password';
    });
</script>


<?= $this->endSection(); ?>