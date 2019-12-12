<?php


require '../../config.php';
require '../../entitites/carte_fidelite.php';

class Carte_fideliteM
{

    public function ajoutCarteFidelite(Carte_fidelite $carte_fidelite)
    {
        $db = config::getConnexion();
        $req = "INSERT INTO carte_fidelite (id_client) VALUES (:id_client)";

        $sql = $db->prepare($req);
        $sql->bindvalue(":id_client", $carte_fidelite->get_id_client());



        try{
            $sql->execute();
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }

    }



    public function getCartes()
    {
        $db=config::getConnexion();
        $req="SELECT * FROM carte_fidelite;";
        $sql=$db->query($req);
        return $sql;
    }




    function supprimerCarte($id_fidelite)
    {
        $sql="DELETE FROM carte_fidelite where id_fidelite= :id_fidelite";
        $db = config::getConnexion();
        $req=$db->prepare($sql);
        $req->bindValue(':id_fidelite',$id_fidelite);
        try{
            $req->execute();
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }



    function modifierPromotion($promotion,$code)
    {
        $sql="UPDATE promotion SET codePromo=:codee, pourcentage=:pourcentage WHERE codePromo='$code'";

        $db = config::getConnexion();
        //$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);

        $req=$db->prepare($sql);
        $codee=$promotion->get_code();
        $pourcentage=$promotion->get_pourcentage();


        $datas = array(':codee'=>$codee, ':code'=>$code, ':pourcentage'=>$pourcentage);
        $req->bindValue(':codee',$codee);
        //$req->bindValue(':code',$code);
        $req->bindValue(':pourcentage',$pourcentage);




        if($req->execute())
        {
            echo "<meta http-equiv=\"refresh\";URL=ListeDesPromotions.php\">";

        }

        else
        {
            echo "<meta http-equiv=\"refresh\";URL=ListeDesPromotions.php\">";
        }

    }



    function recupererPromotion($code)
    {
        $db=config::getConnexion();
        $req="SELECT * FROM promotion WHERE codePromo= '$code'";
        $sql=$db->query($req);

        return $sql;
        //return $sql;
    }


}


?>