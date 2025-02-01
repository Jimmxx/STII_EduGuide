<!-- edit_modal.php -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header text-white" style="background-color: #f01666;">
                <h5 class="modal-title" id="editModalLabel">Edit Details</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="studentForm">
                 <!-- Personal Information -->
<div style="background-color:#3cf048; width: 100%; padding: 10px; border-radius: 5px; text-align: center; margin-bottom: 10px;">
    <h6 style="margin: 0; color: black; font-weight: bold;">Personal Information</h6>
</div>
<div class="row mb-5 g-4">  <!-- Increased margin-bottom and added gap -->
    <div class="col-md-3" >
        <label for="firstName" class="form-label mb-2" style="font-weight: bold;">First Name</label>
        <input type="text" class="form-control py-2" id="firstName" placeholder="Enter first name" required style="border: 2px solid #333; background-color: #f8f9fa;">
    </div>
    <div class="col-md-3">
        <label for="middleName" class="form-label mb-2" style="font-weight: bold;">Middle Name</label>
        <input type="text" class="form-control py-2" id="middleName" placeholder="Enter middle name" style="border: 2px solid #333; background-color: #f8f9fa;">
    </div>
    <div class="col-md-3">
        <label for="lastName" class="form-label mb-2" style="font-weight: bold;">Last Name</label>
        <input type="text" class="form-control py-2" id="lastName" placeholder="Enter last name" required style="border: 2px solid #333; background-color: #f8f9fa;">
    </div>
    <div class="col-md-3">
        <label for="suffix" class="form-label mb-2" style="font-weight: bold;">Suffix</label>
        <select class="form-select py-2" id="suffix" style="border: 2px solid #333; background-color: #f8f9fa;">
            <option value="" selected>None</option>
            <option value="Jr.">Jr.</option>
            <option value="Sr.">Sr.</option>
            <option value="III">III</option>
            <option value="IV">IV</option>
        </select>
    </div>
</div>
<div class="row mb-5 g-4">  <!-- Increased margin-bottom and added gap -->
    <div class="col-md-3">
        <label for="dob" class="form-label mb-2" style="font-weight: bold;">Date of Birth</label>
        <input type="date" class="form-control py-2" id="dob" required style="border: 2px solid #333; background-color: #f8f9fa;">
    </div>
    <div class="col-md-3">
        <label for="gender" class="form-label mb-2" style="font-weight: bold;">Gender</label>
        <select class="form-select py-2" id="gender" required style="border: 2px solid #333; background-color: #f8f9fa;">
            <option value="" selected>Select gender</option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
            <option value="Other">Other</option>
        </select>
    </div>
    <div class="col-md-3">
        <label for="citizenship" class="form-label mb-2" style="font-weight: bold;">Citizenship</label>
        <input type="text" class="form-control py-2" id="citizenship" placeholder="Enter citizenship" style="border: 2px solid #333; background-color: #f8f9fa;">
    </div>
    <div class="col-md-3">
        <label for="status" class="form-label mb-2" style="font-weight: bold;">Status</label>
        <input type="text" class="form-control py-2" id="status" placeholder="Enter status" style="border: 2px solid #333; background-color: #f8f9fa;">
    </div>
</div>
<div class="row mb-5 g-4">  <!-- Increased margin-bottom and added gap -->
    <div class="col-md-4">
        <label for="religion" class="form-label mb-2" style="font-weight: bold;">Religious Affiliation</label>
        <input type="text" class="form-control py-2" id="religion" placeholder="Enter religion" style="border: 2px solid #333; background-color: #f8f9fa;">
    </div>
    <div class="col-md-4">
        <label for="tribe" class="form-label mb-2" style="font-weight: bold;">Tribe</label>
        <input type="text" class="form-control py-2" id="tribe" placeholder="Enter tribe" style="border: 2px solid #333; background-color: #f8f9fa;">
    </div>
    <div class="col-md-4">
        <label for="province" class="form-label mb-2" style="font-weight: bold;">Province</label>
        <select class="form-select py-2" id="province" required style="border: 2px solid #333; background-color: #f8f9fa;">
            <option value="" selected>Select province</option>
            <!-- Add provinces here -->
        </select>
    </div>
