<!-- Tabs In Panel -->
<div class="row">
    <div class="col-lg-12">
        <!-- Example Tabs Inverse -->
        <div class="example-wrap">
            <div class="nav-tabs-horizontal nav-tabs-inverse">
                <ul class="nav nav-tabs" data-plugin="nav-tabs" role="tablist">
                    <li class="active" role="presentation">
                        <a data-toggle="tab" href="#exampleTabsInverseOne" aria-controls="exampleTabsInverseOne" role="tab">
                            Add
                        </a>
                    </li>
                    <li role="presentation">
                        <a data-toggle="tab" href="#exampleTabsInverseTwo" aria-controls="exampleTabsInverseTwo" role="tab" id="viewtab">
                            View
                        </a>
                    </li>
                </ul>
                <div class="tab-content padding-20">
                    <div class="tab-pane active" id="exampleTabsInverseOne" role="tabpanel">
                        <div class="clearfix hidden-xs"></div>

                        <div class="col-sm-12 col-md-6">
                            <!-- Example Horizontal Form -->
                            <div class="example-wrap">
                                <!--<h4 class="example-title">Horizontal Form</h4>-->
                                <div class="example">
                                    <form class="form-horizontal" id="add">
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">First Name <span class="required">*</span> : </label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="firstName" placeholder="First Name" autocomplete="off" />
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Last Name <span class="required">*</span> : </label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="lastName" placeholder="Last Name" autocomplete="off" />
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Email <span class="required">*</span> : </label>
                                            <div class="col-sm-9">
                                                <input type="email" class="form-control" name="email" placeholder="Email" autocomplete="off" />
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Password <span class="required">*</span> : </label>
                                            <div class="col-sm-9">
                                                <input type="password" class="form-control" name="pass" id="pass" placeholder="Password" autocomplete="off" />
                                                <p class="help-block">Password must contain 6 characters at least one uppercase letter, one lowercase letter, and one special character.</p>

                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Confrim Pass <span class="required">*</span> : </label>
                                            <div class="col-sm-9">
                                                <input type="password" class="form-control" name="confirmPass" placeholder="Confirm Password" autocomplete="off" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">DOB <span class="required">*</span> : </label>
                                            <div class="col-sm-9">
                                                <input type="date" class="form-control" name="dob" placeholder="" autocomplete="off" />

                                                <p class="help-block">Age should be greater than 18 years.</p>
                                            </div>
                                        </div>


                                        <!-- <div class="form-group">
                                            <label class="col-sm-3 control-label">Email <span class="required">*</span> : </label>
                                            <div class="col-sm-9">
                                                <input type="email" class="form-control" name="email" placeholder="" autocomplete="off" />
                                            </div>
                                        </div>-->
                                        

                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Gender <span class="required">*</span> : </label>
                                            <div class="col-sm-9">
                                                <select class="form-control" name="gender" id="gender">
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                    <!-- <option value="Transgender">Transgender</option> -->
                                                </select>
                                            </div>
                                        </div>



                                        <div class="form-group">
                                            <div class="col-sm-9 col-sm-offset-3">
                                                <button type="button" class="btn btn-primary bg-darkbrown" onclick="addUser();">Save </button>
                                                <button type="reset" class="btn btn-default btn-outline">Reset</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- End Example Horizontal Form -->
                        </div>
                    </div>

                    <div class="tab-pane" id="exampleTabsInverseTwo" role="tabpanel">
                        <!-- Panel Basic -->
                        <div class="panel">
                            <header class="panel-heading">
                                <div class="panel-actions"></div>
                                <h3 class="panel-title">Users</h3>
                            </header>
                            <div class="panel-body">
                                <table class="table dataTable table-hover table-striped width-full" data-plugin="dataTable" id="users">
                                    <thead>
                                        <tr>
                                            <th>Sr#</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Email</th>
                                            <th>DOB</th>
                                           <th>Gender</th>
                                            <th>Created Date</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- End Panel Basic -->
                    </div>
                </div>
            </div>
        </div>
        <!-- End Example Tabs Inverse -->
    </div>
    <div class="clearfix visible-lg-block"></div>
    <!-- End Example Tabs Solid Left Inverse -->
