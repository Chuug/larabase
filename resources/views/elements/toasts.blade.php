@if($message = Session::get('success'))
    <div class="toast-container">
        <div class="toast bg-success text-white font-weight-bold" role="alert" aria-live="assertive" aria-atomic="true" data-delay="2500">
            <div class="toast-body">
                {{ $message }}
                <!--
                <button type="button" class="btn-close" data-dismiss="toast" aria-label="Close"></button>
                -->
            </div>
        </div>
    </div>
@endif
@if($message = Session::get('error'))
    <div class="toast-container">
        <div class="toast bg-danger text-white font-weight-bold" role="alert" aria-live="assertive" aria-atomic="true" data-delay="2500">
            <div class="toast-body">
                {{ $message }}
                <!--
                <button type="button" class="btn-close" data-dismiss="toast" aria-label="Close"></button>
                -->
            </div>
        </div>
    </div>
@endif


