<div class="modal fade modal-danger" id="modal-delete-confirmation" tabindex="-1" role="dialog" aria-labelledby="delete-confirmation-title" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="border-color:#ffffff!important;">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="delete-confirmation-title">{{ trans('core::core.modal.title') }}</h4>
            </div>
            <div class="modal-body" style="background: #f5f7fa!important;color:black!important;">
                <div class="default-message">
                    @isset($message)
                        {!! $message !!}
                    @else
                        {{ trans('core::core.modal.confirmation-message') }}
                    @endisset
                </div>
                <div class="custom-message"></div>
            </div>
            <div class="modal-footer" style="background: #f5f7fa!important;border-color: #f5f7fa!important;">
                <button type="button" style="background: #8d8787;" class="btn btn-outline btn-flat pull-right" data-dismiss="modal">{{ trans('core::core.button.cancel') }}</button>
                {!! Form::open(['method' => 'delete', 'class' => 'pull-right']) !!}
                <button type="submit" style="background:#dd4b39;" class="btn btn-outline btn-flat"><i class="fa fa-trash"></i> {{ trans('core::core.button.delete') }}</button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>

@push('js-stack')
<script>
    $( document ).ready(function() {
        $('#modal-delete-confirmation').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var actionTarget = button.data('action-target');
            var modal = $(this);
            modal.find('form').attr('action', actionTarget);

            if (button.data('message') === undefined) {
            } else if (button.data('message') != '') {
                modal.find('.custom-message').show().empty().append(button.data('message'));
                modal.find('.default-message').hide();
            } else {
                modal.find('.default-message').show();
                modal.find('.custom-message').hide();
            }

            if (button.data('remove-submit-button') === true) {
                modal.find('button[type=submit]').hide();
            } else {
                modal.find('button[type=submit]').show();
            }
        });
    });
</script>
@endpush
