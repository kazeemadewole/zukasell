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
	<link type="text/css" rel="stylesheet" href="css/main.css">
	<script type="text/javascript" src="functions/functions.js"></script>
</head>
<body  style="background-color:#c8e0d7; clear: both; width:100% ; font-size: 100%; ">
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
        <h2>Terms of Use </h2>
	<p>The following terms of use of Zukasell.com serves as an agreement that binds Users and Zukasell together. Please kindly read and understand it carefully</p>
        <ul>
            <li>General Provision
            </li>
            <li>
                User Submission
            </li>
            <li>
                Status of the User
            </li>
            <li>
                Content Policy
            </li>
            <li>
                Intellectual Right
            </li>
            <li>
                Infringement Right Notification
            </li>
        </ul>
    </div>
    
        <div>
        <h3>
           <strong style="margin-right:15px">1</strong>General Policy
        </h3>
        <p><span style="margin-right:15px">1.1</span>
            We offer to our Users the ability to use our website(Zukasell) to post information concerning goods and services in other to improve sale.
        </p>
        <p><span style="margin-right:15px">1.2</span>
            We thereby states categorically that we are not a party to any transaction that takes place among
	    Users nor bear any responsibility with regard to any party in relation to such transaction.
        </p>
	<p><span style="margin-right:15px">1.3</span>
            The Terms of Use written by Zukasell will be a binding agreement between the Company and the Users.
        </p>
	<p><span style="margin-right:15px">1.4</span>
            The Users must familiarize themselves with the Terms of Use binding the Users and the Company together.
        </p>
	<p><span style="margin-right:15px">1.5</span>
          The website Administration shall not be responsible for any announcement poster, reference information, Users communication  and Company data.
        </p>
	<p><span style="margin-right:15px">1.7</span>
            Zukasell does not pursue actions focused on checking of materials posted by Users and does not prevents infringements of copyright and infringement of intellectual property rights in the course of using the website.
        </p>
	<p><span style="margin-right:15px">1.8</span>
            These rules can be changed or amended by the website administration unilaterally without any prior specific notice. The company thus advises the Users to regularly check terms of use of the rules for any alteration or ammendment.
        </p>
        </div>
        <div>
        <h3>
            <span style="margin-right:15px">2</span> Users Submision
        </h3>
	<p><span style="margin-right:10px">2.1</span> Users aknowledge to provide accurate and up to date informations for the purpose of generating User Account during registration
        </p>
        <p>
            <span style="margin-right:10px">2.2</span>
	    Users should understand that they are fully responsible for the content, image, and other informations 
	    provided when posting and thus aknowledge that Zukasell is not responsible for the accuracy,   usefulness, safety or 
	    intellectual property rights of/or relating to such content.
        </p>
        <p><span style="margin-right:10px">2.3</span>
       The User must notify us(Zukasell) of unauthorized access to their personal account and/or use of Users' login and password.
        </p>
        
        </div>
        
        <div>
            <h3><strong style="margin-right:15px">3</strong> Status of the User</h3>
            <p>
                <span style="margin-right:15px">3.1</span>
                Users are legally able to use the website and thus registration and login are free of charge. 
            </p>
            <p>
                <span style="margin-right:15px">3.2</span>
                During registration, Users shall provide necessary veridical and current information for the purpose of generating User Account.
            </p>
	    <p>
                <span style="margin-right:15px">3.3</span>
               Users shall take full responsibility of the information they provides in terms of authenticity, completeness and statutory compliance of information.
            </p>
        </div>
        <div>
            <h3><strong style="margin-right:15px">4</strong> Content Policy</h3>
            <p>
                <span style="margin-right:15px">4.1</span>
                Zukasell is an online classified Market. We create the avenue for our Users to buy and sell goods and services listed on our website. As a result
		of this, transaction may be involved among the Users, thus Zukasell does not have control, take part in any of such transaction and shall have no liability towards any
		party in connection with such transaction(s).
            </p>
            <p>
                <span style="margin-right:15px">4.2</span>
              Users must agree that they are solely responsible for their contents posted on the website, transmitted through any means thus understand the consequences that may arise. 
	      
            </p>
            <p>
                <span style="margin-right:15px">4.3</span>
             Zukasell is not responsible for ads, transactions between Users, communciations between Users, directory informations, User postings, files, images, photo,video and other materials made available on the website. 
            </p>
        </div>
        <div>
            <h3><strong style="margin-right:15px">5</strong> Intellectual Rights</h3>
            <p><span style="margin-right:15px">5.1</span>
	    If legally owned content is/are posted by the User, he or she hereby grants to other Users and Zukasell non-exclusive rights for its use solely in the scope
	     of functionality provided by the website except when such use damages or may damage legally protected right holder's interest.
	    </p>
	    <p><span style="margin-right:15px">5.2</span>
	    The User also grants  to Zukasell a non-exclusive right to use content, which is located on the website and legally owned by him/her, without a
	    compensation so that  Zukasell would be able to ensure operation of the website to the extent determined by its functionality and architecture.
	    </p>
	    <p><span style="margin-right:15px">5.3</span>
	    Zukasell may or not review the website for  presence of any prohibited content and may delete or displace(without notice) any content at its discretion
	    for any reason or without it, including but not limited to deletion or displacement of content which according to Zukasell violates the Rules , Laws and/or may infringe rights, inflict damages or endanger safety of other Users or the third party.
	    </p>
        </div>
        <div>
            <h3><strong style="margin-right:15px">6</strong>Infringement Right Notification</h3>
            <p>
	    If you are an owner of intellectual property rights or an authorized agent who has the right to act on behalf of the intellectual property right owner and reasonably
	     believes that information which is posted on the website infringes your intellectual property rights or intellectual property right of the owner on whose behalf you are authorized to act,
	     may thus submit a notification to Zukasell to delete the relevant information/content provided your appeal has a legal basis, and you act in good faith according to law.
	     
	    </p>
	    <p>The notification must contain the following information
	    
	    </p>
	    <p><span style="margin-right:15px">6.1</span>
	    A physical or electronic signature of a person empowered for acting in the name of the holder of exclusive right, which is believed to be infringed.
	    </p>

	   <p><span style="margin-right:15px">6.2</span>
	    The item/content/information that are suposely believed to be infringed should be stated, including the URL page address of the infringed content.
	    </p>
	   <p><span style="margin-right:15px">6.3</span>
	    Contact information that includes Email address, Phone number etc should be included.
	    </p>
	   <p><span style="margin-right:15px">6.4</span>
	    A signed statement that the intellectual property owner holds Zukasell harmless from any claim of any third party in connection with the removal of the
	    relevant content by Zukasell.
	    </p>
	   <p><span style="margin-right:15px">6.5</span>
	    A signed statement that the information in the notification is accurate and under the penalty of perjury that you are authorized to act on behalf of the
	    owner of the exclusive right that is allegedly infringed.
	    </p>
	   <p><span style="margin-right:15px">6.6</span>
	    Copies of documents establishing rights for an object of intellectual property right which is subject to security, as well as a document that confirms powers for acting
	    in the holder's name, in attachments to your notification.
	    </p>
	   <p><span style="margin-right:15px">6.7</span>
	    Notifications should be sent to support@Zukasell.com
	    </p>
	</div>
    </div>
      </div>
      
</body>
<?php require_once ('footer.php') ; ?>
</html>