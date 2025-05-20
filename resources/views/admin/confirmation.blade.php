 <!-- Include SweetAlert CSS and JS (CDN) -->
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.min.css">
 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.min.js"></script>

 <script type="text/javascript">
     function deleteConfirmation(itemId) {
         Swal.fire({
             title: 'Jeste sigurni?',
             text: "Izbrisani dio se ne može vratiti!",
             icon: 'warning',
             dangerMode: true,
             showCancelButton: true,
             confirmButtonColor: '#dc3545',
             iconColor: '#dc3545',
             cancelButtonText: 'Otkaži',
             // cancelButtonColor: '#d33',
             // confirmButtonText: 'Yes, delete it!'
         }).then((result) => {
             if (result.isConfirmed) {
                 // Submit the form programmatically
                 document.getElementById('deleteForm' + itemId).submit();
             }
         });
     }
 </script>
