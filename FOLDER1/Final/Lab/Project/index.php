<?php
$team_members = [
    ["name" => "Jude Bernardo", "img" => "Jude.jpg", "quote" => '"I see myself. I see myself. I see myself in the mirror."', "info" => "Role: Clutch Player <br> Specialty: Web Architecture & Systems Design"],
    ["name" => "Wish Zaragoza", "img" => "Wish.jpg", "quote" => '"PATAWADDDDDD!!!!"', "info" => "Role: Protagonist <br> Specialty: Interface Layouts & Prototyping"],
    ["name" => "Renier Camaso", "img" => "Renier.jpg", "quote" => '"MAY KALIWA BA SA KANAN?!! MAY KALIWA BA SA ROIGHTTT?!!"', "info" => "Role: Sidekick <br> Specialty: Responsive CSS & Styling"],
    ["name" => "Renz Regidor", "img" => "Renz.jpg", "quote" => '"HMMMMM DEPENDE KUNG 3 YAN"', "info" => "Role: NPC <br> Specialty: Database Management & PHP"],
    ["name" => "Erick John Nofuente", "img" => "Erick.jpg", "quote" => '"MAIIPIT KA NGANIIIIII!"', "info" => "Role: Mysterious Character <br> Specialty: Code Optimization & Debugging"],
    ["name" => "Christian Andrei Ortinez", "img" => "Christian Andrei Ortinez.jpg", "quote" => '"Turning ambition into achievement."', "info" => "Role: Final Boss <br> Specialty: Requirements & Tech Documentation"],
    ["name" => "Dianne Claire Redulosa", "img" => "Dianne.jpg", "quote" => '"Tamad na Artist"', "info" => "Role: Living Legend <br> Specialty: Digital Illustration & Visual Assets"]
];

// Lab Exercise 1: Basic JSON Encoding
$json_string = json_encode($team_members);

// Lab Exercise 2: Decoding JSON
$members_object = json_decode($json_string);        // PHP object
$members_array  = json_decode($json_string, true);  // PHP associative array

// ANNOUNCEMENT DATA
$announcement = [
    "title" => "Group 4 Project Update",
    "date" => "November 7, 2026",
    "category" => "Project Milestone",
    "content" => "Group 4 is currently working on improving the design and features of our Meet The Team website. We have successfully added a live AJAX search feature that allows users to search for team members without refreshing the webpage. More updates and improvements are coming soon!",
];

// GET REQUEST - Load Latest Announcement BLOCKER
if (isset($_GET['ajax']) && $_GET['ajax'] == 'load_post') {

    echo '
    <div class="announcement-card">
        <div class="announcement-banner">
            GROUP 4 ANNOUNCEMENT
        </div>

        <div class="announcement-content">
            <span class="announcement-category">'
                . htmlspecialchars($announcement["category"]) .
            '</span>

            <h2>'
                . htmlspecialchars($announcement["title"]) .
            '</h2>

            <p class="announcement-date">'
                . htmlspecialchars($announcement["date"]) .
            '</p>

            <p class="announcement-text">'
                . htmlspecialchars($announcement["content"]) .
            '</p>
        </div>
    </div>';

    exit;
}

// Lab Activity: Exploring XML
if (isset($_GET['ajax']) && $_GET['ajax'] == 'load_xml') {

    $file = __DIR__ . '/student_data.xml';

    libxml_use_internal_errors(true);
    $xml = file_exists($file) ? simplexml_load_file($file) : false;

    if ($xml === false) {
        echo '<p class="no-results">Could not read student_data.xml.</p>';
        exit;
    }

    echo '
    <div class="announcement-card">
        <div class="announcement-banner">
            STUDENT RECORDS (student_data.xml)
        </div>
        <div class="announcement-content">
            <table class="xml-table">
                <thead>
                    <tr><th>ID</th><th>Name</th><th>Course</th><th>Year</th></tr>
                </thead>
                <tbody>';

    foreach ($xml->student as $student) {
        echo '<tr>
                <td>' . htmlspecialchars($student->id) . '</td>
                <td>' . htmlspecialchars($student->name) . '</td>
                <td>' . htmlspecialchars($student->course) . '</td>
                <td>' . htmlspecialchars($student->year) . '</td>
              </tr>';
    }

    echo '      </tbody>
            </table>
        </div>
    </div>';

    exit;
}

$search = isset($_POST['search']) ? trim($_POST['search']) : '';

