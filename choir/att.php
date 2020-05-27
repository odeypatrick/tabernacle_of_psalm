<?php
include "db.php";
include "config/config.php";

if(!isset($_SESSION['firstname']) && empty($_SESSION['firstname']) && !isset($_SESSION['isadmin'])){
    header('location:index.php');
}

if($_SESSION['isadmin'] == 0){
    echo "<script>alert('not an admin')</script>";
    header('location:index.php');
    }

    $date = date('y-m-d');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/fontawesome.min.css">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <title>attendance</title>
</head>
<body>
<style>
    *{
        margin: 0;
        padding: 0;
    }

    body{
        background: #f4f4f4;
    }

    .container{
        width: 80%;
        margin: 0 auto;
    }

    header{
        padding: 10px;
        text-align: center;
    }

    .att_spot{
        width: 40%;
        margin: 7% auto;
        padding: 20px;
        text-align: center;
    }

    .att_spot2 h4{
        padding: 10px;
        font-size: 16px;
        font-weight: 400;
    }

    form > div{
        margin-bottom: 10px;
    }

    select{
        width: 90%;
        height: 40px;
        outline: none;
        font-size: 16px;
        border-radius: 5px;
        padding: 10px;
    }

    input{
        width: 90%;
        outline: none;
        font-size: 16px;
        border-radius: 5px;
        border: 1px solid #ccc;
        padding: 10px;
        font-family: verdana;
    }
    input:focus{
        border: 1px solid #206059;
    }

    #submit{
        background: #206059;
        color: #fff;
        border: none;
        width: 300px;
    }

    #submit:hover{
        background: #209059;
    }

    #p, #m{
        background: #ebf8a4;;
        color: #000;
        border: 1px solid #ccc;
        padding: 10px;
        width: 50%;
        margin: 0 auto;
        font-size: 16px;
        font-family: verdana;
        animation-name: opac;
        animation-duration: 0.5s;
    }

    #m, #st{
        position:absolute;
        left: 25%;
    }

    #e,#st{
        background: pink;border: 1px solid red;
        color: #000;
        padding: 10px;
        width: 50%;
        margin: 0 auto;
        font-size: 16px;
        font-family: verdana;
        animation-name: opac;
        animation-duration: 0.5s;
    }

    #w{
        background: coral;
        color: #fff;
        padding: 10px;
        width: 50%;
        margin: 0 auto;
        font-size: 16px;
        font-family: verdana;
        animation-name: opac;
        animation-duration: 0.5s;
    }

    #p, #w,#e{
        border-radius: 5px;
    }


    .btn-back{
        padding: 10px;
        display: block;
        text-decoration: none;
        color: #ccc;
        background: #f4f4f4;
        width: 20px;
        margin: 10px;
        font-size: 18px;
        position: fixed;
        z-index: 1;
    }

    .btn-back:hover{
        background: #fff;
        color: #000;
    }

footer{
    position: relative;
    text-align: center;
    font-size: 18px;
    margin-top: 300px;
    font-family:  georgia;

}


/*
 * Loading Dots
 * Can we use pseudo elements here instead :after?
 */
.loading span {
  display: inline-block;
  vertical-align: middle;
  width: .6em;
  height: .6em;
  margin: .19em;
  background: #007DB6;
  border-radius: .6em;
  animation: loading 1s infinite alternate;
}

/*
 * Dots Colors
 * Smarter targeting vs nth-of-type?
 */
.loading span:nth-of-type(2) {
  background: #008FB2;
  animation-delay: 0.2s;
}
.loading span:nth-of-type(3) {
  background: #009B9E;
  animation-delay: 0.4s;
}
.loading span:nth-of-type(4) {
  background: #00A77D;
  animation-delay: 0.6s;
}
.loading span:nth-of-type(5) {
  background: #00B247;
  animation-delay: 0.8s;
}
.loading span:nth-of-type(6) {
  background: #5AB027;
  animation-delay: 1.0s;
}
.loading span:nth-of-type(7) {
  background: #A0B61E;
  animation-delay: 1.2s;
}


/*
 * Animation keyframes
 * Use transition opacity instead of keyframes?
 */
