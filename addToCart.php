<?php

session_start();
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}
// echo print_r($_SESSION['cart']) . ' before';
if (isset($_SESSION['cart'])) {
    if(count($_SESSION['cart'])>0)
    {
        $added = false;
        foreach ($_SESSION['cart'] as $key => $result) {
            $obj2 = json_decode( $result, true );
            $obj1 = $_POST['data'][0];

            if($obj2['id'] === $obj1['id'])
            {
                $obj2["quantite"] = strval($obj2["quantite"] + 1);
                $_SESSION['cart'][$key] = json_encode($obj2);
                $added = true;
            }
        }
        if($added === false)
        {
            $_SESSION['cart'][] = json_encode($_POST['data'][0]);
        }
    }
    else
    {
        $_SESSION['cart'][] = json_encode($_POST['data'][0]);
    }

    echo print_r($_SESSION['cart']);
    echo 'success';
}
?>