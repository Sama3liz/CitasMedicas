@extends('layouts.panel')

@section('content')
<div class="main-container">
    <div class="pd-ltr-20">
        <!-- Responsive tables Start -->
        <div class="pd-20 card-box mb-30">
            <div class="clearfix mb-20">
                <div class="pull-left">
                    <h4 class="text-blue h4">{{__('Specialties')}}</h4>
                    <br>
                </div>
                <div class="pull-right">
                    <a href="{{ route('specialties.create') }}" class="btn btn-primary btn-sm" role="button"><i class="fa fa-plus"></i>{{__(' New')}}</a>
                </div>
            </div>
            <div class="card-body">
                @if (session('notification'))
                    <div class="alert alert-success" role="alert">
                        {{ session('notification') }}
                    </div>
                @endif
            </div>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">{{__('Name')}}</th>
                            <th scope="col">{{__('Description')}}</th>
                            <th scope="col">{{__('Options')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($specialties as $specialty)
                        <tr>
                            <th scope="row">
                                {{__($specialty->name)}}
                            </th>
                            <td>
                                {{__($specialty->description)}}
                            </td>
                            <td>
                                <form action="{{ url('/specialties/'.$specialty->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ url('/specialties/'.$specialty->id.'/edit') }}" class="btn btn-sm btn-primary">{{__('Edit')}}</a>
                                    <button type="submit" class="btn btn-sm btn-danger">{{__('Delete') }}</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="collapse collapse-box" id="responsive-table">
                <div class="code-box">
                    <div class="clearfix">
                        <a href="javascript:;" class="btn btn-primary btn-sm code-copy pull-left"  data-clipboard-target="#responsive-table-code"><i class="fa fa-clipboard"></i> Copy Code</a>
                        <a href="#responsive-table" class="btn btn-primary btn-sm pull-right" rel="content-y"  data-toggle="collapse" role="button"><i class="fa fa-eye-slash"></i> Hide Code</a>
                    </div>
                    <pre><code class="xml copy-pre" id="responsive-table-code">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </code></pre>
                </div>
            </div>
        </div>
        <!-- Responsive tables End -->
    </div>
</div>
@endsection
