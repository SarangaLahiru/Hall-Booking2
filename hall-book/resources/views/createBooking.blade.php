<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Stepper Form with Validation</title>
    <link rel="stylesheet" href="{{asset('/css/create_booking.css')}}">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

</head>
<body>

<!-- Category Selection Modal -->
<div class="modal fade" id="categoryModal" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Select User Category</h5>
            </div>
            <div class="modal-body">
                <div class="d-flex justify-content-center flex-wrap">
                    <div class="category-icon text-center" data-category="academic">
                        <i class="fas fa-user-graduate fa-3x"></i>
                        <p>Academic</p>
                    </div>
                    <div class="category-icon text-center" data-category="non-academic">
                        <i class="fas fa-briefcase fa-3x"></i>
                        <p>Non-Academic</p>
                    </div>
                    <div class="category-icon text-center" data-category="administrative">
                        <i class="fas fa-user-tie fa-3x"></i>
                        <p>Administrative</p>
                    </div>
                    <div class="category-icon text-center" data-category="student">
                        <i class="fas fa-user fa-3x"></i>
                        <p>Student</p>
                    </div>
                    <div class="category-icon text-center" data-category="external">
                        <i class="fas fa-users fa-3x"></i>
                        <p>External</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Hall Booking System</h5>
                </div>
                <div class="card-body">
                    <!-- Stepper -->
                    <div class="stepper">
                        <div class="step active" data-step="0">
                            <div class="circle">1</div>
                            <div class="label">Step 1</div>
                        </div>
                        <div class="step" data-step="1">
                            <div class="circle">2</div>
                            <div class="label">Step 2</div>
                        </div>
                        <div class="step" data-step="2">
                            <div class="circle">3</div>
                            <div class="label">Step 3</div>
                        </div>
                    </div>

                    <form id="stepper-form" action="/booked" method="POST" class="needs-validation" novalidate enctype="multipart/form-data">
                        @csrf

                        <!-- Step 1 -->
                        <div class="step-content">
                            <div class="step" data-step="0">
                                <div class="form-row">
                                    <div class="col mb-3">
                                        <label for="name">Applicant Name</label>
                                        <input type="text" class="form-control" id="name" name="name" required>
                                        <div class="invalid-feedback">
                                            Please enter your name.
                                        </div>
                                    </div>
                                    <div class="col mb-3" id="studentNoField" style="display: none;">
                                        <label for="studentNo">Student Register No</label>
                                        <input type="text" class="form-control" id="studentNo" name="studentNo" required>
                                        <div class="invalid-feedback">
                                            Please enter a valid student number.
                                        </div>
                                    </div>
                                    <div class="col mb-3" id="idNoField" style="display: none;">
                                        <label for="idNo">NIC Number</label>
                                        <input type="text" class="form-control" id="idNo" name="idNo" required>
                                        <div class="invalid-feedback">
                                            Please enter a valid ID number.
                                        </div>
                                    </div>


                                </div>
                                <div class="form-row">
                                    <div class="col-md-6 mb-3">
                                        <label for="phone">Contact Number</label>
                                        <input type="number" class="form-control" id="phone" name="phone" required>
                                        <div class="invalid-feedback">
                                            Please enter a valid phone number.
                                        </div>
                                    </div>


                                    <div class="col-md-6 mb-3">
                                        <label for="email">Email Address</label>
                                        <input type="email" class="form-control" id="email" name="email" required>
                                        <div class="invalid-feedback">
                                            Please enter a valid email address.
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3" id="facultyField" style="display: none;">
                                        <label for="faculty">Name of Faculty</label>
                                        <select class="form-control" id="faculty" name="faculty" required>
                                            <option value="">Select</option>
                                            <option value="Faculty 1">Faculty 1</option>
                                            <option value="Faculty 2">Faculty 2</option>
                                            <!-- Add more options as needed -->
                                        </select>
                                        <div class="invalid-feedback">
                                            Please select your Faculty.
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-3" id="societyField">
                                        <label for="society">Society</label>
                                        <input type="text" class="form-control" id="society" name="society" required>
                                        <div class="invalid-feedback">
                                            Please enter your Society.
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3" id="institutionField" style="display: none;">
                                        <label for="institution">Name of the Institution</label>
                                        <input type="text" class="form-control" id="institution" name="institution" required>
                                        <div class="invalid-feedback">
                                            Please enter the name of the institution.
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3" id="postField">
                                        <label for="post">Designation</label>
                                        <input type="text" class="form-control" name="post" required>
                                        <div class="invalid-feedback">
                                            Please enter a valid post.
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="booking_date">Booking Date</label>
                                    <input type="text" class="form-control" id="booking_date" name="booking_date" value="{{ $bookingDate }}" readonly>
                                </div>
                                <div class="row">
                                    <div class="col form-group">
                                        <label for="start_time">Start Time</label>
                                        <input type="text" class="form-control" id="start_time" name="start_time" value="{{ $startTime }}" readonly>
                                    </div>
                                    <div class="col form-group">
                                        <label for="end_time">End Time</label>
                                        <input type="text" class="form-control" id="end_time" name="end_time" value="{{ $endTime }}" readonly>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-primary next-step">Next</button>
                            </div>

                            <!-- Step 2 -->
                            <div class="step" data-step="1" style="display: none;">
                                <div class="form-group">
                                    <label for="eventType">Type of Event</label>
                                    <select class="form-control" id="eventType" name="eventType" required>
                                        <option value="">Select Event Type</option>
                                        <option value="conference">Conference</option>
                                        <option value="workshop">Workshop</option>
                                        <option value="concert">Concert</option>
                                        <option value="wedding">Wedding</option>
                                        <option value="party">Party</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        Please select the type of event.
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="eventDescription">Description of Event</label>
                                    <textarea class="form-control" id="eventDescription" name="eventDescription" rows="3" required></textarea>
                                    <div class="invalid-feedback">
                                        Please enter a description of your event.
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label>Additional Facilities</label><br>
                                  <div class="container">
                                    <div class="row container">
                                        <div class="form-check col">
                                            <input class="form-check-input" type="checkbox" value="stage" id="stage" name="facilities[]">
                                            <label class="form-check-label" for="stage">Stage</label>
                                        </div>
                                        <div class="form-check col">
                                            <input class="form-check-input" type="checkbox" value="lightSystem" id="lightSystem" name="facilities[]">
                                            <label class="form-check-label" for="lightSystem">Light System</label>
                                        </div>
                                        <div class="form-check col">
                                            <input class="form-check-input" type="checkbox" value="audioSystem" id="audioSystem" name="facilities[]">
                                            <label class="form-check-label" for="audioSystem">Audio System</label>
                                        </div>
                                       </div>

                                        <div class="row container">
                                            <div class="form-check col">
                                                <input class="form-check-input" type="checkbox" value="fullHall" id="fullHall" name="facilities[]">
                                                <label class="form-check-label" for="fullHall">Full Hall</label>
                                            </div>
                                            <div class="form-check col">
                                                <input class="form-check-input" type="checkbox" value="balcony" id="balcony" name="facilities[]">
                                                <label class="form-check-label" for="balcony">Balcony</label>
                                            </div>
                                            <div class="form-check col">
                                                <input class="form-check-input" type="checkbox" value="balcony" id="balcony" name="facilities[]">
                                                <label class="form-check-label" for="balcony">Audiance</label>
                                            </div>
                                        </div>
                                  </div>
                                </div>


                                <button type="button" class="btn btn-secondary prev-step mr-2">Previous</button>
                                <button type="button" class="btn btn-primary next-step">Next</button>
                            </div>



                            <!-- Step 3 -->
                            <div class="step" data-step="2" style="display: none;">
                                <div class="form-group">
                                    <label for="fileInput">File Upload</label>
                                    <input type="file" class="form-control-file" id="fileInput" name="fileInput">
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="termsConditions" id="termsConditions" required>
                                    <label class="form-check-label" for="termsConditions">I have read and agree to the Terms & Conditions</label>
                                    <!-- Display Terms & Conditions here -->
                                    <a href="#" data-toggle="modal" data-target="#termsModal">View Terms & Conditions</a>
                                </div>
                                <button type="button" class="btn btn-secondary prev-step mr-2">Previous</button>
                                <button type="submit" class="btn btn-primary">Register Booking</button>
                            </div>

                            <!-- Terms & Conditions Modal -->
                            <div class="modal fade" id="termsModal" tabindex="-1" role="dialog" aria-labelledby="termsModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="termsModalLabel">Terms & Conditions</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- Your terms and conditions content here -->
                                            <p>This is where your terms and conditions will be displayed.</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
