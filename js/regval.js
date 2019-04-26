function regval() {

    var fname=document.regform.fname.value;
    var lname=document.regform.lname.value;
    var age=document.regform.age.value;
    var em=document.regform.em.value;
    var pass=document.regform.pass.value;
    var gen=document.regform.gen.value;
    if(fname==""||lname==""||em==""||pass==""||age==""||gen==""){
        document.getElementById('empty').style.color="red";
        document.getElementById('empty').innerHTML="you must fill all theform to register";
        window.scrollTo(0,0);
        return false;
    }
    else{
        if (isNaN(age)||age.includes('+')||age.includes('-')){
            document.getElementById('empty').innerHTML="";
            document.getElementById('em').innerHTML="";
            document.getElementById('age').style.color="red";
            document.getElementById('age').innerHTML="ur age must be a postive number";
            return false;
        }
        if(em.includes('.')&&em.includes('@')){
            var subst=em.split('@');
            if(!(subst[0]=="")||!(subst[1]=="")){
                var subst2=subst[1].split('.');
                for (var i=0;i<subst2.length;i++){
                    if(subst2[i]=="")
                    {
                        document.getElementById('empty').innerHTML="";
                        document.getElementById('em').style.color="red";
                        document.getElementById('em').innerHTML="ur email must have @ and . like : info@example.com";
                        return false;
                    }
                }

                document.getElementById('em').innerHTML="";
                document.getElementById('empty').innerHTML="";
                return true;


            }
            else{
                document.getElementById('empty').innerHTML="";
                document.getElementById('em').style.color="red";
                document.getElementById('em').innerHTML="ur email must have @ and . like : info@example.com";
                return false;
            }
        }
        else if(!em.includes('.')||!em.includes('@')){
            document.getElementById('empty').innerHTML="";
            document.getElementById('em').style.color="red";
            document.getElementById('em').innerHTML="ur email must have @ and . like : info@example.com";
            return false;
        }

    }

}