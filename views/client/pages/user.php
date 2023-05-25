<?php
    $stmt = $pdo->prepare("SELECT * FROM `account` WHERE account_id=:accId");
    $stmt->execute(array(':accId' => $_SESSION['account_id']));
    $acc = $stmt->fetch(PDO::FETCH_ASSOC);

    $stmt = $pdo->prepare("SELECT COUNT(*) AS studyset FROM account_study_set 
                        WHERE type = 'OWNED' AND active = 1 AND owner_id=:ownerId GROUP BY owner_id");
    $stmt->execute(array(':ownerId' => $_SESSION['account_id']));
    $studySet = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<link rel="stylesheet" href="assets/css/user.css">

<div class="container">
    <div class="user-main">
        <div class="card mb-5 mb-xl-10">
            <div class="card-body p-9">
                <div class="common">
                    <div class="avatar">
                        <img src="<?= $acc['avatar'] ?>" alt="Avatar" onerror="this.onerror=null; this.src='assets/image/2.png'">
                        <div class="update-ava" data-bs-toggle="modal" data-bs-target="#change-ava">
                            <div data-bs-toggle="tooltip" data-bs-placement="bottom" title="Change image">
                                <i class="fas fa-pen fa-sm"></i>
                            </div>
                        </div>
                    </div>


                    <div class="flex-grow-1">
                        <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
                            <div class="d-flex flex-column">
                                <div class="d-flex align-items-center mb-2">
                                    <span class="user-name"><?= $acc['full_name'] ? $acc['full_name'] : 'User full name' ?></span>
                                    <a class="cursor-pointer">
                                        <span class="svg-icon svg-icon-1 svg-icon-primary">
                                            <img src="assets/image/icons/ic-001.svg" alt="">
                                        </span>
                                    </a>
                                    <a href="#" class="btn btn-sm btn-light-success fs-75 ms-2"> Upgrade to Pro </a>
                                </div>
                                <div class="d-flex fs-7 mb-2 pe-2">
                                    <div class="user-info text-gray-400 me-5 mb-2">
                                        <span class="svg-icon svg-icon-4 me-1">
                                            <img src="assets/image/icons/ic-002.svg" alt="">
                                        </span>
                                        Developer
                                    </div>
                                    <div class="user-info text-gray-400 me-5 mb-2">
                                        <span class="svg-icon svg-icon-4 me-1">
                                            <img src="assets/image/icons/ic-010.svg" alt="">
                                        </span>
                                        <?php 
                                        if ($acc['type'] == 0) {
                                            echo('Student');
                                        } else {
                                            echo('Teacher');
                                        }
                                        ?>
                                    </div>
                                    <div class="user-info text-gray-400 mb-2">
                                        <span class="svg-icon svg-icon-4 me-1">
                                            <img src="assets/image/icons/ic-004.svg" alt="">
                                        </span>
                                        <?= $acc['email'] ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="user-prg-info">
                            <div class="upi-left">
                                <div class="upi-left-content">
                                    <div class="upi-l-c-item">
                                        <div class="d-flex align-items-center">
                                            <div class="fs-6 fw-bolder"><?= $studySet ? $studySet['studyset'] : 0 ?></div>
                                        </div>
                                        <div class="fw-bold fs-75 text-gray-400">Study sets</div>
                                    </div>
                                    <div class="upi-l-c-item">
                                        <div class="d-flex align-items-center">
                                            <div class="fs-6 fw-bolder">75</div>
                                        </div>
                                        <div class="fw-bold fs-75 text-gray-400">Folder</div>
                                    </div>
                                    <div class="upi-l-c-item">
                                        <div class="d-flex align-items-center">
                                            <div class="fs-6 fw-bolder">60</div>
                                        </div>
                                        <div class="fw-bold fs-75 text-gray-400">Class</div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex align-items-center flex-column mt-3" style="width: 300px;">
                                <div class="d-flex justify-content-between w-100 mt-auto mb-2">
                                    <span class="fw-bold fs-7 text-gray-400">Profile Compleation</span>
                                    <span class="fw-bolder fs-7">50%</span>
                                </div>
                                <div class="progress mx-3 w-100 bg-light mb-3">
                                    <div role="progressbar" class="bg-success rounded" style="width: 50%;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Change avatar -->
        <div class="modal fade" id="change-ava">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Modal Heading</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        Modal body..
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    </div>

                </div>
            </div>
        </div>

        <!-- Profile Detail -->
        <div class="card mb-5 mb-xl-10">
            <div role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details" class="card-header border-0 cursor-pointer">
                <div class="card-title m-0">
                    <h3 class="fw-bolder m-0">Profile Details</h3>
                </div>
            </div>
            <div id="kt_account_profile_details" class="collapse show">
                <form novalidate="" class="form">
                    <div class="card-body border-top p-9">
                        <div class="row mb-6">
                            <label class="col-lg-4 col-form-label fw-bold fs-6">Full Name</label>
                            <div class="col-lg-8 fv-row">
                                <input type="text" placeholder="First name" name="fName" value="<?= $acc['full_name'] ?>" class="form-control form-control-solid fw-bold mb-3 mb-lg-0">
                            </div>
                        </div>

                        <div class="row mb-6">
                            <label class="col-lg-4 col-form-label fw-bold fs-6">
                                <span class="required">Contact Phone</span>
                            </label>
                            <div class="col-lg-8 fv-row">
                                <input type="tel" placeholder="Phone number" name="contactPhone" value="<?= $acc['phone'] ?>" class="form-control form-control-solid fw-bold">
                            </div>
                        </div>

                        <div class="row mb-6">
                            <label class="col-lg-4 col-form-label required fw-bold fs-6">Account type</label>
                            <div class="col-lg-8 fv-row">
                                <select name="timeZone" class="form-select form-select-solid fw-bold">
                                    <option value="0">Student</option>
                                    <option value="1">Teacher</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-6">
                            <label class="col-lg-4 col-form-label fw-bold fs-6">
                                <span class="required">Country</span>
                            </label>
                            <div class="col-lg-8 fv-row">
                                <select name="country" id="province" class="form-select form-select-solid fw-bold">

                                </select>
                            </div>
                        </div>

                        <div class="row mb-6">
                            <label class="col-lg-4 col-form-label required fw-bold fs-6">Time Zone</label>
                            <div class="col-lg-8 fv-row">
                                <select name="timeZone" class="form-select form-select-solid fw-bold">
                                    <option value="">Select a Timezone..</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-end py-6 px-9">
                        <button type="button" class="btn btn-primary">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Sign-in Method -->
        <div class="card mb-5 mb-xl-10">
            <div class="card-header border-0 cursor-pointer" data-bs-toggle="collapse" data-bs-target="#kt_account_signin_method">
                <div class="card-title m-0">
                    <h3 class="fw-bolder m-0">Sign-in Method</h3>
                </div>
            </div>
            <div id="kt_account_signin_method" class="collapse show">
                <div class="card-body border-top p-9">
                    <div class="d-flex flex-wrap align-items-center">
                        <div class="kt_signin_email active">
                            <div class="fs-6 fw-bolder mb-1">Email Address</div>
                            <div class="fw-bold text-gray-600">support@keenthemes.com</div>
                        </div>
                        <div class="kt_signin_email">
                            <form action="" method="" class="w-100">
                                <div class="row mb-6">
                                    <div class="col-lg-5 mb-4 mb-lg-0">
                                        <div class="kt_signin_email_edit">
                                            <label class="form-label fs-7 fw-bolder mb-3">Enter New Email Address</label>
                                            <input type="email" class="form-control form-control-solid" name="newEmail" placeholder="example@pxams.com" autocomplete="off" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-5">
                                        <div class="kt_signin_email_edit">
                                            <label class="form-label fs-7 fw-bolder mb-3">Confirm Password</label>
                                            <input type="password" class="form-control form-control-solid" name="confirmPassword" autocomplete="new-password" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex">
                                    <button type="submit" class="btn btn-primary me-2 px-6"> Update Email</button>
                                    <button type="button" onclick="changeEmail()" class="btn btn-color-gray-400 btn-active-light-primary btn_email_edit px-6"> Cancel </button>
                                </div>
                            </form>
                        </div>

                        <div class="ms-auto">
                            <button class="btn btn-light btn-active-light-primary btn_email_edit on" onclick="changeEmail()">Change Email</button>
                        </div>
                    </div>

                    <div class="separator my-6"></div>

                    <div class="d-flex flex-wrap align-items-center mb-10">
                        <div class="kt_signin_password active">
                            <div class="fs-6 fw-bolder mb-1">Password</div>
                            <div class="fw-bold text-gray-600">************</div>
                        </div>

                        <div class="kt_signin_password">
                            <form class="w-100">
                                <div class="row mb-1">
                                    <div class="col-lg-4">
                                        <div class="kt_signin_password_edit">
                                            <label class="form-label fs-7 fw-bolder mb-3">Current Password</label>
                                            <input type="password" name="currentPassword" class="form-control form-control-solid" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="kt_signin_password_edit">
                                            <label class="form-label fs-7 fw-bolder mb-3">New Password</label>
                                            <input type="password" name="newPassword" class="form-control form-control-solid" onkeyup="CheckPassword(this)" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="kt_signin_password_edit">
                                            <label class="form-label fs-7 fw-bolder mb-3">Confirm New Password</label>
                                            <input type="password" name="passwordConfirmation" class="form-control form-control-solid">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-text mb-5"> Password must be at least 8 character and contain symbols </div>
                                <div class="d-flex">
                                    <button type="submit" class="btn btn-primary me-2 px-6">Update Password</button>
                                    <button type="button" onclick="changePass()" class="btn btn-color-gray-400 btn-active-light-primary btn_password_edit px-6">Cancel</button>
                                </div>
                            </form>
                        </div>

                        <div class="ms-auto false">
                            <button onclick="changePass()" class="btn btn-light btn-active-light-primary btn_password_edit on">Reset Password</button>
                        </div>
                    </div>

                    <div class="two-factor-authen p-6">
                        <span class="svg-icon svg-icon-2tx svg-icon-primary me-4">
                            <img src="assets/image/icons/ic-008.svg" alt="">
                        </span>
                        <div class="d-flex align-items-center justify-content-between flex-grow-1 flex-wrap flex-md-nowrap">
                            <div class="mb-3 mb-md-0 fw-bold">
                                <h5 class="text-gray-800 fw-bolder">Secure Your Account</h5>
                                <div class="fs-6 text-gray-600 pe-7">Two-factor authentication adds an extra layer of security to your account. To log in, in addition you'll need to provide a 6 digit code </div>
                            </div>
                            <a data-bs-toggle="modal" data-bs-target="#kt_modal_two_factor_authentication" class="btn btn-primary px-6 align-self-center text-nowrap cursor-pointer">Enable</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Connected Accounts -->
        <div class="card mb-5 mb-xl-10">
            <div class="card-header border-0 cursor-pointer" data-bs-toggle="collapse" data-bs-target="#kt_account_connected_accounts">
                <div class="card-title m-0">
                    <h3 class="fw-bolder m-0">Connected Accounts</h3>
                </div>
            </div>
            <div id="kt_account_connected_accounts" class="collapse show">
                <div class="card-body border-top p-9">
                    <div class="py-2">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center">
                                <span class="svg-icon svg-icon-30px me-6">
                                    <img src="assets/image/icons/brand-logos/google-icon.svg" alt="">
                                </span>
                                <div class="d-flex flex-column">
                                    <a href="#" class="fs-7 fw-bolder"> Google </a>
                                    <div class="fs-75 fw-bold text-gray-400"> vomoc123@gmail.com </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end">
                                <div class="form-check form-check-solid form-switch">
                                    <input type="checkbox" id="googleswitch" checked="" class="form-check-input">
                                    <label htmlfor="googleswitch" class="form-check-label"></label>
                                </div>
                            </div>
                        </div>

                        <div class="separator my-5"></div>

                        <div class="d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center">
                                <span class="svg-icon svg-icon-30px me-6">
                                    <img src="assets/image/icons/brand-logos/facebook-3.svg" alt="">
                                </span>
                                <div class="d-flex flex-column">
                                    <a href="#" class="fs-7 fw-bolder"> Facebook </a>
                                    <div class="fs-75 fw-bold text-gray-400"> Vo Anh </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end">
                                <div class="form-check form-check-solid form-switch">
                                    <input type="checkbox" id="facebookswitch" class="form-check-input">
                                    <label htmlfor="facebookswitch" class="form-check-label"></label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer d-flex justify-content-end py-6 px-9">
                    <button type="button" class="btn btn-white btn-active-light-primary me-2"> Discard </button>
                    <button type="button" class="btn btn-primary">Save Changes</button>
                </div>
            </div>
        </div>

        <!-- Deactivate Account -->
        <div class="card">
            <div class="card-header border-0 cursor-pointer" data-bs-toggle="collapse" data-bs-target="#kt_account_deactivate">
                <div class="card-title m-0">
                    <h3 class="fw-bolder m-0">Deactivate Account</h3>
                </div>
            </div>
            <div id="kt_account_deactivate" class="collapse show">
                <form id="kt_account_deactivate_form" class="form">
                    <div class="card-body border-top p-9">
                        <div class="notice_account_deactivate">
                            <div class="d-flex align-items-center justify-content-between flex-grow-1">
                                <div class="fw-bold">
                                    <h5 class="text-gray-800 fw-bolder"> You Are Deactivating Your Account </h5>
                                    <div class="fs-7 text-gray-600">Your account will be deactivated, and all your data will be deleted within 6 months if there is no change</div>
                                </div>
                            </div>
                        </div>
                        <div class="form-check form-check-solid">
                            <input type="checkbox" class="form-check-input" onclick="deactivateAcc(this)">
                            <label class="form-check-label fw-bold ps-2 fs-6">I confirm my account deactivation</label>
                        </div>
                        <div style="margin-top: .3rem;">
                            <div class="text-danger fs-85"> Please check the box to deactivate your account </div>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-end py-6 px-9">
                        <button id="kt_account_deactivate_submit" type="button" class="btn btn-danger fw-bold" disabled>Deactivate Account</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="assets/js/user.js"></script>