<?php
require_once '../include/MyTrip.php';

$departure = (empty($_POST['departure'])) ? '0640' : $_POST['departure'];
$meeting = (empty($_POST['meeting'])) ? '0900' : $_POST['meeting'];
?>
<!DOCTYPE html>
<html lang="en">
 <head>
  <title>Monte Carlo</title>
  <meta http-equiv="content-type" content="text/html; charset=utf-8">
  <link rel="stylesheet" type="text/css" href="/css/styles.css">
 </head>
 <body>
  <h1>Monte Carlo Demonstration</h1>
  <h3> Nama = Fazza Dwi Riandy</h3>
  <h3> NRP = 152017034</h3>
  <h3>tutor : IMC Lab github (re-code :D )<h3>
  <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
   <label for="departure">Departure Time *waktu keberangkatan</label>
   <input type="text" id="departure" name="departure" size="4" maxlength="4" 
    value="<?php echo $departure; ?>">
   <br>
   <label for="meeting">Meeting Time *jam untuk mendatangi rapat (co: rapat dimulai jam 9 pagi maka angka yang dimasukkan = 9000)</label>
   <input type="text" id="meeting" name="meeting" size="4" maxlength="4" 
    value="<?php echo $meeting; ?>">
   <br>
   <input type="submit" value="Simulate">
  </form>
  <pre>
<?php
try {
    $trip = new MyTrip();
    $trip->setDepartureTime($departure);
    $trip->setMeetingTime($meeting);
    $trip->runCheckPlanRisk(1000);
}
catch (Exception $e) {
    echo $e->getMessage();
}
?>
  </pre>
 </body>
</html>
