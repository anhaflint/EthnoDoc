<?php
/**
 * User: Quentin
 * Date: 15/04/2015
 * Time: 15:46
 */

require_once("./connexion.php");

//================================================================================================================================================================
//Databases connection
//================================================================================================================================================================
$dbsrc = connect("localhost", "root", "", "raddo"); //these attributs will change for the real one when possible
$dbdest = connect("localhost", "root", "", "ethnodoc");

// Spoken archive note transfert query
// 19/05/2015, 40 056 insert on 40 056 spoken archive note from the raddo database

$sql = "insert into ethnodoc.spokenarchivenote (id, title, locality, url, decade, survey)
        SELECT null, raddo.document_global.titre, raddo.c_localite.localite,
        concat(concat(concat(concat(concat(concat('http://www.raddo-ethnodoc.com/extrait/', (case when raddo.document_global.cle_document = 1 THEN 'photo' when raddo.document_global.cle_document = 2 THEN 'chanson' when raddo.document_global.cle_document = 3 THEN 'chanson_texte' when raddo.document_global.cle_document = 4 THEN 'temoignage' when raddo.document_global.cle_document = 5 THEN 'parler' when raddo.document_global.cle_document = 6 THEN 'conte' when raddo.document_global.cle_document = 7 THEN 'discographie' when raddo.document_global.cle_document = 8 THEN 'manuscrit' end)),'/'), mil),'/'),nom_fichier), typ_fichier),
        raddo.c_decenie.decenie, raddo.document_global.cle_enquete
        FROM (((raddo.document_global
        LEFT JOIN raddo.c_localite ON raddo.document_global.cle_localite = raddo.c_localite.cle_localite)
        LEFT JOIN raddo.c_decenie ON raddo.document_global.cle_decenie = raddo.c_decenie.cle_decenie)
        LEFT JOIN raddo.c_typ_fichier ON raddo.document_global.cle_typ_fichier = raddo.c_typ_fichier.cle_typ_fichier)
        WHERE raddo.document_global.cle_document = 4
        OR raddo.document_global.cle_document = 5
        OR raddo.document_global.cle_document = 6";

//Query
$res = mysqli_query($dbdest,$sql) or die(mysql_error());

//Databases deconnection
mysqli_close();
?>