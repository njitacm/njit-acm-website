<?php

$year = htmlspecialchars($_GET["year"]);
$conn = new mysqli("localhost","njithostingacm","Changethedoorcode!","njithost_acm_website");
if($conn->connect_error)
{
  die("Error connecting to the database! ".$conn->connect_error);
}
$results = $conn->query("select * from Eboard where Term=".$year);

$president = NULL;
$vp = NULL;
$treasurer = NULL;
$webmaster = NULL;
$secretary = NULL;

/*if($results->num_rows > 0)
{
  while($row = $results->fetch_assoc())
  {
    if($row["Role"] == "President")
      $president = $row;
    else if($row["Role"] == "Vice President")
      $vp = $row;
    else if($row["Role"] == "Treasurer")
      $treasurer = $row;
    else if($row["Role"] == "Webmaster")
      $webmaster = $row;
    else if($row["Role"] == "Secretary")
      $secretary = $row;
  }
}*/
$conn->close();
echo '<section class="section--center mdl-grid mdl-grid--no-spacing">';
echo '<h3>E-Board ('.$year.' Term)</h3>';
echo '<p>Below is a list of our current-acting E-Board members and their positions. E-Board elections are held every fall semester. In order to be qualified to vote, you must attend at least one-half of our meetings throughout the semester. Please check our constitution page for more information regarding our elections.</p>';
echo '<div style="margin:50px">';
echo '<h4>President</h4>';
if(file_exists('images/'.$year.'/president.png'))
  echo '<div style="width: 300px;height:300px;background:url(images/'.$year.'/president.png) no-repeat center" class="demo-card-image mdl-card mdl-shadow--2dp">';
else
echo '<div style="width: 300px;height:300px;background:url(images/ducky.png) no-repeat center" class="demo-card-image mdl-card mdl-shadow--2dp">';
echo '<div class="mdl-card__actions">';
echo '</div>';
echo '</div>';
echo '<h6>'.$president["Name"].', '.$president["Year"].' '.$president["Major"].' Major</h6>';
if($president["UCID"] != '')
  echo '<h6>Email: <a href="mailto:'.$president["UCID"].'@njit.edu">'.$president["UCID"].'@njit.edu</a></h6>';
echo '</div>';
echo '<br>';
echo '<div style="margin:50px">';
echo '<h4>Vice President</h4>';
if(file_exists('images/'.$year.'/vice_president.png'))
  echo '<div style="width: 300px;height:300px;background:url(images/'.$year.'/vice_president.png) no-repeat center" class="demo-card-image mdl-card mdl-shadow--2dp">';
else
echo '<div style="width: 300px;height:300px;background:url(images/ducky.png) no-repeat center" class="demo-card-image mdl-card mdl-shadow--2dp">';
echo '<div class="mdl-card__actions">';
echo '</div>';
echo '</div>';
echo '<h6>'.$vp["Name"].', '.$vp["Year"].' '.$vp["Major"].' Major</h6>';
if($vp["UCID"] != '')
  echo '<h6>Email: <a href="mailto:'.$vp["UCID"].'@njit.edu">'.$vp["UCID"].'@njit.edu</a></h6>';
echo '</div>';
echo '<br>';
echo '<div style="margin:50px">';
echo '<h4>Treasurer</h4>';
if(file_exists('images/'.$year.'/treasurer.png'))
  echo '<div style="width: 300px;height:300px;background:url(images/'.$year.'/treasurer.png) no-repeat center" class="demo-card-image mdl-card mdl-shadow--2dp">';
else
  echo '<div style="width: 300px;height:300px;background:url(images/ducky.png) no-repeat center" class="demo-card-image mdl-card mdl-shadow--2dp">';
echo '<div class="mdl-card__actions">';
echo '</div>';
echo '</div>';
echo '<h6>'.$treasurer["Name"].', '.$treasurer["Year"].' '.$treasurer["Major"].' Major</h6>';
if($treasurer["UCID"] != '')
  echo '<h6>Email: <a href="mailto:'.$treasurer["UCID"].'@njit.edu">'.$treasurer["UCID"].'@njit.edu</a></h6>';
echo '</div>';
echo '<br>';
echo '<div style="margin:50px">';
echo '<h4>Webmaster</h4>';
if(file_exists('images/'.$year.'/webmaster.png'))
  echo '<div style="width: 300px;height:300px;background:url(images/'.$year.'/webmaster.png) no-repeat center" class="demo-card-image mdl-card mdl-shadow--2dp">';
else
  echo '<div style="width: 300px;height:300px;background:url(images/ducky.png) no-repeat center" class="demo-card-image mdl-card mdl-shadow--2dp">';
echo '<div class="mdl-card__actions">';
echo '</div>';
echo '</div>';
echo '<h6>'.$webmaster["Name"].', '.$webmaster["Year"].' '.$webmaster["Major"].' Major</h6>';
if($webmaster["UCID"] != '')
  echo '<h6>Email: <a href="mailto:'.$webmaster["UCID"].'@njit.edu">'.$webmaster["UCID"].'@njit.edu</a></h6>';
echo '</div>';
echo '<br>';
echo '<div style="margin:50px">';
echo '<h4>Secretary</h4>';
if(file_exists('images/'.$year.'/secretary.png'))
  echo '<div style="width: 300px;height:300px;background:url(images/'.$year.'/secretary.png) no-repeat center" class="demo-card-image mdl-card mdl-shadow--2dp">';
else
  echo '<div style="width: 300px;height:300px;background:url(images/ducky.png) no-repeat center" class="demo-card-image mdl-card mdl-shadow--2dp">';
echo '<div class="mdl-card__actions">';
echo '</div>';
echo '</div>';
echo '<h6>'.$secretary["Name"].', '.$secretary["Year"].' '.$secretary["Major"].' Major</h6>';
if($secretary["UCID"] != '')
  echo '<h6>Email: <a href="mailto:'.$secretary["UCID"].'@njit.edu">'.$secretary["UCID"].'@njit.edu</a></h6>';
echo '</div>';
echo '<br>';
echo '</section>';
echo '<div style="text-align:center">';
echo '<label>View Eboard for Term:</label>';
echo '<br>';
?>
