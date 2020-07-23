<?php
require_once("database.php");
require_once("user.php");
//require_once("buyandsellpost.php");
require_once("session.php");
$session->start_login();
?>
<!DOCTYPE html>
<html lang="en">	
<head>
	<meta charset="utf-8" />
<title>Zukasell- Privacy Policy</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0" >
	<link type="text/css" rel="stylesheet" href="css/main.css">
	<script type="text/javascript" src="functions/functions.js"></script>
</head>
<body class="content" style="background-color:#c8e0d7; clear: both; width:100%  ">
      <header class="mainHeader">
      <div class="create_ad_page_header">
<div class="home" >
	<a href="<?php echo $Database->address ?>"><img  class="menu_logo" src="http://www.zukasell.com/required/zukasell_logo4.png"   /></a>	
</div>
<?php
if($session->user_id != 0){
?>
<div style="float: right; margin-right:10%;margin-top: 10px;">
<div class="dropdown">
	  <?php $user = new User();
	  $user->find_by_mail($session->user_id);
	  echo '<a href"#">'.$user->surname.'</a>';
	  ?>
	   <div class="dropdown-content">
	    
	    <a href="<?php echo $Database->address ?>myads.php" >
		 <li>Myads</li>
	    </a>
	    
	     <a href="<?php echo $Database->address ?>message.php" >
	    <li>Message</li>
	    </a>
	    <a href="<?php echo $Database->address ?>logout.php">
	    <li>LogOut</li>
	   </a>
	    
	   </div>
	  </div>	 
	  <a href="<?php echo $Database->address ?>buyandsellad.php" style="color:white" ><span style="padding:5px;  border-radius: 5px; background-color:#d96e26">Create an Ad</span></a>
	
	<?php } ?>  
</div>
</div>
      <div class="mobile_create_ad_page_header">
<div class="home" >
		<a href="<?php echo $Database->address ?>"><img  class="menu_logo" src="http://www.zukasell.com/required/zukasell_logo4.png"   /></a>
</div>
<?php
if($session->user_id != 0){
?>
<div style="float: right; margin-right:10%;margin-top: 10px;">
<div class="dropdown">
	  <?php $user = new User();
	  $user->find_by_mail($session->user_id);
	  echo '<a href"#">'.$user->surname.'</a>';
	  ?>
	   <div class="dropdown-content">
	    
	    <a href="<?php echo $Database->address ?>myads.php" >
		 <li>Myads</li>
	    </a>
	    
	     <a href="<?php echo $Database->address ?>message.php" >
	    <li>Message</li>
	    </a>
	    <a href="<?php echo $Database->address ?>logout.php">
	    <li>LogOut</li>
	   </a>
	    
	   </div>
	  </div>	 
	  <a href="<?php echo $Database->address ?>buyandsellad.php" style="color:white" ><span style="padding:5px;  border-radius: 5px; background-color:#d96e26">Create an Ad</span></a>
	
	<?php } ?>  
</div>
</div>
  
</header>
      <div class="policy_div">
    <div class="privacy-list">
        <h2>Privacy Policy</h2>
        <ul>
            <li>Information we collect,receive and host
            </li>
            <li>
                Use of informaton we collect
            </li>
            <li>
                User Control
            </li>
            <li>
                Informaton Sharing
            </li>
            <li>
                Security of the information Collected
            </li>
            <li>
                Change of Privacy Policy
            </li>
        </ul>
    </div>
    
        <div>
        <h4>
           <strong style="margin-right:15px">1</strong>Information we collect, receive and host
        </h4>
        <li><span style="margin-right:15px">1.1</span>
            Information such as Email, First_name, Last_name, Phone number requested from the User to serve as a unique identifier to register such User on our Server.
            The User should know that the information given could be publicly availabe on the User's Profile and thus, carefully consider  and take full responsibility of the risks of making such certain
            personal information public.
        </li>
        <li><span style="margin-right:15px">1.2</span>
            When a third party authentication service such as Facebook login. Public information are retrieved and stored as a means of identification and authentication.
        </li>
        </div>
        <div>
        <h4>
            <span style="margin-right:15px">2</span> Use of Information
        </h4>
        <li>Information such as Email Address, First and Last Name, Phone number collected from User during registration or use of third party authentication service
        are used for the following general purpose:
        </li>
        <li>
            <span style="margin-right:10px">-</span>
            To serve as a unique identifier for each User in order to create and manage the User Account.
        </li>
        <li><span style="margin-right:10px">-</span>
        To monitor general and individual User activity, such as keywords, searches, postings and to manage traffic on the website.
        </li>
        
        <li><span style="margin-right:10px">-</span>
        Facebook Publish Actions method is used to share their posted ad on their facebook wall. Users have full control over what and when to post their ad.
        </li>
        
        <li><span style="margin-right:10px">-</span>
        To serve the purpose of sending marketing offers to User.</li>
        <li><span style="margin-right:10px">-</span>
        To communicate with User concerning our service and notification of changing the rules if need be.
        </li>
        </div>
        
        <div>
            <h4><strong style="margin-right:15px">3</strong> User Controls</h4>
            <li>
                <span style="margin-right:15px">3.1</span>
                User is legally able to use and surf through the website 
            </li>
            <li>
                <span style="margin-right:15px">3.2</span>
                User has the avenue and right to edit and correct his/her personal information by writing to us at <a href="#">support@zukasell.com</a> with the following included in the message.
                Email address used in registration, the full name and phone number associated with your account. User whose account was created through third party authentication service ,
                should thus change his or her information on the third party platform.
            </li>
        </div>
        <div>
            <h4><strong style="margin-right:15px">4</strong> Information Sharing</h4>
            <li>
                <span style="margin-right:15px">4.1</span>
                We reserve the right to share information with private or public authorities that will enable us to fight fraud and abuse on our network,
                to investigate suspected violations of law, or to fight any other suspected breach of our Terms of Service.
            </li>
            <li>
                <span style="margin-right:15px">4.2</span>
              We do not share personal information of our User with third parties unless we have our users' specific permission to do so.  
            </li>
            <li>
                <span style="margin-right:15px">4.3</span>
              We bears no respomsibility for receiving, storing, processing, using and disclosing of User's personal data to third parties.  
            </li>
        </div>
        <div>
            <h4><strong style="margin-right:15px">5</strong> Security of Information Collected</h4>
            <li>The Security of your data is very paramount to us and thus,is been protected by reasonable technical means and high security procedures to prevent unauthorized use of data</li>
        </div>
        <div>
            <h4><strong style="margin-right:15px">6</strong>Change of Privacy Policy</h4>
            <li>
            <span style="margin-right:15px">6.1</span>
            All changes made to our privacy policy shall be reported to you by means of posting amendments or revised versions of the privacy policy to the User. 
            </li>
        </div>
    </div>
      </div>
      
</body>
<?php require_once ('footer.php') ; ?>
</html>