<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

function cnx_pdo()
{
    $cnx = new PDO('mysql:dbname=chaptalq_etudiant;host=127.0.0.1;charset=UTF8', 'root', '');
    return $cnx;
}
function pdo_insert($sql)
{
    $q = cnx_pdo()->exec($sql);
    if ($q == false) {
        return false;
    }
    return $q;
}
function  pdo_string($sql)
{
    echo $sql;
    $q = cnx_pdo()->query($sql);
    if ($q == false) {
        return false;
    }
    return $q->fetchAll();
}