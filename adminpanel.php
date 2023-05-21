<?php

include('database.php');

if(!isset($_COOKIE['admin'])){
    header('Location: /Shop/index.php');
};

if (isset($_POST['manageProducts']) ) {
    header('Location: /Shop/adminproducts.php');
}

if (isset($_POST['ReadyToship'])){
    if (isset($_POST['orderCheckBox'])){
        for ($i = 0; $i < count($_POST['orderCheckBox']); $i++){
            $thisOrder = $_POST['orderCheckBox'][$i];
            if ($i == 0){
                $completedOrders = "`nr` = '$thisOrder'";
            } else {
                $completedOrders = $completedOrders . " OR `nr` = '$thisOrder'";
            }
        } 

        $query = mysqli_query($start, "UPDATE `orders` SET `status` = 'Shipped' WHERE ($completedOrders);");
    }
}

if (isset($_POST['NotReadyToship'])){
    if (isset($_POST['orderCheckBox'])){
        for ($i = 0; $i < count($_POST['orderCheckBox']); $i++){
            $thisOrder = $_POST['orderCheckBox'][$i];
            if ($i == 0){
                $completedOrders = "`nr` = '$thisOrder'";
            } else {
                $completedOrders = $completedOrders . " OR `nr` = '$thisOrder'";
            }
        } 

        $query = mysqli_query($start, "UPDATE `orders` SET `status` = 'Pending' WHERE ($completedOrders);");
    }
}

if (isset($_POST['makeNewAdmin'])){
    if (isset($_POST['choosenUserId'])){
        for ($i = 0; $i < count($_POST['choosenUserId']); $i++){
            $thisUser = $_POST['choosenUserId'][$i];
            if ($i == 0){
                $newAdmins = "`id` = '$thisUser'";
            } else {
                $newAdmins = $newAdmins . " OR `id` = '$thisUser'";
            }
        } 

        $query = mysqli_query($start, "UPDATE `users` SET `role` = 'admin' WHERE ($newAdmins);");
    }
}

if (isset($_POST['deleteUser'])){
    if (isset($_POST['choosenUserId'])){
        for ($i = 0; $i < count($_POST['choosenUserId']); $i++){
            $thisUser = $_POST['choosenUserId'][$i];
            if ($i == 0){
                $byeBye = "`id` = '$thisUser'";
            } else {
                $byeBye = $byeBye . " OR `id` = '$thisUser'";
            }
        } 

        $query = mysqli_query($start, "DELETE FROM `users` WHERE ($byeBye);");
    }
}

//makeNewAdmin #deleteUser
?>  

