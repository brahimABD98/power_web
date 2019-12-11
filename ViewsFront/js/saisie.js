    function colorish(champ, erreur)
    {
    if(erreur)
      champ.style.backgroundColor = "#fba";
    else
      champ.style.backgroundColor = "";
    }


    function verifnom(champ)

    {
            var regex = /[a-zA-Z]/;
        if(!regex.test(champ.value) || champ.value.length < 4 || champ.value.length > 25)

        {

        colorish(champ, true);

        return false;

        }

        else

        {

         colorish(champ, false);

         return true;

        }
        
    }

    function verifprix(champ)
    {
        var regex = /[0-9.,]/;
        var prix = parseInt(champ.value);

   if(!regex.test(champ.value) || champ.value.length < 2 || champ.value.length > 5 || isNaN(prix))

      {

      colorish(champ, true);

      return false;

       }

   else

       {

      colorish(champ, false);

      return true;

       }

    }    

    function verifnum(champ)
    {

    var regex = /[0-9]/;
    var num = champ.value;
   if(!regex.test(champ.value) || champ.value.length < 3 || isNaN(num))

   {

      colorish(champ, true);

      return false;

   }

   else

   {

      colorish(champ, false);

      return true;

   }

    }
    
   function verifform()

{
        var nom = document.getElementById('nomprod');
       // var numero = document.getElementById('nprod');
        var qte = document.getElementById('QteProd');
        var desc = document.getElementById('DescProd');
        var prix = document.getElementById('PrixProd');
        //var categorie = document.getElementById('CatProd');

        var NomOk = verifnom(nom);

        var qteOk = verifprix(qte);

        var descOK = verifnom(desc);

        var PrixOk = verifprix(prix);

        //var NumOk = verifnum(numero);

        //var CatOK = verifnom(categorie);

        if(PrixOk && NomOk && qteOk && descOK)

      {
        alert("Table Mise a Jour !");
        return true;
      }

   else

     {

      alert("Veuillez remplir correctement tous les champs");

      return false;

   }


}

    function verifLog(champ)
    {
        if(champ.value.length < 4 || champ.value.length > 25)
        {
            colorish(champ, true);
            return false;
        }
        else
        {
            colorish(champ, false);
            return true;
        }
    }

    function verifMail(champ)
    {
        var regex = /^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/;
        if(!regex.test(champ.value))
        {
            colorish(champ, true);
            return false;
        }
        else
        {
            colorish(champ, false);
            return true;
        }
    }


    function verifformAdmin() {
        //var id = document.getElementById('idadmin');
        var log = document.getElementById('logadmin');
        //var mdp = document.getElementById('mdpadmin');
        var mail = document.getElementById('mail');

        //var idok = verifnum(id);

        var logok = verifLog(log);

        var mailOk = verifMail(mail);

        if (logok && mailOk) {
            alert("Table Mise a Jour !");
            return true;
        } else {

            alert("Veuillez remplir correctement tous les champs");

            return false;

        }
    }

