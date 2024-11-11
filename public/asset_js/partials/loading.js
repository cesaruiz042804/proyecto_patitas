function pageLoading(classForm){
   var loading = document.querySelector('#page-loading');
   var form = document.querySelector(classForm);

   form.style.display = 'none';
   loading.style.display = 'block';
}