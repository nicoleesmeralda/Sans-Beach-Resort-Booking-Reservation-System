$(function() {
  $(document).on('click', '#delete', function(e) {
      e.preventDefault();
      var link = $(this).attr("href");

      Swal.fire({
          title: 'Delete',
          text: "Are you sure you want to delete this? This action cannot be undone.",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
          if (result.isConfirmed) {
              window.location.href = link;
              Swal.fire({
                  title: 'Deleted!',
                  text: 'Your file has been deleted.',
                  icon: 'success',
                  showConfirmButton: false // Hide the OK button
              });
          }
      });
  });
});