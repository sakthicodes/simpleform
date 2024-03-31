<?php

$con = mysqli_connect("localhost", "id21928409_projecteasyprint", "Project@123", "id21928409_projecteasyprint");
date_default_timezone_set('Asia/Kolkata'); // Change 'Asia/Kolkata' to your desired timezone

// Check and delete files older than 15 minutes
$thresholdTimestamp = date("Y-m-d H:i:s", strtotime("-15 minutes"));

$selectOldFilesQuery = "SELECT * FROM data1 WHERE upload_time < '$thresholdTimestamp'";
$resultOldFiles = mysqli_query($con, $selectOldFilesQuery);

while ($rowOldFile = mysqli_fetch_assoc($resultOldFiles)) {
    // Delete the file from the server
    $fileToDelete = $rowOldFile['image'];
    unlink($fileToDelete);

    // Delete the corresponding database entry
    $dataIdToDelete = $rowOldFile['data_id'];
    $deleteQuery = "DELETE FROM data1 WHERE data_id = '$dataIdToDelete'";
    mysqli_query($con, $deleteQuery);
}

session_start();

$user_id = $_SESSION['user_id'];
if (!isset($user_id))
    header('location:index.php');
?>

<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed layout-compact" dir="ltr"
    data-theme="theme-default" data-assets-path="../assets/" data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Dashboard - Analytics | Sneat - Bootstrap 5 HTML Admin Template - Pro</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../assets/img/logo.png" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />

    <link rel="stylesheet" href="../assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="../assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="../assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="../assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="../assets/vendor/libs/apex-charts/apex-charts.css" />


    <!-- Include Bootstrap CSS and JS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="payauth/client.js"></script>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
 <script src="../assets/js/config.js"></script>
<script>
    document.addEventListener('contextmenu', function (e) {
        e.preventDefault();
    });
</script>

<!-- Include PDF.js library -->
<script src="https://mozilla.github.io/pdf.js/build/pdf.js"></script>

    <script>
        let imgb = document.getElementById("imgb");
        let qrImage = document.getElementById("qrImage");
        let imgtext = document.getElementById("imgtext");

        function generateQR() {
            // Get the user_id from the session
            let user_id = <?php echo $user_id; ?>;

            // Append user_id to the QR code link
            let qrCodeLink = `https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=https://projecteasyprint0.000webhostapp.com/scan.php?user_id=${user_id}`;

            // Update the QR code image source
            document.getElementById("qrImage").src = qrCodeLink;
        }
    </script>


<style>
.overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 80px;
    background-color: white;
    opacity: 1; /* Adjust the opacity as needed */
    z-index: 999; /* Ensure the overlay is on top of the modal content */
}
.embed-cover {
  position: absolute;
  top: 0;
  left: 14px;
  bottom: 0;
  right: 32px;
  
  /* Just for demonstration, remove this part */
  opacity: 0.15;
}

.wrapper {
  position: relative;
  overflow: hidden;
}

</style>
</head>

