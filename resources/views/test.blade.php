@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Test</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST">
                        {{ csrf_field() }}
                        <p>{{ $ts->setTimezone('UTC')->format($dateFormat) }}</p>
                        <p>{{ $ts->setTimezone('Europe/London')->format($dateFormat) }}</p>
                        <p>{{ $ts->setTimezone('Asia/Shanghai')->format($dateFormat) }}</p>
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="ts" class="col-md-4 control-label">Timestamp</label>

                            <div class="col-md-6">
                                <input id="ts" type="text" class="form-control" name="ts" value="{{ old('ts') }}" required autofocus>

                                @if ($errors->has('ts'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('ts') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Save
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
