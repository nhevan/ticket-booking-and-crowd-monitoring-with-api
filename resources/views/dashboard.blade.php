@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6 text-center">
                                <p><b>Total number of tickets generated :</b> {{ $total_ticket_count }}</p>
                                <p><b>Total number of male :</b> {{ $total_male }}</p>
                                <p><b>Total number of female :</b> {{ $total_female }}</p>
                            </div>
                            <div class="col-md-6">
                                <p style="margin-top: 30px;text-align: center;">Registration process is currently 
                                    <b>
                                        @if($is_registration_allowed == 0)
                                            <span style="color: #d9534f;">ON PAUSE</span>
                                        @else
                                            <span style="color: #5cb85c;">RUNNING</span>
                                        @endif
                                    </b>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading text-center"><b>Requested Tickets</b></div>

                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr> 
                                    <th style="width: 100px;">Reg-ID</th> 
                                    <th>Name</th> 
                                    <th style="width: 130px;">Phone</th> 
                                    <th>Email</th>
                                    <th style="width: 150px;">Created</th>
                                    <th style="width: 150px;">Barcode</th>
                                </tr> 
                            </thead> 
                            <tbody>
                                @foreach ($tickets as $ticket)
                                    <tr>
                                        <td>{{ $ticket->reg_id }}</td>
                                        <td>{{ $ticket->name }}</td>
                                        <td>{{ $ticket->phone }}</td>
                                        <td>{{ $ticket->email }}</td>
                                        <td>{{ $ticket->created_at }}</td>
                                        <td><img src="data:image/png;base64,{{ $ticket->barcode }}" style="width: 100%; height: 50px;"/></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="text-center">{{ $tickets->links() }}</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