@keyframes loading {
  0% {
    opacity: 0;
  }
  100% {
    opacity: 1;
  }
}
    @media(max-width: 769px){
        .att_spot, .att_spot2{
            width: 80%;
        }
        .att_spot2 h4, li{
            font-size: 12px;
        }
    }

    @media(max-width: 380px){
        #submit{
            width: 90%;
        }
        #p,#e,#w{
            font-size: 12px;
        }

        .end-btn{
            right: 20%;
        }

        .end-btn input{
            font-size: 10px;
            width: 30px;
            margin-bottom: 5px; 
        }

        header img{
            width: 70px;
        }
        }

    @keyframes opac{
        from{opacity: 0};
        to{opacity: 1};
    }

    .end-btn{
        position: fixed;
        top: 10%;
        left: 70%;
    }

    .end-btn input{
        background: orange;
        width: 100px;
        cursor: pointer;
        border: none;
    }

    .end-btn input:hover{
        background: orangered;
        color: #fff;
    }

    #sdate{
        background: #fff;
        border: 1px solid #000;
    }
    
    #sdate:hover{
        background: #ccc;
    }

    ul{
        height: 200px;
        overflow: auto;
        border: 1px solid #ccc;
        border-radius: 10px;
    }

    ul li{
        padding: 10px;
        border-bottom: 1px solid #ccc;
        display: flex;
        justify-content: space-between;
        text-transform: capitalize;
    }

    #load-msg{
        text-align: center;
    }
</style>

<a href="<?php echo ROOT_URL; ?>" class="btn-back"><i class="fa fa-backward"></i></a>
<div id="load"></div>
    <header>
        <div class="container">
            <div class="main-header">
                <a href="att.php"><img src="img/logo.png" alt="logo" width="160"></a>
            </div>
        </div>
    </header>

   

    <section>
        <div class="container">
        </div>
            <div id="load-msg">
            </div>
            <div class="att_spot">
            <div>
                <form id="form">
                    <div>
                        <input type="number" id="regno" name="regno" placeholder="Enter reg number...">
                    </div>

                    <div>
                        <input type="submit" value="submit" id="submit" name="submit"  style="cursor: pointer;">
                    </div>
                </form>
            </div>
        </div>
    </section>

    <form id="att" method='POST'>
    <div class="end-btn" style="width: 200px">
        <?php
            $sql = "SELECT * FROM attUpdate WHERE date = '$date'";
            $result = mysqli_query($conn, $sql);

            if(mysqli_num_rows($result) > 0){?>
                <p id='p'>Attendance started for today</p>
            <?php
            }
            else{?>
                <input type="submit" value="start" id="start" name="start">    
            <?php
            }
        ?>
    </div>
    </form>
    <footer>
        <div class="container">
        copyright &copy; <?= date('Y')?>, PEEJAY
        </div>
    </footer>

    <script src="jquery/jquery.js"></script>
    <script type="text/javascript" src='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js'></script>


    <script>
        $(() => {
        window.addEventListener('click', (e) => {
            if(e.target.id !== "submit"){
            $('#p').hide();
            $('#e').hide(); 
            $('#w').hide(); 
            }
        })


    $('#form').submit((e) => {
                e.preventDefault();
    		});

    		$('#submit').click(() => {
            $('#load-msg').html(`<div class="loading">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            </div>`)
                const regno = $('#regno').val();
    				if(regno !== ''){
                        $.ajax
    				(
    				{
    					url: 'attv.php',
    					method: 'post',
    					data: {
                            regno: regno,
    					},		
    					success: function(response){
                            $('#load-msg').html(response);
                        setTimeout(() => {
					$('#load-msg').text('');
				}, 4000);
    					},
    					error: (e) => {
    						$('#load-msg').html("<p id='w'>Waiting for connection...</p>");
                        setTimeout(() => {
					$('#load-msg').text('');
				}, 4000);
    					}
    				}
    				);
                    setTimeout(() => {
                    $('#regno').val('');
                }, 2000);
                
                    }
                    else{
                        $('#load-msg').html('<p id="e">Reg number not inputed...</p>');
                        setTimeout(() => {
					$('#load-msg').text('');
				}, 4000);
                    }
})

$('#start').click((e) => {
    e.preventDefault();
                        $.ajax
    				(
    				{
    					url: 'fill.php',
    					method: 'post',
    					data: {
                            
    					},		
    					success: function(response){
                            $('#start').fadeOut();
                            $('#load').html(response);
                        setTimeout(() => {
					$('#load-msg').text('');
				}, 4000);
    					},
    					error: (e) => {
    						$('#load').html("<p id='w'>Waiting for connection...</p>");
                        setTimeout(() => {
					$('#load-msg').text('');
				}, 4000);
    					}
    				}
                    );
})

})
        const inp = document.getElementById('regno');

        const pro = document.getElementById('p');
        const err = document.getElementById('e');
        const wel = document.getElementById('w');

        window.addEventListener('load', e => {
            inp.focus();
        })

       
    </script>
</body>
</html>

<?php
