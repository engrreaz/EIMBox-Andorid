<?php
include 'inc.php';
include 'datam/datam-teacher.php';
$lbl = '';
?>

<main>
  <div class="container-fluidx">
    <div class="card text-left" style="background:var(--dark); color:var(--lighter);">
      <div class="card-body page-top-box">
        <div class="page-icon"><i class="bi bi-person-badge"></i></div>
        <div class="page-title"> User Manager </div>
      </div>
    </div>


    <?php
    $sql0 = "SELECT * FROM usersapp where sccode = '$sccode' and (userlevel='Guest' or userlevel='Visitor')";
    $result0 = $conn->query($sql0);
    if ($result0->num_rows > 0) {
      ?>
      <div class="card text-center" style="background:var(--darker); ">
        <img class="card-img-top" alt="">
        <div class="card-body">
          <div class="stname-ben fw-bold">New Users</div>
        </div>
      </div>
      <?php
      while ($row0 = $result0->fetch_assoc()) {
        $email = $row0["email"];
        $id = $row0["id"];
        ?>
        <div class="card text-center" id="usr<?php echo $id; ?>">
          <div class="card-body  page-info-box">
            <table width="100%">
              <tr>
                <td style="width:10px;">
                  <small>User Email :</small><br>
                  <span style="font-size:16px; font-weight:700; color:var(--dark);"><?php echo $email; ?></span><br><br>
                  <div style="color:gray; font-size:11px; font-style:italic; margin-bottom:5px;">Pick an action from below :
                  </div>
                </td>
              </tr>
              <tr>
                <td>
                  <button class="btn btn-info" onclick="upd(<?php echo $id; ?>, 0);">Teacher</button>
                  <button class="btn btn-danger" onclick="upd(<?php echo $id; ?>, 1);">Administrator</button>
                  <button class="btn btn-dark" onclick="upd(<?php echo $id; ?>, 2);" disabled>Remove</button>
                </td>
              </tr>
            </table>

          </div>
        </div>
      <?php }
    } ?>


    <?php
    $sql0A = "SELECT * FROM usersapp where sccode = '$sccode' and (userlevel='Teacher' or userlevel='Administrator' or userlevel='Super Administrator')";
    $result0A = $conn->query($sql0A);
    if ($result0A->num_rows > 0) {
      ?>
      <div class="card text-center">
        <div class="card-body page-info-box">
          <div class="stname-ben fw-bold">Registered Users</div>
        </div>
      </div>
      <div style="height:1px;"></div>
      <?php

      while ($row0A = $result0A->fetch_assoc()) {
        $email = $row0A["email"];
        $id = $row0A["id"];
        $fullname = $row0A["profilename"];
        $userid = $row0A["userid"];
        $uul = $row0A["userlevel"];
        $hidn = $row0A["hiddenuser"];

        $hideblock = '';
        if ($hidn == 1) {
          $hideblock = 'hidden';
        }
        if ($usr == $email || $reallevel=='Super Administrator') {
          $hideblock = '';
        }
        ?>
        <div class="card mb-2" style="background:var(--lighter); color:var(--darker);" id="usr<?php echo $id; ?>" <?php echo $hideblock;?>>
          <div class="card-body ">

            <div style="float:right;"><?php if ($uul == 'Administrator' || $uul == 'Super Administrator') { ?><i
                  class="bi bi-tags-fill text-success "></i><?php } ?></div>

            <div class="roll-no">
              <i class="bi bi-envelope-at-fill pe-2"></i> <b><?php echo $email; ?> </b>
            </div>
            <div class="roll-no text-muted">
              <i class="bi bi-person-fill pe-2"></i> <b> <?php echo $fullname; ?> </b>
            </div>

            <div class="form-group mt-2">
              <label for="exampleFormControlSelect1"><small>Select Teacher</small></label>
              <select class="form-control" id="a<?php echo $id; ?>">
                <option></option>
                <?php
                $sql0r = "SELECT * FROM teacher where sccode='$sccode' and status='1' order by ranks, id";
                $result0r = $conn->query($sql0r);
                if ($result0r->num_rows > 0) {
                  while ($row0r = $result0r->fetch_assoc()) {
                    $tid = $row0r["tid"];
                    $tname = $row0r["tname"];
                    if ($tid == $userid) {
                      $pum = 'selected';
                    } else {
                      $pum = '';
                    }
                    echo '<option value="' . $tid . '" ' . $pum . '>' . $tname . '</option>';
                  }
                } ?>
              </select>
            </div>
            <div>
              <button class="btn btn-info" onclick="bind(<?php echo $id; ?>, <?php echo $tid; ?>)">Bind this
                User</button>
              <?php if ($uul != 'Super Administrator') { ?>
                <button class="btn btn-danger" onclick="rem(<?php echo $id; ?>, <?php echo $tid; ?>)">Remove
                  User</button>
              <?php } ?>
            </div>

            <div id="pro<?php echo $id; ?>"><?php echo $lbl; ?></div>




          </div>
        </div>
      <?php }
    }


    ?>



  </div>

