<?php
include 'inc.php';
$diff = strtotime($cur) - strtotime($otptime);
if ($diff > 120) {
  $otp = '';
}

?>

<main>
  <div class="container-fluidx">
    <div class="card text-left">
      <div class="card-body page-top-box">
        <table width="100%" style="color:white;">
          <tr>
            <td>
              <div class="menu-icon"><i class="bi bi-lock-fill"></i></div>
              <div class="menu-text"> Web Login Security</div>
            </td>
          </tr>
        </table>
      </div>
    </div>


    <div class="card menu-item-block" onclick="generate_otp();">
      <div class="card-body">
        <table class=" m-0 " style="width:100%;" >
          <tr>
            <td class="menu-item-icon"><i class="bi bi-lock-fill "></i></td>
            <td>
              <h4 class="menu-title mt-2">Web Login Token</h4>
              <div class="menu-sub-title pt-2">Generate a one time web login token</div>
            </td>
            <td>
            </td>
          </tr>
          <?php if ($otp != '') { ?>
            <tr>
              <td></td>
              <td>
                <div id="keykey">
                  <small><br>Your Generated Web Login Toke is </small>
                  <div style="font-size:30px; color:gray; letter-spacing:10px; font-weight:bold;"><?php echo $otp; ?>
                  </div>
                </div>
              </td>
            </tr><?php } ?>
        </table>
      </div>
    </div>



    <div class="menu-separator"></div>


    <div class="card menu-item-block" onclick="lnkf1();">
      <div class="card-body">
        <table class=" m-0"  style="width:100%;" >
          <tr>
            <td class="menu-item-icon"><i class="bi bi-key-fill"></i></td>
            <td>
              <h4>Fixed Pin</h4>
              <div class="menu-sub-title pt-2">Generate a lifetime fixed pin</div>
            </td>
            <td>
              <div class="form-check form-switch" style="text-align: right;">
                <input class="form-control form-check-input" style="transform:scale(2.0); " type="checkbox"
                  id="mySwitch" value="yes" checked>
              </div>
            </td>
          </tr>
        </table>
      </div>
    </div>
    <div class="menu-separator"></div>

    <div class="card" style="background:var(--lighter); color:var(--darker);" onclick="lnk1d();">
      <img class="card-img-top" alt="">
      <div class="card-body">
        <table style="width:100%">
          <tr>
            <td style="width:50px; font-size:30px; color:var(--dark);"><i class="bi bi-google"></i></td>
            <td>
              <h4>Login With Google</h4>
              <small>Login with your gmail account</small>
            </td>
            <td style="text-align:right;">
              <div class="form-check form-switch">
                <input class="form-check-input" style="" type="checkbox" id="mySwitch" value="yes" checked>
              </div>
            </td>
          </tr>
          <tr>
            <td>

            </td>
            <td>

            </td>
          </tr>
        </table>
      </div>
    </div>

    <style>

    </style>
    <div class="menu-separator"></div>
    <div class="card" style="background:var(--lighter); color:var(--darker);" onclick="lnk11();">
      <img class="card-img-top" alt="">
      <div class="card-body">
        <table style="width:100%">
          <tr>
            <td style="width:50px; font-size:30px; color:var(--dark);">
              <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-qr-code"
                viewBox="0 0 16 16">
                <path d="M2 2h2v2H2V2Z" />
                <path d="M6 0v6H0V0h6ZM5 1H1v4h4V1ZM4 12H2v2h2v-2Z" />
                <path d="M6 10v6H0v-6h6Zm-5 1v4h4v-4H1Zm11-9h2v2h-2V2Z" />
                <path
                  d="M10 0v6h6V0h-6Zm5 1v4h-4V1h4ZM8 1V0h1v2H8v2H7V1h1Zm0 5V4h1v2H8ZM6 8V7h1V6h1v2h1V7h5v1h-4v1H7V8H6Zm0 0v1H2V8H1v1H0V7h3v1h3Zm10 1h-1V7h1v2Zm-1 0h-1v2h2v-1h-1V9Zm-4 0h2v1h-1v1h-1V9Zm2 3v-1h-1v1h-1v1H9v1h3v-2h1Zm0 0h3v1h-2v1h-1v-2Zm-4-1v1h1v-2H7v1h2Z" />
                <path d="M7 12h1v3h4v1H7v-4Zm9 2v2h-3v-1h2v-1h1Z" />
              </svg>

            </td>
            <td>
              <h4>Login With QR Code</h4>
              <small>Login with a auto generated QR Code</small>
            </td>
            <td style="style=" text-align:right;"">
              <div class="form-check form-switch">
                <input class="form-check-input" style="" type="checkbox" id="mySwitch" value="yes" checked>
              </div>
            </td>
          </tr>
          <tr>
            <td></td>
            <td>

            </td>
          </tr>
        </table>
      </div>
    </div>


    <div class="menu-separator"></div>

  </div>

</main>
<div style="height:52px;"></div>

<script>
  document.getElementById("cnt").innerHTML = "<?php echo $cnt; ?>";



</script>


<script>
  function generate_otp() {
    infor = "user=<?php echo $usr; ?>";
    $("#keykey").html("");

    $.ajax({
      type: "POST",
      url: "backend/genotp.php",
      data: infor,
      cache: false,
      beforeSend: function () {
        $('#keykey').html('<i class="material-icons">key</i> <br><small>Token is generating now. Please wait....</small>');
      },
      success: function (html) {
        $("#keykey").html(html);
      }
    });
  }
</script>

<script>
  function fetchsubject() {
    var cls = document.getElementById("classname").value;
    var sec = document.getElementById("sectionname").value;

    var infor = "sccode=<?php echo $sccode; ?>&cls=" + cls + "&sec=" + sec;
    $("#subblock").html("");

    $.ajax({
      type: "POST",
      url: "fetchsubject.php",
      data: infor,
      cache: false,
      beforeSend: function () {
        $('#subblock').html('<span class="">Retriving Subjects...</span>');
      },
      success: function (html) {
        $("#subblock").html(html);
      }
    });
  }
</script>