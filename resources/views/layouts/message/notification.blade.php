<!-- Toast.css -->
<link rel="stylesheet" type="text/css" href="{{ asset('plugin/cms/assets/css/jquery.toast.css') }}">
<!-- toast js -->
<script src="{{ asset('plugin/cms/assets/js/jquery.toast.js') }}"></script>

<script>
@if(Session::has('message'))
    var type = "{{ Session::get('type', 'info') }}";
    var message = '{{ Session::get("message") }}';
    var info = '{{ UtilHelper::NOTIFICATION_INFO }}';
    var warning = '{{ UtilHelper::NOTIFICATION_WARNING }}';
    var success = '{{ UtilHelper::NOTIFICATION_SUCCESS }}';
    var error = '{{ UtilHelper::NOTIFICATION_ERROR }}';
    switch(type){
        case info:
            showToast(
                info,
                message,
                info
            );
            break;

        case warning:
            showToast(
                warning,
                message,
                warning
            );
            break;

        case success:
            showToast(
                success,
                message,
                success
            );
            break;

        case error:
            showToast(
                error,
                message,
                error
            );
            break;
    }
@endif

function showToast(heading, text, icon, position='top-right', loader=true) {
    $.toast({
        position: 'top-right',
        heading: heading.toUpperCase(),
        text: text,
        icon: icon,
        loader: loader,
    })
}
</script>
