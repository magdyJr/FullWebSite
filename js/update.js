function valdate(){
   var name= document.getElementById('updated').name;
   if(name=="emailup"){
       var em = document.getElementById('updated').value;
       if(em==""){return false;}
       else {

           if (em.includes('.') && em.includes('@')) {
               var subst = em.split('@');
               if (!(subst[0] == "") || !(subst[1] == "")) {
                   var subst2 = subst[1].split('.');
                   for (var i = 0; i < subst2.length; i++) {
                       if (subst2[i] == "") {
                           return false;
                       }
                   }
                   return true;


               }
               else {

                   return false;
               }
           }
       }
   }
    if(name=="passup"){
       var pass=document.getElementById('updated').value;
        if(pass==""){return false;}
        else return true;
    }
    if(name=="ageup"){
        var age=document.getElementById('updated').value;
        if (age==""){return false;}
        else {
            if (isNaN(age) || age.includes('+') || age.includes('-')) {
                return false;
            }
            else return true;
        }
    }

}