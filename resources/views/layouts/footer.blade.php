<footer class="footer bg-light pt-5">
    <div class="container">
        <div class="row">

            <div class="col-lg-4 col-md-6 mb-4">
                <h5 class="text-uppercase">RSPPN</h5>
                <p>RSPPN adalah rumah sakit pelayanan publik nasional yang berkomitmen memberikan layanan terbaik kepada
                    masyarakat.</p>
                <p><strong>Alamat:</strong> A108 Adam Street, New York, NY 535022</p>
                <p><strong>Telepon:</strong> +1 5589 55488 55</p>
                <p><strong>Email:</strong> info@example.com</p>
            </div>

            <!-- Link Navigasi -->
            <div class="col-lg-5 col-md-6 mb-4">
                <div class="row">
                    <div class="col-6 col-md-6">

                    </div>
                    <div class="col-6 col-md-6">

                    </div>
                </div>
            </div>
        </div>

        <hr>

        <!-- Footer Bawah -->
        <div class="row align-items-center">
            <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                &copy; {{ date('Y') }} <strong>RSPPN</strong>. All rights reserved.
            </div>
            <div class="col-md-6 text-center text-md-end">
                Designed by <a href="https://bootstrapmade.com/" target="_blank">BootstrapMade</a>, customized by RSPPN.
            </div>
        </div>
    </div>
</footer>

</div>

<script src="https://cdn.jsdelivr.net/npm/jquery-toast-plugin@1.3.2/dist/jquery.toast.min.js"></script>

@if (session('success'))
    <script>
        $.toast({
            heading: 'Success',
            text: '{{ session('success') }}',
            showHideTransition: 'slide',
            position: 'top-right',
            icon: 'success',
            stack: false
        });
    </script>
@endif

@if (session('error'))
    <script>
        $.toast({
            heading: 'Error',
            text: '{{ session('error') }}',
            showHideTransition: 'slide',
            position: 'top-right',
            icon: 'error',
            stack: false
        });
    </script>
@endif

@if (session('errors'))
    <script>
        $.toast({
            heading: 'Errors',
            text: '{{ session('errors')->first() }}',
            showHideTransition: 'slide',
            position: 'top-right',
            icon: 'error',
            stack: false
        });
    </script>
@endif


@stack('js')

</body>

</html>
