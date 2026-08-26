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

  $member = isset($_GET['member']) ? $_GET['member'] : '';
?>
<!DOCTYPE html>
<html>
<head>
  <title>Meet The Team - Group 4</title>

  <link rel="stylesheet" href="style.css">
</head>

<body>

  <img src="Pamantasan_ng_Lungsod_ng_Muntinlupa_logo.png" alt="PLMun Logo" class="page-logo logo-left">
  <img src="CITC_Logo.png" alt="CITCS Logo" class="page-logo logo-right">

  <div class="container">
    <div class="title-card">
      <h1>MEET THE TEAM</h1>
      <h2>GROUP 4</h2>
    </div>

    <div class="team-box">
  <?php for ($i = 0; $i < count($team_members); $i++): ?>

    <div class="card">

    <img src="<?= $team_members[$i]['img'] ?>"
         alt="<?= $team_members[$i]['name'] ?>"
         class="card-img">

    <h3><?= $team_members[$i]['name'] ?></h3>

    <p class="quote"><?= $team_members[$i]['quote'] ?></p>

    <!--GET form-->
    <form method="GET">
        <input type="hidden" name="member" value="<?= $team_members[$i]['name'] ?>">
        <button type="submit" class="select-btn">
            Select Member
        </button>
    </form>

    <button class="toggle-btn" onclick="toggleDetails(this)">
        <span>▲</span>
    </button>

    <div class="extra-info">
        <p><?= $team_members[$i]['info'] ?></p>
    </div>

</div>
  <?php endfor; ?>

  <script>
    function toggleDetails(btn) {
      btn.classList.toggle('active');
      btn.nextElementSibling.classList.toggle('open');
    }

    //if (performance.navigation.type === 1 && window.location.search) {
    //window.location.href = window.location.pathname;
  //}
  </script>

</body>
</html>