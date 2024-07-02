@extends('backend.layout.master')
@push('title')
    Skill | {{config('app.name')}}
@endpush

@section('content')
    <!-- Start container-fluid-->
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Skills</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb p-0 m-0">
                            <li class="breadcrumb-item"><a>{{config('app.name')}}</a></li>
                            <li class="breadcrumb-item active">Skill</li>
                        </ol>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <!--Widget-4 -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title float-left mt-3">All Skill</h3>

                        <button id="addNew" class=" btn btn-primary float-right"> Add Skill </button>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <!-- Search Area start -->
                            <div class="col-md-12 col-sm-12 col-12 mb-5 border p-3 search_area ">
                                <div class="row">
                                    <!--Type -->
                                    <div class="form-group col-md-4">
                                        <label for="search_from_date">Created Between: <span class="text-primary font-weight-bold">From</span></label>
                                        <input id="search_from_date" name="search_from_date"  type="date"  value="" class="form-control">
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="search_to_date">Created Between: <span class="text-primary font-weight-bold">To</span></label>
                                        <input id="search_to_date" name="search_to_date"  type="date"  value="" class="form-control">
                                    </div>



                                    <div class="form-group col-md-4">
                                        <label for="search_name">Search By:</label>
                                        <input id="search_name" name="search_name"  type="text"  placeholder=" name" class="form-control">
                                    </div>

                                </div>
                                <div class="row justify-content-end">
                                    <!-- Button -->
                                    <div class="form-group col-md-3">
                                        <input class="btn btn-outline-purple  form-control" type="button" id="btnSearch" value="Filter">
                                    </div>

                                    <div id="resetDiv" class="form-group col-md-3" style="display: none">
                                        <input class="btn btn-dark  form-control" type="button" id="btnReset" value="Reset">
                                    </div>
                                </div>

                            </div>
                            <!-- Search Area End -->

                            <div class="col-md-12 col-sm-12 col-12">
                                <table id="userTable" class="table table-striped table-bordered nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%; ">
                                    <thead>
                                    <tr>
                                        <th>SL No.</th>
                                        <th>Name</th>
                                        <th>Percentage</th>
                                        <th>Created On</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>


                                </table>

                            </div>
                            <!-- Add  Modal Start --->
                            <div id="myModal" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
                                <div class="modal-dialog modal-xl">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title"></h5>
                                            <button onclick="myFormReset()" type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12 col-12 p-3">

                                                    <form id="myForm">
                                                        @csrf
                                                        @method("POST")
                                                        <div class="row">
                                                            <div class="form-group col-md-12">
                                                                <label for="name">Name <span class="text-danger">*</span></label>
                                                                <input id="name" placeholder="Name" value="" type="text" name="name" class="form-control">
                                                            </div>

                                                            <div class="form-group col-md-6">
                                                                <label for="percentage">Percentage <span class="text-danger">*</span></label>
                                                                <input id="percentage" name="percentage" placeholder="Percentage" value="" type="number"  min="1" max="100" class="form-control">
                                                            </div>

                                                            <div class="form-group col-md-6">
                                                                <label for="status">Status <span class="text-danger">*</span></label>
                                                                <select id="status" name="status" class="form-control">
                                                                    <option value="1">Active</option>
                                                                    <option value="2">Inactive</option>
                                                                </select>
                                                            </div>

                                                            <div class="form-group col-md-6 text-center">
                                                                <input type="hidden" name="action" id="action" value="addNew">
                                                                <input type="hidden" name="skill_id" id="skill_id">
                                                                <input type="submit" name="saveBtn" id="saveBtn" class="col-12 btn btn-success btn-md" value="Save">
                                                            </div>

                                                            <div class="form-group col-md-6 text-center">
                                                                <button onclick="myFormReset()" type="button" class="col-12 btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                                                            </div>
                                                        </div>

                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- /.modal -->
                            <!-- Add  Modal End  -->

                            <!-- View Modal Start --->
                            <div id="showModal" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title"></h5>
                                            <button onclick="myFormRest()" type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <table id="showTable" class="table table-bordered table-striped ">
                                                    </table>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button onclick="myFormRest()" type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- /.modal -->
                            <!-- View Modal Modal End  -->

                            <!-- Delete Modal  Start -->
                            <div id="confirmModal" class="modal fade bs-example-modal-center" tabindex="-1" role="dialog" aria-labelledby="myCenterModalLabel" aria-hidden="true" style="display: none;">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="myCenterModalLabel">Confirmation</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                        </div>
                                        <div class="modal-body">
                                            <h4 align="center" style="margin:0;color: indianred;">Are you sure you want to remove this data (<span id="deleteValueName"></span>)?</h4>
                                        </div>
                                        <div class="modal-footer">
                                            <form class="deleteById" id="deleteById">
                                                @csrf
                                                @method('DELETE')
                                                <input type="hidden" name="skillId" value="" id="skillId" />
                                                <button id="okBtn" type="submit" name="edit" class="delete btn btn-danger">OK</button>
                                            </form>
                                            <!-- <button type="button" name="ok_button" id="ok_button" class="btn btn-danger">OK</button> -->
                                            <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Cancel</button>
                                        </div>
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div><!-- /.modal -->
                            <!-- Delete Modal  End -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->

    </div>
    <!-- end container-fluid -->