</div>
<div class="row mb-5 g-4">  <!-- Increased margin-bottom and added gap -->
    <div class="col-md-4">
        <label for="municipality" class="form-label mb-2" style="font-weight: bold;">Town/Municipality</label>
        <select class="form-select py-2" id="municipality" required style="border: 2px solid #333; background-color: #f8f9fa;">
            <option value="" selected>Select municipality</option>
            <!-- Add municipalities here -->
        </select>
    </div>
    <div class="col-md-4">
        <label for="barangay" class="form-label mb-2" style="font-weight: bold;">Barangay</label>
        <select class="form-select py-2" id="barangay" required style="border: 2px solid #333; background-color: #f8f9fa;">
            <option value="" selected>Select barangay</option>
            <!-- Add barangays here -->
        </select>
    </div>
    <div class="col-md-4">
        <label for="zipcode" class="form-label mb-2" style="font-weight: bold;">Zipcode/Postal Code</label>
        <input type="text" class="form-control py-2" id="zipcode" placeholder="Enter zipcode" style="border: 2px solid #333; background-color: #f8f9fa;">
    </div>
</div>
<div class="row mb-5 g-4">  <!-- Increased margin-bottom and added gap -->
<div class="col-md-6">
    <label for="mobile" class="form-label mb-2" style="font-weight: bold;">Mobile Number</label>
    <div class="row g-2">
        <div class="col-auto">
            <input type="text" class="form-control py-2" id="countryCode" placeholder="+63" 
                   style="border: 2px solid #333; background-color: #f8f9fa; width: 60px;" readonly>
        </div>
        <div class="col">
        <input type="text" class="form-control py-2" id="mobileNumber" placeholder="Enter mobile number" 
       style="border: 2px solid #333; background-color: #f8f9fa;"
       maxlength="10" 
       minlength="10"
       pattern="[0-9]{11}"
       oninput="this.value = this.value.replace(/[^0-9]/g, '')">        </div>
    </div>
</div>
    
    <div class="col-md-6">
        <label for="email" class="form-label mb-2" style="font-weight: bold;">Email Address</label>
        <input type="email" class="form-control py-2" id="email" placeholder="Enter email address" style="border: 2px solid #333; background-color: #f8f9fa;">
    </div>
    <div class="mb-3">
        <label for="noOfSiblings" class="form-label" style="font-weight: bold;">Number of Siblings</label>
         <input type="number" class="form-control" id="noOfSiblings" placeholder="Number of Siblings" style="border: 2px solid #333; background-color: #f8f9fa;width:min-content">
    </div>
</div>
<div class="form-check mb-4 ms-3">  <!-- Increased margin -->
    <input class="form-check-input" type="checkbox" id="4ps" style="border: 2px solid #333;">
    <label class="form-check-label" for="4ps" style="font-weight: bold;">4P's</label>
</div>
<div class="form-check mb-4 ms-3">  <!-- Increased margin -->
    <input class="form-check-input" type="checkbox" id="ips" style="border: 2px solid #333;">
    <label class="form-check-label" for="ips" style="font-weight: bold;">IP's</label>
</div>

                    <!-- School Information -->
                    <div style="background-color:#3cf048; width: 100%; padding: 10px; border-radius: 5px; text-align: center;margin-bottom:10px;">
    <h6 style="margin: 0; color: black; font-weight: bold;">School Information</h6>
</div>
<label for="lastGradeLevel" class="form-label " style="font-weight: bold;margin-top:15px;">Select School Card</label>
<select class="form-select" id="selectSchoolCard" onchange="toggleSchoolCard()" style="border: 2px solid #333;margin-bottom: 25px;width:min-content;" >
                                <option value="" selected>Select School Card</option>
                                <option value="juniorHigh">School Card (Junior High)</option>
                                <option value="seniorHigh">School Card (Senior High)</option>
                                <option value="college">School Card (College)</option>
                            </select>        

<div class="row mb-3">
                        <!-- <div class="col-md-4">
                            <label for="lastGradeLevel" class="form-label " style="font-weight: bold;">Last Grade Level</label>
                            <select class="form-select" id="lastGradeLevel" style="border: 2px solid #333;">
                                <option value="" selected>Select grade level</option>
                                <option value="Junior High">G7-G10 (Junior High)</option>
                                <option value="Senior High">G11-G12 (Senior High)</option>
                                <option value="College">1st Year - 4th Year (College)</option>
                            </select>
                        </div> -->
                        <div class="col-md-4">
                            <label for="section" class="form-label" style="font-weight: bold;">Section</label>
                            <input type="text" class="form-control" id="section" placeholder="Enter section" style="border: 2px solid #333;width:min-content;">
                        </div>
                        <!-- <div class="col-md-4">
                            <label for="strand" class="form-label">Strand</label>
                            <input type="text" class="form-control" id="strand" placeholder="Enter strand">
                        </div> -->
                    </div>
                    <label for="" class="form-label " style="font-weight: bold;margin-top:15px;">Select School Year</label>
                    <select class="form-select" id="selectSchoolYear" style="border: 2px solid #333; margin-bottom: 25px; width: min-content;">
    <option value="" selected>Select School Year</option>
    <option value="2024-2025">2024-2025</option>
    <option value="2025-2026">2025-2026</option>
    <option value="2026-2027">2026-2027</option>
    <option value="2027-2028">2027-2028</option>
    <option value="Add School Year">Add School Year</option>
