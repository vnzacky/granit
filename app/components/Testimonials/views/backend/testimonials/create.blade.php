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
                    @if (!isset($testimonial))
                    <span class="hidden-480">Create New Testimonial</span>
                    @else
                    <span class="hidden-480">Edit Testimonial</span>
                    @endif
                </h4>
            </div>
            <div class="widget-body form">
                <div class="tabbable widget-tabs">
                    <div class="tab-content">
                        <div class="tab-pane active" id="widget_tab1">
                            <!-- BEGIN FORM-->
                            @if (!isset($testimonial))
                            {{ Form::open(array('route'=>$link_type . '.testimonials.store', 'method'=>'post', 'class'=>'form-horizontal', 'files'=>true)) }}
                            @else
                            {{ Form::open(array('route' => array($link_type . '.testimonials.update', $testimonial->id), 'method'=>'PUT', 'class'=>'form-horizontal', 'files'=>true)) }}
                            @endif

                            @if ($errors->has())
                            <div class="alert alert-error hide" style="display: block;">
                                <button data-dismiss="alert" class="close">×</button>
                                You have some form errors. Please check below.
                            </div>
                            @endif
                            @if (isset($testimonial))
                            {{ Form::hidden('id', $testimonial->id) }}
                            @endif

                            <div class="control-group {{{ $errors->has('name') ? 'error' : '' }}}">
                                <label class="control-label">Username<span class="red">*</span></label>
                                <div class="controls">
                                    {{ Form::text('name', (!isset($testimonial)) ? Input::old('name') : $testimonial->name, array('class' => 'input-xlarge'))}}
                                    {{ $errors->first('name', '<span class="help-inline">:message</span>') }}
                                </div>
                            </div>

                            <div class="control-group {{{ $errors->has('title') ? 'error' : '' }}}">
                                <label class="control-label">Title<span class="red">*</span></label>
                                <div class="controls">
                                    {{ Form::text('title', (!isset($testimonial)) ? Input::old('title') : $testimonial->title, array('class' => 'input-xlarge'))}}
                                    {{ $errors->first('title', '<span class="help-inline">:message</span>') }}
                                </div>
                            </div>

                            <div class="control-group {{{ $errors->has('description') ? 'error' : '' }}}">
                                <label class="control-label">Description <span class="red">*</span></label>
                                <div class="controls line">
                                    <textarea class="span12 ckeditor m-wrap" id="content" name="description" rows="6">{{ (!isset($testimonial)) ? Input::old('description') : $testimonial->description }}</textarea>
                                    {{ $errors->first('description', '<span class="help-inline">:message</span>') }}
                                </div>
                            </div>
                            
                            <div class="control-group {{{ $errors->has('rate') ? 'error' : '' }}}">
                                <label class="control-label">Title<span class="red">*</span></label>
                                <div class="controls">
                                    {{ Form::select('rate', $list_rate, (!isset($testimonial)) ? Input::old('rate') : $testimonial->rate, array('class' => 'input-xlarge'))}}
                                    {{ $errors->first('rate', '<span class="help-inline">:message</span>') }}
                                </div>
                            </div>
                            
                            <div class="control-group">
                                <label class="control-label">Order</label>            
                                <div class="controls line">
                                    {{Form::text('ordering', (!isset($testimonial)) ? Input::old('alias') : $testimonial->ordering, array('class' => 'input-xlarge', 'placeholder' => '0'))}}
                                </div>
                            </div>

                            <div class="form-actions">
                                <button type="submit" class="btn btn-primary" name="form_save">Save</button>

                                <button type="submit" class="btn btn-success" name="form_save_new">Save &amp; New</button>

                                <button type="submit" class="btn btn-primary btn-danger" name="form_close">Close</button>
                            </div>
                            {{ Form::close() }}
                            <!-- END FORM-->
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
