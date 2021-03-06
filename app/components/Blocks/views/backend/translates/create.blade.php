@section('styles')
{{ HTML::style('assets/backend/default/plugins/bootstrap/css/bootstrap-modal.css') }}
{{ HTML::style('assets/backend/default/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css') }}
{{ HTML::style('assets/backend/default/plugins/jquery-ui/jquery-ui.css') }}
@stop

@section('content')
<div class="row-fluid">
    <div class="span12">
        <!-- BEGIN FORM widget-->
        <div class="widget box blue tabbable">
            <div class="blue widget-title">
                <h4>
                    <i class="icon-user"></i>
                    @if (!isset($block))
                    <span class="hidden-480">Create New Block</span>
                    @else
                    <span class="hidden-480">Edit Block</span>
                    @endif
                </h4>
            </div>
            <div class="widget-body form">
                <div class="tabbable widget-tabs">
                    <div class="tab-content">
                        <div class="tab-pane active" id="widget_tab1">
                            <!-- BEGIN FORM-->
                            @if (!isset($block))
                            {{ Form::open(array('route'=> [$link_type . '.block.translate.store', $block_id], 'method'=>'post', 'class'=>'form-horizontal', 'files'=>true)) }}
                            @else
                            {{ Form::open(array('route' => array($link_type . '.block.translate.update', $block_id, $block->id ), 'method'=>'PUT', 'class'=>'form-horizontal', 'files'=>true)) }}
                            @endif

                            @if ($errors->has())
                            <div class="alert alert-error hide" style="display: block;">
                                <button data-dismiss="alert" class="close">×</button>
                                You have some form errors. Please check below.
                            </div>
                            @endif
                            @if (isset($block))
                            {{ Form::hidden('id', $block->id) }}
                            @endif

                            <div class="control-group {{{ $errors->has('title') ? 'error' : '' }}}">
                                <label class="control-label">Block Title</label>
                                <div class="controls">
                                    {{ Form::text('title', (!isset($block)) ? Input::old('title') : $block->title, array('class' => 'input-xlarge'))}}
                                    {{ $errors->first('title', '<span class="help-inline">:message</span>') }}
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="controls line">
                                    <a class="btn btn-primary insert-media" id="insert-media" href="#"> Insert Media</a>
                                </div>
                            </div>
                            <div class="control-group {{{ $errors->has('description') ? 'error' : '' }}}">
                                <label class="control-label">Block Description <span class="red">*</span></label>
                                <div class="controls line">
                                    <textarea class="span12 ckeditor m-wrap" id="content" name="description" rows="6">{{ (!isset($block)) ? Input::old('description') : $block->description }}</textarea>
                                    {{ $errors->first('description', '<span class="help-inline">:message</span>') }}
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Language</label>
                                <div class="controls line">
                                    @if( isset($block) )
                                    <input type="text" disabled="disabled" value="{{ isset($block) ? $block->language : current_language() }}" />
                                    @else
                                        {{ Form::select('language', $languages, Input::old('language'), array('class'=>'chosen span6 m-wrap')) }}
                                        <span class="help-inline">{{ $errors->first() }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-actions">
                                <button type="submit" class="btn btn-primary" name="form_save">Save</button>
                                <button type="submit" class="btn btn-primary btn-danger" name="form_close">Close</button>
                            </div>
                            {{ Form::close() }}
                            <!-- END FORM-->
                            <br /><br /><br />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END FORM widget-->
    </div>
</div>
@stop

@section('scripts')
{{ HTML::script('assets/backend/default/plugins/bootstrap/js/bootstrap-modalmanager.js') }}
{{ HTML::script('assets/backend/default/plugins/bootstrap/js/bootstrap-modal.js') }}
{{ HTML::script("assets/backend/default/plugins/ckeditor/ckeditor.js") }}
{{ HTML::script("assets/backend/default/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js") }}
{{ HTML::script("assets/backend/default/scripts/media-selection.js") }}
@parent
<script>
    jQuery(document).ready(function () {
        $('#datetimepicker_start').datetimepicker({
            language: 'en',
            pick12HourFormat: false
        });
        $('#datetimepicker_end').datetimepicker({
            language: 'en',
            pick12HourFormat: false
        });
    });

    MediaSelection.init('image');
</script>
@stop
