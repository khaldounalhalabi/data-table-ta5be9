<footer id="footer" class="footer">
    <div class="copyright">
        &copy; Copyright <strong><span>ADMIN</span></strong>. All Rights Reserved
    </div>
</footer>
<script>
    var _CSRF_TOKEN = "{{csrf_token()}}";
</script>
<script src="https://code.jquery.com/jquery-3.6.4.js"
        integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E="
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/baguettebox.js@1.11.1/dist/baguetteBox.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Trumbowyg/2.27.3/trumbowyg.min.js"
        integrity="sha512-YJgZG+6o3xSc0k5wv774GS+W1gx0vuSI/kr0E0UylL/Qg/noNspPtYwHPN9q6n59CTR/uhgXfjDXLTRI+uIryg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Trumbowyg/2.27.3/langs/ar.min.js"
        integrity="sha512-TLcp0JL5fVBMFE38fMA1QpKriHzCK+H1PNR3db2WmtRwOMbHqWPB2NWqZsHc+IkpYljujpSzSzAqUlVK+kTgjA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="{{ asset('js/main.js') }}"></script>
<script src="{{asset('js/PluginsInitializer.js')}}"></script>
<script src="{{asset('js/CustomFunctions.js')}}"></script>

<!-- data tables -->
<script src="https://cdn.datatables.net/v/bs5/dt-1.13.4/b-2.3.6/datatables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.8/sweetalert2.min.js"
        integrity="sha512-ySDkgzoUz5V9hQAlAg0uMRJXZPfZjE8QiW0fFMW7Jm15pBfNn3kbGsOis5lPxswtpxyY3wF5hFKHi+R/XitalA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<script type="module">
    $(document).ready(function () {
        markRequiredFields();

    });
    disableSubmitUntilFillRequiredFields();
</script>
</body>
</html>
