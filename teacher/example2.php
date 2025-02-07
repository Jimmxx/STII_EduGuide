

<script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">


                    <!-- School Information -->
                    <div style="background-color:#3cf048; width: 100%; padding: 10px; border-radius: 5px; text-align: center;margin-bottom:10px;">
    <h6 style="margin: 0; color: black; font-weight: bold;">School Information</h6>
</div>
        



 


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
    <form method="post" action="save_grades.php">
    <table class="table table-bordered text-center" id="gradesTable">
    <input type="hidden" name="student_id" value="<?php echo htmlspecialchars($_GET['id'] ?? ''); ?>">
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
                    <select class="form-select subject-select" name="subject[]">
                        <option value="" selected>Select Subject</option>
                        <option value="Filipino">Filipino</option>
                        <option value="English">English</option>
                        <option value="Mathematics">Mathematics</option>
                        <option value="Science">Science</option>
                        <option value="MAPEH">MAPEH</option>
                        <option value="Add Subject">Add Subject</option>
                    </select>
                </td>
                <td><input type="number" class="form-control" placeholder="Q1" name="q1[]"></td>
                <td><input type="number" class="form-control" placeholder="Q2" name="q2[]"></td>
                <td><input type="number" class="form-control" placeholder="Q3" name="q3[]"></td>
                <td><input type="number" class="form-control" placeholder="Q4" name="q4[]"></td>
                <td><input type="number" class="form-control" placeholder="Final" name="final[]"></td>
                <td><input type="text" class="form-control" placeholder="Remarks" name="remarks[]"></td>
                <td><button type="button" class="btn btn-danger deleteRowBtn" disabled>🚫</button></td>
            </tr>
        </tbody>
        <tfoot>
            <tr>
                <td class="fw-bold">General Average</td>
                <td colspan="4"></td>
                <td><input type="number" class="form-control" placeholder="General Average" name="gen_ave"></td>
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

 <button type="submit" class="btn btn-primary" id="saveDataBtn">Save Data</button>
</form>
    </div>



        <div id="2Card" class="school-card" style="display: none;">
            <div id="schoolCardLayout">
    <!-- First Semester -->
    <div class="mt-3">
    <div style="background-color:#d13ce8; width: 100%; padding: 10px; border-radius: 5px; text-align: center; margin-bottom:10px;">
            <h6 style="margin: 0; color: white; font-weight: bold;">School Card (Senior High)</h6>
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
                <td><button type="button" class="btn btn-danger deleteRowBtn" disabled>🚫</button>

                </td>
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
                <td><select class="form-select subject-select">
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
<button type="button" class="btn btn-primary" id="saveDataBtn">Save Data</button>

</div>


<div id="3Card" class="school-card" style="display: none;">
<div id="schoolCardLayout">
                        <!-- School Card Inputs (added dynamically) -->
                         <div class="mt-3">
                         <div style="background-color:#d13ce8; width: 100%; padding: 10px; border-radius: 5px; text-align: center;margin-bottom:10px;">
    <h6 style="margin: 0; color: white; font-weight: bold;">School Card(College)</h6>
</div>
<div class="row mb-3">

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
                <td><select class="form-select subject-select">
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
                <td><select class="form-select subject-select">
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
<button type="button" class="btn btn-primary" id="saveDataBtn">Save Data</button>

</div>



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
    <!-- // For testing only:
// cardId = "1Card"; // or "2Card", "3Card"
// document.getElementById(cardId).style.display = "block"; -->
<script>

// Utility function to get URL parameters
function getParameterByName(name, url = window.location.href) {
  name = name.replace(/[\[\]]/g, '\\$&');
  const regex = new RegExp('[?&]' + name + '(=([^&#]*)|&|#|$)'),
        results = regex.exec(url);
  if (!results) return null;
  if (!results[2]) return '';
  return decodeURIComponent(results[2].replace(/\+/g, ' '));
}

document.addEventListener("DOMContentLoaded", function() {
  const studentId = getParameterByName('id');

  if (studentId) {
    fetch(`get_student_info.php?student_id=${studentId}`)
      .then(response => response.json())
      .then(data => {
        if (data.error) {
          console.error(data.error);
          return;
        }
        
        // Convert grade_level to uppercase and trim extra spaces
        let gradeLevel = data.grade_level.toUpperCase().trim();
        let cardId = "";

        // Check if the grade level indicates a K-12 level
        if (gradeLevel.includes("GRADE")) {
          // Remove the word "GRADE" and trim the remaining string
          let numericPart = gradeLevel.replace("GRADE", "").trim();
          let levelNumber = parseInt(numericPart);
          
          if (!isNaN(levelNumber)) {
            if (levelNumber >= 7 && levelNumber <= 10) {
              cardId = "1Card"; // Junior High
            } else if (levelNumber >= 11 && levelNumber <= 12) {
              cardId = "2Card"; // Senior High
            }
          } else {
            console.error("Cannot parse numeric value from grade level:", gradeLevel);
          }
        } 
        // Otherwise, if the value contains "COLLEGE", assume it's a college level
        else if (gradeLevel.includes("COLLEGE")) {
          cardId = "3Card"; // College
        } else {
          console.error("Grade level format not recognized:", gradeLevel);
        }

        // Hide all cards
        document.querySelectorAll(".school-card").forEach(card => {
          card.style.display = "none";
        });
        // Show the selected card if found
        if (cardId) {
          const elem = document.getElementById(cardId);
          if (elem) {
            elem.style.display = "block";
          } else {
            console.error(`Element with id "${cardId}" not found.`);
          }
        }
      })
      .catch(error => console.error("Error fetching student info:", error));
  } else {
    console.error("student_id not provided in the URL.");
  }
});
</script>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
