<?php

/**
 * This file show the home page
 */
// session_start();
/**
 * Get all games from models and stock in array $games
 */
require_once("models/database.php");
$games = getAllGames();
/**
 * Show View
 */
require("view/homePage.php");
