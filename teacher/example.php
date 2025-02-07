  
  <?php include 'conn.php'; ?>
  <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

  <form method="post">
  <!-- School Information -->
                    <div style="background-color:#3cf048; width: 100%; padding: 10px; border-radius: 5px; text-align: center;margin-bottom:10px;">
    <h6 style="margin: 0; color: black; font-weight: bold;">School Information</h6>
</div>
<label for="lastGradeLevel" class="form-label " style="font-weight: bold;margin-top:15px;">Select School Card</label>
<select class="form-select" id="selectSchoolCard" onchange="toggleSchoolCard()" style="border: 2px solid #333;margin-bottom: 25px;width:min-content;" name="scool_card">
                                <option value="" selected>Select School Card</option>
                                <option value="1">School Card (Junior High)</option>
                                <option value="2">School Card (Senior High)</option>
                                <option value="3">School Card (College)</option>
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
                            <input type="text" name="section" class="form-control" id="section" placeholder="Enter section" style="border: 2px solid #333;width:min-content;">
                        </div>
                        <!-- <div class="col-md-4">
                            <label for="strand" class="form-label">Strand</label>
                            <input type="text" class="form-control" id="strand" placeholder="Enter strand">
                        </div> -->
                    </div>
                    <label for="" class="form-label " style="font-weight: bold;margin-top:15px;">Select School Year</label>
                    <select class="form-select" id="selectSchoolYear" style="border: 2px solid #333; margin-bottom: 25px; width: min-content;" name="school_year">
    <option value="" selected>Select School Year</option>
    <option value="2024-2025">2024-2025</option>
    <option value="2025-2026">2025-2026</option>
    <option value="2026-2027">2026-2027</option>
    <option value="2027-2028">2027-2028</option>
    <option value="Add School Year">Add School Year</option>
</select>


     <div id="1Card" class="school-card" style="display: none;">
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
                <td><input type="number" class="form-control" placeholder="Q1" name="jq1"></td>
                <td><input type="number" class="form-control" placeholder="Q2" name="jq2"></td>
                <td><input type="number" class="form-control" placeholder="Q3" name="jq3"></td>
                <td><input type="number" class="form-control" placeholder="Q4" name="jq4"></td>
                <td><input type="number" class="form-control" placeholder="Final" name="jfinal"></td>
                <td><input type="text" class="form-control" placeholder="Remarks"name="jremarks"></td>
                <td><button type="button" class="btn btn-danger deleteRowBtn" disabled>🚫</button></td>
            </tr>
        </tbody>
        <tfoot>
            <tr>
                <td class="fw-bold">General Average</td>
                <td colspan="4"></td>
                <td><input type="number" class="form-control" placeholder="General Average" name="jgaverage"></td>
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

    
    <div id="2Card" class="school-card" style="display: none;">
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


<div id="3Card" class="school-card" style="display: none;">
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

<script>
    // Function to dynamically add a new row to the table
    function addRow() {
        const tableBody = document.querySelector('#addStudentModal tbody');
        const newRow = `
            <tr>
                <td><input type="text" class="form-control" placeholder="Subject Name"></td>
                <td><input type="number" class="form-control" placeholder="Grade" min="0" max="100"></td>
                <td><input type="number" class="form-control" placeholder="Grade" min="0" max="100"></td>
                <td><input type="number" class="form-control" placeholder="Grade" min="0" max="100"></td>
                <td><input type="number" class="form-control" placeholder="Grade" min="0" max="100"></td>
                <td><input type="number" class="form-control" placeholder="Final Grade" min="0" max="100" readonly></td>
            </tr>
        `;
        tableBody.insertAdjacentHTML('beforeend', newRow);
    }
</script>

<script>
    function toggleSchoolCard() {
        // Get the selected value from the dropdown
        const selectedCard = document.getElementById("selectSchoolCard").value;

        // Hide all school cards
        document.querySelectorAll(".school-card").forEach(card => {
            card.style.display = "none";
        });

        // Show the selected school card
        if (selectedCard) {
            document.getElementById(`${selectedCard}Card`).style.display = "block";
        }
    }
</script>


    </div>
</div>

<input type="submit" value="submit" name="submit">
</form>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