<body onload="disableContextMenu();" oncontextmenu="return false">
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->

            <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
                <div class="app-brand demo">
                    <a href="index.html" class="app-brand-link">
                        <span class="app-brand-logo demo">
                            <img src="../assets/img/logo.png" alt="" srcset="">
                        </span>
                        <span class="app-brand-text demo menu-text fw-bold ms-2">SWC</span>
                    </a>

                    <a href="javascript:void(0);"
                        class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
                        <i class="bx bx-chevron-left bx-sm align-middle"></i>
                    </a>
                </div>

                <div class="menu-inner-shadow"></div>

                <ul class="menu-inner py-1">
                    <!-- Dashboards -->
                    <li class="menu-item active open">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bx-home-circle"></i>
                            <div data-i18n="Dashboards">Dashboards</div>
                            <div class="badge bg-danger rounded-pill ms-auto">5</div>
                        </a>
                    </li>

                </ul>

            </aside>
            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->

                <nav
                    class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
                    id="layout-navbar">
                    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
                        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                            <i class="bx bx-menu bx-sm"></i>
                        </a>
                    </div>

                    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
                        <!-- Search -->
                        <div class="navbar-nav align-items-center">
                            <div class="nav-item d-flex align-items-center">
                                <i class="bx bx-search fs-4 lh-0"></i>
                                <input type="text"
                                    class="form-control border-0 shadow-none ps-1 ps-sm-2" placeholder="Search..."
                                    aria-label="Search..." />
                            </div>
                        </div>
                        <!-- /Search -->

                        <ul class="navbar-nav flex-row align-items-center ms-auto">
                            <!-- Place this tag where you want the button to render. -->
                            <li class="nav-item lh-1 me-3">

                            </li>

                            <!-- User -->
                            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);"
                                    data-bs-toggle="dropdown">
                                    <div class="avatar avatar-online">
                                        <img src="../assets/img/avatars/5.png" alt
                                            class="w-px-40 h-auto rounded-circle" />
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0 me-3">
                                                    <div class="avatar avatar-online">
                                                        <img src="../assets/img/avatars/5.png" alt
                                                            class="w-px-40 h-auto rounded-circle" />
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <?php
                                                    $con = mysqli_connect("localhost", "id21928409_projecteasyprint", "Project@123");
                                                    $db = mysqli_select_db($con, "id21928409_projecteasyprint");

                                                    $select = mysqli_query($con, "SELECT * From sharewithcode WHERE id = $user_id");
                                                    if (mysqli_num_rows($select) > 0) {
                                                        $fetch = mysqli_fetch_assoc($select);
                                                    }
                                                    ?>
                                                    <span class="fw-medium d-block"><span><?php echo $fetch['name']; ?>.</span>
                                                    </span>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <div class="dropdown-divider"></div>
                                    </li>


                                    <li>
                                        <a class="dropdown-item" href="logout.php">
                                            <i class="bx bx-power-off me-2"></i>
                                            <span class="align-middle">Log Out</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <!--/ User -->
                        </ul>
                    </div>
                </nav>

                <!-- / Navbar -->

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->

                    <div class="container-xxl flex-grow-1 container-p-y">
                        <div class="row">
                            <div class="col-lg-12 mb-4 order-0">
                                <div class="card">
                                    <div class="d-flex align-items-end row">
                                        <div class="col-sm-7">
                                            <div class="card-body">
                                                <h5 class="card-title text-primary">Congratulations <span><?php echo $fetch['name']; ?>
                                                        . 🎉</h5>
                                                <p class="mb-4">
                                                    You have done <span class="fw-medium">72%</span> more messages
                                                    today...
                                                </p>


                                            </div>
                                        </div>
                                        <div class="col-sm-5 text-center text-sm-left">
                                            <div class="card-body pb-0 px-0 px-md-4">
                                                <img src="../assets/img/illustrations/man-with-laptop-light.png"
                                                    height="140" alt="View Badge User"
                                                    data-app-dark-img="illustrations/man-with-laptop-dark.png"
                                                    data-app-light-img="illustrations/man-with-laptop-light.png" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Total Revenue -->
                            <div class="col-12 col-lg-12 order-2 order-md-3 order-lg-2 mb-4">
                                <div class="card">
                                    <div class="row row-bordered g-0">
                                        <div class="col-md-8">
                                              <button class="btn btn-info" onclick="location.reload();">Refresh</button>
                                            <h5 class="card-header m-0 me-2 pb-3">Message Arrived</h5>
                                           
                                            <div class="table-responsive">
                                                  
                    <table class="table table-striped table-borderless">
                  <!-- Modified table header -->
<thead class="table-light">
    <tr>
        <th scope="col">Name</th>
        <th scope="col">File</th>
        <th scope="col">Download</th>
        <th scope="col">Actions</th>
        <th scope="col">View</th> <!-- New column for the download button -->
    </tr>
</thead>
<tbody>
    <?php
    $sql = "SELECT * FROM data1 WHERE id = $user_id";
    $result = mysqli_query($con, $sql);
 
while ($row = mysqli_fetch_assoc($result)) {
    $custname = $row['custname'];
    $image = $row['image'];
    $fileExtension = pathinfo($image, PATHINFO_EXTENSION);
    $decodedUrl = urldecode($image);

    echo '<tr>
            <td id="custn">' . $custname . '</td>
            <td>';

    if (strtolower($fileExtension) === 'pdf') {
        // Display PDF logo for PDF files
        echo '<img src="download.png" width="50px" height="50px" alt="PDF Logo" />';
    } else {
        // Display regular image for other file types
        echo '<img src="' . $image . '" width="50px" height="50px" />';
    }

    echo '</td>
      <td>
        <button class="btn btn-success" onclick="confirmPay(' . $row['pdfcount'] . ')">
            ' . '₹' . (2 * $row['pdfcount']) . ' Pay for Download
        </button>
    </td>
    <td>
        <button class="btn btn-danger" onclick="deleteData(' . $row['data_id'] . ')">Delete</button>
    </td>
   <td>
         <button id="viewButton" class="btn btn-info" onclick="viewPDF(\'' . $row['image'] . '\')">View</button>
         <a href="' . $image . '" download><button id="downloadButton" class="btn btn-success" hidden>Download PDF</button></a>
     </td>
   

  </tr>';
}
?>


