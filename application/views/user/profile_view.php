
<div class="tab-content pt-2 dashboard" id="myTabContent">

    <!-- home tab start -->
    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="home-tab">
        <div class="row">

            <div class="col-xxl-4 col-md-6" style="margin:0px auto;">
                <div class="card info-card revenue-card 1">

                    <div class="card-body">
                        <h5 class="card-title">Available Amount</h5>

                        <div class="d-flex align-items-center">
                            <!-- <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-currency-dollar"></i>
                            </div> -->
                            <div class="ps-3">
                                <h6>SAR <?= $user['balance'] ?></h6>
                            </div>
                        </div>
                    </div>

                </div>
                <?php if ($this->session->userdata('userType') == 'parent') { ?>



                    <div class="row">

                        <div class="col-xxl-5 col-md-6 mx-auto">
                            <button class="btn btn-primary bg-sea-green card-btn" type="button" data-bs-toggle="modal" data-bs-target="#addCardModal"><i class="ri-add-circle-fill me-1"></i> Add/Edit Card</button>
                        </div>

                        <?php if (count($user['card']) > 0) { ?>
                            <div class="col-xxl-4 col-md-6 mx-auto">
                                <button class="btn btn-primary bg-light-orange" type="button" data-bs-toggle="modal" data-bs-target="#addParentMoneyModal"><i class="ri-add-circle-fill me-1"></i> Money</button>
                            </div>
                        <?php } ?>

                    </div>

                <?php } else { ?>
                    <div class="col-xxl-5 col-md-6 mx-auto">
                        <button class="btn btn-primary bg-light-orange" type="button" data-bs-toggle="modal" data-bs-target="#requestMoneyModal"><i class="ri-arrow-go-back-fill me-1"></i>Request Money</button>
                    </div>

                <?php } ?>
            </div>

        </div>



    </div>
    <!-- home tab end -->

    <!-- childern accounts tab start -->
    <div class="tab-pane fade" id="pills-childern" role="tabpanel" aria-labelledby="profile-tab">

        <div class="row">
            <div class="col-xxl-4 col-md-6 mb-3">
                <button data-bs-toggle="modal" data-bs-target="#addChildModal" class="btn btn-primary bg-sea-green"><i class="ri-user-add-fill"></i> Add Child</button>
            </div>

        </div>

        <div class="row gy-3">
            <?php if (count($childern) > 0) {

                foreach ($childern as $child) {

            ?>

                    <div class="col-xxl-4 col-md-6">
                        <div class="card info-card revenue-card 2 mb-0 pb-0 h-100">

                            <div class="card-body">
                                <h5 class="card-title"><?= $child['firstName'] . ' ' . $child['lastName'] ?></h5>
                                <hr>
                                <p>Child Id : <strong><?= $child['userName'] ?></strong></p>
                                <hr>
                                <p>Balance : <strong class="fs-4">SAR <?= $child['balance'] ?></strong></p>
                                <div class="row">
                                    <div class="col-5">
                                        <button class="btn btn-primary bg-light-orange" type="button" data-bs-toggle="modal" data-id="<?= $child['id'] ?>" data-bs-target="#addMoneyModal"> <i class="ri-add-circle-fill me-1"></i>Add Money</button>
                                    </div>
                                    <div class="col-7">
                                        <button class="btn btn-danger" type="button" data-bs-toggle="modal" data-id="<?= $child['id'] ?>" data-bs-target="#withdrawMoneyModal"><i class="ri-arrow-go-back-fill me-1"></i> Withdraw Money</button>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>

            <?php
                }
            } else {
                echo "Not Record Available !";
            }


            ?>
        </div>

    </div>
    <!-- childern accounts tab end -->



    <!-- goal tab start -->
    <div class="tab-pane fade" id="pills-goal" role="tabpanel" aria-labelledby="profile-tab">

        <div class="row">
            <div class="col-xxl-4 col-md-6 mb-3">
                <button class="btn btn-primary bg-sea-green" type="button" data-bs-toggle="modal" data-bs-target="#addGoalModal"><i class="ri-add-circle-fill me-1"></i> Set Saving Goal</button>

                <button data-bs-toggle="modal" data-bs-target="#viewReminderDetailModal" class="btn btn-primary bg-light-orange" onclick="updateReminderStatus();"><i class="ri-eye-fill"></i>Remiders <span class="badge bg-white text-info" id="reminderCount"><?=isset($reminders[0]['unread_count'])?$reminders[0]['unread_count']:'0'?></span> </button>
            </div>

        </div>

        <div class="row gy-3">


            <?php if (count($goals) > 0) {

                foreach ($goals as $goal) {

            ?>

                    <div class="col-xxl-3 col-md-6">
                        <div class="card info-card revenue-card 3 mb-0 pb-0 h-100">

                            <div class="card-body">
                                <h5 class="card-title"><?= $goal['name'] ?></h5>


                                <p><strong>Start Date :</strong> <?= $goal['startDate'] ?></p>
                                <hr>
                                <p><strong>End Date :</strong> <?= $goal['endDate'] ?></p>
                                <hr>
                                <p><strong>Current Amount :</strong> <?= $goal['goalAmount'] ?></p>
                                <hr>

                                <p><strong>Remaining Amount :</strong> <?= $goal['targetAmount'] - $goal['goalAmount'] ?></p>
                                <hr>
                                <p><strong>Plan Type :</strong> <?= $goal['goalPlanType'] ?></p>
                                <hr>
                                <p><strong>Target Amount :</strong> <strong class="fs-3"><?= $goal['targetAmount'] ?></strong></p>


                                <div class="row">
                                    <div class="col-8">

                                        <?php if ($goal['goalAmount'] >= $goal['targetAmount']) { ?>
                                            <p class="badge bg-success">Completed</p>
                                        <?php } else { ?>
                                            <button class="btn btn-primary bg-light-orange" type="button" data-bs-toggle="modal" data-id="<?= $goal['id'] ?>" data-bs-target="#addGoalMoneyModal"> <i class="ri-add-circle-fill me-1"></i>Add Money</button>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

            <?php
                }
            } else {
                echo "Not Record Available !";
            }


            ?>

        </div>
    </div>
    <!-- goal tab end -->

    <!-- my requests tab start -->

    <div class="tab-pane fade" id="pills-myrequest" role="tabpanel" aria-labelledby="contact-tab">

        <ul class="nav nav-pills ms-5 mb-3" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="all-request-child-tab" data-bs-toggle="pill" data-bs-target="#all-request-child" type="button" role="tab" aria-controls="pills-home" aria-selected="false" tabindex="-1">All Requests</button>
            </li>

            <li class="nav-item" role="presentation">
                <button class="nav-link" id="money-request-child-tab" data-bs-toggle="pill" data-bs-target="#money-request-child" type="button" role="tab" aria-controls="pills-home" aria-selected="false" tabindex="-1">Money Requests</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="purchase-request-child-tab" data-bs-toggle="pill" data-bs-target="#purchase-request-child" type="button" role="tab" aria-controls="pills-contact" aria-selected="false" tabindex="-1">Purchase Requests</button>
            </li>

            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pending-request-child-tab" data-bs-toggle="pill" data-bs-target="#pending-request-child" type="button" role="tab" aria-controls="pills-contact" aria-selected="false" tabindex="-1">Pending Requests</button>
            </li>

        </ul>
        <div class="tab-content">



            <!-- all child req tab start -->
            <div class="tab-pane fade" id="all-request-child" role="tabpanel" aria-labelledby="money-request-tab-btn">

                <div class="row gy-3">


                    <?php if (count($myRequests) > 0) {

                        foreach ($myRequests as $request) {

                    ?>
                            <?php if ($request['directPurchase'] == 0) { ?>
                                <div class="col-xxl-3 col-md-6">
                                    <div class="card info-card revenue-card 4 mb-0 pb-0 h-100">

                                        <div class="card-body py-3">
                                            <p>Request Type : <strong style="text-transform: capitalize"><?= $request['requestType'] ?></strong></p>
                                            <hr>
                                            <p>Request Amount : <strong class="fs-4">SAR <?= $request['amount'] ?></strong></p>
                                            <div class="row">
                                                <?php if ($request['status'] == 1) { ?>
                                                    <div class="col-12">
                                                        <p class="badge bg-warning">Pending</p>
                                                    </div>
                                                <?php } elseif ($request['status'] == 2) { ?>
                                                    <div class="col-6">
                                                        <p class="badge bg-success">Accepted</p>
                                                    </div>

                                                <?php } elseif ($request['status'] == 3) { ?>
                                                    <div class="col-12">
                                                        <p class="badge bg-danger">Rejected</p>
                                                    </div>
                                                <?php } elseif ($request['status'] == 4) { ?>
                                                    <div class="col-12">
                                                        <p class="badge bg-info">Completed</p>
                                                    </div>

                                                <?php } elseif ($request['status'] == 5) { ?>
                                                    <div class="col-12">
                                                        <p class="badge bg-danger">Cancelled</p>
                                                    </div>


                                                <?php } ?>
                                            </div>



                                        </div>

                                    </div>
                                </div>

                    <?php

                            }
                        }
                    } else {
                        echo "Not Record Available !";
                    }


                    ?>

                </div>
            </div>
            <!-- all child req tab start -->




            <!-- money child req tab start -->
            <div class="tab-pane fade" id="money-request-child" role="tabpanel" aria-labelledby="money-request-tab-btn">

                <div class="row gy-3">


                    <?php if (count($myRequests) > 0) {

                        foreach ($myRequests as $request) {

                    ?>
                            <?php if ($request['requestType'] == 'money' && $request['directPurchase'] == 0) { ?>

                                <div class="col-xxl-3 col-md-6">
                                    <div class="card info-card revenue-card 4 mb-0 pb-0 h-100">

                                        <div class="card-body py-3">
                                            <p>Request Type : <strong style="text-transform: capitalize"><?= $request['requestType'] ?></strong></p>
                                            <hr>
                                            <p>Request Amount : <strong class="fs-4">SAR <?= $request['amount'] ?></strong></p>
                                            <div class="row">
                                                <?php if ($request['status'] == 1) { ?>
                                                    <div class="col-12">
                                                        <p class="badge bg-warning">Pending</p>
                                                    </div>
                                                <?php } elseif ($request['status'] == 2) { ?>
                                                    <div class="col-6">
                                                        <p class="badge bg-success">Accepted</p>
                                                    </div>

                                                <?php } elseif ($request['status'] == 3) { ?>
                                                    <div class="col-12">
                                                        <p class="badge bg-danger">Rejected</p>
                                                    </div>
                                                <?php } elseif ($request['status'] == 4) { ?>
                                                    <div class="col-12">
                                                        <p class="badge bg-info">Completed</p>
                                                    </div>

                                                <?php } elseif ($request['status'] == 5) { ?>
                                                    <div class="col-12">
                                                        <p class="badge bg-danger">Cancelled</p>
                                                    </div>

                                                <?php } ?>
                                            </div>



                                        </div>

                                    </div>
                                </div>

                    <?php
                            }
                        }
                    } else {
                        echo "Not Record Available !";
                    }


                    ?>

                </div>
            </div>
            <!-- money child req tab start -->




            <!-- purchase child req tab start -->
            <div class="tab-pane fade" id="purchase-request-child" role="tabpanel" aria-labelledby="money-request-tab-btn">

                <div class="row gy-3">


                    <?php if (count($myRequests) > 0) {

                        foreach ($myRequests as $request) {

                    ?>
                            <?php if ($request['requestType'] == 'purchase'  && $request['directPurchase'] == 0) { ?>

                                <div class="col-xxl-3 col-md-6">
                                    <div class="card info-card revenue-card 4 mb-0 pb-0 h-100">

                                        <div class="card-body py-3">
                                            <p>Request Type : <strong style="text-transform: capitalize"><?= $request['requestType'] ?></strong></p>
                                            <hr>
                                            <p>Request Amount : <strong class="fs-4">SAR <?= $request['amount'] ?></strong></p>
                                            <div class="row">
                                                <?php if ($request['status'] == 1) { ?>
                                                    <div class="col-12">
                                                        <p class="badge bg-warning">Pending</p>
                                                    </div>
                                                <?php } elseif ($request['status'] == 2) { ?>
                                                    <div class="col-6">
                                                        <p class="badge bg-success">Accepted</p>
                                                    </div>

                                                <?php } elseif ($request['status'] == 3) { ?>
                                                    <div class="col-12">
                                                        <p class="badge bg-danger">Rejected</p>
                                                    </div>
                                                <?php } elseif ($request['status'] == 4) { ?>
                                                    <div class="col-12">
                                                        <p class="badge bg-info">Completed</p>
                                                    </div>


                                                <?php } elseif ($request['status'] == 5) { ?>
                                                    <div class="col-12">
                                                        <p class="badge bg-danger">Cancelled</p>
                                                    </div>

                                                <?php } ?>
                                            </div>



                                        </div>

                                    </div>
                                </div>

                    <?php
                            }
                        }
                    } else {
                        echo "Not Record Available !";
                    }


                    ?>

                </div>
            </div>
            <!-- purchase child req tab start -->


            <!-- pending child req tab start -->
            <div class="tab-pane fade" id="pending-request-child" role="tabpanel" aria-labelledby="money-request-tab-btn">

                <div class="row gy-3">


                    <?php if (count($myRequests) > 0) {

                        foreach ($myRequests as $request) {

                    ?>
                            <?php if ($request['status'] == 1  && $request['directPurchase'] == 0) { ?>

                                <div class="col-xxl-3 col-md-6">
                                    <div class="card info-card revenue-card 4 mb-0 pb-0 h-100">

                                        <div class="card-body py-3">
                                            <p>Request Type : <strong style="text-transform: capitalize"><?= $request['requestType'] ?></strong></p>
                                            <hr>
                                            <p>Request Amount : <strong class="fs-4">SAR <?= $request['amount'] ?></strong></p>
                                            <div class="row">
                                                <?php if ($request['status'] == 1) { ?>
                                                    <div class="col-12">
                                                        <p class="badge bg-warning">Pending</p>
                                                    </div>
                                                <?php } elseif ($request['status'] == 2) { ?>
                                                    <div class="col-6">
                                                        <p class="badge bg-success">Accepted</p>
                                                    </div>

                                                <?php } elseif ($request['status'] == 3) { ?>
                                                    <div class="col-12">
                                                        <p class="badge bg-danger">Rejected</p>
                                                    </div>
                                                <?php } elseif ($request['status'] == 4) { ?>
                                                    <div class="col-12">
                                                        <p class="badge bg-info">Completed</p>
                                                    </div>

                                                <?php } elseif ($request['status'] == 5) { ?>
                                                    <div class="col-12">
                                                        <p class="badge bg-danger">Cancelled</p>
                                                    </div>

                                                <?php } ?>
                                            </div>



                                        </div>

                                    </div>
                                </div>

                    <?php
                            }
                        }
                    } else {
                        echo "Not Record Available !";
                    }


                    ?>

                </div>
            </div>
            <!-- pending child req tab start -->




        </div>





    </div>

    <!-- my requests tab end -->





    <!-- childern request tab start -->

    <div class="tab-pane fade" id="pills-request" role="tabpanel" aria-labelledby="contact-tab">


        <ul class="nav nav-pills ms-5 mb-3" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="all-request-parent-tab" data-bs-toggle="pill" data-bs-target="#all-request-parent" type="button" role="tab" aria-controls="pills-home" aria-selected="false" tabindex="-1">All Requests</button>
            </li>

            <li class="nav-item" role="presentation">
                <button class="nav-link" id="money-request-parent-tab" data-bs-toggle="pill" data-bs-target="#money-request-parent" type="button" role="tab" aria-controls="pills-home" aria-selected="false" tabindex="-1">Money Requests</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="purchase-request-parent-tab" data-bs-toggle="pill" data-bs-target="#purchase-request-parent" type="button" role="tab" aria-controls="pills-contact" aria-selected="false" tabindex="-1">Purchase Requests</button>
            </li>

            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pending-request-parent-tab" data-bs-toggle="pill" data-bs-target="#pending-request-parent" type="button" role="tab" aria-controls="pills-contact" aria-selected="false" tabindex="-1">Pending Requests</button>
            </li>

        </ul>

        <div class="tab-content">



            <!-- all parent req tab start -->
            <div class="tab-pane fade" id="all-request-parent" role="tabpanel" aria-labelledby="money-request-tab-btn">

                <div class="row gy-3">


                    <?php if (count($requests) > 0) {

                        foreach ($requests as $request) {


                    ?>
                            <?php if ($request['directPurchase'] == 0) { ?>

                                <div class="col-xxl-3 col-md-6">
                                    <div class="card info-card revenue-card 5 mb-0 pb-0 h-100">

                                        <div class="card-body py-3">
                                            <p>Request Type : <strong style="text-transform: capitalize"><?= $request['requestType'] ?></strong></p>
                                            <hr>
                                            <p>Child Name : <strong><?= $request['firstName'] . '-' . $request['lastName'] ?></strong></p>
                                            <hr>
                                            <p>Child Id : <strong><?= $request['userName'] ?></strong></p>
                                            <hr>
                                            <?php if ($request['requestType'] === 'purchase') { ?>
                                                <button data-bs-toggle="modal" data-bs-target="#viewOrderDetailModal" class="btn btn-primary bg-sea-green" onclick="getOrderDetailByOrderNUmber('<?= $request['orderNumber'] ?>')"><i class="ri-eye-add-fill"></i>View Detail</button>

                                            <?php  } ?>
                                            <p>Request Amount : <strong class="fs-4">SAR <?= $request['amount'] ?></strong></p>
                                            <div class="row">
                                                <?php if ($request['status'] == 1) : ?>
                                                    <div class="col-4">
                                                        <button class="btn btn-primary bg-light-orange" type="button" data-val="2" onclick="updateRequestStatus(<?= $request['id'] ?>, 2)"><i class="ri-checkbox-circle-fill me-1"></i>Accept</button>
                                                    </div>

                                                    <div class="col-3">
                                                        <button class="btn btn-danger" type="button" data-val="3" onclick="updateRequestStatus(<?= $request['id'] ?>, 3)"><i class="ri-thumb-down-fill me-1"></i>Reject</button>
                                                    </div>
                                                <?php elseif ($request['status'] == 2) : ?>
                                                    <div class="col-12">
                                                        <p class="badge bg-success">Approved</p>
                                                    </div>
                                                <?php elseif ($request['status'] == 3) : ?>
                                                    <div class="col-12">
                                                        <p class="badge bg-danger">Rejected</p>
                                                    </div>


                                                <?php elseif ($request['status'] == 4) : ?>
                                                    <div class="col-12">
                                                        <p class="badge bg-info">Completed</p>
                                                    </div>

                                                <?php elseif ($request['status'] == 5) : ?>
                                                    <div class="col-12">
                                                        <p class="badge bg-danger">Cancelled</p>
                                                    </div>



                                                <?php endif; ?>
                                            </div>


                                        </div>

                                    </div>
                                </div>

                    <?php

                            }
                        }
                    } else {
                        echo "Not Record Available !";
                    }


                    ?>

                </div>

            </div>
            <!-- all parent req tab end -->

            <!-- money parent req tab start -->
            <div class="tab-pane fade" id="money-request-parent" role="tabpanel" aria-labelledby="money-request-tab-btn">

                <div class="row gy-3">


                    <?php if (count($requests) > 0) {

                        foreach ($requests as $request) {


                    ?>
                            <?php if ($request['requestType'] == 'money'  && $request['directPurchase'] == 0) { ?>
                                <div class="col-xxl-3 col-md-6">
                                    <div class="card info-card revenue-card 5 mb-0 pb-0 h-100">

                                        <div class="card-body py-3">
                                            <p>Request Type : <strong style="text-transform: capitalize"><?= $request['requestType'] ?></strong></p>
                                            <hr>
                                            <p>Child Name : <strong><?= $request['firstName'] . '-' . $request['lastName'] ?></strong></p>
                                            <hr>
                                            <p>Child Id : <strong><?= $request['userName'] ?></strong></p>
                                            <hr>
                                            <?php if ($request['requestType'] === 'purchase') { ?>
                                                <button data-bs-toggle="modal" data-bs-target="#viewOrderDetailModal" class="btn btn-primary bg-sea-green" onclick="getOrderDetailByOrderNUmber('<?= $request['orderNumber'] ?>')"><i class="ri-eye-add-fill"></i>View Detail</button>

                                            <?php  } ?>
                                            <p>Request Amount : <strong class="fs-4">SAR <?= $request['amount'] ?></strong></p>
                                            <div class="row">
                                                <?php if ($request['status'] == 1) : ?>
                                                    <div class="col-4">
                                                        <button class="btn btn-primary bg-light-orange" type="button" data-val="2" onclick="updateRequestStatus(<?= $request['id'] ?>, 2)"><i class="ri-checkbox-circle-fill me-1"></i>Accept</button>
                                                    </div>

                                                    <div class="col-3">
                                                        <button class="btn btn-danger" type="button" data-val="3" onclick="updateRequestStatus(<?= $request['id'] ?>, 3)"><i class="ri-thumb-down-fill me-1"></i>Reject</button>
                                                    </div>
                                                <?php elseif ($request['status'] == 2) : ?>
                                                    <div class="col-12">
                                                        <p class="badge bg-success">Approved</p>
                                                    </div>
                                                <?php elseif ($request['status'] == 3) : ?>
                                                    <div class="col-12">
                                                        <p class="badge bg-danger">Rejected</p>
                                                    </div>
                                                <?php endif; ?>
                                            </div>


                                        </div>

                                    </div>
                                </div>

                    <?php
                            }
                        }
                    } else {
                        echo "Not Record Available !";
                    }


                    ?>

                </div>

            </div>
            <!-- money parent req tab end -->


            <!-- purchase parent req tab start -->
            <div class="tab-pane fade" id="purchase-request-parent" role="tabpanel" aria-labelledby="purchase-request-tab-btn">

                <div class="row gy-3">


                    <?php if (count($requests) > 0) {

                        foreach ($requests as $request) {


                    ?>
                            <?php if ($request['requestType'] == 'purchase'  && $request['directPurchase'] == 0) { ?>
                                <div class="col-xxl-3 col-md-6">
                                    <div class="card info-card revenue-card 5 mb-0 pb-0 h-100">

                                        <div class="card-body py-3">
                                            <p>Request Type : <strong style="text-transform: capitalize"><?= $request['requestType'] ?></strong></p>
                                            <hr>
                                            <p>Child Name : <strong><?= $request['firstName'] . '-' . $request['lastName'] ?></strong></p>
                                            <hr>
                                            <p>Child Id : <strong><?= $request['userName'] ?></strong></p>
                                            <hr>
                                            <?php if ($request['requestType'] === 'purchase') { ?>
                                                <button data-bs-toggle="modal" data-bs-target="#viewOrderDetailModal" class="btn btn-primary bg-sea-green" onclick="getOrderDetailByOrderNUmber('<?= $request['orderNumber'] ?>')"><i class="ri-eye-add-fill"></i>View Detail</button>

                                            <?php  } ?>
                                            <p>Request Amount : <strong class="fs-4">SAR <?= $request['amount'] ?></strong></p>
                                            <div class="row">
                                                <?php if ($request['status'] == 1) : ?>
                                                    <div class="col-4">
                                                        <button class="btn btn-primary bg-light-orange" type="button" data-val="2" onclick="updateRequestStatus(<?= $request['id'] ?>, 2)"><i class="ri-checkbox-circle-fill me-1"></i>Accept</button>
                                                    </div>

                                                    <div class="col-3">
                                                        <button class="btn btn-danger" type="button" data-val="3" onclick="updateRequestStatus(<?= $request['id'] ?>, 3)"><i class="ri-thumb-down-fill me-1"></i>Reject</button>
                                                    </div>
                                                <?php elseif ($request['status'] == 2) : ?>
                                                    <div class="col-12">
                                                        <p class="badge bg-success">Approved</p>
                                                    </div>
                                                <?php elseif ($request['status'] == 3) : ?>
                                                    <div class="col-12">
                                                        <p class="badge bg-danger">Rejected</p>
                                                    </div>

                                                <?php elseif ($request['status'] == 4) : ?>
                                                    <div class="col-12">
                                                        <p class="badge bg-info">Completed</p>
                                                    </div>

                                                <?php elseif ($request['status'] == 5) : ?>
                                                    <div class="col-12">
                                                        <p class="badge bg-danger">Cancelled</p>
                                                    </div>


                                                <?php endif; ?>
                                            </div>


                                        </div>

                                    </div>
                                </div>

                    <?php
                            }
                        }
                    } else {
                        echo "Not Record Available !";
                    }


                    ?>

                </div>

            </div>
            <!-- purchase parent req tab end -->



            <!-- pending parent req tab start -->
            <div class="tab-pane fade" id="pending-request-parent" role="tabpanel" aria-labelledby="purchase-request-tab-btn">

                <div class="row gy-3">


                    <?php if (count($requests) > 0) {

                        foreach ($requests as $request) {


                    ?>
                            <?php if ($request['status'] == 1  && $request['directPurchase'] == 0) { ?>
                                <div class="col-xxl-3 col-md-6">
                                    <div class="card info-card revenue-card 5 mb-0 pb-0 h-100">

                                        <div class="card-body py-3">
                                            <p>Request Type : <strong style="text-transform: capitalize"><?= $request['requestType'] ?></strong></p>
                                            <hr>
                                            <p>Child Name : <strong><?= $request['firstName'] . '-' . $request['lastName'] ?></strong></p>
                                            <hr>
                                            <p>Child Id : <strong><?= $request['userName'] ?></strong></p>
                                            <hr>
                                            <?php if ($request['requestType'] === 'purchase') { ?>
                                                <button data-bs-toggle="modal" data-bs-target="#viewOrderDetailModal" class="btn btn-primary bg-sea-green" onclick="getOrderDetailByOrderNUmber('<?= $request['orderNumber'] ?>')"><i class="ri-eye-add-fill"></i>View Detail</button>

                                            <?php  } ?>
                                            <p>Request Amount : <strong class="fs-4">SAR <?= $request['amount'] ?></strong></p>
                                            <div class="row">
                                                <?php if ($request['status'] == 1) : ?>
                                                    <div class="col-4">
                                                        <button class="btn btn-primary bg-light-orange" type="button" data-val="2" onclick="updateRequestStatus(<?= $request['id'] ?>, 2)"><i class="ri-checkbox-circle-fill me-1"></i>Accept</button>
                                                    </div>

                                                    <div class="col-3">
                                                        <button class="btn btn-danger" type="button" data-val="3" onclick="updateRequestStatus(<?= $request['id'] ?>, 3)"><i class="ri-thumb-down-fill me-1"></i>Reject</button>
                                                    </div>
                                                <?php elseif ($request['status'] == 2) : ?>
                                                    <div class="col-12">
                                                        <p class="badge bg-success">Approved</p>
                                                    </div>
                                                <?php elseif ($request['status'] == 3) : ?>
                                                    <div class="col-12">
                                                        <p class="badge bg-danger">Rejected</p>
                                                    </div>

                                                <?php elseif ($request['status'] == 4) : ?>
                                                    <div class="col-12">
                                                        <p class="badge bg-info">Completed</p>
                                                    </div>

                                                <?php elseif ($request['status'] == 5) : ?>
                                                    <div class="col-12">
                                                        <p class="badge bg-danger">Cancelled</p>
                                                    </div>


                                                <?php endif; ?>
                                            </div>


                                        </div>

                                    </div>
                                </div>

                    <?php
                            }
                        }
                    } else {
                        echo "Not Record Available !";
                    }


                    ?>

                </div>

            </div>
            <!-- pending parent req tab end -->



        </div>


    </div>

    <!-- childern request tab end -->


    <!-- store tab start -->
    <div class="tab-pane fade" id="pills-store" role="tabpanel" aria-labelledby="contact-tab">

        <div class="row">
            <div class="col-xxl-4 col-md-6 mb-3">
                <button data-bs-toggle="modal" data-bs-target="#cartModal" class="btn btn-primary bg-sea-green"><i class="ri-shopping-cart-fill"></i> Cart <span class="badge bg-white text-info" id="cartCount"><?= isset($cart) ? count($cart) : '0' ?></span></button>
                <button data-bs-toggle="modal" data-bs-target="#orderModal" class="btn btn-primary bg-sea-green"><i class="ri-shopping-cart-fill"></i> My Orders</button>
            </div>

        </div>



        <div class="row gy-3">
            <?php if (count($products) > 0) {

                foreach ($products as $product) {

            ?>

                    <div class="col-xxl-3 col-md-6">
                        <div class="card info-card revenue-card 6 mb-0 pb-0 h-100">

                            <div class="card-body text-center py-3">
                                <img src="<?= base_url() . 'uploads/product/' . $product['image'] ?>" class="img-fluid text-center mb-3" style="height:160px">
                                <p>Name : <strong><?= $product['name'] ?></strong></p>
                                <p>Price : <strong class="fs-4">SAR <?= $product['price'] ?></strong></p>
                                <button class="btn btn-primary bg-light-orange" type="button" data-id="<?= $product['id'] ?>" onclick="addToCart(<?= $product['id'] ?>)"> <i class="ri-add-circle-fill me-1"></i>Add to Cart</button>
                                <div class="row">
                                    <div class="col-5">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

            <?php
                }
            } else {
                echo "Not Record Available !";
            }
            ?>
        </div>
    </div>
    <!-- store tab end -->




    <!-- parent log tab start -->
    <div class="tab-pane fade" id="pills-parentlog" role="tabpanel" aria-labelledby="contact-tab">

        <div class="row">


            <!-- Table with stripped rows -->
            <table class="table datatable">
                <thead>
                    <tr>
                        <th>
                            Child Name
                        </th>
                        <th>Child Id</th>
                        <th>Transaction Type</th>
                        <th>Transaction Amount</th>
                        <th>Transaction Date</th>
                    </tr>
                </thead>
                <tbody>


                    <?php if (count($parentLogs) > 0) {

                        foreach ($parentLogs as $log) {

                    ?>
                            <tr>
                                <td><?= $log['firstName'] . ' ' . $log['lastName'] ?></td>
                                <td><?= $log['childId'] ?></td>
                                <td><?= $log['transactionType'] ?></td>
                                <td><?= $log['amount'] ?></td>
                                <td><?= date('Y-m-d', strtotime($log['createdDate'])) ?></td>
                            </tr>

                    <?php }
                    } else
                        // echo '<tr>No record available!</tr>'
                    ?>
                </tbody>
            </table>
            <!-- End Table with stripped rows -->



        </div>


    </div>
    <!-- parent log tab end -->


    <!-- child log tab start -->
    <div class="tab-pane fade" id="pills-childlog" role="tabpanel" aria-labelledby="contact-tab">
        <div class="row">
            <!-- Table with stripped rows -->
            <table class="table datatable">
                <thead>
                    <tr>
                        <th>Parent Name</th>
                        <th>Parent Id</th>
                        <th>Transaction Type</th>
                        <th>Transaction Amount</th>
                        <th>Transaction Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (count($childLogs) > 0) {

                    foreach ($childLogs as $log) {

                    ?>
                            <tr>
                                <td><?= $log['firstName'] . ' ' . $log['lastName'] ?></td>
                                <td><?= $log['parentId'] ?></td>
                                <td><?= $log['transactionType'] ?></td>
                                <td><?= $log['amount'] ?></td>
                                <td><?= date('Y-m-d', strtotime($log['createdDate'])) ?></td>
                            </tr>

                    <?php }
                } else
                    // echo '<tr>No record available!</tr>';
                    ?>
                </tbody>
            </table>
            <!-- End Table with stripped rows -->


        </div>
    </div>
    <!-- child log tab end -->


    <!-- add child modal start -->

    <div class="modal fade" id="addChildModal" tabindex="-1" data-bs-backdrop="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-sea-green">
                    <h5 class="modal-title  text-white fw-bold">Add Child</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="btnClose"></button>
                </div>
                <div class="modal-body">
                    <!-- No Labels Form -->
                    <form class="row g-3" id="addChild">
                        <div class="col-md-6">
                            <!-- <label for="yourName" class="form-label">Child ID</label> -->
                            <input type="text" class="form-control" name="userName" placeholder="Child ID">
                        </div>
                        <div class="col-md-6">
                            <button type="button" class="btn btn-primary bg-light-orange" onclick="addChild()">Add Child</button>
                            <button type="reset" class="btn btn-secondary">Reset</button>
                        </div>

                        <div class="col-md-6" id="errorDiv">
                            <p id="error" class="error"></p>
                        </div>

                    </form><!-- End No Labels Form -->
                </div>
            </div>
        </div>
    </div>

    <!-- add child modal end -->





    <!-- add money modal start -->

    <div class="modal fade" id="addMoneyModal" tabindex="-1" data-bs-backdrop="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-sea-green">
                    <h5 class="modal-title  text-white fw-bold">Add Money</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="btnClose"></button>
                </div>
                <div class="modal-body">
                    <!-- No Labels Form -->
                    <form class="row g-3" id="addMoney">
                        <div class="col-md-6">
                            <input type="number" min="1" class="form-control" name="amount" placeholder="Amount">
                        </div>
                        <div class="col-md-6">
                            <button type="button" class="btn btn-primary bg-light-orange" onclick="addMoney()">Add Money</button>
                            <button type="reset" class="btn btn-secondary">Reset</button>
                        </div>

                        <div class="col-md-6" id="errorDiv">
                            <p id="error" class="error"></p>
                        </div>

                    </form><!-- End No Labels Form -->
                </div>
                <!-- <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-primary">Save changes</button>
                    </div> -->
            </div>
        </div>
    </div>

    <!-- add money modal end -->



    <!-- add withdraw modal start -->

    <div class="modal fade" id="withdrawMoneyModal" tabindex="-1" data-bs-backdrop="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-sea-green">
                    <h5 class="modal-title  text-white fw-bold">Withdraw Money</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="btnClose"></button>
                </div>
                <div class="modal-body">
                    <!-- No Labels Form -->
                    <form class="row g-3" id="withdrawMoney">
                        <div class="col-md-6">
                            <input type="number" min="1" class="form-control" name="amount" placeholder="Amount">
                        </div>
                        <div class="col-md-6">
                            <button type="button" class="btn btn-primary bg-light-orange" onclick="withdrawMoney()">Withdraw Money</button>
                            <button type="reset" class="btn btn-secondary">Reset</button>
                        </div>

                        <div class="col-md-6" id="errorDiv">
                            <p id="error" class="error"></p>
                        </div>

                    </form><!-- End No Labels Form -->
                </div>
                <!-- <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-primary">Save changes</button>
                    </div> -->
            </div>
        </div>
    </div>

    <!-- withdraw money modal end -->



    <!-- add parent money modal start -->

    <div class="modal fade" id="addParentMoneyModal" tabindex="-1" data-bs-backdrop="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-sea-green">
                    <h5 class="modal-title  text-white fw-bold">Add Money</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="btnClose"></button>
                </div>
                <div class="modal-body">
                    <!-- No Labels Form -->
                    <form class="row g-3" id="addParentMoney">
                        <div class="col-md-6">
                            <input type="number" min="1" class="form-control" name="amount" placeholder="Amount">
                        </div>
                        <div class="col-md-6">
                            <button type="button" class="btn btn-primary bg-light-orange" onclick="addParentMoney()">Add Money</button>
                            <button type="reset" class="btn btn-secondary">Reset</button>
                        </div>

                        <div class="col-md-6" id="errorDiv">
                            <p id="error" class="error"></p>
                        </div>

                    </form><!-- End No Labels Form -->
                </div>
                <!-- <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-primary">Save changes</button>
                    </div> -->
            </div>
        </div>
    </div>

    <!-- add parent money modal end -->



    <!-- add card modal start -->

    <div class="modal fade" id="addCardModal" tabindex="-1" data-bs-backdrop="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-sea-green">
                    <h5 class="modal-title  text-white fw-bold">Add/Edit Card</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="btnClose"></button>
                </div>
                <div class="modal-body">
                    <!-- No Labels Form -->
                    <form class="row g-3" id="addCard">

                        <div class="col-md-6">
                            <label for="yourName" class="form-label">Card Holder Name*</label>
                            <input type="text" class="form-control" name="cardHolderName" value="<?= isset($user['card'][0]['cardHolderName']) ? $user['card'][0]['cardHolderName'] : '' ?>" placeholder="Card Holder Name">
                        </div>

                        <div class="col-md-6">
                            <label for="yourName" class="form-label">Card Number*</label>
                            <input type="number" min="1" class="form-control" name="cardNumber" value="<?= isset($user['card'][0]['cardNumber']) ? $user['card'][0]['cardNumber'] : '' ?>" placeholder="Card Number">
                        </div>

                        <div class="col-md-6">
                            <label for="yourName" class="form-label">Expiry Date*</label>
                            <input type="text" id="expiryDate" name="expiryDate" class="form-control date-picker" data-date="" value="">
                        </div>

                        <div class="col-md-6">
                            <label for="yourName" class="form-label">CVC*</label>
                            <input type="number" min="1" class="form-control" name="cardCVC" value="<?= isset($user['card'][0]['cardCVC']) ? $user['card'][0]['cardCVC'] : '' ?>" placeholder="Card CVC">
                        </div>
                        <div class="col-md-6">
                            <button type="button" class="btn btn-primary bg-light-orange" onclick="addCard()">Add/Edit Card</button>
                        </div>
                        <?php if (count($user['card']) > 0) { ?>
                            <div class="col-md-6">
                                <button type="button" class="btn btn-danger" onclick="deleteCard(<?= isset($user['card'][0]['id']) ? $user['card'][0]['id'] : '' ?>)">Delete Card</button>
                            </div>
                        <?php } ?>

                        <div class="col-md-6" id="errorDiv">
                            <p id="error" class="error"></p>
                        </div>

                    </form><!-- End No Labels Form -->
                </div>
                <!-- <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-primary">Save changes</button>
                    </div> -->
            </div>
        </div>
    </div>

    <!-- add card  modal end -->




    <!-- request money modal start -->

    <div class="modal fade" id="requestMoneyModal" tabindex="-1" data-bs-backdrop="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-sea-green">
                    <h5 class="modal-title  text-white fw-bold">Request Money</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="btnClose"></button>
                </div>
                <div class="modal-body">
                    <!-- No Labels Form -->
                    <form class="row g-3" id="requestMoney">
                        <div class="col-md-6">
                            <input type="number" min="1" class="form-control" name="amount" placeholder="Amount">
                        </div>
                        <div class="col-md-6">
                            <button type="button" class="btn btn-primary bg-light-orange" onclick="requestMoney()">Request Money</button>
                            <button type="reset" class="btn btn-secondary">Reset</button>
                        </div>

                        <div class="col-md-12" id="errorDiv">
                            <p id="error" class="error"></p>
                        </div>

                    </form><!-- End No Labels Form -->
                </div>
                <!-- <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-primary">Save changes</button>
                    </div> -->
            </div>
        </div>
    </div>

    <!-- request money modal end -->



    <!-- add goal money modal start -->

    <div class="modal fade" id="addGoalMoneyModal" tabindex="-1" data-bs-backdrop="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-sea-green">
                    <h5 class="modal-title  text-white fw-bold">Add Money</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="btnClose"></button>
                </div>
                <div class="modal-body">
                    <!-- No Labels Form -->
                    <form class="row g-3" id="addGoalMoney">



                        <div class="col-md-6">
                            <input type="number" min="1" class="form-control" name="amount" placeholder="Amount">
                        </div>


                        <div class="col-md-6">
                            <button type="button" class="btn btn-primary bg-light-orange" onclick="addGoalMoney()">Add Money</button>
                            <button type="reset" class="btn btn-secondary">Reset</button>
                        </div>

                        <div class="col-md-6" id="errorDiv">
                            <p id="error" class="error"></p>
                        </div>

                    </form><!-- End No Labels Form -->
                </div>
                <!-- <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-primary">Save changes</button>
                    </div> -->
            </div>
        </div>
    </div>

    <!-- add goal money modal end -->




    <!-- add goal  modal start -->

    <div class="modal fade" id="addGoalModal" tabindex="-1" data-bs-backdrop="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-sea-green">
                    <h5 class="modal-title  text-white fw-bold">Add Goal</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="btnClose"></button>
                </div>
                <div class="modal-body">
                    <!-- No Labels Form -->
                    <form class="row g-3" id="addGoal">


                        <div class="col-md-6">
                            <label for="yourName" class="form-label">Goal Name</label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="Goal Name">
                        </div>
                        <div class="col-md-6">
                            <label for="yourName" class="form-label">Target Amount</label>
                            <input type="number" min="1" class="form-control" name="targetAmount" id="targetAmount" placeholder="Amount" onchange="calculateGoalPlan()">
                        </div>
                        <div class="col-md-6">
                            <label for="yourName" class="form-label">Start Date</label>
                            <input type="date" class="form-control" name="startDate" id="startDate" onchange="calculateGoalPlan()">
                        </div>

                        <div class="col-md-6">
                            <label for="yourName" class="form-label">End Date</label>
                            <input type="date" class="form-control" name="endDate" id="endDate" onchange="calculateGoalPlan()">
                        </div>

                        <fieldset class="row mb-3 mt-3" id="radioBtnDiv" style="display: none;">
                            <legend class="col-form-label col-sm-2 pt-0">Plans</legend>
                            <div class="col-sm-10">

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="goalPlanType" id="goalPlanDaily" value="">
                                    <label class="form-check-label" id="goalPlanDailyLbl">

                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="goalPlanType" id="goalPlanWeekly" value="">
                                    <label class="form-check-label" id="goalPlanWeeklyLbl">

                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="goalPlanType" id="goalPlanMonthly" value="">
                                    <label class="form-check-label" id="goalPlanMonthlyLbl">

                                    </label>
                                </div>


                            </div>
                        </fieldset>

                        <div class="text-center">
                            <button type="button" class="btn btn-primary bg-light-orange" onclick="addGoal()">Create Goal</button>
                            <button type="reset" class="btn btn-secondary">Reset</button>
                        </div>

                        <div class="text-center" id="errorDiv">
                            <p id="error" class="error"></p>
                        </div>

                    </form><!-- End No Labels Form -->
                </div>
            </div>
        </div>
    </div>

    <!-- add goal  modal end -->





    <!-- order detail modal start -->

    <div class="modal fade" id="viewOrderDetailModal" tabindex="-1" data-bs-backdrop="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-sea-green">
                    <h5 class="modal-title  text-white fw-bold">Order Detail</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="btnClose"></button>
                </div>
                <div class="modal-body" id="orderDetailBody">

                </div>
                <!-- <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-primary">Save changes</button>
                    </div> -->
            </div>
        </div>
    </div>

    <!-- order detail modal end -->





    <!-- reminder detail modal start -->

    <div class="modal fade" id="viewReminderDetailModal" tabindex="-1" data-bs-backdrop="false">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header bg-sea-green">
                    <h5 class="modal-title  text-white fw-bold">Reminder Detail</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="btnClose"></button>
                </div>
                <div class="modal-body" id="reminderDetailBody">
                     <!-- Simple table with a different ID -->
    <table id="reminderTable" class="table"></table>

                    <!-- Table with stripped rows -->
                    <!-- <table class="table datatable" id="remindersTable">
                        <thead>
                            <tr>

                                <th> Goal Name</th>
                                <th>Goal Plan</th>
                                <th>Reminder Date</th>

                            </tr>
                        </thead>
                        <tbody>


                        </tbody>
                    </table> -->
                    <!-- End Table with stripped rows -->



                </div>
                <!-- <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-primary">Save changes</button>
                    </div> -->
            </div>
        </div>
    </div>

    <!-- reminder detail modal end -->




    <!-- cart  modal start -->

    <div class="modal fade" id="cartModal" tabindex="-1" data-bs-backdrop="false">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header bg-sea-green">
                    <h5 class="modal-title  text-white fw-bold">Cart Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="btnClose"></button>
                </div>
                <div class="modal-body">

                    <div class="row">
                        <div class="col-6">
                            <div class="row" id="cartViewDiv">
                                <?php

                            //$cart = $this->session->userdata('cart');
                            $totalAmount = 0;
                            $checkForm = "";

                            if (count($cart) > 0) {
                                $checkForm = "style='display:block'";
                                foreach ($cart as $item) {
                                    $totalAmount = + ($item['productPrice'] * $item['quantity']) + $totalAmount;
                                ?>
                                        <div class="col-xxl-6 col-md-6">
                                            <div class="card info-card revenue-card 7">
                                                <div class="card-body text-center py-3">
                                                    <img src="<?= base_url() . 'uploads/product/' .  $item['productImage'] ?>" class="img-fluid text-center mb-3" style="height:100px">
                                                    <p>Name : <strong><?= $item['productName'] ?></strong></p>
                                                    <p>Price : <strong class="fs-4">SAR <?= $item['productPrice'] ?></strong></p>
                                                    <p>Quantity : <strong class="fs-4"><?= $item['quantity'] ?></strong></p>
                                                    <button class="btn btn-primary bg-light-orange increment-btn" type="button" data-product-id="<?= $item['productId'] ?>"><i class="ri-add-box-fill me-1"></i></button>
                                                    <button class="btn btn-primary bg-sea-green decrement-btn" type="button" data-product-id="<?= $item['productId'] ?>"><i class="ri-subtract-fill me-1"></i></button>
                                                    <button class="btn btn-danger remove-btn" data-product-id="<?= $item['productId'] ?>"><i class="ri-delete-bin-6-fill me-1"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                <?php
                                }

                                // echo '<p> Total Amount : "' . $totalAmount . '"</p>';
                            } else {
                                $checkForm = "style='display:none'";
                                echo "<div class='col-xxl-6 col-md-6'>your cart is empty</div>";
                            }
                                ?>
                                <?php if (count($cart) > 0) { ?>

                                    <div class="col-xxl-12 col-md-12">
                                        <div class="card info-card revenue-card 7">
                                            <div class="card-body text-center py-3">
                                                <p id="cartTotalAmount">Total Amount : <strong class="fs-1" id="cartTotal"><?= $totalAmount ?></strong></p>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>

                        </div>

                        <div class="col-6">


                            <form class="row g-3" novalidate id="checkout" <?= $checkForm ?>>

                                <div class="col-12">
                                    <label for="yourName" class="form-label">First Name *</label>
                                    <input type="text" name="firstName" id="firstName" class="form-control">
                                    <div class="invalid-feedback">Please, enter your name!</div>
                                </div>

                                <div class="col-12">
                                    <label for="yourEmail" class="form-label">Last Name *</label>
                                    <input type="text" name="lastName" id="lastName" class="form-control">
                                    <div class="invalid-feedback">Please enter a valid Email adddress!</div>
                                </div>

                                <!-- <div class="col-12">
                                    <label for="yourUsername" class="form-label">Email *</label>
                                    <input type="text" name="email" id="email" class="form-control">
                                    <div class="invalid-feedback">Please choose a username.</div>
                                </div> -->


                                <div class="col-12">
                                    <label for="yourUsername" class="form-label">Shipping Address *</label>
                                    <input type="text" name="shippingAddress" id="shippingAddress" class="form-control">
                                    <div class="invalid-feedback">Please choose a username.</div>
                                </div>

                                <!-- 
                    <div class="col-12">
                        <div class="form-check">
                            <input class="form-check-input" name="terms" type="checkbox" value="" id="acceptTerms" required>
                            <label class="form-check-label" for="acceptTerms">I agree and accept the terms and conditions</label>
                            <div class="invalid-feedback">You must agree before submitting.</div>
                        </div>
                    </div> -->
                                <div class="col-6">
                                    <button class="btn btn-primary w-100 bg-light-orange" type="button" onclick="checkout()">Proceed Order</button>
                                </div>
                            </form>

                        </div>


                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- cart modal end -->

    <!-- order  modal start -->

    <div class="modal fade" id="orderModal" tabindex="-1" data-bs-backdrop="false">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header bg-sea-green">
                    <h5 class="modal-title  text-white fw-bold">My Orders</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="btnClose"></button>
                </div>
                <div class="modal-body">

                    <div class="row gy-3">


                        <?php if (count($myRequests) > 0) {

                            foreach ($myRequests as $request) {

                        ?>
                                <?php if ($request['requestType'] == 'purchase') { ?>

                                    <div class="col-xxl-4 col-md-6">
                                        <div class="card info-card revenue-card 4 mb-0 pb-0 h-100">

                                            <div class="card-body py-3">
                                                <!-- <p>Request Type : <strong style="text-transform: capitalize"><?= $request['requestType'] ?></strong></p>
                                            <hr> -->
                                                <p>Order Amount : <strong class="fs-4">SAR <?= $request['amount'] ?></strong></p>
                                                <p><button data-bs-toggle="modal" data-bs-target="#viewOrderDetailModal" class="btn btn-primary bg-sea-green" onclick="getOrderDetailByOrderNUmber('<?= $request['orderNumber'] ?>')"><i class="ri-eye-add-fill"></i>View Detail</button></p>

                                                <div class="row">
                                                    <?php if ($request['status'] == 1) { ?>
                                                        <div class="col-4">
                                                            <p class="badge bg-warning">Pending</p>
                                                        </div>
                                                    <?php } elseif ($request['status'] == 2) { ?>
                                                        <div class="col-4">
                                                            <p class="badge bg-success">Accepted</p>
                                                        </div>

                                                        <?php if ($request['requestType'] == 'purchase' && $request['status'] != 4 && $request['status'] != 5) { ?>
                                                            <div class="col-4">
                                                                <button class="btn btn-danger" type="button" data-val="2" onclick="updateRequestStatus(<?= $request['id'] ?>, 5)">
                                                                    <i class="ri-arrow-go-back-fill me-1"></i>Cancel
                                                                </button>
                                                            </div>
                                                            <div class="col-4">
                                                                <button class="btn btn-primary bg-light-orange" type="button" data-val="2" onclick="updateRequestStatus(<?= $request['id'] ?>, 4)">
                                                                    <i class="ri-checkbox-circle-fill me-1"></i>Proceed
                                                                </button>
                                                            </div>
                                                        <?php } ?>

                                                    <?php } elseif ($request['status'] == 3) { ?>
                                                        <div class="col-4">
                                                            <p class="badge bg-danger">Rejected</p>
                                                        </div>
                                                    <?php } elseif ($request['status'] == 4) { ?>
                                                        <div class="col-4">
                                                            <p class="badge bg-info">Completed</p>
                                                        </div>
                                                    <?php } elseif ($request['status'] == 5) { ?>
                                                        <div class="col-4">
                                                            <p class="badge bg-danger">Cancelled</p>
                                                        </div>
                                                    <?php } ?>
                                                </div>



                                            </div>

                                        </div>
                                    </div>

                        <?php
                                }
                            }
                        } else {
                            echo "Not Record Available !";
                        }


                        ?>

                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- order modal end -->

    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>

    <script type="text/javascript">

        var cartItemsString="";
        $(document).ready(function() {


//   // Initialize DataTable after rows are appended
//   let myTable = document.querySelector("#remindersTable");
// let dataTable = new simpleDatatables.DataTable(myTable);

// or

//let dataTable = new DataTable("#myTable");
//   $('#remindersTable').dataTable({
//                     paging: true,
//                     searching: true,
//                     ordering: true,
//                     pageLength: 10,
//                     lengthMenu: [5, 10, 25, 50],
//                     order: [[2, 'desc']],
//                     destroy: true,
//                     autoWidth: false  // Prevent automatic column width calculation
//                 });



            var dt = "<?= isset($user['card'][0]['expiryDate']) ? $user['card'][0]['expiryDate'] : '' ?>"

            $(function() {
                var myDate = $("#expiryDate").attr('data-date');
                var currentYear = new Date().getFullYear();

                $('#expiryDate').datepicker({
                    yearRange: `${currentYear}:c+10`, // Allows selecting the current year or up to 10 years in the future
                    minDate: new Date(currentYear, 0, 1), // Restrict to current year onwards
                    changeMonth: true,
                    changeYear: true,
                    setDate: myDate,
                    showButtonPanel: false,
                    dateFormat: 'MM yy',
                    onClose: function(dateText, inst) {
                        var month = $("#ui-datepicker-div .ui-datepicker-month :selected").val();
                        var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
                        $(this).datepicker('setDate', new Date(year, month, 1));
                    }
                });
                $('#expiryDate').datepicker('setDate', myDate);
            });

            $('.card-btn').on('click', function() {
                $('#expiryDate').val(dt);
            });


getReminders();



$('#viewReminderDetailModal').on('hidden.bs.modal', function () {
    // Call your function here
    getReminders();
});

            function getLastClickedTab() {
                return localStorage.getItem('lastClickedTab');
            }





            function setLastClickedTab(tabId) {
                localStorage.setItem('lastClickedTab', tabId);
            }

            function activateTab(tabId, isChild = false) {
                if (!isChild) {
                    // Remove 'active' class from all tabs and tab content only if it's not a child tab
                    $('button.nav-link').removeClass('active');
                    $('.tab-pane').removeClass('active show');
                }

                // Add 'active' class to the specified tab and its content
                $('#' + tabId).addClass('active');
                $('#' + tabId.replace('-tab', '')).addClass('active show');
            }

            function activateParentAndChildTabs(parentTabId, childTabId) {
                // Activate the parent tab

                console.log('parent' + parentTabId)
                activateTab(parentTabId);

                console.log('child' + childTabId)
                // Activate the child tab
                // Then activate the child tab without removing the active classes
                activateTab(childTabId, true);
            }

            var lastClickedTab = getLastClickedTab();

            if (lastClickedTab) {
                // Check specific tab IDs and activate the corresponding parent and child tabs
                if (lastClickedTab === 'purchase-request-parent-tab' || lastClickedTab === 'money-request-parent-tab') {
                    activateParentAndChildTabs('pills-request-tab', lastClickedTab);
                } else if (lastClickedTab === 'purchase-request-child-tab' || lastClickedTab === 'money-request-child-tab' || lastClickedTab === 'pending-request-child-tab') {
                    activateParentAndChildTabs('pills-myrequest-tab', lastClickedTab);
                } else if (lastClickedTab === 'purchase-request-child-tab' || lastClickedTab === 'all-request-child-tab') {
                    activateParentAndChildTabs('pills-myrequest-tab', lastClickedTab);
                } else if (lastClickedTab === 'all-request-parent-tab' || lastClickedTab === 'money-request-parent-tab' || lastClickedTab === 'purchase-request-parent-tab' || lastClickedTab === 'pending-request-parent-tab') {
                    activateParentAndChildTabs('pills-request-tab', lastClickedTab);
                } else {
                    // Activate the last clicked tab
                    activateTab(lastClickedTab);
                }
            } else {
                // Activate the home tab if no last clicked tab is found

                activateTab('pills-home-tab');
            }

            // Store the clicked tab ID whenever a tab is clicked
            $('button.nav-link').on('click', function() {
                var tabId = $(this).attr('id'); // Assume the tab ID is set in the 'id' attribute
                setLastClickedTab(tabId);
            });

            // Attach event listeners to the increment and decrement buttons
            $('#cartViewDiv').on('click', '.increment-btn', function() {
                updateCartQuantity($(this).data('product-id'), 'increment');
            });

            $('#cartViewDiv').on('click', '.decrement-btn', function() {
                updateCartQuantity($(this).data('product-id'), 'decrement');
            });

            $('#cartViewDiv').on('click', '.remove-btn', function() {
                updateCartQuantity($(this).data('product-id'), 'remove');
            });


        });

        var childId;
        var goalId;

        // show first child tab of Requests on manual click
        $('#pills-myrequest-tab').on('show.bs.tab', function(event) {
            var $firstTabTrigger = $('#all-request-child-tab');
            var tab = new bootstrap.Tab($firstTabTrigger[0]);
            tab.show();
        });

        // show first child tab of Requests on manual click
        $('#pills-request-tab').on('show.bs.tab', function(event) {
            var $firstTabTrigger = $('#all-request-parent-tab');
            var tab = new bootstrap.Tab($firstTabTrigger[0]);
            tab.show();
        });

        // Capture the childId when the modal is triggered
        $('#addMoneyModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget); // Button that triggered the modal
            childId = button.data('id'); // Extract info from data-* attributes
        });

        // Capture the childId when the modal is triggered
        $('#withdrawMoneyModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget); // Button that triggered the modal
            childId = button.data('id'); // Extract info from data-* attributes
        });

        // Capture the goalId when the modal is triggered
        $('#addGoalMoneyModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget); // Button that triggered the modal
            childId = button.data('id'); // Extract info from data-* attributes
        });

        function addChild() {

            var form = $('#addChild').validate({
                rules: {

                    userName: {
                        required: true
                    }

                }

            });
            //#store the validator obj
            if ($('#addChild').valid()) {

                // submit using ajax
                var url = "<?php echo base_url('user/User/addChild'); ?>";
                var formData = new FormData($("#addChild")[0]);
                $.ajax({
                    url: url,
                    type: "POST",
                    data: formData,
                    async: false,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        try {
                            response = JSON.parse(response);


                            if (response.status == '1') {

                                $('#addChild #errorDiv').css("display", "none");
                                $('#btnClose').trigger('click');
                                $('#alertSuccess').trigger('click');
                                $('#addChild')[0].reset();
                                reloadWithQueryParam('tab', 'childern');

                                //   var url = "<?php echo base_url('login?type='); ?>";
                                //   setTimeout(function() {
                                //     window.location = url;
                                //   }, 1500);
                            } else {
                                $('#addChild #errorDiv').css("display", "block");
                                $('#addChild #error').text(response.message);
                                //$('#alertDanger').trigger('click');
                            }

                            $('.notification').text(response.message);

                        } catch (e) {
                            alert(e);
                        }
                    },
                    error: function(e) {
                        alert('System Error !');
                    }
                });
            } else {
                form.focusInvalid();

            }

        }

        function addMoney() {

            var form = $('#addMoney').validate({
                rules: {

                    amount: {
                        required: true
                    }

                }

            });
            //#store the validator obj
            if ($('#addMoney').valid()) {

                // submit using ajax
                var url = "<?php echo base_url('user/User/addMoney'); ?>";
                var formData = new FormData($("#addMoney")[0]);
                formData.append('childId', childId);
                $.ajax({
                    url: url,
                    type: "POST",
                    data: formData,
                    async: false,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        try {
                            response = JSON.parse(response);

                            if (response.status == '1') {

                                $('#addMoney #errorDiv').css("display", "none");
                                $('#btnClose').trigger('click');
                                $('#alertSuccess').trigger('click');
                                $('#addMoney')[0].reset();


                                // Reload the page and activate the tab
                                reloadWithQueryParam('tab', 'childern');

                                //   var url = "<?php echo base_url('login?type='); ?>";
                                //   setTimeout(function() {
                                //     window.location = url;
                                //   }, 1500);
                            } else {
                                $('#addMoney #errorDiv').css("display", "block");
                                $('#addMoney #error').text(response.message);
                                //$('#alertDanger').trigger('click');
                            }

                            $('.notification').text(response.message);

                        } catch (e) {
                            alert(e);
                        }
                    },
                    error: function(e) {
                        alert('System Error !');
                    }
                });
            } else {
                form.focusInvalid();

            }

        }
        function addGoal() {
    // Set up form validation
    var form = $('#addGoal').validate({
        rules: {
            name: { required: true },
            targetAmount: { required: true },
            startDate: { required: true },
            endDate: { required: true },
            goalPlanType: { required: true }
        }
    });

    // If form is valid
    if ($('#addGoal').valid()) {
        // Gather the form data for confirmation display
        var name = $('#name').val();
        var targetAmount = $('#targetAmount').val();
        var startDate = $('#startDate').val();
        var endDate = $('#endDate').val();
        var goalPlanType = $("input[name='goalPlanType']:checked").val(); // Assuming goalPlan is a radio button

        // Build the confirmation message
        var confirmationMessage = "Please confirm your goal details:\n\n" +
                                  "Goal Name: " + name + "\n" +
                                  "Target Amount: SAR " + targetAmount + "\n" +
                                  "Start Date: " + startDate + "\n" +
                                  "End Date: " + endDate + "\n" +
                                  "Goal Plan Type: " + goalPlanType;

        // Show confirmation dialog
        if (confirm(confirmationMessage)) {
            // If user confirms, proceed with the AJAX submission
            var url = "<?php echo base_url('user/User/addGoal'); ?>";
            var formData = new FormData($("#addGoal")[0]);

            $.ajax({
                url: url,
                type: "POST",
                data: formData,
                async: false,
                cache: false,
                contentType: false,
                processData: false,
                success: function(response) {
                    try {
                        response = JSON.parse(response);

                        if (response.status == '1') {
                            $('#addGoal #errorDiv').css("display", "none");
                            $('#btnClose').trigger('click');
                            $('#alertSuccess').trigger('click');
                            $('#addGoal')[0].reset();
                            reloadWithQueryParam('tab', 'goal');
                        } else {
                            $('#addGoal #errorDiv').css("display", "block");
                            $('#addGoal #error').text(response.message);
                        }

                        $('.notification').text(response.message);
                    } catch (e) {
                        alert(e);
                    }
                },
                error: function(e) {
                    alert('System Error !');
                }
            });
        }
    } else {
        form.focusInvalid();
    }
}


        // function addGoal() {

        //     var form = $('#addGoal').validate({
        //         rules: {

        //             name: {
        //                 required: true
        //             },
        //             targetAmount: {
        //                 required: true
        //             },
        //             startDate: {
        //                 required: true
        //             },
        //             endDate: {
        //                 required: true
        //             },
        //             goalPlan: {
        //                 required: true
        //             },

        //         }

        //     });
        //     //#store the validator obj
        //     if ($('#addGoal').valid()) {

        //         // submit using ajax
        //         var url = "<?php echo base_url('user/User/addGoal'); ?>";
        //         var formData = new FormData($("#addGoal")[0]);

        //         $.ajax({
        //             url: url,
        //             type: "POST",
        //             data: formData,
        //             async: false,
        //             cache: false,
        //             contentType: false,
        //             processData: false,
        //             success: function(response) {
        //                 try {
        //                     response = JSON.parse(response);

        //                     if (response.status == '1') {

        //                         $('#addGoal #errorDiv').css("display", "none");
        //                         $('#btnClose').trigger('click');
        //                         $('#alertSuccess').trigger('click');
        //                         $('#addGoal')[0].reset();


        //                         // Reload the page and activate the tab
        //                         reloadWithQueryParam('tab', 'goal');

        //                         //   var url = "<?php echo base_url('login?type='); ?>";
        //                         //   setTimeout(function() {
        //                         //     window.location = url;
        //                         //   }, 1500);
        //                     } else {
        //                         $('#addGoal #errorDiv').css("display", "block");
        //                         $('#addGoal #error').text(response.message);
        //                         //$('#alertDanger').trigger('click');
        //                     }

        //                     $('.notification').text(response.message);

        //                 } catch (e) {
        //                     alert(e);
        //                 }
        //             },
        //             error: function(e) {
        //                 alert('System Error !');
        //             }
        //         });
        //     } else {
        //         form.focusInvalid();

        //     }

        // }

        function updateCartDisplay(cart) {

    // Ensure that cart is an array of objects
    if (!Array.isArray(cart)) {
        console.error("Cart is not an array.");
        return;
    }

    // Map the array to extract product details and format them
     cartItemsString = cart.map(function(item) {
        return item.productName + " - $" + item.productPrice + " x " + item.quantity;
    }).join('\n');

    // Calculate the total sum of the cart
    var cartTotalSum = cart.reduce(function(sum, item) {
        return sum + (item.productPrice * item.quantity);
    }, 0);

    // Append the sum to the cart items string
    cartItemsString += "\n\nTotal: $" + cartTotalSum.toFixed(2);

    // Print the formatted cart items string to the console
    console.log(cartItemsString);

    // Here you would update your confirmation message or any other element
    // For example:
    // $('#cartSummary').text(cartItemsString);
}


        function checkout() {
            // Validate the form before any further processing
            var form = $('#checkout').validate({
                rules: {
                    firstName: {
                        required: true
                    },
                    lastName: {
                        required: true
                    },
                    shippingAddress: {
                        required: true
                    },
                    terms: {
                        required: true
                    }
                    // ,
                    // email: {
                    //     required: true,
                    //     email: true
                    // }
                    // ,
                    // shippingAddress: {
                    //     required: true,

                    // }
                }
            });

            // Check if form is valid
            if (!$('#checkout').valid()) {
                form.focusInvalid();
                return; // Stop execution if form is invalid
            }

            var cartTotal = parseFloat($('#cartTotal').text());
var availableBalance = parseFloat('<?= $user['balance'] ?>');

if (availableBalance < cartTotal) {
    // If available balance is insufficient, show the first confirmation box
    if (!confirm("Your available balance is insufficient for this purchase. Do you want to send a money request to your parent?")) {
        return; // User canceled the confirmation
    } else {
        var requestAmount = cartTotal - availableBalance;
        requestMoney(requestAmount);
        return;
    }
} else {
    // If available balance is sufficient
    if (cartTotal > 50) {
        if (!confirm("The total amount is greater than 50. Do you want to send a request to your parent?")) {
            return; // User canceled the confirmation
        }
    } else {
        // Handle the case where the total amount is less than or equal to 50
        if (!confirm(" Do you want to proceed with the purchase? Items in cart: \n\n" + cartItemsString)) {
            return; // User canceled the confirmation
        }
    }
}

            // submit using ajax
            var url = "<?php echo base_url('user/User/checkout'); ?>";
            var formData = new FormData($("#checkout")[0]);

            $.ajax({
                url: url,
                type: "POST",
                data: formData,
                async: false,
                cache: false,
                contentType: false,
                processData: false,
                success: function(response) {
                    try {
                        response = JSON.parse(response);

                        if (response.status == '1') {
                            $('#alertSuccess').trigger('click');
                            $('#cartViewDiv').html('');
                            $('#checkout')[0].reset();
                            reloadWithQueryParam('tab', 'home');
                        } else {
                            $('#alertDanger').trigger('click');
                        }

                        $('.notification').text(response.message);
                    } catch (e) {
                        alert(e);
                    }
                },
                error: function(e) {
                    alert('System Error !');
                }
            });
        }

        function addGoalMoney() {

            var form = $('#addGoalMoney').validate({
                rules: {

                    amount: {
                        required: true
                    }
                }

            });
            //#store the validator obj
            if ($('#addGoalMoney').valid()) {

                // submit using ajax
                var url = "<?php echo base_url('user/User/addGoalMoney'); ?>";
                var formData = new FormData($("#addGoalMoney")[0]);
                formData.append('goalId', childId);
                $.ajax({
                    url: url,
                    type: "POST",
                    data: formData,
                    async: false,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        try {
                            response = JSON.parse(response);

                            if (response.status == '1') {

                                $('#addGoalMoney #errorDiv').css("display", "none");
                                $('#btnClose').trigger('click');
                                $('#alertSuccess').trigger('click');
                                $('#addGoalMoney')[0].reset();


                                // Reload the page and activate the tab
                                reloadWithQueryParam('tab', 'goal');

                                //   var url = "<?php echo base_url('login?type='); ?>";
                                //   setTimeout(function() {
                                //     window.location = url;
                                //   }, 1500);
                            } else {
                                $('#addGoalMoney #errorDiv').css("display", "block");
                                $('#addGoalMoney #error').text(response.message);
                                //$('#alertDanger').trigger('click');
                            }

                            $('.notification').text(response.message);

                        } catch (e) {
                            alert(e);
                        }
                    },
                    error: function(e) {
                        alert('System Error !');
                    }
                });
            } else {
                form.focusInvalid();

            }

        }

        function requestMoney(amount = 0) {
            var form = $('#requestMoney').validate({
                rules: {
                    amount: {
                        required: true
                    }
                }

            });
            //#store the validator obj
            if ($('#requestMoney').valid()) {

                // submit using ajax
                var url = "<?php echo base_url('user/User/requestMoney'); ?>";

                if (amount == 0) {
                    var formData = new FormData($("#requestMoney")[0]);
                } else {
                    var formData = new FormData();
                    formData.append('amount', amount);
                }

                $.ajax({
                    url: url,
                    type: "POST",
                    data: formData,
                    async: false,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        try {
                            response = JSON.parse(response);

                            if (response.status == '1') {

                                $('#requestMoney #errorDiv').css("display", "none");
                                $('#btnClose').trigger('click');
                                $('#alertSuccess').trigger('click');
                                $('#requestMoney')[0].reset();


                                // Reload the page and activate the tab
                                reloadWithQueryParam('tab', 'home');

                                //   var url = "<?php echo base_url('login?type='); ?>";
                                //   setTimeout(function() {
                                //     window.location = url;
                                //   }, 1500);
                            } else {
                                $('#requestMoney #errorDiv').css("display", "block");
                                $('#requestMoney #error').text(response.message);
                                $('#alertDanger').trigger('click');
                            }

                            $('.notification').text(response.message);

                        } catch (e) {
                            alert(e);
                        }
                    },
                    error: function(e) {
                        alert('System Error !');
                    }
                });
            } else {
                form.focusInvalid();

            }

        }

        function addParentMoney() {

            var form = $('#addParentMoney').validate({
                rules: {

                    amount: {
                        required: true
                    }

                }

            });
            //#store the validator obj
            if ($('#addParentMoney').valid()) {

                // submit using ajax
                var url = "<?php echo base_url('user/User/addParentMoney'); ?>";
                var formData = new FormData($("#addParentMoney")[0]);

                $.ajax({
                    url: url,
                    type: "POST",
                    data: formData,
                    async: false,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        try {
                            response = JSON.parse(response);

                            if (response.status == '1') {

                                $('#addParentMoney #errorDiv').css("display", "none");
                                $('#btnClose').trigger('click');
                                $('#alertSuccess').trigger('click');
                                $('#addParentMoney')[0].reset();


                                // Reload the page and activate the tab
                                reloadWithQueryParam('tab', 'home');

                                //   var url = "<?php echo base_url('login?type='); ?>";
                                //   setTimeout(function() {
                                //     window.location = url;
                                //   }, 1500);
                            } else {
                                $('#addParentMoney #errorDiv').css("display", "block");
                                $('#error').text(response.message);
                                //$('#alertDanger').trigger('click');
                            }

                            $('.notification').text(response.message);

                        } catch (e) {
                            alert(e);
                        }
                    },
                    error: function(e) {
                        alert('System Error !');
                    }
                });
            } else {
                form.focusInvalid();

            }

        }

        function addCard() {

            var form = $('#addCard').validate({
                rules: {

                    cardNumber: {
                        required: true,
                        minlength: 16,
                        maxlength: 16,
                        number: true
                    },
                    cardCVC: {
                        required: true,
                        minlength: 3,
                        maxlength: 3,
                        number: true
                    },
                    cardHolderName: {
                        required: true
                    },
                    expiryDate: {
                        required: true
                    }

                }

            });
            //#store the validator obj
            if ($('#addCard').valid()) {

                // submit using ajax
                var url = "<?php echo base_url('user/User/addCard'); ?>";
                var formData = new FormData($("#addCard")[0]);

                $.ajax({
                    url: url,
                    type: "POST",
                    data: formData,
                    async: false,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        try {
                            response = JSON.parse(response);

                            if (response.status == '1') {

                                $('#addCard #errorDiv').css("display", "none");
                                $('#btnClose').trigger('click');
                                $('#alertSuccess').trigger('click');
                                $('#addCard')[0].reset();


                                // Reload the page and activate the tab
                                reloadWithQueryParam('tab', 'home');

                                //   var url = "<?php echo base_url('login?type='); ?>";
                                //   setTimeout(function() {
                                //     window.location = url;
                                //   }, 1500);
                            } else {
                                $('#addCard #errorDiv').css("display", "block");
                                $('#error').text(response.message);
                                //$('#alertDanger').trigger('click');
                            }

                            $('.notification').text(response.message);

                        } catch (e) {
                            alert(e);
                        }
                    },
                    error: function(e) {
                        alert('System Error !');
                    }
                });
            } else {
                form.focusInvalid();

            }

        }

        function calculateGoalPlan() {
            var startDate = $('#startDate').val();
            var endDate = $('#endDate').val();
            var targetAmount = $('#targetAmount').val();

            // Check if inputs are not empty
            if (!startDate || !endDate || !targetAmount) {
                //alert('Please fill in all fields.');
                return;
            }

            startDate = new Date(startDate);
            endDate = new Date(endDate);
            targetAmount = parseFloat(targetAmount);

            // Validate targetAmount
            if (isNaN(targetAmount) || targetAmount <= 0) {
                // alert('Please enter a valid target amount.');
                return;
            }

            // Validate date range
            if (startDate >= endDate) {
                alert('End date must be after start date.');
                return;
            }

            var oneDay = 24 * 60 * 60 * 1000;
            var totalDays = Math.round(Math.abs((endDate - startDate) / oneDay));

            // Calculate daily, weekly, and monthly plans
            var weeks = totalDays / 7;
            var months = (endDate.getFullYear() - startDate.getFullYear()) * 12 + (endDate.getMonth() - startDate.getMonth());

            var dailyPlan = totalDays > 0 ? targetAmount / totalDays : targetAmount;
            var weeklyPlan = weeks > 0 ? targetAmount / weeks : targetAmount;
            var monthlyPlan = months > 0 ? targetAmount / months : targetAmount;

            // Update the UI
            $('#goalPlanDailyLbl').text('Daily Plan: SAR ' + dailyPlan.toFixed(2));
            $('#goalPlanWeeklyLbl').text('Weekly Plan: SAR ' + weeklyPlan.toFixed(2));
            $('#goalPlanMonthlyLbl').text('Monthly Plan: SAR ' + monthlyPlan.toFixed(2));

            $('#goalPlanDaily').val('Daily Plan: SAR ' + dailyPlan.toFixed(2));
            $('#goalPlanWeekly').val('Weekly Plan: SAR ' + weeklyPlan.toFixed(2));
            $('#goalPlanMonthly').val('Monthly Plan: SAR ' + monthlyPlan.toFixed(2));

            $('#radioBtnDiv').show();
        }

        function addToCart(pId) {

            // submit using ajax
            var url = "<?php echo base_url('user/User/addToCart'); ?>";

            var formData = new FormData();
            formData.append('productId', pId);

            $.ajax({
                url: url,
                type: "POST",
                data: formData,
                async: false,
                cache: false,
                contentType: false,
                processData: false,
                success: function(response) {
                    try {
                        response = JSON.parse(response);

                        if (response.status == '1') {

                            $('#alertSuccess').trigger('click');
                            updateCartView(response.cart);
                            setTimeout(function() {
                                $('#alertModalSuccess').modal('hide');

                            }, 2000);

                        } else {

                            $('#alertDanger').trigger('click');
                        }

                        $('.notification').text(response.message);

                    } catch (e) {
                        alert(e);
                    }
                },
                error: function(e) {
                    alert('System Error !');
                }
            });

        }

        function updateCartQuantity(productId, action) {
            var url = "<?php echo base_url('user/User/updateCartQuantity'); ?>";
            $.ajax({
                type: 'POST',
                url: url,
                data: {
                    productId: productId,
                    action: action
                },
                success: function(response) {
                    var response = JSON.parse(response);
                    if (response.status === '1') {
                        // $('#alertSuccess').trigger('click');
                        // Populate the cart view with the updated cart
                        updateCartView(response.cart);
                    } else {
                        // $('#alertDanger').trigger('click');
                        // alert(response.message);
                    }
                    // $('.notification').text(response.message);
                },
                error: function() {
                    alert('An error occurred while updating the cart.');
                }
            });
        }


        function updateReminderStatus() {
            var url = "<?php echo base_url('user/User/updateReminderStatus'); ?>";
            $.ajax({
                type: 'POST',
                url: url,
               success: function(response) {
                    var response = JSON.parse(response);
                    if (response.status === '1') {

                        //getReminders();

                        $("#reminderCount").text(0);
                        // $('#alertSuccess').trigger('click');
                        // Populate the cart view with the updated cart
                    
                    } else {
                        // $('#alertDanger').trigger('click');
                        // alert(response.message);
                    }
                    // $('.notification').text(response.message);
                },
                error: function() {
                    alert('An error occurred while updating the cart.');
                }
            });
        }


        function getOrderDetailByOrderNUmber(orderNum) {




            $('#orderDetailBody').html('');
            var orderDetailHtml = '';

            var cartTotalAmount = 0;





            var url = "<?php echo base_url('user/User/getOrderDetailByOrderNUmber'); ?>";

            // Create a FormData object
            var formData = new FormData();
            formData.append('orderNum', orderNum);


            $.ajax({
                url: url,
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    try {
                        response = JSON.parse(response);



                        if (response.length === 0) {
                            orderDetailHtml = '<p>Your cart is empty.</p>';

                        } else {

                            response.forEach(function(item) {
                                // cartTotalAmount = +(item.productPrice * item.quantity) + cartTotalAmount;

                                orderDetailHtml +=
                                    `<p>Product Name : <strong style="text-transform: capitalize">${item.name}</strong></p>
                <p>Product Price : <strong style="text-transform: capitalize">SAR ${item.price}</strong></p>
                <p>Product Quantity : <strong style="text-transform: capitalize">${item.quantity}</strong></p>
                <hr>
                `;
                            });

                            // cartTotalAmountView = 
                            //     `<div class="col-xxl-12 col-md-12">
                            //         <div class="card info-card revenue-card">
                            //             <div class="card-body text-center py-3">
                            //                 <p id="cartTotalAmount">Total Amount : <strong class="fs-1" id="cartTotal">${cartTotalAmount}</strong></p>
                            //             </div>
                            //         </div>
                            //     </div>`;
                        }

                        $('#orderDetailBody').html(orderDetailHtml);





                        //$('.notification').text(response.message);

                    } catch (e) {
                        alert(e);
                    }
                },
                error: function(e) {
                    alert('System Error !');
                }
            });



        }



        function updateCartView(cart) {
            $('#cartViewDiv').html('');
            var cartHtml = '';
            var viewCartHtml = '';
            var cartTotalAmount = 0;
            var cartTotalAmountView = '';

            if (cart.length === 0) {
                cartHtml = '<p>Your cart is empty.</p>';
                $('#checkout').hide();
            } else {
                $('#checkout').show();
                cart.forEach(function(item) {
                    cartTotalAmount = +(item.productPrice * item.quantity) + cartTotalAmount;

                    cartHtml +=
                        `<div class="col-xxl-6 col-md-6">
                    <div class="card info-card revenue-card">
                        <div class="card-body text-center py-3">
                         <img src="<?= base_url() . 'uploads/product/' ?>${item.productImage}" class="img-fluid text-center mb-3" style="height:100px">
                            <p>Name : <strong>${item.productName}</strong></p>
                            <p>Price : <strong class="fs-4">SAR ${item.productPrice}</strong></p>
                            <p>Quantity : <strong class="fs-4">${item.quantity}</strong></p>
                            <button class="btn btn-primary bg-light-orange increment-btn" type="button" data-product-id="${item.productId}"><i class="ri-add-box-fill me-1"></i></button>
                            <button class="btn btn-primary bg-sea-green decrement-btn" type="button" data-product-id="${item.productId}"><i class="ri-subtract-fill me-1"></i></button>
                            <button class="btn btn-danger remove-btn" data-product-id="${item.productId}"><i class="ri-delete-bin-6-fill me-1"></i></button>
                        </div>
                    </div>
                </div>`;
                });

                cartTotalAmountView =
                    `<div class="col-xxl-12 col-md-12">
                <div class="card info-card revenue-card">
                    <div class="card-body text-center py-3">
                        <p id="cartTotalAmount">Total Amount : <strong class="fs-1" id="cartTotal">${cartTotalAmount}</strong></p>
                    </div>
                </div>
            </div>`;
            }

            $('#cartViewDiv').html(cartHtml + cartTotalAmountView);
            $('#cartCount').html(cart.length);
            updateCartDisplay(cart);
        }


        function getReminders() {
    var url = "<?php echo base_url('user/User/getReminders'); ?>";
    
    fetch(url)
        .then(response => response.json())
        .then(rData => {
            // Update the reminder count
            $("#reminderCount").html(rData.unread_count);
            
            // Initialize the DataTable with headings and data
            window.datatable = new window.simpleDatatables.DataTable("#reminderTable", {
                data: {
                    headings: ["Goal Name", "Plan Type", "Reminder Date"], // Define the headings
                    data: rData.reminders.map(item => [item.name, item.planType, new Date(item.createdDate).toLocaleDateString()]) // Map data into rows
                }
            });

            // After the table has been populated, apply bold styling to unread reminders (isRead=0)
            const tableBody = document.querySelector("#reminderTable tbody");
            const rows = tableBody.querySelectorAll("tr");
            
            rows.forEach((row, index) => {
                const reminder = rData.reminders[index];
               // console.log(">>>>>", reminder.isRead)
                // Check if the reminder is unread (isRead=0)
                if (reminder.isRead === '0') {
                    row.style.fontWeight = "bold"; // Apply bold styling to unread rows
                    //console.log(row)
                }
                else {
                    row.style.fontWeight = "normal";
                }
            });
        })
        .catch(error => {
            console.error("Error fetching reminders:", error);
        });
}







        function updateRequestStatus(requestId, status) {
            var url = "<?php echo base_url('user/User/updateRequestStatus'); ?>";

            // Create a FormData object
            var formData = new FormData();
            formData.append('requestId', requestId);
            formData.append('status', status);

            $.ajax({
                url: url,
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    try {
                        response = JSON.parse(response);

                        if (response.status == '1') {
                            $('#alertSuccess').trigger('click');
                           reloadWithQueryParam('tab', 'request');
                        } else {
                            $('#alertDanger').trigger('click');
                        }

                        $('.notification').text(response.message);

                    } catch (e) {
                        alert(e);
                    }
                },
                error: function(e) {
                    alert('System Error !');
                }
            });
        }


        function deleteCard(cardId) {
            // Show confirmation dialog
            if (confirm("Are you sure you want to delete this card?")) {
                var url = "<?php echo base_url('user/User/deleteCard'); ?>";

                // Create a FormData object
                var formData = new FormData();
                formData.append('cardId', cardId);

                $.ajax({
                    url: url,
                    type: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        try {
                            response = JSON.parse(response);

                            if (response.status == '1') {
                                $('#alertSuccess').trigger('click');
                                reloadWithQueryParam('tab', 'request');
                            } else {
                                $('#alertDanger').trigger('click');
                            }

                            $('.notification').text(response.message);

                        } catch (e) {
                            alert(e);
                        }
                    },
                    error: function(e) {
                        alert('System Error!');
                    }
                });
            } else {
                // User clicked "Cancel"
                console.log("Card deletion canceled.");
            }
        }



        function reloadWithQueryParam(paramName, paramValue) {
            // $('#alertModalSuccess').modal('hide');
            var url = new URL(window.location.href);
            url.searchParams.set(paramName, paramValue);

            setTimeout(function() {
                $('#alertModalSuccess').modal('hide');
                location.reload();
            }, 2000); // 10 seconds delay
        }

        function withdrawMoney() {
            var form = $('#withdrawMoney').validate({
                rules: {
                    amount: {
                        required: true
                    }
                }
            });

            // Store the validator object
            if ($('#withdrawMoney').valid()) {
                // Submit using AJAX
                var url = "<?php echo base_url('user/User/withdrawMoney'); ?>";
                var formData = new FormData($("#withdrawMoney")[0]);
                formData.append('childId', childId);
                $.ajax({
                    url: url,
                    type: "POST",
                    data: formData,
                    async: false,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        try {
                            response = JSON.parse(response);

                            if (response.status == '1') {
                                $('#withdrawMoney #errorDiv').css("display", "none");
                                $('#btnClose').trigger('click');
                                $('#alertSuccess').trigger('click');
                                $('#withdrawMoney')[0].reset();

                                // Reload the page and activate the tab
                                reloadWithQueryParam('tab', 'childern');

                            } else {
                                $('#withdrawMoney #errorDiv').css("display", "block");
                                $('#withdrawMoney #error').text(response.message);
                            }

                            $('.notification').text(response.message);

                        } catch (e) {
                            alert(e);
                        }
                    },
                    error: function(e) {
                        alert('System Error !');
                    }
                });
            } else {
                form.focusInvalid();
            }
        }

        function updateProfile() {
            var form = $('#update').validate({
                rules: {
                    name: {
                        required: true,
                        minlength: 6

                    },
                    email: {
                        required: true

                    },
                    pass: {
                        required: true,
                        maxlength: 20,
                        minlength: 6


                    },
                    confirmPass: {
                        equalTo: "#pass"

                    },
                    phone: {
                        required: true,
                        maxlength: 11,
                        minlength: 11,
                        number: true

                    }
                },
                messages: {
                    confirmPass: "Password didn't match."
                }

            });
            //#store the validator obj
            if ($('#update').valid()) {

                // submit using ajax
                var url = "<?php echo base_url('user/User/updateProfile'); ?>";
                var formData = new FormData($("#update")[0]);
                $.ajax({
                    url: url,
                    type: "POST",
                    data: formData,
                    async: false,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        try {
                            response = JSON.parse(response);

                            if (response.status == '1') {

                                $('#alertSuccess').trigger('click');
                            } else {
                                $('#alertDanger').trigger('click');
                            }
                            $('.notification').text(response.message);

                        } catch (e) {
                            alert(e);
                        }
                    },
                    error: function(e) {
                        alert('System Error !');
                    }
                });

            }
            /*else {
                    // dont do anything
                    }*/

        }
    </script>