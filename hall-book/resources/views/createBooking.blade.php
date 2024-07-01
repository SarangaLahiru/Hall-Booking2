<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Stepper Form with Validation</title>
    <link rel="stylesheet" href="{{asset('/css/create_booking.css')}}">
    <!-- Bootstrap and FontAwesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

</head>

<body>
    <div id="loadingIndicator" class="loading-indicator">
        <div class="d-flex justify-content-center align-items-center"
            style="height: 100vh; position: fixed; top: 0; left: 0; right: 0; bottom: 0; background-color: rgba(255, 255, 255, 0.8); z-index: 1000;">
            <div class="spinner-border text-primary" role="status">
                <span class="visually-hidden"></span>
            </div>
            {{-- Uncomment below to add loading text --}}
            {{-- <p class="loading-text" style="color:rgb(0, 153, 255);">Loading...</p> --}}
        </div>
    </div>
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

                        <div class="category-icon text-center" data-category="administrative">
                            <i class="fas fa-user-tie fa-3x"></i>
                            <p>Administrative</p>
                        </div>
                        <div class="category-icon text-center" data-category="student">
                            <i class="fas fa-user fa-3x"></i>
                            <p>Student</p>
                        </div>
                        <div class="category-icon text-center" data-category="non-academic">
                            <i class="fas fa-briefcase fa-3x"></i>
                            <p>Non-Academic</p>
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
                <div id="alertContainer" class="alert-container"></div>
                <div class="card shadow">

                    <div class="card-header">
                        <h5 class="card-title">Hall Reservation System</h5>
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

                        <form id="stepper-form" action="{{ route('storeBooking') }}" method="POST"
                            class="needs-validation" novalidate enctype="multipart/form-data">
                            @csrf

                            <!-- Step 1 -->
                            <input type="hidden" id="selectedCategory" name="category" value="">
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
                                            <label for="studentNo">Student Registration No</label>
                                            <input type="text" class="form-control" id="studentNo" name="studentNo"
                                                required>
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
                                            <input type="text" class="form-control" id="phone" name="phone" required>
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
                                            <label for="faculty" id="Otherl">Name of the Faculty</label>
                                            <select class="form-control" id="faculty" name="faculty" required>
                                                <option value="">select</option>
                                                <option id="Other" style="display: none;" value="none">None</option>
                                                <option value="Faculty of Agricultural Sciences">Faculty of Agricultural
                                                    Sciences</option>
                                                <option value="Faculty of Applied Sciences">Faculty of Applied Sciences
                                                </option>
                                                <option value="Faculty of Geomatics">Faculty of Geomatics</option>
                                                <option value="Faculty of Graduate Studies">Faculty of Graduate Studies
                                                </option>
                                                <option value="Faculty of Management Studies">Faculty of Management
                                                    Studies</option>

                                                <option value="Faculty of Medicine">Faculty of Medicine</option>
                                                <option value="Faculty of Social Sciences and Languages">Faculty of
                                                    Social Sciences and Languages</option>
                                                <option value="Faculty of Technology">Faculty of Technology</option>
                                                <option value="Faculty of Computing">Faculty of Computing</option>

                                                <!-- Add more options as needed -->
                                            </select>
                                            <div class="invalid-feedback">
                                                Please select your Faculty.
                                            </div>
                                        </div>

                                        <div class="col-md-6 mb-3" id="departmentField" style="display: none;">
                                            <label for="department">Name of the Department</label>
                                            <select class="form-control" id="department" name="department" required>
                                                <option value="">select</option>
                                                <optgroup label="Faculty of Agricultural Sciences">
                                                    <option value="Department of Agribusiness Management">Department of
                                                        Agribusiness Management</option>

                                                    <option value="Department of Export Agriculture">Department of
                                                        Export Agriculture</option>
                                                    <option value="Department of Livestock Production">Department of
                                                        Livestock Production</option>
                                                </optgroup>
                                                <optgroup label="Faculty of Applied Sciences">
                                                    <option value="Department of Food Science & Technology">Department
                                                        of
                                                        Food Science & Technology</option>
                                                    <option value="Department of Physical Sciences & Technology">
                                                        Department of Physical Sciences & Technology</option>
                                                    <option value="Department of Sports Sciences & Physical Education">
                                                        Department of Sports Sciences & Physical Education</option>
                                                </optgroup>
                                                <optgroup label="Faculty of Geomatics">
                                                    <option value="Department of Surveying & Geodesy">Department of
                                                        Surveying & Geodesy</option>
                                                    <option value="Department of Remote Sensing & GIS">Department of
                                                        Remote Sensing & GIS</option>
                                                </optgroup>
                                                <optgroup label="Faculty of Management Studies">
                                                    <option value="Department of Business Management">Department of
                                                        Business Management</option>
                                                    <option value="Department of Tourism Management">Department of
                                                        Tourism Management</option>
                                                    <option value="Department of Accountancy & Finance">Department of
                                                        Accountancy & Finance</option>
                                                    <option value="Department of Marketing Management">Department of
                                                        Marketing Management</option>
                                                </optgroup>
                                                <optgroup label="Faculty of Social Sciences and Languages">
                                                    <option value="Department of Social Sciences">Department of Social
                                                        Sciences</option>
                                                    <option value="Department of English Language Teaching">Department
                                                        of English Language Teaching
                                                    </option>
                                                    <option value="Department of Geography & Environmental Management">
                                                        Department of
                                                        Geography & Environmental Management</option>
                                                    <option value="Department of Information Technology">Department of
                                                        Information Technology</option>
                                                    <option value="Department of Languages">Department of
                                                        Languages</option>
                                                </optgroup>
                                                <optgroup label="Faculty of Technology">
                                                    <option value="Department of Engineering Technology">Department of
                                                        Engineering Technology</option>
                                                    <option value="Department of Biosystems Technology">Department of
                                                        Biosystems Technology</option>
                                                </optgroup>
                                                <optgroup label="Faculty of Computing">
                                                    <option value="Department of Software Engineering">Department of
                                                        Software Engineering</option>
                                                    <option value="Department of Computing and Information Systems">
                                                        Department of Computing and Information Systems</option>
                                                    <option value="Department of Data Science">Department of Data
                                                        Science</option>
                                                </optgroup>
                                                <optgroup label="Faculty of Graduate Studies">
                                                    <option value="Agricultural Sciences">Agricultural Sciences</option>
                                                    <option value="Computing & Information Systems">Computing &
                                                        Information Systems</option>
                                                    <option value="Geomatics">Geomatics</option>
                                                    <option value="Humanities">Humanities</option>
                                                    <option value="Management">Management</option>
                                                    <option value="Physical & Natural Sciences">Physical & Natural
                                                        Sciences</option>
                                                    <option value="Social Sciences">Social Sciences</option>
                                                    <option value="Sports Science & Physical Education">Sports Science &
                                                        Physical Education</option>
                                                    <option value="Medicine">Medicine</option>
                                                    <option value="Technology">Technology</option>
                                                    <option value="Indigenous Knowledge & Community Studies">Indigenous
                                                        Knowledge & Community Studies</option>

                                                </optgroup>
                                                <optgroup label="Faculty of Medicine">
                                                    <option value="Anatomy">Anatomy</option>
                                                    <option value="Biochemistry">Biochemistry</option>
                                                    <option value="Community Medicine">Community Medicine</option>
                                                    <option value="Forensic Medicine & Toxicology">Forensic Medicine &
                                                        Toxicology</option>
                                                    <option value="Medicine">Medicine</option>
                                                    <option value="Microbiology">Microbiology</option>
                                                    <option value="Obstetrics and Gynaecology">Obstetrics and
                                                        Gynaecology</option>
                                                    <option value="Paediatrics">Paediatrics</option>
                                                    <option value="Parasitology">Parasitology</option>
                                                    <option value="Pathology">Pathology</option>
                                                    <option value="Pharmacology">Pharmacology</option>
                                                    <option value="Physiology">Physiology</option>
                                                    <option value="Primary Care & Family Medicine">Primary Care & Family
                                                        Medicine</option>
                                                    <option value="Psychiatry">Psychiatry</option>
                                                    <option value="Surgery">Surgery</option>
                                                </optgroup>
                                                <!-- Add more options as needed -->
                                            </select>
                                            <div class="invalid-feedback">
                                                Please select your Department.
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3" id="divisionField" style="display: none;">
                                            <label for="division">Name of Division/Center/Unit</label>
                                            <input type="text" class="form-control" id="division" name="division"
                                                placeholder="If not, please mention that as 'None'" required>
                                            <div class="invalid-feedback">
                                                Please enter your Division.
                                            </div>
                                        </div>

                                        <div class="col-md-6 mb-3" id="societyField">
                                            <label for="society">Society</label>
                                            <input type="text" class="form-control" id="society" name="society"
                                                placeholder="If not, please mention that as 'None'" required>
                                            <div class="invalid-feedback">
                                                Please enter your Society.
                                            </div>
                                        </div>
                                        {{-- <div class="col-md-6 mb-3" id="notsocietyField" style="display: none;">
                                            <label for="society">Society</label>
                                            <input type="text" id="society" name="society" required
                                                style="width: 100%; padding: 0.375rem 0.75rem; font-size: 1rem; line-height: 1.5; color: #495057; background-color: #fff; background-clip: padding-box; border: 1px solid #ced4da; transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;">
                                        </div> --}}
                                        <div class="col-md-6 mb-3" id="institutionField" style="display: none;">
                                            <label for="institution">Name of the Institution</label>
                                            <input type="text" class="form-control" id="institution" name="institution"
                                                required>
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
                                        <div class="col mb-3" id="addressField" style="display: none;">
                                            <label for="address">Address</label>
                                            <input type="text" class="form-control" id="address" name="address"
                                                required>
                                            <div class="invalid-feedback">
                                                Please enter a valid address.
                                            </div>
                                        </div>
                                    </div>
                                    @foreach ($availabilityData as $index => $data)
                                    <hr>
                                    <div class="form-group">
                                        <label for="booking_date{{ $index }}">Booking Date {{ $index + 1 }}</label>
                                        <input type="text" class="form-control" id="booking_date{{ $index }}"
                                            name="booking_date[]" value="{{ $data['date'] }}" readonly>
                                    </div>
                                    <div class="row">
                                        <div class="col form-group">
                                            <label for="start_time{{ $index }}">Start Time</label>
                                            <input type="text" class="form-control" id="start_time{{ $index }}"
                                                name="start_time[]" value="{{ $data['start_time'] }}" readonly>
                                        </div>
                                        <div class="col form-group">
                                            <label for="end_time{{ $index }}">End Time</label>
                                            <input type="text" class="form-control" id="end_time{{ $index }}"
                                                name="end_time[]" value="{{ $data['end_time'] }}" readonly>
                                        </div>
                                    </div>
                                    <hr>
                                    @endforeach


                                    <button type="button" class="btn btn-primary next-step">Next</button>
                                </div>

                                <!-- Step 2 -->
                                <div class="step" data-step="1" style="display: none;">
                                    <div class="form-group">
                                        <label for="eventType">Type of Event</label>
                                        <select class="form-control" id="eventType" name="eventType" required>
                                            <option value="">Select Event Type</option>

                                            <option value="booklaunch">Book launch</option>
                                            <option value="career_fair">Career Fair</option>
                                            <option value="conference">Conference</option>
                                            <option value="concert">Concert</option>
                                            <option value="corporate_event">Corporate Event</option>
                                            <option value="cultural_event">Cultural Event</option>
                                            <option value="exhibition">Exhibition</option>
                                            <option value="faculty_meeting">Faculty Meeting</option>
                                            <option value="lecture">Lecture</option>
                                            <option value="panel_discussion">Panel Discussion</option>
                                            <option value="party">Party</option>
                                            <option value="seminar">Seminar</option>
                                            <option value="social_gathering">Social Gathering</option>
                                            <option value="student_meeting">Student Meeting</option>
                                            <option value="workshop">Workshop</option>
                                            <option value="other">Other</option>
                                        </select>

                                        <div class="invalid-feedback">
                                            Please select the type of event.
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="eventDescription">Description of Event</label>
                                        <textarea class="form-control" id="eventDescription" name="eventDescription"
                                            rows="3" required></textarea>
                                        <div class="invalid-feedback">
                                            Please enter a description of your event.
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label>Additional Facilities</label><br>
                                        <div class="container">
                                            <div class="row">
                                                <div class="form-check col">
                                                    <input class="form-check-input" type="checkbox" value="stage"
                                                        id="stage" name="facilities[]">
                                                    <label class="form-check-label" for="stage">Stage</label>
                                                </div>
                                                <div class="form-check col">
                                                    <input class="form-check-input" type="checkbox" value="lightSystem"
                                                        id="lightSystem" name="facilities[]">
                                                    <label class="form-check-label" for="lightSystem">Lightning
                                                        System</label>
                                                </div>
                                                <div class="form-check col">
                                                    <input class="form-check-input" type="checkbox" value="audioSystem"
                                                        id="audioSystem" name="facilities[]">
                                                    <label class="form-check-label" for="audioSystem">Audio
                                                        System</label>
                                                </div>


                                            </div>
                                            <div class="row">

                                                <div class="form-check col">
                                                    <input class="form-check-input" type="checkbox" value="balcony"
                                                        id="balcony" name="facilities[]">
                                                    <label class="form-check-label" for="balcony">Balcony</label>
                                                </div>
                                                <div class="form-check col">
                                                    <input class="form-check-input" type="checkbox" value="fullHall"
                                                        id="fullHall" name="facilities[]">
                                                    <label class="form-check-label" for="fullHall">Hall</label>
                                                </div>

                                                <div class="form-check col">
                                                    <input class="form-check-input" type="checkbox"
                                                        value="technicalOfficer" id="technicalOfficer"
                                                        name="facilities[]">
                                                    <label class="form-check-label" for="technicalOfficer">Technical
                                                        Officer</label>
                                                </div>
                                            </div>

                                            <div class="row">


                                                <div class="form-check col">
                                                    <input class="form-check-input" type="checkbox" value="multimedia"
                                                        id="multimedia" name="facilities[]">
                                                    <label class="form-check-label" for="multimedia">Multimedia</label>
                                                </div>
                                                <div class="form-check col">
                                                    <input class="form-check-input" type="checkbox" value="oilLamp"
                                                        id="oilLamp" name="facilities[]">
                                                    <label class="form-check-label" for="oilLamp">Oil Lamp</label>
                                                </div>
                                                <div class="form-check col">
                                                    {{-- <input class="form-check-input" type="checkbox"
                                                        value="audience" id="audience" name="facilities[]">
                                                    <label class="form-check-label" for="audience">Audience</label> --}}
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
                                        <label for="fileInput" id="fileInputl">Upload your verification document.(If
                                            any)</label>
                                        <div class="custom-file">
                                            <input value="none" type="file" class="custom-file-input" id="fileInput"
                                                name="fileInput" accept=".jpg, .jpeg, .png, .pdf" required>
                                            <label class="custom-file-label" for="fileInput">JPG, PNG, or PDF</label>
                                            <div class="invalid-feedback">
                                                Please upload a file in JPG, PNG, or PDF format.
                                            </div>
                                            <div class="invalid-feedback" id="fileSizeError" style="display: none;">
                                                File size exceeds the limit of 5MB.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-check">
                                        <div>
                                            <a href="#" data-toggle="modal" data-target="#termsModal">View Terms &
                                                Conditions</a>
                                        </div>
                                        <input class="form-check-input" type="checkbox" value="termsConditions"
                                            id="termsConditions" required>
                                        <label class="form-check-label" for="termsConditions">I have read and agree to
                                            the Terms & Conditions</label>
                                        <div class="invalid-feedback">
                                            Please agree to the terms and conditions.
                                        </div>
                                    </div>

                                    <div class="mt-2">
                                        <button type="button" class="btn btn-secondary prev-step mr-2">Previous</button>
                                        <button type="button" id="submitBtn" class="btn btn-primary">Register
                                            Booking</button>
                                    </div>
                                </div>

                                <!-- Terms & Conditions Modal -->
                                <div class="modal fade" id="termsModal" tabindex="-1" role="dialog"
                                    aria-labelledby="termsModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="termsModalLabel">Terms & Conditions</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <!-- Your terms and conditions content here -->
                                                <p>
                                                    I hereby confirm that the information provided in section 1 of this
                                                    application form is accurate
                                                    and that this event/activity will be conducted in full compliance
                                                    with the laws, regulations,
                                                    bylaws, and legal guidelines applicable to the Sabaragamuwa
                                                    University of Sri Lanka.
                                                    Furthermore, I hereby agree to pay the full assessed cost to the
                                                    university if any
                                                    damage occurs to the Auditorium of the Faculty of Social Sciences
                                                    and Languages building or
                                                    any of its equipment or accessories, as determined by the
                                                    university, due to the conduct of this
                                                    event/activity. Accordingly, I hereby request permission to use the
                                                    Faculty Auditorium for the
                                                    aforementioned event/activity.
                                                </p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
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
    <!-- Modal for Confirmation -->
    <div class="modal fade" id="confirmationModal" tabindex="-1" aria-labelledby="confirmationModalLabel" tabindex="-1"
        role="dialog" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmationModalLabel">Confirmation</h5>

                </div>
                <div class="modal-body">
                    <p>Date and time are available. Do you want to proceed with this booking?</p>
                    <ul id="dateTimeList">
                        @foreach($availabilityData as $data)
                        <li>{{ $data['date'] }} - {{ date('g:i A', strtotime($data['start_time'])) }} to {{ date('g:i
                            A', strtotime($data['end_time'])) }}</li>
                        @endforeach
                    </ul>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" id="notconfirmBooking">No, choose another
                        time</button>
                    <button type="button" id="confirmBooking" class="btn btn-primary">Yes, proceed</button>
                </div>
            </div>
        </div>
    </div>

    <svg id="wave" style="transform:rotate(180deg); transition: 0.3s" viewBox="0 0 1440 180" version="1.1"
        xmlns="http://www.w3.org/2000/svg">
        <defs>
            <linearGradient id="sw-gradient-0" x1="0" x2="0" y1="1" y2="0">
                <stop stop-color="rgba(51.331, 179.922, 255, 1)" offset="0%"></stop>
                <stop stop-color="rgba(255, 255, 255, 0)" offset="100%"></stop>
            </linearGradient>
        </defs>
        <path style="transform:translate(0, 0px); opacity:1" fill="url(#sw-gradient-0)"
            d="M0,36L60,36C120,36,240,36,360,57C480,78,600,120,720,129C840,138,960,114,1080,90C1200,66,1320,42,1440,30C1560,18,1680,18,1800,36C1920,54,2040,90,2160,99C2280,108,2400,90,2520,96C2640,102,2760,132,2880,120C3000,108,3120,54,3240,39C3360,24,3480,48,3600,51C3720,54,3840,36,3960,27C4080,18,4200,18,4320,24C4440,30,4560,42,4680,57C4800,72,4920,90,5040,105C5160,120,5280,132,5400,132C5520,132,5640,120,5760,111C5880,102,6000,96,6120,99C6240,102,6360,114,6480,123C6600,132,6720,138,6840,117C6960,96,7080,48,7200,24C7320,0,7440,0,7560,12C7680,24,7800,48,7920,69C8040,90,8160,108,8280,108C8400,108,8520,90,8580,81L8640,72L8640,180L8580,180C8520,180,8400,180,8280,180C8160,180,8040,180,7920,180C7800,180,7680,180,7560,180C7440,180,7320,180,7200,180C7080,180,6960,180,6840,180C6720,180,6600,180,6480,180C6360,180,6240,180,6120,180C6000,180,5880,180,5760,180C5640,180,5520,180,5400,180C5280,180,5160,180,5040,180C4920,180,4800,180,4680,180C4560,180,4440,180,4320,180C4200,180,4080,180,3960,180C3840,180,3720,180,3600,180C3480,180,3360,180,3240,180C3120,180,3000,180,2880,180C2760,180,2640,180,2520,180C2400,180,2280,180,2160,180C2040,180,1920,180,1800,180C1680,180,1560,180,1440,180C1320,180,1200,180,1080,180C960,180,840,180,720,180C600,180,480,180,360,180C240,180,120,180,60,180L0,180Z">
        </path>
        <defs>
            <linearGradient id="sw-gradient-1" x1="0" x2="0" y1="1" y2="0">
                <stop stop-color="rgba(126.204, 207.522, 255, 1)" offset="0%"></stop>
                <stop stop-color="rgba(0, 161, 255, 1)" offset="100%"></stop>
            </linearGradient>
        </defs>
        <path style="transform:translate(0, 50px); opacity:0.9" fill="url(#sw-gradient-1)"
            d="M0,0L60,27C120,54,240,108,360,114C480,120,600,78,720,78C840,78,960,120,1080,120C1200,120,1320,78,1440,69C1560,60,1680,84,1800,96C1920,108,2040,108,2160,111C2280,114,2400,120,2520,120C2640,120,2760,114,2880,114C3000,114,3120,120,3240,120C3360,120,3480,114,3600,120C3720,126,3840,144,3960,144C4080,144,4200,126,4320,111C4440,96,4560,84,4680,66C4800,48,4920,24,5040,27C5160,30,5280,60,5400,81C5520,102,5640,114,5760,99C5880,84,6000,42,6120,39C6240,36,6360,72,6480,75C6600,78,6720,48,6840,39C6960,30,7080,42,7200,57C7320,72,7440,90,7560,87C7680,84,7800,60,7920,48C8040,36,8160,36,8280,48C8400,60,8520,84,8580,96L8640,108L8640,180L8580,180C8520,180,8400,180,8280,180C8160,180,8040,180,7920,180C7800,180,7680,180,7560,180C7440,180,7320,180,7200,180C7080,180,6960,180,6840,180C6720,180,6600,180,6480,180C6360,180,6240,180,6120,180C6000,180,5880,180,5760,180C5640,180,5520,180,5400,180C5280,180,5160,180,5040,180C4920,180,4800,180,4680,180C4560,180,4440,180,4320,180C4200,180,4080,180,3960,180C3840,180,3720,180,3600,180C3480,180,3360,180,3240,180C3120,180,3000,180,2880,180C2760,180,2640,180,2520,180C2400,180,2280,180,2160,180C2040,180,1920,180,1800,180C1680,180,1560,180,1440,180C1320,180,1200,180,1080,180C960,180,840,180,720,180C600,180,480,180,360,180C240,180,120,180,60,180L0,180Z">
        </path>
    </svg>
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>

        $(document).ready(function () {
            var selectedCategory = null;

            $('.category-icon').click(function () {
                $('.category-icon').removeClass('selected');

                $(this).addClass('selected');
                selectedCategory = $(this).data('category');
                $('#selectedCategory').val(selectedCategory);

                // Create Bootstrap alert with change button and refresh functionality
                var alertHtml = '<div class="alert alert-info alert-dismissible fade show" role="alert">';
                alertHtml += '<strong>Selected Category:</strong> ' + selectedCategory;
                alertHtml += '<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
                alertHtml += '<span aria-hidden="true">&times;</span>';
                alertHtml += '</button>';
                alertHtml += '<button type="button" class="btn btn-primary btn-sm ml-2" onclick="location.reload();">Change</button>';
                alertHtml += '</div>';

                // Append alert to alert container
                $('#alertContainer').html(alertHtml);

                if (selectedCategory === 'student') {
                    $('#studentNoField').show();
                    $('#facultyField').show();
                    $('#idNoField').hide();
                    $('#institutionField').hide(); // Hide institution field if student category is selected
                    $('#societyField').show(); // Show society field if student category is selected
                    $('#postField').hide();
                    $('#departmentField').show();

                } else if (selectedCategory === 'external') {
                    $('#studentNoField').hide();
                    $('#idNoField').show();
                    $('#facultyField').hide(); // Hide faculty field if external category is selected
                    $('#institutionField').show(); // Show institution field if external category is selected
                    $('#societyField').hide(); // Hide society field if external category is selected
                    $('#postField').show();
                    $('#addressField').show();
                    document.getElementById('fileInputl').innerText = 'Upload your verification document.';



                }
                else if (selectedCategory === 'academic') {
                    $('#studentNoField').hide();
                    $('#idNoField').show();
                    $('#facultyField').show();
                    $('#institutionField').hide();
                    $('#societyField').show();
                    $('#postField').show();
                    $('#departmentField').show();
                    document.getElementById('Other').style.display = 'block';

                }
                else if (selectedCategory === 'non-academic') {
                    $('#studentNoField').hide();
                    $('#idNoField').show();
                    $('#facultyField').show();
                    $('#institutionField').hide();
                    $('#societyField').show();
                    $('#postField').show();
                    $('#divisionField').show();
                    document.getElementById('Other').style.display = 'block';

                }

                else {
                    // Default case for other categories
                    $('#studentNoField').hide();
                    $('#idNoField').show();
                    $('#facultyField').show();
                    $('#institutionField').hide();
                    $('#societyField').show();
                    $('#postField').show();
                    $('#divisionField').show();

                    document.getElementById('Other').style.display = 'block';
                }

                $('#categoryModal').modal('hide');
            });




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

            $('.next-step').click(function () {



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

            $('.prev-step').click(function () {
                if (currentStep > 0) {
                    currentStep--;
                    showStep(currentStep);
                }
            });

            function validateStep(step) {
                var inputs = steps.eq(step).find('input:visible, select:visible, textarea:visible');
                var isValid = true;
                inputs.each(function () {
                    if (!this.checkValidity()) {
                        isValid = false;
                        $(this).addClass('is-invalid');
                    } else {
                        $(this).removeClass('is-invalid');
                    }
                });
                return isValid;
            }



            $('#fileInput').change(function () {
                var fileName = $(this).val().split('\\').pop(); // Extract the file name
                $(this).next('.custom-file-label').html(fileName); // Set the file name as the label text
            });

            $('#fileInput').change(function () {
                var fileName = $(this).val().split('\\').pop(); // Extract the file name
                $(this).next('.custom-file-label').html(fileName); // Set the file name as the label text
            });

            $('#submitBtn').click(function () {

                var fileInput = $('#fileInput')[0];
                if (selectedCategory === 'external' || selectedCategory === 'non-academic') {
                    if (fileInput.files.length === 0) {
                        $('#fileInput').addClass('is-invalid');
                    } else {
                        var fileSize = fileInput.files[0].size / (1024 * 1024); // Convert bytes to MB
                        if (fileSize > 5) { // Check if file size exceeds 5 MB
                            $('#fileInput').addClass('is-invalid');
                            $('#fileInput').next('.custom-file-label').html('Choose file'); // Reset file label
                            alert('File size exceeds the limit of 5 MB.');
                            return; // Exit the function without submitting the form
                        } else {
                            $('#fileInput').removeClass('is-invalid');
                        }
                    }
                }

                // Check if terms and conditions checkbox is checked
                if (!$('#termsConditions').is(':checked')) {
                    $('#termsConditions').addClass('is-invalid');
                } else {
                    $('#termsConditions').removeClass('is-invalid');
                }

                // Check if both conditions are met
                if (fileInput.files.length > 0 || $('#termsConditions').is(':checked')) {
                    // Submit the form
                    $('#stepper-form').submit();


                    showLoadingIndicator();


                }
            });

            $('input, select').on('input', function () {
                $(this).removeClass('is-invalid');
            });

            $('.category-icon').click(function () {
                $('.category-icon').removeClass('selected');
                $(this).addClass('selected');
                selectedCategory = $(this).data('category');
                $('#categoryModal').modal('hide');
            });





            @if (!$availabilityData)
                window.location.href = '/';

            @endif





            $('#confirmationModal').modal('show');

            $('#confirmBooking').click(function (event) {
                // Prevent the default form submission behavior
                event.preventDefault();
                // User clicked "Yes, proceed"
                // You can add further action here, such as submitting the form
                // If you want to submit the form, you can trigger the submit event
                // $('#yourFormId').submit();
                $('#confirmationModal').modal('hide');
                $('#categoryModal').modal('show');
            });
            $('#notconfirmBooking').click(function (event) {
                // Prevent the default form submission behavior
                event.preventDefault();
                window.location.href = '/';
            });


            console.log(selectedCategory)
            document.getElementById('faculty').addEventListener('change', function () {
                var divisionFieldField = document.getElementById('divisionField');
                if (selectedCategory !== 'administrative' && selectedCategory !== 'non-academic') {
                    if (this.value === 'none') {
                        divisionFieldField.style.display = 'block';
                        document.getElementById('division').setAttribute('required', 'required');
                        document.getElementById('departmentField').style.display = 'none';
                        document.getElementById('department').value = 'none';
                    } else {
                        divisionFieldField.style.display = 'none';
                        document.getElementById('division').removeAttribute('required');
                        document.getElementById('departmentField').style.display = 'block';
                    }
                }
            });





        });
        document.addEventListener("DOMContentLoaded", function () {
            showLoadingIndicator();
        });
        window.onload = function () {
            hideLoadingIndicator();
        };

        function showLoadingIndicator() {
            document.getElementById('loadingIndicator').style.display = 'block';
        }

        function hideLoadingIndicator() {
            document.getElementById('loadingIndicator').style.display = 'none';
        }



    </script>
</body>

</html>