</tbody>



            </table>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="card-body">
                                                <div class="text-center">
                                                </div>
                                            </div>
                                            <div class="container1">
                                                <a href="#" onclick="generateQR()"
                                                    class="list-group-item list-group-item-action bg-transparent second-text fw-bold ">
                                                    <div id="imgb">
                                                        <img src="../assets/img/qrcode.gif" id="qrImage">
                                                        <div style="text-align: center; margin-top: 10px; color: gray; font-size: 18px;  font-weight: bold;">
                                                            Click Here Scan QR
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="text-center fw-medium pt-3 mb-2">Feel Free to Share your Files</div>

                                            <div
                                                class="d-flex px-xxl-4 px-lg-2 p-4 gap-xxl-3 gap-lg-1 gap-3 justify-content-between">
                                            
                                            <div class="d-flex">
    <div class="me-2">
        <span class="badge bg-label-info p-2"><i class="bx bx-wallet text-info"></i></span>
    </div>
    <div class="d-flex flex-column">
        <small>2024</small>
        <?php
        // Count the number of rows with the given user_id in data1 table
        $countQuery = "SELECT COUNT(*) AS userCount FROM data1 WHERE id = $user_id";
        $countResult = mysqli_query($con, $countQuery);
        $countRow = mysqli_fetch_assoc($countResult);
        $userCount = $countRow['userCount'];
        ?>
        <h6 class="mb-0"><?php echo $userCount; ?></h6>
    </div>
</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--/ Total Revenue -->

                        </div>

                    </div>


                    <div class="content-backdrop fade"></div>
                </div>
                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>
    </div>
 <!-- PDF Viewer Modal -->
<div class="modal fade" id="pdfViewerModal" tabindex="-1" role="dialog" aria-labelledby="pdfViewerModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="pdfViewerModalLabel">PDF Viewer</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body wrapper">
                 <div class="overlay"></div>
                <!-- Embedded PDF using the embed tag -->
               <embed id="pdfViewerEmbed" src="" type="application/pdf" width="100%" height="600" oncontextmenu="return false;" />
               <div class="embed-cover"></div>
            </div>
        </div>
    </div>
</div>
<script>


    function viewPDF(pdfUrl) {
        // Set the PDF viewer modal title
        $('#pdfViewerModalLabel').text('PDF Viewer');

        // Set the source of the embed tag to display the embedded PDF
        $('#pdfViewerEmbed').attr('src', pdfUrl);

        // Attach a contextmenu event listener to the embed element
        $('#pdfViewerEmbed').on('contextmenu', function (e) {
            // Prevent the default context menu action
            e.preventDefault();
        });

        // Open the PDF viewer modal
        $('#pdfViewerModal').modal('show');
    }

    // Add an event listener for when the modal is hidden
    $('#pdfViewerModal').on('hidden.bs.modal', function () {
        // Clear the src attribute of the embed tag
        $('#pdfViewerEmbed').attr('src', '');

        // Remove the contextmenu event listener
        $('#pdfViewerEmbed').off('contextmenu');
    });
// Original code that prevents context menu
element.addEventListener('contextmenu', function (e) {
    e.preventDefault();
});


</script>


    <script src="../assets/vendor/libs/jquery/jquery.js"></script>
    <script src="../assets/vendor/libs/popper/popper.js"></script>
    <script src="../assets/vendor/js/bootstrap.js"></script>
    <script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="../assets/vendor/js/menu.js"></script>

    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="../assets/vendor/libs/apex-charts/apexcharts.js"></script>

    <!-- Main JS -->
    <script src="../assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="../assets/js/dashboards-analytics.js"></script>
     <script>
        function deleteData(dataId) {
            if (confirm('Are you sure you want to delete this data?')) {
                // Send an AJAX request to delete data
                $.ajax({
                    type: 'POST',
                    url: 'delete.php',
                    data: { data_id: dataId },
                    success: function (response) {
                        // Reload the page or update the table after successful deletion
                        location.reload();
                    },
                    error: function (xhr, status, error) {
                        console.error(xhr.responseText);
                        alert('Error deleting data. Please try again.');
                    }
                });
            }
        }
    </script>
    <script>
    document.addEventListener('contextmenu', function (e) {
        e.preventDefault();
    });
</script>


    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>

</html>
