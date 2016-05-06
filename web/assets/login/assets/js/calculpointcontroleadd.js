function calcul()
{
    //CALCUL DES DEMANDES
   var queryAll = document.querySelectorAll('.nd');
   var nbre=queryAll.length;
   var k=0;
   for(var i=0; i<nbre; i++)
   {
        k +=Number(queryAll[i].innerHTML);
   }
   document.getElementById("tnd").innerHTML=k;
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
        tcv[j].innerHTML=Number(nc[j].innerHTML)+Number(cc[j].innerHTML)+Number(pf[j].innerHTML);
        k1 +=Number(tcv[j].innerHTML);
        k2 +=Number(nc[j].innerHTML);
        k3 +=Number(cc[j].innerHTML);
        k4 +=Number(pf[j].innerHTML);
   }
   document.getElementById("ttcv").innerHTML=k1;
   document.getElementById("tnc").innerHTML=k2;
   document.getElementById("tcc").innerHTML=k3;
   document.getElementById("tpf").innerHTML=k4;
   
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
        tnv[p].innerHTML=Number(nr[p].innerHTML)+Number(np[p].innerHTML);
        k5 +=Number(tnv[p].innerHTML);
        k6 +=Number(nr[p].innerHTML);
        k7 +=Number(np[p].innerHTML);
        k8 +=Number(ac[p].innerHTML);
   }
   document.getElementById("ttnv").innerHTML=k5;
   document.getElementById("tnr").innerHTML=k6;
   document.getElementById("tnp").innerHTML=k7;
   document.getElementById("tac").innerHTML=k8;
   
   
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
       n1=Number(tnv[q].innerHTML)+Number(tcv[q].innerHTML);
       n2=Number(nd[q].innerHTML);
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
        //alert(Number(Number(tnv[q].innerHTML)+Number(tcv[q].innerHTML))+"-"+Number(nd[q].innerHTML));
   }
   
   
   // Les ratios
   document.getElementById("rg1").innerHTML=Math.round((k/k)*100)+"%";
   document.getElementById("rg2").innerHTML=Math.round((k1/k)*100)+"%";
   document.getElementById("rg3").innerHTML=Math.round((k2/k)*100)+"%";
   document.getElementById("rg4").innerHTML=Math.round((k3/k)*100)+"%";
   document.getElementById("rg5").innerHTML=Math.round((k4/k)*100)+"%";
   document.getElementById("rg6").innerHTML=Math.round((k5/k)*100)+"%";
   document.getElementById("rg7").innerHTML=Math.round((k6/k)*100)+"%";
   document.getElementById("rg8").innerHTML=Math.round((k7/k)*100)+"%";
   document.getElementById("rg9").innerHTML=Math.round((k8/k)*100)+"%";
}
