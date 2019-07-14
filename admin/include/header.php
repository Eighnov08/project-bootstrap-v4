<nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.php">Administrator</a>
    </div>
    <ul class="nav navbar-top-links navbar-right">
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">
                <li><a href="index.php?administrator"><i class="fa fa-user fa-fw"></i> Administrator</a></li>
                <li class="divider"></li>
                <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                </li>
            </ul>
        </li>
    </ul>
    <div class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav" id="side-menu">
                <li><a href="index.php"><i class="fas fa-columns fa-fw"></i>&nbsp;&nbsp;Home</a></li>
                <li>
                    <a href="#"><i class="fas fa-th-large fa-fw"></i>&nbsp;&nbsp;Blog<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li><a href="index.php?category">Category</a></li>
                        <li><a href="index.php?post">Post</a></li>
                        <li><a href="index.php?comment">Comment</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="fas fa-users fa-fw"></i>&nbsp;&nbsp;Data<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li><a href="index.php?customer">Customer</a></li>
                        <li><a href="index.php?message">Message</a></li>
                        <li><a href="index.php?services">Services</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>