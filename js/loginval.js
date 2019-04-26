function logval() {
    var user=document.loginform.username.value;
    var pass=document.loginform.pass.value;
    var subst=user.split('@');
    var subst2=subst[1];


    if(user==""||pass==""){
        document.getElementById('user').innerHTML="";
        document.getElementById('empty').style.color="red";
        document.getElementById('empty').innerHTML="you must write ur email and ur pass to login";
        return false;
    }
    else if(user.includes('.')||user.includes('@')){
        var subst=user.split('@');
        if(!(subst[0]=="")||!(subst[1]=="")){
            var subst2=subst[1].split('.');
            for (var i=0;i<subst2.length;i++){
                if(subst2[i]=="")
                {
                    document.getElementById('empty').innerHTML="";
                    document.getElementById('user').style.color="red";
                    document.getElementById('user').innerHTML="ur email must have @ and . like : info@example.com";
                    return false;
                }
            }

                document.getElementById('user').innerHTML="";
                document.getElementById('empty').innerHTML="";
                return true;


        }
        else{
        document.getElementById('empty').innerHTML="";
        document.getElementById('user').style.color="red";
        document.getElementById('user').innerHTML="ur email must have @ and . like : info@example.com";
        return false;
        }
    }
    else if(!user.includes('.')||!user.includes('@')){
        document.getElementById('empty').innerHTML="";
        document.getElementById('user').style.color="red";
        document.getElementById('user').innerHTML="ur email must have @ and . like : info@example.com";
        return false;
    }

}