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
        <form class="navbar-form navbar-right">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="email">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" placeholder="password">
            </div>
            <button type="submit" class="btn btn-default">Login</button>
        </form>
    </div>
</nav>