</select>


     <div id="juniorHighCard" class="school-card" style="display: none;">
                    <!-- Dynamically Loaded School Card Layout -->
                    <div id="schoolCardLayout">
                        <!-- School Card Inputs (added dynamically) -->
                         <div class="mt-3">
                         <div style="background-color:#d13ce8; width: 100%; padding: 10px; border-radius: 5px; text-align: center;margin-bottom:10px;">
    <h6 style="margin: 0; color: white; font-weight: bold;">School Card (Junior High)</h6>
</div>

<button type="button" class="btn btn-secondary" id="addRowBtn" style="margin-bottom: 15px;">Add table row</button>
<div class="table-responsive">
    <table class="table table-bordered text-center" id="gradesTable">
        <thead>
            <tr>
                <th rowspan="2" class="align-middle">Learning Areas</th>
                <th colspan="4">Quarter</th>
                <th rowspan="2" class="align-middle">Final Rating</th>
                <th rowspan="2" class="align-middle">Remarks</th>
                <th rowspan="2" class="align-middle">Action</th>
            </tr>
            <tr>
                <th>1</th>
                <th>2</th>
                <th>3</th>
                <th>4</th>
            </tr>
        </thead>
        <tbody>
            <tr class="grade-row">
                <td>
                    <select class="form-select subject-select">
                        <option value="" selected>Select Subject</option>
                        <option value="Filipino">Filipino</option>
                        <option value="English">English</option>
                        <option value="Mathematics">Mathematics</option>
                        <option value="Science">Science</option>
                        <option value="MAPEH">MAPEH</option>
                        <option value="Add Subject">Add Subject</option>
                    </select>
                </td>
                <td><input type="number" class="form-control" placeholder="Q1"></td>
                <td><input type="number" class="form-control" placeholder="Q2"></td>
                <td><input type="number" class="form-control" placeholder="Q3"></td>
                <td><input type="number" class="form-control" placeholder="Q4"></td>
                <td><input type="number" class="form-control" placeholder="Final"></td>
                <td><input type="text" class="form-control" placeholder="Remarks"></td>
                <td><button type="button" class="btn btn-danger deleteRowBtn" disabled>🚫</button></td>
            </tr>
        </tbody>
        <tfoot>
            <tr>
                <td class="fw-bold">General Average</td>
                <td colspan="4"></td>
                <td><input type="number" class="form-control" placeholder="General Average"></td>
                <td colspan="2"></td>
            </tr>
        </tfoot>
    </table>
</div>
<script>
document.getElementById('addRowBtn').addEventListener('click', function() {
    const tbody = document.querySelector('#gradesTable tbody');
    const firstRow = document.querySelector('.grade-row');
    
    if (firstRow) {
        const newRow = firstRow.cloneNode(true);
        newRow.querySelectorAll('input').forEach(input => input.value = '');
        newRow.querySelector('.deleteRowBtn').disabled = false;
        newRow.querySelector('.deleteRowBtn').textContent = '✖ ';
        newRow.querySelector('.deleteRowBtn').addEventListener('click', function() {
            newRow.remove();
        });
        tbody.appendChild(newRow);
    }
});

document.addEventListener('change', function(event) {
    if (event.target.classList.contains('subject-select')) {
        if (event.target.value === 'Add Subject') {
            const newSubject = prompt('Enter new subject name:');
            if (newSubject && /^[a-zA-Z0-9\s\-]+$/.test(newSubject.trim())) {
                const exists = Array.from(event.target.options).some(option => option.value.toLowerCase() === newSubject.toLowerCase());
                if (!exists) {
                    const newOption = new Option(newSubject, newSubject);
                    event.target.add(newOption, event.target.options[event.target.options.length - 1]);
                    event.target.value = newSubject;
                } else {
                    alert('This subject already exists!');
                    event.target.value = '';
                }
            } else {
                alert('Invalid subject name!');
                event.target.value = '';
            }
        }
    }
});

