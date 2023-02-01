@extends('layouts.panel')

@section('content')
<div class="main-container">
    <div class="pd-ltr-20">
        <!-- Responsive tables Start -->
        <div class="pd-20 card-box mb-30">
            <div class="clearfix mb-20">
                <div class="pull-left">
                    <h4 class="text-blue h4">{{__('Histories')}}</h4>
                    <br>
                </div>
                <div class="pull-right">
                    
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
                            <th scope="col">{{__('Patient')}}</th>
                            <th scope="col">{{__('Specialty')}}</th>
                            <th scope="col">{{__('Options')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($histories as $history)
                        <tr>
                            <th scope="row">
                                {{__($history->done_by)}}
                            </th>
                            <td>
                                {{__($history->at_specialty)}}
                            </td>
                            <td>
                                <a href="{{ url('/histories/'.$history->id) }}" class="btn btn-sm btn-info"><i class="icon-copy dw dw-search1 text-white"></i></a>
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