</div>
<!-- End Tabs With Inverse -->
<button class="btn btn-outline btn-default" data-target="#exampleNiftyFadeScale" data-toggle="modal" type="button" id="alert" style="display: none;"></button>

<!-- Modal -->
<div class="modal fade modal-fade-in-scale-up" id="exampleNiftyFadeScale" aria-hidden="true" aria-labelledby="exampleModalTitle" role="dialog" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title">Notification</h4>
            </div>
            <div class="modal-body">
                <p id="notification"></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default margin-0" data-dismiss="modal">Ok</button>
            </div>
        </div>
    </div>
</div>
<!-- End Modal --> <button class="btn btn-primary" data-target="#exampleFormModal" data-toggle="modal" type="button" style="display: none;" id="editAlert"></button>

<!-- Modal -->
<div class="modal fade" id="exampleFormModal" aria-hidden="false" aria-labelledby="exampleFormModalLabel" role="dialog" tabindex="-1">
    <div class="modal-dialog">
        <form class="modal-content form-horizontal" id="edit">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" id="closeEditModal">×</span>
                </button>
                <h4 class="modal-title" id="exampleFormModalLabel">Edit</h4>
            </div>
            <div class="modal-body">

                <input type="hidden" name="id" id="id" />
                <div class="form-group">
                    <label class="col-sm-3 control-label">First Name <span class="required">*</span> : </label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" name="firstName" id="firstName" placeholder="First Name" autocomplete="off" />
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-sm-3 control-label">Last Name <span class="required">*</span> : </label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" name="lastName" id="lastName" placeholder="Last Name" autocomplete="off" />
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label">Email<span class="required">*</span> : </label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" name="email" id="email" placeholder="email" autocomplete="off" />
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label">Password <span class="required"></span> : </label>
                    <div class="col-sm-7">
                        <input type="password" class="form-control" name="pass" id="pass2" placeholder="Password" autocomplete="off" />
                        <p class="help-block">Password must contain 6 characters at least one uppercase letter, one lowercase letter, and one special character.</p>

                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label">Confrim Pass <span class="required"></span> : </label>
                    <div class="col-sm-7">
                        <input type="password" class="form-control" name="confirmPass" id="confirmPass" placeholder="Confirm Password" autocomplete="off" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">DOB<span class="required">*</span> : </label>
                    <div class="col-sm-7">
                        <input type="date" class="form-control" name="dob" id="dob" placeholder="" autocomplete="off" />

                        <p class="help-block">Age should be greater than 18 years old.</p>

                    </div>
                </div>

                <!-- 
                <div class="form-group">
                                            <label class="col-sm-3 control-label">Email <span class="required">*</span> : </label>
                                            <div class="col-sm-9">
                                                <input type="email" class="form-control" name="email" id="email" placeholder="" autocomplete="off" />
                                            </div>
                                        </div>-->
                                    


                <div class="form-group">
                    <label class="col-sm-3 control-label">Gender <span class="required">*</span> : </label>
                    <div class="col-sm-7">
                        <select class="form-control" name="gender" id="gender">
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Transgender">Transgender</option>
                        </select>
                    </div>
                </div>


                <div class="form-group" id="errorDiv">
                    <label class="col-sm-3 control-label"></label>
                    <div class="col-sm-7">
                        <p id="error" class="error"></p>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-7 col-sm-offset-3">
                        <button type="button" class="btn btn-primary" onclick="editUser();">Save </button>
                        <!--<button type="reset" class="btn btn-default btn-outline">Reset</button>-->
                    </div>
                </div>

            </div>
        </form>
    </div>