<script>

    $(document).ready(function() {
        var selectedCategory = null;

        $('.category-icon').click(function() {
            $('.category-icon').removeClass('selected');
            $(this).addClass('selected');
            selectedCategory = $(this).data('category');

            if (selectedCategory === 'student') {
                $('#studentNoField').show();
                $('#facultyField').show();
                $('#idNoField').hide();
                $('#institutionField').hide(); // Hide institution field if student category is selected
                $('#societyField').show(); // Show society field if student category is selected
                $('#postField').hide();
            } else if (selectedCategory === 'external') {
                $('#studentNoField').hide();
                $('#idNoField').show();
                $('#facultyField').hide(); // Hide faculty field if external category is selected
                $('#institutionField').show(); // Show institution field if external category is selected
                $('#societyField').hide(); // Hide society field if external category is selected
                $('#postField').show();
            } else {
                // Default case for other categories
                $('#studentNoField').hide();
                $('#idNoField').show();
                $('#facultyField').hide();
                $('#institutionField').hide();
                $('#societyField').show();
                $('#postField').show();
            }

            $('#categoryModal').modal('hide');
        });


        $('#categoryModal').modal('show');

        var currentStep = 0;
        var steps = $('.step-content .step');
        var stepperSteps = $('.stepper .step');
        var selectedCategory = null;

        function showStep(step) {
            steps.hide();
            steps.eq(step).show();
            stepperSteps.removeClass('active');
            stepperSteps.eq(step).addClass('active');
        }

        $('.next-step').click(function() {



            if (currentStep < steps.length - 1) {

                var isValid = validateStep(currentStep);
                console.log(isValid)
                if (isValid) {
                    currentStep++;
                    showStep(currentStep);
                }
            } else {
                // Proceed to the next step only if a category is selected
                if (selectedCategory) {
                    currentStep++;
                    showStep(currentStep);
                } else {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Select a Category',
                        text: 'Please select a category before proceeding to the next step.',
                        confirmButtonText: 'OK'
                    });
                }
            }
        });

        $('.prev-step').click(function() {
            if (currentStep > 0) {
                currentStep--;
                showStep(currentStep);
            }
        });

        function validateStep(step) {
            var inputs = steps.eq(step).find('input:visible, select:visible, textarea:visible');
            var isValid = true;
            inputs.each(function() {
                if (!this.checkValidity()) {
                    isValid = false;
                    $(this).addClass('is-invalid');
                } else {
                    $(this).removeClass('is-invalid');
                }
            });
            return isValid;
        }

        $('input, select').on('input', function() {
            $(this).removeClass('is-invalid');
        });

        $('.category-icon').click(function() {
            $('.category-icon').removeClass('selected');
            $(this).addClass('selected');
            selectedCategory = $(this).data('category');
            $('#categoryModal').modal('hide');
        });

        $('#categoryModal').modal('show');

        @if($bookingDate)
        Swal.fire({
            icon: 'success',
            title: 'Success',
            text: 'Date and time are available. Do you want to proceed with this booking?',
            showCancelButton: true,
            confirmButtonText: 'Yes, proceed',
            cancelButtonText: 'No, choose another time',
        }).then((result) => {
            if (result.isConfirmed) {
                // User clicked "Yes, proceed"
                // You can add further action here, such as submitting the form

            } else {
                // User clicked "No, choose another time"
                // Redirect to the home page
                window.location.href = '/';
            }
        });
        @endif

        @if(session('error'))
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: '{{ session('error') }}',
                confirmButtonText: 'OK'
            });
        @endif
    });
</script>
</body>
</html>
