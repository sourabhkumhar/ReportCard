<?php
$bn = "Bhupal Nobles' University";
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    $loggedin = true;
}
else {
    $loggedin = false;
}
    
    if($loggedin == true && $_SESSION['username'] != "admin") {
        echo '<header>
        <h1><a style="text-decoration: none; color: white; font-size: 200%" href="index.php">' . $bn . '</a></h1>
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

                    <a href="logout.php"><button class="nav-button">Logout</button></a>
                </li>
            </ul>
        </nav>';
    }

    if($loggedin == true && $_SESSION['username'] == "admin"){
        echo '<header>
        <h1><a style="text-decoration: none; color: white; font-size: 200%" href="index.php">' . $bn . '</a></h1>
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

                    <a href="logout.php"><button class="nav-button">Logout</button></a>
                    <a href="addNew.php"><button class="nav-button">Add New Teacher</button></a>
                </li>
            </ul>
        </nav>';
    }

    if($loggedin == false) {
        echo '<header>
        <h1><a style="text-decoration: none; color: white; font-size: 200%" href="index.php">' . $bn . '</a></h1>
        <i><sub>Student Report Management System</sub></i>
    </header>
        <nav class="navbar">
                <ul>
                    <li class="list">
                          <a class="a-link link-home" href="index.php">Get Marksheet</a>
                          <a href="login.php"><button class="nav-button btn-login">Login</button></a>  
                    </li>
                </ul>
        </nav>';
    }

    echo "<span class='dot'><h2 align='right'><i class='fa fa-code' style='font-size:36px'></i></h2><div class='dev'><a id='dev' onclick='developer()'>Sourabh Kumhar</a></div></span>";
?>

<script>
    function developer() {
        let profile = confirm('Hi Viewer, I am Sourabh Kumhar - Developer of this Student Report Management System Website!! \n\nDo you want to visit my LinkedIn?');

        if(profile) {
            location.href = "https://linkedin.com/in/sourabhkumhar";
        }
    }
</script>