</div>
<!-- End Modal -->
<script type="text/javascript">
    $(document).ready(function() {

        getUsers();
    });

    function addUser() {
        $.validator.addMethod("passwordCheck", function(value, element) {
            return this.optional(element) ||
                /[A-Z]/.test(value) // at least one uppercase letter
                &&
                /[a-z]/.test(value) // at least one lowercase letter
                &&
                /[!@#$%^&*(),.?":{}|<>]/.test(value); // at least one special character
        }, "Password must contain at least one uppercase letter, one lowercase letter, and one special character.");

        $.validator.addMethod("ageCheck", function(value, element) {
    var dob = new Date(value);
    var today = new Date();
    var age = today.getFullYear() - dob.getFullYear();
    var month = today.getMonth() - dob.getMonth();

    if (month < 0 || (month === 0 && today.getDate() < dob.getDate())) {
        age--;
    }

    return age >= 18; // Ensures the age is 18 or older
}, "You must be at least 18 years old.");


        var form = $('#add').validate({
            rules: {
                firstName: {
                    required: true

                },
                lastName: {
                    required: true

                },
                pass: {
                    required: true,
                    maxlength: 30,
                    minlength: 6,
                    passwordCheck: true


                },
                confirmPass: {
                    equalTo: "#pass"

                },
                dob: {
                    required: true,
                    ageCheck: true
                },
                gender: {
                    required: true,
                },

                email: {
                    required: true,
                    email:true
                }


            },
            messages: {
                confirmPass: "Password didn't match.",
                pattern: "Password must contain at least one uppercase letter, one lowercase letter, and one special character."
            }

        });
        //#store the validator obj
        if ($('#add').valid()) {

            // submit using ajax
            var url = "<?php echo base_url('admin/User/addUser'); ?>";
            var formData = new FormData($("#add")[0]);
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
                        $('#alert').trigger('click');
                        if (response.status == '1') {
                            $('#notification').removeClass('alert alert-danger');
                            $('#notification').addClass('alert alert-success');
                            $('#viewtab').trigger("click");
                            getUsers();
                            $('#add')[0].reset();
                        } else {
                            $('#notification').removeClass('alert alert-success');
                            $('#notification').addClass('alert alert-danger');
                        }
                        $('#notification').text(response.message);
                        $('#viewTab').trigger('click');

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

    function getUsers() {
        var check;
        var stat;
        var srNo = 0;
        var url = "<?php echo base_url("admin/User/getUsers"); ?>";
        $.ajax({
            url: url,
            success: function(response) {
                try {
                    $('#users').dataTable().fnClearTable();
                    response = JSON.parse(response);
                    $.each(response, function(key, value) {
                        srNo++;
                        if (value.isActive == '1') {
                            check = "checked";
                            stat = "Active";
                        } else {
                            check = "";
                            stat = "In-Active";
                        }
                        var table = $('#users').dataTable().fnAddData([
                            srNo,
                            value.firstName,
                            value.lastName,
                            value.email,
                            value.dob,
                            value.gender,
                            value.createdDateTime,
                            "<td><input type='checkbox' data-id='" + value.id + "' id='" + value.id + "'  " + check + " onclick='userStatus(this)'>| " + stat + "</td>",
                            "<td><a onclick='deleteUser(this)' href='#' data-id='" + value.id + "' id='" + value.id + "'><i class='icon wb-trash'></i></a>  |  <a href='javascript:void(0);' onclick='edit(this);' data-id='" + value.id + "'><i class='icon wb-edit'></i></a></td>"

                        ]);

                        var nTr = $('#users').dataTable().fnSettings().aoData[table[0]].nTr;

                        if (value.status == '1')
                            nTr.className = "";
                        else if (value.status == '0')
                            nTr.className = "inactive-bg";
                    });
                } catch (e) {
                    alert(e);
                }
            },
            error: function() {
                alert("System Error !");
            }
        });
    }

    function userStatus(event) {
        var check;
        var id = $(event).attr("data-id");
        var url = "<?php echo base_url("admin/User/userStatus"); ?>";
        var status = '';
        if ($('#' + id).is(':checked'))
            status = '1';
        else
            status = '0';
        $.ajax({
            url: url,
            type: "POST",
            data: {
                ID: id,
                STATUS: status
            },
            success: function(response) {
                try {
                    response = JSON.parse(response);
                    $('#alert').trigger('click');
                    if (response.status == '1') {
                        $('#notification').removeClass('alert alert-danger');
                        $('#notification').addClass('alert alert-success');
                        getUsers();
                    } else {
                        $('#notification').removeClass('alert alert-success');
                        $('#notification').addClass('alert alert-danger');
                    }
                    $('#notification').text(response.message);

                } catch (e) {
                    alert(e);
                }
            },
            error: function() {
                alert("System Error !");
            }
        });
    }

    function deleteUser(event) {


        if (confirm('Are you sure to delete this user ?')) {
            var id = $(event).attr("data-id");
            var url = "<?php echo base_url("admin/User/deleteUser"); ?>";
            $.ajax({
                url: url,
                type: "POST",
                data: {
                    ID: id
                },
                success: function(response) {
                    try {
                        $('#alert').trigger('click');
                        response = JSON.parse(response);
                        if (response.status == '1') {
                            $('#notification').removeClass('alert alert-danger');
                            $('#notification').addClass('alert alert-success');
                            getUsers();
                        } else {
                            $('#notification').removeClass('alert alert-success');
                            $('#notification').addClass('alert alert-danger');
                        }
                        $('#notification').text(response.message);
                    } catch (e) {
                        alert(e);
                    }
                },
                error: function() {
                    alert("System Error !");
                }
            });
        }
    }

    function edit(event) {
        $('#editAlert').trigger('click');
        var id = $(event).attr("data-id");
        var url = "<?php echo base_url('admin/User/getSpecificUser'); ?>";
        $.ajax({
            url: url,
            type: "POST",
            data: {
                ID: id
            },
            success: function(response) {
                try {
                    response = JSON.parse(response);
                    $('#id').val(response[0]['id']);
                    $('#firstName').val(response[0]['firstName']);
                    $('#lastName').val(response[0]['lastName']);
                    $('#dob').val(response[0]['dob']);
                   // $('#userName').val(response[0]['userName']);
                    $('#edit #gender').val(response[0]['gender']);
                     $('#email').val(response[0]['email']);
        
                } catch (e) {
                    alert(e);
                }
            },
            error: function(e) {
                alert('System Error !');
            }
        });
    }

    function editUser() {

        $.validator.addMethod("passwordCheck", function(value, element) {
            return this.optional(element) ||
                /[A-Z]/.test(value) // at least one uppercase letter
                &&
                /[a-z]/.test(value) // at least one lowercase letter
                &&
                /[!@#$%^&*(),.?":{}|<>]/.test(value); // at least one special character
        }, "Password must contain at least one uppercase letter, one lowercase letter, and one special character.");

        $.validator.addMethod("ageCheck", function(value, element) {
    var dob = new Date(value);
    var today = new Date();
    var age = today.getFullYear() - dob.getFullYear();
    var month = today.getMonth() - dob.getMonth();

    if (month < 0 || (month === 0 && today.getDate() < dob.getDate())) {
        age--;
    }

    return age >= 18; // Ensures the age is 18 or older
}, "You must be at least 18 years old.");

        var form = $('#edit').validate({
            rules: {
                firstName: {
                    required: true

                },
                lastName: {
                    required: true

                },
                pass: {
                    maxlength: 30,
                    minlength: 6,
                    passwordCheck: true
                },
                confirmPass: {
                    equalTo: "#pass2"
                },
                dob: {
                    required: true,
                    ageCheck: true

                },
                gender: {
                    required: true,
                },
                email: {
                    required: true,
                   email:true
                }
            },
            messages: {
                confirmPass: "Password didn't match.",
                pattern: "Password must contain at least one uppercase letter, one lowercase letter, and one special character."
            }

        });

        if ($('#edit').valid()) {

            var url = "<?php echo base_url('admin/User/editUser'); ?>";
            var formData = new FormData($("#edit")[0]);
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
                            $('#errorDiv').css("display", "none");
                            $('#closeEditModal').trigger('click');
                            $('#alert').trigger('click');
                            $('#notification').removeClass('alert alert-danger');
                            $('#notification').addClass('alert alert-success');
                            $('#notification').text(response.message);
                            getUsers();
                            $('#edit')[0].reset();
                        } else {
                            $('#errorDiv').css("display", "block");
                            $('#error').text(response.message);
                            /*$('#notification').removeClass('alert alert-success');
                             $('#notification').addClass('alert alert-danger');*/
                        }

                    } catch (e) {
                        alert(e);
                    }
                },
                error: function(e) {
                    alert('System Error !');
                }
            });
        }
    }

    $('#add input').keypress(function(event) {
        if (event.keyCode === 13) {
            event.preventDefault();
            addUser();
        }
    });

    $('#edit input').keypress(function(event) {
        if (event.keyCode === 13) {
            event.preventDefault();
            editUser();
        }
    });
</script>