function calcul()
{
   
   //CALCUL POUR LES POINT FINANCE SBEE
   var msbee = document.querySelectorAll('.msbee');
   var nbre1=msbee.length;
   var k1=0;
   for(var j=0; j<nbre1; j++)
   {
        k1 +=Number(msbee[j].value);
   }
   document.getElementById("tnd").value=k1;
}
