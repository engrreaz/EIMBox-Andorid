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
            <td style=" text-align:right;">
              <div class="form-check form-switch"  >
                <input class="form-control form-check-input" style="transform:scale(2.0); " type="checkbox"
                  id="mySwitch" value="yes" checked>
              </div>
            </td>
          </tr>
        </table>
      </div>
    </div>
    <div class="menu-separator"></div>

    <div class="card menu-item-block"  onclick="lnk1d();">
      <div class="card-body">
        <table style="width:100%">
          <tr>
            <td class="menu-item-icon"><i class="bi bi-google"></i></td>
            <td>
              <h4 class="menu-title mt-2">Login With Google</h4>
              <div class="menu-sub-title pt-2">Login with your gmail account</div>
            </td>
            <td style="text-align:right;">
              <div class="form-check form-switch">
                <input class="form-check-input"  style="transform:scale(2.0); "  type="checkbox" id="mySwitch" value="yes" checked>
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
    <div class="card menu-item-block"  onclick="lnk11();"> 
      <div class="card-body">
        <table style="width:100%">
          <tr>
            <td class="menu-item-icon"> <i class="bi bi-qr-code"></i></td>
            <td>
              <h4 class="menu-title mt-2">Login With QR Code</h4>
              <div class="menu-sub-title pt-2">Login with a auto generated QR Code</div>
            </td>
            <td style=" text-align:right;">
              <div class="form-check form-switch">
                <input class="form-check-input"  style="transform:scale(2.0); "  type="checkbox" id="mySwitch" value="yes" checked>
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