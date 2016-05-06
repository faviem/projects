function calcul()
{
    //CALCUL DES DEMANDES
   var queryAll = document.querySelectorAll('.nd');
   var nbre=queryAll.length;
   var k=0;
   for(var i=0; i<nbre; i++)
   {
        k +=Number(queryAll[i].value);
   }
   document.getElementById("tnd").value=k;
   //CALCUL POUR LES CHANTIERS VISITES
   var tcv = document.querySelectorAll('.tcv');
   var nc = document.querySelectorAll('.nc');
   var cc = document.querySelectorAll('.cc');
   var pf = document.querySelectorAll('.pf');
   var nbre1=tcv.length;
   var k1=0;
   var k2=0;
   var k3=0;
   var k4=0;
   for(var j=0; j<nbre1; j++)
   {
        tcv[j].value=Number(nc[j].value)+Number(cc[j].value)+Number(pf[j].value);
        k1 +=Number(tcv[j].value);
        k2 +=Number(nc[j].value);
        k3 +=Number(cc[j].value);
        k4 +=Number(pf[j].value);
   }
   document.getElementById("ttcv").value=k1;
   document.getElementById("tnc").value=k2;
   document.getElementById("tcc").value=k3;
   document.getElementById("tpf").value=k4;
   
   //CALCUL POUR LES CHANTIERS NON VISITES
   var tnv = document.querySelectorAll('.tnv');
   var nr = document.querySelectorAll('.nr');
   var np = document.querySelectorAll('.np');
   var ac = document.querySelectorAll('.ac');
    nbre1=tnv.length;
    var k5=0;
    var k6=0;
    var k7=0;
    var k8=0;
   for(var p=0; p<nbre1; p++)
   {
        tnv[p].value=Number(nr[p].value)+Number(np[p].value);
        k5 +=Number(tnv[p].value);
        k6 +=Number(nr[p].value);
        k7 +=Number(np[p].value);
        k8 +=Number(ac[p].value);
   }
   document.getElementById("ttnv").value=k5;
   document.getElementById("tnr").value=k6;
   document.getElementById("tnp").value=k7;
   document.getElementById("tac").value=k8;
   
   
   // Nuances
   var nu=document.querySelectorAll('.nuance');
   tnv = document.querySelectorAll('.tnv');
   tcv= document.querySelectorAll('.tcv');
   var nd= document.querySelectorAll('.nd');
   var n1=0;
   var n2=0;
   nbre1=nu.length;
   for(var q=0; q<nbre1; q++)
   {
       n1=Number(tnv[q].value)+Number(tcv[q].value);
       n2=Number(nd[q].value);
        if (n2==n1)
        {
            nu[q].innerHTML="Valide";
            nu[q].style.backgroundColor = 'green';
            nu[q].style.color = 'white';
        }
        else
        {
            nu[q].innerHTML="Erreur";
            nu[q].style.backgroundColor = 'red';
            nu[q].style.color = 'white';
        }
        //alert(Number(Number(tnv[q].value)+Number(tcv[q].value))+"-"+Number(nd[q].value));
   }
   
   // Les ratios
   document.getElementById("rg1").value=Math.round((k/k)*100)+"%";
   document.getElementById("rg2").value=Math.round((k1/k)*100)+"%";
   document.getElementById("rg3").value=Math.round((k2/k)*100)+"%";
   document.getElementById("rg4").value=Math.round((k3/k)*100)+"%";
   document.getElementById("rg5").value=Math.round((k4/k)*100)+"%";
   document.getElementById("rg6").value=Math.round((k5/k)*100)+"%";
   document.getElementById("rg7").value=Math.round((k6/k)*100)+"%";
   document.getElementById("rg8").value=Math.round((k7/k)*100)+"%";
   document.getElementById("rg9").value=Math.round((k8/k)*100)+"%";
}
