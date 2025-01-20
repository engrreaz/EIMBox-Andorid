<?php include 'header.php'; ?>

<div class="card">
    <div class="card-body " style="">

        <div class="text-center ">

            <img src="iimg/logo.png" class="st-pic-normal mt-5" />
            <div class="stname-eng mt-3">EIMBox</div>
            <div class="st-id">School Management System</div>
        </div>

        <form method="POST" action="checkeiin.php">
            <div class="form-group">
                <label class="text-small text-muted" for="email">Email</label>
                <input type="text" id="email" name="email" class="form-control bg-transparent text-dark"
                    placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
            </div>
            <div class="form-group">
                <label class="text-small text-muted" for="email">Password</label>
                <input type="password" id="password" name="password" class="form-control bg-transparent text-dark"
                    placeholder="Username" aria-label="password" aria-describedby="basic-addon1">
            </div>

            <div class="form-group">
                <input type="submit" value="submit" class="btn btn-primary" />
            </div>
        </form>
    </div>
</div>