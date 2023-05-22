<!doctype html>
<html lang="en">
  <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="The official website for NJIT's chapter of ACM.">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NJIT ACM</title>

    <!-- Disable tap highlight on IE -->
    <meta name="msapplication-tap-highlight" content="no">

    <!-- Web Application Manifest -->
    <link rel="manifest" href="manifest.json">

    <!-- Add to homescreen for Chrome on Android -->
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="application-name" content="Web Starter Kit">
    <link rel="icon" sizes="192x192" href="images/njit_acm_logo_NEW.png">

    <!-- Add to homescreen for Safari on iOS -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="Web Starter Kit">
    <link rel="apple-touch-icon" href="images/touch/apple-touch-icon.png">

    <!-- Tile icon for Win8 (144x144 + tile color) -->
    <meta name="msapplication-TileImage" content="images/touch/ms-touch-icon-144x144-precomposed.png">
    <meta name="msapplication-TileColor" content="#3372DF">

    <meta name="theme-color" content="#3372DF">

    <!-- SEO: If your mobile URL is different from the desktop URL, add a canonical link to the desktop page https://developers.google.com/webmasters/smartphone-sites/feature-phones -->
    <!--
    <link rel="canonical" href="http://www.example.com/">
    -->

    <!-- Page styles:
    You can choose other color schemes from the CDN, more info here http://www.getmdl.io/customize/index.html
    Format: material.color1-color2.min.css, some examples:
    material.red-teal.min.css
    material.blue-orange.min.css
    material.purple-indigo.min.css
    -->
    <link rel="stylesheet" href="https://storage.googleapis.com/code.getmdl.io/1.0.2/material.red-indigo.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.4.0/fullcalendar.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/main.css">
  </head>
  <body class="mdl-demo mdl-color--grey-100 mdl-color-text--grey-700 mdl-base">
    <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
      <header class="mdl-layout__header mdl-layout__header--scroll mdl-color--primary">
         <div class="mdl-layout--large-screen-only hidden-md hidden-s hidden-xs" style="background-color:black">
          <a href="/">
          <img style="width:85px; height:70px; padding-top:8px; padding-bottom:8px; padding-left:10px;user-drag: none;-moz-user-select: none;-webkit-user-drag: none;" class="logo-img" src="images/animated.gif" alt="LOGO BY ANDRES ORBE">
          </a>
          <span style="float:right;padding-top:24px;padding-right:16px">
          <a href="/discord" title="Join us on Discord" style="background: #7289da; color: rgb(255, 255, 255)" target="_blank" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect"><i class="fab fa-discord"></i></a>
          <a href="/youtube" title="Subscribe to us on Youtube" style="background: #ff0000; color: rgb(255, 255, 255)" target="_blank" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect"><i class="fab fa-youtube"></i></a>
          <a href="/twitch" title="Subscribe to us on Twitch" style="background: #6441a5; color: rgb(255, 255, 255)" target="_blank" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect"><i class="fab fa-twitch"></i></a>
          <a href="/linkedin" title="Join us on LinkedIn" style="background: #0077b5; color: rgb(255, 255, 255)" target="_blank" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect"><i class="fab fa-linkedin"></i></a>
          <a href="/instagram" title="Follow us on Instagram" style="background: #9b6954; color: rgb(255, 255, 255)" target="_blank" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect"><i class="fab fa-instagram"></i></a>
          <a href="/twitter" title="Follow us on Twitter" target="_blank" style="background: #00acee; color: rgb(255, 255, 255)" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect"><i class="fab fa-twitter"></i></a>
          <a href="/facebook" title="Like us on Facebook" style="background: #3b5998; color: rgb(255, 255, 255)" target="_blank" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect"><i class="fab fa-facebook"></i></a>
          <a href="mailto:acm@njit.edu" title="Email us" style="background: #ffffff; color: #c71610" target="_blank" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect"><i class="fas fa-envelope-square"></i></a>
          </span>
        </div>
        <div class="mdl-layout__tab-bar mdl-js-ripple-effect mdl-color--primary-dark">
          <a id="home-tab" href="#home" class="mdl-layout__tab is-active">About Us</a>
        <!--  <a id="calendar-tab" href="#calendartab" class="mdl-layout__tab">Calendar</a>
         <a id="tutoring-tab" href="#tutoring" class="mdl-layout__tab">Tutoring</a>-->
         <!-- <a id="meetings-tab" href="#meetings" class="mdl-layout__tab">Meeting Slides</a>-->
          <!-- <a id="progteam-tab" href="#icpc" class="mdl-layout__tab">Programming Team</a> -->
          <!--<a id="sigs-tab" href="#sigs" class="mdl-layout__tab">SIGs</a>-->
          <!--<a id="stream-tab" href="#stream" class="mdl-layout__tab">Stream</a>-->
          <a id="hacknjit-tab" href="#hacknjit" class="mdl-layout__tab">HackNJIT</a>
          <a id="jerseyctf-tab" href="#jerseyctf" class="mdl-layout__tab">JerseyCTF</a>
          <!--
          <a id="projects-tab" href="#projects" class="mdl-layout__tab">Projects</a>
          -->
          <a id="eboard-tab" href="#eboard" class="mdl-layout__tab">E-Board</a>
          <a id="contact-tab" href="#contact" class="mdl-layout__tab">Contact Us</a>
          <a id="constitution-tab" href="#constitution" class="mdl-layout__tab">Constitution</a>
        </div>
      </header>
      
      <main class="mdl-layout__content">
        <div class="mdl-layout__tab-panel is-active" id="home">
          <section class="section--center mdl-grid mdl-grid--no-spacing">
            <h3 style="text-align:center;margin-left:auto;margin-right:auto">Welcome to the Official Website for NJIT ACM</h3>
            <div style="width: 600px;height:450px;margin-left:auto;margin-right:auto;background:url(images/chapter_image2022.jpg) no-repeat center" class="demo-card-image mdl-card mdl-shadow--2dp">
              <div class="mdl-card__actions" style="text-align:center;width:100%">
              </div>
            </div>
            <section style="padding:32px">
                
            </br>
            </br>
            
            <p>What is ACM you might ask? ACM stands for the <a href="https://www.acm.org/about-acm" target="_blank">Association for Computing Machinery</a>, and it is the world's largest educational computer science organization. ACM is divided up into many student chapters, and this one just happens to be located at, you guessed it, NJIT! If you're a student studying CS, IT, IS, or any other computer-related field, chances are that you'll find joining ACM to be useful. Whether you join for tutoring, use of ACM's vast array of online resources, or just to connect with fellow programmers, ACM is a great organization to be a part of.</p>
            <p>More specifically, the NJIT chapter of ACM offers free tutoring for CS, IT, and IS classes, contains SIGs (special interest groups) dedicated to teaching various computer science topics, works on various computer science-related projects, and works closely with the NJIT CCS department to host a number events including HackNJIT, NJIT's own 24-hour hackathon. The NJIT chapter of ACM also occasionally takes trips to the headquarters of various companies to give students the opporunity to get an inside-look into real-world job environments. More information regarding our tutoring services, SIGs, projects, HackNJIT, and more is available through clicking the tabs above.</p>
            <p>While ACM is a professional organization, we also pride ourselves in trying to make our office a fun, safe, and friendly work environment. After quiet hours end at 6 PM, the office becomes a place where people can play video games, watch movies, and relax after a hard day of work. NJIT ACM also offers an unofficial SIG called SIG Melee, which is a group dedicated to teaching, playing, and modding the game Super Smash Bros. Melee. While we do not allow new SIGs that are dedicated to video games to be formed, SIG Melee is a SIG that has been grandfathered into NJIT ACM over the years for its popularity amongst the NJIT student body. We urge all students to join us for both our professional services, and to simply unwind after a long day of classes.</p>
            <h3>FAQ</h3>
            <h4>How do I Sign Up?</h4>
            <p>Becoming a member of NJIT ACM is easy, just come to the office to chat, or show up to our weekly meetings. Everyone is welcome. We promise we won't bite!</p>
            <p>NOTE: In order to become a member of ACM National and gain access to ACM's online resources, you must sign up on <a href="http://www.acm.org/membership/join-acm" target="_blank">ACM's official website</a>. Being a member of ACM National also costs a yearly fee, but this fee is lower for students.</p>
            <h4>Are You a Game Club?</h4>
            <p>No. While we urge students to unwind with video games or other fun activities after class, we are not a video game club. Before anything else, NJIT ACM is a club dedicated to connecting students who share common interests in computers and programming. While we will not necessarily kick you out for only playing video games in our office, we strongly reccomend that you also participate in some of the other services or activities that we offer.</p>
            <h4>Why Show up to the Meetings?</h4>
            <p>There are certain perks we offer to members that show up to our meetings. For example, the ability to vote in elections, or first dibs on sign-ups for any trips we take as a club. While it isn't necessary to show up to our weekly meetings, by showing up you'll get to keep up with the latest news regarding the club or upcoming CCS events.</p>
            <h4>When/Where are the Meetings?</h4>
            <p>Our meetings are currently held every Friday at 12 pm in GITC 3600, although there are certain exceptions throughout the semester. Please check our calendar to know exactly when the next meeting is being held.</p>
            <h4>Help! I missed a meeting!</h4>
            <p>Do not fear. All of the slides from our meetings for the semester are available on our discord, which is updated weekly after our meeting.</p>
            <h4>Where are we located?</h4>
            <p>Our office is in GITC 3704.</p>
            <h4>When is the Office Open?</h4>
            <p>The office opens when the first E-Board member opens the door in the morning, typically at 10 am. The office will remain open as long as an E-Board member is present to supervise the office.</p>
            <h4>What are the Office Rules?</h4>
            <p>Just be courteous. Keep in mind that we consider any time before 6 PM to be quiet hours, meaning that while you can talk, we ask that you keep the sound levels to a minimum. During quiet hours, please use headphones when listening to any audio on an electronic device. Also, please do not touch anyone else's belongings without their permission. We have 24/7 video surveilance in the office, so if anything is stolen or moved without permission, we will know who did it.</p>
            </section>
          </section>
        </div>

        <!-- E-Board -->
        <div class="mdl-layout__tab-panel" id="eboard">
            <?php
            $conn = new mysqli("localhost","njithostingacm","Changethedoorcode!","njithost_acm_website");
            if($conn->connect_error)
            {
              die("Error connecting to the database! ".$conn->connect_error);
            }
            $results = $conn->query("select * from Eboard order by term");
            $highestYear = 0;
            $rowList = array();
            $yearList = array();
            if($results->num_rows > 0)
            {
              while($row = $results->fetch_assoc())
              {
                if($row["Term"] > $highestYear)
                  $highestYear = $row["Term"];
                if(!in_array($row["Term"], $yearList))
                  array_push($yearList, $row["Term"]);
              }
            }
            echo '<div id="contentDiv">';
            echo '</div>';
            echo '<div style="text-align:center">';
            echo '<select id="yearBox">';
            for($i = 0; $i < count($yearList); $i++)
            {
              if($highestYear != $yearList[$i])
                echo '<option value="'.$yearList[$i].'">'.$yearList[$i].'</option>';
              else
                echo '<option value="'.$yearList[$i].'" selected="selected">'.$yearList[$i].'</option>';
            }
        		echo '</select>';
        		echo '</div>';
            ?>
          
        </div>

        <!-- Sigs -->
        <div class="mdl-layout__tab-panel" id="sigs">
          <section class="section--center mdl-grid mdl-grid--no-spacing">
            <h3>SIGs</h3>
            <p><a href="https://www.acm.org/special-interest-groups" target="_blank">Special Interest Groups</a> (SIGs) are a core part of the ACM organization. SIGs are student-led groups of ACM members that hold weekly meetings to study specific subjects in the computing sciences.</p>
			<p>The current SIGs for the Fall 2020 semester are listed below. If you're interested in joining one of them, feel free to show up at a meeting or to contact one of its leaders.</p>
		 <?php
			$conn = new mysqli("localhost","njithostingacm","Changethedoorcode!","njithost_acm_website");
			
			if ($conn->connect_error) {
				die("Error connecting to the database! ".$conn->connect_error);
			}
			
			$results = $conn->query("select * from SIGs order by Name");
			
			if ($results->num_rows > 0) {
				while ($row = $results->fetch_assoc()) {
					echo "<br>";
					echo "<br>" . strtoupper($row["Name"]);
					echo "<br>Description: " . $row["Description"];
					echo "<br>Leaders: " . $row["Leaders"];
					//echo "<br>Time: " . $row["Time"];
					echo "<br>Contact Info: " . $row["Contact Info"];
					echo "<br>";
					echo "<br>";
				}	
			}		
			
			$conn->close();
		?>
		<br>
		<br>
		
			<iframe src="https://calendar.google.com/calendar/embed?height=600&amp;wkst=1&amp;bgcolor=%23ffffff&amp;ctz=America%2FNew_York&amp;src=cDg1Nm4wOW1zMzFjZWlpdHEwcGNidmtqbWtAZ3JvdXAuY2FsZW5kYXIuZ29vZ2xlLmNvbQ&amp;color=%23009688&amp;mode=WEEK" style="border:solid 1px #777" width="800" height="600" frameborder="0" scrolling="no"></iframe>
		</section>
		
        </div>
					<!--if($row['Leaders'] != '') {
						$leaders = explode(',',$row['Leaders']);
						$emails = explode(',',$row['Contact Info']);
						echo '<h4>'.$row['Name'].'</h4><p>'.$row['Description'].'</p><p>Leader(s): '.$leaders.$emails;
						for($i = 0; $i < count($leaders); $i++)
						{	if($i < count($leaders) - 1)
								echo $leaders[$i].' (<a href="mailto:'.$emails[$i].'">'.$emails[$i].'</a>), ';
							else
								echo $leaders[$i].' (<a href="mailto:'.$emails[$i].'">'.$emails[$i].'</a>)';
						}
					echo '</p>';
					}
					
					if($row['Email'] != '')
						echo '<p>Alternate Email: <a href="mailto:'.$row['Email'].'">'.$row['Email'].'</a></p>';
					if($row['Website'] != '')
						echo '<p>Website: <a href="https://' .$row['Website'].'">'.$row['Website'].'</a></p>';
					if($row['Time'] != '')
						echo '<p>Meeting Time(s): ' .$row['Time'].'</p>';
					if($row['Location'] != '')
						echo '<p>Meeting Location(s): ' .$row['Location'].'</p>';
				}
			}-->
		
			
        <!-- MEETING SLIDES -->
        <div class="mdl-layout__tab-panel" id="meetings">
          <section class="section--center mdl-grid mdl-grid--no-spacing">
            <p>Below, you will find slides that we've presented in previous meetings this semester. 
            <br>
            
            <br>
                <a href="slides/9-16-2022.pdf">September 16, 2022</a>
            <br>


            
            
          </section>
        </div>

        <!-- Tutoring -->
        <div class="mdl-layout__tab-panel" id="tutoring">
          <section class="section--center mdl-grid mdl-grid--no-spacing">
            <h3>Tutoring</h3>
            <!--NJIT ACM offers is free tutoring for CS, IT, and IS classes! All tutoring takes place in GITC 3700. Below is a list of our current tutors for the Spring 2019 semester, along with the courses they can help with and the times they are available. Please scroll to the bottom of the page to view the tutoring schedule in calendar form.-->
            <p>YWCC/ACM Tutoring is live on Webex! Tutors will be available online starting at 11:00am from Monday to Saturday. Check below to see when tutors are available and which courses they have taken. As opposed to previous semesters, undergrad tutoring will now take place in a single Webex room linked here: <a href = https://njit.webex.com/njit/j.php?MTID=me51138710462acd6cc43de726194d7db> https://njit.webex.com/njit/j.php?MTID=me51138710462acd6cc43de726194d7db </a></p>
            
            <p>If you have any questions or concerns about tutoring, please email <a href="mailto:agm39@njit.edu">agm39@njit.edu</a>.</p>
        <div style="width: 100%">
                 
          <div id="tutor-faq">
            <h3>FAQ </h3>
            <h4>How does tutoring work?<h4>
            <p>Check the schedule on our website to see when a tutor is tutoring the class you need and simply join the Webex room linked above at the designated time. Tutoring will now take place starting at 11:00am from Monday to Saturday. The ending time may vary across each day, but please refer to the schedule/calendar pictured below.</p>
            <p>In addition, please join the ACM discord and check the #webex-tutoring channel to see if the tutor has called out or not. Our tutors are people too! Tutoring will now take place starting at 11:00am from Monday to Saturday. The ending time may vary across each day, but please refer to the schedule/calendar pictured below.</p>
          
            <h4>I need help with another class that is not covered on the schedule, am I out of luck? </h4>
            <p>We can only cover classes that our tutors have taken, we try to cover all the popular YWCC classes  but we only have so many tutors. </p>
            <br>
          </div>
        </div>
         
        <h4>Tutor Schedule</h4>
          <table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp">
          <thead>
            <tr>
              <th class="mdl-data-table__cell--non-numeric">Name</th>
              <!--<th class="mdl-data-table__cell--non-numeric">Title</th> -->
              <th class="mdl-data-table__cell--non-numeric">Times Working</th>
              <th class="mdl-data-table__cell--non-numeric">Courses Tutoring</th>
              <!--<th class="mdl-data-table__cell--non-numeric">WebEx</th> -->
              
              <th class="mdl-data-table__cell--non-numeric">Email</th>
            </tr>
          </thead>
         <tbody>
        <?php
		$conn = new mysqli("localhost","njithostingacm","Changethedoorcode!","njithost_acm_website");
		if($conn->connect_error)
		{
			die("Error connecting to the database! ".$conn->connect_error);
		}
		$results = $conn->query("select * from Tutors order by Name");
		if($results->num_rows > 0)
		{
			while($row = $results->fetch_assoc())
			{
				$name = $row['Name'];
				//$title = $row['Title'];
				$subjects = $row['Courses'];
				$times = $row['Times'];
				//$webex = $row['WebEx'];
				$email = $row['Email'];
                $subjectsString = "";
                $numCommas = 0; $addExtraLine = false;
                for ($idx = 0; $idx < strlen($subjects); $idx++) {
                    if (strcmp($subjects[$idx], ",") == 0) {
                        $numCommas++;
                        $subjectsString .= ",";
                    } else if (strcmp($subjects[$idx], " ") == 0) {
                        if ($numCommas == 4) {
                            $subjectsString .= "<br>";
                            $numCommas = 0;
                            $addExtraLine = true;
                        } else {
                            $subjectsString .= " ";
                        }
                    } else {
                        $subjectsString .= $subjects[$idx];
                    }
                }
                
                $timeString = "";
                $timeWords = explode(" ", $times);
                foreach ($timeWords as $word) {
                    if ($word == "and") {
                        $timeString .= "<br>";
                        $addExtraLine = true;
                    }
                    else {
                        $timeString .= $word . " ";
                    }
                }
                
                if ($addExtraLine) {
                    $subjectsString .= "<br>";
                    $timeString .= "<br>";
                }
				
				echo '<tr>';
				echo '<td class="mdl-data-table__cell--non-numeric">'.$name.'</td>';
				//echo '<td class="mdl-data-table__cell--non-numeric">'.$title.' Tutor'.'</td>';
				echo '<td class="mdl-data-table__cell--non-numeric">'.$timeString.'<br></td>';
				echo '<td class="mdl-data-table__cell--non-numeric">'.$subjectsString.'<br></td>';
				//echo '<td class="mdl-data-table__cell--non-numeric"><a href='.$webex.' target="_blank">'.$webex.'</a></br></td>';
				//echo '<td class="mdl-data-table__cell--non-numeric">'.$email.'<br></td>';
                echo '<td class="mdl-data-table__cell--non-numeric">'."<a href='mailto:".$email."'>".$email."</a>".'</td>';
				echo '</tr>';
			}
		}
	    ?>
          </tbody>
        </table>
        <br>
        <br><br>
        
        
        <h4>Course Schedule</h4>
          <table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp">
          <thead>
            <tr>
              <th class="mdl-data-table__cell--non-numeric">Course</th>
              <th class="mdl-data-table__cell--non-numeric">Days</th>
            </tr>
          </thead>
         <tbody>
        <?php
		$conn = new mysqli("localhost","njithostingacm","Changethedoorcode!","njithost_acm_website");
		if($conn->connect_error)
		{
			die("Error connecting to the database! ".$conn->connect_error);
		}
		$results = $conn->query("select * from CourseSchedule order by Course");
		if($results->num_rows > 0)
		{
			while($row = $results->fetch_assoc())
			{
				$course = $row['Course'];
				$days = $row['Days'];

				
                $subjectsString = "";
                $numCommas = 0; $addExtraLine = false;
                for ($idx = 0; $idx < strlen($subjects); $idx++) {
                    if (strcmp($subjects[$idx], ",") == 0) {
                        $numCommas++;
                        $subjectsString .= ",";
                    } else if (strcmp($subjects[$idx], " ") == 0) {
                        if ($numCommas == 4) {
                            $subjectsString .= "<br>";
                            $numCommas = 0;
                            $addExtraLine = true;
                        } else {
                            $subjectsString .= " ";
                        }
                    } else {
                        $subjectsString .= $subjects[$idx];
                    }
                }
                
                $timeString = "";
                $timeWords = explode(" ", $times);
                foreach ($timeWords as $word) {
                    if ($word == "and") {
                        $timeString .= "<br>";
                        $addExtraLine = true;
                    }
                    else {
                        $timeString .= $word . " ";
                    }
                }
                
                if ($addExtraLine) {
                    $subjectsString .= "<br>";
                    $timeString .= "<br>";
                }
				
				echo '<tr>';
				echo '<td class="mdl-data-table__cell--non-numeric">'.$course.'</td>';
				echo '<td class="mdl-data-table__cell--non-numeric">'.$days.'<br></td>';
				echo '</tr>';
			}
		}
	    ?>
          </tbody>
        </table>
        <br>
        <br><br>
        <br>

       <iframe src="https://calendar.google.com/calendar/embed?height=600&amp;wkst=1&amp;bgcolor=%23ffffff&amp;ctz=America%2FNew_York&amp;src=aXVscDgyYjJkZGU4cWxydGJyN2s4cnU3NTBAZ3JvdXAuY2FsZW5kYXIuZ29vZ2xlLmNvbQ&amp;color=%23F6BF26&amp;mode=WEEK" style="border:solid 1px #777" width="800" height="600" frameborder="0" scrolling="no"></iframe>
        </div>
        </section>
        

        <!-- HackNJIT -->
        <div class="mdl-layout__tab-panel" id="hacknjit">
          <section class="section--center mdl-grid mdl-grid--no-spacing">
            <h3>HackNJIT</h3>
            <p>HackNJIT is NJIT's official 24-hour hackathon sponsored by <a href="https://mlh.io/" target="_blank">Major League Hacking</a>. HackNJIT was started in 2014, and we have been working to improve it ever since. HackNJIT is held once per year during the fall semester. You can find out more information about HackNJIT by visiting the official HackNJIT website linked below. If you would like to sponsor HackNJIT, please fill out our site's built-in contact form.
          </section>
          <br>
          <div style="text-align:center;padding:16px">
          <a href="http://hacknjit.org/" title="HackNJIT" target="_blank" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored">Show me HackNJIT!</a>
          </div>
          <br>
          <br>
          <br>
          <br>
          <br>
        </div>

        <!-- JerseyCTF -->
        <div class="mdl-layout__tab-panel" id="jerseyctf">
          <section class="section--center mdl-grid mdl-grid--no-spacing">
            <h3>JerseyCTF</h3>
            <p>JerseyCTF is a beginner-friendly Capture the Flag competition that aims to inspire interest in cybersecurity. Hosted by the <a target=\"_blank\" href=https://njit.acm.org>NJIT ACM</a> organization and <a target=\"_blank\" href=https://sci.njit.edu>NJIT SCI</a> program, it is geared towards students, beginners, and professionals alike. JerseyCTF provides participants with jeopardy-style questions in categories including cryptography, forensics, binary exploitation/reversing, open-source intelligence, and web exploitation.  JerseyCTF features a track parallel to the CTF competition, consisting of presentations and panels with renowned speakers from industry and government.
          </section>
          <br>
          <div style="text-align:center;padding:16px">
          <a href="https://jerseyctf.com/" title="JerseyCTF" target="_blank" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored">Show me JerseyCTF!</a>
          </div>
          <br>
          <br>
          <br>
          <br>
          <br>
        </div>
        
        <!-- ICPC -->
        <div class="mdl-layout__tab-panel" id="icpc">
          <section class="section--center mdl-grid mdl-grid--no-spacing">
            <h3>ICPC</h3>
            <p>NJIT ACM is proud to participate in the <a href="https://icpc.baylor.edu/" target="_blank">ACM ICPC (International Collegiate Programming Contest)</a>, which is a team-based intercollegiate programming competition held in different regions throughout the world. More information about our team and the contest dates will be posted here in the future.</p>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
          </section>
        </div>

        <!-- Projects
        <div class="mdl-layout__tab-panel" id="projects">
          <section class="section--center mdl-grid mdl-grid--no-spacing">
            <h3>Projects</h3>
            <p>Below is a comprehensive list of projects that NJIT ACM has worked on, or is currently working on. You can find out more details about a particular project by clicking its link. If you have any questions regarding a particular project, or if you have an idea for a new project for us to work on, you can contact us by using our site's built-in contact form, or by stopping by our office sometime during the semester.</p>
            <p>NOTE: We have just started making projects a main focus of ours, so we do not yet have many complete, but we hope to change that quickly!</p>
            <div style="overflow:auto;width:100%">
            <table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp" style="width:100%">
            <thead>
              <tr>
                <th class="mdl-data-table__cell--non-numeric">Current Projects</th>
              </tr>
            </thead>
            <tbody>
                
	    <?php
		$conn = new mysqli("localhost","njithostingacm","Changethedoorcode!","njithost_acm_website");
		if($conn->connect_error)
		{
			die("Error connecting to the database! ".$conn->connect_error);
		}
		$results = $conn->query("select * from `Current Projects`");
		if($results->num_rows > 0)
		{
			while($row = $results->fetch_assoc())
			{
				$name = $row['Name'];
				echo '<tr>';
				echo '<td class="mdl-data-table__cell--non-numeric"><a href="projectpage.php?name='.$name.'" target="_blank">'.$name.'</a></td>';
				echo '</tr>';
			}
		}
		else
		{
			echo '<tr><td class="mdl-data-table__cell--non-numeric">None</td></tr>';
		}
	    ?>
            </tbody>
          </table>
          </div>
          <div style="overflow:auto;width:100%;padding-top:32px">
          <table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp" style="width:100%">
          <thead>
            <tr>
              <th class="mdl-data-table__cell--non-numeric">Completed Projects</th>
            </tr>
          </thead>
          <tbody>
             <?php
		$conn = new mysqli("localhost","njithostingacm","Changethedoorcode!","njithost_acm_website");
		if($conn->connect_error)
		{
			die("Error connecting to the database! ".$conn->connect_error);
		}
		$results = $conn->query("select * from `Finished Projects`");
		if($results->num_rows > 0)
		{
			while($row = $results->fetch_assoc())
			{
				$name = $row['Name'];
				echo '<tr>';
				echo '<td class="mdl-data-table__cell--non-numeric"><a href="projectpage.php?name='.$name.'" target="_blank">'.$name.'</a></td>';
				echo '</tr>';
			}
		}
		else
		{
			echo '<tr><td class="mdl-data-table__cell--non-numeric">None</td></tr>';
		}
	    ?>
          </tbody>
        </table>
        </div>
          </section>
        </div> -->

        <!-- Stream -->
        <div class="mdl-layout__tab-panel" id="stream">
          <section class="section--center mdl-grid mdl-grid--no-spacing">
            <h3>Stream</h3>
            <p>The NJIT chapter of ACM has its own official Twitch.tv channel under the name NJITACM. We will be using this channel to live stream HackNJIT, as well as various other NJIT ACM events throughout the year. You can watch the stream below or watch it on Twitch.tv by clicking the links below.</p>
            <div style="width:100%" id="streamDiv">
            </div>
            <!-- <div style="color:black; font-weight:bold">Chat here when we're live!</div> -->
          </section>
        </div>

        <!-- Calendar -->
        <div class="mdl-layout__tab-panel" id="calendartab">
          <section class="section--center mdl-grid mdl-grid--no-spacing">
          <h3>Master Calendar</h3>
              <iframe src="https://calendar.google.com/calendar/b/2/embed?height=600&amp;wkst=2&amp;bgcolor=%23ffffff&amp;ctz=America%2FNew_York&amp;src=bmppdGFjbUBnbWFpbC5jb20&amp;src=YmJhZmtocDMzdDhoNGVzNXFqZG9zbHY5OGtAZ3JvdXAuY2FsZW5kYXIuZ29vZ2xlLmNvbQ&amp;color=%233F51B5&amp;color=%23F09300&amp;showTabs=1&amp;showPrint=0&amp;showDate=1&amp;showNav=1&amp;showTitle=0&amp;showTz=0&amp;mode=WEEK" style="border:solid 1px #777" width="800" height="600" frameborder="0" scrolling="no"></iframe>
          </section>
        </div>
        
        
        <!-- Contact -->
        <div class="mdl-layout__tab-panel" id="contact">
            <section class="section--center mdl-grid mdl-grid--no-spacing">
                <div class="mdl-cell mdl-cell--12-col">
                    <h3>
                        Contact Us
                    </h3>
                    <h5>
                        <p><b>Email</b>: <a href="mailto:acm@njit.edu">acm@njit.edu</a></p>
                        <p><b>Discord</b>: <a target="_blank" href="https://discord.com/invite/XR6qPze">https://discord.com/invite/XR6qPze</a> </p>
                        <p><b>Office</b>: GITC 3704</p>
                        <p><b>Meetings</b>: GITC 3600 (Fridays at 12 pm)</p>
                        <p><b>YWCC Tutoring</b>: GITC 3700</p>
                    </h5>
                </div>
            </section>
        </div>

        <!-- Constitution -->
        <div class="mdl-layout__tab-panel" id="constitution">
          <section class="section--center mdl-grid mdl-grid--no-spacing">
            <div class="mdl-cell mdl-cell--12-col">
              <h3>Constitution</h3>
              <p>The following is NJIT ACM's official constitution. Our constitution defines the rules and regulations of our ACM chapter and is upheld by the NJIT Student Senate. As stated in our constitution, we also abide by the <a href="https://www.acm.org/about-acm/acm-code-of-ethics-and-professional-conduct" target="_blank">National ACM Code of Ethics and Professional Conduct</a>.</p>
              <div class="constitution">
                <div class="section__text mdl-cell mdl-cell--10-col-desktop mdl-cell--6-col-tablet mdl-cell--3-col-phone">
                  <h5>Article I. Name</h5>
                  <ul>
                  The name of this organization shall be the Association for Computing Machinery (ACM). In reference to the ACM when in the context of the international organization, the name shall be the New Jersey Institute of Technology Chapter of the Association for Computing Machinery (NJIT ACM).
                 </ul>
                </div>
                <div class="section__text mdl-cell mdl-cell--10-col-desktop mdl-cell--6-col-tablet mdl-cell--3-col-phone">
                  <h5>Article II. Purpose</h5>
                  <ul>
                  The purpose of this chapter is to organize NJIT students with interests in computing and the associated technologies, so that they may be able to share their knowledge and skills with their peers. This student collaboration in the studies of computing technologies will result in a variety of events, projects, and services hosted by this chapter.
                  </ul>
                </div>
                <div class="section__text mdl-cell mdl-cell--10-col-desktop mdl-cell--6-col-tablet mdl-cell--3-col-phone">
                  <h5>Article III. Non-Discrimination Policy</h5>
                  <ul>
                  Membership in this chapter shall be open to any student currently enrolled at NJIT.
                  </ul>
                </div>
                <div class="section__text mdl-cell mdl-cell--10-col-desktop mdl-cell--6-col-tablet mdl-cell--3-col-phone">
                  <h5>Article IV. Membership</h5>
                  <ul>
                    <li>Section 1. Membership in this chapter shall be open to any student currently enrolled at NJIT.</li>
                    <li>Section 2. An active member shall be defined as any member who has attended at least one-half of all general body meetings at which attendance has been taken up to that point in the semester.</li>
                    <li>Section 3. Only NJIT full-time undergraduate students who are active members as described in Article IV, Section 2 shall be eligible to vote.</li>
                    <li>Section 4. Attendance by a simple majority, or greater than 50%, of the active voting membership shall constitute a quorum.</li>
                  </ul>
                </div>
                <div class="section__text mdl-cell mdl-cell--10-col-desktop mdl-cell--6-col-tablet mdl-cell--3-col-phone">
                  <h5>Article V. Officers & Elections</h5>
                  <ul>
                    <li>Section 1. The officers of this chapter shall be President, Vice-President, Secretary, Treasurer, Webmaster, Public Relations, SIG Master, and Graphic Designer.</li>
                    <li>Section 2. Election of officers shall be by secret ballot during the second to last meeting of the Fall semester. Officers shall be elected by a majority vote of approval of a quorum.</li>
                    <li>Section 3. Installation of newly-elected officers shall be held upon the start of the Spring semester. The term of the newly elected officers shall be for one calendar year.</li>
                    <li>Section 4. All NJIT full-time undergraduate students who are active members of this chapter are eligible to run. However, students who will graduate before the fall semester of the academic year following elections shall be ineligible for office. Their graduation date should be no less than two full Spring and/or Fall semesters after the elections. Additionally, a student will only be eligible if their grade point average for the preceding quarter is 2.5 or above.
                      <ul>
                      </ul>
                    </li>
                    <li>Section 5. Any officer shall be brought up for removal from office if his grade point average falls below the minimum standards set forth in Article V, Section 4, or if the members feel he or she is not adequately performing their duties. A new officer shall be elected to fill the vacancy at the next scheduled meeting. An officer may be removed from office by a three-fourths majority vote of a quorum.</li>
                    <li>Section 6. No elected officer of this chapter shall have veto power.</li>
                    <li>Section 7. This chapter shall elect a faculty advisor from the faculty/staff of New Jersey Institute of Technology with the approval of the Office of the Dean of Student Services. The faculty advisor shall be selected by a majority vote of approval of a quorum.</li>
                  </ul>
                </div>
                <div class="section__text mdl-cell mdl-cell--10-col-desktop mdl-cell--6-col-tablet mdl-cell--3-col-phone">
                  <h5>Article VI. Duties of Officers</h5>
                  <ul>
                    <li>Section 1. The President shall preside at all meetings of this chapter and of its Executive Council. He or she shall also represent this chapter at all meetings with the ACM Regional Representative. They shall also appoint all committees of this chapter and committee chairmen. They shall delegate officer duties not mentioned in this Constitution as needed. He or she shall also maintain steady contact with the College of Computing Sciences.</li>
                    <li>Section 2. The Vice-President shall assume the duties of the President in the event of the President's absence. They  shall assume those duties of the President that are delegated to them by the President. They shall serve as this chapter's liaison to the Student Senate.</li>
                    <li>Section 3. The Secretary shall keep minutes of all chapter meetings. It is their duty to make this information publicly available. They shall also be responsible for submitting any pertinent paperwork to ACM National and/or the NJIT Student Senate in a timely fashion. They shall also be responsible for the active membership roster according to Article IV of this constitution.</li>
                    <li>Section 4. The Treasurer shall maintain the chapter's financial operations. They shall also make the annual report of the chapter finances as required by the Treasurer of ACM National.</li>
                    <li>Section 5. The Webmaster shall be responsible for maintaining and updating the chapter website. They shall also be responsible for managing permissions and access of the officers to the various services utilized by the organization. They shall be responsible for maintaining any custom applications created for the organization, only if the application creator has no intent of maintaining it.</li>
                    <li>Section 6. The Public Relations officer shall be responsible for maintaining this chapter's public image. Their duties shall be, but are not limited to, ensuring that this chapter's events are well advertised, recruiting new students into the organization, and handling the chapter’s social media.</li>
                    <li>Section 7. The SIG Master shall be responsible for the management of all Special Interest Groups. They shall be the point of contact for SIG leaders to act as an advisor and assistant, and will continue regular communication with SIG leaders. They shall also be responsible for recruiting SIG leaders.</li>
                    <li>Section 8. The Graphic Designer shall be responsible for designing promotional materials for the chapter. Their duties include, but are not limited to, designing flyers for events of the chapter, as well as theme art and t-shirts for the chapter.</li>

                  </ul>
                </div>
                <div class="section__text mdl-cell mdl-cell--10-col-desktop mdl-cell--6-col-tablet mdl-cell--3-col-phone">
                  <h5>Article VII. Meetings</h5>
                 Meetings shall be held every week during the Friday common hour. Members will be notified prior to any change in the meeting time or location.
                </div>
                <div class="section__text mdl-cell mdl-cell--10-col-desktop mdl-cell--6-col-tablet mdl-cell--3-col-phone">
                  <h5>Article VIII. Conduct</h5>
                  <ul>
                    <li>Section 1. This chapter and its members agree to uphold and abide by the rules and regulations of New Jersey Institute of Technology.</li>
                    <li>Section 2. This chapter and its members agree to uphold and abide by the standard ethical guidelines outlined in the National ACM Code of Ethics and Professional Conduct.</li>
                    <li>Section 3. The chapter acknowledges that it is responsible for the behavior of members and guests at any of its functions.</li>
                    <li>Section 4. Hazing in any form is not allowed by this organization or its individual members.</li>
                  </ul>
                </div>
                <div class="section__text mdl-cell mdl-cell--10-col-desktop mdl-cell--6-col-tablet mdl-cell--3-col-phone">
                  <h5>Article IX. Amendments and Procedure</h5>
                  <ul>
                    <li>Section 1. Proposed amendments to this constitution shall be distributed to all current officers and members in a timely manner.</li>
                    <li>Section 2. An amendment to this constitution shall be officially approved once unanimously agreed upon by all current officers, having received a favorable 2/3 vote from a quorum.</li>
                    <li>Section 3. Robert's Rules of Order Revised shall be the final authority on any points not covered in the National ACM Constitution or in this Constitution.</li>
                  </ul>
                </div>
              </div>
			<!--
		    <h3>SIG By-Laws</h3>
			  <div class="constitution">
				<div class="section__text mdl-cell mdl-cell--10-col-desktop mdl-cell--6-col-tablet mdl-cell--3-col-phone">
                  <h5>Article I. Specialized Interest Groups</h5>
					<ul>
						<li>Section 1. A Specialized Interest Group is a group of active members who share a common computing related interest. Activities of a SIG include, but are not limited to, teaching, discussing, and creating projects related to their topic. SIG is a valid abbreviation of Specialized Interest Group.</li>
						<li>Section 2. SIGs of the NJIT ACM are not directly affiliated with the SIGs of the National ACM. Similarly, SIG student chapters of NJIT are not necessarily affiliated with the NJIT ACM.</li>
						<li>Section 3. A SIG Leader is an Active Member of the ACM who has administrative control over a specific SIG. They also serve as the SIG’s liaison to the executive board. The election of a SIG Leader is determined by the SIG or, if necessary, the Executive Board.</li>
						<li>Section 4. A SIGs funding comes directly from NJIT ACM. This comes in the form of base funding as well as additional funding from participation in voting every other week.</li>
						<li>Section 5. For a SIG to be considered active, it must possess the following qualities:
							<ul>
								<li>A. At least one leader, whose responsibilities is defined above</li>
								<li>B. At least three active members, including the SIG leader</li>
								<li>C. Regular attendance of the weekly meetings by the SIG leader</li>
								<li>D. Compliance with any additional requests of the executive board</li>
							</ul>
						</li>
						<li>Section 6. Any active member may form a SIG, as long as it fits the following criteria:
							<ul>
								<li>A. Approval of the current Executive Board</li>
								<li>B. Fits the active SIG requirements</li>
								<li>C. Does not infringe on any current SIGs’ or other clubs’ topic</li>
							</ul>
						</li>
					</ul>
                </div>
                </div>-->
			  </div>
            </div>
          </section>
        </div>
              <!--
              <p>If you have any questions regarding our organization, HackNJIT, or working with us, please fill out the form below. We will respond to any emails we receive as soon as possible. In the event that this form does not work, you can always contact us by emailing us at <a href="mailto:njitacm@gmail.com">njitacm@gmail.com</a>.
              <form method="POST" action="contact.php">
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                  <input class="mdl-textfield__input" type="text" required id="name" name="name"/>
                  <label class="mdl-textfield__label" for="name">Your Name</label>
                </div><br>
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                  <input class="mdl-textfield__input" required type="email" id="email" name="email"/>
                  <label class="mdl-textfield__label" for="email">Your Email</label>
                </div><br>
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                  <input class="mdl-textfield__input" type="tel" id="phone" name="phone"/>
                  <label class="mdl-textfield__label" for="phone">Your Phone # (Optional)</label>
                </div><br>
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                  <input class="mdl-textfield__input" type="text" id="org" name="org"/>
                  <label class="mdl-textfield__label" for="org">Your Organization (Optional)</label>
                </div><br>
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                  <input class="mdl-textfield__input" required type="text" id="subject" name="subject"/>
                  <label class="mdl-textfield__label" for="org">Subject</label>
                </div><br>
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                  <textarea class="mdl-textfield__input" required id="message" name="message"></textarea>
                  <label class="mdl-textfield__label" for="org">Message</label>
                </div><br>
                <button style="margin-top:16px;margin-bottom:16px" type="submit" value="Submit" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">
                  Submit
                </button>
              </form>
        -->

        <!--<footer style="text-align:center;cursor:default" class="mdl-mega-footer">
          <span class="mdl-layout--small-screen-only">
            <a href="http://twitter.com/njitacm" title="Follow us on Twitter" target="_blank" style="background: #00acee; color: rgb(255, 255, 255)" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect"><i class="fa fa-twitter fa-fw"></i></a>
            <a href="https://www.facebook.com/profile.php?id=2249388966" title="Like us on Facebook" style="background: #3b5998; color: rgb(255, 255, 255)" target="_blank" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect"><i class="fa fa-facebook fa-fw"></i></a>
            <a href="https://www.instagram.com/njitacm" title="Follow us on Instagram" style="background: #9b6954; color: rgb(255, 255, 255)" target="_blank" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect"><i class="fa fa-instagram fa-fw"></i></a>
            <a href="https://www.linkedin.com/groups/4314318" title="Join us on Linkedin" style="background: #0e76a8; color: rgb(255, 255, 255)" target="_blank" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect"><i class="fa fa-linkedin fa-fw"></i></a>
          </span>
          <p>Copyright © 2015 <script language="javascript">
		
						today = new Date();
						day = today.getDate();
						year = today.getYear();
						
						if( year < 2000 )
						year += 1900;
						
						end = "th";
						day+=end;
						if(year!=2016)
						document.write("- " +year+"");
						
						</script>
		  NJIT ACM</p>
          <img style="width:60px;user-drag: none;-moz-user-select: none;-webkit-user-drag: none;" class="logo-img" src="images/white_acm_logo.png" alt="acm_logo.png">
          <img style="width:120px;user-drag: none;-moz-user-select: none;-webkit-user-drag: none;" class="logo-img" src="images/ccs_logo.png" alt="ccs_logo.png">
        </footer>
      </main>
    </div>-->

    <script src="https://storage.googleapis.com/code.getmdl.io/1.0.2/material.min.js"></script>
    <!-- build:js(app/) ../../scripts/main.min.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.6/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.4.0/fullcalendar.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.4.0/gcal.js"></script>
    <script src="scripts/main.js"></script>
    <!-- endbuild -->

    <!-- Built with love using Web Starter Kit -->
  </body>
</html>