document.querySelectorAll('.deleteRowBtn').forEach((button, index) => {
    if (index === 0) {
        button.disabled = true;
        button.textContent = '🚫';
    } else {
        button.addEventListener('click', function() {
            this.closest('tr').remove();
        });
    }
});
</script>

</div>
 </div>
    </div>



        <div id="seniorHighCard" class="school-card" style="display: none;">
            <div id="schoolCardLayout">
    <!-- First Semester -->
    <div class="mt-3">
    <div style="background-color:#d13ce8; width: 100%; padding: 10px; border-radius: 5px; text-align: center; margin-bottom:10px;">
            <h6 style="margin: 0; color: white; font-weight: bold;">School Card (Senior High)</h6>
        </div>
        <div class="col-md-4">
                            <label for="lastGradeLevel" class="form-label">Select Strand</label>
                            <select class="form-select" id="lastGradeLevel" >
                                <option value="" selected>Select Strand</option>
                                <option value="STEM">STEM</option>
                                <option value="HUMSS">HUMSS</option>
                                <option value="ABM">ABM"</option>
                                <option value="GAS">GAS</option>
                                <option value="TVL">TVL</option>
                            </select>
        </div>
        <div style="background-color:#4a78ed; width: min-content; padding: 5px; border-radius: 5px; text-align: left; margin-bottom:10px;margin-top:10px; display: inline-block;">
    <h6 style="margin: 0; color: white; font-weight: bold; padding-left: 8px; white-space: nowrap;">First Semester</h6>
</div></br>
        <button type="button" class="btn btn-secondary" id="addRowBtnFirstSem" style="margin-bottom: 15px;">Add Row (1st Sem)</button>


<div class="table-responsive">
    <table class="table table-bordered text-center" id="firstSemTable">
        <thead>
            <tr>
                <th rowspan="2" class="align-middle">Subjects</th>
                <th colspan="2">Quarter</th>
                <th rowspan="2" class="align-middle">Semester Final Grade</th>
                <th rowspan="2" class="align-middle">Action</th>
            </tr>
            <tr>
                <th>1</th>
                <th>2</th>
            </tr>
        </thead>
        <tbody>
            <tr class="grade-row">
                <td><input type="text" class="form-control" placeholder="Subject"></td>
                <td><input type="number" class="form-control" placeholder="Q1"></td>
                <td><input type="number" class="form-control" placeholder="Q2"></td>
                <td><input type="number" class="form-control" placeholder="Final"></td>
                <td><button type="button" class="btn btn-danger deleteRowBtn" disabled>🚫</button></td>
            </tr>
        </tbody>
        <tfoot>
            <tr>
                <td class="fw-bold">General Average for the Semester</td>
                <td colspan="3"><input type="number" class="form-control" placeholder="Average"></td>
                <td></td>
            </tr>
        </tfoot>
    </table>
</div>
<div style="background-color:#4a78ed; width: min-content; padding: 5px; border-radius: 5px; text-align: left; margin-bottom:10px;margin-top:10px; display: inline-block;">
    <h6 style="margin: 0; color: white; font-weight: bold; padding-left: 8px; white-space: nowrap;">Second Semester</h6>
</div></br>
<button type="button" class="btn btn-secondary" id="addRowBtnSecondSem">Add Row (2nd Sem)</button>
<div class="table-responsive mt-3">
    <table class="table table-bordered text-center" id="secondSemTable">
        <thead>
            <tr>
                <th rowspan="2" class="align-middle">Subjects</th>
                <th colspan="2">Quarter</th>
                <th rowspan="2" class="align-middle">Semester Final Grade</th>
                <th rowspan="2" class="align-middle">Action</th>
            </tr>
            <tr>
                <th>3</th>
                <th>4</th>
            </tr>
        </thead>
        <tbody>
            <tr class="grade-row">
                <td><input type="text" class="form-control" placeholder="Subject"></td>
                <td><input type="number" class="form-control" placeholder="Q3"></td>
                <td><input type="number" class="form-control" placeholder="Q4"></td>
                <td><input type="number" class="form-control" placeholder="Final"></td>
                <td><button type="button" class="btn btn-danger deleteRowBtn" disabled>🚫</button></td>
            </tr>
        </tbody>
        <tfoot>
            <tr>
                <td class="fw-bold">General Average for the Semester</td>
                <td colspan="3"><input type="number" class="form-control" placeholder="Average"></td>
                <td></td>
            </tr>
        </tfoot>
    </table>
