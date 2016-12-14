<div class="container">

    <div class="row">
        <h3>Reset Password</h3>
    </div>

    <form action="?controller=Login&action=reset" method="post">
        <div class="row">
            <div class="form-group col-md-4" style="padding: 0;">
                <input type="text" name="email" class="form-control" placeholder="email" value=""/>
            </div>
        </div>
        <div class="row">
            <button class="btn btn-success" type="submit" name="submit">Reset</button>
        </div>
    </form>

    <div class="row" style="margin-top: 30px;">
        <a href="?controller=Login&action=showLogin">Back to login</a>
    </div>

</div>