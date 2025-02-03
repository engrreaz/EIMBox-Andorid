<?php
include 'inc.php';
$dtst = date('Y-m-01');
$dted = date('Y-m-d');
?>


<script>

  function go(id) {
    //window.location.href="stfinancedetails.php?id=" + id; 
    window.location.href = "stfinancedetails.php?id=" + id + "&edit=1";
  }
  function pr(id) {
    let ln = "stprdetails.php?id=" + id;
    alert(ln);
    window.location.href = ln;
  }  
</script>

<main>
  <div class="containerx-fluid">
    <div class="card text-left" style="background:var(--dark); color:var(--lighter);border-radius:0; "
      onclick="gol(<?php echo $id; ?>)">

      <div class="card-body" style="border-radius:0;">
        <table width="100%" style="color:white;">
          <tr>
            <td colspan="2">
              <div style="font-size:20px; text-align:center; padding: 2px 2px 8px; font-weight:700; line-height:15px;">
                Account Summery

              </div>
            </td>
          </tr>
          <tr>
            <td>
              <div style="font-size:16px; font-weight:700; line-height:15px;"><?php echo date('d-m-Y', strtotime($td)); ?>
              </div>
              <div style="font-size:12px; font-weight:400; font-style:italic; line-height:18px;">Balance On</div>
              <br>
              <div style="font-size:16px; font-weight:700; line-height:15px;"></div>
              <div style="font-size:12px; font-weight:400; font-style:italic; line-height:18px;"></div>
            </td>
            <td style="text-align:right;">
              <div style="font-size:30px; font-weight:700; line-height:20px;" id="cnt">...</div>
              <div style="font-size:12px; font-weight:400; font-style:italic; line-height:24px;">Account Found</div>
              <br>
              <div style="font-size:30px; font-weight:700; line-height:20px;" id="cntamt">...</div>
              <div style="font-size:12px; font-weight:400; font-style:italic; line-height:24px;">Total Balance</div>
            </td>
          </tr>

        </table>
      </div>
    </div>
    <div style="height:1px;"></div>


    <?php
    /*
    $sql0 = "SELECT * FROM sessioninfo where sessionyear='$sy' and sccode='$sccode' and classname='$classname' and sectionname = '$sectionname' order by rollno";
    $result0 = $conn->query($sql0);
    if ($result0->num_rows > 0) 
    {while($row0 = $result0->fetch_assoc()) { 
        $stid=$row0["stid"];
    */

    $cnt = 0;
    $cntamt = 0;
    $mottaka = 0;


    $sql0 = "SELECT * FROM bankinfo where  status=1 and sccode='$sccode' order by id";
    //echo $sql0; 
    $result0 = $conn->query($sql0);
    if ($result0->num_rows > 0) {
      while ($row0 = $result0->fetch_assoc()) {
        $id = $row0["id"];
        $type = $row0["acctype"];
        $accno = $row0["accno"];
        $bankname = $row0["bankname"];
        $branch = $row0["branch"];

        $bgc = 'black';
        $sql00 = "SELECT * FROM banktrans where  accid='$id' order by date desc limit 1";
        $result00 = $conn->query($sql00);
        if ($result00->num_rows > 0) {
          while ($row00 = $result00->fetch_assoc()) {
            $balance = $row00["balance"];
          }
        }

        $mottaka += $balance;

        ?>
        <div class="card text-center" style="background:var(--lighter);; color:<?php echo $bgc; ?>;border-radius:0;"
          id="block<?php echo $id; ?>" >
          <div class="card-body" style="border-radius:0; color:<?php echo $bgc; ?>;" onclick="gox(<?php echo $stid; ?>)">
            <table width="100%">
              <tr>

                <td style="text-align:left; padding-left:5px;">
                  <div style="font-size:15px; font-weight: 700; color:<?php echo $bgc; ?>">
                    <?php echo $bankname . ' (' . $type . ')'; ?></div>
                  <div style="font-size:11px; font-weight: 400; color:<?php echo $bgc; ?>">Account No. <?php echo $accno; ?>
                  </div>
                  <span style="font-size:10px; font-style:italic; font-weight:400; color:gray;">
                    <?php echo $branch; ?>
                  </span>

                </td>
                <td style="text-align:right; font-size:20px; font-weight:600;  color:<?php echo $bgc; ?>;">
                  <?php echo number_format($balance, 2, ".", ","); ?>

                </td>
              </tr>
            </table>
          </div>
        </div>

        <div style="height:0px;"></div>
        <?php
        $cnt++;
  
      }
    }
    ?>
  </div>

</main>
<div style="height:52px;"></div>

<!-- Bootstrap JavaScript Libraries -->
<script>
  document.getElementById("cnt").innerHTML = "<?php echo $cnt; ?>";
  document.getElementById("cntamt").innerHTML = "<?php echo number_format($mottaka, 2, ".", ","); ?>";
</script>