function showMembers($team_members, $search) {

    $found = false;

    for ($i = 0; $i < count($team_members); $i++) {

        if (
            $search == '' ||
            stripos($team_members[$i]['name'], $search) !== false
        ) {

            $found = true;
            ?>

            <div class="card">

                <img src="<?= htmlspecialchars($team_members[$i]['img']) ?>"
                     alt="<?= htmlspecialchars($team_members[$i]['name']) ?>"
                     class="card-img">

                <h3><?= htmlspecialchars($team_members[$i]['name']) ?></h3>

                <p class="quote">
                    <?= htmlspecialchars($team_members[$i]['quote']) ?>
                </p>

                <button class="toggle-btn"
                        type="button"
                        onclick="toggleDetails(this)">
                    <span>▲</span>
                </button>

                <div class="extra-info">
                    <p><?= $team_members[$i]['info'] ?></p>
                </div>

            </div>

            <?php
        }
    }

    if (!$found) {
        echo '<p class="no-results">No members found.</p>';
    }
}

// Lab Exercise 3 – Exploring the Fetch API
if (isset($_GET['api']) && $_GET['api'] == 'create_post') {

    $raw  = file_get_contents('php://input');   
    $data = json_decode($raw, true);           

    if (!$data || empty($data['title']) || empty($data['content'])) {
        http_response_code(400);
        echo '<p class="no-results">Please enter a title and a message.</p>';
        exit;
    }

    echo '
    <div class="announcement-card">
        <div class="announcement-banner">NEW GROUP POST</div>
        <div class="announcement-content">
            <span class="announcement-category">New Post</span>
            <h2>' . htmlspecialchars($data['title']) . '</h2>
            <p class="announcement-date">' . date("F j, Y") . '</p>
            <p class="announcement-text">' . htmlspecialchars($data['content']) . '</p>
        </div>
    </div>';
    exit;
}

