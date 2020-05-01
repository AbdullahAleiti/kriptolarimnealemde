<?php
    echo "Please enter your name : ";
    $name = readline();

    echo "Please enter your new password : ";
    $password = readline();

    $hashed_password = password_hash($password,PASSWORD_BCRYPT);

    $data = array(
        "name"      => $name, 
        "password"  => $hashed_password,
        "portfolio" => array()
    );

    echo "\nGreat! now it's time to add your portfolio's holdings.\n";
    echo "We will ask for the cryptocurrency acrynom (for example BTC for bitcoin) then for your holdings amount.\n";
    $r = "";
    while($r != "no")
    {
        echo "\nCryptocurrency: ";
        $acrynom = readline();
        echo "Amount: ";
        if($amount = floatval(readline()))
        {
            $data["portfolio"][strtoupper($acrynom)] = $amount;
        } else {
            echo "The entered balance is not a valid number.\n";
        }

        echo "You have entered your portfolio for the following cryptocurrencies => { ";
        if(count($data["portfolio"])==0)
            echo "-";
        else
        {
            echo implode(" , ",array_keys($data["portfolio"]));
        }
        echo " }\n";
        echo "Do you want to continue adding (yes/no):";

        $r = readline();
    }

    $f = fopen("data.json","w");
    fwrite($f,json_encode($data));
    fclose($f);

    echo "Your portfolio have been created successfuly.";
    