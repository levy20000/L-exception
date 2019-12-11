<?php

session_start();
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}
// echo print_r($_SESSION['cart']) . ' before';
if (isset($_SESSION['cart'])) {
    if(count($_SESSION['cart'])>0)
    {
        foreach ($_SESSION['cart'] as $key => $result) {
            $obj2 = json_decode( $result, true );
            $obj1 = $_POST['data'][0];
            if($obj2['id'] === $obj1["id"])
            {
                if($obj2["quantite"] === '1') {
                    unset($_SESSION['cart'][$key]);
                }
                else
                {
                    $obj2["quantite"] = strval($obj2["quantite"] - 1);
                    $_SESSION['cart'][$key] = json_encode($obj2);
                }

            }
        }
    }

    echo print_r($_SESSION['cart']);
    echo 'success';
}
?>