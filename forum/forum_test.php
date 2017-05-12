<?php
    
    $servername = getenv('IP');
    $username = getenv('C9_USER');
    $password = "";
    $database = "c9";
    $dbport = 3306;
    
    // Create connection
    $db = new mysqli($servername, $username, $password, $database, $dbport);
    
        // Check connection
    if ($db->connect_error) {
     die("Connection failed: " . $db->connect_error);
    } 
    echo "Connected successfully (".$db->host_info.")";
    
    $sql="SELECT forumposts.ftext, account.fname, account.lname FROM forumposts JOIN account ON forumposts.account=account.uuid ORDER BY postdate";
    $posts= $db -> query($sql);
    while ($post = $posts->fetch_assoc()) {
        $text=$post["text"];
        $fname=$post["fname"];
        $lname=$post["lname"];
        echo "text: ".$text." ";
        echo "fname: ".$fname." ";
        echo "lname: ".$lname." ";
    }
    

    $db->close();

?>


/*    $ses_sql = mysqli_query($db,"SELECT uuid FROM account where uuid = '$user_check' ");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $login_session = $row['username'];
 */
 


    <!--
    <?php
    $sql="SELECT memories.title, memories.filename, account.fname, account.lname FROM memories JOIN account ON memories.account=account.uuid";
    $posts= $db -> query($sql);
    while ($post = $posts->fetch_assoc()) {
        $location=$post["filename"];
        $title=$post["title"];
        $name=$post["fname"]." ".$post["lname"]; ?>
        <q class="memories"> <?= $filename ?></q>
        <br><span class="name"> ---- <?= $title ?> </span>
        <br><span class="name"> ---- <?= $name ?> </span>
        <hr> 
 <?php
    }
    ?>
    -->
    
    
    
    <q class="posts"> <?= $text ?></q>
        <br><span class="name"> ---- <?= $name ?> </span>
        <hr> 
        
        
        
        <?php
   if(!isset($_SESSION['uuid'])){
?>
     
     <h2 id="nologin"> Login in to Comment or Post </h2>
     
  <?php
   }
   else {
?>


        <q class="posts"> </q>
        <br><span class="name"> </span>
        <hr> 