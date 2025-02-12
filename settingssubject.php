<?php
include 'inc.php';
?>

<main>
  <div class="container-fluidx">
    <div class="card text-left" style="background:var(--dark); color:var(--lighter);">

      <div class="card-body">
        <div class="menu-icon"><i class="bi bi-book-half"></i></div>
        <div class="menu-text">Subject Setup</div>
      </div>
    </div>

    <?php if ($userlevel == 'Administrator' || $userlevel == 'Head Teacher') { ?>



      <div class="card" style="background:var(--lighter); color:var(--darker);" onclick="lnk1();">
        <img class="card-img-top" alt="">
        <div class="card-body">

          <label class="text-small" for="id">Select Section & Class</label>

          <div style="text-align:left; padding-top:0px; display:none;">
            <div class="input-group">
              <span class="input-group-text"><i class="material-icons ico">group</i></span>
              <input type="text" id="id" name="id" class="form-control" placeholder="Enter Section/Group Name" value="">
            </div>
          </div>
          <div class="form-group input-group">
            <span class="input-group-text text-small"><i class="bi bi-book"></i></span>
            <select class="form-control text-dark " id="cls" onchange="submit();">

              <option value="">Choose a Class & Section</option>
              <?php
              $sql00xgr = "SELECT * FROM areas where user='$rootuser' and sessionyear = '$sy' order by idno, id";
              $result00xgr = $conn->query($sql00xgr);
              if ($result00xgr->num_rows > 0) {
                while ($row00xgr = $result00xgr->fetch_assoc()) {
                  $id = $row00xgr["id"];
                  $cls2 = $row00xgr["areaname"];
                  $sec2 = $row00xgr["subarea"];
                  ?>
                  <option value="<?php echo $id; ?>"><?php echo $cls2 . ' | ' . $sec2; ?> </option>
                <?php }
              } ?>
            </select>
            <span class="input-group-text text-small btn btn-outline-primary " onclick="submit();">
              <i class="bi bi-arrow-right"></i>
            </span>
          </div>



        </div>
      </div>




      <div class="card" style="background:var(--darker); color:var(--lighter);">
        <img class="card-img-top" alt="">
        <div class="card-body ">
          <div class="text-center"> Subject List </div> 
        </div>
      </div>







      <div id="block">


      </div>


    </div>
  <?php } ?>


  </div>

</main>
<div style="height:52px;"></div>


<script>
  function submit() {
    var id = document.getElementById("cls").value;

    var infor = "rootuser=<?php echo $rootuser; ?>&id=" + id + "&sccode=<?php echo $sccode; ?>";
    $("#block").html("");

    $.ajax({
      type: "POST",
      url: "backend/addeditsubject.php",
      data: infor,
      cache: false,
      beforeSend: function () {
        $('#block').html('<span class=""><center>Processing, Please Wait....</center></span>');
      },
      success: function (html) {
        $("#block").html(html);
      }
    });
  }

</script>

<script>
  function adddel(id, tail) {
    var id = document.getElementById("cls").value;

    var infor = "rootuser=<?php echo $rootuser; ?>&id=" + id + "&sccode=<?php echo $sccode; ?>";
    $("#block").html("");

    $.ajax({
      type: "POST",
      url: "addeditsubject.php",
      data: infor,
      cache: false,
      beforeSend: function () {
        $('#block').html('<span class=""><center>Processing, Please Wait....</center></span>');
      },
      success: function (html) {
        $("#block").html(html);
      }
    });
  }

</script>

<script>

  function defaults(id) {

    var infor = "rootuser=<?php echo $rootuser; ?>&id=" + id + "&sccode=<?php echo $sccode; ?>";
    $("#defdef").html("");

    $.ajax({
      type: "POST",
      url: "backend/adddefault.php",
      data: infor,
      cache: false,
      beforeSend: function () {
        $('#defdef').html('<span class=""><center>Processing, Please Wait....</center></span>');
      },
      success: function (html) {
        $("#defdef").html(html);
        document.getElementById("dosso").style.display = 'none';
      }
    });
  }


  function fourth(id) {
    let cls = document.getElementById('cls').value;
    var infor = "rootuser=<?php echo $rootuser; ?>&id=" + id + "&sccode=<?php echo $sccode; ?>&cls=" + cls;
    $("#fff" + id).html("");

    $.ajax({
      type: "POST",
      url: "backend/set-fourth.php",
      data: infor,
      cache: false,
      beforeSend: function () {
        $('#fff' + id).html('<span class=""><center>Processing, Please Wait....</center></span>');
      },
      success: function (html) {
        $("#fff" + id).html(html);
      }
    });
  }

</script>