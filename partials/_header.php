<?php

if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    $loggedin = true;
}
else {
    $loggedin = false;
}
    
    if($loggedin == true && $_SESSION['username'] != "admin") {
        echo '<header>
        <h1><a style="text-decoration: none; color: white; font-size: 200%" href="index.php">XYZ College</a></h1>
        <i><sub>Welcome, ' . $_SESSION['username'] . '</sub></i>
        </header>
        <nav class="navbar">
            <ul>
                <li class="list">
                    <a class="a-link link-home" href="dashboard.php">Dashboard</a>
                    <a class="a-link" href="insert.php"><i class="fa fa-user-plus"></i></a>
                    <a class="a-link" href="edit_view.php"><i class="fa fa-server"></i></a>
                    <a class="a-link" href="search.php"><i class="fa fa-search"></i></a>
                    <a class="a-link" href="setting.php"><i class="fa fa-cogs"></i></a>

                    <a href="/ReportCard/logout.php"><button class="nav-button">Logout</button></a>
                </li>
            </ul>
        </nav>';
    }

    if($loggedin == true && $_SESSION['username'] == "admin"){
        echo '<header>
        <h1><a style="text-decoration: none; color: white; font-size: 200%" href="index.php">XYZ College</a></h1>
        <i><sub>Welcome, ' . $_SESSION['username'] . '</sub></i>
        </header>
        <nav class="navbar">
            <ul>
                <li class="list">
                    <a class="a-link link-home" href="dashboard.php">Dashboard</a>
                    <a class="a-link" href="insert.php"><i class="fa fa-user-plus"></i></a>
                    <a class="a-link" href="edit_view.php"><i class="fa fa-server"></i></a>
                    <a class="a-link" href="search.php"><i class="fa fa-search"></i></a>
                    <a class="a-link" href="setting.php"><i class="fa fa-cogs"></i></a>

                    <a href="/ReportCard/logout.php"><button class="nav-button">Logout</button></a>
                    <a href="/ReportCard/addNew.php"><button class="nav-button">Add New Teacher</button></a>
                </li>
            </ul>
        </nav>';
    }

    if($loggedin == false) {
        echo '<header>
        <h1><a style="text-decoration: none; color: white; font-size: 200%" href="index.php">XYZ College</a></h1>
    </header>
        <nav class="navbar">
                <ul>
                    <li class="list">
                          <a class="a-link link-home" href="index.php">Home</a>
                          <a href="/ReportCard/login.php"><button class="nav-button btn-login">Login</button></a>  
                    </li>
                </ul>
        </nav>';
    }

    echo "<span class='dot'><h2 align='right'><i class='fa fa-code' style='font-size:36px'></i></h2><div class='dev'><a id='dev' href='https://instagram.com/aelaanmusic'>Sourabh Kumhar</a></div></span>";

?>