</div>
    </div>

<script>
document.addEventListener("DOMContentLoaded", function() {
    function addRow(tableId) {
        const tbody = document.querySelector(`#${tableId} tbody`);
        const firstRow = tbody.querySelector('.grade-row');

        if (firstRow) {
            const newRow = firstRow.cloneNode(true);
            newRow.querySelectorAll('input').forEach(input => input.value = '');
            newRow.querySelector('.deleteRowBtn').disabled = false;
            newRow.querySelector('.deleteRowBtn').textContent = 'Delete';
            newRow.querySelector('.deleteRowBtn').addEventListener('click', function() {
                newRow.remove();
            });
            tbody.appendChild(newRow);
        }
    }

    document.getElementById('addRowBtnFirstSem').addEventListener('click', function() {
        addRow('firstSemTable');
    });

    document.getElementById('addRowBtnSecondSem').addEventListener('click', function() {
        addRow('secondSemTable');
    });

    document.querySelectorAll('.deleteRowBtn').forEach((button, index) => {
        if (index === 0) {
            button.disabled = true;
            button.textContent = '🚫';
        } else {
            button.addEventListener('click', function() {
                this.closest('tr').remove();
            });
        }
    });
});
</script>
</div>
</div>
<div id="collegeCard" class="school-card" style="display: none;">
<div id="schoolCardLayout">
                        <!-- School Card Inputs (added dynamically) -->
                         <div class="mt-3">
                         <div style="background-color:#d13ce8; width: 100%; padding: 10px; border-radius: 5px; text-align: center;margin-bottom:10px;">
    <h6 style="margin: 0; color: white; font-weight: bold;">School Card(College)</h6>
</div>
<div class="row mb-3">
<div class="col-md-4">
                            <label for="lastGradeLevel" class="form-label">Select Course</label>
                            <select class="form-select" id="lastGradeLevel" >
                                <option value="" selected>Select Course</option>
                                <option value="BSIT">BSIT</option>
                                <option value="BSCS">BSCS</option>
                                <option value="BMMA">BMMA"</option>
                                <option value="ACT">ACT</option>
                                <option value="BSAGRI">BSAGRI</option>
                                <option value="BSBA">BSBA</option>
                                <option value="BSSW">BSSW</option>
                                <option value="BSM">BSM</option>
                                <option value="BSPHARMA">BSPHARMA</option>
                                <option value="BTVTED">BTVTED</option>
                            </select>
</div>
<div class="col-md-4">
<label for="section" class="form-label">Section</label>
<input type="text" class="form-control" id="section" placeholder="Enter section">
</div>
<div class="col-md-4">
                            <label for="lastGradeLevel" class="form-label">Year Level</label>
                            <select class="form-select" id="lastGradeLevel" >
                                <option value="" selected>Select Year Level</option>
                                <option value="1st Year">1st Year</option>
                                <option value="2nd Year">2nd Year</option>
                                <option value="3rd Year">3rd Year"</option>
                                <option value="4rth Year">4rth Year</option>
                            </select>
</div>
</div>
<div style="background-color:#4a78ed; width: 100%; padding: 5px; border-radius: 5px; text-align: center; margin-bottom:10px;margin-top:10px;">
            <h6 style="margin: 0; color: white; font-weight: bold;">First Semester</h6>
        </div>
        <button type="button" class="btn btn-secondary" id="addRowBtnFirstSem1" style="margin-bottom: 15px;">Add Row (1st Sem)</button>
        <div class="table-responsive">
    <table class="table table-bordered text-center" id="firstSemTable1">
        <thead>
            <tr>
                <th rowspan="2" class="align-middle">Subjects</th>
                <th colspan="2">Quarter</th>
                <th rowspan="2" class="align-middle">Semester Final Grade</th>
                <th rowspan="2" class="align-middle">Action</th>
            </tr>
            <tr>
                <th>1</th>
                <th>2</th>
            </tr>
        </thead>
        <tbody>
            <tr class="grade-row">
                <td><input type="text" class="form-control" placeholder="Subject"></td>
                <td><input type="number" class="form-control" placeholder="Q1"></td>
                <td><input type="number" class="form-control" placeholder="Q2"></td>
                <td><input type="number" class="form-control" placeholder="Final"></td>
                <td><button type="button" class="btn btn-danger deleteRowBtn1" disabled>🚫</button></td>
            </tr>
        </tbody>
        <tfoot>
            <tr>
                <td class="fw-bold">General Average for the Semester</td>
                <td colspan="3"><input type="number" class="form-control" placeholder="Average"></td>
                <td></td>
            </tr>
        </tfoot>
    </table>
