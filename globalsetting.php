<?php
include 'inc.php';
if(isset($_GET['token'])){
     $devicetoken = $_GET['token'];
     if($token != $devicetoken){
        $query33px ="update usersapp set token='$devicetoken' where  email='$usr' LIMIT 1";
        $conn->query($query33px) ;
    }
} else {
    $devicetoken = $token;
}
   


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />

    <!-- Bootstrap CSS v5.2.1 -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="css.css?v=a" />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/icon?family=Material+Icons"
    />
    
    
    

 <!-- Bootstrap JavaScript Libraries -->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
        </script>
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
        integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
        </script> 
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        

  </head>

  <body style="background: var(--lighter); width:100%; max-width:100%; overflow:auto;">
    <div class="containerx" style="width: 100%">
      <div style="text-align: center; margin-top: 25px">
        <svg
          xmlns="http://www.w3.org/2000/svg"
          width="40"
          height="40"
          fill="var(--dark)"
          class="bi bi-gear-fill"
          viewBox="0 0 16 16"
        >
          <path
            d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872l-.1-.34zM8 10.93a2.929 2.929 0 1 1 0-5.86 2.929 2.929 0 0 1 0 5.858z"
          />
        </svg>
        <div style="margin-bottom:12px; font-weight:bold;">My Profile</div>

        <style>
          .box {
            color: gray;
            font-weight: bold;
            text-align: left;
            padding: 7px 30px;
            border: 1px solid #ccc;
          }
          .box small {
            font-weight: 400;
            font-size: 10px;
            color: var(--normal);
            padding-left: 30px;
            font-style:italic;
          }
          .icon {
            padding-right: 5px;
          }
          
          td  {
              text-align:center;
          }
          
          .das {
            font-weight: 400;
            font-size: 12px;
            color: var(--dark);
            padding-top:8px;
          }
          
          .bbb{
              border:1px solid var(--darker);
              border-radius:5px;
              padding:7px 2px;
              background:var(--light);
              font-weight:600;
          }
          .right{
              float:right;
              margin-top:2px;
          }
          .hidden {display:none;}
        </style>

        <div class="box">
          <svg
            class="icon"
            xmlns="http://www.w3.org/2000/svg"
            width="24"
            height="24"
            fill="currentColor"
            class="bi bi-person-fill"
            viewBox="0 0 16 16"
          >
            <path
              d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"
            />
          </svg>
          <?php echo $fullname;?>
          <br /><small>Display Name</small>
        </div>
        
        <div class="box">
          <svg class="icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-envelope-fill" viewBox="0 0 16 16">
              <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555ZM0 4.697v7.104l5.803-3.558L0 4.697ZM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757Zm3.436-.586L16 11.801V4.697l-5.803 3.546Z"/>
            </svg>
          <?php echo $usr;?>
          <br /><small>Email Address</small>
        </div>
        
        <div class="box">
          <svg class="icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-telephone-fill" viewBox="0 0 16 16">
              <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
            </svg>
          <?php echo $usrmobile;?>
          <br /><small>Mobile Number</small>
        </div>
        
        
        
        <div style="margin-top:15px;">
            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-mortarboard-fill" viewBox="0 0 16 16">
  <path d="M8.211 2.047a.5.5 0 0 0-.422 0l-7.5 3.5a.5.5 0 0 0 .025.917l7.5 3a.5.5 0 0 0 .372 0L14 7.14V13a1 1 0 0 0-1 1v2h3v-2a1 1 0 0 0-1-1V6.739l.686-.275a.5.5 0 0 0 .025-.917l-7.5-3.5Z"/>
  <path d="M4.176 9.032a.5.5 0 0 0-.656.327l-.5 1.7a.5.5 0 0 0 .294.605l4.5 1.8a.5.5 0 0 0 .372 0l4.5-1.8a.5.5 0 0 0 .294-.605l-.5-1.7a.5.5 0 0 0-.656-.327L8 10.466 4.176 9.032Z"/>
</svg>
        </div>
        
        
        <div style="margin-bottom:12px; font-weight:bold;"><?php  echo $userlevel;?> Profile</div>
        
        
        
        
        <?php
               
                if($userlevel == 'Administrator' || $userlevel == 'Super Administrator' || $userlevel == 'Teacher'){
                    $hidden = '';
                    include 'globalblock1.php';
                    include 'globalblock2.php';
                } else if($userlevel == 'Guardian' ){
                    $hidden = 'hidden';
                    include 'globalblock1.php';
                    include 'globalblock2.php';
                }  else if($userlevel == 'Student' ){
                    $hidden = 'hidden';
                    include 'globalblock3.php';
                }  else {
                    $hidden = '';
                    include 'globalblock1.php';
                    include 'globalblock2.php';
                    include 'globalblock3.php';
                    include 'globalblock4.php';
                } 
        
        ?>
          
          
          
          
        
        
        
        
       <div style="margin-top:15px;">
            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-lock-fill" viewBox="0 0 16 16">
  <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z"/>
</svg>
        </div>
        
        
        <div style="margin-bottom:12px; font-weight:bold;">My Secutiry Setting</div>
        
          
        
        <div class="box">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-google" viewBox="0 0 16 16">
  <path d="M15.545 6.558a9.42 9.42 0 0 1 .139 1.626c0 2.434-.87 4.492-2.384 5.885h.002C11.978 15.292 10.158 16 8 16A8 8 0 1 1 8 0a7.689 7.689 0 0 1 5.352 2.082l-2.284 2.284A4.347 4.347 0 0 0 8 3.166c-2.087 0-3.86 1.408-4.492 3.304a4.792 4.792 0 0 0 0 3.063h.003c.635 1.893 2.405 3.301 4.492 3.301 1.078 0 2.004-.276 2.722-.764h-.003a3.702 3.702 0 0 0 1.599-2.431H8v-3.08h7.545z"/>
</svg>
          
  Security Key proved by <b>Google</b>
          
          <div style="overflow:scroll; font-size:12px; font-weight:400; margin-left:30px;">
        <?php echo $devicetoken; ?>
</div>
        </div>
        
          
          
          
          
          
          
          
          
          
          
          
        </div>
        
        
        
        
        
      </div>



            <center><button class="btn btn-dark mt-5 " onclick="gohome();">Back</button></center>
            <script>function gohome(){window.location.href = 'index.php';}</script>



<?php include 'footer.php';?>
  </body>
</html>