</main>

<div style="height:52px;"></div>



<script>


  function go(id) {
    window.location.href = "students.php?" + id;
  }  
</script>

<script>
  function upd(id, rank) {
    var infor = "id=" + id + "&rank=" + rank;
    $("#usr" + id).html("");

    $.ajax({
      type: "POST",
      url: "userupd.php",
      data: infor,
      cache: false,
      beforeSend: function () {
        $('#usr' + id).html('<span class="">Saving, Please Wait....</span>');
      },
      success: function (html) {
        $("#usr" + id).html(html);
      }
    });
  }

</script>
<script>
  function bind(id, tid) {
    var a = document.getElementById('a' + id).value;
    var infor = "id=" + id + "&tid=" + a + "&ch=1";
    $("#pro" + id).html("");

    $.ajax({
      type: "POST",
      url: "userupd.php",
      data: infor,
      cache: false,
      beforeSend: function () {
        $('#pro' + id).html('<span class="">Saving, Please Wait....</span>');
      },
      success: function (html) {
        $("#pro" + id).html(html);
      }
    });
  }


  function rem(id, tid) {
    var a = document.getElementById('a' + id).value;
    var infor = "id=" + id + "&tid=" + a + "&ch=2";
    $("#pro" + id).html("");

    $.ajax({
      type: "POST",
      url: "userupd.php",
      data: infor,
      cache: false,
      beforeSend: function () {
        $('#pro' + id).html('<span class="">Saving, Please Wait....</span>');
      },
      success: function (html) {
        $("#pro" + id).html(html);
        window.location.href = 'userlist.php';
      }
    });
  }


</script>
<script>



  function add() {
    let cls = document.getElementById("cls").value;
    let sub = document.getElementById("sub").value;
    let topic = document.getElementById("topic").value;
    var infor = "cls=" + cls + "&sub=" + sub + "&topic=" + topic;
    $("#html").html("");

    $.ajax({
      type: "POST",
      url: "addtopic.php",
      data: infor,
      cache: false,
      beforeSend: function () {
        $('#html').html('<span class="">Saving, Please Wait....</span>');
      },
      success: function (html) {
        $("#html").html(html);
      }
    });
  }


</script>
<script>
  function src() {
    let cls = document.getElementById("cls").value;
    let sub = document.getElementById("sub").value;
    let topic = document.getElementById("topic").value;
    var infor = "cls=" + cls + "&sub=" + sub + "&topic=" + topic + "&s=1";
    $("#html2").html("");

    $.ajax({
      type: "POST",
      url: "addtopic.php",
      data: infor,
      cache: false,
      beforeSend: function () {
        $('#html2').html('<span class="">Saving, Please Wait....</span>');
      },
      success: function (html) {
        $("#html2").html(html);

      }
    });
  }

</script>
<script>

  function upd2() {
    let id = document.getElementById("id").value;
    let title = document.getElementById("title").value;
    let l1 = document.getElementById("l1").value;
    let l2 = document.getElementById("l2").value;
    let l3 = document.getElementById("l3").value;

    var infor = "id=" + id + "&title=" + title + "&l1=" + l1 + "&l2=" + l2 + "&l3=" + l3;
    $("#html").html("");

    $.ajax({
      type: "POST",
      url: "addtopic.php",
      data: infor,
      cache: false,
      beforeSend: function () {
        $('#html').html('<span class="">Saving, Please Wait....</span>');
      },
      success: function (html) {
        $("#html").html(html);
      }
    });
  }



</script>



</body>

</html>