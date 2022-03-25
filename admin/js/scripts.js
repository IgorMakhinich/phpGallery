/*!
 * Start Bootstrap - SB Admin v7.0.3 (https://startbootstrap.com/template/sb-admin)
 * Copyright 2013-2021 Start Bootstrap
 * Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-sb-admin/blob/master/LICENSE)
 */
// 
// Scripts
// 

window.addEventListener('DOMContentLoaded', event => {

   // Toggle the side navigation
   const sidebarToggle = document.body.querySelector('#sidebarToggle');
   if (sidebarToggle) {
      // Uncomment Below to persist sidebar toggle between refreshes
      // if (localStorage.getItem('sb|sidebar-toggle') === 'true') {
      //     document.body.classList.toggle('sb-sidenav-toggled');
      // }
      sidebarToggle.addEventListener('click', event => {
         event.preventDefault();
         document.body.classList.toggle('sb-sidenav-toggled');
         localStorage.setItem('sb|sidebar-toggle', document.body.classList.contains('sb-sidenav-toggled'));
      });
   }

   const modalThumbnails = document.getElementsByClassName('modal_thumbnails');
   if (modalThumbnails) {
      const setUserImage = document.getElementById('set_user_image');
      const userId = document.getElementById('user-id').href.split('=')[1];
      let imageFile, photoId;

      for (i = 0; i < modalThumbnails.length; i++) {
         modalThumbnails[i].addEventListener('click', event => {
            event.preventDefault();
            imageFile = event.target.getAttribute('src').split('/')[1];
            photoId = event.target.getAttribute('data');
            setUserImage.disabled = false;

            $.ajax({
               url: "includes/ajax_code.php",
               data: {
                  photo_id: photoId,
               },
               type: "POST",
               success: function(data) {
                  if(!data.error) {
                     $("#modal_sidebar").html(data);
                  }
               }
            });
         });
      }

      setUserImage.addEventListener('click', event => {
         $.ajax({
            url: "includes/ajax_code.php",
            data: {
               image_name: imageFile,
               user_id: userId
            },
            type: "POST",
            success: function (data) {
               if (!data.error) {
                  $(".user_image_box a img").prop('src', data);
               }
            }
         });
      });
   }
});