<?php
    $jData = json_decode(file_get_contents(flights.json));

    echo json_encode($jData);