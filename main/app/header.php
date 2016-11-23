<nav class="navbar navbar-default">
    <div class="container">
        <div class="collapse navbar-collapse">
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
    </div>
</nav>