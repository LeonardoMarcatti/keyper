const url = window.location.href;
if (url.includes('updatePassword')) {
   const form = document.querySelector('#updatePassword');

   form.addEventListener('keyup', e => {
      let pass1 = document.querySelector('#pass1').value;
      let pass2 = document.querySelector('#pass2').value;

      if (pass1 === pass2) {
         document.querySelector('#btn_submit').removeAttribute('disabled')
         document.querySelector('#btn_submit').classList.remove('btn-secondary')
         document.querySelector('#btn_submit').classList.add('btn-danger')
      } else {
         document.querySelector('#btn_submit').setAttribute('disabled', '')
         document.querySelector('#btn_submit').classList.add('btn-secondary')
         document.querySelector('#btn_submit').classList.remove('btn-danger')
      }
   })
   
   const reset = document.querySelector('#btn_reset');
      reset.addEventListener('click', () => {
         document.querySelector('#btn_submit').setAttribute('disabled', '')
         document.querySelector('#btn_submit').classList.add('btn-secondary')
         document.querySelector('#btn_submit').classList.remove('btn-danger')
   })

}

$(document).ready(function () {
   if (document.querySelector('#flash').innerHTML !== '') {
      setTimeout(() => {
         $('#flash').hide(500);
      }, 2000);
   }

   if (document.querySelector('#flashbad').innerHTML !== '') {
      setTimeout(() => {
         $('#flashbad').hide(500);
      }, 2000);
   } 
});