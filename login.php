<div class="card">
    <div class="card-body " style="">
        <form method="POST" action="checkeiin.php">
        <div class="form-group">
            <label class="text-small text-muted" for="email">User Email</label>
            <input type="text" id="email" name="email" class="form-control bg-transparent text-dark"
                placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
        </div>
        <div class="form-group">
            <label class="text-small text-muted" for="email">User pass</label>
            <input type="password" id="password" name="password" class="form-control bg-transparent text-dark"
                placeholder="Username" aria-label="password" aria-describedby="basic-addon1">
        </div>

        <div class="form-group">
            <input type="submit" value="submit" />
        </div>
        </form>
    </div>
</div>

<a class="btn btn-primary" href="index.php?email=engrreaz@gmail.com">Login</a>