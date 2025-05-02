<!-- Tabs In Panel -->
<h4>Perfumes</h4>
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

                                    <form class="form-horizontal" id="add" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Name <span class="required">*</span> :</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="name" placeholder="Perfume Name" autocomplete="off" required />
                                            </div>
                                        </div>

                                        <!-- <div class="form-group">
        <label class="col-sm-3 control-label">Price <span class="required">*</span> :</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" name="price" placeholder="Perfume Price" autocomplete="off" required />
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-3 control-label">Description <span class="required">*</span> :</label>
        <div class="col-sm-9">
            <textarea class="form-control" name="description" placeholder="Perfume Description" autocomplete="off" required></textarea>
        </div>
    </div> -->

                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Components <span class="required">*</span> :</label>
                                            <div class="col-sm-9">
                                                <select class="form-control" name="ingredients[]" id="ingredients" multiple required>

                                                </select>
                                                <p class="help-block">Hold Ctrl (Windows) / Cmd (Mac) to select multiple.</p>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Risks/Diseases :</label>
                                            <div class="col-sm-9">
                                                <select class="form-control" name="risks[]" id="risks" multiple>

                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Alternatives :</label>
                                            <div class="col-sm-9">
                                                <select class="form-control" name="alternatives[]" id="alternatives" multiple>

                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Image * :</label>
                                            <div class="col-sm-9">
                                                <input type="file" class="form-control" name="image" id="image" required />
                                                <p class="help-block">Max size 1MB | Formats: PNG, JPG, GIF</p>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-sm-9 col-sm-offset-3">
                                                <button type="button" class="btn btn-primary bg-darkbrown" onclick="add();">Save</button>
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
                                <h3 class="panel-title">Perfumes</h3>
                            </header>
                            <div class="panel-body">
                                <table class="table dataTable table-hover table-striped width-full" data-plugin="dataTable" id="perfumesTable">
                                    <thead>
                                        <tr>
                                            <th>Image</th>
                                            <th>Name</th>
                                            <th>Components</th>
                                            <th>Risks</th>
                                            <th>Alternate</th>
                                            <!-- <th>Status</th> -->
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
                    <label class="col-sm-3 control-label">Name <span class="required">*</span> :</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="name" id="name" placeholder="Perfume Name" required />
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-sm-3 control-label">Ingredients <span class="required">*</span> :</label>
                    <div class="col-sm-9">
                        <select class="form-control" name="ingredients[]" id="ingredients" multiple required>

                        </select>
                        <p class="help-block">Hold Ctrl (Windows) / Cmd (Mac) to select multiple.</p>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label">Risks/Diseases :</label>
                    <div class="col-sm-9">
                        <select class="form-control" name="risks[]" id="risks" multiple>

                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label">Alternatives :</label>
                    <div class="col-sm-9">
                        <select class="form-control" name="alternatives[]" id="alternatives" multiple>

                        </select>
                    </div>
                </div>



                <!-- Image Upload -->
                <div class="form-group">
                    <label class="col-sm-3 control-label">Image <span class="required">*</span> :</label>
                    <div class="col-sm-9">
                        <input type="file" class="form-control" name="image" id="image" />
                        <p class="help-block">Max size 1MB | Formats: PNG, JPG, GIF</p>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label"></label>
                    <div class="col-sm-7">
                        <img src="" id="imagePreview" alt="Not Available" width="80px" height="40px" />
                    </div>
                </div>

                <input type="hidden" name="image2" id="image2" /> <!-- Store previous image if no new image is uploaded -->

                <div class="form-group">
                    <div class="col-sm-7 col-sm-offset-3">
                        <button type="button" class="btn btn-primary bg-darkbrown" onclick="editPerfume();">Save</button>
                    </div>
                </div>



            </div>
        </form>
    </div>
</div>
<!-- End Modal -->


<!-- product Modal -->
<div class="modal fade" id="productDetailModal" aria-hidden="false" aria-labelledby="exampleFormModalLabel" role="dialog" tabindex="-1">
    <div class="modal-dialog">
        <form class="modal-content form-horizontal" id="edit">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" id="closeEditModal">×</span>
                </button>
                <h4 class="modal-title" id="exampleFormModalLabel">Perfume Detail</h4>
            </div>
            <div class="modal-body">


                <label class="col-sm-3 control-label"></label>
                <div class="col-sm-7">
                    <img src="" id="imagePreview" alt="Not Avaliable" height="300px" />
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label"></label>
                <div class="col-sm-7">
                    <span> Name :</span>
                    <p id="name"></p>
                    <hr>
                    Price : <p id="price"></p>
                    <hr>
                    Description : <p id="description"></p>
                </div>
            </div>

    </div>
    </form>
