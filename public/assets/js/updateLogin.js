const urlSetupLogin = window.location.href;
if (urlSetupLogin.includes('setup')) {
   const form = document.querySelector('#updateLogin');

   form.addEventListener('keyup', e => {
      let login1 = document.querySelector('#name').value;
      let login2 = document.querySelector('#name2').value;

      if (login1 === login2 && login1 != '' && login2 != '') {
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