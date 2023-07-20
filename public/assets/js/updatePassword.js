const urlSetupPass = window.location.href;
if (urlSetupPass.includes('setup')) {
   const form = document.querySelector('#updatePassword');

   form.addEventListener('keyup', e => {
      let pass1 = document.querySelector('#pass1').value;
      let pass2 = document.querySelector('#pass2').value;

      if (pass1 === pass2 && pass1 != '' && pass2 != '') {
         document.querySelector('#btn_submitPass').removeAttribute('disabled')
         document.querySelector('#btn_submitPass').classList.remove('btn-secondary')
         document.querySelector('#btn_submitPass').classList.add('btn-danger')
      } else {
         document.querySelector('#btn_submitPass').setAttribute('disabled', '')
         document.querySelector('#btn_submitPass').classList.add('btn-secondary')
         document.querySelector('#btn_submitPass').classList.remove('btn-danger')
      }
   })
   
   const reset = document.querySelector('#btn_resetPass');
      reset.addEventListener('click', () => {
         document.querySelector('#btn_submitPass').setAttribute('disabled', '')
         document.querySelector('#btn_submitPass').classList.add('btn-secondary')
         document.querySelector('#btn_submitPass').classList.remove('btn-danger')
   })
}