<nav class="navbar navbar-default">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">
                <img alt="Brand" src="../../img/logo.png" height="20px">
            </a>
        </div>
        <ul class="nav navbar-nav">
            <li>
                <?php echo '<a class="btn" href="?controller=Home&action=show">Home</a>' ?>
            </li>
            <li>
                <?php echo '<a class="btn" href="?controller=University&action=show">Universities</a>' ?>
            </li>
            <li>
                <?php echo '<a class="btn" href="?controller=Course&action=show">Courses</a>' ?>
            </li>
        </ul>
        <?php if (isset($_SESSION['loggedIn'])) { ?>
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <?php echo '<a class="btn" href="?controller=University&action=update">My University</a>' ?>
                </li>
                <li>
                    <?php echo '<a class="btn" href="?controller=Course&action=showMine">My Courses</a>' ?>
                </li>
                <li>
                    <form class="navbar-form navbar-right" action="?controller=Login&action=logOut" method="post">
                        <button type="submit" class="btn btn-default">Logout</button>
                    </form>
                </li>
            </ul>
        <?php } else { ?>
            <form class="navbar-form navbar-right" action="?controller=Login&action=create" method="post">
                <div class="form-group">
                    <input type="text" name="email" class="form-control" placeholder="email" value=""/>
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="password" value=""/>
                </div>
                <button type="submit" name="submit">Login</button>
            </form>
        <?php } ?>
    </div>
</nav>