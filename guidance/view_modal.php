<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">




<!--view  Modal -->
<div class="modal fade" id="viewDetailsModal" tabindex="-1" aria-labelledby="viewDetailsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-blue-500 text-white">
                <h5 class="modal-title" id="viewDetailsModalLabel">Personal Details</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
<!-- Personal Information Section -->
<div class="card mb-4">
    <div class="card-header bg-success text-white fw-bold">
        Personal Information
    </div>
    <div class="card-body">
        <div class="row g-3 justify-content-between">
            <!-- First Name -->
            <div class="col-auto flex-grow-1 pe-2 text-truncate">
                <div class="text-secondary small">First Name</div>
                <div class="fw-bold">Juan</div>
            </div>
            
            <!-- Middle Name -->
            <div class="col-auto flex-grow-1 pe-2 text-truncate">
                <div class="text-secondary small">Middle Name</div>
                <div class="fw-bold">Santos</div>
            </div>
            
            <!-- Last Name -->
            <div class="col-auto flex-grow-1 pe-2 text-truncate">
                <div class="text-secondary small">Last Name</div>
                <div class="fw-bold">Dela Cruz</div>
            </div>
            
            <!-- Suffix -->
            <div class="col-auto flex-grow-1 pe-2 text-truncate">
                <div class="text-secondary small">Suffix</div>
                <div class="fw-bold">Jr.</div>
            </div>
            
            <!-- Age -->
            <div class="col-auto flex-grow-1 text-truncate">
                <div class="text-secondary small">Age</div>
                <div class="fw-bold">34</div>
            </div>
        </div>
    </div>
</div>
                <!-- Basic Information Section -->
                <div class="card mb-4">
                    <div class="card-header bg-success text-white fw-bold">
                        Basic Information
                    </div>
                    <div class="card-body">
                        <div class="row g-4">
                            <div class="col-md-3">
                                <div class="text-secondary small">Date of Birth</div>
                                <div class="fw-bold">January 1, 1990</div>
                            </div>
                            <div class="col-md-3">
                                <div class="text-secondary small">Gender</div>
                                <div class="fw-bold">Male</div>
                            </div>
                            <div class="col-md-3">
                                <div class="text-secondary small">Citizenship</div>
                                <div class="fw-bold">Filipino</div>
                            </div>
                            <div class="col-md-3">
                                <div class="text-secondary small">Status</div>
                                <div class="fw-bold">Single</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Additional Information Section -->
                <div class="card mb-4">
                    <div class="card-header bg-success text-white fw-bold">
                        Additional Information
                    </div>
                    <div class="card-body">
                        <div class="row g-4">
                            <div class="col-md-4">
                                <div class="text-secondary small">Religious Affiliation</div>
                                <div class="fw-bold">Roman Catholic</div>
                            </div>
                            <div class="col-md-4">
                                <div class="text-secondary small">Tribe</div>
                                <div class="fw-bold">Tagalog</div>
                            </div>
                            <div class="col-md-4">
                                <div class="text-secondary small">Province</div>
                                <div class="fw-bold">Cavite</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Address Information Section -->
                <div class="card mb-4">
                    <div class="card-header bg-success text-white fw-bold">
                        Address Information
                    </div>
                    <div class="card-body">
                        <div class="row g-4">
                            <div class="col-md-4">
                                <div class="text-secondary small">Town/Municipality</div>
                                <div class="fw-bold">Imus</div>
                            </div>
                            <div class="col-md-4">
                                <div class="text-secondary small">Barangay</div>
                                <div class="fw-bold">Bucandala</div>
                            </div>
                            <div class="col-md-4">
                                <div class="text-secondary small">Zipcode</div>
                                <div class="fw-bold">4103</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Contact Information Section -->
                <div class="card mb-4">
                    <div class="card-header bg-success text-white fw-bold">
                        Contact Information
                    </div>
                    <div class="card-body">
                        <div class="row g-4">
                            <div class="col-md-6">
                                <div class="text-secondary small">Mobile Number</div>
                                <div class="fw-bold">+63 912 345 6789</div>
                            </div>
                            <div class="col-md-6">
                                <div class="text-secondary small">Email Address</div>
                                <div class="fw-bold">juan.delacruz@example.com</div>
                            </div>
                            <div class="col-md-12">
                                <div class="text-secondary small">Number of Siblings</div>
                                <div class="fw-bold">3</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Program Membership -->
                <div class="card mb-4">
                    <div class="card-header bg-success text-white fw-bold">
                        Program Membership
                    </div>
                    <div class="card-body">
                        <div class="row g-4">
                            <div class="col-md-6">
                                <div class="text-secondary small">4P's Member</div>
                                <div class="fw-bold">Yes</div>
                            </div>
                            <div class="col-md-6">
                                <div class="text-secondary small">IP's Member</div>
                                <div class="fw-bold">No</div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Attendance Section -->
