<nav class="navbar navbar-default">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">
                <img alt="Brand" src="../../img/logo.png" height="20px">
            </a>
        </div>
        <ul class="nav navbar-nav">
            <li>
                <a class="btn" href="?controller=Home&action=show">Home</a>
            </li>
            <li>
                <a class="btn" href="?controller=University&action=show">Universities</a>
            </li>
            <li>
                <a class="btn" href="?controller=Course&action=show">Courses</a>
            </li>
        </ul>
        <?php if (isset($_SESSION['loggedIn'])) { ?>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                       aria-expanded="false">Manage <span class="caret"></span></a>
                    <ul class="dropdown-menu">

                        <?php if (isset($_SESSION['admin'])) { ?>
                            <li>
                                <a class="btn" href="?controller=University&action=showAll">Universities</a>
                            </li>
                        <?php } else { ?>
                            <li>
                                <a class="btn" href="?controller=University&action=updateMine">My University</a>
                            </li>
                            <li>
                                <a class="btn" href="?controller=Course&action=showMine">My Courses</a>
                            </li>
                        <?php } ?>

                        <li role="separator" class="divider"></li>
                        <li>
                            <a class="btn" href="?controller=Login&action=logout">Logout</a>
                        </li>
                    </ul>
                </li>
            </ul>
        <?php } else { ?>
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a class="btn" href="?controller=Login&action=showLogin">Login</a>
                </li>
            </ul>
        <?php } ?>
    </div>
</nav>