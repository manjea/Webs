<span>
    <?php
        if(isset($_SESSION['loggedIn'])){
            echo '<a href="index.php?page=profile" class="profile-span">Profile
            <i class="material-icons">person</i>
            </a>';
        }else{
            echo '<span class="profile-span">Log in to go to profile</span>';
        }
    ?>
</span>

<span>
    <ul id="nav-list-left">
        <li><a href="index.php">Home</a></li>
        <li><a href="index.php?page=contact">Contact</a></li>
        <li><a href="index.php?page=findshop">Find Store</a></li>
        <li><a href="index.php?page=browse">Browse</a></li>
    </ul>
</span>

<span>
    <div id="nav-list-right">
    <span id="checkout">
        <a href="index.php?page=checkout">
            <span>
                Varukorg
            </span>
            <span id="checkout-articles" -data-checkout-articles>
                (<?php
                    if(isset($_COOKIE['cart'])){
                        $cart = $_COOKIE['cart'];
                        $cartArray = explode(',',$cart);
                        echo count($cartArray);
                    }else{
                        echo '0';
                    }
                 
                 ?>)
            </span>
        </a>
    </span>
    <div id="search-container">
        <input type="text" name="" id="search-window">
    </div>
    </div>
    
</span>