<!DOCTYPE html> 
<html>
<head>
    <title> DQ MERCH</title>
    <link rel="shortcut icon" href="img/avatar.png" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/adminka.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Baloo+2&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body onload="cartLength();">
    <div class="blackout" onclick="closeMenu();"></div>
    <div id="menu">
        <div id="menuList">
            <a href="html/about.html"><p>about us</p></a>
            <a href="html/contacts.html"><p>contacts</p></a>
            <a href="html/faq.html"><p>faq</p></a>
            <a href="#"><p>terms & conditions</p></a>
            <div class="socialMeidaIcons"><a href="#"><svg class="facebook" width="43" height="43" viewBox="0 0 43 43" fill="none" xmlns="http://www.w3.org/2000/svg">
                <circle cx="21.16" cy="21.16" r="19.66" stroke="black" stroke-opacity="0.9" stroke-width="3"/>
                <path d="M22.4552 16.7885V14.8025C22.4552 14.4514 22.5892 14.1146 22.8275 13.8663C23.0659 13.618 23.3892 13.4785 23.7263 13.4785H24.9973V10.1685H22.4552C21.4439 10.1685 20.474 10.5869 19.7589 11.3318C19.0438 12.0767 18.6421 13.087 18.6421 14.1405V16.7885H16.1V20.7606H18.6421V31.3527H22.4552V20.7606H24.9973L26.2684 16.7885H22.4552Z" fill="black" fill-opacity="0.8"/>
                </svg></a>              
              <a href="#"><svg class="twitter" width="43" height="43" viewBox="0 0 43 43" fill="none" xmlns="http://www.w3.org/2000/svg">
                <circle cx="21.4758" cy="21.16" r="19.66" stroke="black" stroke-opacity="0.9" stroke-width="3"/>
                <path opacity="0.8" d="M33.8715 14.0684C33.0109 14.4449 32.1007 14.6951 31.1689 14.8113C32.1508 14.2271 32.885 13.302 33.2323 12.2112C32.3129 12.7581 31.307 13.1432 30.2581 13.3499C29.6148 12.6617 28.7802 12.1834 27.8625 11.977C26.9447 11.7706 25.9863 11.8457 25.1117 12.1925C24.2371 12.5394 23.4866 13.1419 22.9578 13.9219C22.4289 14.7019 22.1461 15.6234 22.146 16.5666C22.1423 16.9272 22.1788 17.287 22.2547 17.6394C20.3887 17.5482 18.563 17.063 16.8968 16.2156C15.2306 15.3682 13.7615 14.1777 12.5855 12.7218C11.9819 13.7567 11.7949 14.9836 12.0628 16.1521C12.3306 17.3206 13.0332 18.3424 14.0269 19.0089C13.2849 18.9908 12.5581 18.7941 11.9077 18.4353V18.4869C11.9103 19.5728 12.2851 20.6248 12.9693 21.4664C13.6536 22.308 14.6055 22.888 15.6656 23.1091C15.2643 23.2151 14.8508 23.2672 14.4358 23.264C14.1378 23.2693 13.8401 23.2424 13.5478 23.1837C13.8509 24.1173 14.4351 24.9338 15.22 25.5206C16.0049 26.1075 16.9519 26.4359 17.9306 26.4606C16.2705 27.7633 14.2229 28.4702 12.1151 28.4684C11.7397 28.4676 11.3647 28.4427 10.9926 28.3938C13.1373 29.7799 15.6365 30.5132 18.188 30.5048C19.9443 30.517 21.6855 30.1791 23.3104 29.5108C24.9354 28.8424 26.4118 27.8569 27.6539 26.6115C28.8959 25.3661 29.8788 23.8856 30.5456 22.256C31.2124 20.6264 31.5496 18.8802 31.5378 17.1188C31.5378 16.9108 31.5307 16.7101 31.5207 16.5107C32.4458 15.8467 33.2424 15.0191 33.8715 14.0684V14.0684Z" fill="black"/>
                </svg></a>
              <a href="#"><svg class="youtube" width="43" height="43" viewBox="0 0 43 43" fill="none" xmlns="http://www.w3.org/2000/svg">
                <circle cx="21.8399" cy="21.16" r="19.66" stroke="black" stroke-opacity="0.9" stroke-width="3"/>
                <path opacity="0.8" d="M21.397 28.8105C18.6131 28.8105 15.0371 28.7688 13.5887 28.6898C12.2618 28.6011 11.5665 28.439 10.9231 27.3338C10.2797 26.2287 9.95264 24.2832 9.95264 21.1938V21.1799C9.95264 18.0462 10.2511 16.1495 10.9231 15.0291C11.5437 13.9656 12.2174 13.7618 13.5915 13.6855C15.0514 13.5912 18.7089 13.5579 21.397 13.5579C24.0851 13.5579 27.7328 13.5912 29.1955 13.6855C30.5696 13.7618 31.2449 13.9628 31.8583 15.0291C32.5318 16.1384 32.8316 18.0339 32.8316 21.1828V21.1925C32.8316 24.3428 32.5332 26.2384 31.8611 27.3366C31.2463 28.3931 30.5739 28.6011 29.1955 28.6898C27.7514 28.7675 24.1795 28.8105 21.397 28.8105ZM18.5373 17.0244V25.344L25.6865 21.1842L18.5373 17.0244Z" fill="black"/>
                </svg></a></div>
        </div>
    </div>
    <header>
        <nav>
            <ul>
                <li>
                    <div id="openMenu" onclick="showMenu();">
                        <span></span>
                        <span id="firstMenuLine"></span>
                        <span id="secondMenuLine"></span>
                    </div>
                </li>
                <li><a href="index.php"><h1>ADMIN PANEL</h1></a></li>
                <li>
                    <a href="login.php"><i class="fa fa-user" aria-hidden="true"></i></a>
                    <a href="cart.php"><i class="fa-solid fa-basket-shopping"></i><span id="cartLength">0</span><span id="cartCircle"></span></a>
                </li> 
            </ul>
        </nav>   
    </header>
    <main>

    <?php
        if (isset($_POST['manageOrders']) || isset($_POST['ReadyToship'])) {
            echo'<form method="POST">
                    <div class="ordersHistory">
                        <input type="submit" name="backToMain" value="Send" id="sendSearch">
                        <label class="backToMain" for="sendSearch"><i class="fa-solid fa-arrow-left-long"></i> Back</a></label>

                        <input type="submit" name="completedOrders" value="Send" id="sendSearch2">
                        <label class="backToMain" for="sendSearch2">Other <i class="fa-solid fa-arrow-right-long"></i></a></label>

                        <p>NEW ORDERS</p>
                        <div class="ordersHistoryHeader">
                            <li class="historyNr">Nr.</li>
                            <li class="historyDate">Date</li>
                            <li class="historyStatus">Time</li>
                            <li class="historyPrice">Full Price</li>
                            <input onclick="this.checked = false;" type="checkbox" class="chooseOrder chooseOrderNone" name="nothing[]" />
                        </div>';
            
            $query = mysqli_query($start, "SELECT * FROM `orders` WHERE `status`='Pending' ORDER BY `date` DESC;");
            foreach($query as $row) {
                $orderDateTime = $row['date'];
                $orderDate = substr($orderDateTime, 0, 10);
                $orderTime = substr($orderDateTime, 11, 5);
                $orderPrice = $row['fullPrice'];
                $orderNr = $row['nr'];
                    echo "<div class='ordersHistoryMain'>
                            <li class='historyNr'>$orderNr</li>
                            <li class='historyDate'>$orderDate</span>
                            <li class='historyStatus'>$orderTime</span>
                            <li class='historyPrice'>$$orderPrice</li>
                            <input type='checkbox' class='chooseOrder' name='orderCheckBox[]' value='$orderNr' />
                        </div>";
            };
            echo'   <input id="historyMoreButton" type="submit" name="ReadyToship" value="Ready to ship">
                    <p id="historyFooter"></p>
                </div>
            </form>
            <div id="dividingLine"></div>';

        } elseif (isset($_POST['completedOrders']) || isset($_POST['NotReadyToship'])) {
            echo'<form method="POST">
                    <div class="ordersHistory">
                        <input type="submit" name="backToMain" value="Send" id="sendSearch">
                        <label class="backToMain" for="sendSearch"><i class="fa-solid fa-arrow-left-long"></i> Back</a></label>

                        <p>COMPLETED ORDERS</p>
                        <div class="ordersHistoryHeader">
                            <li class="historyNr">Nr.</li>
                            <li class="historyDate">Date</li>
                            <li class="historyStatus">Time</li>
                            <li class="historyPrice">Full Price</li>
                            <input onclick="this.checked = false;" type="checkbox" class="chooseOrder chooseOrderNone" name="nothing[]"/>
                        </div>';
            
            $query = mysqli_query($start, "SELECT * FROM `orders` WHERE `status`='Shipped' ORDER BY `date` DESC;");
            foreach($query as $row) {
                $orderDateTime = $row['date'];
                $orderDate = substr($orderDateTime, 0, 10);
                $orderTime = substr($orderDateTime, 11, 5);
                $orderPrice = $row['fullPrice'];
                $orderNr = $row['nr'];
                    echo "<div class='ordersHistoryMain'>
                            <li class='historyNr'>$orderNr</li>
                            <li class='historyDate'>$orderDate</span>
                            <li class='historyStatus'>$orderTime</span>
                            <li class='historyPrice'>$$orderPrice</li>
                            <input type='checkbox' class='chooseOrder' name='orderCheckBox[]' value='$orderNr' />
                        </div>";
            };
            echo'   <input id="historyMoreButton2" type="submit" name="NotReadyToship" value="Order is not ready yet">
                    <p id="historyFooter"></p>
                </div>
            </form>
            <div id="dividingLine"></div>';
            
        } elseif (isset($_POST['manageUsers']) || isset($_POST['deleteUser']) || isset($_POST['makeNewAdmin'])) {
            echo'<form method="POST">
                    <div class="allUsersContainer">
                        <label onclick="window.location = `adminpanel.php`;" class="backToMain"><i class="fa-solid fa-arrow-left-long"></i> Back</a></label>

                        <p>ALL  USERS</p>
                        <div class="allUsersHeader">
                            <li class="userID">ID</li>
                            <li class="userName">Name</li>
                            <li class="userRole">Role</li>
                            <li class="userEmail">Email</li>
                            <input onclick="this.checked = false;" type="checkbox" class="chooseOrder chooseOrderNone" name="searchType[]" value="Hoodie" />
                        </div>';
            
            $query = mysqli_query($start, "SELECT * FROM `users`");
            foreach($query as $row) {
                $id = $row['id'];
                $email = $row['email'];
                $fullName = $row['name'] . ' ' . $row['surname'];
                $role = $row['role'];
                    echo "<div class='allUsersMain'>
                            <li class='userID'>$id</li>
                            <li class='userName'>$fullName</span>
                            <li class='userRole'>$role</span>
                            <li class='userEmail'>$email</li>";
                            if ($role == 'admin'){
                                echo "<input onclick='this.checked = false;' type='checkbox' class='chooseOrder chooseOrderNone' name='choosenUserId[]' value='$id' />";
                            } else{
                                echo "<input type='checkbox' class='chooseOrder' name='choosenUserId[]' value='$id' />";
                            }
                            echo"</div>";
            };
            echo'   <input id="makeAdminButton" type="submit" name="makeNewAdmin" value="Promote to Admin">
                    <input id="deleteUserButton" type="submit" name="deleteUser" value="Delete User">
                    
                    <p id="historyFooter"></p>
                </div>
            </form>
            <div id="dividingLine"></div>';

        } else {
            echo'<h1>What would you like to manage?</h1>
                <form method="POST">
                    <input type="submit" name="manageUsers" value="Users" class="choice1">
                    <input type="submit" name="manageProducts" value="Products" class="choice1">
                    <input type="submit" name="manageOrders" value="Orders" class="choice1">
                </form>';
        }
    ?>
    </main>
    <footer>
    </footer>

<script src="plugins/jquery-3.6.4.min.js"></script>
<script src="plugins/sweetalert.min.js"></script>
<script src="js/main.js"></script>
</body> 
</html> 

<!--

<script>

// спрашивает уверен ли админ что хочет удалить или повысить юзера

var anyBox = document.getElementsByClassName('chooseOrder')
var checkedBoxes = 0;
var result = false;

function areYouSure(form){
    for (let i = 0; i < anyBox.length; i++) {
        if(anyBox[i].checked){
            checkedBoxes += 1;
        }
    }
    if (checkedBoxes > 0){
        swal({
            title: "Are you sure?",
            text: "There will be no turning back!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
        .then(function (isOkay) {
        if (isOkay) {

        } else {
            form.submit();
        }
        });
        return false;
    };
}

</script>