@extends('layout.layout')

@section('title', 'Lecture Management')

@section('content')
    <div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-9">
                    <h4 class="fw-semibold mb-8">Lectures</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item" aria-current="page">Manage Lectures</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="datatables">
        <div class="card">
            <div class="card-body">
                <div class="add-button">
                    <div class="mb-3">
                        <button class="btn btn-success" onclick="showModal()">
                            <i class="ti ti-plus"></i> Add Lecture
                        </button>
                    </div>
                </div>
                <div class="table-responsive">
                    <table id="zero_config" class="table table-striped table-bordered text-nowrap align-middle">
                        <thead>
                            <tr>
                                <th>Lecture Title</th>
                                <th>Lecture Category</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center gap-6">
                                        <img src="../assets/images/profile/user-4.jpg" width="45"
                                            class="rounded-circle" />
                                        <h6 class="mb-0">Flood Awareness</h6>
                                    </div>
                                </td>
                                <td>Flood</td>
                                <td>
                                    <button class="btn btn-outline-success m-1">
                                        Available
                                    </button>
                                </td>
                                <td>
                                    <button class="btn btn-sm btn-primary me-1" onclick="showModal()">
                                        <i class="ti ti-pencil"></i> Edit
                                    </button>
                                    <button class="btn btn-sm btn-danger me-1" onclick="deleteRow(this)">
                                        <i class="ti ti-trash"></i> Delete
                                    </button>
                                    <button class="btn btn-sm btn-success" onclick="showQuizModal()">
                                        <i class="ti ti-plus"></i> Quiz
                                    </button>
                                </td>
                            </tr>

                            </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="manage-employee-modal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Lectures</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row w-100">
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-4 col-12">
                                    <div class="mb-3">
                                        <label class="form-label">Lecture Title</label>
                                        <input type="text" class="form-control"
                                            placeholder="e.g., police, fire, medical, disaster relief">
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="form-group mb-4">
                                        <label class="form-label">Lecture Category</label>
                                        <select class="form-control" id="exampleFormControlSelect1"
                                            aria-placeholder="Select Province">
                                            <option>Select</option>
                                            <option>Flood</option>
                                            <option>Volcanic Eruption</option>
                                            <option>Landslide</option>
                                            <option>Typhoon</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="form-group mb-4">
                                        <label class="form-label">Status</label>
                                        <select class="form-control" id="exampleFormControlSelect1"
                                            aria-placeholder="Select Province">
                                            <option>Available</option>
                                            <option>Unavailable</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="mb-3">
                                        <label class="form-label">Lecture Image</label>
                                        <input class="form-control" type="file" id="formFile">
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="mb-3">
                                        <label class="form-label">Lecture Pdf Document</label>
                                        <input class="form-control" type="file" id="formFile">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary btn-save add-user">Save</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="quiz-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Lecture Quiz</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row w-100">
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-12 col-12">
                                    <div class="mb-3">
                                        <button class="btn btn-sm btn-success" id="add-question-btn">
                                            <i class="ti ti-plus"></i> Add Question
                                        </button>
                                    </div>
                                </div>
                                <div class="question-group col-md-12 col-12 ms-2">
                                    <div class="question row card">
                                        <div class="d-flex justify-content-between align-items-center mb-4 mt-3">
                                            <h5 class="mb-0">Question #1</h5>

                                            <button class="btn btn-sm btn-danger">
                                                <i class="ti ti-trash"></i> Delete
                                            </button>
                                        </div>

                                        <div class="col-md-12 col-12">
                                            <div class="mb-3">
                                                <label class="form-label">Question</label>
                                                <input type="text" class="form-control"
                                                    placeholder="Enter your Question">
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-12 row">
                                            <div class="mb-3">
                                                <button class="btn btn-sm btn-success me-2 add-answer-btn">
                                                    <i class="ti ti-plus"></i> Add Answer
                                                </button>
                                                <button class="btn btn-sm btn-success add-choice-btn">
                                                    <i class="ti ti-plus"></i> Add Choices
                                                </button>
                                            </div>
                                        </div>

                                        <label class="form-label">Answers</label>

                                        <div class="answer-group col-md-12 col-12 row">
                                            <div class="col-md-12 col-12 answer">
                                                <div class="row">
                                                    <div class="mb-3 col-md-10 col-12">
                                                        <input type="text" class="form-control"
                                                            placeholder="Enter your Answer">
                                                    </div>
                                                    <div class="mb-3 col-md-2 col-12 d-flex align-items-center">
                                                        <button class="btn btn-sm btn-danger delete-answer-btn">
                                                            <i class="ti ti-trash"></i> Delete
                                                        </button>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                        <label class="form-label">Choices</label>

                                        <div class="choices-group col-md-12 col-12 row">
                                            <div class="col-md-12 col-12 choice">
                                                <div class="row">
                                                    <div class="mb-3 col-md-10 col-12">
                                                        <input type="text" class="form-control"
                                                            placeholder="Enter your Choices">
                                                    </div>
                                                    <div class="mb-3 col-md-2 col-12 d-flex align-items-center">
                                                        <button class="btn btn-sm btn-danger delete-choice-btn">
                                                            <i class="ti ti-trash"></i> Delete
                                                        </button>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary btn-save add-user">Save</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        let questionCounter = 1;

        async function showModal() {
            $('#manage-employee-modal').modal('show');
        }
        async function showQuizModal() {
            $('#quiz-modal').modal('show');
        }

        $(document).ready(function() {
            $('#zero_config').DataTable();
        });

        $(document).ready(function() {

            $('#add-question-btn').click(function() {
                questionCounter++;
                const newQuestion = `
                <div class="question row card mt-4">
                    <div class="d-flex justify-content-between align-items-center mb-4 mt-3">
                        <h5 class="mb-0">Question #${questionCounter}</h5>
                        <button class="btn btn-sm btn-danger delete-question-btn">
                            <i class="ti ti-trash"></i> Delete
                        </button>
                    </div>
                    <div class="col-md-12 col-12">
                        <div class="mb-3">
                            <label class="form-label">Question</label>
                            <input type="text" class="form-control" placeholder="Enter your Question">
                        </div>
                    </div>
                    <div class="col-md-12 col-12 row">
                        <div class="mb-3">
                            <button class="btn btn-sm btn-success me-2 add-answer-btn">
                                <i class="ti ti-plus"></i> Add Answer
                            </button>
                            <button class="btn btn-sm btn-success add-choice-btn">
                                <i class="ti ti-plus"></i> Add Choices
                            </button>
                        </div>
                    </div>
                    <label class="form-label">Answers</label>
                    <div class="answer-group col-md-12 col-12 row">
                        <div class="col-md-12 col-12 answer">
                            <div class="row">
                                <div class="mb-3 col-md-10 col-12">
                                    <input type="text" class="form-control" placeholder="Enter your Answer">
                                </div>
                                <div class="mb-3 col-md-2 col-12 d-flex align-items-center">
                                    <button class="btn btn-sm btn-danger delete-answer-btn">
                                        <i class="ti ti-trash"></i> Delete
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <label class="form-label">Choices</label>
                    <div class="choices-group col-md-12 col-12 row">
                        <div class="col-md-12 col-12 choice">
                            <div class="row">
                                <div class="mb-3 col-md-10 col-12">
                                    <input type="text" class="form-control" placeholder="Enter your Choices">
                                </div>
                                <div class="mb-3 col-md-2 col-12 d-flex align-items-center">
                                    <button class="btn btn-sm btn-danger delete-choice-btn">
                                        <i class="ti ti-trash"></i> Delete
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            `;
                $('.question-group').append(newQuestion);
            });

            $(document).on('click', '.delete-question-btn', function() {
                $(this).closest('.question').remove();
            });

            $(document).on('click', '.add-answer-btn', function() {
                const newAnswer = `
                <div class="col-md-12 col-12 answer">
                    <div class="row">
                        <div class="mb-3 col-md-10 col-12">
                            <input type="text" class="form-control" placeholder="Enter your Answer">
                        </div>
                        <div class="mb-3 col-md-2 col-12 d-flex align-items-center">
                            <button class="btn btn-sm btn-danger delete-answer-btn">
                                <i class="ti ti-trash"></i> Delete
                            </button>
                        </div>
                    </div>
                </div>
            `;
                $(this).closest('.question').find('.answer-group').append(newAnswer);
            });


            // Delete specific answer
            $(document).on('click', '.delete-answer-btn', function() {
                $(this).closest('.answer').remove();
            });

            // Add new choice
            $(document).on('click', '.add-choice-btn', function() {
                const newChoice = `
                <div class="col-md-12 col-12 choice">
                    <div class="row">
                        <div class="mb-3 col-md-10 col-12">
                            <input type="text" class="form-control" placeholder="Enter your Choices">
                        </div>
                        <div class="mb-3 col-md-2 col-12 d-flex align-items-center">
                            <button class="btn btn-sm btn-danger delete-choice-btn">
                                <i class="ti ti-trash"></i> Delete
                            </button>
                        </div>
                    </div>
                </div>
            `;
                $(this).closest('.question').find('.choices-group').append(newChoice);
            });

            // Delete specific choice
            $(document).on('click', '.delete-choice-btn', function() {
                $(this).closest('.choice').remove();
            });
        });
    </script>
@endpush
