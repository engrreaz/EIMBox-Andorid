<?php
include 'inc.php';
?>



<main>
  <div class="container-fluidx">

    <div class="card text-left" style="background:var(--dark); color:var(--lighter);">
      <div class="card-body">
        <table width="100%" style="color:white;">
          <tr>
            <td>
              <div class="menu-icon"><i class="bi bi-person-circle"></i></div>
              <div class="menu-text"> My Account </div>
            </td>
          </tr>
        </table>
      </div>
    </div>



    <div class="card menu-item-block" onclick="settings_menu_my_profile();">
      <div class="card-body">
        <table style="">
          <tr>
            <td class="menu-item-icon"><i class="bi bi-person-circle"></i></td>
            <td>
              <h4> My Profile </h4>
              <div class="menu-item-sub-text"> Edit/Update my profile </div>
            </td>
          </tr>
        </table>
      </div>
    </div>
    <div class="menu-separator"></div>

    <div class="card menu-item-block" onclick="profile_menu_my_attendance_summery();">
      <div class="card-body">
        <table style="">
          <tr>
            <td class="menu-item-icon"><i class="bi bi-fingerprint"></i></td>
            <td>
              <h4> My Attendance </h4>
              <div class="menu-item-sub-text"> My daily attendance record </div>
            </td>
          </tr>
        </table>
      </div>
    </div>
    <div class="menu-separator"></div>

    <div class="card menu-item-block" onclick="profile_menu_leave_application();">
      <div class="card-body">
        <table style="">
          <tr>
            <td class="menu-item-icon"><i class="bi bi-box-arrow-down-left"></i></td>
            <td>
              <h4> My Leaves & Movement </h4>
              <div class="menu-item-sub-text"> All of my leaves & movement records </div>
            </td>
          </tr>
        </table>
      </div>
    </div>
    <div class="menu-separator"></div>



    <div class="card menu-item-block" onclick="profile_menu_offline_manager();">
      <div class="card-body">
        <table style="">
          <tr>
            <td class="menu-item-icon"><i class="bi bi-fingerprint"></i></td>
            <td>
              <h4> Offline Manager </h4>
              <div class="menu-item-sub-text"> My Offline Data Management Tool </div>
            </td>
          </tr>
        </table>
      </div>
    </div>
    <div class="menu-separator"></div>

    <div class="card menu-item-block " onclick="lnk3();" hidden>
      <div class="card-body ">
        <table style="">
          <tr>
            <td class="menu-item-icon"><i class="bi bi-currency-exchange"></i></td>
            <td>
              <h4> My Transactions </h4>
              <div class="menu-item-sub-text "> All of my transaction with accoutants that I collected </div>
            </td>
          </tr>
        </table>
      </div>
    </div>
    <div class="menu-separator"></div>

    <div class="card menu-item-block" onclick="lnk3();" hidden>
      <div class="card-body">
        <table style="">
          <tr>
            <td class="menu-item-icon"><i class="bi bi-journal"></i></td>
            <td>
              <h4> My Memos </h4>
              <div class="menu-item-sub-text"> All of my memos I've received </div>
            </td>
          </tr>
        </table>
      </div>
    </div>
    <div class="menu-separator"></div>

    <div class="card menu-item-block" onclick="lnk3();" hidden>
      <div class="card-body">
        <table style="">
          <tr>
            <td class="menu-item-icon"><i class="bi bi-chat-fill"></i></td>
            <td>
              <h4> My Messages </h4>
              <div class="menu-item-sub-text"> Messages with my selected friends and EIMBox community </div>
            </td>
          </tr>
        </table>
      </div>
    </div>
    <div class="menu-separator"></div>

    <div class="card menu-item-block" onclick="lnk3();" hidden>
      <div class="card-body">
        <table style="">
          <tr>
            <td class="menu-item-icon"><i class="bi bi-person-fill-gear"></i></td>
            <td>
              <h4> Settings </h4>
              <div class="menu-item-sub-text"> Relevant setting of my accounts </div>
            </td>
          </tr>
        </table>
      </div>
    </div>
    <div class="menu-separator"></div>

    <div class="card menu-item-block" onclick="settings_menu_login_method();">
      <div class="card-body">
        <table style="">
          <tr>
            <td class="menu-item-icon"><i class="bi bi-lock-fill"></i></td>
            <td>
              <h4> Security </h4>
              <div class="menu-item-sub-text"> My security setting, login method </div>
            </td>
          </tr>
        </table>
      </div>
    </div>
    <div class="menu-separator"></div>

    <div class="card menu-item-block" onclick="settings_menu_logout();">
      <div class="card-body">
        <table style="">
          <tr>
            <td class="menu-item-icon"><i class="bi bi-box-arrow-left"></i></td>
            <td>
              <h4> Logout </h4>
              <div class="menu-item-sub-text"> Dismiss your logging information </div>
            </td>
          </tr>
        </table>
      </div>
    </div>
    <div class="menu-separator"></div>


    <!-- *******************************************************
    *******************************************************
    *******************************************************
    *******************************************************
    *******************************************************
    *******************************************************
    ******************************************************* -->



  </div>

</main>
<div style="height:52px;"></div>



<script>






</script>