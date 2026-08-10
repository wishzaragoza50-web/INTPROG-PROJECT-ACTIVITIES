<?php
$team_members = [
    [
        "name" => "Jude Bernardo",
        "img" => "Jude.jpg",
        "img_class" => "", 
        "quote" => '"I see myself. I see myself. I see myself in the mirror. We see ourselvees. We see ourselvees. We see ourselvees in the mirror. You see yourself. You see yourself. You see yourself in the mirror."'
    ],
    [
        "name" => "Wish Zaragoza",
        "img" => "Wish.jpg",
        "img_class" => "",
        "quote" => '"PATAWADDDDDD!!!!"'
    ],
    [
        "name" => "Renier Camaso",
        "img" => "Renier.jpg",
        "img_class" => "", 
        "quote" => '"MAY KALIWA BA SA KANAN?!! MAY KALIWA BA SA ROIGHTTT?!!"'
    ],
    [
        "name" => "Renz Regidor",
        "img" => "Renz.jpg",
        "img_class" => "",
        "quote" => '"HMMMMM DEPENDE KUNG 3 YAN"'
    ],
    [
        "name" => "Erick John Nofuente",
        "img" => "Erick.jpg",
        "img_class" => "",
        "quote" => '"MAIIPIT KA NGANIIIIII!"'
    ],
    [
        "name" => "Christian Andrei Ortinez",
        "img" => "Christian Andrei Ortinez.jpg",
        "img_class" => "",
        "quote" => '"Turning ambition into achievement."'
    ],
    [
        "name" => "Dianne Claire Redulosa",
        "img" => "Dianne.jpg",
        "img_class" => "",
        "quote" => '"Tamad na Artist"'
    ]
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Meet The Team - Group 4</title>
</head>
<body>

  <!-- Top Page Logos -->
  <img src="Pamantasan_ng_Lungsod_ng_Muntinlupa_logo.png" alt="PLMun Logo" class="page-logo logo-left">
  <img src="CITC_Logo.png" alt="CITCS Logo" class="page-logo logo-right">

  <div class="container">
    
    <!-- Title Card -->
    <div class="title-card">
      <h1>MEET THE TEAM</h1>
      <h2>GROUP 4</h2>
      
      <!-- JavaScript Search Bar -->
      <input type="text" id="searchInput" onkeyup="filterMembers()" placeholder="Search team member...">
    </div>

    <!-- Team Members Box dynamically rendered with PHP -->
    <div class="team-box" id="teamBox">
      <?php foreach ($team_members as $member): ?>
        <div class="card">
          <img src="<?php echo $member['img']; ?>" alt="<?php echo $member['name']; ?>" class="card-img <?php echo $member['img_class']; ?>">
          <h3><?php echo $member['name']; ?></h3>
          <p><?php echo $member['quote']; ?></p>
        </div>
      <?php endforeach; ?>
    </div>

  </div>

  <!-- JavaScript Functionality -->
  <script>
    function filterMembers() {
      let input = document.getElementById('searchInput').value.toLowerCase();
      let cards = document.getElementsByClassName('card');

      for (let i = 0; i < cards.length; i++) {
        let name = cards[i].getElementsByTagName('h3')[0].innerText.toLowerCase();
        if (name.includes(input)) {
          cards[i].style.display = "flex";
        } else {
          cards[i].style.display = "none";
        }
      }
    }
  </script>

</body>

<style>
  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: Arial, sans-serif;
  }

  body {
    background: linear-gradient(rgba(255, 255, 255, 0.4), rgba(255, 255, 255, 0.4)), 
                url('schoolbg.jpg') no-repeat center center fixed;
    background-size: cover;
    min-height: 100vh;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    padding: 40px 20px;
    position: relative;
  }

  .page-logo {
    position: fixed;
    top: 25px;
    width: 150px;
    height: 150px;
    object-fit: contain;
    z-index: 100;
  }

  .logo-left {
    left: 25px;
  }

  .logo-right {
    right: 25px;
  }

  .container {
    width: 100%;
    max-width: 1250px;
    text-align: center;
    display: flex;
    flex-direction: column;
    align-items: center;
  }

  .title-card {
    background-color: #ffffff;
    border: 2px solid #002b66;
    border-radius: 12px;
    padding: 20px 40px;
    margin-bottom: 25px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
  }

  h1 {
    color: #002b66;
    font-size: 2.8rem;
    font-weight: 800;
  }

  h2 {
    color: #d97706;
    font-size: 1.5rem;
    font-weight: 700;
    margin-top: 5px;
    margin-bottom: 12px;
  }

  #searchInput {
    padding: 8px 15px;
    width: 100%;
    max-width: 280px;
    border: 2px solid #002b66;
    border-radius: 6px;
    font-size: 0.9rem;
    outline: none;
    text-align: center;
  }

  .team-box {
    border: 3px solid #000000;
    border-radius: 16px;
    padding: 30px 20px;
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 20px;
    background: rgba(255, 255, 255, 0.2);
    width: 100%;
  }

  .card {
    background-color: #ffffff;
    border: 2px solid #002b66;
    border-radius: 12px;
    width: 210px;
    padding: 20px 15px;
    text-align: center;
    display: flex;
    flex-direction: column;
    align-items: center;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    overflow: hidden;
  }

  .card-img {
    width: 150px;
    height: 150px;
    object-fit: cover;
    object-position: top;
    border-radius: 8px;
    margin-bottom: 12px;
  }

  .card h3 {
    color: #002b66;
    font-size: 1.1rem;
    margin-bottom: 6px;
  }

  .card p {
    color: #555;
    font-size: 0.85rem;
    line-height: 1.3;
  }
</style>
</html>
