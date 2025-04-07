 
      </div>
    </div>
  </div>
  <script src="../src/assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="../src/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../src/assets/js/sidebarmenu.js"></script>
  <script src="../src/assets/js/app.min.js"></script>
  <script src="../src/assets/libs/simplebar/dist/simplebar.js"></script>
  <script src="../src/assets/js/dashboard.js"></script>
  <script>
   new DataTable('#example', {
    layout: {
        topStart: {
            buttons: ['copy', 'excel', 'pdf', 'colvis']
        }
    }
    });
  </script>
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
   @if (session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Success',
            text: '{{ session('success') }}',
        });
    </script>
@endif

@if (session('error'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: '{{ session('error') }}',
        });
    </script>
@endif

@if(session('import_message'))
    <script>
        Swal.fire({
            icon: 'info',
            title: 'Proses Import Selesai!',
            html: `<pre>{{ session('import_message') }}</pre>`,
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'OK',
            width: '600px'
        });
    </script>
@endif

@if(session('import_error'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Import Gagal!',
            text: "{{ session('import_error') }}",
            confirmButtonColor: '#d33',
            confirmButtonText: 'Coba Lagi'
        });
    </script>
@endif

</body>

</html>