</div>
<div style="background-color:#4a78ed; width: min-content; padding: 5px; border-radius: 5px; text-align: left; margin-bottom:10px;margin-top:10px; display: inline-block;">
    <h6 style="margin: 0; color: white; font-weight: bold; padding-left: 8px; white-space: nowrap;">Second Semester</h6>
</div></br>
<button type="button" class="btn btn-secondary" id="addRowBtnSecondSem1">Add Row (2nd Sem)</button>
<div class="table-responsive mt-3">
    <table class="table table-bordered text-center" id="secondSemTable1">
        <thead>
            <tr>
                <th rowspan="2" class="align-middle">Subjects</th>
                <th colspan="2">Quarter</th>
                <th rowspan="2" class="align-middle">Semester Final Grade</th>
                <th rowspan="2" class="align-middle">Action</th>
            </tr>
            <tr>
                <th>3</th>
                <th>4</th>
            </tr>
        </thead>
        <tbody>
            <tr class="grade-row">
                <td><input type="text" class="form-control" placeholder="Subject"></td>
                <td><input type="number" class="form-control" placeholder="Q3"></td>
                <td><input type="number" class="form-control" placeholder="Q4"></td>
                <td><input type="number" class="form-control" placeholder="Final"></td>
                <td><button type="button" class="btn btn-danger deleteRowBtn1" disabled>🚫</button></td>
            </tr>
        </tbody>
        <tfoot>
            <tr>
                <td class="fw-bold">General Average for the Semester</td>
                <td colspan="3"><input type="number" class="form-control" placeholder="Average"></td>
                <td></td>
            </tr>
        </tfoot>
    </table>
</div>
    </div>

<script>
document.addEventListener("DOMContentLoaded", function() {
    function addRow(tableId) {
        const tbody = document.querySelector(`#${tableId} tbody`);
        const firstRow = tbody.querySelector('.grade-row');

        if (firstRow) {
            const newRow = firstRow.cloneNode(true);
            newRow.querySelectorAll('input').forEach(input => input.value = '');
            newRow.querySelector('.deleteRowBtn1').disabled = false;
            newRow.querySelector('.deleteRowBtn1').textContent = 'Delete';
            newRow.querySelector('.deleteRowBtn1').addEventListener('click', function() {
                newRow.remove();
            });
            tbody.appendChild(newRow);
        }
    }

    document.getElementById('addRowBtnFirstSem1').addEventListener('click', function() {
        addRow('firstSemTable1');
    });

    document.getElementById('addRowBtnSecondSem1').addEventListener('click', function() {
        addRow('secondSemTable1');
    });

    document.querySelectorAll('.deleteRowBtn1').forEach((button, index) => {
        if (index === 0) {
            button.disabled = true;
            button.textContent = '🚫';
        } else {
            button.addEventListener('click', function() {
                this.closest('tr').remove();
            });
        }
    });
});
</script>
    </div>
</div>

    
                    <!-- Attendance -->
                    <div style="background-color:#3cf048; width: 100%; padding: 10px; border-radius: 5px; text-align: center;margin-bottom:10px;margin-top:30px;">
    <h6 style="margin: 0; color: black; font-weight: bold;">Attendance</h6>
