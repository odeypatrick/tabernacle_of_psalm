<?php
include "db.php";

if(!isset($_SESSION['isadmin'])){
    header('location:index.php');
}

if($_SESSION['isadmin'] == 0){
    header('location:index.php');
}


$search = mysqli_real_escape_string($conn, htmlentities($_POST['search']));

$sql = "SELECT * FROM members WHERE firstname LIKE '$search%' AND status = 1 OR lastname LIKE '$search%' AND status = 1 OR regnumber LIKE '$search%' AND status = 1 ORDER BY firstname";

$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) > 0){
    echo "<ul>";?>
    <input type="" id="id_holder" hidden>
    <?php
    while($row = mysqli_fetch_assoc($result)){
        ?>
        <script type="text/javascript">
             $('.delete_btn').click((e) => {
        e.preventDefault();
        $('#id_holder').val(`${e.target.id}`);
        $('.main-modal').css("display", "block");
        $('.spt').html(`<a href="delete.php?id=${$('#id_holder').val()}" class="modal_btn">Delete</a>`)
    })

        </script>
        <li><a href='user.php?id="<?php echo $row['id'];?>"' class='member_link'><?php if($row['Gender'] == "Male"){?>
                <img src="img/man.png" alt="" width="30px" class="avatar" id="avatar">
                <?php
} else {?>
                        <img src="img/girl.png" alt="" width="30px" class="avatar" id="korra">
                    <?php
                }   ?><?php echo "<span style='text-transform: capitalize'>".$row['firstname']." ".$row['lastname']. "</span>";?></a><a href="" class="delete_btn" id="<?php echo $row['id']?>">&times;</a></li>

        
        <?php
    }
    echo "</ul>";
}
else{
    echo "<li style='list-style: none; font-family: verdana; font-size: 15px; color: purple;padding: 20px;'>Member <strong>".$search. "</strong> do not exists!!!</li> ";
}
?>