<?php
function loadData(){

  $servername = "localhost";
  $username = "root";
  $password = "kanishka12@AB";
  $dbname = "houses_r_us";
  
  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  
  $sql = "SELECT msgNo, msgName, contact, email, comments, contMethd, msgStat, reason, date_time FROM messages ORDER BY date_time DESC";
  $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) { ?>
        <div class="grid record">
                <div class="grid-item" style="padding-left: 10px;"><?php echo $row['msgNo'] ?></div>
                <div class="grid-item"><?php echo $row['date_time'] ?></div>
                <div class="grid-item"><?php echo $row['msgName'] ?></div>
                <div class="grid-item">
                  <label class="<?php echo $row['msgStat'] ?>" id="lbl<?php echo $row['msgNo'] ?>"><?php echo $row['msgStat'] ?></label>
                  <button onclick="view('<?php echo $row['msgNo'] ?>')">View Message</button>
                  <div id="<?php echo $row['msgNo'] ?>" class="messageContainer">
                    <div class="closeContainer">
                        <div class="viewMessageID">messageID <?php echo $row['msgNo'] ?></div>
                        <button onclick="closeMessage('<?php echo $row['msgNo'] ?>')">close</button>
                    </div>
                    <div class="messageText">
                      <?php echo $row['comments'] ?>
                    </div>
                  </div>
                </div>
                <div class="grid-item"><?php echo $row['contact'] ?></div>
                <div class="grid-item " style="word-wrap: break-word;"><?php echo $row['email'] ?></div>
                <div class="grid-item" style="padding-right: 10; border-right:none;"><?php echo $row['reason'] ?></div>
        </div> 
<?php
      }
    } else {
      echo "0 results";
    }
    $conn->close();
  }
?>