</div>
                    <div class="table-responsive">
                        <table class="table table-bordered text-center">
                            <thead>
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
                                    <td>No. of School Days</td>
                                    <td><input type="number" class="form-control" /></td>
                                    <td><input type="number" class="form-control" /></td>
                                    <td><input type="number" class="form-control" /></td>
                                    <td><input type="number" class="form-control" /></td>
                                    <td><input type="number" class="form-control" /></td>
                                    <td><input type="number" class="form-control" /></td>
                                    <td><input type="number" class="form-control" /></td>
                                    <td><input type="number" class="form-control" /></td>
                                    <td><input type="number" class="form-control" /></td>
                                    <td><input type="number" class="form-control" /></td>
                                    <td><input type="number" class="form-control" /></td>
                                    <td><input type="number" class="form-control" /></td>
                                </tr>
                                <tr>
                                    <td>No. of Days Present</td>
                                    <td><input type="number" class="form-control" /></td>
                                    <td><input type="number" class="form-control" /></td>
                                    <td><input type="number" class="form-control" /></td>
                                    <td><input type="number" class="form-control" /></td>
                                    <td><input type="number" class="form-control" /></td>
                                    <td><input type="number" class="form-control" /></td>
                                    <td><input type="number" class="form-control" /></td>
                                    <td><input type="number" class="form-control" /></td>
                                    <td><input type="number" class="form-control" /></td>
                                    <td><input type="number" class="form-control" /></td>
                                    <td><input type="number" class="form-control"/></td>
                                    <td><input type="number" class="form-control" /></td>
                                </tr>
                                <tr>
                                    <td>No. of Days Absent</td>
                                    <td><input type="number" class="form-control" /></td>
                                    <td><input type="number" class="form-control" /></td>
                                    <td><input type="number" class="form-control" /></td>
                                    <td><input type="number" class="form-control" /></td>
                                    <td><input type="number" class="form-control" /></td>
                                    <td><input type="number" class="form-control" /></td>
                                    <td><input type="number" class="form-control" /></td>
                                    <td><input type="number" class="form-control" /></td>
                                    <td><input type="number" class="form-control" /></td>
                                    <td><input type="number" class="form-control" /></td>
                                    <td><input type="number" class="form-control" /></td>
                                    <td><input type="number" class="form-control" /></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-4">
                    <div style="background-color:#3cf048; width: 100%; padding: 10px; border-radius: 5px; text-align: center;">
    <h6 style="margin: 0; color: black; font-weight: bold;">Family Information</h6>
</div>

    <div class="row" style="margin-top: 10px;">
        <!-- Father's Information Card -->
        <div class="col-md-4">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h6 class="mb-0">Father's Information</h6>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="fatherName" class="form-label" style="font-weight: bold;">Name</label>
                        <input type="text" class="form-control" id="fatherName" placeholder="Full Name" style="border: 2px solid #333; background-color: #f8f9fa;">
                    </div>
                    <div class="mb-3">
                        <label for="fatherOccupation" class="form-label" style="font-weight: bold;">Occupation</label>
                        <input type="text" class="form-control" id="fatherOccupation" placeholder="Occupation" style="border: 2px solid #333; background-color: #f8f9fa;">
                    </div>
                    <div class="mb-3">
                        <label for="fatherAddress" class="form-label" style="font-weight: bold;">Address</label>
                        <input type="text" class="form-control" id="fatherAddress" placeholder="Address" style="border: 2px solid #333; background-color: #f8f9fa;">
                    </div>
                    <div class="mb-3">
                             <label for="fatherMobile" class="form-label" style="font-weight: bold;">Mobile Number</label>
                    <div class="d-flex gap-2">
                            <input type="text" class="form-control flex-shrink-0" id="countryCode" placeholder="+63" style="border: 2px solid #333; background-color: #f8f9fa; width: 70px;" readonly>
                           <input type="text" class="form-control" id="mobileNumber" placeholder="Enter mobile number" 
       style="border: 2px solid #333; background-color: #f8f9fa;"
       maxlength="10" 
       minlength="10"
       pattern="[0-9]{11}"
       oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                    </div>
                    </div>
                    <div class="mb-3">
                        <label for="fatherIncome" class="form-label" style="font-weight: bold;">Monthly Income</label>
                        <input type="number" class="form-control" id="fatherIncome" placeholder="Income (PHP)" style="border: 2px solid #333; background-color: #f8f9fa;">
                    </div>

                </div>
            </div>
        </div>

        <!-- Mother's Information Card -->
        <div class="col-md-4">
            <div class="card">
                <div class="card-header bg-success text-white">
                    <h6 class="mb-0">Mother's Information</h6>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="motherName" class="form-label" style="font-weight: bold;">Name</label>
                        <input type="text" class="form-control" id="motherName" placeholder="Full Name" style="border: 2px solid #333; background-color: #f8f9fa;">
                    </div>
                    <div class="mb-3">
                        <label for="motherOccupation" class="form-label" style="font-weight: bold;" >Occupation</label>
                        <input type="text" class="form-control" id="motherOccupation" placeholder="Occupation" style="border: 2px solid #333; background-color: #f8f9fa;">
                    </div>
                    <div class="mb-3">
                        <label for="motherAddress" class="form-label" style="font-weight: bold;">Address</label>
                        <input type="text" class="form-control" id="motherAddress" placeholder="Address" style="border: 2px solid #333; background-color: #f8f9fa;">
                    </div>
                    <div class="mb-3">
                             <label for="fatherMobile" class="form-label" style="font-weight: bold;">Mobile Number</label>
                    <div class="d-flex gap-2">
                            <input type="text" class="form-control flex-shrink-0" id="countryCode" placeholder="+63" style="border: 2px solid #333; background-color: #f8f9fa; width: 70px;" readonly>
                           <input type="text" class="form-control" id="mobileNumber" placeholder="Enter mobile number" 
       style="border: 2px solid #333; background-color: #f8f9fa;"
       maxlength="10" 
       minlength="10"
       pattern="[0-9]{11}"
       oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                    </div>
                    </div>

                    <div class="mb-3">
                        <label for="motherIncome" class="form-label" style="font-weight: bold;">Monthly Income</label>
                        <input type="number" class="form-control" id="motherIncome" placeholder="Income (PHP)" style="border: 2px solid #333; background-color: #f8f9fa;">
                    </div>
                </div>
            </div>
        </div>

        <!-- Guardian's Information Card -->
        <div class="col-md-4">
            <div class="card">
                <div class="card-header bg-info text-white">
                    <h6 class="mb-0">Guardian's Information</h6>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="guardianName" class="form-label" style="font-weight: bold;">Name</label>
                        <input type="text" class="form-control" id="guardianName" placeholder="Full Name" style="border: 2px solid #333; background-color: #f8f9fa;">
                    </div>
                    <div class="mb-3">
                        <label for="guardianOccupation" class="form-label" style="font-weight: bold;">Occupation</label>
                        <input type="text" class="form-control" id="guardianOccupation" placeholder="Occupation" style="border: 2px solid #333; background-color: #f8f9fa;">
                    </div>
                    <div class="mb-3">
                        <label for="guardianAddress" class="form-label"style="font-weight: bold;">Address</label>
                        <input type="text" class="form-control" id="guardianAddress" placeholder="Address" style="border: 2px solid #333; background-color: #f8f9fa;">
                    </div>
                    <div class="mb-3">
                             <label for="fatherMobile" class="form-label" style="font-weight: bold;">Mobile Number</label>
                    <div class="d-flex gap-2">
                            <input type="text" class="form-control flex-shrink-0" id="countryCode" placeholder="+63" style="border: 2px solid #333; background-color: #f8f9fa; width: 70px;" readonly>
                           <input type="text" class="form-control" id="mobileNumber" placeholder="Enter mobile number" 
       style="border: 2px solid #333; background-color: #f8f9fa;"
       maxlength="10" 
       minlength="10"
       pattern="[0-9]{11}"
       oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                    </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>
