<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Stepper Form with Validation</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Hall Booking System</h5>
                </div>
                <div class="card-body">
                    <form id="stepper-form" action="/booked" method="POST" class="needs-validation" novalidate enctype="multipart/form-data">
                        @csrf

                        <!-- Step 1 -->
                        <div class="step">
                            <div class="form-row">
                                <div class="col-md-4 mb-3">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" name="name" required>
                                    <div class="invalid-feedback">
                                        Please enter your name.
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" required>
                                    <div class="invalid-feedback">
                                        Please enter a valid email address.
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="phone">Phone</label>
                                    <input type="number" class="form-control" id="phone" name="phone" required>
                                    <div class="invalid-feedback">
                                        Please enter a valid email address.
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="">Faculty/Society</label>
                                    <input type="text" class="form-control" id="" name="faculty" required>
                                    <div class="invalid-feedback">
                                        Please enter your Faculty or Society.
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="">Post</label>
                                    <input type="text" class="form-control"  name="post" required>
                                    <div class="invalid-feedback">
                                        Please enter a valid post.
                                    </div>
                                </div>

                            </div>
                            <div class="form-group">
                                <label for="booking_date">Booking Date</label>
                                <input type="text" class="form-control" id="booking_date" name="booking_date" value="{{ $bookingDate }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="start_time">Start Time</label>
                                <input type="text" class="form-control" id="start_time" name="start_time" value="{{ $startTime }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="end_time">End Time</label>
                                <input type="text" class="form-control" id="end_time" name="end_time" value="{{ $endTime }}" readonly>
                            </div>
                            <button type="button" class="btn btn-primary next-step">Next</button>
                        </div>

                        <!-- Step 2 -->
<div class="step" style="display: none;">
    <div class="form-group">
        <label for="activity">Brief Description About Your Activity</label>
        <input type="text" class="form-control" id="activity" name="activity" required>
        <div class="invalid-feedback">
            Please enter a brief description of your activity.
        </div>
    </div>
    <div class="form-group">
        <label for="fileUpload">Upload File</label>
        <input type="file" class="form-control-file" id="fileUpload" name="fileUpload">
    </div>

    <button type="button" class="btn btn-secondary prev-step mr-2">Previous</button>
    <button type="button" class="btn btn-primary next-step">Next</button>
</div>

                        <!-- Step 3 -->
                        <div class="step" style="display: none;">
                            <!-- Add additional steps here -->
                            <button type="button" class="btn btn-secondary prev-step mr-2">Previous</button>
                            <button type="submit" class="btn btn-primary">Register Booking</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
    $(document).ready(function() {
        var currentStep = 0;
        var steps = $('.step');

        function showStep(step) {
            steps.hide();
            steps.eq(step).show();
        }

        $('.next-step').click(function() {
            if (currentStep < steps.length - 1) {
                var isValid = validateStep(currentStep);
                if (isValid) {
                    currentStep++;
                    showStep(currentStep);
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
            var inputs = steps.eq(step).find('input, select');
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
    });
</script>

</body>
</html>
