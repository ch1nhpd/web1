<?php
include('./action/auth.php');
include('./action/home.php');

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Home</title>
    <link rel="stylesheet" href="./style/home.css" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">

</head>

<body>

    <div class="profile">
        <div class="profile-header">

            <div class="profile-header-cover"></div>

            <div class="profile-header-content">

                <div class="profile-header-img">
                    <img src="https://bootdey.com/img/Content/avatar/avatar3.png" alt="">
                </div>

                <div class="profile-header-info">
                    <h4 class="m-t-10 m-b-5">
                        <?php echo $_SESSION['username']; ?>
                    </h4>
                    <form action="./change_pass.php" method="post">
                        <button type="submit">Change password</button>

                    </form>

                </div>
            </div>

        </div>
    </div>
    <div class="profile-content">
        <div class="tab-content p-0">
            <div class="tab-pane fade active show" id="profile-post">

                <ul class="timeline">
                    <?php
                    foreach($stmt as $row) {
                        echo '
                        <li>
                            <div class="timeline-icon">
                                <a href="javascript:;">&nbsp;</a>
                            </div>
                            <div class="timeline-body">
                                <div class="timeline-header">
                                    <span style="font-weight: bold;">' . $row["title"] . '</span>
                                </div>
                                <div class="timeline-content">
                                    <p>
                                        ' . $row["content"] . '
                                    </p>
                                </div>
                            </div>
                        </li>';
                    }
                    ?>
                </ul>
            </div>
        </div>
    </div>

    <!-- create status -->
    <button class="open-button" onclick="openForm()">Create Status</button>

    <div class="form-popup" id="myForm">
        <form action="./action/create_status.php" class="form-container" method="post">
            <h1>Create status</h1>
            <label for="email"><b>Title</b></label>
            <input type="text" placeholder="Enter Title" name="title" required>

            <label for="psw"><b>Content</b></label>
            <input type="text" placeholder="Enter Content" name="content" required>

            <button type="submit" class="btn">Create</button>
            <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
        </form>
    </div>

    <script>
        function openForm() {
            document.getElementById("myForm").style.display = "block";
        }

        function closeForm() {
            document.getElementById("myForm").style.display = "none";
        }
    </script>
</body>

</html>