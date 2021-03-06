@extends('layout')
@section('content')
    <h2>{{$tableLabel}}  Value Labels</h2>
    @if ( ! $errors->isEmpty() )
    <div class="row">
        <div class="col-md-4 alert alert-danger">Please fix these errors before continuing on.</div>
        <div class="col-md-6 col-md-offset-2 alert alert-danger">
            <ul>
        @foreach ( $errors->all() as $error )
            <li>{{ $error }} </li>
        @endforeach
            </ul>
        </div>
    </div>
    @elseif ( Session::has( 'message' ) )
    <div class="row">
        <div class="col-md-6 col-md-offset-2 alert alert-danger">There are session messages</div>
        <div class="col-md-6 col-md-offset-2 alert alert-success">{{ Session::get( 'message' ) }}</div>
    </div>
    @else
        <p>&nbsp;</p>
    @endif	
    @if (count($crf) == 0 )
		<p>There are no records in that table</p>
    @endif
    <p>Think about primary key or adding auto_int "value label position"</p>
    <a href="{{URL::route('valueSchema', array('crf'=>$crf, 'prevLabelNum'=>$prevLabelNum))}}" class="btn btn-default">Previous Value Label Does Not Work</a>
    <a href="{{URL::route('valueSchema', array('crf'=>$crf, 'nextLabelNum'=>$nextLabelNum))}}" class="btn btn-default">Next Value Label Does Not Work.</a>
    
    <div class="row">
        <div class="col-md-12 well">
        
        {{ Form::open(array('url' => url('value_schema/crud'), 'class'=>'form-horizontal', 'id'=>'variable_schema')) }}
		    {{Form::button('Save', ['type' => 'submit', 'class' => 'btn btn-primary', 'name' => 'submit', 'value'=>'update'])}}
		    {{Form::button('Delete', ['type' => 'submit', 'class' => 'btn btn-primary', 'name' => 'submit', 'value'=>'delete'])}}
			{{Form::hidden('crf', $crf)}}
            @foreach ($varLine as $key=>$value )
                <div class="form-group">
                    <label for="{{$key}}" class="col-sm-2 control-label">{{$key}}</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="{{$key}}" name="{{$key}}" value="{{$value}}">
                    </div>
                    @if ($errors->has($key)) 
                    <div class="col-md-6 col-md-offset-3 alert alert-danger">{{$errors->first($key);}}</div>
                    @endif
                </div>
            @endforeach
        {{ Form::close() }}
        </div>
    </div>
@stop