<div class="card mb-4">
    <div class="card-header bg-success text-white fw-bold">
        Attendance Records
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="bg-light">
                    <tr>
                        <th>Month</th>
                        <th>Jun</th>
                        <th>Jul</th>
                        <th>Aug</th>
                        <th>Sep</th>
                        <th>Oct</th>
                        <th>Nov</th>
                        <th>Dec</th>
                        <th>Jan</th>
                        <th>Feb</th>
                        <th>Mar</th>
                        <th>Apr</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="fw-bold">School Days</td>
                        <td>20</td>
                        <td>22</td>
                        <td>20</td>
                        <td>21</td>
                        <td>23</td>
                        <td>20</td>
                        <td>19</td>
                        <td>20</td>
                        <td>19</td>
                        <td>22</td>
                        <td>20</td>
                        <td class="fw-bold">245</td>
                    </tr>
                    <tr>
                        <td class="fw-bold">Days Present</td>
                        <td>18</td>
                        <td>20</td>
                        <td>19</td>
                        <td>20</td>
                        <td>22</td>
                        <td>19</td>
                        <td>18</td>
                        <td>19</td>
                        <td>18</td>
                        <td>21</td>
                        <td>19</td>
                        <td class="fw-bold">232</td>
                    </tr>
                    <tr>
                        <td class="fw-bold">Days Absent</td>
                        <td>2</td>
                        <td>2</td>
                        <td>1</td>
                        <td>1</td>
                        <td>1</td>
                        <td>1</td>
                        <td>1</td>
                        <td>1</td>
                        <td>1</td>
                        <td>1</td>
                        <td>1</td>
                        <td class="fw-bold">13</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Family Information Section -->
<div class="card mb-4">
    <div class="card-header bg-success text-white fw-bold">
        Family Information
    </div>
    <div class="card-body">
        <div class="row g-4">
            <!-- Father's Information -->
            <div class="col-md-4">
                <div class="card h-100">
                    <div class="card-header bg-primary text-white">
                        Father's Details
                    </div>
                    <div class="card-body">
                        <dl class="mb-0">
                            <dt>Name</dt>
                            <dd>Juan Dela Cruz</dd>
                            
                            <dt>Occupation</dt>
                            <dd>Engineer</dd>
                            
                            <dt>Address</dt>
                            <dd>123 Main Street, City</dd>
                            
                            <dt>Contact</dt>
                            <dd>+63 912 345 6789</dd>
                            
                            <dt>Income</dt>
                            <dd>₱45,000/month</dd>
                        </dl>
                    </div>
                </div>
            </div>

            <!-- Mother's Information -->
            <div class="col-md-4">
                <div class="card h-100">
                    <div class="card-header bg-success text-white">
                        Mother's Details
                    </div>
                    <div class="card-body">
                        <dl class="mb-0">
                            <dt>Name</dt>
                            <dd>Maria Dela Cruz</dd>
                            
                            <dt>Occupation</dt>
                            <dd>Teacher</dd>
                            
                            <dt>Address</dt>
                            <dd>123 Main Street, City</dd>
                            
                            <dt>Contact</dt>
                            <dd>+63 917 654 3210</dd>
                            
                            <dt>Income</dt>
                            <dd>₱35,000/month</dd>
                        </dl>
                    </div>
                </div>
            </div>

            <!-- Guardian's Information -->
            <div class="col-md-4">
                <div class="card h-100">
                    <div class="card-header bg-info text-white">
                        Guardian's Details
                    </div>
                    <div class="card-body">
                        <dl class="mb-0">
                            <dt>Name</dt>
                            <dd>Pedro Santos</dd>
                            
                            <dt>Occupation</dt>
                            <dd>Business Owner</dd>
                            
                            <dt>Address</dt>
                            <dd>456 Oak Street, City</dd>
                            
                            <dt>Contact</dt>
                            <dd>+63 918 765 4321</dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Previous School Section -->
<div class="card mb-4">
    <div class="card-header bg-success text-white fw-bold">
        Previous School Information
    </div>
    <div class="card-body">
        <div class="row g-4">
            <div class="col-md-6">
                <dl>
                    <dt>School Name</dt>
                    <dd>City National High School</dd>
                    
                    <dt>Address</dt>
                    <dd>789 Education Road, City</dd>
                </dl>
            </div>
            <div class="col-md-6">
                <dl>
                    <dt>Completion Year</dt>
                    <dd>2022</dd>
                    
                    <dt>Transfer Reason</dt>
                    <dd>Family relocation</dd>
                </dl>
            </div>
        </div>
    </div>
</div>

<!-- Documents Section -->
<div class="card mb-4">
    <div class="card-header bg-success text-white fw-bold">
        Attached Documents
    </div>
    <div class="card-body">
        <dl>
            <dt>School Card</dt>
            <dd>
                <span class="badge bg-primary">school_card_2023.pdf</span>
                <small class="text-muted ms-2">Uploaded: 2023-08-15</small>
            </dd>
        </dl>
    </div>
</div>

            </div>
            <div class="modal-footer"> 
                 <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <!-- <button class="bg-green-700 text-white px-4 py-2 rounded hover:bg-green-600" data-bs-toggle="modal" data-bs-target="#addReferralModal"><i class="bi bi-person-bounding-box"></i> Start Counseling</button> -->
            </div>
        </div>
    </div>
</div>
