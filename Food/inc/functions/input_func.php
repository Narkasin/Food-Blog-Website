<?php

function username_input($value) {

    $result = false;

    if (strlen($value) < 2 || strlen($value) > 30) {

        $result = false;

    } else {

        $result = true;

    }

    return $result;

}

function name_input($value) {

    $result = false;

    if (strlen($value) < 2 || strlen($value) > 128) {

        $result = false;

    } else {

        $result = true;

    }

    return $result;

}

function email_input($value) {

    $result = false;

    if (strlen($value) < 1 || strlen($value) > 255 || !filter_var($value, FILTER_VALIDATE_EMAIL)) {

        $result = false;

    } else {

        $result = true;

    }

    return $result;

}

function pw_input($value) {

    $result = false;

    if (strlen($value) < 1 || strlen($value) > 30) {

        $result = false;

    } else {

        $result = true;

    }

    return $result;

}

function folder_input($value) {

    $result = false;

    if (strlen($value) < 1 || strlen($value) > 30) {

        $result = false;

    } else {

        $result = true;

    }

    return $result;

}

function input_32($value) {

    $result = false;

    if (strlen($value) < 2 || strlen($value) > 32) {

        $result = false;

    } else {

        $result = true;

    }

    return $result;

}

function input_64($value) {

    $result = false;

    if (strlen($value) < 2 || strlen($value) > 64) {

        $result = false;

    } else {

        $result = true;

    }

    return $result;

}

function input_256($value) {

    $result = false;

    if (strlen($value) < 2 || strlen($value) > 256) {

        $result = false;

    } else {

        $result = true;

    }

    return $result;

}

function input_512($value) {

    $result = false;

    if (strlen($value) < 2 || strlen($value) > 512) {

        $result = false;

    } else {

        $result = true;

    }

    return $result;

}

function input_long($value) {

    $result = false;

    if (strlen($value) < 2) {

        $result = false;

    } else {

        $result = true;

    }

    return $result;

}

?>