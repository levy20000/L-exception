<?php
include_once "config.php";
class produit {

    function ajouterproduit($produit){
        $sql="insert into produit(name,categorie,color,description,prix,STOCK,image,XS,S,M,L,XL,XXL) values (:name,:categorie,:color,:description,:prix,:stock,:image,:xs,:s,:m,:l,:xl,:xxl)";
        $db = config::getConnexion();
        try{
            $req=$db->prepare($sql);
            $name=$produit->getName();
            $description=$produit->getDescription();
            $image=$produit->getImage();
            $categorie=$produit->getCategorie();
            $color=$produit->getColor();
            $prix=$produit->getPrix();
            $xs=$produit->getXs();
            $s=$produit->getS();
            $m=$produit->getM();
            $l=$produit->getL();
            $xl=$produit->getXl();
            $xxl=$produit->getXxl();
            $stock=$xs+$s+$m+$l+$xl+$xxl;


            $req->bindValue(':name',$name);
            $req->bindValue(':description',$description);
            $req->bindValue(':image',$image);
            $req->bindValue(':categorie',$categorie);
            $req->bindValue(':color',$color);
            $req->bindValue(':prix',$prix);
            $req->bindValue(':stock',$stock);
            $req->bindValue(':xs',$xs);
            $req->bindValue(':s',$s);
            $req->bindValue(':m',$m);
            $req->bindValue(':l',$l);
            $req->bindValue(':xl',$xl);
            $req->bindValue(':xxl',$xxl);
            $req->execute();

        }
        catch (Exception $err){
            echo 'Erreur: '.$err->getMessage();
        }

    }

    function afficherproduit($id){

        $query = "SELECT * FROM produit where ID='$id' ";

        $db = config::getConnexion();
        try{

            return ( $db->query($query));
        }
        catch (Exception $err){
            echo 'Erreur: '.$err->getMessage();

        }

    }

    function afficherproduitbycategorie($categorie,$var){

        $query = "SELECT * FROM produit where categorie='$categorie' LIMIT $var,6";

        $db = config::getConnexion();
        try{

            return ( $db->query($query));
        }
        catch (Exception $err){
            echo 'Erreur: '.$err->getMessage();

        }

    }


    function modifierProd($var1,$var2,$color,$var5,$var,$var3,$var4,$id,$xs,$s,$m,$l,$xl,$xxl){
        $sql="UPDATE produit SET name=:nom, description=:description,color=:color,prix=:prix,STOCK=:stock,XS=:xs,S=:s,M=:m,L=:l,XL=:xl,XXL=:xxl,categorie=:type,image=:im where ID= :id";

        $db = config::getConnexion();

        $req=$db->prepare($sql);

        $nom=$var1    ;
        $description=$var2;
        $color=$color;
        $im=$var3;
        $type=$var4;
        $stock=$var;
        $prix=$var5;


        $req->bindValue(':id',$id);
        $req->bindValue(':nom',$nom);
        $req->bindValue(':description',$description);
        $req->bindValue(':color',$color);
        $req->bindValue(':im',$im);
        $req->bindValue(':type',$type);
        $req->bindValue(':stock',$stock);
        $req->bindValue(':prix',$prix);
        $req->bindValue(':xs',$xs);
        $req->bindValue(':s',$s);
        $req->bindValue(':m',$m);
        $req->bindValue(':l',$l);
        $req->bindValue(':xl',$xl);
        $req->bindValue(':xxl',$xxl);
        try{
            $req->execute();

        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }

    function modifierProd2($var1,$var2,$color,$var5,$var,$var3,$id,$xs,$s,$m,$l,$xl,$xxl){
        $sql="UPDATE produit SET name=:nom, description=:description ,color=:color,prix=:prix,STOCK=:stock,XS=:xs,S=:s,M=:m,L=:l,XL=:xl,XXL=:xxl, categorie=:type where ID= :id";

        $db = config::getConnexion();

        $req=$db->prepare($sql);

        $nom=$var1    ;
        $description=$var2;
        $color=$color;
        $type=$var3;
        $stock=$var;
        $prix=$var5;



        $req->bindValue(':id',$id);
        $req->bindValue(':nom',$nom);
        $req->bindValue(':description',$description);
        $req->bindValue(':color',$color);
        $req->bindValue(':type',$type);
        $req->bindValue(':stock',$stock);
        $req->bindValue(':prix',$prix);
        $req->bindValue(':xs',$xs);
        $req->bindValue(':s',$s);
        $req->bindValue(':m',$m);
        $req->bindValue(':l',$l);
        $req->bindValue(':xl',$xl);
        $req->bindValue(':xxl',$xxl);
        try{
            $req->execute();

        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }




    }

    function modifierstock($id,$qte){
        $sql="UPDATE produit SET STOCK=STOCK+:stock where ID= :id";

        $db = config::getConnexion();

        $req=$db->prepare($sql);

        $req->bindValue(':id',$id);
        $req->bindValue(':stock',$qte);
        try{
            $req->execute();

        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }




    }

    function afficher($var){

        $query = "SELECT * FROM produit LIMIT $var,6";

        $db = config::getConnexion();
        try{

            return ( $db->query($query));
        }
        catch (Exception $err){
            echo 'Erreur: '.$err->getMessage();

        }

    }
    function top5(){

        $query = "SELECT * FROM produit ORDER BY note DESC LIMIT 5";

        $db = config::getConnexion();
        try{

            return ( $db->query($query));
        }
        catch (Exception $err){
            echo 'Erreur: '.$err->getMessage();

        }

    }
    function count(){
        $sql="SELECT * FROM  produit";
        $db = config::getConnexion();
        try{
            $S=$db->query($sql);
            return $S->rowCount();
        }
        catch (Exception $err){
            die('Erreur: '.$err->getMessage());
        }
    }
    function note($note,$idc,$produit){

        $query =  "insert into  note (note,id_client,id_prod) values ($note,'$idc',$produit)";

        $db = config::getConnexion();
        try{

            return ( $db->query($query));
        }
        catch (Exception $err){
            echo 'Erreur: '.$err->getMessage();

        }

    }
    function updatenote($note,$idc,$produit){

        $query =  "UPDATE note set NOTE=$note where (id_client='$idc' && id_prod=$produit)";

        $db = config::getConnexion();
        try{

            return ( $db->query($query));
        }
        catch (Exception $err){
            echo 'Erreur: '.$err->getMessage();

        }

    }
    function AVG($produit){

        $query =  " UPDATE produit SET note=(select AVG (note) from  note where (id_prod='$produit')) where  ID=$produit";

        $db = config::getConnexion();
        try{

            return ( $db->query($query));
        }
        catch (Exception $err){
            echo 'Erreur: '.$err->getMessage();

        }

    }

    function countbycategorie($categorie){
        $sql="SELECT * FROM  produit where categorie ='". $categorie. "'";
        $db = config::getConnexion();
        try{
            $S=$db->query($sql);
            return $S->rowCount();
        }
        catch (Exception $err){
            die('Erreur: '.$err->getMessage());
        }
    }


    function supprimer($id){
        $var=$id;
        $sql = "DELETE FROM produit WHERE 	ID ='". $var. "'";
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