@section('content')
    <div class="row-fluid">
        <div class="span12">
            <!-- BEGIN TABLE widget-->
            <div class="widget box light-grey">
                <div class="blue widget-title">
                    <h4><i class="icon-table"></i> {{ $category->title }}</h4>
                </div>
                <div class="widget-body">

                    <div class="form-horizontal">

                        @if ($category->image != '')
                            <div class="control-group">
                                <div class="controls line">{{ HTML::image($category->image, '', array('width'=> '400')) }}</div>
                            </div>
                        @endif

                        <div class="control-group">
                            <label class="control-label">Description</label>
                            <div class="controls line">
                                {{ $category->description }}
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label">Status</label>
                            <div class="controls line">
                                {{ Str::title($category->status) }}
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label">Icon parent</label>
                            <div class="controls line">
                                {{ Str::title($category->parent_category()) }}
                            </div>
                        </div>


                        <div class="control-group">
                            <label class="control-label">Created By</label>
                            <div class="controls line">
                                {{ $category->author() }}
                            </div>
                        </div>


                    </div>

                </div>
            </div>
            <!-- END TABLE widget-->
        </div>
    </div>
@stop
