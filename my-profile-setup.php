<?php
include 'inc.php';

$user_data = array();
$sql0 = "SELECT * FROM usersapp where email='$usr' LIMIT 1";
$result0_user_datas = $conn->query($sql0);
if ($result0_user_datas->num_rows > 0) {
    while ($row0 = $result0_user_datas->fetch_assoc()) {
        $user_data[] = $row0;
    }
}




// $pth = '../students/' . $stid . '.jpg';
// if(file_exists($pth)){
//     $pth = 'https://eimbox.com/students/' . $stid . '.jpg';
// } else {
//     $pth = 'https://eimbox.com/students/noimg.jpg';
// }
//echo $pth;
?>

<main>
    <div class="containerx" style="width:100%;">
        <div class="card text-center">

            <div class="card-body page-top-box">
                <div class="menu-icon"><i class="bi bi-person-circle"></i></div>
                <div class="menu-text">My Profile</div>
            </div>
        </div>

        <div class="card text-center" style="background:var(--dark); color:white; ">
            <div class="card-body" style="height:150px;">

                <?php

                $photo_path = $user_data[0]['photourl'];
                if (strlen($photo_path) < 10) {
                    $photo_path = "https://eimbox.com/teacher/no-img.jpg";
                }
                ?>


               <img src="<?php echo $photo_path; ?>" class="st-pic-big " />
            </div>
        </div>




        <div style="height:1px;"></div>

        <div class="card text-center" style="background:var(--lighter);">
            <div class="card-body">
                <div style="text-align:left; padding-top:0px;">
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-person-circle "></i></span>
                        <input type="text" id="dispname" name="dispname" class="form-control text-box"
                            placeholder="Your Name" value="<?php echo $user_data[0]['profilename']; ?>">
                    </div>
                </div>
                <div style="margin:0px 0; height:1px;"></div>
                
                <div style="text-align:left; padding-top:0px;">
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-telephone-fill "></i></span>
                        <input type="text" id="mobile" name="mobile" class="form-control text-box"
                            placeholder="Mobile Number" value="<?php echo $user_data[0]['mobile']; ?>">
                    </div>
                </div>
                <div style="margin:0px 0; height:1px;"></div>


                <div style="text-align:left; padding-top :15px;">
                    <button type="button" class="btn btn-primary"
                        onclick="update_user_profile_info(<?php echo $user_data[0]['id']; ?>);">Update Info</button>
                    <span id="px"></span>
                </div>






            </div>
        </div>
        <div style="height:1px;"></div>














        <div style="height:1px;"></div>




        <?php


        ?>



    </div>

</main>
<div style="height:52px;"></div>

<script>
    function rel(id) {
        window.location.href = "studentedit.php?id=" + id;
    }

    function edit(id) {
        window.location.href = "studentedit.php?id=" + id;
    }  
</script>

<script>
    function update_user_profile_info(id) {
        var nameeng = document.getElementById("dispname").value;

        var mno = document.getElementById("mobile").value;
        // var mno = '0000';

        var infor = "dispname=" + nameeng + "&mno=" + mno + "&id=" + id;
        //   alert(infor);
        $("#px").html("");

        $.ajax({
            type: "POST",
            url: "backend/update-user-profile.php",
            data: infor,
            cache: false,
            beforeSend: function () {
                $('#px').html('<span class="stname-ben">Updating...</span>');
            },
            success: function (html) {
                $("#px").html(html);
            }
        });
    }
</script>