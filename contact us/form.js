// function ok (){
//     alert("its working");
// }
function ok () 
{
    
    let first = document.getElementById('fname').value.trim();
    first = first.charAt(0).toUpperCase() + first.slice(1);
    document.getElementById('fname').value= first;
    let regEx = /[A-Z][a-z]*$/;
    // VALIDATING FIRSTNAME
    if(first === '')
    {
        // document.getElementById('err_fname').innerText="Please do not leave Blank space";
        
        document.getElementById('err_fname').style.color="red";

        document.forms.registerform.fname.style.border = "2px solid Red";
        
    }
    else if(!regEx.test(first))
    {
        document.getElementById('err_fname').innerText = 'Please use alphabate only';
    }
    else
    {
        document.forms.registerform.fname.style.border="1px solid Green";
        document.getElementById('err_fname').innerText ="";
    }

    let fourth = document.getElementById('phone').value;

    let regx =/98\d{8}/;

    if(fourth == '')
    {
        // document.getElementById('err_phone').innerText="Please do not leave Blank Space";

        document.getElementById('err_phone').style.color="red";

        document.forms.registerform.phone.style.border="2px solid Red";
    }
    else if(!regx.test(fourth))
    {
        
        document.forms.registerform.phone.style.border="2px solid Red";
    }
    else

    {
        document.forms.registerform.phone.style.border="1px solid Green";
        document.getElementById('err_phone').innerText =""; 
    }
 // VALIDATING EMAIL
    let third = document.forms.registerform.email.value.trim();
    
    let reg = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    if(third == '')
    {
        // document.querySelector('#err_email').innerText ="Please do not leave Blank Space";
        
        // document.getElementById('err_email').style.color="red";

        document.forms.registerform.email.style.border = "2px solid Red";
    }
    else if(!reg.test(third))
    {
        document.getElementById('err_email').innerText = 'please use email format';
    }
    else
    {
    document.forms.registerform.email.style.border="1px solid Green";
        document.getElementById('err_email').innerText ="";
    }
    
    
}