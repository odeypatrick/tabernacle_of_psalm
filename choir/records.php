<?php
include 'db.php';
?>

<div class="att_spot2">
            <h4>Attendance for records today <?=$d = date('M d, Y');?></h4>
                <?php
                $date = date('y-m-d');
                    $sql = "SELECT record, regno FROM attendance WHERE date = '$date' ORDER BY id DESC";
                    $result = mysqli_query($conn, $sql);

                    if(mysqli_num_rows($result) > 0){
                        echo "<ul>";
                        while($row = mysqli_fetch_assoc($result)){
                            $regno = $row['regno'];
                            $sql2 = "SELECT firstname,lastname,Gender FROM members WHERE regnumber = $regno ORDER BY firstname ASC";
                            $qresult = mysqli_query($conn, $sql2);
                            if(mysqli_num_rows($qresult) > 0){
                                $row2 = mysqli_fetch_assoc($qresult);
                                if($row['record'] == 1){
                                    if($row2['Gender'] == 'Male'){
                                        echo "<li><div><img src='img/man.png' width='30' style='margin: 0 5px 0 0';>".$row2['firstname']." ".$row2['lastname']."</div>"."<div><img src='img/tick.png' width='20'>"."</div></li>";
                                    }
                                    else{
                                        echo "<li><div><img src='img/girl.png' width='30' style='margin: 0 5px 0 0';>".$row2['firstname']." ".$row2['lastname']."</div>"."<div><img src='img/tick.png' width='20'>"."</div></li>";
                                    }
                                }
                                else{
                                    if($row2['Gender'] == 'Male'){
                                        echo "<li><div><img src='img/man.png' width='30' style='margin: 0 5px 0 0';>".$row2['firstname']." ".$row2['lastname']."</div>"."<div><img src='img/x-mark.png' width='20'>"."</div></li>";
                                    }
                                    else{
                                        echo "<li><div><img src='img/girl.png' width='30' style='margin: 0 5px 0 0';>".$row2['firstname']." ".$row2['lastname']."</div>"."<div><img src='img/x-mark.png' width='20'>"."</div></li>";
                                    }
                                }
                            }
                        }
                        echo "</ul>";
                    }
                    else{
                        echo "Attendance not yet taken!";
                    }
                ?>
            </div>