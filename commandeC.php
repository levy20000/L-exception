<?php
include_once "config.php";
class commandeC{

    function  ajoutercommande($commande){
        $sql="insert into commandes(client,total) values (:client,:total)";
        $db = config::getConnexion();
        try{
            $req=$db->prepare($sql);

            $req->bindValue(':client',$commande->getIdClient());
            $req->bindValue(':total',$commande->getTotal());
            $req->execute();
            return $db->lastInsertId();
        }
        catch (Exception $err){
            echo 'Erreur: '.$err->getMessage();
        }

    }

    function ajouterligne($id_commande,$id_produit,$nom_produit,$quantite_produit,$prix_produit,$total){
        $sql="insert into lignes(id_commande,id_produit,nom_produit,quantite_produit,prix_produit,total) values (:id_commande,:id_produit,:nom_produit,:quantite_produit,:prix_produit,:total)";
        $db = config::getConnexion();
        try{
            $req=$db->prepare($sql);
            $req->bindValue(':id_commande',$id_commande);
            $req->bindValue(':id_produit',$id_produit);
            $req->bindValue(':nom_produit',$nom_produit);
            $req->bindValue(':quantite_produit',$quantite_produit);
            $req->bindValue(':prix_produit',$prix_produit);
            $req->bindValue(':total',$total);
            $req->execute();
            return $db->lastInsertId();
        }
        catch (Exception $err){
            echo 'Erreur: '.$err->getMessage();
        }

    }

    function selectcategorie(){

        $query = "SELECT * FROM commandes ";

        $db = config::getConnexion();
        try{

            return ( $db->query($query));
        }
        catch (Exception $err){
            echo 'Erreur: '.$err->getMessage();

        }

    }

    function selectlignes($id){

        $query = "SELECT * FROM lignes WHERE 	id_commande ='". $id. "'";

        $db = config::getConnexion();
        try{

            return ( $db->query($query));
        }
        catch (Exception $err){
            echo 'Erreur: '.$err->getMessage();

        }

    }
    function supprimer($id){
        $var=$id;
        $sql = "DELETE FROM commandes WHERE 	id ='". $var. "'";
        $db = config::getConnexion();
        try{
            $req=$db->prepare($sql);

            $req->execute();
            return ("ok");
        }
        catch (Exception $err){
            echo 'Erreur: '.$err->getMessage();
            return ("no");
        }

    }



}