<?php

    function getUserData()
    {
        $f = file_get_contents("../data.json");
        return json_decode($f);
    }