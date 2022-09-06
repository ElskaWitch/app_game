<?php
session_start();
/**
 * This file show the home page
 */
/**
 * Get all games from models and stock in array $games
 */
require_once("models/database.php");
$games = getAllGames();
/**
 * Show View
 */
require("view/homePage.php");
