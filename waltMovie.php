<?php
  // Initialiser la session
  session_start();
  // Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion
  if(!isset($_SESSION["username"])){
    header("Location: login.php");
    exit(); 
  }
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="style.css" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    </head>
    <body>

    <?php require 'header.php'?>
    <title>Ciné & Chill - Warner Bros</title>

    <?php

    require_once( "sparqllib.php" );

        $db = sparql_connect( "https://dbpedia.org/sparql/" );
        if( !$db ) { print sparql_errno() . ": " . sparql_error(). "\n"; exit; }
        sparql_ns( "foaf","http://xmlns.com/foaf/0.1/" );

        $sparql = "
        prefix dbo:<http://dbpedia.org/ontology/>
        prefix rdf:<http://www.w3.org/1999/02/22-rdf-syntax-ns#>
        prefix dbr:<http://dbpedia.org/resource/>

        SELECT DISTINCT ?Couverture ?Titre ?Resume ?Realisateur 
        WHERE
            {
            ?film rdf:type dbo:Film;
                rdfs:label ?Titre;
                dbo:director ?Realisateur;
                dbo:thumbnail ?Couverture ;
                dbo:distributor dbr:Walt_Disney_Studios_Motion_Pictures;
                dbo:abstract ?Resume

                FILTER ( LANG ( ?Titre) = 'fr' )
                FILTER ( LANG ( ?Resume) = 'fr' )

            } LIMIT 100
            ";

        $result = sparql_query( $sparql ); 
        if( !$result ) { print sparql_errno() . ": " . sparql_error(). "\n"; exit; }

        $fields = sparql_field_array( $result );
        
        print "<div class='tabMov'>";
        print "<table class='movie' border=2>";
        // Titre
        print "<tr>";
        foreach( $fields as $field )
        {
            print "<th>$field</th>";
        }
        print "</tr>";
        // Content
        while( $row = sparql_fetch_array( $result ) )
        {
            print "<tr>";
            foreach( $fields as $field )
            {
                if($field == "Couverture") {
                    echo "<td>";
                    echo "<img src=".$row[$field]." onerror=\"this.onerror=null; this.src='./images/imageNF.png'\">";
                    echo "</td>";
               }
               if($field == "Titre") {
                    echo "<td>$row[$field]</td>";
                }
                if($field == "Resume") {
                    echo "<td>$row[$field]</td>";
                }
                if($field == "Realisateur") {
                    echo "<td>$row[$field]</td>";
                }
            }
            print "</tr>";
        }
        print "</table>";
        print "</div>";
    
    ?>

    </body>
</html>