</div>
</div>
<!-- End Modal -->




<script type="text/javascript">
    $(document).ready(function() {
        loadDropdownData("#add");
        getPerfumes();
    });


    function add() {
        var formData = new FormData($('#add')[0]);

        // Convert multiple select values to JSON strings
        var ingredients = $('select[name="ingredients[]"]').val() || [];
        var risks = $('select[name="risks[]"]').val() || [];
        var alternatives = $('select[name="alternatives[]"]').val() || [];

        formData.append('ingredients', JSON.stringify(ingredients));
        formData.append('risks', JSON.stringify(risks));
        formData.append('alternatives', JSON.stringify(alternatives));

        $.ajax({
            url: "<?= base_url('admin/Perfume/add'); ?>", // Adjust based on your route
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                response = JSON.parse(response);
                $('#alert').trigger('click');

                if (response.status === "success") {
                    $('#add')[0].reset(); // Reset the form
                    getPerfumes();

                    // Show success message
                    $('#notification').removeClass('alert-danger').addClass('alert-success');
                    $('#notification').text(response.message);

                    // Switch to view tab after adding
                    $('#viewtab').trigger("click");
                } else {
                    // Show error message
                    $('#notification').removeClass('alert-success').addClass('alert-danger');
                    $('#notification').text(response.message);
                }

                // Ensure the notification is visible
                $('#notification').show();
            },
            error: function(xhr) {
                alert('Error: ' + xhr.responseText);
            }
        });
    }



    function editPerfume() {
        var formData = new FormData($('#edit')[0]);

        // Convert multiple select values to JSON strings


        var ingredients = $('#edit select[name="ingredients[]"]').val() || [];
        var risks = $('#edit select[name="risks[]"]').val() || [];
        var alternatives = $('#edit select[name="alternatives[]"]').val() || [];



        formData.append('ingredients', JSON.stringify(ingredients));
        formData.append('risks', JSON.stringify(risks));
        formData.append('alternatives', JSON.stringify(alternatives));

        $.ajax({
            url: "<?= base_url('admin/Perfume/editPerfume'); ?>", // Adjust based on your route
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {

                response = JSON.parse(response);

                $("#exampleFormModal").modal("hide");
                $('#alert').trigger('click');
                if (response.status === "success") {
                    $('#edit')[0].reset();
                    getPerfumes();

                    $('#notification').removeClass('alert alert-danger');
                    $('#notification').addClass('alert alert-success');
                    $('#viewtab').trigger("click");
                } else {

                    $('#notification').removeClass('alert alert-success');
                    $('#notification').addClass('alert alert-danger');

                }

                $('#notification').text(response.message);
                $('#viewTab').trigger('click');



            },
            error: function(xhr) {
                alert('Error: ' + xhr.responseText);
            }
        });
    }


    function getPerfumeDetails(perfumeId) {

        // ✅ Load dropdown options
        loadDropdownData("#edit");
        $.ajax({
            url: "<?php echo base_url('admin/Perfume/getPerfumeDetails'); ?>",
            type: "POST",
            data: {
                id: perfumeId
            },
            dataType: "json",
            success: function(response) {
                if (response.success) {

                    $("#id").val(response.data.PerfumeID);
                    $("#name").val(response.data.Name);
                    $("#image2").val(response.data.Image);

                    if (response.data.Image) {
                        $("#imagePreview").attr("src", "<?php echo base_url('uploads/perfumes/'); ?>" + response.data.Image);
                    } else {
                        $("#imagePreview").attr("src", "");
                    }

                    // ✅ Ensure `ingredients`, `risks`, and `alternatives` are arrays of IDs (as strings for consistency)
                    let ingredients = Array.isArray(response.data.ingredients) ?
                        response.data.ingredients.map(item => String(item.id)) :
                        [];

                    let risks = Array.isArray(response.data.risks) ?
                        response.data.risks.map(item => String(item.id)) :
                        [];

                    let alternatives = Array.isArray(response.data.alternatives) ?
                        response.data.alternatives.map(item => String(item.id)) :
                        [];



                    // ✅ Select Matching Options
                    $("#edit #ingredients option").each(function() {
                        $(this).prop("selected", ingredients.includes($(this).val()));
                    });

                    $("#edit #risks option").each(function() {
                        $(this).prop("selected", risks.includes($(this).val()));
                    });

                    $("#edit #alternatives option").each(function() {
                        $(this).prop("selected", alternatives.includes($(this).val()));
                    });



                    // ✅ Ensure Multi-Select UI Updates
                    $("#edit #ingredients, #edit #risks, #edit #alternatives").trigger("change");

                    // Show Modal
                    $("#exampleFormModal").modal("show");
                } else {
                    alert("Failed to fetch perfume details.");
                }
            },
            error: function() {
                alert("Error fetching perfume details.");
            }
        });
    }


    function loadDropdownData(container) {
        // console.log(container +  " #ingredients");
        $.ajax({
            url: "<?= base_url('admin/Perfume/getDropdownData'); ?>",
            type: "GET",
            dataType: "json",
            success: function(response) {
                populateDropdown(container + " #ingredients", response.ingredients);
                populateDropdown(container + " #risks", response.risks);
             populateDropdown(container + " #alternatives", response.alternatives);
            },
            error: function() {
                alert("Failed to fetch dropdown data.");
            }
        });
    }

    function populateDropdown(selector, data) {
        $(selector).empty();
        $.each(data, function(index, item) {
            $(selector).append(new Option(item.name, item.id));
        });
    }



    function getPerfumes() {
        var url = "<?php echo base_url('admin/Perfume/getAllPerfumes'); ?>";
        var image_url = "<?php echo base_url('uploads/perfume/'); ?>";

        $.ajax({
            url: url,
            type: "GET",
            success: function(response) {
                try {
                    $('#perfumesTable').dataTable().fnClearTable();
                    response = JSON.parse(response);

                    $.each(response, function(key, perfume) {
                        var image = perfume.Image ?
                            `<a style="cursor: pointer;" onclick="getPerfumeDetails(${perfume.PerfumeID})">
                            <img src="${image_url}/${perfume.Image}" width="80px" height="40px">
                           </a>` :
                            "N/A";

                        // ✅ Extract names from objects (id, name)
                        var ingredients = perfume.ingredients.length ?
                            perfume.ingredients.map(item => item.name).join(', ') :
                            "N/A";

                        var risks = perfume.risks.length ?
                            perfume.risks.map(item => item.name).join(', ') :
                            "None";

                        var alternatives = perfume.alternatives.length ?
                            perfume.alternatives.map(item => item.name).join(', ') :
                            "No alternative available";

                        $('#perfumesTable').dataTable().fnAddData([
                            image,
                            perfume.Name,
                            `<td>${ingredients}</td>`,
                            `<td>${risks}</td>`,
                            `<td>${alternatives}</td>`,
                            `<td>
                            <a onclick='deletePerfume(this)' href='#' data-id="${perfume.PerfumeID}">
                                <i class='image wb-trash'></i>
                            </a> |  
                            <a href='javascript:void(0);' onclick="getPerfumeDetails(${perfume.PerfumeID})" data-id="${perfume.PerfumeID}">
                                <i class='image wb-edit'></i>
                            </a>
                        </td>`
                        ]);
                    });

                } catch (e) {
                    alert("Error parsing response: " + e);
                }
            },
            error: function() {
                alert("System Error!");
            }
        });
    }



    function status(event) {
        var check;
        var id = $(event).attr("data-id");
        var url = "<?php echo base_url("admin/Product/status"); ?>";
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
                        getProducts();
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

    function deletePerfume(event) {


        if (confirm('Are you sure to delete this item ?')) {
            var id = $(event).attr("data-id");
            var url = "<?php echo base_url("admin/Perfume/deletePerfume"); ?>";
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
                        if (response.status == 'success') {
                            $('#notification').removeClass('alert alert-danger');
                            $('#notification').addClass('alert alert-success');
                            getPerfumes();
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





    $('#add input').keypress(function(event) {
        if (event.keyCode === 13) {
            event.preventDefault();
            add();
        }
    });

    $('#edit input').keypress(function(event) {
        if (event.keyCode === 13) {
            event.preventDefault();
            edit();
        }
    });
</script>