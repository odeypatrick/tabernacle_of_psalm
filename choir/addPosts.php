<?php
include "db.php";

if(!isset($_SESSION['firstname'])){
    header('location:index.php');
}

if(isset($_POST['commentNewCount'])) {
	$commentNewCount = $_POST['commentNewCount'];
    $sql = "SELECT * FROM posts ORDER BY id DESC LIMIT $commentNewCount";

    $result = mysqli_query($conn, $sql);

	if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_assoc($result)){
    ?>
        <div class="sect">
            <div class="title">
                <span><?php  echo $row['title'] ?></span>
            </div>
            <div class="body">
                        <?php
                    if($row['audio'] !== '' && $row['file_type'] == 'mp3'){?>
                            <div class="audio_spot">
                                            <audio src="<?= $row['audio']?>" width='100%' controls loop></audio>
                                        </div>
                            <?php
                    }
                        else if($row['file_type'] == 'jpg' || $row['file_type'] == 'png' || $row['file_type'] == 'jpeg'){
                            ?>
                        <a href="<?= $row['audio']?>" target="_blank"><img src="<?= $row['audio']?>" width="100%" alt="post image..."></a>
                            <?php
                    }
                    else{
                            ?>
                            <p><?php   echo $row['body']  ?></p>
                            <?php
                        }
?>
</div>
                <div class="small">
                    <div class="sender">
                        <small>Posted by <?php  echo $row['sender']?></small>
                    </div>

                    <div class="time">
                        <small><?= date('M d, Y',strtotime($row['time'])) ?> by <?= date('h:iA',strtotime($row['time'])) ?></small>
                    </div>
                </div>
            </div>

            <?php
        }
    }
    else{
        echo "<p>No post yet!</p>";
    }
}