@endsection


@section('extraJs')

    <script>
        $(document).ready(function() {
            addNewModalShow();
            renderViewDataTable();
            submitForm();
            editModalShow();
            showModalShow();
            changeStatus();
            confirmDeleteModalShow();
            deleteData();
        });

        function myFormReset() {
            $('#myForm')[0].reset();
        }

        function addNewModalShow() {
            $('#addNew').click(function() {
                myFormReset();
                $('.modal-title').text('Add Skill');
                $('#action').val('addNew');
                $('#myForm input[name="_method"]').val('POST');
                $('#myModal').modal({
                    backdrop: 'static',
                    keyboard: false,
                },'show');

            });
        }

        function renderViewDataTable() {
            $('#userTable').DataTable({
                ordering: false, // disable sorting for all columns
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('admin.skillView') }}",
                    data: function (d) {
                        d.searchFromDate = document.getElementById("search_from_date").value;
                        d.searchToDate = document.getElementById("search_to_date").value;
                        d.searchName = document.getElementById("search_name").value;
                    }
                },
                columns: [
                    {
                        data: 'DT_RowIndex',
                        searchable: false,
                        bSortable:false,
                    },
                    {
                        data: 'name',
                    },
                    {
                        data: 'percentage',
                    },
                    {
                        data: 'formatted_created_at',
                    },
                    {
                        data: 'statusBtn',
                        orderable: false,
                        searchable: false,
                    },

                    {
                        data: 'actionBtn',
                        searchable: false,
                        orderable: false,
                    },
                ]
            });
            $('#btnSearch').click(function(){
                $('#userTable').DataTable().draw(true);
                $('#resetDiv').css('display','revert');
            });
        }

        $('#btnReset').click(function(){
            $('#search_name').val('');
            $('#search_from_date').val('');
            $('#search_to_date').val('');
            $('#search_designation').val('');
            $('#userTable').DataTable().ajax.reload();
            $('#resetDiv').css('display','none');
        });


        function submitForm() {
            $('#myForm').on('submit', function(e) {
                e.preventDefault();

                let url = "{{route('admin.skill.store')}}"

                if ($('#action').val() === 'edit') {
                    let skillId = $('#skill_id').val();
                    url = "{{ route('admin.skill.update',['skill' => '__skillId']) }}";
                    url = url.replace("__skillId", skillId);
                }

                let formData = new FormData(this);


                $.ajax({
                    url: url,
                    type: "post",
                    dataType: "json",
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: formData,
                    complete: function(data) {
                        if (data.status === 422) {
                            $.each(data.responseJSON.errors, function(key, value) {
                                console.log(value);
                                errorMessage(value);
                            });
                            return;
                        }

                        if (data.status >= 400) {
                            errorMessage(data.responseJSON.message);
                            return;
                        }

                        successMessage(data.responseJSON.message);
                        myFormReset();
                        $('#userTable').DataTable().ajax.reload();
                        $('#myModal').modal('hide');

                    },
                });

            });

        }

        function editModalShow() {
            $(document).on('click', '.edit', function() {
                let skillId = $(this).data('skill-id');
                let url = "{{ route('admin.skill.getSkillById',['skill' => '__skillId']) }}";
                url = url.replace("__skillId", skillId);

                $.ajax({
                    url: url,
                    type: "get",
                    dataType: "json",
                    complete: function(data) {

                        let skill = data.responseJSON.skill;

                        $('#myForm input[name="_method"]').val('PATCH');
                        $('#name').val(skill.name);
                        $('#status').val(skill.status).trigger('change');
                        $('#percentage').val(skill.percentage);
                        $('#skill_id').val(skillId);
                        $('#action').val('edit');

                        $('.modal-title').text('Edit Skill Data');
                        $('#myModal').modal({
                            backdrop: 'static',
                            keyboard: false,
                        },'show');

                    }
                })
            });

        }


        function showModalShow() {
            $(document).on('click', '.showDetails', function() {
                let skillId = $(this).data('skill-id');
                let showTable = $('#showTable');
                showTable.html('');
                let url = "{{ route('admin.skill.getSkillById',['skill' => '__skillId']) }}";
                url = url.replace("__skillId", skillId);

                $.ajax({
                    url: url,
                    type: "get",
                    dataType: "json",
                    complete: function(data) {
                        let skill = data.responseJSON.skill;
                        let status = skill.status === 1 ? 'Active' : 'Inactive';
                        let html = '<tr><th> Name</th><td>' + skill.name + '</td></tr>';
                        html += '<tr><th>Percentage </th><td>' + skill.percentage  + '</td></tr>';
                        html += '<tr><th>Status</th><td>' + status + '</td></tr>';
                        showTable.html(html);

                        $('.modal-title').text('Skill Details');

                        $('#showModal').modal({
                            backdrop: 'static',
                            keyboard: false,
                        },'show');
                    }
                })
            });

        }


        function changeStatus() {
            $(document).on('submit', '.statusChangeById', function(e) {
                e.preventDefault();
                $.ajax({
                    type: 'post',
                    url: '{{route("admin.skill.skillStatusChangeById")}}',
                    data: $(this).serialize(),
                    dataType: 'json',
                    complete: function(data) {
                        if (data.status >= 400) {
                            errorMessage(data.responseJSON.message);
                            return;
                        }
                        successMessage(data.responseJSON.message);
                        $('#userTable').DataTable().ajax.reload();
                    }
                })

            });
        }


        function confirmDeleteModalShow() {
            $(document).on('click', '.delete', function() {
                let skillId = $(this).data('skill-id');
                let deleteValueName = $(this).data('skill-name');
                $('#skillId').val(skillId);
                $('#deleteValueName').text(deleteValueName);
                $('.modal-title').text('Confirmation');
                $('#confirmModal').modal('show');
            });
        }

        function deleteData() {
            $(".deleteById").click(function(e) {
                e.preventDefault();

                $.ajax({
                    type: 'post',
                    url: '{{route("admin.skill.skillDeleteById")}}',
                    data: $(this).serialize(),
                    dataType: 'json',
                    beforeSend: function() {
                        $('#okBtn').text('Deleting...').prop("disabled", true);
                    },
                    complete: function(data) {
                        if (data.status >= 400) {
                            $('#okBtn').text('OK').prop("disabled", false);
                            errorMessage(data.responseJSON.message);
                            return;
                        }
                        setTimeout(function() {
                            $('#userTable').DataTable().ajax.reload();
                            successMessage(data.responseJSON.message);
                            $('#confirmModal').modal('hide');
                            $('#okBtn').text('OK').prop("disabled", false);
                        }, 1500);
                    }
                })

            });
        }


        function successMessage(message) {
            Command: toastr["success"](message)
            toastr.options = {
                "closeButton": false,
                "debug": false,
                "newestOnTop": false,
                "progressBar": true,
                "positionClass": "toast-top-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "100",
                "timeOut": "2000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }
        }

        function errorMessage(message) {
            Command: toastr["error"](message)

            toastr.options = {
                "closeButton": false,
                "debug": false,
                "newestOnTop": false,
                "progressBar": true,
                "positionClass": "toast-top-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "2000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }

        }

    </script>

@endsection