// AJAX REQUEST
if (isset($_POST['ajax'])) {

    // LOAD ANNOUNCEMENT
    if ($_POST['ajax'] == 'load_post') {

        echo '
        <div class="announcement-card">

            <div class="announcement-banner">
                <span>FEATURED ANNOUNCEMENT</span>
            </div>

            <div class="announcement-content">

                <span class="announcement-category">'
                    . htmlspecialchars($announcement['category']) .
                '</span>

                <h2>'
                    . htmlspecialchars($announcement['title']) .
                '</h2>

                <p class="announcement-date">'
                    . htmlspecialchars($announcement['date']) .
                '</p>

                <p class="announcement-text">'
                    . nl2br(htmlspecialchars($announcement['content'])) .
                '</p>

            </div>

        </div>
        ';

        exit;
    }

    // LIVE SEARCH
    if ($_POST['ajax'] == '1') {

        showMembers($team_members, $search);

        exit;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Meet The Team - Group 4</title>
    <link rel="stylesheet" href="style.css?v=6">
</head>

<body>

    <a href="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>">
    <img src="Pamantasan_ng_Lungsod_ng_Muntinlupa_logo.png"
         alt="PLMun Logo"
         class="page-logo logo-left">
</a>

<a href="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>">
    <img src="CITC_Logo.png"
         alt="CITCS Logo"
         class="page-logo logo-right">
</a>

    <div class="container">

        <div class="title-card">
            <h1>MEET THE TEAM</h1>
            <h2>GROUP 4</h2>
        </div>

        <!-- Changed GET to POST -->
<form method="POST" class="search-form" id="searchForm">

    <input type="text"
           name="search"
           id="searchInput"
           class="search-input"
           placeholder="Search member..."
           autocomplete="off">
</form>

<!-- TEAM MEMBERS -->
<div class="team-box" id="teamBox">
    <?php showMembers($team_members, ''); ?>
</div>

<!-- STUDENT RECORDS (XML) -->
<div class="post-card">

    <h3>STUDENT RECORDS</h3>

    <p class="sub-text">
        Student data loaded from student_data.xml
    </p>

    <div class="button-group">
        <button type="button" id="loadXml" class="action-btn xml-btn">
            Load Student Records (XML)
        </button>
    </div>

    <div id="xmlOutput" class="post-output" style="display: none;"></div>

    <button type="button" class="pull-up-btn" id="xmlPullUpBtn"
            onclick="pullUpXml()" style="display: none;">
        ↑ Pull Up
    </button>

</div>

<!-- ANNOUNCEMENTS -->
<div class="post-card">

    <h3>PROJECT UPDATES & ANNOUNCEMENTS</h3>

    <p class="sub-text">
        Stay updated with the latest news and milestones from Group 4
    </p>
    
    <!-- Lab Exercise 4: Handling JSON Input -->
    <input type="text" id="postTitle" class="search-input post-input" placeholder="Post title">
    <textarea id="postContent" class="search-input post-input" rows="3" placeholder="Write your message..."></textarea>

    <div class="button-group">
        <button type="button" id="createPost" class="action-btn secondary-btn">
            Create Group Post
        </button>

        <button type="button" id="loadData" class="action-btn">
            Load Latest Announcement
        </button>
    </div>

    <!-- Output Section -->
    <div id="output" class="post-output" style="display: none;"></div>

    <button type="button" class="pull-up-btn" id="pullUpBtn"
            onclick="pullUp()" style="display: none;">
        ↑ Pull Up
    </button>
</div>

    </div>


    <script>

// Lab Exercise 5: PHP + JSON + JavaScript (AJAX)
var searchInput = document.getElementById("searchInput");
var searchForm = document.getElementById("searchForm");
var teamBox = document.getElementById("teamBox");
var currentRequest;

searchInput.addEventListener("input", function () {
    if (currentRequest) {
        currentRequest.abort();
    }

    currentRequest = new XMLHttpRequest();
    currentRequest.open("POST", window.location.pathname, true);
    currentRequest.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    currentRequest.onreadystatechange = function () {
        if (currentRequest.readyState == 4 && currentRequest.status == 200) {
            teamBox.innerHTML = currentRequest.responseText;
        }
    };

    currentRequest.send("ajax=1&search=" + encodeURIComponent(searchInput.value));
});

searchForm.addEventListener("submit", function (event) {
    event.preventDefault();
});

// TOGGLE DETAILS
function toggleDetails(btn) {
    btn.classList.toggle("active");
    btn.nextElementSibling.classList.toggle("open");
}

// Lab Exercise 2 – Exploring XMLHttpRequest (GET REQUEST)
document.getElementById("loadData").addEventListener("click", function () {
    var request = new XMLHttpRequest();
    request.open("GET", window.location.pathname + "?ajax=load_post", true);

    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            var output = document.getElementById("output");
            output.innerHTML = request.responseText;
            output.style.display = "block";
            document.getElementById("pullUpBtn").style.display = "inline-block";
        }
    };

    request.send();
});

// POST REQUEST - Create Group Post (sends JSON)
document.getElementById("createPost").addEventListener("click", function () {
    var request = new XMLHttpRequest();
    request.open("POST", window.location.pathname + "?api=create_post", true);
    request.setRequestHeader("Content-Type", "application/json");

    request.onreadystatechange = function () {
        if (request.readyState == 4) {
            var output = document.getElementById("output");
            output.innerHTML = request.responseText;
            output.style.display = "block";
            document.getElementById("pullUpBtn").style.display = "inline-block";
        }
    };

    //Lab Exercise 4: Handling JSON Input
    request.send(JSON.stringify({
        title: document.getElementById("postTitle").value,
        content: document.getElementById("postContent").value
    }));
});

// PULL UP (hide the output)
function pullUp() {
    var output = document.getElementById("output");
    output.innerHTML = "";
    output.style.display = "none";
    document.getElementById("pullUpBtn").style.display = "none";
}

// Lab Activity: Exploring XML (Load Student Records (XML)
document.getElementById("loadXml").addEventListener("click", function () {
    var request = new XMLHttpRequest();
    request.open("GET", window.location.pathname + "?ajax=load_xml", true);

    request.onreadystatechange = function () {
        if (request.readyState == 4) {
            var output = document.getElementById("xmlOutput");

            if (request.status == 200) {
                output.innerHTML = request.responseText;
            } else {
                output.innerHTML = '<p class="no-results">Failed to load XML data.</p>';
            }

            output.style.display = "block";
            document.getElementById("xmlPullUpBtn").style.display = "inline-block";
        }
    };

    request.send();
});

// PULL UP (hide the XML output)
function pullUpXml() {
    var output = document.getElementById("xmlOutput");
    output.innerHTML = "";
    output.style.display = "none";
    document.getElementById("xmlPullUpBtn").style.display = "none";
}

</script>

</body>
</html>