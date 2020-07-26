<?php

function est_connecte(): bool {
    if (session_start() === PHP_SESSION_NONE) {
        session_start();
    }
    return !empty($_SESSION['connecte']);
}