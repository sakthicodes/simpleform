<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medical Report Form</title>
    <style>
  
  body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 200vh;
            flex-direction: column;
        }

        #dataListContainer {
            width: 70%;
            overflow-x: auto;
            overflow-y: auto;
            height: 80vh;
            background-color: white;
            margin-top: 20px;
        }

        #dataListContainer table {
            width: 100%;
            border-spacing: 0;
            border-collapse: separate;
            border-radius: 3px;
            border: none;
            overflow: hidden;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
        }

        #dataListContainer th,
        #dataListContainer td {
            padding: 15px;
            text-align: left;
            border-bottom: none;
        }

        #dataListContainer th {
            background-color: #4CAF50;
            color: #fff;
            position: sticky;
            top: 0;
        }

        #dataListContainer tbody tr:hover {
            background-color: rgba(0, 0, 0, 0.05);
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 600px;
            box-sizing: border-box;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #555;
        }

        input,
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 16px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }

        #prevBtn {
            background-color: gray;
            color: #fff;
            cursor: pointer;
            font-size: 18px;
            font-weight: bold;
            padding: 10px;

        }

        #nextBtn {
            background-color: orange;
            color: #fff;
            cursor: pointer;
            font-size: 18px;
            font-weight: bold;
            padding: 10px;

        }

        input[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            cursor: pointer;
            font-size: 18px;
            font-weight: bold;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        .tab {
            display: none;
        }

        /* Responsive Styles */
        @media screen and (max-width: 600px) {
            form {
                width: 90%;
            }
        }
    </style>
</head>
<body>


<form id="medicalForm">
        <h2>Medical Report Form</h2>
    <div class="tab" id="tab1">
    <label for="date">Date:</label>
    <input type="date" id="date" name="date" required>

    <label for="name">Patient's Name:</label>
    <input type="text" id="name" name="name" required>

    <label for="age">Age:</label>
    <input type="number" id="age" name="age" required>

    <label for="sex">Gender:</label>
    <select id="sex" name="sex" required>
        <option value="M">Male</option>
        <option value="F">Female</option>
    </select>

    <label for="referred_by">Referred By:</label>
    <input type="text" id="referred_by" name="referred_by" required>

    <label for="liver_size">Liver Size:</label>
    <input type="text" id="liver_size" name="liver_size" required>
    </div>

    <div class="tab" id="tab2">

    <label for="biliary_ducts">Biliary Ducts:</label>
    <input type="text" id="biliary_ducts" name="biliary_ducts" required>

    <label for="portal_vein_status">Portal Vein Status:</label>
    <input type="text" id="portal_vein_status" name="portal_vein_status" required>

    <label for="gall_bladder_status">Gall Bladder Status:</label>
    <input type="text" id="gall_bladder_status" name="gall_bladder_status" required>

    <label for="peri_cholecystic_area">Peri-Cholecystic Area:</label>
    <input type="text" id="peri_cholecystic_area" name="peri_cholecystic_area" required>

    <label for="pancreas_status">Pancreas Status:</label>
    <input type="text" id="pancreas_status" name="pancreas_status" required>

    <label for="spleen_size">Spleen Size:</label>
    <input type="text" id="spleen_size" name="spleen_size" required>
    </div>

    <div class="tab" id="tab3">

    <label for="kidney_status">Kidney Status:</label>
    <input type="text" id="kidney_status" name="kidney_status" required>

    <label for="cortico_medullary_distinction">Cortico-Medullary Distinction:</label>
    <input type="text" id="cortico_medullary_distinction" name="cortico_medullary_distinction" required>

    <label for="parenchymal_thickness">Parenchymal Thickness:</label>
    <input type="text" id="parenchymal_thickness" name="parenchymal_thickness" required>

    <label for="right_kidney_size">Right Kidney Size:</label>
    <input type="text" id="right_kidney_size" name="right_kidney_size" required>

    <label for="left_kidney_size">Left Kidney Size:</label>
    <input type="text" id="left_kidney_size" name="left_kidney_size" required>

    <label for="para_aortic_areas_status">Para-Aortic Areas Status:</label>
    <input type="text" id="para_aortic_areas_status" name="para_aortic_areas_status" required>
    </div>
    <div class="tab" id="tab4">

    <label for="ivc_status">IVC Status:</label>
    <input type="text" id="ivc_status" name="ivc_status" required>

    <label for="urinary_bladder_status">Urinary Bladder Status:</label>
    <input type="text" id="urinary_bladder_status" name="urinary_bladder_status" required>

    <label for="prostate_size">Prostate Size:</label>
    <input type="text" id="prostate_size" name="prostate_size" required>

    <label for="impression">Impression:</label>
    <input type="text" id="impression" name="impression" required>

    <label for="sonologist_name">Sonologist's Name:</label>
    <input type="text" id="sonologist_name" name="sonologist_name" required>

    </div>
    <div style="overflow:auto;">
        <div style="float:right;">
            <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
            <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>

        </div>
    </div>
</form><!-- ... Your HTML code ... -->
<div id="dataListContainer"></div>

<script>
    let currentTab = 0;

    showTab(currentTab);

    function showTab(n) {
        const tabs = document.getElementsByClassName("tab");
        tabs[n].style.display = "block";

        const prevBtn = document.getElementById("prevBtn");
        const nextBtn = document.getElementById("nextBtn");

        if (n === 0) {
            prevBtn.style.display = "none";
        } else {
            prevBtn.style.display = "inline";
        }
        if (n === tabs.length - 1) {
            nextBtn.innerHTML = "Submit";
        } else {
            nextBtn.innerHTML = "Next";
        }
    }

    function nextPrev(n) {
        const tabs = document.getElementsByClassName("tab");
        tabs[currentTab].style.display = "none";
        currentTab = currentTab + n;

        if (currentTab >= tabs.length) {
            submitFormViaAjax();
            return false;
        }

        showTab(currentTab);
    }

    function submitFormViaAjax() {
        const formData = new FormData(document.getElementById("medicalForm"));
        console.log(formData);

        fetch('submit_report.php', {
            method: 'POST',
            body: formData
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            console.log(data);
            document.getElementById("medicalForm").reset();
           
            location.reload();
            displayDataList();
        })
        .catch(error => {
            console.error('Error:', error);
            location.reload();
            displayDataList();

        });
    }

    document.getElementById('medicalForm').addEventListener('submit', function (event) {
        event.preventDefault();
        submitFormViaAjax();
    });

    function displayDataList() {
    // Fetch data from the server and display it above the form
    fetch('fetch_data.php') // Replace 'fetch_data.php' with your actual endpoint
        .then(response => response.json())
        .then(data => {
            const dataListContainer = document.getElementById("dataListContainer");
            dataListContainer.innerHTML = "<h2>Database Data</h2>";

            if (data.length > 0) {
                const table = document.createElement("table");
                table.border = "1";

                // Create table header
                const headerRow = table.insertRow(0);
                Object.keys(data[0]).forEach(key => {
                    const headerCell = document.createElement("th");
                    headerCell.textContent = key;
                    headerRow.appendChild(headerCell);
                });

                // Fill the table with data
                data.forEach(item => {
                    const row = table.insertRow(-1);
                    Object.values(item).forEach(value => {
                        const cell = row.insertCell(-1);
                        cell.textContent = value;
                    });
                });

                dataListContainer.appendChild(table);
            } else {
                dataListContainer.innerHTML += "<p>No data available.</p>";
            }
        })
        .catch(error => console.error('Error fetching data:', error));
}

// Call the displayDataList function initially to load existing data
displayDataList();


</script>

<!-- ... Your HTML code ... -->


</body>
</html>
