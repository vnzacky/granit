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
                        @if (!isset($font))
                            <span class="hidden-480">Create Font</span>
                        @else
                            <span class="hidden-480">Edit Font</span>
                        @endif
                    </h4>
                </div>
                <div class="widget-body form">
                    <div class="tabbable widget-tabs">
                        <div class="tab-content">
                            <div class="tab-pane active" id="widget_tab1">
                                <!-- BEGIN FORM-->
                                @if (!isset($font))
                                {{ Form::open(array('route'=>$link_type . '.stones.fonts.store', 'method'=>'post', 'class'=>'form-horizontal', 'files'=>true)) }}
                                @else
                                {{ Form::open(array('route' => array($link_type . '.stones.fonts.update', $font->id), 'method'=>'PUT', 'class'=>'form-horizontal', 'files'=>true)) }}
                                @endif

                                    @if ($errors->has())
                                         <div class="alert alert-error hide" style="display: block;">
                                           <button data-dismiss="alert" class="close">×</button>
                                           You have some form errors. Please check below.
                                        </div>
                                    @endif

                                    @if (isset($font))
                                        {{ Form::hidden('id', $font->id) }}
                                    @endif
                                    
                                    <div class="control-group {{{ $errors->has('name') ? 'error' : '' }}}">
                                        <label class="control-label">Name <span class="red">*</span></label>
                                        <div class="controls">
                                            {{ Form::text('name', (!isset($font)) ? Input::old('name') : $font->name, array('class' => 'input-xlarge'))}}
                                            {{ $errors->first('name', '<span class="help-inline">:message</span>') }}
                                        </div>
                                    </div>
                        
                                    <div class="control-group {{{ $errors->has('url') ? 'error' : '' }}}">
                                        <label class="control-label">URL <span class="red">*</span></label>
                                        <div class="controls">
                                            {{ Form::text('url', (!isset($font)) ? Input::old('url') : $font->url, array('class' => 'input-xlarge', 'placeholder' => 'http://fonts.googleapis.com/css?family=Open+Sans'))}}
                                            {{ $errors->first('url', '<span class="help-inline">:message</span>') }}
                                        </div>
                                    </div>
 
                                    <div class="control-group {{{ $errors->has('status') ? 'error' : '' }}}">
                                        <label class="control-label">Status <span class="red">*</span></label>
                                        <div class="controls line">
                                            {{ Form::select('status', $status, (!isset($font)) ? Input::old('status') : $font->status, array('class'=>'chosen span6 m-wrap', 'style'=>'width:285px')) }}
                                            {{ $errors->first('status', '<span class="help-inline">:message</span>') }}
                                        </div>
                                    </div>
                                    

                                    <div class="control-group">
                                        <label class="control-label">Order</label>            
                                        <div class="controls line">
                                            {{Form::text('ordering', (!isset($font)) ? Input::old('ordering') : $font->ordering, array('class' => 'input-xlarge', 'placeholder' => '0'))}}
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
        jQuery(document).ready(function() {
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
