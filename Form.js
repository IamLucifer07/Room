// function ok (){
//     alert("its working");
// }
function ok() {
     let first = document.getElementById('fname').value.trim();
     first = first.charAt(0).toUpperCase() + first.slice(1);
     document.getElementById('fname').value = first;

     let second = document.forms.registerform.lname.value.trim();
     second = second.charAt(0).toUpperCase() + second.slice(1);
     document.getElementById('lname').value = second;

     let regEx = /[A-Z][a-z]*$/;

     // VALIDATING FIRSTNAME
     if (first === '') {
          document.getElementById('err_fname').innerText =
               'Please do not leave Blank space';

          document.getElementById('err_fname').style.color = 'red';

          document.forms.registerform.fname.style.border = '1px solid Red';
     } else if (!regEx.test(first)) {
          document.getElementById('err_fname').innerText =
               'Please use alphabate only';
     } else {
          document.forms.registerform.fname.style.border = '1px solid Green';
          document.getElementById('err_fname').innerText = '';
     }

     if (second == '') {
          document.getElementById('err_lname').innerText =
               'Please do not leave Blank space';

          document.getElementById('err_lname').style.color = 'red';

          document.forms.registerform.lname.style.border = '1px solid Red';
     } else if (!regEx.test(second)) {
          document.getElementById('err_lname').innerText =
               'Please use alphabate only';
     } else {
          document.forms.registerform.lname.style.border = '1px solid Green';
          document.getElementById('err_lname').innerText = '';
     }

     //validating Email

     let third = document.forms.registerform.gmail.value.trim();

     let reg = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

     if (third == '') {
          document.querySelector('#err_gmail').innerText =
               'Please do not leave Blank Space';

          document.getElementById('err_gmail').style.color = 'red';

          document.forms.registerform.gmail.style.border = '1px solid Red';
     } else if (!reg.test(third)) {
          document.getElementById('err_gmail').innerText =
               'please use email format';
     } else {
          document.forms.registerform.gmail.style.border = '1px solid Green';
          document.getElementById('err_gmail').innerText = '';
     }

     //validating phone number

     let fourth = document.getElementById('phone').value;

     let regx = /98\d{8}/;

     if (fourth == '') {
          document.getElementById('err_phone').innerText =
               'Please do not leave Blank Space';

          document.getElementById('err_phone').style.color = 'red';

          document.forms.registerform.phone.style.border = '1px solid Red';
     } else if (!regx.test(fourth)) {
          document.getElementById('err_phone').innerText =
               'please enter valid number';
     } else {
          document.forms.registerform.phone.style.border = '1px solid Green';
          document.getElementById('err_phone').innerText = '';
     }

     //validating Address
     let fifth = document.getElementById('address').value;

     let regg = /\w{3,}\-?\,?\w{3,}/;

     if (fifth == '') {
          document.getElementById('err_add').innerText =
               'Please do not leave Blank Space';

          document.getElementById('err_add').style.color = 'red';

          document.forms.registerform.address.style.border = '1px solid Red';
     } else if (!regg.test(fifth)) {
          document.getElementById('err_phone').innerText =
               'Enter valid address';
     } else {
          document.forms.registerform.address.style.border = '1px solid Green';
          document.getElementById('err_add').innerText = '';
     }

     // Gender validation
     let gender = document.forms.registerform.list;

     if (
          gender[0].checked === false &&
          gender[1].checked === false &&
          gender[2].checked === false
     ) {
          document.getElementById('err_gender').innerText = 'Select the Gender';
     } else {
          document.getElementById('err_gender').innerText = '';
     }

     // country validation
     let nation = document.forms.registerform.country;

     if (nation.selectedIndex === 0) {
          document.getElementById('err_country').innerText =
               'Select the Country';
     } else {
          document.getElementById('err_country').innerText = '';
     }

     // valadating checkbox
     let box = document.getElementById('check');
     if (!box.checked) {
          return (document.getElementById('err_check').innerText =
               'Please checkmark it');
     } else {
          return (document.getElementById('err_check').innerText = '');
     }
}
