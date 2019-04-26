function feeval() {

    var fname=document.feedbackform.fnam.value;
    var lname=document.feedbackform.lnam.value;
    var comm=document.feedbackform.fee.value;
    if((!(fname=="")||!(lname==""))&&!(comm=="")){
        document.getElementById('hide').style.display='none';
        return true;
    }
    else{
        document.getElementById('wronggraph').style.color='red';
        document.getElementById('wronggraph').innerHTML="you must write ur feedback and ur first name or last name";
        return false;

    }
}