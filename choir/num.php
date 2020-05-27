<?php

include "db.php";

?>

<div>
                <ul>
              <li>Total members: <span class="num"><?php $sql = "SELECT * FROM members WHERE status = 1";  $result = mysqli_query($conn, $sql);echo mysqli_num_rows($result);?></span></li>
                    <li>100 level members: <span class="num"><?php $sql = "SELECT * FROM members WHERE level = 100 AND status = 1";$result = mysqli_query($conn, $sql);echo mysqli_num_rows($result);?></span></li>
                    <li>200 level members: <span class="num"><?php $sql = "SELECT * FROM members WHERE level = 200 AND status = 1";$result = mysqli_query($conn, $sql);echo mysqli_num_rows($result);?></span></li>
                    <li>300 level members: <span class="num"><?php $sql = "SELECT * FROM members WHERE level = 300 AND status = 1";$result = mysqli_query($conn, $sql);echo mysqli_num_rows($result);?></span></li>
                    <li>400 level members: <span class="num"><?php $sql = "SELECT * FROM members WHERE level = 400 AND status = 1";$result = mysqli_query($conn, $sql);echo mysqli_num_rows($result);?></span></li>
                    <li>500 level members: <span class="num"><?php $sql = "SELECT * FROM members WHERE level = 500 AND status = 1";$result = mysqli_query($conn, $sql);echo mysqli_num_rows($result);?></span></li>
                    </ul>
                </div>