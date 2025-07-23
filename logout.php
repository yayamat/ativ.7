<?php
require 'conexao.php';
session_destroy();
header('Location: login.php');
