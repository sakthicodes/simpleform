<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "medical_reports";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $date = $_POST["date"];
  $name = $_POST["name"];
  $age = $_POST["age"];
  $sex = $_POST["sex"];
  $referred_by = $_POST["referred_by"];
  $liver_size = $_POST["liver_size"];
  $biliary_ducts = $_POST["biliary_ducts"];
  $portal_vein_status = $_POST["portal_vein_status"];
  $gall_bladder_status = $_POST["gall_bladder_status"];
  $peri_cholecystic_area = $_POST["peri_cholecystic_area"];
  $pancreas_status = $_POST["pancreas_status"];
  $spleen_size = $_POST["spleen_size"];
  $kidney_status = $_POST["kidney_status"];
  $cortico_medullary_distinction = $_POST["cortico_medullary_distinction"];
  $parenchymal_thickness = $_POST["parenchymal_thickness"];
  $right_kidney_size = $_POST["right_kidney_size"];
  $left_kidney_size = $_POST["left_kidney_size"];
  $para_aortic_areas_status = $_POST["para_aortic_areas_status"];
  $ivc_status = $_POST["ivc_status"];
  $urinary_bladder_status = $_POST["urinary_bladder_status"];
  $prostate_size = $_POST["prostate_size"];
  $impression = $_POST["impression"];
  $sonologist_name = $_POST["sonologist_name"];

  // Prepare and execute the SQL query
  $sql = "INSERT INTO medical_reports (date, name, age, sex, referred_by, liver_size, biliary_ducts, portal_vein_status, gall_bladder_status, peri_cholecystic_area, pancreas_status, spleen_size, kidney_status, cortico_medullary_distinction, parenchymal_thickness, right_kidney_size, left_kidney_size, para_aortic_areas_status, ivc_status, urinary_bladder_status, prostate_size, impression, sonologist_name) VALUES ('$date', '$name', $age, '$sex', '$referred_by', '$liver_size', '$biliary_ducts', '$portal_vein_status', '$gall_bladder_status', '$peri_cholecystic_area', '$pancreas_status', '$spleen_size', '$kidney_status', '$cortico_medullary_distinction', '$parenchymal_thickness', '$right_kidney_size', '$left_kidney_size', '$para_aortic_areas_status', '$ivc_status', '$urinary_bladder_status', '$prostate_size', '$impression', '$sonologist_name')";

  if ($conn->query($sql) === TRUE) {
      echo "Record inserted successfully";
  } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
  }
echo "Connected successfully";
}
// Close connection when done with database operations
$conn->close();

?>
