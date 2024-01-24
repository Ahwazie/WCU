<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KPI Monitoring System</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

       <main class="main-content">
        <div class="top-bar">
            <div class="search-container">
                <button class="search-btn">
                    <img src="icons/search.png" alt="Search" width="20" height="20">
                </button>
                <input type="text" class="search-input" placeholder="Search">
            </div>
            <div class="user-info">
    <p class="text-light m-0 mr-2">Welcome, <strong><?php echo $_SESSION['username']; ?></strong>!</p>
    <a href="index.php?logout='1'" style="margin-left: 6px" style="margin=top: 5px">
        <img src="icons/admin.png" alt="Admin Icon" style="width: 20px; height: auto;">
    </a>
</div>

        </div>

        <!-- Place other main content here -->
        <div class="content-area">
            <div class="welcome-message">
                <h1>Welcome to KPI Monitoring System</h1>
                <p>Quickly navigate to key areas using the buttons below.</p>
            </div>
    <hr>
        <div class="navigation-buttons">
            <a href="student.php" class="nav-btn">
                <img src="icons/student.png" alt="Icon 1" width="100" height="100">
                <span>Student Quality</span>
            </a>
            <a href="page2.html" class="nav-btn">
                <img src="icons/staff.png" alt="Icon 2" width="85" height="90">
                <span>Staff Quality</span>
            </a>
            <a href="page3.html" class="nav-btn">
                <img src="icons/facility-management.png" alt="Icon 3" width="100" height="100">
                <span>Facilities/Lab Accredited</span>
            </a>
            <a href="page3.html" class="nav-btn">
                <img src="icons/postgraduate.png" alt="Icon 3" width="100" height="100">
                <span>Postgraduates/Supervision</span>
            </a><a href="page3.html" class="nav-btn">
                <img src="icons/research.png" alt="Icon 3" width="100" height="100">
                <span>Research/Grants</span>
            </a>
            <a href="page3.html" class="nav-btn">
                <img src="icons/open-book.png" alt="Icon 3" width="100" height="100">
                <span>Publications: Journal/Books</span>
            </a>
            <a href="page3.html" class="nav-btn">
                <img src="icons/networking.png" alt="Icon 3" width="100" height="100">
                <span>International Networking/Linkages</span>
            </a>
            <a href="page3.html" class="nav-btn">
                <img src="icons/trophy.png" alt="Icon 3" width="100" height="100">
                <span>Innovation/Awards</span>
            </a>
            <a href="page3.html" class="nav-btn">
                <img src="icons/teach.png" alt="Icon 3" width="100" height="100">
                <span>Teaching & Learning/Programme Recognition</span>
            </a>
            <a href="page3.html" class="nav-btn">
                <img src="icons/responsibility.png" alt="Icon 3" width="100" height="100">
                <span>Social Responsibilities/Community Services</span>
            </a>
            <a href="page3.html" class="nav-btn">
                <img src="icons/income.png" alt="Icon 3" width="100" height="100">
                <span>Income Generation/Endowment</span>
            </a>
            <!-- Add more buttons as needed -->
        </div>
        </div>
    </div>
    </main>

    <aside class="sidebar">
        <div class="logo">
            <img src="icons/unissalogo.png" alt="Logo"> <!-- Replace with your logo path -->
        </div>
        <hr>
        <ul class="menu">
            <li><a href="index.php"><img src="icons/dashboard.png" alt="Dashboard Icon"> Dashboard</a></li>
            <li><a href="display_predictions.php"><img src="icons/dashboard.png" alt="Dashboard Icon"> Data Analytics</a></li>
            <li><a href="academic-performance.html"><img src="icons/performance.png" alt="Performance Icon"> Academic Performance</a></li>
            <li><a href="survey-results.html"><img src="icons/survey.png" alt="Survey Icon"> Survey Results</a></li>
            <li><a href="financial-data.html"><img src="icons/cash-flow.png" alt="Financial Icon"> Financial Data</a></li>
        </ul>

        <div class="logout-container">
            <a href="index.php?logout='1'" class="logout-btn">
                <img src="icons/redlogout.png" alt="Logout"> <!-- Replace with your logout icon -->
                Logout
            </a>
        </div>
    </aside>

</body>
</html>

<script>
function w3_open() {
    document.getElementById("mySidebar").style.display = "block";
}
function w3_close() {
    document.getElementById("mySidebar").style.display = "none";
}
</script>