<div class="mt-4">
<div style="background-color:#3cf048; width: 100%; padding: 10px; border-radius: 5px; text-align: center;margin-bottom:10px">
    <h6 style="margin: 0; color: black; font-weight: bold;">Previous School Information</h6>
</div>

    <div class="row">
        <div class="col-md-4">
            <div class="mb-3">
                <label for="lastSchoolName" class="form-label" style="font-weight: bold;">Last Attended School Name</label>
                <input type="text" class="form-control" id="lastSchoolName" placeholder="School Name" style="border: 2px solid #333; background-color: #f8f9fa;">
            </div>
            <div class="mb-3">
                <label for="schoolAddress" class="form-label" style="font-weight: bold;">School Address</label>
                <input type="text" class="form-control" id="schoolAddress" placeholder="School Address" style="border: 2px solid #333; background-color: #f8f9fa;">
            </div>
        </div>
        <div class="col-md-4">
            <div class="mb-3">
                <label for="yearGraduated" class="form-label" style="font-weight: bold;">Year Graduated/Completed</label>
                <input type="number" class="form-control" id="yearGraduated" placeholder="Year Graduated" style="border: 2px solid #333; background-color: #f8f9fa;">
            </div>
            <div class="mb-3">
                <label for="reasonForTransfer" class="form-label" style="font-weight: bold;">Reason for Transfer (if applicable)</label>
                <textarea class="form-control" id="reasonForTransfer" rows="3" placeholder="Reason for Transfer" style="border: 2px solid #333; background-color: #f8f9fa;"></textarea>
            </div>
        </div>
    </div>
</div>


                    <!-- Upload School Card -->
                    <h6 class="mt-4" style="font-weight: bold;">Upload School Card</h6>
                    <div class="mb-3">
                        <input type="file" class="form-control" id="schoolCardUpload" accept=".jpg, .png, .pdf" style="border: 2px solid #333; background-color: #f8f9fa;">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save Student</button>
            </div>

        </div>
    </div>
</div>

<!-- Include Bootstrap JS (Ensure it's in your main layout or the specific file) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>



