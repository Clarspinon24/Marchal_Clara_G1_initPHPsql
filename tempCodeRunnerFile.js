function acheter(nbProduit,argent,prixProduit){
    let nbProduitAchete=0;
    while(argent >= prixProduit && nbProduit > 0 ){
      argent - prixProduit
      nbProduit-1
      nbProduitAchete+1
    }
    console.log(argent,nbProduitAchete)

    if (nbProduit>0)
        console.log("le produit n'est pas en rupture de stock")
    else {
        console.log("le produit est en rupture de stock")
    }
}

acheter(20,200,2)